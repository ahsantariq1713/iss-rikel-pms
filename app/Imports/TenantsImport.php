<?php

namespace App\Imports;

use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Validators\Failure;
use PDF;

class TenantsImport implements ToModel, WithValidation, SkipsOnFailure, WithStartRow
{
    use Importable, SkipsFailures;

    public $projectId;

    public function __construct($projectId)
    {

        $this->projectId = $projectId;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Tenant([
            'name' => $row[0],
            'citizenship' => $row[1],
            'id_type' => $row[2],
            'id_number' => $row[3],
            'relocation_type' => $row[4] ?? 'Temporary',
            'income' => $row[5] ?? 0,
            'deposit' => $row[6] ?? 0,
            'rent' => $row[7] ?? 0,
            'total_occupants' => $row[8] ?? 0,
            'allotted_units' => $row[9] ?? 0,
            'allotted_bedroom_size' =>  $row[10],
            'email' => $row[11],
            'mobile_number' => $row[12],
            'work_phone' => $row[13],
            'address' => $row[14],
            'city' => $row[15],
            'state' => $row[16],
            'country' => $row[17],
            'zipcode' => $row[18],
            'project_id' => $this->projectId,
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => 'required|string',
        ];
    }
}
