<?php

namespace App\Http\Controllers\admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogCategoryModels;
use App\Models\BlogPostModels;
use App\Models\User;
use App\reprositories\BlogCategoryReprositories;
use App\reprositories\BlogPostReprositories;
use App\reprositories\UsersReprositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\VarDumper\Cloner\Data;

class BlogPostController extends HomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $blogCategoryReprositories;
    private $blogPostReprositories;

    public function __construct(){

        parent::__construct();
        $this->blogCategoryReprositories = app(BlogCategoryReprositories::class);
        $this->blogPostReprositories = app(BlogPostReprositories::class);

    }

    public function index()
    {
       $paginator = $this->blogPostReprositories->getForPaginate(25);

       return view('blog.admin.posts.index', ['paginator' => $paginator]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogPostModels();
        $categoryList = $this->blogCategoryReprositories->getCategoryList();

        return view('blog.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();
        if ($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] =  $path;
               }

        $item = (new BlogPostModels())->create($data);


        if ($item) {
            return redirect()->route('admin.blog.post.edit',$item->id);
        }else {
            return back()->withErrors(['msg' => 'Ошибка создания записи'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogPostReprositories->getForEdit($id);
        $categoryList = $this->blogCategoryReprositories->getCategoryList();

        return view('blog.admin.posts.edit',compact('item','categoryList'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {

        $item = $this->blogPostReprositories->getForEdit($id);
        $data = $request->input();
        if ($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] =  $path;
               }

        $result = $item->update($data);

        if ($result) {
            return redirect()->route('admin.blog.post.edit', $item->id)->with(['success' => 'Запись успешно обнавленна']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка обновления записи'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->blogPostReprositories->getForEdit($id);

        $result = $item->delete();

        if ($result) {
            return redirect()->route('admin.blog.post.index')->with(['success' => 'Запись успешно удалена', 'restore' => $item->id]);
        }else{
            return back()->withErrors(['msg' => 'Ошибка удаления записи'])->withInput();
        }
    }

    public function restore($id){
        $item = $this->blogPostReprositories->getForRestore($id);

        $result = $item->restore();

        if ($result) {
            return redirect()->route('admin.blog.post.index')->with(['success' => "Запись {$item->title} Успешно восстоновлена"]);
        }else{
            return back()->withErrors(['msg' => 'Ошибка восстонавления записи, обратитесь к администратору сайта']);
        }
    }


    public function deleteThumbnail($id){
        $result = null;
        $item = $this->blogPostReprositories->getForEdit($id);
        $deleteImg =  Storage::disk('public')->delete($item->image);

        if ($deleteImg || $item->image != null){
            $item->image = null;
            $result = true;
         }
        if ($result) {
            $item->save();
            return redirect()->route('admin.blog.post.edit', $item->id)->with(['success' => 'Миниатюра успешно удалена']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка удаления миниатюры записи'])->withInput();
        }



    }

}
