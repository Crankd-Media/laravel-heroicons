<?php

namespace Crankd\LaravelHeroIcons\View\Components;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Helper extends Component
{

    public $icons;

    /**
     * The helper position.
     *
     * @var string
     */
    public $position;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($position)
    {
        $this->icons = $this->getIcons();
        $this->position = $position;
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
            // $icon['balde'] = $fileName;

            $icon = [];
            $icon['name'] = $fileName;
            $icon['svg'] = $fileName . ".svg";

            $path = __DIR__ . '/../../../resources/views/components/svg/o-academic-cap.svg';
            $icon['svg_file'] = File::get($path);

        }
        // return $icons;
        return json_encode($icons, JSON_UNESCAPED_SLASHES);
    }
}
