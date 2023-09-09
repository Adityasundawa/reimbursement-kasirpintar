<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="flex flex-col items-center drawer-content bg-base-300">

            {{-- Navbar --}}
            @include('partials.navbar')

            @yield('content')

        </div>
        <div class="z-20 drawer-side">
            <label for="my-drawer-2" class="drawer-overlay"></label>

            {{-- Sidebar --}}
            @include('partials.sidebar')

        </div>
    </div>



</body>

</html>
