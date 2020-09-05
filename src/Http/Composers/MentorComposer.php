<?php

namespace Mujhtech\LaravelMentor\Http\Composers;

use Illuminate\View\View;
use Mujhtech\LaravelMentor\Mentor;

class MentorComposer
{
    /**
     * @var AdminLte
     */
    private $mentor;

    public function __construct(Mentor $mentor)
    {
        $this->mentor = $mentor;
    }

    public function compose(View $view)
    {
        $view->with('laravel-mentor', $this->mentor);
    }
}