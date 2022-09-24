<div class="columns-12 gap-4 hover:bg-violet-200">

    @foreach ($row as $column)
        <div class="overflow-hidden h-24 w-38 p-4 ">
            {{ $column }}
        </div>
    @endforeach

</div>
