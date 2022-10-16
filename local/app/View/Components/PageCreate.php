<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageCreate extends Component
{
    public $title;
    public $url;
    public $loop;
    public $back;
    public $form;

    public function __construct($title=null,$url=null,$loop=null,$back=null,$form=null)
    {
        $this->title = $title;
        $this->url = $url;
        $this->loop = $loop;
        $this->back = $back;
        $this->form = $form;
    }

    public function render()
    {
        return view('components.page-create');
    }
}
