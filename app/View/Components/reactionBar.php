<?php

namespace App\View\Components;

use Illuminate\View\Component;

class reactionBar extends Component
{
    public $id;
    public $publicacion;
    public $clase;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $publicacion, $clase)
    {
        $this->id = $id;
        $this->publicacion = $publicacion;
        $this->clase = $clase;
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
