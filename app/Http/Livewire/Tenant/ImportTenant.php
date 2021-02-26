<?php

namespace App\Http\Livewire\Tenant;

use App\Helpers\Swal;
use App\Imports\TenantsImport;
use App\Models\Tenant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Component;
use Livewire\WithFileUploads;
use PDF;

class ImportTenant extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public $file, $projectId;

    protected $listeners = ['tenantImport' => 'import'];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    public function import()
    {
        $this->authorize('import', Tenant::class);
        $this->file = null;
        $this->emit('showImportTenantsForm');
    }

    public function process()
    {
        $this->authorize('import', Tenant::class);

        $this->validate([
            'file' => 'required|mimes:csv,xls,xlsx|max:5120', // 5MB Max
        ]);

        // return Excel::import( new TenantsImport($this->project->id), $this->file);
        $import = new TenantsImport($this->projectId);
        $import->import($this->file);

        $rows = [];

        foreach ($import->failures() as $failure) {
            $rows[] = ['row' => $failure->row(), 'attribute' => 'Name', 'validation' => 'Required'];
        }

        $data['entities'] = $rows;

        $data['columns'] = [
            ['key' => 'row',  'type' => 'text', 'header' => 'Row', 'display' => true],
            ['key' => 'attribute',  'type' => 'text', 'header' => 'Attribute', 'display' => true],
            ['key' => 'validation',  'type' => 'text', 'header' => 'Validation', 'display' => true],
        ];

        $pdf = PDF::loadView('partials.livewire-components.pdf-table', compact('data'))->setPaper('a4', 'portrait');
        $filename = 'tenantsImportFailed' . '_' . now()->format('d_M_Y') .  '_' . time() .  '.pdf';
        $pdf->save($filename);

        $this->emit('tenantsImported');

        Swal::alert($this, 'success', 'Tenants Imported', 'An excel file is importted successfully', 'Ok', 1500, 'modal-tenants-import-dismiss');

        return response()->download($filename)->deleteFileAfterSend(true);



        //    $tenants = Excel::toArray(new TenantsImport, $this->file);

        //     if (count($tenants[0]) <= 1) {
        //         $this->addError('file', 'Invalid file format');
        //         return;
        //     }

        //     $headers = $tenants[0][0];
        //     $failed = [];

        //     for ($i = 1; $i < count($tenants[0]); $i++) {
        //         $tenant = $tenants[0][$i];
        //         if (!$tenant[0] || trim($tenant[0]) == '') {
        //             $failed[$i] = $tenants[0][$i];
        //         }else{
        //             $tenants[0][$i][] = $this->project->id;
        //         }
        //     }

        //     foreach ($failed as $key => $value) {
        //         unset($tenants[0][$key]);
        //     }

        //     unset($tenants[0][0]);



        //     Tenant::insert($tenants[0]);


        //     dump($tenants[0]);
        //     dump($failed);
        //     dd($headers);
    }

    public function render()
    {
        return view('livewire.tenant.import-tenant');
    }
}
