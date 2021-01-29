<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient_master extends Model
{
    use HasFactory;

    protected $fillable = [
        'transition_number',
        'patient_id',
        'description',
        'bed_id',
        'user_id',
        'entry_date',
        'leave_date',
        'created_by',
        'updated_by',
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('transition_number', 'like', '%'.$query.'%')
                ->orWhere('patient_id', 'like', '%'.$query.'%');
    }
}
