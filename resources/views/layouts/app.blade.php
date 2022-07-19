<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/browsers/chrome.png') }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Zabta | @yield('title-page')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
    @include('includes.style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- Navbar --}}
            @include('includes.navbar')

            {{-- Sidebar --}}
            @include('includes.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title-page')</h1>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>

            @include('includes.footer')

        </div>
    </div>

    @include('includes.script')
    @stack('scripts')
</body>

</html>
