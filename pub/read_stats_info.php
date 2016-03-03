#!/usr/bin/php
<?php

function Die_program_not_correct_parameter (){
  global $argc, $argv;
  echo $argv[0] . ' [acl-drops|block-filter|cache-hits|cache-misses|downstream-send-errors|downstream-timeouts|dyn-blocked|empty-queries|fd-usage|latency-avg100|latency-avg1000|latency-avg10000|latency-avg1000000|latency-slow|latency0-1|latency1-10|latency10-50|latency50-100|latency100-1000|no-policy|noncompliant-queries|noncompliant-responses|over-capacity-drops|packetcache-hits|packetcache-misses|queries|rdqueries|real-memory-usage|responses|rule-drop|rule-nxdomain|self-answered|servfail-responses|too-old-drops|trunc-failures|uptime]' . "\n";
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

switch ($argv[1]) {
    case "acl-drops":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "block-filter":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "cache-hits":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "cache-misses":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "downstream-send-errors":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "downstream-timeouts":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "dyn-blocked":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "empty-queries":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "fd-usage":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency-avg100":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency-avg1000":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency-avg10000":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency-avg1000000":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency-slow":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency0-1":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency1-10":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency10-50":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency50-100":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "latency100-1000":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "no-policy":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "noncompliant-queries":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "noncompliant-responses":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "over-capacity-drops":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "packetcache-hits":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "packetcache-misses":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "queries":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "rdqueries":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "real-memory-usage":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "responses":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "rule-drop":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "rule-nxdomain":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "self-answered":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "servfail-responses":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "too-old-drops":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "trunc-failures":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    case "uptime":
      echo $dnsdist->get_stats_results($argv[1])."\n";
    break;
    default:
  Die_program_not_correct_parameter();
  }
?>
