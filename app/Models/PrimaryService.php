<?php

namespace App\Models;

use App\Models\SecondaryService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrimaryService extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
   
    public function secondaryServices(){
        return $this->hasMany(SecondaryService::class);
    }
}
