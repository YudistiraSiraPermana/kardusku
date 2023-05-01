<!DOCTYPE html>
<html lang="en">

<head>
    {{-- style --}}
    @stack('before-style')
    @include('components.style')
    @stack('after-style')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            {{-- Alert --}}
            @include('sweetalert::alert')

            {{-- sidebar --}}
            @include('components.navbar')

            {{-- navbar --}}
            @include('components.sidebar')

            <!-- page content -->
            <div class="right_col" role="main">
                @stack('before-content')
                @yield('content')
                @stack('after-content')
            </div>
            <!-- /page content -->
        </div>
        <!-- footer content -->
        <footer class="container-fluid py-2 text-white d-flex align-items-center" style="background-color:#778899">
            <span class="mx-auto">
                <strong>Copyright &copy; 2023 <a href="#">TIM Auto 2000</a>.</strong>
            </span>
        </footer>
        <!-- /footer content -->
    </div>

    {{-- script --}}
    @stack('prepend-script')
    @include('components.script')
    @stack('addon-script')
</body>

</html>