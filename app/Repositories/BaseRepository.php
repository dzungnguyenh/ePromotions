<?php
/**
* Base Repository
*/
namespace App\Repositories;
use Exception;
use DB;
use Carbon\Carbon;
abstract class BaseRepository
{
    protected $model;
    public function all()
    {
        return $this->model->all();
    }
    public function create($inputs)
    {
        return $this->model->create($inputs);
    }
    public function store($input)
    {
        $data = $this->model->create($input);
        if (!$data) {
            throw new Exception(trans('message.create_error'));
        }
        return $data;
    }
}