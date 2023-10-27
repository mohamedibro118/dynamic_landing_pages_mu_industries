<!DOCTYPE html>
<html lang="en">

<head>
    @stack('links')

</head>

<body>
    <div>
        {{ $slot }}
    </div>
    @stack('scripts')
    @stack('sscripts')
</body>

</html>
