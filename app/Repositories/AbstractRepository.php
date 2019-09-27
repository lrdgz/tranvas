<?php

namespace App\Repositories;


class AbstractRepository implements AbstractInterface{

    public function getById($id){
        return $this->model->where('id',$id)->first();
    }

    public function getAll($limit = 10){
        return $this->model->select()->orderBy('created_at','desc')->paginate($limit);
    }

    public function getAllNoLimit(){
        return $this->model->select()->orderBy('created_at','desc')->get();
    }

    public function update(array $attribute, $id, $getDataBack = false){
        $update =  $this->model->where('id',$id)->update($attribute);

        if ($getDataBack){
            $update = $this->getById($id);
        }

        return $update;
    }

    public function remove($id){
        return $this->model->where('id',$id)->delete();
    }

    public function create(array $attributes){
        $data =  $this->model->create($attributes);
        return $data;
    }
}
