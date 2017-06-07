@extends('admin.layouts.master')
@section('title')
    <title>Kamar - Riverstone - Hotel & cottage - Admin Page</title>
@endsection
@section('plugins_css')
    <link href="{{ asset('admin-assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <style>
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Kamar
            <small></small>
        </h1>
        @foreach(['danger','success','warning','info'] as $msg)
            @if(Session::has('alert-'.$msg))
                <div class="custom-alerts alert alert-{{ $msg }} fade in">
                    <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true"></button>{{ Session::get('alert-'.$msg) }}</div>
            @endif
        @endforeach
        @if(count($errors) > 0)
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Oops!</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ route('rooms.index') }}">Kamar</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Edit</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-info font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Edit Kamar</span>
                        </div>
                        <div class="actions">

                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form id="form-tambah" role="form" method="post" action="{{ route('rooms.update', $rooms->id) }}">

                            @include('admin.room.form')
                            {{ method_field('PUT') }}
                            <div class="form-actions noborder">
                                <button type="submit" class="btn blue">Simpan</button>
                                <button type="reset" class="btn default">Cancel</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('plugins_js')
    <script src="{{ asset('admin-assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
            type="text/javascript"></script>
    <script>
        $(document).ready(function (e) {
            $('.datepicker').datepicker({
                autoclose: true
            });
            $('#btn-tambah').click(function (e) {
                $('#form-tambah').submit();
            });
            $('.edit-btn').click(function (e) {
                var pengumuman_id = $(this).closest('tr').find('#pengumuman_id').text();
                var pengumuman_judul = $(this).closest('tr').find('#pengumuman_judul').text();
                var pengumuman_tanggal = $(this).closest('tr').find('#pengumuman_tanggal').text();
                var pengumuman_status = $(this).closest('td').find('#pengumuman_status').val();
                console.log('clicked');
                $('#edit_judul').val(pengumuman_judul);
                $('#edit_tanggal').val(pengumuman_tanggal);
                $('#edit_status').val(pengumuman_status);
                $('#form-edit').attr('action', '/admins/pengumuman/edit/' + pengumuman_id);
            });
            $('#btn-edit').click(function () {
                $('#form-edit').submit();
            })
        })
    </script>
@endsection