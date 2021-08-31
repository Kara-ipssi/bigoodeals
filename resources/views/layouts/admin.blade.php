<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="/assets/vendors/iconfonts/font-awesome/css/font-awesome.css">
        <!-- plugins:css -->
        <link rel="stylesheet" href="/assets/vendors/iconfonts/mdi/css/materialdesignicons.css">
        <link rel="stylesheet" href="/assets/vendors/css/vendor.addons.css">
        <!-- endinject -->
        <!-- vendor css for this page -->
        <link rel="stylesheet" href="/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="/assets/vendors/iconfonts/font-awesome/css/font-awesome.css">

        {{-- Font awesome icon --}}
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!-- End vendor css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="/assets/css/shared/style.css">
        <!-- endinject -->
        <!-- Layout style -->
        <link rel="stylesheet" href="/assets/css/demo_1/style.css">
        <!-- Layout style -->
        <link rel="shortcut icon" href="/asssets/images/favicon.ico" />


        <link rel="stylesheet" href="/css/style.css">

        @if (isset($title))
            {{$title}}
        @else
            <title>BiGooDeal - Panel Administration</title>
        @endif

        {{-- Fonts --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" crossorigin="anonymous" />



        {{-- Styles --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @if (isset($styles))
            {{$styles}}
        @endif

        {{-- Datatable style --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/> --}}

        {{-- Livewire styles --}}
        @livewireStyles

        {{-- Scripts --}}
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body class="header-fixed">
        <!-- partial:partials/_header.html -->
        <!-- Livewire:header -->
        <livewire:header/>

        <div class="page-body">

            <!-- Livewire:side-bar -->
            <livewire:side-bar/>
            <!-- Livewire:right-side-bar -->
            {{--<livewire:right-side-bar/>--}}


            <div class="page-content-wrapper">
                <div class="page-content-wrapper-inner">
                    <div class="content-viewport">
                        @if (session()->has('success'))
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="bg-indigo-600" id="successMessage">
                                <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                                    <div class="flex items-center justify-between flex-wrap">
                                        <div class="w-0 flex-1 flex items-center">
                                            <span class="flex p-2 rounded-lg bg-indigo-800">
                                                <!-- Heroicon name: outline/speakerphone -->
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                                </svg>
                                            </span>
                                            <p class="ml-3 font-medium text-white truncate">
                                                <span class="md:hidden">
                                                    {{ session('success') }}
                                                </span>
                                                <span class="hidden md:inline">
                                                    {{ session('success') }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                                            <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2" id="closeSuccessMessage" wire:click="$emit('closeModal')">
                                                <span class="sr-only">Dismiss</span>
                                                <!-- Heroicon name: outline/x -->
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{ $slot }} {{-- contenu de la page  --}}
                    </div>
                </div>
                <!-- content viewport ends -->
                <!-- Livewire:footer -->
                <livewire:footer/>
            </div>
            <!-- page content ends -->
        </div>


        @stack('modals')

        {{-- Livewire Scripts --}}
        @livewireScripts

        <script>
            Livewire.on('closeModal', ()=>{
                let successMessage = document.getElementById('successMessage');
                console.log(successMessage)
            })
        </script>

        <!--page body ends -->
        <!-- SCRIPT LOADING START FORM HERE /////////////-->
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
        {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

        <!-- plugins:js -->
        <script src="/assets/vendors/js/core.js"></script>
        <script src="/assets/vendors/js/vendor.addons.js"></script>
        <!-- endinject -->
        <!-- Vendor Js For This Page Ends-->
        <script src="/assets/vendors/chartjs/Chart.min.js"></script>
        <!-- Vendor Js For This Page Ends-->
        <!-- build:js -->
        <!-- tinyMCE -->
        <script src="/assets/vendors/tinymce/tinymce.min.js"></script>
        <script src="/assets/js/forms/editors.js"></script>


        <script src="/assets/js/template.js"></script>
        <script src="/assets/js/dashboard.js"></script>
        <!-- endbuild -->


        <script src="/assets/js/forms/form_elements.js"></script>
        <script src="/assets/js/forms/validation.js"></script>
        <script src="/assets/js/notifications.js"></script>

        @if (isset($scripts))
            {{$scripts}}
        @endif
    </body>
</html>
