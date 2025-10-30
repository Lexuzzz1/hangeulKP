<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table = 'kuis';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}