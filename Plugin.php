<?php

namespace SoeThura\AzureStorage;

use App;
use SoeThura\AzureStorage\Provider\AzureServiceProvider;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'AzureStorage',
            'description' => 'Azure Blob Storage Driver for OctoberCMS V3',
            'author' => 'Soe Thura',
            'icon' => 'icon-cloud-upload',
        ];
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        App::register(AzureServiceProvider::class);
    }
}
