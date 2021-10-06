<div class="modal fade" id="fieldModalProperties" tabindex="-1" role="dialog" aria-labelledby="fieldModalProperties" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" style="max-width: 35%" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="fieldModalProperties">Create Field</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body card-body-form">
      	<div class="row">
            <div class="col-lg-12">
                <div class="form-group focused">
                    <label class="form-control-label" for="field-name">Field Name <small class="text-danger">*</small></label>
                    <input type="text" name="field-name" id="field-name" class="form-control " placeholder="Field Name">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group focused">
                    <label class="form-control-label" for="field-type">Field Type <small class="text-danger">*</small></label>
                    <select class="form-control" id="field-type">
                    	@foreach($fieldTypes as $fieldtype)
                    		<option value="{{ $fieldtype['type'] }}" validations="{{ json_encode($fieldtype['validations']) }}">{{ ucfirst($fieldtype['type']) }}</option>
                    	@endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group focused">
                    <label class="form-control-label" for="field-validation">Validation</label>
                    <select class="form-control" id="field-validation">
                      <option value="">No Validation</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12" id="field-options-outer-container" style="display: none;">
                <div class="form-group focused">
                    <label class="form-control-label" for="field-type">Options <small class="text-danger">*</small></label>
                    <ul id="field-options-inner-container" style="padding: 0px">
                      
                    </ul>
                </div>

                <ul>
                  <li class="row mb-3" id="field-options-container-template" style="display: none;">
                    <div class="col-lg-8">
                      <input type="text" name="options[]" class="form-control options" placeholder="">
                    </div>
                    <div class="col-lg-4">
                      <a class="btn btn-sm btn-primary drag-options text-white"><i class="fas fa-bars"></i></a>
                      <a class="btn btn-sm btn-info add-option text-white"><i class="fas fa-plus"></i></a>
                      <a class="btn btn-sm btn-danger remove-option text-white"><i class="fas fa-minus"></i></a>
                    </div>
                  </li>
                </ul>
                
            </div>
            <div class="col-lg-12" style="display: none;" id="field-form-list-options-outer-container">
                <div class="form-group focused">
                    <label class="form-control-label" for="field-notes">List of Options</label>
                    <textarea name="field-notes" id="form-list-options" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-lg-12" id="field-form-list-options-outer-container">
                <div class="form-group focused">
                    <label class="form-control-label" for="field-notes">Notes</label>
                    <textarea name="field-notes" id="field-notes" class="form-control"></textarea>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer card-body-form">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="save-field">Save</button>
      </div>
    </div>
  </div>
</div>