<?php

namespace App\View\Components;

use Illuminate\View\Component;

class reactionBar extends Component
{
    public $idPost;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idPost)
    {
        $this->idPost = $idPost;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reaction-bar');
    }
}
