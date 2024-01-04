<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Delivery extends Model
{
    use SoftDeletes;

    public const ICON_DIRECTORY = '/public/delivery-icons';

    public function getTimeToDelivery()
    {
        $timeIncludeDelivery = Carbon::now()->addHour($this->delay);
        $start = Carbon::createFromTimeString($this->start);
        $end = Carbon::createFromTimeString($this->end);;


        if ($start < $end) {
            if ($timeIncludeDelivery > $start && $timeIncludeDelivery < $end) {
                return $timeIncludeDelivery->format('H:i d.m');
            } else {
                return Carbon::createFromTimeString($start)->addDay(1)->format('H:i d.m');
            }
        } else if($start > $end) {
            $end->addDay(1);
            if ($timeIncludeDelivery > $start && $timeIncludeDelivery < $end) {
                return $timeIncludeDelivery->format('H:i d.m');
            } else {
                return Carbon::createFromTimeString($start)->format('H:i d.m');
            }
        } else {
            return $timeIncludeDelivery->format('H:i d.m');
        }
    }

    public function deleteIcon()
    {
        if (!is_null($this->icon_path) && Storage::exists($this->icon_path)) {
            Storage::delete($this->icon_path);
        }
        $this->icon_path = null;
        $this->save();
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
