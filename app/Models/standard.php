<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standard extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $table='standards';
    protected $fillable = ['name'];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'standard_subject');
    }
    public function staff()
    {
        return $this->belongsToMany(Staff::class);
    }
    
}
