--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.12
-- Dumped by pg_dump version 9.6.2

-- Started on 2017-04-29 00:06:46

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

--
-- TOC entry 2482 (class 0 OID 32896)
-- Dependencies: 188
-- Data for Name: cantones; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '4', 'TULCÁN', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '5', 'LATACUNGA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '8', 'ESMERALDAS', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '7', 'MACHALA', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '9', 'GUAYAQUIL', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '10', 'IBARRA', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '11', 'LOJA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '13', 'PORTOVIEJO', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '14', 'MORONA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '15', 'TENA', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '16', 'PASTAZA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '2', 'CHILLANES', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '3', 'BIBLIÁN', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '4', 'BOLÍVAR', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '5', 'LA MANÁ', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '7', 'ARENILLAS', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '8', 'ELOY ALFARO', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '10', 'ANTONIO ANTE', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '11', 'CALVAS', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '12', 'BABA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '13', 'BOLÍVAR', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '14', 'GUALAQUIZA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '1', 'GUALACEO', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '2', 'CHIMBO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '3', 'CAÑAR', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '4', 'ESPEJO', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '8', 'MUISNE', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '11', 'CATAMAYO', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '12', 'MONTALVO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '15', 'ARCHIDONA', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '1', 'NABÓN', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '2', 'ECHEANDÍA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '3', 'LA TRONCAL', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '4', 'MIRA', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '7', 'BALSAS', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '8', 'QUININDÉ', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '9', 'BALZAR', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '11', 'CELICA', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '12', 'PUEBLOVIEJO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '14', 'PALORA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '2', 'SAN MIGUEL', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '3', 'EL TAMBO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '4', 'MONTÚFAR', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '6', 'CHUNCHI', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '7', 'CHILLA', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '8', 'SAN LORENZO', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '9', 'COLIMES', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '11', 'CHAGUARPAMBA', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '12', 'QUEVEDO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '14', 'SANTIAGO', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '2', 'CALUMA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '3', 'DÉLEG', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '4', 'SAN PEDRO DE HUACA', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '5', 'SAQUISILÍ', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '6', 'GUAMOTE', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '8', 'ATACAMES', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '9', 'DAULE', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '11', 'ESPÍNDOLA', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '12', 'URDANETA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '14', 'SUCÚA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '1', 'SAN FERNANDO', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '2', 'LAS NAVES', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '3', 'SUSCAL', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '6', 'GUANO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '7', 'HUAQUILLAS', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '8', 'RIOVERDE', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '9', 'DURÁN', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '12', 'VENTANAS', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '13', 'JUNÍN', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '14', 'HUAMBOYA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '15', 'QUIJOS', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '6', 'PALLATANGA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '7', 'MARCABELÍ', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '8', 'LA CONCORDIA', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '9', 'EL EMPALME', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '11', 'MACARÁ', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '12', 'VÍNCES', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '13', 'MANTA', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '6', 'PENIPE', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '7', 'PASAJE', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '9', 'EL TRIUNFO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '12', 'PALENQUE', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '13', 'MONTECRISTI', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '14', 'TAISHA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('10', '1', 'OÑA', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('10', '6', 'CUMANDÁ', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('10', '9', 'MILAGRO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('10', '11', 'PUYANGO', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('10', '12', 'BUENA FÉ', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('11', '1', 'CHORDELEG', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('11', '7', 'PORTOVELO', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('11', '11', 'SARAGURO', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('11', '14', 'PABLO SEXTO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('12', '1', 'EL PAN', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('12', '11', 'SOZORANGA', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('12', '12', 'MOCACHE', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('12', '13', 'ROCAFUERTE', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('12', '14', 'TIWINTZA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('13', '9', 'PALESTINA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('13', '11', 'ZAPOTILLO', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('15', '13', 'TOSAGUA', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '1', 'CUENCA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '2', 'GUARANDA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '6', 'RIOBAMBA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '12', 'BABAHOYO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '17', 'QUITO', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '18', 'AMBATO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '19', 'ZAMORA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '21', 'LAGO AGRIO', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '22', 'ORELLANA', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '23', 'SANTO DOMINGO', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '24', 'SANTA ELENA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '90', 'LAS GOLONDRINAS', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '1', 'GIRÓN', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '6', 'ALAUSI', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '9', 'ALFREDO BAQUERIZO MORENO (JUJÁN)', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '16', 'MERA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '17', 'CAYAMBE', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '18', 'BAÑOS DE AGUA SANTA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('16', '9', 'SAMBORONDÓN', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('16', '11', 'OLMEDO', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '19', 'ZAMORA CHINCHIPE', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '21', 'GONZALO PIZARRO', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '22', 'AGUARICO', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '24', 'LA LIBERTAD', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '5', 'PANGUA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '14', 'LIMÓN INDANZA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '16', 'SANTA CLARA', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '17', 'MEJIA', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '18', 'CEVALLOS', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '19', 'NANGARITZA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '21', 'PUTUMAYO', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '22', 'LA JOYA DE LOS SACHAS', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '24', 'SALINAS', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '90', 'MANGA DEL CURA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '6', 'CHAMBO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '1', 'SIGSIG', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '5', 'PUJILI', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '3', 'AZOGUES', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '6', 'COLTA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '7', 'ATAHUALPA', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('10', '7', 'PIÑAS', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('12', '7', 'SANTA ROSA', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('13', '7', 'ZARUMA', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '9', 'BALAO', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '10', 'COTACACHI', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('11', '9', 'NARANJAL', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '13', 'CHONE', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '13', 'JIPIJAPA', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '13', 'FLAVIO ALFARO', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('10', '13', 'PAJÁN', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('11', '13', 'PICHINCHA', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('3', '20', 'SANTA CRUZ', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '15', 'EL CHACO', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '16', 'ARAJUNO', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '17', 'PEDRO MONCAYO', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '18', 'MOCHA', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '21', 'SHUSHUFINDI', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '22', 'LORETO', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '90', 'EL PIEDRERO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '5', 'SALCEDO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '10', 'PIMAMPIRO', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '17', 'RUMIÑAHUI', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '18', 'PATATE', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '19', 'YANTZAZA (YANZATZA)', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '21', 'SUCUMBÍOS', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '1', 'PUCARA', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '7', 'EL GUABO', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '10', 'SAN MIGUEL DE URCUQUÍ', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '18', 'QUERO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '19', 'EL PANGUI', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('6', '21', 'CASCALES', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '11', 'GONZANAMÁ', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '17', 'SAN MIGUEL DE LOS BANCOS', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '18', 'SAN PEDRO DE PELILEO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '19', 'CENTINELA DEL CÓNDOR', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '21', 'CUYABENO', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '1', 'SANTA ISABEL', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '14', 'SAN JUAN BOSCO', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '17', 'PEDRO VICENTE MALDONADO', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '18', 'SANTIAGO DE PÍLLARO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('8', '19', 'PALANDA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '11', 'PALTAS', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '15', 'CARLOS JULIO AROSEMENA TOLA', 6);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '17', 'PUERTO QUITO', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '18', 'TISALEO', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('9', '19', 'PAQUISHA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('10', '14', 'LOGROÑO', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('11', '12', 'VALENCIA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('12', '9', 'NARANJITO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('13', '1', 'SEVILLA DE ORO', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('13', '12', 'QUINSALOMA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('14', '1', 'GUACHAPALA', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('14', '7', 'LAS LAJAS', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('14', '9', 'PEDRO CARBO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('14', '11', 'PINDAL', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('14', '13', 'SUCRE', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('15', '1', 'CAMILO PONCE ENRÍQUEZ', 3);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('15', '11', 'QUILANGA', 8);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('16', '13', '24 DE MAYO', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('18', '9', 'SANTA LUCÍA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('19', '9', 'SALITRE (URBINA JADO)', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('19', '13', 'PUERTO LÓPEZ', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('20', '9', 'SAN JACINTO DE YAGUACHI', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('20', '13', 'JAMA', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('21', '9', 'PLAYAS', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('21', '13', 'JARAMIJÓ', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('22', '9', 'SIMÓN BOLÍVAR', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('22', '13', 'SAN VICENTE', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('23', '9', 'CORONEL MARCELINO MARIDUEÑA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('24', '9', 'LOMAS DE SARGENTILLO', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('25', '9', 'NOBOL', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('27', '9', 'GENERAL ANTONIO ELIZALDE', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('28', '9', 'ISIDRO AYORA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('1', '20', 'SAN CRISTÓBAL', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('2', '20', 'ISABELA', 2);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('5', '1', 'PAUTE', 9);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('7', '5', 'SIGCHOS', 7);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '10', 'OTAVALO', 5);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '13', 'EL CARMEN', 1);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('17', '13', 'PEDERNALES', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('18', '13', 'OLMEDO', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('13', '13', 'SANTA ANA', 4);
INSERT INTO cantones (cod_canton, cod_provincia, nombre_canton,id_demarcacion) VALUES ('4', '19', 'YACUAMBI', 3);


-- Completed on 2017-04-29 00:06:46

--
-- PostgreSQL database dump complete
--

