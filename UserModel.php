<?php
/**
 * User: ViaZi Za Tech
 */

namespace muuska\app;

use muuska\app\db\DbModel;

/**
 * Class UserModel
 *
 * @author  ViaZi Za Tech <contact@viaziza.com>
 * @package muuska\app
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}