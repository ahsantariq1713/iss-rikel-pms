<?php

namespace App\Http\Livewire\Invoice;

use App\Models\InvoiceItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class InvoiceItemEdit extends Component
{

    use AuthorizesRequests;
    public $invoiceItem = null;

    protected $rules = [
        'invoiceItem.employee_name' => 'required',
        'invoiceItem.start_date' => 'required',
        'invoiceItem.end_date' => 'required',
        'invoiceItem.hourly_wage' => 'required|integer',
        'invoiceItem.total_hours' => 'required|integer',
        'invoiceItem.lodging_expense' => 'required|integer',
        'invoiceItem.milage_expense' => 'required|integer',
    ];

    public function mount($invoiceItem){
        $this->invoiceItem = $invoiceItem;
    }

    public function delete(){
        $this->authorize('delete', $this->invoiceItem);
        $this->invoiceItem->delete();
        $this->emit('invoiceItemDeleted', $this->invoiceItem);
    }

    public function updated($property){
        $this->validateOnly($property);
        $this->authorize('update', $this->invoiceItem);
        $this->invoiceItem->update();
        $this->emit('invoiceItemUpdated', $this->invoiceItem);
    }


    public function render()
    {
        return view('livewire.invoice.invoice-item-edit');
    }
}
