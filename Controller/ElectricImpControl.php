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
    public function DisplayRecentReadingsWithDropdown(){
        //get readings
        $readingsJson = $this->impModel->GetMostRecentReadings();
        $readings = json_decode($readingsJson);


        if (count($readings) != 0){
            //readings found, Display them
            $html = "";
            foreach($readings as $record){
                $data = (object) [
                    'id' => $record->id,
                    'createdOn' =>  $record->createdOn,
                    'data' => json_decode($record->dataJson)
                ];
                $outExternal ="";
                $outInternal = "";
                $outVoltage ="";
                $outLight = "";
                $this->ValidateDataReedings($data->data->external,$data->data->internal,$data->data->voltage,$data->data->lightLevel,$outExternal,$outInternal,$outVoltage,$outLight);

                $html .= <<<EOT
                <div data-role="collapsible" id="recentReadingsUL">
                    <h1>{$data->createdOn}</h1>
                        <p class="gsAlertSuccess">Device:   {$data->data->device}</p>
                        <p class="{$outLight}">Light Level:   {$data->data->lightLevel} lx</p>
                        <p class="{$outExternal}">External:   {$data->data->external} C</p>
                        <p class="{$outInternal}">Internal:   {$data->data->internal} C</p>
                        <p class="{$outVoltage}">Voltage:   {$data->data->voltage} V</p>
                </div>
EOT;
            }
            return $html;
        }else{
            return null;
        }
    }
    public function GetResultByID($id){
        $json = $this->impModel->GetReadingByID($id);
        $result = json_decode($json);
        if ($result != null){
            //return  $result->id;
            //return $result->createdOn;
            //return $result->dataJson;

            $data = (object) [
                'id' => $result->id,
                'createdOn' =>  $result->createdOn,
                'data' => json_decode($result->dataJson)
            ];
            return $data;
        }else{
            return null;
        }
    }
        private  function ValidateDataReedings($external,$internal,$voltage,$lightLevel,&$outExternalDisplay,&$outInternalDisplay,&$outVoltage,&$outLight){
        //External

        if($external < 26.5){
            //low
            $outExternalDisplay = "gsAlertDanger";
        }else{
            //normal
            $outExternalDisplay = "gsAlertSuccess";

        }
        //Internal
        if($internal < 26.5){
            //low
            $outInternalDisplay = "gsAlertDanger";
        }else{
            //normal
            $outInternalDisplay = "gsAlertSuccess";

        }
        //Voltage
        if($voltage < 3.2){
            //low
            $outVoltage = "gsAlertDanger";
        }else{
            //normal
            $outVoltage = "gsAlertSuccess";

        }
        //Light Level
        if($lightLevel < 50000){
            //low
            $outLight = "gsAlertDanger";
        }else{
            //normal
            $outLight = "gsAlertSuccess";
        }
    }
}