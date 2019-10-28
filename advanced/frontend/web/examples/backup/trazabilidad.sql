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

 Date: 27/06/2017 21:29:45
*/


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
SELECT setval('"public"."aud_id_seq"', 632, true);

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
SELECT setval('"public"."audte_id_seq"', 44, true);

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
INSERT INTO "public"."aud_auditoria" VALUES (626, '-', '127.0.0.1', 'Unable to resolve the request: site/#', '{
    "name": "yii\\base\\InvalidRouteException",
    "message": "Unable to resolve the request: site\/#",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": "site\/#",
    "tevento": "2",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''site\/#''"
        ],
        "COOKIE ": [
            "    ''advanced-frontend'' => ''r1jmrtj9n6lg39jkefh3tmfj96''",
            "    ''_csrf-frontend'' => ''fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"tYG3GW3OzFztGon6LTht5ZHFGewAAcSE\\\";}''"
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
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/59.0.3071.115 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,image\/apng,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=r1jmrtj9n6lg39jkefh3tmfj96; _csrf-frontend=fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22tYG3GW3OzFztGon6LTht5ZHFGewAAcSE%22%3B%7D''",
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
            "    ''REMOTE_PORT'' => ''54948''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=site%2F%23''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=site%2F%23''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1498612427.919",
            "    ''REQUEST_TIME'' => 1498612427"
        ]
    }
}', 2, 1, 36, '2017-06-28 03:13:48', NULL, 'yii\web\HttpException:404', 'site/#', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (627, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "tevento": "3",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/update''",
            "    ''id'' => ''55''"
        ],
        "POST ": [
            "    ''_csrf-frontend'' => ''Nk9KSFN3QmxCFg17FCBxI0wJMDwUGCxaehsiPGYtCipxKj0JEhQRKQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''Tobias''",
            "        ''lastname'' => ''Arango''",
            "        ''birthdate'' => ''1985-06-01''",
            "        ''createdate'' => ''2017-03-27''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "COOKIE ": [
            "    ''advanced-frontend'' => ''r1jmrtj9n6lg39jkefh3tmfj96''",
            "    ''_csrf-frontend'' => ''fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"tYG3GW3OzFztGon6LTht5ZHFGewAAcSE\\\";}''"
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
            "    ''CONTENT_LENGTH'' => ''252''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/59.0.3071.115 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,image\/apng,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba%2Fupdate&id=55''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=r1jmrtj9n6lg39jkefh3tmfj96; _csrf-frontend=fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22tYG3GW3OzFztGon6LTht5ZHFGewAAcSE%22%3B%7D''",
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
            "    ''REMOTE_PORT'' => ''54979''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba%2Fupdate&id=55''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba%2Fupdate&id=55''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1498612516.149",
            "    ''REQUEST_TIME'' => 1498612516"
        ]
    }
}', 3, 1, NULL, '2017-06-28 03:15:16', NULL, 'yii\db\Exception', 'clientesprueba/update', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (628, '-', '127.0.0.1', 'SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es válida para el enum estado: «»', '{
    "name": "PDOException",
    "message": "SQLSTATE[22P02]: Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "code": "22P02",
    "status": "yii\\db\\Exception",
    "pagina": "Invalid text representation: 7 ERROR:  la sintaxis de entrada no es v\u00e1lida para el enum estado: \u00ab\u00bb",
    "tevento": "3",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''clientesprueba\/update''",
            "    ''id'' => ''55''"
        ],
        "POST ": [
            "    ''_csrf-frontend'' => ''Nk9KSFN3QmxCFg17FCBxI0wJMDwUGCxaehsiPGYtCipxKj0JEhQRKQ==''",
            "    ''Clientesprueba'' => [",
            "        ''name'' => ''Tobias''",
            "        ''lastname'' => ''Arango''",
            "        ''birthdate'' => ''1985-06-01''",
            "        ''createdate'' => ''2017-03-27''",
            "        ''type'' => ''''",
            "    ]"
        ],
        "COOKIE ": [
            "    ''advanced-frontend'' => ''r1jmrtj9n6lg39jkefh3tmfj96''",
            "    ''_csrf-frontend'' => ''fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"tYG3GW3OzFztGon6LTht5ZHFGewAAcSE\\\";}''"
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
            "    ''CONTENT_LENGTH'' => ''252''",
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_ORIGIN'' => ''http:\/\/127.0.0.1''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/59.0.3071.115 Safari\/537.36''",
            "    ''CONTENT_TYPE'' => ''application\/x-www-form-urlencoded''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,image\/apng,*\/*;q=0.8''",
            "    ''HTTP_REFERER'' => ''http:\/\/127.0.0.1\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba%2Fupdate&id=55''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=r1jmrtj9n6lg39jkefh3tmfj96; _csrf-frontend=fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22tYG3GW3OzFztGon6LTht5ZHFGewAAcSE%22%3B%7D''",
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
            "    ''REMOTE_PORT'' => ''55466''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''POST''",
            "    ''QUERY_STRING'' => ''r=clientesprueba%2Fupdate&id=55''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=clientesprueba%2Fupdate&id=55''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1498613535.349",
            "    ''REQUEST_TIME'' => 1498613535"
        ]
    }
}', 3, 1, NULL, '2017-06-28 03:32:15', NULL, 'yii\db\Exception', 'clientesprueba/update', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (629, '-', '127.0.0.1', 'The requested page does not exist.', '{
    "name": "yii\\web\\NotFoundHttpException",
    "message": "The requested page does not exist.",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": false,
    "tevento": "2",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''logauditoria\/view''",
            "    ''id'' => ''621''"
        ],
        "COOKIE ": [
            "    ''advanced-frontend'' => ''r1jmrtj9n6lg39jkefh3tmfj96''",
            "    ''_csrf-frontend'' => ''fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"tYG3GW3OzFztGon6LTht5ZHFGewAAcSE\\\";}''"
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
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/59.0.3071.115 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,image\/apng,*\/*;q=0.8''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=r1jmrtj9n6lg39jkefh3tmfj96; _csrf-frontend=fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22tYG3GW3OzFztGon6LTht5ZHFGewAAcSE%22%3B%7D''",
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
            "    ''REMOTE_PORT'' => ''55639''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=logauditoria%2Fview&id=621''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=logauditoria%2Fview&id=621''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1498613949.993",
            "    ''REQUEST_TIME'' => 1498613949"
        ]
    }
}', 2, 1, 36, '2017-06-28 03:39:10', NULL, 'yii\web\HttpException:404', 'logauditoria/view', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (630, '-', '127.0.0.1', 'The requested page does not exist.', '{
    "name": "yii\\web\\NotFoundHttpException",
    "message": "The requested page does not exist.",
    "code": 0,
    "status": "yii\\web\\HttpException:404",
    "pagina": false,
    "tevento": "2",
    "ip": "127.0.0.1",
    "user": "-",
    "datatext": {
        "$_GET ": [
            "    ''r'' => ''logauditoria\/view''",
            "    ''id'' => ''621''"
        ],
        "COOKIE ": [
            "    ''advanced-frontend'' => ''r1jmrtj9n6lg39jkefh3tmfj96''",
            "    ''_csrf-frontend'' => ''fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea:2:{i:0;s:14:\\\"_csrf-frontend\\\";i:1;s:32:\\\"tYG3GW3OzFztGon6LTht5ZHFGewAAcSE\\\";}''"
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
            "    ''HTTP_CACHE_CONTROL'' => ''max-age=0''",
            "    ''HTTP_UPGRADE_INSECURE_REQUESTS'' => ''1''",
            "    ''HTTP_USER_AGENT'' => ''Mozilla\/5.0 (Windows NT 10.0) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/59.0.3071.115 Safari\/537.36''",
            "    ''HTTP_ACCEPT'' => ''text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,image\/apng,*\/*;q=0.8''",
            "    ''HTTP_ACCEPT_ENCODING'' => ''gzip, deflate, br''",
            "    ''HTTP_ACCEPT_LANGUAGE'' => ''es-ES,es;q=0.8''",
            "    ''HTTP_COOKIE'' => ''advanced-frontend=r1jmrtj9n6lg39jkefh3tmfj96; _csrf-frontend=fe547b4c397bd2673c4883b7673e490ed7e08184eb4df2ec419d184c165ccaeea%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22tYG3GW3OzFztGon6LTht5ZHFGewAAcSE%22%3B%7D''",
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
            "    ''REMOTE_PORT'' => ''55648''",
            "    ''GATEWAY_INTERFACE'' => ''CGI\/1.1''",
            "    ''SERVER_PROTOCOL'' => ''HTTP\/1.1''",
            "    ''REQUEST_METHOD'' => ''GET''",
            "    ''QUERY_STRING'' => ''r=logauditoria%2Fview&id=621''",
            "    ''REQUEST_URI'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php?r=logauditoria%2Fview&id=621''",
            "    ''SCRIPT_NAME'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''PHP_SELF'' => ''\/ECUADOR\/proy_ecuador\/frontend\/web\/index.php''",
            "    ''REQUEST_TIME_FLOAT'' => 1498613987.322",
            "    ''REQUEST_TIME'' => 1498613987"
        ]
    }
}', 2, 1, 36, '2017-06-28 03:39:47', NULL, 'yii\web\HttpException:404', 'logauditoria/view', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (631, 'dcarrillo', '127.0.0.1', 'probando', 'json', 2, 10, 13, '2017-05-15 05:00:00', NULL, 'CONSULTA', 'rest', NULL);
INSERT INTO "public"."aud_auditoria" VALUES (632, 'dcarrillo', '127.0.0.1', 'probando', 'json', 2, 10, 44, '2017-05-15 05:00:00', NULL, 'INGRESO', 'rest', NULL);

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
INSERT INTO "public"."aud_tipo_accion" VALUES (12, NULL, NULL, 'SEGUIMIENTO', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (13, NULL, NULL, 'CONSULTA', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (14, NULL, NULL, 'BD', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (15, NULL, NULL, 'DEBUG', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (16, NULL, NULL, 'yii\web\HttpException:100
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (17, NULL, NULL, 'yii\web\HttpException:101
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (18, NULL, NULL, 'yii\web\HttpException:200
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (19, NULL, NULL, 'yii\web\HttpException:201
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (20, NULL, NULL, 'yii\web\HttpException:202
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (21, NULL, NULL, 'yii\web\HttpException:203
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (22, NULL, NULL, 'yii\web\HttpException:204
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (23, NULL, NULL, 'yii\web\HttpException:205
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (24, NULL, NULL, 'yii\web\HttpException:206
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (25, NULL, NULL, 'yii\web\HttpException:300
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (26, NULL, NULL, 'yii\web\HttpException:301
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (27, NULL, NULL, 'yii\web\HttpException:302
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (28, NULL, NULL, 'yii\web\HttpException:303
', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (29, NULL, NULL, 'yii\web\HttpException:305', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (30, NULL, NULL, 'yii\web\HttpException:306', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (31, NULL, NULL, 'yii\web\HttpException:307', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (32, NULL, NULL, 'yii\web\HttpException:400', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (33, NULL, NULL, 'yii\web\HttpException:401', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (34, NULL, NULL, 'yii\web\HttpException:402', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (35, NULL, NULL, 'yii\web\HttpException:403', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (36, NULL, NULL, 'yii\web\HttpException:404', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (37, NULL, NULL, 'yii\web\HttpException:405', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (38, NULL, NULL, 'yii\web\HttpException:406', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (39, NULL, NULL, 'yii\web\HttpException:407', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (40, NULL, NULL, 'yii\web\HttpException:408', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (41, NULL, NULL, 'yii\web\HttpException:409', NULL);
INSERT INTO "public"."aud_tipo_accion" VALUES (44, NULL, NULL, 'INGRESO', NULL);

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
INSERT INTO "public"."aud_tipo_evento" VALUES (4, NULL, NULL, 'DEPURACION');
INSERT INTO "public"."aud_tipo_evento" VALUES (5, NULL, NULL, 'EXCEPCION');

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
 
  SELECT id INTO id_tipoaccion FROM aud_tipo_accion WHERE nom_accion=NEW.status;
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
SELECT setval('"public"."aud_id_seq"', 633, true);
SELECT setval('"public"."aud_taccion_seq"', 2, false);
SELECT setval('"public"."audte_id_seq"', 45, true);
SELECT setval('"public"."audtm_id_seq"', 11, true);
SELECT setval('"public"."pagina_id_seq"', 3, true);

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
-- Primary Key structure for table pagina
-- ----------------------------
ALTER TABLE "public"."pagina" ADD CONSTRAINT "id_pagina" PRIMARY KEY ("id_pagina");



-- ----------------------------
-- Foreign Keys structure for table aud_auditoria
-- ----------------------------
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "fk_auditoria_aud_pagina" FOREIGN KEY ("id_pagina") REFERENCES "public"."pagina" ("id_pagina") ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "fk_auditoria_aud_tacc2" FOREIGN KEY ("id_taccion") REFERENCES "public"."aud_tipo_accion" ("id") ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "fk_auditoria_aud_te" FOREIGN KEY ("id_tevento") REFERENCES "public"."aud_tipo_evento" ("id") ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE "public"."aud_auditoria" ADD CONSTRAINT "fk_auditoria_aud_tm" FOREIGN KEY ("id_tmensaje") REFERENCES "public"."aud_tipo_mensaje" ("id") ON DELETE RESTRICT ON UPDATE CASCADE;

