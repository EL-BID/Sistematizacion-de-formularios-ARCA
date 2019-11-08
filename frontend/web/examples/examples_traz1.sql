--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.6
-- Dumped by pg_dump version 9.5.6

-- Started on 2017-05-26 12:53:31

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE examples;
--
-- TOC entry 2203 (class 1262 OID 32769)
-- Name: examples; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE examples WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';


ALTER DATABASE examples OWNER TO postgres;

\connect examples

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2206 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 571 (class 1247 OID 32784)
-- Name: estado; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE estado AS ENUM (
    'activo',
    'inactivo'
);


ALTER TYPE estado OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 32874)
-- Name: aud_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE aud_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE aud_id_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 32916)
-- Name: aud_auditoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE aud_auditoria (
    id bigint DEFAULT nextval('aud_id_seq'::regclass) NOT NULL,
    usuario character varying(50),
    ip_origen character varying(50),
    texto text,
    json text,
    id_tevento integer,
    id_tmensaje integer,
    fecha_hora timestamp without time zone
);


ALTER TABLE aud_auditoria OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 32876)
-- Name: audte_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE audte_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE audte_id_seq OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 32880)
-- Name: aud_tipo_evento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE aud_tipo_evento (
    id bigint DEFAULT nextval('audte_id_seq'::regclass) NOT NULL,
    usuario_digitador character varying(50),
    fecha_digitacion timestamp without time zone,
    nom_tevento character varying(50)
);


ALTER TABLE aud_tipo_evento OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 32878)
-- Name: audtm_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE audtm_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE audtm_id_seq OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 32886)
-- Name: aud_tipo_mensaje; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE aud_tipo_mensaje (
    id bigint DEFAULT nextval('audtm_id_seq'::regclass) NOT NULL,
    usuario_digitador character varying(50),
    fecha_digitacion timestamp without time zone,
    nom_tmensaje character varying(50)
);


ALTER TABLE aud_tipo_mensaje OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 32806)
-- Name: ciudades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ciudades (
    "Id" integer NOT NULL,
    ciudades character varying(255)
);


ALTER TABLE ciudades OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 32789)
-- Name: client_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE client_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE client_id_seq OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 32791)
-- Name: clientes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE clientes (
    "Id" numeric DEFAULT nextval('client_id_seq'::regclass) NOT NULL,
    name character varying(40) NOT NULL,
    lastname character varying(40) NOT NULL,
    birthdate date,
    createdate date,
    type estado,
    ciudad character varying(255),
    ciudad2_id integer
);


ALTER TABLE clientes OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 32800)
-- Name: cometarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE cometarios (
    id_cliente numeric NOT NULL,
    comentario character varying(255)
);


ALTER TABLE cometarios OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 32861)
-- Name: log_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE log_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE log_id_seq OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 32770)
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE migration OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 32798)
-- Name: order_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE order_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE order_id_seq OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 32863)
-- Name: pruebalog; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pruebalog (
    id bigint DEFAULT nextval('log_id_seq'::regclass) NOT NULL,
    level integer,
    category character varying(255),
    log_time double precision,
    prefix text,
    message text
);


ALTER TABLE pruebalog OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 32775)
-- Name: user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE "user" OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 32773)
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO postgres;

--
-- TOC entry 2207 (class 0 OID 0)
-- Dependencies: 182
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- TOC entry 2034 (class 2604 OID 32778)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- TOC entry 2198 (class 0 OID 32916)
-- Dependencies: 196
-- Data for Name: aud_auditoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY aud_auditoria (id, usuario, ip_origen, texto, json, id_tevento, id_tmensaje, fecha_hora) FROM stdin;
1	pepe	127.0.0.1	probando que llega	\N	\N	\N	2017-05-10 23:00:00
2	-	\N	\N	\N	\N	\N	2017-05-22 20:16:42
3	-	\N	\N	\N	\N	\N	2017-05-22 20:16:42
4	-	\N	\N	\N	\N	\N	2017-05-26 19:33:58
5	-	\N	\N	\N	\N	\N	2017-05-26 19:33:58
6	-	\N	\N	\N	\N	\N	2017-05-26 19:38:41
7	-	\N	\N	\N	\N	\N	2017-05-26 19:38:41
8	-	\N	\N	\N	\N	\N	2017-05-26 19:41:37
9	-	\N	\N	\N	\N	\N	2017-05-26 19:41:37
10	-	\N	\N	\N	\N	\N	2017-05-26 19:44:28
11	-	\N	\N	\N	\N	\N	2017-05-26 19:44:28
12	dcarrillo	\N	\N	\N	\N	\N	2017-05-26 19:44:51
13	dcarrillo	\N	\N	\N	\N	\N	2017-05-26 19:44:51
14	dcarrillo	127.0.0.1	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}	\N	\N	\N	2017-05-26 19:45:48
15	dcarrillo	127.0.0.1	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    '_csrf-frontend' => '5400f426219a3e69c168a93f471be74381d6bded8d31c4ad50b04a0023d7ca0ca:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"EG4pv3UqLnJp_nbnquenEzS78dTPrviE\\";}'\n    'advanced-frontend' => 'mu4ej954pgpmsehtrpigc3ohr6'\n    '_identity-frontend' => 'd6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\\"_identity-frontend\\";i:1;s:46:\\"[1,\\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\\",2592000]\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n    '__id' => 1\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => '_csrf-frontend=5400f426219a3e69c168a93f471be74381d6bded8d31c4ad50b04a0023d7ca0ca%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22EG4pv3UqLnJp_nbnquenEzS78dTPrviE%22%3B%7D; advanced-frontend=mu4ej954pgpmsehtrpigc3ohr6; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '64181'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495820748.013\n    'REQUEST_TIME' => 1495820748\n]	\N	\N	\N	2017-05-26 19:45:48
16	dcarrillo	127.0.0.1	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}	\N	\N	\N	2017-05-26 19:46:40
17	dcarrillo	127.0.0.1	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    '_csrf-frontend' => '5400f426219a3e69c168a93f471be74381d6bded8d31c4ad50b04a0023d7ca0ca:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"EG4pv3UqLnJp_nbnquenEzS78dTPrviE\\";}'\n    'advanced-frontend' => 'mu4ej954pgpmsehtrpigc3ohr6'\n    '_identity-frontend' => 'd6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\\"_identity-frontend\\";i:1;s:46:\\"[1,\\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\\",2592000]\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n    '__id' => 1\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => '_csrf-frontend=5400f426219a3e69c168a93f471be74381d6bded8d31c4ad50b04a0023d7ca0ca%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22EG4pv3UqLnJp_nbnquenEzS78dTPrviE%22%3B%7D; advanced-frontend=mu4ej954pgpmsehtrpigc3ohr6; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Program Files\\\\WinMerge;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '64206'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495820800.763\n    'REQUEST_TIME' => 1495820800\n]	\N	\N	\N	2017-05-26 19:46:40
\.


--
-- TOC entry 2208 (class 0 OID 0)
-- Dependencies: 191
-- Name: aud_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('aud_id_seq', 17, true);


--
-- TOC entry 2196 (class 0 OID 32880)
-- Dependencies: 194
-- Data for Name: aud_tipo_evento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY aud_tipo_evento (id, usuario_digitador, fecha_digitacion, nom_tevento) FROM stdin;
1		2017-05-21 19:03:00	SEGURIDAD
2		2017-05-21 19:03:00	SISTEMA
3		2017-05-21 19:03:00	TRAZABILIDAD
\.


--
-- TOC entry 2197 (class 0 OID 32886)
-- Dependencies: 195
-- Data for Name: aud_tipo_mensaje; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY aud_tipo_mensaje (id, usuario_digitador, fecha_digitacion, nom_tmensaje) FROM stdin;
1	\N	2017-05-21 19:10:00	ERROR
2	\N	2017-05-21 19:10:00	EXCEPCION
3	\N	2017-05-21 19:10:00	ADVERTENCIA
4	\N	2017-05-21 19:10:00	DEPURACION
5	\N	2017-05-21 19:10:00	INFORMACION
6	\N	2017-05-21 19:10:00	CONSULTA
7	\N	2017-05-21 19:10:00	CREACION
8	\N	2017-05-21 19:10:00	MODIFICACION
9	\N	2017-05-21 19:10:00	ELIMINACION
10	\N	2017-05-21 19:10:00	SEGUIMIENTO
\.


--
-- TOC entry 2209 (class 0 OID 0)
-- Dependencies: 192
-- Name: audte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('audte_id_seq', 3, true);


--
-- TOC entry 2210 (class 0 OID 0)
-- Dependencies: 193
-- Name: audtm_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('audtm_id_seq', 10, true);


--
-- TOC entry 2190 (class 0 OID 32806)
-- Dependencies: 188
-- Data for Name: ciudades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ciudades ("Id", ciudades) FROM stdin;
1	Bucaramanga
2	Bogota
\.


--
-- TOC entry 2211 (class 0 OID 0)
-- Dependencies: 184
-- Name: client_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('client_id_seq', 121, true);


--
-- TOC entry 2187 (class 0 OID 32791)
-- Dependencies: 185
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY clientes ("Id", name, lastname, birthdate, createdate, type, ciudad, ciudad2_id) FROM stdin;
55	Tobias	Arango	1985-06-01	2017-03-27	activo	\N	\N
104	Jhaonta	Vargas	\N	\N	\N	Bucaramanga	1
105	dafdaf	dafdfad	2017-04-10	2017-04-04	activo	\N	\N
106	Diana	Carolina	2017-04-17	2017-04-17	activo	\N	\N
107	Gabriel	Hernandez	2017-04-05	2017-04-04	activo	\N	\N
49	dfadf	dadaf	1985-06-30	2017-03-27	activo	\N	\N
5	Diana	Castro	1987-02-15	2017-03-26	activo	\N	\N
15	Tania	Ferreira	1985-04-10	2017-03-27	activo	\N	\N
12	Pepito	Grillo	1985-04-10	2017-03-27	inactivo	\N	\N
2	Jennifer	Garcia	2017-01-12	2017-03-26	activo	\N	\N
30	Dad	dadads	1985-04-10	2017-03-27	inactivo	\N	\N
16	Uriel	Martinez	1985-06-01	2017-03-27	activo	\N	\N
61	Prueba	Apellido	1985-06-01	2017-03-27	activo	\N	\N
62	Prueba	Apellido	1985-06-01	2017-03-27	activo	\N	\N
10	Pedro	Fernandez	1987-06-30	2017-03-26	activo	\N	\N
9	Uriel	Gomez	1980-01-15	2017-03-26	activo	\N	\N
11	Yazmin	Gutierrez	1986-04-03	2017-03-26	activo	\N	\N
63	Ramiro	Mendoza	1985-06-01	2017-03-27	activo	\N	\N
64	Yuli	Pepe	1985-06-01	2017-03-27	activo	\N	\N
65	rwrew	rwerwerwe	1985-06-01	2017-03-27	activo	\N	\N
66	xcx<cx	c<xcxzc	1985-04-10	2017-03-27	activo	\N	\N
67	dfd	dfadf	1985-04-10	2017-03-27	activo	\N	\N
68	Diana	Bautista	1985-06-01	2017-03-27	activo	\N	\N
69	Pepito	Navajas	1985-06-01	2017-03-27	activo	\N	\N
70	Yuliet	Piña	1985-06-01	2017-03-27	activo	\N	\N
71	Tobias	Gomez	1985-06-01	2017-03-27	activo	\N	\N
72	fgdfgsfrt	rtfdsgdf	1985-06-01	2017-03-27	activo	\N	\N
73	fdafa	faafa	1985-06-01	2017-03-27	activo	\N	\N
74	dfadfad	fdafdfas	1985-06-01	2017-03-27	activo	\N	\N
75	fgfg	fsgfsf	1985-06-01	2017-03-27	activo	\N	\N
76	fdaf	dafd	1985-06-01	2017-03-27	activo	\N	\N
77	dfadfA	dafFAD	1985-06-01	2017-03-27	inactivo	\N	\N
78	daD	daDAD	1985-06-01	2017-03-27	activo	\N	\N
79	dfada	dfadfad	1985-06-01	2017-03-27	activo	\N	\N
80	Tiberio	Mendonza	1985-06-01	2017-03-27	activo	\N	\N
81	djkdfakd	dajkfajkd	\N	2017-04-01	activo	\N	\N
82	Pepito	Jimenez	2017-03-07	2017-04-01	activo	\N	\N
83	Raul	Emilio	1985-04-23	2017-04-03	inactivo	\N	\N
84	Uriel	Jimenez2	2017-04-24	2017-04-03	activo	\N	\N
85	dfadfad	fadfadfads	2017-04-06	2017-04-04	activo	\N	\N
88	Juliana	Otero	1985-04-10	2017-04-04	activo	\N	\N
89	Gloria	Paez	2017-04-13	2017-04-14	activo	\N	\N
90	Pepito	Jimenez	2017-04-04	2017-04-05	activo	\N	\N
91	Jorge	Perez	2000-04-05	2017-04-04	activo	\N	\N
92	juliana	jimenez	2017-04-04	2017-04-04	activo	\N	\N
93	Probando	Formulario	2017-04-11	2017-04-04	activo	\N	\N
94	Pepito	Numero2	2017-04-02	2017-04-04	activo	\N	\N
95	Raul	Garcia	2017-04-15	2017-04-01	activo	\N	\N
96	Tania	Guzman	2001-04-04	2017-04-05	activo	\N	\N
97	Pepito	Grillo	\N	\N	\N	Bogota	\N
98	tania	gomez	\N	\N	\N	Bogota	\N
99	Jhonattan	Moreno	\N	\N	\N	Bucaramanga	\N
100	Uriel	Medina	\N	\N	\N	Bucaramanga	\N
101	dafd	dafdasfa	\N	\N	\N	Bogota	\N
102	Alexandra	Silva	\N	\N	\N	Bucaramanga	\N
103	Alexandra	Silvap	\N	\N	\N	Bucaramanga	\N
108	Jhonattan	Moreno	2017-04-18	2017-04-19	activo	\N	\N
109	Uriel	Jimenez	2017-04-17	2017-04-17	activo	\N	\N
110	PRUEBA1	PRUEBA2	2017-04-04	2017-04-05	activo	\N	\N
111	Javier	Gomez	2017-04-04	2017-04-18	activo	\N	\N
23	Yamila	Sambrano	1985-06-01	2017-03-27	inactivo	\N	\N
112	Maria	Hernandez	2017-04-18	2017-04-04	activo	\N	\N
25	Pepitor	Grillo2	1985-06-01	2017-03-27	activo	\N	\N
113	Raul	Castillo	\N	\N	\N	Bucaramanga	1
35	Diana	Casttillo	1985-04-10	2017-03-27	inactivo	\N	\N
114	Gabriela	Moreno	1998-04-03	2017-04-23	activo	\N	\N
38	erewqe	eqrer	1985-06-01	2017-03-27	inactivo	\N	\N
118	Fabian	Peña	2017-04-26	2017-04-25	activo	\N	\N
119	Fernando	Gonzalez	1999-04-01	2017-04-25	activo	\N	\N
120	Diana	Carrillo	\N	\N	\N	Bogota	\N
121	Diana	Carrillo	\N	\N	\N	Bogota	1
\.


--
-- TOC entry 2189 (class 0 OID 32800)
-- Dependencies: 187
-- Data for Name: cometarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cometarios (id_cliente, comentario) FROM stdin;
23	<p>fgfsgfg gfsgdfgdf</p>
23	<p>Probando Correo:</p><p><br></p><p>Se presenta el texto.</p>
23	<ul><li>Prueba 1</li><li>Prueba 2</li><li>Prueba 3</li><li>Prueba 4</li></ul>
23	<p><a href="/proy_ecuador/frontend/web/uploadfolder/redactor/86fe37cd03-ali.txt">86fe37cd03-ali.txt</a> que envie</p>
25	<p><img src="/proy_ecuador/frontend/web/uploadfolder/redactor/ebda20d540-jr03.jpg" alt="ebda20d540-jr03"> probando con foto y contenido...</p><p><span></span><br></p>
25	<p><img src="/proy_ecuador/frontend/web/uploadfolder/redactor/acef922769-jellyfish.jpg"></p>
35	<p>Probando</p>
55	<p>Probando de nuevo </p><p><img src="/proy_ecuador/frontend/web/uploadfolder/redactor/3314dfc68a-menuiphonvertical.jpg"></p>
49	<p>2017/04/25 <a href="/proy_ecuador/frontend/web/uploadfolder/redactor/3e9f0fc9b2-ali.txt">3e9f0fc9b2-ali.txt</a><span style="background-color: initial;"></span></p>
\.


--
-- TOC entry 2212 (class 0 OID 0)
-- Dependencies: 189
-- Name: log_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('log_id_seq', 18, true);


--
-- TOC entry 2183 (class 0 OID 32770)
-- Dependencies: 181
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migration (version, apply_time) FROM stdin;
m000000_000000_base	1490487020
m130524_201442_init	1490487026
\.


--
-- TOC entry 2213 (class 0 OID 0)
-- Dependencies: 186
-- Name: order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('order_id_seq', 1, false);


--
-- TOC entry 2192 (class 0 OID 32863)
-- Dependencies: 190
-- Data for Name: pruebalog; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pruebalog (id, level, category, log_time, prefix, message) FROM stdin;
1	1	yii\\web\\HttpException:404	1495334958.0757999	[1]	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
2	4	application	1495334958.0423999	[1]	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    '_csrf-frontend' => 'd6a2d86691a57bc281feefb25a98fad25795cf10a27b9143576da613985262c3a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"aVIxpdjoefbH2K-2QfV783InR5GfQjsa\\";}'\n    'advanced-frontend' => 'aa09p2tct2hab6pqcjtl0qju11'\n    '_identity-frontend' => 'd6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\\"_identity-frontend\\";i:1;s:46:\\"[1,\\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\\",2592000]\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n    '__id' => 1\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2Findex'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => '_csrf-frontend=d6a2d86691a57bc281feefb25a98fad25795cf10a27b9143576da613985262c3a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22aVIxpdjoefbH2K-2QfV783InR5GfQjsa%22%3B%7D; advanced-frontend=aa09p2tct2hab6pqcjtl0qju11; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '60484'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495334958.033\n    'REQUEST_TIME' => 1495334958\n]
3	1	yii\\web\\HttpException:404	1495412433.0912001	[1]	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
4	4	application	1495412433.0274999	[1]	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    'advanced-frontend' => 'vl4f3l8h947ugvia48353kv2c4'\n    '_csrf-frontend' => '48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"shwELunVz22I19WUlQ6PQYJgWzus9SQn\\";}'\n    '_identity-frontend' => 'd6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\\"_identity-frontend\\";i:1;s:46:\\"[1,\\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\\",2592000]\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n    '__id' => 1\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2Findex'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => 'advanced-frontend=vl4f3l8h947ugvia48353kv2c4; _csrf-frontend=48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22shwELunVz22I19WUlQ6PQYJgWzus9SQn%22%3B%7D; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '50724'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495412433.009\n    'REQUEST_TIME' => 1495412433\n]
5	1	yii\\web\\HttpException:404	1495412434.8127999	[1]	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
6	4	application	1495412434.7783999	[1]	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    'advanced-frontend' => 'vl4f3l8h947ugvia48353kv2c4'\n    '_csrf-frontend' => '48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"shwELunVz22I19WUlQ6PQYJgWzus9SQn\\";}'\n    '_identity-frontend' => 'd6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\\"_identity-frontend\\";i:1;s:46:\\"[1,\\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\\",2592000]\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n    '__id' => 1\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => 'advanced-frontend=vl4f3l8h947ugvia48353kv2c4; _csrf-frontend=48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22shwELunVz22I19WUlQ6PQYJgWzus9SQn%22%3B%7D; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '50722'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495412434.767\n    'REQUEST_TIME' => 1495412434\n]
7	1	yii\\web\\HttpException:404	1495412839.3796	[127.0.0.1][1][vl4f3l8h947ugvia48353kv2c4]	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
8	4	application	1495412839.3434999	[127.0.0.1][1][vl4f3l8h947ugvia48353kv2c4]	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    'advanced-frontend' => 'vl4f3l8h947ugvia48353kv2c4'\n    '_csrf-frontend' => '48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"shwELunVz22I19WUlQ6PQYJgWzus9SQn\\";}'\n    '_identity-frontend' => 'd6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa:2:{i:0;s:18:\\"_identity-frontend\\";i:1;s:46:\\"[1,\\"f1H0opP88mglYeaOVSD98_Cme0mcEKYo\\",2592000]\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n    '__id' => 1\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => 'advanced-frontend=vl4f3l8h947ugvia48353kv2c4; _csrf-frontend=48e20f240ee62a4e2cc9f3588dd76a38feb506f14b973921684f48b61d6f8316a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%22shwELunVz22I19WUlQ6PQYJgWzus9SQn%22%3B%7D; _identity-frontend=d6be662a7d4f70332ae2450a9c0ace903c1d98b582e51f3b1f75c7f391604e8fa%3A2%3A%7Bi%3A0%3Bs%3A18%3A%22_identity-frontend%22%3Bi%3A1%3Bs%3A46%3A%22%5B1%2C%22f1H0opP88mglYeaOVSD98_Cme0mcEKYo%22%2C2592000%5D%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '51141'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495412839.33\n    'REQUEST_TIME' => 1495412839\n]
9	1	yii\\web\\HttpException:404	1495468101.6413	[127.0.0.1][-][28cnr661nngh54ieatj4njpp97]	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
15	1	yii\\web\\HttpException:404	1495469793.2347	2017-05-22 18:16:33@127.0.0.1@-	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
10	4	application	1495468101.5841999	[127.0.0.1][-][28cnr661nngh54ieatj4njpp97]	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    'advanced-frontend' => '28cnr661nngh54ieatj4njpp97'\n    '_csrf-frontend' => '26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_CACHE_CONTROL' => 'max-age=0'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => 'advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '52000'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495468101.554\n    'REQUEST_TIME' => 1495468101\n]
11	1	yii\\web\\HttpException:404	1495468224.2584	[127.0.0.1][-][28cnr661nngh54ieatj4njpp97][-]	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
12	4	application	1495468224.2184999	[127.0.0.1][-][28cnr661nngh54ieatj4njpp97][-]	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    'advanced-frontend' => '28cnr661nngh54ieatj4njpp97'\n    '_csrf-frontend' => '26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_CACHE_CONTROL' => 'max-age=0'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => 'advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '52033'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495468224.194\n    'REQUEST_TIME' => 1495468224\n]
13	1	yii\\web\\HttpException:404	1495469738.6693001	2017-05-22 18:15:38::127.0.0.1::-	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
14	4	application	1495469738.6296	2017-05-22 18:15:38::127.0.0.1::-	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    'advanced-frontend' => '28cnr661nngh54ieatj4njpp97'\n    '_csrf-frontend' => '26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_CACHE_CONTROL' => 'max-age=0'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => 'advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '52555'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495469738.605\n    'REQUEST_TIME' => 1495469738\n]
16	4	application	1495469793.1896	2017-05-22 18:16:33@127.0.0.1@-	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    'advanced-frontend' => '28cnr661nngh54ieatj4njpp97'\n    '_csrf-frontend' => '26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_CACHE_CONTROL' => 'max-age=0'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => 'advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '52574'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495469793.163\n    'REQUEST_TIME' => 1495469793\n]
17	1	yii\\web\\HttpException:404	1495470964.22	2017-05-22 18:36:04	exception 'yii\\base\\InvalidRouteException' with message 'Unable to resolve the request: site/#' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Controller.php:127\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Module.php(523): yii\\base\\Controller->runAction('#', Array)\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php(102): yii\\base\\Module->runAction('site/#', Array)\n#2 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#3 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#4 {main}\n\nNext exception 'yii\\web\\NotFoundHttpException' with message 'Page not found.' in C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\web\\Application.php:114\nStack trace:\n#0 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\vendor\\yiisoft\\yii2\\base\\Application.php(380): yii\\web\\Application->handleRequest(Object(yii\\web\\Request))\n#1 C:\\xampp\\htdocs\\ECUADOR\\proy_ecuador\\frontend\\web\\index.php(18): yii\\base\\Application->run()\n#2 {main}
18	4	application	1495470964.1705	2017-05-22 18:36:04	$_GET = [\n    'r' => 'site/#'\n]\n\n$_COOKIE = [\n    'advanced-frontend' => '28cnr661nngh54ieatj4njpp97'\n    '_csrf-frontend' => '26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a:2:{i:0;s:14:\\"_csrf-frontend\\";i:1;s:32:\\"94j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F\\";}'\n]\n\n$_SESSION = [\n    '__flash' => []\n]\n\n$_SERVER = [\n    'MIBDIRS' => 'C:/xampp/php/extras/mibs'\n    'MYSQL_HOME' => '\\\\xampp\\\\mysql\\\\bin'\n    'OPENSSL_CONF' => 'C:/xampp/apache/bin/openssl.cnf'\n    'PHP_PEAR_SYSCONF_DIR' => '\\\\xampp\\\\php'\n    'PHPRC' => '\\\\xampp\\\\php'\n    'TMP' => '\\\\xampp\\\\tmp'\n    'HTTP_HOST' => '127.0.0.1'\n    'HTTP_CONNECTION' => 'keep-alive'\n    'HTTP_CACHE_CONTROL' => 'max-age=0'\n    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'\n    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'\n    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8'\n    'HTTP_REFERER' => 'http://127.0.0.1/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, sdch, br'\n    'HTTP_ACCEPT_LANGUAGE' => 'es-ES,es;q=0.8'\n    'HTTP_COOKIE' => 'advanced-frontend=28cnr661nngh54ieatj4njpp97; _csrf-frontend=26f4d863044a775877bf79fa773393d3e68978e2ac0f47babd6576b12d99c533a%3A2%3A%7Bi%3A0%3Bs%3A14%3A%22_csrf-frontend%22%3Bi%3A1%3Bs%3A32%3A%2294j6m8lUU7FZBOmk2hXU0zrRFlmKHb5F%22%3B%7D'\n    'PATH' => 'C:\\\\Windows\\\\system32;C:\\\\Windows;C:\\\\Windows\\\\System32\\\\Wbem;C:\\\\Windows\\\\System32\\\\WindowsPowerShell\\\\v1.0\\\\;C:\\\\Program Files\\\\ATI Technologies\\\\ATI.ACE\\\\Core-Static;C:\\\\Users\\\\ANAID\\\\AppData\\\\Local\\\\Microsoft\\\\WindowsApps;'\n    'SystemRoot' => 'C:\\\\Windows'\n    'COMSPEC' => 'C:\\\\Windows\\\\system32\\\\cmd.exe'\n    'PATHEXT' => '.COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC'\n    'WINDIR' => 'C:\\\\Windows'\n    'SERVER_SIGNATURE' => '<address>Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30 Server at 127.0.0.1 Port 80</address>\n'\n    'SERVER_SOFTWARE' => 'Apache/2.4.25 (Win32) OpenSSL/1.0.2j PHP/5.6.30'\n    'SERVER_NAME' => '127.0.0.1'\n    'SERVER_ADDR' => '127.0.0.1'\n    'SERVER_PORT' => '80'\n    'REMOTE_ADDR' => '127.0.0.1'\n    'DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'REQUEST_SCHEME' => 'http'\n    'CONTEXT_PREFIX' => ''\n    'CONTEXT_DOCUMENT_ROOT' => 'C:/xampp/htdocs'\n    'SERVER_ADMIN' => 'postmaster@localhost'\n    'SCRIPT_FILENAME' => 'C:/xampp/htdocs/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REMOTE_PORT' => '52802'\n    'GATEWAY_INTERFACE' => 'CGI/1.1'\n    'SERVER_PROTOCOL' => 'HTTP/1.1'\n    'REQUEST_METHOD' => 'GET'\n    'QUERY_STRING' => 'r=site%2F%23'\n    'REQUEST_URI' => '/ECUADOR/proy_ecuador/frontend/web/index.php?r=site%2F%23'\n    'SCRIPT_NAME' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'PHP_SELF' => '/ECUADOR/proy_ecuador/frontend/web/index.php'\n    'REQUEST_TIME_FLOAT' => 1495470964.146\n    'REQUEST_TIME' => 1495470964\n]
\.


--
-- TOC entry 2185 (class 0 OID 32775)
-- Dependencies: 183
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "user" (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at) FROM stdin;
1	dcarrillo	f1H0opP88mglYeaOVSD98_Cme0mcEKYo	$2y$13$Uy7Dq9c5DNrkgbqwcS0yNuSpOD1xWaCzMuMT7j4P.YKy.kaHCpFBu	\N	anaid0410@gmail.com	10	1490494699	1490494699
2	jhonattan	5IjYJJ-V4PM1H2ZJYpaBPz0Ed4Q6sfVU	$2y$13$ZDH/kMZig5e7P2kiwrENR.JPFpCJ5EOnMWJ321GucZhHPshSmRmOK	\N	jhonattan.moreno.ing@gmail.com	10	1491917022	1491917022
3	pgrillo	_icwpfRrbCcppec0xu_JhflyrFrgm4l6	$2y$13$T.llbHKDx.D9g54YY9V.Fu67lVRj8PU12JKDapjI4GpVso7gv2gf6	\N	pgrillo@gmail.com	10	1491917632	1491917632
4	dbautista	85Oi2C01PxPL1NElAhV2DtNK1rPx6ci3	$2y$13$bL6DTobxr4KPFxkSeccDw./S5yxXVI0AX7oYHHRJoeNXrvzKAqzsa	\N	dbautista@gmail.com	10	1491918819	1491918819
5	jtobas	WyDq9NnVg27OP9L8XQR56gXZVJNS1REZ	$2y$13$S0yUbrA68qFV8DfHCrO9Eu890/WqvAUH9JQnCH5NwGtFhVwMhPUp2	\N	j12345@gmail.com	10	1491919226	1491919226
6	juril	KuK70vSKHNLXFBE6mzKxmC2u3NZx4F8w	$2y$13$hiQnBmxZvz3MdhVB80K.q.J1cj5Dbsjky/ZCc3gwnkvJ18/PSfaIm	\N	juriel@gmail.com	10	1491919425	1491919425
\.


--
-- TOC entry 2214 (class 0 OID 0)
-- Dependencies: 182
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_id_seq', 6, true);


--
-- TOC entry 2052 (class 2606 OID 32820)
-- Name: Id; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT "Id" PRIMARY KEY ("Id");


--
-- TOC entry 2064 (class 2606 OID 32924)
-- Name: aud_auditoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aud_auditoria
    ADD CONSTRAINT aud_auditoria_pkey PRIMARY KEY (id);


--
-- TOC entry 2060 (class 2606 OID 32885)
-- Name: aud_te_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aud_tipo_evento
    ADD CONSTRAINT aud_te_pkey PRIMARY KEY (id);


--
-- TOC entry 2062 (class 2606 OID 32891)
-- Name: aud_tm_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aud_tipo_mensaje
    ADD CONSTRAINT aud_tm_pkey PRIMARY KEY (id);


--
-- TOC entry 2054 (class 2606 OID 32827)
-- Name: ciudades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ciudades
    ADD CONSTRAINT ciudades_pkey PRIMARY KEY ("Id");


--
-- TOC entry 2058 (class 2606 OID 32871)
-- Name: log_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pruebalog
    ADD CONSTRAINT log_pkey PRIMARY KEY (id);


--
-- TOC entry 2042 (class 2606 OID 32810)
-- Name: migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- TOC entry 2044 (class 2606 OID 32818)
-- Name: user_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);


--
-- TOC entry 2046 (class 2606 OID 32816)
-- Name: user_password_reset_token_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token);


--
-- TOC entry 2048 (class 2606 OID 32812)
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- TOC entry 2050 (class 2606 OID 32814)
-- Name: user_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- TOC entry 2055 (class 1259 OID 32872)
-- Name: idx_log_category; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_log_category ON pruebalog USING btree (category);


--
-- TOC entry 2056 (class 1259 OID 32873)
-- Name: idx_log_level; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_log_level ON pruebalog USING btree (level);


--
-- TOC entry 2065 (class 2606 OID 32828)
-- Name: clientes_ciudad2_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT clientes_ciudad2_id_fkey FOREIGN KEY (ciudad2_id) REFERENCES ciudades("Id") ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2066 (class 2606 OID 32821)
-- Name: cometarios_id_cliente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cometarios
    ADD CONSTRAINT cometarios_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES clientes("Id") ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2067 (class 2606 OID 32925)
-- Name: fk_auditoria_aud_te; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aud_auditoria
    ADD CONSTRAINT fk_auditoria_aud_te FOREIGN KEY (id_tevento) REFERENCES aud_tipo_evento(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2068 (class 2606 OID 32930)
-- Name: fk_auditoria_aud_tm; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aud_auditoria
    ADD CONSTRAINT fk_auditoria_aud_tm FOREIGN KEY (id_tmensaje) REFERENCES aud_tipo_mensaje(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2205 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-05-26 12:53:32

--
-- PostgreSQL database dump complete
--

