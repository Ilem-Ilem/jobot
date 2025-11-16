<?php

namespace App\Livewire;

use App\Models\Chapter;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class LiveFeedbackPanel extends Component
{
    public Chapter $chapter;
    public int $wordCount = 0;
    public string $toneAnalysis = '';

    public function mount(Chapter $chapter)
    {
        $this->chapter = $chapter;
        $this->wordCount = $chapter->wordcount;
    }

    public function poll()
    {
        $this->wordCount = $this->chapter->fresh()->wordcount;
    }

    public function analyzeTone()
    {
        try {
            $result = OpenAI::completions()->create([
                'model' => 'gpt-4-turbo',
                'prompt' => "Analyze the tone of the following text and provide feedback on its academic suitability:\n\n{$this->chapter->content}",
                'max_tokens' => 150,
            ]);
            $this->toneAnalysis = $result['choices'][0]['text'];
        } catch (\Exception $e) {
            $this->toneAnalysis = 'Could not analyze tone at this time.';
        }
    }

    public function render()
    {
        return view('livewire.live-feedback-panel');
    }
}
