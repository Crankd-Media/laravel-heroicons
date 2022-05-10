<?php

namespace Crankd\LaravelHeroIcons\View\Components\HeroIcon;

use Illuminate\View\Component;

class Icon extends Component
{

    public $type;

    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = "outline", $icon = "x-circle")
    {
        $this->type = $type;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('heroicons::components.heroicons.' . $this->type . '.' . $this->icon);
    }
}
