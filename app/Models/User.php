<?php

namespace App\Models;

// Quản lý thông tin người dùng và xác thực tài khoản hệ thống nội thất

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Các trường cho phép thêm dữ liệu hàng loạt
     *
     * Bao gồm thông tin tài khoản và phân quyền người dùng
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
    ];

    /**
     * Ẩn thông tin nhạy cảm khi trả dữ liệu ra ngoài
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Liên kết đơn hàng của người dùng
     * Một người dùng có thể có nhiều đơn hàng
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Ép kiểu dữ liệu cho các thuộc tính
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}