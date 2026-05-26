<?php

// Xây dựng model Category cho giao diện trang chủ,
// quản lý banner, danh mục và sản phẩm nổi bật

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Lấy danh sách sản phẩm thuộc danh mục
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Scope lọc danh mục đang hoạt động
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}