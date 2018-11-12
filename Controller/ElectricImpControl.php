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
    public function DisplayRecentReadings(){
        //get readings
        $readingsJson = $this->impModel->GetMostRecentReadings();
        $readings = json_decode($readingsJson);

        $html = "";
        if (count($readings) != 0){
            //readings found, Display them
            foreach($readings as $record){
                $html .= <<<EOT
                    <li id="{$record->id}"class="ui-li-static ui-body-inherit ui-btn GSListItem">
                        <a href="View/Includes/GetDataReading.php?readingNumber={$record->id}">
                            {$record->createdOn}
                        </a>
                    </li>
EOT;
            }
            return $html;
        }else{
            return null;
        }
    }
}