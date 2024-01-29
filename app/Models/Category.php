<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function reports()
    {
        return $this->hasMany(Report::class)->where('report_type', 'report');
    }

    public function proofs()
    {
        return $this->hasMany(Report::class)->where('report_type', 'proof');
    }
}
