    <div class="page-wrapper-row">
        <div class="page-wrapper-bottom">
            <!-- BEGIN INNER FOOTER -->
            <div class="page-footer">
                <div class="container-fluid"> {{ date('Y')}} &copy; Bihe Ghar Admin Portal
                    <a href="#" title="Lamputer Web Design and Development." target="_blank"> by <b>theSudin</b></a>
                </div>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
    </div>
</div>
@yield('models')
<!-- END INNER FOOTER -->
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="{{ asset('/admin/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{ asset('/admin/assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset("/admin/assets/global/plugins/jquery.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/js.cookie.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}" type="text/javascript"></script>
{{--
<script src="{{ asset("/admin/assets/global/plugins/jquery.blockui.min.js") }}" type="text/javascript"></script>
--}}
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") }}" type="text/javascript"></script>

    <script src="{{ asset("/admin/assets/global/plugins/moment.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootbox/bootbox.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/select2/js/select2.full.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-toastr/toastr.min.js") }}" type="text/javascript"></script>

<script src="{{ asset("/admin/assets/pages/scripts/ui-toastr.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/global/plugins/jquery.sparkline.min.js") }}" type="text/javascript"></script>

    @stack('scripts')
<script src="{{ asset("/admin/assets/global/scripts/app.min.js") }}" type="text/javascript"></script>
    <script src="{{  asset("/admin/assets/layouts/layout3/scripts/layout.min.js") }}" type="text/javascript"></script>

    <script src="{{ asset("/admin/assets/pages/scripts/profile.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/admin/assets/layouts/layout3/scripts/layout.min.js") }}" type="text/javascript"></script>


@if (session('success'))
    <script>
        var success_message = "{{ session('success') }}";
        toastr.success(success_message, "Success!!")
    </script>
@endif
@if (session('status'))
    <script>
        var success_message = "{{ session('status') }}";
        toastr.success(success_message, "Success!!")
    </script>
@endif
@if (session('warning'))
    <script>
        var success_message = "{{ session('warning') }}";
        toastr.warning(success_message, "Warning!!")
    </script>
@endif
<script>
    $(document).ready(function(){
        $('.select').select2();
        $("a, button").tooltip();

        window.oncontextmenu = null;
        $('.delete-btn').click(function (e) {
            e.preventDefault();
            var form = $(this).closest('.delete-form');
            bootbox.dialog({
                message: "Click <strong>Delete</strong> to confirm or <strong>Cancel</strong> to go back wher you came form.",
                title: "Are you sure you want to delete?",
                buttons: {
                    success: {
                        className: 'btn btn-success',
                        label: '<i class="fa fa-trash-o"></i> Delete',
                        callback: function () {
                            form.submit();
                        }
                    },
                    cancel: {
                        className: 'btn btn-danger',
                        label: 'Cancel'
                    }
                }
            });
        });

        {{--for (var i = 1; i < 80; i++) {--}}
            {{--setTimeout(function(){--}}
                {{--console.log('starting import...');--}}
                {{--$.ajax({--}}
                    {{--url: "{{ route('settings.import') }}",--}}
                    {{--method: "GET",--}}
                    {{--success: function(resoponse) {--}}
                        {{--console.log('total import so far: ' + resoponse);--}}
                    {{--}--}}
                {{--});--}}
            {{--}, 60000);--}}
        {{--}--}}

    });

</script>

</body>
</html>