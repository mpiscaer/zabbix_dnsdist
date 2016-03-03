# zabbix_dnsdist
Monitoring dnsdist with zabbix

# Installing

1. Install php5-cli and php5-curl like with "apt-get install php5-cli php5-curl"
2. Install the collector en discovery scripts on an location like /usr/local/share/zabbix_dnsdist/
3. Configure the zabbix_agent to use the scripts like on the location: /etc/zabbix/zabbix_agentd.conf.d/userparameter.conf

UserParameter=dnsdist.rule[*],/usr/bin/php /usr/local/share/zabbix_dnsdist/pub/read_rule_info.php $1 $2
UserParameter=dnsdist.rule.discover[*],/usr/bin/php /usr/local/share/zabbix_dnsdist/pub/discover.php rules
UserParameter=dnsdist.server[*],/usr/bin/php /usr/local/share/zabbix_dnsdist/pub/read_server_info.php $1 $2
UserParameter=dnsdist.server.discover[*],/usr/bin/php /usr/local/share/zabbix_dnsdist/pub/discover.php servers
UserParameter=dnsdist.stats[*],/usr/bin/php /usr/local/share/zabbix_dnsdist/pub/read_stats_info.php $1

4. Import the template Zabbix_dnsdist_template.xml in zabbix 2.2


