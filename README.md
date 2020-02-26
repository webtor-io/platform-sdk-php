# platform-sdk-php
Webtor.io platform SDK for online torrent streaming

## Installation
```
composer require webtor/platform-sdk-php
```

## Basic usage

```php
<?php
require __DIR__ . '/vendor/autoload.php';

$torrentUrl = 'https://github.com/webtorrent/webtorrent.io/blob/master/static/torrents/sintel.torrent?raw=true';
$data = file_get_contents($torrentUrl);

$sdk = new Webtor\SDK([
    'apiUrl'           => 'https://api.webtor.io',
    // 'grpcAddr'         => '127.0.0.1:50051',
    'grpcAddr'         => 'grpc.webtor.io:443',
    'apiKey'           => 'your_api_key',
    'secret'           => 'your_secret',
    'grpcCredentials'  => \Grpc\ChannelCredentials::createSsl(),
]);

$infoHash = $sdk->torrent()->push($data);
$url = $sdk->seeder($infoHash)->url('/Sintel/Sintel.mp4');
echo($url);
```

## Authentication
You don't have to provide api-keys and secrets if you host webtor-instance on your own. Just follow [this guide](https://github.com/webtor-io/helm-charts) to setup it.

## WIP
Currently PHP SDK doesn't provide full functionality as an [JavaScript-version](https://github.com/webtor-io/platform-sdk-js). But it will.
