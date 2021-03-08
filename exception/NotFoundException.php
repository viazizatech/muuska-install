<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 11:43 AM
 */

namespace muuska\app\exception;


/**
 * Class NotFoundException
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package muuska\app\exception
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}