<div class="form-body">
    {{ csrf_field() }}
    <div class="form-group form-md-line-input">
        <input type="text" class="form-control"
               id="form_control_1" name="text" value="{{ @$banner->text }}">
        <label for="form_control_1">Text</label>
    </div>
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
            <img src="{{ asset(@$banner->gambar) }}" alt=""></div>
        <div class="fileinput-preview fileinput-exists thumbnail"
             style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
        <div>
            <span class="btn default btn-file">
                <span class="fileinput-new"> Select image </span>
                <span class="fileinput-exists"> Change </span>
                <input type="hidden" value="{{ @$banner->gambar }}" name="old_gambar"><input type="file" name="gambar" value="">
            </span>
            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
        </div>
    </div>

</div>