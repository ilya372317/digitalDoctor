<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Route;

class BlogPostModels extends Model
{
    use HasFactory, Notifiable,SoftDeletes;

    const ROOT = 1;

    protected $fillable= [
        'category_id',
        'slug',
        'title',
        'content_raw',
        'extra',
        'is_published',
        'image'
    ];

    public function user(){
       return $this->belongsTo(User::class, 'user_id','id');
}

    public function category(){
      return  $this->belongsTo( BlogCategoryModels::class, 'category_id', 'id');
    }

    public function getCategoryTitleAttribute(){

        $title = $this->category->title ??  $this->resetCategory();

        return $title;
}
    private function resetCategory(){
        $item = app(BlogPostModels::class)->find($this->id);
        $item->category_id = self::ROOT;
        $item->save();

        return $item->category->title;


    }
}
