<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total',
        'fname',
        'email',
        'phone',
        'o_status',
        'message',
        'track_no',
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
