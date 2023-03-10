<?php

namespace nguyenanhung\WebBuilderModules\Platforms\BaseCore\Database;

use nguyenanhung\WebBuilderModules\Platforms\BaseCore\Base\BaseCore;
use nguyenanhung\WebBuilderModules\Platforms\BaseCore\Database\Traits\SignatureTable;
use nguyenanhung\MyDatabase\Model\BaseModel;

/**
 * Class Database
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\BaseCore\Database
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Database extends BaseCore
{
    use SignatureTable;

    /** @var array $database */
    protected $database;

    /**
     * Database constructor.
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

    /**
     * Function setDatabase
     *
     * @param $database
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/06/2022 38:16
     */
    public function setDatabase($database): Database
    {
        $this->database = $database;

        return $this;
    }

    /**
     * Function connection
     *
     * @return \nguyenanhung\MyDatabase\Model\BaseModel
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/06/2022 40:58
     */
    public function connection(): BaseModel
    {
        $DB = new BaseModel();
        $DB->debugStatus = $this->options['debugStatus'];
        $DB->debugLevel = $this->options['debugLevel'];
        $DB->debugLoggerPath = $this->options['loggerPath'];
        $DB->debugLoggerFilename = 'Log-' . date('Y-m-d') . '.log';
        $DB->setDatabase($this->database);
        $DB->__construct($this->database);

        return $DB;
    }

    /**
     * Function checkExitsRecord
     *
     * @param $wheres
     * @param $tableName
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/08/2022 17:45
     */
    public function checkExitsRecord($wheres, $tableName): bool
    {
        $DB = $this->connection();
        $DB->setTable($tableName);
        $result = $DB->checkExists($wheres);
        $DB->disconnect();
        unset($DB);

        return $result === 1;
    }

    /**
     * Function initDBTable
     *
     * @param $table
     *
     * @return \nguyenanhung\MyDatabase\Model\BaseModel
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/01/2023 12:31
     */
    protected function initDBTable($table): BaseModel
    {
        $DB = $this->connection();
        $DB->setTable($table);

        return $DB;
    }
}
