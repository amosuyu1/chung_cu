<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'tieude',
        'noidung',
        'luotxem',
        'hinhanh',
        'slug'
    ];
    // Tạo slug từ tiêu đề khi lưu bài viết
    public static function boot()
    {
        parent::boot();

        static::saving(function ($news) {
            // Tạo slug từ tiêu đề, loại bỏ dấu và thay khoảng trắng bằng dấu -
            $news->slug = Str::slug($news->tieude, '-');
        });
    }
}
