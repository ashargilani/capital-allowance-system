<!DOCTYPE html>
<html>
    @include('admin.layout.main_partials.header')
</html>
<body>
    @include('admin.layout.main_partials.nav')
    <div id="wrapper">
        {{--Sidebar wrapper--}}
        @include('admin.layout.main_partials.sidebar')
        <!-- Page Content Wrapper-->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    @yield('page-content')
                </div>
            </div>
        <!-- End Page Content Wrapper-->
    </div>
</body>
<script>
    $(document).ready(function () {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    });
</script>
