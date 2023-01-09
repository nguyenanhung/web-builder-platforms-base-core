<?php

namespace nguyenanhung\WebBuilderModules\Platforms\Your_Module\Plugins;

use nguyenanhung\WebBuilderModules\Platforms\Your_Module\Base\BaseCore;

/**
 * Class BasePlugins
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\Your_Module\Plugins
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BasePlugins extends BaseCore
{
    /**
     * BasePlugins constructor.
     *
     * @param array $options
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->logger->setLoggerSubPath(__CLASS__);
    }
}
