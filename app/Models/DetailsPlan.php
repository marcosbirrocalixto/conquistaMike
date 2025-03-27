<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class DetailsPlan extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasUuids;

    protected $fillable = [
        'plan_id', 'name',
    ];
}
