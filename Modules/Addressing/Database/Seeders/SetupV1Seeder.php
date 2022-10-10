<?php

namespace Modules\Addressing\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Addressing\Entities\Country;
use Modules\Addressing\Entities\LVLType;
use Modules\Addressing\Entities\Lvl1;
use Modules\Addressing\Entities\Lvl2;
use Modules\Addressing\Entities\LVL3;
use Modules\Addressing\Entities\LVL4;

class SetupV1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        /// Types
        LVLType::create([
            'id' => 1,
            'name' => 'State',
            'active' => true,
        ]);
        LVLType::create([
            'id' => 2,
            'name' => 'Governerate',
            'active' => true,
        ]);
        LVLType::create([
            'id' => 3,
            'name' => 'District',
            'active' => true,
        ]);
        LVLType::create([
            'id' => 4,
            'name' => 'Cities',
            'active' => true,
        ]);
        LVLType::create([
            'id' => 5,
            'name' => 'Cadasters',
            'active' => true,
        ]);
        LVLType::create([
            'id' => 6,
            'name' => 'Villages',
            'active' => true,
        ]);
        // Countries
        Country::create([
            'id' => 1,
            'code' => 'LB',
            'name' => 'Lebanon',
            'phone_code' => 961,
            'active' => true,
        ]);
        // Governerate
        Lvl1::create([
            'id' => 1,
            'code' => '1',
            'country' => 1,
            'name' => 'Akkar',
            'type' => 2,
            'active' => true,
        ]);
        Lvl1::create([
            'id' => 2,
            'code' => '2',
            'country' => 1,
            'name' => 'Baalbek-El Hermel',
            'type' => 2,
            'active' => true,
        ]);
        Lvl1::create([
            'id' => 3,
            'code' => '3',
            'country' => 1,
            'name' => 'Beirut',
            'type' => 2,
            'active' => true,
        ]);
        Lvl1::create([
            'id' => 4,
            'code' => '4',
            'country' => 1,
            'name' => 'Bekaa',
            'type' => 2,
            'active' => true,
        ]);
        Lvl1::create([
            'id' => 5,
            'code' => '5',
            'country' => 1,
            'name' => 'El Nabatieh',
            'type' => 2,
            'active' => true,
        ]);
        Lvl1::create([
            'id' => 6,
            'code' => '6',
            'country' => 1,
            'name' => 'Mount Lebanon',
            'type' => 2,
            'active' => true,
        ]);
        Lvl1::create([
            'id' => 7,
            'code' => '7',
            'country' => 1,
            'name' => 'North',
            'type' => 2,
            'active' => true,
        ]);
        Lvl1::create([
            'id' => 8,
            'code' => '8',
            'country' => 1,
            'name' => 'South',
            'type' => 2,
            'active' => true,
        ]);
    }
}
