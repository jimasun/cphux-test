@extends('layouts.app')

<div class="content">

    @section('title', 'Salary Survey')

    @section('content')

        <div class="container mx-auto px-4 text-sm leading-tight">
            @foreach ($entries as $entry)
                @include('livewire.includes.csvRow', ['row' => $entry])
            @endforeach
        </div>

    @endsection

</div>
