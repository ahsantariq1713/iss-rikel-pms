<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Invoice;
use App\Traits\Searchable;
use Livewire\Component;

class InvoiceList extends Component
{
    use Searchable;

    public $projectId;

    protected $listeners = ['invoiceCreated', 'invoiceUpdated'];

    public function invoiceCreated($invoice)
    {
    }
    public function invoiceUpdated($invoice)
    {
    }

    public function mount($projectId)
    {
        $this->projectId = $projectId;
        $this->registerEntity(Invoice::class);
        $this->entityName = 'Invoice';
        $this->entityNamePlural = 'Invoices';
        $this->entityIdentifier = 'invoice';

        $this->setSearchBy(['Id']);
        $this->setSortBy(['Id', 'Due Date' , 'Paid Date', 'Grand Total' , 'Created At', 'Updated At']);

        $this->setColumns([
            ['key' => 'id',  'type' => 'text', 'header' => '#', 'display' => true],
            ['key' => 'due_date', 'type' => 'date', 'header' => 'Due Date', 'display' => true, 'format' => 'd M, Y'],
            ['key' => 'paid_date', 'type' => 'date', 'header' => 'Paid Date', 'display' => true, 'format' => 'd M, Y'],
            ['key' => 'grand_total', 'type' => 'text', 'header' => 'Amount', 'display' => false],
            [
                'key' => 'status', 'type' => 'badge', 'header' => 'Status', 'display' => true,
                'scheme' => [
                    ['mode' => 'Pending', 'color' => 'primary'],
                    ['mode' => 'Paid', 'color' => 'success'],
                    ['mode' => 'Late', 'color' => 'danger']
                ]
            ],
            ['key' => 'created_at', 'type' => 'date', 'header' => 'Created Date', 'display' => false, 'format' => 'd M, Y'],
            ['key' => 'updated_at', 'type' => 'date', 'header' => 'Updated Date', 'display' => false, 'format' => 'd M, Y'],
        ]);

        $this->setListColumns([
            ['key' => 'imageText', 'type' => 'imageText', 'header' => 'Image', 'display' => false],
            ['key' => 'id', 'type' => 'text', 'header' => '#','display' => true],
            ['key' => 'status', 'type' => 'text', 'header' => 'Status','display' => true],
        ]);

        $this->setDateRanges(['Due Date Range' => 'due_date']);
        // $this->setDateRanges(['Paid Date Range' => 'paid_date']);

        $this->setStateFilters([
            'status' =>
            [
                'display' => 'Status', 'scheme' => [
                    ['mode' => 'Pending', 'color' => 'primary'],
                    ['mode' => 'Paid', 'color' => 'success'],
                    ['mode' => 'Late', 'color' => 'danger']
                ]
            ]
        ]);



        $this->setWhereRelationList([
            ['project_id' ,$this->projectId]
        ]);

        $this->initSearch([['key' => 'param', 'value' => 'Id']]);
    }

    public function edit($id)
    {
        $this->emit('editInvoice', $id);
    }

    public function updated($property)
    {
        $this->updatedSearch($property);
    }

    public function render()
    {
        $entities = $this->getData();
        return view('livewire.invoice.invoice-list', compact('entities'));
    }
}
