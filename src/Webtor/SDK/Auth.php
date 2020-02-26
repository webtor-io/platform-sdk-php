<?php
namespace Webtor\SDK;

use \Firebase\JWT\JWT;

class Auth
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getToken()
    {
        $payload = null;
        if (isset($this->params['claims']) && $this->params['claims']) {
            $payload = $this->params['claims'];
        }
        $token = JWT::encode($payload, $this->params['secret']);
        return $token;
    }
}