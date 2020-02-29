<?php
namespace Webtor\SDK;

use \Firebase\JWT\JWT;

class Auth
{
    private $params;

    public function __construct($params)
    {
        $defaults = [
            'tokenExpire' => 5 * 60 * 60, // 5 hours
        ];
        $this->params = array_merge($defaults, $params);
    }

    public function getToken()
    {
        $payload = [];
        if (isset($this->params['claims']) && $this->params['claims']) {
            $payload = $this->params['claims'];
        }
        $payload['exp'] = time() + $this->params['tokenExpire'];
        $token = JWT::encode($payload, $this->params['secret']);
        return $token;
    }
}