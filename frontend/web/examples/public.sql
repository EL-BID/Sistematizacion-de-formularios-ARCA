/*
 Navicat PostgreSQL Data Transfer

 Source Server         : pgadmin
 Source Server Type    : PostgreSQL
 Source Server Version : 90506
 Source Host           : localhost:5432
 Source Catalog        : examples
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90506
 File Encoding         : 65001

 Date: 20/06/2017 13:17:14
*/


-- ----------------------------
-- Type structure for estado
-- ----------------------------
DROP TYPE IF EXISTS "public"."estado";
CREATE TYPE "public"."estado" AS ENUM (
  'activo',
  'inactivo'
);

-- ----------------------------
-- Sequence structure for aud_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."aud_id_seq";
CREATE SEQUENCE "public"."aud_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."aud_id_seq"', 361, true);

-- ----------------------------
-- Sequence structure for aud_taccion_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."aud_taccion_seq";
CREATE SEQUENCE "public"."aud_taccion_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."aud_taccion_seq"', 1, false);

-- ----------------------------
-- Sequence structure for audte_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."audte_id_seq";
CREATE SEQUENCE "public"."audte_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."audte_id_seq"', 10, true);

-- ----------------------------
-- Sequence structure for audtm_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."audtm_id_seq";
CREATE SEQUENCE "public"."audtm_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."audtm_id_seq"', 10, true);

-- ----------------------------
-- Sequence structure for client_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."client_id_seq";
CREATE SEQUENCE "public"."client_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."client_id_seq"', 125, true);

-- ----------------------------
-- Sequence structure for log_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."log_id_seq";
CREATE SEQUENCE "public"."log_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."log_id_seq"', 18, true);

-- ----------------------------
-- Sequence structure for order_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."order_id_seq";
CREATE SEQUENCE "public"."order_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."order_id_seq"', 1, false);

-- ----------------------------
-- Sequence structure for pagina_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."pagina_id_seq";
CREATE SEQUENCE "public"."pagina_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."pagina_id_seq"', 2, true);

-- ----------------------------
-- Sequence structure for user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_id_seq";
CREATE SEQUENCE "public"."user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
 START 1
CACHE 1;
SELECT setval('"public"."user_id_seq"', 6, true);

-- ----------------------------
-- Table structure for aud_auditoria
-- ----------------------------
DROP TABLE IF EXISTS "public"."aud_auditoria";
CREATE TABLE "public"."aud_auditoria" (
  "id" int8 NOT NULL DEFAULT nextval('aud_id_seq'::regclass),
  "usuario" varchar(50) COLLATE "pg_catalog"."default",
  "ip_origen" varchar(50) COLLATE "pg_catalog"."default",
  "texto" text COLLATE "pg_catalog"."default",
  "json" text COLLATE "pg_catalog"."default",
  "id_tevento" int4,
  "id_tmensaje" int4,
  "id_taccion" int4,
  "fecha_hora" timestamp(6),
  "id_pagina" numeric,
  "status" varchar(30) COLLATE "pg_catalog"."default",
  "pagina" varchar(50) COLLATE "pg_catalog"."default",
  "modulo" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of aud_auditoria
-- ----------------------------
INSERT INTO "public"."aud_auditoria" VALUES (361, '-', '127.0.0.1', 'Unable to resolve the request: clientesprueba/#', '{
    "name": "yii\\base\\InvalidRouteException",
    "message": "Unable to resolve the request: clientesprueba\/#",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": "clientesprueba\/#",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/#''"
        ],
        "COOKIE ": [
            "    ''_csrf-frontend'' => ''dffccf8ec90746c0b2a9d3e80b653ae9dc00e3cae4cd94f1d8993288a3333a9aa:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"bHT1eynbna2PXRYoxRxEWrb9DKAqfj3K\\\";}''",
            "    ''advanced-frontend'' => ''lsupp1c7s3mj7srtddej3j1qq6''"
        ],
        "SESSION ": [
            "    ''__flash'' => []"
        ],
        "SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba%2Fview&id=123''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''_csrf-frontend=dffccf8ec90746c0b2a9d3e80b653ae9dc00e3cae4cd94f1d8993288a3333a9aa%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22bHT1eynbna2PXRYoxRxEWrb9DKAqfj3K%22%3B%7D; advanced-frontend=lsupp1c7s3mj7srtddej3j1qq6''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''51048''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=clientesprueba%2F%23''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba%2F%23''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497905440.604",
            "    ''REQUEST_TIME'' => 1497905440"
        ]
    }
}', 2, 1, 1, '2017-06-19 22:50:40', NULL, 'yii\web\HttpException:404', 'clientesprueba/#', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (336, '-', '127.0.0.1', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''
    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\";}''
]

$_SESSION = [
    ''__flash'' => []
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_CACHE_CONTROL'' => ''max-age=0''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Program Files\\WinMerge;C:\\Program Files\\Skype\\Phone\\;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''55917''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1497565076.163
    ''REQUEST_TIME'' => 1497565076
]', '{
    "name": "yii\\base\\InvalidRouteException",
    "message": "Unable to resolve the request: site\/#",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": "site\/#",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''site\/#''"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SESSION ": [
            "    ''__flash'' => []"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''55917''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=site%2F%23''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497565076.163",
            "    ''REQUEST_TIME'' => 1497565076"
        ]
    }
}', NULL, NULL, NULL, '2017-06-16 00:17:56', NULL, NULL, NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (337, '-', '127.0.0.1', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''
    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\";}''
]

$_SESSION = [
    ''__flash'' => []
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_CACHE_CONTROL'' => ''max-age=0''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Program Files\\WinMerge;C:\\Program Files\\Skype\\Phone\\;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''55950''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1497565185.48
    ''REQUEST_TIME'' => 1497565185
]', '{
    "name": "yii\\base\\InvalidRouteException",
    "message": "Unable to resolve the request: site\/#",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": "site\/#",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''site\/#''"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SESSION ": [
            "    ''__flash'' => []"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''55950''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=site%2F%23''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497565185.48",
            "    ''REQUEST_TIME'' => 1497565185"
        ]
    }
}', NULL, NULL, NULL, '2017-06-16 00:19:45', NULL, NULL, NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (338, '-', '127.0.0.1', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''
    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\";}''
]

$_SESSION = [
    ''__flash'' => []
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_CACHE_CONTROL'' => ''max-age=0''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Program Files\\WinMerge;C:\\Program Files\\Skype\\Phone\\;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''55983''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1497565243.066
    ''REQUEST_TIME'' => 1497565243
]', '{
    "name": "yii\\base\\InvalidRouteException",
    "message": "Unable to resolve the request: site\/#",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": "site\/#",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''site\/#''"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SESSION ": [
            "    ''__flash'' => []"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''55983''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=site%2F%23''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497565243.066",
            "    ''REQUEST_TIME'' => 1497565243"
        ]
    }
}', NULL, NULL, NULL, '2017-06-16 00:20:43', NULL, NULL, NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (339, '-', '127.0.0.1', 'Unable to resolve the request: site/#', '{
    "name": "yii\\base\\InvalidRouteException",
    "message": "Unable to resolve the request: site\/#",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": "site\/#",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''site\/#''"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SESSION ": [
            "    ''__flash'' => []"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''56027''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=site%2F%23''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497565433.434",
            "    ''REQUEST_TIME'' => 1497565433"
        ]
    }
}', NULL, NULL, NULL, '2017-06-16 00:23:53', NULL, NULL, NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (340, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "$_POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''56040''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497565537.917",
            "    ''REQUEST_TIME'' => 1497565537"
        ]
    }
}', NULL, NULL, NULL, '2017-06-16 00:25:38', NULL, NULL, NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (347, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "$_POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''58684''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497568343.436",
            "    ''REQUEST_TIME'' => 1497568343"
        ]
    }
}', NULL, NULL, NULL, '2017-06-16 01:12:23', NULL, 'yii\db\Exception', NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (348, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "$_POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''60875''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497574067.661",
            "    ''REQUEST_TIME'' => 1497574067"
        ]
    }
}', NULL, NULL, NULL, '2017-06-16 02:47:47', NULL, 'yii\db\Exception', NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (349, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "$_POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''62231''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497578570.761",
            "    ''REQUEST_TIME'' => 1497578570"
        ]
    }
}', NULL, 10, NULL, '2017-06-16 04:02:50', NULL, 'yii\db\Exception', NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (350, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "$_POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''62250''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497578641.662",
            "    ''REQUEST_TIME'' => 1497578641"
        ]
    }
}', NULL, 10, 2, '2017-06-16 04:04:01', NULL, 'yii\db\Exception', NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (351, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "$_POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''62293''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497578791.561",
            "    ''REQUEST_TIME'' => 1497578791"
        ]
    }
}', 2, 10, 2, '2017-06-16 04:06:31', NULL, 'yii\db\Exception', NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (352, '-', '127.0.0.1', 'Unable to resolve the request: site/#', '{
    "name": "yii\\base\\InvalidRouteException",
    "message": "Unable to resolve the request: site\/#",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": "site\/#",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''site\/#''"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SESSION ": [
            "    ''__flash'' => []"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''62299''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=site%2F%23''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497578805.785",
            "    ''REQUEST_TIME'' => 1497578805"
        ]
    }
}', 2, NULL, NULL, '2017-06-16 04:06:47', NULL, 'yii\web\HttpException:404', NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (353, '-', '127.0.0.1', 'Unable to resolve the request: site/#', '{
    "name": "yii\\base\\InvalidRouteException",
    "message": "Unable to resolve the request: site\/#",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": "site\/#",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''site\/#''"
        ],
        "$_COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "$_SESSION ": [
            "    ''__flash'' => []"
        ],
        "$_SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''62310''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=site%2F%23''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497578850.324",
            "    ''REQUEST_TIME'' => 1497578850"
        ]
    }
}', 2, 1, 1, '2017-06-16 04:07:30', NULL, 'yii\web\HttpException:404', NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (356, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."aud_auditoria" VALUES (357, NULL, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DAD', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (358, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''62572''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497579616.668",
            "    ''REQUEST_TIME'' => 1497579616"
        ]
    }
}', 2, 10, 2, '2017-06-16 04:20:16', NULL, 'yii\db\Exception', 'clientesprueba/create', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (359, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''62579''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497579639.189",
            "    ''REQUEST_TIME'' => 1497579639"
        ]
    }
}', 2, 10, 2, '2017-06-16 04:20:39', 2, 'yii\db\Exception', 'clientesprueba/create', 'clientes');
INSERT INTO "public"."aud_auditoria" VALUES (360, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/create''"
        ],
        "POST ": [
            "    ''_csrf-frontend'' => ''SWt6M0pxMkkdWhZgDitZHhwaS2oAFgYGeiwzC3o1Uzk8KQhiJxZZGQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''dadsa''",
            "        ''lastname'' => ''sdasdad''",
            "        ''birthdate'' => ''2017-06-15''",
            "        ''createdate'' => ''''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "COOKIE ": [
            "    ''advanced-frontend'' => ''kcu4622uikdb71639rsj5vco47''",
            "    ''_csrf-frontend'' => ''f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP\\\";}''"
        ],
        "SESSION ": [
            "    ''__flash'' => []"
        ],
        "SERVER ": [
            "    ''MIBDIRS'' => ''C:\/xampp\/php\/extras\/mibs''",
            "    ''MYSQL_HOME'' => ''\\\\xampp\\\\mysql\\\\bin''",
            "    ''OPENSSL_CONF'' => ''C:\/xampp\/apache\/bin\/openssl.cnf''",
            "    ''PHP_PEAR_SYSCONF_DIR'' => ''\\\\xampp\\\\php''",
            "    ''PHPRC'' => ''\\\\xampp\\\\php''",
            "    ''TMP'' => ''\\\\xampp\\\\tmp''",
            "    ''HTTP_HOST'' => ''127.0.0.1''",
            "    ''HTTP_CONNECTION'' => ''keep-alive''",
            "    ''CONTENT_LENGTH'' => ''242''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/58.0.3029.110 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=kcu4622uikdb71639rsj5vco47; _csrf-frontend=f316ab8265216a323805137b073d4633e36da1b9930f8f3d92ddf8919813e80da%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22T1lSDZkWUq1YJg4O3GI80DapuBrQmgkP%22%3B%7D''",
            "    ''PATH'' => ''C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Program Files\\\\Skype\\\\Phone\\\\;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;''",
            "    ''SystemRoot'' => ''C:\\\\Windows''",
            "    ''COMSPEC'' => ''C:\\\\Windows\\\\system32\\\\cmd.exe''",
            "    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''",
            "    ''WINDIR'' => ''C:\\\\Windows''",
            "    ''SERVER_SIGNATURE'' => ''<address>Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30 Server at 127.0.0.1 Port 80<\/address>",
            "''",
            "    ''SERVER_SOFTWARE'' => ''Apache\/2.4.25 (Win32) OpenSSL\/1.0.2j PHP\/5.6.30''",
            "    ''SERVER_NAME'' => ''127.0.0.1''",
            "    ''SERVER_ADDR'' => ''127.0.0.1''",
            "    ''SERVER_PORT'' => ''80''",
            "    ''REMOTE_ADDR'' => ''127.0.0.1''",
            "    ''DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''REQUEST_SCHEME'' => ''http''",
            "    ''CONTEXT_PREFIX'' => ''''",
            "    ''CONTEXT_DOCUMENT_ROOT'' => ''C:\/xampp\/htdocs''",
            "    ''SERVER_ADMIN'' => ''postmaster@localhost''",
            "    ''SCRIPT_FILENAME'' => ''C:\/xampp\/htdocs\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REMOTE_PORT'' => ''62588''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba\/create''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba\/create''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1497579656.01",
            "    ''REQUEST_TIME'' => 1497579656"
        ]
    }
}', 2, 10, 2, '2017-06-16 04:20:56', 2, 'yii\db\Exception', 'clientesprueba/create', 'clientes');

-- ----------------------------
-- Table structure for aud_tipo_accion
-- ----------------------------
DROP TABLE IF EXISTS "public"."aud_tipo_accion";
CREATE TABLE "public"."aud_tipo_accion" (
  "id" int8 NOT NULL DEFAULT nextval('audte_id_seq'::regclass),
  "usuario_digitador" varchar(50) COLLATE "pg_catalog"."default",
  "fecha_digitacion" timestamp(6),
  "nom_accion" varchar(50) COLLATE "pg_catalog"."default",
  "id_tmensaje" int4
)
;

-- ----------------------------
-- Records of aud_tipo_accion
-- ----------------------------
INSERT INTO "public"."aud_tipo_accion" VALUES (1, NULL, NULL, 'yii\web\HttpException:404', 1);
INSERT INTO "public"."aud_tipo_accion" VALUES (2, NULL, NULL, 'yii\db\Exception', 10);
INSERT INTO "public"."aud_tipo_accion" VALUES (10, NULL, NULL, 'yii\web\HttpException:505', NULL);

-- ----------------------------
-- Table structure for aud_tipo_evento
-- ----------------------------
DROP TABLE IF EXISTS "public"."aud_tipo_evento";
CREATE TABLE "public"."aud_tipo_evento" (
  "id" int8 NOT NULL DEFAULT nextval('audte_id_seq'::regclass),
  "usuario_digitador" varchar(50) COLLATE "pg_catalog"."default",
  "fecha_digitacion" timestamp(6),
  "nom_tevento" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of aud_tipo_evento
-- ----------------------------
INSERT INTO "public"."aud_tipo_evento" VALUES (1, '', '2017-05-21 19:03:00', 'SEGURIDAD');
INSERT INTO "public"."aud_tipo_evento" VALUES (2, '', '2017-05-21 19:03:00', 'SISTEMA');
INSERT INTO "public"."aud_tipo_evento" VALUES (3, '', '2017-05-21 19:03:00', 'TRAZABILIDAD');

-- ----------------------------
-- Table structure for aud_tipo_mensaje
-- ----------------------------
DROP TABLE IF EXISTS "public"."aud_tipo_mensaje";
CREATE TABLE "public"."aud_tipo_mensaje" (
  "id" int8 NOT NULL DEFAULT nextval('audtm_id_seq'::regclass),
  "usuario_digitador" varchar(50) COLLATE "pg_catalog"."default",
  "fecha_digitacion" timestamp(6),
  "nom_tmensaje" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of aud_tipo_mensaje
-- ----------------------------
INSERT INTO "public"."aud_tipo_mensaje" VALUES (1, NULL, '2017-05-21 19:10:00', 'ERROR');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (2, NULL, '2017-05-21 19:10:00', 'EXCEPCION');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (3, NULL, '2017-05-21 19:10:00', 'ADVERTENCIA');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (4, NULL, '2017-05-21 19:10:00', 'DEPURACION');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (5, NULL, '2017-05-21 19:10:00', 'INFORMACION');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (6, NULL, '2017-05-21 19:10:00', 'CONSULTA');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (7, NULL, '2017-05-21 19:10:00', 'CREACION');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (8, NULL, '2017-05-21 19:10:00', 'MODIFICACION');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (9, NULL, '2017-05-21 19:10:00', 'ELIMINACION');
INSERT INTO "public"."aud_tipo_mensaje" VALUES (10, NULL, '2017-05-21 19:10:00', 'SEGUIMIENTO');

-- ----------------------------
-- Table structure for ciudades
-- ----------------------------
DROP TABLE IF EXISTS "public"."ciudades";
CREATE TABLE "public"."ciudades" (
  "Id" int4 NOT NULL,
  "ciudades" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of ciudades
-- ----------------------------
INSERT INTO "public"."ciudades" VALUES (1, 'Bucaramanga');
INSERT INTO "public"."ciudades" VALUES (2, 'Bogota');

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS "public"."clientes";
CREATE TABLE "public"."clientes" (
  "Id" numeric NOT NULL DEFAULT nextval('client_id_seq'::regclass),
  "name" varchar(40) COLLATE "pg_catalog"."default" NOT NULL,
  "lastname" varchar(40) COLLATE "pg_catalog"."default" NOT NULL,
  "birthdate" date,
  "createdate" date,
  "type" "public"."estado",
  "ciudad" varchar(255) COLLATE "pg_catalog"."default",
  "ciudad2_id" int4
)
;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO "public"."clientes" VALUES (55, 'Tobias', 'Arango', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (104, 'Jhaonta', 'Vargas', NULL, NULL, NULL, 'Bucaramanga', 1);
INSERT INTO "public"."clientes" VALUES (105, 'dafdaf', 'dafdfad', '2017-04-10', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (106, 'Diana', 'Carolina', '2017-04-17', '2017-04-17', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (107, 'Gabriel', 'Hernandez', '2017-04-05', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (49, 'dfadf', 'dadaf', '1985-06-30', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (5, 'Diana', 'Castro', '1987-02-15', '2017-03-26', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (15, 'Tania', 'Ferreira', '1985-04-10', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (12, 'Pepito', 'Grillo', '1985-04-10', '2017-03-27', 'inactivo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (2, 'Jennifer', 'Garcia', '2017-01-12', '2017-03-26', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (30, 'Dad', 'dadads', '1985-04-10', '2017-03-27', 'inactivo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (16, 'Uriel', 'Martinez', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (61, 'Prueba', 'Apellido', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (62, 'Prueba', 'Apellido', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (10, 'Pedro', 'Fernandez', '1987-06-30', '2017-03-26', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (9, 'Uriel', 'Gomez', '1980-01-15', '2017-03-26', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (11, 'Yazmin', 'Gutierrez', '1986-04-03', '2017-03-26', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (63, 'Ramiro', 'Mendoza', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (64, 'Yuli', 'Pepe', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (65, 'rwrew', 'rwerwerwe', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (66, 'xcx<cx', 'c<xcxzc', '1985-04-10', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (67, 'dfd', 'dfadf', '1985-04-10', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (68, 'Diana', 'Bautista', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (69, 'Pepito', 'Navajas', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (70, 'Yuliet', 'Piña', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (71, 'Tobias', 'Gomez', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (72, 'fgdfgsfrt', 'rtfdsgdf', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (73, 'fdafa', 'faafa', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (74, 'dfadfad', 'fdafdfas', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (75, 'fgfg', 'fsgfsf', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (76, 'fdaf', 'dafd', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (77, 'dfadfA', 'dafFAD', '1985-06-01', '2017-03-27', 'inactivo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (78, 'daD', 'daDAD', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (79, 'dfada', 'dfadfad', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (80, 'Tiberio', 'Mendonza', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (81, 'djkdfakd', 'dajkfajkd', NULL, '2017-04-01', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (82, 'Pepito', 'Jimenez', '2017-03-07', '2017-04-01', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (83, 'Raul', 'Emilio', '1985-04-23', '2017-04-03', 'inactivo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (84, 'Uriel', 'Jimenez2', '2017-04-24', '2017-04-03', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (85, 'dfadfad', 'fadfadfads', '2017-04-06', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (88, 'Juliana', 'Otero', '1985-04-10', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (89, 'Gloria', 'Paez', '2017-04-13', '2017-04-14', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (90, 'Pepito', 'Jimenez', '2017-04-04', '2017-04-05', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (91, 'Jorge', 'Perez', '2000-04-05', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (92, 'juliana', 'jimenez', '2017-04-04', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (93, 'Probando', 'Formulario', '2017-04-11', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (94, 'Pepito', 'Numero2', '2017-04-02', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (95, 'Raul', 'Garcia', '2017-04-15', '2017-04-01', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (96, 'Tania', 'Guzman', '2001-04-04', '2017-04-05', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (97, 'Pepito', 'Grillo', NULL, NULL, NULL, 'Bogota', NULL);
INSERT INTO "public"."clientes" VALUES (98, 'tania', 'gomez', NULL, NULL, NULL, 'Bogota', NULL);
INSERT INTO "public"."clientes" VALUES (99, 'Jhonattan', 'Moreno', NULL, NULL, NULL, 'Bucaramanga', NULL);
INSERT INTO "public"."clientes" VALUES (100, 'Uriel', 'Medina', NULL, NULL, NULL, 'Bucaramanga', NULL);
INSERT INTO "public"."clientes" VALUES (101, 'dafd', 'dafdasfa', NULL, NULL, NULL, 'Bogota', NULL);
INSERT INTO "public"."clientes" VALUES (102, 'Alexandra', 'Silva', NULL, NULL, NULL, 'Bucaramanga', NULL);
INSERT INTO "public"."clientes" VALUES (103, 'Alexandra', 'Silvap', NULL, NULL, NULL, 'Bucaramanga', NULL);
INSERT INTO "public"."clientes" VALUES (108, 'Jhonattan', 'Moreno', '2017-04-18', '2017-04-19', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (109, 'Uriel', 'Jimenez', '2017-04-17', '2017-04-17', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (110, 'PRUEBA1', 'PRUEBA2', '2017-04-04', '2017-04-05', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (111, 'Javier', 'Gomez', '2017-04-04', '2017-04-18', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (23, 'Yamila', 'Sambrano', '1985-06-01', '2017-03-27', 'inactivo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (112, 'Maria', 'Hernandez', '2017-04-18', '2017-04-04', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (25, 'Pepitor', 'Grillo2', '1985-06-01', '2017-03-27', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (113, 'Raul', 'Castillo', NULL, NULL, NULL, 'Bucaramanga', 1);
INSERT INTO "public"."clientes" VALUES (35, 'Diana', 'Casttillo', '1985-04-10', '2017-03-27', 'inactivo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (114, 'Gabriela', 'Moreno', '1998-04-03', '2017-04-23', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (38, 'erewqe', 'eqrer', '1985-06-01', '2017-03-27', 'inactivo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (118, 'Fabian', 'Peña', '2017-04-26', '2017-04-25', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (119, 'Fernando', 'Gonzalez', '1999-04-01', '2017-04-25', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (120, 'Diana', 'Carrillo', NULL, NULL, NULL, 'Bogota', NULL);
INSERT INTO "public"."clientes" VALUES (121, 'Diana', 'Carrillo', NULL, NULL, NULL, 'Bogota', 1);
INSERT INTO "public"."clientes" VALUES (122, 'dAFDD', 'ADSFAD', NULL, '2017-06-09', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (123, 'dafda', 'fadsfd', '2017-06-19', '2017-06-20', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (124, 'tre', 'dadfa', '2017-06-07', '2017-06-19', 'activo', NULL, NULL);
INSERT INTO "public"."clientes" VALUES (125, 'daad', 'dadfa', '2017-06-20', '2017-06-14', 'activo', NULL, NULL);

-- ----------------------------
-- Table structure for cometarios
-- ----------------------------
DROP TABLE IF EXISTS "public"."cometarios";
CREATE TABLE "public"."cometarios" (
  "id_cliente" numeric NOT NULL,
  "comentario" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of cometarios
-- ----------------------------
INSERT INTO "public"."cometarios" VALUES (23, '<p>fgfsgfg gfsgdfgdf</p>');
INSERT INTO "public"."cometarios" VALUES (23, '<p>Probando Correo:</p><p><br></p><p>Se presenta el texto.</p>');
INSERT INTO "public"."cometarios" VALUES (23, '<ul><li>Prueba 1</li><li>Prueba 2</li><li>Prueba 3</li><li>Prueba 4</li></ul>');
INSERT INTO "public"."cometarios" VALUES (23, '<p><a href="/proy_ecuador/frontend/web/uploadfolder/redactor/86fe37cd03-ali.txt">86fe37cd03-ali.txt</a> que envie</p>');
INSERT INTO "public"."cometarios" VALUES (25, '<p><img src="/proy_ecuador/frontend/web/uploadfolder/redactor/ebda20d540-jr03.jpg" alt="ebda20d540-jr03"> probando con foto y contenido...</p><p><span></span><br></p>');
INSERT INTO "public"."cometarios" VALUES (25, '<p><img src="/proy_ecuador/frontend/web/uploadfolder/redactor/acef922769-jellyfish.jpg"></p>');
INSERT INTO "public"."cometarios" VALUES (35, '<p>Probando</p>');
INSERT INTO "public"."cometarios" VALUES (55, '<p>Probando de nuevo </p><p><img src="/proy_ecuador/frontend/web/uploadfolder/redactor/3314dfc68a-menuiphonvertical.jpg"></p>');
INSERT INTO "public"."cometarios" VALUES (49, '<p>2017/04/25 <a href="/proy_ecuador/frontend/web/uploadfolder/redactor/3e9f0fc9b2-ali.txt">3e9f0fc9b2-ali.txt</a><span style="background-color: initial;"></span></p>');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS "public"."migration";
CREATE TABLE "public"."migration" (
  "version" varchar(180) COLLATE "pg_catalog"."default" NOT NULL,
  "apply_time" int4
)
;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO "public"."migration" VALUES ('m000000_000000_base', 1490487020);
INSERT INTO "public"."migration" VALUES ('m130524_201442_init', 1490487026);

-- ----------------------------
-- Table structure for pagina
-- ----------------------------
DROP TABLE IF EXISTS "public"."pagina";
CREATE TABLE "public"."pagina" (
  "id_pagina" numeric NOT NULL DEFAULT nextval('pagina_id_seq'::regclass),
  "nombre_pagina" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "modulo" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of pagina
-- ----------------------------
INSERT INTO "public"."pagina" VALUES (1, 'clientesprueba/delete', 'clientes');
INSERT INTO "public"."pagina" VALUES (2, 'clientesprueba/create', 'clientes');

-- ----------------------------
-- Table structure for pruebalog
-- ----------------------------
DROP TABLE IF EXISTS "public"."pruebalog";
CREATE TABLE "public"."pruebalog" (
  "id" int8 NOT NULL DEFAULT nextval('log_id_seq'::regclass),
  "level" int4,
  "category" varchar(255) COLLATE "pg_catalog"."default",
  "log_time" float8,
  "prefix" text COLLATE "pg_catalog"."default",
  "message" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of pruebalog
-- ----------------------------
INSERT INTO "public"."pruebalog" VALUES (1, 1, 'yii\web\HttpException:404', 1495334958.0758, '[1]', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (2, 4, 'application', 1495334958.0424, '[1]', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''_csrf-frontend'' => ''d6a2d86691a57bc281feefb25a98fad25795cf10a27b9143576da613985262c3a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"aVIxpdjoefbH2K-2QfV783InR5GfQjsa\";}''
    ''advanced-frontend'' => ''aa09p2tct2hab6pqcjtl0qju11''
    ''_identity-frontend'' => ''d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\"_identity-frontend\";i:1;s:46:\"[1,\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\",2592000]\";}''
]

$_SESSION = [
    ''__flash'' => []
    ''__id'' => 1
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2Findex''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''_csrf-frontend=d6a2d86691a57bc281feefb25a98fad25795cf10a27b9143576da613985262c3a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22aVIxpdjoefbH2K-2QfV783InR5GfQjsa%22%3B%7D; advanced-frontend=aa09p2tct2hab6pqcjtl0qju11; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''60484''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495334958.033
    ''REQUEST_TIME'' => 1495334958
]');
INSERT INTO "public"."pruebalog" VALUES (3, 1, 'yii\web\HttpException:404', 1495412433.0912, '[1]', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (4, 4, 'application', 1495412433.0275, '[1]', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''vl4f3l8h947ugvia48353kv2c4''
    ''_csrf-frontend'' => ''48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"shwELunVz22I19WUlQ6PQYJgWzus9SQn\";}''
    ''_identity-frontend'' => ''d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\"_identity-frontend\";i:1;s:46:\"[1,\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\",2592000]\";}''
]

$_SESSION = [
    ''__flash'' => []
    ''__id'' => 1
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2Findex''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=vl4f3l8h947ugvia48353kv2c4; _csrf-frontend=48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22shwELunVz22I19WUlQ6PQYJgWzus9SQn%22%3B%7D; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''50724''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495412433.009
    ''REQUEST_TIME'' => 1495412433
]');
INSERT INTO "public"."pruebalog" VALUES (5, 1, 'yii\web\HttpException:404', 1495412434.8128, '[1]', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (6, 4, 'application', 1495412434.7784, '[1]', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''vl4f3l8h947ugvia48353kv2c4''
    ''_csrf-frontend'' => ''48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"shwELunVz22I19WUlQ6PQYJgWzus9SQn\";}''
    ''_identity-frontend'' => ''d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\"_identity-frontend\";i:1;s:46:\"[1,\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\",2592000]\";}''
]

$_SESSION = [
    ''__flash'' => []
    ''__id'' => 1
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=vl4f3l8h947ugvia48353kv2c4; _csrf-frontend=48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22shwELunVz22I19WUlQ6PQYJgWzus9SQn%22%3B%7D; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''50722''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495412434.767
    ''REQUEST_TIME'' => 1495412434
]');
INSERT INTO "public"."pruebalog" VALUES (7, 1, 'yii\web\HttpException:404', 1495412839.3796, '[127.0.0.1][1][vl4f3l8h947ugvia48353kv2c4]', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (8, 4, 'application', 1495412839.3435, '[127.0.0.1][1][vl4f3l8h947ugvia48353kv2c4]', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''vl4f3l8h947ugvia48353kv2c4''
    ''_csrf-frontend'' => ''48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"shwELunVz22I19WUlQ6PQYJgWzus9SQn\";}''
    ''_identity-frontend'' => ''d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\"_identity-frontend\";i:1;s:46:\"[1,\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\",2592000]\";}''
]

$_SESSION = [
    ''__flash'' => []
    ''__id'' => 1
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=vl4f3l8h947ugvia48353kv2c4; _csrf-frontend=48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22shwELunVz22I19WUlQ6PQYJgWzus9SQn%22%3B%7D; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''51141''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495412839.33
    ''REQUEST_TIME'' => 1495412839
]');
INSERT INTO "public"."pruebalog" VALUES (9, 1, 'yii\web\HttpException:404', 1495468101.6413, '[127.0.0.1][-][28cnr661nngh54ieatj4njpp97]', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (15, 1, 'yii\web\HttpException:404', 1495469793.2347, '2017-05-22 18:16:33@127.0.0.1@-', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (10, 4, 'application', 1495468101.5842, '[127.0.0.1][-][28cnr661nngh54ieatj4njpp97]', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''28cnr661nngh54ieatj4njpp97''
    ''_csrf-frontend'' => ''26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\";}''
]

$_SESSION = [
    ''__flash'' => []
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_CACHE_CONTROL'' => ''max-age=0''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''52000''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495468101.554
    ''REQUEST_TIME'' => 1495468101
]');
INSERT INTO "public"."pruebalog" VALUES (11, 1, 'yii\web\HttpException:404', 1495468224.2584, '[127.0.0.1][-][28cnr661nngh54ieatj4njpp97][-]', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (12, 4, 'application', 1495468224.2185, '[127.0.0.1][-][28cnr661nngh54ieatj4njpp97][-]', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''28cnr661nngh54ieatj4njpp97''
    ''_csrf-frontend'' => ''26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\";}''
]

$_SESSION = [
    ''__flash'' => []
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_CACHE_CONTROL'' => ''max-age=0''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''52033''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495468224.194
    ''REQUEST_TIME'' => 1495468224
]');
INSERT INTO "public"."pruebalog" VALUES (13, 1, 'yii\web\HttpException:404', 1495469738.6693, '2017-05-22 18:15:38::127.0.0.1::-', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (14, 4, 'application', 1495469738.6296, '2017-05-22 18:15:38::127.0.0.1::-', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''28cnr661nngh54ieatj4njpp97''
    ''_csrf-frontend'' => ''26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\";}''
]

$_SESSION = [
    ''__flash'' => []
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_CACHE_CONTROL'' => ''max-age=0''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''52555''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495469738.605
    ''REQUEST_TIME'' => 1495469738
]');
INSERT INTO "public"."pruebalog" VALUES (16, 4, 'application', 1495469793.1896, '2017-05-22 18:16:33@127.0.0.1@-', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''28cnr661nngh54ieatj4njpp97''
    ''_csrf-frontend'' => ''26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\";}''
]

$_SESSION = [
    ''__flash'' => []
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_CACHE_CONTROL'' => ''max-age=0''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''52574''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495469793.163
    ''REQUEST_TIME'' => 1495469793
]');
INSERT INTO "public"."pruebalog" VALUES (17, 1, 'yii\web\HttpException:404', 1495470964.22, '2017-05-22 18:36:04', 'exception ''yii\base\InvalidRouteException'' with message ''Unable to resolve the request: site/#'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Controller.php:127
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Module.php(523): yii\base\Controller->runAction(''#'', Array)
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php(102): yii\base\Module->runAction(''site/#'', Array)
#2 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#3 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#4 {main}

Next exception ''yii\web\NotFoundHttpException'' with message ''Page not found.'' in C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\web\Application.php:114
Stack trace:
#0 C:\xampp\htdocs\ECUADOR\proy_ecuador\vendor\yiisoft\yii2\base\Application.php(380): yii\web\Application->handleRequest(Object(yii\web\Request))
#1 C:\xampp\htdocs\ECUADOR\proy_ecuador\frontend\web\index.php(18): yii\base\Application->run()
#2 {main}');
INSERT INTO "public"."pruebalog" VALUES (18, 4, 'application', 1495470964.1705, '2017-05-22 18:36:04', '$_GET = [
    ''r'' => ''site/#''
]

$_COOKIE = [
    ''advanced-frontend'' => ''28cnr661nngh54ieatj4njpp97''
    ''_csrf-frontend'' => ''26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\"_csrf-frontend\";i:1;s:32:\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\";}''
]

$_SESSION = [
    ''__flash'' => []
]

$_SERVER = [
    ''MIBDIRS'' => ''C:/xampp/php/extras/mibs''
    ''MYSQL_HOME'' => ''\\xampp\\mysql\\bin''
    ''OPENSSL_CONF'' => ''C:/xampp/apache/bin/openssl.cnf''
    ''PHP_PEAR_SYSCONF_DIR'' => ''\\xampp\\php''
    ''PHPRC'' => ''\\xampp\\php''
    ''TMP'' => ''\\xampp\\tmp''
    ''HTTP_HOST'' => ''127.0.0.1''
    ''HTTP_CONNECTION'' => ''keep-alive''
    ''HTTP_CACHE_CONTROL'' => ''max-age=0''
    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''
    ''HTTP_USER_AGENT'' => ''Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36''
    ''HTTP_ACCEPT'' => ''text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8''
    ''HTTP_REFERER'' => ''http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, sdch, br''
    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''
    ''HTTP_COOKIE'' => ''advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D''
    ''PATH'' => ''C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\ATI Technologies\\ATI.ACE\\Core-Static;C:\\Users\\ANAID\\AppData\\Local\\Microsoft\\WindowsApps;''
    ''SystemRoot'' => ''C:\\Windows''
    ''COMSPEC'' => ''C:\\Windows\\system32\\cmd.exe''
    ''PATHEXT'' => ''.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC''
    ''WINDIR'' => ''C:\\Windows''
    ''SERVER_SIGNATURE'' => ''<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>
''
    ''SERVER_SOFTWARE'' => ''Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30''
    ''SERVER_NAME'' => ''127.0.0.1''
    ''SERVER_ADDR'' => ''127.0.0.1''
    ''SERVER_PORT'' => ''80''
    ''REMOTE_ADDR'' => ''127.0.0.1''
    ''DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''REQUEST_SCHEME'' => ''http''
    ''CONTEXT_PREFIX'' => ''''
    ''CONTEXT_DOCUMENT_ROOT'' => ''C:/xampp/htdocs''
    ''SERVER_ADMIN'' => ''postmaster@localhost''
    ''SCRIPT_FILENAME'' => ''C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REMOTE_PORT'' => ''52802''
    ''GATEWAY_INTERFACE'' => ''CGI/1.1''
    ''SERVER_PROTOCOL'' => ''HTTP/1.1''
    ''REQUEST_METHOD'' => ''GET''
    ''QUERY_STRING'' => ''r=site%2F%23''
    ''REQUEST_URI'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23''
    ''SCRIPT_NAME'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''PHP_SELF'' => ''/ECUADOR/proy_ecuador/frontend/web/index.php''
    ''REQUEST_TIME_FLOAT'' => 1495470964.146
    ''REQUEST_TIME'' => 1495470964
]');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS "public"."user";
CREATE TABLE "public"."user" (
  "id" int4 NOT NULL DEFAULT nextval('user_id_seq'::regclass),
  "username" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "auth_key" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "password_hash" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password_reset_token" varchar(255) COLLATE "pg_catalog"."default",
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL DEFAULT 10,
  "created_at" int4 NOT NULL,
  "updated_at" int4 NOT NULL
)
;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO "public"."user" VALUES (1, 'dcarrillo', 'f1H0opP88mglYeaOVSD98_Cme0mcEKYo', '$2y$13$Uy7Dq9c5DNrkgbqwcS0yNuSpOD1xWaCzMuMT7j4P.YKy.kaHCpFBu', NULL, 'anaid0410@gmail.com', 10, 1490494699, 1490494699);
INSERT INTO "public"."user" VALUES (2, 'jhonattan', '5IjYJJ-V4PM1H2ZJYpaBPz0Ed4Q6sfVU', '$2y$13$ZDH/kMZig5e7P2kiwrENR.JPFpCJ5EOnMWJ321GucZhHPshSmRmOK', NULL, 'jhonattan.moreno.ing@gmail.com', 10, 1491917022, 1491917022);
INSERT INTO "public"."user" VALUES (3, 'pgrillo', '_icwpfRrbCcppec0xu_JhflyrFrgm4l6', '$2y$13$T.llbHKDx.D9g54YY9V.Fu67lVRj8PU12JKDapjI4GpVso7gv2gf6', NULL, 'pgrillo@gmail.com', 10, 1491917632, 1491917632);
INSERT INTO "public"."user" VALUES (4, 'dbautista', '85Oi2C01PxPL1NElAhV2DtNK1rPx6ci3', '$2y$13$bL6DTobxr4KPFxkSeccDw./S5yxXVI0AX7oYHHRJoeNXrvzKAqzsa', NULL, 'dbautista@gmail.com', 10, 1491918819, 1491918819);
INSERT INTO "public"."user" VALUES (5, 'jtobas', 'WyDq9NnVg27OP9L8XQR56gXZVJNS1REZ', '$2y$13$S0yUbrA68qFV8DfHCrO9Eu890/WqvAUH9JQnCH5NwGtFhVwMhPUp2', NULL, 'j12345@gmail.com', 10, 1491919226, 1491919226);
INSERT INTO "public"."user" VALUES (6, 'juril', 'KuK70vSKHNLXFBE6mzKxmC2u3NZx4F8w', '$2y$13$hiQnBmxZvz3MdhVB80K.q.J1cj5Dbsjky/ZCc3gwnkvJ18/PSfaIm', NULL, 'juriel@gmail.com', 10, 1491919425, 1491919425);

-- ----------------------------
-- Function structure for aud_event_add
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."aud_event_add"();
CREATE OR REPLACE FUNCTION "public"."aud_event_add"()
  RETURNS "pg_catalog"."trigger" AS $BODY$

DECLARE
  id_tipoevento INTEGER;
	id_tipoaccion INTEGER;
	id_paginan INTEGER;
	modulo_p VARCHAR;
	
	
 BEGIN
  SELECT id_tmensaje,id INTO id_tipoevento,id_tipoaccion FROM aud_tipo_accion WHERE nom_accion=NEW.status;
  NEW.id_tmensaje := id_tipoevento;
	NEW.id_taccion := id_tipoaccion;
	
	SELECT id_pagina,modulo	INTO id_paginan,modulo_p FROM pagina WHERE nombre_pagina=NEW.pagina;
	NEW.id_pagina := id_paginan;
	NEW.modulo := modulo_p;
	
  RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."aud_id_seq"', 362, true);
SELECT setval('"public"."aud_taccion_seq"', 2, false);
SELECT setval('"public"."audte_id_seq"', 11, true);
SELECT setval('"public"."audtm_id_seq"', 11, true);
SELECT setval('"public"."client_id_seq"', 126, true);
SELECT setval('"public"."log_id_seq"', 19, true);
SELECT setval('"public"."order_id_seq"', 2, false);
SELECT setval('"public"."pagina_id_seq"', 3, true);
ALTER SEQUENCE "public"."user_id_seq"
OWNED BY "public"."user"."id";
SELECT setval('"public"."user_id_seq"', 7, true);

-- ----------------------------
-- Triggers structure for table aud_auditoria
-- ----------------------------
CREATE TRIGGER "tr_aud_event" BEFORE INSERT ON "public"."aud_auditoria"
FOR EACH ROW
EXECUTE PROCEDURE "public"."aud_event_add"();

-- ----------------------------
-- Primary Key structure for table aud_auditoria
-- ----------------------------
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "aud_auditoria_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table aud_tipo_accion
-- ----------------------------
ALTER TABLE "public"."aud_tipo_accion" ADD CONSTRAINT "aud_tacc_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table aud_tipo_evento
-- ----------------------------
ALTER TABLE "public"."aud_tipo_evento" ADD CONSTRAINT "aud_te_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table aud_tipo_mensaje
-- ----------------------------
ALTER TABLE "public"."aud_tipo_mensaje" ADD CONSTRAINT "aud_tm_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table ciudades
-- ----------------------------
ALTER TABLE "public"."ciudades" ADD CONSTRAINT "ciudades_pkey" PRIMARY KEY ("Id");

-- ----------------------------
-- Primary Key structure for table clientes
-- ----------------------------
ALTER TABLE "public"."clientes" ADD CONSTRAINT "Id" PRIMARY KEY ("Id");

-- ----------------------------
-- Primary Key structure for table migration
-- ----------------------------
ALTER TABLE "public"."migration" ADD CONSTRAINT "migration_pkey" PRIMARY KEY ("version");

-- ----------------------------
-- Primary Key structure for table pagina
-- ----------------------------
ALTER TABLE "public"."pagina" ADD CONSTRAINT "id_pagina" PRIMARY KEY ("id_pagina");

-- ----------------------------
-- Indexes structure for table pruebalog
-- ----------------------------
CREATE INDEX "idx_log_category" ON "public"."pruebalog" USING btree (
  "category" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "idx_log_level" ON "public"."pruebalog" USING btree (
  "level" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table pruebalog
-- ----------------------------
ALTER TABLE "public"."pruebalog" ADD CONSTRAINT "log_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table user
-- ----------------------------
ALTER TABLE "public"."user" ADD CONSTRAINT "user_email_key" UNIQUE ("email");
ALTER TABLE "public"."user" ADD CONSTRAINT "user_password_reset_token_key" UNIQUE ("password_reset_token");
ALTER TABLE "public"."user" ADD CONSTRAINT "user_username_key" UNIQUE ("username");

-- ----------------------------
-- Primary Key structure for table user
-- ----------------------------
ALTER TABLE "public"."user" ADD CONSTRAINT "user_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table aud_auditoria
-- ----------------------------
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "fk_auditoria_aud_pagina" FOREIGN KEY ("id_pagina") REFERENCES "public"."pagina" ("id_pagina") ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "fk_auditoria_aud_tacc2" FOREIGN KEY ("id_taccion") REFERENCES "public"."aud_tipo_accion" ("id") ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "fk_auditoria_aud_te" FOREIGN KEY ("id_tevento") REFERENCES "public"."aud_tipo_evento" ("id") ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "fk_auditoria_aud_tm" FOREIGN KEY ("id_tmensaje") REFERENCES "public"."aud_tipo_mensaje" ("id") ON DELETE RESTRICT ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table aud_tipo_accion
-- ----------------------------
ALTER TABLE "public"."aud_tipo_accion" ADD CONSTRAINT "fk_auditoria_aud_tm2" FOREIGN KEY ("id_tmensaje") REFERENCES "public"."aud_tipo_mensaje" ("id") ON DELETE RESTRICT ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table clientes
-- ----------------------------
ALTER TABLE "public"."clientes" ADD CONSTRAINT "clientes_ciudad2_id_fkey" FOREIGN KEY ("ciudad2_id") REFERENCES "public"."ciudades" ("Id") ON DELETE RESTRICT ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table cometarios
-- ----------------------------
ALTER TABLE "public"."cometarios" ADD CONSTRAINT "cometarios_id_cliente_fkey" FOREIGN KEY ("id_cliente") REFERENCES "public"."clientes" ("Id") ON DELETE RESTRICT ON UPDATE CASCADE;
