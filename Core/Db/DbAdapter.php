<?php
/**
 * Wrapper for MySqli
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 */

namespace Core\Db;

class DbAdapter extends AbstractDb
{
    private $result = "";

    /**
     * Get first value
     *
     * @param string $query - query select
     * @return string mixed - value that was selected or bool false if any results
     */
    public function getResult($query)
    {
        $query = $this->query($query);
        //if there is result, get first value
        if ($query->num_rows > 0) {
            $queryResult = $query->fetch_array();
            $this->result = $queryResult[0];
        }
        return $this->result;
    }

    /**
     * Get first row
     *
     * @param string $query - query
     * @return mixed - first row that was selected or bool false if any results
     */
    public function getRow($query)
    {
        $query = $this->query($query);
        //if there is result, get first row
        return $query->num_rows > 0 ? $query->fetch_row() : $this->result;
    }

    /**
     * Get assoc array
     *
     * @param string $query - query
     * @return array assoc array that was selected or bool false if any results
     */
    public function getArray($query)
    {
        $query = $this->query($query);
        //if there is result
        if ($query->num_rows > 0) {
            $this->result = array();
            //save all data in array
            while($row = $query->fetch_assoc()) {
                $this->result[] = $row;
            }
        }
        return $this->result;
    }

    /**
     * Make all type of queries INSERT, UPDATE, DELETE
     *
     * @param string $query - query
     * @return bool true if query is success and false if query is fail
     */
    public function makeQuery($query)
    {
        return $this->query($query);
    }

    /**
     * Return id that will be assigned for the next insert
     *
     * @return int - next id
     */
    public function getLastInsertId()
    {
        return $this->lastInsertId();
    }

    /**
     * Return count of the rows that were affected
     *
     * @return int count of the rows
     */
    public function getAffectedRows()
    {
        return$this->affectedRows();
    }
} 