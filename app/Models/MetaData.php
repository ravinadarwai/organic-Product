<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    protected $table = 'metadatas';

    use HasFactory;
    protected $fillable = ['description', 'keyword', 'title', 'url'];
}
