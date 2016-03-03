#!/usr/bin/php
<?php

function Die_program_not_correct_parameter (){
  global $argc, $argv;
  echo $argv[0] . ' RuleID [matches]' . "\n";
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

if (!isset($argv[1])) { Die_program_not_correct_parameter(); }
if (!is_numeric($argv[1])) { Die_program_not_correct_parameter(); }
if (!isset($argv[2])) { Die_program_not_correct_parameter(); }

switch ($argv[2]) {
    case "matches":
      echo $dnsdist->get_rule_info($argv[1], $argv[2])."\n";
    break;
    default:
      Die_program_not_correct_parameter();
  }
?>