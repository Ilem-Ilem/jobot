<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Project;
use App\Models\AiUsage;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalUsers;
    public $activeProjects;
    public $aiWordsGenerated;
    public $revenue;
    public $topUniversities;

    public function mount()
    {
        $this->totalUsers = User::count();
        $this->activeProjects = Project::where('status', 'draft')->count();
        $this->aiWordsGenerated = AiUsage::sum('tokens_used'); // This is a placeholder, as we are not tracking words yet
        $this->revenue = User::where('plan', 'pro')->count() * 10;
        $this->topUniversities = User::select('university')
            ->selectRaw('count(*) as count')
            ->groupBy('university')
            ->orderByDesc('count')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.admin');
    }
}
