-- Sequence: client_id_seq

-- DROP SEQUENCE client_id_seq;

CREATE SEQUENCE client_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE client_id_seq
  OWNER TO postgres;

  
-- Sequence: order_id_seq

-- DROP SEQUENCE order_id_seq;

CREATE SEQUENCE order_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE order_id_seq
  OWNER TO postgres;


-- Table: clientes

-- DROP TABLE clientes;

CREATE TABLE clientes
(
  "Id" numeric NOT NULL DEFAULT nextval('client_id_seq'::regclass),
  name character varying,
  lastname character varying,
  birthdate date,
  createdate date,
  CONSTRAINT "Id" PRIMARY KEY ("Id")
)
WITH (
  OIDS=FALSE
);
ALTER TABLE clientes
  OWNER TO postgres;
  

-- Table: ordenes

-- DROP TABLE ordenes;

CREATE TABLE ordenes
(
  "Id" numeric NOT NULL DEFAULT nextval('order_id_seq'::regclass),
  noorden character(10),
  datecreate date,
  total numeric(10,2),
  CONSTRAINT ordenes_pkey PRIMARY KEY ("Id")
)
WITH (
  OIDS=FALSE
);
ALTER TABLE ordenes
  OWNER TO postgres;
  
  
