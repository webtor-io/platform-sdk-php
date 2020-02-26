<?php
namespace Webtor;

class SDK
{
    private $params = [];
    private $torrent = null;
    private $auth = null;

    public function __construct($params = [])
    {
        $this->params = $params;
    }

    private function auth()
    {
        if (!isset($this->params['secret'])) return null;
        if (!$this->auth) $this->auth = new SDK\Auth($this->params);
        return $this->auth;
    }

    public function torrent()
    {
        if (!$this->torrent) $this->torrent = new SDK\Torrent($this->params, $this->auth());
        return $this->torrent;
    }

    public function seeder($infoHash)
    {
        return new SDK\Seeder($infoHash, $this->params, $this->auth());
    }
}