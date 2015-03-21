<?php
/**
 * Class AbstractDb - abstract class for working with MySQLi:
 * - connect with DB
 * - run query
 * - return last insert id
 * - return affects rows
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 */

namespace Core\Db;

abstract class AbstractDb
{
    private $mysqli;

    /**
     * Get credentials for database and creation connect
     */
    function __construct()
    {
        /**
         * Get config
         */
        $config = include CONFIG . 'config.php';

        //connection to DB
        $this->mysqli = new \mysqli(
            $config['Db']['host'], $config['Db']['username'], $config['Db']['password'], $config['Db']['dbName']
        );

        if ($this->mysqli->connect_error) {
            die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
        }
    }

    /**
     * Run the query
     *
     * @param $query Current query. Screening of variables remains on the conscience for developer!
     * @param array $parameters incoming parameters
     *
     * @return object of MySQLi
     */
    protected function query($query, $parameters)
    {
        $preparedQuery = $query;
        if (!empty($parameters)) {
            //prepare parameters
            $preparedParameters = $this->prepareQueryParams($parameters);
            //prepare query
            $preparedQuery = str_replace(array_keys($preparedParameters), array_values($preparedParameters), $query);
        }
        $queryResult = $this->mysqli->query($preparedQuery);
        if ($this->mysqli->errno) {
            die('Select Error (' . $this->mysqli->errno . ') ' . $this->mysqli->error);
        }
        return $queryResult;
    }

    /**
     * Prepare incoming parameters for the query
     *
     * @param array $parameters incoming parameters
     * @return array
     */
    private function prepareQueryParams($parameters)
    {
        $preparedParameters = array();
        foreach ($parameters as $key => $value) {
            $preparedParameters[":" . $key] = addslashes($value);
        }
        return $preparedParameters;
    }

    /**
     * Return id that will be assigned for the next insert
     *
     * @return int next id
     */
    protected function lastInsertId()
    {
        return $this->mysqli->insert_id;
    }

    /**
     * Return count of the rows that were affected
     *
     * @return int count of the rows
     */
    protected function affectedRows()
    {
        return $this->mysqli->affected_rows;
    }
}
