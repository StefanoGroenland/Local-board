<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Projects</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col bg-white">
<div class="w-full mx-auto" id="app">
    <div class="bg-green-light text-white p-8 text-center">
        <h1 class="font-semibold font-sans font-italic">{{ "</ >" }} Projects {{ "</ >" }}</h1>

        <input class="shadow appearance-none border rounded w-1/4 mt-3 py-4 px-3 text-grey-darker leading-tight"
               id="jetsSearch"
               type="text"
               placeholder="Search...">
    </div>
    <div class="flex flex-wrap justify-center" id="jetsContent">
        @foreach ($projects as $project)
            <a href="http://{{ $project->url }}"
               data-content="{{ $project->name }}"
               target="_blank"
               class="bg-grey-lighter w-full md:w-1/4 my-4 mx-2 p-8 h-full no-underline text-grey-darkest hover:text-green-light shadow">
                <h3 class="site text-center font-semibold font-sans text-sm">
                    {{ ucfirst($project->name) }}
                </h3>
            </a>
        @endforeach
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script>
    var jets = window.jets({
        searchTag: '#jetsSearch',
        contentTag: '#jetsContent'
    });
</script>
</body>
</html>
