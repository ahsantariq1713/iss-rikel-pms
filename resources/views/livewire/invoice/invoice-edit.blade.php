<div>

    <a href="javascript:void(0)" id="modal-invoice-edit-open" hidden data-bs-toggle="modal"
        data-bs-target="#modal-invoice-edit" class="btn btn-primary"></a>

    <div class="modal modal-blur fade" id="modal-invoice-edit" tabindex="-1" aria-hidden="true" style="display: none;"
        wire:ignore.self>

        <div class="modal-dialog modal-lg modal-full-width modal-dialog-centered   px-5" role="document">

            @if ($invoice)
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Invoice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body bg-border">
                        <div class="text-right">
                            <h2 class="m-0 p-0">Rikel PMS</h2>
                            <small>https://rikel./com <span class="text-muted">|</span> info@rikel.com <span
                                    class="text-muted">|</span> +92 61 254 74589</small><br>
                            <small>Shah Shams Colony, Verhari Road, Multan Punjab Pakistan, 60000</small>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-lg-5 mt-3">
                                <div class="row">
                                    <div class="col-5 text-muted">
                                        Due Date:
                                    </div>
                                    <div class="col-7 text-right">
                                        <input wire:model.debounce.500ms="invoice.due_date" class="input-borderless"
                                            type="date">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-5 text-muted">
                                        Paid Date:
                                    </div>
                                    <div class="col-7 text-right">
                                        {{ $invoice->paid_date ? $invoice->paid_date->format('d M, Y') : 'Nil' }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-muted">
                                        Status:
                                    </div>
                                    <div class="col-7 text-right">
                                        {{ $invoice->status }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-muted">
                                        Invoice #:
                                    </div>
                                    <div class="col-7 text-right">
                                        {{ $invoice->id }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 text-muted">
                                        Project:
                                    </div>
                                    <div class="col-7 text-right">
                                        {{ $invoice->project->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 offset-lg-2 mt-3">
                                <span class="text-muted"> Bill To:</span><br>
                                {{ $invoice->project->developer->name }}<br>
                                {{ $invoice->project->developer->work_phone }}<br>
                                {{ $invoice->project->developer->email }}<br>

                            </div>
                        </div>
                    </div>
                    <div class="modal-body">

                        <style>
                            .input-borderless {
                                border: none;
                                background-color: transparent !important;
                            }

                            .input-borderless:active,
                            .input-borderless:focus {
                                outline: none;
                                shadow: none
                            }

                            th {
                                border: none;
                                border-bottom: 1px solid
                            }

                            td {
                                padding: 10px 0px;
                                text-align: center
                            }

                            td input {
                                border: none;
                                background-color: transparent !important;
                                width: 100%;
                            }

                            td input:active,
                            td input:focus {
                                outline: none;
                                shadow: none
                            }

                            th:last-child,
                            td:last-child {
                                width: 10%;
                            }

                            td:first-child,
                            th:first-child {
                                width: 5%;
                                border-right: none;
                            }

                            td:nth-child(2),
                            th:nth-child(2) {
                                width: 35%;
                            }


                            td:last-child,
                            th:last-child {
                                text-align: right;
                                padding-right: 5px
                            }

                            td:nth-child(2) input,
                            th:nth-child(2) {
                                text-align: left;
                            }

                            td input,
                            th {
                                text-align: center
                            }

                            td {
                                border-right: 1px solid black;
                            }

                            th:nth-child(7),
                            td:nth-child(7) {
                                width: 10%
                            }

                        </style>
                        <table>
                            <tr>
                                <th></th>
                                <th>Employee</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Wage/Hr.</th>
                                <th>Hours</th>
                                <th>Total Wages</th>
                                <th>Lodging</th>
                                <th>Milage</th>
                                <th>Amount</th>
                            </tr>
                            <div wire:ignore>
                                @foreach ($invoice->invoiceItems as $item)
                                    <livewire:invoice.invoice-item-edit :invoiceItem='$item' :key="$item->id" />
                                @endforeach
                            </div>
                            <tr style="border-top:1px solid black">
                                <td></td>
                                <td style="border-right:none;"></td>
                                <td style="border-right:none;"></td>
                                <td style="border-right:none;"></td>
                                <td style="border-right:none;"></td>
                                <td><strong>Total</strong></td>
                                <td><strong>${{ number_format($invoice->totalWagesAmount) }}</strong></td>
                                <td><strong>${{ number_format($invoice->totalLodgingExpense) }}</strong></td>
                                <td><strong>${{ number_format($invoice->totalMilageExpense) }}</strong></td>
                                <td style="background-color:black;color:white;font-weight:bold">
                                    ${{ number_format($invoice->grandTotal) }}</td>
                            </tr>
                        </table>
                        <div class="row mb-3">
                            <div class="col">
                                <a class="btn btn-link" wire:click="addRow" href="javascript:void(0)">Add Row</a>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer w-100 d-flex justify-content-between">
                        <div>
                            <div wire:loading wire:loading.delay>
                                <span class="spinner-border"> </span><i>
                                    Updating ...</i>
                            </div>
                        </div>

                        <div class="btn-list">
                            <button {{$invoice->paid_date ? 'disabled' : '' }} wire:click='markPaid' wire:loading.attr='disabled' class="btn btn-success me-2">
                                <div class="spinner-border spinner-border-sm me-2" role="status"
                                    wire:target='markPaid' wire:loading.delay>
                                </div>
                                <svg wire:loading.remove wire:target='markPaid' xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                    <rect x="9" y="3" width="6" height="4" rx="2" />
                                    <path d="M14 11h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                    <path d="M12 17v1m0 -8v1" />
                                </svg>
                                Mark Paid
                            </button>
                            <button disabled class="btn btn-white ms-auto">
                                <svg wire:loading.remove wire:target='createPDF' xmlns="http://www.w3.org/2000/svg"
                                    class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M11.5 20h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7.5m-16 -3.5h16m-10 -6v16m4 -1h7m-3 -3l3 3l-3 3" />
                                </svg>
                                Export PDF
                            </button>
                        </div>
                    </div>



                </div>
            @endif

        </div>

    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            $('#modal-invoice-edit').modal({
                backdrop: 'static',
                keyboard: false
            });
            window.livewire.on('showInvoiceEditForm', function() {
                document.getElementById('modal-invoice-edit-open').click();
            });
            window.livewire.on('closeInvoiceEditForm', function() {
                document.getElementById('modal-invoice-edit-dismiss').click();
            });
        });

    </script>
</div>
