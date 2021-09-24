<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $newsList = News::with('category')
            ->with('source')
            ->paginate(
                config('news.paginate')
            );

		return view('admin.news.index', [
			'newsList' => $newsList
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories =  Category::all();
        $sources = Source::all();
        return view('admin.news.makenew', [
            'categories' => $categories,
            'sources' => $sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $news = News::create($request->only('category_id', 'title', 'description', 'author', 'source_id'));

        if( $news ) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()
            ->with('error', 'Запись не добавлена')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories =  Category::all();
        $sources = Source::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news = $news->fill(
            $request->only(['category_id', 'title', 'description', 'author', 'source_id'])
        )->save();

        if($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()
            ->with('error', 'Запись не обновлена')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        if($request->ajax()) {
            try {
                $news->delete();
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}
