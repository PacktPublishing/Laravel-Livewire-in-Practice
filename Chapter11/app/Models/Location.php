<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'city', 'state', 'type', 'is_active'];

    /**
     * Scope a query to only include drop locations.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDrop($query)
    {
        return $query->where('type', 'drop');
    }

    /**
     * Scope a query to only include pickup locations.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePickup($query)
    {
        return $query->where('type', 'pickup');
    }
}
