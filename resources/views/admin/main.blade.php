<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include any CSS files or stylesheets needed for your layout -->
    
    @include('admin.includes.header')

    <!-- Yield section for additional styles from child views -->
    @yield('style')
</head>
<body>
   
    <div class="container-scroller">
        @include('admin.includes.nav')

        <div class="container-fluid page-body-wrapper">
            @include('admin.includes.sidenav')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                @include('admin.includes.footer')
            </div>
        </div>
    </div>

    <!-- Include any JavaScript files or scripts needed for your layout -->
    
    @yield('script') <!-- Yield section for additional scripts from child views -->
</body>
</html>
