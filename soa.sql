/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : soa

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2015-07-09 19:11:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `soa_api_log`
-- ----------------------------
DROP TABLE IF EXISTS `soa_api_log`;
CREATE TABLE `soa_api_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `errcode` int(5) DEFAULT NULL COMMENT '错误代码',
  `errmsg` varchar(255) DEFAULT NULL COMMENT '错误信息',
  `api_url` varchar(255) DEFAULT NULL COMMENT '请求地址',
  `data` text COMMENT '请求参数',
  `function` varchar(50) DEFAULT NULL COMMENT '调用方法',
  `post_time` int(10) DEFAULT NULL COMMENT '报错时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_api_log
-- ----------------------------
INSERT INTO `soa_api_log` VALUES ('16', '41001', 'access_token missing', 'https://qyapi.weixin.qq.com/cgi-bin/department/create?access_token=', null, 'create_department', '1436435903');
INSERT INTO `soa_api_log` VALUES ('17', '41001', 'access_token missing', 'https://qyapi.weixin.qq.com/cgi-bin/department/create?access_token=', null, 'create_department', '1436435960');
INSERT INTO `soa_api_log` VALUES ('18', '40066', 'invalid party list', 'https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=kHb-JVqu-JWTlLjX-jmtA0yJinGo_doyrP0An9C4cmRSZzIHmgy_BdPszfx9Sugf', null, 'create_user', '1436436401');

-- ----------------------------
-- Table structure for `soa_dept`
-- ----------------------------
DROP TABLE IF EXISTS `soa_dept`;
CREATE TABLE `soa_dept` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `letter` varchar(20) DEFAULT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `dept_grade_id` int(10) DEFAULT NULL,
  `sort` int(8) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_dept
-- ----------------------------
INSERT INTO `soa_dept` VALUES ('1', '0', '轻微OA', 'QWOA', '微OA', null, null, null, null);
INSERT INTO `soa_dept` VALUES ('5', '1', '技术部', 'JSB', '技术', '0', '0', '', '1436436001');

-- ----------------------------
-- Table structure for `soa_map`
-- ----------------------------
DROP TABLE IF EXISTS `soa_map`;
CREATE TABLE `soa_map` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `pid` int(8) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `site` varchar(30) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_map
-- ----------------------------
INSERT INTO `soa_map` VALUES ('1', '0', '系统设置', '', 'fa-cogs', '1', '0', '1436254083');
INSERT INTO `soa_map` VALUES ('3', '1', '通讯录', '', 'fa-users', '2', '0', '1436256267');
INSERT INTO `soa_map` VALUES ('4', '3', '组织图', 'addressbook/organ', '', '3', '0', '1436256308');
INSERT INTO `soa_map` VALUES ('5', '3', '职位', 'addressbook/position', '', '3', '0', '1436256371');
INSERT INTO `soa_map` VALUES ('6', '3', '部门级别', 'addressbook/rank', '', '3', '0', '1436256594');
INSERT INTO `soa_map` VALUES ('7', '3', '员工登记', 'addressbook/member', '', '3', '0', '1436256866');
INSERT INTO `soa_map` VALUES ('8', '1', '网站地图', 'map', 'fa-sitemap', '2', '0', '1436321030');
INSERT INTO `soa_map` VALUES ('9', '1', '应用设置', 'app', 'fa-gear', '2', '0', '1436344701');
INSERT INTO `soa_map` VALUES ('10', '0', '企业通讯录', 'member', 'fa-users', '1', '0', '1436437214');

-- ----------------------------
-- Table structure for `soa_member`
-- ----------------------------
DROP TABLE IF EXISTS `soa_member`;
CREATE TABLE `soa_member` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '昵称首字母',
  `account` varchar(32) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `letter` varchar(10) DEFAULT NULL,
  `dept_id` varchar(50) DEFAULT NULL,
  `position_id` int(10) DEFAULT NULL,
  `position_str` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `email` varchar(80) DEFAULT NULL,
  `qq` int(12) DEFAULT NULL,
  `weixinid` varchar(40) DEFAULT NULL COMMENT '微信号',
  `office_tel` varchar(20) DEFAULT NULL COMMENT '办公电话',
  `mobile_tel` varchar(20) DEFAULT NULL COMMENT '移动电话',
  `sex` enum('0','1') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `site` varchar(126) DEFAULT NULL,
  `duty` varchar(200) DEFAULT NULL COMMENT '责任',
  `last_login_ip` char(15) DEFAULT NULL COMMENT '最后一次登陆ip',
  `last_login_time` int(11) DEFAULT NULL COMMENT '最后一次登陆时间',
  `login_count` int(8) DEFAULT NULL COMMENT '登陆次数',
  `post_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_member
-- ----------------------------
INSERT INTO `soa_member` VALUES ('1', 'dazhi', '秦智', 'QZ', '5', '0', 'php工程师', null, '', '631248045@qq.com', '631248045', 'qz631248045', '', '15874246906', '1', '1991-02-06', '', '开发', null, null, null, '1436436719', '1436437582');

-- ----------------------------
-- Table structure for `soa_position`
-- ----------------------------
DROP TABLE IF EXISTS `soa_position`;
CREATE TABLE `soa_position` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_position
-- ----------------------------
INSERT INTO `soa_position` VALUES ('1', 'php工程师', '0', '1', '', '1436436883');

-- ----------------------------
-- Table structure for `soa_rank`
-- ----------------------------
DROP TABLE IF EXISTS `soa_rank`;
CREATE TABLE `soa_rank` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_rank
-- ----------------------------

-- ----------------------------
-- Table structure for `soa_system_token`
-- ----------------------------
DROP TABLE IF EXISTS `soa_system_token`;
CREATE TABLE `soa_system_token` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `corpid` char(15) DEFAULT NULL COMMENT '企业Id ',
  `secret` char(64) DEFAULT NULL COMMENT '管理组的凭证密钥 ',
  `access_token` char(64) DEFAULT NULL COMMENT '获取到的凭证 ',
  `expires_in` int(10) DEFAULT NULL COMMENT '凭证的有效时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_system_token
-- ----------------------------
INSERT INTO `soa_system_token` VALUES ('1', 'wx755896948c0fb', '_coTBTWxo6RiJ04UE3pMnUvmLzeBpSJlVo9ffzK3K092X-8REVUnFFJcf8zQkn40', null, null);
