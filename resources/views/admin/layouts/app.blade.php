<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    @if(!empty($title))
        <title>{{ $title }}</title>
    @else
        <title></title>
    @endif
    <link rel="icon" href="{{ asset(get_path('favicon.png')) }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <!-- Include stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/Trumbowyg/dist/ui/trumbowyg.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/ext-component-toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
</head>

<body>
<div class="main-wrapper">
    <!-- Header include -->
    @include('admin.layouts.header')
    <!-- Sidebar include -->
    @include('admin.layouts.sidebar')

    <div class="page-wrapper">
        <div class="content container-fluid">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
<!-- Include trumbowyg -->
<script src="{{ asset('assets/plugins/Trumbowyg/dist/trumbowyg.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script type="text/javascript">
    @if(Session::has('success'))
        toastr.options = {
        "closeButton" : true,
        "progressBar" : true,
    }
    toastr.success('{{ session('success') }}', 'Congratulations!!!');
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.options = {
        "closeButton" : true,
        "progressBar" : true}
        toastr.error('{{ session('error') }}', 'Ooops!!!');
        @endforeach
    @endif

    $('.editor').trumbowyg({
        lang: 'bn',
    });

    $('#tags').tagsinput({
        allowDuplicates: true
    });
</script>
</body>
</html>
