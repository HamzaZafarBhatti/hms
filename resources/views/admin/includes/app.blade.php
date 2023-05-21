<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.includes.styles')
    <style>
        .page-link,
        .page-item.disabled .page-link {
            background-color: #191c24;
            border-color: #2c2e33;
        }

        .page-link {
            color: #5f7293;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.includes.sidebar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.includes.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('admin.alert')
                    @yield('content')
                    <!-- main-panel ends -->
                </div>
                @include('admin.includes.footer')
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.includes.scripts')
</body>

</html>
