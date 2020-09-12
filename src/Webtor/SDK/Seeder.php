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

    public function url($path, $extra = '', $params = [])
    {
        if ($this->auth) {
            $params['token'] = $this->auth->getToken();
        }
        if (isset($this->params['apiKey'])) {
            $params['api-key'] = $this->params['apiKey'];
        }
        $url = $this->params['apiUrl'].'/'.$this->infoHash.'/'.rawurlencode(ltrim($path, '/')).$extra.'?'.http_build_query($params);
        return $url;
    }

    public function hlsUrl($path, $viewSettings = [], $playlist = 'index.m3u8')
    {
        $extra = '';
        if (isset($viewSettings['a'])) {
            $extra .= 'a' + $viewSettings['a'];
        }
        if (isset($viewSettings['s'])) {
            $extra .= 's' + $viewSettings['s'];
        }
        if ($extra) $extra = ':' + $extra;
        $url = $this->url($path, '~hls'.$extra.'/'.$playlist);
        return $url;
    }
}