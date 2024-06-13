<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
@include('admin.includes.header')
<div class="container-scroller">
@include('admin.includes.nav')

<div class="container-fluid page-body-wrapper">
    @include('admin.includes.sidenav')
    
    
        @yield('content')
    

    @include('admin.includes.footer')
    </div>
    </div>
    @yield('script')
</body>
</html>