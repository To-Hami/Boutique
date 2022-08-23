<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class WorldStatusSeeder extends Seeder
{

    public function run()
    {
        $countries =['Sudan','Algeria','Bahrain','Egypt','Iraq','Jordan','Kuwait','Palestinian','Qatar','Saudi Arabia','Syria','Yemen'];

        Country::whereHas('states')->whereIn('name',$countries)->update(['status' => 1]);

        State::select('states.*')->whereHas('cities')->join('countries', 'states.country_id' , '=' , 'countries.id')
            ->where('countries.status' , 1)->update(['states.status' => 1]);

//
        City::select('cities.*')->join('states', 'cities.state_id' , '=' , 'states.id')
            ->where('states.status' , 1)->update(['cities.status' => 1]);

    }
}
