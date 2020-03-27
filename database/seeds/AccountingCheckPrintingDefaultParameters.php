<?php

use Illuminate\Database\Seeder;

class AccountingCheckPrintingDefaultParameters extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Accounting\CheckPrintingParameters::create([
            'parameter' => 'amount',
            'left' => '155',
            'top' => '15',
            'default_left' => '155',
            'default_top' => '15'
        ]);

        \App\Models\Accounting\CheckPrintingParameters::create([
            'parameter' => 'emissionDate',
            'left' => '55',
            'top' => '18',
            'default_left' => '55',
            'default_top' => '18'
        ]);

        \App\Models\Accounting\CheckPrintingParameters::create([
            'parameter' => 'emissionYear',
            'left' => '115',
            'top' => '18',
            'default_left' => '115',
            'default_top' => '18'
        ]);

        \App\Models\Accounting\CheckPrintingParameters::create([
            'parameter' => 'expirationDay',
            'left' => '28',
            'top' => '25',
            'default_left' => '28',
            'default_top' => '25'
        ]);

        \App\Models\Accounting\CheckPrintingParameters::create([
            'parameter' => 'expirationMonth',
            'left' => '52',
            'top' => '25',
            'default_left' => '52',
            'default_top' => '25'
        ]);

        \App\Models\Accounting\CheckPrintingParameters::create([
            'parameter' => 'expirationYear',
            'left' => '82',
            'top' => '25',
            'default_left' => '82',
            'default_top' => '25'
        ]);

        \App\Models\Accounting\CheckPrintingParameters::create([
            'parameter' => 'beneficiary',
            'left' => '50',
            'top' => '30',
            'default_left' => '50',
            'default_top' => '30'
        ]);

        \App\Models\Accounting\CheckPrintingParameters::create([
            'parameter' => 'amountLetters',
            'left' => '28',
            'top' => '48',
            'default_left' => '28',
            'default_top' => '48'
        ]);
    }
}
