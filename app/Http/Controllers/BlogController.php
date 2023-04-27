<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    /**
     * ブログ登録画面を表示する
     * 
     * @return view
     */
    public function showCreate()
    {
        return view('blog.form');
    }

        /**
     * ブログを登録する
     * 
     * @return view
     */
    public function exeStore(BlogRequest $request)
    {
        // ブログのデータを受け取る
        $inputs = $request->all();
        try {
            DB::beginTransaction();
            // ブログを登録
            Blog::create($inputs);
            DB::commit();
            Session::flash('success_msg', 'ブログを投稿しました。');
            return redirect(route('blogs'))->with('success', true);
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }
    }

    /**
     * ブログ編集画面を表示する
     * 
     * @return view
     */
    public function showEdit($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * ブログを更新する
     * 
     * @return view
     */
    public function exeUpdate(BlogRequest $request)
    {
        // ブログのデータを受け取る
        $inputs = $request->all();
        try {
            DB::beginTransaction();
            // ブログを更新
            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
            ]);
            $blog->save();
            DB::commit();
            Session::flash('success_msg', 'ブログを更新しました。');
            return redirect(route('blogs'))->with('success', true);
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }
    }

    /**
     * ブログを削除する
     * 
     * @return view
     */
    public function exeDelete($id)
    {
        if (empty($id)) {
            Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        try {
            DB::beginTransaction();
            // ブログを削除
            Blog::destroy($id);
            DB::commit();
            Session::flash('success_msg', 'ブログを削除しました。');
            return redirect(route('blogs'))->with('success', true);
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }
    }
}
