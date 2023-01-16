# Azure Filesystem Driver

This plugin adds a Filesystem driver for Azure Blob Storage.

You need to install the `league/flysystem-azure-blob-storage` package to use this driver.

```bash
composer require league/flysystem-azure-blob-storage:^3.0   
```



## Using the Azure driver

Simply add another `disk` in `filesystems.php`.

You will need your Azure Blob account name, API key and container name.

### Update the filesystems.php config file

```php
'disks' => [
    'media' => [
            'driver' => 'azure',
            'account' => env('AZURE_ACCOUNT', 'my-azure-account'),
            'key' => env('AZURE_KEY', 'my-api-key'),
            'container' => env('AZURE_CONTAINER', 'my-container-name'),
            'url' => env('AZURE_BLOB_SERVICE_URL', ''),
            'visibility' => 'public',
            'throw' => false,
        ],

        'azure' => [
            'driver' => 'azure',
            'account' => env('AZURE_ACCOUNT', 'my-azure-account'),
            'key' => env('AZURE_KEY', 'my-api-key'),
            'container' => env('AZURE_CONTAINER', 'my-container-name'),
            'url' => env('AZURE_BLOB_SERVICE_URL', ''),
            'visibility' => 'public',
            'throw' => false,
        ],
]
```

You can create as many disks as you want.

---
### Add this to your .env file

```bash
AZURE_ACCOUNT=cmhl
AZURE_KEY=4qmjU6kfdg6bze+MaExIM3OuM6vS4mlkfiwmXBvEybDqRtAZxuSu9NN1ywYeP/iYtPFOKWZbGnoO+ASt8LR79A==
AZURE_CONTAINER=soethura-cmhl-container
AZURE_BLOB_SERVICE_URL=https://cmhl.blob.core.windows.net/soethura-cmhl-container

FILESYSTEM_DRIVER=azure
```




