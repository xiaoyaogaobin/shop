<?php

namespace App\Observers;

use App\Models\Config;
use Composer\Cache;

class ConfigObserver
{
    /**
     * Handle the config "created" event.
     *
     * @param  \App\Models\Config  $config
     * @return void
     */
    public function created(Config $config)
    {
        //
        $this->saveConfigToCache();
    }

    /**
     * Handle the config "updated" event.
     *
     * @param  \App\Models\Config  $config
     * @return void
     */
    public function updated(Config $config)
    {
        //
        $this->saveConfigToCache();

    }
    //存储缓存
    public function saveConfigToCache(){

            \Cache::forever('config_cache', Config::pluck('data','name'));
    }
    /**
     * Handle the config "deleted" event.
     *
     * @param  \App\Models\Config  $config
     * @return void
     */
    public function deleted(Config $config)
    {
        //
    }

    /**
     * Handle the config "restored" event.
     *
     * @param  \App\Models\Config  $config
     * @return void
     */
    public function restored(Config $config)
    {
        //
    }

    /**
     * Handle the config "force deleted" event.
     *
     * @param  \App\Models\Config  $config
     * @return void
     */
    public function forceDeleted(Config $config)
    {
        //
    }
}
