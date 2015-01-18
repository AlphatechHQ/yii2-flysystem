<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem\adapters;

use League\Flysystem\Adapter\Zip;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Object;

/**
 * ZipConnector
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class ZipConnector extends Object implements ConnectorInterface
{
    /**
     * @var string
     */
    public $location;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->location === null) {
            throw new InvalidConfigException('The "location" property must be set.');
        }

        $this->location = Yii::getAlias($this->location);
    }

    /**
     * Establish an adapter connection.
     *
     * @return Zip
     */
    public function connect()
    {
        return new Zip($this->location);
    }
}
