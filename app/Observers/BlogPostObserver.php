<?php

namespace App\Observers;

use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPostModels;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the BlogPostModels "created" event.
     *
     * @param  \App\Models\BlogPostModels  $blogPostModels
     * @return void
     */
    public function created(BlogPostModels $blogPostModels)
    {
        //
    }

    public function creating(BlogPostModels $blogPostModels){
        $this->setPublishTime($blogPostModels);
        $this->unSetPublishTime($blogPostModels);
        $this->setSlug($blogPostModels);
        $this->setUser($blogPostModels);
        $this->setHtml($blogPostModels);
    }

    /**
     * Handle the BlogPostModels "updated" event.
     *
     * @param  \App\Models\BlogPostModels  $blogPostModels
     * @return void
     */
    public function updated(BlogPostModels $blogPostModels)
    {
        //
    }

    public function updating(BlogPostModels $blogPostModels){
        $this->setSlug($blogPostModels);
        $this->setPublishTime($blogPostModels);
        $this->unSetPublishTime($blogPostModels);
        $this->setUser($blogPostModels);
        $this->setHtml($blogPostModels);
     

    }

    /**
     * Handle the BlogPostModels "deleted" event.
     *
     * @param  \App\Models\BlogPostModels  $blogPostModels
     * @return void
     */
    public function deleted(BlogPostModels $blogPostModels)
    {
        //
    }

    /**
     * Handle the BlogPostModels "restored" event.
     *
     * @param  \App\Models\BlogPostModels  $blogPostModels
     * @return void
     */
    public function restored(BlogPostModels $blogPostModels)
    {
        //
    }

    /**
     * Handle the BlogPostModels "force deleted" event.
     *
     * @param  \App\Models\BlogPostModels  $blogPostModels
     * @return void
     */
    public function forceDeleted(BlogPostModels $blogPostModels)
    {
        //
    }

    private function setSlug(BlogPostModels $blogPostModels){
        if (empty($blogPostModels->slug)) {
            $blogPostModels->slug = Str::slug($blogPostModels->title);
        }
    }

    private function setPublishTime(BlogPostModels $blogPostModels){
        if (!empty($blogPostModels->is_published)) {
            $blogPostModels->published_at = Carbon::now();
        }
    }

    private function unSetPublishTime(BlogPostModels $blogPostModels){
        if (empty($blogPostModels->is_published && $blogPostModels->published_at)) {
            $blogPostModels->published_at = null;
        }

    }

    private function setUser(BlogPostModels $blogPostModels){
       
        $blogPostModels->user_id = Auth::id() ?? User::UNKNOWN_USER;
    }

    private function setHtml(BlogPostModels $blogPostModels){
        $blogPostModels->content_html = $blogPostModels->content_raw;
    }


}
