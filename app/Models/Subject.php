<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use SoftDeletes;
    use HasFactory;
     protected $table = 'subjects';

    // Specify the fillable properties
    protected $fillable = ['name'];
    public function classes()
    {
        return $this->belongsToMany(standard::class, 'standard_subject');
    }
    public function staff()
    {
        return $this->belongsToMany(Staff::class);
    }
}
