<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class HotspotImage extends Component
{
    public $image;
    public $hotspots;
    public $correctAnswers;
    public $quizid;
    public $instruction;
    public $point;
    public $title;
    public $materi;
    public $pertanyaan;

    /**
     * Create a new component instance.
     *
     * @param string $image URL atau path ke gambar.
     * @param array $hotspots Array hotspot dengan atribut seperti name, top, left, width, height.
     * @param array $correctAnswers Array nama hotspot yang benar.
     */
    public function __construct($image, $hotspots, $correctAnswers, $title, $materi, $point, $instruction, $pertanyaan)
    {
        $this->image = $image;
        $this->hotspots = $hotspots;
        $this->correctAnswers = $correctAnswers;
        $this->quizid = 'quiz-' . Str::uuid()->toString(); // Generate unique ID
        $this->instruction = $instruction;
        $this->point = $point;
        $this->title = $title;
        $this->materi = $materi;
        $this->pertanyaan = $pertanyaan;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hotspot-image');
    }
}
