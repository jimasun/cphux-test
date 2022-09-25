<?php

namespace App\Http\Controllers;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Illuminate\Support\Facades\App;

class CsvController extends Controller implements IteratorAggregate
{
    private $it;

    public function readCsv() : void
    {
        $this->it = [];

        try {

            $open = fopen(database_path() . "/Salary Survey (Responses).csv", "r");

            if ($open !== FALSE) {

                while (($data = fgetcsv($open, null, ",")) !== FALSE) {

                    $this->it[] = $data;
                }
                
                fclose($open);
            }
        } catch (Exception $e) {

            if (App::environment('local')) {

                throw $e;
            }
        }
    }

    public function getArray() : array
    {
        return $this->it;
    }
    
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->it);
    }
}
