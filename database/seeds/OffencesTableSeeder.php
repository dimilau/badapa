<?php

use Illuminate\Database\Seeder;
use App\Offender;
use App\Offence;

class OffencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        $companies = array(
            "The May Department Stores Company",
            "Maytag Corporation",
            "MBNA Corporation",
            "McCormick & Company Incorporated",
            "McDonald's Corporation",
            "Oracle Corp",
            "Oshkosh Truck Corp",
            "Outback Steakhouse Inc.",
            "PepsiCo Inc.",
            "Performance Food Group Co.",
            "Perini Corp",
            "PerkinElmer Inc",
            "Perot Systems Corp",
            "Electronic Arts Inc.",
            "Electronic Data Systems Corp.",
            "Eli Lilly and Company",
            "Pro-Fac Cooperative Inc.",
            "Progress Energy Inc",
            "Progressive Corporation",
            "Protective Life Corp",
            "Provident Financial Group",
            "Providian Financial Corp.",
            "Wm Wrigley Jr Company",
            "World Fuel Services Corporation",
            "WorldCom Inc",
            "Worthington Industries Inc",
            "WPS Resources Corporation",
        );
        $offence_types = array(
            "minor",
            "major",
        );

        while($i <= 19) {
            $offender = Offender::where('ic_passport', '000000' . $i)->first();
            for ($j = 0; $j <= rand(0,3); $j++) {
                $offence = new Offence();
                $offence->approved = rand(0, 1);
                $offence->company_worked = $companies[array_rand($companies, 1)];
                $offence->offence_type = $offence_types[array_rand($offence_types, 1)];
                $offence->description = "Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec tincidunt, ligula vitae ultricies sollicitudin, sapien justo ullamcorper metus, sit amet ornare ligula diam in nisi. Nullam finibus, ipsum at maximus eleifend, dui lectus ullamcorper augue, non viverra lectus ex rutrum odio. Aliquam blandit commodo dui id dapibus.";                
                $offence->offender()->associate($offender);
                $offence->save();
            }
            $i++;
        }    
    }
}
