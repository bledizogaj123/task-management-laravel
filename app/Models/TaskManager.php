<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskManager extends Model
{
    use HasFactory;
    protected $table = 'table_task_management';
    protected $fillable = ['list', 'item','description'];
}
