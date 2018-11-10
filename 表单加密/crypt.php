<?php
class Crypt
{
    private $privateKey = '';

    private $publicKey = '';

    const PRIVATE_KEY = 'C:/Users/Administrator/Desktop/key/rsa_private_key.pem';

    const PUBLIC_KEY = 'C:/Users/Administrator/Desktop/key/rsa_public_key.pem';

    public function __construct()
    {
        extension_loaded('openssl') or die('请开启openssl扩展');
    }

    //公钥加密
    public function publicEncrypt($data)
    {
        if (file_exists(self::PUBLIC_KEY))
        {
            $public_key = file_get_contents(self::PUBLIC_KEY);
            $this->publicKey = openssl_get_publickey($public_key);
            if ($this->publicKey)
            {
                openssl_public_encrypt($data, $encrypted, $this->publicKey);
                $encrypted = base64_encode($encrypted);
                return $encrypted;
            }
        }
        return false;
    }

    //私钥解密
    public function privateDecrypt($encrypted)
    {
        if (file_exists(self::PRIVATE_KEY))
        {
            $private_key = file_get_contents(self::PRIVATE_KEY);
            $this->privateKey = openssl_get_privatekey($private_key);
            if ($this->privateKey)
            {
                openssl_private_decrypt(base64_decode($encrypted), $decrypted, $this->privateKey);
                return $decrypted;
            }
        }
        return false;
    }
}
