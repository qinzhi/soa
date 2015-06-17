/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : soa

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-06-17 14:33:05
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_api_log
-- ----------------------------
INSERT INTO `soa_api_log` VALUES ('1', '60011', 'no privilege to access/modify contact/party/agent ', 'https://qyapi.weixin.qq.com/cgi-bin/agent/get', null, 'get_app', '1434453905');
INSERT INTO `soa_api_log` VALUES ('2', '41001', 'access_token missing', 'https://qyapi.weixin.qq.com/cgi-bin/agent/list', null, 'get_app_list', '1434453905');
INSERT INTO `soa_api_log` VALUES ('3', '41001', 'access_token missing', 'https://qyapi.weixin.qq.com/cgi-bin/agent/list', null, 'get_app_list', '1434453959');
INSERT INTO `soa_api_log` VALUES ('4', '41001', 'access_token missing', 'https://qyapi.weixin.qq.com/cgi-bin/agent/list', null, 'get_app_list', '1434454006');
INSERT INTO `soa_api_log` VALUES ('5', '41001', 'access_token missing', 'https://qyapi.weixin.qq.com/cgi-bin/agent/list', null, 'get_app_list', '1434454094');

-- ----------------------------
-- Table structure for `soa_app`
-- ----------------------------
DROP TABLE IF EXISTS `soa_app`;
CREATE TABLE `soa_app` (
  `agentid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL COMMENT '企业应用名称 ',
  `square_logo_url` varchar(255) DEFAULT NULL COMMENT '企业应用方形头像',
  `round_logo_url` varchar(255) DEFAULT NULL COMMENT '企业应用圆形头像',
  `allow_userid` varchar(255) DEFAULT NULL COMMENT '企业应用可见范围（人员）',
  `allow_deptid` varchar(255) DEFAULT NULL COMMENT '企业应用可见范围（部门）',
  `allow_tags` varchar(255) DEFAULT NULL COMMENT '企业应用可见范围（标签）',
  `description` varchar(255) DEFAULT NULL COMMENT '企业应用详情',
  `close` tinyint(1) DEFAULT NULL COMMENT '企业应用是否被禁用',
  `redirect_domain` varchar(255) DEFAULT NULL COMMENT '企业应用可信域名',
  `report_location_flag` tinyint(1) DEFAULT NULL COMMENT '企业应用是否打开地理位置上报 0：不上报；1：进入会话上报；2：持续上报 ',
  `isreportuser` tinyint(1) DEFAULT NULL COMMENT '是否接收用户变更通知。0：不接收；1：接收',
  `isreportenter` tinyint(1) DEFAULT NULL COMMENT '是否上报用户进入应用事件。0：不接收；1：接收 ',
  PRIMARY KEY (`agentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_app
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_dept
-- ----------------------------
INSERT INTO `soa_dept` VALUES ('1', '0', '湖南实意网络科技有限公司', 'HNSYWLKJYXGS', '实意良心', '0', '1', '', null);
INSERT INTO `soa_dept` VALUES ('2', '1', '技术部', 'JSB', '技术', '2', '1', '', '1433730824');

-- ----------------------------
-- Table structure for `soa_member`
-- ----------------------------
DROP TABLE IF EXISTS `soa_member`;
CREATE TABLE `soa_member` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '昵称首字母',
  `account` varchar(32) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `letter` varchar(10) DEFAULT NULL,
  `dept_id` varchar(50) DEFAULT NULL COMMENT '部门id',
  `position_id` int(10) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像',
  `email` varchar(80) DEFAULT NULL,
  `weixinid` varchar(40) DEFAULT NULL,
  `qq` int(12) DEFAULT NULL,
  `office_tel` varchar(20) DEFAULT NULL COMMENT '办公电话',
  `mobile_tel` varchar(20) DEFAULT NULL COMMENT '移动电话',
  `sex` enum('1','2') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `duty` varchar(200) DEFAULT NULL COMMENT '责任',
  `site` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `last_login_ip` char(15) DEFAULT NULL COMMENT '最后一次登陆ip',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后一次登陆时间',
  `login_count` int(8) DEFAULT NULL COMMENT '登陆次数',
  `post_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_member
-- ----------------------------
INSERT INTO `soa_member` VALUES ('1', 'dazhi', '大智', 'DZ', '2', '0', null, '', '631248045@qq.com', 'qz631248045', '631248045', '13575764266', '15874246906', '1', '1991-02-06', '开发', '开福区五家岭', '1', null, null, null, '1434170797', '1434426634');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_position
-- ----------------------------
INSERT INTO `soa_position` VALUES ('1', '总经理', '2', '-1', '', '1433749929');
INSERT INTO `soa_position` VALUES ('2', '副总经理', '2', '1', '', '1433754601');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of soa_rank
-- ----------------------------
INSERT INTO `soa_rank` VALUES ('2', '部', '1', '1', '', '1433756919');
INSERT INTO `soa_rank` VALUES ('3', '组', '2', '1', '', '1433756982');

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
