<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FiltroBusqueda extends Component
{
    public $action;
    public $recordsPerPage;
    public $filter;

    public function __construct($action, $recordsPerPage = null, $filter = null)
    {
        $this->action = $action;
        $this->recordsPerPage = $recordsPerPage;
        $this->filter = $filter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.filtro-busqueda');
    }
}
