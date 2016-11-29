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

INSERT INTO `ingredients` (`id_ingredient`, `nom`, `couleur`, `type`) VALUES
(1, 'poireau', 'vert', 'legume'),
(2, 'pomme de terre', 'jaune', 'legume'),
(3, 'carotte', 'rouge', 'legume'),
(4, 'sel', 'blanc', 'condiments'),
(5, 'poivre', 'noir', 'condiments'),
(6, 'sucre en poudre', 'blanc', '??'),
(7, 'sucre roux en poudre ', 'roux', '??'),
(8, 'pomme', 'jaune', 'fruit'),
(9, 'crème glacée Carte d''Or Chocolat Noir', '', ''),
(10, 'yaourt nature', '', ''),
(11, 'huile d''olive', '', ''),
(12, 'farine', '', ''),
(13, 'œuf', '', ''),
(14, 'levure chimique', '', ''),
(15, 'orange non traitée', '', ''),
(16, 'extrait de vanille', '', ''),
(17, 'filet mignon de porc', '', ''),
(18, 'pâte feuillettée (en rouleau)', '', ''),
(19, 'tranche de jambon', '', ''),
(20, 'gruyère rapé', '', ''),
(21, 'oignon', '', ''),
(22, 'Sucre vanillé', '', ''),
(23, 'chocolat noir', '', ''),
(24, 'citron', '', ''),
(25, 'pâte brisée', '', ''),
(26, 'crème fraiche épaisse', '', ''),
(27, 'concentré de tomate', '', ''),
(28, 'thon blanc', '', ''),
(29, 'herbes de Provence', '', ''),
(30, 'fromage râpé', '', ''),
(31, 'pomme de terre', '', ''),
(32, 'lardons fumées', '', ''),
(33, 'oignons émincés', '', ''),
(34, 'reblechon', '', ''),
(35, 'ail', '', ''),
(36, 'pavé de saumon', '', ''),
(37, 'mozzarella', '', ''),
(38, 'tomate', '', ''),
(39, 'basilic', '', ''),
(40, 'olive noire', '', ''),
(41, 'saumon fumé', '', ''),
(42, 'courgette', '', ''),
(43, 'aneth', '', ''),
(44, 'menthe', '', ''),
(45, 'eau', '', ''),
(46, 'beurre', '', ''),
(47, 'curry', '', ''),
(48, 'cumin', '', ''),
(49, 'sel de Guérande', '', ''),
(50, 'crème fraiche liquide', '', '');

INSERT INTO `categorie` (`id_cat`, `nom`, `description`) VALUES
(1, '(vide)', ''),
(2, 'plat principal', 'bla bla bla'),
(3, 'dessert', 'bla bla bla'),
(4, 'entrée', 'pour bien commencer vos repas'),
(6, 'apéro', 'sfdsfddf');


INSERT INTO `sous_categorie` (`id_ss_cat`, `nom`, `description`, `id_cat`) VALUES
(1, '(vide)', '', 1),
(2, 'viande', 'dfqsdf', 2),
(3, 'poisson', 'dfqsdf', 2),
(4, 'glace', 'dfqsdf', 3);


INSERT INTO `recettes` (`id_recette`, `id_membre`, `titre`, `nb_pers`, `cat_prix`, `cat_diff`, `note`, `nb_votes`, `description`, `preparation`, `cuisson`, `conseil`, `id_cat`, `id_ss_cat`) VALUES
(1, 1, 'soupe', 4, 'bon marche', 'facile', 0, 0, 'cuire les legumes, mouliner, servir', '10mn', '20mn', 'ajouter de la creme au moment de servir', 1, 1),
(2, 2, 'carottes rapee', 4, 'bon marche', 'facile', 0, 0, 'eplucher et raper les carottes, assaisonner avec une vinaigrette', '15mn', '0mn', 'ajouter du jus d''orange', 1, 1),
(4, 1, 'Cake au yaourt glacé au chocolat noir', 4, 'Bon marché', 'Difficile', 0, 0, 'Préchauffez le four à 180°C (thermostat 6).\r\nDans un saladier, versez le yaourt nature, cassez les oeufs et mélangez. Ajoutez le sucre et mélangez. Incorporez ensuite la farine et fouettez de nouveau.\r\nMettez la moitié du zeste de l''orange, l''extrait de vanille et mélangez. Terminez par la levure et l''huile et mélangez bien pour obtenir une pâte bien lisse.\r\nBeurrez un moule à cake et versez-y la pâte à gâteau. Enfournez pour 30 minutes de cuisson.\r\nLorsque le cake est cuit, laissez-le reposez quelques minutes puis démoulez-le. Laissez le cake refroidir complètement.\r\nChemisez l''intérieur d''un tube en plastique ou en aluminium de papier cuisson et placez-le au congélateur 10 minutes. Remplissez ensuite l''intérieur de crème glacée Carte d''Or au chocolat noir et remettez-le au congélateur jusqu''au moment de servir.\r\nQuand vous vous apprêtez à servir le dessert, coupez les extrémités du cake et évidez le centre. Insérez le tube de glace au chocolat noir préalablement démoulé. Servez.', '30 minutes', '30 minutes', '', 1, 1),
(5, 1, 'Filet mignon en croûte', 6, 'Bon marché', 'Très Facile', 0, 0, 'Emincer les oignons et les faire revenir dans une sauteuse avec du beurre. Les retirer, et faire revenir la viande de chaque côté, laisser cuire 10 mn à feu doux et ajouter les oignons pendant 5 mn. Saler, poivrer. Réserver.\r\nDérouler les pâtes feuilletées. Dépoer sur chaque pâte deux tranches de jambon et 100 g de gruyère. Saler et poivrer.\r\nY déposer un filet dans chaque pâte, ainsi que sa sauce aux oignons. Replier la pâte autour de la viande et fermer à l''aide du jaune d’œuf et d''un pinceau.\r\nCuire 45 mn sur 200°C.', '15 minutes', '45 minutes', 'Servir avec une salade.', 2, 1),
(6, 1, 'Mousse au chocolat facile', 4, 'Bon marché', 'Très Facile', 0, 0, 'Faire ramollir le chocolat dans une terrine.\r\nIncorporer les jaunes et le sucre.\r\nPuis, battre les blancs en neige ferme et les ajouter délicatement au mélange à l''aide d''une spatule.\r\nMettre au frais 1 heure ou 2 minimum.', '10 minutes', '', 'Vous pouvez utiliser n''importe quel chocolat, Plus il sera noir, plus la mousse sera consistante.', 1, 1),
(8, 1, 'Gâteau au yaourt', 4, 'Bon marché', 'Très Facile', 0, 0, 'Mélanger tout simplement les ingrédients un à un, dans l''ordre ci-dessus.\r\nVerser la pâte dans un moule à gâteau.\r\nPuis, faire cuire à 180°C (thermostat 6) pendant 30 min environ.\r\nVérifier la cuisson avec la pointe d''un couteau, qui doit ressortir sèche.', '15 minutes', '30 minutes', 'Vous pouvez remplacer le citron par un paquet de sucre vanillé. Comme yaourt je vous conseille des Veloutés ou autres yaourts liquides (bulgares, etc.).', 1, 1),
(9, 1, 'Tarte thon et tomate', 6, 'Bon marché', 'Très Facile', 0, 0, 'Etaler la pâte brisée et la piquer avec une fourchette.\r\nEmietter le thon sur la pâte.\r\nMélanger dans un gros bol : la crème, le concentré de tomate, l''oeuf et le sel; verser la préparation sur le thon.\r\nSaupoudrer d''herbes de Provence, recouvrir de fromage râpé, puis faire cuire comme une quiche, soit 25 min (selon puissance du four) à 210°C (th 7).', '10 minutes', '25 minutes', 'Hyper rapide, pour ceux qui aiment bien cuisiner sans y passer beaucoup de temps. Vous pouvez remplacer la pâte brisée par de la pâte feuilletée.', 1, 1),
(10, 1, 'La vraie Tartiflette', 4, 'Bon marché', 'Très Facile', 0, 0, 'Eplucher les pommes de terre, les couper en dés, bien les rincer, et les essuyer dans un torchon propre.\r\nFaire chauffer l''huile dans une poêle, pour y faire fondre les oignons; rajouter ensuite les pommes de terre.\r\nFaire dorer tous les côtés des dés de pommes de terre, rajouter les lardons, et finir de cuire.\r\nD''autre part, gratter la croûte du reblochon et le couper en deux (ou en quatre). Préparer un plat à gratin en frottant le fond et les bords avec de l''ail.\r\nPréchauffer le four à 200°C (thermostat 6-7).\r\nDans le plat à gratin, verser une couche de pommes de terre aux lardons, disposer dessus la moitié du reblochon, puis de nouveau des pommes de terre.\r\nTerminer avec le reste du reblochon (croûte vers les pommes de terre), et enfourner pendant environ 20 min.\r\nBien surveiller, pour éviter que le fromage ne rende trop de gras.', '15 minutes', '60 minutes', 'Vin de Savoie type Apremont ou Vin de Seyssel', 1, 1),
(11, 1, 'Papillote de saumon à la mozzarella', 2, 'Moyen', 'Facile', 0, 0, 'Mettre chaque pavé de saumon sur 1 feuille d''aluminium séparé.\r\nCouper les tomates et la mozzarella en fines tranches.\r\nSaler et poivrer légèrement le saumon.\r\nDisposer sur chaque saumon en alternance : 1 tranche de tomate, puis 1 tranche de mozzarella, puis 1 tranche de tomate, etc.\r\nEmincer les olives et les gousses d''ail, en saupoudrer les 2 pavés de saumon; ajouter un peu de sel, poivre, et saupoudrer d''herbes.\r\nVerser sur chaque pavé de saumon l''équivalent de 2 cuillères à café d''huile d''olive.\r\nRefermer chaque aluminium en papillote, et les disposer dans un plat à gratin.\r\nMettre à four chaud (210°C/th 7) pendant 35 min, le saumon est cuit lorque sa peau s''est bien éclaircie.\r\nServir avec du riz basmati parfumé et une salade verte (dans laquelle vous aurez rajouté un peu d''oignon).', '15 minutes', '35 minutes', 'C''est une recette très facile mais très goûteuse, je l''ai faite très souvent en été avec une bonne salade et tout le monde se régale', 1, 1),
(12, 1, 'Les Timbales de Jeanne (saumon à la mousse de cour', 4, 'Bon marché', 'Très Facile', 0, 0, 'Râper les courgettes.\r\nLes faire revenir dans de l''huile d''olive avec l''ail et les herbes. Poivrer, et saler (mais pas trop, attention au saumon fumé !). Réserver, et laisser un peu refroidir.\r\nBattre les oeufs et la crème en omelette.\r\nMélanger l''omelette avec les courgettes, éventuellement, donner un petit coup de mixeur pour le côté "mousse".\r\nTapisser 4 ramequins avec les tranches de saumon fumé.\r\nVerser le mélange omelette-courgettes dans les ramequins tapissés de saumon.\r\nFaire cuire au micro-ondes pendant 2 à 3 min, selon la puissance (vérifier la cuisson vous même, il n''y a que ça de vrai !)', '10 minutes', '3 minutes', 'Facile à faire... pour un résultat assez "pro". Bien sûr, les puristes peuvent cuire le tout au four, au bain-marie. Dernière remarque : vous pouvez y aller, c''est tout à fait diététique (à condition d''y aller molo sur l''huile d''olive, et de choisir ', 1, 1),
(13, 1, 'Velouté de carottes au cumin', 6, 'Bon marché', 'Très Facile', 0, 0, 'Emincez l''oignon. Faites fondre le beurre dans une cocotte minute, puis ajoutez l''oignon. Faites dorer.\r\nAjoutez les carottes et la pomme de terre préalablement coupés en morceaux. Faites cuire ainsi 5 minutes.\r\nAjoutez l''eau, ainsi que le curry et le cumin.\r\nFermez la cocotte et faire cuire 20 minutes après la montée en pression.\r\nIl ne reste plus qu''à mixer le tout en y ajoutant la crème liquide... et bien sûr qu''à se régaler!', '10 minutes', '25 minutes', 'Une entrée simple et bon marché, qui sera très appréciée de vos convives.', 1, 1);

INSERT INTO `commentaires` (`id_commentaire`, `id_recette`, `id_membre`, `message`) VALUES
(1, 1, 1, 'commentaire du user 1 sur la recette 1 '),
(2, 1, 2, 'commentaire du user 2 sur la recette 1 '),
(3, 1, 3, 'commentaire du user 3 sur la recette 1 ');


INSERT INTO `constituants` (`id_constituant`, `id_recette`, `id_ingredient`, `quantite`) VALUES
(1, 1, 1, '2'),
(2, 1, 2, '2'),
(3, 1, 3, '1'),
(4, 1, 4, 'une pincee'),
(5, 2, 3, '4'),
(6, 4, 9, '500 ml'),
(7, 4, 10, '1'),
(8, 4, 11, '1/2 pot'),
(9, 4, 6, '2 pots'),
(10, 4, 12, '2 pots'),
(11, 4, 13, '3'),
(12, 4, 14, '1 sachet'),
(13, 4, 15, '1'),
(14, 4, 16, '1 c-à-c'),
(15, 5, 17, '2'),
(16, 5, 18, '2'),
(17, 5, 19, '4'),
(18, 5, 20, '200g'),
(19, 5, 21, '2 gros'),
(20, 5, 13, '2 jaunes'),
(21, 6, 13, '3'),
(22, 6, 22, '100g'),
(23, 6, 23, '1 sachet'),
(24, 8, 24, '1 zeste'),
(25, 8, 14, '1/2 paquet'),
(26, 8, 10, '1'),
(27, 8, 11, '1/2 pot'),
(28, 8, 6, '2 pots'),
(29, 8, 12, '3 pots'),
(30, 8, 13, '2'),
(31, 9, 25, '1'),
(32, 9, 26, '1 briquette'),
(33, 9, 27, '1 petite boite'),
(34, 9, 28, '1 boite (150g)'),
(35, 9, 4, '1 pincée'),
(36, 9, 29, '1 pincée'),
(37, 9, 30, '50g'),
(38, 9, 13, '1'),
(39, 10, 31, '1kg'),
(40, 10, 32, '200g'),
(41, 10, 33, '200g'),
(42, 10, 34, '1'),
(43, 10, 11, '2 c-à-s'),
(44, 10, 35, 'un peu'),
(45, 10, 4, 'un peu'),
(46, 10, 5, 'un peu'),
(47, 11, 36, '2'),
(48, 11, 37, '1 boule'),
(49, 11, 38, '2'),
(50, 11, 29, 'un peu'),
(51, 11, 4, 'un peu'),
(52, 11, 5, 'un peu'),
(53, 11, 11, '2 c-à-s'),
(54, 11, 40, '2'),
(55, 11, 35, '2 gousses'),
(56, 12, 41, '4 tranches'),
(57, 12, 42, '2'),
(58, 12, 13, '3'),
(59, 12, 26, '10cl'),
(60, 12, 43, 'un peu'),
(61, 12, 44, 'un peu'),
(62, 12, 35, '1 gousse'),
(63, 12, 4, 'un peu'),
(64, 12, 5, 'un peu'),
(65, 12, 11, '2 c-à-s'),
(66, 13, 3, '1kg'),
(67, 13, 2, '1'),
(68, 13, 21, '1'),
(69, 13, 45, '3/4 l'),
(70, 13, 46, '20g'),
(71, 13, 47, '1/2 c-à-c'),
(72, 13, 48, '1/2 c-à-c'),
(73, 13, 49, '1 pincée'),
(74, 13, 50, '20cl');


INSERT INTO `photos` (`id_photo`, `id_recette`, `lien`) VALUES
(1, 1, 'lien vers photo 1 de recette 1 '),
(2, 2, 'lien vers photo 2 de recette 1 '),
(3, 2, 'lien vers photo 3 de recette 1 ');

