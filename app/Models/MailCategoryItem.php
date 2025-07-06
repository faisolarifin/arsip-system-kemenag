<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailCategoryItem extends Model
{
    use HasFactory;

    protected $table = 'mail_category_items';

    protected $fillable = [
        'group_id',
        'category_code',
        'category_name',
        'description',
    ];

    public $timestamps = true;

    public function group()
    {
        return $this->belongsTo(MailCategoryGroup::class, 'group_id');
    }
}
