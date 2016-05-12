<?php

namespace Safetymap;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public function incidents() {
        return $this->hasMany('\Safetymap\Incident');
    }
}
