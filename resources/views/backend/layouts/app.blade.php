@include('backend.layouts.header')
<div class="page-wrapper-row full-height">
    <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                @yield('heading')
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="@yield('container-class','container')">
                    <!-- BEGIN PAGE CONTENT INNER -->
                        @yield('content')
                    <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
    </div>
</div>
@include('backend.layouts.footer')