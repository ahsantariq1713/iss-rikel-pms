<div>

    <a href="javascript:void(0)" id="modal-tenants-import-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-tenants-import" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-tenants-import" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent="process" class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Import Tenants</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <div class="form-label">Custom File Input</div>
                        <input type="file" class="form-control @error('file') is-invalid @enderror "
                            wire:model.defer="file">

                        @error('file')
                            <span class="invalid-feedback">{{ $errors->first('file') }}</span>
                        @enderror
                    </div>
                </div>


                <div class="modal-footer">

                    <button type="button" id="modal-tenants-import-dismiss" class="btn btn-link link-secondary"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary ms-auto">
                        <div class="spinner-border spinner-border-sm me-2" role="status" wire:loading.delay
                            wire:target='process'></div>
                        <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3" />
                        </svg>
                        Import
                    </button>

                </div>

            </form>

        </div>

    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            window.livewire.on('showImportTenantsForm', function() {
                document.getElementById('modal-tenants-import-open').click();
            });
            window.livewire.on('closeImportTenantsForm', function() {
                document.getElementById('modal-tenants-import-dismiss').click();
            });
        });

    </script>
</div>
