<!DOCTYPE html>
<html lang="en">

<head>
    @include('\includes\head')
</head>

<body>
    <div class="container-fluid">

        <header class="row">
            @include('\includes\header')
        </header>

        <div id="main" class="row">
            @yield('content')
        </div>

        <footer class="row">
            @include('\includes.footer')
        </footer>

    </div>
    @include('\includes.scripts')
</body>

</html>
