<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;

class Work extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'workpart',
        'user_id',
        'work_start_time',
        'work_end_time',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
