<?php 

    namespace app\model;
    use App\model\Connect;
    use PDO;

    class Labs
    {
        public function GetLabs()
        {
            $conn = Connect::getConn();
            
            $sql = "SELECT * FROM `laboratorio`";

            $stmt = $conn->prepare($sql);    
            $stmt->execute();

            $rows = $stmt->rowCount(); //contando as linhas afetadas com a execução da query sql;

                if($rows == 1){
                    return $stmt-> fetch(PDO::FETCH_ASSOC);
                }else{
                    return false;
                }

        }

    }