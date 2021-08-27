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

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>

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
                    <div class="viewport-header">
                        @if(isset($breadcrumb))
                            {{$breadcrumb}}
                        @endif
                    </div>
                    <div class="content-viewport">
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

        <!--page body ends -->
        <!-- SCRIPT LOADING START FORM HERE /////////////-->
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script type="text/javascript" src="http://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}

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
