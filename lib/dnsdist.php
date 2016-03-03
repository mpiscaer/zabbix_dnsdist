<?php

class dnsdist {
  private $data;
  private $stats_data;

  public function __construct ( $username, $password, $url){

    $full_url = $url . "/api/v1/servers/localhost";
    //  Initiate curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$full_url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);

    $this->data = json_decode($result, true);

    unset($ch);
    unset($result);


    $full_url = $url . "/jsonstat?command=stats";
    //  Initiate curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$full_url);
    // Execute
    $result=curl_exec($ch);
    // Closing
    curl_close($ch);

    $this->stats_data = json_decode($result, true);

    unset($ch);
    unset($result);
  }

  public function get_servers () {
    return $this->data['servers'];
  }

  public function get_server_info ( $serverid, $type ) {
  	if(!isset($this->data['servers'][$serverid][$type])) { echo "Server ID $serverid or Type $type doesn't exists\n"; die(1);}
    return $this->data['servers'][$serverid][$type];
  }

  public function get_rules () {
    return $this->data['rules'];
  }

  public function get_rule_info ( $ruleid, $type ) {
    if(!isset($this->data['rules'][$ruleid][$type])) { echo "Server ID $serverid o Type $type doesn't exists\n"; die(1);}
    return $this->data['rules'][$ruleid][$type];
  }

  public function get_dump () {
    return $this->data;
  }

  public function get_stats_results($field) {
    if(!isset($this->stats_data[$field])) { echo "field $field doesn't exists\n"; die(1);}
    return $this->stats_data[$field];    
  }
}
?>