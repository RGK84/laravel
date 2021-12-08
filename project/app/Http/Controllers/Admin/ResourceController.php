<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceCreateRequest;
use App\Http\Requests\ResourceUpdateRequest;
use App\Models\Resource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $resources = Resource::paginate(10);
        return view('admin.resources.index', ['resourceList' => $resources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.resources.makenew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ResourceCreateRequest $request
     */
    public function store(ResourceCreateRequest $request ): RedirectResponse
    {
        $resource = Resource::create($request->validated());

        if( $resource ) {
            return redirect()
                ->route('admin.resources.index')
                ->with('success', __('messages.admin.resource.create.success'));
        }

        return back()
            ->with('error', __('messages.admin.resource.create.fail'))
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
     * @param  Resource $resource
     */
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', [
            'resource' => $resource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ResourceUpdateRequest $request
     * @param  Resource $resource
     */
    public function update(ResourceUpdateRequest $request, Resource $resource): RedirectResponse
    {
        $resource = $resource->fill($request->validated())->save();

        if($resource) {
            return redirect()
                ->route('admin.resources.index')
                ->with('success', __('messages.admin.resource.update.success'));
        }

        return back()
            ->with('error', __('messages.admin.resource.update.fail'))
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @param  Resource $resource
     */
    public function destroy(Request $request, Resource $resource)
    {
        if($request->ajax()) {
            try {
                $resource->delete();
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}
