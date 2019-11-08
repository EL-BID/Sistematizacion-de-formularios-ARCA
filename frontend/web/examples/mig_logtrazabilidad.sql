
CREATE SEQUENCE public.aud_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.aud_id_seq
  OWNER TO postgres;


CREATE SEQUENCE public.audte_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.audte_id_seq
  OWNER TO postgres;


CREATE SEQUENCE public.audtm_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.audtm_id_seq
  OWNER TO postgres;


/*Creando tabla aud_tipo_evento*/
CREATE TABLE public.aud_tipo_evento
(
  id bigint NOT NULL DEFAULT nextval('audte_id_seq'::regclass),
  nom_tevento character varying(50),
  usuario_digitador character varying(50),
  fecha_digitacion timestamp,
  CONSTRAINT aud_te_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.aud_tipo_evento
  OWNER TO postgres;



/*Creando tabla aud_tipo_mensaje*/
CREATE TABLE public.aud_tipo_mensaje
(
  id bigint NOT NULL DEFAULT nextval('audtm_id_seq'::regclass),
  nom_tmensaje character varying(50),
  usuario_digitador character varying(50),
  fecha_digitacion timestamp,
  CONSTRAINT aud_tm_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.aud_tipo_mensaje
  OWNER TO postgres;


/*Creando tabla de auditoria*/



CREATE TABLE public.aud_auditoria
(
  id bigint NOT NULL DEFAULT nextval('aud_id_seq'::regclass),
  usuario_id integer,
  usuario character varying(50),
  ip_origen character varying(50),
  fecha_hora double precision,
  texto text,
  json text,
  id_tevento integer,	
  id_tmensaje integer,
  CONSTRAINT aud_auditoria_pkey PRIMARY KEY (id),
  CONSTRAINT fk_auditoria_aud_te FOREIGN KEY (id_tevento)
      REFERENCES public.aud_tipo_evento ("id") MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT fk_auditoria_aud_tm FOREIGN KEY (id_tmensaje)
      REFERENCES public.aud_tipo_mensaje ("id") MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE RESTRICT
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.aud_auditoria
  OWNER TO postgres;


INSERT INTO public.aud_tipo_evento(
            nom_tevento, usuario_digitador, fecha_digitacion)
    VALUES ('SEGURIDAD','','2017-05-21 19:03:00');

INSERT INTO public.aud_tipo_evento(
            nom_tevento, usuario_digitador, fecha_digitacion)
    VALUES ('SISTEMA','','2017-05-21 19:03:00');

INSERT INTO public.aud_tipo_evento(
            nom_tevento, usuario_digitador, fecha_digitacion)
    VALUES ('TRAZABILIDAD','','2017-05-21 19:03:00');



INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','ERROR');

INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','EXCEPCION');


INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','ADVERTENCIA');


INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','DEPURACION');


INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','INFORMACION');

INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','CONSULTA');


INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','CREACION');


INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','MODIFICACION');

INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','ELIMINACION');

INSERT INTO public.aud_tipo_mensaje(
            fecha_digitacion, nom_tmensaje)
    VALUES ('2017-05-21 19:10:00','SEGUIMIENTO');



