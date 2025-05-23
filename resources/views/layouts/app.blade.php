<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('layouts.header')

        @include('layouts.sidebar')

        <main class="app-main">
            @yield('content')
        </main>

        @include('layouts.footer')

        @include('layouts.scripts')
    </div>
</body>

</html>
