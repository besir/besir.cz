CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(150) COLLATE 'utf8_czech_ci' NOT NULL,
  `surname` varchar(150) COLLATE 'utf8_czech_ci' NOT NULL,
  `username` varchar(150) COLLATE 'utf8_czech_ci' NOT NULL,
  `email` varchar(250) COLLATE 'utf8_czech_ci' NOT NULL,
  `role` varchar(250) COLLATE 'utf8_czech_ci' NOT NULL
) COMMENT='' ENGINE='InnoDB' COLLATE 'utf8_unicode_ci';