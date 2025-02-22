<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CanHo extends Model
{
    use HasFactory;
    protected $table = 'can_ho';
    protected $fillable = [
        'ten_can_ho',
        'mo_ta',
        'Huong_nha',
        'so_phong',
        'phong_tam',
        'noi_that',
        'muc_dich',
        'trang_thai',
        'hot',
        'dien_tich',
        'chung_cu_id',
        'gia',
        'gia_thue',
        'images'
    ];
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($canHo) {
            $canHo->slug = Str::slug($canHo->ten_can_ho, '-');
        });
    }
    public function building()
    {
        return $this->belongsTo(ChungCu::class, 'chung_cu_id');  // 'id_chung_cu' là khóa ngoại trong bảng apartments
    }

    /**
     * Accessor để chuyển đổi giá trị số của 'muc_dich' thành chuỗi mô tả.
     */
    public function getMucDichTextAttribute()
    {
        switch ($this->muc_dich) {
            case 0:
                return 'Bán';
            case 1:
                return 'Thuê';
            case 2:
                return 'Bán và Thuê';
            default:
                return 'Không xác định';
        }
    }
    public function getNoiThatTextAttribute()
        {
            switch ($this->noi_that) {
                case 0:
                    return 'Đầy đủ';
                case 1:
                    return 'Ấm cúng';
                default:
                    return 'Không xác định';
            }
        }
}
