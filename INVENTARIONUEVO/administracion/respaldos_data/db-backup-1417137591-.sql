DROP TABLE departamento;

CREATE TABLE `departamento` (
  `codigo_departamento` int(11) NOT NULL auto_increment,
  `nombre_departamento` varchar(200) NOT NULL,
  `status_departamento` varchar(200) NOT NULL,
  PRIMARY KEY  (`codigo_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO departamento VALUES("1","BATERIA","Activo");
INSERT INTO departamento VALUES("2","CARGADOR","Activo");
INSERT INTO departamento VALUES("3","AHORRADOR","Activo");
INSERT INTO departamento VALUES("4","CARCAZA","Activo");
INSERT INTO departamento VALUES("5","CABLE USB","Activo");
INSERT INTO departamento VALUES("6","GOMAS","Activo");
INSERT INTO departamento VALUES("7","ESTUCHE","Activo");
INSERT INTO departamento VALUES("8","MANOS LIBRES STEREO","Activo");
INSERT INTO departamento VALUES("9","AUDIFONOS","Activo");
INSERT INTO departamento VALUES("10","MEMORIAS","Activo");
INSERT INTO departamento VALUES("11","PENDRIVE","Activo");
INSERT INTO departamento VALUES("12","LECTOR DE MEMORIA","Activo");
INSERT INTO departamento VALUES("13","CORNETA MUSICAL","Activo");
INSERT INTO departamento VALUES("14","CONTROL TV","Activo");
INSERT INTO departamento VALUES("15","CONTROL DVD","Activo");
INSERT INTO departamento VALUES("16","CONTROL AIRE ACONDICIONADO","Activo");
INSERT INTO departamento VALUES("17","CONTROL UNIVERSAL","Activo");
INSERT INTO departamento VALUES("18","TACTIL","Activo");
INSERT INTO departamento VALUES("19","FLEX","Activo");
INSERT INTO departamento VALUES("20","CONECTOR DE CARGA","Activo");
INSERT INTO departamento VALUES("21","TRACPAK","Activo");
INSERT INTO departamento VALUES("22","TRACKBOLL","Activo");
INSERT INTO departamento VALUES("23","MATRIZ DE TECLADO","Activo");
INSERT INTO departamento VALUES("24","PANTALLA O LCD","Activo");
INSERT INTO departamento VALUES("25","MICA O PANTALLA PROTECTORA","Activo");
INSERT INTO departamento VALUES("26","TECLADO","Activo");
INSERT INTO departamento VALUES("27","HERRAMIENTAS DE TRABAJO","Activo");
INSERT INTO departamento VALUES("28","PROTECTORES DE PANTALLA","Activo");
INSERT INTO departamento VALUES("29","LECTOR DE SIM CARD","Activo");
INSERT INTO departamento VALUES("30","RINGER","Activo");
INSERT INTO departamento VALUES("31","ANTIESPIAS","Activo");



DROP TABLE detalle_pedido;

CREATE TABLE `detalle_pedido` (
  `codigo_detalle_pedido` int(11) NOT NULL auto_increment,
  `codigo_producto` int(11) NOT NULL,
  `codigo_pedido` int(11) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  PRIMARY KEY  (`codigo_detalle_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO detalle_pedido VALUES("2","1","1199","10");
INSERT INTO detalle_pedido VALUES("3","1","0","1");
INSERT INTO detalle_pedido VALUES("4","1","122","1");



DROP TABLE detalle_venta;

CREATE TABLE `detalle_venta` (
  `codigo_detalle_venta` bigint(20) unsigned NOT NULL auto_increment,
  `codigo_venta` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad_venta` varchar(20) NOT NULL,
  UNIQUE KEY `codigo_detalle_venta` (`codigo_detalle_venta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE pedido;

CREATE TABLE `pedido` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `codigo_pedido` int(11) NOT NULL,
  `fecha_pedido` varchar(200) NOT NULL,
  `rif` varchar(20) NOT NULL,
  `status_pedido` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO pedido VALUES("1","666666667","","J-30727003-9","Activo");
INSERT INTO pedido VALUES("2","1313","","j-402224133-3","Activo");
INSERT INTO pedido VALUES("3","666666666","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("4","6666","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("5","666","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("6","5555555","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("7","2222222","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("8","0","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("9","111","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("10","22222","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("11","1123","2014-11-04","J-30727003-9","Activo");
INSERT INTO pedido VALUES("12","1212","2014-11-26","j-402224133-3","Activo");
INSERT INTO pedido VALUES("13","666666665","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("14","1","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("15","123","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("16","13123","22/10/2014","J-30856520-2","Activo");
INSERT INTO pedido VALUES("17","123123123","","","");
INSERT INTO pedido VALUES("18","12312","","","");
INSERT INTO pedido VALUES("19","123","22/10/2014","J-30856520-2","Activo");
INSERT INTO pedido VALUES("20","2222","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("21","11","","J-30856520-2","Activo");
INSERT INTO pedido VALUES("22","122","31/03/1988","J-30856520-2","Activo");
INSERT INTO pedido VALUES("23","111","12/12/2012","J-30727003-9","Activo");



DROP TABLE producto;

CREATE TABLE `producto` (
  `codigo_producto` int(11) NOT NULL auto_increment,
  `codigo_departamento` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `stop_min` varchar(20) NOT NULL,
  `stop_max` varchar(20) NOT NULL,
  `cantidad_existencia` varchar(20) NOT NULL,
  `status_producto` varchar(200) NOT NULL,
  PRIMARY KEY  (`codigo_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=255 DEFAULT CHARSET=latin1;

INSERT INTO producto VALUES("1","1","SANSUNG S3","2","20","135","Inactivo");
INSERT INTO producto VALUES("2","1","BB 8110","2","20","12","Activo");
INSERT INTO producto VALUES("3","1","C1188/401","2","20","2","Activo");
INSERT INTO producto VALUES("4","1","HB4H1","2","20","2","Activo");
INSERT INTO producto VALUES("5","1","LENOVO BL114","2","20","2","Activo");
INSERT INTO producto VALUES("6","1","LG/ GM310","2","20","1","Activo");
INSERT INTO producto VALUES("7","1","LG/KF510","2","20","1","Activo");
INSERT INTO producto VALUES("8","1","LG/KE970","2","20","1","Activo");
INSERT INTO producto VALUES("9","1","FOR/ HB4J1","2","20","3","Activo");
INSERT INTO producto VALUES("10","1","HB5B2","2","20","1","Activo");
INSERT INTO producto VALUES("11","1","HB5E1","2","20","3","Activo");
INSERT INTO producto VALUES("12","1","ZTE/X 991","2","20","1","Activo");
INSERT INTO producto VALUES("13","1","HUAWEI","2","20","3","Activo");
INSERT INTO producto VALUES("14","1","SAMG/ 4B","2","20","1","Activo");
INSERT INTO producto VALUES("15","1","SAMG/ 8190","2","20","3","Activo");
INSERT INTO producto VALUES("16","1","SAMG/5830","2","20","1","Activo");
INSERT INTO producto VALUES("17","1","BN/60","2","20","2","Activo");
INSERT INTO producto VALUES("18","1","SAMG/F250","2","20","1","Activo");
INSERT INTO producto VALUES("19","1","SAMG/3650","2","20","1","Activo");
INSERT INTO producto VALUES("20","1","SAMG/SIII","2","20","3","Activo");
INSERT INTO producto VALUES("21","1","SAMG/7220-7000","2","20","4","Activo");
INSERT INTO producto VALUES("22","1","SAMG/9100","2","20","2","Activo");
INSERT INTO producto VALUES("23","1","SAMG/S4","2","20","1","Activo");
INSERT INTO producto VALUES("24","1","MOT/ BR50","2","20","1","Activo");
INSERT INTO producto VALUES("25","1","NOK/ BL-6F","2","20","3","Activo");
INSERT INTO producto VALUES("26","1","NOK/BL-4S","2","20","1","Activo");
INSERT INTO producto VALUES("27","1","NOK/ BL-4D","2","20","2","Activo");
INSERT INTO producto VALUES("28","1","NOK/ BL-4J","2","20","6","Activo");
INSERT INTO producto VALUES("29","1","NOK/ BL/6C","2","20","3","Activo");
INSERT INTO producto VALUES("30","1","NOK/ BL-5CA","2","20","1","Activo");
INSERT INTO producto VALUES("31","1","NOK/BL-4U","2","20","7","Activo");
INSERT INTO producto VALUES("32","1","NOK/BL-5B","2","20","4","Activo");
INSERT INTO producto VALUES("33","1","BB/9700","2","20","5","Activo");
INSERT INTO producto VALUES("34","1","BB/9790","2","20","2","Activo");
INSERT INTO producto VALUES("35","1","BB/8100","2","20","1","Activo");
INSERT INTO producto VALUES("36","1","BB/8900","2","20","9","Activo");
INSERT INTO producto VALUES("37","1","BB/8520","2","20","14","Activo");
INSERT INTO producto VALUES("38","1","BB/9800","2","20","3","Activo");
INSERT INTO producto VALUES("39","1","BATERIA/ 23AE","2","20","2","Activo");
INSERT INTO producto VALUES("40","1","BATERIA/ AAA","2","20","55","Activo");
INSERT INTO producto VALUES("41","2","F250","2","20","8","Activo");
INSERT INTO producto VALUES("42","2","6101","2","20","22","Activo");
INSERT INTO producto VALUES("43","2","SONY E/ W800","2","20","1","Activo");
INSERT INTO producto VALUES("44","2","COM/CC114","2","20","2","Activo");
INSERT INTO producto VALUES("45","2","BB/8520","2","20","2","Activo");
INSERT INTO producto VALUES("46","2","C5588","2","20","9","Activo");
INSERT INTO producto VALUES("47","2","UTST/8010","2","20","5","Activo");
INSERT INTO producto VALUES("48","2","V3","2","20","3","Activo");
INSERT INTO producto VALUES("49","2","SAMG/ D900","2","20","3","Activo");
INSERT INTO producto VALUES("50","2","FIJO/004","2","20","7","Activo");
INSERT INTO producto VALUES("51","2","FIJO/005","2","20","0","Activo");
INSERT INTO producto VALUES("52","2","FIJO/001","2","20","6","Activo");
INSERT INTO producto VALUES("53","2","SAMG/TRIP/ORIG","2","20","1","Activo");
INSERT INTO producto VALUES("54","1","IPHONE/TRIPLE/ORIG","2","20","3","Activo");
INSERT INTO producto VALUES("55","2","BATERIA BB","2","20","11","Activo");
INSERT INTO producto VALUES("56","2","UNIVERSAL","2","20","4","Activo");
INSERT INTO producto VALUES("57","2","TRIPLE","2","20","2","Activo");
INSERT INTO producto VALUES("58","7","LAPTON","2","20","4","Activo");
INSERT INTO producto VALUES("59","7","CONTROL TV","2","20","13","Activo");
INSERT INTO producto VALUES("60","7","GALAXY/IPHONE","2","20","2","Activo");
INSERT INTO producto VALUES("61","7","NEGRO CANGURO","2","20","9","Activo");
INSERT INTO producto VALUES("62","7","SIII","2","20","5","Activo");
INSERT INTO producto VALUES("63","7","IPHONE 5","2","20","9","Activo");
INSERT INTO producto VALUES("64","7","S4/GALAXY","2","20","6","Activo");
INSERT INTO producto VALUES("65","3","NOK/6101","2","20","11","Activo");
INSERT INTO producto VALUES("66","3","BB/8320","2","20","11","Activo");
INSERT INTO producto VALUES("67","3","F250","2","20","8","Activo");
INSERT INTO producto VALUES("68","3","DS","2","20","4","Activo");
INSERT INTO producto VALUES("69","3","V9","2","20","4","Activo");
INSERT INTO producto VALUES("70","3","ADAPTADOR UNIVERSAL","2","20","4","Activo");
INSERT INTO producto VALUES("71","12","LECTOR MEMORIA","2","20","2","Activo");
INSERT INTO producto VALUES("72","13","FUCSIA RECTANGULAR","2","20","1","Activo");
INSERT INTO producto VALUES("73","14","SHARP","2","20","4","Activo");
INSERT INTO producto VALUES("74","14","PHILIPS","2","20","1","Activo");
INSERT INTO producto VALUES("75","14","SANYO","2","20","2","Activo");
INSERT INTO producto VALUES("76","14","RCA","2","20","1","Activo");
INSERT INTO producto VALUES("77","14","RIVIERA BLANCO","2","20","3","Activo");
INSERT INTO producto VALUES("78","14","RIVIERA NEGRO","2","20","3","Activo");
INSERT INTO producto VALUES("79","1","SANKEY","2","20","3","Activo");
INSERT INTO producto VALUES("80","14","TOSHIBA","2","20","2","Activo");
INSERT INTO producto VALUES("81","14","DAEWOO BLANCO","2","20","3","Activo");
INSERT INTO producto VALUES("82","14","LG NEGRO","2","20","2","Activo");
INSERT INTO producto VALUES("83","14","LG BLANCO","2","20","2","Activo");
INSERT INTO producto VALUES("84","14","SAMSUNG","2","20","3","Activo");
INSERT INTO producto VALUES("85","14","DAKA","2","20","3","Activo");
INSERT INTO producto VALUES("86","17","AIRE ACONDICIONADO","2","20","4","Activo");
INSERT INTO producto VALUES("87","6","BB/9320","2","20","3","Activo");
INSERT INTO producto VALUES("88","6","BB/8520","2","20","1","Activo");
INSERT INTO producto VALUES("89","6","BB/9100","2","20","1","Activo");
INSERT INTO producto VALUES("90","6","Y200T","2","20","2","Activo");
INSERT INTO producto VALUES("91","6","P1","2","20","2","Activo");
INSERT INTO producto VALUES("92","6","ST21I","2","20","2","Activo");
INSERT INTO producto VALUES("93","6","ST27I","2","20","2","Activo");
INSERT INTO producto VALUES("94","6","ST26I","2","20","3","Activo");
INSERT INTO producto VALUES("95","6","G7300","2","20","5","Activo");
INSERT INTO producto VALUES("96","6","L3X","2","20","5","Activo");
INSERT INTO producto VALUES("97","6","L7","2","20","13","Activo");
INSERT INTO producto VALUES("98","6","E975","2","20","3","Activo");
INSERT INTO producto VALUES("99","6","L9","2","20","16","Activo");
INSERT INTO producto VALUES("100","6","BB/9790","2","20","36","Activo");
INSERT INTO producto VALUES("101","6","BB/9700","2","20","18","Activo");
INSERT INTO producto VALUES("102","6","BB/9360","2","20","16","Activo");
INSERT INTO producto VALUES("103","6","BB/9900","2","20","27","Activo");
INSERT INTO producto VALUES("104","6","X991","2","20","10","Activo");
INSERT INTO producto VALUES("105","6","W1/H8836","2","20","7","Activo");
INSERT INTO producto VALUES("106","6","6050","2","20","1","Activo");
INSERT INTO producto VALUES("107","6","BB/8320","2","20","6","Activo");
INSERT INTO producto VALUES("108","6","S133","2","20","1","Activo");
INSERT INTO producto VALUES("109","6","S186","2","20","4","Activo");
INSERT INTO producto VALUES("110","6","C5635","2","20","4","Activo");
INSERT INTO producto VALUES("111","6","V791","2","20","1","Activo");
INSERT INTO producto VALUES("112","6","C6111","2","20","2","Activo");
INSERT INTO producto VALUES("113","6","N720","2","20","2","Activo");
INSERT INTO producto VALUES("114","6","V9200","2","20","2","Activo");
INSERT INTO producto VALUES("115","6","6510","2","20","0","Activo");
INSERT INTO producto VALUES("116","6","6510","2","20","2","Activo");
INSERT INTO producto VALUES("117","6","C3313T","2","20","2","Activo");
INSERT INTO producto VALUES("118","6","ZTE992","2","20","2","Activo");
INSERT INTO producto VALUES("119","6","OT5020","2","20","8","Activo");
INSERT INTO producto VALUES("120","6","CM990","2","20","6","Activo");
INSERT INTO producto VALUES("121","6","S5750","2","20","7","Activo");
INSERT INTO producto VALUES("122","6","S5230","2","20","4","Activo");
INSERT INTO producto VALUES("123","6","S3650","2","20","4","Activo");
INSERT INTO producto VALUES("124","6","S5360","2","20","11","Activo");
INSERT INTO producto VALUES("125","6","S5830","2","20","4","Activo");
INSERT INTO producto VALUES("126","6","S5830/CLIP","2","20","6","Activo");
INSERT INTO producto VALUES("127","6","SIII/USER","2","20","4","Activo");
INSERT INTO producto VALUES("128","6","SIII","2","20","22","Activo");
INSERT INTO producto VALUES("129","6","MINI/SIII","2","20","9","Activo");
INSERT INTO producto VALUES("130","6","SIV/MINI","2","20","8","Activo");
INSERT INTO producto VALUES("131","6","IPHONE 5","2","20","2","Activo");
INSERT INTO producto VALUES("132","6","IPHONE 4","2","20","6","Activo");
INSERT INTO producto VALUES("133","6","BB/9800","2","20","5","Activo");
INSERT INTO producto VALUES("134","6","BB/8120","2","20","12","Activo");
INSERT INTO producto VALUES("135","6","SAMG/SII","2","20","6","Activo");
INSERT INTO producto VALUES("136","6","SAMG/SIV","2","20","8","Activo");
INSERT INTO producto VALUES("137","6","BB/Z10","2","20","3","Activo");
INSERT INTO producto VALUES("138","6","N8","2","20","5","Activo");
INSERT INTO producto VALUES("139","6","VE979","2","20","7","Activo");
INSERT INTO producto VALUES("140","6","GALAXY 5800/5801","2","20","4","Activo");
INSERT INTO producto VALUES("141","6","SAMG/8160","2","20","9","Activo");
INSERT INTO producto VALUES("142","6","CM980","2","20","6","Activo");
INSERT INTO producto VALUES("143","6","C3222","2","20","2","Activo");
INSERT INTO producto VALUES("144","6","C8860/V8860","2","20","12","Activo");
INSERT INTO producto VALUES("145","6","S7500","2","20","10","Activo");
INSERT INTO producto VALUES("146","6","NOK/X2-01","2","20","1","Activo");
INSERT INTO producto VALUES("147","6","NOK/303","2","20","11","Activo");
INSERT INTO producto VALUES("148","6","V8150","2","20","1","Activo");
INSERT INTO producto VALUES("149","6","610","2","20","1","Activo");
INSERT INTO producto VALUES("150","6","EX 112/EX 115","2","20","14","Activo");
INSERT INTO producto VALUES("151","6","S/5690","2","20","5","Activo");
INSERT INTO producto VALUES("152","6","GRAND X","2","20","4","Activo");
INSERT INTO producto VALUES("153","6","ANES S","2","20","4","Activo");
INSERT INTO producto VALUES("154","6","SANG/8530","2","20","9","Activo");
INSERT INTO producto VALUES("155","6","SANG NATE/I 717","2","20","4","Activo");
INSERT INTO producto VALUES("156","6","SANG NEXUS/I9250","2","20","7","Activo");
INSERT INTO producto VALUES("157","27","TIRROS PARA CARCAZA","2","20","6","Activo");
INSERT INTO producto VALUES("158","27","PUNTA CAUTIN","2","20","4","Activo");
INSERT INTO producto VALUES("159","27","PALETA DESARMADORA","2","20","3","Activo");
INSERT INTO producto VALUES("160","27","PORTA BASO","2","20","1","Activo");
INSERT INTO producto VALUES("161","27","DESTORNILLADOR","2","20","1","Activo");
INSERT INTO producto VALUES("162","27","JUEGO DE DESTORNILLADOR","2","20","2","Activo");
INSERT INTO producto VALUES("163","27","MICRO FIBRA","2","20","6","Activo");
INSERT INTO producto VALUES("164","27","MOUSE GAMING","2","20","3","Activo");
INSERT INTO producto VALUES("165","5","IPHONE 5","2","20","3","Activo");
INSERT INTO producto VALUES("166","5","SANSUNG","2","20","1","Activo");
INSERT INTO producto VALUES("167","5","CABLE 3.5 A 3.5","2","20","1","Activo");
INSERT INTO producto VALUES("168","5","IPHONE 4","2","20","1","Activo");
INSERT INTO producto VALUES("169","5","CABLE PARA ENTRADA PENDRIVE","2","20","5","Activo");
INSERT INTO producto VALUES("170","5","V3","2","20","2","Activo");
INSERT INTO producto VALUES("171","5","MULTIPUERTO","2","20","1","Activo");
INSERT INTO producto VALUES("172","18","MINI/SIII","2","20","3","Activo");
INSERT INTO producto VALUES("173","18","SAMG/7500","2","20","1","Activo");
INSERT INTO producto VALUES("174","18","7562L","2","20","1","Activo");
INSERT INTO producto VALUES("175","18","HAWUEY Y300","2","20","1","Activo");
INSERT INTO producto VALUES("176","18","HAWUEY Y200","2","20","1","Activo");
INSERT INTO producto VALUES("177","18","LG-GS290","2","20","3","Activo");
INSERT INTO producto VALUES("178","18","GRANDX/ V970","2","20","1","Activo");
INSERT INTO producto VALUES("179","18","NOK/ X3-02","2","20","2","Activo");
INSERT INTO producto VALUES("180","18","SAMG/3650","2","20","3","Activo");
INSERT INTO producto VALUES("181","18","SAMG/5230 (02)","2","20","2","Activo");
INSERT INTO producto VALUES("182","19","LG/ MARIPOSA 980","2","20","114","Activo");
INSERT INTO producto VALUES("183","19","BB/8900","2","20","1","Activo");
INSERT INTO producto VALUES("184","19","MOT V9","2","20","2","Activo");
INSERT INTO producto VALUES("185","19","BB/9800","2","20","2","Activo");
INSERT INTO producto VALUES("186","19","TECLAD/SUPRIO/ BB 9500","2","20","2","Activo");
INSERT INTO producto VALUES("187","19","NOK/N95 (86)","2","20","1","Activo");
INSERT INTO producto VALUES("188","19","NOK/7310","2","20","2","Activo");
INSERT INTO producto VALUES("189","24","BB/9550","2","20","1","Activo");
INSERT INTO producto VALUES("190","24","SAMG/S3650","2","20","2","Activo");
INSERT INTO producto VALUES("191","24","BB/9100 (001)","2","20","2","Activo");
INSERT INTO producto VALUES("192","24","NOK/ X3-02","2","20","2","Activo");
INSERT INTO producto VALUES("193","24","SAMG/S830","2","20","2","Activo");
INSERT INTO producto VALUES("194","24","BB/8520 (010)","2","20","3","Activo");
INSERT INTO producto VALUES("195","24","NOK/C1","2","20","3","Activo");
INSERT INTO producto VALUES("196","29","SAMG/S4","2","20","1","Activo");
INSERT INTO producto VALUES("197","23","BB/8900","2","20","1","Activo");
INSERT INTO producto VALUES("198","30","MINI/SIII","2","20","1","Activo");
INSERT INTO producto VALUES("199","21","BB/9360","2","20","4","Activo");
INSERT INTO producto VALUES("200","11","2/G","2","20","1","Activo");
INSERT INTO producto VALUES("201","11","4/G","2","20","2","Activo");
INSERT INTO producto VALUES("202","10","2/G","2","20","1","Activo");
INSERT INTO producto VALUES("203","10","4/G","2","20","9","Activo");
INSERT INTO producto VALUES("204","8","COLORES SURTIDOS","2","20","11","Activo");
INSERT INTO producto VALUES("205","9","LG/8500","2","20","18","Activo");
INSERT INTO producto VALUES("206","9","HAWEI 5588","2","20","4","Activo");
INSERT INTO producto VALUES("207","9","BB/8100","2","20","2","Activo");
INSERT INTO producto VALUES("208","9","ZTE/V8/V9/SONY E","2","20","8","Activo");
INSERT INTO producto VALUES("209","4","BB/8320","2","20","1","Activo");
INSERT INTO producto VALUES("210","4","VSER CON TAPA BB/8900","2","20","1","Activo");
INSERT INTO producto VALUES("211","4","BB/9105","2","20","1","Activo");
INSERT INTO producto VALUES("212","4","BB/9100","2","20","2","Activo");
INSERT INTO producto VALUES("213","4","FRONTAL 9790","2","20","2","Activo");
INSERT INTO producto VALUES("214","4","BB/9700","2","20","1","Activo");
INSERT INTO producto VALUES("215","4","NOK/X2","2","20","1","Activo");
INSERT INTO producto VALUES("216","25","BB/9360","2","20","3","Activo");
INSERT INTO producto VALUES("217","25","BB/9360 CON MARCO","2","20","4","Activo");
INSERT INTO producto VALUES("218","4","TAPA BB/9380","2","20","1","Activo");
INSERT INTO producto VALUES("219","31","L9","2","20","3","Activo");
INSERT INTO producto VALUES("220","31","TABLE SAMG/PG200","2","20","4","Activo");
INSERT INTO producto VALUES("221","31","TABLE SAMG/P7510","2","20","4","Activo");
INSERT INTO producto VALUES("222","31","TABLE IPAD2","2","20","4","Activo");
INSERT INTO producto VALUES("223","31","TABLE KP570","2","20","3","Activo");
INSERT INTO producto VALUES("224","31","ONES","2","20","5","Activo");
INSERT INTO producto VALUES("225","31","IPHONE 4","2","20","9","Activo");
INSERT INTO producto VALUES("226","31","BB/9800","2","20","2","Activo");
INSERT INTO producto VALUES("227","31","SANSUNG 8530","2","20","3","Activo");
INSERT INTO producto VALUES("228","31","IPHONE 5","2","20","3","Activo");
INSERT INTO producto VALUES("229","31","BB/Z10","2","20","6","Activo");
INSERT INTO producto VALUES("230","31","SAMG/SIII","2","20","9","Activo");
INSERT INTO producto VALUES("231","31","BB/9220","2","20","3","Activo");
INSERT INTO producto VALUES("232","31","BB/9100","2","20","2","Activo");
INSERT INTO producto VALUES("233","31","BB/9000","2","20","3","Activo");
INSERT INTO producto VALUES("234","31","SANG/ I9300","2","20","7","Activo");
INSERT INTO producto VALUES("235","31","BB/Q10","2","20","2","Activo");
INSERT INTO producto VALUES("236","31","SANG/5830","2","20","3","Activo");
INSERT INTO producto VALUES("237","31","SANG/ I5700","2","20","4","Activo");
INSERT INTO producto VALUES("238","1","SANG/ I9100 OSCURO","2","20","1","Activo");
INSERT INTO producto VALUES("239","31","SANG/I9100 CLARO","2","20","4","Activo");
INSERT INTO producto VALUES("240","31","LG/E975","2","20","5","Activo");
INSERT INTO producto VALUES("241","31","BB/9360","2","20","6","Activo");
INSERT INTO producto VALUES("242","31","BB/8520","2","20","1","Activo");
INSERT INTO producto VALUES("243","31","BB/8500","2","20","2","Activo");
INSERT INTO producto VALUES("244","31","BB/8320","2","20","4","Activo");
INSERT INTO producto VALUES("245","31","NOK 200/201","2","20","3","Activo");
INSERT INTO producto VALUES("246","31","SANG/5360","2","20","2","Activo");
INSERT INTO producto VALUES("247","31","SANG/ACE DUOS","2","20","6","Activo");
INSERT INTO producto VALUES("248","31","NOK/N303","2","20","5","Activo");
INSERT INTO producto VALUES("249","31","NOK/C3","2","20","6","Activo");
INSERT INTO producto VALUES("250","31","NOK/E71","2","20","7","Activo");
INSERT INTO producto VALUES("251","31","HAWEI (G510)","2","20","5","Activo");
INSERT INTO producto VALUES("252","31","X PERIA","2","20","23","Activo");
INSERT INTO producto VALUES("253","31","SAMG/ NOTE2","2","20","5","Activo");
INSERT INTO producto VALUES("254","31","SANG/I9300 CLARO","2","20","3","Activo");



DROP TABLE proveedor;

CREATE TABLE `proveedor` (
  `rif` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `persona_contacto` varchar(200) NOT NULL,
  `status_proveedor` varchar(200) NOT NULL,
  PRIMARY KEY  (`rif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO proveedor VALUES("J-30856520-2","BARQUISIMETO","0251.233.35.34","CANGURO C.A","GUILLERMO SULOAGA","Activo");
INSERT INTO proveedor VALUES("J-40222413-3","ARAGUA","0412-130.06.37","ORANGE GROUP C.A","JOSE","Activo");
INSERT INTO proveedor VALUES("J-30727003-9","Maracay","0243.233.24.34","M&D GROUP, C.A","Dayana Colon","Activo");



DROP TABLE usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","administrador","123456");



DROP TABLE venta;

CREATE TABLE `venta` (
  `codigo_venta` int(11) NOT NULL auto_increment,
  `fecha_venta` varchar(200) NOT NULL,
  `status_venta` varchar(200) NOT NULL,
  PRIMARY KEY  (`codigo_venta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO venta VALUES("1","2014-08-26","Activo");
INSERT INTO venta VALUES("2","","Activo");



DROP TABLE view1;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1` AS select `departamento`.`nombre_departamento` AS `nombre_departamento`,`producto`.`nombre_producto` AS `nombre_producto`,`producto`.`cantidad_existencia` AS `cantidad_existencia`,`producto`.`status_producto` AS `status_producto` from (`departamento` join `producto`) where (`producto`.`codigo_departamento` = `departamento`.`codigo_departamento`);

INSERT INTO view1 VALUES("BATERIA","SANSUNG S3","135","Inactivo");
INSERT INTO view1 VALUES("BATERIA","BB 8110","12","Activo");
INSERT INTO view1 VALUES("BATERIA","C1188/401","2","Activo");
INSERT INTO view1 VALUES("BATERIA","HB4H1","2","Activo");
INSERT INTO view1 VALUES("BATERIA","LENOVO BL114","2","Activo");
INSERT INTO view1 VALUES("BATERIA","LG/ GM310","1","Activo");
INSERT INTO view1 VALUES("BATERIA","LG/KF510","1","Activo");
INSERT INTO view1 VALUES("BATERIA","LG/KE970","1","Activo");
INSERT INTO view1 VALUES("BATERIA","FOR/ HB4J1","3","Activo");
INSERT INTO view1 VALUES("BATERIA","HB5B2","1","Activo");
INSERT INTO view1 VALUES("BATERIA","HB5E1","3","Activo");
INSERT INTO view1 VALUES("BATERIA","ZTE/X 991","1","Activo");
INSERT INTO view1 VALUES("BATERIA","HUAWEI","3","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/ 4B","1","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/ 8190","3","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/5830","1","Activo");
INSERT INTO view1 VALUES("BATERIA","BN/60","2","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/F250","1","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/3650","1","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/SIII","3","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/7220-7000","4","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/9100","2","Activo");
INSERT INTO view1 VALUES("BATERIA","SAMG/S4","1","Activo");
INSERT INTO view1 VALUES("BATERIA","MOT/ BR50","1","Activo");
INSERT INTO view1 VALUES("BATERIA","NOK/ BL-6F","3","Activo");
INSERT INTO view1 VALUES("BATERIA","NOK/BL-4S","1","Activo");
INSERT INTO view1 VALUES("BATERIA","NOK/ BL-4D","2","Activo");
INSERT INTO view1 VALUES("BATERIA","NOK/ BL-4J","6","Activo");
INSERT INTO view1 VALUES("BATERIA","NOK/ BL/6C","3","Activo");
INSERT INTO view1 VALUES("BATERIA","NOK/ BL-5CA","1","Activo");
INSERT INTO view1 VALUES("BATERIA","NOK/BL-4U","7","Activo");
INSERT INTO view1 VALUES("BATERIA","NOK/BL-5B","4","Activo");
INSERT INTO view1 VALUES("BATERIA","BB/9700","5","Activo");
INSERT INTO view1 VALUES("BATERIA","BB/9790","2","Activo");
INSERT INTO view1 VALUES("BATERIA","BB/8100","1","Activo");
INSERT INTO view1 VALUES("BATERIA","BB/8900","9","Activo");
INSERT INTO view1 VALUES("BATERIA","BB/8520","14","Activo");
INSERT INTO view1 VALUES("BATERIA","BB/9800","3","Activo");
INSERT INTO view1 VALUES("BATERIA","BATERIA/ 23AE","2","Activo");
INSERT INTO view1 VALUES("BATERIA","BATERIA/ AAA","55","Activo");
INSERT INTO view1 VALUES("CARGADOR","F250","8","Activo");
INSERT INTO view1 VALUES("CARGADOR","6101","22","Activo");
INSERT INTO view1 VALUES("CARGADOR","SONY E/ W800","1","Activo");
INSERT INTO view1 VALUES("CARGADOR","COM/CC114","2","Activo");
INSERT INTO view1 VALUES("CARGADOR","BB/8520","2","Activo");
INSERT INTO view1 VALUES("CARGADOR","C5588","9","Activo");
INSERT INTO view1 VALUES("CARGADOR","UTST/8010","5","Activo");
INSERT INTO view1 VALUES("CARGADOR","V3","3","Activo");
INSERT INTO view1 VALUES("CARGADOR","SAMG/ D900","3","Activo");
INSERT INTO view1 VALUES("CARGADOR","FIJO/004","7","Activo");
INSERT INTO view1 VALUES("CARGADOR","FIJO/005","0","Activo");
INSERT INTO view1 VALUES("CARGADOR","FIJO/001","6","Activo");
INSERT INTO view1 VALUES("CARGADOR","SAMG/TRIP/ORIG","1","Activo");
INSERT INTO view1 VALUES("BATERIA","IPHONE/TRIPLE/ORIG","3","Activo");
INSERT INTO view1 VALUES("CARGADOR","BATERIA BB","11","Activo");
INSERT INTO view1 VALUES("CARGADOR","UNIVERSAL","4","Activo");
INSERT INTO view1 VALUES("CARGADOR","TRIPLE","2","Activo");
INSERT INTO view1 VALUES("ESTUCHE","LAPTON","4","Activo");
INSERT INTO view1 VALUES("ESTUCHE","CONTROL TV","13","Activo");
INSERT INTO view1 VALUES("ESTUCHE","GALAXY/IPHONE","2","Activo");
INSERT INTO view1 VALUES("ESTUCHE","NEGRO CANGURO","9","Activo");
INSERT INTO view1 VALUES("ESTUCHE","SIII","5","Activo");
INSERT INTO view1 VALUES("ESTUCHE","IPHONE 5","9","Activo");
INSERT INTO view1 VALUES("ESTUCHE","S4/GALAXY","6","Activo");
INSERT INTO view1 VALUES("AHORRADOR","NOK/6101","11","Activo");
INSERT INTO view1 VALUES("AHORRADOR","BB/8320","11","Activo");
INSERT INTO view1 VALUES("AHORRADOR","F250","8","Activo");
INSERT INTO view1 VALUES("AHORRADOR","DS","4","Activo");
INSERT INTO view1 VALUES("AHORRADOR","V9","4","Activo");
INSERT INTO view1 VALUES("AHORRADOR","ADAPTADOR UNIVERSAL","4","Activo");
INSERT INTO view1 VALUES("LECTOR DE MEMORIA","LECTOR MEMORIA","2","Activo");
INSERT INTO view1 VALUES("CORNETA MUSICAL","FUCSIA RECTANGULAR","1","Activo");
INSERT INTO view1 VALUES("CONTROL TV","SHARP","4","Activo");
INSERT INTO view1 VALUES("CONTROL TV","PHILIPS","1","Activo");
INSERT INTO view1 VALUES("CONTROL TV","SANYO","2","Activo");
INSERT INTO view1 VALUES("CONTROL TV","RCA","1","Activo");
INSERT INTO view1 VALUES("CONTROL TV","RIVIERA BLANCO","3","Activo");
INSERT INTO view1 VALUES("CONTROL TV","RIVIERA NEGRO","3","Activo");
INSERT INTO view1 VALUES("BATERIA","SANKEY","3","Activo");
INSERT INTO view1 VALUES("CONTROL TV","TOSHIBA","2","Activo");
INSERT INTO view1 VALUES("CONTROL TV","DAEWOO BLANCO","3","Activo");
INSERT INTO view1 VALUES("CONTROL TV","LG NEGRO","2","Activo");
INSERT INTO view1 VALUES("CONTROL TV","LG BLANCO","2","Activo");
INSERT INTO view1 VALUES("CONTROL TV","SAMSUNG","3","Activo");
INSERT INTO view1 VALUES("CONTROL TV","DAKA","3","Activo");
INSERT INTO view1 VALUES("CONTROL UNIVERSAL","AIRE ACONDICIONADO","4","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/9320","3","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/8520","1","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/9100","1","Activo");
INSERT INTO view1 VALUES("GOMAS","Y200T","2","Activo");
INSERT INTO view1 VALUES("GOMAS","P1","2","Activo");
INSERT INTO view1 VALUES("GOMAS","ST21I","2","Activo");
INSERT INTO view1 VALUES("GOMAS","ST27I","2","Activo");
INSERT INTO view1 VALUES("GOMAS","ST26I","3","Activo");
INSERT INTO view1 VALUES("GOMAS","G7300","5","Activo");
INSERT INTO view1 VALUES("GOMAS","L3X","5","Activo");
INSERT INTO view1 VALUES("GOMAS","L7","13","Activo");
INSERT INTO view1 VALUES("GOMAS","E975","3","Activo");
INSERT INTO view1 VALUES("GOMAS","L9","16","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/9790","36","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/9700","18","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/9360","16","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/9900","27","Activo");
INSERT INTO view1 VALUES("GOMAS","X991","10","Activo");
INSERT INTO view1 VALUES("GOMAS","W1/H8836","7","Activo");
INSERT INTO view1 VALUES("GOMAS","6050","1","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/8320","6","Activo");
INSERT INTO view1 VALUES("GOMAS","S133","1","Activo");
INSERT INTO view1 VALUES("GOMAS","S186","4","Activo");
INSERT INTO view1 VALUES("GOMAS","C5635","4","Activo");
INSERT INTO view1 VALUES("GOMAS","V791","1","Activo");
INSERT INTO view1 VALUES("GOMAS","C6111","2","Activo");
INSERT INTO view1 VALUES("GOMAS","N720","2","Activo");
INSERT INTO view1 VALUES("GOMAS","V9200","2","Activo");
INSERT INTO view1 VALUES("GOMAS","6510","0","Activo");
INSERT INTO view1 VALUES("GOMAS","6510","2","Activo");
INSERT INTO view1 VALUES("GOMAS","C3313T","2","Activo");
INSERT INTO view1 VALUES("GOMAS","ZTE992","2","Activo");
INSERT INTO view1 VALUES("GOMAS","OT5020","8","Activo");
INSERT INTO view1 VALUES("GOMAS","CM990","6","Activo");
INSERT INTO view1 VALUES("GOMAS","S5750","7","Activo");
INSERT INTO view1 VALUES("GOMAS","S5230","4","Activo");
INSERT INTO view1 VALUES("GOMAS","S3650","4","Activo");
INSERT INTO view1 VALUES("GOMAS","S5360","11","Activo");
INSERT INTO view1 VALUES("GOMAS","S5830","4","Activo");
INSERT INTO view1 VALUES("GOMAS","S5830/CLIP","6","Activo");
INSERT INTO view1 VALUES("GOMAS","SIII/USER","4","Activo");
INSERT INTO view1 VALUES("GOMAS","SIII","22","Activo");
INSERT INTO view1 VALUES("GOMAS","MINI/SIII","9","Activo");
INSERT INTO view1 VALUES("GOMAS","SIV/MINI","8","Activo");
INSERT INTO view1 VALUES("GOMAS","IPHONE 5","2","Activo");
INSERT INTO view1 VALUES("GOMAS","IPHONE 4","6","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/9800","5","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/8120","12","Activo");
INSERT INTO view1 VALUES("GOMAS","SAMG/SII","6","Activo");
INSERT INTO view1 VALUES("GOMAS","SAMG/SIV","8","Activo");
INSERT INTO view1 VALUES("GOMAS","BB/Z10","3","Activo");
INSERT INTO view1 VALUES("GOMAS","N8","5","Activo");
INSERT INTO view1 VALUES("GOMAS","VE979","7","Activo");
INSERT INTO view1 VALUES("GOMAS","GALAXY 5800/5801","4","Activo");
INSERT INTO view1 VALUES("GOMAS","SAMG/8160","9","Activo");
INSERT INTO view1 VALUES("GOMAS","CM980","6","Activo");
INSERT INTO view1 VALUES("GOMAS","C3222","2","Activo");
INSERT INTO view1 VALUES("GOMAS","C8860/V8860","12","Activo");
INSERT INTO view1 VALUES("GOMAS","S7500","10","Activo");
INSERT INTO view1 VALUES("GOMAS","NOK/X2-01","1","Activo");
INSERT INTO view1 VALUES("GOMAS","NOK/303","11","Activo");
INSERT INTO view1 VALUES("GOMAS","V8150","1","Activo");
INSERT INTO view1 VALUES("GOMAS","610","1","Activo");
INSERT INTO view1 VALUES("GOMAS","EX 112/EX 115","14","Activo");
INSERT INTO view1 VALUES("GOMAS","S/5690","5","Activo");
INSERT INTO view1 VALUES("GOMAS","GRAND X","4","Activo");
INSERT INTO view1 VALUES("GOMAS","ANES S","4","Activo");
INSERT INTO view1 VALUES("GOMAS","SANG/8530","9","Activo");
INSERT INTO view1 VALUES("GOMAS","SANG NATE/I 717","4","Activo");
INSERT INTO view1 VALUES("GOMAS","SANG NEXUS/I9250","7","Activo");
INSERT INTO view1 VALUES("HERRAMIENTAS DE TRABAJO","TIRROS PARA CARCAZA","6","Activo");
INSERT INTO view1 VALUES("HERRAMIENTAS DE TRABAJO","PUNTA CAUTIN","4","Activo");
INSERT INTO view1 VALUES("HERRAMIENTAS DE TRABAJO","PALETA DESARMADORA","3","Activo");
INSERT INTO view1 VALUES("HERRAMIENTAS DE TRABAJO","PORTA BASO","1","Activo");
INSERT INTO view1 VALUES("HERRAMIENTAS DE TRABAJO","DESTORNILLADOR","1","Activo");
INSERT INTO view1 VALUES("HERRAMIENTAS DE TRABAJO","JUEGO DE DESTORNILLADOR","2","Activo");
INSERT INTO view1 VALUES("HERRAMIENTAS DE TRABAJO","MICRO FIBRA","6","Activo");
INSERT INTO view1 VALUES("HERRAMIENTAS DE TRABAJO","MOUSE GAMING","3","Activo");
INSERT INTO view1 VALUES("CABLE USB","IPHONE 5","3","Activo");
INSERT INTO view1 VALUES("CABLE USB","SANSUNG","1","Activo");
INSERT INTO view1 VALUES("CABLE USB","CABLE 3.5 A 3.5","1","Activo");
INSERT INTO view1 VALUES("CABLE USB","IPHONE 4","1","Activo");
INSERT INTO view1 VALUES("CABLE USB","CABLE PARA ENTRADA PENDRIVE","5","Activo");
INSERT INTO view1 VALUES("CABLE USB","V3","2","Activo");
INSERT INTO view1 VALUES("CABLE USB","MULTIPUERTO","1","Activo");
INSERT INTO view1 VALUES("TACTIL","MINI/SIII","3","Activo");
INSERT INTO view1 VALUES("TACTIL","SAMG/7500","1","Activo");
INSERT INTO view1 VALUES("TACTIL","7562L","1","Activo");
INSERT INTO view1 VALUES("TACTIL","HAWUEY Y300","1","Activo");
INSERT INTO view1 VALUES("TACTIL","HAWUEY Y200","1","Activo");
INSERT INTO view1 VALUES("TACTIL","LG-GS290","3","Activo");
INSERT INTO view1 VALUES("TACTIL","GRANDX/ V970","1","Activo");
INSERT INTO view1 VALUES("TACTIL","NOK/ X3-02","2","Activo");
INSERT INTO view1 VALUES("TACTIL","SAMG/3650","3","Activo");
INSERT INTO view1 VALUES("TACTIL","SAMG/5230 (02)","2","Activo");
INSERT INTO view1 VALUES("FLEX","LG/ MARIPOSA 980","114","Activo");
INSERT INTO view1 VALUES("FLEX","BB/8900","1","Activo");
INSERT INTO view1 VALUES("FLEX","MOT V9","2","Activo");
INSERT INTO view1 VALUES("FLEX","BB/9800","2","Activo");
INSERT INTO view1 VALUES("FLEX","TECLAD/SUPRIO/ BB 9500","2","Activo");
INSERT INTO view1 VALUES("FLEX","NOK/N95 (86)","1","Activo");
INSERT INTO view1 VALUES("FLEX","NOK/7310","2","Activo");
INSERT INTO view1 VALUES("PANTALLA O LCD","BB/9550","1","Activo");
INSERT INTO view1 VALUES("PANTALLA O LCD","SAMG/S3650","2","Activo");
INSERT INTO view1 VALUES("PANTALLA O LCD","BB/9100 (001)","2","Activo");
INSERT INTO view1 VALUES("PANTALLA O LCD","NOK/ X3-02","2","Activo");
INSERT INTO view1 VALUES("PANTALLA O LCD","SAMG/S830","2","Activo");
INSERT INTO view1 VALUES("PANTALLA O LCD","BB/8520 (010)","3","Activo");
INSERT INTO view1 VALUES("PANTALLA O LCD","NOK/C1","3","Activo");
INSERT INTO view1 VALUES("LECTOR DE SIM CARD","SAMG/S4","1","Activo");
INSERT INTO view1 VALUES("MATRIZ DE TECLADO","BB/8900","1","Activo");
INSERT INTO view1 VALUES("RINGER","MINI/SIII","1","Activo");
INSERT INTO view1 VALUES("TRACPAK","BB/9360","4","Activo");
INSERT INTO view1 VALUES("PENDRIVE","2/G","1","Activo");
INSERT INTO view1 VALUES("PENDRIVE","4/G","2","Activo");
INSERT INTO view1 VALUES("MEMORIAS","2/G","1","Activo");
INSERT INTO view1 VALUES("MEMORIAS","4/G","9","Activo");
INSERT INTO view1 VALUES("MANOS LIBRES STEREO","COLORES SURTIDOS","11","Activo");
INSERT INTO view1 VALUES("AUDIFONOS","LG/8500","18","Activo");
INSERT INTO view1 VALUES("AUDIFONOS","HAWEI 5588","4","Activo");
INSERT INTO view1 VALUES("AUDIFONOS","BB/8100","2","Activo");
INSERT INTO view1 VALUES("AUDIFONOS","ZTE/V8/V9/SONY E","8","Activo");
INSERT INTO view1 VALUES("CARCAZA","BB/8320","1","Activo");
INSERT INTO view1 VALUES("CARCAZA","VSER CON TAPA BB/8900","1","Activo");
INSERT INTO view1 VALUES("CARCAZA","BB/9105","1","Activo");
INSERT INTO view1 VALUES("CARCAZA","BB/9100","2","Activo");
INSERT INTO view1 VALUES("CARCAZA","FRONTAL 9790","2","Activo");
INSERT INTO view1 VALUES("CARCAZA","BB/9700","1","Activo");
INSERT INTO view1 VALUES("CARCAZA","NOK/X2","1","Activo");
INSERT INTO view1 VALUES("MICA O PANTALLA PROTECTORA","BB/9360","3","Activo");
INSERT INTO view1 VALUES("MICA O PANTALLA PROTECTORA","BB/9360 CON MARCO","4","Activo");
INSERT INTO view1 VALUES("CARCAZA","TAPA BB/9380","1","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","L9","3","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","TABLE SAMG/PG200","4","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","TABLE SAMG/P7510","4","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","TABLE IPAD2","4","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","TABLE KP570","3","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","ONES","5","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","IPHONE 4","9","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/9800","2","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SANSUNG 8530","3","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","IPHONE 5","3","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/Z10","6","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SAMG/SIII","9","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/9220","3","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/9100","2","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/9000","3","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SANG/ I9300","7","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/Q10","2","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SANG/5830","3","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SANG/ I5700","4","Activo");
INSERT INTO view1 VALUES("BATERIA","SANG/ I9100 OSCURO","1","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SANG/I9100 CLARO","4","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","LG/E975","5","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/9360","6","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/8520","1","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/8500","2","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","BB/8320","4","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","NOK 200/201","3","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SANG/5360","2","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SANG/ACE DUOS","6","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","NOK/N303","5","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","NOK/C3","6","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","NOK/E71","7","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","HAWEI (G510)","5","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","X PERIA","23","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SAMG/ NOTE2","5","Activo");
INSERT INTO view1 VALUES("ANTIESPIAS","SANG/I9300 CLARO","3","Activo");



DROP TABLE view2;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view2` AS select `pedido`.`fecha_pedido` AS `fecha_pedido`,`proveedor`.`razon_social` AS `razon_social`,`proveedor`.`rif` AS `rif`,`departamento`.`nombre_departamento` AS `nombre_departamento`,`producto`.`nombre_producto` AS `nombre_producto`,`detalle_pedido`.`cantidad` AS `cantidad` from ((((`pedido` join `proveedor`) join `departamento`) join `producto`) join `detalle_pedido`) where ((`departamento`.`codigo_departamento` = `producto`.`codigo_departamento`) and (`pedido`.`rif` = `proveedor`.`rif`) and (`producto`.`codigo_producto` = `detalle_pedido`.`codigo_producto`) and (`detalle_pedido`.`codigo_pedido` = `pedido`.`codigo_pedido`));

INSERT INTO view2 VALUES("","CANGURO C.A","J-30856520-2","BATERIA","SANSUNG S3","1");
INSERT INTO view2 VALUES("31/03/1988","CANGURO C.A","J-30856520-2","BATERIA","SANSUNG S3","1");



