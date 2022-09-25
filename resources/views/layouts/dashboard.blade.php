<html class="h-full bg-gray-100">

@include('layouts.includes.head')

<body class="h-full">

    <div class="min-h-full">
        
        @include('layouts.includes.nav')

        @include('layouts.includes.header')
       
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="px-4 py-6 sm:px-0">
                    <div class="rounded-lg border-4 border-dashed border-gray-200">
                        <div class="content">
                            @yield('content', 'Content not provided')
                        </div>
                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </div>

    @include('layouts.includes.footer')

</body>

</html>
