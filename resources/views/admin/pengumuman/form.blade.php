<div class="form-body">
    <div class="form-group form-md-line-input">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="judul" id="form_control_1" value="{{ @$pengumuman->judul }}">
        <label for="form_control_1">Judul</label>
    </div>
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control datepicker"
               data-date-format="yyyy-mm-dd" id="form_control_1" name="tanggal" value="{{ @$pengumuman->tanggal }}">
        <label for="form_control_1">Tanggal</label>
    </div>
    <div class="form-group form-md-line-input">
                                                            <textarea id="form_control_1" class="form-control"
                                                                      rows="3" name="pengumuman">{{ @$pengumuman->pengumuman }}</textarea>
        <label for="form_control_1">Pengumuman</label>
    </div>
    @if(Route::is('pengumuman.edit'))
        <div class="form-group form-md-line-input">
            <select class="form-control edited" name="edit_status" id="edit_status">
                <option disabled selected>Status</option>
                <option {{ $pengumuman->status == 'Active' ? 'selected': '' }} value="Active">Active</option>
                <option {{ $pengumuman->status == 'Inactive' ? 'selected': '' }} value="Inactive">Inactive</option>
            </select>
            <label for="edit_status">Status Pengumuman</label>
        </div>
    @endif

</div>