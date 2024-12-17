<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\submission_log;

class user_input extends Model
{
    use HasFactory;

    protected $table = 'user_input';
    protected $primaryKey = 'input_id';

    protected $fillable = ['textBox', 'checkBox', 'radioBox', 'imageLocation'];

    public function submissionLogs()
    {
        return $this->hasMany(submission_log::class, 'user_input_id');
    }
}
