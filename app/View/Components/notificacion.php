<?php

namespace App\View\Components;

use Illuminate\View\Component;

class notificacion extends Component
{
    public $notificacion;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($notificacion)
    {
        $this->notificacion = $notificacion;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notificacion');
    }
}
