<div class="form-body">
    {{ csrf_field() }}
    <div class="form-group form-md-line-input form-md-floating-label has-info">
        <select class="form-control edited" name="room_category" id="form_control_1">
            <option value="" selected disabled>Silahkan pilih</option>
            @foreach($room_category as $kategori)
                <option {{ @$rooms->room_category_id == $kategori->id ? 'selected': '' }} value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
        <label for="form_control_1">Tipe Kamar</label>
    </div>


</div>