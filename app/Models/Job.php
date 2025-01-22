<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model{
    use HasFactory;
    protected $table = 'job_listings';
    // protected $fillable = ['title', 'salary'];
    protected $guarded = [];
    // means u don't have to guard anythings
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}

