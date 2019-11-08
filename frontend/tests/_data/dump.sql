--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.6
-- Dumped by pg_dump version 9.5.6

-- Started on 2017-08-04 15:13:31

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
-- TOC entry 2122 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 181 (class 1259 OID 43283)
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE migration OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 43290)
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
-- TOC entry 182 (class 1259 OID 43288)
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
-- TOC entry 2123 (class 0 OID 0)
-- Dependencies: 182
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- TOC entry 1986 (class 2604 OID 43293)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- TOC entry 2112 (class 0 OID 43283)
-- Dependencies: 181
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY migration (version, apply_time) FROM stdin;
m000000_000000_base	1501709012
m130524_201442_init	1501709016
\.


--
-- TOC entry 2114 (class 0 OID 43290)
-- Dependencies: 183
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY "user" (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at) FROM stdin;
1	tester	K53vvfUp2rCJWp_WvMNuyAxFurMhnyY4	$2y$13$CI2Rg4JtaHu7C78VRL98HuoIKeVjzQkFPphMbQBbJtIyPyFMSOw5C	\N	tester.email@example.com	10	1501866188	1501866188
\.


--
-- TOC entry 2124 (class 0 OID 0)
-- Dependencies: 182
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_id_seq', 1, true);


--
-- TOC entry 1989 (class 2606 OID 43287)
-- Name: migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- TOC entry 1991 (class 2606 OID 43305)
-- Name: user_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);


--
-- TOC entry 1993 (class 2606 OID 43303)
-- Name: user_password_reset_token_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token);


--
-- TOC entry 1995 (class 2606 OID 43299)
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- TOC entry 1997 (class 2606 OID 43301)
-- Name: user_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);

-- Sequence: public.client_id_seq

-- DROP SEQUENCE public.client_id_seq;

-- Table: public.ciudades

-- DROP TABLE public.ciudades;

CREATE TABLE public.ciudades
(
  "Id" integer NOT NULL,
  ciudades character varying(255),
  CONSTRAINT ciudades_pkey PRIMARY KEY ("Id")
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.ciudades
  OWNER TO postgres;

-- ----------------------------
-- Type structure for estado
-- ----------------------------
DROP TYPE IF EXISTS "public"."estado";
CREATE TYPE "public"."estado" AS ENUM (
  'activo',
  'inactivo'
);


CREATE SEQUENCE public.client_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 135
  CACHE 1;
ALTER TABLE public.client_id_seq
  OWNER TO postgres;

-- Table: public.clientes

-- DROP TABLE public.clientes;

CREATE TABLE public.clientes
(
  "Id" numeric NOT NULL DEFAULT nextval('client_id_seq'::regclass),
  name character varying(40) NOT NULL,
  lastname character varying(40) NOT NULL,
  birthdate date,
  createdate date,
  type estado,
  ciudad character varying(255),
  ciudad2_id integer,
  CONSTRAINT "Id" PRIMARY KEY ("Id"),
  CONSTRAINT clientes_ciudad2_id_fkey FOREIGN KEY (ciudad2_id)
      REFERENCES public.ciudades ("Id") MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE RESTRICT
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.clientes
  OWNER TO postgres;
  
  
  -- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO "public"."clientes" VALUES ('131', 'Diana', 'prueba1', null, null, null, null, null);
INSERT INTO "public"."clientes" VALUES ('132', 'Diana', 'PRUEBA2', null, null, null, null, null);
--
-- TOC entry 2121 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;




-- Completed on 2017-08-04 15:13:32

--
-- PostgreSQL database dump complete
--

