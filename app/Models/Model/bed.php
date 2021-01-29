<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'room_id',
        'status',
        'created_by',
        'updated_by',
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%');
    }
}
