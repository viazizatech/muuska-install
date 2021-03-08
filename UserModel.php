<?php
/**
 * User: TheCodeholic
 * Date: 7/25/2020
 * Time: 10:13 AM
 */

namespace ng\core;

use ng\core\db\DbModel;

/**
 * Class UserModel
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package ng\core
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}