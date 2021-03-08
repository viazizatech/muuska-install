<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace ng\core\middlewares;


/**
 * Class BaseMiddleware
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package ng\core
 */
abstract class BaseMiddleware
{
    abstract public function execute();
}