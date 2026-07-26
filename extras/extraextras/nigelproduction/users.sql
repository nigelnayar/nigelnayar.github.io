CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `sign_up_date` date NOT NULL,

  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `dateposted` date NOT NULL,
  `likes` varchar(255) NOT NULL,
  `dislikes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)


)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
`id` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`id`)
