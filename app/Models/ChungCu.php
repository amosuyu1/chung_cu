<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChungCu extends Model
{
    use HasFactory;
    protected $table = 'chung_cu';
    protected $fillable = [
        'ten_chung_cu',
        'dia_chi',
        'so_tang',
    ];
    public function apartments()
    {
        return $this->hasMany(CanHo::class, 'chung_cu_id');  // Quan hệ ngược lại
    }
}
