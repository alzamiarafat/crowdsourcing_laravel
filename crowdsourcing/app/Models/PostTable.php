<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTable extends Model
{
    use HasFactory;
    protected $table = "post_table";
   	protected $primaryKey = "id";
   	public $timestamps = false;
}
