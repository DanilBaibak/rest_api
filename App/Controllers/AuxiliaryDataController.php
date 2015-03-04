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
     * Return list of the groups
     */
    public function getGroups()
    {
        $groups = $this->auxiliarModel->getGroups();
        //map data
        $sendGroups = array();
        foreach ($groups as $group) {
            $sendGroups[] = array('value' => $group['name'], 'text' => $group['name']);
        }
        echo json_encode($sendGroups);
    }

    /**
     * Return list of the shippers
     */
    public function getShippers()
    {
        $shippers = $this->auxiliarModel->getShippers();
        $sendShippers = array();
        //map data
        foreach ($shippers as $shipper) {
            $sendShippers[] = array('value' => $shipper['name'], 'text' => $shipper['name']);
        }
        echo json_encode($sendShippers);
    }
}
