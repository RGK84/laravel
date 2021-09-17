<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Category extends Model
{
	use HasFactory;

	protected $table = "categories";

    public function getCategory(): Collection
	{
        return DB::table($this->table)->get();
	}

	public function getCategoryById(int $id)
	{
       return DB::table($this->table)->find($id);
	}
}
