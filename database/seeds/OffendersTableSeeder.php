<?php

use Illuminate\Database\Seeder;
use App\Offender;

class OffendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        while($i < 15) {
            $offender = new Offender();
            $offender->ic_passport = '000000' . $i;
            $offender->name = 'Offender ' . $i;
            $offender->approved = 1;
            $offender->save();
            $i++;
        }

        while($i < 20) {
            $offender = new Offender();
            $offender->ic_passport = '000000' . $i;
            $offender->name = 'Offender ' . $i;
            $offender->approved = 0;
            $offender->save();
            $i++;
        }
    }
}
