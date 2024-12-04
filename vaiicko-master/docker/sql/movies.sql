DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `meno` varchar(60) NOT NULL,
                          `rokVydania` int(11) NOT NULL,
                          `miestoVydania` varchar(10) NOT NULL,
                          `hodnotenie` varchar(5) NOT NULL,
                          PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `movies` (`id`, `meno`, `rokVydania`, `miestoVydania`, `hodnotenie`) VALUES
                                                                                     (1,	'Transformers 1 ',	2007,	'USA',	'78%'),
                                                                                     (2,	'Logan: Wolverine',	2017,	'USA',	'84%'),
                                                                                     (3,	'Pán prsteňov: Spoločenstvo prsteňa',	2001,	'USA',	'91%');
