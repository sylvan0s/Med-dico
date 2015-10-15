<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicaments extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicaments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','définition'];


    public function users()
    {
        return $this->hasOne('Users');
    }
}
