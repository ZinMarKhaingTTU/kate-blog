<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='posts';
    protected $fillable = [
        'title',
        'description',
        'photo',
        'categoryID',
        'userID',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
