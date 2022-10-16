<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ColumnAction extends Component
{
    public $url_sub;
    public $url_gallery;
    public $url_edit;
    public $url_copy;
    public $url_option;
    public $url_delete;
    public $url_modal;
    public $url_text;

    public function __construct($url_sub=null,$url_gallery=null,$url_edit=null,$url_copy=null,$url_option,$url_delete=null,$url_modal=null,$url_text=null)
    {
        $this->url_sub = $url_sub;
        $this->url_gallery = $url_gallery;
        $this->url_edit = $url_edit;
        $this->url_copy = $url_copy;
        $this->url_option = $url_option;
        $this->url_delete = $url_delete;
        $this->url_modal = $url_modal;
        $this->url_text = $url_text;
    }

    public function render()
    {
        return view('components.column-action');
    }
}
