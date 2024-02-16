<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>senimart | @yield('title')</title>

    {{-- style --}}
    @include('auth.template.style')
    @stack('style')
    {{-- end style --}}
</head>

<body>

    {{-- main --}}
    <main>
       @yield('content')
    </main>
    {{-- end main --}}


    {{-- script --}}
    @include('auth.template.script')
    {{-- end script --}}
</body>

</html>
