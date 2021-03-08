<?php
/**
 * User: ViaZi Za Tech
 */

namespace muuska\app;

use muuska\app\middlewares\BaseMiddleware;
/**
 * Class Controller
 *
 * @author  ViaZi Za Tech <contact@viaziza.com>
 * @package muuska\app
 */
class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var \muuska\app\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return \muuska\app\middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}