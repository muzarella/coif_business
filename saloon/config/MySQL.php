<?php
  class MySQL{
    var $db_host;
    var $db_user;
    var $db_pass;
    var $db_name;
    var $db_conn;
    var $db_error;

	  /**
	  *	MySQL Constructor
	  */
    function __construct($host , $user , $pass , $name){
      $this->db_host = $host;
      $this->db_user = $user;
      $this->db_pass = $pass;
      $this->db_name = $name;
      $this->Initialize();
    }
	  
	 /**
	 *	Establishes Connection to DB
	 */
    function Initialize(){
      if(!$this->db_conn = @mysqli_connect($this->db_host , $this->db_user, $this->db_pass)){
        trigger_error('Could not establish connection to server: ' . mysqli_error($this->db_conn));
        die();
        $this->db_error = true;
      }

      if(!@mysqli_select_db($this->db_conn, $this->db_name)){
        trigger_error('Unable to Select Database: '. mysqli_error($this->db_conn));
        die();
        $this->db_error =  true;
      }
    }

	  /*
	  *	Checks for MySQL Error
	  */
    function isError(){
      if($this->db_error){
        return true;
      }
      $error = mysqli_error($this->db_conn);
      if(empty($error)){
        return false;
      }else{
        return true;
      }
    }

    function get($id){
      if(!$queryResource = mysqli_query($this->db_conn , "SELECT * FROM buy_bot_users WHERE fb_id = '$id'")){
        trigger_error('Query Execution failed: ' . mysqli_error($this->db_conn));
        die();
      }

      return new MySQLResult($this , $queryResource);
    }

    function upload($image , $path){
		print_r($_FILES);
							if(empty($_FILES[$image]['name'])){
								//trigger_error("Please select at least one image to continue");
                trigger_error($_FILES[$image]["error"]);
                return false;
							}else{
                $check = (getimagesize($_FILES[$image]['tmp_name']));
                if(!$check){
                  //trigger_error("File is not an image");
                  trigger_error($_FILES[$image]["error"]);
                  return false;
                }else{
                    $image = $_FILES[$image]['name'];
                    $saveto = $path.$image;
                    $pfn1 = move_uploaded_file($_FILES[$image]['tmp_name'], $saveto);
                    return true;
                  }
                }
							}
	  
	  
    function query($sql){
      if(!$queryResource = mysqli_query($this->db_conn , $sql)){
        trigger_error('Query Execution failed: ' . mysqli_error($this->db_conn) . ' SQL: ' . $sql);
        die();
      }
      return new MySQLResult($this , $queryResource);
    }
  }

  class MySQLResult{
      var $mysql;
      var $query;

      function __construct(&$mysql , $query){
        $this->mysql = &$mysql;
        $this->query = $query;
      }

      function fetch(){
        if($row = mysqli_fetch_array($this->query)){
          return $row;
        }else if($this->size() > 0){
          mysqli_data_seek($this->query, 0);
          return false;
        }else{
          return false;
        }
      }

      function isError(){
        return $this->mysql->isError();
      }

      function size(){
        return mysqli_num_rows($this->query);
      }

      function affected(){
        return mysqli_affected_rows($this->mysql->db_conn);
      }
  }

  class Sterilize extends MySQL{
    var $conn;

      public function __construct() {
       $this->conn = $this->db_conn;
   }


    function sanitize($string){
      if(get_magic_quotes_gpc()){
        return $string;
      }else{
        return mysqli_real_escape_string($this->conn, htmlentities($string));
      }
    }
  }

?>
