<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class News extends Model
{
	use HasFactory;

    protected $table = "news";

    public function getNews(): Collection
	{
		return DB::table($this->table)
			->join('categories', 'categories.id', '=', 'news.category_id')
            ->join('sources', 'sources.id', '=', 'news.source_id')
			->select("news.*", "categories.id as categoryId", "categories.title as categoryTitle", "sources.title as sourceTitle", "sources.link as sourceLink")
			->orderBy('news.id', 'desc')
			->get();
    }

    public function getNewsByCategory(int $category_id): Collection
    {
        return DB::table($this->table)
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->join('sources', 'sources.id', '=', 'news.source_id')
            ->select("news.*", "categories.id as categoryId", "categories.title as categoryTitle", "sources.title as sourceTitle", "sources.link as sourceLink")
            ->where('categories.id', '=', $category_id)
            ->orderBy('news.id', 'desc')
            ->get();

    }

}
