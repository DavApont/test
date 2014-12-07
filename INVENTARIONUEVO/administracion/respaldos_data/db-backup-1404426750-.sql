DROP TABLE departamento;

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `descripciond` varchar(50) NOT NULL,
  PRIMARY KEY (`iddepartamento`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO departamento VALUES("1","Accesorios de celular");
INSERT INTO departamento VALUES("2","computadoras");



DROP TABLE empleado;

CREATE TABLE `empleado` (
  `cedulae` int(11) NOT NULL,
  `nombree` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`cedulae`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE entrada;

CREATE TABLE `entrada` (
  `idinsumo` int(11) NOT NULL,
  `rif` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` float NOT NULL,
  `fecharecepcion` varchar(30) NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `cedulae` int(11) NOT NULL,
  PRIMARY KEY (`idinsumo`,`rif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE insumo;

CREATE TABLE `insumo` (
  `idinsumo` int(11) NOT NULL,
  `decripcion` varchar(50) NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idinsumo`),
  KEY `idinsumo` (`idinsumo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE producto;

CREATE TABLE `producto` (
  `serial` int(11) NOT NULL,
  `nombreproducto` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `cedulacliente` int(11) NOT NULL,
  `nombrecliente` varchar(30) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE proveedor;

CREATE TABLE `proveedor` (
  `rif` int(11) NOT NULL,
  `nombrep` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `representante` varchar(20) NOT NULL,
  `observaciones` varchar(50) NOT NULL,
  PRIMARY KEY (`rif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","nellymar","123");



DROP TABLE venta;

CREATE TABLE `venta` (
  `idinsumo` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `fechaventa` varchar(30) NOT NULL,
  `metodopago` varchar(30) NOT NULL,
  `precio` float NOT NULL,
  `cedulae` int(11) NOT NULL,
  PRIMARY KEY (`idinsumo`,`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




