<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component {
    public $counter = 0;
    public function increment()
    {
        $this->counter++;
        $this->dispatchBrowserEvent('turboStreamFromLivewire', [
            'message' => view('livewire.counter_stream', ['counter' => $this->counter])->render(),
        ]);
    }

    public function decrement()
    {
        $this->counter--;

        $this->dispatchBrowserEvent('turboStreamFromLivewire', [
            'message' => view('livewire.counter_stream', ['counter' => $this->counter])->render(),
        ]);
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
