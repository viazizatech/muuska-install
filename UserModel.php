<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 10:13 AM
 */

namespace muuska\app;

use muuska\app\db\DbModel;

/**
 * Class UserModel
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package muuska\app
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}