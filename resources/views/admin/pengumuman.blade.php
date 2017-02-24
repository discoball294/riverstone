@extends('admin.layouts.master')
@section('title')
    <title>Pengumuman - Riverstone - Hotel & cottage - Admin Page</title>
@endsection
@section('plugins_css')
    <link href="{{ asset('admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet"
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
        <h1 class="page-title"> Pengumuman
            <small></small>
        </h1>
        @foreach(['danger','success','warning','info'] as $msg)
            @if(Session::has('alert-'.$msg))
                <div class="custom-alerts alert alert-{{ $msg }} fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>{{ Session::get('alert-'.$msg) }}</div>
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
                    <a href="#">Pengumuman</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <div class="portlet light portlet-fit ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-info font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">List Pengumuman</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <a href="#tambah-pengumuman" data-toggle="modal"
                                   class="btn btn-circle btn-outline green-seagreen"><i class="fa fa-plus"></i>
                                    Tambah</a>
                                <div class="modal fade" id="tambah-pengumuman" tabindex="-1" role="tambah-pengumuman" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                <h4 class="modal-title">Tambah Pengumuman</h4>
                                            </div>
                                            <form id="form-tambah" role="form" method="post" action="{{ route('admin.add.pengumuman') }}">
                                                <div class="modal-body">
                                                    <div class="form-body">
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                            <input type="text" class="form-control" name="judul" id="form_control_1">
                                                            <label for="form_control_1">Judul</label>
                                                        </div>
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <input type="text" class="form-control datepicker"
                                                                   data-date-format="yyyy-mm-dd" id="form_control_1" name="tanggal">
                                                            <label for="form_control_1">Tanggal</label>
                                                        </div>
                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                            <textarea id="form_control_1" class="form-control"
                                                                      rows="3" name="pengumuman"></textarea>
                                                            <label for="form_control_1">Pengumuman</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button id="btn-tambah" type="submit" class="btn green">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                        </div>
                        <ul class="pagination pagination-circle">
                            <li><a href="{{ $pengumumans->url(1) }}">«</a></li>
                            @if($pengumumans->lastPage() > 1)
                                @for($i = 1; $i <= $pengumumans->lastPage(); $i++)
                                    <li><a href="{{ $pengumumans->url($i) }}">{{ $i }}</a></li>
                                @endfor
                            @endif

                            <li><a href="{{ $pengumumans->url($pengumumans->lastPage()) }}">»</a></li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                <tr class="uppercase">
                                    <th> #</th>
                                    <th> Judul</th>
                                    <th> Deskripsi</th>
                                    <th> Start Date</th>
                                    <th> Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pengumumans as $pengumuman)
                                    <tr>
                                        <td id="pengumuman_id">{{ $pengumuman->id }}</td>
                                        <td id="pengumuman_judul"> {{ $pengumuman->judul }}</td>
                                        <td id="pengumuman_isi"> {{ $pengumuman->pengumuman }}</td>
                                        <td id="pengumuman_tanggal"> {{ $pengumuman->tanggal }}</td>
                                        <td>
                                            @if($pengumuman->status == 'Active')
                                                <span class="label label-sm label-success"> {{ $pengumuman->status }} </span>
                                            @else
                                                <span class="label label-sm label-danger"> {{ $pengumuman->status }} </span>
                                            @endif

                                        </td>
                                        <td>
                                            <input type="hidden" id="pengumuman_status" value="{{ $pengumuman->status }}">
                                            <div class="btn-group btn-group-circle">
                                                <a href="#edit-pengumuman" data-toggle="modal" type="button" class="btn btn-outline green btn-sm edit-btn">Edit <i
                                                            class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.delete.pengumuman', ['id' => $pengumuman->id ]) }}" type="button" class="btn btn-outline red btn-sm"><i
                                                            class="fa fa-trash-o"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="portlet-"
                </div>
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
    <script src="{{ asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
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
                var pengumuman_isi = $(this).closest('tr').find('#pengumuman_isi').text();
                var pengumuman_tanggal = $(this).closest('tr').find('#pengumuman_tanggal').text();
                var pengumuman_status = $(this).closest('td').find('#pengumuman_status').val();
                console.log('clicked');
                $('#edit_judul').val(pengumuman_judul);
                $('#edit_pengumuman').val(pengumuman_isi);
                $('#edit_tanggal').val(pengumuman_tanggal);
                $('#edit_status').val(pengumuman_status);
                $('#form-edit').attr('action','/admins/pengumuman/edit/'+pengumuman_id);
            });
            $('#btn-edit').click(function () {
                $('#form-edit').submit();
            })
        })
    </script>
@endsection