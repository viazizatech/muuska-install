<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 11:35 AM
 */

namespace muuska\app\exception;


use muuska\app\Application;

/**
 * Class ForbiddenException
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package muuska\app\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}