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
        $offender_names = array(
            'Phnoreng',
            'Moluos',
            'Kukaraya',
            'Jakawang',
            'Kupid',
            'Jeranpoh',
            'Uranouchi',
            'Tourano',
            'Tatetori',
            'Shiping',
            'Zhongchun',
            'Nogoonshir',
            'Naransagaan',
            'Dangju',
            'Soksan',
            'Huicheok',
            'Tepong',
            'Banpyaw',
            'Dasmabaran',
            'Pagaloocan',
            'Mae Soralak',
            'Bang Muenom',
            'Tuyên Ranh',
            'Ðông Chàm',
            'Touraoi',
            'Ranyako',
            'Shakoshihoro',
            'Pangong',
            'Sushan',
            'Kharyant',
            'Malserleg',
            'Nacheon',
            'Gyerjin',
            'Haeju',
        );
        $i = 1;
        while($i < 20) {
            $offender = new Offender();
            $offender->ic_passport = '000000' . $i;
            $offender->name = $offender_names[array_rand($offender_names, 1)];
            $offender->approved = rand(0, 1);
            $offender->save();
            $i++;
        }
    }
}
