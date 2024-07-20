{{--<!-- Core JS files -->--}}
<script src="{{ asset('assets/admin/demo/demo_configurator.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
{{--<!-- /core JS files -->--}}

{{--<!-- Theme JS files -->--}}
<script src="{{ asset('assets/admin/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/noty/noty.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/notifications/sweet_alert.min.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('assets/admin/js/money/simple.money.format.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/ui/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/pickers/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script src="{{ asset('assets/admin/js/init.js') }}"></script>
{{--<!-- /theme JS files -->--}}

{{--<!-- JS custom -->--}}
@yield('script_custom')
{{--<!-- /JS custom  -->--}}
