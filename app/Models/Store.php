<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'organization_id',
        'address',
        'city',
        'state',
        'zipcode',
        'phone',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}
