/*
Navicat PGSQL Data Transfer

Source Server         : pgadmin
Source Server Version : 90506
Source Host           : localhost:5432
Source Database       : examples
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90506
File Encoding         : 65001

Date: 2017-07-14 23:11:14
*/




-- ----------------------------
-- Sequence structure for "public"."ciudadesp_seq"
-- ----------------------------
DROP SEQUENCE "public"."ciudadesp_seq";
CREATE SEQUENCE "public"."ciudadesp_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 97
 CACHE 1;

-- ----------------------------
-- Sequence structure for "public"."ciudadesproy_seq"
-- ----------------------------
DROP SEQUENCE "public"."ciudadesproy_seq";
CREATE SEQUENCE "public"."ciudadesproy_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 30
 CACHE 1;



-- ----------------------------
-- Sequence structure for "public"."proyectos_seq"
-- ----------------------------
DROP SEQUENCE "public"."proyectos_seq";
CREATE SEQUENCE "public"."proyectos_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 17
 CACHE 1;



-- ----------------------------
-- Table structure for "public"."ciudades_p"
-- ----------------------------
DROP TABLE "public"."ciudades_p";
CREATE TABLE "public"."ciudades_p" (
"Id" numeric DEFAULT nextval('ciudadesp_seq'::regclass) NOT NULL,
"nombre" varchar(255)
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of ciudades_p
-- ----------------------------
INSERT INTO "public"."ciudades_p" VALUES ('91', 'Bucaramanga');
INSERT INTO "public"."ciudades_p" VALUES ('92', 'Bogota');
INSERT INTO "public"."ciudades_p" VALUES ('93', 'Santa Martha');
INSERT INTO "public"."ciudades_p" VALUES ('94', 'Medellin');
INSERT INTO "public"."ciudades_p" VALUES ('95', 'Popayan');
INSERT INTO "public"."ciudades_p" VALUES ('96', 'Pereira');
INSERT INTO "public"."ciudades_p" VALUES ('97', 'Cartagena');

-- ----------------------------
-- Table structure for "public"."ciudadesproyectos"
-- ----------------------------
DROP TABLE "public"."ciudadesproyectos";
CREATE TABLE "public"."ciudadesproyectos" (
"Id" numeric DEFAULT nextval('ciudadesproy_seq'::regclass) NOT NULL,
"ciudad_id" numeric,
"proyecto_id" numeric
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of ciudadesproyectos
-- ----------------------------
INSERT INTO "public"."ciudadesproyectos" VALUES ('1', '91', '1');
INSERT INTO "public"."ciudadesproyectos" VALUES ('3', '93', '4');
INSERT INTO "public"."ciudadesproyectos" VALUES ('4', '94', '6');
INSERT INTO "public"."ciudadesproyectos" VALUES ('5', '93', '7');
INSERT INTO "public"."ciudadesproyectos" VALUES ('7', '91', '9');
INSERT INTO "public"."ciudadesproyectos" VALUES ('8', '93', '10');
INSERT INTO "public"."ciudadesproyectos" VALUES ('10', '94', '15');
INSERT INTO "public"."ciudadesproyectos" VALUES ('11', '93', '16');
INSERT INTO "public"."ciudadesproyectos" VALUES ('13', '91', '2');
INSERT INTO "public"."ciudadesproyectos" VALUES ('14', '92', '7');
INSERT INTO "public"."ciudadesproyectos" VALUES ('15', '92', '6');
INSERT INTO "public"."ciudadesproyectos" VALUES ('17', '92', '1');
INSERT INTO "public"."ciudadesproyectos" VALUES ('27', '91', '16');
INSERT INTO "public"."ciudadesproyectos" VALUES ('28', '92', '16');
INSERT INTO "public"."ciudadesproyectos" VALUES ('29', '91', '17');



-- ----------------------------
-- Table structure for "public"."proyectos"
-- ----------------------------
DROP TABLE "public"."proyectos";
CREATE TABLE "public"."proyectos" (
"Id" numeric DEFAULT nextval('proyectos_seq'::regclass) NOT NULL,
"nombre" varchar(255),
"fecha_inicio" date,
"fecha_fin" date
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of proyectos
-- ----------------------------
INSERT INTO "public"."proyectos" VALUES ('1', 'proyecto1', '2017-07-06', '2017-07-14');
INSERT INTO "public"."proyectos" VALUES ('2', 'proyecto 2', '2017-07-14', '2017-07-17');
INSERT INTO "public"."proyectos" VALUES ('3', 'proyecto 2', '2017-07-11', '2017-07-14');
INSERT INTO "public"."proyectos" VALUES ('4', 'proyecto 2', '2017-07-11', '2017-07-14');
INSERT INTO "public"."proyectos" VALUES ('5', 'proyecto 4', '2017-07-14', '2017-07-10');
INSERT INTO "public"."proyectos" VALUES ('6', 'proyecto 4', '2017-07-14', '2017-07-10');
INSERT INTO "public"."proyectos" VALUES ('7', 'proyecto 5', '2017-07-14', '2017-07-19');
INSERT INTO "public"."proyectos" VALUES ('9', 'proyecto 9', '2017-07-20', '2017-07-31');
INSERT INTO "public"."proyectos" VALUES ('10', 'proyecto 9', '2017-07-20', '2017-07-31');
INSERT INTO "public"."proyectos" VALUES ('13', 'fasdfad3', '2017-07-03', '2017-07-14');
INSERT INTO "public"."proyectos" VALUES ('14', 'dfdvdvsd', '2017-07-14', '2017-07-31');
INSERT INTO "public"."proyectos" VALUES ('15', 'dfdvdvsd', '2017-07-14', '2017-07-31');
INSERT INTO "public"."proyectos" VALUES ('16', 'dadbfbfad', '2017-07-14', '2017-07-25');
INSERT INTO "public"."proyectos" VALUES ('17', 'proyecto 20', '2017-07-04', '2017-07-25');




-- ----------------------------
-- Primary Key structure for table "public"."ciudades_p"
-- ----------------------------
ALTER TABLE "public"."ciudades_p" ADD PRIMARY KEY ("Id");

-- ----------------------------
-- Primary Key structure for table "public"."ciudadesproyectos"
-- ----------------------------
ALTER TABLE "public"."ciudadesproyectos" ADD PRIMARY KEY ("Id");



-- ----------------------------
-- Primary Key structure for table "public"."proyectos"
-- ----------------------------
ALTER TABLE "public"."proyectos" ADD PRIMARY KEY ("Id");


-- ----------------------------
-- Foreign Key structure for table "public"."ciudadesproyectos"
-- ----------------------------
ALTER TABLE "public"."ciudadesproyectos" ADD FOREIGN KEY ("proyecto_id") REFERENCES "public"."proyectos" ("Id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."ciudadesproyectos" ADD FOREIGN KEY ("ciudad_id") REFERENCES "public"."ciudades_p" ("Id") ON DELETE NO ACTION ON UPDATE NO ACTION;


