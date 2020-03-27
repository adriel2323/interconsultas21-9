<?php

use Illuminate\Database\Seeder;

class interconsultingDatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = DB::connection('mysql')->table('interconsulting')->get();

        foreach($array as $interconsulting) {
            $row = \App\Models\Interconsulting::where('id', $interconsulting->id)->get();

            if(!empty($row)) {

                \App\Models\Interconsulting::where('id', $interconsulting->id)->update([
                    'created_at' => $this->fromDateTime($interconsulting->created_at),
                    'updated_at' => $this->fromDateTime($interconsulting->updated_at)
                ]);

            }
        }
    }

    private function fromDateTime($value)
    {
        $date = \Carbon\Carbon::parse($value)->format('Y-m-d');
        $date .= "T";
        $date .= \Carbon\Carbon::parse($value)->format('H:i:s');
        //Log::info($date);
        return $date;
    }
}

