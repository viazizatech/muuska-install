<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 11:43 AM
 */

namespace ng\core\exception;


/**
 * Class NotFoundException
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package ng\core\exception
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;
}