/*
Navicat PGSQL Data Transfer

Source Server         : pgadmin
Source Server Version : 90506
Source Host           : localhost:5432
Source Database       : poc
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90506
File Encoding         : 65001

Date: 2017-07-12 22:51:29
*/


-- ----------------------------
-- Sequence structure for "public"."sq_fd_datos_generales"
-- ----------------------------
DROP SEQUENCE "public"."sq_fd_datos_generales";
CREATE SEQUENCE "public"."sq_fd_datos_generales"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_fd_historico_respuesta"
-- ----------------------------
DROP SEQUENCE "public"."sq_fd_historico_respuesta";
CREATE SEQUENCE "public"."sq_fd_historico_respuesta"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_fd_involucrado"
-- ----------------------------
DROP SEQUENCE "public"."sq_fd_involucrado";
CREATE SEQUENCE "public"."sq_fd_involucrado"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_fd_respuesta"
-- ----------------------------
DROP SEQUENCE "public"."sq_fd_respuesta";
CREATE SEQUENCE "public"."sq_fd_respuesta"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_fd_respuesta_x_mes"
-- ----------------------------
DROP SEQUENCE "public"."sq_fd_respuesta_x_mes";
CREATE SEQUENCE "public"."sq_fd_respuesta_x_mes"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_fd_ubicacion"
-- ----------------------------
DROP SEQUENCE "public"."sq_fd_ubicacion";
CREATE SEQUENCE "public"."sq_fd_ubicacion"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_paginas"
-- ----------------------------
DROP SEQUENCE "public"."sq_paginas";
CREATE SEQUENCE "public"."sq_paginas"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_roles"
-- ----------------------------
DROP SEQUENCE "public"."sq_roles";
CREATE SEQUENCE "public"."sq_roles"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 20
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_sop_soportes"
-- ----------------------------
DROP SEQUENCE "public"."sq_sop_soportes";
CREATE SEQUENCE "public"."sq_sop_soportes"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1
 CACHE 10;

-- ----------------------------
-- Sequence structure for "public"."sq_usuarios"
-- ----------------------------
DROP SEQUENCE "public"."sq_usuarios";
CREATE SEQUENCE "public"."sq_usuarios"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 1009
 CACHE 10;

-- ----------------------------
-- Table structure for "public"."accesos"
-- ----------------------------
DROP TABLE "public"."accesos";
CREATE TABLE "public"."accesos" (
"id__acceso" numeric NOT NULL,
"nombre_acceso" varchar(50) NOT NULL,
"id_pagina" numeric,
"id_tipo_acceso" numeric,
"cod_rol" varchar(10)
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of accesos
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."cantones"
-- ----------------------------
DROP TABLE "public"."cantones";
CREATE TABLE "public"."cantones" (
"cod_canton" varchar(4) NOT NULL,
"nombre_canton" varchar(80) NOT NULL,
"cod_provincia" varchar(4) NOT NULL,
"id_demarcacion" numeric
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of cantones
-- ----------------------------
INSERT INTO "public"."cantones" VALUES ('1', 'CUENCA', '1', '9');
INSERT INTO "public"."cantones" VALUES ('1', 'IBARRA', '10', '5');
INSERT INTO "public"."cantones" VALUES ('1', 'LOJA', '11', '9');
INSERT INTO "public"."cantones" VALUES ('1', 'BABAHOYO', '12', '2');
INSERT INTO "public"."cantones" VALUES ('1', 'PORTOVIEJO', '13', '4');
INSERT INTO "public"."cantones" VALUES ('1', 'MORONA', '14', '9');
INSERT INTO "public"."cantones" VALUES ('1', 'TENA', '15', '6');
INSERT INTO "public"."cantones" VALUES ('1', 'PASTAZA', '16', '7');
INSERT INTO "public"."cantones" VALUES ('1', 'QUITO', '17', '1');
INSERT INTO "public"."cantones" VALUES ('1', 'AMBATO', '18', '7');
INSERT INTO "public"."cantones" VALUES ('1', 'ZAMORA', '19', '9');
INSERT INTO "public"."cantones" VALUES ('1', 'GUARANDA', '2', '2');
INSERT INTO "public"."cantones" VALUES ('1', 'SAN CRISTÓBAL', '20', '2');
INSERT INTO "public"."cantones" VALUES ('1', 'LAGO AGRIO', '21', '6');
INSERT INTO "public"."cantones" VALUES ('1', 'ORELLANA', '22', '6');
INSERT INTO "public"."cantones" VALUES ('1', 'SANTO DOMINGO', '23', '1');
INSERT INTO "public"."cantones" VALUES ('1', 'SANTA ELENA', '24', '2');
INSERT INTO "public"."cantones" VALUES ('1', 'AZOGUES', '3', '9');
INSERT INTO "public"."cantones" VALUES ('1', 'TULCÁN', '4', '5');
INSERT INTO "public"."cantones" VALUES ('1', 'LATACUNGA', '5', '7');
INSERT INTO "public"."cantones" VALUES ('1', 'RIOBAMBA', '6', '7');
INSERT INTO "public"."cantones" VALUES ('1', 'MACHALA', '7', '3');
INSERT INTO "public"."cantones" VALUES ('1', 'ESMERALDAS', '8', '1');
INSERT INTO "public"."cantones" VALUES ('1', 'GUAYAQUIL', '9', '2');
INSERT INTO "public"."cantones" VALUES ('1', 'LAS GOLONDRINAS', '90', '1');
INSERT INTO "public"."cantones" VALUES ('10', 'OÑA', '1', '3');
INSERT INTO "public"."cantones" VALUES ('10', 'PUYANGO', '11', '8');
INSERT INTO "public"."cantones" VALUES ('10', 'BUENA FÉ', '12', '2');
INSERT INTO "public"."cantones" VALUES ('10', 'PAJÁN', '13', '4');
INSERT INTO "public"."cantones" VALUES ('10', 'LOGROÑO', '14', '9');
INSERT INTO "public"."cantones" VALUES ('10', 'CUMANDÁ', '6', '2');
INSERT INTO "public"."cantones" VALUES ('10', 'PIÑAS', '7', '8');
INSERT INTO "public"."cantones" VALUES ('10', 'MILAGRO', '9', '2');
INSERT INTO "public"."cantones" VALUES ('11', 'CHORDELEG', '1', '9');
INSERT INTO "public"."cantones" VALUES ('11', 'SARAGURO', '11', '3');
INSERT INTO "public"."cantones" VALUES ('11', 'VALENCIA', '12', '2');
INSERT INTO "public"."cantones" VALUES ('11', 'PICHINCHA', '13', '4');
INSERT INTO "public"."cantones" VALUES ('11', 'PABLO SEXTO', '14', '7');
INSERT INTO "public"."cantones" VALUES ('11', 'PORTOVELO', '7', '8');
INSERT INTO "public"."cantones" VALUES ('11', 'NARANJAL', '9', '3');
INSERT INTO "public"."cantones" VALUES ('12', 'EL PAN', '1', '9');
INSERT INTO "public"."cantones" VALUES ('12', 'SOZORANGA', '11', '8');
INSERT INTO "public"."cantones" VALUES ('12', 'MOCACHE', '12', '2');
INSERT INTO "public"."cantones" VALUES ('12', 'ROCAFUERTE', '13', '4');
INSERT INTO "public"."cantones" VALUES ('12', 'TIWINTZA', '14', '9');
INSERT INTO "public"."cantones" VALUES ('12', 'SANTA ROSA', '7', '3');
INSERT INTO "public"."cantones" VALUES ('12', 'NARANJITO', '9', '2');
INSERT INTO "public"."cantones" VALUES ('13', 'SEVILLA DE ORO', '1', '9');
INSERT INTO "public"."cantones" VALUES ('13', 'ZAPOTILLO', '11', '8');
INSERT INTO "public"."cantones" VALUES ('13', 'QUINSALOMA', '12', '2');
INSERT INTO "public"."cantones" VALUES ('13', 'SANTA ANA', '13', '4');
INSERT INTO "public"."cantones" VALUES ('13', 'ZARUMA', '7', '8');
INSERT INTO "public"."cantones" VALUES ('13', 'PALESTINA', '9', '2');
INSERT INTO "public"."cantones" VALUES ('14', 'GUACHAPALA', '1', '9');
INSERT INTO "public"."cantones" VALUES ('14', 'PINDAL', '11', '8');
INSERT INTO "public"."cantones" VALUES ('14', 'SUCRE', '13', '4');
INSERT INTO "public"."cantones" VALUES ('14', 'LAS LAJAS', '7', '3');
INSERT INTO "public"."cantones" VALUES ('14', 'PEDRO CARBO', '9', '2');
INSERT INTO "public"."cantones" VALUES ('15', 'CAMILO PONCE ENRÍQUEZ', '1', '3');
INSERT INTO "public"."cantones" VALUES ('15', 'QUILANGA', '11', '8');
INSERT INTO "public"."cantones" VALUES ('15', 'TOSAGUA', '13', '4');
INSERT INTO "public"."cantones" VALUES ('16', 'OLMEDO', '11', '8');
INSERT INTO "public"."cantones" VALUES ('16', '24 DE MAYO', '13', '4');
INSERT INTO "public"."cantones" VALUES ('16', 'SAMBORONDÓN', '9', '2');
INSERT INTO "public"."cantones" VALUES ('17', 'PEDERNALES', '13', '4');
INSERT INTO "public"."cantones" VALUES ('18', 'OLMEDO', '13', '4');
INSERT INTO "public"."cantones" VALUES ('18', 'SANTA LUCÍA', '9', '2');
INSERT INTO "public"."cantones" VALUES ('19', 'PUERTO LÓPEZ', '13', '4');
INSERT INTO "public"."cantones" VALUES ('19', 'SALITRE (URBINA JADO)', '9', '2');
INSERT INTO "public"."cantones" VALUES ('2', 'GIRÓN', '1', '3');
INSERT INTO "public"."cantones" VALUES ('2', 'ANTONIO ANTE', '10', '5');
INSERT INTO "public"."cantones" VALUES ('2', 'CALVAS', '11', '8');
INSERT INTO "public"."cantones" VALUES ('2', 'BABA', '12', '2');
INSERT INTO "public"."cantones" VALUES ('2', 'BOLÍVAR', '13', '4');
INSERT INTO "public"."cantones" VALUES ('2', 'GUALAQUIZA', '14', '9');
INSERT INTO "public"."cantones" VALUES ('2', 'MERA', '16', '7');
INSERT INTO "public"."cantones" VALUES ('2', 'CAYAMBE', '17', '1');
INSERT INTO "public"."cantones" VALUES ('2', 'BAÑOS DE AGUA SANTA', '18', '7');
INSERT INTO "public"."cantones" VALUES ('2', 'ZAMORA CHINCHIPE', '19', '9');
INSERT INTO "public"."cantones" VALUES ('2', 'CHILLANES', '2', '2');
INSERT INTO "public"."cantones" VALUES ('2', 'ISABELA', '20', '2');
INSERT INTO "public"."cantones" VALUES ('2', 'GONZALO PIZARRO', '21', '6');
INSERT INTO "public"."cantones" VALUES ('2', 'AGUARICO', '22', '6');
INSERT INTO "public"."cantones" VALUES ('2', 'LA LIBERTAD', '24', '2');
INSERT INTO "public"."cantones" VALUES ('2', 'BIBLIÁN', '3', '2');
INSERT INTO "public"."cantones" VALUES ('2', 'BOLÍVAR', '4', '5');
INSERT INTO "public"."cantones" VALUES ('2', 'LA MANÁ', '5', '2');
INSERT INTO "public"."cantones" VALUES ('2', 'ALAUSI', '6', '2');
INSERT INTO "public"."cantones" VALUES ('2', 'ARENILLAS', '7', '3');
INSERT INTO "public"."cantones" VALUES ('2', 'ELOY ALFARO', '8', '1');
INSERT INTO "public"."cantones" VALUES ('2', 'ALFREDO BAQUERIZO MORENO (JUJÁN)', '9', '2');
INSERT INTO "public"."cantones" VALUES ('20', 'JAMA', '13', '4');
INSERT INTO "public"."cantones" VALUES ('20', 'SAN JACINTO DE YAGUACHI', '9', '2');
INSERT INTO "public"."cantones" VALUES ('21', 'JARAMIJÓ', '13', '4');
INSERT INTO "public"."cantones" VALUES ('21', 'PLAYAS', '9', '2');
INSERT INTO "public"."cantones" VALUES ('22', 'SAN VICENTE', '13', '4');
INSERT INTO "public"."cantones" VALUES ('22', 'SIMÓN BOLÍVAR', '9', '2');
INSERT INTO "public"."cantones" VALUES ('23', 'CORONEL MARCELINO MARIDUEÑA', '9', '2');
INSERT INTO "public"."cantones" VALUES ('24', 'LOMAS DE SARGENTILLO', '9', '2');
INSERT INTO "public"."cantones" VALUES ('25', 'NOBOL', '9', '2');
INSERT INTO "public"."cantones" VALUES ('27', 'GENERAL ANTONIO ELIZALDE', '9', '2');
INSERT INTO "public"."cantones" VALUES ('28', 'ISIDRO AYORA', '9', '2');
INSERT INTO "public"."cantones" VALUES ('3', 'GUALACEO', '1', '9');
INSERT INTO "public"."cantones" VALUES ('3', 'COTACACHI', '10', '5');
INSERT INTO "public"."cantones" VALUES ('3', 'CATAMAYO', '11', '8');
INSERT INTO "public"."cantones" VALUES ('3', 'MONTALVO', '12', '2');
INSERT INTO "public"."cantones" VALUES ('3', 'CHONE', '13', '4');
INSERT INTO "public"."cantones" VALUES ('3', 'LIMÓN INDANZA', '14', '9');
INSERT INTO "public"."cantones" VALUES ('3', 'ARCHIDONA', '15', '6');
INSERT INTO "public"."cantones" VALUES ('3', 'SANTA CLARA', '16', '6');
INSERT INTO "public"."cantones" VALUES ('3', 'MEJIA', '17', '1');
INSERT INTO "public"."cantones" VALUES ('3', 'CEVALLOS', '18', '7');
INSERT INTO "public"."cantones" VALUES ('3', 'NANGARITZA', '19', '9');
INSERT INTO "public"."cantones" VALUES ('3', 'CHIMBO', '2', '2');
INSERT INTO "public"."cantones" VALUES ('3', 'SANTA CRUZ', '20', '2');
INSERT INTO "public"."cantones" VALUES ('3', 'PUTUMAYO', '21', '6');
INSERT INTO "public"."cantones" VALUES ('3', 'LA JOYA DE LOS SACHAS', '22', '6');
INSERT INTO "public"."cantones" VALUES ('3', 'SALINAS', '24', '2');
INSERT INTO "public"."cantones" VALUES ('3', 'CAÑAR', '3', '2');
INSERT INTO "public"."cantones" VALUES ('3', 'ESPEJO', '4', '5');
INSERT INTO "public"."cantones" VALUES ('3', 'PANGUA', '5', '2');
INSERT INTO "public"."cantones" VALUES ('3', 'COLTA', '6', '7');
INSERT INTO "public"."cantones" VALUES ('3', 'ATAHUALPA', '7', '8');
INSERT INTO "public"."cantones" VALUES ('3', 'MUISNE', '8', '1');
INSERT INTO "public"."cantones" VALUES ('3', 'BALAO', '9', '3');
INSERT INTO "public"."cantones" VALUES ('3', 'MANGA DEL CURA', '90', '2');
INSERT INTO "public"."cantones" VALUES ('4', 'NABÓN', '1', '3');
INSERT INTO "public"."cantones" VALUES ('4', 'OTAVALO', '10', '5');
INSERT INTO "public"."cantones" VALUES ('4', 'CELICA', '11', '8');
INSERT INTO "public"."cantones" VALUES ('4', 'PUEBLOVIEJO', '12', '2');
INSERT INTO "public"."cantones" VALUES ('4', 'EL CARMEN', '13', '1');
INSERT INTO "public"."cantones" VALUES ('4', 'PALORA', '14', '7');
INSERT INTO "public"."cantones" VALUES ('4', 'EL CHACO', '15', '6');
INSERT INTO "public"."cantones" VALUES ('4', 'ARAJUNO', '16', '6');
INSERT INTO "public"."cantones" VALUES ('4', 'PEDRO MONCAYO', '17', '1');
INSERT INTO "public"."cantones" VALUES ('4', 'MOCHA', '18', '7');
INSERT INTO "public"."cantones" VALUES ('4', 'YACUAMBI', '19', '3');
INSERT INTO "public"."cantones" VALUES ('4', 'ECHEANDÍA', '2', '2');
INSERT INTO "public"."cantones" VALUES ('4', 'SHUSHUFINDI', '21', '6');
INSERT INTO "public"."cantones" VALUES ('4', 'LORETO', '22', '6');
INSERT INTO "public"."cantones" VALUES ('4', 'LA TRONCAL', '3', '2');
INSERT INTO "public"."cantones" VALUES ('4', 'MIRA', '4', '5');
INSERT INTO "public"."cantones" VALUES ('4', 'PUJILI', '5', '7');
INSERT INTO "public"."cantones" VALUES ('4', 'CHAMBO', '6', '7');
INSERT INTO "public"."cantones" VALUES ('4', 'BALSAS', '7', '8');
INSERT INTO "public"."cantones" VALUES ('4', 'QUININDÉ', '8', '1');
INSERT INTO "public"."cantones" VALUES ('4', 'BALZAR', '9', '2');
INSERT INTO "public"."cantones" VALUES ('4', 'EL PIEDRERO', '90', '2');
INSERT INTO "public"."cantones" VALUES ('5', 'PAUTE', '1', '9');
INSERT INTO "public"."cantones" VALUES ('5', 'PIMAMPIRO', '10', '5');
INSERT INTO "public"."cantones" VALUES ('5', 'CHAGUARPAMBA', '11', '8');
INSERT INTO "public"."cantones" VALUES ('5', 'QUEVEDO', '12', '2');
INSERT INTO "public"."cantones" VALUES ('5', 'FLAVIO ALFARO', '13', '4');
INSERT INTO "public"."cantones" VALUES ('5', 'SANTIAGO', '14', '9');
INSERT INTO "public"."cantones" VALUES ('5', 'RUMIÑAHUI', '17', '1');
INSERT INTO "public"."cantones" VALUES ('5', 'PATATE', '18', '7');
INSERT INTO "public"."cantones" VALUES ('5', 'YANTZAZA (YANZATZA)', '19', '9');
INSERT INTO "public"."cantones" VALUES ('5', 'SAN MIGUEL', '2', '2');
INSERT INTO "public"."cantones" VALUES ('5', 'SUCUMBÍOS', '21', '6');
INSERT INTO "public"."cantones" VALUES ('5', 'EL TAMBO', '3', '2');
INSERT INTO "public"."cantones" VALUES ('5', 'MONTÚFAR', '4', '5');
INSERT INTO "public"."cantones" VALUES ('5', 'SALCEDO', '5', '7');
INSERT INTO "public"."cantones" VALUES ('5', 'CHUNCHI', '6', '2');
INSERT INTO "public"."cantones" VALUES ('5', 'CHILLA', '7', '3');
INSERT INTO "public"."cantones" VALUES ('5', 'SAN LORENZO', '8', '1');
INSERT INTO "public"."cantones" VALUES ('5', 'COLIMES', '9', '2');
INSERT INTO "public"."cantones" VALUES ('6', 'PUCARA', '1', '3');
INSERT INTO "public"."cantones" VALUES ('6', 'SAN MIGUEL DE URCUQUÍ', '10', '5');
INSERT INTO "public"."cantones" VALUES ('6', 'ESPÍNDOLA', '11', '8');
INSERT INTO "public"."cantones" VALUES ('6', 'URDANETA', '12', '2');
INSERT INTO "public"."cantones" VALUES ('6', 'JIPIJAPA', '13', '4');
INSERT INTO "public"."cantones" VALUES ('6', 'SUCÚA', '14', '9');
INSERT INTO "public"."cantones" VALUES ('6', 'QUERO', '18', '7');
INSERT INTO "public"."cantones" VALUES ('6', 'EL PANGUI', '19', '9');
INSERT INTO "public"."cantones" VALUES ('6', 'CALUMA', '2', '2');
INSERT INTO "public"."cantones" VALUES ('6', 'CASCALES', '21', '6');
INSERT INTO "public"."cantones" VALUES ('6', 'DÉLEG', '3', '9');
INSERT INTO "public"."cantones" VALUES ('6', 'SAN PEDRO DE HUACA', '4', '5');
INSERT INTO "public"."cantones" VALUES ('6', 'SAQUISILÍ', '5', '7');
INSERT INTO "public"."cantones" VALUES ('6', 'GUAMOTE', '6', '7');
INSERT INTO "public"."cantones" VALUES ('6', 'EL GUABO', '7', '3');
INSERT INTO "public"."cantones" VALUES ('6', 'ATACAMES', '8', '1');
INSERT INTO "public"."cantones" VALUES ('6', 'DAULE', '9', '2');
INSERT INTO "public"."cantones" VALUES ('7', 'SAN FERNANDO', '1', '3');
INSERT INTO "public"."cantones" VALUES ('7', 'GONZANAMÁ', '11', '8');
INSERT INTO "public"."cantones" VALUES ('7', 'VENTANAS', '12', '2');
INSERT INTO "public"."cantones" VALUES ('7', 'JUNÍN', '13', '4');
INSERT INTO "public"."cantones" VALUES ('7', 'HUAMBOYA', '14', '7');
INSERT INTO "public"."cantones" VALUES ('7', 'QUIJOS', '15', '6');
INSERT INTO "public"."cantones" VALUES ('7', 'SAN MIGUEL DE LOS BANCOS', '17', '1');
INSERT INTO "public"."cantones" VALUES ('7', 'SAN PEDRO DE PELILEO', '18', '7');
INSERT INTO "public"."cantones" VALUES ('7', 'CENTINELA DEL CÓNDOR', '19', '9');
INSERT INTO "public"."cantones" VALUES ('7', 'LAS NAVES', '2', '2');
INSERT INTO "public"."cantones" VALUES ('7', 'CUYABENO', '21', '6');
INSERT INTO "public"."cantones" VALUES ('7', 'SUSCAL', '3', '2');
INSERT INTO "public"."cantones" VALUES ('7', 'SIGCHOS', '5', '7');
INSERT INTO "public"."cantones" VALUES ('7', 'GUANO', '6', '7');
INSERT INTO "public"."cantones" VALUES ('7', 'HUAQUILLAS', '7', '3');
INSERT INTO "public"."cantones" VALUES ('7', 'RIOVERDE', '8', '1');
INSERT INTO "public"."cantones" VALUES ('7', 'DURÁN', '9', '2');
INSERT INTO "public"."cantones" VALUES ('8', 'SANTA ISABEL', '1', '3');
INSERT INTO "public"."cantones" VALUES ('8', 'MACARÁ', '11', '8');
INSERT INTO "public"."cantones" VALUES ('8', 'VÍNCES', '12', '2');
INSERT INTO "public"."cantones" VALUES ('8', 'MANTA', '13', '4');
INSERT INTO "public"."cantones" VALUES ('8', 'SAN JUAN BOSCO', '14', '9');
INSERT INTO "public"."cantones" VALUES ('8', 'PEDRO VICENTE MALDONADO', '17', '1');
INSERT INTO "public"."cantones" VALUES ('8', 'SANTIAGO DE PÍLLARO', '18', '7');
INSERT INTO "public"."cantones" VALUES ('8', 'PALANDA', '19', '9');
INSERT INTO "public"."cantones" VALUES ('8', 'PALLATANGA', '6', '2');
INSERT INTO "public"."cantones" VALUES ('8', 'MARCABELÍ', '7', '8');
INSERT INTO "public"."cantones" VALUES ('8', 'LA CONCORDIA', '8', '1');
INSERT INTO "public"."cantones" VALUES ('8', 'EL EMPALME', '9', '2');
INSERT INTO "public"."cantones" VALUES ('9', 'SIGSIG', '1', '9');
INSERT INTO "public"."cantones" VALUES ('9', 'PALTAS', '11', '8');
INSERT INTO "public"."cantones" VALUES ('9', 'PALENQUE', '12', '2');
INSERT INTO "public"."cantones" VALUES ('9', 'MONTECRISTI', '13', '4');
INSERT INTO "public"."cantones" VALUES ('9', 'TAISHA', '14', '9');
INSERT INTO "public"."cantones" VALUES ('9', 'CARLOS JULIO AROSEMENA TOLA', '15', '6');
INSERT INTO "public"."cantones" VALUES ('9', 'PUERTO QUITO', '17', '1');
INSERT INTO "public"."cantones" VALUES ('9', 'TISALEO', '18', '7');
INSERT INTO "public"."cantones" VALUES ('9', 'PAQUISHA', '19', '9');
INSERT INTO "public"."cantones" VALUES ('9', 'PENIPE', '6', '7');
INSERT INTO "public"."cantones" VALUES ('9', 'PASAJE', '7', '3');
INSERT INTO "public"."cantones" VALUES ('9', 'EL TRIUNFO', '9', '2');

-- ----------------------------
-- Table structure for "public"."centro_atencion_ciudadano"
-- ----------------------------
DROP TABLE "public"."centro_atencion_ciudadano";
CREATE TABLE "public"."centro_atencion_ciudadano" (
"cod_centro_atencion_ciudadano" numeric NOT NULL,
"nom_centro_atencion_ciudadano" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."centro_atencion_ciudadano" IS 'Centro de atencion al ciudadano';
COMMENT ON COLUMN "public"."centro_atencion_ciudadano"."cod_centro_atencion_ciudadano" IS 'código del centro de atención al ciudadano';
COMMENT ON COLUMN "public"."centro_atencion_ciudadano"."nom_centro_atencion_ciudadano" IS 'Descripción del centro de atención al ciudadano';

-- ----------------------------
-- Records of centro_atencion_ciudadano
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."demarcaciones"
-- ----------------------------
DROP TABLE "public"."demarcaciones";
CREATE TABLE "public"."demarcaciones" (
"id_demarcacion" numeric NOT NULL,
"cod_demarcacion" varchar(4) NOT NULL,
"nombre_demarcacion" varchar(20) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of demarcaciones
-- ----------------------------
INSERT INTO "public"."demarcaciones" VALUES ('1', 'DHES', 'ESMERALDAS');
INSERT INTO "public"."demarcaciones" VALUES ('2', 'DHGU', 'GUAYAS');
INSERT INTO "public"."demarcaciones" VALUES ('3', 'DHJU', 'JUBONES');
INSERT INTO "public"."demarcaciones" VALUES ('4', 'DHMA', 'MANABI');
INSERT INTO "public"."demarcaciones" VALUES ('5', 'DHMI', 'MIRA');
INSERT INTO "public"."demarcaciones" VALUES ('6', 'DHNA', 'NAPO');
INSERT INTO "public"."demarcaciones" VALUES ('7', 'DHPA', 'PASTAZA');
INSERT INTO "public"."demarcaciones" VALUES ('8', 'DHPC', 'PUYANGO-CATAMAYO');
INSERT INTO "public"."demarcaciones" VALUES ('9', 'DHSA', 'SANTIAGO');

-- ----------------------------
-- Table structure for "public"."entidades"
-- ----------------------------
DROP TABLE "public"."entidades";
CREATE TABLE "public"."entidades" (
"id_entidad" varchar(10) NOT NULL,
"nombre_entidad" varchar(100) NOT NULL,
"cod_canton" varchar(4),
"cod_canton_p" varchar(4),
"cod_provincia" varchar(4),
"cod_provincia_p" varchar(4),
"cod_parroquia" varchar(4),
"id_tipo_entidad" numeric
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of entidades
-- ----------------------------
INSERT INTO "public"."entidades" VALUES ('1', 'entidad1', '1', '1', '1', '1', '2', '2');
INSERT INTO "public"."entidades" VALUES ('2', 'entidad2', '1', null, '1', null, '2', '2');
INSERT INTO "public"."entidades" VALUES ('3', 'entidad3', '2', '13', '7', '1', '52', '2');

-- ----------------------------
-- Table structure for "public"."fd_adm_estado"
-- ----------------------------
DROP TABLE "public"."fd_adm_estado";
CREATE TABLE "public"."fd_adm_estado" (
"id_adm_estado" int4 NOT NULL,
"nom_adm_estado" varchar(50) NOT NULL,
"cod_rol" varchar(10),
"id_modulo" int4,
"p_actualizar" varchar(1),
"p_crear" varchar(1),
"p_borrar" varchar(1),
"p_ejecutar" varchar(1)
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_adm_estado" IS 'Estados adminsitrativos de los formatos,  definidos por  modulo e indican lo que puede hacer el usuario';
COMMENT ON COLUMN "public"."fd_adm_estado"."id_adm_estado" IS 'Identificador del estado administrativo';
COMMENT ON COLUMN "public"."fd_adm_estado"."nom_adm_estado" IS 'descripción del estado administrativo';
COMMENT ON COLUMN "public"."fd_adm_estado"."cod_rol" IS 'Rol asignado al estado indicando que acciones puede realziar el rol';
COMMENT ON COLUMN "public"."fd_adm_estado"."id_modulo" IS 'Módulo del estado adminsitrativo';
COMMENT ON COLUMN "public"."fd_adm_estado"."p_actualizar" IS 'Se indica por el rol asignado si puede actualizar la información del formato en el momento que el usuario tiene el rol y el formato está en el estado indicado.';
COMMENT ON COLUMN "public"."fd_adm_estado"."p_crear" IS 'Se indica por el rol asignado si puede crear la información del formato en el momento que el usuario tiene el rol y el formato está en el estado indicado.';
COMMENT ON COLUMN "public"."fd_adm_estado"."p_borrar" IS 'Se indica por el rol asignado si puede borrar la información del formato en el momento que el usuario tiene el rol y el formato está en el estado indicado.';
COMMENT ON COLUMN "public"."fd_adm_estado"."p_ejecutar" IS 'Se indica por el rol asignado si puede ejecutar acciones con la información del formato en el momento que el usuario tiene el rol y el formato está en el estado indicado.';

-- ----------------------------
-- Records of fd_adm_estado
-- ----------------------------
INSERT INTO "public"."fd_adm_estado" VALUES ('1', 'estado1', '1', '1', null, null, null, null);

-- ----------------------------
-- Table structure for "public"."fd_agrupacion"
-- ----------------------------
DROP TABLE "public"."fd_agrupacion";
CREATE TABLE "public"."fd_agrupacion" (
"id_agrupacion" int4 NOT NULL,
"nom_agrupacion" varchar(500) NOT NULL,
"id_tagrupacion" int4,
"num_col" int4,
"num_row" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_agrupacion" IS 'Agrupaciones que se tipificadas en el sistema, elemento que ayuda para agrupar las preguntas con su correspondiente tipo';
COMMENT ON COLUMN "public"."fd_agrupacion"."id_agrupacion" IS 'Identificación de la agrupación';
COMMENT ON COLUMN "public"."fd_agrupacion"."nom_agrupacion" IS 'Nombre de la agrupación';
COMMENT ON COLUMN "public"."fd_agrupacion"."id_tagrupacion" IS 'tipo de agrupación';
COMMENT ON COLUMN "public"."fd_agrupacion"."num_col" IS 'Numero de columnas que acupara la descripcion de la agrupacion al momento de pintar el HTML';
COMMENT ON COLUMN "public"."fd_agrupacion"."num_row" IS 'Numero de filas que ocupara la descripción de la agrupación al momento de pintar el HTML.';

-- ----------------------------
-- Records of fd_agrupacion
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_capitulo"
-- ----------------------------
DROP TABLE "public"."fd_capitulo";
CREATE TABLE "public"."fd_capitulo" (
"id_capitulo" int4 NOT NULL,
"nom_capitulo" varchar(500) NOT NULL,
"orden" int4 NOT NULL,
"url" varchar(500),
"consulta" varchar(2000),
"id_tview_cap" int4,
"id_tcapitulo" int4,
"icono" varchar(1000),
"id_conjunto_pregunta" numeric,
"id_comando" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_capitulo" IS 'Tabla referencial de los capitulos de cada formato';
COMMENT ON COLUMN "public"."fd_capitulo"."id_capitulo" IS 'Identificador del capitulo';
COMMENT ON COLUMN "public"."fd_capitulo"."nom_capitulo" IS 'Descripción del capitulo ';
COMMENT ON COLUMN "public"."fd_capitulo"."orden" IS 'Orden del capítulo en el formato';
COMMENT ON COLUMN "public"."fd_capitulo"."url" IS 'URL - dirección de internet, se usa para identificar capítulos de páginas personalizadas, ejemplos de paginas personalidalizada son ubicacion, coordenadas, datos basicos';
COMMENT ON COLUMN "public"."fd_capitulo"."consulta" IS 'SQL de una consulta para mostrar información o resumenes ';
COMMENT ON COLUMN "public"."fd_capitulo"."id_tview_cap" IS 'Tipo de vista del capitulo ';
COMMENT ON COLUMN "public"."fd_capitulo"."id_tcapitulo" IS 'Clasificacion del capitulo, que puede ser preguntas, pagina personalizada, consulta';
COMMENT ON COLUMN "public"."fd_capitulo"."icono" IS 'Icono empleado para identificar el capitulo visualmente en la pahina html';
COMMENT ON COLUMN "public"."fd_capitulo"."id_conjunto_pregunta" IS 'Conjunto de pregunta al cual pertenece el capitulo e identifica el formato';
COMMENT ON COLUMN "public"."fd_capitulo"."id_comando" IS 'Comando que se  ejecuta cuando se da clic al capitulo desde la pantalla de html';

-- ----------------------------
-- Records of fd_capitulo
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_clasificacion"
-- ----------------------------
DROP TABLE "public"."fd_clasificacion";
CREATE TABLE "public"."fd_clasificacion" (
"id_clasificacion" numeric NOT NULL,
"nom_clasificacion" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_clasificacion" IS 'Tabla para clasificar o caracterizar el tipo de informacion que implica cada pregunta, se puede emplear para identificar alguna caracteristica de una pregunta y que comportamiento debe tener.';
COMMENT ON COLUMN "public"."fd_clasificacion"."id_clasificacion" IS 'Identificación de la clasificación';
COMMENT ON COLUMN "public"."fd_clasificacion"."nom_clasificacion" IS 'Descripción de la clasificación';

-- ----------------------------
-- Records of fd_clasificacion
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_clasificacion_pregunta"
-- ----------------------------
DROP TABLE "public"."fd_clasificacion_pregunta";
CREATE TABLE "public"."fd_clasificacion_pregunta" (
"valor" varchar(50),
"id_clasificacion" numeric,
"id_pregunta" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_clasificacion_pregunta" IS 'Clasifica la pregunta dandole una caracterisica que puede ser empleada para asignar un valor o comportameinto dentro del aplicatico';
COMMENT ON COLUMN "public"."fd_clasificacion_pregunta"."valor" IS 'valor asignado a la pregunta conforme la clasificación asignada';
COMMENT ON COLUMN "public"."fd_clasificacion_pregunta"."id_clasificacion" IS 'clasificacion asignada a la pregunta';
COMMENT ON COLUMN "public"."fd_clasificacion_pregunta"."id_pregunta" IS 'pregunta que se va a clasificar';

-- ----------------------------
-- Records of fd_clasificacion_pregunta
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_comando_pregunta"
-- ----------------------------
DROP TABLE "public"."fd_comando_pregunta";
CREATE TABLE "public"."fd_comando_pregunta" (
"estado" varchar(50) NOT NULL,
"id_comando" numeric,
"id_pregunta" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_comando_pregunta" IS 'Lista de preguntas que tiene asociado un comando, que son ejecutados al responder una pregunta de un formato y poder realizar validaciones o ejecutar procedimientos que estan relaciondos con la respuesta de la pregunta ';
COMMENT ON COLUMN "public"."fd_comando_pregunta"."estado" IS 'Estado del comando para la pregunta A- ACTIVO I- INACTIVO';
COMMENT ON COLUMN "public"."fd_comando_pregunta"."id_comando" IS 'coamndo que se debe ejecutar al responder la pregunta';
COMMENT ON COLUMN "public"."fd_comando_pregunta"."id_pregunta" IS 'pregunta que tiene que ejecutar el comando ';

-- ----------------------------
-- Records of fd_comando_pregunta
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_conjunto_pregunta"
-- ----------------------------
DROP TABLE "public"."fd_conjunto_pregunta";
CREATE TABLE "public"."fd_conjunto_pregunta" (
"id_conjunto_pregunta" numeric NOT NULL,
"id_formato" int4,
"id_version" int4,
"id_tipo_view_formato" int4,
"cod_rol" varchar(10)
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_conjunto_pregunta" IS 'Agrupacion utilizada para identificar los formatos, capitulos preguntas y version que tiene cada formato ';
COMMENT ON COLUMN "public"."fd_conjunto_pregunta"."id_conjunto_pregunta" IS 'identificardor del conjunto de preguntas';
COMMENT ON COLUMN "public"."fd_conjunto_pregunta"."id_formato" IS 'formato el cual se esta tipificando';
COMMENT ON COLUMN "public"."fd_conjunto_pregunta"."id_version" IS 'version del formato que se tipifica';
COMMENT ON COLUMN "public"."fd_conjunto_pregunta"."id_tipo_view_formato" IS 'tipo de vista en la version del formato ';
COMMENT ON COLUMN "public"."fd_conjunto_pregunta"."cod_rol" IS 'rol que puede crear el formato, cuando aplique';

-- ----------------------------
-- Records of fd_conjunto_pregunta
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_conjunto_respuesta"
-- ----------------------------
DROP TABLE "public"."fd_conjunto_respuesta";
CREATE TABLE "public"."fd_conjunto_respuesta" (
"id_conjunto_respuesta" numeric NOT NULL,
"id_conjunto_pregunta" numeric,
"id_entidad" varchar(10),
"id_formato" int4,
"ult_id_adm_estado" int4,
"id_periodo" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_conjunto_respuesta" IS 'Formato que el usuario ha respondido o esta en proceso de diligenciamiento, a esto en el sistema se llamaó el conjunto de respuestas ';
COMMENT ON COLUMN "public"."fd_conjunto_respuesta"."id_conjunto_respuesta" IS 'Consecutivo identificador del conjunto de respuestas';
COMMENT ON COLUMN "public"."fd_conjunto_respuesta"."id_conjunto_pregunta" IS 'Conjunto de respuestas que se responde';
COMMENT ON COLUMN "public"."fd_conjunto_respuesta"."id_entidad" IS 'Entidad responsable del formato';
COMMENT ON COLUMN "public"."fd_conjunto_respuesta"."id_formato" IS 'Formato al cual pertenece el conjunto de preguntas ';
COMMENT ON COLUMN "public"."fd_conjunto_respuesta"."ult_id_adm_estado" IS 'Estado actual del formato';
COMMENT ON COLUMN "public"."fd_conjunto_respuesta"."id_periodo" IS 'Periodo al cual pertence el conjunto de respuesta conforme el formato';

-- ----------------------------
-- Records of fd_conjunto_respuesta
-- ----------------------------
INSERT INTO "public"."fd_conjunto_respuesta" VALUES ('1', null, '1', '1', '1', '1');

-- ----------------------------
-- Table structure for "public"."fd_coordenada"
-- ----------------------------
DROP TABLE "public"."fd_coordenada";
CREATE TABLE "public"."fd_coordenada" (
"id_coordenada" numeric NOT NULL,
"x" numeric(22,12),
"y" numeric(22,12),
"altura" numeric(22,12),
"longitud" numeric(22,12),
"latitud" numeric(22,12),
"id_tcoordenada" int4,
"id_conjunto_respuesta" numeric,
"id_pregunta" numeric,
"id_respuesta" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_coordenada" IS 'Tabla que almacena las respuesta que son de tipo coordendas para las preguntas donde se quiere conocer las coordenas';
COMMENT ON COLUMN "public"."fd_coordenada"."id_coordenada" IS 'Identificador de la coordenada';
COMMENT ON COLUMN "public"."fd_coordenada"."x" IS 'coordenada X en el formato decimal';
COMMENT ON COLUMN "public"."fd_coordenada"."y" IS 'coordenada Y en el formato decimal';
COMMENT ON COLUMN "public"."fd_coordenada"."altura" IS 'Altura donde se toma la coordenada ';
COMMENT ON COLUMN "public"."fd_coordenada"."longitud" IS 'latitud en el formato decimal';
COMMENT ON COLUMN "public"."fd_coordenada"."latitud" IS 'Longitud  en el formato decimal';
COMMENT ON COLUMN "public"."fd_coordenada"."id_tcoordenada" IS 'Tipo de coordenada';
COMMENT ON COLUMN "public"."fd_coordenada"."id_conjunto_respuesta" IS 'Conjunto de respuesta a la cual pertence las coordenadas';
COMMENT ON COLUMN "public"."fd_coordenada"."id_pregunta" IS 'Pregunta que se esta respondiendo para la coordenada';
COMMENT ON COLUMN "public"."fd_coordenada"."id_respuesta" IS 'Respuesta a la pregunta del formato';

-- ----------------------------
-- Records of fd_coordenada
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_datos_generales"
-- ----------------------------
DROP TABLE "public"."fd_datos_generales";
CREATE TABLE "public"."fd_datos_generales" (
"id_datos_generales" numeric NOT NULL,
"nombres" varchar(1000),
"num_documento" numeric,
"num_convencional" numeric,
"correo_electronico" varchar(500),
"num_celular" numeric,
"direccion" varchar(1000),
"descripcion_trabajo" varchar(1000),
"nombres_apellidos_replegal" varchar(1000),
"id_tdocumento" numeric,
"id_natu_juridica" int4,
"id_conjunto_respuesta" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_datos_generales" IS 'Tabla para identificar los datos generales de las entidades que reportan la información ';
COMMENT ON COLUMN "public"."fd_datos_generales"."id_datos_generales" IS 'Identificador de los datos generales';
COMMENT ON COLUMN "public"."fd_datos_generales"."nombres" IS 'Nombres y apellidos o nombre de la empresa que reporta el formato';
COMMENT ON COLUMN "public"."fd_datos_generales"."num_documento" IS 'Numero de documento de la persona o empresa';
COMMENT ON COLUMN "public"."fd_datos_generales"."num_convencional" IS 'Numero de telefono convencional ';
COMMENT ON COLUMN "public"."fd_datos_generales"."correo_electronico" IS 'Correo electronico de contato de la persona o empresa';
COMMENT ON COLUMN "public"."fd_datos_generales"."num_celular" IS 'Numero de celular de contacto';
COMMENT ON COLUMN "public"."fd_datos_generales"."direccion" IS 'Dirección de la empresa o persona';
COMMENT ON COLUMN "public"."fd_datos_generales"."descripcion_trabajo" IS 'Descripción del trabajo que realiza la empresa o persona';
COMMENT ON COLUMN "public"."fd_datos_generales"."nombres_apellidos_replegal" IS 'para las empresas el nombre y apellidos del representante legal';
COMMENT ON COLUMN "public"."fd_datos_generales"."id_tdocumento" IS 'Tipo de documento de la persona o empresa';
COMMENT ON COLUMN "public"."fd_datos_generales"."id_natu_juridica" IS 'Naturaleza de la empresa';
COMMENT ON COLUMN "public"."fd_datos_generales"."id_conjunto_respuesta" IS 'conjunto de repuestas al cual pertenece los datos generales';

-- ----------------------------
-- Records of fd_datos_generales
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_elemento_condicion"
-- ----------------------------
DROP TABLE "public"."fd_elemento_condicion";
CREATE TABLE "public"."fd_elemento_condicion" (
"valor" varchar(50),
"operacion" varchar(1),
"id_condicion" numeric NOT NULL,
"id_tcondicion" int4,
"id_pregunta_habilitadora" numeric,
"id_pregunta_condicionada" numeric,
"id_capitulo_condicionado" int4,
"id_adm_estado" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_elemento_condicion" IS 'Elemento condicionado que puede ser una pregunta o un capitulo, el cual es condicionado por una pregunta si esta diligenciado el campo pregunta habilitadora o por un estado del formato. el tipo de condición dica el comportameinto que se debe tener en cuenta. si es un tipo de condición de habilitar campo se procede a habilitar la pregunta o el capitulo que esta condicionado, por otro lado, si es de tipo validación  se dará en el momento de guardar la pregunta y verificará que se cumpla la condición.';
COMMENT ON COLUMN "public"."fd_elemento_condicion"."valor" IS 'Valor empleado para habilitar el campo cuando la condición  del valor de la pregunta habilitadora se cumple, por otro lado si se quiere que un pregunta tenga un validacion especifica, se indica el valor que la pregunta condicionada cumpla';
COMMENT ON COLUMN "public"."fd_elemento_condicion"."operacion" IS 'Operacion empleada para ejecutar la validacion con el valor que habilita el campo cuando la condición  del valor de la pregunta habilitadora se cumpla, por otro lado si se quiere que un pregunta tenga un validacion especifica, se indica la operacion con el valor que la pregunta condicionada deberia cumplir';
COMMENT ON COLUMN "public"."fd_elemento_condicion"."id_condicion" IS 'Identificación de la condición';
COMMENT ON COLUMN "public"."fd_elemento_condicion"."id_tcondicion" IS 'Tipo de condición, habilitadora o validación ';
COMMENT ON COLUMN "public"."fd_elemento_condicion"."id_pregunta_habilitadora" IS 'Pregunta que se emplea para habilitar otra pregunta o capitulo cuando el tipo de pregunta es habilitadora, si es tipo de validacion se emplara para aplicar la operación del valor de la pregunta habilitadora(validadora) con el valor de la pregunta condicionada ';
COMMENT ON COLUMN "public"."fd_elemento_condicion"."id_pregunta_condicionada" IS 'Pregunta que se emplea para ser habilitada  cuando se cumple la operación y valor de la preguna habilitadora, tambien es la pregunta que se valida con la pregunta validadora';
COMMENT ON COLUMN "public"."fd_elemento_condicion"."id_capitulo_condicionado" IS 'Capitulo que se emplea para ser habilitado  cuando se cumple la operación y valor de la preguna habilitadora.';
COMMENT ON COLUMN "public"."fd_elemento_condicion"."id_adm_estado" IS 'estado que se emplea pra determina si una pregunta o capitulo se muestra cuando el valor y la operacion se cumpla, por ejemplo una pregunta o capitulo se mostrara cuando el valor sea igual al valor de un estado especifico';

-- ----------------------------
-- Records of fd_elemento_condicion
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_formato"
-- ----------------------------
DROP TABLE "public"."fd_formato";
CREATE TABLE "public"."fd_formato" (
"id_formato" int4 NOT NULL,
"nom_formato" varchar(50),
"num_formato" varchar(50),
"id_tipo_view_formato" int4,
"id_modulo" int4,
"ult_id_version" int4,
"cod_rol" varchar(10),
"numeracion" varchar(1)
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_formato" IS 'Conjunto de formatos que existen, y se identifica cuál versión del formato es la vigente, algunos ejemplos son Formato de Tarifario Formato de renovaciones  Formato de autocontrol RH Formato de Agua potable Anexo 1 Formato de Recursos Hídricos  Formato de Riego Y Drenaje Formato CDA Formato de autocontrol RD ';
COMMENT ON COLUMN "public"."fd_formato"."id_formato" IS 'Identificacion del formato';
COMMENT ON COLUMN "public"."fd_formato"."nom_formato" IS 'Nombre del formato';
COMMENT ON COLUMN "public"."fd_formato"."num_formato" IS 'Número que identifica el formato en la organización';
COMMENT ON COLUMN "public"."fd_formato"."id_tipo_view_formato" IS 'tipo de vista del fortamo se utiliza para determinar como es el comportameinto del formato cuando es seleccionado';
COMMENT ON COLUMN "public"."fd_formato"."id_modulo" IS 'módulo del sistema al cual pertenece el formato';
COMMENT ON COLUMN "public"."fd_formato"."ult_id_version" IS 'Version actual en la que va el formato se emplea para seleccionar el conjunto de preguntas aplicables al formato';
COMMENT ON COLUMN "public"."fd_formato"."cod_rol" IS 'Rol que puede crear el formato, si el formato tiene la opción de crear el formato';
COMMENT ON COLUMN "public"."fd_formato"."numeracion" IS 'Este campo indica si el formato es numerado si es ta en S se numeran los capitulos y las preguntas la cual es construida en tiempo de consulta por el orden de los capitulos y preguntas, S - si N-no';

-- ----------------------------
-- Records of fd_formato
-- ----------------------------
INSERT INTO "public"."fd_formato" VALUES ('1', 'PRUEBAFORMATO', '1', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for "public"."fd_historico_respuesta"
-- ----------------------------
DROP TABLE "public"."fd_historico_respuesta";
CREATE TABLE "public"."fd_historico_respuesta" (
"id_historico_respuesta" numeric NOT NULL,
"observaciones" varchar(1000),
"fecha" date,
"usuario" varchar(50),
"id_conjunto_respuesta" numeric,
"id_adm_estado" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_historico_respuesta" IS 'Historico de los estados que ha tenido los conjuntos de respuestas, esta tabla debe contener todos los estados en los que ha estado el formato (conjunto de respuestas)';
COMMENT ON COLUMN "public"."fd_historico_respuesta"."id_historico_respuesta" IS 'consecutivvo del historico del conjunto de respuesta';
COMMENT ON COLUMN "public"."fd_historico_respuesta"."observaciones" IS 'Observaciones del cambio de estado del conjunto de respuestas';
COMMENT ON COLUMN "public"."fd_historico_respuesta"."fecha" IS 'Fecha del cambio de estado del conjunto de respuestas';
COMMENT ON COLUMN "public"."fd_historico_respuesta"."usuario" IS 'Usuario del cambio de estado del conjunto de respuestas';
COMMENT ON COLUMN "public"."fd_historico_respuesta"."id_conjunto_respuesta" IS 'Conjunto de respuesta al que se indica el estado';
COMMENT ON COLUMN "public"."fd_historico_respuesta"."id_adm_estado" IS 'Estado administrativo del formato';

-- ----------------------------
-- Records of fd_historico_respuesta
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_involucrado"
-- ----------------------------
DROP TABLE "public"."fd_involucrado";
CREATE TABLE "public"."fd_involucrado" (
"id_involucrado" numeric NOT NULL,
"nombre" varchar(50),
"telefono_convencional" numeric,
"celular" numeric,
"correo_electronico" varchar(50),
"id_conjunto_respuesta" numeric,
"id_pregunta" numeric,
"id_respuesta" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_involucrado" IS 'Tabla personalizada para almacenar los involucrados en el formato ';
COMMENT ON COLUMN "public"."fd_involucrado"."id_involucrado" IS 'Identificador del Involucrado';
COMMENT ON COLUMN "public"."fd_involucrado"."nombre" IS 'nombre y apellidos del involucrado';
COMMENT ON COLUMN "public"."fd_involucrado"."telefono_convencional" IS 'numero de telefono convencional';
COMMENT ON COLUMN "public"."fd_involucrado"."celular" IS 'Numero de Celular de involucrado';
COMMENT ON COLUMN "public"."fd_involucrado"."correo_electronico" IS 'Correo Electronico del involucrado';
COMMENT ON COLUMN "public"."fd_involucrado"."id_conjunto_respuesta" IS 'Conjunto de respuesta al cual pertenece el involucrado';
COMMENT ON COLUMN "public"."fd_involucrado"."id_pregunta" IS 'Ientificador de la pregunta que se esta respondiendo del involucrado';

-- ----------------------------
-- Records of fd_involucrado
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_modulo"
-- ----------------------------
DROP TABLE "public"."fd_modulo";
CREATE TABLE "public"."fd_modulo" (
"id_modulo" int4 NOT NULL,
"nom_modulo" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_modulo" IS 'Contiene los modulos del sistema los cuales son recursos hidricos, riego y drenaje y agua potable y saneamiento, ayuda a clasificar los formatos';
COMMENT ON COLUMN "public"."fd_modulo"."id_modulo" IS 'Identificador del Modulo';
COMMENT ON COLUMN "public"."fd_modulo"."nom_modulo" IS 'Nombre del modulo ';

-- ----------------------------
-- Records of fd_modulo
-- ----------------------------
INSERT INTO "public"."fd_modulo" VALUES ('1', 'MODULO1');

-- ----------------------------
-- Table structure for "public"."fd_opcion_select"
-- ----------------------------
DROP TABLE "public"."fd_opcion_select";
CREATE TABLE "public"."fd_opcion_select" (
"id_opcion_select" int4 NOT NULL,
"nom_opcion_select" varchar(200) NOT NULL,
"orden" int4,
"id_tselect" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_opcion_select" IS 'Opciones posibles que tiene una agrupacion de seleccion esta opcion puede ir como repuesta unica en la tabla de respuestas o enls respuestas por mes';
COMMENT ON COLUMN "public"."fd_opcion_select"."id_opcion_select" IS 'Identificador de opcion';
COMMENT ON COLUMN "public"."fd_opcion_select"."nom_opcion_select" IS 'descripcion de la opcion';
COMMENT ON COLUMN "public"."fd_opcion_select"."orden" IS 'Orden de las opciones';
COMMENT ON COLUMN "public"."fd_opcion_select"."id_tselect" IS 'Selección a la cual pertenece las opciones';

-- ----------------------------
-- Records of fd_opcion_select
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_periodo_formato"
-- ----------------------------
DROP TABLE "public"."fd_periodo_formato";
CREATE TABLE "public"."fd_periodo_formato" (
"fecha_creacion" date,
"id_formato" int4 NOT NULL,
"id_periodo" int4 NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_periodo_formato" IS 'Lista los periodos en los cuales el formato puede ser reportado ';
COMMENT ON COLUMN "public"."fd_periodo_formato"."id_formato" IS 'Formato que se tipifica por periodo';
COMMENT ON COLUMN "public"."fd_periodo_formato"."id_periodo" IS 'Periodos que se establecen para el reporte del formato';

-- ----------------------------
-- Records of fd_periodo_formato
-- ----------------------------
INSERT INTO "public"."fd_periodo_formato" VALUES ('2017-07-08', '1', '1');

-- ----------------------------
-- Table structure for "public"."fd_pregunta"
-- ----------------------------
DROP TABLE "public"."fd_pregunta";
CREATE TABLE "public"."fd_pregunta" (
"id_pregunta" numeric NOT NULL,
"nom_pregunta" varchar(500) NOT NULL,
"ayuda_pregunta" varchar(1000),
"obligatorio" varchar(1) NOT NULL,
"max_largo" int4,
"min_largo" int4,
"max_date" date,
"min_date" date,
"orden" int4 NOT NULL,
"estado" varchar(1) NOT NULL,
"ini_fecha" date,
"fin_fecha" date,
"id_tpregunta" int4,
"id_capitulo" int4,
"id_seccion" int4,
"id_agrupacion" int4,
"id_tselect" int4,
"caracteristica_preg" varchar(1),
"id_conjunto_pregunta" numeric,
"visible" varchar(1),
"visible_desc_preg" varchar(1),
"num_col_label" int4,
"num_col_input" int4,
"stylecss" varchar(50),
"format" varchar(50),
"min_numeric" numeric(22,4),
"max_numeric" numeric(22,4)
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_pregunta" IS 'Lista de preguntas que tiene cada conjunto de preguntas para un formato y una versión, para cada pregunta se tipifica el tipo y su comportamiento que debe tener.';
COMMENT ON COLUMN "public"."fd_pregunta"."id_pregunta" IS 'Identificador de la pregunta';
COMMENT ON COLUMN "public"."fd_pregunta"."nom_pregunta" IS 'descripción de la pregunta';
COMMENT ON COLUMN "public"."fd_pregunta"."ayuda_pregunta" IS 'Ayuda de la pregunta, se describre el significado u objetivo de la pregunta, es una ayuda para el usuario en el momento de diligenciar';
COMMENT ON COLUMN "public"."fd_pregunta"."obligatorio" IS 'Indica si la pregunta es obligatoria';
COMMENT ON COLUMN "public"."fd_pregunta"."max_largo" IS 'Aplicia para preguntas de tipo texto para indicar la validacion de la longitud maxima del texto ';
COMMENT ON COLUMN "public"."fd_pregunta"."min_largo" IS 'Aplicia para preguntas de tipo texto para indicar la validación de la longitud minima longiud del texto ';
COMMENT ON COLUMN "public"."fd_pregunta"."max_date" IS 'Aplicia para preguntas de tipo fecha para indicar la validacion de la la maxima fecha, si tiene la palabra NOW significa que no puede crear un fecha posterior a la actual  ';
COMMENT ON COLUMN "public"."fd_pregunta"."min_date" IS 'Aplicia para preguntas de tipo fecha para indicar la validacion de la la minima fecha, que puede tener la pregunta, esto aplica para todos los formatos';
COMMENT ON COLUMN "public"."fd_pregunta"."orden" IS 'Orden en que deben de aparecer la preguntas ';
COMMENT ON COLUMN "public"."fd_pregunta"."estado" IS 'estado de la pregunta si esta activa o no  A- ACTIVO I- INACTIVO';
COMMENT ON COLUMN "public"."fd_pregunta"."ini_fecha" IS 'Fecha inicial donde la pregunta empieza a aparecer, cuando esta diligenciado este campo se usa para ser evaluado con la fecha de creacion del FD_CONJUNTO_PREGUNTAS para determinar si se muestra o no la pregunta, por ejemplo si la pregunta  1 tiene en el campo INI_FECHA 06/06/2017 esta pregunta solo aparecera para los formatos creados en el dia  06/06/2017  o posterior.';
COMMENT ON COLUMN "public"."fd_pregunta"."fin_fecha" IS 'Fecha final donde la pregunta termina de ser vigente, cuando está diligenciado este campo se usa para evaluar la fecha de creación del FD_CONJUNTO_PREGUNTAS para determinar si se muestra o no la pregunta, por ejemplo, si la pregunta  1 tiene en el campo FIN_FECHA 06/06/2017 está pregunta aparecera en los formatos hasta el día 06/06/2017  o posterior.';
COMMENT ON COLUMN "public"."fd_pregunta"."id_tpregunta" IS 'tipo de pregunta que determina el comportamiento de la pregunta indicando como el usuario procedera a interectula que puede ser reponder una pregunta o un boton para hacer una acción. Cuendo es un tipo de pregunta de repsuesta el tipo de pregunta indicará como se pedirá la informacion ny determinara como se mostrará es decir si es una fecha se pedira por un componente de fecha  y se mostrara con el formato DD/MM/YYYY';
COMMENT ON COLUMN "public"."fd_pregunta"."id_capitulo" IS 'Indica el capitulo al cual pertenece la pregunta se usa para agrupar las preugntas en los capitulos darle orden a las preguntas ';
COMMENT ON COLUMN "public"."fd_pregunta"."id_seccion" IS 'Sección a la cual pertenece la pregunta , se usa cuando los capitulos tienen diferentes secciones y se quiere hacer división de las preguntas por tema';
COMMENT ON COLUMN "public"."fd_pregunta"."id_agrupacion" IS 'Agrupación de las preguntas, para demarcar un grupo de preguntas y porder las responder por medio de un radio button';
COMMENT ON COLUMN "public"."fd_pregunta"."id_tselect" IS 'tipo de seleccion que tendra la preguntas este campo es usado para reponder preguntas de seleccion unica o seleccion multiple,  el indicar el tipo de seleccion y la pregunta ser de selección el sistema motrara un combo de seleccion, la opciones salen de la tabla de opciones.  ademas esta tabla tambien sirve para configurar las respuestas  e la tabla por mes cunado es una configuracion estandar';
COMMENT ON COLUMN "public"."fd_pregunta"."caracteristica_preg" IS 'Campo de caracterización de las preguntas y se usa para definir caracteristicas como si la pregunta es de respuesta simple o multiple S-SIMPLE M-MULTIPLE';
COMMENT ON COLUMN "public"."fd_pregunta"."id_conjunto_pregunta" IS 'conjunto de pregunta que agrupa el formato, la version y el modulo ';
COMMENT ON COLUMN "public"."fd_pregunta"."visible" IS 'campo  que indica si la pregunta es visible o no S-SI ,N-NO, se usaría este capo para preguntas que se reponden automaticamente que no deben de ser visibles pero dentro del formato tiene una funcion para validar o habilitar otros elementos';
COMMENT ON COLUMN "public"."fd_pregunta"."visible_desc_preg" IS 'cmpo para indiciar si la descripción de la pregunta se muestra o no S-SI , N-NO';
COMMENT ON COLUMN "public"."fd_pregunta"."num_col_label" IS 'Número de columnas de html que ocupara etiqueta del campo';
COMMENT ON COLUMN "public"."fd_pregunta"."num_col_input" IS 'Número de columnas de html que ocupara el campo de entrada';
COMMENT ON COLUMN "public"."fd_pregunta"."stylecss" IS 'Estulo que se debe aplicar a la celda de HTML para la etiqueta y el campo entrada';
COMMENT ON COLUMN "public"."fd_pregunta"."format" IS 'Formato que el campo debe tener, por ejemplo para un campo tipo fecha el formato puede ser dd/mm/yyyy, para un campo tipo númerico el formato puede ser ###.###,##';
COMMENT ON COLUMN "public"."fd_pregunta"."min_numeric" IS 'Aplicia para preguntas de tipo entero, decimal o moneda, para indicar la validacion del valor minimo que puede tener el campo, debe ser mayor al valor indicado en este campo';
COMMENT ON COLUMN "public"."fd_pregunta"."max_numeric" IS 'Aplicia para preguntas de tipo entero, decimal o moneda, para indicar la validacion del valor maximo que puede tener el campo, debe ser menor o igual al valor indicado en este campo';

-- ----------------------------
-- Records of fd_pregunta
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_pregunta_descendiente"
-- ----------------------------
DROP TABLE "public"."fd_pregunta_descendiente";
CREATE TABLE "public"."fd_pregunta_descendiente" (
"id_pregunta_padre" numeric,
"id_pregunta_descendiente" numeric,
"id_version_descendiente" int4,
"id_version_padre" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_pregunta_descendiente" IS 'Tabla para identificar si la pregunta desciende de otro pregunta, por ejemplo, si se tiene un formato con una preguntas y este a cambiado y se toma la decisión crear el formato en la version 2, entonces todas las preguntas del formato de la version 1 estarán en la columna ID_PREGUNTA_PADRE y ID_VERSION_PADRE las preguntas del formato versión 2 estaran en las columnas ID_PREGUNTA_DESCENDIENTE y ID_VERSION_DESCENDIENTE, por otro lado, si se duplica el formato de la version 2 y las preguntas que estaban en el formato version 1 se sigen manteniendo en las columnas de  la tabla ID_PREGUNTA_PADRE y ID_VERSION_PADRE contendra la infromacion del formato de la version 1 y para las preguntas del formato versión 3 estaran en las columnas ID_PREGUNTA_DESCENDIENTE y ID_VERSION_DESCENDIENTE ';
COMMENT ON COLUMN "public"."fd_pregunta_descendiente"."id_pregunta_padre" IS 'Pregunta padre de la cual se basaron la pregunta descendiente para crearse, esto significa que la pregunta se creo en el padre y continua en los descendientes';
COMMENT ON COLUMN "public"."fd_pregunta_descendiente"."id_pregunta_descendiente" IS 'La pregunta que  descendiente ';
COMMENT ON COLUMN "public"."fd_pregunta_descendiente"."id_version_descendiente" IS 'La version de la pregunta que  descendiente ';
COMMENT ON COLUMN "public"."fd_pregunta_descendiente"."id_version_padre" IS 'La version padre de la cual se basaron la pregunta descendiente para crearse, esto significa que la pregunta se creo en el padre y continua en los descendientes conforme la version ';

-- ----------------------------
-- Records of fd_pregunta_descendiente
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_respuesta"
-- ----------------------------
DROP TABLE "public"."fd_respuesta";
CREATE TABLE "public"."fd_respuesta" (
"id_respuesta" numeric NOT NULL,
"ra_fecha" date,
"ra_check" varchar(1),
"ra_descripcion" text,
"ra_entero" int4,
"ra_decimal" numeric(22,4),
"ra_porcentaje" numeric(16,4),
"id_conjunto_respuesta" numeric,
"ra_moneda" numeric(22,2),
"id_pregunta" numeric,
"id_opcion_select" int4,
"id_tpregunta" int4,
"id_capitulo" int4,
"id_formato" int4,
"id_conjunto_pregunta" numeric,
"id_version" int4,
"cantidad_registros" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_respuesta" IS 'Tabla que almacena las respuestas a las preguntas de un formato de una entidad ';
COMMENT ON COLUMN "public"."fd_respuesta"."id_respuesta" IS 'Identificador de la respuesta';
COMMENT ON COLUMN "public"."fd_respuesta"."ra_fecha" IS 'Campo que almacena las respuetas a las preguntas de tipo fecha';
COMMENT ON COLUMN "public"."fd_respuesta"."ra_check" IS 'Campo que almacena las respuetas a las preguntas de tipo casilla de chequeo';
COMMENT ON COLUMN "public"."fd_respuesta"."ra_descripcion" IS 'Campo que almacena las respuetas a las preguntas de tipo texto';
COMMENT ON COLUMN "public"."fd_respuesta"."ra_entero" IS 'Campo que almacena las respuetas a las preguntas de tipo entero';
COMMENT ON COLUMN "public"."fd_respuesta"."ra_decimal" IS 'Campo que almacena las respuetas a las preguntas de tipo decimal';
COMMENT ON COLUMN "public"."fd_respuesta"."ra_porcentaje" IS 'Campo que almacena las respuetas a las preguntas de tipo porcentaje';
COMMENT ON COLUMN "public"."fd_respuesta"."id_conjunto_respuesta" IS 'conjunto de respuesta a la cual pertenece la respuesta';
COMMENT ON COLUMN "public"."fd_respuesta"."ra_moneda" IS 'Campo que almacena las respuetas a las preguntas de tipo moneda';
COMMENT ON COLUMN "public"."fd_respuesta"."id_pregunta" IS 'pregunta que se esta respondiendo';
COMMENT ON COLUMN "public"."fd_respuesta"."id_opcion_select" IS 'Campo que almacena las respuetas a las preguntas de tipo selección, guardando la opción seleccionada ';
COMMENT ON COLUMN "public"."fd_respuesta"."id_tpregunta" IS 'Tipo de pregunta que se esta respondiendo';
COMMENT ON COLUMN "public"."fd_respuesta"."id_capitulo" IS 'Capitulo al cual pertence la respuesta';
COMMENT ON COLUMN "public"."fd_respuesta"."id_formato" IS 'Formto al cual pertenece la respuesta';
COMMENT ON COLUMN "public"."fd_respuesta"."id_conjunto_pregunta" IS 'Conjunto de pregunta al cual pertenece la respuesta';
COMMENT ON COLUMN "public"."fd_respuesta"."id_version" IS 'Version  del formato al cual pertence la respuesta';
COMMENT ON COLUMN "public"."fd_respuesta"."cantidad_registros" IS 'Indica la cantidad de registros que se ena ingresado en las tablas de las preguntas ';

-- ----------------------------
-- Records of fd_respuesta
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_respuesta_x_mes"
-- ----------------------------
DROP TABLE "public"."fd_respuesta_x_mes";
CREATE TABLE "public"."fd_respuesta_x_mes" (
"ene_decimal" numeric(22,2),
"feb_decimal" numeric(22,2),
"mar_decimal" numeric(22,2),
"abr_decimal" numeric(22,2),
"may_decimal" numeric(22,2),
"jun_decimal" numeric(22,2),
"jul_decimal" numeric(22,2),
"ago_decimal" numeric(22,2),
"sep_decimal" numeric(22,2),
"oct_decimal" numeric(22,2),
"nov_decimal" numeric(22,2),
"dic_decimal" numeric(22,2),
"id_respuesta" numeric,
"id_pregunta" numeric,
"descripcion" varchar(500),
"id_opcion_select" int4,
"id_respuesta_x_mes" numeric NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_respuesta_x_mes" IS 'Respuestas por mes, ayuda responder las preguntas que son mensualizadas';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."ene_decimal" IS 'Respuesa decinal de enero ';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."feb_decimal" IS 'Respuesa decinal de febrero';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."mar_decimal" IS 'Respuesa decinal de marzo';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."abr_decimal" IS 'Respuesa decinal de abril';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."may_decimal" IS 'Respuesa decinal de mayo';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."jun_decimal" IS 'Respuesa decinal de junio';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."jul_decimal" IS 'Respuesa decinal de julio';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."ago_decimal" IS 'Respuesa decinal de agosto';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."sep_decimal" IS 'Respuesa decinal de septiembre';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."oct_decimal" IS 'Respuesa decinal de octubre';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."nov_decimal" IS 'Respuesa decinal de noviembre';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."dic_decimal" IS 'Respuesa decinal de diciembre';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."id_respuesta" IS 'Identificador de respuesta a la cual pertenece';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."id_pregunta" IS 'Identificador de pregunta a la cual pertence';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."descripcion" IS 'descripcion ingresada por el usuario que tipifica los valores de los meses';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."id_opcion_select" IS 'Opcion ingresada por el usuario que tipifica los valores de los meses';
COMMENT ON COLUMN "public"."fd_respuesta_x_mes"."id_respuesta_x_mes" IS 'Identificador de la repuesta por mes';

-- ----------------------------
-- Records of fd_respuesta_x_mes
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_seccion"
-- ----------------------------
DROP TABLE "public"."fd_seccion";
CREATE TABLE "public"."fd_seccion" (
"id_seccion" int4 NOT NULL,
"nom_seccion" varchar(500) NOT NULL,
"orden" int4 NOT NULL,
"id_capitulo" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_seccion" IS 'Sección del capitulo del formato ayuda a realizar la agrupación de preguntas dentro de un capitulo de una forma ordenada y tipificada';
COMMENT ON COLUMN "public"."fd_seccion"."id_seccion" IS 'Identificador de la seccion ';
COMMENT ON COLUMN "public"."fd_seccion"."nom_seccion" IS 'Descripción de la sección';
COMMENT ON COLUMN "public"."fd_seccion"."orden" IS 'Oden de la seccion en el capitulo';
COMMENT ON COLUMN "public"."fd_seccion"."id_capitulo" IS 'Capitulo al cual pertence la sección';

-- ----------------------------
-- Records of fd_seccion
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_tipo_agrupacion"
-- ----------------------------
DROP TABLE "public"."fd_tipo_agrupacion";
CREATE TABLE "public"."fd_tipo_agrupacion" (
"id_tagrupacion" int4 NOT NULL,
"nom_tagrupacion" varchar(100) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_tipo_agrupacion" IS 'Tipo de agrupación de preguntas que puede ser selección única o selección multiple emplado principalmente para los radio boton o casillas de selección multiple ';
COMMENT ON COLUMN "public"."fd_tipo_agrupacion"."id_tagrupacion" IS 'Identificación del tipo de agrupación ';
COMMENT ON COLUMN "public"."fd_tipo_agrupacion"."nom_tagrupacion" IS 'Nombre del tipo de agrupación ';

-- ----------------------------
-- Records of fd_tipo_agrupacion
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_tipo_capitulo"
-- ----------------------------
DROP TABLE "public"."fd_tipo_capitulo";
CREATE TABLE "public"."fd_tipo_capitulo" (
"id_tcapitulo" int4 NOT NULL,
"nom_tcapitulo" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_tipo_capitulo" IS 'Clasifica los capitulos que contiene un formato, si es un capitulo de pregunta, una pagina independiente o un botón';
COMMENT ON COLUMN "public"."fd_tipo_capitulo"."id_tcapitulo" IS 'Identificador del tipo de  capitulo';
COMMENT ON COLUMN "public"."fd_tipo_capitulo"."nom_tcapitulo" IS 'Descipción del tipo de  capitulo';

-- ----------------------------
-- Records of fd_tipo_capitulo
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_tipo_condicion"
-- ----------------------------
DROP TABLE "public"."fd_tipo_condicion";
CREATE TABLE "public"."fd_tipo_condicion" (
"id_tcondicion" int4 NOT NULL,
"nom_tcondicion" varchar(100) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_tipo_condicion" IS 'tipo de condición que indica el compotamiento de la pregunta o del capítulo al ser condicionada';
COMMENT ON COLUMN "public"."fd_tipo_condicion"."id_tcondicion" IS 'Identificador del tipo de condicion';
COMMENT ON COLUMN "public"."fd_tipo_condicion"."nom_tcondicion" IS 'Descripción del tipo de condición';

-- ----------------------------
-- Records of fd_tipo_condicion
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_tipo_pregunta"
-- ----------------------------
DROP TABLE "public"."fd_tipo_pregunta";
CREATE TABLE "public"."fd_tipo_pregunta" (
"id_tpregunta" int4 NOT NULL,
"nom_tpregunta" varchar(50) NOT NULL,
"pantalla_lectura" varchar(1),
"url_subpantalla" varchar(50)
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_tipo_pregunta" IS 'Tipo de pregunta o componente, esta configuración se empleará para indicar que casilla de texto o elemento se usara por cada la pregunta, algunos ejemplo son: FECHA, CHECK, SELECT ONE, DESCRIPTION, ENTERO, DECIMAL, PORCENTAJE, MONEDA, DETALLE MENSUAL DECIMAL, BOTON, SOPORTE';
COMMENT ON COLUMN "public"."fd_tipo_pregunta"."id_tpregunta" IS 'Identificardor del tipo de pregunta';
COMMENT ON COLUMN "public"."fd_tipo_pregunta"."nom_tpregunta" IS 'Descipción del tipo de pregunta';
COMMENT ON COLUMN "public"."fd_tipo_pregunta"."pantalla_lectura" IS 'Indica si se muestra en la pantalla de lectura, por ejemplo el boton que ejecuta una accion no se bebe mostrar en la pantalla de lectura';
COMMENT ON COLUMN "public"."fd_tipo_pregunta"."url_subpantalla" IS 'Cuando un tipo de pregunta tiene un pantalla especifica se identifica la url que apoyara para diligecniar esta informacion , esto funciona para la respuesta detalle mensual decimal, que dirige a una pantalla para ingresar la información en la tabla FD_RESPUESTA_X_MES.';

-- ----------------------------
-- Records of fd_tipo_pregunta
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_tipo_select"
-- ----------------------------
DROP TABLE "public"."fd_tipo_select";
CREATE TABLE "public"."fd_tipo_select" (
"id_tselect" int4 NOT NULL,
"nom_tselect" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_tipo_select" IS 'Agrupación de tipos de selección usada para ser asignado a una pregunta que tiene el comportamiento de un combo  selección, un ejemplo es el tipo de seleccion si/no que contiene los valores si y no, puede tener varios uso para tipificar un conjunto de valores para una pregunta, ejemplo en la tabla de FD_RESPUESTAS_X_MES donde acuerdo a la pregunta se pueden clasificar varias preguntas';
COMMENT ON COLUMN "public"."fd_tipo_select"."id_tselect" IS 'identificacion del tipo de selección';
COMMENT ON COLUMN "public"."fd_tipo_select"."nom_tselect" IS 'Descripción del tipo de selección';

-- ----------------------------
-- Records of fd_tipo_select
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_tipo_view_cap"
-- ----------------------------
DROP TABLE "public"."fd_tipo_view_cap";
CREATE TABLE "public"."fd_tipo_view_cap" (
"id_tview_cap" int4 NOT NULL,
"nom_tview_cap" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_tipo_view_cap" IS 'Tipo de vista o configuración de colunmnas del capitulo 1,2 o 4 columnas ';
COMMENT ON COLUMN "public"."fd_tipo_view_cap"."id_tview_cap" IS 'identificar del tipo de vista';
COMMENT ON COLUMN "public"."fd_tipo_view_cap"."nom_tview_cap" IS 'Descripción del tipo de vistas del capítulo';

-- ----------------------------
-- Records of fd_tipo_view_cap
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_tipo_view_formato"
-- ----------------------------
DROP TABLE "public"."fd_tipo_view_formato";
CREATE TABLE "public"."fd_tipo_view_formato" (
"id_tipo_view_formato" int4 NOT NULL,
"nom_tipo_view_formato" varchar(500) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_tipo_view_formato" IS 'Información que ayuda a identificar como es el tipo de vista en la pagina del usuario del formato cuando se selecciona tipificando la forma se van a organizar los capitulos o preguntas';
COMMENT ON COLUMN "public"."fd_tipo_view_formato"."id_tipo_view_formato" IS 'identificación del tipo de vista del formato ';
COMMENT ON COLUMN "public"."fd_tipo_view_formato"."nom_tipo_view_formato" IS 'Nombre del tipo de vista del formato ';

-- ----------------------------
-- Records of fd_tipo_view_formato
-- ----------------------------
INSERT INTO "public"."fd_tipo_view_formato" VALUES ('1', 'PRUEBA2');

-- ----------------------------
-- Table structure for "public"."fd_ubicacion"
-- ----------------------------
DROP TABLE "public"."fd_ubicacion";
CREATE TABLE "public"."fd_ubicacion" (
"id_ubicacion" numeric NOT NULL,
"cod_parroquia" varchar(4),
"cod_canton" varchar(4),
"cod_provincia" varchar(4),
"id_demarcacion" numeric,
"cod_centro_atencion_ciudadano" numeric,
"descripcion_ubicacion" varchar(50),
"id_conjunto_respuesta" numeric,
"id_pregunta" numeric,
"id_respuesta" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_ubicacion" IS 'Estructura para almacenar la ubicación, la descripción de la ubicación va dada por la pregunta que indica el registro';
COMMENT ON COLUMN "public"."fd_ubicacion"."id_ubicacion" IS 'Identificador de la ubicación';
COMMENT ON COLUMN "public"."fd_ubicacion"."cod_parroquia" IS 'Parroquia ';
COMMENT ON COLUMN "public"."fd_ubicacion"."cod_canton" IS 'Canton';
COMMENT ON COLUMN "public"."fd_ubicacion"."cod_provincia" IS 'Provincia';
COMMENT ON COLUMN "public"."fd_ubicacion"."id_demarcacion" IS 'Demarcacion';
COMMENT ON COLUMN "public"."fd_ubicacion"."cod_centro_atencion_ciudadano" IS 'Centro de atención ciudadano';
COMMENT ON COLUMN "public"."fd_ubicacion"."descripcion_ubicacion" IS 'Descripción de la ubicación';

-- ----------------------------
-- Records of fd_ubicacion
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."fd_version"
-- ----------------------------
DROP TABLE "public"."fd_version";
CREATE TABLE "public"."fd_version" (
"id_version" int4 NOT NULL,
"desc_version" varchar(50) NOT NULL,
"num_version" varchar(50)
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."fd_version" IS 'Versiones de los formatos';
COMMENT ON COLUMN "public"."fd_version"."id_version" IS 'Identificador de la versión';
COMMENT ON COLUMN "public"."fd_version"."desc_version" IS 'Descripción de la versión';
COMMENT ON COLUMN "public"."fd_version"."num_version" IS 'Numero identificador de la version para el usuario';

-- ----------------------------
-- Records of fd_version
-- ----------------------------
INSERT INTO "public"."fd_version" VALUES ('1', 'version1', '1');

-- ----------------------------
-- Table structure for "public"."pagina"
-- ----------------------------
DROP TABLE "public"."pagina";
CREATE TABLE "public"."pagina" (
"id_pagina" numeric DEFAULT nextval('sq_paginas'::regclass) NOT NULL,
"nombre_pagina" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of pagina
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."parroquias"
-- ----------------------------
DROP TABLE "public"."parroquias";
CREATE TABLE "public"."parroquias" (
"cod_parroquia" varchar(4) NOT NULL,
"nombre_parroquia" varchar(100),
"cod_canton" varchar(4) NOT NULL,
"cod_provincia" varchar(4) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of parroquias
-- ----------------------------
INSERT INTO "public"."parroquias" VALUES ('﻿01', 'BELLAVISTA', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('1', 'CARANQUI', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('1', 'EL SAGRARIO', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('1', 'CLEMENTE BAQUERIZO', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('1', 'PORTOVIEJO', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('1', 'BELISARIO QUEVEDO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('1', 'ATOCHA – FICOA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('1', 'EL LIMÓN', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('1', 'ÁNGEL POLIBIO CHÁVES', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('1', 'ABRAHAM CALAZACÓN', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('1', 'BALLENITA', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('1', 'AURELIO BAYAS MARTÍNEZ', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('1', 'GONZÁLEZ SUÁREZ', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('1', 'ELOY ALFARO (SAN FELIPE)', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('1', 'LIZARZABURU', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('1', 'LA PROVIDENCIA', '1', '7');
INSERT INTO "public"."parroquias" VALUES ('1', 'BARTOLOMÉ RUIZ (CÉSAR FRANCO CARRIÓN)', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('1', 'AYACUCHO', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('1', 'SAN JACINTO DE BUENA FÉ', '10', '12');
INSERT INTO "public"."parroquias" VALUES ('1', 'LA MATRIZ', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('1', 'SANTA ROSA', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('1', 'SANTA ANA', '13', '13');
INSERT INTO "public"."parroquias" VALUES ('1', 'BAHÍA DE CARÁQUEZ', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('1', 'LA VICTORIA', '14', '7');
INSERT INTO "public"."parroquias" VALUES ('1', 'SAMBORONDÓN', '16', '9');
INSERT INTO "public"."parroquias" VALUES ('1', 'BOCANA', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('1', 'ANDRADE MARÍN (LOURDES)', '2', '10');
INSERT INTO "public"."parroquias" VALUES ('1', 'CARIAMANGA', '2', '11');
INSERT INTO "public"."parroquias" VALUES ('1', 'GUALAQUIZA', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('1', 'AYORA', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('1', 'TIPITINI', '2', '22');
INSERT INTO "public"."parroquias" VALUES ('1', 'EL CARMEN', '2', '5');
INSERT INTO "public"."parroquias" VALUES ('1', 'SAGRARIO', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('1', 'CATAMAYO', '3', '11');
INSERT INTO "public"."parroquias" VALUES ('1', 'CHONE', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('1', 'CARLOS ESPINOZA LARREA', '3', '24');
INSERT INTO "public"."parroquias" VALUES ('1', 'EL ÁNGEL', '3', '4');
INSERT INTO "public"."parroquias" VALUES ('1', 'CAJABAMBA', '3', '6');
INSERT INTO "public"."parroquias" VALUES ('1', 'JORDÁN', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('1', 'EL CARMEN', '4', '13');
INSERT INTO "public"."parroquias" VALUES ('1', 'QUEVEDO', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('1', 'SANGOLQUÍ', '5', '17');
INSERT INTO "public"."parroquias" VALUES ('1', 'GONZÁLEZ SUÁREZ', '5', '4');
INSERT INTO "public"."parroquias" VALUES ('1', 'DR. MIGUEL MORÁN LUCIO', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('1', 'DAULE', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('1', '10 DE NOVIEMBRE', '7', '12');
INSERT INTO "public"."parroquias" VALUES ('1', 'PELILEO', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('1', 'LAS MERCEDES', '7', '2');
INSERT INTO "public"."parroquias" VALUES ('1', 'EL ROSARIO', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('1', 'ECUADOR', '7', '7');
INSERT INTO "public"."parroquias" VALUES ('1', 'ELOY ALFARO (DURÁN)', '7', '9');
INSERT INTO "public"."parroquias" VALUES ('1', 'GENERAL ELOY ALFARO (SAN SEBASTIÁN)', '8', '11');
INSERT INTO "public"."parroquias" VALUES ('1', 'LOS ESTEROS', '8', '13');
INSERT INTO "public"."parroquias" VALUES ('1', 'CIUDAD NUEVA', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('1', 'CATACOCHA', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('1', 'ANIBAL SAN ANDRÉS', '9', '13');
INSERT INTO "public"."parroquias" VALUES ('1', 'BOLÍVAR', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('10', 'SAN BLAS', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('10', 'EL CONDADO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('10', 'ROCAFUERTE', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('10', 'VIVA ALFARO', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('11', 'SAN SEBASTIÁN', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('11', 'GUAMANÍ', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('11', 'SUCRE', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('12', 'SUCRE', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('12', 'IÑAQUITO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('12', 'TARQUI', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('13', 'TOTORACOCHA', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('13', 'ITCHIMBÍA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('13', 'URDANETA', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('14', 'YANUNCAY', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('14', 'JIPIJAPA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('14', 'XIMENA', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('15', 'HERMANO MIGUEL', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('15', 'KENNEDY', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('15', 'PASCUALES', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('16', 'LA ARGELIA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('17', 'LA CONCEPCIÓN', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('18', 'LA ECUATORIANA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('19', 'LA FERROVIARIA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('2', 'CAÑARIBAMBA', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('2', 'GUAYAQUIL DE ALPACHACA', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('2', 'SAN SEBASTIÁN', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('2', 'DR. CAMILO PONCE', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('2', '12 DE MARZO', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('2', 'CARCELÉN', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('2', 'CELIANO MONGE', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('2', 'ZAMORA', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('2', 'GABRIEL IGNACIO VEINTIMILLA', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('2', 'BOMBOLÍ', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('2', 'SANTA ELENA', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('2', 'AZOGUES', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('2', 'TULCÁN', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('2', 'IGNACIO FLORES (PARQUE FLORES)', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('2', 'MALDONADO', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('2', 'MACHALA', '1', '7');
INSERT INTO "public"."parroquias" VALUES ('2', '5 DE AGOSTO', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('2', 'BOLÍVAR (SAGRARIO)', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('2', '7 DE AGOSTO', '10', '12');
INSERT INTO "public"."parroquias" VALUES ('2', 'LA SUSAYA', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('2', 'PUERTO JELÍ', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('2', 'LODANA', '13', '13');
INSERT INTO "public"."parroquias" VALUES ('2', 'LEONIDAS PLAZA GUTIÉRREZ', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('2', 'PLATANILLOS', '14', '7');
INSERT INTO "public"."parroquias" VALUES ('2', 'LA PUNTILLA (SATÉLITE)', '16', '9');
INSERT INTO "public"."parroquias" VALUES ('2', 'CANDILEJOS', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('2', 'ATUNTAQUI', '2', '10');
INSERT INTO "public"."parroquias" VALUES ('2', 'CHILE', '2', '11');
INSERT INTO "public"."parroquias" VALUES ('2', 'MERCEDES MOLINA', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('2', 'CAYAMBE', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('2', 'LA MANÁ', '2', '5');
INSERT INTO "public"."parroquias" VALUES ('2', 'SAN FRANCISCO', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('2', 'SAN JOSÉ', '3', '11');
INSERT INTO "public"."parroquias" VALUES ('2', 'SANTA RITA', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('2', 'GRAL. ALBERTO ENRÍQUEZ GALLO', '3', '24');
INSERT INTO "public"."parroquias" VALUES ('2', '27 DE SEPTIEMBRE', '3', '4');
INSERT INTO "public"."parroquias" VALUES ('2', 'SICALPA', '3', '6');
INSERT INTO "public"."parroquias" VALUES ('2', 'SAN LUIS', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('2', '4 DE DICIEMBRE', '4', '13');
INSERT INTO "public"."parroquias" VALUES ('2', 'SAN CAMILO', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('2', 'SAN PEDRO DE TABOADA', '5', '17');
INSERT INTO "public"."parroquias" VALUES ('2', 'SAN JOSÉ', '5', '4');
INSERT INTO "public"."parroquias" VALUES ('2', 'MANUEL INOCENCIO PARRALES Y GUALE', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('2', 'LA AURORA (SATÉLITE)', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('2', 'PELILEO GRANDE', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('2', 'LAS NAVES', '7', '2');
INSERT INTO "public"."parroquias" VALUES ('2', 'LA MATRIZ', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('2', 'EL PARAÍSO', '7', '7');
INSERT INTO "public"."parroquias" VALUES ('2', 'EL RECREO', '7', '9');
INSERT INTO "public"."parroquias" VALUES ('2', 'MACARÁ (MANUEL ENRIQUE RENGEL SUQUILANDA)', '8', '11');
INSERT INTO "public"."parroquias" VALUES ('2', 'MANTA', '8', '13');
INSERT INTO "public"."parroquias" VALUES ('2', 'PÍLLARO', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('2', 'LOURDES', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('2', 'MONTECRISTI', '9', '13');
INSERT INTO "public"."parroquias" VALUES ('2', 'LOMA DE FRANCO', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('20', 'LA LIBERTAD', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('21', 'LA MAGDALENA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('22', 'LA MENA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('23', 'MARISCAL SUCRE', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('24', 'PONCEANO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('25', 'PUENGASÍ', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('26', 'QUITUMBE', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('27', 'RUMIPAMBA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('28', 'SAN BARTOLO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('29', 'SAN ISIDRO DEL INCA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('3', 'EL BATÁN', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('3', 'SAGRARIO', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('3', 'SUCRE', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('3', 'BARREIRO', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('3', 'COLÓN', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('3', 'CENTRO HISTÓRICO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('3', 'HUACHI CHICO', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('3', 'GUANUJO', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('3', 'CHIGUILPE', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('3', 'BORRERO', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('3', 'JUAN MONTALVO (SAN SEBASTIÁN)', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('3', 'VELASCO', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('3', 'PUERTO BOLÍVAR', '1', '7');
INSERT INTO "public"."parroquias" VALUES ('3', 'ESMERALDAS', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('3', 'CARBO (CONCEPCIÓN)', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('3', '11 DE OCTUBRE', '10', '12');
INSERT INTO "public"."parroquias" VALUES ('3', 'PIÑAS GRANDE', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('3', 'BALNEARIO JAMBELÍ (SATÉLITE)', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('3', 'VALLE HERMOSO', '14', '7');
INSERT INTO "public"."parroquias" VALUES ('3', 'CENTRAL', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('3', 'SAN VICENTE', '2', '11');
INSERT INTO "public"."parroquias" VALUES ('3', 'JUAN MONTALVO', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('3', 'EL TRIUNFO', '2', '5');
INSERT INTO "public"."parroquias" VALUES ('3', 'VICENTE ROCAFUERTE', '3', '24');
INSERT INTO "public"."parroquias" VALUES ('3', 'SAN JOSÉ', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('3', 'SAN RAFAEL', '5', '17');
INSERT INTO "public"."parroquias" VALUES ('3', 'SAN LORENZO DE JIPIJAPA', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('3', 'BANIFE', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('3', 'HUALTACO', '7', '7');
INSERT INTO "public"."parroquias" VALUES ('3', 'SAN MATEO', '8', '13');
INSERT INTO "public"."parroquias" VALUES ('3', 'EL COLORADO', '9', '13');
INSERT INTO "public"."parroquias" VALUES ('3', 'OCHOA LEÓN (MATRIZ)', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('30', 'SAN JUAN', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('31', 'SOLANDA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('32', 'TURUBAMBA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('4', 'EL SAGRARIO', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('4', 'SAN FRANCISCO', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('4', 'VALLE', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('4', 'EL SALTO', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('4', 'PICOAZÁ', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('4', 'COCHAPAMBA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('4', 'HUACHI LORETO', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('4', 'RÍO TOACHI', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('4', 'SAN FRANCISCO', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('4', 'LA MATRIZ', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('4', 'VELOZ', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('4', 'NUEVE DE MAYO', '1', '7');
INSERT INTO "public"."parroquias" VALUES ('4', 'LUIS TELLO (LAS PALMAS)', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('4', 'FEBRES CORDERO', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('4', 'JUMÓN (SATÉLITE)', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('4', 'PARAÍSO', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('4', 'SANTA ROSA', '3', '24');
INSERT INTO "public"."parroquias" VALUES ('4', 'GUAYACÁN', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('4', 'EMILIANO CAICEDO MARCOS', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('4', 'MILTON REYES', '7', '7');
INSERT INTO "public"."parroquias" VALUES ('4', 'TARQUI', '8', '13');
INSERT INTO "public"."parroquias" VALUES ('4', 'GENERAL ELOY ALFARO', '9', '13');
INSERT INTO "public"."parroquias" VALUES ('4', 'TRES CERRITOS', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('5', 'EL VECINO', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('5', 'LA DOLOROSA DEL PRIORATO', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('5', 'SAN PABLO', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('5', 'COMITÉ DEL PUEBLO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('5', 'LA MERCED', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('5', 'RÍO VERDE', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('5', 'SAN BUENAVENTURA', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('5', 'YARUQUÍES', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('5', 'EL CAMBIO', '1', '7');
INSERT INTO "public"."parroquias" VALUES ('5', 'SIMÓN PLATA TORRES', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('5', 'GARCÍA MORENO', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('5', 'NUEVO SANTA ROSA', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('5', 'SAN MATEO', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('5', 'NICOLÁS INFANTE DÍAZ', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('5', 'MAGRO', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('5', 'UNIÓN LOJANA', '7', '7');
INSERT INTO "public"."parroquias" VALUES ('5', 'ELOY ALFARO', '8', '13');
INSERT INTO "public"."parroquias" VALUES ('5', 'LEONIDAS PROAÑO', '9', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'CUENCA', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN MIGUEL DE IBARRA', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('50', 'LOJA', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'BABAHOYO', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'PORTOVIEJO', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'MACAS', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'TENA', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUYO', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('50', 'QUITO DISTRITO METROPOLITANO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('50', 'AMBATO', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('50', 'ZAMORA', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'GUARANDA', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUERTO BAQUERIZO MORENO', '1', '20');
INSERT INTO "public"."parroquias" VALUES ('50', 'NUEVA LOJA', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUERTO FRANCISCO DE ORELLANA (EL COCA)', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTO DOMINGO DE LOS COLORADOS', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTA ELENA', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('50', 'AZOGUES', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('50', 'TULCÁN', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('50', 'LATACUNGA', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('50', 'RIOBAMBA', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'MACHALA', '1', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'ESMERALDAS', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('50', 'GUAYAQUIL', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN FELIPE DE OÑA CABECERA CANTONAL', '10', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'ALAMOR', '10', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN JACINTO DE BUENA FÉ', '10', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'PAJÁN', '10', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'LOGROÑO', '10', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'CUMANDÁ', '10', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'PIÑAS', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'MILAGRO', '10', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'CHORDELEG', '11', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'SARAGURO', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'VALENCIA', '11', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'PICHINCHA', '11', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'PABLO SEXTO', '11', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'PORTOVELO', '11', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'NARANJAL', '11', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL PAN', '12', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'SOZORANGA', '12', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'MOCACHE', '12', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'ROCAFUERTE', '12', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTIAGO', '12', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTA ROSA', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'NARANJITO', '12', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'SEVILLA DE ORO', '13', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'ZAPOTILLO', '13', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'QUINSALOMA', '13', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTA ANA DE VUELTA LARGA', '13', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'ZARUMA', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'PALESTINA', '13', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'GUACHAPALA', '14', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'PINDAL', '14', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'BAHÍA DE CARÁQUEZ', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'LA VICTORIA', '14', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'PEDRO CARBO', '14', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'CAMILO PONCE ENRÍQUEZ', '15', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'QUILANGA', '15', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'TOSAGUA', '15', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'OLMEDO', '16', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'SUCRE', '16', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAMBORONDÓN', '16', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'PEDERNALES', '17', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'OLMEDO', '18', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTA LUCÍA', '18', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUERTO LÓPEZ', '19', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL SALITRE (LAS RAMAS)', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'GIRÓN', '2', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'ATUNTAQUI', '2', '10');
INSERT INTO "public"."parroquias" VALUES ('50', 'CARIAMANGA', '2', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'BABA', '2', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'CALCETA', '2', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'GUALAQUIZA', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'MERA', '2', '16');
INSERT INTO "public"."parroquias" VALUES ('50', 'CAYAMBE', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('50', 'BAÑOS DE AGUA SANTA', '2', '18');
INSERT INTO "public"."parroquias" VALUES ('50', 'ZUMBA', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'CHILLANES', '2', '2');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUERTO VILLAMIL', '2', '20');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL DORADO DE CASCALES', '2', '21');
INSERT INTO "public"."parroquias" VALUES ('50', 'NUEVO ROCAFUERTE', '2', '22');
INSERT INTO "public"."parroquias" VALUES ('50', 'LA LIBERTAD', '2', '24');
INSERT INTO "public"."parroquias" VALUES ('50', 'BIBLIÁN', '2', '3');
INSERT INTO "public"."parroquias" VALUES ('50', 'BOLÍVAR', '2', '4');
INSERT INTO "public"."parroquias" VALUES ('50', 'LA MANÁ', '2', '5');
INSERT INTO "public"."parroquias" VALUES ('50', 'ALAUSÍ', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'ARENILLAS', '2', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'VALDEZ (LIMONES)', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('50', 'ALFREDO BAQUERIZO MORENO (JUJÁN)', '2', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'JAMA', '20', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN JACINTO DE YAGUACHI', '20', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'JARAMIJÓ', '21', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'GENERAL VILLAMIL (PLAYAS)', '21', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN VICENTE', '22', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'SIMÓN BOLÍVAR', '22', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'CORONEL MARCELINO MARIDUEÑA (SAN CARLOS)', '23', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'LOMAS DE SARGENTILLO', '24', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'NARCISA DE JESÚS', '25', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'GENERAL ANTONIO ELIZALDE (BUCAY)', '27', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'ISIDRO AYORA', '28', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'GUALACEO', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'COTACACHI', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('50', 'CATAMAYO (LA TOMA)', '3', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'MONTALVO', '3', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'CHONE', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'GENERAL LEONIDAS PLAZA GUTIÉRREZ (LIMÓN)', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'ARCHIDONA', '3', '15');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTA CLARA', '3', '16');
INSERT INTO "public"."parroquias" VALUES ('50', 'MACHACHI', '3', '17');
INSERT INTO "public"."parroquias" VALUES ('50', 'CEVALLOS', '3', '18');
INSERT INTO "public"."parroquias" VALUES ('50', 'GUAYZIMI', '3', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN JOSÉ DE CHIMBO', '3', '2');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUERTO AYORA', '3', '20');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUERTO EL CARMEN DEL PUTUMAYO', '3', '21');
INSERT INTO "public"."parroquias" VALUES ('50', 'LA JOYA DE LOS SACHAS', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('50', 'SALINAS', '3', '24');
INSERT INTO "public"."parroquias" VALUES ('50', 'CAÑAR', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL ANGEL', '3', '4');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL CORAZÓN', '3', '5');
INSERT INTO "public"."parroquias" VALUES ('50', 'VILLA LA UNIÓN (CAJABAMBA)', '3', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'PACCHA', '3', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'MUISNE', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('50', 'BALAO', '3', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'NABÓN', '4', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'OTAVALO', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('50', 'CELICA', '4', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUEBLOVIEJO', '4', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL CARMEN', '4', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'PALORA (METZERA)', '4', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL CHACO', '4', '15');
INSERT INTO "public"."parroquias" VALUES ('50', 'ARAJUNO', '4', '16');
INSERT INTO "public"."parroquias" VALUES ('50', 'TABACUNDO', '4', '17');
INSERT INTO "public"."parroquias" VALUES ('50', 'MOCHA', '4', '18');
INSERT INTO "public"."parroquias" VALUES ('50', '28 DE MAYO (SAN JOSÉ DE YACUAMBI)', '4', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'ECHEANDÍA', '4', '2');
INSERT INTO "public"."parroquias" VALUES ('50', 'SHUSHUFINDI', '4', '21');
INSERT INTO "public"."parroquias" VALUES ('50', 'LORETO', '4', '22');
INSERT INTO "public"."parroquias" VALUES ('50', 'LA TRONCAL', '4', '3');
INSERT INTO "public"."parroquias" VALUES ('50', 'MIRA (CHONTAHUASI)', '4', '4');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUJILÍ', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('50', 'CHAMBO', '4', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'BALSAS', '4', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'ROSA ZÁRATE (QUININDÉ)', '4', '8');
INSERT INTO "public"."parroquias" VALUES ('50', 'BALZAR', '4', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'PAUTE', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'PIMAMPIRO', '5', '10');
INSERT INTO "public"."parroquias" VALUES ('50', 'CHAGUARPAMBA', '5', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'QUEVEDO', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'FLAVIO ALFARO', '5', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTIAGO DE MÉNDEZ', '5', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANGOLQUI', '5', '17');
INSERT INTO "public"."parroquias" VALUES ('50', 'PATATE', '5', '18');
INSERT INTO "public"."parroquias" VALUES ('50', 'YANTZAZA (YANZATZA)', '5', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN MIGUEL', '5', '2');
INSERT INTO "public"."parroquias" VALUES ('50', 'LA BONITA', '5', '21');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL TAMBO', '5', '3');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN GABRIEL', '5', '4');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN MIGUEL', '5', '5');
INSERT INTO "public"."parroquias" VALUES ('50', 'CHUNCHI', '5', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'CHILLA', '5', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN LORENZO', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('50', 'COLIMES', '5', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUCARÁ', '6', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'URCUQUÍ CABECERA CANTONAL', '6', '10');
INSERT INTO "public"."parroquias" VALUES ('50', 'AMALUZA', '6', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'CATARAMA', '6', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'JIPIJAPA', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'SUCÚA', '6', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'QUERO', '6', '18');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL PANGUI', '6', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'CALUMA', '6', '2');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL DORADO DE CASCALES', '6', '21');
INSERT INTO "public"."parroquias" VALUES ('50', 'DÉLEG', '6', '3');
INSERT INTO "public"."parroquias" VALUES ('50', 'HUACA', '6', '4');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAQUISILÍ', '6', '5');
INSERT INTO "public"."parroquias" VALUES ('50', 'GUAMOTE', '6', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL GUABO', '6', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'ATACAMES', '6', '8');
INSERT INTO "public"."parroquias" VALUES ('50', 'DAULE', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN FERNANDO', '7', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'GONZANAMÁ', '7', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'VENTANAS', '7', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'JUNÍN', '7', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'HUAMBOYA', '7', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'BAEZA', '7', '15');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN MIGUEL DE LOS BANCOS', '7', '17');
INSERT INTO "public"."parroquias" VALUES ('50', 'PELILEO', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('50', 'ZUMBI', '7', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'LAS NAVES', '7', '2');
INSERT INTO "public"."parroquias" VALUES ('50', 'TARAPOA', '7', '21');
INSERT INTO "public"."parroquias" VALUES ('50', 'SUSCAL', '7', '3');
INSERT INTO "public"."parroquias" VALUES ('50', 'SIGCHOS', '7', '5');
INSERT INTO "public"."parroquias" VALUES ('50', 'GUANO', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'HUAQUILLAS', '7', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'RIOVERDE', '7', '8');
INSERT INTO "public"."parroquias" VALUES ('50', 'ELOY ALFARO (DURÁN)', '7', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'SANTA ISABEL (CHAGUARURCO)', '8', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'MACARÁ', '8', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'VINCES', '8', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'MANTA', '8', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'SAN JUAN BOSCO', '8', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'PEDRO VICENTE MALDONADO', '8', '17');
INSERT INTO "public"."parroquias" VALUES ('50', 'PÍLLARO', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('50', 'PALANDA', '8', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'PALLATANGA', '8', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'MARCABELÍ', '8', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'LA CONCORDIA', '8', '8');
INSERT INTO "public"."parroquias" VALUES ('50', 'VELASCO IBARRA (EL EMPALME)', '8', '9');
INSERT INTO "public"."parroquias" VALUES ('50', 'SIGSIG', '9', '1');
INSERT INTO "public"."parroquias" VALUES ('50', 'CATACOCHA', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('50', 'PALENQUE', '9', '12');
INSERT INTO "public"."parroquias" VALUES ('50', 'MONTECRISTI', '9', '13');
INSERT INTO "public"."parroquias" VALUES ('50', 'TAISHA', '9', '14');
INSERT INTO "public"."parroquias" VALUES ('50', 'CARLOS JULIO AROSEMENA TOLA', '9', '15');
INSERT INTO "public"."parroquias" VALUES ('50', 'PUERTO QUITO', '9', '17');
INSERT INTO "public"."parroquias" VALUES ('50', 'TISALEO', '9', '18');
INSERT INTO "public"."parroquias" VALUES ('50', 'PAQUISHA', '9', '19');
INSERT INTO "public"."parroquias" VALUES ('50', 'PENIPE', '9', '6');
INSERT INTO "public"."parroquias" VALUES ('50', 'PASAJE', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('50', 'EL TRIUNFO', '9', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'BAÑOS', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'AMBUQUÍ', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHANTACO', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'BARREIRO (SANTA RITA)', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('51', 'ABDÓN CALDERÓN (SAN FRANCISCO)', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'ALSHI (CAB. EN 9 DE OCTUBRE)', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'AHUANO', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('51', 'ARAJUNO', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('51', 'ALANGASÍ', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('51', 'AMBATILLO', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('51', 'CUMBARATZA', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'FACUNDO VELA', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL PROGRESO', '1', '20');
INSERT INTO "public"."parroquias" VALUES ('51', 'CUYABENO', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('51', 'DAYUMA', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('51', 'ALLURIQUÍN', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('51', 'ATAHUALPA', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('51', 'COJITAMBO', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL CARMELO (EL PUN)', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('51', 'ALAQUES (ALÁQUEZ)', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('51', 'CACHA (CAB. EN MACHÁNGARA)', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL CAMBIO', '1', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'ATACAMES', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHONGÓN', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'LAS GOLONDRINAS', '1', '90');
INSERT INTO "public"."parroquias" VALUES ('51', 'SUSUDEL', '10', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'CIANO', '10', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'PATRICIA PILAR', '10', '12');
INSERT INTO "public"."parroquias" VALUES ('51', 'CAMPOZANO (LA PALMA DE PAJÁN)', '10', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'YAUPI', '10', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'CAPIRO (CAB. EN LA CAPILLA DE CAPIRO)', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHOBO', '10', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'PRINCIPAL', '11', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL PARAÍSO DE CELÉN', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'BARRAGANETE', '11', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'CURTINCAPA', '11', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'JESÚS MARÍA', '11', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'AMALUZA', '12', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'NUEVA FÁTIMA', '12', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'SAN JOSÉ DE MORONA', '12', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'BELLAVISTA', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'AMALUZA', '13', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'MANGAHURCO (CAZADEROS)', '13', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'AYACUCHO', '13', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'ABAÑÍN', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHAQUINAL', '14', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'CANOA', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'LA LIBERTAD', '14', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'VALLE DE LA VIRGEN', '14', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL CARMEN DE PIJILÍ', '15', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'FUNDOCHAMBA', '15', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'BACHILLERO', '15', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'LA TINGUE', '16', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'BELLAVISTA', '16', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'TARIFA', '16', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'COJIMÍES', '17', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'MACHALILLA', '19', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'GRAL. VERNAZA (DOS ESTEROS)', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'ASUNCIÓN', '2', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'IMBAYA (SAN LUIS DE COBUENDO)', '2', '10');
INSERT INTO "public"."parroquias" VALUES ('51', 'COLAISACA', '2', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'GUARE', '2', '12');
INSERT INTO "public"."parroquias" VALUES ('51', 'MEMBRILLO', '2', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'AMAZONAS (ROSARIO DE CUYES)', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'MADRE TIERRA', '2', '16');
INSERT INTO "public"."parroquias" VALUES ('51', 'ASCÁZUBI', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('51', 'LLIGUA', '2', '18');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHITO', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'SAN JOSÉ DEL TAMBO (TAMBOPAMBA)', '2', '2');
INSERT INTO "public"."parroquias" VALUES ('51', 'TOMÁS DE BERLANGA (SANTO TOMÁS)', '2', '20');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL REVENTADOR', '2', '21');
INSERT INTO "public"."parroquias" VALUES ('51', 'CAPITÁN AUGUSTO RIVADENEYRA', '2', '22');
INSERT INTO "public"."parroquias" VALUES ('51', 'NAZÓN (CAB. EN PAMPA DE DOMÍNGUEZ)', '2', '3');
INSERT INTO "public"."parroquias" VALUES ('51', 'GARCÍA MORENO', '2', '4');
INSERT INTO "public"."parroquias" VALUES ('51', 'GUASAGANDA (CAB.EN GUASAGANDA', '2', '5');
INSERT INTO "public"."parroquias" VALUES ('51', 'ACHUPALLAS', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHACRAS', '2', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'ANCHAYACU', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('51', 'CRNEL. LORENZO DE GARAICOA (PEDREGAL)', '20', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'CANOA', '22', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'CRNEL.LORENZO DE GARAICOA (PEDREGAL)', '22', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'ISIDRO AYORA (SOLEDAD)', '24', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHORDELEG', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'APUELA', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL TAMBO', '3', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'BOYACÁ', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'INDANZA', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'AVILA', '3', '15');
INSERT INTO "public"."parroquias" VALUES ('51', 'SAN JOSÉ', '3', '16');
INSERT INTO "public"."parroquias" VALUES ('51', 'ALÓAG', '3', '17');
INSERT INTO "public"."parroquias" VALUES ('51', 'ZURMI', '3', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'ASUNCIÓN (ASANCOTO)', '3', '2');
INSERT INTO "public"."parroquias" VALUES ('51', 'BELLAVISTA', '3', '20');
INSERT INTO "public"."parroquias" VALUES ('51', 'PALMA ROJA', '3', '21');
INSERT INTO "public"."parroquias" VALUES ('51', 'ENOKANQUI', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('51', 'ANCONCITO', '3', '24');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHONTAMARCA', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL GOALTAL', '3', '4');
INSERT INTO "public"."parroquias" VALUES ('51', 'MORASPUNGO', '3', '5');
INSERT INTO "public"."parroquias" VALUES ('51', 'CAÑI', '3', '6');
INSERT INTO "public"."parroquias" VALUES ('51', 'AYAPAMBA', '3', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'BOLÍVAR', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('51', 'MANGA DEL CURA', '3', '90');
INSERT INTO "public"."parroquias" VALUES ('51', 'COCHAPATA', '4', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'DR. MIGUEL EGAS CABEZAS (PEGUCHE)', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('51', 'CRUZPAMBA (CAB. EN CARLOS BUSTAMANTE)', '4', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'PUERTO PECHICHE', '4', '12');
INSERT INTO "public"."parroquias" VALUES ('51', 'WILFRIDO LOOR MOREIRA (MAICITO)', '4', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'ARAPICOS', '4', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'GONZALO DíAZ DE PINEDA (EL BOMBÓN)', '4', '15');
INSERT INTO "public"."parroquias" VALUES ('51', 'CURARAY', '4', '16');
INSERT INTO "public"."parroquias" VALUES ('51', 'LA ESPERANZA', '4', '17');
INSERT INTO "public"."parroquias" VALUES ('51', 'PINGUILÍ', '4', '18');
INSERT INTO "public"."parroquias" VALUES ('51', 'LA PAZ', '4', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'LIMONCOCHA', '4', '21');
INSERT INTO "public"."parroquias" VALUES ('51', 'AVILA (CAB. EN HUIRUNO)', '4', '22');
INSERT INTO "public"."parroquias" VALUES ('51', 'MANUEL J. CALLE', '4', '3');
INSERT INTO "public"."parroquias" VALUES ('51', 'CONCEPCIÓN', '4', '4');
INSERT INTO "public"."parroquias" VALUES ('51', 'ANGAMARCA', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('51', 'BELLAMARÍA', '4', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'CUBE', '4', '8');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL PIEDRERO', '4', '90');
INSERT INTO "public"."parroquias" VALUES ('51', 'AMALUZA', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHUGÁ', '5', '10');
INSERT INTO "public"."parroquias" VALUES ('51', 'BUENAVISTA', '5', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'BUENA FÉ', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('51', 'SAN FRANCISCO DE NOVILLO (CAB. EN', '5', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'COPAL', '5', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'COTOGCHOA', '5', '17');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL TRIUNFO', '5', '18');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHICAÑA', '5', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'BALSAPAMBA', '5', '2');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL PLAYÓN DE SAN FRANCISCO', '5', '21');
INSERT INTO "public"."parroquias" VALUES ('51', 'CRISTÓBAL COLÓN', '5', '4');
INSERT INTO "public"."parroquias" VALUES ('51', 'ANTONIO JOSÉ HOLGUÍN (SANTA LUCÍA)', '5', '5');
INSERT INTO "public"."parroquias" VALUES ('51', 'CAPZOL', '5', '6');
INSERT INTO "public"."parroquias" VALUES ('51', 'ALTO TAMBO (CAB. EN GUADUAL)', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('51', 'SAN JACINTO', '5', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'CAMILO PONCE ENRÍQUEZ (CAB. EN RÍO 7 DE MOLLEPONGO)', '6', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'CAHUASQUÍ', '6', '10');
INSERT INTO "public"."parroquias" VALUES ('51', 'BELLAVISTA', '6', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'RICAURTE', '6', '12');
INSERT INTO "public"."parroquias" VALUES ('51', 'AMÉRICA', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'ASUNCIÓN', '6', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'RUMIPAMBA', '6', '18');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL GUISME', '6', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'SANTA ROSA DE SUCUMBÍOS', '6', '21');
INSERT INTO "public"."parroquias" VALUES ('51', 'SOLANO', '6', '3');
INSERT INTO "public"."parroquias" VALUES ('51', 'MARISCAL SUCRE', '6', '4');
INSERT INTO "public"."parroquias" VALUES ('51', 'CANCHAGUA', '6', '5');
INSERT INTO "public"."parroquias" VALUES ('51', 'CEBADAS', '6', '6');
INSERT INTO "public"."parroquias" VALUES ('51', 'BARBONES (SUCRE)', '6', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'LA UNIÓN', '6', '8');
INSERT INTO "public"."parroquias" VALUES ('51', 'ISIDRO AYORA (SOLEDAD)', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHUMBLÍN', '7', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHANGAIMINA (LA LIBERTAD)', '7', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'QUINSALOMA', '7', '12');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHIGUAZA', '7', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'COSANGA', '7', '15');
INSERT INTO "public"."parroquias" VALUES ('51', 'MINDO', '7', '17');
INSERT INTO "public"."parroquias" VALUES ('51', 'BENÍTEZ (PACHANLICA)', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('51', 'PAQUISHA', '7', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'CUYABENO', '7', '21');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHUGCHILLÁN', '7', '5');
INSERT INTO "public"."parroquias" VALUES ('51', 'GUANANDO', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('51', 'CHONTADURO', '7', '8');
INSERT INTO "public"."parroquias" VALUES ('51', 'ABDÓN CALDERÓN (LA UNIÓN)', '8', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'LARAMA', '8', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'ANTONIO SOTOMAYOR (CAB. EN PLAYAS DE VINCES)', '8', '12');
INSERT INTO "public"."parroquias" VALUES ('51', 'SAN LORENZO', '8', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'PAN DE AZÚCAR', '8', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'BAQUERIZO MORENO', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL PORVENIR DEL CARMEN', '8', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL INGENIO', '8', '7');
INSERT INTO "public"."parroquias" VALUES ('51', 'MONTERREY', '8', '8');
INSERT INTO "public"."parroquias" VALUES ('51', 'GUAYAS (PUEBLO NUEVO)', '8', '9');
INSERT INTO "public"."parroquias" VALUES ('51', 'CUCHIL (CUTCHIL)', '9', '1');
INSERT INTO "public"."parroquias" VALUES ('51', 'CANGONAMÁ', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('51', 'JARAMIJÓ', '9', '13');
INSERT INTO "public"."parroquias" VALUES ('51', 'HUASAGA (CAB. EN WAMPUIK)', '9', '14');
INSERT INTO "public"."parroquias" VALUES ('51', 'QUINCHICOTO', '9', '18');
INSERT INTO "public"."parroquias" VALUES ('51', 'BELLAVISTA', '9', '19');
INSERT INTO "public"."parroquias" VALUES ('51', 'EL ALTAR', '9', '6');
INSERT INTO "public"."parroquias" VALUES ('51', 'BUENAVISTA', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'CUMBE', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'ANGOCHAGUA', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHUQUIRIBAMBA', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'CARACOL', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('52', 'ALHAJUELA (BAJO GRANDE)', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHIGUAZA', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'CARLOS JULIO AROSEMENA TOLA (ZATZA-YACU)', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('52', 'CANELOS', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('52', 'AMAGUAÑA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('52', 'ATAHUALPA (CHISALATA)', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('52', 'GUADALUPE', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'GUANUJO', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('52', 'ISLA SANTA MARÍA (FLOREANA) (CAB. EN PTO. VELASCO IBARRA)', '1', '20');
INSERT INTO "public"."parroquias" VALUES ('52', 'DURENO', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('52', 'TARACOA (NUEVA ESPERANZA: YUCA)', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('52', 'PUERTO LIMÓN', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('52', 'COLONCHE', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('52', 'DÉLEG', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('52', 'HUACA', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('52', 'BELISARIO QUEVEDO (GUANAILÍN)', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('52', 'CALPI', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL RETIRO', '1', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'CAMARONES (CAB. EN SAN VICENTE)', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('52', 'JUAN GÓMEZ RENDÓN (PROGRESO)', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL ARENAL', '10', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'CASCOL', '10', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'SHIMPIS', '10', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA BOCANA', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'GENERAL ELIZALDE (BUCAY)', '10', '9');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA UNIÓN', '11', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL TABLÓN', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN SEBASTIÁN', '11', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'MORALES', '11', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN CARLOS', '11', '9');
INSERT INTO "public"."parroquias" VALUES ('52', 'PALMAS', '12', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'TACAMOROS', '12', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'JAMBELÍ', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'PALMAS', '13', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'GARZAREAL', '13', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'HONORATO VÁSQUEZ (CAB. EN VÁSQUEZ)', '13', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'ARCAPAMBA', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('52', '12 DE DICIEMBRE (CAB.EN ACHIOTES)', '14', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'COJIMÍES', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL PARAÍSO', '14', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'SABANILLA', '14', '9');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN ANTONIO DE LAS ARADAS (CAB. EN LAS ARADAS)', '15', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'ANGEL PEDRO GILER (LA ESTANCILLA)', '15', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'NOBOA', '16', '13');
INSERT INTO "public"."parroquias" VALUES ('52', '10 DE AGOSTO', '17', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'SALANGO', '19', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA VICTORIA (ÑAUZA)', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN GERARDO', '2', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN FRANCISCO DE NATABUELA', '2', '10');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL LUCERO', '2', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'ISLA DE BEJUCAL', '2', '12');
INSERT INTO "public"."parroquias" VALUES ('52', 'QUIROGA', '2', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'BERMEJOS', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'SHELL', '2', '16');
INSERT INTO "public"."parroquias" VALUES ('52', 'CANGAHUA', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('52', 'RÍO NEGRO', '2', '18');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL CHORRO', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'GONZALO PIZARRO', '2', '21');
INSERT INTO "public"."parroquias" VALUES ('52', 'CONONACO', '2', '22');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN FRANCISCO DE SAGEO', '2', '3');
INSERT INTO "public"."parroquias" VALUES ('52', 'LOS ANDES', '2', '4');
INSERT INTO "public"."parroquias" VALUES ('52', 'PUCAYACU', '2', '5');
INSERT INTO "public"."parroquias" VALUES ('52', 'CUMANDÁ', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA LIBERTAD', '2', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'ATAHUALPA (CAB. EN CAMARONES)', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('52', 'CRNEL. MARCELINO MARIDUEÑA (SAN CARLOS)', '20', '9');
INSERT INTO "public"."parroquias" VALUES ('52', 'DANIEL CÓRDOVA TORAL (EL ORIENTE)', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'GARCÍA MORENO (LLURIMAGUA)', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('52', 'GUAYQUICHUMA', '3', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'CANUTO', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'PAN DE AZÚCAR', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'COTUNDO', '3', '15');
INSERT INTO "public"."parroquias" VALUES ('52', 'ALOASÍ', '3', '17');
INSERT INTO "public"."parroquias" VALUES ('52', 'NUEVO PARAÍSO', '3', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'CALUMA', '3', '2');
INSERT INTO "public"."parroquias" VALUES ('52', 'SANTA ROSA (INCLUYE LA ISLA BALTRA)', '3', '20');
INSERT INTO "public"."parroquias" VALUES ('52', 'PUERTO BOLÍVAR (PUERTO MONTÚFAR)', '3', '21');
INSERT INTO "public"."parroquias" VALUES ('52', 'POMPEYA', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('52', 'JOSÉ LUIS TAMAYO (MUEY)', '3', '24');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHOROCOPTE', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA LIBERTAD (ALIZO)', '3', '4');
INSERT INTO "public"."parroquias" VALUES ('52', 'PINLLOPATA', '3', '5');
INSERT INTO "public"."parroquias" VALUES ('52', 'COLUMBE', '3', '6');
INSERT INTO "public"."parroquias" VALUES ('52', 'CORDONCILLO', '3', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'DAULE', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL PROGRESO (CAB.EN ZHOTA)', '4', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'EUGENIO ESPEJO (CALPAQUÍ)', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHAQUINAL', '4', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN JUAN', '4', '12');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN PEDRO DE SUMA', '4', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'CUMANDÁ (CAB. EN COLONIA AGRÍCOLA SEVILLA DEL ORO)', '4', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'LINARES', '4', '15');
INSERT INTO "public"."parroquias" VALUES ('52', 'MALCHINGUÍ', '4', '17');
INSERT INTO "public"."parroquias" VALUES ('52', 'TUTUPALI', '4', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'PAÑACOCHA', '4', '21');
INSERT INTO "public"."parroquias" VALUES ('52', 'PUERTO MURIALDO', '4', '22');
INSERT INTO "public"."parroquias" VALUES ('52', 'PANCHO NEGRO', '4', '3');
INSERT INTO "public"."parroquias" VALUES ('52', 'JIJÓN Y CAAMAÑO (CAB. EN RÍO BLANCO)', '4', '4');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHUCCHILÁN (CHUGCHILÁN)', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHURA (CHANCAMA) (CAB. EN EL YERBERO)', '4', '8');
INSERT INTO "public"."parroquias" VALUES ('52', 'BULÁN (JOSÉ VÍCTOR IZQUIERDO)', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'MARIANO ACOSTA', '5', '10');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL ROSARIO', '5', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'MOCACHE', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('52', 'ZAPALLO', '5', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHUPIANZA', '5', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'RUMIPAMBA', '5', '17');
INSERT INTO "public"."parroquias" VALUES ('52', 'LOS ANDES (CAB. EN POATUG)', '5', '18');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL PANGUI', '5', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'BILOVÁN', '5', '2');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA SOFÍA', '5', '21');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHITÁN DE NAVARRETE', '5', '4');
INSERT INTO "public"."parroquias" VALUES ('52', 'CUSUBAMBA', '5', '5');
INSERT INTO "public"."parroquias" VALUES ('52', 'COMPUD', '5', '6');
INSERT INTO "public"."parroquias" VALUES ('52', 'ANCÓN (PICHANGAL) (CAB. EN PALMA REAL)', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN RAFAEL DE SHARUG', '6', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA MERCED DE BUENOS AIRES', '6', '10');
INSERT INTO "public"."parroquias" VALUES ('52', 'JIMBURA', '6', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL ANEGADO (CAB. EN ELOY ALFARO)', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'HUAMBI', '6', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'YANAYACU - MOCHAPATA (CAB. EN YANAYACU)', '6', '18');
INSERT INTO "public"."parroquias" VALUES ('52', 'PACHICUTZA', '6', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'SEVILLA', '6', '21');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHANTILÍN', '6', '5');
INSERT INTO "public"."parroquias" VALUES ('52', 'PALMIRA', '6', '6');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA IBERIA', '6', '7');
INSERT INTO "public"."parroquias" VALUES ('52', 'SÚA (CAB. EN LA BOCANA)', '6', '8');
INSERT INTO "public"."parroquias" VALUES ('52', 'JUAN BAUTISTA AGUIRRE (LOS TINTOS)', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('52', 'FUNDOCHAMBA', '7', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'ZAPOTAL', '7', '12');
INSERT INTO "public"."parroquias" VALUES ('52', 'PABLO SEXTO', '7', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'CUYUJA', '7', '15');
INSERT INTO "public"."parroquias" VALUES ('52', 'PEDRO VICENTE MALDONADO', '7', '17');
INSERT INTO "public"."parroquias" VALUES ('52', 'BOLÍVAR', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('52', 'TRIUNFO-DORADO', '7', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'AGUAS NEGRAS', '7', '21');
INSERT INTO "public"."parroquias" VALUES ('52', 'ISINLIVÍ', '7', '5');
INSERT INTO "public"."parroquias" VALUES ('52', 'ILAPO', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('52', 'CHUMUNDÉ', '7', '8');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL CARMEN DE PIJILÍ', '8', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA VICTORIA', '8', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'PALENQUE', '8', '12');
INSERT INTO "public"."parroquias" VALUES ('52', 'SANTA MARIANITA (BOCA DE PACOCHE)', '8', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN CARLOS DE LIMÓN', '8', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'EMILIO MARÍA TERÁN (RUMIPAMBA)', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('52', 'SAN FRANCISCO DEL VERGEL', '8', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA VILLEGAS', '8', '8');
INSERT INTO "public"."parroquias" VALUES ('52', 'EL ROSARIO', '8', '9');
INSERT INTO "public"."parroquias" VALUES ('52', 'GIMA', '9', '1');
INSERT INTO "public"."parroquias" VALUES ('52', 'GUACHANAMÁ', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('52', 'LA PILA', '9', '13');
INSERT INTO "public"."parroquias" VALUES ('52', 'MACUMA', '9', '14');
INSERT INTO "public"."parroquias" VALUES ('52', 'NUEVO QUITO', '9', '19');
INSERT INTO "public"."parroquias" VALUES ('52', 'MATUS', '9', '6');
INSERT INTO "public"."parroquias" VALUES ('52', 'CASACAY', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'CHAUCHA', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('53', 'CAROLINA', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('53', 'EL CISNE', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'FEBRES CORDERO (LAS JUNTAS)', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('53', 'CRUCITA', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('53', 'GENERAL PROAÑO', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('53', 'CHONTAPUNTA', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('53', 'CURARAY', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('53', 'ATAHUALPA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('53', 'AUGUSTO N. MARTÍNEZ (MUNDUGLEO)', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('53', 'IMBANA (LA VICTORIA DE IMBANA)', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('53', 'JULIO E. MORENO (CATANAHUÁN GRANDE)', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('53', 'GENERAL FARFÁN', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('53', 'ALEJANDRO LABAKA', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('53', 'LUZ DE AMÉRICA', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('53', 'CHANDUY', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('53', 'GUAPÁN', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('53', 'JULIO ANDRADE (OREJUELA)', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('53', 'GUAITACAMA (GUAYTACAMA)', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('53', 'CUBIJÍES', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('53', 'CRNEL. CARLOS CONCHA TORRES (CAB.EN HUELE)', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('53', 'MORRO', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('53', 'EL LIMO (MARIANA DE JESÚS)', '10', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'GUALE', '10', '13');
INSERT INTO "public"."parroquias" VALUES ('53', 'MOROMORO (CAB. EN EL VADO)', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'MARISCAL SUCRE (HUAQUES)', '10', '9');
INSERT INTO "public"."parroquias" VALUES ('53', 'LUIS GALARZA ORELLANA (CAB.EN DELEGSOL)', '11', '1');
INSERT INTO "public"."parroquias" VALUES ('53', 'LLUZHAPA', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'SALATÍ', '11', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'SANTA ROSA DE FLANDES', '11', '9');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN VICENTE', '12', '1');
INSERT INTO "public"."parroquias" VALUES ('53', 'LA AVANZADA', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'LIMONES', '13', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'LA UNIÓN', '13', '13');
INSERT INTO "public"."parroquias" VALUES ('53', 'GUANAZÁN', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'MILAGROS', '14', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'CHARAPOTÓ', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN ISIDRO', '14', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'ARQ. SIXTO DURÁN BALLÉN', '16', '13');
INSERT INTO "public"."parroquias" VALUES ('53', 'ATAHUALPA', '17', '13');
INSERT INTO "public"."parroquias" VALUES ('53', 'JUNQUILLAL', '19', '9');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN JOSÉ DE CHALTURA', '2', '10');
INSERT INTO "public"."parroquias" VALUES ('53', 'UTUANA', '2', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'BOMBOIZA', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('53', 'OLMEDO (PESILLO)', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('53', 'RÍO VERDE', '2', '18');
INSERT INTO "public"."parroquias" VALUES ('53', 'EL PORVENIR DEL CARMEN', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('53', 'LUMBAQUÍ', '2', '21');
INSERT INTO "public"."parroquias" VALUES ('53', 'SANTA MARÍA DE HUIRIRIMA', '2', '22');
INSERT INTO "public"."parroquias" VALUES ('53', 'TURUPAMBA', '2', '3');
INSERT INTO "public"."parroquias" VALUES ('53', 'MONTE OLIVO', '2', '4');
INSERT INTO "public"."parroquias" VALUES ('53', 'GUASUNTOS', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('53', 'LAS LAJAS (CAB. EN LA VICTORIA)', '2', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'BORBÓN', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('53', 'GRAL. PEDRO J. MONTERO (BOLICHE)', '20', '9');
INSERT INTO "public"."parroquias" VALUES ('53', 'JADÁN', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('53', 'IMANTAG', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN PEDRO DE LA BENDITA', '3', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'CONVENTO', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN ANTONIO (CAB. EN SAN ANTONIO CENTRO', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('53', 'LORETO', '3', '15');
INSERT INTO "public"."parroquias" VALUES ('53', 'CUTUGLAHUA', '3', '17');
INSERT INTO "public"."parroquias" VALUES ('53', 'MAGDALENA (CHAPACOTO)', '3', '2');
INSERT INTO "public"."parroquias" VALUES ('53', 'PUERTO RODRÍGUEZ', '3', '21');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN CARLOS', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('53', 'GENERAL MORALES (SOCARTE)', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN ISIDRO', '3', '4');
INSERT INTO "public"."parroquias" VALUES ('53', 'RAMÓN CAMPAÑA', '3', '5');
INSERT INTO "public"."parroquias" VALUES ('53', 'JUAN DE VELASCO (PANGOR)', '3', '6');
INSERT INTO "public"."parroquias" VALUES ('53', 'MILAGRO', '3', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'GALERA', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('53', 'LAS NIEVES (CHAYA)', '4', '1');
INSERT INTO "public"."parroquias" VALUES ('53', 'GONZÁLEZ SUÁREZ', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('53', '12 DE DICIEMBRE (CAB. EN ACHIOTES)', '4', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'HUAMBOYA', '4', '14');
INSERT INTO "public"."parroquias" VALUES ('53', 'OYACACHI', '4', '15');
INSERT INTO "public"."parroquias" VALUES ('53', 'TOCACHI', '4', '17');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN ROQUE (CAB. EN SAN VICENTE)', '4', '21');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN JOSÉ DE PAYAMINO', '4', '22');
INSERT INTO "public"."parroquias" VALUES ('53', 'JUAN MONTALVO (SAN IGNACIO DE QUIL)', '4', '4');
INSERT INTO "public"."parroquias" VALUES ('53', 'GUANGAJE', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('53', 'MALIMPIA', '4', '8');
INSERT INTO "public"."parroquias" VALUES ('53', 'CHICÁN (GUILLERMO ORTEGA)', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN FRANCISCO DE SIGSIPAMBA', '5', '10');
INSERT INTO "public"."parroquias" VALUES ('53', 'SANTA RUFINA', '5', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN CARLOS', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('53', 'PATUCA', '5', '14');
INSERT INTO "public"."parroquias" VALUES ('53', 'SUCRE (CAB. EN SUCRE-PATATE URCU)', '5', '18');
INSERT INTO "public"."parroquias" VALUES ('53', 'LOS ENCUENTROS', '5', '19');
INSERT INTO "public"."parroquias" VALUES ('53', 'RÉGULO DE MORA', '5', '2');
INSERT INTO "public"."parroquias" VALUES ('53', 'ROSA FLORIDA', '5', '21');
INSERT INTO "public"."parroquias" VALUES ('53', 'FERNÁNDEZ SALVADOR', '5', '4');
INSERT INTO "public"."parroquias" VALUES ('53', 'MULALILLO', '5', '5');
INSERT INTO "public"."parroquias" VALUES ('53', 'GONZOL', '5', '6');
INSERT INTO "public"."parroquias" VALUES ('53', 'CALDERÓN', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('53', 'PABLO ARENAS', '6', '10');
INSERT INTO "public"."parroquias" VALUES ('53', 'SANTA TERESITA', '6', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'JULCUY', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('53', 'LOGROÑO', '6', '14');
INSERT INTO "public"."parroquias" VALUES ('53', 'TUNDAYME', '6', '19');
INSERT INTO "public"."parroquias" VALUES ('53', 'COCHAPAMBA', '6', '5');
INSERT INTO "public"."parroquias" VALUES ('53', 'TENDALES (CAB.EN PUERTO TENDALES)', '6', '7');
INSERT INTO "public"."parroquias" VALUES ('53', 'TONCHIGÜE', '6', '8');
INSERT INTO "public"."parroquias" VALUES ('53', 'LAUREL', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('53', 'NAMBACOLA', '7', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'CHACARITA', '7', '12');
INSERT INTO "public"."parroquias" VALUES ('53', 'PAPALLACTA', '7', '15');
INSERT INTO "public"."parroquias" VALUES ('53', 'PUERTO QUITO', '7', '17');
INSERT INTO "public"."parroquias" VALUES ('53', 'COTALÓ', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('53', 'PANGUINTZA', '7', '19');
INSERT INTO "public"."parroquias" VALUES ('53', 'LAS PAMPAS', '7', '5');
INSERT INTO "public"."parroquias" VALUES ('53', 'LA PROVIDENCIA', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('53', 'LAGARTO', '7', '8');
INSERT INTO "public"."parroquias" VALUES ('53', 'ZHAGLLI (SHAGLLI)', '8', '1');
INSERT INTO "public"."parroquias" VALUES ('53', 'SABIANGO (LA CAPILLA)', '8', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'SAN JACINTO DE WAKAMBEIS', '8', '14');
INSERT INTO "public"."parroquias" VALUES ('53', 'MARCOS ESPINEL (CHACATA)', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('53', 'VALLADOLID', '8', '19');
INSERT INTO "public"."parroquias" VALUES ('53', 'PLAN PILOTO', '8', '8');
INSERT INTO "public"."parroquias" VALUES ('53', 'GUEL', '9', '1');
INSERT INTO "public"."parroquias" VALUES ('53', 'LA TINGUE', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('53', 'TUUTINENTZA', '9', '14');
INSERT INTO "public"."parroquias" VALUES ('53', 'PUELA', '9', '6');
INSERT INTO "public"."parroquias" VALUES ('53', 'LA PEAÑA', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('54', 'CHECA (JIDCAY)', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('54', 'LA ESPERANZA', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('54', 'GUALEL', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'PIMOCHA', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('54', 'PUEBLO NUEVO', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('54', 'HUASAGA (CAB.EN WAMPUIK)', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('54', 'PANO', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('54', 'DIEZ DE AGOSTO', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('54', 'CALACALÍ', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('54', 'CONSTANTINO FERNÁNDEZ (CAB. EN CULLITAHUA)', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('54', 'PAQUISHA', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('54', 'LAS NAVES', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('54', 'TARAPOA', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('54', 'EL DORADO', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN JACINTO DEL BÚA', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('54', 'MANGLARALTO', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('54', 'JAVIER LOYOLA (CHUQUIPATA)', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('54', 'MALDONADO', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('54', 'JOSEGUANGO BAJO', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('54', 'FLORES', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('54', 'CHINCA', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('54', 'PASCUALES', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('54', 'MERCADILLO', '10', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'LASCANO', '10', '13');
INSERT INTO "public"."parroquias" VALUES ('54', 'PIEDRAS', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('54', 'ROBERTO ASTUDILLO (CAB. EN CRUCE DE VENECIA)', '10', '9');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN MARTÍN DE PUZHIO', '11', '1');
INSERT INTO "public"."parroquias" VALUES ('54', 'MANÚ', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'TAURA', '11', '9');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN ANTONIO', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('54', 'PALETILLAS', '13', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'OLMEDO', '13', '13');
INSERT INTO "public"."parroquias" VALUES ('54', 'GUIZHAGUIÑA', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('54', '10 DE AGOSTO', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN ROQUE', '2', '10');
INSERT INTO "public"."parroquias" VALUES ('54', 'SANGUILLÍN', '2', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'CHIGÜINDA', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('54', 'OTÓN', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('54', 'ULBA', '2', '18');
INSERT INTO "public"."parroquias" VALUES ('54', 'LA CHONTA', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('54', 'PUERTO LIBRE', '2', '21');
INSERT INTO "public"."parroquias" VALUES ('54', 'TIPUTINI', '2', '22');
INSERT INTO "public"."parroquias" VALUES ('54', 'JERUSALÉN', '2', '3');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN VICENTE DE PUSIR', '2', '4');
INSERT INTO "public"."parroquias" VALUES ('54', 'HUIGRA', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('54', 'PALMALES', '2', '7');
INSERT INTO "public"."parroquias" VALUES ('54', 'LA TOLA', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('54', 'SIMÓN BOLÍVAR', '20', '9');
INSERT INTO "public"."parroquias" VALUES ('54', 'MARIANO MORENO', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('54', 'PEÑAHERRERA', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('54', 'ZAMBI', '3', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'CHIBUNGA', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN CARLOS DE LIMÓN (SAN CARLOS DEL', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN PABLO DE USHPAYACU', '3', '15');
INSERT INTO "public"."parroquias" VALUES ('54', 'EL CHAUPI', '3', '17');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN SEBASTIÁN', '3', '2');
INSERT INTO "public"."parroquias" VALUES ('54', 'SANTA ELENA', '3', '21');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN SEBASTIÁN DEL COCA', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('54', 'GUALLETURO', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('54', 'SANTIAGO DE QUITO (CAB. EN SAN ANTONIO DE QUITO)', '3', '6');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN JOSÉ', '3', '7');
INSERT INTO "public"."parroquias" VALUES ('54', 'QUINGUE (OLMEDO PERDOMO FRANCO)', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('54', 'OÑA', '4', '1');
INSERT INTO "public"."parroquias" VALUES ('54', 'PATAQUÍ', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('54', 'PINDAL (FEDERICO PÁEZ)', '4', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'SANGAY (CAB. EN NAYAMANACA)', '4', '14');
INSERT INTO "public"."parroquias" VALUES ('54', 'SANTA ROSA', '4', '15');
INSERT INTO "public"."parroquias" VALUES ('54', 'TUPIGACHI', '4', '17');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN PEDRO DE LOS COFANES', '4', '21');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN JOSÉ DE DAHUANO', '4', '22');
INSERT INTO "public"."parroquias" VALUES ('54', 'ISINLIBÍ (ISINLIVÍ)', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('54', 'VICHE', '4', '8');
INSERT INTO "public"."parroquias" VALUES ('54', 'EL CABO', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('54', 'AMARILLOS', '5', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'VALENCIA', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN LUIS DE EL ACHO (CAB. EN EL ACHO)', '5', '14');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN PABLO (SAN PABLO DE ATENAS)', '5', '2');
INSERT INTO "public"."parroquias" VALUES ('54', 'SANTA BÁRBARA', '5', '21');
INSERT INTO "public"."parroquias" VALUES ('54', 'LA PAZ', '5', '4');
INSERT INTO "public"."parroquias" VALUES ('54', 'MULLIQUINDIL (SANTA ANA)', '5', '5');
INSERT INTO "public"."parroquias" VALUES ('54', 'LLAGOS', '5', '6');
INSERT INTO "public"."parroquias" VALUES ('54', 'CARONDELET', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN BLAS', '6', '10');
INSERT INTO "public"."parroquias" VALUES ('54', '27 DE ABRIL (CAB. EN LA NARANJA)', '6', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'LA UNIÓN', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('54', 'YAUPI', '6', '14');
INSERT INTO "public"."parroquias" VALUES ('54', 'RÍO BONITO', '6', '7');
INSERT INTO "public"."parroquias" VALUES ('54', 'TONSUPA', '6', '8');
INSERT INTO "public"."parroquias" VALUES ('54', 'LIMONAL', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('54', 'PURUNUMA (EGUIGUREN)', '7', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'LOS ÁNGELES', '7', '12');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN FRANCISCO DE BORJA (VIRGILIO DÁVILA)', '7', '15');
INSERT INTO "public"."parroquias" VALUES ('54', 'CHIQUICHA (CAB. EN CHIQUICHA GRANDE)', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('54', 'PALO QUEMADO', '7', '5');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN ANDRÉS', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('54', 'MONTALVO (CAB. EN HORQUETA)', '7', '8');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN SALVADOR DE CAÑARIBAMBA', '8', '1');
INSERT INTO "public"."parroquias" VALUES ('54', 'SANTIAGO DE PANANZA', '8', '14');
INSERT INTO "public"."parroquias" VALUES ('54', 'PRESIDENTE URBINA (CHAGRAPAMBA -PATZUCUL)', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('54', 'LA CANELA', '8', '19');
INSERT INTO "public"."parroquias" VALUES ('54', 'LUDO', '9', '1');
INSERT INTO "public"."parroquias" VALUES ('54', 'LAURO GUERRERO', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('54', 'PUMPUENTSA', '9', '14');
INSERT INTO "public"."parroquias" VALUES ('54', 'SAN ANTONIO DE BAYUSHIG', '9', '6');
INSERT INTO "public"."parroquias" VALUES ('54', 'PROGRESO', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('55', 'CHIQUINTAD', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('55', 'LITA', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('55', 'JIMBILLA', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('55', 'LA UNIÓN', '1', '12');
INSERT INTO "public"."parroquias" VALUES ('55', 'RIOCHICO (RÍO CHICO)', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('55', 'MACUMA', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('55', 'PUERTO MISAHUALLI', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('55', 'FÁTIMA', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('55', 'CALDERÓN', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('55', 'HUACHI GRANDE', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('55', 'SABANILLA', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('55', 'SALINAS', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('55', 'EL ENO', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('55', 'EL EDÉN', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('55', 'VALLE HERMOSO', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('55', 'SIMÓN BOLÍVAR (JULIO MORENO)', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('55', 'LUIS CORDERO', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('55', 'PIOTER', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('55', 'LAS PAMPAS', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('55', 'LICÁN', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('55', 'CHONTADURO', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('55', 'PLAYAS (GRAL. VILLAMIL)', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('55', 'VICENTINO', '10', '11');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN ROQUE (AMBROSIO MALDONADO)', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN ANTONIO DE QUMBE (CUMBE)', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('55', 'TORATA', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('55', 'BOLASPAMBA', '13', '11');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN PABLO (CAB. EN PUEBLO NUEVO)', '13', '13');
INSERT INTO "public"."parroquias" VALUES ('55', 'HUERTAS', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('55', 'JAMA', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('55', 'EL ROSARIO', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('55', 'SANTA ROSA DE CUZUBAMBA', '2', '17');
INSERT INTO "public"."parroquias" VALUES ('55', 'PALANDA', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('55', 'SANTA ROSA DE SUCUMBÍOS', '2', '21');
INSERT INTO "public"."parroquias" VALUES ('55', 'YASUNÍ', '2', '22');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN RAFAEL', '2', '4');
INSERT INTO "public"."parroquias" VALUES ('55', 'MULTITUD', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('55', 'CARCABÓN', '2', '7');
INSERT INTO "public"."parroquias" VALUES ('55', 'LUIS VARGAS TORRES (CAB. EN PLAYA DE ORO)', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('55', 'YAGUACHI VIEJO (CONE)', '20', '9');
INSERT INTO "public"."parroquias" VALUES ('55', 'PRINCIPAL', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('55', 'PLAZA GUTIÉRREZ (CALVARIO)', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('55', 'ELOY ALFARO', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN JUAN BOSCO', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('55', 'PUERTO MURIALDO', '3', '15');
INSERT INTO "public"."parroquias" VALUES ('55', 'MANUEL CORNEJO ASTORGA (TANDAPI)', '3', '17');
INSERT INTO "public"."parroquias" VALUES ('55', 'TELIMBELA', '3', '2');
INSERT INTO "public"."parroquias" VALUES ('55', 'LAGO SAN PEDRO', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('55', 'HONORATO VÁSQUEZ (TAMBO VIEJO)', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN JUAN DE CERRO AZUL', '3', '7');
INSERT INTO "public"."parroquias" VALUES ('55', 'SALIMA', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN JOSÉ DE QUICHINCHE', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('55', 'POZUL (SAN JUAN DE POZUL)', '4', '11');
INSERT INTO "public"."parroquias" VALUES ('55', 'SARDINAS', '4', '15');
INSERT INTO "public"."parroquias" VALUES ('55', 'SIETE DE JULIO', '4', '21');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN VICENTE DE HUATICOCHA', '4', '22');
INSERT INTO "public"."parroquias" VALUES ('55', 'LA VICTORIA', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('55', 'LA UNIÓN', '4', '8');
INSERT INTO "public"."parroquias" VALUES ('55', 'GUACHAPALA', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('55', 'LA ESPERANZA', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('55', 'SANTIAGO', '5', '14');
INSERT INTO "public"."parroquias" VALUES ('55', 'SANTIAGO', '5', '2');
INSERT INTO "public"."parroquias" VALUES ('55', 'PIARTAL', '5', '4');
INSERT INTO "public"."parroquias" VALUES ('55', 'PANSALEO', '5', '5');
INSERT INTO "public"."parroquias" VALUES ('55', '5 DE JUNIO (CAB. EN UIMBI)', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('55', 'TUMBABIRO', '6', '10');
INSERT INTO "public"."parroquias" VALUES ('55', 'EL INGENIO', '6', '11');
INSERT INTO "public"."parroquias" VALUES ('55', 'MACHALILLA', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('55', 'SANTA MARIANITA DE JESÚS', '6', '14');
INSERT INTO "public"."parroquias" VALUES ('55', 'LOMAS DE SARGENTILLO', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('55', 'QUILANGA (LA PAZ)', '7', '11');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN JOSÉ DEL PAYAMINO', '7', '15');
INSERT INTO "public"."parroquias" VALUES ('55', 'EL ROSARIO (RUMICHACA)', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN GERARDO DE PACAICAGUÁN', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('55', 'ROCAFUERTE', '7', '8');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN ANDRÉS', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('55', 'SAN BARTOLOMÉ', '9', '1');
INSERT INTO "public"."parroquias" VALUES ('55', 'OLMEDO (SANTA BÁRBARA)', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('55', 'LA CANDELARIA', '9', '6');
INSERT INTO "public"."parroquias" VALUES ('55', 'UZHCURRUMI', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('56', 'LLACAO', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('56', 'SALINAS', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('56', 'MALACATOS (VALLADOLID)', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN PLÁCIDO', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN ISIDRO', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('56', 'PUERTO NAPO', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('56', 'MONTALVO (ANDOAS)', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('56', 'CONOCOTO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('56', 'IZAMBA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('56', 'TIMBARA', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN LORENZO', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('56', 'PACAYACU', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('56', 'GARCÍA MORENO', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('56', 'EL ESFUERZO', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN JOSÉ DE ANCÓN', '1', '24');
INSERT INTO "public"."parroquias" VALUES ('56', 'PINDILIG', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('56', 'TOBAR DONOSO (LA BOCANA DE CAMUMBÍ)', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('56', 'MULALÓ', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('56', 'LICTO', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('56', 'CHUMUNDÉ', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('56', 'POSORJA', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('56', 'SARACAY', '10', '7');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN PABLO DE TENTA', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('56', 'VICTORIA', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('56', 'MALVAS', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('56', 'PEDERNALES', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('56', 'NUEVA TARQUI', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('56', 'PUCAPAMBA', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('56', 'PISTISHÍ (NARIZ DEL DIABLO)', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('56', 'MALDONADO', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('56', 'VIRGEN DE FÁTIMA', '20', '9');
INSERT INTO "public"."parroquias" VALUES ('56', 'REMIGIO CRESPO TORAL (GÚLAG)', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('56', 'QUIROGA', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('56', 'RICAURTE', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN MIGUEL DE CONCHAY', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('56', 'TAMBILLO', '3', '17');
INSERT INTO "public"."parroquias" VALUES ('56', 'RUMIPAMBA', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('56', 'INGAPIRCA', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN FRANCISCO', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN JUAN DE ILUMÁN', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('56', 'SABANILLA', '4', '11');
INSERT INTO "public"."parroquias" VALUES ('56', 'PILALÓ', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('56', 'GUARAINAG', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('56', 'TAYUZA', '5', '14');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN VICENTE', '5', '2');
INSERT INTO "public"."parroquias" VALUES ('56', 'CONCEPCIÓN', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('56', 'EL AIRO', '6', '11');
INSERT INTO "public"."parroquias" VALUES ('56', 'MEMBRILLAL', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('56', 'LOS LOJAS (ENRIQUE BAQUERIZO MORENO)', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('56', 'SACAPALCA', '7', '11');
INSERT INTO "public"."parroquias" VALUES ('56', 'SUMACO', '7', '15');
INSERT INTO "public"."parroquias" VALUES ('56', 'GARCÍA MORENO (CHUMAQUI)', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN ISIDRO DE PATULÚ', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN JOSÉ DE POALÓ', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('56', 'SAN JOSÉ DE RARANGA', '9', '1');
INSERT INTO "public"."parroquias" VALUES ('56', 'ORIANGA', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('56', 'BILBAO (CAB.EN QUILLUYACU)', '9', '6');
INSERT INTO "public"."parroquias" VALUES ('56', 'CAÑAQUEMADA', '9', '7');
INSERT INTO "public"."parroquias" VALUES ('57', 'MOLLETURO', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN ANTONIO', '1', '10');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN LUCAS', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('57', 'CHIRIJOS', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('57', 'SEVILLA DON BOSCO', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('57', 'TÁLAG', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('57', 'POMONA', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('57', 'CUMBAYÁ', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('57', 'JUAN BENIGNO VELA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('57', 'ZUMBI', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN SIMÓN (YACOTO)', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('57', 'JAMBELÍ', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('57', 'INÉS ARANGO (CAB. EN WESTERN)', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('57', 'SANTA MARÍA DEL TOACHI', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('57', 'RIVERA', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('57', 'TUFIÑO', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('57', '11 DE NOVIEMBRE (ILINCHISI)', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('57', 'PUNGALÁ', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('57', 'LAGARTO', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('57', 'PUNÁ', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN SEBASTIÁN DE YÚLUC', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('57', 'BELLAMARÍA', '12', '7');
INSERT INTO "public"."parroquias" VALUES ('57', 'MULUNCAY GRANDE', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN ISIDRO', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN MIGUEL DE CUYES', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN FRANCISCO DEL VERGEL', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('57', 'PUMALLACTA', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('57', 'PAMPANAL DE BOLÍVAR', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN JUAN', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('57', '6 DE JULIO DE CUELLAJE (CAB. EN CUELLAJE)', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN ANTONIO', '3', '13');
INSERT INTO "public"."parroquias" VALUES ('57', 'SANTA SUSANA DE CHIVIAZA (CAB. EN CHIVIAZA)', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('57', 'UYUMBICHO', '3', '17');
INSERT INTO "public"."parroquias" VALUES ('57', 'TRES DE NOVIEMBRE', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('57', 'JUNCAL', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN GREGORIO', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN PABLO', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('57', 'TNTE. MAXIMILIANO RODRÍGUEZ LOAIZA', '4', '11');
INSERT INTO "public"."parroquias" VALUES ('57', 'TINGO', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('57', 'PALMAS', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN FRANCISCO DE CHINIMBIMI', '5', '14');
INSERT INTO "public"."parroquias" VALUES ('57', 'MATAJE (CAB. EN SANTANDER)', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('57', 'PEDRO PABLO GÓMEZ', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('57', 'PIEDRAHITA (NOBOL)', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN ANTONIO DE LAS ARADAS (CAB. EN LAS ARADAS)', '7', '11');
INSERT INTO "public"."parroquias" VALUES ('57', 'GUAMBALÓ (HUAMBALÓ)', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN JOSÉ DEL CHAZO', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN MIGUELITO', '8', '18');
INSERT INTO "public"."parroquias" VALUES ('57', 'SAN ANTONIO', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('58', 'NULTI', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN PEDRO DE VILCABAMBA', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('58', 'SINAÍ', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN JUAN DE MUYUNA', '1', '15');
INSERT INTO "public"."parroquias" VALUES ('58', 'RÍO CORRIENTES', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('58', 'CHAVEZPAMBA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('58', 'MONTALVO', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN CARLOS DE LAS MINAS', '1', '19');
INSERT INTO "public"."parroquias" VALUES ('58', 'SANTA FÉ (SANTA FÉ)', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('58', 'SANTA CECILIA', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('58', 'LA BELLEZA', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN MIGUEL', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('58', 'URBINA (TAYA)', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('58', 'POALÓ', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('58', 'PUNÍN', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('58', 'LA UNIÓN', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('58', 'TENGUEL', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('58', 'SELVA ALEGRE', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('58', 'SINSAO', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN VICENTE', '14', '13');
INSERT INTO "public"."parroquias" VALUES ('58', 'EL IDEAL', '2', '14');
INSERT INTO "public"."parroquias" VALUES ('58', 'VALLADOLID', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('58', 'SEVILLA', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN FRANCISCO DE ONZOLE', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('58', 'ZHIDMAD', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('58', 'VACAS GALINDO (EL CHURO) (CAB.EN SAN MIGUEL ALTO', '3', '10');
INSERT INTO "public"."parroquias" VALUES ('58', 'YUNGANZA (CAB. EN EL ROSARIO)', '3', '14');
INSERT INTO "public"."parroquias" VALUES ('58', 'UNIÓN MILAGREÑA', '3', '22');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN ANTONIO', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN JOSÉ DE CHAMANGA (CAB.EN CHAMANGA)', '3', '8');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN RAFAEL', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('58', 'ZUMBAHUA', '4', '5');
INSERT INTO "public"."parroquias" VALUES ('58', 'PAN', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('58', 'SAN JAVIER DE CACHAVÍ (CAB. EN SAN JAVIER)', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('58', 'PUERTO DE CAYO', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('58', 'SALASACA', '7', '18');
INSERT INTO "public"."parroquias" VALUES ('58', 'SANTA FÉ DE GALÁN', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('58', 'CASANGA', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('59', 'OCTAVIO CORDERO PALACIOS (SANTA ROSA)', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('59', 'SANTIAGO', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('59', 'TAISHA', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('59', 'RÍO TIGRE', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('59', 'CHECA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('59', 'PASA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('59', 'SIMIÁTUG', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('59', 'AGUAS NEGRAS', '1', '21');
INSERT INTO "public"."parroquias" VALUES ('59', 'NUEVO PARAÍSO (CAB. EN UNIÓN', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('59', 'SOLANO', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('59', 'EL CHICAL', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('59', 'SAN JUAN DE PASTOCALLE', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('59', 'QUIMIAG', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('59', 'MAJUA', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('59', 'URDANETA (PAQUISHAPA)', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('59', 'SALVIAS', '13', '7');
INSERT INTO "public"."parroquias" VALUES ('59', 'SAN ANDRÉS', '2', '19');
INSERT INTO "public"."parroquias" VALUES ('59', 'SIBAMBE', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('59', 'SANTO DOMINGO DE ONZOLE', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('59', 'LUIS CORDERO VEGA', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('59', 'SUSCAL', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('59', 'SELVA ALEGRE (CAB.EN SAN MIGUEL DE PAMPLONA)', '4', '10');
INSERT INTO "public"."parroquias" VALUES ('59', 'SAN CRISTÓBAL (CARLOS ORDÓÑEZ LAZO)', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('59', 'SANTA RITA', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('59', 'PUERTO LÓPEZ', '6', '13');
INSERT INTO "public"."parroquias" VALUES ('59', 'VALPARAÍSO', '7', '6');
INSERT INTO "public"."parroquias" VALUES ('59', 'YAMANA', '9', '11');
INSERT INTO "public"."parroquias" VALUES ('6', 'GIL RAMÍREZ DÁVALOS', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('6', 'ANDRÉS DE VERA', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('6', 'COTOCOLLAO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('6', 'LA PENÍNSULA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('6', 'SANTO DOMINGO DE LOS COLORADOS', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('6', 'LETAMENDI', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('6', 'SAN CRISTÓBAL', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('6', 'PADRE JUAN BAUTISTA AGUIRRE', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('60', 'PACCHA', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('60', 'TAQUIL (MIGUEL RIOFRÍO)', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('60', 'ZUÑA (ZÚÑAC)', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('60', 'SANTA CLARA', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('60', 'EL QUINCHE', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('60', 'PICAIGUA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('60', 'SAN LUIS DE PAMBIL', '1', '2');
INSERT INTO "public"."parroquias" VALUES ('60', 'SAN JOSÉ DE GUAYUSA', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('60', 'TADAY', '1', '3');
INSERT INTO "public"."parroquias" VALUES ('60', 'MARISCAL SUCRE', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('60', 'SIGCHOS', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('60', 'SAN JUAN', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('60', 'MONTALVO (CAB. EN HORQUETA)', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('60', 'SUMAYPAMBA', '11', '11');
INSERT INTO "public"."parroquias" VALUES ('60', 'TIXÁN', '2', '6');
INSERT INTO "public"."parroquias" VALUES ('60', 'SELVA ALEGRE', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('60', 'SIMÓN BOLÍVAR (CAB. EN GAÑANZOL)', '3', '1');
INSERT INTO "public"."parroquias" VALUES ('60', 'TAMBO', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('60', 'SEVILLA DE ORO', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('60', 'TAMBILLO', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('61', 'QUINGEO', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('61', 'VILCABAMBA (VICTORIA)', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('61', 'TUUTINENTZA', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('61', 'SARAYACU', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('61', 'GUALEA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('61', 'PILAGÜÍN (PILAHÜÍN)', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('61', 'SAN LUIS DE ARMENIA', '1', '22');
INSERT INTO "public"."parroquias" VALUES ('61', 'SANTA MARTHA DE CUBA', '1', '4');
INSERT INTO "public"."parroquias" VALUES ('61', 'TANICUCHÍ', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('61', 'SAN LUIS', '1', '6');
INSERT INTO "public"."parroquias" VALUES ('61', 'RÍO VERDE', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('61', 'TELEMBÍ', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('61', 'ZHUD', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('61', 'TOMEBAMBA', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('61', 'TULULBÍ (CAB. EN RICAURTE)', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('62', 'RICAURTE', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('62', 'YANGANA (ARSENIO CASTILLO)', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('62', 'CUCHAENTZA', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('62', 'SIMÓN BOLÍVAR (CAB. EN MUSHULLACTA)', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('62', 'GUANGOPOLO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('62', 'QUISAPINCHA (QUIZAPINCHA)', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('62', 'TOACASO', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('62', 'ROCAFUERTE', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('62', 'COLÓN ELOY DEL MARÍA', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('62', 'VENTURA', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('62', 'DUG DUG', '5', '1');
INSERT INTO "public"."parroquias" VALUES ('62', 'URBINA', '5', '8');
INSERT INTO "public"."parroquias" VALUES ('63', 'SAN JOAQUÍN', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('63', 'QUINARA', '1', '11');
INSERT INTO "public"."parroquias" VALUES ('63', 'SAN JOSÉ DE MORONA', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('63', 'TARQUI', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('63', 'GUAYLLABAMBA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('63', 'SAN BARTOLOMÉ DE PINLLOG', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('63', 'PALO QUEMADO', '1', '5');
INSERT INTO "public"."parroquias" VALUES ('63', 'SAN MATEO', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('63', 'SAN JOSÉ DE CAYAPAS', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('63', 'DUCUR', '3', '3');
INSERT INTO "public"."parroquias" VALUES ('64', 'SANTA ANA', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('64', 'RÍO BLANCO', '1', '14');
INSERT INTO "public"."parroquias" VALUES ('64', 'TENIENTE HUGO ORTIZ', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('64', 'LA MERCED', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('64', 'SAN FERNANDO (PASA SAN FERNANDO)', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('64', 'SÚA (CAB. EN LA BOCANA)', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('64', 'TIMBIRÉ', '2', '8');
INSERT INTO "public"."parroquias" VALUES ('65', 'SAYAUSÍ', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('65', 'VERACRUZ (INDILLAMA) (CAB. EN INDILLAMA)', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('65', 'LLANO CHICO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('65', 'SANTA ROSA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('65', 'TABIAZO', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('66', 'SIDCAY', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('66', 'EL TRIUNFO', '1', '16');
INSERT INTO "public"."parroquias" VALUES ('66', 'LLOA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('66', 'TOTORAS', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('66', 'TACHINA', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('67', 'SININCAY', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('67', 'MINDO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('67', 'CUNCHIBAMBA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('67', 'TONCHIGÜE', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('68', 'TARQUI', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('68', 'NANEGAL', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('68', 'UNAMUNCHO', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('68', 'VUELTA LARGA', '1', '8');
INSERT INTO "public"."parroquias" VALUES ('69', 'TURI', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('69', 'NANEGALITO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('7', 'HUAYNACÁPAC', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('7', 'FRANCISCO PACHECO', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('7', 'CHILIBULO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('7', 'MATRIZ', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('7', 'ZARACAY', '1', '23');
INSERT INTO "public"."parroquias" VALUES ('7', 'NUEVE DE OCTUBRE', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('7', 'SIETE DE OCTUBRE', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('7', 'SANTA CLARA', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('70', 'VALLE', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('70', 'NAYÓN', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('71', 'VICTORIA DEL PORTETE (IRQUIS)', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('71', 'NONO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('72', 'PACTO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('73', 'PEDRO VICENTE MALDONADO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('74', 'PERUCHO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('75', 'PIFO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('76', 'PÍNTAG', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('77', 'POMASQUI', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('78', 'PUÉLLARO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('79', 'PUEMBO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('8', 'MACHÁNGARA', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('8', '18 DE OCTUBRE', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('8', 'CHILLOGALLO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('8', 'PISHILATA', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('8', 'OLMEDO (SAN ALEJO)', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('8', '24 DE MAYO', '5', '12');
INSERT INTO "public"."parroquias" VALUES ('8', 'VICENTE PIEDRAHITA', '6', '9');
INSERT INTO "public"."parroquias" VALUES ('80', 'SAN ANTONIO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('81', 'SAN JOSÉ DE MINAS', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('82', 'SAN MIGUEL DE LOS BANCOS', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('83', 'TABABELA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('84', 'TUMBACO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('85', 'YARUQUÍ', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('86', 'ZAMBIZA', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('87', 'PUERTO QUITO', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('9', 'MONAY', '1', '1');
INSERT INTO "public"."parroquias" VALUES ('9', 'SIMÓN BOLÍVAR', '1', '13');
INSERT INTO "public"."parroquias" VALUES ('9', 'CHIMBACALLE', '1', '17');
INSERT INTO "public"."parroquias" VALUES ('9', 'SAN FRANCISCO', '1', '18');
INSERT INTO "public"."parroquias" VALUES ('9', 'ROCA', '1', '9');
INSERT INTO "public"."parroquias" VALUES ('9', 'VENUS DEL RÍO QUEVEDO', '5', '12');

-- ----------------------------
-- Table structure for "public"."perfil_region"
-- ----------------------------
DROP TABLE "public"."perfil_region";
CREATE TABLE "public"."perfil_region" (
"estado_per_reg" varchar(1) NOT NULL,
"id_usuario" numeric NOT NULL,
"cod_rol" varchar(10) NOT NULL,
"cod_region" varchar(10) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of perfil_region
-- ----------------------------
INSERT INTO "public"."perfil_region" VALUES ('1', '1001', '1', '1');
INSERT INTO "public"."perfil_region" VALUES ('1', '1001', '1', '2');

-- ----------------------------
-- Table structure for "public"."perfiles"
-- ----------------------------
DROP TABLE "public"."perfiles";
CREATE TABLE "public"."perfiles" (
"estado_perfil" varchar(1),
"id_usuario" numeric NOT NULL,
"cod_rol" varchar(10) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
INSERT INTO "public"."perfiles" VALUES ('1', '1001', '1');

-- ----------------------------
-- Table structure for "public"."provincias"
-- ----------------------------
DROP TABLE "public"."provincias";
CREATE TABLE "public"."provincias" (
"cod_provincia" varchar(4) NOT NULL,
"nombre_provincia" varchar(60),
"cod_telefonico" varchar(2)
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of provincias
-- ----------------------------
INSERT INTO "public"."provincias" VALUES ('1', 'AZUAY', '7');
INSERT INTO "public"."provincias" VALUES ('10', 'IMBABURA', '6');
INSERT INTO "public"."provincias" VALUES ('11', 'LOJA', '7');
INSERT INTO "public"."provincias" VALUES ('12', 'LOS RIOS', '5');
INSERT INTO "public"."provincias" VALUES ('13', 'MANABI', '5');
INSERT INTO "public"."provincias" VALUES ('14', 'MORONA SANTIAGO', '7');
INSERT INTO "public"."provincias" VALUES ('15', 'NAPO', '6');
INSERT INTO "public"."provincias" VALUES ('16', 'PASTAZA', '3');
INSERT INTO "public"."provincias" VALUES ('17', 'PICHINCHA', '2');
INSERT INTO "public"."provincias" VALUES ('18', 'TUNGURAHUA', '3');
INSERT INTO "public"."provincias" VALUES ('19', 'ZAMORA CHINCHIPE', '7');
INSERT INTO "public"."provincias" VALUES ('2', 'BOLIVAR', '3');
INSERT INTO "public"."provincias" VALUES ('20', 'GALAPAGOS', '5');
INSERT INTO "public"."provincias" VALUES ('21', 'SUCUMBIOS', '6');
INSERT INTO "public"."provincias" VALUES ('22', 'ORELLANA', '6');
INSERT INTO "public"."provincias" VALUES ('23', 'SANTO DOMINGO DE LOS TSACHILAS', '2');
INSERT INTO "public"."provincias" VALUES ('24', 'SANTA ELENA', '4');
INSERT INTO "public"."provincias" VALUES ('3', 'CAÑAR', '7');
INSERT INTO "public"."provincias" VALUES ('4', 'CARCHI', '6');
INSERT INTO "public"."provincias" VALUES ('5', 'COTOPAXI', '3');
INSERT INTO "public"."provincias" VALUES ('6', 'CHIMBORAZO', '3');
INSERT INTO "public"."provincias" VALUES ('7', 'EL ORO', '7');
INSERT INTO "public"."provincias" VALUES ('8', 'ESMERALDAS', '6');
INSERT INTO "public"."provincias" VALUES ('9', 'GUAYAS', '4');
INSERT INTO "public"."provincias" VALUES ('90', 'ZONAS NO DELIMITADAS', null);

-- ----------------------------
-- Table structure for "public"."region"
-- ----------------------------
DROP TABLE "public"."region";
CREATE TABLE "public"."region" (
"cod_region" varchar(10) NOT NULL,
"nombre_region" varchar(100) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO "public"."region" VALUES ('1', 'region_prueba');
INSERT INTO "public"."region" VALUES ('2', 'region_prueba2');

-- ----------------------------
-- Table structure for "public"."regionentidades"
-- ----------------------------
DROP TABLE "public"."regionentidades";
CREATE TABLE "public"."regionentidades" (
"cod_region" varchar(10) NOT NULL,
"id_entidad" varchar(10) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of regionentidades
-- ----------------------------
INSERT INTO "public"."regionentidades" VALUES ('1', '1');
INSERT INTO "public"."regionentidades" VALUES ('1', '2');
INSERT INTO "public"."regionentidades" VALUES ('1', '3');
INSERT INTO "public"."regionentidades" VALUES ('2', '1');

-- ----------------------------
-- Table structure for "public"."rol"
-- ----------------------------
DROP TABLE "public"."rol";
CREATE TABLE "public"."rol" (
"cod_rol" varchar(10) DEFAULT nextval('sq_roles'::regclass) NOT NULL,
"nombre_rol" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO "public"."rol" VALUES ('1', 'Tecnico recursos hidricos');
INSERT INTO "public"."rol" VALUES ('10', 'GAD');
INSERT INTO "public"."rol" VALUES ('11', 'Prestador');
INSERT INTO "public"."rol" VALUES ('2', 'Coordinador recursos hidricos');
INSERT INTO "public"."rol" VALUES ('3', 'Consulta recursos hidricos');
INSERT INTO "public"."rol" VALUES ('4', 'Tecnico riego y drenaje');
INSERT INTO "public"."rol" VALUES ('5', 'Coordinador riego y drenaje');
INSERT INTO "public"."rol" VALUES ('6', 'Consulta riego y drenaje');
INSERT INTO "public"."rol" VALUES ('7', 'Tecnico agua potable');
INSERT INTO "public"."rol" VALUES ('8', 'Coordinador agua potable');
INSERT INTO "public"."rol" VALUES ('9', 'Consulta agua potable');

-- ----------------------------
-- Table structure for "public"."sop_soportes"
-- ----------------------------
DROP TABLE "public"."sop_soportes";
CREATE TABLE "public"."sop_soportes" (
"id_soportes" numeric NOT NULL,
"ruta_soporte" varchar(500),
"titulo_soporte" varchar(500),
"palabras_clave" varchar(2000),
"descripcion" text,
"fuente_soporte" varchar(500),
"autor_soporte" varchar(500),
"idioma_soporte" varchar(50),
"formato_soportes" varchar(50),
"tamanio_soportes" numeric(22,4),
"id_respuesta" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."sop_soportes" IS 'Tabla empleada para almacenar los soportes del sistema';
COMMENT ON COLUMN "public"."sop_soportes"."id_soportes" IS 'Identificador de soportes';
COMMENT ON COLUMN "public"."sop_soportes"."ruta_soporte" IS 'Ruta relativa del soporte donde se encutra el archivo';
COMMENT ON COLUMN "public"."sop_soportes"."titulo_soporte" IS 'Descripción del soporte';
COMMENT ON COLUMN "public"."sop_soportes"."palabras_clave" IS 'Palabras clave que describen el soporte';
COMMENT ON COLUMN "public"."sop_soportes"."descripcion" IS 'Texto que informa el contenido del soporte';
COMMENT ON COLUMN "public"."sop_soportes"."fuente_soporte" IS 'Procedencia del soporte de donde sale el soporte';
COMMENT ON COLUMN "public"."sop_soportes"."autor_soporte" IS 'Autor del soporte';
COMMENT ON COLUMN "public"."sop_soportes"."idioma_soporte" IS 'Idioma del soporte';
COMMENT ON COLUMN "public"."sop_soportes"."formato_soportes" IS 'Extención del soporte';
COMMENT ON COLUMN "public"."sop_soportes"."tamanio_soportes" IS 'Tamaño en bytes del soportes';
COMMENT ON COLUMN "public"."sop_soportes"."id_respuesta" IS 'respuesta al cual pertenece el soporte';

-- ----------------------------
-- Records of sop_soportes
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."tipo_acceso"
-- ----------------------------
DROP TABLE "public"."tipo_acceso";
CREATE TABLE "public"."tipo_acceso" (
"id_tipo_acceso" numeric NOT NULL,
"nombre_acceso" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of tipo_acceso
-- ----------------------------
INSERT INTO "public"."tipo_acceso" VALUES ('1', 'consulta');
INSERT INTO "public"."tipo_acceso" VALUES ('2', 'borrar');
INSERT INTO "public"."tipo_acceso" VALUES ('3', 'editar');
INSERT INTO "public"."tipo_acceso" VALUES ('4', 'crear');
INSERT INTO "public"."tipo_acceso" VALUES ('5', 'ejecutar');

-- ----------------------------
-- Table structure for "public"."tipo_entidad"
-- ----------------------------
DROP TABLE "public"."tipo_entidad";
CREATE TABLE "public"."tipo_entidad" (
"id_tipo_entidad" numeric NOT NULL,
"nombre_tipo_entidad" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of tipo_entidad
-- ----------------------------
INSERT INTO "public"."tipo_entidad" VALUES ('1', 'Canton');
INSERT INTO "public"."tipo_entidad" VALUES ('2', 'Provincia');
INSERT INTO "public"."tipo_entidad" VALUES ('3', 'Demarcacion');
INSERT INTO "public"."tipo_entidad" VALUES ('4', 'Junta de Riego');
INSERT INTO "public"."tipo_entidad" VALUES ('5', 'Junta de Agua potable');

-- ----------------------------
-- Table structure for "public"."tr_comando"
-- ----------------------------
DROP TABLE "public"."tr_comando";
CREATE TABLE "public"."tr_comando" (
"id_comando" numeric NOT NULL,
"nom_comando" varchar(500) NOT NULL,
"clase_comando" varchar(500) NOT NULL,
"hash_comando" numeric
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."tr_comando" IS 'Listado de clases que heradan del patron comando, las cuales se puede emplear dinamicamente dentro el aplicativo conforme lo tipificado en los elementos relacionales que disparan la logica del comando';
COMMENT ON COLUMN "public"."tr_comando"."id_comando" IS 'Identificador de la clase tipo comando';
COMMENT ON COLUMN "public"."tr_comando"."nom_comando" IS 'descripcion de la clase tipo comando';
COMMENT ON COLUMN "public"."tr_comando"."clase_comando" IS 'clase tipo comando';

-- ----------------------------
-- Records of tr_comando
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."tr_periodo"
-- ----------------------------
DROP TABLE "public"."tr_periodo";
CREATE TABLE "public"."tr_periodo" (
"id_periodo" int4 NOT NULL,
"nom_periodo" varchar(50) NOT NULL,
"identificador" varchar(50),
"vigencia" int4,
"id_tperiodo" int4
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."tr_periodo" IS 'Periodos de reporte de información que dependen de los diferentes tipos aca se puede ingresar los años donde se van a reportar informacion o semestres.';
COMMENT ON COLUMN "public"."tr_periodo"."id_periodo" IS 'identificador del periodo';
COMMENT ON COLUMN "public"."tr_periodo"."nom_periodo" IS 'Descripcion larga del periodo';
COMMENT ON COLUMN "public"."tr_periodo"."identificador" IS 'El identificador del periodo es el texto que identifica el periodo, por ejemplo, si tenemos un periodo anual el identificador seria 2014 , 2015 si tenemos un perido semestral la identificacion sería Primer Semestre 2015';
COMMENT ON COLUMN "public"."tr_periodo"."vigencia" IS 'Año al cual pertenece el periodo ';

-- ----------------------------
-- Records of tr_periodo
-- ----------------------------
INSERT INTO "public"."tr_periodo" VALUES ('1', 'periodo1', '1', '2017', '1');

-- ----------------------------
-- Table structure for "public"."tr_tipo_coordenada"
-- ----------------------------
DROP TABLE "public"."tr_tipo_coordenada";
CREATE TABLE "public"."tr_tipo_coordenada" (
"id_tcoordenada" int4 NOT NULL,
"nom_tcoordenada" varchar(50) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."tr_tipo_coordenada" IS 'Tipo de coordenda geografica empleada para describir la información';
COMMENT ON COLUMN "public"."tr_tipo_coordenada"."id_tcoordenada" IS 'Identificador de la coordenada';
COMMENT ON COLUMN "public"."tr_tipo_coordenada"."nom_tcoordenada" IS 'Descripción de  la coordenada';

-- ----------------------------
-- Records of tr_tipo_coordenada
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."tr_tipo_documento"
-- ----------------------------
DROP TABLE "public"."tr_tipo_documento";
CREATE TABLE "public"."tr_tipo_documento" (
"id_tdocumento" numeric NOT NULL,
"nom_tdocumento" varchar(100) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."tr_tipo_documento" IS 'Tipo de documento de la persona o empresa ';
COMMENT ON COLUMN "public"."tr_tipo_documento"."id_tdocumento" IS 'Identificador tipo de documento de la persona o empresa ';
COMMENT ON COLUMN "public"."tr_tipo_documento"."nom_tdocumento" IS 'descripción del tipo de documento de la persona o empresa ';

-- ----------------------------
-- Records of tr_tipo_documento
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."tr_tipo_natu_juridica"
-- ----------------------------
DROP TABLE "public"."tr_tipo_natu_juridica";
CREATE TABLE "public"."tr_tipo_natu_juridica" (
"id_natu_juridica" int4 NOT NULL,
"nom_natu_juridica" varchar(500) NOT NULL
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."tr_tipo_natu_juridica" IS 'Naturaleza juridica de la empresa';
COMMENT ON COLUMN "public"."tr_tipo_natu_juridica"."id_natu_juridica" IS 'Identificador de la naturaleza juridica de la empresa';
COMMENT ON COLUMN "public"."tr_tipo_natu_juridica"."nom_natu_juridica" IS 'Descripción de la naturaleza juridica de la empresa';

-- ----------------------------
-- Records of tr_tipo_natu_juridica
-- ----------------------------

-- ----------------------------
-- Table structure for "public"."tr_tipo_periodo"
-- ----------------------------
DROP TABLE "public"."tr_tipo_periodo";
CREATE TABLE "public"."tr_tipo_periodo" (
"id_tperiodo" int4 NOT NULL,
"nom_tperiodo" varchar(50)
)
WITH (OIDS=FALSE)

;
COMMENT ON TABLE "public"."tr_tipo_periodo" IS 'Indica los tipos de periodos que pueden haber, por ejemplo, anual trimestral, mensual, semestral';
COMMENT ON COLUMN "public"."tr_tipo_periodo"."id_tperiodo" IS 'Identificador del tipo de periodo';
COMMENT ON COLUMN "public"."tr_tipo_periodo"."nom_tperiodo" IS 'Nmbre del tipo de periodo';

-- ----------------------------
-- Records of tr_tipo_periodo
-- ----------------------------
INSERT INTO "public"."tr_tipo_periodo" VALUES ('1', 'periodot1');

-- ----------------------------
-- Table structure for "public"."usuarios_ap"
-- ----------------------------
DROP TABLE "public"."usuarios_ap";
CREATE TABLE "public"."usuarios_ap" (
"id_usuario" numeric DEFAULT nextval('sq_usuarios'::regclass) NOT NULL,
"usuario" varchar(50) NOT NULL,
"clave" varchar(50),
"login" varchar(50) NOT NULL,
"tipo_usuario" varchar(1),
"estado_usuario" varchar(1),
"identificacion" numeric,
"nombres" varchar(200),
"usuario_digitador" varchar(50),
"fecha_digitacion" date,
"email" varchar(200),
"authkey" varchar(250) NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of usuarios_ap
-- ----------------------------
INSERT INTO "public"."usuarios_ap" VALUES ('1001', 'diana carrillo', '123456', 'dcarrillo', '1', '1', '61259876', 'Diana carrillo', null, null, 'anaid0410@gmail.com', 'bbbmmmkk');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

-- ----------------------------
-- Indexes structure for table accesos
-- ----------------------------
CREATE INDEX "ixfk_accesos_pagina" ON "public"."accesos" USING btree ("id_pagina");
CREATE INDEX "ixfk_accesos_rol" ON "public"."accesos" USING btree ("cod_rol");
CREATE INDEX "ixfk_accesos_tipo_acceso" ON "public"."accesos" USING btree ("id_tipo_acceso");

-- ----------------------------
-- Primary Key structure for table "public"."accesos"
-- ----------------------------
ALTER TABLE "public"."accesos" ADD PRIMARY KEY ("id__acceso");

-- ----------------------------
-- Indexes structure for table cantones
-- ----------------------------
CREATE INDEX "ixfk_cantones_demarcaciones" ON "public"."cantones" USING btree ("id_demarcacion");
CREATE INDEX "ixfk_cantones_provincias" ON "public"."cantones" USING btree ("cod_provincia");

-- ----------------------------
-- Primary Key structure for table "public"."cantones"
-- ----------------------------
ALTER TABLE "public"."cantones" ADD PRIMARY KEY ("cod_canton", "cod_provincia");

-- ----------------------------
-- Primary Key structure for table "public"."centro_atencion_ciudadano"
-- ----------------------------
ALTER TABLE "public"."centro_atencion_ciudadano" ADD PRIMARY KEY ("cod_centro_atencion_ciudadano");

-- ----------------------------
-- Primary Key structure for table "public"."demarcaciones"
-- ----------------------------
ALTER TABLE "public"."demarcaciones" ADD PRIMARY KEY ("id_demarcacion");

-- ----------------------------
-- Indexes structure for table entidades
-- ----------------------------
CREATE INDEX "ixfk_entidades_cantones" ON "public"."entidades" USING btree ("cod_canton", "cod_provincia");
CREATE INDEX "ixfk_entidades_parroquias" ON "public"."entidades" USING btree ("cod_parroquia", "cod_canton_p", "cod_provincia_p");
CREATE INDEX "ixfk_entidades_tipo_entidad" ON "public"."entidades" USING btree ("id_tipo_entidad");

-- ----------------------------
-- Primary Key structure for table "public"."entidades"
-- ----------------------------
ALTER TABLE "public"."entidades" ADD PRIMARY KEY ("id_entidad");

-- ----------------------------
-- Indexes structure for table fd_adm_estado
-- ----------------------------
CREATE INDEX "ixfk_fd_adm_estado_fd_modulo" ON "public"."fd_adm_estado" USING btree ("id_modulo");
CREATE INDEX "ixfk_fd_adm_estado_rol" ON "public"."fd_adm_estado" USING btree ("cod_rol");

-- ----------------------------
-- Primary Key structure for table "public"."fd_adm_estado"
-- ----------------------------
ALTER TABLE "public"."fd_adm_estado" ADD PRIMARY KEY ("id_adm_estado");

-- ----------------------------
-- Indexes structure for table fd_agrupacion
-- ----------------------------
CREATE INDEX "ixfk_fd_agrupacion_fd_tipo_agrupacion" ON "public"."fd_agrupacion" USING btree ("id_tagrupacion");

-- ----------------------------
-- Primary Key structure for table "public"."fd_agrupacion"
-- ----------------------------
ALTER TABLE "public"."fd_agrupacion" ADD PRIMARY KEY ("id_agrupacion");

-- ----------------------------
-- Indexes structure for table fd_capitulo
-- ----------------------------
CREATE INDEX "ixfk_fd_capitulo_fd_conjunto_pregunta" ON "public"."fd_capitulo" USING btree ("id_conjunto_pregunta");
CREATE INDEX "ixfk_fd_capitulo_fd_tipo_capitulo" ON "public"."fd_capitulo" USING btree ("id_tcapitulo");
CREATE INDEX "ixfk_fd_capitulo_fd_tipo_view_cap" ON "public"."fd_capitulo" USING btree ("id_tview_cap");
CREATE INDEX "ixfk_fd_capitulo_tr_comando" ON "public"."fd_capitulo" USING btree ("id_comando");

-- ----------------------------
-- Primary Key structure for table "public"."fd_capitulo"
-- ----------------------------
ALTER TABLE "public"."fd_capitulo" ADD PRIMARY KEY ("id_capitulo");

-- ----------------------------
-- Primary Key structure for table "public"."fd_clasificacion"
-- ----------------------------
ALTER TABLE "public"."fd_clasificacion" ADD PRIMARY KEY ("id_clasificacion");

-- ----------------------------
-- Indexes structure for table fd_clasificacion_pregunta
-- ----------------------------
CREATE INDEX "ixfk_fd_clasificacion_pregunta_fd_clasificacion" ON "public"."fd_clasificacion_pregunta" USING btree ("id_clasificacion");
CREATE INDEX "ixfk_fd_clasificacion_pregunta_fd_pregunta" ON "public"."fd_clasificacion_pregunta" USING btree ("id_pregunta");

-- ----------------------------
-- Indexes structure for table fd_comando_pregunta
-- ----------------------------
CREATE INDEX "ixfk_fd_comando_pregunta_fd_pregunta" ON "public"."fd_comando_pregunta" USING btree ("id_pregunta");
CREATE INDEX "ixfk_fd_comando_pregunta_tr_comando" ON "public"."fd_comando_pregunta" USING btree ("id_comando");

-- ----------------------------
-- Indexes structure for table fd_conjunto_pregunta
-- ----------------------------
CREATE INDEX "ixfk_fd_conjunto_pregunta_fd_formato" ON "public"."fd_conjunto_pregunta" USING btree ("id_formato");
CREATE INDEX "ixfk_fd_conjunto_pregunta_fd_tipo_view_formato" ON "public"."fd_conjunto_pregunta" USING btree ("id_tipo_view_formato");
CREATE INDEX "ixfk_fd_conjunto_pregunta_fd_version" ON "public"."fd_conjunto_pregunta" USING btree ("id_version");
CREATE INDEX "ixfk_fd_conjunto_pregunta_rol" ON "public"."fd_conjunto_pregunta" USING btree ("cod_rol");

-- ----------------------------
-- Primary Key structure for table "public"."fd_conjunto_pregunta"
-- ----------------------------
ALTER TABLE "public"."fd_conjunto_pregunta" ADD PRIMARY KEY ("id_conjunto_pregunta");

-- ----------------------------
-- Indexes structure for table fd_conjunto_respuesta
-- ----------------------------
CREATE INDEX "ixfk_fd_conjunto_repuesta_entidades" ON "public"."fd_conjunto_respuesta" USING btree ("id_entidad");
CREATE INDEX "ixfk_fd_conjunto_repuesta_fd_adm_estado" ON "public"."fd_conjunto_respuesta" USING btree ("ult_id_adm_estado");
CREATE INDEX "ixfk_fd_conjunto_repuesta_fd_conjunto_pregunta" ON "public"."fd_conjunto_respuesta" USING btree ("id_conjunto_pregunta");
CREATE INDEX "ixfk_fd_conjunto_repuesta_fd_formato" ON "public"."fd_conjunto_respuesta" USING btree ("id_formato");
CREATE INDEX "ixfk_fd_conjunto_repuesta_tr_periodo" ON "public"."fd_conjunto_respuesta" USING btree ("id_periodo");

-- ----------------------------
-- Primary Key structure for table "public"."fd_conjunto_respuesta"
-- ----------------------------
ALTER TABLE "public"."fd_conjunto_respuesta" ADD PRIMARY KEY ("id_conjunto_respuesta");

-- ----------------------------
-- Indexes structure for table fd_coordenada
-- ----------------------------
CREATE INDEX "ixfk_fd_coordenada_fd_conjunto_repuesta" ON "public"."fd_coordenada" USING btree ("id_conjunto_respuesta");
CREATE INDEX "ixfk_fd_coordenada_fd_pregunta" ON "public"."fd_coordenada" USING btree ("id_pregunta");
CREATE INDEX "ixfk_fd_coordenada_fd_respuesta" ON "public"."fd_coordenada" USING btree ("id_respuesta");
CREATE INDEX "ixfk_fd_coordenada_tr_tipo_coordenada" ON "public"."fd_coordenada" USING btree ("id_tcoordenada");

-- ----------------------------
-- Primary Key structure for table "public"."fd_coordenada"
-- ----------------------------
ALTER TABLE "public"."fd_coordenada" ADD PRIMARY KEY ("id_coordenada");

-- ----------------------------
-- Indexes structure for table fd_datos_generales
-- ----------------------------
CREATE INDEX "ixfk_fd_datos_generales_fd_conjunto_repuesta" ON "public"."fd_datos_generales" USING btree ("id_conjunto_respuesta");
CREATE INDEX "ixfk_fd_datos_generales_tr_tipo_documento" ON "public"."fd_datos_generales" USING btree ("id_tdocumento");
CREATE INDEX "ixfk_fd_datos_generales_tr_tipo_natu_juridica" ON "public"."fd_datos_generales" USING btree ("id_natu_juridica");

-- ----------------------------
-- Primary Key structure for table "public"."fd_datos_generales"
-- ----------------------------
ALTER TABLE "public"."fd_datos_generales" ADD PRIMARY KEY ("id_datos_generales");

-- ----------------------------
-- Indexes structure for table fd_elemento_condicion
-- ----------------------------
CREATE INDEX "ixfk_fd_elemento_condicion_fd_adm_estado" ON "public"."fd_elemento_condicion" USING btree ("id_adm_estado");
CREATE INDEX "ixfk_fd_elemento_condicion_fd_capitulo" ON "public"."fd_elemento_condicion" USING btree ("id_capitulo_condicionado");
CREATE INDEX "ixfk_fd_elemento_condicion_fd_pregunta" ON "public"."fd_elemento_condicion" USING btree ("id_pregunta_habilitadora");
CREATE INDEX "ixfk_fd_elemento_condicion_fd_pregunta_02" ON "public"."fd_elemento_condicion" USING btree ("id_pregunta_condicionada");
CREATE INDEX "ixfk_fd_elemento_condicion_fd_tipo_condicion" ON "public"."fd_elemento_condicion" USING btree ("id_tcondicion");

-- ----------------------------
-- Primary Key structure for table "public"."fd_elemento_condicion"
-- ----------------------------
ALTER TABLE "public"."fd_elemento_condicion" ADD PRIMARY KEY ("id_condicion");

-- ----------------------------
-- Indexes structure for table fd_formato
-- ----------------------------
CREATE INDEX "ixfk_fd_formato_fd_modulo" ON "public"."fd_formato" USING btree ("id_modulo");
CREATE INDEX "ixfk_fd_formato_fd_tipo_view_formato" ON "public"."fd_formato" USING btree ("id_tipo_view_formato");
CREATE INDEX "ixfk_fd_formato_fd_version" ON "public"."fd_formato" USING btree ("ult_id_version");
CREATE INDEX "ixfk_fd_formato_rol" ON "public"."fd_formato" USING btree ("cod_rol");

-- ----------------------------
-- Primary Key structure for table "public"."fd_formato"
-- ----------------------------
ALTER TABLE "public"."fd_formato" ADD PRIMARY KEY ("id_formato");

-- ----------------------------
-- Indexes structure for table fd_historico_respuesta
-- ----------------------------
CREATE INDEX "ixfk_fd_historico_respuesta_fd_adm_estado" ON "public"."fd_historico_respuesta" USING btree ("id_adm_estado");
CREATE INDEX "ixfk_fd_historico_respuesta_fd_conjunto_repuesta" ON "public"."fd_historico_respuesta" USING btree ("id_conjunto_respuesta");

-- ----------------------------
-- Primary Key structure for table "public"."fd_historico_respuesta"
-- ----------------------------
ALTER TABLE "public"."fd_historico_respuesta" ADD PRIMARY KEY ("id_historico_respuesta");

-- ----------------------------
-- Indexes structure for table fd_involucrado
-- ----------------------------
CREATE INDEX "ixfk_fd_involucrado_fd_conjunto_repuesta" ON "public"."fd_involucrado" USING btree ("id_conjunto_respuesta");
CREATE INDEX "ixfk_fd_involucrado_fd_pregunta" ON "public"."fd_involucrado" USING btree ("id_pregunta");
CREATE INDEX "ixfk_fd_involucrado_fd_respuesta" ON "public"."fd_involucrado" USING btree ("id_respuesta");

-- ----------------------------
-- Primary Key structure for table "public"."fd_involucrado"
-- ----------------------------
ALTER TABLE "public"."fd_involucrado" ADD PRIMARY KEY ("id_involucrado");

-- ----------------------------
-- Primary Key structure for table "public"."fd_modulo"
-- ----------------------------
ALTER TABLE "public"."fd_modulo" ADD PRIMARY KEY ("id_modulo");

-- ----------------------------
-- Indexes structure for table fd_opcion_select
-- ----------------------------
CREATE INDEX "ixfk_fd_opcion_select_fd_tipo_select" ON "public"."fd_opcion_select" USING btree ("id_tselect");

-- ----------------------------
-- Primary Key structure for table "public"."fd_opcion_select"
-- ----------------------------
ALTER TABLE "public"."fd_opcion_select" ADD PRIMARY KEY ("id_opcion_select");

-- ----------------------------
-- Indexes structure for table fd_periodo_formato
-- ----------------------------
CREATE INDEX "ixfk_fd_periodo_formato_fd_formato" ON "public"."fd_periodo_formato" USING btree ("id_formato");
CREATE INDEX "ixfk_fd_periodo_formato_tr_periodo" ON "public"."fd_periodo_formato" USING btree ("id_periodo");

-- ----------------------------
-- Primary Key structure for table "public"."fd_periodo_formato"
-- ----------------------------
ALTER TABLE "public"."fd_periodo_formato" ADD PRIMARY KEY ("id_formato", "id_periodo");

-- ----------------------------
-- Indexes structure for table fd_pregunta
-- ----------------------------
CREATE INDEX "ixfk_fd_pregunta_fd_agrupacion" ON "public"."fd_pregunta" USING btree ("id_agrupacion");
CREATE INDEX "ixfk_fd_pregunta_fd_capitulo" ON "public"."fd_pregunta" USING btree ("id_capitulo");
CREATE INDEX "ixfk_fd_pregunta_fd_conjunto_pregunta" ON "public"."fd_pregunta" USING btree ("id_conjunto_pregunta");
CREATE INDEX "ixfk_fd_pregunta_fd_seccion" ON "public"."fd_pregunta" USING btree ("id_seccion");
CREATE INDEX "ixfk_fd_pregunta_fd_tipo_pregunta" ON "public"."fd_pregunta" USING btree ("id_tpregunta");
CREATE INDEX "ixfk_fd_pregunta_fd_tipo_select" ON "public"."fd_pregunta" USING btree ("id_tselect");

-- ----------------------------
-- Primary Key structure for table "public"."fd_pregunta"
-- ----------------------------
ALTER TABLE "public"."fd_pregunta" ADD PRIMARY KEY ("id_pregunta");

-- ----------------------------
-- Indexes structure for table fd_pregunta_descendiente
-- ----------------------------
CREATE INDEX "ixfk_fd_pregunta_descendiente_fd_pregunta" ON "public"."fd_pregunta_descendiente" USING btree ("id_pregunta_descendiente");
CREATE INDEX "ixfk_fd_pregunta_descendiente_fd_pregunta_02" ON "public"."fd_pregunta_descendiente" USING btree ("id_pregunta_padre");
CREATE INDEX "ixfk_fd_pregunta_descendiente_fd_version" ON "public"."fd_pregunta_descendiente" USING btree ("id_version_descendiente");
CREATE INDEX "ixfk_fd_pregunta_descendiente_fd_version_02" ON "public"."fd_pregunta_descendiente" USING btree ("id_version_padre");

-- ----------------------------
-- Indexes structure for table fd_respuesta
-- ----------------------------
CREATE INDEX "ixfk_fd_respuesta_fd_capitulo" ON "public"."fd_respuesta" USING btree ("id_capitulo");
CREATE INDEX "ixfk_fd_respuesta_fd_conjunto_pregunta" ON "public"."fd_respuesta" USING btree ("id_conjunto_pregunta");
CREATE INDEX "ixfk_fd_respuesta_fd_conjunto_repuesta" ON "public"."fd_respuesta" USING btree ("id_conjunto_respuesta");
CREATE INDEX "ixfk_fd_respuesta_fd_formato" ON "public"."fd_respuesta" USING btree ("id_formato");
CREATE INDEX "ixfk_fd_respuesta_fd_opcion_select" ON "public"."fd_respuesta" USING btree ("id_opcion_select");
CREATE INDEX "ixfk_fd_respuesta_fd_pregunta" ON "public"."fd_respuesta" USING btree ("id_pregunta");
CREATE INDEX "ixfk_fd_respuesta_fd_tipo_pregunta" ON "public"."fd_respuesta" USING btree ("id_tpregunta");
CREATE INDEX "ixfk_fd_respuesta_fd_version" ON "public"."fd_respuesta" USING btree ("id_version");

-- ----------------------------
-- Primary Key structure for table "public"."fd_respuesta"
-- ----------------------------
ALTER TABLE "public"."fd_respuesta" ADD PRIMARY KEY ("id_respuesta");

-- ----------------------------
-- Indexes structure for table fd_respuesta_x_mes
-- ----------------------------
CREATE INDEX "ixfk_fd_respuesta_x_mes_fd_opcion_select" ON "public"."fd_respuesta_x_mes" USING btree ("id_opcion_select");
CREATE INDEX "ixfk_fd_respuesta_x_mes_fd_pregunta" ON "public"."fd_respuesta_x_mes" USING btree ("id_pregunta");
CREATE INDEX "ixfk_fd_respuesta_x_mes_fd_respuesta" ON "public"."fd_respuesta_x_mes" USING btree ("id_respuesta");

-- ----------------------------
-- Primary Key structure for table "public"."fd_respuesta_x_mes"
-- ----------------------------
ALTER TABLE "public"."fd_respuesta_x_mes" ADD PRIMARY KEY ("id_respuesta_x_mes");

-- ----------------------------
-- Indexes structure for table fd_seccion
-- ----------------------------
CREATE INDEX "ixfk_fd_seccion_fd_capitulo" ON "public"."fd_seccion" USING btree ("id_capitulo");

-- ----------------------------
-- Primary Key structure for table "public"."fd_seccion"
-- ----------------------------
ALTER TABLE "public"."fd_seccion" ADD PRIMARY KEY ("id_seccion");

-- ----------------------------
-- Primary Key structure for table "public"."fd_tipo_agrupacion"
-- ----------------------------
ALTER TABLE "public"."fd_tipo_agrupacion" ADD PRIMARY KEY ("id_tagrupacion");

-- ----------------------------
-- Primary Key structure for table "public"."fd_tipo_capitulo"
-- ----------------------------
ALTER TABLE "public"."fd_tipo_capitulo" ADD PRIMARY KEY ("id_tcapitulo");

-- ----------------------------
-- Primary Key structure for table "public"."fd_tipo_condicion"
-- ----------------------------
ALTER TABLE "public"."fd_tipo_condicion" ADD PRIMARY KEY ("id_tcondicion");

-- ----------------------------
-- Primary Key structure for table "public"."fd_tipo_pregunta"
-- ----------------------------
ALTER TABLE "public"."fd_tipo_pregunta" ADD PRIMARY KEY ("id_tpregunta");

-- ----------------------------
-- Primary Key structure for table "public"."fd_tipo_select"
-- ----------------------------
ALTER TABLE "public"."fd_tipo_select" ADD PRIMARY KEY ("id_tselect");

-- ----------------------------
-- Primary Key structure for table "public"."fd_tipo_view_cap"
-- ----------------------------
ALTER TABLE "public"."fd_tipo_view_cap" ADD PRIMARY KEY ("id_tview_cap");

-- ----------------------------
-- Primary Key structure for table "public"."fd_tipo_view_formato"
-- ----------------------------
ALTER TABLE "public"."fd_tipo_view_formato" ADD PRIMARY KEY ("id_tipo_view_formato");

-- ----------------------------
-- Indexes structure for table fd_ubicacion
-- ----------------------------
CREATE INDEX "ixfk_fd_ubicacion_centro_atencion_ciudadano" ON "public"."fd_ubicacion" USING btree ("cod_centro_atencion_ciudadano");
CREATE INDEX "ixfk_fd_ubicacion_demarcaciones" ON "public"."fd_ubicacion" USING btree ("id_demarcacion");
CREATE INDEX "ixfk_fd_ubicacion_fd_conjunto_repuesta" ON "public"."fd_ubicacion" USING btree ("id_conjunto_respuesta");
CREATE INDEX "ixfk_fd_ubicacion_fd_pregunta" ON "public"."fd_ubicacion" USING btree ("id_pregunta");
CREATE INDEX "ixfk_fd_ubicacion_fd_respuesta" ON "public"."fd_ubicacion" USING btree ("id_respuesta");
CREATE INDEX "ixfk_fd_ubicacion_parroquias" ON "public"."fd_ubicacion" USING btree ("cod_parroquia", "cod_canton", "cod_provincia");

-- ----------------------------
-- Primary Key structure for table "public"."fd_ubicacion"
-- ----------------------------
ALTER TABLE "public"."fd_ubicacion" ADD PRIMARY KEY ("id_ubicacion");

-- ----------------------------
-- Primary Key structure for table "public"."fd_version"
-- ----------------------------
ALTER TABLE "public"."fd_version" ADD PRIMARY KEY ("id_version");

-- ----------------------------
-- Primary Key structure for table "public"."pagina"
-- ----------------------------
ALTER TABLE "public"."pagina" ADD PRIMARY KEY ("id_pagina");

-- ----------------------------
-- Indexes structure for table parroquias
-- ----------------------------
CREATE INDEX "ixfk_parroquias_cantones" ON "public"."parroquias" USING btree ("cod_canton", "cod_provincia");

-- ----------------------------
-- Primary Key structure for table "public"."parroquias"
-- ----------------------------
ALTER TABLE "public"."parroquias" ADD PRIMARY KEY ("cod_parroquia", "cod_canton", "cod_provincia");

-- ----------------------------
-- Indexes structure for table perfil_region
-- ----------------------------
CREATE INDEX "ixfk_perfil_region_perfiles" ON "public"."perfil_region" USING btree ("id_usuario", "cod_rol");
CREATE INDEX "ixfk_perfil_region_region" ON "public"."perfil_region" USING btree ("cod_region");

-- ----------------------------
-- Primary Key structure for table "public"."perfil_region"
-- ----------------------------
ALTER TABLE "public"."perfil_region" ADD PRIMARY KEY ("id_usuario", "cod_rol", "cod_region");

-- ----------------------------
-- Indexes structure for table perfiles
-- ----------------------------
CREATE INDEX "ixfk_perfiles_rol" ON "public"."perfiles" USING btree ("cod_rol");
CREATE INDEX "ixfk_perfiles_usuarios_ap" ON "public"."perfiles" USING btree ("id_usuario");

-- ----------------------------
-- Primary Key structure for table "public"."perfiles"
-- ----------------------------
ALTER TABLE "public"."perfiles" ADD PRIMARY KEY ("id_usuario", "cod_rol");

-- ----------------------------
-- Primary Key structure for table "public"."provincias"
-- ----------------------------
ALTER TABLE "public"."provincias" ADD PRIMARY KEY ("cod_provincia");

-- ----------------------------
-- Primary Key structure for table "public"."region"
-- ----------------------------
ALTER TABLE "public"."region" ADD PRIMARY KEY ("cod_region");

-- ----------------------------
-- Indexes structure for table regionentidades
-- ----------------------------
CREATE INDEX "ixfk_regionentidades_entidades" ON "public"."regionentidades" USING btree ("id_entidad");
CREATE INDEX "ixfk_regionentidades_region" ON "public"."regionentidades" USING btree ("cod_region");

-- ----------------------------
-- Primary Key structure for table "public"."regionentidades"
-- ----------------------------
ALTER TABLE "public"."regionentidades" ADD PRIMARY KEY ("cod_region", "id_entidad");

-- ----------------------------
-- Primary Key structure for table "public"."rol"
-- ----------------------------
ALTER TABLE "public"."rol" ADD PRIMARY KEY ("cod_rol");

-- ----------------------------
-- Indexes structure for table sop_soportes
-- ----------------------------
CREATE INDEX "ixfk_sop_soportes_fd_respuesta" ON "public"."sop_soportes" USING btree ("id_respuesta");

-- ----------------------------
-- Primary Key structure for table "public"."sop_soportes"
-- ----------------------------
ALTER TABLE "public"."sop_soportes" ADD PRIMARY KEY ("id_soportes");

-- ----------------------------
-- Primary Key structure for table "public"."tipo_acceso"
-- ----------------------------
ALTER TABLE "public"."tipo_acceso" ADD PRIMARY KEY ("id_tipo_acceso");

-- ----------------------------
-- Primary Key structure for table "public"."tipo_entidad"
-- ----------------------------
ALTER TABLE "public"."tipo_entidad" ADD PRIMARY KEY ("id_tipo_entidad");

-- ----------------------------
-- Primary Key structure for table "public"."tr_comando"
-- ----------------------------
ALTER TABLE "public"."tr_comando" ADD PRIMARY KEY ("id_comando");

-- ----------------------------
-- Indexes structure for table tr_periodo
-- ----------------------------
CREATE INDEX "ixfk_tr_periodo_tr_tipo_periodo" ON "public"."tr_periodo" USING btree ("id_tperiodo");

-- ----------------------------
-- Primary Key structure for table "public"."tr_periodo"
-- ----------------------------
ALTER TABLE "public"."tr_periodo" ADD PRIMARY KEY ("id_periodo");

-- ----------------------------
-- Primary Key structure for table "public"."tr_tipo_coordenada"
-- ----------------------------
ALTER TABLE "public"."tr_tipo_coordenada" ADD PRIMARY KEY ("id_tcoordenada");

-- ----------------------------
-- Primary Key structure for table "public"."tr_tipo_documento"
-- ----------------------------
ALTER TABLE "public"."tr_tipo_documento" ADD PRIMARY KEY ("id_tdocumento");

-- ----------------------------
-- Primary Key structure for table "public"."tr_tipo_natu_juridica"
-- ----------------------------
ALTER TABLE "public"."tr_tipo_natu_juridica" ADD PRIMARY KEY ("id_natu_juridica");

-- ----------------------------
-- Primary Key structure for table "public"."tr_tipo_periodo"
-- ----------------------------
ALTER TABLE "public"."tr_tipo_periodo" ADD PRIMARY KEY ("id_tperiodo");

-- ----------------------------
-- Primary Key structure for table "public"."usuarios_ap"
-- ----------------------------
ALTER TABLE "public"."usuarios_ap" ADD PRIMARY KEY ("id_usuario");

-- ----------------------------
-- Foreign Key structure for table "public"."accesos"
-- ----------------------------
ALTER TABLE "public"."accesos" ADD FOREIGN KEY ("id_tipo_acceso") REFERENCES "public"."tipo_acceso" ("id_tipo_acceso") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."accesos" ADD FOREIGN KEY ("id_pagina") REFERENCES "public"."pagina" ("id_pagina") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."accesos" ADD FOREIGN KEY ("cod_rol") REFERENCES "public"."rol" ("cod_rol") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."cantones"
-- ----------------------------
ALTER TABLE "public"."cantones" ADD FOREIGN KEY ("cod_provincia") REFERENCES "public"."provincias" ("cod_provincia") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."cantones" ADD FOREIGN KEY ("id_demarcacion") REFERENCES "public"."demarcaciones" ("id_demarcacion") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."entidades"
-- ----------------------------
ALTER TABLE "public"."entidades" ADD FOREIGN KEY ("cod_parroquia", "cod_canton_p", "cod_provincia_p") REFERENCES "public"."parroquias" ("cod_parroquia", "cod_canton", "cod_provincia") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."entidades" ADD FOREIGN KEY ("cod_canton", "cod_provincia") REFERENCES "public"."cantones" ("cod_canton", "cod_provincia") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."entidades" ADD FOREIGN KEY ("id_tipo_entidad") REFERENCES "public"."tipo_entidad" ("id_tipo_entidad") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_adm_estado"
-- ----------------------------
ALTER TABLE "public"."fd_adm_estado" ADD FOREIGN KEY ("id_modulo") REFERENCES "public"."fd_modulo" ("id_modulo") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_agrupacion"
-- ----------------------------
ALTER TABLE "public"."fd_agrupacion" ADD FOREIGN KEY ("id_tagrupacion") REFERENCES "public"."fd_tipo_agrupacion" ("id_tagrupacion") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_capitulo"
-- ----------------------------
ALTER TABLE "public"."fd_capitulo" ADD FOREIGN KEY ("id_comando") REFERENCES "public"."tr_comando" ("id_comando") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_capitulo" ADD FOREIGN KEY ("id_conjunto_pregunta") REFERENCES "public"."fd_conjunto_pregunta" ("id_conjunto_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_capitulo" ADD FOREIGN KEY ("id_tcapitulo") REFERENCES "public"."fd_tipo_capitulo" ("id_tcapitulo") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_capitulo" ADD FOREIGN KEY ("id_tview_cap") REFERENCES "public"."fd_tipo_view_cap" ("id_tview_cap") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_clasificacion_pregunta"
-- ----------------------------
ALTER TABLE "public"."fd_clasificacion_pregunta" ADD FOREIGN KEY ("id_clasificacion") REFERENCES "public"."fd_clasificacion" ("id_clasificacion") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_clasificacion_pregunta" ADD FOREIGN KEY ("id_pregunta") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_comando_pregunta"
-- ----------------------------
ALTER TABLE "public"."fd_comando_pregunta" ADD FOREIGN KEY ("id_pregunta") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_comando_pregunta" ADD FOREIGN KEY ("id_comando") REFERENCES "public"."tr_comando" ("id_comando") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_conjunto_pregunta"
-- ----------------------------
ALTER TABLE "public"."fd_conjunto_pregunta" ADD FOREIGN KEY ("id_formato") REFERENCES "public"."fd_formato" ("id_formato") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_conjunto_pregunta" ADD FOREIGN KEY ("id_version") REFERENCES "public"."fd_version" ("id_version") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_conjunto_pregunta" ADD FOREIGN KEY ("id_tipo_view_formato") REFERENCES "public"."fd_tipo_view_formato" ("id_tipo_view_formato") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_conjunto_respuesta"
-- ----------------------------
ALTER TABLE "public"."fd_conjunto_respuesta" ADD FOREIGN KEY ("ult_id_adm_estado") REFERENCES "public"."fd_adm_estado" ("id_adm_estado") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_conjunto_respuesta" ADD FOREIGN KEY ("id_formato") REFERENCES "public"."fd_formato" ("id_formato") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_conjunto_respuesta" ADD FOREIGN KEY ("id_periodo") REFERENCES "public"."tr_periodo" ("id_periodo") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_conjunto_respuesta" ADD FOREIGN KEY ("id_conjunto_pregunta") REFERENCES "public"."fd_conjunto_pregunta" ("id_conjunto_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_coordenada"
-- ----------------------------
ALTER TABLE "public"."fd_coordenada" ADD FOREIGN KEY ("id_respuesta") REFERENCES "public"."fd_respuesta" ("id_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_coordenada" ADD FOREIGN KEY ("id_tcoordenada") REFERENCES "public"."tr_tipo_coordenada" ("id_tcoordenada") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_coordenada" ADD FOREIGN KEY ("id_conjunto_respuesta") REFERENCES "public"."fd_conjunto_respuesta" ("id_conjunto_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_coordenada" ADD FOREIGN KEY ("id_pregunta") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_datos_generales"
-- ----------------------------
ALTER TABLE "public"."fd_datos_generales" ADD FOREIGN KEY ("id_natu_juridica") REFERENCES "public"."tr_tipo_natu_juridica" ("id_natu_juridica") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_datos_generales" ADD FOREIGN KEY ("id_tdocumento") REFERENCES "public"."tr_tipo_documento" ("id_tdocumento") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_datos_generales" ADD FOREIGN KEY ("id_conjunto_respuesta") REFERENCES "public"."fd_conjunto_respuesta" ("id_conjunto_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_elemento_condicion"
-- ----------------------------
ALTER TABLE "public"."fd_elemento_condicion" ADD FOREIGN KEY ("id_capitulo_condicionado") REFERENCES "public"."fd_capitulo" ("id_capitulo") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_elemento_condicion" ADD FOREIGN KEY ("id_adm_estado") REFERENCES "public"."fd_adm_estado" ("id_adm_estado") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_elemento_condicion" ADD FOREIGN KEY ("id_tcondicion") REFERENCES "public"."fd_tipo_condicion" ("id_tcondicion") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_elemento_condicion" ADD FOREIGN KEY ("id_pregunta_condicionada") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_elemento_condicion" ADD FOREIGN KEY ("id_pregunta_habilitadora") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_formato"
-- ----------------------------
ALTER TABLE "public"."fd_formato" ADD FOREIGN KEY ("ult_id_version") REFERENCES "public"."fd_version" ("id_version") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_formato" ADD FOREIGN KEY ("id_modulo") REFERENCES "public"."fd_modulo" ("id_modulo") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_formato" ADD FOREIGN KEY ("id_tipo_view_formato") REFERENCES "public"."fd_tipo_view_formato" ("id_tipo_view_formato") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_historico_respuesta"
-- ----------------------------
ALTER TABLE "public"."fd_historico_respuesta" ADD FOREIGN KEY ("id_adm_estado") REFERENCES "public"."fd_adm_estado" ("id_adm_estado") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_historico_respuesta" ADD FOREIGN KEY ("id_conjunto_respuesta") REFERENCES "public"."fd_conjunto_respuesta" ("id_conjunto_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_involucrado"
-- ----------------------------
ALTER TABLE "public"."fd_involucrado" ADD FOREIGN KEY ("id_respuesta") REFERENCES "public"."fd_respuesta" ("id_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_involucrado" ADD FOREIGN KEY ("id_conjunto_respuesta") REFERENCES "public"."fd_conjunto_respuesta" ("id_conjunto_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_involucrado" ADD FOREIGN KEY ("id_pregunta") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_opcion_select"
-- ----------------------------
ALTER TABLE "public"."fd_opcion_select" ADD FOREIGN KEY ("id_tselect") REFERENCES "public"."fd_tipo_select" ("id_tselect") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_periodo_formato"
-- ----------------------------
ALTER TABLE "public"."fd_periodo_formato" ADD FOREIGN KEY ("id_formato") REFERENCES "public"."fd_formato" ("id_formato") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_periodo_formato" ADD FOREIGN KEY ("id_periodo") REFERENCES "public"."tr_periodo" ("id_periodo") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_pregunta"
-- ----------------------------
ALTER TABLE "public"."fd_pregunta" ADD FOREIGN KEY ("id_tselect") REFERENCES "public"."fd_tipo_select" ("id_tselect") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_pregunta" ADD FOREIGN KEY ("id_capitulo") REFERENCES "public"."fd_capitulo" ("id_capitulo") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_pregunta" ADD FOREIGN KEY ("id_conjunto_pregunta") REFERENCES "public"."fd_conjunto_pregunta" ("id_conjunto_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_pregunta" ADD FOREIGN KEY ("id_seccion") REFERENCES "public"."fd_seccion" ("id_seccion") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_pregunta" ADD FOREIGN KEY ("id_tpregunta") REFERENCES "public"."fd_tipo_pregunta" ("id_tpregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_pregunta" ADD FOREIGN KEY ("id_agrupacion") REFERENCES "public"."fd_agrupacion" ("id_agrupacion") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_pregunta_descendiente"
-- ----------------------------
ALTER TABLE "public"."fd_pregunta_descendiente" ADD FOREIGN KEY ("id_version_padre") REFERENCES "public"."fd_version" ("id_version") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_pregunta_descendiente" ADD FOREIGN KEY ("id_pregunta_descendiente") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_pregunta_descendiente" ADD FOREIGN KEY ("id_pregunta_padre") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_pregunta_descendiente" ADD FOREIGN KEY ("id_version_descendiente") REFERENCES "public"."fd_version" ("id_version") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_respuesta"
-- ----------------------------
ALTER TABLE "public"."fd_respuesta" ADD FOREIGN KEY ("id_conjunto_respuesta") REFERENCES "public"."fd_conjunto_respuesta" ("id_conjunto_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta" ADD FOREIGN KEY ("id_version") REFERENCES "public"."fd_version" ("id_version") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta" ADD FOREIGN KEY ("id_tpregunta") REFERENCES "public"."fd_tipo_pregunta" ("id_tpregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta" ADD FOREIGN KEY ("id_pregunta") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta" ADD FOREIGN KEY ("id_opcion_select") REFERENCES "public"."fd_opcion_select" ("id_opcion_select") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta" ADD FOREIGN KEY ("id_formato") REFERENCES "public"."fd_formato" ("id_formato") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta" ADD FOREIGN KEY ("id_capitulo") REFERENCES "public"."fd_capitulo" ("id_capitulo") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta" ADD FOREIGN KEY ("id_conjunto_pregunta") REFERENCES "public"."fd_conjunto_pregunta" ("id_conjunto_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_respuesta_x_mes"
-- ----------------------------
ALTER TABLE "public"."fd_respuesta_x_mes" ADD FOREIGN KEY ("id_respuesta") REFERENCES "public"."fd_respuesta" ("id_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta_x_mes" ADD FOREIGN KEY ("id_opcion_select") REFERENCES "public"."fd_opcion_select" ("id_opcion_select") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_respuesta_x_mes" ADD FOREIGN KEY ("id_pregunta") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_seccion"
-- ----------------------------
ALTER TABLE "public"."fd_seccion" ADD FOREIGN KEY ("id_capitulo") REFERENCES "public"."fd_capitulo" ("id_capitulo") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."fd_ubicacion"
-- ----------------------------
ALTER TABLE "public"."fd_ubicacion" ADD FOREIGN KEY ("id_respuesta") REFERENCES "public"."fd_respuesta" ("id_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_ubicacion" ADD FOREIGN KEY ("cod_centro_atencion_ciudadano") REFERENCES "public"."centro_atencion_ciudadano" ("cod_centro_atencion_ciudadano") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_ubicacion" ADD FOREIGN KEY ("id_conjunto_respuesta") REFERENCES "public"."fd_conjunto_respuesta" ("id_conjunto_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."fd_ubicacion" ADD FOREIGN KEY ("id_pregunta") REFERENCES "public"."fd_pregunta" ("id_pregunta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."parroquias"
-- ----------------------------
ALTER TABLE "public"."parroquias" ADD FOREIGN KEY ("cod_canton", "cod_provincia") REFERENCES "public"."cantones" ("cod_canton", "cod_provincia") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."perfil_region"
-- ----------------------------
ALTER TABLE "public"."perfil_region" ADD FOREIGN KEY ("cod_region") REFERENCES "public"."region" ("cod_region") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."perfil_region" ADD FOREIGN KEY ("id_usuario", "cod_rol") REFERENCES "public"."perfiles" ("id_usuario", "cod_rol") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."perfiles"
-- ----------------------------
ALTER TABLE "public"."perfiles" ADD FOREIGN KEY ("cod_rol") REFERENCES "public"."rol" ("cod_rol") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."perfiles" ADD FOREIGN KEY ("id_usuario") REFERENCES "public"."usuarios_ap" ("id_usuario") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."regionentidades"
-- ----------------------------
ALTER TABLE "public"."regionentidades" ADD FOREIGN KEY ("cod_region") REFERENCES "public"."region" ("cod_region") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."regionentidades" ADD FOREIGN KEY ("id_entidad") REFERENCES "public"."entidades" ("id_entidad") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."sop_soportes"
-- ----------------------------
ALTER TABLE "public"."sop_soportes" ADD FOREIGN KEY ("id_respuesta") REFERENCES "public"."fd_respuesta" ("id_respuesta") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."tr_periodo"
-- ----------------------------
ALTER TABLE "public"."tr_periodo" ADD FOREIGN KEY ("id_tperiodo") REFERENCES "public"."tr_tipo_periodo" ("id_tperiodo") ON DELETE NO ACTION ON UPDATE NO ACTION;
