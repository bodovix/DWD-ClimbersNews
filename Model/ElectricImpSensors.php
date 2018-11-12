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
    public  function GetMostRecentReadings(){
        $query = $this->con->prepare("SELECT * FROM iot_data ORDER BY createdOn desc LIMIT 10");
        $success = $query->execute([]);
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

    public  function GetReadingByID($id){
        $query = $this->con-> prepare("select * from iot_data where id = :resultId");
        $success = $query -> execute(['resultId' => $id]);

        if ($success && $query -> rowCount() > 0){
            $result = $query -> fetch(PDO::FETCH_OBJ);
            if (!is_null($result)){
                $json = json_encode($result);
                return $json;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
}
