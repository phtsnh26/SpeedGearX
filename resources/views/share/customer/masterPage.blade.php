<!doctype html>
<html lang="en">

<head>
    @include('share.customer.css')
</head>

<body>
    <!-- Start header area -->
    @include('share.customer.menu')
    <!-- End header area -->

    {{-- Start content --}}
    <main class="main__content_wrapper">
        @yield('content')
    </main>
    {{-- End content --}}

    <!-- Start footer section -->
    @include('share.customer.footer')
    <!-- End footer section -->

    {{-- Start Scrpit --}}
    @include('share.customer.js')
    @yield('js')
    {{-- End Scrpit  --}}

</body>

</html>
