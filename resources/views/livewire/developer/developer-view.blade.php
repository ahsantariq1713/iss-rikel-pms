<div>

    <a href="javascript:void(0)" id="modal-developer-view-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-developer-view" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-developer-view" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent='update' class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Developer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-0 bg-white">

                    @if ($developer)
                        <div class="list-group list-group-flush list-details">
                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Name </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $developer->name }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Eamil </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $developer->email }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Work Phone </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $developer->work_phone }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Mobile Number </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $developer->mobile_number }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Website URL</span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $developer->website_url }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Address</span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $developer->full_address }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Additional Info</span>
                                    </div>
                                    <div class="col-8 text-left">
                                        {{ $developer->additional_info }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Created </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $developer->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Last Updated </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $developer->updated_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" id="modal-developer-view-dismiss" class="btn btn-link link-secondary"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            window.livewire.on('showDeveloperViewForm', function() {
                document.getElementById('modal-developer-view-open').click();
            });
            window.livewire.on('closeDeveloperViewForm', function() {
                document.getElementById('modal-developer-view-dismiss').click();
            });
        });

    </script>
</div>
