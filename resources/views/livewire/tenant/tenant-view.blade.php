<div>

    <a href="javascript:void(0)" id="modal-tenant-view-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-tenant-view" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-tenant-view" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent='update' class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tenant Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-0 bg-white">

                    @if ($tenant)
                        <div class="list-group list-group-flush list-details">
                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Name </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->name }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Id Type </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->id_type }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">ID Number </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->id_number }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Citizenship </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->citizenship }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Relocation Type </span>
                                    </div>
                                    <div class="col text-left">
                                        <span
                                            class="badge bg-{{ $tenant->relocation_type == 'Permanent' ? 'purple' : 'primary' }}">
                                            {{ $tenant->relocation_type }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Income </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->income }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Deposit </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->deposit }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Rent </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->rent }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">
                                            Total Occuppants </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->total_occupants }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">
                                            Allotted Units </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->allotted_units }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">
                                            Allotted Bedroom Size </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->allotted_bedroom_size }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Eamil </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->email }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Work Phone </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->work_phone }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Mobile Number </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->mobile_number }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Address</span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $tenant->full_address }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Created </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $tenant->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Last Updated </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $tenant->updated_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" id="modal-tenant-view-dismiss" class="btn btn-link link-secondary"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            window.livewire.on('showTenantViewForm', function() {
                document.getElementById('modal-tenant-view-open').click();
            });
            window.livewire.on('closeTenantViewForm', function() {
                document.getElementById('modal-tenant-view-dismiss').click();
            });
        });

    </script>
</div>
