/*
Navicat PGSQL Data Transfer

Source Server         : localpostgress
Source Server Version : 90411
Source Host           : localhost:5432
Source Database       : examples
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90411
File Encoding         : 65001

Date: 2017-03-27 13:06:37
*/


CREATE TYPE estado AS ENUM ('activo', 'inactivo');

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS "public"."clientes";
CREATE TABLE "public"."clientes" (
"Id" numeric DEFAULT nextval('client_id_seq'::regclass) NOT NULL,
"name" varchar(40) COLLATE "default" NOT NULL,
"lastname" varchar(40) COLLATE "default" NOT NULL,
"birthdate" date,
"createdate" date,
"type" "public"."estado"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO "public"."clientes" VALUES ('1', 'Pedro', 'Perez', '1985-04-01', '2017-03-25', null);
INSERT INTO "public"."clientes" VALUES ('2', 'Jennifer', 'Garcia', '2017-01-12', '2017-03-26', null);
INSERT INTO "public"."clientes" VALUES ('3', 'Tania', 'Gonzalez', '1980-01-15', '2017-03-26', null);
INSERT INTO "public"."clientes" VALUES ('5', 'Diana', 'Castro', '1987-02-15', '2017-03-26', null);
INSERT INTO "public"."clientes" VALUES ('8', 'Raul', 'Castillo', '1986-04-03', '2017-03-26', null);
INSERT INTO "public"."clientes" VALUES ('9', 'Uriel', 'Gomez', '1980-01-15', '2017-03-26', null);
INSERT INTO "public"."clientes" VALUES ('10', 'Pedro', 'Fernandez', '1987-06-30', '2017-03-26', null);
INSERT INTO "public"."clientes" VALUES ('11', 'Yazmin', 'Gutierrez', '1986-04-03', '2017-03-26', null);

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table clientes
-- ----------------------------
ALTER TABLE "public"."clientes" ADD PRIMARY KEY ("Id");
