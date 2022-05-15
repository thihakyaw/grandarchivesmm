<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    const DIRECTORY = '/assets';
    const FILES_CACHE_NAME = 'files';
    const FILES_CACHE_COUNT = 'files_count';
}
