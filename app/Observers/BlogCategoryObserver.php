<?php

namespace App\Observers;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Models\BlogCategoryModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    /**
     * Handle the BlogCategoryModels "created" event.
     *
     * @param  \App\Models\BlogCategoryModels  $blogCategoryModels
     * @return void
     */
    public function created(BlogCategoryModels $blogCategoryModels)
    {

    }

    public function creating(BlogCategoryModels $blogCategoryModels){

        $this->setSlug($blogCategoryModels);

    }

    /**
     * Handle the BlogCategoryModels "updated" event.
     *
     * @param  \App\Models\BlogCategoryModels  $blogCategoryModels
     * @return void
     */
    public function updated(BlogCategoryModels $blogCategoryModels)
    {
        //
    }

    public function updating(BlogCategoryModels $blogCategoryModels){

        $this->setSlug($blogCategoryModels);

    }

    /**
     * Handle the BlogCategoryModels "deleted" event.
     *
     * @param  \App\Models\BlogCategoryModels  $blogCategoryModels
     * @return void
     */
    public function deleted(BlogCategoryModels $blogCategoryModels)
    {
        //
    }

    public function deleting(BlogCategoryModels $blogCategoryModels){

    }

    /**
     * Handle the BlogCategoryModels "restored" event.
     *
     * @param  \App\Models\BlogCategoryModels  $blogCategoryModels
     * @return void
     */
    public function restored(BlogCategoryModels $blogCategoryModels)
    {
        //
    }

    /**
     * Handle the BlogCategoryModels "force deleted" event.
     *
     * @param  \App\Models\BlogCategoryModels  $blogCategoryModels
     * @return void
     */
    public function forceDeleted(BlogCategoryModels $blogCategoryModels)
    {
        //
    }

    private function setSlug(BlogCategoryModels $blogCategoryModels)
    {
        if (empty($blogCategoryModels->slug)){
            $blogCategoryModels->slug = Str::slug($blogCategoryModels->title);
        }
    }




}

