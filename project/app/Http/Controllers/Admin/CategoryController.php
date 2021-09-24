<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = Category::withCount('news')->get();

         return view('admin.categories.index', [
            'categoryList' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.categories.makenew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $category = Category::create($request->only(['title', 'description']));

        if( $category ) {
            return redirect()
                ->route('admin.categories.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = $category->fill(
            $request->only(['title', 'description'])
            )->save();

        if($category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()
            ->with('error', 'Запись не обновлена')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        if($request->ajax()) {
            try {
                $category->delete();
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}
