-- --------------------------------------------------------
-- Hôte :                        10.194.128.254
-- Version du serveur:           5.5.46-0ubuntu0.12.04.2 - (Ubuntu)
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

USE popote;

INSERT IGNORE INTO `membres` (`id_membre`, `login`, `password`, `nom`, `prenom`, `email`, `type`) VALUES
	(1, 'bfr', 'mdpbfr', 'Froger', 'Bruno', 'bruno.froger@orange.com', 'admin'),
	(2, 'hlq', 'mdpbfr', 'Le Queau', 'Helene', 'helene.lequeau@orange.com', 'admin'),
	(3, 'bte', 'mdpbte', 'Terrien', 'Bruno', 'bruno.terrien@orange.com', 'user'),
	(4, 'jpj', 'mdpjpj', 'Julien', 'Jean-Pierre', 'jeanpierre.julien@orange.com', 'user'),
	(5, 'pwa', 'mdppwa', 'Wacrenier', 'Patrice', 'patrice.wacrenier@orange.com', 'user');

INSERT IGNORE INTO `ingredients` (`id_ingredient`, `nom`, `couleur`, `type`) VALUES
	(1, 'poireau', 'vert', 'legume'),
	(2, 'pomme de terre', 'jaune', 'legume'),
	(3, 'carotte', 'rouge', 'legume'),
	(4, 'sel', 'blanc', 'condiments'),
	(5, 'poivre', 'noir', 'condiments'),
	(6, 'sucre', 'blanc', '??'),
	(7, 'sucre', 'roux', '??'),
	(8, 'pomme', 'jaune', 'fruit');

INSERT IGNORE INTO `categorie` (`id_cat`, `nom`, `description`) VALUES
	(1, 'entree', 'pour bien ciommencer vos repas'),
	(2, 'plat principal', 'bla bla bla'),
	(3, 'dessert', 'bla bla bla');

INSERT IGNORE INTO `sous_categorie` (`id_ss_cat`, `nom`, `description`, `id_cat`) VALUES
	(1, 'entree chaude', 'dfqsdf', 1),
	(2, 'viande', 'dfqsdf', 2),
	(3, 'poisson', 'dfqsdf', 2),
	(4, 'glace', 'dfqsdf', 3);

INSERT IGNORE INTO `recettes` (`id_recette`, `id_membre`, `titre`, `nb_pers`, `cat_prix`, `cat_diff`, `description`, `preparation`, `cuisson`, `conseil`, `id_cat`, `id_ss_cat`, `note`, `nb_votes`) VALUES
	(1, 1, 'soupe', 4, 'bon marche', 'facile', 'cuire les legumes, mouliner, servir', '10mn', '20mn', 'ajouter de la creme au moment de servir', 1, 1, NULL, 0),
	(2, 2, 'carottes rapee', 4, 'bon marche', 'facile', 'eplucher et raper les carottes, assaisonner avec une vinaigrette', '15mn', '0mn', 'ajouter du jus d\'orange', 1, 1, NULL, 0);

INSERT IGNORE INTO `commentaires` (`id_commentaire`, `id_recette`, `id_membre`, `message`) VALUES
	(1, 1, 1, 'commentaire du user 1 sur la recette 1 '),
	(2, 1, 2, 'commentaire du user 2 sur la recette 1 '),
	(3, 1, 3, 'commentaire du user 3 sur la recette 1 ');

INSERT IGNORE INTO `constituants` (`id_constituant`, `id_recette`, `id_ingredient`, `quantite`) VALUES
	(1, 1, 1, '2'),
	(2, 1, 2, '2'),
	(3, 1, 3, '1'),
	(4, 1, 4, 'une pincee'),
	(5, 2, 3, '4');

INSERT IGNORE INTO `photos` (`id_photo`, `id_recette`, `lien`) VALUES
	(1, 1, 'lien vers photo 1 de recette 1 '),
	(2, 2, 'lien vers photo 2 de recette 1 '),
	(3, 2, 'lien vers photo 3 de recette 1 ');


