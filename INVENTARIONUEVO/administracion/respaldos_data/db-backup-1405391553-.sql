DROP TABLE departamento;

CREATE TABLE `departamento` (
  `codigo_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(200) NOT NULL,
  `status_departamento` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO departamento VALUES("1","Forros de Celulares","Activo");
INSERT INTO departamento VALUES("2","telefonos","Activo");



DROP TABLE detalle_pedido;

CREATE TABLE `detalle_pedido` (
  `codigo_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` int(11) NOT NULL,
  `codigo_pedido` int(11) NOT NULL,
  PRIMARY KEY (`codigo_detalle_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO detalle_pedido VALUES("1","1","1");
INSERT INTO detalle_pedido VALUES("2","2","1");
INSERT INTO detalle_pedido VALUES("3","1","2");
INSERT INTO detalle_pedido VALUES("4","1","3");
INSERT INTO detalle_pedido VALUES("5","1","11");
INSERT INTO detalle_pedido VALUES("6","1","11");
INSERT INTO detalle_pedido VALUES("7","1","123");
INSERT INTO detalle_pedido VALUES("8","3","123");



DROP TABLE detalle_venta;

CREATE TABLE `detalle_venta` (
  `codigo_venta` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad_venta` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO detalle_venta VALUES("1","1","3");
INSERT INTO detalle_venta VALUES("3","1","3");



DROP TABLE pedido;

CREATE TABLE `pedido` (
  `codigo_pedido` int(11) NOT NULL,
  `fecha_pedido` varchar(200) NOT NULL,
  `rif` varchar(20) NOT NULL,
  `status_pedido` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO pedido VALUES("1","2014-07-13","204642167","Activo");
INSERT INTO pedido VALUES("2","2014-07-13","204642167","Activo");
INSERT INTO pedido VALUES("3","2014-07-13","204642167","Activo");
INSERT INTO pedido VALUES("11","2014-07-13","204642167","Activo");
INSERT INTO pedido VALUES("4","2014-07-14","204642167","Activo");
INSERT INTO pedido VALUES("5","2014-07-14","204642167","Activo");
INSERT INTO pedido VALUES("123","2014-07-14","204642167","Activo");



DROP TABLE producto;

CREATE TABLE `producto` (
  `codigo_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_departamento` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `stop_min` varchar(20) NOT NULL,
  `stop_max` varchar(20) NOT NULL,
  `cantidad_existencia` varchar(20) NOT NULL,
  `status_producto` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO producto VALUES("1","1","Forro Cuero Estuche Samsung Galaxy Ace 3 S7270","2","10","37","Activo");
INSERT INTO producto VALUES("2","1","Forro Protector Lunatik Para Iphone 4/4s","2","10","3","Activo");
INSERT INTO producto VALUES("3","2","orinoquia roraima","2","10","10","Activo");



DROP TABLE proveedor;

CREATE TABLE `proveedor` (
  `rif` int(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `persona_contacto` varchar(200) NOT NULL,
  `status_proveedor` varchar(200) NOT NULL,
  PRIMARY KEY (`rif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO proveedor VALUES("204642167","cocorote","04145664208","Inversiones Gutierrez c.a","Nelmary Gutierrez","Activo");



DROP TABLE usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","administrador","123456");



DROP TABLE venta;

CREATE TABLE `venta` (
  `codigo_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` varchar(200) NOT NULL,
  `status_venta` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_venta`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO venta VALUES("1","2014-07-13","Activo");
INSERT INTO venta VALUES("2","2014-07-13","Activo");
INSERT INTO venta VALUES("3","2014-07-13","Activo");
INSERT INTO venta VALUES("4","2014-07-14","Activo");



DROP TABLE view1;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1` AS select distinct `pedido`.`fecha_pedido` AS `fecha_pedido`,`producto`.`nombre_producto` AS `nombre_producto`,`producto`.`cantidad_existencia` AS `cantidad_existencia`,`proveedor`.`razon_social` AS `razon_social`,`proveedor`.`rif` AS `rif`,`departamento`.`nombre_departamento` AS `nombre_departamento` from ((((`pedido` join `detalle_pedido`) join `producto`) join `proveedor`) join `departamento`) where ((`departamento`.`codigo_departamento` = `producto`.`codigo_departamento`) and (`producto`.`codigo_producto` = `detalle_pedido`.`codigo_producto`) and (`detalle_pedido`.`codigo_pedido` = `pedido`.`codigo_pedido`) and (`pedido`.`rif` = `proveedor`.`rif`)) group by `producto`.`nombre_producto`;

INSERT INTO view1 VALUES("2014-07-13","Forro Cuero Estuche Samsung Galaxy Ace 3 S7270","37","Inversiones Gutierrez c.a","204642167","Forros de Celulares");
INSERT INTO view1 VALUES("2014-07-13","Forro Protector Lunatik Para Iphone 4/4s","3","Inversiones Gutierrez c.a","204642167","Forros de Celulares");
INSERT INTO view1 VALUES("2014-07-14","orinoquia roraima","10","Inversiones Gutierrez c.a","204642167","telefonos");



DROP TABLE view2;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view2` AS select `producto`.`codigo_producto` AS `codigo_producto`,`producto`.`nombre_producto` AS `nombre_producto`,`producto`.`stop_min` AS `stop_min`,`producto`.`stop_max` AS `stop_max`,`producto`.`cantidad_existencia` AS `cantidad_existencia`,`producto`.`status_producto` AS `status_producto`,`departamento`.`nombre_departamento` AS `nombre_departamento` from (`producto` join `departamento`) where (`producto`.`codigo_departamento` = `departamento`.`codigo_departamento`);

INSERT INTO view2 VALUES("1","Forro Cuero Estuche Samsung Galaxy Ace 3 S7270","2","10","37","Activo","Forros de Celulares");
INSERT INTO view2 VALUES("2","Forro Protector Lunatik Para Iphone 4/4s","2","10","3","Activo","Forros de Celulares");
INSERT INTO view2 VALUES("3","orinoquia roraima","2","10","10","Activo","telefonos");



