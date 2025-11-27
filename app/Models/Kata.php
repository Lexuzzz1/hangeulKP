<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    protected $table = 'kata';
    protected $primaryKey = 'id_kata'; 
    
    protected $fillable = [
        'hangeul',
        'arti',
    ];
    
    
    public function hangeul()
    {
        
        return $this->belongsToMany(Jamo::class, 'jamo_kata', 'id_kata', 'id_jamo')
                    ->withTimestamps();
    }
}