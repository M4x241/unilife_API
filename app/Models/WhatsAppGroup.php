<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsAppGroup extends Model
{
    use HasFactory;

    protected $table = 'whatsapp_groups';

    protected $fillable = ['group_name', 'link'];
}
