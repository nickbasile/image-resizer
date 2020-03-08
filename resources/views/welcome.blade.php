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

        <style>
            @foreach($images as $i => $image)
            .bg-image-{{$i}} {
                background: url('{{$image['path']}}') no-repeat center center/cover;
            }
            @endforeach
        </style>
    </head>
    <body class="antialiased font-sans">
        <main class="min-h-screen flex flex-col items-center justify-center p-8">
            <section class="bg-white max-w-2xl border border-gray-400 p-12 rounded">
                <h1 class="text-3xl text-gray-900 font-bold leading-tight">Image Resizer</h1>
                <h2 class="text-xl text-gray-700 leading-tight mt-1">Compress and optimize your images.</h2>
                <form action="/" method="POST" enctype="multipart/form-data" class="mt-6">
                    @csrf
                    <div class="flex flex-col">
                        <label for="images[]" class="text-md font-bold tracking-wide text-gray-700">Upload Image</label>
                        <input type="file" id="files" name="images[]" multiple accept="image/*" class="mt-2">
                        @error('images')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @error('images.*')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 transition-all duration-200 ease-in-out px-4 py-2 mt-4 text-white font-bold">Submit</button>
                </form>
            </section>
            <section class="mt-4">
                <p class="text-gray-600 text-sm text-center">Built by <a href="https://twitter.com/nickjbasile" target="_blank" class="text-blue-500 hover:text-blue-700 transition-all duration-100 ease-in-out underline">Nick Basile</a>. Powered by <a href="https://github.com/spatie/image" target="_blank" class="text-blue-500 hover:text-blue-700 transition-all duration-100 ease-in-out underline">Spatie image</a>.</p>
            </section>


            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-16 container mx-auto -m-4">
                @foreach($images as $i => $image)
                    <a href="{{$image['path']}}" download class="w-full h-64 flex items-center justify-center group bg-image-{{$i}}">
                        <div class="w-full h-full bg-overlay flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-200 ease-in-out">
                            <button class="bg-indigo-500 hover:bg-indigo-700 transition-all duration-200 ease-in-out px-4 py-2 text-white font-bold">Download</button>
                        </div>
                    </a>
                @endforeach
            </section>

        </main>
    </body>
</html>
