@extends('layouts.dashboard')

@section('title', 'Salary Survey')

@section('content')

    <div class="w-full mx-auto p-4">

        @include('livewire.includes.dropdown', [
            'yoeColIdx' => $yoeColIdx,
            'entries' => $entries,
            'dropdownText' => $dropdownText,
            'dropdownItems' => $dropdownItems
        ])

    </div>

    <div class="table table-fixed w-full mx-auto px-4 text-sm leading-tight">

        <div class="table-header-group">
            <div class="table-row max-h-2 font-semibold">
                @foreach ($entries->current() as $cell)
                    <div class="table-cell p-2">
                        {{ $cell }}
                    </div>
                @endforeach
                {{ $entries->next() }}
            </div>
        </div>

        <div class="table-row-group">
            @while ($entries->valid())
                <div id="row-{{$entries->key()}}" class="table-row hover:bg-gray-200">
                    @foreach ($entries->current() as $cell)
                        <div class="table-cell max-h-min p-2 overflow-hidden hover:font-semibold hover:overflow-visible hover:drop-shadow-xl">
                            {{ $cell }}
                        </div>
                    @endforeach
                    {{ $entries->next() }}
                </div>
            @endwhile
        </div>

    </div>

@endsection
