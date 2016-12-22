<?php

namespace App\Repositories\Point;

use App\Repositories\BaseRepository;
use App\Repositories\Point\PointRepositoryInterface;
use App\Models\Point;

class PointRepository extends BaseRepository implements PointRepositoryInterface
{
    /**
     * The Point instance
     *
     * @param Point $point [description]
     *
     * @return void
     */
    public function __construct(Point $point)
    {
        $this->model = $point;
    }

    /**
     * Get list point latest
     *
     * @return mixed
     */
    public function getLatestPoint()
    {
        return $this->model->orderBy('id', trans('point.desc'))->limit(config('constants.SELECT_ONE'))->get();
    }
}
