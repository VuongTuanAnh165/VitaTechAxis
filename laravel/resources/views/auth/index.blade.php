<!DOCTYPE html>
<html lang="en" class="{{ $_COOKIE['mode'] ?? 'light' }}">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('messages.web.auth.login') }}</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('templates/admin/dist/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}" />
    @yield('addcss')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block grid-cols-2 gap-4 xl:grid">
            <!-- BEGIN: Login Info -->
            <div class="flex-col hidden min-h-screen xl:flex">
                <a href="" class="flex items-center pt-5 -intro-x">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                    <span class="ml-3 text-lg text-white"> {{ $business->name }} </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="w-1/2 -mt-16 -intro-x"
                        src="{{ asset('templates/admin/dist/images/illustration.svg') }}">
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="flex h-screen py-5 my-10 xl:h-auto xl:py-0 xl:my-0">
                <div
                    class="w-full px-5 py-8 mx-auto my-auto bg-white rounded-md shadow-md xl:ml-20 dark:bg-darkmode-600 xl:bg-transparent sm:px-8 xl:p-0 xl:shadow-none sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="text-2xl font-bold text-center intro-x xl:text-3xl xl:text-left">
                        {{ __('messages.web.auth.login') }}
                    </h2>
                    <form action="{{ route('admin.user.authenticate') }}" class="" novalidate="true"
                        method="POST">
                        {{ csrf_field() }}
                        <div class="mt-8 intro-x">
                            @include('components.form.input.type1', [
                                'name' => 'email',
                                'type' => 'email',
                                'class' => 'intro-x login__input form-control py-3 px-4 block',
                                'placeholder' => 'example@gmail.com',
                                'required' => true,
                            ])
                            @include('components.form.input.type1', [
                                'name' => 'password',
                                'type' => 'password',
                                'class' => 'intro-x login__input form-control py-3 px-4 block mt-4',
                                'placeholder' => '******',
                                'required' => true,
                            ])
                        </div>
                        <div class="mt-5 text-center intro-x xl:mt-8 xl:text-left">
                            <button type="submit"
                                class="w-full px-4 py-3 align-top btn btn-primary xl:w-32 xl:mr-3">{{ __('messages.web.auth.login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <div
        class="fixed bottom-0 right-0 z-50 flex items-center justify-center w-40 h-12 mb-10 mr-10 border rounded-full shadow-md cursor-pointer dark-mode-switcher box dark:bg-dark-2">
        <div class="mr-4 text-gray-700 dark:text-gray-300 dark-mode"><i data-lucide="moon"></i></div>
        <div
            class="dark-mode-switcher__toggle border {{ $_COOKIE['mode'] == 'dark' ? 'dark-mode-switcher__toggle--active' : '' }}">
        </div>
    </div>
    <!-- END: Dark Mode Switcher-->
    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('templates/admin/dist/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    @include('components.scripts.common')
    @yield('addjs')
    @if (session('success') || session('error'))
        @include('components.toastr.index')
    @endif
    <!-- END: JS Assets-->
</body>

</html>
