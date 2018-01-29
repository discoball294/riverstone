@extends('admin.layouts.master')
@section('title')
    <title>Reservasi - Riverstone - Hotel & cottage - Admin Page</title>
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
        <h1 class="page-title"> Reservasi
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
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Reservasi</span>
            </li>
        </ul>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption">
                            <i class="icon-share font-dark"></i>
                            <span class="caption-subject font-dark bold uppercase">List Reservasi</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#portlet_tab3" data-toggle="tab" > Completed </a>
                            </li>
                            <li>
                                <a href="#portlet_tab2" data-toggle="tab" > Expired </a>
                            </li>
                            <li class="active">
                                <a href="#portlet_tab1" data-toggle="tab" > New Reservation </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="portlet_tab1">
                                <div class="table-scrollable table-scrollable-borderless">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="reservasi_table_new">
                                        <thead>
                                        <tr>
                                            <th> Booking ID# </th>
                                            <th> Guest </th>
                                            <th> Booking Created </th>
                                            <th> Payment Status </th>
                                            <th> Actions </th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="portlet_tab2">
                                <div class="table-scrollable table-scrollable-borderless">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="reservasi_table_exp">
                                        <thead>
                                        <tr>
                                            <th> Booking ID# </th>
                                            <th> Guest </th>
                                            <th> Booking Created </th>
                                            <th> Payment Status </th>
                                            <th> Actions </th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="portlet_tab3">
                                <div class="table-scrollable table-scrollable-borderless">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="reservasi_table_complete">
                                        <thead>
                                        <tr>
                                            <th> Booking ID# </th>
                                            <th> Guest </th>
                                            <th> Booking Created </th>
                                            <th> Payment Status </th>
                                            <th> Actions </th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <!-- END BORDERED TABLE PORTLET-->
            </div>

        </div>
    </div>
    <div class="modal fade" id="edit-pengumuman" tabindex="-1" role="edit-pengumuman" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Pengumuman</h4>
                </div>
                <form id="form-edit" role="form" method="post">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input type="text" class="form-control" name="edit_judul" id="edit_judul">
                                <label for="edit_judul">Judul</label>
                            </div>
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control datepicker"
                                       data-date-format="yyyy-mm-dd" id="edit_tanggal" name="edit_tanggal">
                                <label for="edit_tanggal">Tanggal</label>
                            </div>
                            <div class="form-group form-md-line-input">
                                                            <textarea id="edit_pengumuman" class="form-control"
                                                                      rows="3" name="edit_pengumuman"></textarea>
                                <label for="edit_pengumuman">Pengumuman</label>
                            </div>
                            <div class="form-group form-md-line-input form-md-floating-label has-info">
                                <select class="form-control edited" name="edit_status" id="edit_status">
                                    <option disabled selected>Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <label for="edit_status">Status Pengumuman</label>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline"
                                data-dismiss="modal">Close
                        </button>
                        <button id="btn-edit" type="submit" class="btn green">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('plugins_js')
    <script src="{{ asset('admin-assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
            type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"
            type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"
            type="text/javascript"></script>
    <script>

        $(document).ready(function (e) {
            $('#reservasi_table_new').DataTable({
                pagingType: "full_numbers",
                paging: true,
                pageLength: 25,
                order: [[ 2, "desc" ]],
                processing: true,
                serverSide: true,
                ajax: '{{ route('dt-reservasi',0) }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nama', name: 'nama'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            $('#reservasi_table_exp').css('width', '100%').DataTable({
                pagingType: "full_numbers",
                paging: true,
                pageLength: 25,
                order: [[ 2, "desc" ]],
                processing: true,
                serverSide: true,
                ajax: '{{ route('dt-reservasi',2) }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nama', name: 'nama'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            $('#reservasi_table_complete').css('width', '100%').DataTable({
                pagingType: "full_numbers",
                paging: true,
                pageLength: 25,
                order: [[ 2, "desc" ]],
                processing: true,
                serverSide: true,
                ajax: '{{ route('dt-reservasi',1) }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nama', name: 'nama'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
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
            $('.delete').submit(function (e) {
                var form = this;
                e.preventDefault();
                swal({
                        title: "Apakah anda yakin akan membatalkan pemesanan ini?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Ya!",
                        cancelButtonText: "Tidak!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            form.submit();
                        } else {
                        }
                    });
            })
        })
    </script>
@endsection