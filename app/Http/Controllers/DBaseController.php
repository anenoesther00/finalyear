<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DBaseController {
    private $host = "localhost";
    private $user = "root";
    private $password = "Housings1";
    private $database = "hrently";
    private $conn;
    //Initialise the Connection
    function __construct() {
        $this->conn = $this->connectDB();
    }   
    //Create the Database Connection
    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }
    //Set Run Transations
    function startTransation(){
        $this->conn->autocommit(false);
    }
   //End transation
   function commitTransation(){
       $this->conn->commit();
   }
   function rolbackTransation(){
       $this->conn->rollback();
   }
    function runBaseQuery($query) {
        $result = $this->conn->query($query);   
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }
    function runInsert($query) {
        $status=0;
        if($this->conn->query($query)){
            $status=1;
        }
        return $status;  
    }
    function getErrMessage(){
        return $this->conn->error;
    }




    //Function to execute Queries that return results
    function runQuery($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if(!empty($resultset)) {
            return $resultset;
        }
    }
    //Funtion to Bind parameters for Prepared Statements
    function bindQueryParams($sql, $param_type, $param_value_array) {
        $param_value_reference[] = & $param_type;
        for($i=0; $i<count($param_value_array); $i++) {
            $param_value_reference[] = & $param_value_array[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }
    //Funtion to perform Intert operation
    function insert($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $insertId = $sql->insert_id;
        return $insertId;
    }
    //Function to perform Update Operations
    function update($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $affected_rows= $sql->affected_rows;
        return $affected_rows;
    }
    //Function to execute Queries that return results
    function runForRows($query, $param_type, $param_value_array) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $param_type, $param_value_array);
        $sql->execute();
        $result = $sql->get_result();
        $result->num_rows;
       
    }
    
}