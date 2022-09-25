<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\CsvController;

class Csv extends Component
{
    private $csvController;
    private $yoe;
    private $yoeColIdx = 6;

    public function mount()
    {
        $this->csvController = new CsvController();
        $this->csvController->readCsv();

        $this->yoe = $this->csvController->getArray();
        array_shift($this->yoe);
        $this->yoe = array_column($this->yoe, 6);
        $this->yoe = array_unique($this->yoe);
        rsort($this->yoe, SORT_NUMERIC);
    }

    public function render()
    {
        return view(
            'livewire.csv',
            [
                'yoeColIdx' => $this->yoeColIdx,
                'entries' => $this->csvController->getIterator(),
                'dropdownText' => "Years of Experience",
                'dropdownItems' => $this->yoe
            ]
        )->layout('layouts.dashboard');
    }
}
