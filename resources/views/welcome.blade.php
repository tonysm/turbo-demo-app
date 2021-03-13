<x-guest-layout>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ route('posts.index') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="266" height="48">
                    <circle fill="#fecaca" cx="24" cy="24" r="24"/>
                    <path class="bolt"
                          d="M31.926 14.558l-6.266 1.456 5.47-13.922-16.372 21.093 7.814-1.543-7.365 14.384 4.253-.956-4.303 10.266 13.53-14.616-4.991 1.155z"
                          fill="#dc2626"/>
                    <text x="74.06" y="35.66" font-family="FreeSans" font-size="29.964" stroke-width=".35"
                          style="line-height:.85;-inkscape-font-specification:'FreeSans Bold'"
                          transform="scale(1.0203 .9801)" font-weight="700">
                        <tspan x="74.06" y="35.66" font-family="Nimbus Sans" stroke-width=".346"
                               style="-inkscape-font-specification:'Nimbus Sans Bold'">Turbo
                            <tspan font-weight="400">Laravel</tspan>
                        </tspan>
                    </text>
                </svg>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-12 space-y-4 text-lg md:text-2xl font-medium">
                    <h1 class="">Hey, folks —</h1>

                    <p>I'm <a class="text-indigo-500 hover:text-indigo-600" href="https://twitter.com/tonysmdev">Tony
                            Messias</a>, author and maintainer of the <a class="text-indigo-500 hover:text-indigo-600"
                                                                         href="https://github.com/tonysm/turbo-laravel">Turbo
                            Laravel</a> package.</p>

                    <p>This is a demo application for the package. The code for this application is Open Source, you can
                        find it <a class="text-indigo-500 hover:text-indigo-600"
                                   href="https://github.com/tonysm/turbo-demo-app">here</a>.</p>

                    <p>You can <a class="text-indigo-500 hover:text-indigo-600" href="{{ route('register') }}">create an
                            account</a> using a dummy email and password pair to test out the application.</p>

                    <p>There is also a nice <a class="text-indigo-500 hover:text-indigo-600"
                                               href="https://turbo-showcase.herokuapp.com/">Turbo Showcase</a> project
                        that you should check out.</p>

                    <p>My hope is that you can have an overview on how to build applications this way. If you have any
                        feedback, send it my way as an
                        <a class="text-indigo-500 hover:text-indigo-600"
                           href="https://github.com/tonysm/turbo-laravel/issues">issue</a>, <a
                            class="text-indigo-500 hover:text-indigo-600" href="https://twitter.com/tonysmdev">tweet</a>,
                        or
                        <a class="text-indigo-500 hover:text-indigo-600" href="mailto:tonysm@hey.com">email</a>.</p>

                    <p>Peace.</p>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
