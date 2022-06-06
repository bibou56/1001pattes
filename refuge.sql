-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour refuge
CREATE DATABASE IF NOT EXISTS `refuge` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `refuge`;

-- Listage de la structure de la table refuge. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table refuge.user : ~9 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nickname`, `mail`, `password`, `role`) VALUES
	(3, 'rantanplan', 'lulu@hotmail.fr', '$2y$10$m/UOR/Cwpl50ppFq2EzHB.pSY421o60krYpLb4cm8kCzDCI4GwDEG', 0),
	(5, 'toto', 'toto@tata.fr', '$2y$10$V1GjAclmvTTak7przsedN.dpTdCd7QV0E4i88.VwgRCGVBMj/b4Om', 0),
	(6, 'test', 'test@test.fr', '$2y$10$oXMw.MjEBv3TCMVVVewNSubpm/vxf17Qzt9P5tzMaJyacuTfzS/UG', 0),
	(7, 'Valérie Buyet', 'val@buyet.fr', '$2y$10$7xvXRcGcqFJI.O1R0v2inu5IauDSjRuHelh2mgN2CZe/jGz.2bn16', 1),
	(8, 'Valérie Buyet', 'val@buyet.fr', '$2y$10$bue5mhpMKZ08qmCMIuRHWudVUvNjrsDnm7UBx3uMySFIxyfpy0lPm', 0),
	(9, 'HeleneGreat', 'helene@carriou.fr', '$2y$10$NfNPY4Peu3lWZf5vavLTL.LwSGJzO9hVzIU6owfImvY6gd/CbzXly', 0),
	(10, 'PapaDauphin', 'alan@dauphin.fr', '$2y$10$wBaLeepNCVQonRndokYiEOKV7DWapO012gtai.o/UVnrdA43aw6jC', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Listage de la structure de la table refuge. type
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `race` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table refuge.type : ~2 rows (environ)
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` (`id`, `race`) VALUES
	(1, 'Chat'),
	(2, 'Chien');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;

-- Listage de la structure de la table refuge. animal
CREATE TABLE IF NOT EXISTS `animal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `info` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_animal_type` (`type_id`),
  CONSTRAINT `FK_animal_type` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8;

-- Listage des données de la table refuge.animal : ~8 rows (environ)
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` (`id`, `type_id`, `name`, `breed`, `info`, `age`, `content`, `image`, `alt`, `createdAt`) VALUES
	(190, 1, 'Noodle', 'Européen', 'mâle, stérilisé', '9 ans', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas earum dignissimos doloremque perferendis nesciunt quod alias aut tempore fugit, perspiciatis odio quis adipisci optio consequatur a, deleniti atque laudantium aspernatur pariatur similique aperiam laboriosam sunt? Reiciendis reprehenderit, ipsam commodi ullam voluptatum perferendis aliquid assumenda deleniti nostrum dolorum distinctio, voluptates ipsum dolor atque quod laudantium saepe culpa possimus, delectus mollitia laborum? Eligendi, rerum est. Numquam explicabo quos aperiam! Blanditiis vero est odit illo assumenda? Delectus laborum nulla quisquam eos porro cum quod ipsa ad voluptatum molestiae, rem explicabo recusandae quibusdam sit harum perferendis, debitis laudantium corrupti accusamus maiores temporibus repellat. Inventore!', 'cat2.jpg', 'chat', '2022-04-22 10:56:39'),
	(191, 1, 'Pirouette', 'Européen', 'femelle, 4kg, stérilisée', '2 ans', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium aut officiis alias veniam. Maxime eum beatae, voluptas, atque mollitia quisquam natus tempora odio quam numquam vel dolorum fugit accusantium. Adipisci blanditiis architecto veritatis eveniet fugit doloremque! Tenetur, exercitationem rem soluta cumque eos qui corporis delectus quae architecto ipsum, enim perferendis cupiditate, aperiam molestiae modi? Ratione ipsum nobis ipsam soluta mollitia iusto dolorem repellat consectetur quasi delectus minima, voluptates ea cum praesentium excepturi rerum dignissimos aliquid deleniti a quis nisi ut deserunt maxime? Possimus libero excepturi hic alias temporibus ea, adipisci ex aliquid sequi pariatur architecto accusamus tempora quaerat suscipit minima totam autem tempore eum veniam incidunt obcaecati? Veniam nisi, iusto numquam, blanditiis asperiores aspernatur, repellat nobis ducimus eveniet ipsam impedit?', 'cat1.jpg', 'chat', '2022-04-22 10:58:06'),
	(192, 1, 'Olaff', 'Siamois', 'Mâle, stérilisé', '10 ans', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam alias nisi minus laboriosam, aut ducimus architecto aliquam, ipsam officiis deleniti voluptates culpa facilis assumenda delectus voluptas soluta, unde eos iusto repudiandae? Libero nobis ipsam optio autem atque minima corrupti vitae sit mollitia molestiae id eius aspernatur ea dolores, veritatis repellendus eaque fugiat magnam harum tenetur quisquam quasi porro quis! Hic assumenda corporis ab voluptatem accusamus, reiciendis perferendis minus ipsa explicabo neque adipisci iusto doloremque aspernatur aliquid nulla laudantium dicta aut dolorem veniam! Fugit dolor necessitatibus minus explicabo sed, tempora recusandae?', 'cat3.jpg', 'chat', '2022-04-22 10:59:05'),
	(193, 2, 'Raoul', 'Terrier', 'Mâle, stérilisé', '5 ans', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam alias nisi minus laboriosam, aut ducimus architecto aliquam, ipsam officiis deleniti voluptates culpa facilis assumenda delectus voluptas soluta, unde eos iusto repudiandae? Libero nobis ipsam optio autem atque minima corrupti vitae sit mollitia molestiae id eius aspernatur ea dolores, veritatis repellendus eaque fugiat magnam harum tenetur quisquam quasi porro quis! Hic assumenda corporis ab voluptatem accusamus, reiciendis perferendis minus ipsa explicabo neque adipisci iusto doloremque aspernatur aliquid nulla laudantium dicta aut dolorem veniam! Fugit dolor necessitatibus minus explicabo sed, tempora recusandae?', 'dog1.jpg', 'chien', '2022-04-22 10:59:48'),
	(194, 2, 'Eosine', 'labrador', 'femelle, 25kg, stérilisée', '2 ans', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam corrupti ab voluptates commodi, voluptas ad sit nobis repellat odio molestias aperiam, corporis magni fuga repellendus beatae sunt perspiciatis quaerat obcaecati dolore officia ratione doloremque vitae impedit voluptatem. Tempore delectus blanditiis cupiditate numquam officiis cumque dolor voluptatem velit tenetur asperiores, commodi molestiae ex placeat. In temporibus consequuntur sapiente ullam autem? Facere facilis deleniti dolorem? Magnam aspernatur architecto pariatur. Quibusdam neque excepturi at dicta, accusantium reiciendis molestias, repudiandae atque provident, dolorem soluta in obcaecati! Dolor nihil, consectetur consequatur quisquam ad provident, unde nulla accusantium sed voluptatem in dolores? Omnis tenetur tempore vel temporibus consectetur porro delectus, recusandae ad, illo debitis provident neque illum, quisquam voluptate? Deleniti quas odio, minima esse fugit adipisci?', 'dog2.jpg', 'chien', '2022-04-22 11:01:04'),
	(195, 2, 'Paupiette', 'golden retriever', 'Femelle, stérilisée', '1 an', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam corrupti ab voluptates commodi, voluptas ad sit nobis repellat odio molestias aperiam, corporis magni fuga repellendus beatae sunt perspiciatis quaerat obcaecati dolore officia ratione doloremque vitae impedit voluptatem. Tempore delectus blanditiis cupiditate numquam officiis cumque dolor voluptatem velit tenetur asperiores, commodi molestiae ex placeat. In temporibus consequuntur sapiente ullam autem? Facere facilis deleniti dolorem? Magnam aspernatur architecto pariatur. Quibusdam neque excepturi at dicta, accusantium reiciendis molestias, repudiandae atque provident, dolorem soluta in obcaecati! Dolor nihil, consectetur consequatur quisquam ad provident, unde nulla accusantium sed voluptatem in dolores? Omnis tenetur tempore vel temporibus consectetur porro delectus, recusandae ad, illo debitis provident neque illum, quisquam voluptate? Deleniti quas odio, minima esse fugit adipisci?', 'dog3.jpg', 'chien', '2022-04-22 11:02:55'),
	(196, 1, 'Kourou', 'Européen', 'Femelle, stérilisée', '12 ans', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam corrupti ab voluptates commodi, voluptas ad sit nobis repellat odio molestias aperiam, corporis magni fuga repellendus beatae sunt perspiciatis quaerat obcaecati dolore officia ratione doloremque vitae impedit voluptatem. Tempore delectus blanditiis cupiditate numquam officiis cumque dolor voluptatem velit tenetur asperiores, commodi molestiae ex placeat. In temporibus consequuntur sapiente ullam autem? Facere facilis deleniti dolorem? Magnam aspernatur architecto pariatur. Quibusdam neque excepturi at dicta, accusantium reiciendis molestias, repudiandae atque provident, dolorem soluta in obcaecati! Dolor nihil, consectetur consequatur quisquam ad provident, unde nulla accusantium sed voluptatem in dolores? Omnis tenetur tempore vel temporibus consectetur porro delectus, recusandae ad, illo debitis provident neque illum, quisquam voluptate? Deleniti quas odio, minima esse fugit adipisci?', 'bogdan-farca-CEx86maLUSc-unsplash.jpg', 'chat', '2022-04-22 11:22:29'),
	(203, 2, 'Noisette', 'croisement labrador / terrier', 'femelle', '8 ans', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum officia pariatur dolores repellendus animi odio autem eum! Eos necessitatibus, reprehenderit fugiat laboriosam, tempore a accusamus pariatur minus maiores, culpa quo exercitationem? Ipsa architecto quasi, non, eveniet laborum nulla enim sint dolores tempora quos atque nam in magnam rem consectetur. Inventore rem obcaecati, fugit distinctio ut ullam perferendis delectus voluptatum, eligendi id minima repellendus quibusdam ab maxime ea. Reiciendis nobis repudiandae, sint nisi dolores, sunt fugit officia in, error tempora esse blanditiis. Asperiores deserunt consectetur obcaecati soluta voluptate, veniam eum quibusdam blanditiis voluptas repellendus necessitatibus repudiandae delectus vel repellat amet quisquam.', 'marliese-streefland-2l0CWTpcChI-unsplash.jpg', 'chien marron et blanc', '2022-04-26 12:02:15'),
	(204, 1, 'Sushi', 'Européen', 'Mâle, stérilisé', '1 an', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum officia pariatur dolores repellendus animi odio autem eum! Eos necessitatibus, reprehenderit fugiat laboriosam, tempore a accusamus pariatur minus maiores, culpa quo exercitationem? Ipsa architecto quasi, non, eveniet laborum nulla enim sint dolores tempora quos atque nam in magnam rem consectetur. Inventore rem obcaecati, fugit distinctio ut ullam perferendis delectus voluptatum, eligendi id minima repellendus quibusdam ab maxime ea. Reiciendis nobis repudiandae, sint nisi dolores, sunt fugit officia in, error tempora esse blanditiis. Asperiores deserunt consectetur obcaecati soluta voluptate, veniam eum quibusdam blanditiis voluptas repellendus necessitatibus repudiandae delectus vel repellat amet quisquam.', 'michael-sum-LEpfefQf4rU-unsplash.jpg', 'chat roux', '2022-05-23 09:26:09');
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;

-- Listage de la structure de la table refuge. article
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table refuge.article : ~3 rows (environ)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id`, `title`, `content`, `image`, `alt`, `createdAt`) VALUES
	(8, 'Journée Portes Ouvertes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, cumque fugit. Obcaecati quod voluptates id qui quis illo, facere, ipsa esse similique quo cum accusamus at animi. Ipsa consequuntur ullam soluta tempora doloribus ipsam iusto quidem explicabo? Debitis nostrum voluptatem, velit laudantium, sint inventore aut veritatis quaerat reprehenderit atque ducimus provident illo facilis incidunt quo doloremque quidem. Sapiente dolores possimus repellat esse atque minima a assumenda, aut est itaque! Nisi, suscipit delectus veniam maxime molestiae quasi velit, expedita ullam minus quisquam voluptates impedit fugit provident officiis vitae. Nisi dicta, facere suscipit cumque fugit qui esse dolorem repellendus iure repudiandae eveniet, facilis sed cupiditate numquam? Placeat officiis labore perspiciatis ad sapiente eum aliquam. Dicta officiis ullam est temporibus enim maxime aliquam, accusantium iusto facere eligendi doloremque quod nihil dolor non fugiat dolores ipsa quis minima quo ratione obcaecati blanditiis. Adipisci vero possimus quae nesciunt, deleniti consequuntur ea dolores ipsam dolore similique unde, aperiam accusantium quisquam delectus quidem nemo, quibusdam odio incidunt laboriosam et. Maxime ipsam voluptate laborum in voluptatibus repudiandae vel molestiae consequatur delectus? Nemo itaque fugit tenetur cumque enim dolor illo optio nostrum aspernatur nam ea eum iusto quidem eos corrupti eaque quaerat nobis voluptate harum atque, vel laboriosam? Cum?', 'adam-griffith-sWkkIiTJMYc-unsplash.jpg', 'photo chien et personne', '2022-04-13 09:14:06'),
	(9, 'Sortie à la plage pour les chiens', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores sed ipsum nihil cum ratione accusamus recusandae perspiciatis sint aliquid eius assumenda quibusdam non, quisquam dolorum velit quos veniam eveniet totam placeat quas. Officia modi, perferendis quos vitae autem molestiae, cupiditate expedita omnis dicta, adipisci voluptates. Exercitationem quis dolorum, voluptates dicta praesentium optio ducimus velit debitis officiis fugit. Natus, ex quod, a eaque nam impedit eligendi ducimus reiciendis maiores veniam ratione vitae modi inventore voluptatum qui, aut quae. Tenetur veritatis perferendis, veniam itaque accusamus ipsa architecto dolorem possimus illum laudantium! Iste, accusantium recusandae voluptas non iusto veniam id maxime est nihil, unde amet autem. Incidunt reprehenderit eum beatae blanditiis ullam optio magni repellendus perspiciatis commodi sit sint, amet saepe, ipsam ab totam provident, quidem distinctio cumque exercitationem. Libero eaque voluptatum reiciendis eos nulla iure mollitia saepe ab laboriosam aliquid vero accusamus veritatis, quaerat consequuntur eveniet ullam corporis quidem eum illo inventore.', 'lyan-voyages-Suc9y6IRxYw-unsplash.jpg', 'chien courant au bord de l&#039;eau', '2022-06-04 14:09:26'),
	(10, 'Don de jouets, les chats sont au paradis !', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid dicta consectetur quod architecto eum quam asperiores inventore eaque voluptate, voluptas pariatur repellendus ipsum delectus cumque minima vel, amet sit alias eligendi doloremque similique expedita? Voluptate quisquam vero vitae maxime dicta distinctio commodi fugiat? Corrupti exercitationem quo illum, atque fuga facere minus, delectus magnam accusamus quae, et inventore vel sequi sapiente odit obcaecati natus commodi quisquam. Tempore quam sequi dolor ipsum recusandae veritatis, quibusdam soluta esse quas dolores! Sit blanditiis odit unde, deleniti illo dicta tempora neque natus nulla eum, in ipsa? Officia vel harum praesentium molestiae, aliquam, libero illum quidem animi incidunt veritatis mollitia quisquam vitae cum architecto enim excepturi! Quam corporis culpa alias vero aliquam! Ex consequatur expedita atque.', 'manja-vitolic-PKb5MU9ROe8-unsplash.jpg', 'chat noir et blanc avec un jouet', '2022-06-04 14:11:48');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Listage de la structure de la table refuge. comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_article` (`article_id`),
  KEY `FK_comment_user` (`user_id`),
  CONSTRAINT `FK_comment_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Listage des données de la table refuge.comment : ~6 rows (environ)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`id`, `content`, `createdAt`, `article_id`, `user_id`) VALUES
	(8, 'c&#039;était une très belle journée. Bravo aux organisateurs!', '2022-04-15 14:46:55', 8, 9),
	(11, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo eius iure beatae! Aliquid quaerat eius saepe a iste voluptates corporis nemo id, dolores expedita dignissimos, quis voluptate dolorum aspernatur et!', '2022-05-16 09:28:04', 8, 6),
	(12, 'La journée s&#039;est très bien déroulée et était très bien organisée. Et quel succès ! Beaucoup d&#039;animaux ont trouvé leur nouvelle famille grâce à cet évènement et c&#039;est bien là l&#039;essentiel. Bravo ! ', '2022-06-04 14:15:07', 8, 10),
	(13, 'C&#039;est la première fois que j&#039;accompagnais une sortie organisée par le refuge en tant que bénévole. Quel plaisir de voir les chiens pouvoir courir partout, se défouler, aller nager pour les plus téméraires ! Une belle initiative à recommencer.', '2022-06-04 14:17:02', 9, 10),
	(14, 'Je suis passé au refuge il y a 2 jours et ai pu constater le plaisir qu&#039;ont tous les chats à découvrir leurs nouveaux jouets ! Un grand merci aux personnes impliquées dans ce don.', '2022-06-04 14:19:13', 10, 10),
	(15, 'Quelle bonne idée ! C&#039;est bien, ce que vous faites. Donner la possibilité de vivre de belles expériences comme celle-ci aux animaux qui attendent d&#039;être adoptés... C&#039;est fantastique !', '2022-06-04 14:21:10', 9, 9),
	(16, 'Vous avez bien raison, PapaDauphin, nous avons toujours des besoins et même si nous faisons au mieux pour y répondre, ce genre d&#039;attention est toujours plus que bienvenue.', '2022-06-04 14:23:10', 10, 7);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Listage de la structure de la table refuge. contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `objet` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Listage des données de la table refuge.contact : ~3 rows (environ)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `lastname`, `firstname`, `mail`, `phone`, `objet`, `content`, `createdAt`) VALUES
	(4, 'DAUPHIN', 'Alan', 'alan@dauphin.fr', '06 06 06 06 06', 'adoption', 'Je veux un chaton', '2022-04-15 16:13:39'),
	(6, 'CRENN', 'Josselin', 'jojo@crenn.com', '06 07 08 09 01', 'vieux chien', 'Comment bien s&#039;occuper d&#039;un vieux chien?', '2022-04-15 16:15:55'),
	(7, 'carriou', 'hélène', 'helene@carriou.fr', '05 02 04 03 09', 'adoption', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, cupiditate obcaecati quod tempore doloremque, impedit assumenda distinctio iure, saepe reiciendis doloribus? Odit nostrum, dolorem quibusdam nesciunt fuga id quos dignissimos nam voluptates expedita laudantium, aperiam fugit veniam debitis magnam voluptas facere deleniti. Minus explicabo quam suscipit sapiente ex accusantium sint architecto tempora magnam rerum, assumenda corrupti incidunt optio vel nemo omnis officia obcaecati nobis? A rerum veniam vero, praesentium sint dicta. Quibusdam soluta omnis veniam natus commodi dolorum quo a?', '2022-04-19 14:07:02');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Listage de la structure de la table refuge. event
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Listage des données de la table refuge.event : ~10 rows (environ)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`, `image`, `alt`, `title`, `date`, `content`, `createdAt`) VALUES
	(21, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:42:12'),
	(22, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:46:11'),
	(23, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:52:00'),
	(24, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:53:18'),
	(25, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:54:15'),
	(26, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:55:37'),
	(27, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:55:50'),
	(28, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:55:58'),
	(29, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:56:45'),
	(30, 'jametlene-reskp-W36m2sQkjzM-unsplash.jpg', 'xo', 'Cours d&#039;éducation canine', 'Tous les samedis matins de juin 2022', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum omnis expedita quasi quam explicabo repellendus repudiandae a id fugiat dolores nostrum porro, aliquid repellat nisi esse ducimus reiciendis saepe maiores. Iste, velit. Cumque tempore reprehenderit eos est voluptatum fugit praesentium vitae doloremque! Consectetur aperiam, officia doloremque laboriosam nemo recusandae ipsum obcaecati ratione repudiandae veritatis aliquam repellat unde iste ex non sapiente esse corporis fuga repellendus. Pariatur iusto laboriosam, nisi eveniet placeat unde ea nobis, sed obcaecati aliquid possimus velit voluptatibus.', '2022-04-22 15:57:35');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Listage de la structure de la table refuge. team
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table refuge.team : ~3 rows (environ)
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` (`id`, `surname`, `image`, `alt`, `content`) VALUES
	(1, 'Carole', 'michael-tomaszewski-e1zCiCr6SHQ-unsplash.jpg', 'femme avec un chien', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, ea. Aliquam illum atque laudantium et optio harum porro eligendi nemo laboriosam molestiae molestias voluptatem qui, velit suscipit ducimus repellendus fugit.'),
	(3, 'Thomas', 'samuel-girven-buJ6OB_q8hI-unsplash.jpg', 'photo d&#039;un homme avec son chien', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, ea. Aliquam illum atque laudantium et optio harum porro eligendi nemo laboriosam molestiae molestias voluptatem qui, velit suscipit ducimus repellendus fugit.'),
	(4, 'Valérie', 'tamara-bellis-baKsNGGKZ3w-unsplash.jpg', 'photo d&#039;une femme avec son chien', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, ea. Aliquam illum atque laudantium et optio harum porro eligendi nemo laboriosam molestiae molestias voluptatem qui, velit suscipit ducimus repellendus fugit.');
/*!40000 ALTER TABLE `team` ENABLE KEYS */;


/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
