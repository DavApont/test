
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `codigo_pedido` int(11) NOT NULL,
  `fecha_pedido` varchar(200) NOT NULL,
  `rif` varchar(20) NOT NULL,
  `status_pedido` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;