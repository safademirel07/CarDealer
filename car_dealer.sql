/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 80015
Source Host           : localhost:3308
Source Database       : car_dealer

Target Server Type    : MYSQL
Target Server Version : 80015
File Encoding         : 65001

Date: 2019-03-18 22:35:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('3', 'Audi');
INSERT INTO `brand` VALUES ('7', 'Citröen');
INSERT INTO `brand` VALUES ('12', 'Dacia');
INSERT INTO `brand` VALUES ('6', 'Hyundai');
INSERT INTO `brand` VALUES ('5', 'Kia');
INSERT INTO `brand` VALUES ('4', 'Mercedes-Benz');
INSERT INTO `brand` VALUES ('1', 'Opel');
INSERT INTO `brand` VALUES ('8', 'Peugeot');
INSERT INTO `brand` VALUES ('9', 'Renault');
INSERT INTO `brand` VALUES ('2', 'Volkswagen');

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cover_image_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `model_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `gear_id` int(11) NOT NULL,
  `fuel_id` int(11) NOT NULL,
  `year` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mileage` int(11) NOT NULL,
  `seat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `engine_power` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `number_owner` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `model_id` (`model_id`) USING BTREE,
  KEY `color_id` (`color_id`) USING BTREE,
  KEY `gear_id` (`gear_id`) USING BTREE,
  KEY `fuel_id` (`fuel_id`) USING BTREE,
  CONSTRAINT `car_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `car_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `car_ibfk_3` FOREIGN KEY (`gear_id`) REFERENCES `gear` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `car_ibfk_4` FOREIGN KEY (`fuel_id`) REFERENCES `fuel` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('1', 'Hatasız temiz 2016 model Astra', 'aciklama', 'https://www.auto-data.net/images/f6/file5256608.jpg', '1', '1', '1', '3', '2018', '1100', '1', '120', '11', '90000', '1');
INSERT INTO `car` VALUES ('2', 'Hatasız temiz 2018 model Insignia', 'aciklama', 'https://www.opel.com.tr/content/dam/opel/master/vehicles/new-insignia-grand-sport/bbc/Opel_Insignia_GS_MY18_576x322_mrm.png', '3', '8', '3', '3', '2018', '10018', '5', '180', '2', '150000', '1');

-- ----------------------------
-- Table structure for car_option
-- ----------------------------
DROP TABLE IF EXISTS `car_option`;
CREATE TABLE `car_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `unique_index` (`car_id`,`option_id`) USING BTREE,
  KEY `car_option_option_id` (`option_id`) USING BTREE,
  CONSTRAINT `car_option_car_id` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `car_option_option_id` FOREIGN KEY (`option_id`) REFERENCES `option` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of car_option
-- ----------------------------
INSERT INTO `car_option` VALUES ('48', '1', '1');
INSERT INTO `car_option` VALUES ('51', '1', '3');
INSERT INTO `car_option` VALUES ('54', '1', '100');
INSERT INTO `car_option` VALUES ('55', '1', '101');
INSERT INTO `car_option` VALUES ('56', '1', '110');
INSERT INTO `car_option` VALUES ('57', '1', '111');
INSERT INTO `car_option` VALUES ('58', '1', '120');
INSERT INTO `car_option` VALUES ('59', '1', '121');
INSERT INTO `car_option` VALUES ('63', '2', '1');
INSERT INTO `car_option` VALUES ('64', '2', '4');
INSERT INTO `car_option` VALUES ('65', '2', '8');
INSERT INTO `car_option` VALUES ('66', '2', '11');
INSERT INTO `car_option` VALUES ('67', '2', '14');
INSERT INTO `car_option` VALUES ('68', '2', '41');
INSERT INTO `car_option` VALUES ('69', '2', '88');
INSERT INTO `car_option` VALUES ('70', '2', '89');
INSERT INTO `car_option` VALUES ('71', '2', '90');
INSERT INTO `car_option` VALUES ('72', '2', '119');
INSERT INTO `car_option` VALUES ('73', '2', '122');

-- ----------------------------
-- Table structure for color
-- ----------------------------
DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of color
-- ----------------------------
INSERT INTO `color` VALUES ('1', 'Beige');
INSERT INTO `color` VALUES ('2', 'White');
INSERT INTO `color` VALUES ('3', 'Maroon');
INSERT INTO `color` VALUES ('4', 'Smoke-colored');
INSERT INTO `color` VALUES ('5', 'Gray');
INSERT INTO `color` VALUES ('6', 'Silver Gray');
INSERT INTO `color` VALUES ('7', 'Brown');
INSERT INTO `color` VALUES ('8', 'Red');
INSERT INTO `color` VALUES ('9', 'Navy Blue');
INSERT INTO `color` VALUES ('10', 'Blue');
INSERT INTO `color` VALUES ('11', 'Purple');
INSERT INTO `color` VALUES ('12', 'Pink');
INSERT INTO `color` VALUES ('13', 'Yellow');
INSERT INTO `color` VALUES ('14', 'Black');
INSERT INTO `color` VALUES ('15', 'champagne');
INSERT INTO `color` VALUES ('16', 'Turquoise');
INSERT INTO `color` VALUES ('17', 'Orange');
INSERT INTO `color` VALUES ('18', 'Green');
INSERT INTO `color` VALUES ('20', 'seaaa renk');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `car_id` (`car_id`) USING BTREE,
  CONSTRAINT `car_id` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('7', '2', 'Muhteşem araba.', 'Safa Demirel', '2018-12-09 12:20:17');
INSERT INTO `comment` VALUES ('8', '2', 'Harika araba.', 'Safa Demirel', '2018-12-09 12:22:18');
INSERT INTO `comment` VALUES ('11', '1', 'Çok iyi araba.', 'Safa Demirel', '2018-12-14 18:41:03');
INSERT INTO `comment` VALUES ('12', '1', 'Muhteşem araba.', 'Safa Demirel', '2018-12-14 18:41:29');
INSERT INTO `comment` VALUES ('13', '1', 'Harika araba.', 'Safa Demirel', '2018-12-15 16:32:49');

-- ----------------------------
-- Table structure for fuel
-- ----------------------------
DROP TABLE IF EXISTS `fuel`;
CREATE TABLE `fuel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fuel
-- ----------------------------
INSERT INTO `fuel` VALUES ('1', 'Gasoline');
INSERT INTO `fuel` VALUES ('2', 'Gas & LPG');
INSERT INTO `fuel` VALUES ('3', 'Diesel');
INSERT INTO `fuel` VALUES ('4', 'Hybrid');
INSERT INTO `fuel` VALUES ('5', 'Electric');

-- ----------------------------
-- Table structure for gear
-- ----------------------------
DROP TABLE IF EXISTS `gear`;
CREATE TABLE `gear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of gear
-- ----------------------------
INSERT INTO `gear` VALUES ('1', 'Manual');
INSERT INTO `gear` VALUES ('2', 'Semi-Automatic');
INSERT INTO `gear` VALUES ('3', 'Automatic');

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `url` (`url`),
  KEY `car_id_image` (`car_id`) USING BTREE,
  CONSTRAINT `car_id_image` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('1', '1', 'http://www.astratr.com/wp-content/uploads/2016/02/2016-Opel-Astra-K-sedan.jpg');

-- ----------------------------
-- Table structure for maintenance
-- ----------------------------
DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `last_time` datetime NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `car_id_safa` (`car_id`) USING BTREE,
  CONSTRAINT `car_id_safa` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of maintenance
-- ----------------------------
INSERT INTO `maintenance` VALUES ('1', '1', '2017-12-07 10:11:06', '15.000 KM bakımı yapıldı.');
INSERT INTO `maintenance` VALUES ('2', '1', '2016-12-07 10:11:06', '30.000 KM bakımı yapıldı');

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `brand_id` (`brand_id`,`name`,`type_id`),
  KEY `brand_id_fk` (`brand_id`) USING BTREE,
  KEY `type_id_fk` (`type_id`) USING BTREE,
  CONSTRAINT `brand_id_fk` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES ('1', '1', 'Astra', '1');
INSERT INTO `model` VALUES ('2', '1', 'Corsa', '1');
INSERT INTO `model` VALUES ('3', '1', 'Insignia', '2');
INSERT INTO `model` VALUES ('4', '1', 'Mokka X', '4');
INSERT INTO `model` VALUES ('5', '2', 'Polo', '1');
INSERT INTO `model` VALUES ('6', '3', 'Golf', '1');
INSERT INTO `model` VALUES ('7', '4', 'Passat', '2');
INSERT INTO `model` VALUES ('8', '5', 'Jetta', '2');

-- ----------------------------
-- Table structure for option
-- ----------------------------
DROP TABLE IF EXISTS `option`;
CREATE TABLE `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `type` (`type`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of option
-- ----------------------------
INSERT INTO `option` VALUES ('1', '1', 'ABC');
INSERT INTO `option` VALUES ('2', '1', 'ABS');
INSERT INTO `option` VALUES ('17', '1', 'Air Bag (Driver)');
INSERT INTO `option` VALUES ('18', '1', 'Air Bag (Passenger)');
INSERT INTO `option` VALUES ('19', '1', 'Air Bag (Side)');
INSERT INTO `option` VALUES ('22', '1', 'Airbag (Ceiling)');
INSERT INTO `option` VALUES ('21', '1', 'Airbag (Curtain)');
INSERT INTO `option` VALUES ('20', '1', 'Airbag (Knee)');
INSERT INTO `option` VALUES ('6', '1', 'Airmatic');
INSERT INTO `option` VALUES ('27', '1', 'Alarm');
INSERT INTO `option` VALUES ('4', '1', 'ASR');
INSERT INTO `option` VALUES ('11', '1', 'Bas');
INSERT INTO `option` VALUES ('23', '1', 'Blind Spot Detection');
INSERT INTO `option` VALUES ('12', '1', 'Distronic');
INSERT INTO `option` VALUES ('8', '1', 'EBA');
INSERT INTO `option` VALUES ('9', '1', 'EBD');
INSERT INTO `option` VALUES ('3', '1', 'EBP');
INSERT INTO `option` VALUES ('7', '1', 'EDL');
INSERT INTO `option` VALUES ('5', '1', 'ESP / VSA');
INSERT INTO `option` VALUES ('24', '1', 'Fatigue Detection System');
INSERT INTO `option` VALUES ('13', '1', 'Hill Holder');
INSERT INTO `option` VALUES ('29', '1', 'Immobilizer');
INSERT INTO `option` VALUES ('26', '1', 'Isofix');
INSERT INTO `option` VALUES ('15', '1', 'Leaving strip Alert');
INSERT INTO `option` VALUES ('14', '1', 'Night Vision');
INSERT INTO `option` VALUES ('28', '1', 'Power Door Locks');
INSERT INTO `option` VALUES ('16', '1', 'Side assist');
INSERT INTO `option` VALUES ('10', '1', 'TCS');
INSERT INTO `option` VALUES ('25', '1', 'Tire Failure Indicator');
INSERT INTO `option` VALUES ('63', '2', '3. Row Seat');
INSERT INTO `option` VALUES ('41', '2', '6 İleri Vites');
INSERT INTO `option` VALUES ('42', '2', '7 İleri Vites');
INSERT INTO `option` VALUES ('55', '2', 'Adaptive Cruise Control');
INSERT INTO `option` VALUES ('45', '2', 'Adjustable Wheel');
INSERT INTO `option` VALUES ('35', '2', 'Air Conditioning (Analog)');
INSERT INTO `option` VALUES ('36', '2', 'Air Conditioning (Digital)');
INSERT INTO `option` VALUES ('37', '2', 'Auto-darkening rearview mirror');
INSERT INTO `option` VALUES ('39', '2', 'Back Seat Armrest');
INSERT INTO `option` VALUES ('57', '2', 'Chrome Covering');
INSERT INTO `option` VALUES ('54', '2', 'Cruise Control');
INSERT INTO `option` VALUES ('33', '2', 'Electric Front Windows');
INSERT INTO `option` VALUES ('34', '2', 'Electric Rear Windows');
INSERT INTO `option` VALUES ('31', '2', 'Fabric Seat');
INSERT INTO `option` VALUES ('38', '2', 'Front Armrest');
INSERT INTO `option` VALUES ('62', '2', 'Front View Camera');
INSERT INTO `option` VALUES ('44', '2', 'Functional Steering Wheel');
INSERT INTO `option` VALUES ('59', '2', 'Head-up Display');
INSERT INTO `option` VALUES ('48', '2', 'Heated Wheel');
INSERT INTO `option` VALUES ('43', '2', 'Hydraulic Steering');
INSERT INTO `option` VALUES ('40', '2', 'Keyless operation');
INSERT INTO `option` VALUES ('32', '2', 'Leather and Fabric Seat');
INSERT INTO `option` VALUES ('30', '2', 'Leather Seat');
INSERT INTO `option` VALUES ('46', '2', 'Leather Wheel');
INSERT INTO `option` VALUES ('61', '2', 'Rear View Camera');
INSERT INTO `option` VALUES ('53', '2', 'Seats (Cooling)');
INSERT INTO `option` VALUES ('49', '2', 'Seats (Electric)');
INSERT INTO `option` VALUES ('51', '2', 'Seats (front Heated)');
INSERT INTO `option` VALUES ('50', '2', 'Seats (Memory)');
INSERT INTO `option` VALUES ('52', '2', 'Seats (rear Heated)');
INSERT INTO `option` VALUES ('60', '2', 'Start / Stop');
INSERT INTO `option` VALUES ('56', '2', 'Trip Computer');
INSERT INTO `option` VALUES ('58', '2', 'Wooden Coating');
INSERT INTO `option` VALUES ('47', '2', 'Wooden Wheel');
INSERT INTO `option` VALUES ('80', '3', 'Alloy Rim');
INSERT INTO `option` VALUES ('86', '3', 'Drawbolt');
INSERT INTO `option` VALUES ('65', '3', 'Far (LED)');
INSERT INTO `option` VALUES ('82', '3', 'Glass Roof');
INSERT INTO `option` VALUES ('64', '3', 'Hardtop');
INSERT INTO `option` VALUES ('69', '3', 'Headlamp (Fog)');
INSERT INTO `option` VALUES ('66', '3', 'Headlamp (Halojen)');
INSERT INTO `option` VALUES ('67', '3', 'Headlamp (Xenon)');
INSERT INTO `option` VALUES ('71', '3', 'Headlamp Night Sensor');
INSERT INTO `option` VALUES ('72', '3', 'Headlamp Wash');
INSERT INTO `option` VALUES ('70', '3', 'Headlights (Adaptive)');
INSERT INTO `option` VALUES ('68', '3', 'Headlights (Bi Xenon)');
INSERT INTO `option` VALUES ('84', '3', 'Heated Rear Window');
INSERT INTO `option` VALUES ('73', '3', 'Mirrors (Electric)');
INSERT INTO `option` VALUES ('74', '3', 'Mirrors (Folding)');
INSERT INTO `option` VALUES ('75', '3', 'Mirrors (Heated)');
INSERT INTO `option` VALUES ('76', '3', 'Mirrors (Memory)');
INSERT INTO `option` VALUES ('85', '3', 'Panoramic Window');
INSERT INTO `option` VALUES ('79', '3', 'Parking Assistant');
INSERT INTO `option` VALUES ('78', '3', 'Parking Sensor (Front)');
INSERT INTO `option` VALUES ('77', '3', 'Parking Sensor rear');
INSERT INTO `option` VALUES ('83', '3', 'Rain Sensor');
INSERT INTO `option` VALUES ('87', '3', 'Smart Luggage Cover');
INSERT INTO `option` VALUES ('81', '3', 'Sunroof');
INSERT INTO `option` VALUES ('96', '4', '6+ Speakers');
INSERT INTO `option` VALUES ('94', '4', 'AUX');
INSERT INTO `option` VALUES ('92', '4', 'Bluetooth - Phone');
INSERT INTO `option` VALUES ('97', '4', 'CD Changers');
INSERT INTO `option` VALUES ('99', '4', 'DVD Changers');
INSERT INTO `option` VALUES ('95', '4', 'iPod Connection');
INSERT INTO `option` VALUES ('88', '4', 'Radio - Cassette Player');
INSERT INTO `option` VALUES ('89', '4', 'Radio - CD Player');
INSERT INTO `option` VALUES ('90', '4', 'Radio - MP3 Player');
INSERT INTO `option` VALUES ('98', '4', 'Rear Entertainment Package');
INSERT INTO `option` VALUES ('91', '4', 'TV-Navigation');
INSERT INTO `option` VALUES ('93', '4', 'USB / AUX');
INSERT INTO `option` VALUES ('111', '5', 'Ceiling');
INSERT INTO `option` VALUES ('102', '5', 'Engine bonnet');
INSERT INTO `option` VALUES ('112', '5', 'Front Bumper');
INSERT INTO `option` VALUES ('109', '5', 'Left Front Door');
INSERT INTO `option` VALUES ('110', '5', 'Left Front Fender');
INSERT INTO `option` VALUES ('107', '5', 'Left Rear Door');
INSERT INTO `option` VALUES ('108', '5', 'Left Rear Mudguard');
INSERT INTO `option` VALUES ('101', '5', 'Rear Bumper');
INSERT INTO `option` VALUES ('100', '5', 'Rear Hood');
INSERT INTO `option` VALUES ('105', '5', 'Right Front Door');
INSERT INTO `option` VALUES ('106', '5', 'Right Front Fender');
INSERT INTO `option` VALUES ('103', '5', 'Right Rear Door');
INSERT INTO `option` VALUES ('104', '5', 'Right Rear Fender');
INSERT INTO `option` VALUES ('124', '6', 'Ceiling');
INSERT INTO `option` VALUES ('115', '6', 'Engine bonnet');
INSERT INTO `option` VALUES ('125', '6', 'Front Bumper');
INSERT INTO `option` VALUES ('122', '6', 'Left Front Door');
INSERT INTO `option` VALUES ('123', '6', 'Left Front Fender');
INSERT INTO `option` VALUES ('120', '6', 'Left Rear Door');
INSERT INTO `option` VALUES ('121', '6', 'Left Rear Mudguard');
INSERT INTO `option` VALUES ('114', '6', 'Rear Bumper');
INSERT INTO `option` VALUES ('113', '6', 'Rear Hood');
INSERT INTO `option` VALUES ('118', '6', 'Right Front Door');
INSERT INTO `option` VALUES ('119', '6', 'Right Front Fender');
INSERT INTO `option` VALUES ('116', '6', 'Right Rear Door');
INSERT INTO `option` VALUES ('117', '6', 'Right Rear Fender');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'Hatchback');
INSERT INTO `type` VALUES ('2', 'Sedan');
INSERT INTO `type` VALUES ('3', 'MPV');
INSERT INTO `type` VALUES ('4', 'SUV');
INSERT INTO `type` VALUES ('5', 'Crossover');
INSERT INTO `type` VALUES ('6', 'Coupe');
SET FOREIGN_KEY_CHECKS=1;
