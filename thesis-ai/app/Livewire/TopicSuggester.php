<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class TopicSuggester extends Component
{
    public string $keywords = '';
    public array $suggestions = [];

    public function getSuggestions()
    {
        $this->validate([
            'keywords' => 'required|string|min:3',
        ]);

        try {
            $result = OpenAI::chat()->completions()->create([
                'model' => 'gpt-4-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => "Generate 5 research topics with identified research gaps for a thesis based on the keywords: {$this->keywords}. Each topic should be on a new line."],
                ],
            ]);
            $this->suggestions = array_filter(explode("\n", $result->choices[0]->message->content));
        } catch (\Exception $e) {
            // Fallback to hardcoded suggestions if API call fails
            $this->suggestions = [
                "The role of {$this->keywords} in shaping modern society.",
                "Ethical implications of {$this->keywords}.",
                "A comparative study of {$this->keywords} in different cultures.",
                "The future of {$this->keywords}: trends and predictions.",
                "The impact of {$this->keywords} on the global economy.",
            ];
        }
    }

    public function render()
    {
        return view('livewire.topic-suggester')->layout('layouts.app');
    }
}
