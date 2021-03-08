<?php
/**
 * User: ViaZi Za Tech
 */

namespace muuska\app\middlewares;


use muuska\app\Application;
use muuska\app\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 *
 * @author  ViaZi Za Tech <contact@viaziza.com>
 * @package muuska\app
 */
class AuthMiddleware extends BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}