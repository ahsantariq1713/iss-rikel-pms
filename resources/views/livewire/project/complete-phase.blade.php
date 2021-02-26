<div>

    <a href="javascript:void(0)" id="modal-phase-complete-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-phase-complete" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-phase-complete" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent='update' class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Complete Phase</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Comments</label>
                        <textarea rows="3" data-bs-toggle="autosize"
                            class="form-control @error('phase.description') is-invalid @enderror "
                            wire:model.defer="phase.description"
                            placeholder="Write comments"></textarea>
                        @error('phase.description')
                            <span class="invalid-feedback">{{ $errors->first('phase.description') }}</span>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" id="modal-phase-complete-dismiss" class="btn btn-link link-secondary"
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
                        Mark Phase Completed
                    </button>

                </div>

            </form>

        </div>

    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            window.livewire.on('showPhaseCompleteForm', function() {
                document.getElementById('modal-phase-complete-open').click();
            });
            window.livewire.on('closePhaseCompleteForm', function() {
                document.getElementById('modal-phase-complete-dismiss').click();
            });
        });

    </script>
</div>
