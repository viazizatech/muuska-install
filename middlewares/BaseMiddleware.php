<?php
/**
 * User: ViaZi Za Tech
 */

namespace muuska\app\middlewares;


/**
 * Class BaseMiddleware
 *
 * @author  ViaZi Za Tech <contact@viaziza.com>
 * @package muuska\app
 */
abstract class BaseMiddleware
{
    abstract public function execute();
}