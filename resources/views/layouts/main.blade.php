<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @yield('heads')
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        @include('partials.sidebar')
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">

            <!-- Navbar -->
            @yield('navbar')
            {{-- @include('partials.alert') --}}
            @yield('content')
            {{-- @include('partials.notification') --}}
            {{-- @include('partials.footer') --}}
        </div>
    </main>

    <!--   Core JS Files   -->
    @include('partials.js')
    @yield('scripts')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    {{-- @include('partials.setting') --}}
</body>

</html>
