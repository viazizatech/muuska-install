<?php
/**
 * User: ViaZi Za Tech
 */

namespace muuska\app\exception;


use muuska\app\Application;

/**
 * Class ForbiddenException
 *
 * @author  ViaZi Za Tech <contact@viaziza.com>
 * @package muuska\app\exception
 */
class ForbiddenException extends \Exception
{
    //Exception 403
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}
