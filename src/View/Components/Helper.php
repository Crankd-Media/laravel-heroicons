<?php

namespace Crankd\LaravelHeroIcons\View\Components;

use Illuminate\View\Component;

class Helper extends Component
{

    public $icons;

    public $position;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->icons = $this->getIcons();
        $this->position = '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('heroicons::components.helper');
    }

    public function getIcons()
    {
        $icons = [];
        $path = __DIR__ . '/../../../resources/views/components/heroicons/outline';
        $heroicons = array_diff(scandir($path), array('.', '..'));
        foreach ($heroicons as $key => $icon) {
            $fileName = str_replace('.blade.php', '', $icon);
            array_push($icons, $fileName);
        }
        // return $icons;
        return json_encode($icons, JSON_UNESCAPED_SLASHES);
    }
}
