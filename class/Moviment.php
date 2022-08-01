<?php
/**
 *Class Moviment 
 * @author Cândido
 * @version 1.0
 */
class Moviment{
    /**
     * Propertie $idMoviment
     * @access private
     */
    private $idMoviment;

    /**
     * Propertie $date
     * @access private
     */
    private $date;

    /**
     * Propertie $description
     * @access private
     */
    private $description;

    /**
     * Propertie $value
     * @access private
     */
    private $value;

    /**
     * Propertie $type
     * @access private
     */
    private $type;

    /**
     * Method save
     * @access public
     * @param Array $data
     * @return int/boolean id moviment ou false;
     */
    public function save($data){
        $bd=BD::getInstance();
        $sql = "INSERT INTO moviment
        ( date, description, value, type,user_id)
        VALUE 
        (:date, :description, :value, :type, :user_id)"; 
        $stmt = $bd->prepare( $sql );
        $stmt->bindParam( ':date', $data['date']);
        $stmt->bindParam( ':description', $data['description']);
        $stmt->bindParam( ':value', $data['value']);
        $stmt->bindParam( ':type', $data['type']);
        $stmt->bindParam( ':user_id', $data['user_id']);
        $result=$stmt->execute();
        
        if (!$result ){
            $return['result']=false;
            $return['error']= $stmt->errorInfo();
        }else{
            $return['result']=true;
            $return['id_moviemnt']=$bd->lastInsertId();
        }
        return $return;
    }


    public function getMoviments($dateStart=null, $dateEnd=null, $type=null){
        $bd=BD::getInstance();
        $sql = "SELECT *
        FROM moviment";
        if($dateStart OR $dateEnd OR $type){
            $sql.=" WHERE";
            if($dateStart){
                $sql.=" date > '$dateStart' AND ";
            }
            if($dateEnd){
                $sql.=" date < '$dateEnd AND ";
            }
            if($type){
                $sql.=" type = '$type' AND";
            }
            $sql= substr($sql, 0, -3);
        }
        $stmt = $bd->prepare( $sql );

        $result=$stmt->execute();
        $return=null;
        if (!$result ){
            $return['error']= $stmt->errorInfo();
        }
        
        if($stmt->rowCount() >0){
            while($moviment=$stmt->fetch(PDO::FETCH_ASSOC)){
                $return['moviments'][]=$moviment;
            }
        }else{
            $return['error']= "Moviment not found!";
        }
        return $return;
        
    }
}