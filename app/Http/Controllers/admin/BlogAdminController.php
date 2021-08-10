<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPosts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogAdminController extends Controller
{
    public function __construct()
    {
     //
    }

    public function viewAdmin(){
        $userId = Auth::id();
        $user = User::find($userId);
        $userName = $user->name ?? 'Неизвестный пользователь';
      if (202) {
          # code...
      }
        return view('blog.admin.admin',compact('userName'));
    }
}
