<script>
    document.addEventListener('alpine:init', () => {

        alpine.data('dropdown', () => ({
            opened: false,
            visibleEntries: [],
            dropdownItems: @js($dropdownItems),
            entries: @js($entries),
            yoeColIdx: @js($yoeColIdx),
            toggle() {
                this.opened = !this.opened
            },
            filter(value) {
                this.toggle();

                for (let i = 1; i < _.size(this.entries); i++) {

                    let el = document.getElementById("row-" + i);

                    value === undefined ?
                        el.classList.remove("hidden") :
                        this.entries[i][this.yoeColIdx] == value ?
                        el.classList.remove("hidden") :
                        el.classList.add("hidden");
                }
            }
        }));

    })
</script>

<div x-data="dropdown" class="relative">

    <button x-on:click="toggle" class="flex items-center gap-2 bg-white hover:bg-gray-50 px-5 py-2.5 rounded-md shadow">
        <span class="inline-block">{{ $dropdownText }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <ul x-show="opened" x-on:click.outside="opened = false" x-transition.opacity
        class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md" style="display: none;">
        <a href="#" x-on:click="filter()"
            class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
            Show all
        </a>
        @foreach ($dropdownItems as $item)
            <a href="#" x-on:click="filter({{ $item }})"
                class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                {{ $item }}
            </a>
        @endforeach
    </ul>

</div>
