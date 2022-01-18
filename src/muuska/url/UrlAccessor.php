<?php
namespace muuska\url;
use muuska\util\App;

class UrlAccessor {
    // constantes de la classe
    const EMAIL_VERIFICATION = 'admin/en/email_verification?';

    public function __construct(){}
    
    //get base url
    public static function getBaseUrl(){
        return App::getApp()->getBaseUrl();
    }
    // get email verification url
    public static function getEmailVerificationUrl(){
        return App::getApp()->getBaseUrl() . self::EMAIL_VERIFICATION;
    }
}