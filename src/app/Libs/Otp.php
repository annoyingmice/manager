<?php

namespace App\Libs;

use PragmaRX\Google2FA\Google2FA;
use PragmaRX\Google2FA\Support\Constants;

class Otp
{
    private $service;

    public function __construct()
    {
        $this->service = new Google2FA();
    }

    /**
     * Generate OTP secret key
     * @param int $len optional
     * @param string $prefix optional
     * @return string
     */
    public function createSecretKey(int $len = 32, string $prefix = ''): string
    {
        return $this->service->generateSecretKey($len, $prefix);
    }

    /**
     * Generate QRCode URL
     * @param string $label
     * @param string $email
     * @param string $secret
     * @return string
     */
    public function createQR(string $label, string $email, string $secret): string
    {
        return $this->service->getQRCodeUrl($label, $email, $secret);
    }

    /**
     * Set algorithm to be used
     * NOTE: call this first before other function
     * @param string $algo ["SHA1", "SHA256", "SHA512"]
     * @return void
     */
    public function setAlgo(string $algo): void
    {
        $this->service->setAlgorithm($algo);
    }

    /**
     * Verify token
     * @param string $secret
     * @param string $key user specified key
     * @param mixed $oldTimestamp (optional) the timestamp from last verfied key
     * @param int $window optional
     * @param mixed $timestamp optional
     * @return bool|int
     */
    public function verify(string $secret, string $key, mixed $oldTimestamp = null, int $window = 4, mixed $timestamp = null): bool
    {
        return $this->service->verifyKeyNewer($secret, $key, $oldTimestamp, $window, $timestamp);
    }
    
    /**
     * Get current token
     * @param string $secret
     * @return mixed
     */
    public function getCurrentOtp(string $secret): mixed
    {
        return $this->service->getCurrentOtp($secret);
    }
}
