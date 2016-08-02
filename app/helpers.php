<?php

use App\Models\Bestallningssystem\Order;
/**
 * Bokningssystem-HTK Global helpers
 */
if (! function_exists('defaultStartTime')) {
    /**
     * Get the CapacityConfig and serve its data
     *
     * @return mixed
     */
    function defaultStartTime($property = null)
    {
        $startTime = Carbon\Carbon::now();
        $minutes = date('i', strtotime(Carbon\Carbon::now()->addMinutes(4)));
        $roundedMinutes = $minutes - ($minutes % 5);
        $roundedMinutes = (strlen($roundedMinutes) == 1) ? '0'.$roundedMinutes : $roundedMinutes;
        return $startTime->format('H') .':'. $roundedMinutes;
    }
}


if (! function_exists('defaultStopTime')) {
    /**
     * Get the CapacityConfig and serve its data
     *
     * @return mixed
     */
    function defaultStopTime($property = null)
    {
        $startTime = Carbon\Carbon::now();
        $minutes = date('i', strtotime(Carbon\Carbon::now()->addMinutes(4)));
        $roundedMinutes = $minutes - ($minutes % 5);
        $roundedMinutes = (strlen($roundedMinutes) == 1) ? '0'.$roundedMinutes : $roundedMinutes;
        return $startTime->addHours(2)->format('H') .':'. $roundedMinutes;
    }
}
