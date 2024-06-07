<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOSO | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}">
</head>
<body>
    @if($title === 'Login')
        <div class="bg-gray-200">
            @yield('content')
        </div>
    @else
        <div class="md:min-h-screen bg-gray-200">
            @include('layout.partials.sidebar')

            <div class="pl-[250px]">
                <div class="p-10 h-min-screen">
                    @yield('content')
                </div>
            </div>
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/App.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @yield('script')
</body>
</html>
