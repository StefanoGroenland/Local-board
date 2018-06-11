<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projects</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col bg-white">
<div class="w-full mx-auto">
    <div class="bg-green-light text-white p-8 text-center">
        <h1 class="font-semibold font-sans font-italic">{{ "</ >" }} Projects {{ "</ >" }}</h1>

        <input class="shadow appearance-none border rounded w-1/4 mt-3 py-4 px-3 text-grey-darker leading-tight"
               id="jetsSearch"
               type="text"
               placeholder="Search...">
    </div>
    @foreach ($projects->chunk(3) as $chunk)
        <div class="flex flex-row justify-center" id="jetsContent">
            @foreach ($chunk as $project)
                <a href="http://{{ $project->url }}"
                   data-content="{{ $project->name }}"
                   target="_blank"
                   class="bg-grey-lighter w-1/3 m-4 p-8 h-full no-underline text-grey-darkest hover:text-green-light shadow">
                    <h3 class="site text-center font-semibold font-sans text-sm">
                        {{ ucfirst($project->name) }}
                    </h3>
                </a>
            @endforeach
        </div>
    @endforeach
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script>
    var jets = new Jets({
        searchTag: '#jetsSearch',
        contentTag: '#jetsContent'
    });
</script>
</body>
</html>
