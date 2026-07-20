<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class quiz extends Component
{
    public $questions;
    public $point;
    public $title;
    public $materi;

    /**
     * Buat instance baru dari komponen.
     *
     * @param array $questions
     * @return void
     */
    public function __construct($questions,$point,$title,$materi)
    {
        $this->questions = $questions;
        $this->point = $point;
        $this->title = $title;
        $this->materi = $materi;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.quiz');
    }
}
