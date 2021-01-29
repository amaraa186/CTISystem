<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kana',
        'description',
        'age',
        'address',
        'phone_number',
        'created_by',
        'updated_by',
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('kana', 'like', '%'.$query.'%');
    }
}
