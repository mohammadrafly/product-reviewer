<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOSO | {{ $data['title'] }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}">
</head>
<body>
    <div class="md:min-h-screen bg-gray-200">
        @include('layout.partials.navbar')

        <div class="p-10 h-min-screen">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/App.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @yield('script')
</body>
</html>