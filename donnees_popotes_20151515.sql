-- --------------------------------------------------------
-- Hôte :                        10.194.128.254
-- Version du serveur:           5.5.46-0ubuntu0.12.04.2 - (Ubuntu)
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Export de données de la table popote.photos : ~10 rows (environ)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT IGNORE INTO `photos` (`id_photo`, `id_recette`, `lien`) VALUES
	(1, 1, 'soupe.jpg'),
	(2, 2, 'carottes_rapees.jpg'),
	(3, 4, 'cake_yaourt_chocolot.jpg'),
	(4, 5, 'filet_mignon_croute.jpg'),
	(6, 8, 'gateau_yaourt.jpg'),
	(7, 11, 'papillotte_saumon_mozarella'),
	(9, 13, 'veloute_carotte_cumin.jpg'),
	(10, 10, 'tartiflette.jpg'),
	(11, 12, 'saumon_mousse_courgette.jpg'),
	(12, 9, 'tarte_thon_tomate.jpg'),
	(13, 6, 'mousse_au_chocolat.jpg');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
