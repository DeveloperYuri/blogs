<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'category';

    static public function getRecord(){
        return self::select('category.*')
        ->where('is_delete', '=', 0)
        ->orderBy('id', 'desc')
        ->paginate(20);
    }
}
