<?php
require_once 'DBaseController.php';


class CUSTOMER{
    private $db_connection;
    // constructor to initialise connection
    public function __construct()
    {
        $this->db_connection= new DBaseController();
    }
    
//insert function to register a customer
public function signUp($Name,$Email,$password,$confirm_password){
 $query = "insert into signup(Name,Email,password,Confirm_password) values(?,?,?,?)";
 $paramtype = "ssss";
 $parameters = array($Name,$Email,$password,$confirm_password);
 $this->db_connection->insert($query,$paramtype,$parameters);
}

//insert function to login customer
public function login($Name,$password){
    $query = "insert into customer (Name,password)values (?,?)";
    $paramtype = "ss";
    $parameters = array($Name,$password);
     $this->db_connection->insert($query,$paramtype,$parameters);

}

//update function to edit the profile of a customer
public function editProfile($Name,$Contact,$email,$password,$confirm_password,$photo,$customer_id){
    $query = "UPDATE customer SET Name=?,Contact=?,email=?,password=?,confirm_password=?,photo=? WHERE customer_id=?";
    $paramtype = "ssssss";
    $parameters = array($Name,$Contact,$email,$password,$confirm_password,$photo,$customer_id);
    $edit= $this->db_connection->update($query,$paramtype,$parameters);
    var_dump($parameters);
    return $edit;
}

}

