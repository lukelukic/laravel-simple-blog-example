<!-- Jquery Core Js -->
<script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset("admin/plugins/bootstrap/js/bootstrap.min.js") }}"></script>

<!-- Select Plugin Js -->
<script src="{{ asset("admin/plugins/bootstrap-select/js/bootstrap-select.min.js") }}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{ asset("admin/plugins/jquery-slimscroll/jquery.slimscroll.js") }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset("admin/plugins/node-waves/waves.min.js") }}"></script>

<!-- Custom Js -->
<script src="{{ asset("admin/js/admin.js") }}"></script>

<!-- Demo Js -->
<script src="{{ asset("admin/js/demo.js") }}"></script>

<script src="{{ asset("js/toastr.js") }}"></script>

@yield("scripts")

<script>
    @if(Session::has('error'))
    toastr.error("{{ Session::get("error") }}")
    @endif

    @if(Session::has('success'))
    toastr.success("{{ Session::get("success") }}")
    @endif

    @if($errors->any())
    @foreach($errors->all() as $err)
    toastr.info("{{ $err }}");
    @endforeach
    @endif
</script>