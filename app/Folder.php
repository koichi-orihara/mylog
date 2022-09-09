<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; 

class Folder extends Model
{
    use Sortable;   
    
    // テーブル名を明示
    protected $table = 'folders';
    
    ///ソートに使うカラムを指定
    public $sortable = 
        [
            'id',
            'user_id',
            'title',
        ];
        
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    
    //  public function taskSortable($query, $direction)
    // {
    //     return $query->leftJoin('tasks', 'tasks.folder_id', '=', 'folders.id')
    //           ->select('tasks.*')
    //           ->orderBy('tasks.title', $direction);
    // }
}
