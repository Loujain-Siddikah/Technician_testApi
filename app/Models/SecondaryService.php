<?php

namespace App\Models;

use App\Models\User;
use App\Models\PrimaryService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecondaryService extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'primary_service_id'];
    
    public function users(){
        return $this->belongsToMany(User::class,'user_secondary')->withTimestamps();
    }
    
    public function primaryService(){
        return $this->belongsTo(PrimaryService::class);
    }
}
