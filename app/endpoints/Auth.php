<?php
/**
 * Created by PhpStorm.
 * User: arywibowo
 * Date: 11/14/15
 * Time: 10:47 PM.
 */
namespace endpoints;

use Firebase\JWT\JWT;

class Auth
{
    protected function createToken($request)
    {
        $secret_key = getenv('SECRET_KEY');
        $token = array(
            'iss' => getenv('AUTH_ISS'),
            'aud' => $request->getUri()->getHost(),
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + 3600,
        );
        $jwt = JWT::encode($token, $secret_key);

        return $jwt;
    }

    protected function getWhitelistAudience()
    {
        return [
            'localhost',
        ];
    }

    public static function validateToken($token)
    {
        $payload = JWT::decode($token, getenv('SECRET_KEY'), ['HS256']);
        $audiences = self::getWhitelistAudience();
        if (!in_array($payload->aud, $audiences)) {
            return false;
        }

        return true;
    }

    public static function actionAuth($request, $response, $args)
    {
        if ($request->getHeader('Authorization')) {
            $token = explode(' ', $request->getHeader('Authorization')[0])[1];
        } else {
            $token = self::createToken($request);
        }
        // $payload = (array) JWT::decode($token, getenv('SECRET_KEY'), ['HS256']);

        return $response->withHeader('Content-Type', 'text/json')->write(json_encode([
            'token' => $token,
        ]));
    }
}
