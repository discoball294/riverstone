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
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
               id="form_control_1" name="max_person" value="{{ @$room_categories->max_person }}">
        <label for="form_control_1">Max Person</label>
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
    <div class="form-group">
        <input type="file" id="input_gambar" name="gambar[]" multiple>
    </div>

</div>