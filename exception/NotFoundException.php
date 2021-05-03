<?php
/**
 * User: ViaZi Za Tech
 */

namespace muuska\app\exception;


/**
 * Class NotFoundException
 *
 * @author  ViaZi Za Tech <contact@viaziza.com>
 * @package muuska\app\exception
 */
class NotFoundException extends \Exception
{
    //404 Error
    protected $message = 'Page not found';
    protected $code = 404;
}
