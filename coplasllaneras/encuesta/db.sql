# Esta tabla contendrá los títulos de la encuesta

CREATE TABLE `encuestas` (
  `id_enc` int(5) NOT NULL auto_increment,
  `pregunta` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id_enc`)
);

# Esta tabla contendrá las opciones de cada encuesta creada

CREATE TABLE `encuestas_opt` (
  `id_opt` int(10) NOT NULL auto_increment,
  `opciones` varchar(100) NOT NULL default '',
  `num_votos` int(10) NOT NULL default '0',
  `id_enc` int(6) NOT NULL default '0',
  PRIMARY KEY  (`id_opt`)
);

# Esta tabla contendrá la IP de los votantes

CREATE TABLE `encuestas_ip` (
  `id_ip` int(10) NOT NULL auto_increment,
  `ip_voto` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`id_ip`)
) 