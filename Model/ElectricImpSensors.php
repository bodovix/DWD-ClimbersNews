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
    public  function GetMostRecentReadings($selectTop){
        $query = $this->con->prepare("SELECT * FROM iot_data LIMIT :selectTop");
        $success = $query->execute(['selectTop' => $selectTop]);

        if ($success) {
            if ($query->rowCount() > 0) {
                $result =  $query->fetchAll(PDO::FETCH_OBJ);
                return json_encode($result);
            } else {
                return null;
            }
        }else{
            return null;
        }
    }

}
