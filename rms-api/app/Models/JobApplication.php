<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'profile_id', 'company_id', 'job_id', 'profile_archived', 'company_archived'];

    public function profile() 
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function main_Job()
    {
        return $this->belongsTo(MainJob::class, 'job_id');
    }
}
