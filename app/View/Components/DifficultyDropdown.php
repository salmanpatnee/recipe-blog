<?php

namespace App\View\Components;

use App\Models\Difficulty;
use Illuminate\View\Component;

class DifficultyDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.difficulty-dropdown', [
            'difficulties'      => Difficulty::all(),
            'currentDifficulty' => Difficulty::firstWhere('slug', request('difficulty')),
        ]);
    }
}
