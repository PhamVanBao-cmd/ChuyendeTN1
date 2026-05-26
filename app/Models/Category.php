<?php

// Model Category dùng để quản lý danh mục sản phẩm,
// banner hiển thị và liên kết sản phẩm trong hệ thống nội thất

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Tên bảng trong database
     */
    protected $table = 'categories';

    /**
     * Các trường cho phép thêm dữ liệu hàng loạt
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
    ];

    /**
     * Ép kiểu dữ liệu cho các thuộc tính
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Liên kết sản phẩm theo danh mục
     * Một danh mục có nhiều sản phẩm
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