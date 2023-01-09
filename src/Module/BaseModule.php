<?php

namespace nguyenanhung\WebBuilderModules\Platforms\BaseCore\Module;

use nguyenanhung\WebBuilderModules\Platforms\BaseCore\Base\BaseCore;
use nguyenanhung\WebBuilderModules\Platforms\BaseCore\Database\Database;

/**
 * Class BaseModule
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\BaseCore\Module
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BaseModule extends BaseCore
{
    /**
     * BaseModule constructor.
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
        $this->db = new Database($options);
    }
}
