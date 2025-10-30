<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ContohKata extends Model
{
    protected $table = 'contoh_kata';
    public function jamo()
    {
        return $this->belongsTo(Jamo::class);
    }
}