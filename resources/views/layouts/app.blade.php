<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rikel | Property Management System</title>
    @include('partials.global-scripts')
</head>

<body>
    <div class="page">
        @include('partials.app-header', ['user' => Auth::user()])
        @include('partials.app-nav')
        <div class="content">
            {{ $slot }}
            @include('partials.app-footer')
        </div>
    </div>
</body>

</html>
