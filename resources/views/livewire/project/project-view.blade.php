<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-md text-white bg-secondary">{{ $project->imageText }}</span>
            </div>
            <div class="col">
                <h2 class="page-title">{{ $project->name }}</h2>
                <div class="page-subtitle">
                    <div class="row">
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="3" y1="21" x2="21" y2="21"></line>
                                <path d="M5 21v-14l8 -4v18"></path>
                                <path d="M19 21v-10l-6 -4"></path>
                                <line x1="9" y1="9" x2="9" y2="9.01"></line>
                                <line x1="9" y1="12" x2="9" y2="12.01"></line>
                                <line x1="9" y1="15" x2="9" y2="15.01"></line>
                                <line x1="9" y1="18" x2="9" y2="18.01"></line>
                            </svg>
                            <a href="javascript:void(0)"
                                class="text-reset text-decoration-none">{{ $project->developer_name }}</a>
                        </div>
                        <div class="col-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                            </svg>
                            <a href="javascript:void(0)"
                                class="text-reset text-decoration-none">{{ $project->tenants->count() }} Tenants</a>
                        </div>
                        <div
                            class="col-auto {{ $project->status == 'Processing' ? 'text-primary' : 'text-success' }}">
                            @if ($project->status == 'Processing')
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="6" x2="12" y2="3" />
                                    <line x1="16.25" y1="7.75" x2="18.4" y2="5.6" />
                                    <line x1="18" y1="12" x2="21" y2="12" />
                                    <line x1="16.25" y1="16.25" x2="18.4" y2="18.4" />
                                    <line x1="12" y1="18" x2="12" y2="21" />
                                    <line x1="7.75" y1="16.25" x2="5.6" y2="18.4" />
                                    <line x1="6" y1="12" x2="3" y2="12" />
                                    <line x1="7.75" y1="7.75" x2="5.6" y2="5.6" />
                                </svg>
                            @else

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 18v-15l7 4l-7 4" />
                                    <path
                                        d="M9 17.67c-.62 .36 -1 .82 -1 1.33c0 1.1 1.8 2 4 2s4 -.9 4 -2c0 -.5 -.38 -.97 -1 -1.33" />
                                </svg>
                            @endif
                            {{ $project->status }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto d-none d-md-flex">
                {{-- <a href="#" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                        <line x1="8" y1="9" x2="16" y2="9"></line>
                        <line x1="8" y1="13" x2="14" y2="13"></line>
                    </svg>
                    Send message
                </a> --}}
            </div>
        </div>
    </div>

    <div class="border-bottom d-flex justify-content-center">
        <ul class="nav nav-tabs border-bottom-0" data-bs-toggle="tabs" wire:ignore.self>
            <li class="nav-item">
                <a href="#tabs-1" class="nav-link active" wire:ignore.self data-bs-toggle="tab">Project</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-2" class="nav-link" wire:ignore.self data-bs-toggle="tab">Developer</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-3" class="nav-link" wire:ignore.self data-bs-toggle="tab">Property</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-4" class="nav-link" wire:ignore.self data-bs-toggle="tab">Progress</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-5" class="nav-link" wire:ignore.self data-bs-toggle="tab">Tenants</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-6" class="nav-link" wire:ignore.self data-bs-toggle="tab">Budget</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-7" class="nav-link" wire:ignore.self data-bs-toggle="tab">Invoices</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-8" class="nav-link" wire:ignore.self data-bs-toggle="tab">Team</a>
            </li>

        </ul>
    </div>
    <div class="tab-content py-3">
        <div class="tab-pane show active" wire:ignore.self id="tabs-1">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                    <div class="card">
                        <div class="card-header pb-0 d-flex  justify-content-between">
                            <h4 class="m-0 mb-2">Details</h4>
                            <a href="javascript:void(0)"
                                onclick="window.livewire.emit('editProject', {{ $project->id }})" class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                        </div>

                        <div class="list-group list-group-flush list-details">
                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Name </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $project->name }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Developer</span>
                                    </div>
                                    <div class="col text-left d-flex justify-content-between">
                                        <span> {{ $project->developer_name }}</span>
                                        <a href="javascript:void(0)" class="small"
                                            onclick="window.livewire.emit('attachDeveloper', {{ $project->id }})">Change</a>
                                    </div>
                                </div>
                            </div>

                            @if ($project->property)
                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Property</span>
                                        </div>
                                        <div class="col text-left d-flex justify-content-between">
                                            <span> {{ $project->property->name }}</span>
                                            <a href="javascript:void(0)" class="small"
                                                onclick="window.livewire.emit('attachProperty', {{ $project->id }})">Change</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Moving Company </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $project->moving_company }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Consultant </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $project->consultant }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Management Company </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $project->management_company }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Schedules Name </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $project->schedules_name }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Start Date </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $project->start_date->format('d M, Y') }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Current Phase </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="badge bg-primary"> {{ $project->current_phase_name }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Status </span>
                                    </div>
                                    <div
                                        class="col-auto {{ $project->status == 'Processing' ? 'text-primary' : 'text-success' }}">
                                        @if ($project->status == 'Processing')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="12" y1="6" x2="12" y2="3" />
                                                <line x1="16.25" y1="7.75" x2="18.4" y2="5.6" />
                                                <line x1="18" y1="12" x2="21" y2="12" />
                                                <line x1="16.25" y1="16.25" x2="18.4" y2="18.4" />
                                                <line x1="12" y1="18" x2="12" y2="21" />
                                                <line x1="7.75" y1="16.25" x2="5.6" y2="18.4" />
                                                <line x1="6" y1="12" x2="3" y2="12" />
                                                <line x1="7.75" y1="7.75" x2="5.6" y2="5.6" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 18v-15l7 4l-7 4" />
                                                <path
                                                    d="M9 17.67c-.62 .36 -1 .82 -1 1.33c0 1.1 1.8 2 4 2s4 -.9 4 -2c0 -.5 -.38 -.97 -1 -1.33" />
                                            </svg>
                                        @endif
                                        {{ $project->status }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Commencement </span>
                                    </div>
                                    <div class="col-8">
                                        <span class="m-0"> {{ $project->commencement }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Created </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $project->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-body d-block text-muted">Last Updated </span>
                                    </div>
                                    <div class="col-auto">
                                        {{ $project->updated_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" wire:ignore.self id="tabs-2">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                    @if ($project->developer->email == null)
                        <div class="alert alert-danger bg-white">
                            <h4 class="text-danger m-0 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                                Warning
                            </h4>
                            <span>Please update developer information like email and phone number. Otherwire you
                                will
                                not be
                                able to send emails and other notifications to this developer </span>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header pb-0 d-flex  justify-content-between">
                            <h4 class="m-0 mb-2">Developer Details</h4>
                            <a href="javascript:void(0)"
                                onclick="window.livewire.emit('editDeveloper', {{ $project->developer->id }})"
                                class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                        </div>

                        <div class="list-group list-group-flush list-details">
                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Name </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $project->developer->name }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Eamil </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $project->developer->email }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Work Phone </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $project->developer->work_phone }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Mobile Number </span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $project->developer->mobile_number }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Website URL</span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $project->developer->website_url }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Address</span>
                                    </div>
                                    <div class="col text-left">
                                        {{ $project->developer->full_address }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item py-2">
                                <div class="row align-items-center">
                                    <div class="col-4  d-flex justify-content-start">
                                        <span class="text-muted">Additional Info</span>
                                    </div>
                                    <div class="col-8 text-left">
                                        {{ $project->developer->additional_info }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" wire:ignore.self id="tabs-3">
            @if ($project->property == null)
                <div class="text-center">
                    <div class="empty">
                        <div class="empty-img"><img
                                src="{{ asset('assets/img/static/illustrations/undraw_No_data_re_kwbl.svg') }}"
                                height="128" alt="">
                        </div>
                        <p class="empty-title m-0">No Results</p>
                        <p class="empty-subtitle text-muted m-0">
                            No property attached yet.
                        </p>
                        <div class="empty-action">
                            <a href="javascript:void(0)"
                                onclick="window.livewire.emit('attachProperty', {{ $project->id }})"
                                class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 9v12m-8 -8a8 8 0 0 0 16 0m1 0h-2m-14 0h-2" />
                                    <circle cx="12" cy="6" r="3" />
                                </svg>
                                Attach Property
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                        @if ($project->developer->email == null)
                            <div class="alert alert-danger bg-white">
                                <h4 class="text-danger m-0 mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                    </svg>
                                    Warning
                                </h4>
                                <span>Please update developer information like email and phone number. Otherwire you
                                    will
                                    not be
                                    able to send emails and other notifications to this developer </span>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header pb-0 d-flex  justify-content-between">
                                <h4 class="m-0 mb-2">Basic</h4>
                                <a href="javascript:void(0)"
                                    onclick="window.livewire.emit('editProperty', {{ $project->property->id }})"
                                    class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                    </svg>
                                </a>
                            </div>

                            <div class="list-group list-group-flush list-details">
                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Name </span>
                                        </div>
                                        <div class="col text-left">
                                            {{ $project->property->name }}
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Address</span>
                                        </div>
                                        <div class="col text-left">
                                            {{ $project->property->full_address }}
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Build Date</span>
                                        </div>
                                        <div class="col-8 text-left">
                                            {{ $project->property->build_date->format('d M, Y') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Demolition Date</span>
                                        </div>
                                        <div class="col-8 text-left">
                                            {{ $project->property->build_date->format('d M, Y') }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header pb-0 d-flex  justify-content-between">
                                <h4 class="m-0 mb-2">Funding Sources</h4>
                            </div>

                            <div class="list-group list-group-flush list-details">
                                @foreach ($project->property->funding_sources as $source)
                                    <div class="list-group-item py-2">
                                        <div class="row align-items-center">
                                            <div class="col-12  d-flex justify-content-start">
                                                <span>{{ $source }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header pb-0 d-flex  justify-content-between">
                                <h4 class="m-0 mb-2">Features</h4>
                                <a href="javascript:void(0)"
                                    onclick="window.livewire.emit('attachProperty', {{ $project->id }})"
                                    class="mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                    </svg>
                                </a>
                            </div>

                            <div class="list-group list-group-flush list-details">
                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Units </span>
                                        </div>
                                        <div class="col text-left">
                                            {{ $project->propertyFeature->units }}
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Reserved Units </span>
                                        </div>
                                        <div class="col text-left">
                                            {{ $project->propertyFeature->reserved_units }}
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Vacant Units </span>
                                        </div>
                                        <div class="col text-left">
                                            {{ $project->propertyFeature->vacant_units }}
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Bedroom Size</span>
                                        </div>
                                        <div class="col-8 text-left">
                                            {{ $project->propertyFeature->bedroom_size }}
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-2">
                                    <div class="row align-items-center">
                                        <div class="col-4  d-flex justify-content-start">
                                            <span class="text-muted">Last Renovation Date</span>
                                        </div>
                                        <div class="col-8 text-left">
                                            {{ $project->propertyFeature->renovation_date->format('d M, Y') }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="tab-pane" wire:ignore.self id="tabs-4">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                    <div class="card">
                        <div class="card-header pb-0 d-flex  justify-content-between">
                            <h4 class="m-0 mb-2">Phases</h4>
                            <a href="javascript:void(0)"
                                onclick="window.livewire.emit('editProject', {{ $project->id }})" class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                        </div>
                        <div class="p-4">
                            <ul class="list list-timeline">
                                @foreach ($project->phases->sortByDesc('id') as $phase)
                                    <li>
                                        <div
                                            class="list-timeline-icon {{ $phase->completed_at != null ? 'bg-success' : ($project->current_phase == $phase ? 'bg-primary' : 'bg-light') }}">
                                            @if ($phase->completed_at != null)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg>
                                            @elseif($project->current_phase == $phase)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="12" y1="6" x2="12" y2="3"></line>
                                                    <line x1="16.25" y1="7.75" x2="18.4" y2="5.6"></line>
                                                    <line x1="18" y1="12" x2="21" y2="12"></line>
                                                    <line x1="16.25" y1="16.25" x2="18.4" y2="18.4"></line>
                                                    <line x1="12" y1="18" x2="12" y2="21"></line>
                                                    <line x1="7.75" y1="16.25" x2="5.6" y2="18.4"></line>
                                                    <line x1="6" y1="12" x2="3" y2="12"></line>
                                                    <line x1="7.75" y1="7.75" x2="5.6" y2="5.6"></line>
                                                </svg>
                                            @endif

                                        </div>
                                        <div class="list-timeline-content">
                                            @if ($phase->completed_at != null)
                                                <div class="list-timeline-time">
                                                    {{ $phase->completed_at->calendar() }}
                                                </div>
                                                <p class="list-timeline-title">{{ $phase->name }}</p>
                                                <p class="text-muted">{{ $phase->description }}</p>
                                            @elseif($phase == $project->current_phase)
                                                <p class="list-timeline-title"><a class="text-decration-none"
                                                        href="javascript:void(0)"
                                                        onclick="window.livewire.emit('completePhase', {{ $phase->id }})">{{ $phase->name }}</a>
                                                </p>
                                            @else
                                                <p class="list-timeline-title">{{ $phase->name }}</p>
                                            @endif

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" wire:ignore.self id="tabs-5">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
                    <livewire:tenant.tenant-list :projectId='$project->id' />
                </div>
            </div>
        </div>
        <div class="tab-pane" wire:ignore.self id="tabs-6">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                    <livewire:project.project-budget :budget='$project->budget'/>
                </div>
            </div>
        </div>
        <div class="tab-pane" wire:ignore.self id="tabs-7">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
                    <livewire:invoice.invoice-list :projectId='$project->id'/>
                </div>
            </div>
        </div>
        <div class="tab-pane" wire:ignore.self id="tabs-8">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                   <livewire:project.project-team :project='$project' />

                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('nav-project-list').classList.add("active");

    </script>

</div>

<livewire:project.attach-developer />
<livewire:project.project-edit />
<livewire:developer.developer-edit />
<livewire:project.attach-property />
<livewire:property.property-edit />
<livewire:project.complete-phase />
