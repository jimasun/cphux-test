<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\CsvController;

class Csv extends Component
{
    private $csvController;

    public function mount()
    {
        $this->csvController = new CsvController();
        $this->csvController->readCsv();
    }

    public function render()
    {
        return view('livewire.csv', [
                'entries' => $this->csvController->getIterator()
            ]
        );
    }
}
