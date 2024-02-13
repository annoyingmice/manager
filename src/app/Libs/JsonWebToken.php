<?php

namespace App\Libs;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Libs\Seclib;
use UnexpectedValueException;
use stdClass;
use Error;

class JsonWebToken
{
    const KEY_TYPE = 'RS256';

    /**
     * Generate token
     * @param stdClass|array $credentials
     * @return string
     */
    public static function token(stdClass|array $credentials): string
    {
        $currentTime = time();

        $payload = [
            'iss' => env('APP_DOMAIN'),
            'aud' => '*.' . env('APP_DOMAIN'),
            'iat' => $currentTime,
            'exp' => $currentTime + ((60 * 60 /* 1hour */) * 7 /* 7hours */),
            'crd' => $credentials,
        ];

        return JWT::encode($payload, Seclib::privateKey(), JsonWebToken::KEY_TYPE);
    }

    /**
     * Token credentials
     * @param string $credentials
     * @return stdClass
     */
    public static function credentials(?string $token): stdClass|UnexpectedValueException
    {
        if (!$token) {
            throw new Error('Invalid credentials, please try again.');
        }
        return JWT::decode($token, new Key(Seclib::publicKey(), JsonWebToken::KEY_TYPE));
    }

    /**
     * Serialize decoded credentials for guard
     * @param ?stdClass $credentials
     * @return array
     */
    public static function serializeGuard(stdClass $credentials): array
    {
        return array_merge(
            [
                'iss' => $credentials->iss,
                'aud' => $credentials->aud,
                'iat' => $credentials->iat,
                'exp' => $credentials->exp,
            ],
            (array) $credentials->crd
        );
    }
}
