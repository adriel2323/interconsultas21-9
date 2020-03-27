<?php

namespace App\Imports;

use App\Models\Accounting\Vendor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class AccountingVendorImports implements ToModel
{
    /**
     * @param array $row
     *
     * @return Vendor|null
     */
    public function model(array $row)
    {
        return new Vendor([
            'fantasy_name' => $row[0],
            'address' => $row[1],
            'cuit' => $row[2]

        ]);
    }
}
