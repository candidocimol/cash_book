<?php
/**
 * Class User
 * @author Cândido
 * @version 1.0
 * @access public
 */
class User{
    /**
     * @name $idUser
     * @access private
     */
    private $idUser;

    /**
     * @name $name
     * @access private
     */
    private $name;

    /**
     * @name $email
     * @access private
     */
    private $email;

    /**
     * @name $password
     * @access private
     */
    private $password;

    /**
     * @name $profile
     * @access private
     */
    private $profile;

    /**
     * Method setUser
     * @param int $idUser
     * @param String $name
     * @param String $email
     * @param String $password
     * @param String $profile
     */
    public function setUser($idUser, $name, $email, $password, $profile){
        $this->idUser=$idUser;
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        $this->profile=$profile;

    }
    /**
     * Method getUser
     * @return Object User
     */
    public function getUser(){
        return $this;
    }

    /**
     * Method login
     * @param String $email
     * @param String $password
     * @return boolean
     */
    public function login($email, $password){
        $bd=BD::getInstance();
        $sql = "SELECT id, name, email FROM user WHERE email=:email AND password=:pass"; 
        $stmt = $bd->prepare( $sql );
        $stmt->bindParam( ':email', $email );
        $stmt->bindParam( ':pass', $password);
        $result=$stmt->execute();
        $return=null;
        if (!$result ){
            $return['error']= $stmt->errorInfo();
        }
        
        if($stmt->rowCount() >0){
            $return['user']=$stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            $return['error']= "User not found!";
        }
        return $return;
    }

    

}