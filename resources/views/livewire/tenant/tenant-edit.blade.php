<div>

    <a href="javascript:void(0)" id="modal-tenant-edit-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-tenant-edit" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-tenant-edit" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent="update" class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Tenant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('tenant.name') is-invalid @enderror "
                            wire:model.defer="tenant.name" placeholder="Full name">
                        @error('tenant.name')
                            <span class="invalid-feedback">{{ $errors->first('tenant.name') }}</span>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="form-group col-6 mb-3">
                            <label class="form-label">Id Type</label>
                            <input type="text" class="form-control @error('tenant.id_type') is-invalid @enderror "
                                wire:model.defer="tenant.id_type" list="idTypesOptions" placeholder="">
                                <datalist id="idTypesOptions">
                                    @foreach ($idTypes as $type)
                                    <option value="{{$type}}"></option>
                                    @endforeach
                                </option></datalist>
                            @error('tenant.id_type')
                                <span class="invalid-feedback">{{ $errors->first('tenant.id_type') }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label class="form-label">ID Number</label>
                            <input type="text" class="form-control @error('tenant.id_number') is-invalid @enderror "
                                wire:model.defer="tenant.id_number" placeholder="">
                            @error('tenant.id_number')
                                <span class="invalid-feedback">{{ $errors->first('tenant.id_number') }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 mb-3">
                            <label class="form-label">Citizenship</label>
                            <input type="text" class="form-control @error('tenant.citizenship') is-invalid @enderror "
                                wire:model.defer="tenant.citizenship" placeholder="">
                            @error('tenant.citizenship')
                                <span class="invalid-feedback">{{ $errors->first('tenant.citizenship') }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-6 @error('tenant.relocation_type') is-invalid @enderror">
                            <div wire:ignore>
                                <label class="form-label">Relocation Type</label>
                                <div id="selectize-tenant-relocation_type_edit-wrapper">
                                </div>
                                <script>
                                    function selectizeTenantRelocationTypeEdit() {

                                        $("#selectize-tenant-relocation_type_edit-wrapper").empty();

                                        $('<select id="selectize-tenant-relocation_type_edit" class="form-control"></select>')
                                            .appendTo('#selectize-tenant-relocation_type_edit-wrapper');

                                        $("#selectize-tenant-relocation_type_edit")
                                            .append(`<option selected disabled></option>`);

                                        @this.relocationTypes.forEach(element => {
                                            $("#selectize-tenant-relocation_type_edit")
                                            .append(
                                                `<option ${@this.tenant.relocation_type == element ? 'selected' : ''} value="${element}">${element}</option>`
                                                );
                                        });

                                        $('#selectize-tenant-relocation_type_edit').selectize({
                                            persist: true
                                        });

                                        $('#selectize-tenant-relocation_type_edit').on('change', () => {
                                            let val = $('#selectize-tenant-relocation_type_edit')
                                                .val();
                                            @this.set('tenant.relocation_type', val);
                                        });

                                    }

                                </script>
                            </div>
                            @error('tenant.relocation_type')
                                <span class="small text-danger">{{ $errors->first('tenant.relocation_type') }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-body">

                   <div class="row">

                    <div class="form-group col-lg-6 mb-3">
                        <label class="form-label">Income</label>
                        <input type="text" class="form-control @error('tenant.income') is-invalid @enderror "
                            wire:model.defer="tenant.income" placeholder="">
                        @error('tenant.income')
                            <span class="invalid-feedback">{{ $errors->first('tenant.income') }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label class="form-label">Deposit</label>
                        <input type="text" class="form-control @error('tenant.deposit') is-invalid @enderror "
                            wire:model.defer="tenant.deposit" placeholder="">
                        @error('tenant.deposit')
                            <span class="invalid-feedback">{{ $errors->first('tenant.deposit') }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label class="form-label">Rent</label>
                        <input type="text" class="form-control @error('tenant.rent') is-invalid @enderror "
                            wire:model.defer="tenant.rent" placeholder="">
                        @error('tenant.rent')
                            <span class="invalid-feedback">{{ $errors->first('tenant.rent') }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label class="form-label">Total Occuppants</label>
                        <input type="text" class="form-control @error('tenant.total_occupants') is-invalid @enderror "
                            wire:model.defer="tenant.total_occupants" placeholder="">
                        @error('tenant.total_occupants')
                            <span class="invalid-feedback">{{ $errors->first('tenant.total_occupants') }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label class="form-label">Allotted Units</label>
                        <input type="text" class="form-control @error('tenant.allotted_units') is-invalid @enderror "
                            wire:model.defer="tenant.allotted_units" placeholder="">
                        @error('tenant.allotted_units')
                            <span class="invalid-feedback">{{ $errors->first('tenant.allotted_units') }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label class="form-label">Allotted Bedroom Size</label>
                        <input type="text" class="form-control @error('tenant.allotted_bedroom_size') is-invalid @enderror "
                            wire:model.defer="tenant.allotted_bedroom_size" placeholder="">
                        @error('tenant.allotted_bedroom_size')
                            <span class="invalid-feedback">{{ $errors->first('tenant.allotted_bedroom_size') }}</span>
                        @enderror
                    </div>
                   </div>
                </div>
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('tenant.email') is-invalid @enderror "
                            wire:model.defer="tenant.email" placeholder="example@email.com">
                        @error('tenant.email')
                            <span class="invalid-feedback">{{ $errors->first('tenant.email') }}</span>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Work Phone</label>
                                <input type="text"
                                    class="form-control @error('tenant.work_phone') is-invalid @enderror "
                                    wire:model.defer="tenant.work_phone" placeholder="With area code">
                                @error('tenant.work_phone')
                                    <span class="invalid-feedback">{{ $errors->first('tenant.work_phone') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text"
                                    class="form-control @error('tenant.mobile_number') is-invalid @enderror "
                                    wire:model.defer="tenant.mobile_number" placeholder="With country code">
                                @error('tenant.mobile_number')
                                    <span class="invalid-feedback">{{ $errors->first('tenant.mobile_number') }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control @error('tenant.address') is-invalid @enderror "
                            wire:model.defer="tenant.address" placeholder="Street address">
                        @error('tenant.address')
                            <span class="invalid-feedback">{{ $errors->first('tenant.address') }}</span>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control @error('tenant.city') is-invalid @enderror "
                                    wire:model.defer="tenant.city" placeholder="">
                                @error('tenant.city')
                                    <span class="invalid-feedback">{{ $errors->first('tenant.city') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control @error('tenant.state') is-invalid @enderror "
                                    wire:model.defer="tenant.state" placeholder="">
                                @error('tenant.state')
                                    <span class="invalid-feedback">{{ $errors->first('tenant.state') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control @error('tenant.country') is-invalid @enderror "
                                    wire:model.defer="tenant.country" placeholder="">
                                @error('tenant.country')
                                    <span class="invalid-feedback">{{ $errors->first('tenant.country') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                <label class="form-label">Zipcode</label>
                                <input type="text" class="form-control @error('tenant.zipcode') is-invalid @enderror "
                                    wire:model.defer="tenant.zipcode" placeholder="">
                                @error('tenant.zipcode')
                                    <span class="invalid-feedback">{{ $errors->first('tenant.zipcode') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>


                <div class="modal-footer">

                    <button type="button" id="modal-tenant-edit-dismiss" class="btn btn-link link-secondary"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary ms-auto">
                        <div class="spinner-border spinner-border-sm me-2" role="status" wire:loading.delay
                            wire:target='update'></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('#modal-tenant-edit').modal({backdrop:'static', keyboard:false});
            window.livewire.on('showTenantEditForm', function() {
                selectizeTenantRelocationTypeEdit();
                document.getElementById('modal-tenant-edit-open').click();
            });
            window.livewire.on('closeTenantEditForm', function() {
                document.getElementById('modal-tenant-edit-dismiss').click();
            });
        });

    </script>
</div>
