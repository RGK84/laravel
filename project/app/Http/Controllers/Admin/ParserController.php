<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Parser;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
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
        $data = $service->parse(('https://news.yandex.ru/business.rss'));

        if (Category::where('title', mb_substr($data['title'], 16))->first()) {
            $category_id = Category::where('title', mb_substr($data['title'], 16))->first()->id;
        } else {
            $category_id = Category::create([
                'title' => mb_substr($data['title'], 16),
                'description' => $data['description']
            ])->id;
        }

        if (Source::where('link', $data['link'])->first()) {
            $source_id = Source::where('link', $data['link'])->first()->id;
        } else {
            $source_id = Source::create([
                'title' => mb_substr($data['title'], 0, 14),
                'link' => $data['link']
            ])->id;
        }

        foreach ($data as $items) {
            if (is_array($items)) {
                foreach($items as $item) {
                    $news = News::create([
                        'category_id' => $category_id,
                        'title' => $item['title'],
                        'description' => $item['description'],
                        'author' => mb_substr($data['title'], 0, 14),
                        'source_id' => $source_id,
                    ]);
                }
            }
        }

        return route('admin.index');
    }
}
