DROP TABLE departamento;

CREATE TABLE `departamento` (
  `codigo_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(200) NOT NULL,
  `status_departamento` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO departamento VALUES("1","BATERIA","Activo");



DROP TABLE detalle_pedido;

CREATE TABLE `detalle_pedido` (
  `codigo_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` int(11) NOT NULL,
  `codigo_pedido` int(11) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo_detalle_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE detalle_venta;

CREATE TABLE `detalle_venta` (
  `codigo_detalle_venta` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_venta` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad_venta` varchar(20) NOT NULL,
  UNIQUE KEY `codigo_detalle_venta` (`codigo_detalle_venta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE pedido;

CREATE TABLE `pedido` (
  `codigo_pedido` int(11) NOT NULL,
  `fecha_pedido` varchar(200) NOT NULL,
  `rif` varchar(20) NOT NULL,
  `status_pedido` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo_pedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE view1;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1` AS select `departamento`.`nombre_departamento` AS `nombre_departamento`,`producto`.`nombre_producto` AS `nombre_producto`,`producto`.`cantidad_existencia` AS `cantidad_existencia`,`producto`.`status_producto` AS `status_producto` from (`departamento` join `producto`) where (`producto`.`codigo_departamento` = `departamento`.`codigo_departamento`);




DROP TABLE view2;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view2` AS select `pedido`.`fecha_pedido` AS `fecha_pedido`,`proveedor`.`razon_social` AS `razon_social`,`proveedor`.`rif` AS `rif`,`departamento`.`nombre_departamento` AS `nombre_departamento`,`producto`.`nombre_producto` AS `nombre_producto`,`detalle_pedido`.`cantidad` AS `cantidad` from ((((`pedido` join `proveedor`) join `departamento`) join `producto`) join `detalle_pedido`) where ((`departamento`.`codigo_departamento` = `producto`.`codigo_departamento`) and (`pedido`.`rif` = `proveedor`.`rif`) and (`producto`.`codigo_producto` = `detalle_pedido`.`codigo_producto`) and (`detalle_pedido`.`codigo_pedido` = `pedido`.`codigo_pedido`));




