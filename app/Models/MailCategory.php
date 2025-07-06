<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailCategory extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mail_categories';
    public $timestamps = true;

    protected $fillable = [
        'category_code',
        'category_name',
    ];


    public function groups()
    {
        return $this->hasMany(MailCategoryGroup::class, 'category_id');
    }
}
