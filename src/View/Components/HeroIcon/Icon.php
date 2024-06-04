<?php

namespace Crankd\LaravelHeroIcons\View\Components\HeroIcon;

use Illuminate\View\Component;

class Icon extends Component
{

    public $type;

    public $icon;

    public $v;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = "outline", $icon = "x-circle", $v = "")
    {
        $this->type = $type;
        $this->icon = $icon;
        $this->v = $v;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        if ($this->v != '') {
            return view('heroicons::components.heroicons.' . $this->v . '.' . $this->type . '.' . $this->icon);
        } else {
            return view('heroicons::components.heroicons.' . $this->type . '.' . $this->icon);
        }
    }
}
