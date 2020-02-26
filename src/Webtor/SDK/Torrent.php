<?php

namespace Webtor\SDK;

class Torrent
{
    private $params = [];
    private $auth = null;
    private $client = null;

    public function __construct($params = [], $auth = null)
    {
        $defaults = [
            'grpcCredentials' => \Grpc\ChannelCredentials::createInsecure(),
        ];
        $this->params = array_merge($defaults, $params);
        $this->auth = $auth;
    }
    private function client()
    {
        if ($this->client) return $this->client;
        $this->client = new \Webtor\Grpc\TorrentStoreClient($this->params['grpcAddr'], [
            'credentials' => $this->params['grpcCredentials'],
        ]);
        return $this->client;
    }
    public function push($data, $expire = 86400, $metadata = [])
    {
        $client = $this->client();
        $request = new \Webtor\Grpc\PushRequest();
        $request->setTorrent($data);
        $request->setExpire($expire);
        if ($this->auth) {
            $metadata['token'] = [$this->auth->getToken()];
        }
        if (isset($this->params['apiKey'])){
            $metadata['api-key'] = [$this->params['apiKey']];
        }
        $metadata['path'] = ['/store'];
        list($reply, $status) = $client->Push($request, $metadata)->wait();
        if ($status->code != 0) {
            throw new \Exception($status->details);
        }
        return $reply->getInfoHash();
    }
}