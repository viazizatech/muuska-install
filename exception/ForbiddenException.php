<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 11:35 AM
 */

namespace ng\core\exception;


use ng\core\Application;

/**
 * Class ForbiddenException
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package ng\core\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}