<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="px-2 pt-32 bg-white md:px-0">
        <div class="container items-center max-w-6xl px-5 mx-auto space-y-6 text-center">
            <h1
                class="text-4xl font-extrabold tracking-tight text-left text-gray-900 sm:text-5xl md:text-6xl md:text-center">
                <span class="block">Student <span class="block mt-1 text-purple-500 lg:inline lg:mt-0"
                        data-primary="purple-500">Management</span></span>
            </h1>
            <p
                class="w-full mx-auto text-base text-left text-gray-500 md:max-w-md sm:text-lg lg:text-2xl md:max-w-3xl md:text-center">
                A simple app to demonstrate student management built with Laravel.
            </p>
            <div class="relative flex flex-col justify-center md:flex-row md:space-x-4">
                @if(Route::is('addstudent'))
                <a href="{{ route('home') }}"
                    class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-gray-500 rounded-md md:mb-0 hover:bg-gray-700 md:w-auto"
                    data-primary="purple-500" data-rounded="rounded-md">
                    Go Back
                </a>
                @else
                <a href="{{ route('addstudent') }}"
                    class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-purple-500 rounded-md md:mb-0 hover:bg-purple-700 md:w-auto"
                    data-primary="purple-500" data-rounded="rounded-md">
                    👨🏻‍🎓 Add Student
                </a>
                @endif
                <a href="#_"
                    class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600"
                    data-rounded="rounded-md">
                    📕 Add Subject
                </a>
            </div>
        </div>
        <div class="container items-center max-w-4xl px-5 mx-auto mt-16">
            @yield('content')
        </div>
    </section>
    <section class="bg-white">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <p class="mt-8 text-base leading-6 text-center text-gray-400">
                © 2022 B13 Full Tank. All Rights Reserved.
            </p>
        </div>
    </section>
</body>

</html>