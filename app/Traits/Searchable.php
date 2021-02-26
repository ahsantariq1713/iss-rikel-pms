<?php

namespace App\Traits;

use App\Helpers\StringConvertor;
use Carbon\Carbon;
use Livewire\WithPagination;
use PDF;

trait Searchable
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = [
        'param' => 'Id',
        'input' => '',
        'order' => 'Id',
        'mode' => 'Asc'
    ];

    public $EntityClass =  null;
    public $searchBy = [], $sortBy = [], $columns = [], $listColumns = [];
    public $dateRanges = [], $dateFilters = [], $states = [], $stateFilters = [];
    public $pageSize = 25, $searchEmpty = false, $tableEmtpty = false;
    public $entityName, $entityNamePlural, $entityIdentifier;
    public $listView = false, $viewMode = 'modal', $importAllowed = false;
    public $withList = [], $whereList = [], $whereRelationList = [];

    public $rules = [
        'search.param' => 'required',
        'search.input' => 'nullable',
        'search.order' => 'nullable',
        'search.mode' => 'nullable',
        'pageSize' => 'required',
    ];

    public function registerEntity($EntityClass)
    {
        $this->EntityClass = $EntityClass;
    }

    public function initSearch($searchDict)
    {
        foreach ($searchDict as $item) {
            $this->search[$item['key']] = $item['value'];
        }

        foreach ($this->dateRanges as $key => $value) {
            $this->rules['dateFilters.' . $value] = 'nullable';
            $this->dateFilters[$value] = null;
        }

        foreach ($this->states as $key => $value) {
            $this->rules['stateFilters.' . $key] = 'nullable';
            $this->stateFilters[$key] = null;
        }
    }

    public function toggleColumn($id)
    {
        for ($i = 0; $i < collect($this->columns)->count(); $i++) {
            if ($this->columns[$i]['key'] == $id) {
                $this->columns[$i]['display'] = !$this->columns[$i]['display'];
            }
        }
    }

    public function setSearchBy($searchBy)
    {
        $this->searchBy = $searchBy;
        $this->search['param'] = $this->searchBy[0];
    }

    public function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
        $this->search['order'] = $this->sortBy[0];
    }

    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    public function setListColumns($columns)
    {
        $this->listColumns = $columns;
    }

    public function setStateFilters($states)
    {
        $this->states = $states;
    }

    public function setViewModelRedirect()
    {
        $this->viewMode = 'redirect';
    }

    public function setDateRanges($dateRanges)
    {
        foreach ($dateRanges as $key => $value) {
            $this->dateRanges[$key] = $value;
        }
    }

    public function setListViewDefault()
    {
        $this->listView = true;
    }

    public function setWithList($list)
    {
        $this->withList = $list;
    }

    public function setwhereRelationList($list)
    {
        $this->whereRelationList = $list;
    }

    public function setwhereList($list)
    {
        $this->whereList = $list;
    }

    public function setImportAllowed()
    {
        $this->importAllowed = true;
    }

    public function toggleOrderMode()
    {
        $this->search['mode'] = $this->search['mode'] == 'Asc' ? 'Desc' : 'Asc';
    }

    public function updateSearch($key, $val)
    {
        $this->resetPage();
        $this->search[$key] = $val;
    }

    public function updateState($key, $val)
    {
        $this->resetPage();
        $this->stateFilters[$key] = $val;
    }

    public function updatedSearch($property)
    {

        if ($property == 'search.input') {
            $this->resetPage();
        } else if (str_contains($property, 'dateFilters')) {
            $this->resetPage();
        } else if (str_contains($property, 'stateFilters')) {
            $this->resetPage();
        }
    }

    public function updatePageSize($size)
    {
        if ($size == null || ((int)$size == 0 && $size != 'All') || strlen($size) <= 0) {
            return;
        }

        $this->resetPage();
        $this->pageSize = $size;
    }

    public function createPDF()
    {
        $data['entities'] = $this->getData($this->EntityClass);
        $data['columns'] = $this->columns;
        $pdf = PDF::loadView('partials.livewire-components.pdf-table', compact('data'))->setPaper('a4', 'portrait');
        $filename = $this->entityNamePlural . '_' . now()->format('d_M_Y') .  '_' . time() .  '.pdf';
        $pdf->save($filename);
        return response()->download($filename)->deleteFileAfterSend(true);
    }

    public function getData()
    {
        $query = $this->getQuery();
        return $this->makePagination($query);
    }


    public function getQuery()
    {
        $query = $this->EntityClass::with($this->withList)
            ->where($this->whereRelationList)
            ->where($this->whereList)
            ->where(StringConvertor::toPropCase($this->search['param']), 'like', "%" . $this->search['input'] . "%")
            ->orderBy(StringConvertor::toPropCase($this->search['order']), StringConvertor::toPropCase($this->search['mode']));

        foreach ($this->dateFilters as $key => $value) {
            if ($value != null) {
                $dates = explode('-', $value);
                $from = Carbon::parse(trim($dates[0]))->setTime(0, 0);
                $to = Carbon::parse(trim($dates[1]))->setTime(23, 59, 59);
                $query = $query->where($key, '>=', $from)->where($key, '<=', $to);
            }
        }

        foreach ($this->stateFilters as $key => $value) {
            $query = $query->where($key, 'like', '%' . $value . '%');
        }

        return $query;
    }

    public function makePagination($query){
        $entities = $this->pageSize == 'All' ? $query->paginate($query->count()) : $query->paginate($this->pageSize);

        $this->searchEmpty = $entities->count() <= 0;

        if ($this->searchEmpty) {
            $this->tableEmtpty = $this->EntityClass::where($this->whereRelationList)->count() <= 0;
        }

        return $entities;
    }
}
