<div>

    <a href="javascript:void(0)" id="modal-project-create-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-project-create" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-project-create" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <form wire:loading.attr="disabled" wire:submit.prevent="store" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Project Name</label>
                        <input type="text" class="form-control @error('project.name') is-invalid @enderror"
                            wire:model.defer="project.name" placeholder="">
                        @error('project.name')
                            <span class="invalid-feedback">{{ $errors->first('project.name') }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 @error('developer_id') is-invalid @enderror">
                        <div wire:ignore>
                            <label class="form-label">Attach Developer</label>
                            <div id="selectize-project-attach-developer-wrapper">
                                <select id="selectize-project-attach-developer" class="form-control" multiple>
                                </select>
                            </div>
                            <script>
                                function selectizeAttachDeveloper() {

                                    $("#selectize-project-attach-developer-wrapper").empty();

                                    $('<select id="selectize-project-attach-developer" class="form-control"></select>')
                                        .appendTo('#selectize-project-attach-developer-wrapper');

                                    $("#selectize-project-attach-developer")
                                        .append(`<option selected disabled></option>`);

                                    @this.developers.forEach(element => {
                                        $("#selectize-project-attach-developer")
                                            .append(
                                                `<option value="${element.id}">${element.name}</option>`
                                            );
                                    });

                                    $('#selectize-project-attach-developer').selectize({
                                        persist: true
                                    });

                                    $('#selectize-project-attach-developer').on('change', () => {
                                        let val = $('#selectize-project-attach-developer')
                                            .val();
                                        @this.set('developer_id', val);
                                    });

                                }

                            </script>
                        </div>
                        @error('developer_id')
                            <span class="small text-danger">{{ $errors->first('developer_id') }}</span>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Moving Company</label>
                                <input type="text"
                                    class="form-control @error('project.moving_company') is-invalid @enderror "
                                    wire:model.defer="project.moving_company" placeholder="">
                                @error('project.moving_company')
                                    <span class="invalid-feedback">{{ $errors->first('project.moving_company') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Consultant</label>
                                <input type="text"
                                    class="form-control @error('project.consultant') is-invalid @enderror "
                                    wire:model.defer="project.consultant" placeholder="">
                                @error('project.consultant')
                                    <span class="invalid-feedback">{{ $errors->first('project.consultant') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Management Company</label>
                                <input type="text"
                                    class="form-control @error('project.management_company') is-invalid @enderror "
                                    wire:model.defer="project.management_company" placeholder="">
                                @error('project.management_company')
                                    <span
                                        class="invalid-feedback">{{ $errors->first('project.management_company') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Start Date</label>
                                <input id="start_date" type="text" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control datepicker @error('project.start_date') is-invalid @enderror "
                                    wire:model.defer="project.start_date" placeholder="">
                                @error('project.start_date')
                                    <span class="invalid-feedback">{{ $errors->first('project.start_date') }}</span>
                                @enderror
                                <script>
                                    $('#start_date').on('change', function(e) {
                                        @this.set('project.start_date', e.target.value);
                                    });

                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label">Schedules Name</label>
                        <input type="text" class="form-control @error('project.schedules_name') is-invalid @enderror "
                            wire:model.defer="project.schedules_name" placeholder="">
                        @error('project.schedules_name')
                            <span class="invalid-feedback">{{ $errors->first('project.schedules_name') }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3 @error('phases') is-invalid @enderror">
                        <label class="form-label">Phases</label>
                        <div wire:ignore>
                            <div id="selectize-project-phases-create-wrapper"></div>
                            <script>
                                function selectizeProjectPhaseCreate() {

                                    $("#selectize-project-phases-create-wrapper").empty();

                                    $('<select id="selectize-project-phases-create" class="form-control"  multiple></select>')
                                        .appendTo('#selectize-project-phases-create-wrapper');

                                    $('#selectize-project-phases-create').selectize({
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
                                    $('#selectize-project-phases-create').on('change', () => {
                                        let val = $('#selectize-project-phases-create').val();
                                        @this.set('phases', val);
                                    });
                                }

                            </script>
                        </div>
                        @error('phases')
                            <span class="small text-danger">{{ $errors->first('phases') }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Enter Commencement</label>
                        <textarea rows="3" data-bs-toggle="autosize"
                            class="form-control @error('project.commencement') is-invalid @enderror "
                            wire:model.defer="project.commencement" placeholder=""></textarea>
                        @error('project.commencement')
                            <span class="invalid-feedback">{{ $errors->first('project.commencement') }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal-project-create-dismiss" class="btn btn-link link-secondary"
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
                        Add Project
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('#modal-project-create').modal({backdrop:'static', keyboard:false});
            window.livewire.on('showProjectCreateForm', function() {
                selectizeAttachDeveloper();
                selectizeProjectPhaseCreate();
                document.getElementById('modal-project-create-open').click();
            });
            window.livewire.on('closeProjectCreateForm', function() {
                document.getElementById('modal-project-create-dismiss').click();
            });
        });

    </script>
</div>
