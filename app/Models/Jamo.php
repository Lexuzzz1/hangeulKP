<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jamo extends Model
{
    protected $table = 'jamo';
    public function contohKata()
    {
        return $this->hasMany(ContohKata::class); 
    }
}