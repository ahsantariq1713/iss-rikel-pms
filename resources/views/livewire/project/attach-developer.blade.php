<div>
    <a href="javascript:void(0)" id="modal-developer-attach-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-developer-attach" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-developer-attach" tabindex="-1" aria-hidden="true"
        style="display: none;" wire:ignore.self>

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form wire:loading.attr="disabled" wire:submit.prevent="update" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Project Developer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h3 class="m-0 p-0">Project {{ $project ?  $project->name  : ''}}</h3>
                    <p  class="m-0 p-0 text-muted mb-3">Select developers from exisitng records or <a href="{{ route('developer-list') }}">create new</a> </p>
                    <div class="mb-3 @error('developer_id') is-invalid @enderror">
                        <div wire:ignore>
                            <label class="form-label">Select Developer</label>
                            <div id="selectize-project-attach-developer-wrapper">
                            </div>
                            <script>
                                function selectizeChangeDeveloper() {

                                    $("#selectize-project-attach-developer-wrapper").empty();

                                    $('<select id="selectize-project-attach-developer" class="form-control"></select>')
                                        .appendTo('#selectize-project-attach-developer-wrapper');

                                    $("#selectize-project-attach-developer")
                                        .append(`<option selected disabled></option>`);

                                    @this.developers.forEach(element => {
                                        $("#selectize-project-attach-developer")
                                            .append(
                                                `<option ${element.id == @this.developer_id ? ' selected' : ''} value="${element.id}">${element.name}</option>`
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
                </div>

                <div class="modal-footer">
                    <button type="button" id="modal-developer-attach-dismiss" class="btn btn-link link-secondary"
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
            window.livewire.on('showAttachDeveloperForm', function() {
                selectizeChangeDeveloper();
                document.getElementById('modal-developer-attach-open').click();

            });
            window.livewire.on('closeAttachDeveloperForm', function() {
                document.getElementById('modal-developer-attach-dismiss').click();
            });
        });

    </script>
</div>
