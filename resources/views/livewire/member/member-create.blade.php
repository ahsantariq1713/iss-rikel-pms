<div>

    <a href="javascript:void(0)" id="modal-member-create-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-member-create" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-member-create" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent="store" class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">New Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('user.name') is-invalid @enderror "
                            wire:model.defer="user.name" placeholder="Full name">
                        @error('user.name')
                            <span class="invalid-feedback">{{ $errors->first('user.name') }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('user.email') is-invalid @enderror "
                            wire:model.defer="user.email" placeholder="example@email.com">
                        @error('user.email')
                            <span class="invalid-feedback">{{ $errors->first('user.email') }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" class="form-control @error('user.mobile_number') is-invalid @enderror "
                            wire:model.defer="user.mobile_number" placeholder="With country code">
                        @error('user.mobile_number')
                            <span class="invalid-feedback">{{ $errors->first('user.mobile_number') }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Role Type</label>
                            @error('role')
                            <span class="text-danger small">{{ $errors->first('role')}}</span>
                            @enderror
                        </div>

                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-6">
                              <label class="form-selectgroup-item mb-3">
                                <input type="radio" name='role' value="2" class="form-selectgroup-input"  wire:model.defer='role' {{Auth::user()->isSupervisor() ? 'disabled' : ''}}>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                  <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </span>
                                  <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Supervisor</span>
                                    <span class="d-block text-muted">Can add workers, assign projects and have all permissions.</span>
                                  </span>
                                </span>
                              </label>
                            </div>
                            <div class="col-lg-6">
                              <label class="form-selectgroup-item mb-3">
                                <input type="radio" name='role' value="1" class="form-selectgroup-input" wire:model.defer='role'>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                  <span class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                  </span>
                                  <span class="form-selectgroup-label-content">
                                    <span class="form-selectgroup-title strong mb-1">Worker</span>
                                    <span class="d-block text-muted">Can only work on assigned projects and cannot edit or delete projects.</span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                    </div>
                </div>


                <div class="modal-footer">

                    <button type="button" id="modal-member-create-dismiss" class="btn btn-link link-secondary"
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
                        Add Member
                    </button>

                </div>

            </form>

        </div>

    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('#modal-member-create').modal({
                backdrop: 'static',
                keyboard: false
            });
            window.livewire.on('showMemberCreateForm', function() {
                document.getElementById('modal-member-create-open').click();
            });
            window.livewire.on('closeMemberCreateForm', function() {
                document.getElementById('modal-member-create-dismiss').click();
            });
        });

    </script>
</div>
