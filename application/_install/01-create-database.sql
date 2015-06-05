CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `description` varchar(140) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `issuetime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `code` varchar(15) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `pushes` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `tickets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `isactive` tinyint(1) DEFAULT NULL,
  `eventid` int(11) unsigned DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL,
  `sessionid` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`eventid`) REFERENCES `events` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;