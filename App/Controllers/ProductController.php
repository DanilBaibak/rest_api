<?php
/**
 * Controller for working with products
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 */
namespace App\Controllers;

use App\Models\ProductsModel;

class ProductController extends \Core\AbstractController
{
    protected $productManager;

    public function __construct()
    {
        $this->productManager = new ProductsModel();
    }

    /**
     * Get current product by id
     *
     * @param int $productId id of the current product
     */
    public function getProduct($productId)
    {
        echo json_encode($this->productManager->getProduct((int)$productId));
    }

    /**
     * Get list of the whole products
     */
    public function getProducts()
    {
        $products = $this->productManager->getProducts();
        echo json_encode($products);
    }

    /**
     * Create product
     */
    public function createProduct()
    {
        $inputData = $this->getParams();
        if (!empty($inputData)) {
            /**
             * TODO - write some model for checking data
             */
            //check how many rows were created
            echo $this->productManager->addProduct($this->clearData($inputData)) > 0 ? true : false;
        } else {
            header('HTTP/1.0 400 Bad Request');
        }
    }

    /**
     * Update current product
     */
    public function updateProduct()
    {
        $inputData = $this->getParams();
        if (!empty($inputData)) {
            echo $this->productManager->updateProduct($this->clearData($inputData));
        } else {
            header('HTTP/1.0 400 Bad Request');
        }
    }

    /**
     * Remove current product
     *
     * @param int $productId id of the product
     */
    public function removeProduct($productId)
    {
        if (!empty($productId)) {
            echo $this->productManager->removeProduct((int)$productId);
        } else {
            header('HTTP/1.0 400 Bad Request');
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
        if (!empty($fieldName) && !empty($fieldValue)) {
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