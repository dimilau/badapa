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
        $offender_countries = array(
            'Afghanistan',
            'Armenia',
            'Azerbaijan',
            'Bahrain',
            'Bangladesh',
            'Bhutan',
            'Brunei',
            'Cambodia',
            'China',
            'Cyprus',
            'Georgia',
            'India',
            'Indonesia',
            'Iran',
            'Iraq',
            'Israel',
            'Japan',
            'Jordan',
            'Kazakhstan',
            'Kuwait',
            'Kyrgyzstan',
            'Laos',
            'Lebanon',
            'Malaysia',
            'Maldives',
            'Mongolia',
            'Myanmar',
            'Nepal',
            'North Korea',
            'Oman',
            'Pakistan',
            'Palestine',
            'Philippines',
            'Qatar',
            'Russia',
            'Saudi Arabia',
            'Singapore',
            'South Korea',
            'Sri Lanka',
            'Syria',
            'Taiwan',
            'Tajikistan',
            'Thailand',
            'Timor-Leste',
            'Turkey',
            'Turkmenistan',
            'United Arab Emirates',
            'Uzbekistan',
            'Vietnam',
            'Yemen',
        );
        $i = 1;
        while($i < 20) {
            $offender = new Offender();
            $offender->ic_passport = '000000' . $i;
            $offender->name = $offender_names[array_rand($offender_names, 1)];
            $offender->country = $offender_countries[array_rand($offender_countries, 1)];
            $offender->approved = rand(0, 1);
            $offender->save();
            $i++;
        }
    }
}
