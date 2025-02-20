<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $code Unique identifier for the student
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property DateTime $birth_date
 * @property DateTime $entry_date
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
        'gender'
    ];

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class)->withPivot('grade');
    }
}

