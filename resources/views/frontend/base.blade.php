<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>senimart | @yield('title')</title>

    {{-- style --}}
    @include('frontend.template.style')
    @stack('style')
    {{-- end style --}}
</head>

<body >
    <div class="head-and-main container-fluid d-flex flex-column">
        <div>
            {{-- header --}}
            @include('frontend.template.header')
            {{-- end header --}}

            {{-- main --}}
            <main>
                @yield('content')
            </main>
            {{-- end main --}}
        </div>
    </div>
    {{-- footer --}}
    @include('frontend.template.footer')
    {{-- end footer --}}


    {{-- script --}}
    @include('frontend.template.script')
    @stack('script')
    {{-- end script --}}
</body>

</html>
