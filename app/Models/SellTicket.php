<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SellTicket extends Model
{
    use HasFactory;
    use SoftDeletes;

                /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        
        'user_id',
        'role_id',
        'category_id',
        'ticket_order_id',
        'event_name',
        'event_datetime',
        'event_location',
        'ticket_price',
        'full_name',
        'email',
        'contact_no',
        'account_holder_name',
        'bank_name',
        'account_number',
        'swift_code',

    ];

}
