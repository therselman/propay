<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInterests extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'interest_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function interest()
    {
        return $this->belongsTo(Interests::class);
    }
}
