<?php

class ElectricImpSensors
{
    private $con;
    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
    }

    public function Create($dataJson){
        $query = $this->con-> prepare("insert into iot_data(dataJson)values(:dataJson);");
        $success = $query -> execute([
            'dataJson' =>  $dataJson
        ]);

        if ($success && $query -> rowCount() > 0){
            $json = json_encode(true);
            return $json;
        }else{
            return json_encode(false);
        }
    }

}
