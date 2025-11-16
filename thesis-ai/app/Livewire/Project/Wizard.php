<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use OpenAI\Laravel\Facades\OpenAI;

class Wizard extends Component
{
    public int $currentStep = 1;
    public bool $generatingTitles = false;

    // Step 1
    public string $field = '';
    public string $level = '';

    // Step 2
    public int $wordcount_goal = 12000;
    public string $deadline = '';

    // Step 3
    public string $title = '';
    public array $titleSuggestions = [];

    protected array $rules = [
        'field' => 'required|string|max:255',
        'level' => 'required|string|in:BSc,MSc,PhD',
        'wordcount_goal' => 'required|integer|min:1000',
        'deadline' => 'required|date|after:today',
        'title' => 'required|string|max:255',
    ];

    public function nextStep()
    {
        $this->validate($this->getRulesForStep($this->currentStep));

        if ($this->currentStep === 2) {
            $this->generatingTitles = true;
            try {
                $result = OpenAI::chat()->completions()->create([
                    'model' => 'gpt-4-turbo',
                    'messages' => [
                        ['role' => 'user', 'content' => "Generate 3 project titles for a {$this->level} thesis in the field of {$this->field}. Each title should be on a new line."],
                    ],
                ]);
                $this->titleSuggestions = array_filter(explode("\n", $result->choices[0]->message->content));
            } catch (\Exception $e) {
                // Fallback to hardcoded suggestions if API call fails
                $this->titleSuggestions = [
                    "AI-driven optimization of {$this->field} for {$this->level} projects",
                    "The impact of {$this->field} on modern research methodologies",
                    "A novel approach to {$this->field} in the context of {$this->level} studies",
                ];
            }
            $this->title = $this->titleSuggestions[0] ?? '';
            $this->generatingTitles = false;
        }

        if ($this->currentStep < 3) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function save()
    {
        $this->validate($this->getRulesForStep(3));

        $project = Project::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'field' => $this->field,
            'level' => $this->level,
            'wordcount_goal' => $this->wordcount_goal,
            'deadline' => $this->deadline,
        ]);

        // Create default chapters
        $chapters = ['Introduction', 'Literature Review', 'Methodology', 'Results', 'Conclusion'];
        foreach ($chapters as $index => $chapterTitle) {
            $project->chapters()->create([
                'title' => $chapterTitle,
                'chapter_order' => $index + 1,
            ]);
        }

        return redirect()->route('dashboard')->with('message', 'Project created successfully!');
    }

    private function getRulesForStep(int $step): array
    {
        return match ($step) {
            1 => [
                'field' => $this->rules['field'],
                'level' => $this->rules['level'],
            ],
            2 => [
                'wordcount_goal' => $this->rules['wordcount_goal'],
                'deadline' => $this->rules['deadline'],
            ],
            3 => [
                'title' => $this->rules['title'],
            ],
            default => [],
        };
    }

    public function render()
    {
        return view('livewire.project.wizard')->layout('layouts.app');
    }
}
