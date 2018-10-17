/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2018-10-17 14:35:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for goods_pics
-- ----------------------------
DROP TABLE IF EXISTS `goods_pics`;
CREATE TABLE `goods_pics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `goods_pic` varchar(255) COLLATE utf8_bin NOT NULL,
  `pic_status` tinyint(255) NOT NULL DEFAULT '0',
  `goods_color` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of goods_pics
-- ----------------------------
INSERT INTO `goods_pics` VALUES ('1', '2', './uploads/goods/1539338971.jpg', '0', '深蓝色');
INSERT INTO `goods_pics` VALUES ('2', '2', './uploads/goods/1539336301.jpg', '0', '米白色');
INSERT INTO `goods_pics` VALUES ('4', '2', './uploads/goods/1539335074.jpg', '0', '骚蓝色');
INSERT INTO `goods_pics` VALUES ('5', '2', './uploads/goods/1539337131.jpg', '0', '浅蓝格仔');
INSERT INTO `goods_pics` VALUES ('10', '7', './uploads/goods/1539344904.jpg', '0', '黑色');
INSERT INTO `goods_pics` VALUES ('11', '7', './uploads/goods/1539345401.jpg', '0', '黑色');
INSERT INTO `goods_pics` VALUES ('12', '7', './uploads/goods/1539339265.jpg', '0', '黑色');
INSERT INTO `goods_pics` VALUES ('13', '8', './uploads/goods/1539338094.jpg', '0', 'G38深橄榄绿色');
INSERT INTO `goods_pics` VALUES ('14', '8', './uploads/goods/1539340724.jpg', '0', 'G38深橄榄绿色');
INSERT INTO `goods_pics` VALUES ('15', '8', './uploads/goods/1539341149.jpg', '0', '黑色');
INSERT INTO `goods_pics` VALUES ('16', '8', './uploads/goods/1539344530.jpg', '0', '黑色');
INSERT INTO `goods_pics` VALUES ('17', '8', './uploads/goods/1539341254.jpg', '0', 'G38深橄榄绿色');
INSERT INTO `goods_pics` VALUES ('18', '9', './uploads/goods/1539348258.jpg', '0', '蓝色');
INSERT INTO `goods_pics` VALUES ('19', '9', './uploads/goods/1539346282.jpg', '0', '橙色');
INSERT INTO `goods_pics` VALUES ('20', '9', './uploads/goods/1539347243.jpg', '0', '橙色');
INSERT INTO `goods_pics` VALUES ('21', '9', './uploads/goods/1539347122.jpg', '0', '橙色');

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `controller_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `action_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES ('1', '浏览用户', 'UserController', 'index', '0');
INSERT INTO `node` VALUES ('2', '禁用用户', 'UserController', 'stop', '0');
INSERT INTO `node` VALUES ('3', '启用用户', 'UserController', 'start', '0');
INSERT INTO `node` VALUES ('4', '浏览用户信息', 'UserController', 'show', '0');
INSERT INTO `node` VALUES ('5', '浏览管理员', 'AdminController', 'index', '0');
INSERT INTO `node` VALUES ('6', '管理员的启禁用', 'AdminController', 'status', '0');
INSERT INTO `node` VALUES ('7', '修改管理员', 'AdminController', 'edit', '0');
INSERT INTO `node` VALUES ('8', '删除管理员', 'AdminController', 'destroy', '0');
INSERT INTO `node` VALUES ('9', '浏览管理员信息', 'AdminController', 'info', '0');
INSERT INTO `node` VALUES ('10', '修改管理员信息', 'AdminController', 'infoedit', '0');
INSERT INTO `node` VALUES ('11', '浏览分类', 'CateController', 'index', '0');
INSERT INTO `node` VALUES ('12', '添加分类', 'CateController', 'create', '0');
INSERT INTO `node` VALUES ('13', '添加管理员', 'AdminController', 'create', '0');
INSERT INTO `node` VALUES ('14', '修改分类', 'CateController', 'edit', '0');
INSERT INTO `node` VALUES ('15', '删除父类', 'CateController', 'destroy', '0');
INSERT INTO `node` VALUES ('16', '浏览角色', 'RoleController', 'index', null);
INSERT INTO `node` VALUES ('18', '添加角色', 'RoleController', 'create', null);
INSERT INTO `node` VALUES ('19', '查看/编辑角色权限', 'RoleController', 'auth', null);
INSERT INTO `node` VALUES ('20', '设置角色权限', 'RoleController', 'setauth', null);
INSERT INTO `node` VALUES ('21', '浏览权限列表', 'NodeController', 'index', null);
INSERT INTO `node` VALUES ('22', '删除权限', 'NodeController', 'destroy', null);
INSERT INTO `node` VALUES ('23', '添加权限节点', 'NodeController', 'create', null);
INSERT INTO `node` VALUES ('24', '浏览收货地址', 'AddressController', 'index', null);
INSERT INTO `node` VALUES ('25', '查看会员收货地址', 'AddressController', 'info', null);
INSERT INTO `node` VALUES ('26', '浏览商品列表', 'GoodsController', 'index', null);
INSERT INTO `node` VALUES ('27', '添加商品', 'GoodsController', 'create', null);
INSERT INTO `node` VALUES ('28', '修改商品信息', 'GoodsController', 'edit', null);
INSERT INTO `node` VALUES ('29', '删除商品', 'GoodsController', 'destroy', null);
INSERT INTO `node` VALUES ('30', '商品下架', 'GoodsController', 'stop', null);
INSERT INTO `node` VALUES ('31', '商品上架', 'GoodsController', 'start', null);
INSERT INTO `node` VALUES ('32', '查看商品的所有图片', 'PicController', 'piclist', null);
INSERT INTO `node` VALUES ('33', '添加商品图片', 'PicController', 'picadd', null);
INSERT INTO `node` VALUES ('34', '执行添加商品图片操作', 'PicController', 'doadd', null);
INSERT INTO `node` VALUES ('35', '商品图片的启用和禁用', 'PicController', 'status', null);
INSERT INTO `node` VALUES ('36', '删除商品图片', 'PicController', 'destroy', null);
INSERT INTO `node` VALUES ('37', '浏览轮播图列表', 'SliderController', 'index', null);
INSERT INTO `node` VALUES ('38', '添加轮播图', 'SliderController', 'create', null);
INSERT INTO `node` VALUES ('39', '浏览订单列表', 'OrderController', 'index', null);
INSERT INTO `node` VALUES ('40', '查看订单详情信息', 'OrderController', 'show', null);

-- ----------------------------
-- Table structure for order_info
-- ----------------------------
DROP TABLE IF EXISTS `order_info`;
CREATE TABLE `order_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `goods_id` int(10) NOT NULL,
  `num` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of order_info
-- ----------------------------
INSERT INTO `order_info` VALUES ('1', '1', '7', '2');
INSERT INTO `order_info` VALUES ('2', '1', '8', '1');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `admin_level` int(10) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`admin_level`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员', null);
INSERT INTO `role` VALUES ('2', '普通管理员', null);
INSERT INTO `role` VALUES ('3', '一级管理员', null);
INSERT INTO `role` VALUES ('4', '二级管理员', null);
INSERT INTO `role` VALUES ('7', '三级管理员', null);

-- ----------------------------
-- Table structure for role_node
-- ----------------------------
DROP TABLE IF EXISTS `role_node`;
CREATE TABLE `role_node` (
  `rid` int(10) NOT NULL,
  `nid` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of role_node
-- ----------------------------
INSERT INTO `role_node` VALUES ('1', '24');
INSERT INTO `role_node` VALUES ('1', '23');
INSERT INTO `role_node` VALUES ('1', '22');
INSERT INTO `role_node` VALUES ('1', '21');
INSERT INTO `role_node` VALUES ('1', '20');
INSERT INTO `role_node` VALUES ('1', '19');
INSERT INTO `role_node` VALUES ('1', '18');
INSERT INTO `role_node` VALUES ('1', '16');
INSERT INTO `role_node` VALUES ('1', '15');
INSERT INTO `role_node` VALUES ('1', '14');
INSERT INTO `role_node` VALUES ('1', '13');
INSERT INTO `role_node` VALUES ('1', '12');
INSERT INTO `role_node` VALUES ('1', '11');
INSERT INTO `role_node` VALUES ('1', '10');
INSERT INTO `role_node` VALUES ('1', '9');
INSERT INTO `role_node` VALUES ('2', '21');
INSERT INTO `role_node` VALUES ('2', '19');
INSERT INTO `role_node` VALUES ('2', '16');
INSERT INTO `role_node` VALUES ('2', '11');
INSERT INTO `role_node` VALUES ('2', '9');
INSERT INTO `role_node` VALUES ('3', '5');
INSERT INTO `role_node` VALUES ('1', '8');
INSERT INTO `role_node` VALUES ('3', '4');
INSERT INTO `role_node` VALUES ('3', '1');
INSERT INTO `role_node` VALUES ('3', '9');
INSERT INTO `role_node` VALUES ('3', '11');
INSERT INTO `role_node` VALUES ('3', '16');
INSERT INTO `role_node` VALUES ('2', '5');
INSERT INTO `role_node` VALUES ('2', '4');
INSERT INTO `role_node` VALUES ('2', '1');
INSERT INTO `role_node` VALUES ('1', '7');
INSERT INTO `role_node` VALUES ('1', '6');
INSERT INTO `role_node` VALUES ('1', '5');
INSERT INTO `role_node` VALUES ('1', '4');
INSERT INTO `role_node` VALUES ('1', '3');
INSERT INTO `role_node` VALUES ('1', '2');
INSERT INTO `role_node` VALUES ('1', '1');
INSERT INTO `role_node` VALUES ('1', '25');
INSERT INTO `role_node` VALUES ('1', '26');
INSERT INTO `role_node` VALUES ('1', '27');
INSERT INTO `role_node` VALUES ('1', '28');
INSERT INTO `role_node` VALUES ('1', '29');
INSERT INTO `role_node` VALUES ('1', '30');
INSERT INTO `role_node` VALUES ('1', '31');
INSERT INTO `role_node` VALUES ('1', '32');
INSERT INTO `role_node` VALUES ('1', '33');
INSERT INTO `role_node` VALUES ('1', '34');
INSERT INTO `role_node` VALUES ('1', '35');
INSERT INTO `role_node` VALUES ('1', '36');
INSERT INTO `role_node` VALUES ('1', '37');
INSERT INTO `role_node` VALUES ('1', '38');
INSERT INTO `role_node` VALUES ('1', '39');
INSERT INTO `role_node` VALUES ('1', '40');
INSERT INTO `role_node` VALUES ('2', '24');
INSERT INTO `role_node` VALUES ('2', '25');
INSERT INTO `role_node` VALUES ('2', '26');
INSERT INTO `role_node` VALUES ('2', '32');
INSERT INTO `role_node` VALUES ('2', '37');
INSERT INTO `role_node` VALUES ('2', '39');
INSERT INTO `role_node` VALUES ('2', '40');

-- ----------------------------
-- Table structure for shop_address
-- ----------------------------
DROP TABLE IF EXISTS `shop_address`;
CREATE TABLE `shop_address` (
  `address_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `address_code` int(255) unsigned DEFAULT '0',
  `address_phone` bigint(11) unsigned NOT NULL,
  `address_default` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address_statue` tinyint(2) unsigned NOT NULL,
  `address_mail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_address
-- ----------------------------
INSERT INTO `shop_address` VALUES ('1', '1', '唐晓东', '地球村倒霉新村四栋8c', '0', '13746789665', '11', '1', '123@qq.com');
INSERT INTO `shop_address` VALUES ('2', '1', '高拍飞', '未来京东市贫民区36号', '0', '15821244577', '11', '0', '321@qq.com');
INSERT INTO `shop_address` VALUES ('4', '1', '李大钊', '天堂路8号楼', '523000', '12345678911', null, '0', '456789@qq.com');

-- ----------------------------
-- Table structure for shop_admin
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE `shop_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_level` tinyint(2) unsigned NOT NULL,
  `admin_addtime` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_statue` tinyint(255) unsigned NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_admin
-- ----------------------------
INSERT INTO `shop_admin` VALUES ('1', 'admin', '$2y$10$w6RnU3/y0/Fnh1rlCL6Z5e15vgZri0Xyf8U2XSYLFOEC7diL50FZ6', '1', '1539165372', '0');
INSERT INTO `shop_admin` VALUES ('3', 'zengz', '$2y$10$fsi.KOnAnGAfypIhghCfOOXo.DIlfSvaf4xS3ybQwA5gRMwVjbJby', '2', '1539348733', '0');
INSERT INTO `shop_admin` VALUES ('27', 'zengaa', '$2y$10$jCfHUGZsKBlBCCxgplWUc.WBlOvaDmtGihbuvG90saENaaWkZWjkG', '2', '1539156499', '1');
INSERT INTO `shop_admin` VALUES ('7', 'success', '$2y$10$JCe2vkYCOgoe4Na7veiLwu74QRAXnjpDP1bq4R1iyJ/e0yEpPj9KG', '2', '1539066671', '0');
INSERT INTO `shop_admin` VALUES ('28', 'memea', '$2y$10$N4iD2qv1kEg7mn9qOJLUleiD1tDO/THBxyAnzfny1c5l04BKP2bNq', '3', '1539174969', '0');

-- ----------------------------
-- Table structure for shop_admininfo
-- ----------------------------
DROP TABLE IF EXISTS `shop_admininfo`;
CREATE TABLE `shop_admininfo` (
  `admininfo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) unsigned NOT NULL,
  `admininfo_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `admininfo_sex` tinyint(2) unsigned NOT NULL,
  `admininfo_qq` bigint(13) unsigned NOT NULL,
  `admininfo_pic` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `admininfo_phone` bigint(255) NOT NULL,
  `admininfo_email` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`admininfo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_admininfo
-- ----------------------------
INSERT INTO `shop_admininfo` VALUES ('9', '27', '好东西', '1', '1235496464', null, '4544543', '321@qq.com');
INSERT INTO `shop_admininfo` VALUES ('2', '3', '李下很久农夫', '2', '123465798', './uploads/1539310558.jpg', '23165797', '321@qq.com');
INSERT INTO `shop_admininfo` VALUES ('11', '28', 'asdasda', '1', '1235496464', null, '4544543', '321@qq.com');
INSERT INTO `shop_admininfo` VALUES ('5', '7', '哪里都不好说', '2', '132465', '(Null)', '24164', '321@qq.com');
INSERT INTO `shop_admininfo` VALUES ('10', '28', 'dsadas', '1', '1235496464', null, '4544543', '321@qq.com');
INSERT INTO `shop_admininfo` VALUES ('12', '1', '曾小健', '1', '784093680', null, '15820821441', '321@qq.com');

-- ----------------------------
-- Table structure for shop_appraise
-- ----------------------------
DROP TABLE IF EXISTS `shop_appraise`;
CREATE TABLE `shop_appraise` (
  `appraise_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `appraise_leval` tinyint(2) unsigned NOT NULL,
  `appraise_time` varchar(255) COLLATE utf8_bin NOT NULL,
  `appraise_coment` varchar(255) COLLATE utf8_bin NOT NULL,
  `appraise_reply` varchar(255) COLLATE utf8_bin NOT NULL,
  `appraise_replytime` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`appraise_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_appraise
-- ----------------------------

-- ----------------------------
-- Table structure for shop_articles
-- ----------------------------
DROP TABLE IF EXISTS `shop_articles`;
CREATE TABLE `shop_articles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `descr` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_articles
-- ----------------------------
INSERT INTO `shop_articles` VALUES ('1', '你好', '<p>你好</p>');

-- ----------------------------
-- Table structure for shop_cates
-- ----------------------------
DROP TABLE IF EXISTS `shop_cates`;
CREATE TABLE `shop_cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_bin NOT NULL,
  `level` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_cates
-- ----------------------------
INSERT INTO `shop_cates` VALUES ('1', '女装', '0', '0', '1');
INSERT INTO `shop_cates` VALUES ('2', '童装', '0', '0', '1');
INSERT INTO `shop_cates` VALUES ('3', '男装', '0', '0', '1');
INSERT INTO `shop_cates` VALUES ('4', '裙子', '1', '0,1', '2');
INSERT INTO `shop_cates` VALUES ('5', '短裙', '4', '0,1,4', '3');
INSERT INTO `shop_cates` VALUES ('6', '男鞋', '3', '0,3', '2');
INSERT INTO `shop_cates` VALUES ('7', '背心', '1', '0,1', '2');
INSERT INTO `shop_cates` VALUES ('9', '长裙', '4', '0,1,4', '3');
INSERT INTO `shop_cates` VALUES ('11', '长裤', '3', '0,3', '2');
INSERT INTO `shop_cates` VALUES ('16', '内衣', '1', '0,1', '2');
INSERT INTO `shop_cates` VALUES ('17', '内裤', '1', '0,1', '2');
INSERT INTO `shop_cates` VALUES ('18', '男童装', '2', '0,2', '2');
INSERT INTO `shop_cates` VALUES ('19', '女童装', '2', '0,2', '2');
INSERT INTO `shop_cates` VALUES ('20', '背心', '3', '0,3', '2');
INSERT INTO `shop_cates` VALUES ('21', '短裤', '3', '0,3', '2');
INSERT INTO `shop_cates` VALUES ('22', '工装裤', '11', '0,3,11', '3');
INSERT INTO `shop_cates` VALUES ('23', '哈伦裤', '11', '0,3,11', '3');
INSERT INTO `shop_cates` VALUES ('24', '运动鞋', '6', '0,3,6', '3');
INSERT INTO `shop_cates` VALUES ('25', '休闲鞋', '6', '0,3,6', '3');
INSERT INTO `shop_cates` VALUES ('26', '男童衣', '18', '0,2,18', '3');
INSERT INTO `shop_cates` VALUES ('27', '南通裤', '18', '0,2,18', '3');
INSERT INTO `shop_cates` VALUES ('28', '裤子', '1', '0,1', '2');
INSERT INTO `shop_cates` VALUES ('29', '短裤', '28', '0,1,28', '3');
INSERT INTO `shop_cates` VALUES ('30', '长裤', '28', '0,1,28', '3');
INSERT INTO `shop_cates` VALUES ('31', '潮流短裤', '21', '0,3,21', '3');
INSERT INTO `shop_cates` VALUES ('32', '清爽短裤', '21', '0,3,21', '3');
INSERT INTO `shop_cates` VALUES ('34', '手机', '0', '0', '1');
INSERT INTO `shop_cates` VALUES ('35', 'iphone', '34', '0,34', '2');
INSERT INTO `shop_cates` VALUES ('36', '华为', '34', '0,34', '2');
INSERT INTO `shop_cates` VALUES ('37', '内衣111', '16', '0,1,16', '3');
INSERT INTO `shop_cates` VALUES ('38', '内裤111', '17', '0,1,17', '3');
INSERT INTO `shop_cates` VALUES ('39', '荣耀系列', '36', '0,34,36', '3');
INSERT INTO `shop_cates` VALUES ('40', '麦芒系列', '36', '0,34,36', '3');
INSERT INTO `shop_cates` VALUES ('41', 'px', '35', '0,34,35', '3');
INSERT INTO `shop_cates` VALUES ('42', 'iphone 6s', '35', '0,34,35', '3');
INSERT INTO `shop_cates` VALUES ('43', 'iphone 7 plus', '35', '0,34,35', '3');
INSERT INTO `shop_cates` VALUES ('44', '华为 荣耀5', '36', '0,34,36', '3');
INSERT INTO `shop_cates` VALUES ('45', '连衣裙', '4', '0,1,4', '3');
INSERT INTO `shop_cates` VALUES ('46', '衬衫', '3', '0,3', '2');
INSERT INTO `shop_cates` VALUES ('47', '潮流衬衫', '46', '0,3,46', '3');
INSERT INTO `shop_cates` VALUES ('48', '女童裤', '19', '0,2,19', '3');

-- ----------------------------
-- Table structure for shop_fovorite
-- ----------------------------
DROP TABLE IF EXISTS `shop_fovorite`;
CREATE TABLE `shop_fovorite` (
  `fovorite_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fovorite_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_fovorite
-- ----------------------------

-- ----------------------------
-- Table structure for shop_goods
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `goods_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `goods_status` tinyint(2) unsigned NOT NULL,
  `goods_addtime` varchar(255) COLLATE utf8_bin NOT NULL,
  `goods_read` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_pic` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `goods_describe` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `goods_price` decimal(10,2) NOT NULL,
  `goods_num` int(10) NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES ('7', '4', '连衣裙', '0', '1539336702', '0', './uploads/goods/1539338614.jpg', '好看的连衣裙~', '79.00', '888');
INSERT INTO `shop_goods` VALUES ('2', '3', '韩版衬衫', '0', '1539321453', '0', './uploads/goods/1539326543.jpg', '韩版衬衫 潮流前线 值得购买~', '88.00', '555');
INSERT INTO `shop_goods` VALUES ('8', '9', 'MOCO高腰复古飘带中长款半身裙压褶女秋MA1631SKT04 G38深橄榄绿色 M', '0', '1539336823', '0', './uploads/goods/1539338143.jpg', 'MOCO高腰复古飘带中长款半身裙压褶女秋MA1631SKT04 G38深橄榄绿色 M~', '659.00', '1000');
INSERT INTO `shop_goods` VALUES ('9', '2', '童装儿童毛衣', '0', '1539344409', '0', './uploads/goods/1539351145.jpg', '精典泰迪Classic Teddy童装儿童毛衣男女童针织衫婴儿衣服中小童上衣外套外出服2018新款 小熊横条/咖啡 120', '169.99', '666');
INSERT INTO `shop_goods` VALUES ('25', '41', 'iphone 7s', '0', '1539677724', '0', './uploads/goods/1539679115.png', 'Apple 苹果 iPhone X 全面屏手机 深空灰色 全网通 64GB', '7000.00', '10');
INSERT INTO `shop_goods` VALUES ('12', '39', '荣耀之星7', '0', '1539593911', '0', './uploads/goods/1539603853.jpg', '荣耀 畅玩7 2GB+16GB 金色 全网通4G手机 双卡双待 限量赠耳机！', '2500.00', '10');
INSERT INTO `shop_goods` VALUES ('13', '39', '荣耀之星8', '0', '1539593953', '0', './uploads/goods/1539595310.jpg', '荣耀 畅玩8 2GB+16GB 金色 全网通4G手机 双卡双待 限量赠耳机！', '3500.00', '100');
INSERT INTO `shop_goods` VALUES ('23', '41', 'iphone 7s', '0', '1539646353', '0', './uploads/goods/1539652422.jpg', 'Apple 苹果 iPhone7 全网通4G手机 金色 64G 标配', '8500.00', '10');
INSERT INTO `shop_goods` VALUES ('17', '40', '麦芒6', '0', '1539596587', '0', './uploads/goods/1539604283.jpg', '华为 麦芒6 全网通 4GB+64GB版 香槟金 移动联通电信4G手机 双卡双待', '2000.00', '10');
INSERT INTO `shop_goods` VALUES ('21', '41', 'iphone6s', '0', '1539646266', '0', './uploads/goods/1539651924.jpg', 'Apple 苹果 iPhone6s 全网通4G手机 金色 64G 标配', '7500.00', '10');
INSERT INTO `shop_goods` VALUES ('22', '41', 'iphone 7', '0', '1539646313', '0', './uploads/goods/1539653304.jpg', 'Apple 苹果 iPhone7 全网通4G手机 金色 64G 标配', '8000.00', '10');
INSERT INTO `shop_goods` VALUES ('19', '39', '荣耀之星7', '0', '1539614535', '0', './uploads/goods/1539619117.jpg', '荣耀 畅玩7 2GB+16GB 金色 全网通4G手机 双卡双待 限量赠耳机！', '5000.00', '10');
INSERT INTO `shop_goods` VALUES ('20', '41', 'iphone 6', '0', '1539646188', '0', './uploads/goods/1539647298.jpg', 'Apple 苹果 iPhone6 全网通4G手机 金色 64G 标配', '7000.00', '10');
INSERT INTO `shop_goods` VALUES ('18', '41', 'iphone px', '0', '1539602041', '0', './uploads/goods/1539603391.jpg', 'Apple 苹果 iPhone X 全面屏手机 深空灰色 全网通 64GB', '7000.00', '100');
INSERT INTO `shop_goods` VALUES ('24', '41', 'iphone 8', '0', '1539646402', '0', './uploads/goods/1539646500.jpg', 'Apple 苹果 iPhone8 全网通4G手机 金色 64G 标配', '10000.00', '10');
INSERT INTO `shop_goods` VALUES ('26', '41', 'iphone6s', '0', '1539677807', '0', './uploads/goods/1539679128.jpg', 'Apple 苹果 iPhone X 全面屏手机 深空灰色 全网通 64GB', '5000.00', '10');
INSERT INTO `shop_goods` VALUES ('27', '41', 'iphone 6', '0', '1539677842', '0', './uploads/goods/1539686653.jpg', 'Apple 苹果 iPhone X 全面屏手机 深空灰色 全网通 64GB', '5000.00', '10');
INSERT INTO `shop_goods` VALUES ('28', '41', 'iphone px', '0', '1539677872', '0', './uploads/goods/1539683259.jpg', 'Apple 苹果 iPhone X 全面屏手机 深空灰色 全网通 64GB', '15000.00', '10');
INSERT INTO `shop_goods` VALUES ('29', '39', '荣耀之星8', '0', '1539678490', '0', './uploads/goods/1539682903.jpg', '全面屏手机 深空灰色 全网通 64GB', '10000.00', '100');

-- ----------------------------
-- Table structure for shop_order
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `order_sn` varchar(255) COLLATE utf8_bin NOT NULL,
  `order_pay` varchar(255) COLLATE utf8_bin NOT NULL,
  `order_addtime` varchar(255) COLLATE utf8_bin NOT NULL,
  `order_payment` varchar(255) COLLATE utf8_bin NOT NULL,
  `order_amount` varchar(255) COLLATE utf8_bin NOT NULL,
  `order_evaluation` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `order_state` tinyint(2) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_order
-- ----------------------------
INSERT INTO `shop_order` VALUES ('1', '1', '1', '323246741631', '464674164', '1539419464', '支付宝', '200', '0', '1');

-- ----------------------------
-- Table structure for shop_pay
-- ----------------------------
DROP TABLE IF EXISTS `shop_pay`;
CREATE TABLE `shop_pay` (
  `pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `pay_statue` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_pay
-- ----------------------------

-- ----------------------------
-- Table structure for shop_slider
-- ----------------------------
DROP TABLE IF EXISTS `shop_slider`;
CREATE TABLE `shop_slider` (
  `slider_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slider_img` varchar(255) COLLATE utf8_bin NOT NULL,
  `slider_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `slider_href` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_slider
-- ----------------------------
INSERT INTO `shop_slider` VALUES ('9', '1539330670.jpg', '联想手机', 'https://shop.lenovo.com.cn/');
INSERT INTO `shop_slider` VALUES ('10', '1539332000.jpg', '国庆期间', 'https://shop.lenovo.com.cn/');
INSERT INTO `shop_slider` VALUES ('11', '1539327338.jpg', '追逐光电', 'https://shop.lenovo.com.cn/');
INSERT INTO `shop_slider` VALUES ('12', '1539325229.jpg', '黑礼', 'https://shop.lenovo.com.cn/');
INSERT INTO `shop_slider` VALUES ('13', '1539326142.jpg', '轻薄小新', 'https://shop.lenovo.com.cn/');

-- ----------------------------
-- Table structure for shop_type
-- ----------------------------
DROP TABLE IF EXISTS `shop_type`;
CREATE TABLE `shop_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `type_pid` int(10) unsigned NOT NULL,
  `type_level` tinyint(2) unsigned NOT NULL,
  `type_status` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_type
-- ----------------------------

-- ----------------------------
-- Table structure for shop_user
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_pwd` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_phone` bigint(11) unsigned NOT NULL,
  `user_addtime` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_state` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `user_token` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_user
-- ----------------------------
INSERT INTO `shop_user` VALUES ('1', 'admin123', '123456', '12345678911', '2018-10-01', '0', '', '');
INSERT INTO `shop_user` VALUES ('2', 'asdfgg', 'sda', '12345678911', '2022-10-01', '0', '', '');
INSERT INTO `shop_user` VALUES ('4', 'admin1234', '$2y$10$a7Nt.bV/N4S6fVlcPZ5oV.bv/fhY144yFYtNuuTUm2xnXPZ3zXt86', '13828468980', '2018-10-17 13:19:44', '0', '9501', '996623225@qq.com');

-- ----------------------------
-- Table structure for shop_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `shop_userinfo`;
CREATE TABLE `shop_userinfo` (
  `userinfo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userinfo_pname` varchar(255) COLLATE utf8_bin NOT NULL,
  `userinfo_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `userinfo_pic` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `userinfo_sex` tinyint(2) NOT NULL,
  `userinfo_birthday` varchar(255) COLLATE utf8_bin NOT NULL,
  `userinfo_hobby` varchar(255) COLLATE utf8_bin NOT NULL,
  `userinfo_address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `userinfo_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`userinfo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of shop_userinfo
-- ----------------------------
INSERT INTO `shop_userinfo` VALUES ('1', '李冰冰个妹', '李老煤', null, '0', '1999-10-10', '看片', '地球', '123@qq.com', '1');
INSERT INTO `shop_userinfo` VALUES ('2', '弟中弟', '距老煤', null, '1', '1111-20-10', '看大片', '火星', '321@qq.com', '2');
