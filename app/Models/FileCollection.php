<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileCollection extends Model
{
    use HasFactory;

    public function casts(): array
    {
        return [
            'files' => 'array',
            'file_names' => 'array',
        ];
    }
}
