/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : iook

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-11-12 05:07:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_level_map`
-- ----------------------------
DROP TABLE IF EXISTS `t_level_map`;
CREATE TABLE `t_level_map` (
  `level` smallint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `power` int(11) unsigned NOT NULL,
  `name1` varchar(10) DEFAULT NULL,
  `name2` varchar(10) DEFAULT NULL,
  `name3` varchar(10) DEFAULT NULL,
  `_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`level`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_level_map
-- ----------------------------
INSERT INTO `t_level_map` VALUES ('33', '制皇', '4294967295', '大元帅', '怀化中郎将', null, '拖出去斩了');
INSERT INTO `t_level_map` VALUES ('32', '龙头', '2147483648', '元帅', '宣威将军', null, null);
INSERT INTO `t_level_map` VALUES ('31', '副龙头', '1073741824', '', '明威将军', '赐九锡', null);
INSERT INTO `t_level_map` VALUES ('30', '坐堂', '536870912', '大将', '归德中郎将', '封王', null);
INSERT INTO `t_level_map` VALUES ('29', '陪堂', '268435456', '上将', '定远将军', '封万户侯', '拖出去斩了');
INSERT INTO `t_level_map` VALUES ('28', '盟证', '134217728', '中将', '宁远将军', '赐黄金万两', '赐毒酒');
INSERT INTO `t_level_map` VALUES ('27', '香长', '67108864', '少将', '怀化将将', null, null);
INSERT INTO `t_level_map` VALUES ('26', '管堂', '33554432', '', '游骑将军', '赐良田千亩', '重打八十军棍');
INSERT INTO `t_level_map` VALUES ('25', '刑堂', '16777216', '大校', '游击将军', '赐美人', null);
INSERT INTO `t_level_map` VALUES ('24', '执堂', '8388608', '上校', '归德将将', null, null);
INSERT INTO `t_level_map` VALUES ('23', '礼堂', '4194304', '中校', '昭武校尉', null, null);
INSERT INTO `t_level_map` VALUES ('22', '护剑', '2097152', '少校', '昭武副尉', null, null);
INSERT INTO `t_level_map` VALUES ('21', '心腹', '1048576', '', '怀化司阶', null, null);
INSERT INTO `t_level_map` VALUES ('20', '圣贤', '524288', '大尉', '振威副尉', null, null);
INSERT INTO `t_level_map` VALUES ('19', '当家', '262144', '上尉', '归德司阶', null, null);
INSERT INTO `t_level_map` VALUES ('18', '披红', '131072', '中尉', '致果校尉 ', null, null);
INSERT INTO `t_level_map` VALUES ('17', '插花', '65536', '少尉', '致果副尉', '赏吃大餐', '禁止交易');
INSERT INTO `t_level_map` VALUES ('16', '红旗', '32768', '准尉', '怀化中侯', null, null);
INSERT INTO `t_level_map` VALUES ('15', '黑旗', '16384', '', '翊麾校尉', null, null);
INSERT INTO `t_level_map` VALUES ('14', '蓝旗', '8192', '一级军士长', '翊麾副尉', null, null);
INSERT INTO `t_level_map` VALUES ('13', '执法', '4096', '二级军士长', '归德中侯', null, null);
INSERT INTO `t_level_map` VALUES ('12', '青刚', '2048', '三级军士长', '宣节校尉', null, null);
INSERT INTO `t_level_map` VALUES ('11', '巡风', '1024', '四级军士长', '宣节副尉', null, null);
INSERT INTO `t_level_map` VALUES ('10', '镇山', '512', '四级专业军士', '怀化司戈', null, null);
INSERT INTO `t_level_map` VALUES ('9', '巡山', '256', '三级专业军士', '御侮校尉', null, null);
INSERT INTO `t_level_map` VALUES ('8', '白旗', '128', '二级专业军士', '御辱副尉', null, null);
INSERT INTO `t_level_map` VALUES ('7', '八德', '64', '一级专业军士', '归德司戈', '一盒酥', null);
INSERT INTO `t_level_map` VALUES ('6', '九江', '32', '上士', '仁勇校尉', '恩准玩游戏', null);
INSERT INTO `t_level_map` VALUES ('5', '江口', '16', '中士', '仁勇副尉', '赏美酒', null);
INSERT INTO `t_level_map` VALUES ('4', '辕门', '8', '下士', '怀化执戟长', '恩准发呆', null);
INSERT INTO `t_level_map` VALUES ('3', '铜章', '4', '', '陪戎校尉', null, '面壁思过');
INSERT INTO `t_level_map` VALUES ('2', '铁印', '2', '上等兵', '陪戎副尉', null, '不准吃饭');
INSERT INTO `t_level_map` VALUES ('1', '小老么', '1', '列兵', '归德执戟长', '赏颗糖', '掌嘴');
INSERT INTO `t_level_map` VALUES ('34', '', '4294967295', null, '壮武将军', null, null);
INSERT INTO `t_level_map` VALUES ('35', '', '4294967295', null, '忠武将军', null, null);
INSERT INTO `t_level_map` VALUES ('36', '', '4294967295', null, '归德将军', null, null);
INSERT INTO `t_level_map` VALUES ('37', '', '4294967295', null, '归德大将军', null, null);
INSERT INTO `t_level_map` VALUES ('38', '', '4294967295', null, '云麾将军', null, null);
INSERT INTO `t_level_map` VALUES ('39', '', '4294967295', null, '怀化将军', null, null);
INSERT INTO `t_level_map` VALUES ('40', '', '4294967295', null, '怀化大将军', null, null);
INSERT INTO `t_level_map` VALUES ('41', '', '4294967295', null, '冠军大将军', null, null);
INSERT INTO `t_level_map` VALUES ('42', '', '4294967295', null, '镇军大将军', null, null);
INSERT INTO `t_level_map` VALUES ('43', '', '4294967295', null, '辅国大将军', null, null);
INSERT INTO `t_level_map` VALUES ('44', '', '4294967295', null, '骠骑大将军', null, null);

-- ----------------------------
-- Table structure for `t_power_name`
-- ----------------------------
DROP TABLE IF EXISTS `t_power_name`;
CREATE TABLE `t_power_name` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `power_name` varchar(20) DEFAULT NULL COMMENT '荣誉罪恶称号',
  `power_step` bigint(20) NOT NULL COMMENT '荣誉区间',
  `guilt_step` bigint(20) NOT NULL COMMENT '罪恶区间',
  `power_guilt_step` int(11) NOT NULL DEFAULT '5' COMMENT '从0到10共10级，默认为5',
  `register_days_step` mediumint(8) NOT NULL,
  `avg_power_step` mediumint(8) NOT NULL,
  `avg_guilt_step` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_power_name
-- ----------------------------
INSERT INTO `t_power_name` VALUES ('1', '无名小卒', '0', '0', '5', '0', '0', '0');
INSERT INTO `t_power_name` VALUES ('2', '草民', '0', '0', '5', '0', '0', '0');
INSERT INTO `t_power_name` VALUES ('3', '鼠辈', '0', '0', '5', '0', '0', '0');
INSERT INTO `t_power_name` VALUES ('4', '威震四海', '0', '0', '5', '0', '0', '0');
INSERT INTO `t_power_name` VALUES ('5', '气吞吴越', '0', '0', '5', '0', '0', '0');
INSERT INTO `t_power_name` VALUES ('6', '德高望重', '0', '0', '5', '0', '0', '0');
INSERT INTO `t_power_name` VALUES ('7', '恶贯满盈', '0', '0', '5', '0', '0', '0');
INSERT INTO `t_power_name` VALUES ('8', '臭名昭著', '0', '0', '5', '0', '0', '0');

-- ----------------------------
-- Table structure for `t_system_settings`
-- ----------------------------
DROP TABLE IF EXISTS `t_system_settings`;
CREATE TABLE `t_system_settings` (
  `key` varchar(100) NOT NULL DEFAULT '',
  `value` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_system_settings
-- ----------------------------
INSERT INTO `t_system_settings` VALUES ('C_DAY_POWER', '96', '日常规功绩');
INSERT INTO `t_system_settings` VALUES ('C_DAY_GUILT', '96', '日常规罪恶');
INSERT INTO `t_system_settings` VALUES ('C_INIT_POWER_NAME', '无名小卒', '初始称号');

-- ----------------------------
-- Table structure for `t_user_level_map`
-- ----------------------------
DROP TABLE IF EXISTS `t_user_level_map`;
CREATE TABLE `t_user_level_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `level` smallint(3) NOT NULL,
  `power` int(11) unsigned NOT NULL COMMENT '等于2^(level-1)',
  `type` enum('奖','惩') NOT NULL DEFAULT '奖',
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user_level_map
-- ----------------------------

-- ----------------------------
-- Table structure for `t_user_power`
-- ----------------------------
DROP TABLE IF EXISTS `t_user_power`;
CREATE TABLE `t_user_power` (
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `total_power` bigint(16) NOT NULL DEFAULT '0',
  `total_guilt` bigint(16) NOT NULL DEFAULT '0',
  `regular_power` bigint(16) NOT NULL DEFAULT '0',
  `regular_guilt` bigint(16) NOT NULL COMMENT '0',
  `register_date` date NOT NULL,
  `register_days` mediumint(8) NOT NULL DEFAULT '0',
  `sign_days` mediumint(8) NOT NULL DEFAULT '0' COMMENT '签到天数',
  `power_name` varchar(20) DEFAULT NULL COMMENT '荣誉称号',
  `power_name_update_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user_power
-- ----------------------------

-- ----------------------------
-- Table structure for `t_user_power_record`
-- ----------------------------
DROP TABLE IF EXISTS `t_user_power_record`;
CREATE TABLE `t_user_power_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  `power` int(11) DEFAULT NULL,
  `power_note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user_power_record
-- ----------------------------

-- ----------------------------
-- Table structure for `_jc`
-- ----------------------------
DROP TABLE IF EXISTS `_jc`;
CREATE TABLE `_jc` (
  `jcname` varchar(20) NOT NULL DEFAULT '' COMMENT '奖惩名称',
  `jcfen` smallint(4) unsigned NOT NULL COMMENT '奖惩分',
  `jcleixing` enum('惩','奖') NOT NULL DEFAULT '惩' COMMENT '奖惩类型',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`jcname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of _jc
-- ----------------------------
INSERT INTO `_jc` VALUES ('开除', '64', '惩', '1');
INSERT INTO `_jc` VALUES ('撤职', '32', '惩', '1');
INSERT INTO `_jc` VALUES ('降职', '16', '惩', '1');
INSERT INTO `_jc` VALUES ('记大过', '8', '惩', '1');
INSERT INTO `_jc` VALUES ('记过', '4', '惩', '1');
INSERT INTO `_jc` VALUES ('严重警告', '2', '惩', '1');
INSERT INTO `_jc` VALUES ('警告', '1', '惩', '1');
INSERT INTO `_jc` VALUES ('嘉奖', '1', '惩', '1');
INSERT INTO `_jc` VALUES ('三等功', '0', '惩', '1');
INSERT INTO `_jc` VALUES ('二等功', '0', '惩', '1');
INSERT INTO `_jc` VALUES ('一等功', '0', '惩', '1');
INSERT INTO `_jc` VALUES ('授勋', '0', '惩', '1');
INSERT INTO `_jc` VALUES ('封侯', '0', '惩', '1');
INSERT INTO `_jc` VALUES ('封王', '0', '惩', '1');

-- ----------------------------
-- Table structure for `_level_c`
-- ----------------------------
DROP TABLE IF EXISTS `_level_c`;
CREATE TABLE `_level_c` (
  `level` smallint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `name1` varchar(10) DEFAULT NULL,
  `name2` varchar(10) DEFAULT NULL,
  `name3` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`level`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of _level_c
-- ----------------------------
INSERT INTO `_level_c` VALUES ('1', '骠骑大将军', null, null, null);
INSERT INTO `_level_c` VALUES ('2', '辅国大将军', null, null, null);
INSERT INTO `_level_c` VALUES ('3', '镇军大将军', null, null, null);
INSERT INTO `_level_c` VALUES ('4', '冠军大将军', null, null, null);
INSERT INTO `_level_c` VALUES ('5', '怀化大将军', null, null, null);
INSERT INTO `_level_c` VALUES ('6', '怀化将军', null, null, null);
INSERT INTO `_level_c` VALUES ('7', '云麾将军', '', null, null);
INSERT INTO `_level_c` VALUES ('8', '归德大将军', null, null, null);
INSERT INTO `_level_c` VALUES ('9', '归德将军', null, null, null);
INSERT INTO `_level_c` VALUES ('10', '忠武将军', null, null, null);
INSERT INTO `_level_c` VALUES ('11', '壮武将军', null, null, null);
INSERT INTO `_level_c` VALUES ('12', '怀化中郎将', null, null, null);
INSERT INTO `_level_c` VALUES ('13', '宣威将军', null, null, null);
INSERT INTO `_level_c` VALUES ('14', '明威将军', null, null, null);
INSERT INTO `_level_c` VALUES ('15', '归德中郎将', null, null, null);
INSERT INTO `_level_c` VALUES ('16', '定远将军', null, null, null);
INSERT INTO `_level_c` VALUES ('17', '宁远将军', '', null, null);
INSERT INTO `_level_c` VALUES ('18', '怀化将将', null, null, null);
INSERT INTO `_level_c` VALUES ('19', '游骑将军', null, null, null);
INSERT INTO `_level_c` VALUES ('20', '游击将军', null, null, null);
INSERT INTO `_level_c` VALUES ('21', '归德将将', null, null, null);
INSERT INTO `_level_c` VALUES ('22', '昭武校尉', '', null, null);
INSERT INTO `_level_c` VALUES ('23', '昭武副尉', null, null, null);
INSERT INTO `_level_c` VALUES ('24', '怀化司阶', null, null, null);
INSERT INTO `_level_c` VALUES ('25', '振威副尉', null, null, null);
INSERT INTO `_level_c` VALUES ('26', '归德司阶', null, null, null);
INSERT INTO `_level_c` VALUES ('27', '致果校尉 ', null, null, null);
INSERT INTO `_level_c` VALUES ('28', '致果副尉', '', '', null);
INSERT INTO `_level_c` VALUES ('29', '怀化中侯', null, null, null);
INSERT INTO `_level_c` VALUES ('30', '翊麾校尉', null, null, null);
INSERT INTO `_level_c` VALUES ('31', '翊麾副尉', null, null, null);
INSERT INTO `_level_c` VALUES ('32', '归德中侯', null, null, null);
INSERT INTO `_level_c` VALUES ('33', '宣节校尉', null, null, null);
INSERT INTO `_level_c` VALUES ('34', '宣节副尉', null, null, null);
INSERT INTO `_level_c` VALUES ('35', '怀化司戈', null, null, null);
INSERT INTO `_level_c` VALUES ('36', '御侮校尉', null, null, null);
INSERT INTO `_level_c` VALUES ('37', '御辱副尉', null, null, null);
INSERT INTO `_level_c` VALUES ('38', '归德司戈', null, null, null);
INSERT INTO `_level_c` VALUES ('39', '仁勇校尉', null, null, null);
INSERT INTO `_level_c` VALUES ('40', '仁勇副尉', null, null, null);
INSERT INTO `_level_c` VALUES ('41', '怀化执戟长', null, null, null);
INSERT INTO `_level_c` VALUES ('42', '陪戎校尉', null, null, null);
INSERT INTO `_level_c` VALUES ('43', '陪戎副尉', null, null, null);
INSERT INTO `_level_c` VALUES ('44', '归德执戟长', null, null, null);
