<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class BlogCategoryModels extends Model
{
    const ROOT = 1;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'parent_id',
        ];

    public function parentCategory()
    {

        return $this->belongsTo(BlogCategoryModels::class, 'parent_id', 'id');

    }

    public function getParentTitleAttribute(){

        $title = $this->parentCategory->title
            ?? ($this->isRoot()  ? 'корневая категория': $this->resetCategory());

        return $title;


    }

    public function isRoot(){
        return $this->id === BlogCategoryModels::ROOT;
    }

    private function resetCategory(){
        $item = app(BlogCategoryModels::class)->find($this->id);
        $item->parent_id = self::ROOT;
        $item->save();

        return $item->parentCategory->title;
    }
}
