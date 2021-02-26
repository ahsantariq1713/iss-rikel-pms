<div>

    <a href="javascript:void(0)" id="modal-property-view-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-property-view" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-property-view" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent='update' class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Property Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-0 bg-white">

                    @if ($property)
                        <div class="list-group list-group-flush list-details">
                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Name </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $property->name }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Address</span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $property->full_address }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Build Date</span>
                                    </div>
                                    <div class="col-8 text-left">
                                        {{ $property->build_date->format('d M, Y') }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Demolition Date</span>
                                    </div>
                                    <div class="col-8 text-left">
                                        {{ $property->build_date->format('d M, Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Created </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $property->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Last Updated </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $property->updated_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-12 d-flex justify-content-start">
                                        <span class="font-weight-bold">Funding Source</span>
                                    </div>
                                </div>
                            </div>
                            @foreach ($property->funding_sources as $source)
                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-12  d-flex justify-content-start">
                                            <span>{{ $source }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" id="modal-property-view-dismiss" class="btn btn-link link-secondary"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            window.livewire.on('showPropertyViewForm', function() {
                document.getElementById('modal-property-view-open').click();
            });
            window.livewire.on('closePropertyViewForm', function() {
                document.getElementById('modal-property-view-dismiss').click();
            });
        });

    </script>
</div>
