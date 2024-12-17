<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_input;

class submission_log extends Model
{
    use HasFactory;

    protected $fillable = ['input_id'];

    public function userInput()
    {
        return $this->belongsTo(user_input::class, 'user_input_id');
    }
}
