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
}
