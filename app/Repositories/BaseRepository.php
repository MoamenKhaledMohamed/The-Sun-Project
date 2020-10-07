<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model; 

class BaseRepository {

    //This class contians  CRUD operations and aonther commn methods

    /**      
     * @var Model      
     */     
    protected $model;

     /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model){
        $this->model = $model;
    }

    /**
     * @param array associative
     */
    public function  create(array $data){
        $this->model::create($data);
    }

    /**
     * @param id
     * @param array associative
     */
    public function update($id, array $data){
        $row = $this->model::find($id);
        
        // update data
        foreach($data as $key => $value){
            $row->$key = $value;
        }

        // save data
        $row->save();
    }
    
    /**
     * @return Collection
     */
    public function read(){
        $rows = $this->model::all();
        return $rows; 
    }

    /**
     * @param id or arry of ids
     */
    public function delete($id){
        $this->model::destroy($id);
    }
}