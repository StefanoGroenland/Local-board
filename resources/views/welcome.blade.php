<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-full bg-grey-darkest">
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
    <body class="flex flex-col h-full bg-white">
            <div class="w-screen mx-auto flex-1">
                <div class="bg-green-light text-white p-8 text-center">
                    <h1 class="font-semibold font-sans font-italic">{{ "</ >" }} Projects {{ "</ >" }}</h1>
                </div>
                @foreach ($projects->chunk(3) as $chunk)
                    <div class="flex flex-row justify-center">
                        @foreach ($chunk as $project)
                            <a href="http://{{ $project->url }}" class="bg-grey-lighter w-1/3 m-4 p-8 h-full no-underline text-grey-darkest hover:text-green-light shadow">
                                <h3 class="text-center font-semibold font-sans text-sm">
                                    {{ ucfirst($project->name) }}
                                </h3>
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        <footer class='w-screen text-center border-t border-green-lighter bg-grey-darkest text-white p-4 pin-b'>
            <h5>Built with <a href="https://tailwindcss.com/docs" class="no-underline text-white">Tailwind</a></h5>
        </footer>
    </body>
</html>
