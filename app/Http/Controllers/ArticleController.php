<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin_artikel', [
            "title" => "| Article",
            "articles" => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => "| Create Article"
        );
        return view('admin.add_artikel')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($files = $request->file('images')) {
            $filenameWithExt = $files->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $files->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $files->storeAs('public/article_images', $filenameSimpan);
            $image = $filenameSimpan;
        }
        $article = new Article;
        $article->images = $image;
        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->description = nl2br($request->input('description'));
        $article->save();
        return redirect('admin-articles')->with('success', 'Berhasil Menambah Artikel Baru!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('artikel', [
            'title' => "| Article",
            "articles" => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function detail_article($id)
    {
        $data = array(
            'title' => "| Detail Article",
        );
        $article = Article::find($id);
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('detail_artikel', compact('article', 'articles'))->with($data);
        // $articles = Article::orderBy('created_at', 'desc')->get();
        // if (count($articles) > 3) {
        //     return "lebih 3";
        // } else {
        //     return "kurang 3";
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.edit_artikel', [
            'title' => "Edit Article",
            'articles' => Article::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->author = $request->input('author');
        $article->description = nl2br($request->input('description'));
        if ($files = $request->file('images')) {
            if ($article->images) {
                unlink('storage/article_images/' . $article->images);
            }
            $filenameWithExt = $files->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $files->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $files->storeAs('public/article_images', $filenameSimpan);
            $image = $filenameSimpan;
        }
        $article->images = $image;
        $article->update();
        return redirect('admin-articles')->with('success', 'Berhasil diupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article->images) {
            unlink('storage/article_images/' . $article->images);
        }
        $article->delete();
        return redirect('admin-articles')->with('success', 'Berhasil dihapus!!');
    }
}
