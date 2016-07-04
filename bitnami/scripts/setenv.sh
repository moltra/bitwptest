#!/bin/sh
echo $PATH | egrep "/opt/bitnami/common" > /dev/null
if [ $? -ne 0 ] ; then
PATH="/opt/bitnami/varnish/bin:/opt/bitnami/sqlite/bin:/opt/bitnami/php/bin:/opt/bitnami/mysql/bin:/opt/bitnami/apache2/bin:/opt/bitnami/common/bin:$PATH"
export PATH
fi
echo $LD_LIBRARY_PATH | egrep "/opt/bitnami/common" > /dev/null
if [ $? -ne 0 ] ; then
LD_LIBRARY_PATH="/opt/bitnami/varnish/lib:/opt/bitnami/varnish/lib/varnish:/opt/bitnami/varnish/lib/varnish/vmods:/opt/bitnami/sqlite/lib:/opt/bitnami/mysql/lib:/opt/bitnami/apache2/lib:/opt/bitnami/common/lib:$LD_LIBRARY_PATH"
export LD_LIBRARY_PATH
fi

TERMINFO=/opt/bitnami/common/share/terminfo
export TERMINFO
##### VARNISH ENV #####
		
      ##### SQLITE ENV #####
			
SASL_CONF_PATH=/opt/bitnami/common/etc
export SASL_CONF_PATH
SASL_PATH=/opt/bitnami/common/lib/sasl2 
export SASL_PATH
LDAPCONF=/opt/bitnami/common/etc/openldap/ldap.conf
export LDAPCONF
##### PHP ENV #####
PHP_PATH=/opt/bitnami/php/bin/php
export PHP_PATH
##### MYSQL ENV #####

##### APACHE ENV #####

##### CURL ENV #####
CURL_CA_BUNDLE=/opt/bitnami/common/openssl/certs/curl-ca-bundle.crt
export CURL_CA_BUNDLE
##### SSL ENV #####
SSL_CERT_FILE=/opt/bitnami/common/openssl/certs/curl-ca-bundle.crt
export SSL_CERT_FILE
OPENSSL_CONF=/opt/bitnami/common/openssl/openssl.cnf
export OPENSSL_CONF
OPENSSL_ENGINES=/opt/bitnami/common/lib/engines
export OPENSSL_ENGINES


. /opt/bitnami/scripts/build-setenv.sh
