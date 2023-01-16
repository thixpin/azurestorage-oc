<?php

namespace SoeThura\AzureStorage\Provider;

use Exception;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;
use League\Flysystem\Filesystem;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

class AzureServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const REQUIRED_CONFIG = ['account', 'key', 'container', 'url'];

    public function boot()
    {
        Storage::extend('azure', function ($app, $config) {
            $this->validateConfig($config);

            $endpoint = sprintf(
                'DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s;EndpointSuffix=core.windows.net',
                $config['account'],
                $config['key']
            );

            $client = BlobRestProxy::createBlobService($endpoint);

            $adapter = new AzureBlobStorageAdapter(
                $client,
                (string) $config['container'],
                isset($config['prefix']) ? (string) $config['prefix'] : '',
            );

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }

    protected function validateConfig($config)
    {
        $missingConfigs = array_diff_key(array_flip(static::REQUIRED_CONFIG), $config);
        if (count($missingConfigs) > 0) {
            throw new Exception(
                'Missing required config value(s) for Azure driver: '.
                implode(',', array_keys($missingConfigs))
            );
        }
    }
}
