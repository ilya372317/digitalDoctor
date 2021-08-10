<?php

namespace App\Http\Controllers\admin\blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategoryModels;
use App\reprositories\BlogCategoryReprositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Couchbase\basicDecoderV1;

class BlogCategoryController extends HomeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $blogCategoryReprositories;

    public function __construct()
    {
        parent::__construct();

        $this->blogCategoryReprositories = app(BlogCategoryReprositories::class);
    }

    public function index()
    {

        $paginator = $this->blogCategoryReprositories->getForPaginate(25);

        return view('blog.admin.category.index',compact('paginator'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategoryModels();
        $categoryList = $this->blogCategoryReprositories->getCategoryList();

        return view('blog.admin.category.create ', compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request, BlogCategoryModels $blogCategoryModels)
    {

    $data = $request->input();
    $item = (new BlogCategoryModels())->create($data);
    $categoryList = $this->blogCategoryReprositories->getCategoryList();

        return redirect()->route('admin.blog.category.edit', $item->id)->with(['success' => 'Категория успешно создана']);
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
        $item = $this->blogCategoryReprositories->getForEdit($id);
        $categoryList = $this->blogCategoryReprositories->getCategoryList();


        if ($item){
            return view('blog.admin.category.edit',compact('item','categoryList',));
        }else{
            return back()->withErrors(['msg' => "Запись с id[{$id}] не существует"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $data = $request->input();
        $item = ($this->blogCategoryReprositories->getForEdit($id));
        $categoryList = $this->blogCategoryReprositories->getCategoryList();

        $result = $item->update($data);

        if ($result){
            return redirect()->route('admin.blog.category.edit', $item->id)->with(['success' => 'Категория успешно обновленна']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка обновления категории'])->withInput();
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



        if ($id == 1){
            $result = 0;
        }else{
            $result = BlogCategoryModels::destroy($id);
        }
        $deletedId = $id;

        if ($result){
            return redirect()->route('admin.blog.category.index')->with(['success' => 'Категория успешно удалена','restore' => $id]);
        }else{
            return back()->withErrors(['msg' => 'Ошибка удаления записи'])->withInput();
        }
    }

    public function restore($id){
        $item = $this->blogCategoryReprositories->getForRestore($id);
        $restore = $item->restore();

        if ($restore){
           return redirect()->route('admin.blog.category.index')->with(['success' => 'Категория успешно восстоновленна','slug' => $item->slug]);
        }else{
            return back()->withErrors(['msg' => 'Ошибка восстоновления категории, обратитесь в службу поддержки']);
        }
    }

}
