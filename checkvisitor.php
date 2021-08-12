<?php 
require_once "db.php";

global $connection;

class Visitor {
    function __construct($conn) {
        $this->con = $conn;
    }

    function See(){
        $this->clientip = $this->get_client_ip();
        $stmt = $this->con->prepare("SELECT * FROM MonthVisitor WHERE ip=?");
        $stmt->bind_param("s",$this->clientip);
        $stmt->execute();
        $result = $stmt->get_result(); 
         if ($result) {
            $stmt = false;
            
           
            if ($result->num_rows == 0) {
                
                $browser = get_browser(null, true);
                $stmt = $this->con->prepare("INSERT INTO MonthVisitor SET ip=?,returnView = 1, seemonth = ?,device = ?");
                $stmt->bind_param("sds", $this->clientip,date('m'),$browser['platform']); 
                $stmt->execute();
              
            }
        }
    }

    function get_client_ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }
        return $this->ip;
    }

    function AutomaticClear(){
        $stmt = $this->con->prepare("DELETE FROM MonthVisitor WHERE seemonth != ?");
        $stmt->bind_param("d", date('m')); 
        $stmt->execute();
    }

}

$visitor = new Visitor($connection);

$visitor->See();
$visitor->AutomaticClear();


?>