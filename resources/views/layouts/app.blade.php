<!doctype html>
<html>

@include('layouts.includes.head')

<body>

    @include('layouts.includes.header')

    <div class="content">

        @yield('content', 'Content not provided')
        
    </div>

    @include('layouts.includes.footer')

</body>

</html>
