<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'rsa_id',
        'mobile_number',
        'date_of_birth',
        'language_id',
    ];

    public function interests()
    {
        return $this->hasMany(ClientInterests::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
