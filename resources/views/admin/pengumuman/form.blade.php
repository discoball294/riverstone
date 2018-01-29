<div class="form-body">
    <div class="form-group form-md-line-input">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="judul" id="form_control_1" value="{{ @$pengumuman->judul }}">
        <label for="form_control_1">Judul</label>
    </div>
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
                id="form_control_1" name="tanggal" value="{{ @$pengumuman->tanggal }}" placeholder="ex: 5">
        <label for="form_control_1">Berlaku selama</label>
    </div>
    <div class="form-group form-md-line-input">
                                                            <textarea id="form_control_1" class="form-control"
                                                                      rows="3" name="pengumuman">{{ @$pengumuman->pengumuman }}</textarea>
        <label for="form_control_1">Pengumuman</label>
    </div>


</div>