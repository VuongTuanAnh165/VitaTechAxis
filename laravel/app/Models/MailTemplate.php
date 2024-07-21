<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'mail_templates';

    public $timestamps = true;

    protected $guarded = [];
}
