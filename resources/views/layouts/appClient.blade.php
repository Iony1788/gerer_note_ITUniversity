<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash client</title>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href={{asset('asset/css/bootstrap.min.css')}}>
  <link rel="stylesheet" href={{asset('asset/fontawesome-free-6.5.2-web/css/all.min.css')}}>
  <link rel="stylesheet" href={{asset('asset/fontawesome-free-6.5.2-web/css/all.min.css')}}>
  @yield('style')
</head>

<body>

    <!-- ======= Header ======= -->
        @include('partials.header')
    <!-- End Header -->


    <!-- ======= Sidebar ======= -->
        @include('partials.sidebarClient')
    <!-- End Sidebar-->

    <div class="main">
            @yield('content_client')
    </div>



  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
</body>

</html>
