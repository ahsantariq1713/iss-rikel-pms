<div>

    <a href="javascript:void(0)" id="modal-developer-create-open" hidden data-bs-toggle="modal"
    data-bs-target="#modal-developer-create" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-developer-create" tabindex="-1" aria-hidden="true"
        style="display: none;" wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent="store" class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">New Developer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('developer.name') is-invalid @enderror "
                            wire:model.defer="developer.name" placeholder="Full name">
                        @error('developer.name')
                            <span class="invalid-feedback">{{ $errors->first('developer.name') }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('developer.email') is-invalid @enderror "
                            wire:model.defer="developer.email" placeholder="example@email.com">
                        @error('developer.email')
                            <span class="invalid-feedback">{{ $errors->first('developer.email') }}</span>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Work Phone</label>
                                <input type="text"
                                    class="form-control @error('developer.work_phone') is-invalid @enderror "
                                    wire:model.defer="developer.work_phone" placeholder="With area code">
                                @error('developer.work_phone')
                                    <span class="invalid-feedback">{{ $errors->first('developer.work_phone') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="text"
                                    class="form-control @error('developer.mobile_number') is-invalid @enderror "
                                    wire:model.defer="developer.mobile_number" placeholder="With country code">
                                @error('developer.mobile_number')
                                    <span class="invalid-feedback">{{ $errors->first('developer.mobile_number') }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="form-label">Website Url</label>
                        <div class="input-group input-group-flat">
                            <span class="input-group-text">
                                https://
                            </span>
                            <input type="text"
                                class="form-control ps-0 @error('developer.website_url') is-invalid @enderror "
                                wire:model.defer="developer.website_url">
                        </div>
                        @error('developer.website_url')
                            <span class="invalid-feedback">{{ $errors->first('developer.website_url') }}</span>
                        @enderror
                    </div>

                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control @error('developer.address') is-invalid @enderror "
                            wire:model.defer="developer.address" placeholder="Street address">
                        @error('developer.address')
                            <span class="invalid-feedback">{{ $errors->first('developer.address') }}</span>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control @error('developer.city') is-invalid @enderror "
                                    wire:model.defer="developer.city" placeholder="">
                                @error('developer.city')
                                    <span class="invalid-feedback">{{ $errors->first('developer.city') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control @error('developer.state') is-invalid @enderror "
                                    wire:model.defer="developer.state" placeholder="">
                                @error('developer.state')
                                    <span class="invalid-feedback">{{ $errors->first('developer.state') }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <input type="text"
                                    class="form-control @error('developer.country') is-invalid @enderror "
                                    wire:model.defer="developer.country" placeholder="">
                                @error('developer.country')
                                    <span class="invalid-feedback">{{ $errors->first('developer.country') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Additional information</label>
                        <textarea rows="3" data-bs-toggle="autosize"
                            class="form-control @error('developer.additional_info') is-invalid @enderror "
                            wire:model.defer="developer.additional_info"
                            placeholder="Some additional information about the business"></textarea>
                        @error('developer.additional_info')
                            <span class="invalid-feedback">{{ $errors->first('developer.additional_info') }}</span>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" id="modal-developer-create-dismiss" class="btn btn-link link-secondary"
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
                        Add Developer
                    </button>

                </div>

            </form>

        </div>

    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            $('#modal-developer-create').modal({backdrop:'static', keyboard:false});
            window.livewire.on('showDeveloperCreateForm', function() {
                document.getElementById('modal-developer-create-open').click();
            });
            window.livewire.on('closeDeveloperCreateForm', function() {
                document.getElementById('modal-developer-create-dismiss').click();
            });
        });
    </script>
</div>
