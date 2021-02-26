<?php

namespace App\Http\Livewire\Invoice;

use App\Helpers\Swal;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class InvoiceEdit extends Component
{
    use AuthorizesRequests;

    public $invoice = null, $invoiceItems = [];

    protected $rules = [
        'invoice.due_date' => 'nullable',
    ];

    protected $listeners = ['editInvoice' => 'edit', 'invoiceItemUpdated', 'invoiceItemDeleted'];


    public function edit($id)
    {
        $this->invoice = Invoice::findOrFail($id);
        $this->authorize('update', $this->invoice);
        if($this->invoice->invoiceItems === null || $this->invoice->invoiceItems->count() === 0){
            InvoiceItem::create(['invoice_id'=>$this->invoice->id]);
        }
        $this->invoice->refresh();
        $this->emit('showInvoiceEditForm');
    }

    public function addRow(){
        InvoiceItem::create(['invoice_id'=>$this->invoice->id]);
        $this->invoice->refresh();
    }

    public function invoiceItemUpdated($invoiceItem){
        $this->invoice->refresh();
    }

    public function invoiceItemDeleted($invoiceItem){
        if($this->invoice->invoiceItems === null || $this->invoice->invoiceItems->count() === 0){
            InvoiceItem::create(['invoice_id'=>$this->invoice->id]);
        }
        $this->invoice->refresh();
    }

    public function markPaid(){
        $this->authorize('markPaid', $this->invoice);
        $this->invoice->paid_date = now();
        $this->invoice->status = 'Paid';
        $this->invoice->update();
        Swal::alert($this,'success','Invoice Paid', 'Invoice marked as paid sucessfully', 'Ok', 1500);
    }

    public function updated($property){
        $this->validateOnly($property);
        $this->authorize('update', $this->invoice);
        $this->invoice->update();
        $this->emit('invoiceUpdated', $this->invoice);
    }

    public function render()
    {
        return view('livewire.invoice.invoice-edit');
    }


}
