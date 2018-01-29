<div class="form-body">
    {{ csrf_field() }}
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
               id="form_control_1" name="promo_code" value="{{ @$contact->content }}">
        <label for="form_control_1">Kode Promo</label>
    </div>
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
               id="form_control_1" name="expires" value="{{ @$contact->content }}">
        <label for="form_control_1">Berlaku (hari)</label>
    </div>
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
               id="form_control_1" name="reward" value="{{ @$contact->content }}">
        <label for="form_control_1">Diskon (%)</label>
    </div>
</div>