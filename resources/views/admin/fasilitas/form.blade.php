<div class="form-body">
    {{ csrf_field() }}
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
               id="form_control_1" name="fasilitas" value="{{ @$fasilitas->fasilitas }}">
        <label for="form_control_1">Fasilitas</label>
    </div>

</div>