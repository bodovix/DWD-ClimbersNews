<?php
/**
 * Created by PhpStorm.
 * User: Gwydion
 * Date: 11/12/2018
 * Time: 11:08 AM
 */

class ElectricImpControl
{
    private $con;
    private $impModel;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->impModel = new ElectricImpSensors();
    }
    public function DisplayRecentReadings($numberToDisplay){
        //get readings
        $readingsJson = $this->impModel->GetMostRecentReadings($numberToDisplay);
        $readings = json_decode($readingsJson);
        $html = "";
        if (count($readings) != 0){
            //readings found, Display them
            foreach($readings as $record){
                $html .= "<li>".$record->createdOn."</li>";
            }
            return $html;
        }else{
            return null;
        }
        //display them
    }
}