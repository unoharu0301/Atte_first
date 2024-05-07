<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'restpart',
        'user_id',
        'rest_start_time',
        'rest_end_time',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
