<?php

namespace Webtor\SDK;

class Seeder
{
    private $infoHash;
    private $params;
    private $auth;

    public function __construct($infoHash, $params = [], $auth)
    {
        $this->infoHash = $infoHash;
        $this->params = $params;
        $this->auth = $auth;
    }

    public function url($path)
    {
        $params = [];
        if ($this->auth) {
            $params['token'] = $this->auth->getToken();
        }
        if (isset($this->params['apiKey'])) {
            $params['api-key'] = $this->params['apiKey'];
        }
        $url = $this->params['apiUrl'].'/'.$this->infoHash.'/'.urlencode(ltrim($path, '/')).'?'.http_build_query($params);
        return $url;
    }
}