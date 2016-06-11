<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $primaryKey='admin_id';
    protected $table='admin';
    public $timestamps=false;

}
