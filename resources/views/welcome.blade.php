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
                        <label for="images" class="text-md font-bold tracking-wide text-gray-700">Upload Image</label>
                        <input type="file" id="images" name="images[]" multiple accept="image/*" class="mt-2">
                        @error('images')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @error('images.*')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-col mt-3 md:pr-6">
                            <label for="width" class="text-md font-bold tracking-wide text-gray-700">Width</label>
                            <input type="number" id="width" name="options[width]" value="{{old('options.width', 1440)}}" class="mt-2 px-3 py-2 bg-gray-200 text-gray-900 w-full md:w-24">
                            @error('options.width')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col mt-3 md:pr-6">
                            <label for="height" class="text-md font-bold tracking-wide text-gray-700">Height</label>
                            <input type="number" id="height" name="options[height]" value="{{old('options.height', 1024)}}" class="mt-2 px-3 py-2 bg-gray-200 text-gray-900 w-full md:w-24">
                            @error('options.height')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 transition-all duration-200 ease-in-out px-4 py-2 mt-6 text-white font-bold">Upload</button>
                </form>
            </section>

            <section class="mt-4">
                <p class="text-gray-600 text-sm text-center">Built by <a href="https://twitter.com/nickjbasile" target="_blank" class="text-blue-500 hover:text-blue-700 transition-all duration-100 ease-in-out underline">Nick Basile</a>. Powered by <a href="https://github.com/spatie/image" target="_blank" class="text-blue-500 hover:text-blue-700 transition-all duration-100 ease-in-out underline">Spatie image</a>.</p>
            </section>

            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-16 container mx-auto -m-4">
                @foreach($images as $i => $image)
                    <a href="{{$image['path']}}" download class="w-full h-64 flex items-center justify-center group bg-image-{{$i}}">
                        <div class="w-full h-full bg-overlay flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-200 ease-in-out">
                            <button class="bg-white hover:bg-gray-200 text-indigo-500 font-bold transition-all duration-200 ease-in-out px-4 py-2">Download</button>
                        </div>
                    </a>
                @endforeach
            </section>

            @if(session()->has('success'))
            <div id="success-message" class="z-10 fixed bottom-0 right-0 mb-8 mr-8 bg-green-100 border border-green-700 rounded px-4 py-3 transition-all duration-200 ease-in-out">
                <p class="text-green-700">{{session('success')}}</p>
            </div>
            @endif
        </main>
    </body>
</html>
