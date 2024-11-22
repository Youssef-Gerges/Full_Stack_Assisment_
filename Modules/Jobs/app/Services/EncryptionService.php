<?php

namespace Modules\Jobs\Services;

use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Modules\Jobs\Models\Document;

class EncryptionService
{

    public static function encryptKey(): string
    {
        return Crypt::generateKey('aes-128-cbc');
    }

    public static function decryptKey(string $text): string
    {
        return Crypt::decryptString($text);
    }

    public static function encrypt_file($file, $key)
    {
        $file = file_get_contents($file);
        $encrypter = new Encrypter($key, 'aes-128-cbc');
        $content = $encrypter->encrypt($file);
        $name = Str::random() . '.txt';
        file_put_contents($name, $content);
        return $name;
    }

    public static function decrypt_file($file, $key){
        $key = Crypt::decrypt($key);
        $file = file_get_contents($file);
        $encrypter = new Encrypter($key, 'aes-128-cbc');
        $content = $encrypter->decrypt($file);
        return $content;
    }


    public static function getDocumentFile($header_path, $header_key, $body_path, $body_key)
    {

        $header_content = EncryptionService::decrypt_file($header_path, $header_key);
        $body_content = EncryptionService::decrypt_file($body_path, $body_key);

        return $header_content . " \n " . $body_content;
    }

}
