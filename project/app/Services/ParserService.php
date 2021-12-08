<?php declare(strict_types=1);

namespace App\Services;

use App\Contract\Parser;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;

class ParserService implements Parser
{
    public function parse(string $link): void
    {
        $xml = \XmlParser::load($link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);

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
                    News::create([
                        'category_id' => $category_id,
                        'title' => $item['title'],
                        'description' => $item['description'],
                        'author' => mb_substr($data['title'], 0, 14),
                        'source_id' => $source_id,
                    ]);
                }
            }
        }
    }
}
