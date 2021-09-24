<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Source;
use Illuminate\Http\RedirectResponse;
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
     * @param  NewsCreateRequest $request
     */
    public function store(NewsCreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());

        if( $news ) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }

        return back()
            ->with('error', __('messages.admin.news.create.fail'))
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
     * @param  NewsUpdateRequest $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated())->save();

        if($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }

        return back()
            ->with('error', __('messages.admin.news.update.fail'))
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
