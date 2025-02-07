@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layout.navbar')
            @include('layout.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            @include('layout.footer')
        </div>
    </div>

    @include('layout.script')
</body>

</html>
