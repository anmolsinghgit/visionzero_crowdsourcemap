<?php

namespace Safetymap;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable= ['latitude','longitude','neighborhood','type','text'];


    public static function neighborhoodsForDropdown(){

        $neighborhoods = \Safetymap\Incident::orderBy('neighborhood', 'ASC')->get();
        $neighborhoods_for_dropdown = [];

        #Build array for neighborhood dropdown
        foreach($neighborhoods as $neighborhood){
            $neighborhoods_for_dropdown[$neighborhood->id] = $neighborhood->neighborhood;
        }

        $neighborhoods_for_dropdown = array_unique($neighborhoods_for_dropdown);

        return $neighborhoods_for_dropdown;
    }


}
