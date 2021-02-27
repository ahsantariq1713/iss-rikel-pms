<div>
    <style>
        .form-control:focus,
        .form-control:active {
            outline: none !important;
            box-shadow: none;
        }
    </style>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Manage
                </div>
                <h2 class="page-title">
                    Project Budget
                </h2>
            </div>
            <div class="col-auto ms-auto pe-0">
                <div class="btn-list">
                    <a href="javascript:void(0)" disabled  class="btn btn-white d-none d-sm-inline-block disabled">
                        <div class="spinner-border spinner-border-sm me-2" wire:loading wire:target='createPDF'>
                        </div>
                        <svg wire:loading.remove wire:target='createPDF' xmlns="http://www.w3.org/2000/svg" class="icon"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M11.5 20h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7.5m-16 -3.5h16m-10 -6v16m4 -1h7m-3 -3l3 3l-3 3" />
                        </svg>
                        Export PDF
                    </a>
                    <a href="javascript:void(0)" disabled  class="btn btn-white d-sm-none btn-icon disabled">
                        <div class="spinner-border spinner-border-sm me-2" wire:loading wire:target='createPDF'>
                        </div>
                        <svg wire:loading.remove wire:target='createPDF' xmlns="http://www.w3.org/2000/svg" class="icon"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M11.5 20h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7.5m-16 -3.5h16m-10 -6v16m4 -1h7m-3 -3l3 3l-3 3" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    @can('send', $budget)
                    <a  href="javascript:void(0)" onclick="window.livewire.emit()"
                    class="btn btn-primary d-none d-sm-inline-block disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Notify Developer
                </a>
                <a  href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal--create"
                    class="btn btn-primary d-sm-none btn-icon disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
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


        <div class="row mb-4">
            <div class="col-12">
                <div class="row row-cards row-deck">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <div class="text-end text-green">
                                </div>
                                <div class="h1 m-0 mt-3">${{number_format($budget->prTotalExpense)}}</div>
                                <div class="text-muted mb-3">Permanent Relocation</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <div class="text-end text-green">
                                </div>
                                <div class="h1 m-0 mt-3">${{number_format($budget->trTotalExpense)}}</div>
                                <div class="text-muted mb-3">Temporary Relocation</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body p-2 text-center">
                                <div class="text-end text-green">
                                </div>
                                <div class="h1 m-0 mt-3">${{number_format($budget->totalConsultancy)}}</div>
                                <div class="text-muted mb-3">Consultancy Fee</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-success">
                            <div class="card-body p-2 text-center">
                                <div class="text-end text-green">
                                </div>
                                <div class="h1 m-0 mt-3 text-white">${{number_format($budget->grandTotal)}}</div>
                                <div class="text-muted mb-3 text-white">Grand Total</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="list-group list-group-flush list-details">
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-12  d-flex justify-content-start">
                            <span class="font-weight-bold">Tenants Summary</span>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Permanent Relocations</span>
                        </div>
                        <div class="col-4 text-left">
                            {{ $budget->prResidents }}
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Temp. Relocations</span>
                        </div>
                        <div class="col-4 text-left">
                            {{ $budget->trResidents }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <h2 class="mb-2 mt-4">Permanent Relocation Tenants</h2>
        <div class="card mb-3">
            <div class="list-group list-group-flush list-details">
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Relocations</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->prResidents }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Sum of All Residents Rent</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->prRent }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Utility</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.pr_utility' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.pr_utility' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.pr_utility') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.pr_utility'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Average Monthly Rent</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->prRentAverage }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            Per Tenant
                        </div>
                    </div>
                </div>


                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Comparable Rent</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.pr_comparable_rent' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.pr_comparable_rent'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.pr_comparable_rent') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.pr_comparable_rent'>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            Per Tenant
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2 bg-border">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Rental Assistance Payment</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->prRentAssist }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            ${{ $budget->prRentAssistUnit }} Per Tenant
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Moving Expenses</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.pr_moving_expense' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.pr_moving_expense'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.pr_moving_expense') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.pr_moving_expense'>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            Per Tenant
                        </div>
                    </div>
                </div>


                <div class="list-group-item bg-border py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Moving Expenses</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->prTotalMovingExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2 bg-secondary">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class=" text-white">Total Expenses</span>
                        </div>
                        <div class="col-4 text-left  text-white">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon  text-white" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control  text-white px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->prTotalExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-white small my-auto justify-content-end">
                            For {{ $budget->prResidents }} Permanent Relocations
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <h2 class="mb-2 mt-4">Temporary Relocation Tenants (Off-Site)</h2>
        <div class="card mb-3">
            <div class="list-group list-group-flush list-details">
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Offsite Relocations</span>
                        </div>
                        <div class="col-8 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.tr_offsite' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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

                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.tr_offsite') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.tr_offsite'>
                                    @error('budget.tr_offsite')
                                        <span class="invalid-feedback">{{ $errors->first('budget.tr_offsite') }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Sum of All Residents Rent</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOffRent }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Utility</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.tr_utility' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.tr_utility' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.tr_utility') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.tr_utility'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Average Monthly Rent</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOffRentAverage }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            Per Tenant
                        </div>
                    </div>
                </div>


                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Comparable Rent</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.tr_comparable_rent' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.tr_comparable_rent'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.tr_comparable_rent') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.tr_comparable_rent'>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            Per Tenant
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2 bg-border">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Rental Assistance Payment</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOffRentAssist }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            ${{ $budget->trOffRentAssistUnit }} Per Tenant
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Moving Expenses</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.tr_off_moving_expense'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.tr_off_moving_expense'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.tr_off_moving_expense') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.tr_off_moving_expense'>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            Per Tenant
                        </div>
                    </div>
                </div>


                <div class="list-group-item bg-border py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Moving Expenses</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOffTotalMovingExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2 bg-secondary">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class=" text-white">Total Expenses</span>
                        </div>
                        <div class="col-4 text-left  text-white">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon  text-white" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control  text-white px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOffTotalExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-white small my-auto justify-content-end">
                            For {{ $budget->tr_offsite }} Temp. Relocations Off-Site
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <h2 class="mb-2 mt-4">Temporary Relocation Tenants (On-Site)</h2>
        <div class="card mb-3">
            <div class="list-group list-group-flush list-details">

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Relocations (On-Site)</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOnsite }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Moving Expenses</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.tr_on_moving_expense'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.tr_on_moving_expense'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.tr_on_moving_expense') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.tr_on_moving_expense'>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-muted small my-auto justify-content-end">
                            Per Tenant
                        </div>
                    </div>
                </div>


                <div class="list-group-item bg-border py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Moving Expenses</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOnTotalMovingExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="list-group-item py-2 bg-secondary">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class=" text-white">Total Expenses</span>
                        </div>
                        <div class="col-4 text-left  text-white">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon  text-white" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control  text-white px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOnTotalExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-white small my-auto justify-content-end">
                            For {{ $budget->trOnsite }} Temp. Relocations On-Site
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <h2 class="mb-2 mt-4">Consultant Costs</h2>
        <div class="card mb-3">
            <div class="list-group list-group-flush list-details">
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-12  d-flex justify-content-start">
                            <span class="font-weight-bold">Permanent Relocation Consultancy</span>
                        </div>
                    </div>
                </div>
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Per Case Fee</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.pr_consultancy' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.pr_consultancy'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.pr_consultancy') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.pr_consultancy'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item bg-border py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Fee</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->prTotalConsultancy }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex small my-auto justify-content-end">
                            For {{ $budget->prResidents }} Parmanent Relocations
                        </div>
                    </div>

                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-12  d-flex justify-content-start">
                            <span class="font-weight-bold">Temp. Relocation Consultancy (Off-Site)</span>
                        </div>
                    </div>
                </div>
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Per Case Fee</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.tr_consultancy_off' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.tr_consultancy_off'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.tr_consultancy_off') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.tr_consultancy_off'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item bg-border py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Fee</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trTotalConsultancyOff }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex small my-auto justify-content-end">
                            For {{ $budget->tr_offsite }} Temp. Relocation Off-Site
                        </div>
                    </div>

                </div>

                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-12  d-flex justify-content-start">
                            <span class="font-weight-bold">Temp. Relocation Consultancy (On-Site)</span>
                        </div>
                    </div>
                </div>
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Per Case Fee</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg wire:loading wire:targer='budget.tr_consultancy_on' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <svg wire:loading.remove wire:target='budget.tr_consultancy_on'
                                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control px-1 py-0 border-0 bg-white @error('budget.tr_consultancy_on') is-invalid @enderror"
                                        {{Auth::user()->can('update', $budget) ?  '' :  'readonly' }}  wire:model.debounce.500ms= 'budget.tr_consultancy_on'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item bg-border py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Total Fee</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trTotalConsultancyOn }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex small my-auto justify-content-end">
                            For {{ $budget->trOnsite }} Temp. Relocation On-Site
                        </div>
                    </div>

                </div>

                <div class="list-group-item py-2 bg-secondary">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class=" text-white">Total Consultancy Fee</span>
                        </div>
                        <div class="col-4 text-left  text-white">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon  text-white" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control  text-white px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->totalConsultancy }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 d-flex text-white small my-auto justify-content-end">
                            For {{ $budget->totalResidents }} Relocations
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mb-2 mt-4">Total Expenses</h2>
        <div class="card mb-3">
            <div class="list-group list-group-flush list-details">
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Permanent Relocation</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->prTotalExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Temp. Relocation (Off-Site)</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOffTotalExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Temp. Relocation (On-Site)</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->trOnTotalExpense }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item py-2">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-muted">Consultancy Cost</span>
                        </div>
                        <div class="col-4 text-left">
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                                <div class="form-group">
                                    <input type="text" class="form-control px-1 py-0 border-0 bg-transparent"
                                        value="{{ $budget->totalConsultancy }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group-item py-2 bg-primary">
                    <div class="row align-items-center">
                        <div class="col-4 text-flex justify-content-start">
                            <span class="text-white h3 m-0">Grand Total</span>
                        </div>
                        <div class="col-4 text-left text-white">
                            <span class="text-white h3 m-0">$ {{ number_format($budget->grandTotal) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
