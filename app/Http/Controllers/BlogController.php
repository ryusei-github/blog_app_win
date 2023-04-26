<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * ブログ一覧を表示する
     * 
     * @return view
     */
    public function showList()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('blog.list',compact('blogs'));
    }

    /**
     * ブログ詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.detail', ['blog' => $blog]);
    }
}
