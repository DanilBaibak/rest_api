<?php
/**
 * Model for working with auxiliary data
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 */
namespace App\Models;

use Core\Db\DbAdapter;

class AuxiliaryDataModel extends DbAdapter
{
    /**
     * Get list of the groups
     *
     * @return array
     */
    public function getGroups()
    {
        return $this->getArray('SELECT name FROM ng_groups ORDER BY name');
    }

    /**
     * Get list of the shippers
     *
     * @return array
     */
    public function getShippers()
    {
        return $this->getArray('SELECT name FROM ng_shippers ORDER BY name');
    }
}
