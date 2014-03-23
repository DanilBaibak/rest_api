<?php
/**
 * Work with the auxiliary data.
 *
 * Created by Danil Baibak danil.baibak@gmail.com
 */
namespace App\Controllers;

use App\Models\AuxiliaryDataModel,
    Core\AbstractController;

class AuxiliaryDataController extends AbstractController
{
    protected $auxiliarModel;

    public function __construct()
    {
        $this->auxiliarModel = new AuxiliaryDataModel();
    }
    /**
     * Return list of the group
     */
    public function getGroups()
    {
        if ($this->isGet()) {
            $groups = $this->auxiliarModel->getGroups();
            $sendGroups = array();
            foreach ($groups as $group) {
                $sendGroups[] = array('value' => $group['name'], 'text' => $group['name']);
            }
            echo json_encode($sendGroups);
        } else {
            header('HTTP/1.0 400 Bad Request');
        }
    }

    /**
     * Return list of the shippers
     */
    public function getShippers()
    {
        if ($this->isGet()) {
            $shippers = $this->auxiliarModel->getShippers();
            $sendShippers = array();
            foreach ($shippers as $shipper) {
                $sendShippers[] = array('value' => $shipper['name'], 'text' => $shipper['name']);
            }
            echo json_encode($sendShippers);
        } else {
            header('HTTP/1.0 400 Bad Request');
        }
    }
}