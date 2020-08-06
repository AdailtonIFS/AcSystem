<?php 

    namespace app\model;
    use App\model\Connect;
    use PDO;

    class Labs
    {
        #This function is to get data from the database
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


        public function registerLabs($numLab, $descricao)
        {
            $conn = Connect::getConn();
            
            $sql = "INSERT INTO `laboratorio` (`Num_Laboratorio`, `Descricao`, `Status_Ar_Condicionado`) VALUES ('$numLab', '$descricao', '0');";

            $stmt = $conn->prepare($sql);    
            $stmt->execute();

            $linhas = $stmt->rowCount(); //Contando as linhas afetadas com a execução da query sql;

            if ($linhas == 1) {
                return true;
            }else{
                return false;
            }

        }

    }