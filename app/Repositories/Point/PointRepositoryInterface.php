<?php
namespace App\Repositories\Point;
interface PointRepositoryInterface
{
    public function all();
    public function create($inputs);
}