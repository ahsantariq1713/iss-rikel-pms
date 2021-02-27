<div class="container-fluid {{ $tableEmtpty ? 'd-flex flex-meta justify-content-center' : '' }}">
    @if ($tableEmtpty)
        <div class="empty">
            <div class="empty-img"><img
                    src="{{ asset('assets/img/static/illustrations/undraw_No_data_re_kwbl.svg') }}" height="128"
                    alt="">
            </div>
            <p class="empty-title m-0">No Results</p>
            <p class="empty-subtitle text-muted m-0">
                There is no {{ $entityIdentifier }} record.
            </p>
            <div class="empty-action">
                {{-- data-bs-toggle="modal"
                    data-bs-target="#modal-{{ $entityIdentifier }}-create" --}}
                @can('create', 'App\Models\\' . $EntityClass)
                <a href="javascript:void(0)" onclick="window.livewire.emit('create{{ $entityName }}')"
                    class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Add {{ $entityName }}
                </a>
                @endcan

                @if ($importAllowed)
                    <div class="hr-text m-0 my-3 p-0">Or</div>
                    <a href="javascript:void(0)" onclick="window.livewire.emit('{{ $entityIdentifier }}Import')"
                        class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3" />
                        </svg>
                        Import CSV
                    </a>
                @endif

            </div>
        </div>
    @else
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        {{ $entityNamePlural }}
                    </h2>
                </div>
                <div class="col-auto ms-auto p-0" wire:ignore>
                    <a class="btn btn-white d-none d-sm-inline-block  show " href="#navbar-extra"
                        data-bs-toggle="dropdown" role="button" aria-expanded="true">
                        <div class="spinner-border spinner-border-sm me-2" wire:loading wire:target='toggleColumn'>
                        </div>
                        <svg wire:loading.remove wire:target='toggleColumn' xmlns="http://www.w3.org/2000/svg"
                            class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="4" y1="6" x2="9.5" y2="6" />
                            <line x1="4" y1="10" x2="9.5" y2="10" />
                            <line x1="4" y1="14" x2="9.5" y2="14" />
                            <line x1="4" y1="18" x2="9.5" y2="18" />
                            <line x1="14.5" y1="6" x2="20" y2="6" />
                            <line x1="14.5" y1="10" x2="20" y2="10" />
                            <line x1="14.5" y1="14" x2="20" y2="14" />
                            <line x1="14.5" y1="18" x2="20" y2="18" />
                        </svg>
                        <span class="nav-link-title">
                            Columns
                        </span>
                    </a>
                    <a class="btn btn-white d-sm-none btn-icon  show" href="#navbar-extra" data-bs-toggle="dropdown"
                        role="button" aria-expanded="true">
                        <div class="spinner-border spinner-border-sm me-2" wire:loading wire:target='toggleColumn'>
                        </div>
                        <svg wire:loading.remove wire:target='toggleColumn' xmlns="http://www.w3.org/2000/svg"
                            class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="4" y1="6" x2="9.5" y2="6" />
                            <line x1="4" y1="10" x2="9.5" y2="10" />
                            <line x1="4" y1="14" x2="9.5" y2="14" />
                            <line x1="4" y1="18" x2="9.5" y2="18" />
                            <line x1="14.5" y1="6" x2="20" y2="6" />
                            <line x1="14.5" y1="10" x2="20" y2="10" />
                            <line x1="14.5" y1="14" x2="20" y2="14" />
                            <line x1="14.5" y1="18" x2="20" y2="18" />
                        </svg>
                    </a>

                    <div class="dropdown-menu dropdown-menu-demo dropdown-menu-arrow">
                        @foreach ($columns as $column)
                            <div class=" dropdown-item">
                                <label class="form-check mb-0 pb-0">
                                    <input class="form-check-input" type="checkbox"
                                        {{ $column['display'] ? 'checked' : '' }}
                                        wire:click="toggleColumn('{{ $column['key'] }}')">
                                    <span class="form-check-label">{{ $column['header'] }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-auto ms-auto pe-0">
                    <div class="btn-list">
                        @can('import', 'App\Models\\' . $EntityClass)
                        @if ($importAllowed)
                            <a href="javascript:void(0)"
                                onclick="window.livewire.emit('{{ $entityIdentifier }}Import')"
                                class="btn btn-success d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path
                                        d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3" />
                                </svg>
                                Import CSV
                            </a>
                            <a href="javascript:void(0)"
                                onclick="window.livewire.emit('{{ $entityIdentifier }}Import')"
                                class="btn btn-success d-sm-none btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path
                                        d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3" />
                                </svg>
                            </a>
                        @endif
                        @endcan
                        <a href="javascript:void(0)" wire:click='createPDF'
                            class="btn btn-white d-none d-sm-inline-block">
                            <div class="spinner-border spinner-border-sm me-2" wire:loading wire:target='createPDF'>
                            </div>
                            <svg wire:loading.remove wire:target='createPDF' xmlns="http://www.w3.org/2000/svg"
                                class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M11.5 20h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7.5m-16 -3.5h16m-10 -6v16m4 -1h7m-3 -3l3 3l-3 3" />
                            </svg>
                            Export PDF
                        </a>
                        <a href="javascript:void(0)" wire:click='createPDF' class="btn btn-white d-sm-none btn-icon">
                            <div class="spinner-border spinner-border-sm me-2" wire:loading wire:target='createPDF'>
                            </div>
                            <svg wire:loading.remove wire:target='createPDF' xmlns="http://www.w3.org/2000/svg"
                                class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M11.5 20h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7.5m-16 -3.5h16m-10 -6v16m4 -1h7m-3 -3l3 3l-3 3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        @can('create', 'App\Models\\' . $EntityClass)
                        <a href="javascript:void(0)" onclick="window.livewire.emit('create{{ $entityName }}')"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Create {{ $entityName }}
                        </a>
                        <a href="javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $entityIdentifier }}-create"
                            class="btn btn-primary d-sm-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </a>
                        @endcan
                    </div>
                </div>

            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header border-bottom">
                <div class="d-flex justify-content-start">
                    <div class="me-2">
                        <a class="btn btn-white d-none d-sm-inline-block  show" href="#navbar-extra"
                            data-bs-toggle="dropdown" role="button" aria-expanded="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="4" y1="10" x2="20" y2="10" />
                                <line x1="10" y1="4" x2="10" y2="20" />
                            </svg>
                            <span class="nav-link-title">
                                Search by {{ $search['param'] }}
                            </span>
                        </a>
                        <a class="btn btn-white d-sm-none btn-icon  show" href="#navbar-extra" data-bs-toggle="dropdown"
                            role="button" aria-expanded="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="4" y1="10" x2="20" y2="10" />
                                <line x1="10" y1="4" x2="10" y2="20" />
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-demo dropdown-menu-arrow">
                            @foreach ($searchBy as $meta)
                                <a class="dropdown-item" href="javascript:void(0)"
                                    wire:click='updateSearch("param","{{ $meta }}")'>{{ $meta }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="input-icon me-2">
                        <span class="input-icon-addon">
                            <svg wire:loading.remove wire:target="search.input" xmlns="http://www.w3.org/2000/svg"
                                class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="10" cy="10" r="7"></circle>
                                <line x1="21" y1="21" x2="15" y2="15"></line>
                            </svg>
                            <div wire:loading wire:target="search.input"
                                class="spinner-border spinner-border-sm text-muted" role="status">
                            </div>
                        </span>
                        <input type="text" class="form-control" placeholder="Search"
                            wire:model.debounce.500ms='search.input'>
                    </div>
                    <div class="me-2">
                        <a class="btn btn-white d-none d-sm-inline-block show" href="#navbar-extra"
                            data-bs-toggle="dropdown" role="button" aria-expanded="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                            </svg>
                            <span class="nav-link-title">
                                Sort by {{ $search['order'] }}
                            </span>
                        </a>
                        <a class="btn btn-icon d-sm-none btn-white show" href="#navbar-extra" data-bs-toggle="dropdown"
                            role="button" aria-expanded="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-demo dropdown-menu-arrow">
                            @foreach ($sortBy as $meta)
                                <a class="dropdown-item" href="javascript:void(0)"
                                    wire:click='updateSearch("order","{{ $meta }}")'>{{ $meta }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-white d-none d-sm-inline-block show" href="javascript:void(0)"
                            wire:click="toggleOrderMode">
                            @if ($search['mode'] == 'Asc')
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="4" y1="6" x2="11" y2="6" />
                                    <line x1="4" y1="12" x2="11" y2="12" />
                                    <line x1="4" y1="18" x2="13" y2="18" />
                                    <polyline points="15 9 18 6 21 9" />
                                    <line x1="18" y1="6" x2="18" y2="18" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="4" y1="6" x2="13" y2="6" />
                                    <line x1="4" y1="12" x2="11" y2="12" />
                                    <line x1="4" y1="18" x2="11" y2="18" />
                                    <polyline points="15 15 18 18 21 15" />
                                    <line x1="18" y1="6" x2="18" y2="18" />
                                </svg>
                            @endif
                            <span class="nav-link-title d-none d-sm-inline-block">
                                {{ $search['mode'] }}
                            </span>
                        </a>
                    </div>
                    <div class="me-2">
                        <a class="btn btn-icon d-sm-none btn-white show" href="javascript:void(0)"
                            wire:click="toggleOrderMode">
                            @if ($search['mode'] == 'Asc')
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="4" y1="6" x2="11" y2="6" />
                                    <line x1="4" y1="12" x2="11" y2="12" />
                                    <line x1="4" y1="18" x2="13" y2="18" />
                                    <polyline points="15 9 18 6 21 9" />
                                    <line x1="18" y1="6" x2="18" y2="18" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="4" y1="6" x2="13" y2="6" />
                                    <line x1="4" y1="12" x2="11" y2="12" />
                                    <line x1="4" y1="18" x2="11" y2="18" />
                                    <polyline points="15 15 18 18 21 15" />
                                    <line x1="18" y1="6" x2="18" y2="18" />
                                </svg>
                            @endif
                        </a>
                    </div>
                    @foreach ($dateRanges as $key => $value)
                        <div class="input-icon me-2" wire:ignore>
                            <span class="input-icon-addon">
                                @if ($value == 'created_at')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <line x1="10" y1="16" x2="14" y2="16" />
                                        <line x1="12" y1="14" x2="12" y2="18" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <rect x="8" y="15" width="2" height="2" />
                                    </svg>
                                @endif
                                <div wire:loading wire:target="dateFilters.created_at"
                                    class="spinner-border spinner-border-sm text-muted" role="status">
                                </div>
                            </span>
                            <input id="dateFilters-{{ $value }}" type="text" class="form-control"
                                placeholder="{{ $key }}">
                            <script type="text/javascript">
                                $(function() {

                                    $('input[id="dateFilters-{{ $value }}"]').daterangepicker({
                                        autoUpdateInput: false,
                                        locale: {
                                            cancelLabel: 'Clear'
                                        },

                                        ranges: {
                                            'Today': [moment(), moment()],
                                            'Yesterday': [moment().subtract(1, 'days'), moment()
                                                .subtract(1, 'days')
                                            ],
                                            'Last 7 Days': [moment().subtract(6, 'days'),
                                                moment()
                                            ],
                                            'Last 30 Days': [moment().subtract(29, 'days'),
                                                moment()
                                            ],
                                            'This Month': [moment().startOf('month'), moment()
                                                .endOf('month')
                                            ],
                                            'Last Month': [moment().subtract(1, 'month')
                                                .startOf('month'), moment().subtract(1,
                                                    'month').endOf('month')
                                            ]
                                        }
                                    }, (start, end) => {
                                        $('input[id="dateFilters-{{ $value }}"]').val(start
                                            .format(
                                                'D-MM-YYYY') +
                                            ' - ' +
                                            end.format('D-MM-YYYY'));
                                    });



                                    $('input[id="dateFilters-{{ $value }}"]').on(
                                        'apply.daterangepicker',
                                        function(ev, picker) {
                                            let val = picker.startDate.format('YYYY/MM/DD') +
                                                ' - ' + picker.endDate.format('YYYY/MM/DD');
                                            $(this).val(val);
                                            @this.set('dateFilters.{{ $value }}', val);
                                        });

                                    $('input[id="dateFilters-{{ $value }}"]').on(
                                        'cancel.daterangepicker',
                                        function(ev, picker) {
                                            @this.set('dateFilters.{{ $value }}', null);
                                        });

                                });

                            </script>

                        </div>
                    @endforeach
                    @foreach ($states as $key => $value)
                        <div class="me-2">
                            <a class="btn btn-white d-none d-sm-inline-block  show" href="#navbar-extra"
                                data-bs-toggle="dropdown" role="button" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5" />
                                </svg>
                                <span class="nav-link-title">
                                    {{ $value['display'] }} {{ $stateFilters[$key] }}
                                </span>
                            </a>
                            <a class="btn btn-white d-sm-none btn-icon  show" href="#navbar-extra"
                                data-bs-toggle="dropdown" role="button" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5" />
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-demo dropdown-menu-arrow">
                                <a class="dropdown-item" href="javascript:void(0)"
                                    wire:click='updateState("{{ $key }}","")'>All</a>
                                @foreach ($value['scheme'] as $scheme)
                                    <a class="dropdown-item" href="javascript:void(0)"
                                        wire:click='updateState("{{ $key }}","{{ $scheme['mode'] }}")'>{{ $scheme['mode'] }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($searchEmpty)
                <div class="empty">
                    <div class="empty-img"><img
                            src="{{ asset('assets/img/static/illustrations/undraw_No_data_re_kwbl.svg') }}"
                            height="128" alt="">
                    </div>
                    <p class="empty-title m-0">No Results</p>
                </div>
            @else
                @if ($listView)
                    @include('partials.livewire-components.table-list')
                @else
                    <div class="d-block d-lg-none">
                        @include('partials.livewire-components.table-list')
                    </div>
                    <div class="d-none d-lg-block">
                        <div class="list-group-item border-0 bg-light">
                            <div class="row align-items-center">
                                @for ($i = 0; $i < collect($columns)->count(); $i++)
                                    @if ($columns[$i]['display'] == true)
                                        <div class="{{ $i == 0 || $columns[$i]['type'] == 'image' || $columns[$i]['type'] == 'imageText' ? 'col-auto' : 'col' }}
                                            font-weight-bold text-muted">
                                            {{ $columns[$i]['header'] }}
                                        </div>
                                    @endif
                                @endfor
                                <div class="col-auto font-weight-bold text-muted">
                                    Actions
                                </div>
                            </div>
                        </div>
                        @foreach ($entities as $entity)
                            <div class="list-group-item border-left-0 border-right-0 border-top-0">
                                <div class="row align-items-center">
                                    @for ($i = 0; $i < collect($columns)->count(); $i++)
                                        @if ($columns[$i]['display'] == true)
                                            <div
                                                class="{{ $i == 0 || $columns[$i]['type'] == 'image' || $columns[$i]['type'] == 'imageText' ? 'col-auto ' : 'col' }}">
                                                @switch($columns[$i]['type'])
                                                    @case('imageText')
                                                    <span class="avatar"> {{ $entity[$columns[$i]['key']] }}</span>
                                                    @break
                                                    @case('text')
                                                    {{ $entity[$columns[$i]['key']] }}
                                                    @break
                                                    @case('badge')
                                                    @foreach ($columns[$i]['scheme'] as $scheme)
                                                        @if ($entity[$columns[$i]['key']] == $scheme['mode'])
                                                            <span class="badge bg-{{ $scheme['color'] }}">
                                                        @endif
                                                    @endforeach
                                                    {{ $entity[$columns[$i]['key']] }}</span>
                                                    @break
                                                    @case('date')
                                                    @if ($entity[$columns[$i]['key']] == null)
                                                        NA
                                                    @else
                                                        @if (isset($columns[$i]['format']))
                                                            {{ $entity[$columns[$i]['key']]->format($columns[$i]['format']) }}
                                                        @else
                                                            {{ $entity[$columns[$i]['key']] }}
                                                        @endif
                                                    @endif
                                                    @break
                                                    @default
                                                @endswitch
                                            </div>
                                        @endif
                                    @endfor
                                    <div class="col-auto">
                                        @include('partials.livewire-components.action-buttons')
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endif
            <div class="list-group-item border-left-0 border-right-0 border-top-0 ">
                <div class="d-flex justify-content-between">
                    <div class="my-auto">
                        <a class="btn-sm px-0 show" href="#navbar-extra" data-bs-toggle="dropdown" role="button"
                            aria-expanded="true">
                            <span class="nav-link-title">
                                Show {{ $pageSize }} Records
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-demo dropdown-menu-arrow">
                            <a class="dropdown-item" href="javascript:void(0)" wire:click='updatePageSize(25)'>25</a>
                            <a class="dropdown-item" href="javascript:void(0)" wire:click='updatePageSize(50)'>50</a>
                            <a class="dropdown-item" href="javascript:void(0)" wire:click='updatePageSize(75)'>75</a>
                            <a class="dropdown-item" href="javascript:void(0)" wire:click='updatePageSize(100)'>100</a>
                            <a class="dropdown-item" href="javascript:void(0)"
                                wire:click='updatePageSize("All")'>All</a>
                            <div class="dropdown-item d-flex justify-content-between">
                                <div class="me-2 ">
                                    <input type="text" class="form-control form-control-sm" id="input-pageSize-{{$entityIdentifier}}">
                                </div>
                                <div class="btn-list">
                                    <div class="btn btn-sm btn-outline-success btn-icon py-0 my-auto"
                                        onclick="setPageSize()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </div>
                                    <div class="btn btn-sm btn-outline-danger btn-icon py-0 my-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="18" y1="6" x2="6" y2="18" />
                                            <line x1="6" y1="6" x2="18" y2="18" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $entities->links() }}
                    <style>
                        .pagination {
                            margin: 0px !important
                        }

                    </style>
                </div>
            </div>
        </div>
    @endif
    <script>
        if (document.getElementById('nav-{{ $entityIdentifier }}-list')) document.getElementById(
            'nav-{{ $entityIdentifier }}-list').classList.add("active");

        function setPageSize() {
            let size = document.getElementById('input-pageSize-{{$entityIdentifier}}').value;

            alert(size);
            if (size == undefined || size == null || size.length <= 0) {
                return;
            } else {
                @this.set('pageSize', size);
            }
        }
    </script>
</div>
