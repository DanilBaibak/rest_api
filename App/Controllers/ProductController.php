<?php
/**
 * Controller for working with products
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 */
namespace App\Controllers;

use App\Models\ProductsModel,
    Core\AbstractController;

class ProductController extends AbstractController
{
    protected $productManager;

    public function __construct()
    {
        $this->productManager = new ProductsModel();
    }

    /**
     * Method for working with products
     */
    public function products()
    {
        switch($this->getRequestMethod()) {
            /**
             * Update current product
             */
            case 'POST':
                $inputData = $this->getParams();
                if (!empty($inputData)) {
                    echo $this->productManager->updateProduct($this->clearData($inputData));
                } else {
                    header('HTTP/1.0 400 Bad Request');
                }
                break;

            /**
             * Get the list of the current product or products
             */
            case 'GET':
                $productId = $this->fromGet('id');
                if ($productId && !empty($productId)) {
                    $products = $this->productManager->getProduct($productId);
                } else {
                    $products = $this->productManager->getProducts();
                }
                echo json_encode($products);
                break;

            /**
             * Add new product
             *
             * @return bool - true if data was added successful and false if not
             */
            case 'PUT':
                $inputData = $this->getParams();
                if (!empty($inputData)) {
                    //check all data
                    $insertData = array(
                        'name' => isset($inputData['name']) ? $this->clearData($inputData['name']) : "",
                        'count' => isset($inputData['count']) ? $this->clearData($inputData['count']) : "",
                        'cost' => isset($inputData['cost']) ? $this->clearData($inputData['cost']) : "",
                        'group' => isset($inputData['group']) ? $this->clearData($inputData['group']) : "",
                        'shipper' => isset($inputData['shipper']) ? $this->clearData($inputData['shipper']) : ""
                    );
                    //check how many rows were created
                    echo $this->productManager->addProduct($this->clearData($insertData)) > 0 ? true : false;
                } else {
                    header('HTTP/1.0 400 Bad Request');
                }
                break;

            /**
             * Remove current product from the DB
             *
             * @return bool - true if data was removed successful and false if not
             */
            case 'DELETE':
                $data = $this->getParams();
                $productId = $data['id'];
                if (!empty($productId)) {
                    echo $this->productManager->removeProduct($productId);
                } else {
                    header('HTTP/1.0 400 Bad Request');
                }
                break;
        }
    }

    /**
     * Check unique product by different param
     * Method accepts two params - name of the field for checking and value
     */
    public function checkUniqueProduct()
    {
        $fieldName  = $this->fromGet('field');
        $fieldValue = $this->fromGet('value');
        if ($this->isGet() && !empty($fieldName) && !empty($fieldValue)) {
            $productId = $this->productManager->checkField(
                $this->clearData($fieldName),
                $this->clearData($fieldValue)
            );
            $response = empty($productId) ? true : false;
            echo json_encode(array('status' => $response));
        } else {
            header('HTTP/1.0 400 Bad Request');
        }
    }

} 