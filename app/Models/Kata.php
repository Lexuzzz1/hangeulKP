<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    protected $table = 'kata';
    protected $fillable = [
        'id_kata',
        'hangeul',
        'arti',
    ];
    
    public function hangeul()
    {
        return $this->belongsToMany(Hangeul::class, 'hangeul_kata', 'id_kata', 'id_hangeul')->withTimestamps();
    }

}