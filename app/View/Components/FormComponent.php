<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormComponent extends Component
{
    public $formid;
    public $formlabel;
    public $formtype;
    public $formicon;
    public $formname;
    public $formplaceholder;
    public $formvalue;

    public function __construct($formid,$formlabel,$formtype,$formicon,$formname,$formplaceholder="",$formvalue="")
    {
        $this->formid = $formid;
        $this->formlabel = $formlabel;
        $this->formtype = $formtype;
        $this->formicon = $formicon;
        $this->formname = $formname;
        $this->formplaceholder = $formplaceholder;
        $this->formvalue = $formvalue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-component');
    }
}
