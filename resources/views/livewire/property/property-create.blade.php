<div>

    <a href="javascript:void(0)" id="modal-property-create-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-property-create" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-property-create" tabindex="-1" aria-hidden="true"
        style="display: none;" wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent="store" class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">New Property</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('property.name') is-invalid @enderror "
                            wire:model.defer="property.name" placeholder="Full name">
                        @error('property.name')
                            <span class="invalid-feedback">{{ $errors->first('property.name') }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control @error('property.address') is-invalid @enderror "
                            wire:model.defer="property.address" placeholder="Street address">
                        @error('property.address')
                            <span class="invalid-feedback">{{ $errors->first('property.address') }}</span>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control @error('property.city') is-invalid @enderror "
                                    wire:model.defer="property.city" placeholder="">
                                @error('property.city')
                                    <span class="invalid-feedback">{{ $errors->first('property.city') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control @error('property.state') is-invalid @enderror "
                                    wire:model.defer="property.state" placeholder="">
                                @error('property.state')
                                    <span class="invalid-feedback">{{ $errors->first('property.state') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control @error('property.country') is-invalid @enderror "
                                    wire:model.defer="property.country" placeholder="">
                                @error('property.country')
                                    <span class="invalid-feedback">{{ $errors->first('property.country') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Zipcode</label>
                                <input type="text" class="form-control @error('property.zipcode') is-invalid @enderror "
                                    wire:model.defer="property.zipcode" placeholder="">
                                @error('property.zipcode')
                                    <span class="invalid-feedback">{{ $errors->first('property.zipcode') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Build Date</label>
                                <input id="build_date" type="text" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control datepicker @error('property.build_date') is-invalid @enderror"
                                    wire:model.defer="property.build_date" placeholder="">
                                @error('property.build_date')
                                    <span class="invalid-feedback">{{ $errors->first('property.build_date') }}</span>
                                @enderror
                                <script>
                                    $('#build_date').on('change', function(e) {
                                        @this.set('property.build_date', e.target.value);
                                    });

                                </script>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Demolition Date</label>
                                <input id="demolition_date" type="text" data-provide="datepicker"
                                    data-date-autoclose="true"
                                    class="form-control datepicker @error('property.demolition_date') is-invalid @enderror "
                                    wire:model.defer="property.demolition_date" placeholder="">
                                @error('property.demolition_date')
                                    <span class="invalid-feedback">{{ $errors->first('property.demolition_date') }}</span>
                                @enderror
                                <script>
                                    $('#demolition_date').on('change', function(e) {
                                        @this.set('property.demolition_date', e.target.value);
                                    });

                                </script>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 @error('property.funding_source') is-invalid @enderror">
                        <div wire:ignore>
                            <label class="form-label">Funding Source</label>
                            <div id="selectize-property-fundingSource-create-wrapper"> </div>
                            <script>
                                function selectizePropertyFundingSourceCreate() {

                                    $("#selectize-property-fundingSource-create-wrapper").empty();

                                    $('<select id="selectize-property-fundingSource-create" class="form-control" multiple></select>')
                                        .appendTo('#selectize-property-fundingSource-create-wrapper');

                                    @this.fundSources.forEach(element => {
                                        $("#selectize-property-fundingSource-create")
                                            .append(`<option>${element}</option>`);
                                    });

                                    $('#selectize-property-fundingSource-create')
                                        .selectize({
                                            plugins: ['remove_button'],
                                            delimiter: ',',
                                            persist: false,
                                            create: function(input) {
                                                return {
                                                    value: input,
                                                    text: input
                                                }
                                            },
                                        });

                                    $('#selectize-property-fundingSource-create')
                                        .on('change',
                                            () => {
                                                let val = $(
                                                        '#selectize-property-fundingSource-create')
                                                    .val();
                                                @this.set('property.funding_source', val);
                                            });
                                }

                            </script>
                        </div>
                        @error('property.funding_source')
                            <span class="small text-danger">{{ $errors->first('property.funding_source') }}</span>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" id="modal-property-create-dismiss" class="btn btn-link link-secondary"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary ms-auto">
                        <div class="spinner-border spinner-border-sm me-2" role="status" wire:loading.delay
                            wire:target='store'></div>
                        <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Add Property
                    </button>
                </div>

            </form>

        </div>

    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('#modal-property-create').modal({backdrop:'static', keyboard:false});
            window.livewire.on('showPropertyCreateForm', function() {
                selectizePropertyFundingSourceCreate();
                document.getElementById('modal-property-create-open').click();
            });
            window.livewire.on('closePropertyCreateForm', function() {
                document.getElementById('modal-property-create-dismiss').click();
            });
        });

    </script>
</div>
