<div>
    <a href="javascript:void(0)" id="modal-attach-property-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-attach-property" class="btn btn-primary"></a>

        <div class="modal modal-blur fade" id="modal-attach-property" tabindex="-1" aria-hidden="true"
        style="display: none;" wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent='store' class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Project Property</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h3 class="m-0 p-0">Project {{ $project ?  $project->name  : ''}}</h3>
                    <p  class="m-0 p-0 text-muted mb-3">Select properties from exisitng records or <a href="{{ route('property-list') }}">create new</a> </p>
                    <div class="mb-3 @error('property_id') is-invalid @enderror">
                        <div wire:ignore>
                            <label class="form-label">Select Property</label>
                            <div id="selectize-project-attach-property-wrapper">
                            </div>
                            <script>
                                function selectizeAttachProperty() {

                                    $("#selectize-project-attach-property-wrapper").empty();

                                    $('<select id="selectize-project-attach-property" class="form-control"></select>')
                                        .appendTo('#selectize-project-attach-property-wrapper');

                                    $("#selectize-project-attach-property")
                                        .append(`<option selected disabled></option>`);

                                    @this.properties.forEach(element => {
                                        $("#selectize-project-attach-property")
                                            .append(
                                                `<option ${element.id == @this.property_id ? ' selected' : ''} value="${element.id}">${element.name}</option>`
                                            );
                                    });

                                    $('#selectize-project-attach-property').selectize({
                                        persist: true
                                    });

                                    $('#selectize-project-attach-property').on('change', () => {
                                        let val = $('#selectize-project-attach-property')
                                            .val();
                                        @this.set('property_id', val);
                                    });

                                }
                            </script>
                        </div>
                        @error('property_id')
                            <span class="small text-danger">{{ $errors->first('property_id') }}</span>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Total Units</label>
                                <input type="text"
                                    class="form-control @error('propertyFeature.units') is-invalid @enderror "
                                    wire:model.lazy="propertyFeature.units" placeholder="">
                                @error('propertyFeature.units')
                                    <span class="invalid-feedback">{{ $errors->first('propertyFeature.units') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Bedroom Size</label>
                                <input type="text"
                                    class="form-control @error('propertyFeature.bedroom_size') is-invalid @enderror "
                                    wire:model.defer="propertyFeature.bedroom_size" placeholder="">
                                @error('propertyFeature.bedroom_size')
                                    <span
                                        class="invalid-feedback">{{ $errors->first('propertyFeature.bedroom_size') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Reserved Units</label>
                                <input type="text"
                                    class="form-control @error('propertyFeature.reserved_units') is-invalid @enderror "
                                    wire:model.lazy="propertyFeature.reserved_units" placeholder="">
                                @error('propertyFeature.reserved_units')
                                    <span
                                        class="invalid-feedback">{{ $errors->first('propertyFeature.reserved_units') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Vacant Units</label>
                                <input type="text" class="form-control bg-white" readonly
                                    wire:model.defer="propertyFeature.vacant_units" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Renovation Date</label>
                        <input id="renovation-date-attach-property" type="text" data-date-autoclose="true"
                            class="form-control datepicker @error('propertyFeature.renovation_date') is-invalid @enderror "
                            wire:model.defer="propertyFeature.renovation_date" placeholder="">
                        @error('propertyFeature.renovation_date')
                            <span class="invalid-feedback">{{ $errors->first('propertyFeature.renovation_date') }}</span>
                        @enderror
                        <script>
                            $('#renovation-date-attach-property').datepicker();
                            $('#renovation-date-attach-property').on('change', function(e) {
                                @this.set('propertyFeature.renovation_date', e.target.value);
                            });
                        </script>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" id="modal-attach-property-dismiss" class="btn btn-link link-secondary"
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
            window.livewire.on('showAttachPropertyForm', function() {
                selectizeAttachProperty();
                document.getElementById('modal-attach-property-open').click();
            });
            window.livewire.on('closeAttachPropertyForm', function() {
                document.getElementById('modal-attach-property-dismiss').click();
            });
        });
    </script>

</div>
