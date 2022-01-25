<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

	public function getNews(): array
	{
		return DB::table($this->table)
			->select(['id', 'title', 'slug','category_id',  'author', 'status', 'description', 'category' => DB::table('categories')
                ->select('title')
                ->whereColumn('categories.id','news.category_id')])
            ->get()
			->toArray();
	}

    public function getNewsByCategory(int $id){
        return DB::table($this->table)
        ->select(['id', 'title', 'slug','category_id',  'author', 'status', 'description', 'category' => DB::table('categories')
            ->select('title')
            ->whereColumn('categories.id','news.category_id')])
        ->where('category_id','=',$id)
        ->get()
        ->toArray();
    }

    public function getIdCategory(int $id){
        return DB::table($this->table)
        ->where('id','=',$id)
        ->value('category_id');
    }

	public function getNewsById(int $id)
	{
		return DB::table($this->table)->find($id);
	}

    public function getAction($action,$data){
        switch($action){
            case 'insert':
                DB::table($this->table)->insert([
                    'title' => $data['title'],
                    'author' => $data['author'],
                    'status' => $data['status'],
                    'description' => $data['description'],
                    'slug' => $data['slug'],
                    'category_id' => $data['category_id']
                ]);
                return 'success';
            case 'update':
                DB::table($this->table)
                ->where('id','=',$data['id'],)
                ->update($data);
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
