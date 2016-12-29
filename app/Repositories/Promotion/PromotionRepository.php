<?php

namespace App\Repositories\Promotion;

use App\Repositories\BaseRepository;
use App\Repositories\Promotion\PromotionRepositoryInterface;
use App\Models\Promotion;
use Carbon\Carbon;

class PromotionRepository extends BaseRepository implements PromotionRepositoryInterface
{
    protected $model;
    /**
     * Promotion constructor.
     *
     * @param Promotion $model description
     *
     * @return void
     */
    public function __construct(Promotion $model)
    {
        $this->model = $model;
    }

    /**
    * Return promotions expired.
    *
    * @param int      $val   Value id
    * @param datetime $time  Time now
    * @param int      $limit Limit promotion earch page
    *
    * @return mixed
    */
    public function filterExpired($val, $time, $limit = null)
    {
        return $this->model->where([
            ['date_end', '<', $time],
            ['product_id', '=', $val],
        ])->paginate($limit);
    }

    /**
    * Return promotions present.
    *
    * @param int      $val   Value id
    * @param datetime $time  Time now
    * @param int      $limit Limit promotion earch page
    *
    * @return mixed
    */
    public function filterPresent($val, $time, $limit = null)
    {
        return $this->model->where([
            ['date_start', '<', $time],
            ['date_end', '>', $time],
            ['product_id', '=', $val],
        ])->paginate($limit);
    }

    /**
    * Return promotions future.
    *
    * @param int      $val   Value id
    * @param datetime $time  Time now
    * @param int      $limit Limit promotion earch page
    *
    * @return mixed
    */
    public function filterFuture($val, $time, $limit = null)
    {
        return $this->model->where([
            ['date_start', '>', $time],
            ['product_id', '=', $val],
        ])->paginate($limit);
    }

    /**
    * Return time.
    *
    * @return time
    */
    public function getTime()
    {
        return date(config('date.format_timestamps'), time());
    }

    /**
    * Check value input date.
    *
    * @param datetime $dateStart Time
    * @param datetime $dateEnd   Time
    *
    * @return string
    */
    public function checkDate($dateStart, $dateEnd)
    {
        if ($dateStart < $this->getTime() || $dateEnd <= $dateStart) {
            return config('promotion.ERROR_DATE');
        }
    }

    /**
    * Check isset promotion when store.
    *
    * @param int      $productId Product id
    * @param datetime $dateStart Time
    * @param datetime $dateEnd   Time
    *
    * @return string
    */
    public function checkIssetStore($productId, $dateStart, $dateEnd)
    {
        $promotions= $this->findBy('product_id', $productId);
        foreach ($promotions as $value) {
            if (!($value['date_start'] < $dateStart && $value['date_end'] < $dateStart ||
                $value['date_start'] > $dateEnd && $value['date_end'] > $dateEnd)) {
                return config('promotion.ERROR_ISSET');
                break;
            }
        }
    }

    /**
    * Check isset promotion when update.
    *
    * @param int      $promotionId Promotion id
    * @param datetime $dateStart   Time
    * @param datetime $dateEnd     Time
    *
    * @return string
    */
    public function checkIssetUpdate($promotionId, $dateStart, $dateEnd)
    {
        $promotions= $this->findEliminate('id', $promotionId);
        foreach ($promotions as $value) {
            if (!($value['date_start'] < $dateStart && $value['date_end'] < $dateStart ||
                $value['date_start'] > $dateEnd && $value['date_end'] > $dateEnd)) {
                return config('promotion.ERROR_ISSET');
                break;
            }
        }
    }

    /**
    * Get error when store.
    *
    * @param int      $productId Product id
    * @param datetime $dateStart Time
    * @param datetime $dateEnd   Time
    *
    * @return array
    */
    public function getErrorStore($productId, $dateStart, $dateEnd)
    {
        return array($this->checkDate($dateStart, $dateEnd), $this->checkIssetStore($productId, $dateStart, $dateEnd));
    }

    /**
    * Get error when update.
    *
    * @param int      $promotionId Promotion id
    * @param datetime $dateStart   Time
    * @param datetime $dateEnd     Time
    *
    * @return array
    */
    public function getErrorUpdate($promotionId, $dateStart, $dateEnd)
    {
        return array($this->checkDate($dateStart, $dateEnd), $this->checkIssetUpdate($promotionId, $dateStart, $dateEnd));
    }


    /**
     * Get limit 4 promotions which being sale off
     * If not, promotions.date_end neartest
     *
     * @return array Categories
     */
    public function getNeartest()
    {
        $now = Carbon::now();
        $list = $this->model->with('product.voteProducts')
        ->where('promotions.date_end', '>=', $now)
        ->take(config('constants.LIMIT_PROMOTION_INDEX'))->get();
        if (count($list) < config('constants.LIMIT_PROMOTION_INDEX')) {
            $list = $this->model->with('product.voteProducts')
            ->latest()->take(config('constants.LIMIT_PROMOTION_INDEX'))->get();
        }
        return $list;
    }
    
    /**
    * Get name image when upload success.
    *
    * @param file   $image file
    * @param string $path  path
    *
    * @return string
    */
    public function uploadImage($image, $path)
    {
        $nameImage =time().'-'.$image->getClientOriginalName();
        $image->move($path, $nameImage);
        return $nameImage;
    }

    /**
    * Filter promotions index.
    *
    * @return mixed
    */
    public function filterIndex()
    {
        $time = $this->getTime();
        return $this->model->where('date_start', '>', $time)->take(10)->get();
    }
}
