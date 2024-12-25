<?php
namespace App\View\Components;
use Illuminate\View\Component;
class PersonalLayout extends Component
{
    public function __construct()
    {
    }
    public function render()
    {
        return view('personal.layouts.layout');
    }
}
