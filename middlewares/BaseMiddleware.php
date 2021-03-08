<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 11:33 AM
 */

namespace muuska\app\middlewares;


/**
 * Class BaseMiddleware
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package muuska\app
 */
abstract class BaseMiddleware
{
    abstract public function execute();
}