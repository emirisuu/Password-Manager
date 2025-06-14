<?php

const AES_ALGORITHM = "aes-256-cbc";

class AES {
    private $key;
    private $iv_length;

    function __construct(string $key) {
        $this -> key = $key;
        $this -> iv_length = openssl_cipher_iv_length(AES_ALGORITHM);
    }

    public function encrypt(string $text): array {
        $iv = openssl_random_pseudo_bytes($this->iv_length);
        $encrypted_text = openssl_encrypt($text, AES_ALGORITHM, $this->key, 0, $iv);

        $result = array($encrypted_text, $iv);
        return $result;
    }

    public function decrypt(string $encrypted_text, string $iv): string {
        $decrypted_text = openssl_decrypt($encrypted_text, AES_ALGORITHM, $this->key, 0, $iv);
        return $decrypted_text;
    }
}