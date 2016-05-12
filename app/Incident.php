<?php

namespace Safetymap;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable= ['latitude','longitude','neighborhood','type','text'];

    public function user() {
        return $this->belongsTo('\Safetymap\User');
    }

    public function target() {
        return $this->belongsTo('\Safetymap\Target');
    }

    public static function neighborhoodsForDropdown(){

        $neighborhoods = \Safetymap\Incident::orderBy('neighborhood', 'ASC')->get();
        $neighborhoods_for_dropdown = [];
        $neighborhoods_for_dropdown[0] = 'Choose a neighborhood...';

        #Build array for neighborhood dropdown
        foreach($neighborhoods as $neighborhood){
            $neighborhoods_for_dropdown[$neighborhood->id] = $neighborhood->neighborhood;
        }

        $neighborhoods_for_dropdown = array_unique($neighborhoods_for_dropdown);

        return $neighborhoods_for_dropdown;
    }


    public static function typesForDropdown(){

        $types = \Safetymap\Incident::orderBy('type', 'ASC')->get();
        $types_for_dropdown = [];
        $types_for_dropdown[0] = 'Choose a safety concern...';

        #Build array for neighborhood dropdown
        foreach($types as $type){
            $types_for_dropdown[$type->id] = $type->type;
        }

        $types_for_dropdown = array_unique($types_for_dropdown);

        return $types_for_dropdown;
    }




}
