<div class="form-body">
    {{ csrf_field() }}
    <div class="form-group form-md-line-input form-md-floating-label has-info">
        <select class="form-control edited" name="tipe_contact_id" id="form_control_1">
            <option value="" selected disabled>Silahkan pilih</option>
            @foreach($tipe_contact as $item)
                <option {{ @$contact->tipe_contact_id == $item->id ? 'selected': '' }} value="{{ $item->id }}">{{ $item->tipe }}</option>
            @endforeach
        </select>
        <label for="form_control_1">Tipe Contact</label>
    </div>
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
               id="form_control_1" name="content" value="{{ @$contact->content }}">
        <label for="form_control_1">Content</label>
    </div>

</div>