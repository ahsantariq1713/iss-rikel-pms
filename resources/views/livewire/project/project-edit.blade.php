<div>
    <a href="javascript:void(0)" id="modal-project-edit-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-project-edit" class="btn btn-primary"></a>
    <div class="modal modal-blur fade" id="modal-project-edit" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <form wire:loading.attr="disabled" wire:submit.prevent='update' class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Project</h5>
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
                                <input id="start_date_edit" type="text" data-date-autoclose="true"
                                class="form-control @error('project.start_date') is-invalid @enderror "
                                    wire:model.defer="project.start_date" placeholder="">
                                @error('project.start_date')
                                    <span class="invalid-feedback">{{ $errors->first('project.start_date') }}</span>
                                @enderror
                                <script>
                                     $('#start_date_edit').datepicker();
                                    $('#start_date_edit').on('change', function(e) {
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
                    <button type="button" id="modal-project-edit-dismiss" class="btn btn-link link-secondary"
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
            $('#modal-project-edit').modal({backdrop:'static', keyboard:false});
            window.livewire.on('showProjectEditForm', function(entity) {
                document.getElementById('modal-project-edit-open').click();
            });
            window.livewire.on('closeProjectEditForm', function(entity) {
                document.getElementById('modal-project-edit-dismiss').click();
            });
        });
    </script>
</div>
