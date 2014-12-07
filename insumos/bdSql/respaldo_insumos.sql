--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.12
-- Dumped by pg_dump version 9.1.12
-- Started on 2014-04-11 09:42:10 VET

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2067 (class 1262 OID 53617)
-- Name: control_insumos; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE control_insumos WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'es_VE.UTF-8' LC_CTYPE = 'es_VE.UTF-8';


ALTER DATABASE control_insumos OWNER TO postgres;

\connect control_insumos

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 7 (class 2615 OID 53618)
-- Name: insumos; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA insumos;


ALTER SCHEMA insumos OWNER TO postgres;

--
-- TOC entry 8 (class 2615 OID 53619)
-- Name: seguridad; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA seguridad;


ALTER SCHEMA seguridad OWNER TO postgres;

--
-- TOC entry 197 (class 3079 OID 11644)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2070 (class 0 OID 0)
-- Dependencies: 197
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = insumos, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 178 (class 1259 OID 53703)
-- Dependencies: 7
-- Name: casos; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE casos (
    id integer NOT NULL,
    cama character varying(255) NOT NULL,
    habitacion character varying(255) NOT NULL,
    fecha_ingreso date NOT NULL,
    servicio integer NOT NULL,
    diagnostico character varying(255) NOT NULL,
    medico_caso integer NOT NULL,
    fecha_egreso date NOT NULL,
    id_paciente integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.casos OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 53701)
-- Dependencies: 178 7
-- Name: casos_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE casos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.casos_id_seq OWNER TO postgres;

--
-- TOC entry 2071 (class 0 OID 0)
-- Dependencies: 177
-- Name: casos_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE casos_id_seq OWNED BY casos.id;


--
-- TOC entry 180 (class 1259 OID 53719)
-- Dependencies: 7
-- Name: estados; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE estados (
    id integer NOT NULL,
    estado character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.estados OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 53717)
-- Dependencies: 7 180
-- Name: estados_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE estados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.estados_id_seq OWNER TO postgres;

--
-- TOC entry 2072 (class 0 OID 0)
-- Dependencies: 179
-- Name: estados_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE estados_id_seq OWNED BY estados.id;


--
-- TOC entry 182 (class 1259 OID 53727)
-- Dependencies: 7
-- Name: examenes_lab; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE examenes_lab (
    id integer NOT NULL,
    id_caso integer NOT NULL,
    id_rama integer NOT NULL,
    id_examen integer NOT NULL,
    cantidad integer NOT NULL,
    fecha date NOT NULL,
    hora timestamp without time zone NOT NULL,
    descripcion character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.examenes_lab OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 53725)
-- Dependencies: 7 182
-- Name: examenes_lab_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE examenes_lab_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.examenes_lab_id_seq OWNER TO postgres;

--
-- TOC entry 2073 (class 0 OID 0)
-- Dependencies: 181
-- Name: examenes_lab_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE examenes_lab_id_seq OWNED BY examenes_lab.id;


--
-- TOC entry 184 (class 1259 OID 53740)
-- Dependencies: 7
-- Name: imagenes; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE imagenes (
    id integer NOT NULL,
    id_caso integer NOT NULL,
    tipo_imagen integer NOT NULL,
    imagen integer NOT NULL,
    cantidad integer NOT NULL,
    fecha date NOT NULL,
    hora timestamp without time zone NOT NULL,
    descripcion character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.imagenes OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 53738)
-- Dependencies: 184 7
-- Name: imagenes_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE imagenes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.imagenes_id_seq OWNER TO postgres;

--
-- TOC entry 2074 (class 0 OID 0)
-- Dependencies: 183
-- Name: imagenes_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE imagenes_id_seq OWNED BY imagenes.id;


--
-- TOC entry 186 (class 1259 OID 53753)
-- Dependencies: 7
-- Name: material_med_qui; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE material_med_qui (
    id integer NOT NULL,
    id_caso integer NOT NULL,
    mmq integer NOT NULL,
    presentacion integer NOT NULL,
    cantidad integer NOT NULL,
    fecha date NOT NULL,
    hora timestamp without time zone NOT NULL,
    descripcion character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.material_med_qui OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 53751)
-- Dependencies: 7 186
-- Name: material_med_qui_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE material_med_qui_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.material_med_qui_id_seq OWNER TO postgres;

--
-- TOC entry 2075 (class 0 OID 0)
-- Dependencies: 185
-- Name: material_med_qui_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE material_med_qui_id_seq OWNED BY material_med_qui.id;


--
-- TOC entry 188 (class 1259 OID 53766)
-- Dependencies: 7
-- Name: medicamentos; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE medicamentos (
    id integer NOT NULL,
    id_caso integer NOT NULL,
    medicamento integer NOT NULL,
    presentacion integer NOT NULL,
    dosis_diaria character varying(255) NOT NULL,
    fecha date NOT NULL,
    hora timestamp without time zone NOT NULL,
    descripcion character varying(255) NOT NULL,
    cantidad integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.medicamentos OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 53764)
-- Dependencies: 188 7
-- Name: medicamentos_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE medicamentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.medicamentos_id_seq OWNER TO postgres;

--
-- TOC entry 2076 (class 0 OID 0)
-- Dependencies: 187
-- Name: medicamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE medicamentos_id_seq OWNED BY medicamentos.id;


--
-- TOC entry 190 (class 1259 OID 53782)
-- Dependencies: 7
-- Name: medicos; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE medicos (
    id integer NOT NULL,
    cedula character varying(255) NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.medicos OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 53780)
-- Dependencies: 190 7
-- Name: medicos_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE medicos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.medicos_id_seq OWNER TO postgres;

--
-- TOC entry 2077 (class 0 OID 0)
-- Dependencies: 189
-- Name: medicos_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE medicos_id_seq OWNED BY medicos.id;


--
-- TOC entry 163 (class 1259 OID 53620)
-- Dependencies: 7
-- Name: migrations; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE insumos.migrations OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 53793)
-- Dependencies: 7
-- Name: municipios; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE municipios (
    id integer NOT NULL,
    id_estado integer NOT NULL,
    municipio character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.municipios OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 53791)
-- Dependencies: 192 7
-- Name: municipios_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE municipios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.municipios_id_seq OWNER TO postgres;

--
-- TOC entry 2078 (class 0 OID 0)
-- Dependencies: 191
-- Name: municipios_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE municipios_id_seq OWNED BY municipios.id;


--
-- TOC entry 176 (class 1259 OID 53692)
-- Dependencies: 7
-- Name: pacientes; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE pacientes (
    id integer NOT NULL,
    cedula character varying(255) NOT NULL,
    nombres character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    fecha_nac date NOT NULL,
    id_estado integer NOT NULL,
    id_municipio integer NOT NULL,
    id_parroquia integer NOT NULL,
    direccion_hab character varying(255) NOT NULL,
    telefono_casa character varying(255) NOT NULL,
    celular character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    id_sexo integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.pacientes OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 53690)
-- Dependencies: 7 176
-- Name: pacientes_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE pacientes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.pacientes_id_seq OWNER TO postgres;

--
-- TOC entry 2079 (class 0 OID 0)
-- Dependencies: 175
-- Name: pacientes_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE pacientes_id_seq OWNED BY pacientes.id;


--
-- TOC entry 194 (class 1259 OID 53806)
-- Dependencies: 7
-- Name: parroquias; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE parroquias (
    id integer NOT NULL,
    id_municipio integer NOT NULL,
    parroquia character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.parroquias OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 53804)
-- Dependencies: 7 194
-- Name: parroquias_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE parroquias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.parroquias_id_seq OWNER TO postgres;

--
-- TOC entry 2080 (class 0 OID 0)
-- Dependencies: 193
-- Name: parroquias_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE parroquias_id_seq OWNED BY parroquias.id;


--
-- TOC entry 196 (class 1259 OID 53819)
-- Dependencies: 7
-- Name: servicios; Type: TABLE; Schema: insumos; Owner: postgres; Tablespace: 
--

CREATE TABLE servicios (
    id integer NOT NULL,
    servicio character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE insumos.servicios OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 53817)
-- Dependencies: 196 7
-- Name: servicios_id_seq; Type: SEQUENCE; Schema: insumos; Owner: postgres
--

CREATE SEQUENCE servicios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE insumos.servicios_id_seq OWNER TO postgres;

--
-- TOC entry 2081 (class 0 OID 0)
-- Dependencies: 195
-- Name: servicios_id_seq; Type: SEQUENCE OWNED BY; Schema: insumos; Owner: postgres
--

ALTER SEQUENCE servicios_id_seq OWNED BY servicios.id;


SET search_path = seguridad, pg_catalog;

--
-- TOC entry 167 (class 1259 OID 53641)
-- Dependencies: 8
-- Name: groups; Type: TABLE; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE TABLE groups (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    permissions text,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE seguridad.groups OWNER TO postgres;

--
-- TOC entry 166 (class 1259 OID 53639)
-- Dependencies: 8 167
-- Name: groups_id_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.groups_id_seq OWNER TO postgres;

--
-- TOC entry 2082 (class 0 OID 0)
-- Dependencies: 166
-- Name: groups_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE groups_id_seq OWNED BY groups.id;


--
-- TOC entry 174 (class 1259 OID 53681)
-- Dependencies: 8
-- Name: modulos; Type: TABLE; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE TABLE modulos (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL,
    otro character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE seguridad.modulos OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 53679)
-- Dependencies: 8 174
-- Name: modulos_id_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE modulos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.modulos_id_seq OWNER TO postgres;

--
-- TOC entry 2083 (class 0 OID 0)
-- Dependencies: 173
-- Name: modulos_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE modulos_id_seq OWNED BY modulos.id;


--
-- TOC entry 172 (class 1259 OID 53671)
-- Dependencies: 8
-- Name: permissions; Type: TABLE; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE TABLE permissions (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    value character varying(100) NOT NULL,
    description character varying(255) NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE seguridad.permissions OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 53669)
-- Dependencies: 172 8
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.permissions_id_seq OWNER TO postgres;

--
-- TOC entry 2084 (class 0 OID 0)
-- Dependencies: 171
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE permissions_id_seq OWNED BY permissions.id;


--
-- TOC entry 169 (class 1259 OID 53654)
-- Dependencies: 1862 1863 1864 8
-- Name: throttle; Type: TABLE; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE TABLE throttle (
    id integer NOT NULL,
    user_id integer NOT NULL,
    ip_address character varying(255),
    attempts integer DEFAULT 0 NOT NULL,
    suspended boolean DEFAULT false NOT NULL,
    banned boolean DEFAULT false NOT NULL,
    last_attempt_at timestamp without time zone,
    suspended_at timestamp without time zone,
    banned_at timestamp without time zone
);


ALTER TABLE seguridad.throttle OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 53652)
-- Dependencies: 169 8
-- Name: throttle_id_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE throttle_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.throttle_id_seq OWNER TO postgres;

--
-- TOC entry 2085 (class 0 OID 0)
-- Dependencies: 168
-- Name: throttle_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE throttle_id_seq OWNED BY throttle.id;


--
-- TOC entry 165 (class 1259 OID 53625)
-- Dependencies: 1859 8
-- Name: users; Type: TABLE; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    email character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    permissions text,
    activated boolean DEFAULT false NOT NULL,
    activation_code character varying(255),
    activated_at timestamp without time zone,
    last_login timestamp without time zone,
    persist_code character varying(255),
    reset_password_code character varying(255),
    first_name character varying(255),
    last_name character varying(255),
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE seguridad.users OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 53664)
-- Dependencies: 8
-- Name: users_groups; Type: TABLE; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE TABLE users_groups (
    user_id integer NOT NULL,
    group_id integer NOT NULL
);


ALTER TABLE seguridad.users_groups OWNER TO postgres;

--
-- TOC entry 164 (class 1259 OID 53623)
-- Dependencies: 165 8
-- Name: users_id_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.users_id_seq OWNER TO postgres;

--
-- TOC entry 2086 (class 0 OID 0)
-- Dependencies: 164
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


SET search_path = insumos, pg_catalog;

--
-- TOC entry 1868 (class 2604 OID 53706)
-- Dependencies: 178 177 178
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY casos ALTER COLUMN id SET DEFAULT nextval('casos_id_seq'::regclass);


--
-- TOC entry 1869 (class 2604 OID 53722)
-- Dependencies: 179 180 180
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY estados ALTER COLUMN id SET DEFAULT nextval('estados_id_seq'::regclass);


--
-- TOC entry 1870 (class 2604 OID 53730)
-- Dependencies: 182 181 182
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY examenes_lab ALTER COLUMN id SET DEFAULT nextval('examenes_lab_id_seq'::regclass);


--
-- TOC entry 1871 (class 2604 OID 53743)
-- Dependencies: 184 183 184
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY imagenes ALTER COLUMN id SET DEFAULT nextval('imagenes_id_seq'::regclass);


--
-- TOC entry 1872 (class 2604 OID 53756)
-- Dependencies: 186 185 186
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY material_med_qui ALTER COLUMN id SET DEFAULT nextval('material_med_qui_id_seq'::regclass);


--
-- TOC entry 1873 (class 2604 OID 53769)
-- Dependencies: 188 187 188
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY medicamentos ALTER COLUMN id SET DEFAULT nextval('medicamentos_id_seq'::regclass);


--
-- TOC entry 1874 (class 2604 OID 53785)
-- Dependencies: 190 189 190
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY medicos ALTER COLUMN id SET DEFAULT nextval('medicos_id_seq'::regclass);


--
-- TOC entry 1875 (class 2604 OID 53796)
-- Dependencies: 192 191 192
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY municipios ALTER COLUMN id SET DEFAULT nextval('municipios_id_seq'::regclass);


--
-- TOC entry 1867 (class 2604 OID 53695)
-- Dependencies: 176 175 176
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY pacientes ALTER COLUMN id SET DEFAULT nextval('pacientes_id_seq'::regclass);


--
-- TOC entry 1876 (class 2604 OID 53809)
-- Dependencies: 194 193 194
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY parroquias ALTER COLUMN id SET DEFAULT nextval('parroquias_id_seq'::regclass);


--
-- TOC entry 1877 (class 2604 OID 53822)
-- Dependencies: 196 195 196
-- Name: id; Type: DEFAULT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY servicios ALTER COLUMN id SET DEFAULT nextval('servicios_id_seq'::regclass);


SET search_path = seguridad, pg_catalog;

--
-- TOC entry 1860 (class 2604 OID 53644)
-- Dependencies: 166 167 167
-- Name: id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY groups ALTER COLUMN id SET DEFAULT nextval('groups_id_seq'::regclass);


--
-- TOC entry 1866 (class 2604 OID 53684)
-- Dependencies: 174 173 174
-- Name: id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY modulos ALTER COLUMN id SET DEFAULT nextval('modulos_id_seq'::regclass);


--
-- TOC entry 1865 (class 2604 OID 53674)
-- Dependencies: 171 172 172
-- Name: id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY permissions ALTER COLUMN id SET DEFAULT nextval('permissions_id_seq'::regclass);


--
-- TOC entry 1861 (class 2604 OID 53657)
-- Dependencies: 168 169 169
-- Name: id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY throttle ALTER COLUMN id SET DEFAULT nextval('throttle_id_seq'::regclass);


--
-- TOC entry 1858 (class 2604 OID 53628)
-- Dependencies: 164 165 165
-- Name: id; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


SET search_path = insumos, pg_catalog;

--
-- TOC entry 2046 (class 0 OID 53719)
-- Dependencies: 180 2063
-- Data for Name: estados; Type: TABLE DATA; Schema: insumos; Owner: postgres
--

INSERT INTO estados VALUES (1, 'DTTO. CAPITAL', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (2, 'ANZOATEGUI', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (3, 'APURE', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (4, 'ARAGUA', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (5, 'BARINAS', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (6, 'BOLIVAR', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (7, 'CARABOBO', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (8, 'COJEDES', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (9, 'FALCON', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (10, 'GUARICO', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (11, 'LARA', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (12, 'MERIDA', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (13, 'MIRANDA', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (14, 'MONAGAS', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (15, 'NUEVA ESPARTA', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (16, 'PORTUGUESA', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (17, 'SUCRE', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (18, 'TACHIRA', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (19, 'TRUJILLO', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (20, 'YARACUY', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (21, 'ZULIA', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (22, 'AMAZONAS', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (23, 'DELTA AMACURO', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');
INSERT INTO estados VALUES (24, 'VARGAS', '2014-04-11 08:42:11.338185', '2014-04-11 08:42:11.338185');


--
-- TOC entry 2088 (class 0 OID 0)
-- Dependencies: 179
-- Name: estados_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('estados_id_seq', 24, true);


--
-- TOC entry 2048 (class 0 OID 53727)
-- Dependencies: 182 2063
-- Data for Name: examenes_lab; Type: TABLE DATA; Schema: insumos; Owner: postgres
--



--
-- TOC entry 2089 (class 0 OID 0)
-- Dependencies: 181
-- Name: examenes_lab_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('examenes_lab_id_seq', 1, false);


--
-- TOC entry 2050 (class 0 OID 53740)
-- Dependencies: 184 2063
-- Data for Name: imagenes; Type: TABLE DATA; Schema: insumos; Owner: postgres
--



--
-- TOC entry 2090 (class 0 OID 0)
-- Dependencies: 183
-- Name: imagenes_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('imagenes_id_seq', 1, false);


--
-- TOC entry 2052 (class 0 OID 53753)
-- Dependencies: 186 2063
-- Data for Name: material_med_qui; Type: TABLE DATA; Schema: insumos; Owner: postgres
--



--
-- TOC entry 2091 (class 0 OID 0)
-- Dependencies: 185
-- Name: material_med_qui_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('material_med_qui_id_seq', 1, false);


--
-- TOC entry 2054 (class 0 OID 53766)
-- Dependencies: 188 2063
-- Data for Name: medicamentos; Type: TABLE DATA; Schema: insumos; Owner: postgres
--



--
-- TOC entry 2092 (class 0 OID 0)
-- Dependencies: 187
-- Name: medicamentos_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('medicamentos_id_seq', 1, false);


--
-- TOC entry 2056 (class 0 OID 53782)
-- Dependencies: 190 2063
-- Data for Name: medicos; Type: TABLE DATA; Schema: insumos; Owner: postgres
--



--
-- TOC entry 2093 (class 0 OID 0)
-- Dependencies: 189
-- Name: medicos_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('medicos_id_seq', 1, false);


--
-- TOC entry 2029 (class 0 OID 53620)
-- Dependencies: 163 2063
-- Data for Name: migrations; Type: TABLE DATA; Schema: insumos; Owner: postgres
--

INSERT INTO migrations VALUES ('2014_03_26_154332_users', 1);
INSERT INTO migrations VALUES ('2014_03_26_154353_groups', 1);
INSERT INTO migrations VALUES ('2014_03_26_154427_throttle', 1);
INSERT INTO migrations VALUES ('2014_03_26_154443_users_groups', 1);
INSERT INTO migrations VALUES ('2014_04_03_201656_permission', 1);
INSERT INTO migrations VALUES ('2014_04_04_135305_create_modulos_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_150215_create_pacientes_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_150222_create_casos_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_150819_create_estados_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_151422_create_examenes_lab_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_151729_create_imagenes_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_152219_create_material_med_qui_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_152422_create_medicamentos_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_152524_create_medicos_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_152618_create_municipios_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_153354_create_parroquias_table', 1);
INSERT INTO migrations VALUES ('2014_04_07_153435_create_servicios_table', 1);


--
-- TOC entry 2058 (class 0 OID 53793)
-- Dependencies: 192 2063
-- Data for Name: municipios; Type: TABLE DATA; Schema: insumos; Owner: postgres
--

INSERT INTO municipios VALUES (1, 1, 'LIBERTADOR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (2, 2, 'ANACO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (3, 2, 'ARAGUA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (4, 2, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (5, 2, 'BRUZUAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (6, 2, 'CAJIGAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (7, 2, 'FREITES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (8, 2, 'INDEPENDENCIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (9, 2, 'LIBERTAD', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (10, 2, 'MIRANDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (11, 2, 'MONAGAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (12, 2, 'PEÑALVER', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (13, 2, 'SIMON RODRIGUEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (14, 2, 'SOTILLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (15, 2, 'GUANIPA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (16, 2, 'GUANTA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (17, 2, 'PIRITU', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (18, 2, 'M.L/DIEGO BAUTISTA U', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (19, 2, 'CARVAJAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (20, 2, 'SANTA ANA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (21, 2, 'MC GREGOR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (22, 2, 'S JUAN CAPISTRANO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (23, 3, 'ACHAGUAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (24, 3, 'MUÑOZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (25, 3, 'PAEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (26, 3, 'PEDRO CAMEJO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (27, 3, 'ROMULO GALLEGOS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (28, 3, 'SAN FERNANDO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (29, 3, 'BIRUACA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (30, 4, 'GIRARDOT', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (31, 4, 'SANTIAGO MARIÑO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (32, 4, 'JOSE FELIX RIVAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (33, 4, 'SAN CASIMIRO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (34, 4, 'SAN SEBASTIAN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (35, 4, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (36, 4, 'URDANETA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (37, 4, 'ZAMORA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (38, 4, 'LIBERTADOR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (39, 4, 'JOSE ANGEL LAMAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (40, 4, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (41, 4, 'SANTOS MICHELENA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (42, 4, 'MARIO B IRAGORRY', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (43, 4, 'TOVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (44, 4, 'CAMATAGUA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (45, 4, 'JOSE R REVENGA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (46, 4, 'FRANCISCO LINARES A.', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (47, 4, 'M.OCUMARE D LA COSTA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (48, 5, 'ARISMENDI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (49, 5, 'BARINAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (50, 5, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (51, 5, 'EZEQUIEL ZAMORA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (52, 5, 'OBISPOS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (53, 5, 'PEDRAZA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (54, 5, 'ROJAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (55, 5, 'SOSA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (56, 5, 'ALBERTO ARVELO T', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (57, 5, 'A JOSE DE SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (58, 5, 'CRUZ PAREDES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (59, 5, 'ANDRES E. BLANCO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (60, 6, 'CARONI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (61, 6, 'CEDEÑO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (62, 6, 'HERES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (63, 6, 'PIAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (64, 6, 'ROSCIO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (65, 6, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (66, 6, 'SIFONTES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (67, 6, 'RAUL LEONI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (68, 6, 'GRAN SABANA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (69, 6, 'EL CALLAO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (70, 6, 'PADRE PEDRO CHIEN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (71, 7, 'BEJUMA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (72, 7, 'CARLOS ARVELO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (73, 7, 'DIEGO IBARRA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (74, 7, 'GUACARA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (75, 7, 'MONTALBAN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (76, 7, 'JUAN JOSE MORA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (77, 7, 'PUERTO CABELLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (78, 7, 'SAN JOAQUIN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (79, 7, 'VALENCIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (80, 7, 'MIRANDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (81, 7, 'LOS GUAYOS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (82, 7, 'NAGUANAGUA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (83, 7, 'SAN DIEGO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (84, 7, 'LIBERTADOR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (85, 8, 'ANZOATEGUI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (86, 8, 'FALCON', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (87, 8, 'GIRARDOT', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (88, 8, 'MP PAO SN J BAUTISTA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (89, 8, 'RICAURTE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (90, 8, 'SAN CARLOS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (91, 8, 'TINACO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (92, 8, 'LIMA BLANCO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (93, 8, 'ROMULO GALLEGOS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (94, 9, 'ACOSTA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (95, 9, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (96, 9, 'BUCHIVACOA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (97, 9, 'CARIRUBANA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (98, 9, 'COLINA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (99, 9, 'DEMOCRACIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (100, 9, 'FALCON', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (101, 9, 'FEDERACION', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (102, 9, 'MAUROA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (103, 9, 'MIRANDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (104, 9, 'PETIT', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (105, 9, 'SILVA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (106, 9, 'ZAMORA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (107, 9, 'DABAJURO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (108, 9, 'MONS. ITURRIZA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (109, 9, 'LOS TAQUES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (110, 9, 'PIRITU', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (111, 9, 'UNION', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (112, 9, 'SAN FRANCISCO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (113, 9, 'JACURA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (114, 9, 'CACIQUE MANAURE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (115, 9, 'PALMA SOLA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (116, 9, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (117, 9, 'URUMACO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (118, 9, 'TOCOPERO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (119, 10, 'INFANTE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (120, 10, 'MELLADO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (121, 10, 'MIRANDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (122, 10, 'MONAGAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (123, 10, 'RIBAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (124, 10, 'ROSCIO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (125, 10, 'ZARAZA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (126, 10, 'CAMAGUAN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (127, 10, 'S JOSE DE GUARIBE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (128, 10, 'LAS MERCEDES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (129, 10, 'EL SOCORRO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (130, 10, 'ORTIZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (131, 10, 'S MARIA DE IPIRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (132, 10, 'CHAGUARAMAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (133, 10, 'SAN GERONIMO DE G', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (134, 11, 'CRESPO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (135, 11, 'IRIBARREN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (136, 11, 'JIMENEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (137, 11, 'MORAN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (138, 11, 'PALAVECINO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (139, 11, 'TORRES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (140, 11, 'URDANETA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (141, 11, 'ANDRES E BLANCO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (142, 11, 'SIMON PLANAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (143, 12, 'ALBERTO ADRIANI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (144, 12, 'ANDRES BELLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (145, 12, 'ARZOBISPO CHACON', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (146, 12, 'CAMPO ELIAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (147, 12, 'GUARAQUE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (148, 12, 'JULIO CESAR SALAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (149, 12, 'JUSTO BRICEÑO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (150, 12, 'LIBERTADOR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (151, 12, 'SANTOS MARQUINA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (152, 12, 'MIRANDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (153, 12, 'ANTONIO PINTO S.', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (154, 12, 'OB. RAMOS DE LORA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (155, 12, 'CARACCIOLO PARRA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (156, 12, 'CARDENAL QUINTERO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (157, 12, 'PUEBLO LLANO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (158, 12, 'RANGEL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (159, 12, 'RIVAS DAVILA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (160, 12, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (161, 12, 'TOVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (162, 12, 'TULIO F CORDERO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (163, 12, 'PADRE NOGUERA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (164, 12, 'ARICAGUA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (165, 12, 'ZEA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (166, 13, 'ACEVEDO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (167, 13, 'BRION', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (168, 13, 'GUAICAIPURO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (169, 13, 'INDEPENDENCIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (170, 13, 'LANDER', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (171, 13, 'PAEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (172, 13, 'PAZ CASTILLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (173, 13, 'PLAZA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (174, 13, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (175, 13, 'URDANETA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (176, 13, 'ZAMORA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (177, 13, 'CRISTOBAL ROJAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (178, 13, 'LOS SALIAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (179, 13, 'ANDRES BELLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (180, 13, 'SIMON BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (181, 13, 'BARUTA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (182, 13, 'CARRIZAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (183, 13, 'CHACAO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (184, 13, 'EL HATILLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (185, 13, 'BUROZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (186, 13, 'PEDRO GUAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (187, 14, 'ACOSTA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (188, 14, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (189, 14, 'CARIPE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (190, 14, 'CEDEÑO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (191, 14, 'EZEQUIEL ZAMORA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (192, 14, 'LIBERTADOR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (193, 14, 'MATURIN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (194, 14, 'PIAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (195, 14, 'PUNCERES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (196, 14, 'SOTILLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (197, 14, 'AGUASAY', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (198, 14, 'SANTA BARBARA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (199, 14, 'URACOA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (200, 15, 'ARISMENDI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (201, 15, 'DIAZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (202, 15, 'GOMEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (203, 15, 'MANEIRO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (204, 15, 'MARCANO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (205, 15, 'MARIÑO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (206, 15, 'PENIN. DE MACANAO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (207, 15, 'VILLALBA(I.COCHE)', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (208, 15, 'TUBORES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (209, 15, 'ANTOLIN DEL CAMPO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (210, 15, 'GARCIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (211, 16, 'ARAURE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (212, 16, 'ESTELLER', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (213, 16, 'GUANARE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (214, 16, 'GUANARITO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (215, 16, 'OSPINO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (216, 16, 'PAEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (217, 16, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (218, 16, 'TUREN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (219, 16, 'M.JOSE V DE UNDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (220, 16, 'AGUA BLANCA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (221, 16, 'PAPELON', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (222, 16, 'GENARO BOCONOITO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (223, 16, 'S RAFAEL DE ONOTO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (224, 16, 'SANTA ROSALIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (225, 17, 'ARISMENDI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (226, 17, 'BENITEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (227, 17, 'BERMUDEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (228, 17, 'CAJIGAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (229, 17, 'MARIÑO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (230, 17, 'MEJIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (231, 17, 'MONTES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (232, 17, 'RIBERO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (233, 17, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (234, 17, 'VALDEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (235, 17, 'ANDRES E BLANCO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (236, 17, 'LIBERTADOR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (237, 17, 'ANDRES MATA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (238, 17, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (239, 17, 'CRUZ S ACOSTA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (240, 18, 'AYACUCHO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (241, 18, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (242, 18, 'INDEPENDENCIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (243, 18, 'CARDENAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (244, 18, 'JAUREGUI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (245, 18, 'JUNIN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (246, 18, 'LOBATERA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (247, 18, 'SAN CRISTOBAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (248, 18, 'URIBANTE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (249, 18, 'CORDOBA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (250, 18, 'GARCIA DE HEVIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (251, 18, 'GUASIMOS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (252, 18, 'MICHELENA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (253, 18, 'LIBERTADOR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (254, 18, 'PANAMERICANO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (255, 18, 'PEDRO MARIA UREÑA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (256, 18, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (257, 18, 'ANDRES BELLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (258, 18, 'FERNANDEZ FEO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (259, 18, 'LIBERTAD', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (260, 18, 'SAMUEL MALDONADO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (261, 18, 'SEBORUCO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (262, 18, 'ANTONIO ROMULO C', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (263, 18, 'FCO DE MIRANDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (264, 18, 'JOSE MARIA VARGA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (265, 18, 'RAFAEL URDANETA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (266, 18, 'SIMON RODRIGUEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (267, 18, 'TORBES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (268, 18, 'SAN JUDAS TADEO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (269, 19, 'RAFAEL RANGEL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (270, 19, 'BOCONO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (271, 19, 'CARACHE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (272, 19, 'ESCUQUE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (273, 19, 'TRUJILLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (274, 19, 'URDANETA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (275, 19, 'VALERA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (276, 19, 'CANDELARIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (277, 19, 'MIRANDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (278, 19, 'MONTE CARMELO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (279, 19, 'MOTATAN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (280, 19, 'PAMPAN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (281, 19, 'S RAFAEL CARVAJAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (282, 19, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (283, 19, 'ANDRES BELLO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (284, 19, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (285, 19, 'JOSE F M CAÑIZAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (286, 19, 'JUAN V CAMPO ELI', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (287, 19, 'LA CEIBA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (288, 19, 'PAMPANITO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (289, 20, 'BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (290, 20, 'BRUZUAL', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (291, 20, 'NIRGUA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (292, 20, 'SAN FELIPE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (293, 20, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (294, 20, 'URACHICHE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (295, 20, 'PEÑA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (296, 20, 'JOSE ANTONIO PAEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (297, 20, 'LA TRINIDAD', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (298, 20, 'COCOROTE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (299, 20, 'INDEPENDENCIA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (300, 20, 'ARISTIDES BASTID', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (301, 20, 'MANUEL MONGE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (302, 20, 'VEROES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (303, 21, 'BARALT', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (304, 21, 'SANTA RITA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (305, 21, 'COLON', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (306, 21, 'MARA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (307, 21, 'MARACAIBO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (308, 21, 'MIRANDA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (309, 21, 'PAEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (310, 21, 'MACHIQUES DE P', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (311, 21, 'SUCRE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (312, 21, 'LA CAÑADA DE U.', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (313, 21, 'LAGUNILLAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (314, 21, 'CATATUMBO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (315, 21, 'M/ROSARIO DE PERIJA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (316, 21, 'CABIMAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (317, 21, 'VALMORE RODRIGUEZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (318, 21, 'JESUS E LOSSADA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (319, 21, 'ALMIRANTE P', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (320, 21, 'SAN FRANCISCO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (321, 21, 'JESUS M SEMPRUN', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (322, 21, 'FRANCISCO J PULG', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (323, 21, 'SIMON BOLIVAR', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (324, 22, 'ATURES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (325, 22, 'ATABAPO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (326, 22, 'MAROA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (327, 22, 'RIO NEGRO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (328, 22, 'AUTANA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (329, 22, 'MANAPIARE', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (330, 22, 'ALTO ORINOCO', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (331, 23, 'TUCUPITA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (332, 23, 'PEDERNALES', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (333, 23, 'ANTONIO DIAZ', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (334, 23, 'CASACOIMA', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');
INSERT INTO municipios VALUES (335, 24, 'VARGAS', '2014-04-11 08:45:22.152012', '2014-04-11 08:45:22.152012');


--
-- TOC entry 2094 (class 0 OID 0)
-- Dependencies: 191
-- Name: municipios_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('municipios_id_seq', 335, true);



--
-- TOC entry 2060 (class 0 OID 53806)
-- Dependencies: 194 2063
-- Data for Name: parroquias; Type: TABLE DATA; Schema: insumos; Owner: postgres
--

INSERT INTO parroquias VALUES (1, 1, 'ALTAGRACIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (2, 1, 'CANDELARIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (3, 1, 'CATEDRAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (4, 1, 'LA PASTORA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (5, 1, 'SAN AGUSTIN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (6, 1, 'SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (7, 1, 'SAN JUAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (8, 1, 'SANTA ROSALIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (9, 1, 'SANTA TERESA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (10, 1, 'SUCRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (11, 1, '23 DE ENERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (12, 1, 'ANTIMANO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (13, 1, 'EL RECREO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (14, 1, 'EL VALLE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (15, 1, 'LA VEGA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (16, 1, 'MACARAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (17, 1, 'CARICUAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (18, 1, 'EL JUNQUITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (19, 1, 'COCHE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (20, 1, 'SAN PEDRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (21, 1, 'SAN BERNARDINO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (22, 1, 'EL PARAISO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (23, 2, 'ANACO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (24, 2, 'SAN JOAQUIN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (25, 3, 'CM. ARAGUA DE BARCELONA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (26, 3, 'CACHIPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (27, 4, 'EL CARMEN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (28, 4, 'SAN CRISTOBAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (29, 4, 'BERGANTIN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (30, 4, 'CAIGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (31, 4, 'EL PILAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (32, 4, 'NARICUAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (33, 5, 'CM. CLARINES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (34, 5, 'GUANAPE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (35, 5, 'SABANA DE UCHIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (36, 6, 'CM. ONOTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (37, 6, 'SAN PABLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (38, 7, 'CM. CANTAURA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (39, 7, 'LIBERTADOR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (40, 7, 'SANTA ROSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (41, 7, 'URICA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (42, 8, 'CM. SOLEDAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (43, 8, 'MAMO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (44, 9, 'CM. SAN MATEO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (45, 9, 'EL CARITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (46, 9, 'SANTA INES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (47, 10, 'CM. PARIAGUAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (48, 10, 'ATAPIRIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (49, 10, 'BOCA DEL PAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (50, 10, 'EL PAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (51, 11, 'CM. MAPIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (52, 11, 'PIAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (53, 11, 'SN DIEGO DE CABRUTICA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (54, 11, 'SANTA CLARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (55, 11, 'UVERITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (56, 11, 'ZUATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (57, 12, 'CM. PUERTO PIRITU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (58, 12, 'SAN MIGUEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (59, 12, 'SUCRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (60, 13, 'CM. EL TIGRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (61, 14, 'POZUELOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (62, 14, 'CM PTO. LA CRUZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (63, 15, 'CM. SAN JOSE DE GUANIPA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (64, 16, 'GUANTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (65, 16, 'CHORRERON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (66, 17, 'PIRITU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (67, 17, 'SAN FRANCISCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (68, 18, 'LECHERIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (69, 18, 'EL MORRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (70, 19, 'VALLE GUANAPE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (71, 19, 'SANTA BARBARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (72, 20, 'SANTA ANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (73, 20, 'PUEBLO NUEVO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (74, 21, 'EL CHAPARRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (75, 21, 'TOMAS ALFARO CALATRAVA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (76, 22, 'BOCA UCHIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (77, 22, 'BOCA DE CHAVEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (78, 23, 'ACHAGUAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (79, 23, 'APURITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (80, 23, 'EL YAGUAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (81, 23, 'GUACHARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (82, 23, 'MUCURITAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (83, 23, 'QUESERAS DEL MEDIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (84, 24, 'BRUZUAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (85, 24, 'MANTECAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (86, 24, 'QUINTERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (87, 24, 'SAN VICENTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (88, 24, 'RINCON HONDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (89, 25, 'GUASDUALITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (90, 25, 'ARAMENDI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (91, 25, 'EL AMPARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (92, 25, 'SAN CAMILO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (93, 25, 'URDANETA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (94, 26, 'SAN JUAN DE PAYARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (95, 26, 'CODAZZI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (96, 26, 'CUNAVICHE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (97, 27, 'ELORZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (98, 27, 'LA TRINIDAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (99, 28, 'SAN FERNANDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (100, 28, 'PEÑALVER', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (101, 28, 'EL RECREO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (102, 28, 'SN RAFAEL DE ATAMAICA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (103, 29, 'BIRUACA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (104, 30, 'CM. LAS DELICIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (105, 30, 'CHORONI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (106, 30, 'MADRE MA DE SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (107, 30, 'JOAQUIN CRESPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (108, 30, 'PEDRO JOSE OVALLES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (109, 30, 'JOSE CASANOVA GODOY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (110, 30, 'ANDRES ELOY BLANCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (111, 30, 'LOS TACARIGUAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (112, 31, 'CM. TURMERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (113, 31, 'SAMAN DE GUERE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (114, 31, 'ALFREDO PACHECO M', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (115, 31, 'CHUAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (116, 31, 'AREVALO APONTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (117, 32, 'CM. LA VICTORIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (118, 32, 'ZUATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (119, 32, 'PAO DE ZARATE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (120, 32, 'CASTOR NIEVES RIOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (121, 32, 'LAS GUACAMAYAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (122, 33, 'CM. SAN CASIMIRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (123, 33, 'VALLE MORIN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (124, 33, 'GUIRIPA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (125, 33, 'OLLAS DE CARAMACATE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (126, 34, 'CM. SAN SEBASTIAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (127, 35, 'CM. CAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (128, 35, 'BELLA VISTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (129, 36, 'CM. BARBACOAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (130, 36, 'SAN FRANCISCO DE CARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (131, 36, 'TAGUAY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (132, 36, 'LAS PEÑITAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (133, 37, 'CM. VILLA DE CURA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (134, 37, 'MAGDALENO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (135, 37, 'SAN FRANCISCO DE ASIS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (136, 37, 'VALLES DE TUCUTUNEMO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (137, 37, 'PQ AUGUSTO MIJARES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (138, 38, 'CM. PALO NEGRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (139, 38, 'SAN MARTIN DE PORRES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (140, 39, 'CM. SANTA CRUZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (141, 40, 'CM. SAN MATEO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (142, 41, 'CM. LAS TEJERIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (143, 41, 'TIARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (144, 42, 'CM. EL LIMON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (145, 42, 'CA A DE AZUCAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (146, 43, 'CM. COLONIA TOVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (147, 44, 'CM. CAMATAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (148, 44, 'CARMEN DE CURA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (149, 45, 'CM. EL CONSEJO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (150, 46, 'CM. SANTA RITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (151, 46, 'FRANCISCO DE MIRANDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (152, 46, 'MONS FELICIANO G', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (153, 47, 'OCUMARE DE LA COSTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (154, 48, 'ARISMENDI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (155, 48, 'GUADARRAMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (156, 48, 'LA UNION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (157, 48, 'SAN ANTONIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (158, 49, 'ALFREDO A LARRIVA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (159, 49, 'BARINAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (160, 49, 'SAN SILVESTRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (161, 49, 'SANTA INES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (162, 49, 'SANTA LUCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (163, 49, 'TORUNOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (164, 49, 'EL CARMEN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (165, 49, 'ROMULO BETANCOURT', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (166, 49, 'CORAZON DE JESUS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (167, 49, 'RAMON I MENDEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (168, 49, 'ALTO BARINAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (169, 49, 'MANUEL P FAJARDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (170, 49, 'JUAN A RODRIGUEZ D', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (171, 49, 'DOMINGA ORTIZ P', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (172, 50, 'ALTAMIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (173, 50, 'BARINITAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (174, 50, 'CALDERAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (175, 51, 'SANTA BARBARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (176, 51, 'JOSE IGNACIO DEL PUMAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (177, 51, 'RAMON IGNACIO MENDEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (178, 51, 'PEDRO BRICEÑO MENDEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (179, 52, 'EL REAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (180, 52, 'LA LUZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (181, 52, 'OBISPOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (182, 52, 'LOS GUASIMITOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (183, 53, 'CIUDAD BOLIVIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (184, 53, 'IGNACIO BRICEÑO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (185, 53, 'PAEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (186, 53, 'JOSE FELIX RIBAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (187, 54, 'DOLORES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (188, 54, 'LIBERTAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (189, 54, 'PALACIO FAJARDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (190, 54, 'SANTA ROSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (191, 55, 'CIUDAD DE NUTRIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (192, 55, 'EL REGALO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (193, 55, 'PUERTO DE NUTRIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (194, 55, 'SANTA CATALINA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (195, 56, 'RODRIGUEZ DOMINGUEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (196, 56, 'SABANETA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (197, 57, 'TICOPORO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (198, 57, 'NICOLAS PULIDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (199, 57, 'ANDRES BELLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (200, 58, 'BARRANCAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (201, 58, 'EL SOCORRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (202, 58, 'MASPARRITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (203, 59, 'EL CANTON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (204, 59, 'SANTA CRUZ DE GUACAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (205, 59, 'PUERTO VIVAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (206, 60, 'SIMON BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (207, 60, 'ONCE DE ABRIL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (208, 60, 'VISTA AL SOL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (209, 60, 'CHIRICA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (210, 60, 'DALLA COSTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (211, 60, 'CACHAMAY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (212, 60, 'UNIVERSIDAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (213, 60, 'UNARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (214, 60, 'YOCOIMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (215, 60, 'POZO VERDE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (216, 61, 'CM. CAICARA DEL ORINOCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (217, 61, 'ASCENSION FARRERAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (218, 61, 'ALTAGRACIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (219, 61, 'LA URBANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (220, 61, 'GUANIAMO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (221, 61, 'PIJIGUAOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (222, 62, 'CATEDRAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (223, 62, 'AGUA SALADA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (224, 62, 'LA SABANITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (225, 62, 'VISTA HERMOSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (226, 62, 'MARHUANTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (227, 62, 'JOSE ANTONIO PAEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (228, 62, 'ORINOCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (229, 62, 'PANAPANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (230, 62, 'ZEA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (231, 63, 'CM. UPATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (232, 63, 'ANDRES ELOY BLANCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (233, 63, 'PEDRO COVA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (234, 64, 'CM. GUASIPATI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (235, 64, 'SALOM', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (236, 65, 'CM. MARIPA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (237, 65, 'ARIPAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (238, 65, 'LAS MAJADAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (239, 65, 'MOITACO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (240, 65, 'GUARATARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (241, 66, 'CM. TUMEREMO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (242, 66, 'DALLA COSTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (243, 66, 'SAN ISIDRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (244, 67, 'CM. CIUDAD PIAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (245, 67, 'SAN FRANCISCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (246, 67, 'BARCELONETA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (247, 67, 'SANTA BARBARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (248, 68, 'CM. SANTA ELENA DE UAIREN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (249, 68, 'IKABARU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (250, 69, 'CM. EL CALLAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (251, 70, 'CM. EL PALMAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (252, 71, 'BEJUMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (253, 71, 'CANOABO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (254, 71, 'SIMON BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (255, 72, 'GUIGUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (256, 72, 'BELEN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (257, 72, 'TACARIGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (258, 73, 'MARIARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (259, 73, 'AGUAS CALIENTES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (260, 74, 'GUACARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (261, 74, 'CIUDAD ALIANZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (262, 74, 'YAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (263, 75, 'MONTALBAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (264, 76, 'MORON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (265, 76, 'URAMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (266, 77, 'DEMOCRACIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (267, 77, 'FRATERNIDAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (268, 77, 'GOAIGOAZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (269, 77, 'JUAN JOSE FLORES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (270, 77, 'BARTOLOME SALOM', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (271, 77, 'UNION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (272, 77, 'BORBURATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (273, 77, 'PATANEMO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (274, 78, 'SAN JOAQUIN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (275, 79, 'CANDELARIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (276, 79, 'CATEDRAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (277, 79, 'EL SOCORRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (278, 79, 'MIGUEL PEÑA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (279, 79, 'SAN BLAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (280, 79, 'SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (281, 79, 'SANTA ROSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (282, 79, 'RAFAEL URDANETA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (283, 79, 'NEGRO PRIMERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (284, 80, 'MIRANDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (285, 81, 'U LOS GUAYOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (286, 82, 'NAGUANAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (287, 83, 'URB SAN DIEGO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (288, 84, 'U TOCUYITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (289, 84, 'U INDEPENDENCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (290, 85, 'COJEDES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (291, 85, 'JUAN DE MATA SUAREZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (292, 86, 'TINAQUILLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (293, 87, 'EL BAUL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (294, 87, 'SUCRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (295, 88, 'EL PAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (296, 89, 'LIBERTAD DE COJEDES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (297, 89, 'EL AMPARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (298, 90, 'SAN CARLOS DE AUSTRIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (299, 90, 'JUAN ANGEL BRAVO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (300, 90, 'MANUEL MANRIQUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (301, 91, 'GRL/JEFE JOSE L SILVA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (302, 92, 'MACAPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (303, 92, 'LA AGUADITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (304, 93, 'ROMULO GALLEGOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (305, 94, 'SAN JUAN DE LOS CAYOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (306, 94, 'CAPADARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (307, 94, 'LA PASTORA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (308, 94, 'LIBERTADOR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (309, 95, 'SAN LUIS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (310, 95, 'ARACUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (311, 95, 'LA PEÑA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (312, 96, 'CAPATARIDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (313, 96, 'BOROJO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (314, 96, 'SEQUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (315, 96, 'ZAZARIDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (316, 96, 'BARIRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (317, 96, 'GUAJIRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (318, 97, 'NORTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (319, 97, 'CARIRUBANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (320, 97, 'PUNTA CARDON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (321, 97, 'SANTA ANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (322, 98, 'LA VELA DE CORO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (323, 98, 'ACURIGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (324, 98, 'GUAIBACOA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (325, 98, 'MACORUCA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (326, 98, 'LAS CALDERAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (327, 99, 'PEDREGAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (328, 99, 'AGUA CLARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (329, 99, 'AVARIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (330, 99, 'PIEDRA GRANDE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (331, 99, 'PURURECHE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (332, 100, 'PUEBLO NUEVO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (333, 100, 'ADICORA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (334, 100, 'BARAIVED', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (335, 100, 'BUENA VISTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (336, 100, 'JADACAQUIVA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (337, 100, 'MORUY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (338, 100, 'EL VINCULO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (339, 100, 'EL HATO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (340, 100, 'ADAURE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (341, 101, 'CHURUGUARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (342, 101, 'AGUA LARGA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (343, 101, 'INDEPENDENCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (344, 101, 'MAPARARI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (345, 101, 'EL PAUJI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (346, 102, 'MENE DE MAUROA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (347, 102, 'CASIGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (348, 102, 'SAN FELIX', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (349, 103, 'SAN ANTONIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (350, 103, 'SAN GABRIEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (351, 103, 'SANTA ANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (352, 103, 'GUZMAN GUILLERMO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (353, 103, 'MITARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (354, 103, 'SABANETA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (355, 103, 'RIO SECO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (356, 104, 'CABURE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (357, 104, 'CURIMAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (358, 104, 'COLINA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (359, 105, 'TUCACAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (360, 105, 'BOCA DE AROA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (361, 106, 'PUERTO CUMAREBO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (362, 106, 'LA CIENAGA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (363, 106, 'LA SOLEDAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (364, 106, 'PUEBLO CUMAREBO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (365, 106, 'ZAZARIDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (366, 107, 'CM. DABAJURO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (367, 108, 'CHICHIRIVICHE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (368, 108, 'BOCA DE TOCUYO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (369, 108, 'TOCUYO DE LA COSTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (370, 109, 'LOS TAQUES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (371, 109, 'JUDIBANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (372, 110, 'PIRITU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (373, 110, 'SAN JOSE DE LA COSTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (374, 111, 'STA.CRUZ DE BUCARAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (375, 111, 'EL CHARAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (376, 111, 'LAS VEGAS DEL TUY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (377, 112, 'CM. MIRIMIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (378, 113, 'JACURA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (379, 113, 'AGUA LINDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (380, 113, 'ARAURIMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (381, 114, 'CM. YARACAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (382, 115, 'CM. PALMA SOLA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (383, 116, 'SUCRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (384, 116, 'PECAYA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (385, 117, 'URUMACO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (386, 117, 'BRUZUAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (387, 118, 'CM. TOCOPERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (388, 119, 'VALLE DE LA PASCUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (389, 119, 'ESPINO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (390, 120, 'EL SOMBRERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (391, 120, 'SOSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (392, 121, 'CALABOZO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (393, 121, 'EL CALVARIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (394, 121, 'EL RASTRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (395, 121, 'GUARDATINAJAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (396, 122, 'ALTAGRACIA DE ORITUCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (397, 122, 'LEZAMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (398, 122, 'LIBERTAD DE ORITUCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (399, 122, 'SAN FCO DE MACAIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (400, 122, 'SAN RAFAEL DE ORITUCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (401, 122, 'SOUBLETTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (402, 122, 'PASO REAL DE MACAIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (403, 123, 'TUCUPIDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (404, 123, 'SAN RAFAEL DE LAYA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (405, 124, 'SAN JUAN DE LOS MORROS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (406, 124, 'PARAPARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (407, 124, 'CANTAGALLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (408, 125, 'ZARAZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (409, 125, 'SAN JOSE DE UNARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (410, 126, 'CAMAGUAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (411, 126, 'PUERTO MIRANDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (412, 126, 'UVERITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (413, 127, 'SAN JOSE DE GUARIBE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (414, 128, 'LAS MERCEDES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (415, 128, 'STA RITA DE MANAPIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (416, 128, 'CABRUTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (417, 129, 'EL SOCORRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (418, 130, 'ORTIZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (419, 130, 'SAN FCO. DE TIZNADOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (420, 130, 'SAN JOSE DE TIZNADOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (421, 130, 'S LORENZO DE TIZNADOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (422, 131, 'SANTA MARIA DE IPIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (423, 131, 'ALTAMIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (424, 132, 'CHAGUARAMAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (425, 133, 'GUAYABAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (426, 133, 'CAZORLA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (427, 134, 'FREITEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (428, 134, 'JOSE MARIA BLANCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (429, 135, 'CATEDRAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (430, 135, 'LA CONCEPCION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (431, 135, 'SANTA ROSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (432, 135, 'UNION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (433, 135, 'EL CUJI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (434, 135, 'TAMACA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (435, 135, 'JUAN DE VILLEGAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (436, 135, 'AGUEDO F. ALVARADO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (437, 135, 'BUENA VISTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (438, 135, 'JUAREZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (439, 136, 'JUAN B RODRIGUEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (440, 136, 'DIEGO DE LOZADA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (441, 136, 'SAN MIGUEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (442, 136, 'CUARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (443, 136, 'PARAISO DE SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (444, 136, 'TINTORERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (445, 136, 'JOSE BERNARDO DORANTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (446, 136, 'CRNEL. MARIANO PERAZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (447, 137, 'BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (448, 137, 'ANZOATEGUI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (449, 137, 'GUARICO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (450, 137, 'HUMOCARO ALTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (451, 137, 'HUMOCARO BAJO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (452, 137, 'MORAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (453, 137, 'HILARIO LUNA Y LUNA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (454, 137, 'LA CANDELARIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (455, 138, 'CABUDARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (456, 138, 'JOSE G. BASTIDAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (457, 138, 'AGUA VIVA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (458, 139, 'TRINIDAD SAMUEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (459, 139, 'ANTONIO DIAZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (460, 139, 'CAMACARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (461, 139, 'CASTAÑEDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (462, 139, 'CHIQUINQUIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (463, 139, 'ESPINOZA LOS MONTEROS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (464, 139, 'LARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (465, 139, 'MANUEL MORILLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (466, 139, 'MONTES DE OCA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (467, 139, 'TORRES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (468, 139, 'EL BLANCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (469, 139, 'MONTA A VERDE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (470, 139, 'HERIBERTO ARROYO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (471, 139, 'LAS MERCEDES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (472, 139, 'CECILIO ZUBILLAGA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (473, 139, 'REYES VARGAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (474, 139, 'ALTAGRACIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (475, 140, 'SIQUISIQUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (476, 140, 'SAN MIGUEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (477, 140, 'XAGUAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (478, 140, 'MOROTURO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (479, 141, 'PIO TAMAYO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (480, 141, 'YACAMBU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (481, 141, 'QBDA. HONDA DE GUACHE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (482, 142, 'SARARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (483, 142, 'GUSTAVO VEGAS LEON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (484, 142, 'BURIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (485, 143, 'GABRIEL PICON G.', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (486, 143, 'HECTOR AMABLE MORA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (487, 143, 'JOSE NUCETE SARDI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (488, 143, 'PULIDO MENDEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (489, 143, 'PTE. ROMULO GALLEGOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (490, 143, 'PRESIDENTE BETANCOURT', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (491, 143, 'PRESIDENTE PAEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (492, 144, 'CM. LA AZULITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (493, 145, 'CM. CANAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (494, 145, 'CAPURI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (495, 145, 'CHACANTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (496, 145, 'EL MOLINO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (497, 145, 'GUAIMARAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (498, 145, 'MUCUTUY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (499, 145, 'MUCUCHACHI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (500, 146, 'ACEQUIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (501, 146, 'JAJI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (502, 146, 'LA MESA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (503, 146, 'SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (504, 146, 'MONTALBAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (505, 146, 'MATRIZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (506, 146, 'FERNANDEZ PEÑA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (507, 147, 'CM. GUARAQUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (508, 147, 'MESA DE QUINTERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (509, 147, 'RIO NEGRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (510, 148, 'CM. ARAPUEY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (511, 148, 'PALMIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (512, 149, 'CM. TORONDOY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (513, 149, 'SAN CRISTOBAL DE T', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (514, 150, 'ARIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (515, 150, 'SAGRARIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (516, 150, 'MILLA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (517, 150, 'EL LLANO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (518, 150, 'JUAN RODRIGUEZ SUAREZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (519, 150, 'JACINTO PLAZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (520, 150, 'DOMINGO PEÑA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (521, 150, 'GONZALO PICON FEBRES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (522, 150, 'OSUNA RODRIGUEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (523, 150, 'LASSO DE LA VEGA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (524, 150, 'CARACCIOLO PARRA P', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (525, 150, 'MARIANO PICON SALAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (526, 150, 'ANTONIO SPINETTI DINI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (527, 150, 'EL MORRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (528, 150, 'LOS NEVADOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (529, 151, 'CM. TABAY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (530, 152, 'CM. TIMOTES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (531, 152, 'ANDRES ELOY BLANCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (532, 152, 'PIÑANGO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (533, 152, 'LA VENTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (534, 153, 'CM. STA CRUZ DE MORA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (535, 153, 'MESA BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (536, 153, 'MESA DE LAS PALMAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (537, 154, 'CM. STA ELENA DE ARENALES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (538, 154, 'ELOY PAREDES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (539, 154, 'PQ R DE ALCAZAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (540, 155, 'CM. TUCANI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (541, 155, 'FLORENCIO RAMIREZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (542, 156, 'CM. SANTO DOMINGO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (543, 156, 'LAS PIEDRAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (544, 157, 'CM. PUEBLO LLANO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (545, 158, 'CM. MUCUCHIES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (546, 158, 'MUCURUBA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (547, 158, 'SAN RAFAEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (548, 158, 'CACUTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (549, 158, 'LA TOMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (550, 159, 'CM. BAILADORES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (551, 159, 'GERONIMO MALDONADO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (552, 160, 'CM. LAGUNILLAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (553, 160, 'CHIGUARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (554, 160, 'ESTANQUES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (555, 160, 'SAN JUAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (556, 160, 'PUEBLO NUEVO DEL SUR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (557, 160, 'LA TRAMPA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (558, 161, 'EL LLANO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (559, 161, 'TOVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (560, 161, 'EL AMPARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (561, 161, 'SAN FRANCISCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (562, 162, 'CM. NUEVA BOLIVIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (563, 162, 'INDEPENDENCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (564, 162, 'MARIA C PALACIOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (565, 162, 'SANTA APOLONIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (566, 163, 'CM. STA MARIA DE CAPARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (567, 164, 'CM. ARICAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (568, 164, 'SAN ANTONIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (569, 165, 'CM. ZEA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (570, 165, 'CAÑO EL TIGRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (571, 166, 'CAUCAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (572, 166, 'ARAGUITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (573, 166, 'AREVALO GONZALEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (574, 166, 'CAPAYA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (575, 166, 'PANAQUIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (576, 166, 'RIBAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (577, 166, 'EL CAFE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (578, 166, 'MARIZAPA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (579, 167, 'HIGUEROTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (580, 167, 'CURIEPE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (581, 167, 'TACARIGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (582, 168, 'LOS TEQUES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (583, 168, 'CECILIO ACOSTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (584, 168, 'PARACOTOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (585, 168, 'SAN PEDRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (586, 168, 'TACATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (587, 168, 'EL JARILLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (588, 168, 'ALTAGRACIA DE LA M', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (589, 169, 'STA TERESA DEL TUY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (590, 169, 'EL CARTANAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (591, 170, 'OCUMARE DEL TUY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (592, 170, 'LA DEMOCRACIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (593, 170, 'SANTA BARBARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (594, 171, 'RIO CHICO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (595, 171, 'EL GUAPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (596, 171, 'TACARIGUA DE LA LAGUNA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (597, 171, 'PAPARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (598, 171, 'SN FERNANDO DEL GUAPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (599, 172, 'SANTA LUCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (600, 173, 'GUARENAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (601, 174, 'PETARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (602, 174, 'LEONCIO MARTINEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (603, 174, 'CAUCAGUITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (604, 174, 'FILAS DE MARICHES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (605, 174, 'LA DOLORITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (606, 175, 'CUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (607, 175, 'NUEVA CUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (608, 176, 'GUATIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (609, 176, 'BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (610, 177, 'CHARALLAVE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (611, 177, 'LAS BRISAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (612, 178, 'SAN ANTONIO LOS ALTOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (613, 179, 'SAN JOSE DE BARLOVENTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (614, 179, 'CUMBO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (615, 180, 'SAN FCO DE YARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (616, 180, 'S ANTONIO DE YARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (617, 181, 'BARUTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (618, 181, 'EL CAFETAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (619, 181, 'LAS MINAS DE BARUTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (620, 182, 'CARRIZAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (621, 183, 'CHACAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (622, 184, 'EL HATILLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (623, 185, 'MAMPORAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (624, 186, 'CUPIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (625, 186, 'MACHURUCUTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (626, 187, 'CM. SAN ANTONIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (627, 187, 'SAN FRANCISCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (628, 188, 'CM. CARIPITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (629, 189, 'CM. CARIPE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (630, 189, 'TERESEN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (631, 189, 'EL GUACHARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (632, 189, 'SAN AGUSTIN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (633, 189, 'LA GUANOTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (634, 189, 'SABANA DE PIEDRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (635, 190, 'CM. CAICARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (636, 190, 'AREO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (637, 190, 'SAN FELIX', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (638, 190, 'VIENTO FRESCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (639, 191, 'CM. PUNTA DE MATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (640, 191, 'EL TEJERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (641, 192, 'CM. TEMBLADOR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (642, 192, 'TABASCA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (643, 192, 'LAS ALHUACAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (644, 192, 'CHAGUARAMAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (645, 193, 'EL FURRIAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (646, 193, 'JUSEPIN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (647, 193, 'EL COROZO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (648, 193, 'SAN VICENTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (649, 193, 'LA PICA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (650, 193, 'ALTO DE LOS GODOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (651, 193, 'BOQUERON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (652, 193, 'LAS COCUIZAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (653, 193, 'SANTA CRUZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (654, 193, 'SAN SIMON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (655, 194, 'CM. ARAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (656, 194, 'CHAGUARAMAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (657, 194, 'GUANAGUANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (658, 194, 'APARICIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (659, 194, 'TAGUAYA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (660, 194, 'EL PINTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (661, 194, 'LA TOSCANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (662, 195, 'CM. QUIRIQUIRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (663, 195, 'CACHIPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (664, 196, 'CM. BARRANCAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (665, 196, 'LOS BARRANCOS DE FAJARDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (666, 197, 'CM. AGUASAY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (667, 198, 'CM. SANTA BARBARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (668, 199, 'CM. URACOA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (669, 200, 'CM. LA ASUNCION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (670, 201, 'CM. SAN JUAN BAUTISTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (671, 201, 'ZABALA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (672, 202, 'CM. SANTA ANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (673, 202, 'GUEVARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (674, 202, 'MATASIETE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (675, 202, 'BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (676, 202, 'SUCRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (677, 203, 'CM. PAMPATAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (678, 203, 'AGUIRRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (679, 204, 'CM. JUAN GRIEGO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (680, 204, 'ADRIAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (681, 205, 'CM. PORLAMAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (682, 206, 'CM. BOCA DEL RIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (683, 206, 'SAN FRANCISCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (684, 207, 'CM. SAN PEDRO DE COCHE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (685, 207, 'VICENTE FUENTES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (686, 208, 'CM. PUNTA DE PIEDRAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (687, 208, 'LOS BARALES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (688, 209, 'CM.LA PLAZA DE PARAGUACHI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (689, 210, 'CM. VALLE ESP SANTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (690, 210, 'FRANCISCO FAJARDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (691, 211, 'CM. ARAURE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (692, 211, 'RIO ACARIGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (693, 212, 'CM. PIRITU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (694, 212, 'UVERAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (695, 213, 'CM. GUANARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (696, 213, 'CORDOBA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (697, 213, 'SAN JUAN GUANAGUANARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (698, 213, 'VIRGEN DE LA COROMOTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (699, 213, 'SAN JOSE DE LA MONTAÑA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (700, 214, 'CM. GUANARITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (701, 214, 'TRINIDAD DE LA CAPILLA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (702, 214, 'DIVINA PASTORA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (703, 215, 'CM. OSPINO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (704, 215, 'APARICION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (705, 215, 'LA ESTACION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (706, 216, 'CM. ACARIGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (707, 216, 'PAYARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (708, 216, 'PIMPINELA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (709, 216, 'RAMON PERAZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (710, 217, 'CM. BISCUCUY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (711, 217, 'CONCEPCION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (712, 217, 'SAN RAFAEL PALO ALZADO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (713, 217, 'UVENCIO A VELASQUEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (714, 217, 'SAN JOSE DE SAGUAZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (715, 217, 'VILLA ROSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (716, 218, 'CM. VILLA BRUZUAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (717, 218, 'CANELONES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (718, 218, 'SANTA CRUZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (719, 218, 'SAN ISIDRO LABRADOR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (720, 219, 'CM. CHABASQUEN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (721, 219, 'PEÑA BLANCA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (722, 220, 'CM. AGUA BLANCA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (723, 221, 'CM. PAPELON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (724, 221, 'CAÑO DELGADITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (725, 222, 'CM. BOCONOITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (726, 222, 'ANTOLIN TOVAR AQUINO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (727, 223, 'CM. SAN RAFAEL DE ONOTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (728, 223, 'SANTA FE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (729, 223, 'THERMO MORLES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (730, 224, 'CM. EL PLAYON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (731, 224, 'FLORIDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (732, 225, 'RIO CARIBE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (733, 225, 'SAN JUAN GALDONAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (734, 225, 'PUERTO SANTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (735, 225, 'EL MORRO DE PTO SANTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (736, 225, 'ANTONIO JOSE DE SUCRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (737, 226, 'EL PILAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (738, 226, 'EL RINCON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (739, 226, 'GUARAUNOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (740, 226, 'TUNAPUICITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (741, 226, 'UNION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (742, 226, 'GRAL FCO. A VASQUEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (743, 227, 'SANTA CATALINA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (744, 227, 'SANTA ROSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (745, 227, 'SANTA TERESA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (746, 227, 'BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (747, 227, 'MACARAPANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (748, 228, 'YAGUARAPARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (749, 228, 'LIBERTAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (750, 228, 'PAUJIL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (751, 229, 'IRAPA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (752, 229, 'CAMPO CLARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (753, 229, 'SORO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (754, 229, 'SAN ANTONIO DE IRAPA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (755, 229, 'MARABAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (756, 230, 'CM. SAN ANT DEL GOLFO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (757, 231, 'CUMANACOA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (758, 231, 'ARENAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (759, 231, 'ARICAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (760, 231, 'COCOLLAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (761, 231, 'SAN FERNANDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (762, 231, 'SAN LORENZO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (763, 232, 'CARIACO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (764, 232, 'CATUARO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (765, 232, 'RENDON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (766, 232, 'SANTA CRUZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (767, 232, 'SANTA MARIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (768, 233, 'ALTAGRACIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (769, 233, 'AYACUCHO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (770, 233, 'SANTA INES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (771, 233, 'VALENTIN VALIENTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (772, 233, 'SAN JUAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (773, 233, 'GRAN MARISCAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (774, 233, 'RAUL LEONI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (775, 234, 'GUIRIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (776, 234, 'CRISTOBAL COLON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (777, 234, 'PUNTA DE PIEDRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (778, 234, 'BIDEAU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (779, 235, 'MARIÑO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (780, 235, 'ROMULO GALLEGOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (781, 236, 'TUNAPUY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (782, 236, 'CAMPO ELIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (783, 237, 'SAN JOSE DE AREOCUAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (784, 237, 'TAVERA ACOSTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (785, 238, 'CM. MARIGUITAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (786, 239, 'ARAYA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (787, 239, 'MANICUARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (788, 239, 'CHACOPATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (789, 240, 'CM. COLON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (790, 240, 'RIVAS BERTI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (791, 240, 'SAN PEDRO DEL RIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (792, 241, 'CM. SAN ANT DEL TACHIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (793, 241, 'PALOTAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (794, 241, 'JUAN VICENTE GOMEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (795, 241, 'ISAIAS MEDINA ANGARIT', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (796, 242, 'CM. CAPACHO NUEVO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (797, 242, 'JUAN GERMAN ROSCIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (798, 242, 'ROMAN CARDENAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (799, 243, 'CM. TARIBA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (800, 243, 'LA FLORIDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (801, 243, 'AMENODORO RANGEL LAMU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (802, 244, 'CM. LA GRITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (803, 244, 'EMILIO C. GUERRERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (804, 244, 'MONS. MIGUEL A SALAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (805, 245, 'CM. RUBIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (806, 245, 'BRAMON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (807, 245, 'LA PETROLEA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (808, 245, 'QUINIMARI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (809, 246, 'CM. LOBATERA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (810, 246, 'CONSTITUCION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (811, 247, 'LA CONCORDIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (812, 247, 'PEDRO MARIA MORANTES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (813, 247, 'SN JUAN BAUTISTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (814, 247, 'SAN SEBASTIAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (815, 247, 'DR. FCO. ROMERO LOBO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (816, 248, 'CM. PREGONERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (817, 248, 'CARDENAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (818, 248, 'POTOSI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (819, 248, 'JUAN PABLO PEÑALOZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (820, 249, 'CM. STA. ANA  DEL TACHIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (821, 250, 'CM. LA FRIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (822, 250, 'BOCA DE GRITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (823, 250, 'JOSE ANTONIO PAEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (824, 251, 'CM. PALMIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (825, 252, 'CM. MICHELENA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (826, 253, 'CM. ABEJALES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (827, 253, 'SAN JOAQUIN DE NAVAY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (828, 253, 'DORADAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (829, 253, 'EMETERIO OCHOA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (830, 254, 'CM. COLONCITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (831, 254, 'LA PALMITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (832, 255, 'CM. UREÑA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (833, 255, 'NUEVA ARCADIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (834, 256, 'CM. QUENIQUEA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (835, 256, 'SAN PABLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (836, 256, 'ELEAZAR LOPEZ CONTRERA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (837, 257, 'CM. CORDERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (838, 258, 'CM.SAN RAFAEL DEL PINAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (839, 258, 'SANTO DOMINGO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (840, 258, 'ALBERTO ADRIANI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (841, 259, 'CM. CAPACHO VIEJO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (842, 259, 'CIPRIANO CASTRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (843, 259, 'MANUEL FELIPE RUGELES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (844, 260, 'CM. LA TENDIDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (845, 260, 'BOCONO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (846, 260, 'HERNANDEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (847, 261, 'CM. SEBORUCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (848, 262, 'CM. LAS MESAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (849, 263, 'CM. SAN JOSE DE BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (850, 264, 'CM. EL COBRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (851, 265, 'CM. DELICIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (852, 266, 'CM. SAN SIMON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (853, 267, 'CM. SAN JOSECITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (854, 268, 'CM. UMUQUENA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (855, 269, 'BETIJOQUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (856, 269, 'JOSE G HERNANDEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (857, 269, 'LA PUEBLITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (858, 269, 'EL CEDRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (859, 270, 'BOCONO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (860, 270, 'EL CARMEN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (861, 270, 'MOSQUEY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (862, 270, 'AYACUCHO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (863, 270, 'BURBUSAY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (864, 270, 'GENERAL RIVAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (865, 270, 'MONSEÑOR JAUREGUI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (866, 270, 'RAFAEL RANGEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (867, 270, 'SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (868, 270, 'SAN MIGUEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (869, 270, 'GUARAMACAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (870, 270, 'LA VEGA DE GUARAMACAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (871, 271, 'CARACHE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (872, 271, 'LA CONCEPCION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (873, 271, 'CUICAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (874, 271, 'PANAMERICANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (875, 271, 'SANTA CRUZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (876, 272, 'ESCUQUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (877, 272, 'SABANA LIBRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (878, 272, 'LA UNION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (879, 272, 'SANTA RITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (880, 273, 'CRISTOBAL MENDOZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (881, 273, 'CHIQUINQUIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (882, 273, 'MATRIZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (883, 273, 'MONSEÑOR CARRILLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (884, 273, 'CRUZ CARRILLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (885, 273, 'ANDRES LINARES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (886, 273, 'TRES ESQUINAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (887, 274, 'LA QUEBRADA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (888, 274, 'JAJO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (889, 274, 'LA MESA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (890, 274, 'SANTIAGO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (891, 274, 'CABIMBU', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (892, 274, 'TUÑAME', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (893, 275, 'MERCEDES DIAZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (894, 275, 'JUAN IGNACIO MONTILLA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (895, 275, 'LA BEATRIZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (896, 275, 'MENDOZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (897, 275, 'LA PUERTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (898, 275, 'SAN LUIS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (899, 276, 'CHEJENDE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (900, 276, 'CARRILLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (901, 276, 'CEGARRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (902, 276, 'BOLIVIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (903, 276, 'MANUEL SALVADOR ULLOA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (904, 276, 'SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (905, 276, 'ARNOLDO GABALDON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (906, 277, 'EL DIVIDIVE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (907, 277, 'AGUA CALIENTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (908, 277, 'EL CENIZO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (909, 277, 'AGUA SANTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (910, 277, 'VALERITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (911, 278, 'MONTE CARMELO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (912, 278, 'BUENA VISTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (913, 278, 'STA MARIA DEL HORCON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (914, 279, 'MOTATAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (915, 279, 'EL BAÑO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (916, 279, 'JALISCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (917, 280, 'PAMPAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (918, 280, 'SANTA ANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (919, 280, 'LA PAZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (920, 280, 'FLOR DE PATRIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (921, 281, 'CARVAJAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (922, 281, 'ANTONIO N BRICEÑO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (923, 281, 'CAMPO ALEGRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (924, 281, 'JOSE LEONARDO SUAREZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (925, 282, 'SABANA DE MENDOZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (926, 282, 'JUNIN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (927, 282, 'VALMORE RODRIGUEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (928, 282, 'EL PARAISO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (929, 283, 'SANTA ISABEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (930, 283, 'ARAGUANEY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (931, 283, 'EL JAGUITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (932, 283, 'LA ESPERANZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (933, 284, 'SABANA GRANDE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (934, 284, 'CHEREGUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (935, 284, 'GRANADOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (936, 285, 'EL SOCORRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (937, 285, 'LOS CAPRICHOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (938, 285, 'ANTONIO JOSE DE SUCRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (939, 286, 'CAMPO ELIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (940, 286, 'ARNOLDO GABALDON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (941, 287, 'SANTA APOLONIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (942, 287, 'LA CEIBA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (943, 287, 'EL PROGRESO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (944, 287, 'TRES DE FEBRERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (945, 288, 'PAMPANITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (946, 288, 'PAMPANITO II', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (947, 288, 'LA CONCEPCION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (948, 289, 'CM. AROA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (949, 290, 'CM. CHIVACOA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (950, 290, 'CAMPO ELIAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (951, 291, 'CM. NIRGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (952, 291, 'SALOM', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (953, 291, 'TEMERLA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (954, 292, 'CM. SAN FELIPE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (955, 292, 'ALBARICO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (956, 292, 'SAN JAVIER', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (957, 293, 'CM. GUAMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (958, 294, 'CM. URACHICHE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (959, 295, 'CM. YARITAGUA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (960, 295, 'SAN ANDRES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (961, 296, 'CM. SABANA DE PARRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (962, 297, 'CM. BORAURE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (963, 298, 'CM. COCOROTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (964, 299, 'CM. INDEPENDENCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (965, 300, 'CM. SAN PABLO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (966, 301, 'CM. YUMARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (967, 302, 'CM. FARRIAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (968, 302, 'EL GUAYABO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (969, 303, 'GENERAL URDANETA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (970, 303, 'LIBERTADOR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (971, 303, 'MANUEL GUANIPA MATOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (972, 303, 'MARCELINO BRICEÑO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (973, 303, 'SAN TIMOTEO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (974, 303, 'PUEBLO NUEVO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (975, 304, 'PEDRO LUCAS URRIBARRI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (976, 304, 'SANTA RITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (977, 304, 'JOSE CENOVIO URRIBARR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (978, 304, 'EL MENE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (979, 305, 'SANTA CRUZ DEL ZULIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (980, 305, 'URRIBARRI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (981, 305, 'MORALITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (982, 305, 'SAN CARLOS DEL ZULIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (983, 305, 'SANTA BARBARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (984, 306, 'LUIS DE VICENTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (985, 306, 'RICAURTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (986, 306, 'MONS.MARCOS SERGIO G', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (987, 306, 'SAN RAFAEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (988, 306, 'LAS PARCELAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (989, 306, 'TAMARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (990, 306, 'LA SIERRITA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (991, 307, 'BOLIVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (992, 307, 'COQUIVACOA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (993, 307, 'CRISTO DE ARANZA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (994, 307, 'CHIQUINQUIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (995, 307, 'SANTA LUCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (996, 307, 'OLEGARIO VILLALOBOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (997, 307, 'JUANA DE AVILA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (998, 307, 'CARACCIOLO PARRA PEREZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (999, 307, 'IDELFONZO VASQUEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1000, 307, 'CACIQUE MARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1001, 307, 'CECILIO ACOSTA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1002, 307, 'RAUL LEONI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1003, 307, 'FRANCISCO EUGENIO B', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1004, 307, 'MANUEL DAGNINO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1005, 307, 'LUIS HURTADO HIGUERA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1006, 307, 'VENANCIO PULGAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1007, 307, 'ANTONIO BORJAS ROMERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1008, 307, 'SAN ISIDRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1009, 308, 'FARIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1010, 308, 'SAN ANTONIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1011, 308, 'ANA MARIA CAMPOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1012, 308, 'SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1013, 308, 'ALTAGRACIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1014, 309, 'GOAJIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1015, 309, 'ELIAS SANCHEZ RUBIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1016, 309, 'SINAMAICA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1017, 309, 'ALTA GUAJIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1018, 310, 'SAN JOSE DE PERIJA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1019, 310, 'BARTOLOME DE LAS CASAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1020, 310, 'LIBERTAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1021, 310, 'RIO NEGRO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1022, 311, 'GIBRALTAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1023, 311, 'HERAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1024, 311, 'M.ARTURO CELESTINO A', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1025, 311, 'ROMULO GALLEGOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1026, 311, 'BOBURES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1027, 311, 'EL BATEY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1028, 312, 'ANDRES BELLO (KM 48)', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1029, 312, 'POTRERITOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1030, 312, 'EL CARMELO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1031, 312, 'CHIQUINQUIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1032, 312, 'CONCEPCION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1033, 313, 'ELEAZAR LOPEZ C', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1034, 313, 'ALONSO DE OJEDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1035, 313, 'VENEZUELA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1036, 313, 'CAMPO LARA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1037, 313, 'LIBERTAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1038, 314, 'UDON PEREZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1039, 314, 'ENCONTRADOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1040, 315, 'DONALDO GARCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1041, 315, 'SIXTO ZAMBRANO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1042, 315, 'EL ROSARIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1043, 316, 'AMBROSIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1044, 316, 'GERMAN RIOS LINARES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1045, 316, 'JORGE HERNANDEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1046, 316, 'LA ROSA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1047, 316, 'PUNTA GORDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1048, 316, 'CARMEN HERRERA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1049, 316, 'SAN BENITO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1050, 316, 'ROMULO BETANCOURT', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1051, 316, 'ARISTIDES CALVANI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1052, 317, 'RAUL CUENCA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1053, 317, 'LA VICTORIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1054, 317, 'RAFAEL URDANETA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1055, 318, 'JOSE RAMON YEPEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1056, 318, 'LA CONCEPCION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1057, 318, 'SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1058, 318, 'MARIANO PARRA LEON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1059, 319, 'MONAGAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1060, 319, 'ISLA DE TOAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1061, 320, 'MARCIAL HERNANDEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1062, 320, 'FRANCISCO OCHOA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1063, 320, 'SAN FRANCISCO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1064, 320, 'EL BAJO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1065, 320, 'DOMITILA FLORES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1066, 320, 'LOS CORTIJOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1067, 321, 'BARI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1068, 321, 'JESUS M SEMPRUN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1069, 322, 'SIMON RODRIGUEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1070, 322, 'CARLOS QUEVEDO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1071, 322, 'FRANCISCO J PULGAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1072, 323, 'RAFAEL MARIA BARALT', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1073, 323, 'MANUEL MANRIQUE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1074, 323, 'RAFAEL URDANETA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1075, 324, 'FERNANDO GIRON TOVAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1076, 324, 'LUIS ALBERTO GOMEZ', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1077, 324, 'PARHUEÑA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1078, 324, 'PLATANILLAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1079, 325, 'CM. SAN FERNANDO DE ATABA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1080, 325, 'UCATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1081, 325, 'YAPACANA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1082, 325, 'CANAME', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1083, 326, 'CM. MAROA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1084, 326, 'VICTORINO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1085, 326, 'COMUNIDAD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1086, 327, 'CM. SAN CARLOS DE RIO NEG', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1087, 327, 'SOLANO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1088, 327, 'COCUY', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1089, 328, 'CM. ISLA DE RATON', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1090, 328, 'SAMARIAPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1091, 328, 'SIPAPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1092, 328, 'MUNDUAPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1093, 328, 'GUAYAPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1094, 329, 'CM. SAN JUAN DE MANAPIARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1095, 329, 'ALTO VENTUARI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1096, 329, 'MEDIO VENTUARI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1097, 329, 'BAJO VENTUARI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1098, 330, 'CM. LA ESMERALDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1099, 330, 'HUACHAMACARE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1100, 330, 'MARAWAKA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1101, 330, 'MAVACA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1102, 330, 'SIERRA PARIMA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1103, 331, 'SAN JOSE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1104, 331, 'VIRGEN DEL VALLE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1105, 331, 'SAN RAFAEL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1106, 331, 'JOSE VIDAL MARCANO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1107, 331, 'LEONARDO RUIZ PINEDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1108, 331, 'MONS. ARGIMIRO GARCIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1109, 331, 'MCL.ANTONIO J DE SUCRE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1110, 331, 'JUAN MILLAN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1111, 332, 'PEDERNALES', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1112, 332, 'LUIS B PRIETO FIGUERO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1113, 333, 'CURIAPO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1114, 333, 'SANTOS DE ABELGAS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1115, 333, 'MANUEL RENAUD', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1116, 333, 'PADRE BARRAL', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1117, 333, 'ANICETO LUGO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1118, 333, 'ALMIRANTE LUIS BRION', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1119, 334, 'IMATACA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1120, 334, 'ROMULO GALLEGOS', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1121, 334, 'JUAN BAUTISTA ARISMEN', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1122, 334, 'MANUEL PIAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1123, 334, '5 DE JULIO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1124, 335, 'CARABALLEDA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1125, 335, 'CARAYACA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1126, 335, 'CARUAO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1127, 335, 'CATIA LA MAR', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1128, 335, 'LA GUAIRA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1129, 335, 'MACUTO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1130, 335, 'MAIQUETIA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1131, 335, 'NAIGUATA', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1132, 335, 'EL JUNKO', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1133, 335, 'PQ RAUL LEONI', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');
INSERT INTO parroquias VALUES (1134, 335, 'PQ CARLOS SOUBLETTE', '2014-04-11 08:49:05.975975', '2014-04-11 08:49:05.975975');


--
-- TOC entry 2096 (class 0 OID 0)
-- Dependencies: 193
-- Name: parroquias_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('parroquias_id_seq', 1134, true);


--
-- TOC entry 2062 (class 0 OID 53819)
-- Dependencies: 196 2063
-- Data for Name: servicios; Type: TABLE DATA; Schema: insumos; Owner: postgres
--

INSERT INTO servicios VALUES (1, 'Servicio-1', '2014-04-11 14:09:03', '2014-04-11 14:09:03');
INSERT INTO servicios VALUES (2, 'Servicio-2', '2014-04-11 14:09:03', '2014-04-11 14:09:03');
INSERT INTO servicios VALUES (3, 'Servicio-3', '2014-04-11 14:09:03', '2014-04-11 14:09:03');
INSERT INTO servicios VALUES (4, 'Servicio-4', '2014-04-11 14:09:03', '2014-04-11 14:09:03');
INSERT INTO servicios VALUES (5, 'Servicio-5', '2014-04-11 14:09:03', '2014-04-11 14:09:03');
INSERT INTO servicios VALUES (6, 'Servicio-6', '2014-04-11 14:09:03', '2014-04-11 14:09:03');
INSERT INTO servicios VALUES (7, 'Servicio-7', '2014-04-11 14:09:03', '2014-04-11 14:09:03');
INSERT INTO servicios VALUES (8, 'Servicio-8', '2014-04-11 14:09:03', '2014-04-11 14:09:03');
INSERT INTO servicios VALUES (9, 'Servicio-9', '2014-04-11 14:09:03', '2014-04-11 14:09:03');


--
-- TOC entry 2097 (class 0 OID 0)
-- Dependencies: 195
-- Name: servicios_id_seq; Type: SEQUENCE SET; Schema: insumos; Owner: postgres
--

SELECT pg_catalog.setval('servicios_id_seq', 9, true);


SET search_path = seguridad, pg_catalog;

--
-- TOC entry 2033 (class 0 OID 53641)
-- Dependencies: 167 2063
-- Data for Name: groups; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

INSERT INTO groups VALUES (1, 'Admin', '{"superuser":1}', '2014-04-11 14:09:02', '2014-04-11 14:09:02');


--
-- TOC entry 2098 (class 0 OID 0)
-- Dependencies: 166
-- Name: groups_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('groups_id_seq', 1, true);


--
-- TOC entry 2040 (class 0 OID 53681)
-- Dependencies: 174 2063
-- Data for Name: modulos; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--



--
-- TOC entry 2099 (class 0 OID 0)
-- Dependencies: 173
-- Name: modulos_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('modulos_id_seq', 1, false);


--
-- TOC entry 2038 (class 0 OID 53671)
-- Dependencies: 172 2063
-- Data for Name: permissions; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

INSERT INTO permissions VALUES (1, 'Super User', 'superuser', 'All permissions', '2014-04-11 14:09:01', '2014-04-11 14:09:01');
INSERT INTO permissions VALUES (2, 'List Users', 'view-users-list', 'View the list of users', '2014-04-11 14:09:01', '2014-04-11 14:09:01');
INSERT INTO permissions VALUES (3, 'Create user', 'create-user', 'Create new user', '2014-04-11 14:09:01', '2014-04-11 14:09:01');
INSERT INTO permissions VALUES (4, 'Delete user', 'delete-user', 'Delete a user', '2014-04-11 14:09:01', '2014-04-11 14:09:01');
INSERT INTO permissions VALUES (5, 'Update user', 'update-user-info', 'Update a user profile', '2014-04-11 14:09:01', '2014-04-11 14:09:01');
INSERT INTO permissions VALUES (6, 'Update user group', 'user-group-management', 'Add/Remove a user in a group', '2014-04-11 14:09:01', '2014-04-11 14:09:01');
INSERT INTO permissions VALUES (7, 'Groups management', 'groups-management', 'Manage group (CRUD)', '2014-04-11 14:09:01', '2014-04-11 14:09:01');
INSERT INTO permissions VALUES (8, 'Permissions management', 'permissions-management', 'Manage permissions (CRUD)', '2014-04-11 14:09:01', '2014-04-11 14:09:01');


--
-- TOC entry 2100 (class 0 OID 0)
-- Dependencies: 171
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('permissions_id_seq', 8, true);


--
-- TOC entry 2035 (class 0 OID 53654)
-- Dependencies: 169 2063
-- Data for Name: throttle; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--



--
-- TOC entry 2101 (class 0 OID 0)
-- Dependencies: 168
-- Name: throttle_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('throttle_id_seq', 1, false);


--
-- TOC entry 2031 (class 0 OID 53625)
-- Dependencies: 165 2063
-- Data for Name: users; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

INSERT INTO users VALUES (1, 'admin@localhost.com', 'administrador', '$2y$10$Vuw69JQ2RUgiTNRN8q0mVeqHyboQunigaa1M9VEFkfSw2yOv1eXiG', NULL, true, NULL, NULL, NULL, NULL, NULL, 'Administrador', 'Administrador', '2014-04-11 14:09:02', '2014-04-11 14:09:02');


--
-- TOC entry 2036 (class 0 OID 53664)
-- Dependencies: 170 2063
-- Data for Name: users_groups; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

INSERT INTO users_groups VALUES (1, 1);


--
-- TOC entry 2102 (class 0 OID 0)
-- Dependencies: 164
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 1, true);


SET search_path = insumos, pg_catalog;

--
-- TOC entry 1902 (class 2606 OID 53711)
-- Dependencies: 178 178 2064
-- Name: casos_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY casos
    ADD CONSTRAINT casos_pkey PRIMARY KEY (id);


--
-- TOC entry 1904 (class 2606 OID 53724)
-- Dependencies: 180 180 2064
-- Name: estados_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estados
    ADD CONSTRAINT estados_pkey PRIMARY KEY (id);


--
-- TOC entry 1906 (class 2606 OID 53732)
-- Dependencies: 182 182 2064
-- Name: examenes_lab_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY examenes_lab
    ADD CONSTRAINT examenes_lab_pkey PRIMARY KEY (id);


--
-- TOC entry 1908 (class 2606 OID 53745)
-- Dependencies: 184 184 2064
-- Name: imagenes_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY imagenes
    ADD CONSTRAINT imagenes_pkey PRIMARY KEY (id);


--
-- TOC entry 1910 (class 2606 OID 53758)
-- Dependencies: 186 186 2064
-- Name: material_med_qui_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY material_med_qui
    ADD CONSTRAINT material_med_qui_pkey PRIMARY KEY (id);


--
-- TOC entry 1912 (class 2606 OID 53774)
-- Dependencies: 188 188 2064
-- Name: medicamentos_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY medicamentos
    ADD CONSTRAINT medicamentos_pkey PRIMARY KEY (id);


--
-- TOC entry 1914 (class 2606 OID 53790)
-- Dependencies: 190 190 2064
-- Name: medicos_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY medicos
    ADD CONSTRAINT medicos_pkey PRIMARY KEY (id);


--
-- TOC entry 1916 (class 2606 OID 53798)
-- Dependencies: 192 192 2064
-- Name: municipios_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY municipios
    ADD CONSTRAINT municipios_pkey PRIMARY KEY (id);


--
-- TOC entry 1900 (class 2606 OID 53700)
-- Dependencies: 176 176 2064
-- Name: pacientes_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY pacientes
    ADD CONSTRAINT pacientes_pkey PRIMARY KEY (id);


--
-- TOC entry 1918 (class 2606 OID 53811)
-- Dependencies: 194 194 2064
-- Name: parroquias_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY parroquias
    ADD CONSTRAINT parroquias_pkey PRIMARY KEY (id);


--
-- TOC entry 1920 (class 2606 OID 53824)
-- Dependencies: 196 196 2064
-- Name: servicios_pkey; Type: CONSTRAINT; Schema: insumos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY servicios
    ADD CONSTRAINT servicios_pkey PRIMARY KEY (id);


SET search_path = seguridad, pg_catalog;

--
-- TOC entry 1885 (class 2606 OID 53649)
-- Dependencies: 167 167 2064
-- Name: groups_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (id);


--
-- TOC entry 1898 (class 2606 OID 53689)
-- Dependencies: 174 174 2064
-- Name: modulos_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY modulos
    ADD CONSTRAINT modulos_pkey PRIMARY KEY (id);


--
-- TOC entry 1894 (class 2606 OID 53676)
-- Dependencies: 172 172 2064
-- Name: permissions_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- TOC entry 1887 (class 2606 OID 53651)
-- Dependencies: 167 167 2064
-- Name: seguridad_groups_name_unique; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY groups
    ADD CONSTRAINT seguridad_groups_name_unique UNIQUE (name);


--
-- TOC entry 1896 (class 2606 OID 53678)
-- Dependencies: 172 172 2064
-- Name: seguridad_permissions_value_unique; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY permissions
    ADD CONSTRAINT seguridad_permissions_value_unique UNIQUE (value);


--
-- TOC entry 1881 (class 2606 OID 53636)
-- Dependencies: 165 165 2064
-- Name: seguridad_users_username_unique; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT seguridad_users_username_unique UNIQUE (username);


--
-- TOC entry 1890 (class 2606 OID 53662)
-- Dependencies: 169 169 2064
-- Name: throttle_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY throttle
    ADD CONSTRAINT throttle_pkey PRIMARY KEY (id);


--
-- TOC entry 1892 (class 2606 OID 53668)
-- Dependencies: 170 170 170 2064
-- Name: users_groups_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users_groups
    ADD CONSTRAINT users_groups_pkey PRIMARY KEY (user_id, group_id);


--
-- TOC entry 1883 (class 2606 OID 53634)
-- Dependencies: 165 165 2064
-- Name: users_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 1888 (class 1259 OID 53663)
-- Dependencies: 169 2064
-- Name: seguridad_throttle_user_id_index; Type: INDEX; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE INDEX seguridad_throttle_user_id_index ON throttle USING btree (user_id);


--
-- TOC entry 1878 (class 1259 OID 53637)
-- Dependencies: 165 2064
-- Name: seguridad_users_activation_code_index; Type: INDEX; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE INDEX seguridad_users_activation_code_index ON users USING btree (activation_code);


--
-- TOC entry 1879 (class 1259 OID 53638)
-- Dependencies: 165 2064
-- Name: seguridad_users_reset_password_code_index; Type: INDEX; Schema: seguridad; Owner: postgres; Tablespace: 
--

CREATE INDEX seguridad_users_reset_password_code_index ON users USING btree (reset_password_code);


SET search_path = insumos, pg_catalog;

--
-- TOC entry 1921 (class 2606 OID 53712)
-- Dependencies: 178 176 1899 2064
-- Name: casos_id_paciente_foreign; Type: FK CONSTRAINT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY casos
    ADD CONSTRAINT casos_id_paciente_foreign FOREIGN KEY (id_paciente) REFERENCES pacientes(id);


--
-- TOC entry 1922 (class 2606 OID 53733)
-- Dependencies: 178 1901 182 2064
-- Name: examenes_lab_id_caso_foreign; Type: FK CONSTRAINT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY examenes_lab
    ADD CONSTRAINT examenes_lab_id_caso_foreign FOREIGN KEY (id_caso) REFERENCES casos(id);


--
-- TOC entry 1923 (class 2606 OID 53746)
-- Dependencies: 178 184 1901 2064
-- Name: imagenes_id_caso_foreign; Type: FK CONSTRAINT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY imagenes
    ADD CONSTRAINT imagenes_id_caso_foreign FOREIGN KEY (id_caso) REFERENCES casos(id);


--
-- TOC entry 1924 (class 2606 OID 53759)
-- Dependencies: 1901 186 178 2064
-- Name: material_med_qui_id_caso_foreign; Type: FK CONSTRAINT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY material_med_qui
    ADD CONSTRAINT material_med_qui_id_caso_foreign FOREIGN KEY (id_caso) REFERENCES casos(id);


--
-- TOC entry 1925 (class 2606 OID 53775)
-- Dependencies: 1901 188 178 2064
-- Name: medicamentos_id_caso_foreign; Type: FK CONSTRAINT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY medicamentos
    ADD CONSTRAINT medicamentos_id_caso_foreign FOREIGN KEY (id_caso) REFERENCES casos(id);


--
-- TOC entry 1926 (class 2606 OID 53799)
-- Dependencies: 1903 180 192 2064
-- Name: municipios_id_estado_foreign; Type: FK CONSTRAINT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY municipios
    ADD CONSTRAINT municipios_id_estado_foreign FOREIGN KEY (id_estado) REFERENCES estados(id);


--
-- TOC entry 1927 (class 2606 OID 53812)
-- Dependencies: 1915 194 192 2064
-- Name: parroquias_id_municipio_foreign; Type: FK CONSTRAINT; Schema: insumos; Owner: postgres
--

ALTER TABLE ONLY parroquias
    ADD CONSTRAINT parroquias_id_municipio_foreign FOREIGN KEY (id_municipio) REFERENCES municipios(id);


--
-- TOC entry 2069 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2014-04-11 09:42:10 VET

--
-- PostgreSQL database dump complete
--

