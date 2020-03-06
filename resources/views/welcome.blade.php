<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased font-sans">
        <main class="min-h-screen flex flex-col items-center justify-center p-8">
            <section class="bg-white max-w-2xl border border-gray-400 p-12 rounded">
                <h1 class="text-3xl text-gray-900 font-bold leading-tight">Image Resizer</h1>
                <h2 class="text-xl text-gray-700 leading-tight mt-1">Compress and optimize your images.</h2>
                <form action="" method="POST" class="mt-6">
                    @csrf
                    <div class="flex flex-col">
                        <label for="files" class="text-md font-bold tracking-wide text-gray-700">Upload Image</label>
                        <input type="file" id="files" name="files" multiple class="mt-2">
                    </div>
                    <button type="submit" class="bg-indigo-500 px-4 py-2 mt-4 text-white font-bold">Submit</button>
                </form>
            </section>
            <section class="mt-4">
                <p class="text-gray-600 text-sm text-center">Built by <a href="https://twitter.com/nickjbasile" target="_blank" class="text-blue-500 hover:text-blue-700 transition-all duration-100 ease-in-out underline">Nick Basile</a>. Powered by <a href="https://github.com/spatie/image" target="_blank" class="text-blue-500 hover:text-blue-700 transition-all duration-100 ease-in-out underline">Spatie image</a>.</p>
            </section>
        </main>
    </body>
</html>
