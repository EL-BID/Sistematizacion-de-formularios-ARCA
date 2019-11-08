-- Table: public.hoja_vida

-- DROP TABLE public.hoja_vida;

CREATE TABLE public.hoja_vida
(
  "Id" numeric NOT NULL DEFAULT nextval('seq_hojavida'::regclass),
  filename character varying(255),
  folder character varying(255),
  CONSTRAINT hoja_vida_pkey PRIMARY KEY ("Id")
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.hoja_vida
  OWNER TO postgres;
  
  
-- Sequence: public.seq_hojavida

-- DROP SEQUENCE public.seq_hojavida;

CREATE SEQUENCE public.seq_hojavida
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 9
  CACHE 1;
ALTER TABLE public.seq_hojavida
  OWNER TO postgres;