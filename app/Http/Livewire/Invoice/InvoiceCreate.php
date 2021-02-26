<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Invoice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class InvoiceCreate extends Component
{
    use AuthorizesRequests;

    public $projectId;

    public function mount($projectId){
        $this->projectId = $projectId;
    }

    protected $listeners = ['createInvoice' => 'create'];

    public function create(){
        $this->authorize('create',Invoice::class);
        $invoice = Invoice::create(['project_id' => $this->projectId]);
        $this->emit('editInvoice', $invoice->id);
        $this->emit('invoiceCreated', $invoice);
    }

    public function render()
    {
        return view('livewire.invoice.invoice-create');
    }
}
