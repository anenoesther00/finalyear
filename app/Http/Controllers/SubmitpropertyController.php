<?php
require_once 'C:\wamp64\www\HRently\app\Http\Controllers\DBaseController.php';

class submitproperty{
    private $db_connection;
    // constructor to initialise connection
    public function __construct()
    {
        $this->db_connection= new DBaseController();
    }
    
public function submitproperty($submitproperty_id,$firstname,$lastname,$typeofrental,$price, $photo, $contact, $description){
$query = "INSERT INTO submitproperty(submitproperty_id, firstname, lastname, typeofrental, price, photo, contact, description) VALUES (?,?,?,?,?,?,?,?)";
$paramtype = "issiiiis";
$parameters = array($submitproperty_id,$firstname,$lastname,$typeofrental,$price, $photo, $contact, $description);
$this->db_connection->insert($query,$paramtype,$parameters);
}


public function cancelproperty($submitproperty_id){
    $query = "delete from submitproperty where submitproperty_id=?";
    $paramtype = "i";
    $parameters =array($submitproperty_id);
   $this->db_connection->runQuery($query,$paramtype,$parameters);
}


 public function changeproperty($submitproperty_id,$firstname,$lastname,$typeofrental,$price,$photo,$contact,$description){
    $query = "UPDATE submitproperty SET firstname=?,lastname=?,typeofrental=?,price=?,photo=?,contact=?,description=?, WHERE submitproperty_id=?";
    $paramtype = "issiiiis";
    $parameters = array($submitproperty_id,$firstname,$lastname,$typeofrental,$price,$photo,$contact,$description);
  $edit= $this->db_connection->update($query,$paramtype,$parameters);
   var_dump($edit);
    return $edit;
}

public function propertyInfo($submitproperty_id){
    $query = "SELECT * FROM submitproperty WHERE submitproperty_id";
    $paramtype = "i";
    $parameters = array($submitproperty_id);
  $result = array(
            'num_rows' => $this->db_connection->runForRows($query,$paramtype,$parameters),
            'data' => $this->db_connection->runQuery($query,$paramtype,$parameters)
        );
  var_dump($parameters);
   return $result;
}
}
