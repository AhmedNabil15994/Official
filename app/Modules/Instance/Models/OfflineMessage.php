<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflineMessage extends Model
{
    use \TraitsFunc;
    protected $connection = 'mysql';
    protected $table = 'offline_messages';
    // protected $fillable = [];    
    public $timestamps = false;
    
}
