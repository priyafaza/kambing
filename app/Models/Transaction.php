<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'saving_id',
        'amount',
        'category',
        'payment_proof',
        'status',
    ];

    const CATEGORY_BUY = 'buy';
    const CATEGORY_DEPOSIT = 'deposit';
    const CATEGORY_WITHDRAW = 'withdraw';

    const STATUS_SUCCESS = 'success';
    const STATUS_PENDING = 'pending';
    const STATUS_FAILED = 'failed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_WAITING_APPROVAL = 'waiting approval';

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
