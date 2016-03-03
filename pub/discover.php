#!/usr/bin/php
<?php

function Die_program_not_correct_parameter (){
  global $argc, $argv;
  echo $argv[0] . ' [servers|rules]' . "\n";
  die (3);
}

require (dirname(__FILE__) . '/../lib/dnsdist.php');
if (file_exists('/etc/dnsdist_zabbix/dnsdist_config.php')) {
  require ('/etc/dnsdist_zabbix/dnsdist_config.php');
}

if(!isset($url)) { $url = 'http://127.0.0.1'; }
if(!isset($username)) { $username = 'admin'; }
if(!isset($password)) { $password = 'geheim'; }

$dnsdist = new dnsdist($username, $password, $url);

if (isset($argv[1])) {
  switch ($argv[1]) {
      case "servers":

        $servers = $dnsdist->get_servers();

        $count = 0;

        foreach ($servers as $serverid => $serverdata) {
          $discovery_data['data'][$count]['{#SERVERID}'] = "$serverid";
          $discovery_data['data'][$count]['{#SERVERADDRESS}'] = $serverdata['address'];
          $discovery_data['data'][$count]['{#SERVERNAME}'] = $serverdata['name'];
          $count++;
        }
        unset($count);

        echo "\n\n" . json_encode($discovery_data) . "\n\n";

        unset($discovery_data);
      break;
      case "rules":
        $rules = $dnsdist->get_rules();

        $count = 0;

        foreach ($rules as $ruleid => $ruledata) {
          $discovery_data['data'][$count]['{#RULEID}'] = "$ruleid";
          $discovery_data['data'][$count]['{#RULEACTION}'] = $ruledata['action'];
          $discovery_data['data'][$count]['{#RULE}'] = $ruledata['rule'];
          $count++;
        }
        unset($count);

        echo "\n\n" . json_encode($discovery_data) . "\n\n";

        unset($discovery_data);

      break;
      default:
        Die_program_not_correct_parameter();
    }
  } else {
    Die_program_not_correct_parameter();
  }

?>