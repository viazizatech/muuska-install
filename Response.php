<?php
/**
 * User: ViaZi Za Tech
 */

namespace muuska\app;


/**
 * Class Response
 *
 * @author  ViaZi Za Tech <contact@viaziza.com>
 * @package muuska\app
 */
class Response
{
    public function statusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect($url)
    {
        header("Location: $url");//url
    }
}
