<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blog';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('blog.*', 'users.name as user_name', 'category.name as category_name' )
        ->join('users', 'users.id', '=', 'blog.user_id')
        ->join('category', 'category.id', '=', 'blog.category_id')
        ->where('blog.is_delete', '=', 0)
        ->orderBy('blog.id', 'desc')
        ->paginate(20);
    }

    public function getImage(){
        if (!empty($this->image_file) && file_exists('upload/blog/'.$this->image_file)) 
        {
            return url('upload/blog/'.$this->image_file);
        }
        else {
            return "";
        }
    }

    public function getTag()
    {
        return $this->hasMany(BlogTagsModel::class, 'blog_id');
    }
}
