<?php

namespace App\Livewire\Chapter;

use App\Models\Chapter;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use OpenAI\Laravel\Facades\OpenAI;

class Writer extends Component
{
    public Chapter $chapter;
    public string $content;
    public string $journalUrl = '';

    public function mount(Chapter $chapter)
    {
        if ($chapter->project->user_id !== Auth::id()) {
            abort(403);
        }

        $this->chapter = $chapter;
        $this->content = $chapter->content;
    }

    public function save()
    {
        $this->chapter->update([
            'content' => $this->content,
            'wordcount' => str_word_count($this->content),
        ]);

        session()->flash('message', 'Chapter saved successfully!');
    }

    public function aiWriteIntro()
    {
        $result = OpenAI::chat()->completions()->create([
            'model' => 'gpt-4-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'Write an introduction for a chapter titled "' . $this->chapter->title . '" in a thesis about "' . $this->chapter->project->title . '".'],
            ],
        ]);

        $this->content = $result->choices[0]->message->content . $this->content;
    }

    public function expandText()
    {
        $result = OpenAI::chat()->completions()->create([
            'model' => 'gpt-4-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'Expand on the following text: "' . $this->content . '"'],
            ],
        ]);

        $this->content .= "\n\n" . $result->choices[0]->message->content;
    }

    public function fetchJournal()
    {
        $this->validate([
            'journalUrl' => 'required|url'
        ]);

        $response = Http::get($this->journalUrl);
        $html = $response->body();

        preg_match('/<title>(.*?)<\/title>/', $html, $matches);
        $title = $matches[1] ?? 'Placeholder Title';

        preg_match('/<meta name="author" content="(.*?)"/i', $html, $matches);
        $authors = $matches[1] ?? 'Placeholder Authors';

        preg_match('/<meta name="publication_date" content="(.*?)"/i', $html, $matches);
        $year = $matches[1] ? date('Y', strtotime($matches[1])) : date('Y');

        $summary = OpenAI::chat()->completions()->create([
            'model' => 'gpt-4-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'Summarize the following article: ' . $this->journalUrl],
            ],
        ]);

        $citation = OpenAI::chat()->completions()->create([
            'model' => 'gpt-4-turbo',
            'messages' => [
                ['role' => 'user', 'content' => "Generate an APA citation for the following article:\nTitle: {$title}\nAuthors: {$authors}\nYear: {$year}\nURL: {$this->journalUrl}"],
            ],
        ]);

        $this->chapter->journalEntries()->create([
            'url' => $this->journalUrl,
            'title' => $title,
            'authors' => $authors,
            'year' => $year,
            'summary' => $summary->choices[0]->message->content,
            'citation_apa' => $citation->choices[0]->message->content,
        ]);

        $this->journalUrl = '';
        session()->flash('message', 'Journal entry added successfully!');
    }

    public function render()
    {
        return view('livewire.chapter.writer')->layout('layouts.app');
    }
}
