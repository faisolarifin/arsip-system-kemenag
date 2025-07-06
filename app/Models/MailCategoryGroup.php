<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailCategoryGroup extends Model
{
    use HasFactory;

    protected $table = 'mail_category_groups';

    protected $fillable = [
        'category_id',
        'category_code',
        'category_name',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(MailCategory::class, 'category_id');
    }

    public function items()
    {
        return $this->hasMany(MailCategoryItem::class, 'group_id');
    }
}
