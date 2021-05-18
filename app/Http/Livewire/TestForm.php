<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestForm extends Component
{
    public string $field = '';
    public bool $showField = false;

    public function showInput()
    {
        $this->showField = true;
    }

    public function clearInput()
    {
        $this->field = '';
        $this->showField = false;
    }

    public function render()
    {
        return view('livewire.test-form');
    }
}
