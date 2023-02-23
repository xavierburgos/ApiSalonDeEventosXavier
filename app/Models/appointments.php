<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    public $fillable = [
        'start_time',
        'end_time',  
        'date',
        'employee_id',
        'client_id',
        'branch_id',
    ];
   public function clients() {
        return $this->hasOne(clients::class,'id', 'name');
    }
}
