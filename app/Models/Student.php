<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string name
 * @property string lastname
 * @property string code
 * @property string email
 * @property string phone
 * @property string address
 * @property string birth_date
 * @property string entry_date
 */
class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'code',
        'email',
        'phone',
        'address',
        'birth_date',
        'entry_date',
    ];

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }
}

