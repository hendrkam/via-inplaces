CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `nazev` varchar(256) NOT NULL,
  `popis` varchar(10000) NOT NULL,
  `imgsource` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `nazev`, `popis`, `imgsource`) VALUES
(0, 'Restaurants', 'Restaurants, pubs and bars', 'img/restaurant.png'),
(1, 'Castles & statues', 'Castles & statues', 'img/castle.png'),
(2, 'Nature & parks', 'Nature & parks', 'img/nature.png'),
(3, 'Museums & art', 'Museums & art', 'img/museum.png'),
(4, 'Education', 'Education, University, School', 'img/education.png'),
(5, 'Shopping', 'Shopping', 'img/shopping.png'),
(6, 'Sports', 'Sports', 'img/sport.png'),
(7, 'Others', 'Others', 'img/other.png');

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);