<div class="form-body">
    <div class="form-group form-md-line-input">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="nama" id="form_control_1" value="{{ @$room_categories->nama }}">
        <label for="form_control_1">Nama Tipe</label>
    </div>
    <div class="form-group form-md-line-input">
        <textarea id="form_control_1" class="form-control" rows="3"
                  name="deskripsi">{{ @$room_categories->deskripsi }}</textarea>
        <label for="form_control_1">Deskripsi</label>
    </div>
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
               id="form_control_1" name="harga" value="{{ @$room_categories->harga }}">
        <label for="form_control_1">Harga</label>
    </div>

    <div class="form-group form-md-checkboxes">
        <label>Fasilitas</label>
        <div class="md-checkbox-inline">
            @foreach($fasilitas as $item)
                <div class="md-checkbox">
                    <input type="checkbox" id="checkbox{{ $loop->iteration }}" class="md-check" value="{{ $item->id }}" name="fasilitas[]" {{ isset($fasilitas_ruangan[$item->id]) ? 'checked' : '' }}>
                    <label for="checkbox{{ $loop->iteration }}">
                        <span class="inc"></span>
                        <span class="check"></span>
                        <span class="box"></span> {{ $item->fasilitas }} </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
            <img src="{{ asset(@$room_categories->gambar) }}" alt="" onerror="this.onerror=null;this.src='{{ asset('admin-assets/img/default.jpg') }}';"></div>
        <div class="fileinput-preview fileinput-exists thumbnail"
             style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
        <div>
            <span class="btn default btn-file">
                <span class="fileinput-new"> Select image </span>
                <span class="fileinput-exists"> Change </span>
                <input type="hidden" value="{{ @$room_categories->gambar }}" name="old_gambar"><input type="file" name="gambar" value="">
            </span>
            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
        </div>
    </div>

</div>