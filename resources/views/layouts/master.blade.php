<!doctype html>
<html lang="en">

@include('includes.head')

<body>

<!--Main navbar-->
@include('includes.header')
<!--/Main navbar-->

<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    @include('includes.sidebar')
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Inner content -->
        <div class="content-inner">

            <!-- Page header -->
            @yield('page-header')
            <!-- /page header -->


            <!-- Content area -->
            @yield('page-content')
            <!-- /content area -->


            <!-- Footer -->
            @include('includes.footer')
            <!-- /footer -->
            @yield('verify')
        </div>
        <!-- /inner content -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

@include('includes.script')
</body>
</html>
