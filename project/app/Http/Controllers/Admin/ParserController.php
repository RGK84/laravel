<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
use App\Models\Source;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function __invoke(Request $request, Parser $service)
    {
        $urls = Resource::all();

        foreach($urls as $url) {
            dispatch(new NewsJob($url->link));
        }

        return route('admin.news.index')->with('success', 'Новости добавлены в очередь');
    }
}
