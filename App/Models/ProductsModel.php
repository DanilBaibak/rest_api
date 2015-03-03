<?php
/**
 * Model for working with products
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 */
namespace App\Models;

use Core\Db\DbAdapter;

class ProductsModel extends DbAdapter
{
    /**
     * Get the list of the all products
     *
     * @return array all products
     */
    public function getProducts()
    {
        return $this->getArray("SELECT id, name, count, cost, `group`, shipper FROM ng_products ORDER BY name");
    }

    /**
     * Add new product
     *
     * @param $data array data of the new product
     * @return int number of the rows that were created
     */
    public function addProduct($data)
    {
        return $this->makeQuery("INSERT INTO ng_products (name, count, cost, `group`, shipper)" .
            " VALUES(':name', ':count', ':cost', ':group', ':shipper')",
            array(
                'name' => $data['name'],
                'count' => $data['count'],
                'cost' => $data['cost'],
                'group' => $data['group'],
                'shipper' => $data['shipper']
            )
        );
    }

    /**
     * Remove row by id
     *
     * @param $id int id of the product
     * @return bool int number of the rows that were deleted
     */
    public function removeProduct($id)
    {
        return $this->makeQuery('DELETE FROM ng_products WHERE id = :id', array('id' => (int) $id));
    }

    /**
     * Get current product by id
     *
     * @param $id int - id of the product
     * @return array
     */
    public function getProduct($id)
    {
        return $this->getArray(
            "SELECT id, name, count, cost, `group`, shipper FROM ng_products WHERE id = :id",
            array('id' => (int)$id)
        );
    }

    /**
     * Updating product
     *
     * @param $data array - new data
     * @return int - number of the rows that were updated
     */
    public function updateProduct($data)
    {
        return $this->makeQuery(
            "UPDATE ng_products SET name=':name', count=':count', cost=':cost', `group`=':group', shipper=':shipper' " .
            "WHERE id=':id'",
            array(
                'name' => $data['name'],
                'count' => $data['count'],
                'cost' => $data['cost'],
                'group' => $data['group'],
                'shipper' => $data['shipper'],
                'id' => $data['id']
            )
        );
    }

    /**
     * Check product by chosen field
     *
     * @param $field - name of the field
     * @param $value - value of the field
     * @return int - id of the product if it will be found
     */
    public function checkField($field, $value)
    {
        return $this->getResult(
            "SELECT id FROM ng_products WHERE :fieldName = ':value'",
            array('fieldName' => $field, 'value' => $value)
        );
    }
}