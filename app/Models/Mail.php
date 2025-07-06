<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mails';

    protected $fillable = [
        'mail_number',
        'subject',
        'mail_type',
        'classification_code',
        'category_id',
        'group_id',
        'item_id',
        'sender_name',
        'sender_address',
        'receiver_name',
        'receiver_address',
        'mail_date',
        'received_date',
        'archived_date',
        'confidentiality_level',
        'mail_status',
        'file_path',
        'file_type',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(MailCategory::class, 'category_id');
    }

    public function group()
    {
        return $this->belongsTo(MailCategoryGroup::class, 'group_id');
    }

    public function item()
    {
        return $this->belongsTo(MailCategoryItem::class, 'item_id');
    }
}
