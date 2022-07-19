<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetails extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'user_id', 'client_id');
    }
}
