<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $table = 'categories';

	public function getCategories(): array
	{
		return DB::table($this->table)
			->select(['id', 'title', 'description','count_categories' => DB::table('news')
                ->select(DB::raw('count(id) as categories_id'))
                ->whereColumn('news.category_id','categories.id')])
            ->get()
            ->toArray();
	}

    public function getOneCategory(int $id){
        return DB::table($this->table)
        ->where('id','=',$id)
        ->value('title');
    }

    public function getCount(int $id){
        return DB::table('news')
        ->select(DB::raw('count(id) as count'))
        ->where('news.category_id','=',$id)
        ->value('count');
    }

	public function getCategoriesById(int $id)
	{
		return DB::table($this->table)->find($id);
	}

    public function getAction($action,$data){
        switch($action){
            case 'insert':
                DB::table($this->table)->insert([
                    'title' => $data['title'],
                    'description' => $data['description']
                ]);
                return 'success';
            case 'update':
                DB::table($this->table)
                ->where('id','=',$data['id'],)
                ->update([
                    'title' => $data['title'],
                    'description' => $data['description']
                ]);
                return 'success';
            case 'delete':
                DB::table($this->table)
                ->where('id','=',$data,)
                ->delete();
                return 'success';
            default:
                return 'error';
        }
    }
}
