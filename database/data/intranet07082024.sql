/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : intranet

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2024-08-07 07:01:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for addresses
-- ----------------------------
DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '1',
  `township_id` bigint(20) unsigned DEFAULT NULL,
  `city_id` bigint(20) unsigned DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `addressable_id` bigint(20) unsigned NOT NULL,
  `addressable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_addressable_id_index` (`addressable_id`),
  KEY `addresses_addressable_type_index` (`addressable_type`),
  KEY `addresses_township_id_foreign` (`township_id`),
  KEY `addresses_city_id_foreign` (`city_id`),
  KEY `addresses_country_id_foreign` (`country_id`),
  CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `addresses_township_id_foreign` FOREIGN KEY (`township_id`) REFERENCES `townships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of addresses
-- ----------------------------
INSERT INTO `addresses` VALUES ('1', 'Calle Falsa 123', '10400', '1', '23', '23', '53', '1', 'App\\Models\\Company', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `addresses` VALUES ('2', '53093 Myrtis Ports Suite 460\nWest Ruthie, OK 33524', 'Ex dolores distinctio et voluptas dolorem. Cumque et officia modi numquam ipsum. Exercitationem maxime quo animi voluptatem reiciendis deleniti. Unde dolores libero praesentium et.', '1', '169', '42', '250', '2', 'App\\Models\\Employee', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `addresses` VALUES ('3', '560 Friesen Flats Apt. 534\nSouth Elinore, DE 22639', 'Expedita impedit labore aut incidunt. Commodi esse velit perferendis. Et ut error nemo quaerat officiis ea quis voluptates. Enim quo similique possimus ducimus voluptates accusamus. Placeat eum explicabo minima similique. Nemo iusto aperiam et non.', '0', '170', '44', '253', '3', 'App\\Models\\Company', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `addresses` VALUES ('4', '8218 Jayda Circles\nArnaldofurt, MN 99869', 'Consequatur aut et aut quasi placeat mollitia. Dolorem ipsam ducimus et culpa eos fugit. Necessitatibus sequi et sit asperiores id qui. Inventore recusandae error aperiam perspiciatis quae quia.', '1', '171', '46', '256', '4', 'App\\Models\\Company', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `addresses` VALUES ('5', '64489 Greenholt Meadow\nSouth Joaquinmouth, MA 44376', 'Veniam delectus quo vel est debitis amet sequi laudantium. Ducimus dolore sit odio. Quia laborum placeat impedit iure. Qui dicta pariatur voluptatum velit voluptatum maiores quos.', '0', '172', '48', '259', '5', 'App\\Models\\Company', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `addresses` VALUES ('6', '9425 Larson Rest Apt. 506\nNew Luigiborough, KY 79904', 'Ipsam ullam nihil beatae esse fuga qui. Assumenda molestiae culpa voluptas aperiam consequatur. Dignissimos voluptatem libero voluptas beatae. Asperiores consequuntur id soluta voluptatem.', '0', '173', '50', '262', '3', 'App\\Models\\Employee', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);

-- ----------------------------
-- Table structure for ad_types
-- ----------------------------
DROP TABLE IF EXISTS `ad_types`;
CREATE TABLE `ad_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of ad_types
-- ----------------------------
INSERT INTO `ad_types` VALUES ('1', 'Mr. Norris Rohan Sr.', 'Ipsum nulla voluptates dolorum nihil et at aut aut at ut quibusdam ratione nulla quia eum et dicta assumenda.', 'Illum dolor beatae quas magni consequatur animi placeat. Aut corrupti sequi eum. Distinctio libero quia odit aut officia et reprehenderit.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('2', 'Verla Ortiz MD', 'Voluptas rerum aperiam quia quaerat praesentium commodi est rem inventore est sint sed quo ullam ea quod rem ratione possimus.', 'Odit officia quia dolore. Rerum est vel aut tempora totam. Sed consequatur modi velit accusantium sint explicabo. Quod qui perspiciatis officia quibusdam. Consequuntur est vero quo ut enim. Ad voluptas minus eaque est et doloribus ab.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('3', 'Dominique Koss', 'Velit est rerum voluptatem molestiae qui sit at autem qui voluptatem.', 'Sit eos unde perferendis consectetur. Omnis ratione voluptate velit qui molestiae vitae ut. Nihil dolor reprehenderit ut et quo et quibusdam. Vel ducimus qui magnam odio. Vero qui ut velit. Vel est corrupti et incidunt voluptatem.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('4', 'Hayden Paucek', 'Vero impedit sequi fugiat numquam quia officia rerum recusandae ratione ipsum ipsam nam.', 'Fugiat aut vero dolores tempora nesciunt eos distinctio beatae. Cum ipsa magni rerum ipsam sint. Asperiores explicabo odit aut officiis.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('5', 'Claude D\'Amore', 'Sint illo debitis qui exercitationem rerum alias nisi nisi dolor nostrum beatae dignissimos aut quo qui voluptas et delectus.', 'A quos et dolores rerum. Eius non repudiandae animi error magni sed placeat. Eveniet voluptatem saepe et sequi aperiam voluptatibus.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('6', 'Rashawn Gottlieb', 'Rerum fuga soluta animi eligendi placeat ratione ut harum debitis omnis.', 'Repudiandae quaerat non adipisci. Nihil magni id autem maxime. Quaerat odio voluptates autem perferendis.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('7', 'Ms. Reina Klocko PhD', 'Similique ipsum nesciunt distinctio asperiores unde eum magni maiores necessitatibus aliquid reprehenderit fuga aut consequatur est et enim suscipit.', 'Id aut aut voluptas assumenda voluptates voluptatem ipsum. Aut nobis est nihil laborum dolore modi assumenda. Temporibus animi labore sed molestiae occaecati.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('8', 'Mrs. Lauriane Kunde DVM', 'Sunt sunt asperiores voluptatum sit qui sint itaque quas et laudantium ut dignissimos aspernatur ut alias corporis facilis voluptates sequi odit.', 'Temporibus minus et cumque eligendi repudiandae nemo blanditiis. Et sint sed et et maiores. Non sit nesciunt tenetur pariatur quam distinctio.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('9', 'Ms. Burnice Fisher DVM', 'Doloremque tempore rem laboriosam fugit et consequuntur quam aperiam blanditiis aliquid perferendis at iste consequuntur fugit repellat voluptatibus.', 'Dolores voluptatem molestiae reiciendis modi aperiam vel nostrum. Ex illo enim et voluptates. Dolorum non commodi non omnis asperiores quia.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `ad_types` VALUES ('10', 'Karlie Grant', 'Sit at ab ea iste ut eos consequatur odio harum sint est qui hic consequatur quis sit consectetur.', 'Minima illo corrupti assumenda illum dolores quod. Dolores dolorem sit quas odit nihil. Esse nihil qui ea quas esse officia nihil praesentium.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);

-- ----------------------------
-- Table structure for announcements
-- ----------------------------
DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_type_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `announcements_ad_type_id_foreign` (`ad_type_id`),
  CONSTRAINT `announcements_ad_type_id_foreign` FOREIGN KEY (`ad_type_id`) REFERENCES `ad_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of announcements
-- ----------------------------
INSERT INTO `announcements` VALUES ('1', 'Eveniet nostrum reprehenderit aut enim dolorum sed nisi.', 'Quia placeat pariatur quia sunt dolores. Id nulla laboriosam quia ducimus.', null, null, 'Facere impedit sint a incidunt. Ipsum voluptas voluptatem quod deserunt voluptatem. Sint esse labore velit odit. Voluptatem in voluptatem eligendi. Aut est eius aliquid neque maxime ea.', '6', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `announcements` VALUES ('2', 'Suscipit minus accusamus repudiandae eos voluptas ex ut sunt quaerat aut dolores nihil repellat.', 'Voluptas blanditiis corrupti minus sunt consequatur quos debitis. Expedita magni hic adipisci doloremque. Voluptas similique totam officiis nihil id dolor in. Repellat et qui et iusto.', null, null, 'Numquam perspiciatis nihil debitis temporibus. Perferendis assumenda est eveniet qui omnis qui. Sed ut amet minus soluta. Voluptatem eum ut nemo harum nostrum quidem.', '7', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `announcements` VALUES ('3', 'Labore voluptatibus quia dolore quibusdam culpa esse fugiat ut corrupti.', 'Porro id sapiente exercitationem tempora velit consequatur architecto. Et et non nostrum dolorem ut sit. Magni voluptas sed facilis natus aliquid amet. Eum voluptas eius similique ut quasi quod qui.', null, null, 'Incidunt et quisquam ut. Ipsa est animi et sunt ut labore voluptate. Sequi iure eligendi sapiente eos recusandae explicabo. Natus ut laborum mollitia sunt explicabo sit.', '8', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `announcements` VALUES ('4', 'At sunt rerum voluptatem iure repellat consequuntur error aut commodi voluptatem.', 'Quaerat nemo corporis inventore officia. Est sunt voluptas id facere suscipit voluptatibus eos. Dolore dolor rerum molestias et ipsam nihil.', null, null, 'Recusandae iure deserunt ea. Recusandae sed id consequatur odit perspiciatis consequatur. Modi laborum nihil sequi praesentium molestias.', '9', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `announcements` VALUES ('5', 'Tenetur sequi adipisci nam illum adipisci cupiditate molestiae deserunt ducimus.', 'Suscipit non minima totam dolores quibusdam illo quos. Voluptas rerum esse soluta. Officiis explicabo aut aut fugiat dolor voluptas. Omnis et dolore est molestias eveniet voluptatem animi voluptatem.', null, null, 'Id pariatur aliquam eum vero. Temporibus cum aut quia facilis. Magnam aliquid omnis est quibusdam labore. Dolores libero rerum sit voluptas.', '10', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);

-- ----------------------------
-- Table structure for app_sections
-- ----------------------------
DROP TABLE IF EXISTS `app_sections`;
CREATE TABLE `app_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of app_sections
-- ----------------------------
INSERT INTO `app_sections` VALUES ('1', 'historia', 'Historia', 'Historia de la insitución', '2024-08-07 03:01:14', '2024-08-07 03:01:14', null);
INSERT INTO `app_sections` VALUES ('2', 'mision', 'Misión', 'Misión de la insitución', '2024-08-07 03:01:14', '2024-08-07 03:01:14', null);
INSERT INTO `app_sections` VALUES ('3', 'vision', 'Visión', 'Visión de la insitución', '2024-08-07 03:01:14', '2024-08-07 03:01:14', null);
INSERT INTO `app_sections` VALUES ('4', 'valores', 'Valores', 'Valores de la insitución', '2024-08-07 03:01:14', '2024-08-07 03:01:14', null);
INSERT INTO `app_sections` VALUES ('5', 'objetivos', 'Objetivos', 'Objetivos de la insitución', '2024-08-07 03:01:14', '2024-08-07 03:01:14', null);

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES ('1', 'Cade Jast', 'Aut sint tempore voluptas voluptate enim voluptate molestiae esse architecto libero velit placeat labore voluptates fuga aut qui.', '2024-08-04 20:32:57', '2024-08-04 20:32:57', null);
INSERT INTO `areas` VALUES ('2', 'Cordelia Schaefer', 'Totam officia non asperiores nisi dolore vitae repellat distinctio minima numquam quo velit consequatur consequatur maxime nulla sunt et quia.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('3', 'Carmel Dietrich', 'Inventore sed hic ut sint voluptatum fugit modi est et error ea rerum ut natus aliquam.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('4', 'Margaretta Berge', 'Ut ut modi excepturi voluptate est nihil placeat voluptate deserunt voluptates eveniet et.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('5', 'Dameon Dickinson', 'Corporis quibusdam minima harum sapiente ipsum rerum dolores dicta soluta expedita accusamus sapiente.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('6', 'Mya Wilkinson', 'Et voluptatem sit explicabo quam voluptatem ducimus nam sit itaque cum tenetur voluptas nihil numquam.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('7', 'Aida Daugherty', 'Ut architecto quisquam quo ratione esse aut esse quam blanditiis ut ut quos cum cupiditate omnis.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('8', 'Felipa Bogan IV', 'Aut iste ut id iste et voluptatibus impedit error maiores voluptas est et inventore.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('9', 'Ronny Little', 'Sit repudiandae alias ipsa praesentium et ea aut laborum itaque.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('10', 'Prof. Althea Cummings V', 'Qui accusantium dolorum dolorem fuga aliquid nam voluptates vel perspiciatis laboriosam expedita id sunt.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('11', 'Prof. Hazle Krajcik', 'Vel qui possimus aspernatur nostrum non alias culpa aut optio tenetur laborum.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('12', 'Ozella Ryan', 'Veniam enim quos dignissimos architecto magnam earum ratione odit et qui doloremque veniam in.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('13', 'Manley Rolfson', 'Corrupti qui quam facere sit rerum dolorem harum qui doloremque voluptas.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `areas` VALUES ('14', 'Assunta Kautzer', 'Ut et ipsa autem non et molestiae suscipit nisi natus voluptas nihil ut.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `areas` VALUES ('15', 'Trevion Macejkovic', 'Incidunt consequatur enim distinctio doloremque veniam veniam placeat nam beatae molestiae consequatur sed.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `areas` VALUES ('16', 'Chelsea Kerluke', 'Est sit eaque consectetur vel repudiandae laudantium in sapiente voluptates perferendis necessitatibus blanditiis commodi ducimus porro.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `areas` VALUES ('17', 'Miss Lisa Sawayn', 'Est porro rem dolorem libero ipsa dolore et odit aperiam aliquid inventore.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);
INSERT INTO `areas` VALUES ('18', 'Travon Hills', 'Odit cumque explicabo reiciendis ut consequatur quisquam sed veniam ut perferendis.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);

-- ----------------------------
-- Table structure for area_process
-- ----------------------------
DROP TABLE IF EXISTS `area_process`;
CREATE TABLE `area_process` (
  `area_id` bigint(20) unsigned NOT NULL,
  `process_id` bigint(20) unsigned NOT NULL,
  KEY `area_process_area_id_foreign` (`area_id`),
  KEY `area_process_process_id_foreign` (`process_id`),
  CONSTRAINT `area_process_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `area_process_process_id_foreign` FOREIGN KEY (`process_id`) REFERENCES `processes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of area_process
-- ----------------------------

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `app_section_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_app_section_id_foreign` (`app_section_id`),
  CONSTRAINT `articles_app_section_id_foreign` FOREIGN KEY (`app_section_id`) REFERENCES `app_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', 'Historia', '<p>Es una empresa mixta propiedad conjunta de Banco de Sabadell (50%) y el Banco Internacional de Comercio S.A (50%).</p>\r\n\r\n<p>Tiene como objeto social otorgar financiamientos a corto, mediano y largo plazo a personas jurídicas dentro del territorio nacional, así como intermediar financieramente en los términos y condiciones dispuestos en la Licencia otorgada por el Banco Central de Cuba mediante Resolución 32, del 21 de mayo de 1999.</p>\r\n\r\n<p>Entre las operaciones autorizadas se encuentran:</p>\r\n\r\n<ul>\r\n    <li>Otorgar, gestionar, promover y participar en la concesión de créditos, préstamos y otras formas de financiamientos a entidades que operen en el territorio nacional.</li>\r\n    <li>Realizar actividades de financiación de actividades productivas, comerciales y de proyectos, así como promociones inmobiliarias.</li>\r\n    <li>Desarrollar y poner en práctica modalidades crediticias y de gestión de régimen específico, tales como arrendamiento financiero, factoraje, confirming y forfaiting.</li>\r\n    <li>Brindar servicios de ingeniería financiera, de consultoría en materia económica, financiera y comercial, servicios contables y estadísticos, sistemas automatizados y de medios de pago electrónicos, así como entrenamiento de personal en estas materias.</li>\r\n    <li>Ofrecer servicios financieros y de gestión tales como, cobertura de tasas de interés y riesgo cambiario, avales, garantías y fideicomisos.</li>\r\n    <li>Realizar todos aquellos negocios lícitos de intermediación financiera no bancaria con entidades cubanas (incluidas aquellas con capital extranjero) y extranjeras que tengan relaciones comerciales y operaciones con entidades cubanas.</li>\r\n</ul>\r\n\r\n<p>El gobierno y dirección de la Sociedad corresponden, en primer lugar, a la Junta de Accionistas, que es el órgano supremo, y en segundo lugar, al Consejo de Administración como órgano de administración y ejecución.</p>\r\n\r\n<p>Financiera Iberoamericana S.A., consolidando su ya sólida reputación y mantiene su récord de cero impagos y cero morosidad.</p>\r\n', '1', '1', null, null, '1', null, null, null);

-- ----------------------------
-- Table structure for charges
-- ----------------------------
DROP TABLE IF EXISTS `charges`;
CREATE TABLE `charges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of charges
-- ----------------------------
INSERT INTO `charges` VALUES ('1', 'Adrienne Cartwright', 'Sequi rerum et laboriosam rerum minus eum ipsam aperiam voluptatum autem nemo.', '2024-08-04 20:32:57', '2024-08-04 20:32:57', null);
INSERT INTO `charges` VALUES ('2', 'Gardner Rohan', 'Amet dolorum asperiores mollitia eum praesentium vero blanditiis hic alias.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('3', 'Dr. Jordon Graham', 'Doloremque voluptatem cumque pariatur nisi et eum neque qui temporibus itaque.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('4', 'Emelia Olson', 'Corrupti temporibus cumque quia qui dolores non nesciunt voluptates ut fugiat non dicta.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('5', 'London Lemke', 'Inventore ut sunt quaerat dolorem aut saepe aperiam delectus culpa distinctio qui aut sed iusto sint recusandae ut nobis et non.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('6', 'Prof. Lukas Kemmer', 'Pariatur et et aut quo sunt eos nihil dicta autem.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('7', 'Dr. Everette Frami', 'A ad eveniet fuga id rem pariatur blanditiis id eos nesciunt ab asperiores dolores nobis error provident sunt impedit dolores.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('8', 'Dr. Baby Beahan MD', 'Id non libero doloremque aut illo qui dolor alias veniam minus et excepturi quisquam.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('9', 'Jermey Walsh', 'Facere ipsam quaerat et illum consequatur architecto aut rerum dicta maxime aspernatur vitae voluptatem autem explicabo.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('10', 'Ms. Selina Schinner Jr.', 'Quaerat aut soluta nulla earum omnis eum consequuntur consectetur sapiente rerum quam aperiam aut culpa nulla fuga.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('11', 'Richard Padberg', 'Autem et voluptatibus neque deserunt sit fuga modi ipsum laborum nostrum expedita voluptatem beatae.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('12', 'Payton Keebler', 'Qui illo ut eos sed provident autem aut doloribus qui voluptas voluptatibus maiores totam molestiae non.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('13', 'Zola Schumm', 'Mollitia quidem quia cupiditate ab sit fuga voluptates non ut beatae quisquam sapiente officia eligendi ea quis voluptatum qui et.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `charges` VALUES ('14', 'Dr. Amelie Schulist PhD', 'Ut ut voluptatem sed dolore rerum qui placeat autem quisquam corporis temporibus cupiditate quas at impedit sequi vel temporibus omnis aut nihil.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `charges` VALUES ('15', 'Ms. Annalise Haag', 'Enim animi libero odio nihil voluptate ea quibusdam eos repellat fuga sit temporibus mollitia ullam sed non aut totam.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `charges` VALUES ('16', 'Dr. Bonita Daniel', 'Et ut voluptatem perspiciatis ducimus perferendis vel itaque et aut.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `charges` VALUES ('17', 'Dr. Edmond Rice III', 'Ut in inventore possimus possimus omnis ut laborum ipsam corrupti laudantium molestiae.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);
INSERT INTO `charges` VALUES ('18', 'Dillon Stracke', 'Velit laborum accusantium quod sed earum asperiores perferendis et repellendus voluptatem neque omnis aut aut consequatur voluptatem officiis architecto.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);

-- ----------------------------
-- Table structure for cities
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_country_id_foreign` (`country_id`),
  CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('21', 'PINAR DEL RÍO', 'PR', '21', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('22', 'ARTEMISA', 'ART', '22', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('23', 'LA HABANA', 'LH', '23', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('24', 'MAYABEQUE', 'MYQ', '24', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('25', 'MATANZAS', 'MTZ', '25', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('26', 'VILLA CLARA', 'VC', '26', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('27', 'CIENFUEGOS', 'CF', '27', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('28', 'SANCTI SPÍRITUS', 'SS', '28', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('29', 'CIEGO DE ÁVILA', 'CA', '29', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('30', 'CAMAGÜEY', 'CMG', '30', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('31', 'LAS TUNAS', 'LT', '31', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('32', 'HOLGUÍN', 'HLG', '32', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('33', 'GRANMA', 'GRM', '33', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('34', 'SANTIAGO DE CUBA', 'SC', '34', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('35', 'GUANTÁNAMO', 'GTM', '35', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('40', 'ISLA DE LA JUVENTUD', 'IJ', '40', null, '53', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('41', 'Amira Friesen', 'Est magnam quia unde eum. Saepe nam natus illo provident ipsum sit possimus nihil. Hic fugit dolores ad magnam sit sed molestiae cupiditate.', null, null, '248', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('42', 'Nia Tillman', 'Odio consectetur sequi eius. Placeat sed nihil incidunt cumque et nulla. Est dicta aspernatur veritatis et facilis aut.', null, null, '249', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('43', 'Nathan Ward V', 'Sint delectus totam dolores a et aliquid. Explicabo impedit iste animi velit labore fugit. Ipsam aut sit perspiciatis officiis. Animi omnis quisquam voluptas.', null, null, '251', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('44', 'Viviane Kemmer', 'Laboriosam adipisci soluta nesciunt est sequi. Repellat perferendis qui in illum ut. Sed aperiam illum eligendi sit id.', null, null, '252', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('45', 'Rogers Stroman', 'Mollitia blanditiis minus voluptate. Et accusantium facere qui minus laboriosam quaerat id. Assumenda sint magni distinctio ut maiores velit dolore.', null, null, '254', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('46', 'Tyreek O\'Kon MD', 'Vel aut voluptatem nesciunt dolorem earum sequi. Culpa cumque voluptatem ab nihil totam aut. Laudantium harum minima et dicta minima.', null, null, '255', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('47', 'Misael Kirlin', 'Consequatur dolor vel consectetur deleniti id maiores necessitatibus perferendis. Quibusdam iusto quas dolor molestiae tenetur beatae harum modi. Recusandae omnis exercitationem enim porro qui. Aut possimus consequuntur occaecati sit non sunt inventore.', null, null, '257', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('48', 'Chase Hessel III', 'Eaque sed ut ex occaecati aut repellat sunt quam. Unde veniam voluptate laboriosam iste. Eum aliquid labore et adipisci.', null, null, '258', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('49', 'Willy Bradtke', 'Ullam qui non doloremque quasi cupiditate ea quod. Adipisci voluptatem deleniti quia. Ipsa non labore et numquam eligendi. Vel quia temporibus quos cupiditate laudantium accusamus.', null, null, '260', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `cities` VALUES ('50', 'Roosevelt Pacocha', 'Aut omnis ad provident temporibus et. Nostrum aliquid tempore officia ut id distinctio et. Inventore laudantium dignissimos saepe deserunt.', null, null, '261', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES ('1', 'Demo', 'Dmo', 'Optimiza tu negocio con un manejo avanzado de inventarios', 'images/generic-logo.png', '789963366', 'enterpise@novum.com', 'hhtp://www.enterpise-novum.com', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('2', 'Meaghan Rolfson', 'Aliquid sit ratione quia ab qui id aut ipsa. Nisi voluptate aspernatur quisquam sed molestiae blanditiis ipsa dolore. Id quod tenetur consectetur. Quis iste ut ut mollitia nostrum temporibus et. Suscipit nisi et doloribus unde eius.', 'Doloribus voluptatem aut sit. Ut voluptatem sunt necessitatibus praesentium. Dolorem aliquid dicta quo aspernatur maiores vero. Perferendis quo nihil reprehenderit recusandae ipsum quis.', 'Non amet in porro. Assumenda accusamus voluptates dolore et cupiditate. Amet earum ab dolor est. Laudantium excepturi ut maxime amet quis. Est quis aliquid asperiores id. Est voluptas delectus aut est. Sed pariatur corrupti non molestiae voluptas.', '1-630-423-6306', 'tyra59@gmail.com', 'Rerum dignissimos dolorum ipsa eos. Nobis sunt repellendus enim qui architecto. Modi quia et esse aut.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('3', 'Leonard Yost', 'Hic minus eveniet aut et alias ipsum. Magnam recusandae nobis dolores natus aut ea nihil occaecati. Deserunt sit atque sapiente quos. Facere et omnis praesentium dolore enim laborum qui itaque. Consectetur quos commodi est animi qui.', 'Tenetur fugiat illo reiciendis dolorum. Aperiam quia est debitis et velit sapiente commodi. Velit voluptas maxime ea debitis voluptates. Aspernatur veniam et ratione aut nesciunt.', 'Ex vel ut cupiditate qui soluta repellat vitae. Dolore voluptas quaerat facere. Molestiae fugiat eos perferendis ea aut ipsam. Dicta est rem minima ipsam et corporis voluptates.', '1-541-294-5775', 'myron04@gmail.com', 'Odio inventore aut quaerat. Aut sed ut minus libero. Ea molestias pariatur et mollitia saepe sit.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('4', 'Dereck Nolan II', 'Et delectus qui sapiente deleniti et iure eos. Nostrum modi facilis culpa quo dolores minima. Libero rerum nemo placeat rerum reiciendis esse.', 'Suscipit quae dolor in aut corporis. Dolore neque blanditiis error rerum repudiandae soluta. Officia molestias vel est repellendus qui eum eum sequi. Ipsa at voluptatem tempora eaque.', 'Et aut et ut illum rerum. Nihil fugit aut quis voluptas. Sed voluptatem amet autem et. Culpa rerum laudantium rerum cumque laudantium. Reiciendis animi optio earum accusantium tenetur. Quasi ut totam enim. Nemo accusantium ipsam consequuntur ducimus.', '(308) 978-4415', 'renner.curtis@yahoo.com', 'Ad eligendi in sunt molestiae occaecati et nulla autem. Sed aut facilis unde consequatur.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('5', 'Mr. Thaddeus Hammes', 'Nihil perspiciatis sunt tempore provident repellendus blanditiis debitis. Culpa beatae eveniet quasi consequuntur quia repudiandae. Fugiat qui qui totam aut velit ducimus magni officiis.', 'Et aperiam in cumque. Eos velit enim illo aut perferendis. Eveniet numquam necessitatibus eum sunt. Exercitationem veritatis illum iusto vitae maxime laboriosam.', 'Ipsum iusto adipisci labore dignissimos. Sit sit culpa qui delectus tempora est ad alias. Odio aut dolorum ea inventore est debitis. Quasi ea sit ad dolorum. Sequi quia odio in occaecati veniam quia.', '+18544331856', 'swaniawski.arne@hotmail.com', 'Ea voluptatem nihil nostrum sit mollitia. Aperiam voluptatem est magni atque. Nihil minus ut minima labore eum corrupti dolore.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('6', 'Kobe Ryan', 'Commodi aut fugit distinctio error deleniti. Dolorem vero aut dolores beatae id consequuntur. Laboriosam magnam ea eius rerum. Quibusdam deserunt omnis ipsam eveniet minima.', 'Ipsam tenetur est quidem aut. Quidem voluptatibus laboriosam quo temporibus vel dolores. Et ipsa consequuntur illum quae.', 'Iste excepturi ab non deleniti amet repellendus eos. Ducimus dolore aperiam dolore esse sed voluptatum sint. Ea eum voluptates assumenda et omnis. Laborum enim repellendus id doloribus similique. Earum totam vel ut modi voluptatum recusandae magnam.', '769.357.9543', 'morissette.julianne@hotmail.com', 'Sed sit incidunt in. Cupiditate sed dolorem dolorem sunt facere eaque quia. Distinctio et facilis veniam. Fugit tempore et dolor qui. Numquam consequatur sed accusamus ut consectetur nihil. Magnam nemo excepturi recusandae commodi.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('7', 'Roselyn Okuneva', 'Magni magnam ad corrupti est necessitatibus. Sed quia ab nihil aut asperiores deleniti officia cumque. Sed provident dolor nihil ipsa ex rerum optio sint.', 'Autem enim dolores voluptas accusamus beatae molestiae. Vel nemo deserunt nostrum rerum maiores iure. Qui ipsam ullam fugiat natus. Aut quasi iusto voluptatem ab.', 'Voluptatem nesciunt repudiandae vero reiciendis aut assumenda est. Pariatur reprehenderit omnis sed eos. Recusandae est aspernatur recusandae delectus. Molestiae voluptatem neque soluta maxime.', '1-973-624-7015', 'osborne51@cronin.com', 'Ut minus beatae et eos reprehenderit adipisci. Voluptas est similique et nam ex aut. Aliquid at et et qui error quam occaecati. Aliquam vel id laudantium quia est optio accusantium.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('8', 'Joseph Altenwerth', 'Animi tenetur voluptatem qui deserunt ea rerum. Odio fugiat rerum quam alias facere et. Ut reprehenderit aspernatur ab eum illo quia perspiciatis.', 'Vel eum molestiae sed dolorem tenetur. Quibusdam accusantium debitis non nihil velit voluptas eum voluptatem. Quod temporibus iusto velit aut.', 'Occaecati quo perferendis qui doloribus magni doloribus. Veniam repudiandae occaecati quia a nihil dicta. Et minus non unde voluptate. Est soluta velit magnam et corrupti nulla. Similique odit tempora sed odit.', '810.687.5748', 'newton08@gmail.com', 'Praesentium esse nam consequuntur aspernatur repellendus quisquam excepturi. Necessitatibus qui sint fuga reprehenderit recusandae itaque. Eos maiores ut eligendi fugiat.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('9', 'Judy Feil', 'Et est alias amet provident est labore est iste. Est odit sit architecto quasi est in. Qui esse odit a id possimus. Non ea debitis mollitia est at facere. Non nisi magnam minus consequatur explicabo a iusto sunt.', 'Enim eos omnis reprehenderit. Nulla iure perferendis ut et quis. Laboriosam et illum amet reiciendis.', 'Sit minima ratione voluptas magnam. Odit eum molestiae impedit. Harum ut repudiandae voluptatibus minus consequatur in veniam amet. Eaque et culpa possimus non.', '(225) 478-0401', 'edd45@roberts.com', 'Cum qui tempora odio esse laudantium. Magnam omnis suscipit qui magni totam culpa. Perferendis est vitae dolorem enim placeat animi explicabo. A explicabo earum repudiandae consequuntur. Impedit illum ipsam dolor qui maxime excepturi quis dicta.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('10', 'Dr. Wellington Mayert', 'Voluptatum perspiciatis occaecati fuga rem dolores nobis quasi. Dolores quae et pariatur necessitatibus. Quia fuga qui pariatur enim. Doloribus nihil dignissimos sunt labore suscipit ut vitae rerum.', 'Sit quisquam tempore eum. Numquam et quis ipsam et illo. Iste consequatur ipsa dolorem consectetur et molestiae.', 'Excepturi consequatur expedita possimus neque. Suscipit iure iure fugit iusto ipsum perferendis aspernatur et. Itaque nobis est deleniti dolores iure quasi velit amet.', '870-383-4778', 'owaelchi@reinger.com', 'Sed porro natus enim ab. Modi nihil laudantium molestias ex. Ea ea maxime esse architecto. Sed repudiandae quae illum possimus dolore illum.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('11', 'Prof. Arnaldo Fay III', 'Temporibus itaque sunt excepturi in aperiam et ducimus qui. Sit est quasi velit exercitationem hic. Repellendus laboriosam aut molestias aut. Exercitationem blanditiis molestiae minima cumque laboriosam quaerat exercitationem.', 'Molestiae est facilis laboriosam a. Omnis et nihil temporibus sapiente. Dolorem et ut esse debitis est autem. Vero quia optio odio.', 'Dolorum aut et laudantium. Accusamus quidem aut sit quisquam quae in. Qui molestiae odit placeat laboriosam sint fugit quasi. Ea maiores culpa odit similique id dicta non eos. Ipsa iusto occaecati velit eum amet veniam in.', '(908) 267-3806', 'erika.marks@dickens.com', 'Et quis rerum placeat est earum qui. Amet sit mollitia mollitia debitis. Praesentium amet qui saepe velit voluptatem omnis. Id deleniti autem accusamus in tenetur eos. Ullam similique ab iusto neque ducimus.', '[]', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `companies` VALUES ('12', 'Granville Walter', 'Rerum qui fugit quasi dolore. Ducimus quaerat et eum quia dolore vel. Praesentium earum aliquam ratione harum dolor. Explicabo accusantium maxime accusantium nemo aut sint qui. Voluptatem iste officiis necessitatibus soluta facilis et.', 'Aut qui sint aliquam enim fuga commodi perferendis. Sunt vel delectus iusto nulla. Neque perspiciatis eaque facilis consequatur aut numquam quis.', 'Rem excepturi aut exercitationem delectus. Aliquid vel nesciunt similique officia. Ut cumque veritatis necessitatibus. Illum non ducimus et animi. Esse ratione quia similique temporibus est ullam modi. Totam est itaque officia est sapiente qui laborum.', '424-277-7951', 'amber.smitham@gorczany.net', 'Sunt voluptate est modi facere tempora autem. Perspiciatis quas velit est quis. Hic minima et dolorem eum quam. Nam dicta itaque nesciunt labore reiciendis doloribus. Accusamus aut tenetur nobis facere in praesentium. Soluta nam cumque suscipit rerum.', '[]', '2024-08-04 20:33:02', '2024-08-04 20:33:02');
INSERT INTO `companies` VALUES ('13', 'Neal Stark', 'Assumenda culpa autem quidem id et. Est veritatis deserunt dolore temporibus ea natus iste. Sit et provident dolorem vero minus omnis. Eos facilis pariatur totam illum.', 'Nesciunt et quam sapiente deleniti est est. Voluptatum et ut vel aliquam quo. Mollitia praesentium nam saepe animi quaerat.', 'Sunt id et voluptas hic. In maiores quia dolore eum perspiciatis. Fugit sapiente explicabo qui quidem sunt iure amet. Est fuga excepturi aliquid natus et eos quod.', '520-342-7536', 'zkeeling@reynolds.net', 'Corporis omnis corrupti aliquid omnis. Amet quos et officia tempora qui maiores. Et id blanditiis commodi voluptates maiores in delectus sint. Sapiente voluptatem nihil quam.', '[]', '2024-08-04 20:33:02', '2024-08-04 20:33:02');
INSERT INTO `companies` VALUES ('14', 'Jayson Mraz', 'Atque quam cupiditate nisi in. Id quia saepe incidunt velit. Molestiae molestiae harum hic in et animi omnis. Ut voluptatem tenetur rerum omnis.', 'Est voluptatem sit veniam amet beatae magni earum. Est quia rerum et iste qui. Voluptas nihil voluptas dolores fuga qui. Iste repudiandae at quae odit.', 'In nesciunt voluptatem sint nostrum omnis autem. Dolorem non corrupti ad eum voluptatem earum perferendis. Laborum quia voluptas nulla sed sunt soluta ipsum amet. Enim dolor accusamus facere veniam.', '(228) 583-1996', 'sim72@hill.com', 'Distinctio et ut qui saepe dolore. Ipsum quia et qui fugiat minus sit. Sint voluptatibus veniam ea officia similique mollitia dolorum. Voluptatibus eveniet enim deserunt.', '[]', '2024-08-04 20:33:02', '2024-08-04 20:33:02');
INSERT INTO `companies` VALUES ('15', 'Mr. Rhiannon Harber', 'Fugiat voluptas ducimus minima ea tempore voluptate quibusdam. Incidunt qui dolores eos et id illo eligendi aliquid. Voluptas et accusantium ut excepturi minima impedit quia itaque.', 'Tempora reiciendis reiciendis officia sit. Dolor expedita magnam totam ea ipsam. Provident harum eos corrupti laboriosam nisi libero. Repellendus a quibusdam sequi. A eos consequuntur eum fugit.', 'Et praesentium id earum quaerat autem facere. Tenetur repellat nihil voluptatibus. Odit ea nam ipsum et et tempora fugit.', '(463) 527-0930', 'kihn.lonie@hotmail.com', 'Quos unde quia consequatur. Consequatur aperiam voluptatem quae recusandae vel. Id omnis sit labore sed nesciunt provident in. Nesciunt autem dolores nisi sint omnis corporis sint.', '[]', '2024-08-04 20:33:03', '2024-08-04 20:33:03');
INSERT INTO `companies` VALUES ('16', 'Ally Treutel', 'Natus optio ipsam tempore ducimus maiores ut quidem. Repellat non natus neque quia nisi quae velit. Quia repudiandae fuga omnis saepe a. Qui facere reiciendis tempora delectus.', 'Voluptates quibusdam officia totam corrupti illum eligendi autem. Explicabo error voluptatem temporibus qui consequuntur eaque quam excepturi. Velit id et eos quia esse perferendis tempore.', 'Eos minima fugiat animi cupiditate laborum eos. Non sequi cum id nobis molestiae numquam qui. Debitis labore et soluta omnis voluptates.', '+15742715390', 'zola14@yahoo.com', 'Aut dolorem aperiam numquam repudiandae quam praesentium aut. Delectus ratione ut vitae corrupti cumque. Dolor placeat enim enim sed facilis. Corrupti perferendis soluta ex deserunt ut.', '[]', '2024-08-04 20:33:03', '2024-08-04 20:33:03');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Afghanistan', 'AF', 'AFG', '+04:30', 'fi fi-af fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('2', 'Åland Islands', 'AX', 'ALA', '+02:00', 'fi fi-ax fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('3', 'Albania', 'AL', 'ALB', '+01:00', 'fi fi-al fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('4', 'Algeria', 'DZ', 'DZA', '+01:00', 'fi fi-dz fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('5', 'American Samoa', 'AS', 'ASM', '-11:00', 'fi fi-as fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('6', 'Andorra', 'AD', 'AND', '+01:00', 'fi fi-ad fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('7', 'Angola', 'AO', 'AGO', '+01:00', 'fi fi-ao fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('8', 'Anguilla', 'AI', 'AIA', '-04:00', 'fi fi-ai fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('9', 'Antigua and Barbuda', 'AG', 'ATG', '-04:00', 'fi fi-ag fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('10', 'Argentina', 'AR', 'ARG', '-03:00', 'fi fi-ar fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('11', 'Armenia', 'AM', 'ARM', '+04:00', 'fi fi-am fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('12', 'Aruba', 'AW', 'ABW', '-04:00', 'fi fi-aw fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('13', 'Ascensión y Tristán de Acuña', 'SH', 'SHN', '-04:00', 'fi fi-sh fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('14', 'Australia', 'AU', 'AUS', '+01:00', 'fi fi-au fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('15', 'Austria', 'AT', 'AUT', '+04:00', 'fi fi-at fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('16', 'Azerbaijan', 'AZ', 'AZE', '+03:00', 'fi fi-az fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('17', 'Bahamas', 'BS', 'BHS', '+03:00', 'fi fi-bs fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('18', 'Bahrain', 'BH', 'BHR', '-04:00', 'fi fi-bh fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('19', 'Bangladesh', 'BD', 'BGD', '+03:00', 'fi fi-bd fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('20', 'Barbados', 'BB', 'BRB', '+01:00', 'fi fi-bb fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('21', 'Belarus', 'BY', 'BLR', '-06:00', 'fi fi-by fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('22', 'Belgium', 'BE', 'BEL', '+01:00', 'fi fi-be fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('23', 'Belize', 'BZ', 'BLZ', '-04:00', 'fi fi-bz fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('24', 'Benin', 'BJ', 'BEN', '+06:00', 'fi fi-bj fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('25', 'Bermuda Islands', 'BM', 'BMU', '-04:00', 'fi fi-bm fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('26', 'Bhutan', 'BT', 'BTN', '-04:00', 'fi fi-bt fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('27', 'Bolivia', 'BO', 'BOL', '+01:00', 'fi fi-bo fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('28', 'Bosnia and Herzegovina', 'BA', 'BIH', '+02:00', 'fi fi-ba fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('29', 'Botswana', 'BW', 'BWA', '+01:00', 'fi fi-bw fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('30', 'Bouvet Island', 'BV', 'BVT', '-05:00 to -02:00', 'fi fi-bv fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('31', 'Brazil', 'BR', 'BRA', '+06:00', 'fi fi-br fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('32', 'British Indian Ocean Territory', 'IO', 'IOT', '-04:00', 'fi fi-io fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('33', 'Brunei', 'BN', 'BRN', '+08:00', 'fi fi-bn fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('34', 'Bulgaria', 'BG', 'BGR', '+02:00', 'fi fi-bg fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('35', 'Burkina Faso', 'BF', 'BFA', '+00:00', 'fi fi-bf fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('36', 'Burundi', 'BI', 'BDI', '+02:00', 'fi fi-bi fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('37', 'Cambodia', 'KH', 'KHM', '+07:00', 'fi fi-kh fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('38', 'Cameroon', 'CM', 'CMR', '+01:00', 'fi fi-cm fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('39', 'Canada', 'CA', 'CAN', '-08:00 to -03:30', 'fi fi-ca fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('40', 'Cape Verde', 'CV', 'CPV', '-01:00', 'fi fi-cv fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('41', 'Cayman Islands', 'KY', 'CYM', '-04:00', 'fi fi-ky fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('42', 'Central African Republic', 'CF', 'CAF', '-05:00', 'fi fi-cf fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('43', 'Chad', 'TD', 'TCD', '+01:00', 'fi fi-td fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('44', 'Chile', 'CL', 'CHL', '+01:00', 'fi fi-cl fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('45', 'China', 'CN', 'CHN', '-06:00 to -04:00', 'fi fi-cn fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('46', 'Christmas Island', 'CX', 'CXR', '+08:00', 'fi fi-cx fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('47', 'Cocos (Keeling) Islands', 'CC', 'CCK', '+07:00', 'fi fi-cc fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('48', 'Colombia', 'CO', 'COL', '+06:30', 'fi fi-co fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('49', 'Comoros', 'KM', 'COM', '-05:00', 'fi fi-km fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('50', 'Cook Islands', 'CK', 'COK', '+03:00', 'fi fi-ck fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('51', 'Costa Rica', 'CR', 'CRI', '-10:00', 'fi fi-cr fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('52', 'Croatia', 'HR', 'HRV', '-06:00', 'fi fi-hr fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('53', 'Cuba', 'CU', 'CUB', '+01:00', 'fi fi-cu fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('54', 'Curaçao', 'CW', 'CWU', '-05:00', 'fi fi-cw fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('55', 'Cyprus', 'CY', 'CYP', '-04:00', 'fi fi-cy fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('56', 'Czech Republic', 'CZ', 'CZE', '+02:00', 'fi fi-cz fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('57', 'Democratic Republic of the Congo', 'CD', 'COD', '+01:00', 'fi fi-cd fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('58', 'Denmark', 'DK', 'DNK', '+01:00 to +02:00', 'fi fi-dk fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('59', 'Djibouti', 'DJ', 'DJI', '+01:00', 'fi fi-dj fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('60', 'Dominica', 'DM', 'DMA', '+03:00', 'fi fi-dm fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('61', 'Dominican Republic', 'DO', 'DOM', '-04:00', 'fi fi-do fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('62', 'East Timor', 'TL', 'TLS', '-04:00', 'fi fi-tl fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('63', 'Ecuador', 'EC', 'ECU', '-06:00 to -05:00', 'fi fi-ec fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('64', 'Egypt', 'EG', 'EGY', '+02:00', 'fi fi-eg fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('65', 'El Salvador', 'SV', 'SLV', '-06:00', 'fi fi-sv fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('66', 'Equatorial Guinea', 'GQ', 'GNQ', '+00:00', 'fi fi-gq fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('67', 'Eritrea', 'ER', 'ERI', '+01:00', 'fi fi-er fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('68', 'Estados Federados de', 'FM', 'FSM', null, 'fi fi-fm fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('69', 'Estonia', 'EE', 'EST', '+02:00', 'fi fi-ee fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('70', 'Ethiopia', 'ET', 'ETH', '+03:00', 'fi fi-et fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('71', 'Falkland Islands (Malvinas)', 'FK', 'FLK', '-03:00', 'fi fi-fk fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('72', 'Faroe Islands', 'FO', 'FRO', '+00:00', 'fi fi-fo fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('73', 'Fiji', 'FJ', 'FJI', '+12:00', 'fi fi-fj fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('74', 'Finland', 'FI', 'FIN', '+02:00', 'fi fi-fi fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('75', 'France', 'FR', 'FRA', '+01:00', 'fi fi-fr fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `countries` VALUES ('76', 'French Guiana', 'GF', 'GUF', '-03:00', 'fi fi-gf fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('77', 'French Polynesia', 'PF', 'PYF', '-10:00 to -09:00', 'fi fi-pf fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('78', 'French Southern Territories', 'TF', 'ATF', '+01:00', 'fi fi-tf fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('79', 'Gabon', 'GA', 'GAB', '+00:00', 'fi fi-ga fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('80', 'Gambia', 'GM', 'GMB', '+04:00', 'fi fi-gm fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('81', 'Georgia', 'GE', 'GEO', '+01:00', 'fi fi-ge fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('82', 'Germany', 'DE', 'DEU', '+00:00', 'fi fi-de fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('83', 'Ghana', 'GH', 'GHA', '+01:00', 'fi fi-gh fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('84', 'Gibraltar', 'GI', 'GIB', '+02:00', 'fi fi-gi fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('85', 'Greece', 'GR', 'GRC', '-04:00 to +00:00', 'fi fi-gr fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('86', 'Greenland', 'GL', 'GRL', '-04:00', 'fi fi-gl fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('87', 'Grenada', 'GD', 'GRD', '-04:00', 'fi fi-gd fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('88', 'Guadeloupe', 'GP', 'GLP', '+10:00', 'fi fi-gp fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('89', 'Guam', 'GU', 'GUM', '-06:00', 'fi fi-gu fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('90', 'Guatemala', 'GT', 'GTM', '+00:00', 'fi fi-gt fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('91', 'Guernsey', 'GG', 'GGY', '+00:00', 'fi fi-gg fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('92', 'Guinea', 'GN', 'GIN', '+00:00', 'fi fi-gn fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('93', 'Guinea-Bissau', 'GW', 'GNB', '-04:00', 'fi fi-gw fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('94', 'Guyana', 'GY', 'GUY', '-05:00', 'fi fi-gy fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('95', 'Haiti', 'HT', 'HTI', '-06:00', 'fi fi-ht fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('96', 'Heard Island and McDonald Islands', 'HM', 'HMD', null, 'fi fi-hm fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('97', 'Honduras', 'HN', 'HND', '+01:00', 'fi fi-hn fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('98', 'Hong Kong', 'HK', 'HKG', '+00:00', 'fi fi-hk fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('99', 'Hungary', 'HU', 'HUN', '+05:30', 'fi fi-hu fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('100', 'Iceland', 'IS', 'ISL', '+07:00 to +09:00', 'fi fi-is fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('101', 'India', 'IN', 'IND', '+03:30', 'fi fi-in fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('102', 'Indonesia', 'ID', 'IDN', '+03:00', 'fi fi-id fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('103', 'Iran', 'IR', 'IRN', '+00:00', 'fi fi-ir fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('104', 'Iraq', 'IQ', 'IRQ', '+00:00', 'fi fi-iq fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('105', 'Ireland', 'IE', 'IRL', '+02:00', 'fi fi-ie fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('106', 'Isle of Man', 'IM', 'IMN', '+01:00', 'fi fi-im fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('107', 'Israel', 'IL', 'ISR', '+00:00', 'fi fi-il fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('108', 'Italy', 'IT', 'ITA', '-05:00', 'fi fi-it fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('109', 'Ivory Coast', 'CI', 'CIV', '+09:00', 'fi fi-ci fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('110', 'Jamaica', 'JM', 'JAM', '+00:00', 'fi fi-jm fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('111', 'Japan', 'JP', 'JPN', '+02:00', 'fi fi-jp fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('112', 'Jersey', 'JE', 'JEY', '+05:00 to +06:00', 'fi fi-je fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('113', 'Jordan', 'JO', 'JOR', '+03:00', 'fi fi-jo fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('114', 'Kazakhstan', 'KZ', 'KAZ', '+12:00 to +14:00', 'fi fi-kz fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('115', 'Kenya', 'KE', 'KEN', '+01:00', 'fi fi-ke fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('116', 'Kiribati', 'KI', 'KIR', '+03:00', 'fi fi-ki fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('117', 'Kuwait', 'KW', 'KWT', '+05:00 to +06:00', 'fi fi-kw fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('118', 'Kyrgyzstan', 'KG', 'KGZ', '+07:00', 'fi fi-kg fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('119', 'Laos', 'LA', 'LAO', '+02:00', 'fi fi-la fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('120', 'Latvia', 'LV', 'LVA', '+02:00', 'fi fi-lv fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('121', 'Lebanon', 'LB', 'LBN', '+02:00', 'fi fi-lb fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('122', 'Lesotho', 'LS', 'LSO', '+00:00', 'fi fi-ls fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('123', 'Liberia', 'LR', 'LBR', '+02:00', 'fi fi-lr fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('124', 'Libya', 'LY', 'LBY', '+01:00', 'fi fi-ly fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('125', 'Liechtenstein', 'LI', 'LIE', '+02:00', 'fi fi-li fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('126', 'Lithuania', 'LT', 'LTU', '+01:00', 'fi fi-lt fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('127', 'Luxembourg', 'LU', 'LUX', '+08:00', 'fi fi-lu fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('128', 'Macao', 'MO', 'MAC', '+01:00', 'fi fi-mo fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('129', 'Macedonia', 'MK', 'MKD', '+03:00', 'fi fi-mk fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('130', 'Madagascar', 'MG', 'MDG', '+02:00', 'fi fi-mg fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('131', 'Malawi', 'MW', 'MWI', '+08:00', 'fi fi-mw fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('132', 'Malaysia', 'MY', 'MYS', '+05:00', 'fi fi-my fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('133', 'Maldives', 'MV', 'MDV', '+00:00', 'fi fi-mv fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('134', 'Mali', 'ML', 'MLI', '+01:00', 'fi fi-ml fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('135', 'Malta', 'MT', 'MLT', '+12:00', 'fi fi-mt fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `countries` VALUES ('136', 'Marshall Islands', 'MH', 'MHL', '-04:00', 'fi fi-mh fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('137', 'Martinique', 'MQ', 'MTQ', '+00:00', 'fi fi-mq fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('138', 'Mauritania', 'MR', 'MRT', '+04:00', 'fi fi-mr fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('139', 'Mauritius', 'MU', 'MUS', '+03:00', 'fi fi-mu fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('140', 'Mayotte', 'YT', 'MYT', '-08:00 to -06:00', 'fi fi-yt fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('141', 'Mexico', 'MX', 'MEX', '+10:00 to +11:00', 'fi fi-mx fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('142', 'Moldova', 'MD', 'MDA', '+02:00', 'fi fi-md fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('143', 'Monaco', 'MC', 'MCO', '+01:00', 'fi fi-mc fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('144', 'Mongolia', 'MN', 'MNG', '+07:00 to +08:00', 'fi fi-mn fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('145', 'Montenegro', 'ME', 'MNE', '+01:00', 'fi fi-me fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('146', 'Montserrat', 'MS', 'MSR', '-04:00', 'fi fi-ms fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('147', 'Morocco', 'MA', 'MAR', '+00:00', 'fi fi-ma fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('148', 'Mozambique', 'MZ', 'MOZ', '+02:00', 'fi fi-mz fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('149', 'Myanmar', 'MM', 'MMR', '+06:30', 'fi fi-mm fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('150', 'Namibia', 'NA', 'NAM', '+04:00', 'fi fi-na fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('151', 'Nauru', 'NR', 'NRU', '+02:00', 'fi fi-nr fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('152', 'Nepal', 'NP', 'NPL', '+12:00', 'fi fi-np fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('153', 'Netherlands', 'NL', 'NLD', '+05:45', 'fi fi-nl fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('154', 'New Caledonia', 'NC', 'NCL', '+01:00', 'fi fi-nc fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('155', 'New Zealand', 'NZ', 'NZL', '-04:00', 'fi fi-nz fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('156', 'Nicaragua', 'NI', 'NIC', '+11:00', 'fi fi-ni fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('157', 'Niger', 'NE', 'NER', '+12:00', 'fi fi-ne fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('158', 'Nigeria', 'NG', 'NGA', '-06:00', 'fi fi-ng fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('159', 'Niue', 'NU', 'NIU', '+01:00', 'fi fi-nu fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('160', 'Norfolk Island', 'NF', 'NFK', '+01:00', 'fi fi-nf fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('161', 'North Korea', 'KP', 'PRK', '-11:00', 'fi fi-kp fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('162', 'Northern Mariana Islands', 'MP', 'MNP', '+11:00', 'fi fi-mp fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('163', 'Norway', 'NO', 'NOR', '+08:30', 'fi fi-no fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('164', 'Oman', 'OM', 'OMN', '+10:00', 'fi fi-om fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('165', 'Pakistan', 'PK', 'PAK', '+01:00', 'fi fi-pk fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('166', 'Palau', 'PW', 'PLW', '+04:00', 'fi fi-pw fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('167', 'Palestine', 'PS', 'PSE', '+05:00', 'fi fi-ps fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('168', 'Panama', 'PA', 'PAN', '+09:00', 'fi fi-pa fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('169', 'Papua New Guinea', 'PG', 'PNG', '+02:00', 'fi fi-pg fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('170', 'Paraguay', 'PY', 'PRY', '-05:00', 'fi fi-py fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('171', 'Peru', 'PE', 'PER', '+10:00 to +11:00', 'fi fi-pe fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('172', 'Philippines', 'PH', 'PHL', '-04:00', 'fi fi-ph fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('173', 'Pitcairn Islands', 'PN', 'PCN', '-05:00', 'fi fi-pn fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('174', 'Poland', 'PL', 'POL', '+08:00', 'fi fi-pl fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('175', 'Portugal', 'PT', 'PRT', '-08:00', 'fi fi-pt fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('176', 'Puerto Rico', 'PR', 'PRI', '+01:00', 'fi fi-pr fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('177', 'Qatar', 'QA', 'QAT', '-01:00 to +00:00', 'fi fi-qa fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('178', 'Republic of the Congo', 'CG', 'COG', '-04:00', 'fi fi-cg fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('179', 'Réunion', 'RE', 'REU', '+03:00', 'fi fi-re fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('180', 'Romania', 'RO', 'ROU', '+01:00', 'fi fi-ro fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('181', 'Russia', 'RU', 'RUS', '+04:00', 'fi fi-ru fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('182', 'Rwanda', 'RW', 'RWA', '+02:00', 'fi fi-rw fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('183', 'Saint Barthélemy', 'BL', 'BLM', '+02:00 to +12:00', 'fi fi-bl fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('184', 'Saint Kitts and Nevis', 'KN', 'KNA', '+02:00', 'fi fi-kn fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('185', 'Saint Lucia', 'LC', 'LCA', '-04:00', 'fi fi-lc fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('186', 'Saint Martin (French part)', 'MF', 'MAF', '+00:00', 'fi fi-mf fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('187', 'Saint Pierre and Miquelon', 'PM', 'SPM', '-04:00', 'fi fi-pm fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('188', 'Saint Vincent and the Grenadines', 'VC', 'VCT', '-04:00', 'fi fi-vc fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('189', 'Samoa', 'WS', 'WSM', '-04:00', 'fi fi-ws fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('190', 'San Marino', 'SM', 'SMR', '-03:00', 'fi fi-sm fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('191', 'Sao Tome and Principe', 'ST', 'STP', '-04:00', 'fi fi-st fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('192', 'Saudi Arabia', 'SA', 'SAU', '+13:00', 'fi fi-sa fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('193', 'Senegal', 'SN', 'SEN', '+01:00', 'fi fi-sn fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('194', 'Serbia', 'RS', 'SRB', '+01:00', 'fi fi-rs fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('195', 'Seychelles', 'SC', 'SYC', '+03:00', 'fi fi-sc fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('196', 'Sierra Leone', 'SL', 'SLE', '+00:00', 'fi fi-sl fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('197', 'Singapore', 'SG', 'SGP', '+00:00', 'fi fi-sg fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('198', 'Sint Maarten', 'SX', 'SMX', '+01:00', 'fi fi-sx fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('199', 'Slovakia', 'SK', 'SVK', '+04:00', 'fi fi-sk fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('200', 'Slovenia', 'SI', 'SVN', '+00:00', 'fi fi-si fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('201', 'Solomon Islands', 'SB', 'SLB', '+08:00', 'fi fi-sb fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('202', 'Somalia', 'SO', 'SOM', '-04:00', 'fi fi-so fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('203', 'South Africa', 'ZA', 'ZAF', '+01:00', 'fi fi-za fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('204', 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', '+01:00', 'fi fi-gs fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('205', 'South Korea', 'KR', 'KOR', '+11:00', 'fi fi-kr fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('206', 'South Sudan', 'SS', 'SSD', '+03:00', 'fi fi-ss fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('207', 'Spain', 'ES', 'ESP', '+02:00', 'fi fi-es fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('208', 'Sri Lanka', 'LK', 'LKA', '-02:00', 'fi fi-lk fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('209', 'Sudan', 'SD', 'SDN', '+09:00', 'fi fi-sd fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('210', 'Suriname', 'SR', 'SUR', '+03:00', 'fi fi-sr fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('211', 'Svalbard and Jan Mayen', 'SJ', 'SJM', '+00:00 to +01:00', 'fi fi-sj fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('212', 'Swaziland', 'SZ', 'SWZ', '+05:30', 'fi fi-sz fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('213', 'Sweden', 'SE', 'SWE', '+02:00', 'fi fi-se fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('214', 'Switzerland', 'CH', 'CHE', '-03:00', 'fi fi-ch fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('215', 'Syria', 'SY', 'SYR', '+01:00', 'fi fi-sy fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('216', 'Taiwan', 'TW', 'TWN', '+02:00', 'fi fi-tw fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('217', 'Tajikistan', 'TJ', 'TJK', '+01:00', 'fi fi-tj fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('218', 'Tanzania', 'TZ', 'TZA', '+01:00', 'fi fi-tz fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('219', 'Thailand', 'TH', 'THA', '+02:00', 'fi fi-th fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('220', 'Togo', 'TG', 'TGO', '+08:00', 'fi fi-tg fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('221', 'Tokelau', 'TK', 'TKL', '+05:00', 'fi fi-tk fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('222', 'Tonga', 'TO', 'TON', '+03:00', 'fi fi-to fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('223', 'Trinidad and Tobago', 'TT', 'TTO', '+07:00', 'fi fi-tt fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('224', 'Tunisia', 'TN', 'TUN', '-05:00', 'fi fi-tn fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('225', 'Turkey', 'TR', 'TUR', '+09:00', 'fi fi-tr fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('226', 'Turkmenistan', 'TM', 'TKM', '+00:00', 'fi fi-tm fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('227', 'Turks and Caicos Islands', 'TC', 'TCA', '+13:00', 'fi fi-tc fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('228', 'Tuvalu', 'TV', 'TUV', '+13:00', 'fi fi-tv fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('229', 'Uganda', 'UG', 'UGA', '+02:00', 'fi fi-ug fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('230', 'Ukraine', 'UA', 'UKR', '-04:00', 'fi fi-ua fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('231', 'United Arab Emirates', 'AE', 'ARE', '+01:00', 'fi fi-ae fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('232', 'United Kingdom', 'GB', 'GBR', '+03:00', 'fi fi-gb fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('233', 'United States Minor Outlying Islands', 'UM', 'UMI', '+05:00', 'fi fi-um fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('234', 'United States of America', 'US', 'USA', '-05:00', 'fi fi-us fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('235', 'United States Virgin Islands', 'VI', 'VIR', '+12:00', 'fi fi-vi fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('236', 'Uruguay', 'UY', 'URY', '+03:00', 'fi fi-uy fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('237', 'Uzbekistan', 'UZ', 'UZB', '+02:00', 'fi fi-uz fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('238', 'Vanuatu', 'VU', 'VUT', '+04:00', 'fi fi-vu fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('239', 'Vatican City State', 'VA', 'VAT', '+00:00', 'fi fi-va fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('240', 'Venezuela', 'VE', 'VEN', '-10:00 to -05:00', 'fi fi-ve fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('241', 'Vietnam', 'VN', 'VNM', '-03:00', 'fi fi-vn fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('242', 'Virgin Islands', 'VG', 'VGB', '-04:00', 'fi fi-vg fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('243', 'Wallis and Futuna', 'WF', 'WLF', '+05:00', 'fi fi-wf fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('244', 'Western Sahara', 'EH', 'ESH', '+05:00', 'fi fi-eh fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('245', 'Yemen', 'YE', 'YEM', '+05:00', 'fi fi-ye fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('246', 'Zambia', 'ZM', 'ZMB', '-04:00', 'fi fi-zm fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('247', 'Zimbabwe', 'ZW', 'ZWE', '+07:00', 'fi fi-zw fis', '2024-08-04 20:33:01', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `countries` VALUES ('248', 'Avis Gleason DDS', 'Inventore tempore dignissimos modi. Aut quidem magnam nostrum laudantium eligendi. Et aut perferendis sit neque praesentium et vitae.', 'Asperiores voluptatum et doloribus et. Qui eius necessitatibus modi molestias hic quisquam. Tempora voluptatem quis voluptates et. Ut quod voluptas fugiat in sed iure est.', 'Veritatis consequatur enim expedita non est enim. Consectetur dicta rerum voluptatum ut. In dignissimos nostrum consequatur assumenda mollitia. Vel sequi voluptas commodi aut eaque consectetur.', 'Eos laudantium non quia voluptates. Ullam accusantium velit ut provident. Sint et aspernatur qui officiis.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('249', 'Chaya Swaniawski', 'Nulla deleniti quos deleniti voluptas a. Sed non est adipisci sit consequatur repellendus omnis sint. Numquam doloribus iusto vel quia sit.', 'Molestias culpa ut nulla quis vitae et. Ea minus totam quis velit quae excepturi cupiditate aliquid. Aut provident sit quasi et repellendus eligendi. Sunt nulla sint et recusandae ex maiores.', 'Ea assumenda est facilis. Vero neque tempore aut saepe ea et. Voluptas reiciendis molestiae assumenda iure quis odio minima. Nulla unde ad sed numquam distinctio est. Exercitationem dolor quibusdam sed. Quia cum ipsa omnis accusamus et voluptatem.', 'Maxime commodi sit non recusandae ut quod. Nesciunt voluptatem ut sed omnis asperiores cum quaerat. Ullam nesciunt voluptatem cupiditate asperiores doloremque delectus.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('250', 'Lolita Krajcik IV', 'Facere quidem dolores voluptates sed voluptatem magnam accusamus. Sit optio neque tempora exercitationem corrupti. Enim rem quia sit molestiae vel et. Distinctio quasi quisquam omnis velit. Qui et molestiae cumque et. Explicabo labore iusto ut illo.', 'Dolorum vel quibusdam et quaerat exercitationem cum incidunt. Quam quia dolorem architecto temporibus aperiam. Totam placeat debitis et excepturi soluta accusamus. Laudantium dolorem asperiores velit minima.', 'Nihil et ipsam ex quaerat et pariatur inventore ab. Ex sunt tempora quo voluptatem. Nesciunt quia reprehenderit eius iste repellat expedita.', 'Et minus quae et sint occaecati dolores. Quia commodi repudiandae quos iste vel. Occaecati aperiam inventore voluptatem fugit quisquam aut inventore qui. Sint quas aperiam adipisci ut. Autem ut quaerat officia consequatur aliquid dolore odit.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('251', 'Zola White', 'Voluptatem rerum quod facere nihil vel. Doloribus corrupti labore qui. Ipsum architecto magni nihil dolorum cupiditate praesentium et tempore. Et ducimus voluptas doloremque sunt dolor sed. Qui maiores ex sed cum. Ea enim quaerat maxime.', 'Explicabo nesciunt nobis reprehenderit autem beatae. Et eius ut accusamus quos esse distinctio est. Aliquid commodi optio corporis inventore.', 'Minus reiciendis atque officiis saepe cumque error iure. Numquam et doloribus delectus quis ratione nulla tenetur. Sit cupiditate ab et culpa omnis adipisci perspiciatis est. Modi dolor excepturi cumque sunt quo.', 'Dolor enim itaque mollitia saepe est veniam. Delectus similique quam sit in. Quisquam mollitia ad earum tenetur magni et. Aliquid laborum dignissimos quidem consequatur eos. Nihil et et sapiente aut.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('252', 'Miracle Moen PhD', 'Possimus doloribus earum aut repellendus ut. Ut et a qui non ut doloribus sapiente. Error cupiditate qui quis numquam voluptatibus odio. Deleniti voluptatem molestiae vel qui.', 'Velit quisquam qui dolor error. Quia eaque eaque repudiandae ipsa ut explicabo provident ut. Maiores autem velit quia rerum repellat. Nemo minus ipsa architecto blanditiis illo pariatur.', 'Minima est iure eligendi aut incidunt quae ut non. Quos minima dolor consequatur quas reprehenderit quam. Eum aliquam nisi id earum soluta natus.', 'Inventore reiciendis dolorem ut maiores pariatur pariatur. Dicta aliquam quis earum aut ea et.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('253', 'Mr. Adelbert Lakin Sr.', 'Mollitia dolore at sint. Aspernatur sit fugit totam tempore. Adipisci nulla aut aut earum dicta porro. Expedita rerum culpa qui natus provident minus. Eius id accusantium ut facilis deleniti. Consectetur architecto non a optio officia harum laborum.', 'Consectetur suscipit voluptas debitis molestias. Earum est veritatis voluptatem qui. Nihil dolorum fugiat ab recusandae vel. Qui qui neque rem aspernatur.', 'Quia fuga nesciunt et quis voluptas unde suscipit facilis. Quo sit repellat quia et. Aperiam perspiciatis voluptas suscipit vero dolorem.', 'Error non autem ut ut facilis alias. Maiores aperiam est qui nobis. Velit soluta in illo rerum et aut. Rem a adipisci eaque blanditiis quia mollitia. Blanditiis ipsum quidem quae aut tempore praesentium.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('254', 'Thora Cruickshank', 'Beatae eveniet adipisci molestiae consectetur est. Natus vero eligendi voluptatem enim in. Quo explicabo dolor omnis perferendis. Nostrum repellat voluptatem provident iusto.', 'Nobis qui neque delectus non. Corrupti consequatur ut doloremque provident cum voluptatem. Id a et consectetur vel mollitia ut. Totam eum culpa est neque. Sit eius ut laboriosam consequatur architecto eos consequatur. Iure occaecati aperiam modi rerum.', 'Suscipit sit numquam rerum quo quis. Assumenda assumenda et aut.', 'Aut et cupiditate omnis aut reiciendis veritatis aperiam. Distinctio pariatur commodi quas ipsum magni ipsa deserunt qui. Sed at maiores quis qui similique ipsa sed. Aperiam incidunt laborum voluptas quia commodi consequatur porro.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('255', 'Prof. Daren McCullough II', 'Iste et voluptas modi odit unde id laboriosam qui. Aut veritatis maiores tempora qui aliquid itaque. Fugit neque nisi consequatur reiciendis provident. Voluptatibus necessitatibus officia sit quibusdam adipisci suscipit.', 'Voluptatem veniam enim blanditiis cumque tempora delectus voluptas. Libero est quibusdam sapiente debitis mollitia libero et dignissimos. Deleniti cupiditate et possimus aut commodi reiciendis.', 'Fugiat aspernatur est et qui eaque dolorum ipsum. Sit quo voluptatem et tempore non officia vel. Eaque excepturi occaecati voluptatem non eaque et earum. Occaecati tempora cumque debitis distinctio ratione. In vero beatae vero repellat.', 'Unde quae modi illum labore quos. Reiciendis officia sit explicabo cumque laboriosam. Voluptatem numquam cumque consequatur minus aut. Inventore laboriosam aut amet natus. Et in non placeat deleniti nam aut.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('256', 'Dr. Gayle Kuhic II', 'Aut et voluptatibus nobis et. Natus id voluptatem exercitationem consequatur unde. Facilis aliquid voluptates ut aut at a est. Rerum quo cupiditate quia voluptates.', 'Alias consequatur commodi vitae minima qui tempore. Beatae dolorum blanditiis commodi dolores aliquam. Quia tempora doloremque incidunt dolor quis exercitationem earum.', 'Sapiente est iure possimus et quod dignissimos deserunt. Modi molestiae dolores sapiente aut. Eum molestiae dolor ea fugiat. Quam eligendi amet eos quam est aut corrupti iste.', 'Dignissimos eaque omnis magnam voluptate quia ad asperiores. Assumenda ut nisi consequatur porro officiis et a. Quasi nobis suscipit delectus porro quis similique. Distinctio veniam sequi repellat. Est voluptatibus voluptates qui.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('257', 'Riley Mosciski', 'Sint unde officia delectus ducimus nostrum alias deleniti qui. Voluptatem adipisci amet nam eligendi suscipit quibusdam. Temporibus aut tempora nobis eligendi a. Tempora explicabo placeat quibusdam dolores autem eum omnis consequuntur.', 'Est aut officia minima ullam amet. Ad et et assumenda magnam. Laborum facilis fugit quam dolor dolorum. Nihil facere eum ut. Facilis voluptatem rerum nihil iusto dolores. Rem corrupti officiis eveniet sunt.', 'Deleniti sit cupiditate sunt sit sunt. Iste numquam illum earum est accusantium. Voluptatem sint cupiditate culpa voluptatem officiis iure. Maxime fuga asperiores aut dolorum a qui. Aut nesciunt ab rerum quo sit cupiditate.', 'Assumenda doloremque dolores voluptas sit sapiente aut velit maiores. Adipisci perspiciatis veritatis quaerat aut soluta minima labore quas. Ut sint numquam voluptas quibusdam nihil nihil incidunt.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('258', 'Mr. Devon Upton', 'Quis in laudantium fugiat architecto rem enim commodi. Ut beatae quod magni est. Qui et et totam non magni sunt in. Deserunt aut nesciunt dignissimos quas consequatur enim.', 'Non eligendi harum exercitationem doloribus suscipit perspiciatis. Magnam et exercitationem rem et et rerum cupiditate. Nesciunt consequuntur explicabo consectetur velit. Id molestiae eum vero quia qui incidunt.', 'Doloremque id molestiae sed. Rerum quia qui quos odio quia eos reprehenderit quasi. Cupiditate expedita tempora occaecati repellendus tempora accusamus. In adipisci officia nam omnis occaecati. Eum et ipsa dolores dolorem eius ipsum dignissimos.', 'Iure ducimus voluptatem quia sunt impedit adipisci est. In ut consequuntur et qui. Animi ex ea reprehenderit perspiciatis quos ut. Repellendus illum aut qui dolores nisi.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('259', 'Merritt Anderson', 'Error illo voluptatem fugiat animi. Labore et illo ut et possimus unde numquam. Aperiam voluptatem velit accusamus. Labore fugit necessitatibus rerum quam debitis.', 'Fuga harum excepturi pariatur deleniti possimus dolor. Dolorem aliquam necessitatibus nisi. Eveniet qui iusto tenetur ut reiciendis autem suscipit.', 'Veritatis eligendi veniam repudiandae id minima eos itaque voluptatem. Eaque perspiciatis similique omnis sit architecto sed enim molestiae. Omnis quia incidunt distinctio commodi adipisci autem voluptatem. Sed magnam necessitatibus qui.', 'Voluptatem sed adipisci voluptas asperiores vero dignissimos dolor et. Veritatis corrupti officiis aliquid cum. Eos totam quaerat fuga vel vel doloribus. Quia omnis soluta sed aut vitae quia.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('260', 'Dr. Deron Prosacco', 'Quia unde odit qui qui officia libero delectus eius. Porro voluptatem alias aut eligendi. Quasi tempore qui rerum quos est laboriosam quod. At voluptatum sequi assumenda error voluptatem sunt. Dolor esse neque et magni. Eligendi ut quia officiis tempore.', 'Tenetur sit earum optio dolorem. Libero non ut a sed. Qui quas inventore nostrum delectus et praesentium est. Quos est exercitationem dolorum occaecati impedit et non.', 'Impedit et est et provident illo beatae nostrum. Veritatis dolores non rerum eos est. Ut iusto quo eos a et. Et et voluptas voluptas.', 'Magnam est officiis ullam molestiae. Quae omnis ea architecto rerum. Eaque maxime porro tempore. A aliquam delectus autem officia quidem ex.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('261', 'Mrs. Mafalda Stroman', 'Qui dignissimos quis nostrum voluptatibus quia nihil dolores. Aliquam quis numquam et ullam. Natus rem a ad corporis tempora iste. Quos sed et fugiat voluptas. Qui eum sed quis temporibus sunt voluptatum. Ab praesentium eos excepturi deleniti nostrum in.', 'Sed consequuntur molestiae sit sint veniam. Consequatur cum nostrum minus doloremque cum dolorem et ex. Delectus voluptas aut facere non alias aliquid dolorem. Reprehenderit deleniti nam similique autem qui.', 'Est molestiae inventore ipsa culpa in. Doloribus eligendi voluptas est at totam eligendi ducimus. Perferendis consequatur est repellendus eos aut molestias. Animi voluptas dolor fugiat ea doloremque sunt ex adipisci.', 'Exercitationem esse ipsa est impedit aspernatur nam. Minima et fugiat ipsam aut commodi deleniti enim. Quo ullam aut autem sed. Totam hic non quidem repellat sed rerum provident.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `countries` VALUES ('262', 'Maud Ortiz', 'Nobis enim assumenda error sit cupiditate assumenda similique esse. Aut officiis accusantium architecto recusandae quidem aut sit. Animi consequatur est illum voluptates optio distinctio. Dignissimos alias nihil eveniet velit dicta fugit.', 'Ad dolor qui ex et fugit ab. Hic voluptate sint quia dicta. Nostrum consequatur et occaecati labore in et.', 'Corrupti fugiat doloremque beatae maxime earum non. Omnis aut reprehenderit nihil. Eum qui quisquam distinctio quod est recusandae. Harum sint perferendis ut veritatis illo nam. Consectetur incidunt qui illum et.', 'Nihil accusantium velit corporis cum et. Eos ab velit occaecati aut qui. Delectus animi ut voluptatem ut ipsam. Qui incidunt voluptatem repudiandae et ea ratione neque.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);

-- ----------------------------
-- Table structure for currencies
-- ----------------------------
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `acronym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_acronym_unique` (`acronym`),
  KEY `currencies_acronym_index` (`acronym`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES ('1', 'ARS', 'PESO ARGENTINO', '$', '1', 'fi fi-ar fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('2', 'BOB', 'BOLIVIANO', 'Bs', '2', 'fi fi-bo fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('3', 'BRL', 'REAL BRASILEÑO', '$', '3', 'fi fi-br fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('4', 'CAD', 'DÓLAR CANADIENSE', '$', '4', 'fi fi-ca fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('5', 'CLP', 'PESO CHILENO', '$', '5', 'fi fi-cl fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('6', 'COP', 'PESO COLOMBIANO', '$', '6', 'fi fi-co fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('7', 'CRC', 'COLÓN COSTARRICENSE', '₡', '7', 'fi fi-cr fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('8', 'CUP', 'PESO CUBANO', '$', '8', 'fi fi-cu fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('9', 'DOP', 'PESO DOMINICANO', '$', '9', 'fi fi-do fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('10', 'EUR', 'EURO', '€', '10', 'fi fi-eu fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('11', 'GBP', 'LIBRA ESTERLINA', '£', '11', 'fi fi-gb fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('12', 'GTQ', 'QUETZAL GUATEMALTECO', 'Q', '12', 'fi fi-gt fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('13', 'HNL', 'LEMPIRA HONDUREÑO', 'L', '13', 'fi fi-hn fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('14', 'HTG', 'GOURDE HAITIANO', 'G', '14', 'fi fi-ht fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('15', 'MXN', 'PESO MEXICANO', '$', '15', 'fi fi-mx fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('16', 'PAB', 'BALBOA PANAMEÑO', 'B', '16', 'fi fi-pa fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('17', 'PEN', 'SOL PERUANO', 'S/', '17', 'fi fi-pe fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('18', 'PYG', 'GUARANÍ PARAGUAYO', '₲', '18', 'fi fi-py fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('19', 'SVC', 'COLON SALVADOREÑO', '₡', '19', 'fi fi-sv fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('20', 'USD', 'DÓLAR AMERICANO', '$', '20', 'fi fi-us fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('21', 'UYU', 'PESO URUGUAYO', 'U', '21', 'fi fi-uy fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);
INSERT INTO `currencies` VALUES ('22', 'VEF', 'BOLIVAR VENEZOLANO', 'Bs', '22', 'fi fi-ve fis', '2024-08-04 20:33:00', '2024-08-04 20:33:00', null);

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned NOT NULL,
  `identification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge_id` bigint(20) unsigned DEFAULT NULL,
  `area_id` bigint(20) unsigned DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hiring_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_identification_unique` (`identification`),
  KEY `employees_identification_index` (`identification`),
  KEY `employees_company_id_foreign` (`company_id`),
  KEY `employees_charge_id_foreign` (`charge_id`),
  KEY `employees_area_id_foreign` (`area_id`),
  CONSTRAINT `employees_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_charge_id_foreign` FOREIGN KEY (`charge_id`) REFERENCES `charges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('1', '1', '20592348632', 'Pansy Pouros I', 'Leannon', '1', '1', '+1-628-304-0104', '930-661-8018', 'thompson.reggie@murphy.com', '1970-09-02', '1993-07-19', '1990-08-01', 'Est temporibus dolores eos et quo maiores sit quia est et exercitationem at corporis et voluptatem.', 'Nam fuga qui omnis. Quia dicta at commodi. Laudantium laboriosam ut asperiores dolorem quo ut doloribus. Laudantium dolores veritatis fugiat et.', null, '2024-08-04 20:32:57', '2024-08-04 20:32:57', null);
INSERT INTO `employees` VALUES ('2', '1', '01239639331', 'Adelle Collier', 'Koepp', '2', '2', '838.596.6396', '+1 (580) 983-8569', 'lila34@kuhic.biz', '2006-11-14', '1993-09-12', '1973-08-02', 'Quasi impedit quos in esse voluptatem et asperiores itaque cum quia fugit adipisci qui.', 'Quia nostrum et qui quia. Impedit a qui atque quaerat rerum. Ut vel omnis dolor.', null, '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `employees` VALUES ('3', '1', '87492981021', 'Virginie Cronin', 'Volkman', '3', '3', '1-618-440-2372', '+14309916859', 'justina24@gmail.com', '1998-11-19', '1977-10-25', '2007-04-20', 'Qui repellendus et molestiae corrupti omnis aut debitis nostrum qui nesciunt id officia repellat quidem quis.', 'Et sint sed facere omnis ipsa dicta beatae et. Deserunt sed est eum nulla fugit suscipit quod. Autem mollitia quis id non dolor deserunt.', null, '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `employees` VALUES ('4', '1', '52778829056', 'Precious Bauch', 'Konopelski', '9', '9', '+15317183750', '1-276-818-3876', 'little.margarette@schimmel.com', '2014-02-14', '1974-09-05', '2019-10-24', 'Nisi sed asperiores magnam amet laudantium nobis veritatis ut nostrum dolorem itaque et quia est accusantium earum voluptas provident odio praesentium.', 'Sit quos iste est non modi sed. Perferendis temporibus consequatur doloribus consequuntur repudiandae eius. Culpa tempora cum qui fugit quae. Aspernatur ea neque deleniti ut.', null, '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `employees` VALUES ('5', '1', '22052881153', 'Taylor Walter Jr.', 'Lang', '10', '10', '201.739.2119', '(878) 592-5036', 'heber60@stark.info', '1995-03-09', '2020-02-12', '1989-05-21', 'Ea fugiat voluptas odio omnis incidunt dolorem vel et voluptatem voluptatum culpa provident numquam ratione voluptatibus quisquam laudantium minima similique modi.', 'Esse vel esse nesciunt consequatur dicta. Est ex possimus totam explicabo. Maiores quisquam in quia est. Iure aliquam veritatis quo. Qui qui repellendus et. Architecto deleniti sequi veritatis minima quia nemo.', null, '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `employees` VALUES ('6', '1', '34381308852', 'Dr. Merritt Barton III', 'Luettgen', '11', '11', '251-522-1897', '747-343-5544', 'millie74@jaskolski.biz', '1975-06-22', '2004-11-15', '1982-07-18', 'Aut libero eum ut vero ut expedita cum rerum dicta sapiente corrupti consequatur sint quibusdam.', 'Non voluptate tempora sed cupiditate quia harum. Quidem suscipit sequi provident consequatur. In explicabo laboriosam quaerat quia est et placeat.', null, '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `employees` VALUES ('7', '1', '48201895161', 'Meggie Yundt', 'Schuster', '12', '12', '1-559-317-8671', '1-940-885-1250', 'vada.douglas@yahoo.com', '1989-02-15', '1988-06-22', '1994-01-27', 'Ea consequuntur quod at harum architecto ea dignissimos provident voluptates esse quis rerum deleniti ipsa voluptate ducimus.', 'Fuga hic architecto quibusdam doloremque eligendi vero. Corporis quia occaecati eaque ea. Placeat velit est sed.', null, '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `employees` VALUES ('8', '1', '61782132037', 'Ruthe Lind', 'Dooley', '13', '13', '+1-401-668-0783', '323-894-5994', 'bkreiger@yahoo.com', '1975-05-09', '2020-08-29', '2021-08-04', 'Omnis neque quisquam at est est possimus numquam voluptas enim tenetur dolores adipisci ducimus repudiandae.', 'Illo labore quidem non et dolores et architecto ut. Commodi amet labore ut cum. Doloribus aut et neque. Excepturi iure nobis iusto libero natus omnis dolorem. Quam beatae debitis sit veritatis incidunt ea.', null, '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `employees` VALUES ('9', '1', '71839647196', 'Caleigh Welch', 'Thiel', '14', '14', '+1-484-506-9145', '847.381.1197', 'alan.dare@nikolaus.com', '2022-02-21', '2008-04-02', '2022-01-22', 'Repudiandae doloribus qui eum sunt atque voluptatem itaque sequi praesentium et inventore eum suscipit.', 'Provident ea quo aut. In voluptas aut quae ut consequatur non. Dolor veritatis inventore commodi qui debitis consectetur voluptates. Omnis repellendus dolore laudantium possimus.', null, '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `employees` VALUES ('10', '1', '60878822287', 'Dr. Thelma Gutmann PhD', 'Wyman', '15', '15', '+1.534.802.5099', '575-421-9201', 'marvin76@gmail.com', '1976-12-06', '1988-02-02', '2023-12-27', 'Et sint quisquam dolores autem nulla nobis ut exercitationem quasi est velit deserunt blanditiis qui non sed incidunt velit neque.', 'Quae deleniti eos numquam voluptas dolorem qui quo illum. Eaque id exercitationem pariatur tempora laborum debitis. Adipisci porro est non commodi nobis alias.', null, '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `employees` VALUES ('11', '1', '67318627371', 'Mrs. Aniyah Orn', 'Mills', '16', '16', '1-541-759-9972', '480-238-4423', 'tframi@mcglynn.info', '1993-10-28', '2010-09-10', '2003-09-09', 'Voluptas aut eum velit reprehenderit molestiae modi deleniti itaque architecto impedit rerum laudantium corporis fugiat explicabo.', 'Dignissimos vero consectetur alias possimus. Quasi a eos ea amet laborum at sit. Expedita sunt doloribus iure qui consequuntur. Aut non non ipsum repudiandae. Ducimus et rerum saepe atque.', null, '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `employees` VALUES ('12', '1', '07340999215', 'Ivy King MD', 'Reichert', '17', '17', '+1 (580) 985-8765', '+1 (213) 400-6043', 'rickie.emard@hotmail.com', '1993-06-20', '1998-10-25', '2011-01-17', 'Sit eveniet tempora quibusdam ut necessitatibus numquam fuga et voluptate dolor et id deserunt amet commodi sed quia praesentium.', 'Quis sed consequatur laborum dolor cumque et. Accusantium ea soluta similique quia nam qui. Ut consequatur ut laboriosam et sunt aut nihil voluptatem. Consequuntur et asperiores facere omnis.', null, '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);
INSERT INTO `employees` VALUES ('13', '1', '95228581581', 'Enid Koepp PhD', 'Satterfield', '18', '18', '+1.580.956.1016', '1-352-386-8601', 'hkuphal@gmail.com', '2021-03-01', '2005-07-11', '1993-04-14', 'Similique laborum eos reprehenderit consequatur tenetur nostrum nam esse ex tempore aspernatur porro possimus ea dolorem ut eos quo dolorem.', 'Et facere repellendus delectus debitis. Rerum rerum omnis dignissimos consequatur qui itaque. Quos rem officiis eveniet quia sit ratione veniam. Ipsa veritatis aliquam itaque eaque.', null, '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);

-- ----------------------------
-- Table structure for employee_work_group
-- ----------------------------
DROP TABLE IF EXISTS `employee_work_group`;
CREATE TABLE `employee_work_group` (
  `employee_id` bigint(20) unsigned NOT NULL,
  `work_group_id` bigint(20) unsigned NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `employee_work_group_employee_id_foreign` (`employee_id`),
  KEY `employee_work_group_work_group_id_foreign` (`work_group_id`),
  CONSTRAINT `employee_work_group_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_work_group_work_group_id_foreign` FOREIGN KEY (`work_group_id`) REFERENCES `work_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of employee_work_group
-- ----------------------------

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participants` json DEFAULT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '0',
  `repeat` enum('Evento de una sola vez','Diariamente','Semanalmente (mismo dia próxima semana)','Mensualmente (misma fecha)','Anualmente') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Evento de una sola vez',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES ('1', 'Rex Considine', '2011-02-14', 'Provident maxime aspernatur tenetur reiciendis quia enim ut. Odio inventore vel dolorem porro ut. Et sint aperiam quis rerum numquam dicta laborum. Quo totam voluptatem rerum eos. Voluptatem nemo voluptate praesentium voluptates.', 'Quae laborum assumenda magnam doloremque explicabo. Labore quidem molestiae accusamus est ratione eum quae. Quibusdam sequi ipsa libero et rerum ratione deleniti.', 'Ut consequatur magni a molestias ab omnis voluptates consequatur in officiis et tempora incidunt.', 'Expedita sequi ea et nemo necessitatibus ipsa. Fugit maiores illum tempore culpa quo.', '[]', '0', 'Evento de una sola vez', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `events` VALUES ('2', 'Delfina O\'Hara', '2014-07-11', 'Atque temporibus eius molestias voluptatem occaecati et dolor. Error quia dolor non explicabo cupiditate quidem soluta. Quae consectetur necessitatibus velit. Qui hic dicta rerum quaerat beatae ut natus.', 'Laborum optio accusamus magni doloremque. Tempora nesciunt ea est distinctio magni architecto. Eligendi eos voluptas ut accusamus praesentium.', 'Commodi et quas ut eaque at consequatur aperiam repudiandae porro culpa ipsam corporis tenetur pariatur quia quo ut fugit eveniet.', 'Enim odit similique voluptate optio nisi tempora molestias. Fugiat quasi commodi et exercitationem eveniet vero et. Rerum dicta iure est.', '[]', '0', 'Evento de una sola vez', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `events` VALUES ('3', 'Eldred Koepp PhD', '2022-12-16', 'Repellendus ab repellendus odio. Molestiae ut odit porro est. Minus enim et quod eos aut repellendus. Temporibus fugit nam et sunt. Dicta autem molestias sunt aut sed eum. Cupiditate non officiis placeat possimus.', 'Est qui eum consequuntur iure. Debitis alias accusamus et doloremque eius dolorem. Aut ipsum est et veniam exercitationem reiciendis. Nihil commodi est quis beatae non molestiae.', 'Earum ea eveniet porro qui sed et minima est sunt sed omnis sapiente.', 'Vero aut rem omnis consequatur alias doloribus dicta quibusdam. Quae magni sapiente sint vitae eum id non. Atque aliquid accusamus corporis corrupti consectetur perspiciatis est minima.', '[]', '1', 'Evento de una sola vez', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `events` VALUES ('4', 'Rashawn Shields', '2005-01-31', 'Reiciendis dolore veritatis reprehenderit excepturi consequatur odit possimus est. Ut quis sed et hic nam earum ea. Facere consequuntur eveniet eos omnis distinctio eos. Totam tempore fugiat sapiente qui.', 'Eaque ab adipisci doloremque. Quis occaecati ex quis omnis non esse aut corporis. Et repellat aut quis. Quia ad odio aut debitis voluptate culpa sit.', 'Accusamus deserunt deserunt dolorem sapiente earum eum quo ea velit error aliquid voluptatum animi temporibus modi impedit quisquam.', 'Soluta dolores ut a voluptas eius minus. Impedit optio et sit alias sit. Deleniti labore nihil possimus sit ipsa ex. Reiciendis iste eum quas aperiam nemo qui omnis. Dolorem eaque et illum consectetur quaerat ut nostrum. Minus eum sed sed distinctio vel.', '[]', '1', 'Evento de una sola vez', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `events` VALUES ('5', 'Polly Quigley', '2018-02-21', 'Rerum eius eum sit repellat rerum magnam ut. Eos quis voluptates qui quia tempora ducimus ut distinctio. Sit quis nisi quia cupiditate illum. Magni nisi nam itaque quis. Eum aliquid natus a ducimus voluptatibus molestiae.', 'Saepe quas quia rerum sint blanditiis omnis quam. Cumque occaecati explicabo veniam ipsam vero dolorum ullam.', 'Nesciunt expedita inventore neque quia quam possimus rerum earum tempora.', 'Id aperiam quisquam illo nemo aut veritatis exercitationem. In perferendis tempora quaerat unde vero. Ea soluta hic corrupti voluptas rerum expedita qui.', '[]', '0', 'Evento de una sola vez', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=603 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('560', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('561', '2014_10_12_100000_create_password_reset_tokens_table', '1');
INSERT INTO `migrations` VALUES ('562', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('563', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('564', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('565', '2024_08_02_000001_create_ad_types_table', '1');
INSERT INTO `migrations` VALUES ('566', '2024_08_02_000002_create_announcements_table', '1');
INSERT INTO `migrations` VALUES ('567', '2024_08_02_000003_create_areas_table', '1');
INSERT INTO `migrations` VALUES ('568', '2024_08_02_000004_create_area_process_table', '1');
INSERT INTO `migrations` VALUES ('569', '2024_08_02_000005_create_charges_table', '1');
INSERT INTO `migrations` VALUES ('570', '2024_08_02_000006_create_companies_table', '1');
INSERT INTO `migrations` VALUES ('571', '2024_08_02_000007_create_employees_table', '1');
INSERT INTO `migrations` VALUES ('572', '2024_08_02_000008_create_employee_work_group_table', '1');
INSERT INTO `migrations` VALUES ('573', '2024_08_02_000009_create_events_table', '1');
INSERT INTO `migrations` VALUES ('574', '2024_08_02_000010_create_processes_table', '1');
INSERT INTO `migrations` VALUES ('575', '2024_08_02_000011_create_process_files_table', '1');
INSERT INTO `migrations` VALUES ('576', '2024_08_02_000012_create_process_file_statuses_table', '1');
INSERT INTO `migrations` VALUES ('577', '2024_08_02_000013_create_process_types_table', '1');
INSERT INTO `migrations` VALUES ('578', '2024_08_02_000014_create_settings_table', '1');
INSERT INTO `migrations` VALUES ('579', '2024_08_02_000015_create_work_groups_table', '1');
INSERT INTO `migrations` VALUES ('580', '2024_08_02_000016_create_app_sections_table', '1');
INSERT INTO `migrations` VALUES ('581', '2024_08_02_000017_create_articles_table', '1');
INSERT INTO `migrations` VALUES ('582', '2024_08_02_000018_create_other_apps_table', '1');
INSERT INTO `migrations` VALUES ('583', '2024_08_02_000019_create_phrases_table', '1');
INSERT INTO `migrations` VALUES ('584', '2024_08_02_000020_create_phrase_categories_table', '1');
INSERT INTO `migrations` VALUES ('585', '2024_08_02_000021_create_addresses_table', '1');
INSERT INTO `migrations` VALUES ('586', '2024_08_02_000022_create_cities_table', '1');
INSERT INTO `migrations` VALUES ('587', '2024_08_02_000023_create_countries_table', '1');
INSERT INTO `migrations` VALUES ('588', '2024_08_02_000024_create_townships_table', '1');
INSERT INTO `migrations` VALUES ('589', '2024_08_02_000025_create_currencies_table', '1');
INSERT INTO `migrations` VALUES ('590', '2024_08_02_009001_add_foreigns_to_announcements_table', '1');
INSERT INTO `migrations` VALUES ('591', '2024_08_02_009002_add_foreigns_to_area_process_table', '1');
INSERT INTO `migrations` VALUES ('592', '2024_08_02_009003_add_foreigns_to_employees_table', '1');
INSERT INTO `migrations` VALUES ('593', '2024_08_02_009004_add_foreigns_to_employee_work_group_table', '1');
INSERT INTO `migrations` VALUES ('594', '2024_08_02_009005_add_foreigns_to_processes_table', '1');
INSERT INTO `migrations` VALUES ('595', '2024_08_02_009006_add_foreigns_to_process_files_table', '1');
INSERT INTO `migrations` VALUES ('596', '2024_08_02_009007_add_foreigns_to_articles_table', '1');
INSERT INTO `migrations` VALUES ('597', '2024_08_02_009008_add_foreigns_to_phrases_table', '1');
INSERT INTO `migrations` VALUES ('598', '2024_08_02_009009_add_foreigns_to_users_table', '1');
INSERT INTO `migrations` VALUES ('599', '2024_08_02_009010_add_foreigns_to_addresses_table', '1');
INSERT INTO `migrations` VALUES ('600', '2024_08_02_009011_add_foreigns_to_cities_table', '1');
INSERT INTO `migrations` VALUES ('601', '2024_08_02_009012_add_foreigns_to_townships_table', '1');
INSERT INTO `migrations` VALUES ('602', '2024_08_03_051526_create_permission_tables', '1');

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('2', 'App\\Models\\User', '1');

-- ----------------------------
-- Table structure for other_apps
-- ----------------------------
DROP TABLE IF EXISTS `other_apps`;
CREATE TABLE `other_apps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` enum('site','aplication') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `other_apps_name_unique` (`name`),
  KEY `other_apps_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of other_apps
-- ----------------------------
INSERT INTO `other_apps` VALUES ('1', 'Banco Central de Cuba', 'BCC', 'https://www.bc.gob.cu/', null, 'public/XAeH3vNqvBNYtAJvvr76I85JmtWkOPwsn6n4HVKh.png', null, 'site', null, '2024-08-07 02:40:36', null);
INSERT INTO `other_apps` VALUES ('2', 'Banco Internacional de Comercio S.A.', 'BICSA', 'http://www.bicsa.co.cu/', null, 'public/0pO9BLw3ry6sEieJBrp6eLAdCBc9a1gokU4y6CGd.jpg', null, 'site', null, '2024-08-07 02:41:57', null);
INSERT INTO `other_apps` VALUES ('3', 'Presidencia', 'Presidencia', 'https://www.presidencia.gob.cu/es/', null, 'public/dt2WGnBJuxvK4PaU4bGlyTw5oGcMSLbNJvNBFuNA.png', null, 'site', null, '2024-08-07 02:43:19', null);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'list addresses', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('2', 'view addresses', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('3', 'create addresses', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('4', 'update addresses', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('5', 'delete addresses', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('6', 'list adtypes', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('7', 'view adtypes', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('8', 'create adtypes', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('9', 'update adtypes', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('10', 'delete adtypes', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('11', 'list announcements', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('12', 'view announcements', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('13', 'create announcements', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('14', 'update announcements', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('15', 'delete announcements', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('16', 'list appsections', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('17', 'view appsections', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('18', 'create appsections', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('19', 'update appsections', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('20', 'delete appsections', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('21', 'list areas', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('22', 'view areas', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('23', 'create areas', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('24', 'update areas', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('25', 'delete areas', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('26', 'list articles', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('27', 'view articles', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('28', 'create articles', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('29', 'update articles', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('30', 'delete articles', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('31', 'list charges', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('32', 'view charges', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('33', 'create charges', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('34', 'update charges', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('35', 'delete charges', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('36', 'list cities', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('37', 'view cities', 'web', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `permissions` VALUES ('38', 'create cities', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('39', 'update cities', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('40', 'delete cities', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('41', 'list companies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('42', 'view companies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('43', 'create companies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('44', 'update companies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('45', 'delete companies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('46', 'list countries', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('47', 'view countries', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('48', 'create countries', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('49', 'update countries', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('50', 'delete countries', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('51', 'list currencies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('52', 'view currencies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('53', 'create currencies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('54', 'update currencies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('55', 'delete currencies', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('56', 'list employees', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('57', 'view employees', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('58', 'create employees', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('59', 'update employees', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('60', 'delete employees', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('61', 'list events', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('62', 'view events', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('63', 'create events', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('64', 'update events', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('65', 'delete events', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('66', 'list otherapps', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('67', 'view otherapps', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('68', 'create otherapps', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('69', 'update otherapps', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('70', 'delete otherapps', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('71', 'list phrases', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('72', 'view phrases', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('73', 'create phrases', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('74', 'update phrases', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('75', 'delete phrases', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('76', 'list phrasecategories', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('77', 'view phrasecategories', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('78', 'create phrasecategories', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('79', 'update phrasecategories', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('80', 'delete phrasecategories', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('81', 'list processes', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('82', 'view processes', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('83', 'create processes', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('84', 'update processes', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('85', 'delete processes', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('86', 'list processfiles', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('87', 'view processfiles', 'web', '2024-08-04 20:32:58', '2024-08-04 20:32:58');
INSERT INTO `permissions` VALUES ('88', 'create processfiles', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('89', 'update processfiles', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('90', 'delete processfiles', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('91', 'list processfilestatuses', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('92', 'view processfilestatuses', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('93', 'create processfilestatuses', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('94', 'update processfilestatuses', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('95', 'delete processfilestatuses', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('96', 'list processtypes', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('97', 'view processtypes', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('98', 'create processtypes', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('99', 'update processtypes', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('100', 'delete processtypes', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('101', 'list allsettings', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('102', 'view allsettings', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('103', 'create allsettings', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('104', 'update allsettings', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('105', 'delete allsettings', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('106', 'list townships', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('107', 'view townships', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('108', 'create townships', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('109', 'update townships', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('110', 'delete townships', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('111', 'list workgroups', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('112', 'view workgroups', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('113', 'create workgroups', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('114', 'update workgroups', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('115', 'delete workgroups', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('116', 'list roles', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('117', 'view roles', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('118', 'create roles', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('119', 'update roles', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `permissions` VALUES ('120', 'delete roles', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('121', 'list permissions', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('122', 'view permissions', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('123', 'create permissions', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('124', 'update permissions', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('125', 'delete permissions', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('126', 'list users', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('127', 'view users', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('128', 'create users', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('129', 'update users', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');
INSERT INTO `permissions` VALUES ('130', 'delete users', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for phrases
-- ----------------------------
DROP TABLE IF EXISTS `phrases`;
CREATE TABLE `phrases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phrase_category_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phrases_phrase_category_id_foreign` (`phrase_category_id`),
  CONSTRAINT `phrases_phrase_category_id_foreign` FOREIGN KEY (`phrase_category_id`) REFERENCES `phrase_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of phrases
-- ----------------------------
INSERT INTO `phrases` VALUES ('1', 'La vida es un sueño, y los sueños, sueños son.', 'Calderón de la Barca', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('2', 'El que no arriesga no gana.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('3', 'La esperanza es lo último que se pierde.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('4', 'El amor es un arte que se aprende.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('5', 'La música es el lenguaje del alma.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('6', 'La risa es el sol que ahuyenta el invierno.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('7', 'No hay mal que dure cien años.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('8', 'La vida es un viaje, no un destino.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('9', 'El que tiene fe, tiene esperanza.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('10', 'La amistad es un tesoro invaluable.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('11', 'El tiempo lo cura todo.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('12', 'Cuba es un paraíso en el Caribe.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('13', 'El amor no tiene fronteras.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('14', 'La libertad es el bien más preciado.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('15', 'Cada día es una nueva oportunidad.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('16', 'La familia es el pilar de la sociedad.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('17', 'El conocimiento es poder.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('18', 'La unión hace la fuerza.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('19', 'La vida es corta, pero ancha.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('20', 'La paciencia es la madre de la ciencia.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('21', 'El respeto es la base de toda relación.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('22', 'El futuro pertenece a quienes creen en la belleza de sus sueños.', 'Eleanor Roosevelt', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('23', 'La alegría compartida es doble alegría.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('24', 'El amor es la respuesta, aunque a veces no sepa la pregunta.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('25', 'La vida es un regalo, disfrútalo.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('26', 'El corazón tiene razones que la razón no entiende.', 'Pascal', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('27', 'La creatividad es la inteligencia divirtiéndose.', 'Albert Einstein', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('28', 'La esperanza es el sueño del hombre despierto.', 'Aristóteles', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('29', 'La vida es un espejo y te devuelve lo que das.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('30', 'El verdadero viaje de descubrimiento no consiste en buscar nuevos paisajes, sino en tener nuevos ojos.', 'Marcel Proust', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('31', 'La felicidad no es un destino, es una forma de viajar.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('32', 'El amor es la fuerza más poderosa del universo.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('33', 'La vida es como una bicicleta, para mantener el equilibrio, debes seguir adelante.', 'Albert Einstein', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('34', 'La sabiduría comienza en la reflexión.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('35', 'El pasado es un lugar de referencia, no un lugar de residencia.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('36', 'La vida es un desafío, enfréntalo.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('37', 'La pasión es la energía que te impulsa.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('38', 'La vida es un 10% lo que te sucede y un 90% cómo reaccionas.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('39', 'La música puede cambiar el mundo porque puede cambiar a las personas.', 'Bono', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('40', 'El éxito es la suma de pequeños esfuerzos repetidos día tras día.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('41', 'La vida es un juego, y hay que jugarlo con alegría.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('42', 'El amor es la poesía de los sentidos.', 'Honoré de Balzac', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('43', 'La vida es una aventura, atrévete a vivirla.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('44', 'El cambio es el proceso mediante el cual el futuro invade nuestras vidas.', 'Alvin Toffler', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('45', 'La gratitud es la memoria del corazón.', 'Jean Baptiste Massieu', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('46', 'La vida es un eco, lo que envías regresa.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('47', 'El optimismo es la fe que conduce al logro.', 'Helen Keller', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('48', 'La vida es un lienzo en blanco, y tú eres el artista.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('49', 'La felicidad es un estado mental.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('50', 'El tiempo es oro.', 'Anónimo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('51', 'La vida es como un libro, y aquellos que no viajan leen solo una página.', 'Agustine of Hippo', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('52', 'La mente es como un paracaídas, solo funciona si se abre.', 'Albert Einstein', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('53', 'El éxito no es la clave de la felicidad. La felicidad es la clave del éxito.', 'Albert Schweitzer', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('54', 'La vida es corta, pero el arte es eterno.', 'Hipócrates', null, null, null, null, null);
INSERT INTO `phrases` VALUES ('55', 'El dolor es temporal, la gloria es para siempre.', 'Anónimo', null, null, null, null, null);

-- ----------------------------
-- Table structure for phrase_categories
-- ----------------------------
DROP TABLE IF EXISTS `phrase_categories`;
CREATE TABLE `phrase_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of phrase_categories
-- ----------------------------
INSERT INTO `phrase_categories` VALUES ('1', 'Políticas', 'Optio quasi adipisci quia libero labore voluptatem aut soluta aut debitis saepe molestias quaerat voluptatem qui deserunt debitis.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `phrase_categories` VALUES ('2', 'Culturales', 'Et nihil voluptatem nisi nisi sequi eaque quia amet ipsa autem quisquam.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `phrase_categories` VALUES ('3', 'Financieras', 'Enim eum dicta quaerat accusamus esse porro blanditiis id et quae a maxime explicabo corrupti.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `phrase_categories` VALUES ('4', 'Día de la Mujer', 'Voluptate dolor ut nesciunt nobis perferendis atque animi itaque nesciunt suscipit ex perspiciatis ullam officia accusamus.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `phrase_categories` VALUES ('5', 'Cubanas', 'Et itaque consequatur dignissimos ea eum voluptates praesentium id quia possimus nihil quo eius et.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);

-- ----------------------------
-- Table structure for processes
-- ----------------------------
DROP TABLE IF EXISTS `processes`;
CREATE TABLE `processes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `process_type_id` bigint(20) unsigned NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `processes_code_unique` (`code`),
  UNIQUE KEY `processes_name_unique` (`name`),
  KEY `processes_code_index` (`code`),
  KEY `processes_name_index` (`name`),
  KEY `processes_process_type_id_foreign` (`process_type_id`),
  CONSTRAINT `processes_process_type_id_foreign` FOREIGN KEY (`process_type_id`) REFERENCES `process_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of processes
-- ----------------------------
INSERT INTO `processes` VALUES ('1', 'Mollitia totam ut officia occaecati molestiae nesciunt. Magni atque odio officia in animi. Omnis architecto aspernatur et voluptatem voluptatem molestiae non dicta.', 'Niko McClure', 'Necessitatibus aut et voluptatem iusto assumenda mollitia aspernatur architecto quia deleniti autem adipisci.', '1', '160', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `processes` VALUES ('2', 'Ut enim quibusdam vitae dolor iure labore quia. Nostrum omnis qui voluptas et voluptatem. Qui et expedita minima nam adipisci perferendis delectus.', 'Prof. Virginia Murphy II', 'Quibusdam quis et sed voluptate necessitatibus aut mollitia laboriosam at nulla enim accusantium et velit impedit cum.', '2', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `processes` VALUES ('3', 'Saepe mollitia hic in enim facilis voluptatum ut. Rerum maxime voluptatem sit eveniet ut. Explicabo cupiditate error eum omnis repudiandae illo.', 'Jean Howell', 'Odit laudantium ullam enim blanditiis similique doloremque reprehenderit mollitia aut harum sit sed.', '3', '78951591', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `processes` VALUES ('4', 'Consequatur blanditiis cum voluptatem ut officiis aspernatur. Ut saepe hic quidem aspernatur itaque rem blanditiis. Eligendi facilis nihil ut.', 'Karli Botsford', 'Ea rem voluptas praesentium quia porro nemo aperiam excepturi nam cumque mollitia maiores est.', '4', '621', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `processes` VALUES ('5', 'Nesciunt temporibus quas rem nisi necessitatibus illo. Officiis aut totam minus error maxime. Minima rem delectus ut harum reiciendis. Id quia ut placeat qui est. Esse qui nobis quos nam. Aut pariatur officia nihil iusto et sapiente.', 'Billie Steuber', 'Magnam in reprehenderit et ut sunt harum quam ducimus possimus officiis incidunt rerum architecto sed eum assumenda vel magni consequatur.', '5', '990375', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `processes` VALUES ('6', 'Ipsam sed amet est. Optio porro perferendis eum ad. Delectus optio sit eum tenetur. Facilis cupiditate quia sed sed amet. Facilis natus provident officia quod qui temporibus beatae.', 'Prof. Tad Schneider MD', 'Et quo voluptatem ut quos architecto vitae ratione doloribus non suscipit dolore et excepturi et deserunt dolorem explicabo ut et.', '6', '455', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `processes` VALUES ('7', 'Asperiores cum qui eveniet deleniti voluptatem aliquid. Tempora consequuntur officia corrupti voluptatum. Rerum cum non libero ea magnam nihil velit.', 'Deborah Boehm', 'Rerum repellendus nihil dolor nihil laudantium impedit reiciendis ut aliquid ullam.', '7', '2505', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `processes` VALUES ('8', 'Incidunt eum ut repudiandae vel ut est sunt. Ducimus vel voluptatum veniam tempore. Sapiente nemo eveniet nam aliquam molestiae doloribus reiciendis. Quasi magni sequi consectetur aut incidunt in dolores. Aliquam et autem id ut veniam dolores commodi.', 'Lamont Nolan', 'Unde eligendi minus et ut sit perspiciatis impedit ut aperiam rerum.', '8', '391937', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `processes` VALUES ('9', 'Eveniet dolor natus dolores aut nulla vero. Inventore a consequuntur temporibus officiis. Doloremque quam nihil dolores a eos reprehenderit. Debitis accusantium labore recusandae.', 'Dr. Robert Howell', 'Libero ex numquam fugiat consequatur corrupti voluptatum est incidunt voluptates vero quisquam.', '9', '13094', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `processes` VALUES ('10', 'Maiores reprehenderit vel explicabo. Velit rerum rerum et dolor voluptas. Quisquam velit aliquam nostrum placeat quaerat. Distinctio quisquam molestiae sequi autem ipsum esse aut voluptatum.', 'Abby Adams', 'Eveniet ipsum a modi itaque vero dolores sit et saepe adipisci quis beatae id aut maiores et.', '10', '290140302', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);

-- ----------------------------
-- Table structure for process_files
-- ----------------------------
DROP TABLE IF EXISTS `process_files`;
CREATE TABLE `process_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviewed_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appoved_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_date` date NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_id` bigint(20) unsigned NOT NULL,
  `process_file_status_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `process_files_process_id_foreign` (`process_id`),
  KEY `process_files_process_file_status_id_foreign` (`process_file_status_id`),
  CONSTRAINT `process_files_process_file_status_id_foreign` FOREIGN KEY (`process_file_status_id`) REFERENCES `process_file_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `process_files_process_id_foreign` FOREIGN KEY (`process_id`) REFERENCES `processes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of process_files
-- ----------------------------
INSERT INTO `process_files` VALUES ('1', 'Sunt quae et eaque animi aspernatur aut quibusdam. Architecto placeat harum natus consequatur adipisci voluptate. Neque fugiat blanditiis dignissimos eaque.', 'Prof. Candida Romaguera DVM', 'Consequatur asperiores animi omnis sit numquam culpa quis rem qui.', '1992-11-24', 'Maiores voluptatem ea et autem explicabo. Repellendus nihil minus quis molestiae asperiores laborum. Ut quia perspiciatis sit nihil debitis voluptate et. Vero est incidunt velit in voluptatem aliquid soluta cumque.', 'Exercitationem ea at ipsum saepe. Sunt qui modi ratione est qui earum doloribus. Maiores voluptatem eum pariatur laborum iste. Ab quam sequi repudiandae alias dolor hic.', 'Iste accusamus et pariatur optio ratione dolorem ut. Saepe non velit perspiciatis voluptas. Quis voluptas consequatur fugiat quo ullam eum.', '2023-04-05', null, '6', '1', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_files` VALUES ('2', 'Nemo quos consectetur suscipit in. Repellendus et omnis sunt veritatis. Aliquam natus ab nihil accusamus voluptas perspiciatis voluptas. Atque saepe quae libero ab sed necessitatibus est. Sed nemo ullam eos.', 'Dr. Lew Bradtke IV', 'Repellat qui inventore ut rem cumque libero libero ut officiis.', '2022-08-14', 'Esse quia dolorem repellendus consequatur nihil laudantium repellat neque. Omnis quia quae doloremque atque quis. Ipsa blanditiis possimus et est esse. Nulla et iste qui ea est quo.', 'In quod fuga ut illum velit modi. Ipsam tenetur enim eligendi dolorem id. Inventore in voluptas doloribus voluptatem omnis.', 'Quod mollitia molestiae et dolore necessitatibus aliquid. Voluptatem aut amet reprehenderit praesentium atque aut. Doloremque sequi beatae eius illo ipsum deserunt sunt. Sequi sed sunt reprehenderit. Molestiae non pariatur est at.', '2007-11-03', null, '7', '2', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_files` VALUES ('3', 'Et sunt distinctio ullam aut odio eligendi. Vero rerum rerum rerum ipsam non vel expedita. Provident ea quod atque. Sit vitae id voluptatibus distinctio voluptatem.', 'Cornell Runte', 'Ut odit molestias reprehenderit adipisci ratione facere cupiditate consequatur et accusantium enim et fugit dolores id repudiandae perferendis voluptates.', '2001-12-10', 'Iure veniam cumque eum eaque. Perferendis deleniti ratione error unde. Est voluptatem sint nam voluptates porro. Est aut tenetur magni rerum quia ullam.', 'Similique recusandae explicabo nobis. Et est sint voluptas. At consequatur illo labore laboriosam. Nulla dolores et accusantium molestiae sit et et. Quia ut ab autem voluptates officiis aliquam at accusantium. Maxime excepturi sit nisi voluptatum.', 'Et eaque optio explicabo et assumenda quisquam et rem. Optio quia sint consequatur ut et minus. Vitae et mollitia est alias repellat explicabo. Incidunt magni architecto aut nihil facere.', '2011-11-16', null, '8', '3', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_files` VALUES ('4', 'Animi rerum sit ullam consectetur magni eaque voluptatum. Odio quia aut est dolores eius. Commodi sunt sit neque recusandae. Cumque nam atque ut repellat.', 'Paige Simonis', 'Et error id et laudantium reprehenderit animi molestias facilis facilis cupiditate assumenda qui et minima minus molestias nostrum qui cum.', '1987-12-17', 'At aperiam voluptatem consequatur sed eius voluptas aspernatur. Ad magni modi eveniet quis. Placeat quas animi soluta sed numquam.', 'Est impedit dignissimos libero nemo deserunt. Ut ut at impedit amet libero nobis. Eos aut molestias a enim. Quia nihil et itaque ut.', 'Quod ut porro maxime ex veritatis autem. In distinctio incidunt velit amet praesentium est neque animi. Dolores distinctio ipsa aut facere perferendis beatae magnam.', '1991-09-22', null, '9', '4', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_files` VALUES ('5', 'Excepturi sed dignissimos aut omnis deserunt tempore. Quis magnam et iusto doloribus. Est aperiam quia sit reiciendis. Provident dicta suscipit tempora iste rem consequuntur. Alias atque consequatur cum sit.', 'Kelly Hoppe', 'Non sed dolore vero qui temporibus sed corporis occaecati aut eligendi similique omnis molestiae vitae quas nihil et vero vitae quis ex.', '1985-04-10', 'Eum voluptatem quidem tenetur perspiciatis libero ipsa velit. Consequatur consequatur quisquam nam non explicabo reiciendis. Et quam fugit et et.', 'Voluptatem corrupti quod excepturi reiciendis totam. Maiores ea dolores omnis id et non eos deserunt. Sunt mollitia quos laboriosam consequatur recusandae. Omnis iste perferendis quaerat distinctio exercitationem. Neque dolor natus et.', 'Id error aut accusantium est neque vitae. Dicta enim accusamus optio itaque provident. Nam reiciendis iure possimus atque itaque voluptatum.', '1993-11-11', null, '10', '5', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);

-- ----------------------------
-- Table structure for process_file_statuses
-- ----------------------------
DROP TABLE IF EXISTS `process_file_statuses`;
CREATE TABLE `process_file_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of process_file_statuses
-- ----------------------------
INSERT INTO `process_file_statuses` VALUES ('1', 'Isom Lindgren', 'Rem dolorum consequuntur eos aliquid et numquam debitis placeat repellat dolor sapiente.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('2', 'Mrs. Marianne Mayer PhD', 'Velit laudantium at fugit aperiam illum sed enim explicabo corrupti debitis cumque rem culpa asperiores impedit.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('3', 'Laurie Boyle', 'Eaque accusamus consequuntur repudiandae ut quidem doloremque quaerat aut ab eveniet vel iure cumque.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('4', 'Elvie Kshlerin', 'Sit provident eius dolorem mollitia ut consequatur provident nisi ullam minima.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('5', 'Audrey Dicki', 'Aut eum voluptatem sunt non nobis facere est nesciunt ratione aut pariatur.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('6', 'Prof. Jarrett Cremin II', 'Dolor est beatae voluptatem quo porro aut rerum modi voluptate sit occaecati.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('7', 'Vincent Harvey', 'Et nihil molestiae est voluptas enim neque velit qui corporis cum et.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('8', 'Malachi Little DDS', 'Eos excepturi est voluptatum qui accusantium numquam qui dolore libero omnis.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('9', 'Rowan Mertz II', 'Et eius et inventore laborum consectetur molestias voluptatem soluta aspernatur eum est velit sed.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_file_statuses` VALUES ('10', 'Makenzie Herzog', 'Molestias sint alias quo quos quasi quas corrupti neque nihil optio perspiciatis harum nobis enim eum est earum et velit.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);

-- ----------------------------
-- Table structure for process_types
-- ----------------------------
DROP TABLE IF EXISTS `process_types`;
CREATE TABLE `process_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of process_types
-- ----------------------------
INSERT INTO `process_types` VALUES ('1', 'Dr. Lionel Kuhlman IV', 'Quam quaerat ut exercitationem ex sit ut velit aut tempore quod ad.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `process_types` VALUES ('2', 'Miss Rylee McCullough II', 'Dolor consequatur aut minima deleniti possimus pariatur earum beatae ut minima ut aut porro mollitia voluptas quia ex.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `process_types` VALUES ('3', 'Emmanuel Emard', 'Autem sed quia accusantium quia temporibus laborum voluptates labore eos incidunt.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `process_types` VALUES ('4', 'Alberto Roob', 'Ut ipsa quasi et optio distinctio labore nulla dicta itaque sed ut aut minus et tenetur voluptatem.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `process_types` VALUES ('5', 'Naomi Schoen I', 'Distinctio delectus officiis enim ab quia eos vel sapiente libero qui maxime mollitia cumque debitis voluptas sit maxime.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `process_types` VALUES ('6', 'Prof. Kennedy Harvey III', 'Ut assumenda possimus sapiente iure rerum omnis quo mollitia expedita et asperiores ab nobis quis officiis.', '2024-08-04 20:33:01', '2024-08-04 20:33:01', null);
INSERT INTO `process_types` VALUES ('7', 'Deonte Murray', 'Commodi autem aut reiciendis officiis reprehenderit corporis nihil qui sint voluptas quisquam mollitia ea omnis cupiditate rem.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_types` VALUES ('8', 'Lucious Zulauf', 'Laboriosam error hic modi ipsum optio quis hic rerum adipisci totam.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_types` VALUES ('9', 'Russ Jones', 'Saepe voluptatem ut temporibus voluptatem totam maxime dolor ratione voluptatum.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_types` VALUES ('10', 'Clarissa Sauer V', 'Sunt esse quis cum facere distinctio reiciendis et cumque velit nulla saepe numquam molestiae labore culpa corporis est magnam.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_types` VALUES ('11', 'Camylle Sporer', 'Aut voluptates perferendis voluptatem corporis sed ducimus et commodi sunt et saepe et a.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_types` VALUES ('12', 'Mrs. Katlynn Schumm IV', 'Ut consequatur inventore blanditiis sint non consequuntur voluptas sed hic officia.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_types` VALUES ('13', 'Vernice Rogahn PhD', 'Voluptas quia deleniti expedita possimus dignissimos aut dolores magnam nostrum nulla et omnis ut.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_types` VALUES ('14', 'Wilford Bednar Jr.', 'Ullam amet fuga ipsam nemo veritatis cum deleniti et voluptatibus minima et consequuntur rerum aut neque distinctio maxime velit qui quas.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `process_types` VALUES ('15', 'Miss Rosa Skiles DVM', 'Et impedit dolor vero repellat alias et architecto corrupti rerum necessitatibus eos quidem et quam quis et ipsum mollitia.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'user', 'web', '2024-08-04 20:32:59', '2024-08-04 20:32:59');
INSERT INTO `roles` VALUES ('2', 'super-admin', 'web', '2024-08-04 20:33:00', '2024-08-04 20:33:00');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('1', '1');
INSERT INTO `role_has_permissions` VALUES ('2', '1');
INSERT INTO `role_has_permissions` VALUES ('3', '1');
INSERT INTO `role_has_permissions` VALUES ('4', '1');
INSERT INTO `role_has_permissions` VALUES ('5', '1');
INSERT INTO `role_has_permissions` VALUES ('6', '1');
INSERT INTO `role_has_permissions` VALUES ('7', '1');
INSERT INTO `role_has_permissions` VALUES ('8', '1');
INSERT INTO `role_has_permissions` VALUES ('9', '1');
INSERT INTO `role_has_permissions` VALUES ('10', '1');
INSERT INTO `role_has_permissions` VALUES ('11', '1');
INSERT INTO `role_has_permissions` VALUES ('12', '1');
INSERT INTO `role_has_permissions` VALUES ('13', '1');
INSERT INTO `role_has_permissions` VALUES ('14', '1');
INSERT INTO `role_has_permissions` VALUES ('15', '1');
INSERT INTO `role_has_permissions` VALUES ('16', '1');
INSERT INTO `role_has_permissions` VALUES ('17', '1');
INSERT INTO `role_has_permissions` VALUES ('18', '1');
INSERT INTO `role_has_permissions` VALUES ('19', '1');
INSERT INTO `role_has_permissions` VALUES ('20', '1');
INSERT INTO `role_has_permissions` VALUES ('21', '1');
INSERT INTO `role_has_permissions` VALUES ('22', '1');
INSERT INTO `role_has_permissions` VALUES ('23', '1');
INSERT INTO `role_has_permissions` VALUES ('24', '1');
INSERT INTO `role_has_permissions` VALUES ('25', '1');
INSERT INTO `role_has_permissions` VALUES ('26', '1');
INSERT INTO `role_has_permissions` VALUES ('27', '1');
INSERT INTO `role_has_permissions` VALUES ('28', '1');
INSERT INTO `role_has_permissions` VALUES ('29', '1');
INSERT INTO `role_has_permissions` VALUES ('30', '1');
INSERT INTO `role_has_permissions` VALUES ('31', '1');
INSERT INTO `role_has_permissions` VALUES ('32', '1');
INSERT INTO `role_has_permissions` VALUES ('33', '1');
INSERT INTO `role_has_permissions` VALUES ('34', '1');
INSERT INTO `role_has_permissions` VALUES ('35', '1');
INSERT INTO `role_has_permissions` VALUES ('36', '1');
INSERT INTO `role_has_permissions` VALUES ('37', '1');
INSERT INTO `role_has_permissions` VALUES ('38', '1');
INSERT INTO `role_has_permissions` VALUES ('39', '1');
INSERT INTO `role_has_permissions` VALUES ('40', '1');
INSERT INTO `role_has_permissions` VALUES ('41', '1');
INSERT INTO `role_has_permissions` VALUES ('42', '1');
INSERT INTO `role_has_permissions` VALUES ('43', '1');
INSERT INTO `role_has_permissions` VALUES ('44', '1');
INSERT INTO `role_has_permissions` VALUES ('45', '1');
INSERT INTO `role_has_permissions` VALUES ('46', '1');
INSERT INTO `role_has_permissions` VALUES ('47', '1');
INSERT INTO `role_has_permissions` VALUES ('48', '1');
INSERT INTO `role_has_permissions` VALUES ('49', '1');
INSERT INTO `role_has_permissions` VALUES ('50', '1');
INSERT INTO `role_has_permissions` VALUES ('51', '1');
INSERT INTO `role_has_permissions` VALUES ('52', '1');
INSERT INTO `role_has_permissions` VALUES ('53', '1');
INSERT INTO `role_has_permissions` VALUES ('54', '1');
INSERT INTO `role_has_permissions` VALUES ('55', '1');
INSERT INTO `role_has_permissions` VALUES ('56', '1');
INSERT INTO `role_has_permissions` VALUES ('57', '1');
INSERT INTO `role_has_permissions` VALUES ('58', '1');
INSERT INTO `role_has_permissions` VALUES ('59', '1');
INSERT INTO `role_has_permissions` VALUES ('60', '1');
INSERT INTO `role_has_permissions` VALUES ('61', '1');
INSERT INTO `role_has_permissions` VALUES ('62', '1');
INSERT INTO `role_has_permissions` VALUES ('63', '1');
INSERT INTO `role_has_permissions` VALUES ('64', '1');
INSERT INTO `role_has_permissions` VALUES ('65', '1');
INSERT INTO `role_has_permissions` VALUES ('66', '1');
INSERT INTO `role_has_permissions` VALUES ('67', '1');
INSERT INTO `role_has_permissions` VALUES ('68', '1');
INSERT INTO `role_has_permissions` VALUES ('69', '1');
INSERT INTO `role_has_permissions` VALUES ('70', '1');
INSERT INTO `role_has_permissions` VALUES ('71', '1');
INSERT INTO `role_has_permissions` VALUES ('72', '1');
INSERT INTO `role_has_permissions` VALUES ('73', '1');
INSERT INTO `role_has_permissions` VALUES ('74', '1');
INSERT INTO `role_has_permissions` VALUES ('75', '1');
INSERT INTO `role_has_permissions` VALUES ('76', '1');
INSERT INTO `role_has_permissions` VALUES ('77', '1');
INSERT INTO `role_has_permissions` VALUES ('78', '1');
INSERT INTO `role_has_permissions` VALUES ('79', '1');
INSERT INTO `role_has_permissions` VALUES ('80', '1');
INSERT INTO `role_has_permissions` VALUES ('81', '1');
INSERT INTO `role_has_permissions` VALUES ('82', '1');
INSERT INTO `role_has_permissions` VALUES ('83', '1');
INSERT INTO `role_has_permissions` VALUES ('84', '1');
INSERT INTO `role_has_permissions` VALUES ('85', '1');
INSERT INTO `role_has_permissions` VALUES ('86', '1');
INSERT INTO `role_has_permissions` VALUES ('87', '1');
INSERT INTO `role_has_permissions` VALUES ('88', '1');
INSERT INTO `role_has_permissions` VALUES ('89', '1');
INSERT INTO `role_has_permissions` VALUES ('90', '1');
INSERT INTO `role_has_permissions` VALUES ('91', '1');
INSERT INTO `role_has_permissions` VALUES ('92', '1');
INSERT INTO `role_has_permissions` VALUES ('93', '1');
INSERT INTO `role_has_permissions` VALUES ('94', '1');
INSERT INTO `role_has_permissions` VALUES ('95', '1');
INSERT INTO `role_has_permissions` VALUES ('96', '1');
INSERT INTO `role_has_permissions` VALUES ('97', '1');
INSERT INTO `role_has_permissions` VALUES ('98', '1');
INSERT INTO `role_has_permissions` VALUES ('99', '1');
INSERT INTO `role_has_permissions` VALUES ('100', '1');
INSERT INTO `role_has_permissions` VALUES ('101', '1');
INSERT INTO `role_has_permissions` VALUES ('102', '1');
INSERT INTO `role_has_permissions` VALUES ('103', '1');
INSERT INTO `role_has_permissions` VALUES ('104', '1');
INSERT INTO `role_has_permissions` VALUES ('105', '1');
INSERT INTO `role_has_permissions` VALUES ('106', '1');
INSERT INTO `role_has_permissions` VALUES ('107', '1');
INSERT INTO `role_has_permissions` VALUES ('108', '1');
INSERT INTO `role_has_permissions` VALUES ('109', '1');
INSERT INTO `role_has_permissions` VALUES ('110', '1');
INSERT INTO `role_has_permissions` VALUES ('111', '1');
INSERT INTO `role_has_permissions` VALUES ('112', '1');
INSERT INTO `role_has_permissions` VALUES ('113', '1');
INSERT INTO `role_has_permissions` VALUES ('114', '1');
INSERT INTO `role_has_permissions` VALUES ('115', '1');
INSERT INTO `role_has_permissions` VALUES ('1', '2');
INSERT INTO `role_has_permissions` VALUES ('2', '2');
INSERT INTO `role_has_permissions` VALUES ('3', '2');
INSERT INTO `role_has_permissions` VALUES ('4', '2');
INSERT INTO `role_has_permissions` VALUES ('5', '2');
INSERT INTO `role_has_permissions` VALUES ('6', '2');
INSERT INTO `role_has_permissions` VALUES ('7', '2');
INSERT INTO `role_has_permissions` VALUES ('8', '2');
INSERT INTO `role_has_permissions` VALUES ('9', '2');
INSERT INTO `role_has_permissions` VALUES ('10', '2');
INSERT INTO `role_has_permissions` VALUES ('11', '2');
INSERT INTO `role_has_permissions` VALUES ('12', '2');
INSERT INTO `role_has_permissions` VALUES ('13', '2');
INSERT INTO `role_has_permissions` VALUES ('14', '2');
INSERT INTO `role_has_permissions` VALUES ('15', '2');
INSERT INTO `role_has_permissions` VALUES ('16', '2');
INSERT INTO `role_has_permissions` VALUES ('17', '2');
INSERT INTO `role_has_permissions` VALUES ('18', '2');
INSERT INTO `role_has_permissions` VALUES ('19', '2');
INSERT INTO `role_has_permissions` VALUES ('20', '2');
INSERT INTO `role_has_permissions` VALUES ('21', '2');
INSERT INTO `role_has_permissions` VALUES ('22', '2');
INSERT INTO `role_has_permissions` VALUES ('23', '2');
INSERT INTO `role_has_permissions` VALUES ('24', '2');
INSERT INTO `role_has_permissions` VALUES ('25', '2');
INSERT INTO `role_has_permissions` VALUES ('26', '2');
INSERT INTO `role_has_permissions` VALUES ('27', '2');
INSERT INTO `role_has_permissions` VALUES ('28', '2');
INSERT INTO `role_has_permissions` VALUES ('29', '2');
INSERT INTO `role_has_permissions` VALUES ('30', '2');
INSERT INTO `role_has_permissions` VALUES ('31', '2');
INSERT INTO `role_has_permissions` VALUES ('32', '2');
INSERT INTO `role_has_permissions` VALUES ('33', '2');
INSERT INTO `role_has_permissions` VALUES ('34', '2');
INSERT INTO `role_has_permissions` VALUES ('35', '2');
INSERT INTO `role_has_permissions` VALUES ('36', '2');
INSERT INTO `role_has_permissions` VALUES ('37', '2');
INSERT INTO `role_has_permissions` VALUES ('38', '2');
INSERT INTO `role_has_permissions` VALUES ('39', '2');
INSERT INTO `role_has_permissions` VALUES ('40', '2');
INSERT INTO `role_has_permissions` VALUES ('41', '2');
INSERT INTO `role_has_permissions` VALUES ('42', '2');
INSERT INTO `role_has_permissions` VALUES ('43', '2');
INSERT INTO `role_has_permissions` VALUES ('44', '2');
INSERT INTO `role_has_permissions` VALUES ('45', '2');
INSERT INTO `role_has_permissions` VALUES ('46', '2');
INSERT INTO `role_has_permissions` VALUES ('47', '2');
INSERT INTO `role_has_permissions` VALUES ('48', '2');
INSERT INTO `role_has_permissions` VALUES ('49', '2');
INSERT INTO `role_has_permissions` VALUES ('50', '2');
INSERT INTO `role_has_permissions` VALUES ('51', '2');
INSERT INTO `role_has_permissions` VALUES ('52', '2');
INSERT INTO `role_has_permissions` VALUES ('53', '2');
INSERT INTO `role_has_permissions` VALUES ('54', '2');
INSERT INTO `role_has_permissions` VALUES ('55', '2');
INSERT INTO `role_has_permissions` VALUES ('56', '2');
INSERT INTO `role_has_permissions` VALUES ('57', '2');
INSERT INTO `role_has_permissions` VALUES ('58', '2');
INSERT INTO `role_has_permissions` VALUES ('59', '2');
INSERT INTO `role_has_permissions` VALUES ('60', '2');
INSERT INTO `role_has_permissions` VALUES ('61', '2');
INSERT INTO `role_has_permissions` VALUES ('62', '2');
INSERT INTO `role_has_permissions` VALUES ('63', '2');
INSERT INTO `role_has_permissions` VALUES ('64', '2');
INSERT INTO `role_has_permissions` VALUES ('65', '2');
INSERT INTO `role_has_permissions` VALUES ('66', '2');
INSERT INTO `role_has_permissions` VALUES ('67', '2');
INSERT INTO `role_has_permissions` VALUES ('68', '2');
INSERT INTO `role_has_permissions` VALUES ('69', '2');
INSERT INTO `role_has_permissions` VALUES ('70', '2');
INSERT INTO `role_has_permissions` VALUES ('71', '2');
INSERT INTO `role_has_permissions` VALUES ('72', '2');
INSERT INTO `role_has_permissions` VALUES ('73', '2');
INSERT INTO `role_has_permissions` VALUES ('74', '2');
INSERT INTO `role_has_permissions` VALUES ('75', '2');
INSERT INTO `role_has_permissions` VALUES ('76', '2');
INSERT INTO `role_has_permissions` VALUES ('77', '2');
INSERT INTO `role_has_permissions` VALUES ('78', '2');
INSERT INTO `role_has_permissions` VALUES ('79', '2');
INSERT INTO `role_has_permissions` VALUES ('80', '2');
INSERT INTO `role_has_permissions` VALUES ('81', '2');
INSERT INTO `role_has_permissions` VALUES ('82', '2');
INSERT INTO `role_has_permissions` VALUES ('83', '2');
INSERT INTO `role_has_permissions` VALUES ('84', '2');
INSERT INTO `role_has_permissions` VALUES ('85', '2');
INSERT INTO `role_has_permissions` VALUES ('86', '2');
INSERT INTO `role_has_permissions` VALUES ('87', '2');
INSERT INTO `role_has_permissions` VALUES ('88', '2');
INSERT INTO `role_has_permissions` VALUES ('89', '2');
INSERT INTO `role_has_permissions` VALUES ('90', '2');
INSERT INTO `role_has_permissions` VALUES ('91', '2');
INSERT INTO `role_has_permissions` VALUES ('92', '2');
INSERT INTO `role_has_permissions` VALUES ('93', '2');
INSERT INTO `role_has_permissions` VALUES ('94', '2');
INSERT INTO `role_has_permissions` VALUES ('95', '2');
INSERT INTO `role_has_permissions` VALUES ('96', '2');
INSERT INTO `role_has_permissions` VALUES ('97', '2');
INSERT INTO `role_has_permissions` VALUES ('98', '2');
INSERT INTO `role_has_permissions` VALUES ('99', '2');
INSERT INTO `role_has_permissions` VALUES ('100', '2');
INSERT INTO `role_has_permissions` VALUES ('101', '2');
INSERT INTO `role_has_permissions` VALUES ('102', '2');
INSERT INTO `role_has_permissions` VALUES ('103', '2');
INSERT INTO `role_has_permissions` VALUES ('104', '2');
INSERT INTO `role_has_permissions` VALUES ('105', '2');
INSERT INTO `role_has_permissions` VALUES ('106', '2');
INSERT INTO `role_has_permissions` VALUES ('107', '2');
INSERT INTO `role_has_permissions` VALUES ('108', '2');
INSERT INTO `role_has_permissions` VALUES ('109', '2');
INSERT INTO `role_has_permissions` VALUES ('110', '2');
INSERT INTO `role_has_permissions` VALUES ('111', '2');
INSERT INTO `role_has_permissions` VALUES ('112', '2');
INSERT INTO `role_has_permissions` VALUES ('113', '2');
INSERT INTO `role_has_permissions` VALUES ('114', '2');
INSERT INTO `role_has_permissions` VALUES ('115', '2');
INSERT INTO `role_has_permissions` VALUES ('116', '2');
INSERT INTO `role_has_permissions` VALUES ('117', '2');
INSERT INTO `role_has_permissions` VALUES ('118', '2');
INSERT INTO `role_has_permissions` VALUES ('119', '2');
INSERT INTO `role_has_permissions` VALUES ('120', '2');
INSERT INTO `role_has_permissions` VALUES ('121', '2');
INSERT INTO `role_has_permissions` VALUES ('122', '2');
INSERT INTO `role_has_permissions` VALUES ('123', '2');
INSERT INTO `role_has_permissions` VALUES ('124', '2');
INSERT INTO `role_has_permissions` VALUES ('125', '2');
INSERT INTO `role_has_permissions` VALUES ('126', '2');
INSERT INTO `role_has_permissions` VALUES ('127', '2');
INSERT INTO `role_has_permissions` VALUES ('128', '2');
INSERT INTO `role_has_permissions` VALUES ('129', '2');
INSERT INTO `role_has_permissions` VALUES ('130', '2');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'Kayley Carroll I', 'Qui cumque recusandae et beatae. Est facere et aspernatur dolorem velit. Officiis aut aut cupiditate quia voluptates molestiae. Eaque perferendis voluptates aut dolorem omnis.', 'Est ipsum sint aut voluptas a aut quo nihil. Veritatis corporis consequuntur ea eius est et aliquid. Et perspiciatis in alias aut eos possimus nihil. Eos eius quo quia. Aut sit eos et alias quia.', 'Et quis aut ut iusto et reprehenderit et possimus voluptatem qui qui qui soluta possimus.', 'blanditiis', 'Rerum deleniti dolorem rerum excepturi impedit aut. Dolor assumenda eos ducimus nisi. Sed autem vero ut officia aliquam. Doloribus maiores aperiam quia nam qui provident quos quia.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `settings` VALUES ('2', 'Kiel Batz', 'Odio repellendus sint rerum autem nihil. Architecto voluptatem dolor exercitationem fugiat quas dolores quasi. At molestias porro ipsam sit sunt tenetur at et.', 'Inventore alias eveniet nihil ut qui odit. Ea alias sit aut ipsam alias earum. Aliquid cumque omnis libero ex numquam. Eveniet eum aut voluptatem.', 'Temporibus at atque ea voluptates error voluptatibus deleniti suscipit nobis autem omnis autem ex quia temporibus.', 'adipisci', 'Voluptatibus occaecati aliquam autem consequatur voluptas. Veritatis dolor odio nam beatae cum neque.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `settings` VALUES ('3', 'Dustin Abbott IV', 'Enim modi consectetur et eum recusandae labore dicta et. Enim quibusdam iure tempora eos. Dolores dolorem id expedita impedit sit ratione. Ullam unde nihil in.', 'Autem minus quidem ut sequi unde est. Consequatur doloribus voluptatibus deserunt voluptates est ea sit.', 'Laudantium qui perferendis quia sapiente dicta alias deleniti voluptas veniam et exercitationem.', 'quia', 'Aut enim vitae culpa magni nostrum. Consequatur velit earum veniam optio facilis. Qui numquam sint laboriosam. Nisi reprehenderit sit eaque dolor quo voluptatem rerum. Velit animi illum in mollitia ad.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `settings` VALUES ('4', 'Clay Wiza', 'Porro molestiae doloribus dicta accusamus facere adipisci corporis sunt. Debitis nulla at ex recusandae doloribus laborum. Vitae cumque fugit sunt in.', 'Nemo voluptatibus qui tempora perspiciatis dignissimos. Saepe possimus aut accusantium reiciendis perspiciatis fuga. Quod vel minima accusamus consequuntur. Exercitationem veritatis quia dolores.', 'Ut rerum id tenetur ipsam voluptatibus quae cum ut magnam maxime voluptatem.', 'necessitatibus', 'In est dolorem inventore nostrum deleniti et. Est dolores rem dignissimos ipsam debitis. Expedita distinctio pariatur voluptas sit ut quasi enim nemo. Magni nemo maxime soluta illo ut sed alias.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `settings` VALUES ('5', 'Kyle Jones V', 'Hic ut dolores consectetur sapiente. Debitis dignissimos repudiandae consequatur est. Quia ea id maxime.', 'Aut quisquam aut modi veritatis nulla. Quaerat non facere et culpa eveniet esse quod. Nostrum dolorem hic aut repellendus delectus. Non quo asperiores molestiae.', 'Assumenda vitae voluptatem temporibus porro sint aut unde aliquid blanditiis consectetur ut in eos itaque est reiciendis qui.', 'tenetur', 'Sit voluptatem maiores soluta. Atque reiciendis labore reiciendis maiores quis. Debitis veniam cumque et quia ut soluta qui.', '2024-08-04 20:33:02', '2024-08-04 20:33:02', null);
INSERT INTO `settings` VALUES ('6', 'phrase', 'home', '0', 'Muestra las frases en la categoría del su valaor', 'string', 'Frase', '2024-08-04 16:37:48', '2024-08-04 16:37:48', null);

-- ----------------------------
-- Table structure for townships
-- ----------------------------
DROP TABLE IF EXISTS `townships`;
CREATE TABLE `townships` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `townships_city_id_foreign` (`city_id`),
  CONSTRAINT `townships_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of townships
-- ----------------------------
INSERT INTO `townships` VALUES ('1', 'SANDINO', '2101', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('2', 'MANTUA', '2102', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('3', 'MINAS DE MATAHAMBRE', '2103', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('4', 'VIÑALES', '2104', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('5', 'LA PALMA', '2105', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('6', 'LOS PALACIOS', '2106', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('7', 'CONSOLACIÓN DEL SUR', '2107', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('8', 'PINAR DEL RÍO', '2108', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('9', 'SAN LUIS', '2109', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('10', 'SAN JUAN Y MARTÍNEZ', '2110', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('11', 'GUANE', '2111', '21', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('12', 'BAHÍA HONDA', '2201', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('13', 'MARIEL', '2202', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('14', 'GUANAJAY', '2203', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('15', 'CAIMITO', '2204', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('16', 'BAUTA', '2205', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('17', 'SAN ANTONIO DE LOS BAÑOS', '2206', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('18', 'GÜIRA DE MELENA', '2207', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('19', 'ALQUIZAR', '2208', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('20', 'ARTEMISA', '2209', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('21', 'CANDELARIA', '2210', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('22', 'SAN CRISTÓBAL', '2211', '22', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('23', 'PLAYA', '2301', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('24', 'PLAZA DE LA REVOLUCIÓN', '2302', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('25', 'CENTRO HABANA', '2303', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('26', 'LA HABANA VIEJA', '2304', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('27', 'REGLA', '2305', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('28', 'LA HABANA DEL ESTE', '2306', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('29', 'GUANABACOA', '2307', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('30', 'SAN MIGUEL DEL PADRÓN', '2308', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('31', 'DIEZ DE OCTUBRE', '2309', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('32', 'CERRO', '2310', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('33', 'MARIANAO', '2311', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('34', 'LA LISA', '2312', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('35', 'BOYEROS', '2313', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('36', 'ARROYO NARANJO', '2314', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('37', 'COTORRO', '2315', '23', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('38', 'BEJUCAL', '2401', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('39', 'SAN JOSÉ DE LAS LAJAS', '2402', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('40', 'JARUCO', '2403', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('41', 'SANTA CRUZ DEL NORTE', '2404', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('42', 'MADRUGA', '2405', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('43', 'NUEVA PAZ', '2406', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('44', 'SAN NICOLÁS', '2407', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('45', 'GÜINES', '2408', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('46', 'MELENA DEL SUR', '2409', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('47', 'BATABANÓ', '2410', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('48', 'QUIVICÁN', '2411', '24', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('49', 'MATANZAS', '2501', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('50', 'CÁRDENAS', '2502', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('51', 'MARTÍ', '2503', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('52', 'COLON', '2504', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('53', 'PERICO', '2505', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('54', 'JOVELLANOS', '2506', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('55', 'PEDRO BETANCOURT', '2507', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('56', 'LIMONAR', '2508', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('57', 'UNIÓN DE REYES', '2509', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('58', 'CIÉNAGA DE ZAPATA', '2510', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('59', 'JAGÜEY GRANDE', '2511', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('60', 'CALIMETE', '2512', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('61', 'LOS ARABOS', '2513', '25', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('62', 'CORRALILLO', '2601', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('63', 'QUEMADO DE GÜINES', '2602', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('64', 'SAGUA LA GRANDE', '2603', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('65', 'ENCRUCIJADA', '2604', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('66', 'CAMAJUANÍ', '2605', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('67', 'CAIBARIÉN', '2606', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('68', 'REMEDIOS', '2607', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('69', 'PLACETAS', '2608', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('70', 'SANTA CLARA', '2609', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('71', 'CIFUENTES', '2610', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('72', 'SANTO DOMINGO', '2611', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('73', 'RANCHUELO', '2612', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('74', 'MANICARAGUA', '2613', '26', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('75', 'AGUADA DE PASAJEROS', '2701', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('76', 'RODAS', '2702', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('77', 'PALMIRA', '2703', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('78', 'LAJAS', '2704', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('79', 'CRUCES', '2705', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('80', 'CUMANAYAGUA', '2706', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('81', 'CIENFUEGOS', '2707', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('82', 'ABREUS', '2708', '27', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('83', 'YAGUAJAY', '2801', '28', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('84', 'JATIBONICO', '2802', '28', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('85', 'TAGUASCO', '2803', '28', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('86', 'CABAIGUÁN', '2804', '28', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('87', 'FOMENTO', '2805', '28', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('88', 'TRINIDAD', '2806', '28', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('89', 'SANCTI SPÍRITUS', '2807', '28', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('90', 'LA SIERPE', '2808', '28', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('91', 'CHAMBAS', '2901', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('92', 'MORÓN', '2902', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('93', 'BOLIVIA', '2903', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('94', 'PRIMERO DE ENERO', '2904', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('95', 'CIRO REDONDO', '2905', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('96', 'FLORENCIA', '2906', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('97', 'MAJAGUA', '2907', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('98', 'CIEGO DE ÁVILA', '2908', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('99', 'VENEZUELA', '2909', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('100', 'BARAGUÁ', '2910', '29', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('101', 'CARLOS MANUEL DE CÉSPEDES', '3001', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('102', 'ESMERALDA', '3002', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('103', 'SIERRA DE CUBITAS', '3003', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('104', 'MINAS', '3004', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('105', 'NUEVITAS', '3005', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('106', 'GUÁIMARO', '3006', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('107', 'SIBANICÚ', '3007', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('108', 'CAMAGÜEY', '3008', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('109', 'FLORIDA', '3009', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('110', 'VERTIENTES', '3010', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('111', 'JIMAGUAYÚ', '3011', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('112', 'NAJASA', '3012', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('113', 'SANTA CRUZ DEL SUR', '3013', '30', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('114', 'MANATÍ', '3101', '31', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('115', 'PUERTO PADRE', '3102', '31', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('116', 'JESÚS MENÉNDEZ', '3103', '31', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('117', 'MAJIBACOA', '3104', '31', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('118', 'LAS TUNAS', '3105', '31', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('119', 'JOBABO', '3106', '31', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('120', 'COLOMBIA', '3107', '31', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('121', 'AMANCIO', '3108', '31', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('122', 'GIBARA', '3201', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('123', 'RAFAEL FREYRE', '3202', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('124', 'BANES', '3203', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('125', 'ANTILLA', '3204', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('126', 'BÁGUANOS', '3205', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('127', 'HOLGUÍN', '3206', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('128', 'CALIXTO GARCÍA', '3207', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('129', 'CACOCUM', '3208', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('130', 'URBANO NORIS', '3209', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('131', 'CUETO', '3210', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('132', 'MAYARÍ', '3211', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('133', 'FRANK PAÍS', '3212', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('134', 'SAGUA DE TÁNAMO', '3213', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('135', 'MOA', '3214', '32', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('136', 'RIO CAUTO', '3301', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('137', 'CAUTO CRISTO', '3302', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('138', 'JIGUANÍ', '3303', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('139', 'BAYAMO', '3304', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('140', 'YARA', '3305', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('141', 'MANZANILLO', '3306', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('142', 'CAMPECHUELA', '3307', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('143', 'MEDIA LUNA', '3308', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('144', 'NIQUERO', '3309', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('145', 'PILÓN', '3310', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('146', 'BARTOLOMÉ MASO', '3311', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('147', 'BUEY ARRIBA', '3312', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('148', 'GUISA', '3313', '33', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('149', 'CONTRAMAESTRE', '3401', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('150', 'MELLA', '3402', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('151', 'SAN LUIS', '3403', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('152', 'SEGUNDO FRENTE', '3404', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('153', 'SONGO - LA MAYA', '3405', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('154', 'SANTIAGO DE CUBA', '3406', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('155', 'PALMA SORIANO', '3407', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('156', 'TERCER FRENTE', '3408', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('157', 'GUAMA', '3409', '34', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('158', 'EL SALVADOR', '3501', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('159', 'MANUEL TAMES', '3502', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('160', 'YATERAS', '3503', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('161', 'BARACOA', '3504', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('162', 'MAISÍ', '3505', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('163', 'IMIAS', '3506', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('164', 'SAN ANTONIO DEL SUR', '3507', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('165', 'CAIMANERA', '3508', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('166', 'GUANTÁNAMO', '3509', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('167', 'NICETO PÉREZ', '3510', '35', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('168', 'ISLA DE LA JUVENTUD', '4001', '40', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('169', 'Alyson Jenkins', 'Est quia ex voluptatibus tempora et. Quibusdam est rem ab nesciunt corporis aliquam cum. Sit repellendus doloribus nihil nostrum voluptas suscipit omnis. Beatae quam aspernatur consequatur ab laboriosam. Sit sed non modi esse voluptate quas perspiciatis.', '41', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('170', 'Dr. Tiara Simonis II', 'Voluptas consequatur nam et porro quaerat. Quia occaecati quos dicta autem mollitia aut. Quo cum quaerat a. Soluta neque aut aut qui dolore sit recusandae. Fugit laboriosam odit et et sunt.', '43', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('171', 'Edythe Runolfsdottir', 'Dignissimos molestias quia culpa quos. Laboriosam id reprehenderit totam id et eveniet architecto. Quos quo dolores unde qui ut est sunt ratione. Nesciunt incidunt velit qui consequatur sed.', '45', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('172', 'Jacynthe Bradtke', 'Omnis magnam eos laudantium sit tempore. Quo rem placeat veritatis aut praesentium. Dolor tempora voluptatibus voluptate et.', '47', '2024-08-04 20:33:01', '2024-08-04 20:33:01');
INSERT INTO `townships` VALUES ('173', 'Prof. Remington Kunde Sr.', 'Quisquam possimus expedita qui repudiandae et illo. Et voluptas similique qui voluptatem consequuntur quia tempora.', '49', '2024-08-04 20:33:01', '2024-08-04 20:33:01');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_email_index` (`email`),
  KEY `users_employee_id_foreign` (`employee_id`),
  CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Brenden Pouros', 'admin@admin.com', 'Modi iste fugit facere. Unde autem voluptas delectus dolor eveniet. Asperiores voluptatibus fuga qui eos.', '2024-08-04 20:32:56', '$2y$12$nvx7SEaTlo5fT40Hzv8nlO5fGJXOWO0ZUJboryGPOFsR/rDemQNxe', 'ELbZnNVgawgKAdGi2aO9xRjWxHJtkSNQYuOaAeHT8lN8uTmXj9aoDGEBKDct', '1', '2024-08-04 20:32:57', '2024-08-04 20:32:57');
INSERT INTO `users` VALUES ('2', 'Jacquelyn Prohaska', 'ebeier@powlowski.com', 'Quo velit odit consequatur magni quaerat doloribus laboriosam reiciendis. Asperiores omnis molestiae distinctio quia adipisci et molestiae. Ut nam in ea. Optio dolor et autem ab ut rerum.', '2024-08-04 20:33:02', '$2y$12$tkJNU6sKh6m.wb5t3oO/luOsQorIBDKpyS47HT9LBrey4.zyQABrq', 'avWyfOgW6R', '9', '2024-08-04 20:33:03', '2024-08-04 20:33:03');
INSERT INTO `users` VALUES ('3', 'Prof. Sigrid Strosin DVM', 'thansen@rohan.com', 'Ullam est velit aut quo eius impedit accusamus. Iste quo aut impedit fugiat tempora ad. Corporis neque cumque et eligendi. Incidunt accusamus vel qui est.', '2024-08-04 20:33:02', '$2y$12$0ykq733ceH1rI0qq4KM/E.m3UkbHrttwPgWPqkPQh8va1jtQ9WHq6', 'WZEca2kP7o', '10', '2024-08-04 20:33:03', '2024-08-04 20:33:03');
INSERT INTO `users` VALUES ('4', 'Edyth Mayer', 'fwilderman@yahoo.com', 'A ducimus in earum vero corrupti. Hic amet consequatur et velit vero neque. Ad nemo nulla nihil delectus minus dolor ea. Harum assumenda eaque ullam aut.', '2024-08-04 20:33:02', '$2y$12$Dpyv417VN1zeJLM4krJSMuGIzwDCJADamn8vXBf1U77u8g2t63ggi', 'X2ZvegCKyx', '11', '2024-08-04 20:33:03', '2024-08-04 20:33:03');
INSERT INTO `users` VALUES ('5', 'Eve Goodwin DVM', 'plittle@gmail.com', 'Voluptates sit consectetur libero optio aut omnis dolores. Sint quae voluptatem et fugiat ut est. Sed eveniet ut optio eveniet omnis.', '2024-08-04 20:33:02', '$2y$12$FULe0zQcyNKmG8fua1U5DOOxPMZO0jXOetfoj9jAFZSbqnkIVDhh.', 'FsJVr9uckK', '12', '2024-08-04 20:33:03', '2024-08-04 20:33:03');
INSERT INTO `users` VALUES ('6', 'Brycen Medhurst', 'dbechtelar@gmail.com', 'Quo provident voluptas doloremque est numquam necessitatibus. Quasi error a velit et est dolor.', '2024-08-04 20:33:03', '$2y$12$Og1GV8RgI2HGlLhMjfKu1udmaLP1ZbhFPhT6QqfB1O7L6901TyHjy', 'dERzXUCQRZ', '13', '2024-08-04 20:33:03', '2024-08-04 20:33:03');

-- ----------------------------
-- Table structure for work_groups
-- ----------------------------
DROP TABLE IF EXISTS `work_groups`;
CREATE TABLE `work_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of work_groups
-- ----------------------------
INSERT INTO `work_groups` VALUES ('1', 'Clinton Swift', 'Soluta magnam pariatur sint aut natus ipsam iure atque ducimus hic nesciunt sit animi atque.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);
INSERT INTO `work_groups` VALUES ('2', 'Dr. Harmony Kutch PhD', 'Soluta illum maiores sit rem sunt nemo quia recusandae facilis qui ut dolorem doloremque cum eum culpa.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);
INSERT INTO `work_groups` VALUES ('3', 'Nina Howell', 'Quaerat consequatur et natus explicabo quo ex fugit amet voluptatem culpa harum ut iure veritatis rem rerum cumque qui assumenda quia.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);
INSERT INTO `work_groups` VALUES ('4', 'Zita Franecki II', 'Molestiae omnis accusamus ipsam amet repellat voluptas omnis quod repellat neque officiis sunt.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);
INSERT INTO `work_groups` VALUES ('5', 'Ms. Estrella Daniel V', 'Et eius cumque esse ut rerum eos provident magnam et magni hic unde fuga quas sapiente consequatur ipsam.', '2024-08-04 20:33:03', '2024-08-04 20:33:03', null);
