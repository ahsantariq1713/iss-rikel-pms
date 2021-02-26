<?php

namespace App\Http\Livewire\Property;

use App\Models\Property;
use App\Traits\Searchable;
use Livewire\Component;

class PropertyList extends Component
{
    use Searchable;

    protected $listeners = ['propertyCreated', 'propertyUpdated'];

    public function propertyCreated($property)
    {
    }
    public function propertyUpdated($property)
    {
    }

    public function mount()
    {
        $this->registerEntity(Property::class);
        $this->entityName = 'Property';
        $this->entityNamePlural = 'Properties';
        $this->entityIdentifier = 'property';

        $this->setSearchBy(['Id', 'Name', 'Funding Source', 'Bedroom Size', 'Units','City', 'Sate']);
        $this->setSortBy(['Id', 'Name', 'City' ,'State', 'Bedroom Size', 'Units', 'Created At', 'Updated At']);

        $this->setColumns([
            ['key' => 'id',  'type' => 'text', 'header' => '#', 'display' => true],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name', 'display' => true],
            ['key' => 'build_date', 'type' => 'date', 'header' => 'Build Date', 'display' => true, 'format' => 'd M, Y'],
            ['key' => 'demolition_date', 'type' => 'date', 'header' => 'Demolition Date', 'display' => true, 'format' => 'd M, Y'],
            ['key' => 'funding_source', 'type' => 'text', 'header' => 'Funding Source', 'display' => true],
            ['key' => 'address', 'type' => 'text', 'header' => 'Address', 'display' => false],
            ['key' => 'city', 'type' => 'text', 'header' => 'City', 'display' => true],
            ['key' => 'state', 'type' => 'text', 'header' => 'State', 'display' => true],
            ['key' => 'country', 'type' => 'text', 'header' => 'Country', 'display' => false],
            ['key' => 'zipcode', 'type' => 'text', 'header' => 'Zipcode', 'display' => false],
            ['key' => 'created_at', 'type' => 'date', 'header' => 'Created Date', 'display' => false, 'format' => 'd M, Y'],
            ['key' => 'updated_at', 'type' => 'date', 'header' => 'Updated Date', 'display' => false, 'format' => 'd M, Y'],
        ]);

        $this->setListColumns([
            ['key' => 'imageText', 'type' => 'imageText', 'header' => 'Image', 'display' => false],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name', 'display' => true],
            ['key' => 'city', 'type' => 'text', 'header' => 'City', 'display' => true],
        ]);

        $this->setDateRanges(['Created Date Range' => 'created_at', 'Demolition Date Range' => 'demolition_date']);

        $this->initSearch([['key' => 'param', 'value' => 'Name']]);
    }

    public function edit($id)
    {
        $this->emit('editProperty', $id);
    }

    public function updated($property){

        $this->updatedSearch($property);
    }


    public function render()
    {
        $entities = $this->getData();
        return view('livewire.property.property-list', compact('entities'));
    }
}
