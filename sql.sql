-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2020-08-17 22:27:35
-- 服务器版本： 5.5.62-log
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tt`
--

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_access`
--

CREATE TABLE IF NOT EXISTS `lp_admin_access` (
  `module` varchar(16) NOT NULL DEFAULT '' COMMENT '模型名称',
  `group` varchar(16) NOT NULL DEFAULT '' COMMENT '权限分组标识',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `nid` varchar(16) NOT NULL DEFAULT '' COMMENT '授权节点id',
  `tag` varchar(16) NOT NULL DEFAULT '' COMMENT '分组标签'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='统一授权表';

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_action`
--

CREATE TABLE IF NOT EXISTS `lp_admin_action` (
  `id` int(11) unsigned NOT NULL,
  `module` varchar(16) NOT NULL DEFAULT '' COMMENT '所属模块名',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` varchar(80) NOT NULL DEFAULT '' COMMENT '行为标题',
  `remark` varchar(128) NOT NULL DEFAULT '' COMMENT '行为描述',
  `rule` text NOT NULL COMMENT '行为规则',
  `log` text NOT NULL COMMENT '日志规则',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统行为表';

--
-- 转存表中的数据 `lp_admin_action`
--

INSERT INTO `lp_admin_action` (`id`, `module`, `name`, `title`, `remark`, `rule`, `log`, `status`, `create_time`, `update_time`) VALUES
(1, 'user', 'user_add', '添加用户', '添加用户', '', '[user|get_nickname] 添加了用户：[record|get_nickname]', 1, 1480156399, 1480163853),
(2, 'user', 'user_edit', '编辑用户', '编辑用户', '', '[user|get_nickname] 编辑了用户：[details]', 1, 1480164578, 1480297748),
(3, 'user', 'user_delete', '删除用户', '删除用户', '', '[user|get_nickname] 删除了用户：[details]', 1, 1480168582, 1480168616),
(4, 'user', 'user_enable', '启用用户', '启用用户', '', '[user|get_nickname] 启用了用户：[details]', 1, 1480169185, 1480169185),
(5, 'user', 'user_disable', '禁用用户', '禁用用户', '', '[user|get_nickname] 禁用了用户：[details]', 1, 1480169214, 1480170581),
(6, 'user', 'user_access', '用户授权', '用户授权', '', '[user|get_nickname] 对用户：[record|get_nickname] 进行了授权操作。详情：[details]', 1, 1480221441, 1480221563),
(7, 'user', 'role_add', '添加角色', '添加角色', '', '[user|get_nickname] 添加了角色：[details]', 1, 1480251473, 1480251473),
(8, 'user', 'role_edit', '编辑角色', '编辑角色', '', '[user|get_nickname] 编辑了角色：[details]', 1, 1480252369, 1480252369),
(9, 'user', 'role_delete', '删除角色', '删除角色', '', '[user|get_nickname] 删除了角色：[details]', 1, 1480252580, 1480252580),
(10, 'user', 'role_enable', '启用角色', '启用角色', '', '[user|get_nickname] 启用了角色：[details]', 1, 1480252620, 1480252620),
(11, 'user', 'role_disable', '禁用角色', '禁用角色', '', '[user|get_nickname] 禁用了角色：[details]', 1, 1480252651, 1480252651),
(12, 'user', 'attachment_enable', '启用附件', '启用附件', '', '[user|get_nickname] 启用了附件：附件ID([details])', 1, 1480253226, 1480253332),
(13, 'user', 'attachment_disable', '禁用附件', '禁用附件', '', '[user|get_nickname] 禁用了附件：附件ID([details])', 1, 1480253267, 1480253340),
(14, 'user', 'attachment_delete', '删除附件', '删除附件', '', '[user|get_nickname] 删除了附件：附件ID([details])', 1, 1480253323, 1480253323),
(15, 'admin', 'config_add', '添加配置', '添加配置', '', '[user|get_nickname] 添加了配置，[details]', 1, 1480296196, 1480296196),
(16, 'admin', 'config_edit', '编辑配置', '编辑配置', '', '[user|get_nickname] 编辑了配置：[details]', 1, 1480296960, 1480296960),
(17, 'admin', 'config_enable', '启用配置', '启用配置', '', '[user|get_nickname] 启用了配置：[details]', 1, 1480298479, 1480298479),
(18, 'admin', 'config_disable', '禁用配置', '禁用配置', '', '[user|get_nickname] 禁用了配置：[details]', 1, 1480298506, 1480298506),
(19, 'admin', 'config_delete', '删除配置', '删除配置', '', '[user|get_nickname] 删除了配置：[details]', 1, 1480298532, 1480298532),
(20, 'admin', 'database_export', '备份数据库', '备份数据库', '', '[user|get_nickname] 备份了数据库：[details]', 1, 1480298946, 1480298946),
(21, 'admin', 'database_import', '还原数据库', '还原数据库', '', '[user|get_nickname] 还原了数据库：[details]', 1, 1480301990, 1480302022),
(22, 'admin', 'database_optimize', '优化数据表', '优化数据表', '', '[user|get_nickname] 优化了数据表：[details]', 1, 1480302616, 1480302616),
(23, 'admin', 'database_repair', '修复数据表', '修复数据表', '', '[user|get_nickname] 修复了数据表：[details]', 1, 1480302798, 1480302798),
(24, 'admin', 'database_backup_delete', '删除数据库备份', '删除数据库备份', '', '[user|get_nickname] 删除了数据库备份：[details]', 1, 1480302870, 1480302870),
(25, 'admin', 'hook_add', '添加钩子', '添加钩子', '', '[user|get_nickname] 添加了钩子：[details]', 1, 1480303198, 1480303198),
(26, 'admin', 'hook_edit', '编辑钩子', '编辑钩子', '', '[user|get_nickname] 编辑了钩子：[details]', 1, 1480303229, 1480303229),
(27, 'admin', 'hook_delete', '删除钩子', '删除钩子', '', '[user|get_nickname] 删除了钩子：[details]', 1, 1480303264, 1480303264),
(28, 'admin', 'hook_enable', '启用钩子', '启用钩子', '', '[user|get_nickname] 启用了钩子：[details]', 1, 1480303294, 1480303294),
(29, 'admin', 'hook_disable', '禁用钩子', '禁用钩子', '', '[user|get_nickname] 禁用了钩子：[details]', 1, 1480303409, 1480303409),
(30, 'admin', 'menu_add', '添加节点', '添加节点', '', '[user|get_nickname] 添加了节点：[details]', 1, 1480305468, 1480305468),
(31, 'admin', 'menu_edit', '编辑节点', '编辑节点', '', '[user|get_nickname] 编辑了节点：[details]', 1, 1480305513, 1480305513),
(32, 'admin', 'menu_delete', '删除节点', '删除节点', '', '[user|get_nickname] 删除了节点：[details]', 1, 1480305562, 1480305562),
(33, 'admin', 'menu_enable', '启用节点', '启用节点', '', '[user|get_nickname] 启用了节点：[details]', 1, 1480305630, 1480305630),
(34, 'admin', 'menu_disable', '禁用节点', '禁用节点', '', '[user|get_nickname] 禁用了节点：[details]', 1, 1480305659, 1480305659),
(35, 'admin', 'module_install', '安装模块', '安装模块', '', '[user|get_nickname] 安装了模块：[details]', 1, 1480307558, 1480307558),
(36, 'admin', 'module_uninstall', '卸载模块', '卸载模块', '', '[user|get_nickname] 卸载了模块：[details]', 1, 1480307588, 1480307588),
(37, 'admin', 'module_enable', '启用模块', '启用模块', '', '[user|get_nickname] 启用了模块：[details]', 1, 1480307618, 1480307618),
(38, 'admin', 'module_disable', '禁用模块', '禁用模块', '', '[user|get_nickname] 禁用了模块：[details]', 1, 1480307653, 1480307653),
(39, 'admin', 'module_export', '导出模块', '导出模块', '', '[user|get_nickname] 导出了模块：[details]', 1, 1480307682, 1480307682),
(40, 'admin', 'packet_install', '安装数据包', '安装数据包', '', '[user|get_nickname] 安装了数据包：[details]', 1, 1480308342, 1480308342),
(41, 'admin', 'packet_uninstall', '卸载数据包', '卸载数据包', '', '[user|get_nickname] 卸载了数据包：[details]', 1, 1480308372, 1480308372),
(42, 'admin', 'system_config_update', '更新系统设置', '更新系统设置', '', '[user|get_nickname] 更新了系统设置：[details]', 1, 1480309555, 1480309642);

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_attachment`
--

CREATE TABLE IF NOT EXISTS `lp_admin_attachment` (
  `id` int(11) unsigned NOT NULL,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '文件名',
  `module` varchar(32) NOT NULL DEFAULT '' COMMENT '模块名，由哪个模块上传的',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '文件路径',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '文件链接',
  `mime` varchar(128) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `ext` char(50) NOT NULL DEFAULT '' COMMENT '文件类型',
  `size` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT 'sha1 散列值',
  `driver` varchar(16) NOT NULL DEFAULT 'local' COMMENT '上传驱动',
  `download` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `width` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '图片宽度',
  `height` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '图片高度'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='附件表';

--
-- 转存表中的数据 `lp_admin_attachment`
--

INSERT INTO `lp_admin_attachment` (`id`, `uid`, `name`, `module`, `path`, `thumb`, `url`, `mime`, `ext`, `size`, `md5`, `sha1`, `driver`, `download`, `create_time`, `update_time`, `sort`, `status`, `width`, `height`) VALUES
(1, 1, '1e8af5d087900e7d607c43e3e5095591.png', 'admin', 'uploads/images/20200317/1cde5cd3040926f7422e9fb8aa35cd58.png', '', '', 'image/png', 'png', 12131, 'f9121f6ced4fddb62ebbe1bc691c355f', 'c59646bf6b3d42232cdb1d6bd6a3b1fd7dc7d706', 'local', 0, 1584417436, 1584417436, 100, 1, 500, 200),
(2, 1, '-5f36a52a36b8e1e3.gif', 'admin', 'uploads/images/20200317/1e98b720224f19f259e2c5f6b661fd88.gif', '', '', 'image/gif', 'gif', 22261, '9c14064509497feabadd9c93b6e488b8', 'bb9cb37baf33eb459ee1970077fd936b2f23426a', 'local', 0, 1584417459, 1584417459, 100, 1, 100, 100),
(3, 1, 'default_logo.png', 'manage', 'uploads/images/20200317/361abb1dac15dde26bef2975bc798cbe.png', '', '', 'image/png', 'png', 91908, '7601514c049c3f8cf821247b20e8e3ba', 'db86ba0fc31ae9950d1117b043d3523fbc816f9e', 'local', 0, 1584417566, 1584417566, 100, 1, 241, 260),
(4, 1, '2.jpg', 'manage', 'uploads/images/20200318/890b37da9b99760689359a4b2e0dfe14.jpg', '', '', 'image/jpeg', 'jpg', 92402, '120b1038ba3502c5a37ed0c084a7e8a7', 'e3dd6e093c502443f4c1be1c119c80820ee2d27c', 'local', 0, 1584544107, 1584544107, 100, 1, 800, 300),
(5, 1, 'IMG_20200406_004042.jpg', 'admin', 'uploads/images/20200406/7e628054f90b5854f2fd610e52f6f0e7.jpg', '', '', 'image/jpeg', 'jpg', 95934, 'bea83a9754d9d289905d1d672e3cc820', 'addd8abe1a7ba9083ccf3e301a0e08f9f244a88c', 'local', 0, 1586104865, 1586104865, 100, 1, 745, 739),
(6, 1, 'IMG_20200406_004241.png', 'admin', 'uploads/images/20200406/32ee7192e39d9ec4c6193931dae44292.png', '', '', 'image/png', 'png', 46310, '3a6fdbe20667ccbb6162a4a6e75f9ba2', '7ef213698692d9874935fceffa9c1dec16bf3f0e', 'local', 0, 1586104983, 1586104983, 100, 1, 579, 572),
(7, 1, '20190624060415595.png', 'manage', 'uploads/images/20200420/9ba3170f772e46677f8bcc1348af4c1c.png', '', '', 'image/png', 'png', 618556, 'cfeca6e3923c22d2fc871d485f68df98', '6e9fb2e69b0a71ccf7fbf9b01ff51b00383b6397', 'local', 0, 1587392033, 1587392033, 100, 1, 3042, 2497),
(8, 1, 'QQ截图20200420221220.png', 'manage', 'uploads/images/20200420/5be8873d41f73023d873ea5a47a69ff9.png', '', '', 'image/png', 'png', 72431, 'c76af0f78724e077e806cbc5f16b8146', '3ae3eb3c674e6cdfce2ab9f1da804a1d31182c92', 'local', 0, 1587392329, 1587392329, 100, 1, 1226, 565),
(9, 1, 'QQ截图20200423225952.png', 'manage', 'uploads/images/20200423/f6bd2d3a9be90308658254e11d692651.png', '', '', 'image/png', 'png', 325388, '1aabee0e42d36a79287cb291a5becd68', '81c1510e45199aa722cc59ca31373d191df5148d', 'local', 0, 1587653997, 1587653997, 100, 1, 840, 354),
(10, 1, '2544204669963206.png', 'manage', 'uploads/images/20200423/ed12715b20871d16dadb7e9d7c568df5.png', '', '', 'image/png', 'png', 4519, '39444ed9a817e1b49a82a5c1c91612ea', '0a002ccd34f47e6d8f9b520bde0daf8a4ae98032', 'local', 0, 1587655171, 1587655171, 100, 1, 620, 112),
(11, 1, '04591498991372034.png', 'manage', 'uploads/images/20200424/86eb8ddc9f8f27c2da65fefe45c7a407.png', '', '', 'image/png', 'png', 153097, 'd4dda32f83fe3c530c343b072a99d1e4', 'dd2b799d6e6cd35518af3afe73c9740b7914200c', 'local', 0, 1587740813, 1587740813, 100, 1, 500, 211),
(12, 1, '7521297284948143.png', 'manage', 'uploads/images/20200424/0cf2eef5a47c9eb3c32a4ae598872de6.png', '', '', 'image/png', 'png', 185032, 'b5fa47f4c9c6db23c4e9e20de78823c6', 'f593a743bc02cea3b84b817b703610e1c174be20', 'local', 0, 1587741094, 1587741094, 100, 1, 496, 212),
(13, 1, '03189525165483986.png', 'manage', 'uploads/images/20200424/d5484a4e7f87ea6d12360127aac685ca.png', '', '', 'image/png', 'png', 454585, 'cd83b6c70df12bb397b1b5dd4ff4ada5', 'd7369127c9bdd442a7b6d6b9de3e928148e11397', 'local', 0, 1587741175, 1587741175, 100, 1, 838, 354),
(14, 1, '8301022183735185.png', 'manage', 'uploads/images/20200424/9a4cbba66ad3cee675db86432494fd27.png', '', '', 'image/png', 'png', 14000, '8e8a66b28dc8c90611a79e1c8b7841de', '5323a49292f36ae9ce53f76d9dae4a3bdfc2366d', 'local', 0, 1587741192, 1587741192, 100, 1, 480, 151),
(15, 1, '4739256500877034.png', 'manage', 'uploads/images/20200601/2721f88a84114571eee60512a916c626.png', '', '', 'image/png', 'png', 6581, 'fcb1977252924ffafa57a89cbac090ac', '5c71ef2d6cc76c2edb0849c746601620b95fc614', 'local', 0, 1591022441, 1591022441, 100, 1, 332, 156),
(16, 1, '5410674734130363.png', 'manage', 'uploads/images/20200601/eac888617397fa48ad35333c7c3530f7.png', '', '', 'image/png', 'png', 14266, '31398fe7ef7eb6c898c979933f1cf9bc', '09619b24a46f521244e342a66a96e328f2bf5b98', 'local', 0, 1591022692, 1591022692, 100, 1, 1005, 229),
(17, 1, 'QQ截图20200601222710.png', 'manage', 'uploads/images/20200601/74ef6dcdbc5e0a7464ead153cf48ff98.png', '', '', 'image/png', 'png', 21092, 'd83ee581a039ab7ae48fd5f92ec4bee1', 'ef37f1d69fdfcbe636744d397a52593010f72117', 'local', 0, 1591022763, 1591022763, 100, 1, 1229, 357),
(18, 1, '269435341200984.png', 'manage', 'uploads/images/20200601/681d11317505a040f8af54295eacd074.png', '', '', 'image/png', 'png', 5506, '9c4f398733b41fa8e8d80aa273de592e', 'e292e209647c85b4a1998b142d973b6201cc29ef', 'local', 0, 1591023362, 1591023362, 100, 1, 339, 124),
(19, 1, '9143531882440927.png', 'manage', 'uploads/images/20200601/339a8f249d7b5b4567ff0aabdb547fec.png', '', '', 'image/png', 'png', 11091, '2ae1979fcce4daff8f35abafb613cfcf', '2d7710fb9e06e8f5c49dd6fdca90db4b9c5d9560', 'local', 0, 1591023376, 1591023376, 100, 1, 977, 207),
(20, 1, 'QQ图片20200602164503.png', 'manage', 'uploads/images/20200602/bd41d3df6e284beb13e02c1ef447b202.png', '', '', 'image/png', 'png', 82667, '91e5fbf88bd9a2173fb73e3b8246a455', '0c231e25b2af44c18bced5871fbc9322cdbe9a66', 'local', 0, 1591087511, 1591087511, 100, 1, 1558, 416),
(21, 1, 'QQ截图20200729091846.png', 'manage', 'uploads/images/20200729/c8f1451e5b8a160a6563ca5377a726ef.png', '', '', 'image/png', 'png', 541503, '8a22f4a756a38abcad23f4abfccb063f', '7f541dfccbd12f5b0ac15128d652407416006820', 'local', 0, 1595985538, 1595985538, 100, 1, 659, 346),
(22, 1, '7303440920687692.png', 'manage', 'uploads/images/20200729/1ada445054eafffd278dc0077bbe3ff3.png', '', '', 'image/png', 'png', 224788, '2756955b2476eaf0003238224cf37462', 'af6471ab47aec6e6bcd9d31fa2186543e9467ce3', 'local', 0, 1595985662, 1595985662, 100, 1, 656, 368),
(23, 1, '8800296989804384.png', 'manage', 'uploads/images/20200729/81cd177f32d108a2996d0d9c2c59277a.png', '', '', 'image/png', 'png', 558645, '31ad2b1e79756ccc0ce99ff64bf6c3cd', '4cc6e2fd178aeb33c1fbb64fec9224c7bd6485c3', 'local', 0, 1595985748, 1595985748, 100, 1, 660, 347),
(24, 1, '3499633083873388.png', 'manage', 'uploads/images/20200729/8b25987a08c6a69e9e98921a88b974db.png', '', '', 'image/png', 'png', 25175, 'e71dfb13f6a824d559b6e1098170eb52', '0fd2388d93979022a446954390585401670d7730', 'local', 0, 1595985774, 1595985774, 100, 1, 663, 136),
(25, 1, '510609653970493.png', 'manage', 'uploads/images/20200729/c2e5b24f65add5aef3c540327d481c27.png', '', '', 'image/png', 'png', 49758, '23ded0cf16dadc33f37df4969e281f1a', '644b17a4a23587c8a296b337234ba53bd809d18d', 'local', 0, 1595985788, 1595985788, 100, 1, 638, 167),
(26, 1, '5291309786647351.png', 'manage', 'uploads/images/20200729/6ade614b1637baaa12b571781d460c66.png', '', '', 'image/png', 'png', 57149, '146912195c83ecbbc40d9f89669c0f78', 'c1ac96a766a1d2812be02a3081c6cfe57eab2985', 'local', 0, 1595985799, 1595985799, 100, 1, 659, 258),
(27, 1, '060335402697703655.png', 'manage', 'uploads/images/20200729/d5cf325e4c41bbba88e9cd58a2b31b09.png', '', '', 'image/png', 'png', 30862, 'c6ab1d9bc3395c08a686ba5ab25ce9ea', '9063a6f0d448f2f000f82da0e2ca303dbb83dea6', 'local', 0, 1595985811, 1595985811, 100, 1, 652, 138),
(28, 1, '6013463819228273.png', 'manage', 'uploads/images/20200729/fd46d0b821793416fac634591cf403ba.png', '', '', 'image/png', 'png', 50144, '5d2ec01de6a30a91abc24a091cf10707', 'b1f933065ee92ed0b94d5aefc1dc6f31765ce0e7', 'local', 0, 1595985819, 1595985819, 100, 1, 663, 219),
(29, 1, '19658036754241048.png', 'manage', 'uploads/images/20200729/ea598bdc3fd1111569766d7247bb403c.png', '', '', 'image/png', 'png', 41907, 'be39944eba5814a454a0d6dab919f3f5', '9dc105bca84ff8d81886208a2196163ec25ca4e6', 'local', 0, 1595985830, 1595985830, 100, 1, 727, 168),
(30, 1, '24132747500919716.png', 'manage', 'uploads/images/20200729/42e50abb08150dde35ffceddee1123bb.png', '', '', 'image/png', 'png', 70843, 'a6665671d30c3b1bbb697fc0d5e80db3', 'cfb924d5cb9d8c52f9bcaf4630f4812bfc3d367a', 'local', 0, 1595985845, 1595985845, 100, 1, 668, 214),
(31, 1, '14432849520748858.png', 'manage', 'uploads/images/20200729/354b26272904e799aad3a9e873b8f831.png', '', '', 'image/png', 'png', 140555, '57b594756b9ed2d0031f59f734e46c1d', 'cfb1886b51e0e8da13a7854934a3e263013f5bc8', 'local', 0, 1595985871, 1595985871, 100, 1, 602, 473),
(32, 1, '5339130841232331.png', 'manage', 'uploads/images/20200729/26dd352dfd075a9a30c875e94362b68b.png', '', '', 'image/png', 'png', 225996, 'ecf6ca465599292868e6982472c074f2', '1bc1ea0d34c7341aaf21bad9c0be1897949268f1', 'local', 0, 1595985884, 1595985884, 100, 1, 681, 376),
(33, 1, '16210M009-0.jpg', 'manage', 'uploads/images/20200806/c8339725e95096794c691d0330aa3755.jpg', '', '', 'image/jpeg', 'jpg', 38915, '15c6f8e2688d804adc8562520f72e057', 'f552d7bfc07894d76d5712496969d8f11b0bb8c3', 'local', 0, 1596692763, 1596692763, 100, 1, 640, 365),
(34, 1, '8324670624014527.png', 'manage', 'uploads/images/20200806/3e75a55b9013f28bf0af0e076ccc915a.png', '', '', 'image/png', 'png', 615558, 'd451fb1c53da4f94172f0215f9d2ef2a', 'c34bb2f947e8d2a96be2d16137bd59489c3bd0ed', 'local', 0, 1596692824, 1596692824, 100, 1, 802, 531),
(35, 1, '72988720835068.png', 'manage', 'uploads/images/20200806/87e2fbc264874f146375cd125c560ee4.png', '', '', 'image/png', 'png', 341566, 'a2396f84dd54fb71a7cda5b985812fe0', 'cd48ce8f5d2206e1520dde0a1743271e48d83480', 'local', 0, 1596692834, 1596692834, 100, 1, 801, 419),
(36, 1, '41156947920129827.png', 'manage', 'uploads/images/20200806/12eddb54a3cb84e507c761c5b9137dd3.png', '', '', 'image/png', 'png', 700618, '920df099018bf8deab22a0e66041d4e6', 'bef926aab03f0224c2017a990bd87d5a489a9cbc', 'local', 0, 1596692848, 1596692848, 100, 1, 797, 524),
(37, 1, '20955883251861884.png', 'manage', 'uploads/images/20200806/23c843aff3b3e5bb5fc60bff77348a77.png', '', '', 'image/png', 'png', 610888, '01236d971998ac362fd815d116fa27b8', 'f793895605ae86d031830d4da6d239e07d33d5ea', 'local', 0, 1596692859, 1596692859, 100, 1, 795, 524),
(38, 1, '9769931616704992.png', 'manage', 'uploads/images/20200806/be7ce2632b24888979331f0ce8671a00.png', '', '', 'image/png', 'png', 754299, '09d750b984a2666987724c98728a54de', 'bde2d3da668b7509a42dac70e401780bcfdb9cf0', 'local', 0, 1596692874, 1596692874, 100, 1, 795, 784),
(39, 1, '28915745287624195.png', 'manage', 'uploads/images/20200806/31c15640b867057d648c4729b0dd4212.png', '', '', 'image/png', 'png', 916821, '2c3d34c069010d7b8eca61d1dd899255', 'c7667c58586f61f1d06193e7425b783a6bb245f1', 'local', 0, 1596693054, 1596693054, 100, 1, 962, 598),
(40, 1, '397535781315582.png', 'manage', 'uploads/images/20200806/8ca086e73ad70d65df8ee99f7024c8a1.png', '', '', 'image/png', 'png', 753046, 'b92e3806572959d2ad8548bcaa14ecb2', '3817979e5acdf7d6ecf999065181a3e9284422b5', 'local', 0, 1596693118, 1596693118, 100, 1, 958, 572);

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_config`
--

CREATE TABLE IF NOT EXISTS `lp_admin_config` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '名称',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '标题',
  `group` varchar(32) NOT NULL DEFAULT '' COMMENT '配置分组',
  `type` varchar(32) NOT NULL DEFAULT '' COMMENT '类型',
  `value` text NOT NULL COMMENT '配置值',
  `options` text NOT NULL COMMENT '配置项',
  `tips` varchar(256) NOT NULL DEFAULT '' COMMENT '配置提示',
  `ajax_url` varchar(256) NOT NULL DEFAULT '' COMMENT '联动下拉框ajax地址',
  `next_items` varchar(256) NOT NULL DEFAULT '' COMMENT '联动下拉框的下级下拉框名，多个以逗号隔开',
  `param` varchar(32) NOT NULL DEFAULT '' COMMENT '联动下拉框请求参数名',
  `format` varchar(32) NOT NULL DEFAULT '' COMMENT '格式，用于格式文本',
  `table` varchar(32) NOT NULL DEFAULT '' COMMENT '表名，只用于快速联动类型',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '2' COMMENT '联动级别，只用于快速联动类型',
  `key` varchar(32) NOT NULL DEFAULT '' COMMENT '键字段，只用于快速联动类型',
  `option` varchar(32) NOT NULL DEFAULT '' COMMENT '值字段，只用于快速联动类型',
  `pid` varchar(32) NOT NULL DEFAULT '' COMMENT '父级id字段，只用于快速联动类型',
  `ak` varchar(32) NOT NULL DEFAULT '' COMMENT '百度地图appkey',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态：0禁用，1启用'
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统配置表';

--
-- 转存表中的数据 `lp_admin_config`
--

INSERT INTO `lp_admin_config` (`id`, `name`, `title`, `group`, `type`, `value`, `options`, `tips`, `ajax_url`, `next_items`, `param`, `format`, `table`, `level`, `key`, `option`, `pid`, `ak`, `create_time`, `update_time`, `sort`, `status`) VALUES
(1, 'web_site_status', '站点开关', 'base', 'switch', '1', '', '站点关闭后将不能访问，后台可正常登录', '', '', '', '', '', 2, '', '', '', '', 1475240395, 1477403914, 1, 1),
(2, 'web_site_title', '站点标题', 'base', 'text', '浅唱春天博客', '', '调用方式：<code>config(''web_site_title'')</code>', '', '', '', '', '', 2, '', '', '', '', 1475240646, 1477710341, 2, 1),
(3, 'web_site_slogan', '站点标语', 'base', 'text', '浅唱春天博客', '', '站点口号，调用方式：<code>config(''web_site_slogan'')</code>', '', '', '', '', '', 2, '', '', '', '', 1475240994, 1477710357, 3, 1),
(4, 'web_site_logo', '站点LOGO', 'base', 'image', '1', '', '', '', '', '', '', '', 2, '', '', '', '', 1475241067, 1475241067, 4, 1),
(5, 'web_site_description', '站点描述', 'base', 'textarea', '青春因为爱情而美丽，欢迎来访~博客建立于2017年2月，内容部分收集自互联网，如有侵权请联系站长删除；本站文章注明为原创的文章在转载时请注明出处。座右铭：水不撩不知深浅，人不拼怎知输赢', '', '网站描述，有利于搜索引擎抓取相关信息', '', '', '', '', '', 2, '', '', '', '', 1475241186, 1475241186, 6, 1),
(6, 'web_site_keywords', '站点关键词', 'base', 'text', '浅唱春天,glping.net,www.glping.net	', '', '网站搜索引擎关键字', '', '', '', '', '', 2, '', '', '', '', 1475241328, 1475241328, 7, 1),
(7, 'web_site_copyright', '版权信息', 'base', 'text', '©浅唱春天博客', '', '调用方式：<code>config(''web_site_copyright'')</code>', '', '', '', '', '', 2, '', '', '', '', 1475241416, 1477710383, 8, 1),
(8, 'web_site_icp', '备案信息', 'base', 'text', '蜀ICP备17008374号-1', '', '调用方式：<code>config(''web_site_icp'')</code>', '', '', '', '', '', 2, '', '', '', '', 1475241441, 1477710441, 9, 1),
(9, 'web_site_statistics', '站点统计', 'base', 'textarea', '<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? "https://" : "http://");document.write(unescape("%3Cspan id=''cnzz_stat_icon_1261328619''%3E%3C/span%3E%3Cscript src=''" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1261328619%26show%3Dpic'' type=''text/javascript''%3E%3C/script%3E"));</script>', '', '网站统计代码，支持百度、Google、cnzz等，调用方式：<code>config(''web_site_statistics'')</code>', '', '', '', '', '', 2, '', '', '', '', 1475241498, 1477710455, 10, 1),
(10, 'config_group', '配置分组', 'system', 'array', 'base:基本\r\nsystem:系统\r\nupload:上传\r\ndevelop:开发\r\ndatabase:数据库', '', '', '', '', '', '', '', 2, '', '', '', '', 1475241716, 1477649446, 100, 1),
(11, 'form_item_type', '配置类型', 'system', 'array', 'text:单行文本\r\ntextarea:多行文本\r\nstatic:静态文本\r\npassword:密码\r\ncheckbox:复选框\r\nradio:单选按钮\r\ndate:日期\r\ndatetime:日期+时间\r\nhidden:隐藏\r\nswitch:开关\r\narray:数组\r\nselect:下拉框\r\nlinkage:普通联动下拉框\r\nlinkages:快速联动下拉框\r\nimage:单张图片\r\nimages:多张图片\r\nfile:单个文件\r\nfiles:多个文件\r\nueditor:UEditor 编辑器\r\nwangeditor:wangEditor 编辑器\r\neditormd:markdown 编辑器\r\nckeditor:ckeditor 编辑器\r\nicon:字体图标\r\ntags:标签\r\nnumber:数字\r\nbmap:百度地图\r\ncolorpicker:取色器\r\njcrop:图片裁剪\r\nmasked:格式文本\r\nrange:范围\r\ntime:时间', '', '', '', '', '', '', '', 2, '', '', '', '', 1475241835, 1495853193, 100, 1),
(12, 'upload_file_size', '文件上传大小限制', 'upload', 'text', '0', '', '0为不限制大小，单位：kb', '', '', '', '', '', 2, '', '', '', '', 1475241897, 1477663520, 100, 1),
(13, 'upload_file_ext', '允许上传的文件后缀', 'upload', 'tags', 'doc,docx,xls,xlsx,ppt,pptx,pdf,wps,txt,rar,zip,gz,bz2,7z,mp4', '', '多个后缀用逗号隔开，不填写则不限制类型', '', '', '', '', '', 2, '', '', '', '', 1475241975, 1477649489, 100, 1),
(14, 'upload_image_size', '图片上传大小限制', 'upload', 'text', '0', '', '0为不限制大小，单位：kb', '', '', '', '', '', 2, '', '', '', '', 1475242015, 1477663529, 100, 1),
(15, 'upload_image_ext', '允许上传的图片后缀', 'upload', 'tags', 'gif,bmp,png,jpeg,jpg', '', '多个后缀用逗号隔开，不填写则不限制类型', '', '', '', '', '', 2, '', '', '', '', 1475242056, 1477649506, 100, 1),
(16, 'list_rows', '分页数量', 'system', 'number', '20', '', '每页的记录数', '', '', '', '', '', 2, '', '', '', '', 1475242066, 1476074507, 101, 1),
(17, 'system_color', '后台配色方案', 'system', 'radio', 'flat', 'default:Default\r\namethyst:Amethyst\r\ncity:City\r\nflat:Flat\r\nmodern:Modern\r\nsmooth:Smooth', '', '', '', '', '', '', 2, '', '', '', '', 1475250066, 1477316689, 102, 1),
(18, 'develop_mode', '开发模式', 'develop', 'radio', '0', '0:关闭\r\n1:开启', '', '', '', '', '', '', 2, '', '', '', '', 1476864205, 1476864231, 100, 1),
(19, 'app_trace', '显示页面Trace', 'develop', 'radio', '0', '0:否\r\n1:是', '', '', '', '', '', '', 2, '', '', '', '', 1476866355, 1476866355, 100, 1),
(21, 'data_backup_path', '数据库备份根路径', 'database', 'text', '../data/', '', '路径必须以 / 结尾', '', '', '', '', '', 2, '', '', '', '', 1477017745, 1477018467, 100, 1),
(22, 'data_backup_part_size', '数据库备份卷大小', 'database', 'text', '20971520', '', '该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M', '', '', '', '', '', 2, '', '', '', '', 1477017886, 1477017886, 100, 1),
(23, 'data_backup_compress', '数据库备份文件是否启用压缩', 'database', 'radio', '1', '0:否\r\n1:是', '压缩备份文件需要PHP环境支持 <code>gzopen</code>, <code>gzwrite</code>函数', '', '', '', '', '', 2, '', '', '', '', 1477017978, 1477018172, 100, 1),
(24, 'data_backup_compress_level', '数据库备份文件压缩级别', 'database', 'radio', '9', '1:最低\r\n4:一般\r\n9:最高', '数据库备份文件的压缩级别，该配置在开启压缩时生效', '', '', '', '', '', 2, '', '', '', '', 1477018083, 1477018083, 100, 1),
(25, 'top_menu_max', '顶部导航模块数量', 'system', 'text', '10', '', '设置顶部导航默认显示的模块数量', '', '', '', '', '', 2, '', '', '', '', 1477579289, 1477579289, 103, 1),
(26, 'web_site_logo_text', '站点LOGO文字', 'base', 'image', '1', '', '', '', '', '', '', '', 2, '', '', '', '', 1477620643, 1477620643, 5, 1),
(27, 'upload_image_thumb', '缩略图尺寸', 'upload', 'text', '', '', '不填写则不生成缩略图，如需生成 <code>300x300</code> 的缩略图，则填写 <code>300,300</code> ，请注意，逗号必须是英文逗号', '', '', '', '', '', 2, '', '', '', '', 1477644150, 1477649513, 100, 1),
(28, 'upload_image_thumb_type', '缩略图裁剪类型', 'upload', 'radio', '1', '1:等比例缩放\r\n2:缩放后填充\r\n3:居中裁剪\r\n4:左上角裁剪\r\n5:右下角裁剪\r\n6:固定尺寸缩放', '该项配置只有在启用生成缩略图时才生效', '', '', '', '', '', 2, '', '', '', '', 1477646271, 1477649521, 100, 1),
(29, 'upload_thumb_water', '添加水印', 'upload', 'switch', '0', '', '', '', '', '', '', '', 2, '', '', '', '', 1477649648, 1477649648, 100, 1),
(30, 'upload_thumb_water_pic', '水印图片', 'upload', 'image', '438', '', '只有开启水印功能才生效', '', '', '', '', '', 2, '', '', '', '', 1477656390, 1477656390, 100, 1),
(31, 'upload_thumb_water_position', '水印位置', 'upload', 'radio', '5', '1:左上角\r\n2:上居中\r\n3:右上角\r\n4:左居中\r\n5:居中\r\n6:右居中\r\n7:左下角\r\n8:下居中\r\n9:右下角', '只有开启水印功能才生效', '', '', '', '', '', 2, '', '', '', '', 1477656528, 1477656528, 100, 1),
(32, 'upload_thumb_water_alpha', '水印透明度', 'upload', 'text', '50', '', '请输入0~100之间的数字，数字越小，透明度越高', '', '', '', '', '', 2, '', '', '', '', 1477656714, 1477661309, 100, 1),
(33, 'wipe_cache_type', '清除缓存类型', 'system', 'checkbox', 'TEMP_PATH', 'TEMP_PATH:应用缓存\r\nLOG_PATH:应用日志\r\nCACHE_PATH:项目模板缓存', '清除缓存时，要删除的缓存类型', '', '', '', '', '', 2, '', '', '', '', 1477727305, 1477727305, 100, 1),
(34, 'captcha_signin', '后台验证码开关', 'system', 'switch', '1', '', '后台登录时是否需要验证码', '', '', '', '', '', 2, '', '', '', '', 1478771958, 1478771958, 99, 1),
(35, 'home_default_module', '前台默认模块', 'system', 'select', 'index', '', '前台默认访问的模块，该模块必须有Index控制器和index方法', '', '', '', '', '', 0, '', '', '', '', 1486714723, 1486715620, 104, 1),
(36, 'minify_status', '开启minify', 'system', 'switch', '1', '', '开启minify会压缩合并js、css文件，可以减少资源请求次数，如果不支持minify，可关闭', '', '', '', '', '', 0, '', '', '', '', 1487035843, 1487035843, 99, 1),
(37, 'upload_driver', '上传驱动', 'upload', 'radio', 'local', 'local:本地', '图片或文件上传驱动', '', '', '', '', '', 0, '', '', '', '', 1501488567, 1501490821, 100, 1),
(38, 'system_log', '系统日志', 'system', 'switch', '1', '', '是否开启系统日志功能', '', '', '', '', '', 0, '', '', '', '', 1512635391, 1512635391, 99, 1),
(39, 'asset_version', '资源版本号', 'develop', 'text', '20190101', '', '可通过修改版号强制用户更新静态文件', '', '', '', '', '', 0, '', '', '', '', 1522143239, 1522143239, 100, 1),
(40, 'web_site_hits', '点击量', 'base', 'text', '0', '', '点击量', '', '', '', '', '', 2, '', '', '', '', 1475241328, 1475241328, 7, 1),
(41, 'web_site_create_time', '创建时间', 'base', 'text', '2017-02-18', '', '创建时间', '', '', '', '', '', 2, '', '', '', '', 1475241328, 1475241328, 7, 1),
(42, 'web_site_version', '系统版本', 'base', 'text', '3.0', '', '系统版本', '', '', '', '', '', 2, '', '', '', '', 1475241328, 1475241328, 7, 1),
(43, 'web_site_ali_qr', '支付宝收款码', 'base', 'image', '5', '', '支付宝收款码', '', '', '', '', '', 2, '', '', '', '', 1475241328, 1475241328, 7, 1),
(44, 'web_site_wx_qr', '微信收款码', 'base', 'image', '6', '', '微信收款码', '', '', '', '', '', 2, '', '', '', '', 1475241328, 1475241328, 7, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_hook`
--

CREATE TABLE IF NOT EXISTS `lp_admin_hook` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `plugin` varchar(32) NOT NULL DEFAULT '' COMMENT '钩子来自哪个插件',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子描述',
  `system` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统钩子',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='钩子表';

--
-- 转存表中的数据 `lp_admin_hook`
--

INSERT INTO `lp_admin_hook` (`id`, `name`, `plugin`, `description`, `system`, `create_time`, `update_time`, `status`) VALUES
(1, 'admin_index', '', '后台首页', 1, 1468174214, 1477757518, 1),
(2, 'plugin_index_tab_list', '', '插件扩展tab钩子', 1, 1468174214, 1468174214, 1),
(3, 'module_index_tab_list', '', '模块扩展tab钩子', 1, 1468174214, 1468174214, 1),
(4, 'page_tips', '', '每个页面的提示', 1, 1468174214, 1468174214, 1),
(5, 'signin_footer', '', '登录页面底部钩子', 1, 1479269315, 1479269315, 1),
(6, 'signin_captcha', '', '登录页面验证码钩子', 1, 1479269315, 1479269315, 1),
(7, 'signin', '', '登录控制器钩子', 1, 1479386875, 1479386875, 1),
(8, 'upload_attachment', '', '附件上传钩子', 1, 1501493808, 1501493808, 1),
(9, 'page_plugin_js', '', '页面插件js钩子', 1, 1503633591, 1503633591, 1),
(10, 'page_plugin_css', '', '页面插件css钩子', 1, 1503633591, 1503633591, 1),
(11, 'signin_sso', '', '单点登录钩子', 1, 1503633591, 1503633591, 1),
(12, 'signout_sso', '', '单点退出钩子', 1, 1503633591, 1503633591, 1),
(13, 'user_add', '', '添加用户钩子', 1, 1503633591, 1503633591, 1),
(14, 'user_edit', '', '编辑用户钩子', 1, 1503633591, 1503633591, 1),
(15, 'user_delete', '', '删除用户钩子', 1, 1503633591, 1503633591, 1),
(16, 'user_enable', '', '启用用户钩子', 1, 1503633591, 1503633591, 1),
(17, 'user_disable', '', '禁用用户钩子', 1, 1503633591, 1503633591, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_hook_plugin`
--

CREATE TABLE IF NOT EXISTS `lp_admin_hook_plugin` (
  `id` int(11) unsigned NOT NULL,
  `hook` varchar(32) NOT NULL DEFAULT '' COMMENT '钩子id',
  `plugin` varchar(32) NOT NULL DEFAULT '' COMMENT '插件标识',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(11) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='钩子-插件对应表';

--
-- 转存表中的数据 `lp_admin_hook_plugin`
--

INSERT INTO `lp_admin_hook_plugin` (`id`, `hook`, `plugin`, `create_time`, `update_time`, `sort`, `status`) VALUES
(1, 'admin_index', 'SystemInfo', 1477757503, 1477757503, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_icon`
--

CREATE TABLE IF NOT EXISTS `lp_admin_icon` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '图标名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图标css地址',
  `prefix` varchar(32) NOT NULL DEFAULT '' COMMENT '图标前缀',
  `font_family` varchar(32) NOT NULL DEFAULT '' COMMENT '字体名',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='图标表';

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_icon_list`
--

CREATE TABLE IF NOT EXISTS `lp_admin_icon_list` (
  `id` bigint(20) unsigned NOT NULL,
  `icon_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所属图标id',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '图标标题',
  `class` varchar(255) NOT NULL DEFAULT '' COMMENT '图标类名',
  `code` varchar(128) NOT NULL DEFAULT '' COMMENT '图标关键词'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='详细图标列表';

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_log`
--

CREATE TABLE IF NOT EXISTS `lp_admin_log` (
  `id` int(11) unsigned NOT NULL COMMENT '主键',
  `action_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '行为id',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '触发行为的表',
  `record_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '触发行为的数据id',
  `remark` longtext NOT NULL COMMENT '日志备注',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间'
) ENGINE=InnoDB AUTO_INCREMENT=402 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='行为日志表';

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_menu`
--

CREATE TABLE IF NOT EXISTS `lp_admin_menu` (
  `id` int(11) unsigned NOT NULL,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单id',
  `module` varchar(16) NOT NULL DEFAULT '' COMMENT '模块名称',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '菜单标题',
  `icon` varchar(64) NOT NULL DEFAULT '' COMMENT '菜单图标',
  `url_type` varchar(16) NOT NULL DEFAULT '' COMMENT '链接类型（link：外链，module：模块）',
  `url_value` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `url_target` varchar(16) NOT NULL DEFAULT '_self' COMMENT '链接打开方式：_blank,_self',
  `online_hide` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '网站上线后是否隐藏',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  `system_menu` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统菜单，系统菜单不可删除',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `params` varchar(255) NOT NULL DEFAULT '' COMMENT '参数'
) ENGINE=InnoDB AUTO_INCREMENT=409 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='后台菜单表';

--
-- 转存表中的数据 `lp_admin_menu`
--

INSERT INTO `lp_admin_menu` (`id`, `pid`, `module`, `title`, `icon`, `url_type`, `url_value`, `url_target`, `online_hide`, `create_time`, `update_time`, `sort`, `system_menu`, `status`, `params`) VALUES
(1, 0, 'admin', '首页', 'fa fa-fw fa-home', 'module_admin', 'admin/index/index', '_self', 0, 1467617722, 1477710540, 1, 1, 0, ''),
(2, 1, 'admin', '快捷操作', 'fa fa-fw fa-folder-open-o', 'module_admin', '', '_self', 0, 1467618170, 1597157371, 1, 1, 0, ''),
(3, 2, 'admin', '清空缓存', 'fa fa-fw fa-trash-o', 'module_admin', 'admin/index/wipecache', '_self', 0, 1467618273, 1597157371, 3, 1, 1, ''),
(4, 0, 'admin', '系统', 'fa fa-fw fa-gear', 'module_admin', 'admin/system/index', '_self', 0, 1467618361, 1561529921, 2, 1, 0, ''),
(5, 237, 'admin', '系统功能', 'si si-wrench', 'module_admin', '', '_self', 0, 1467618441, 1597157371, 1, 1, 1, ''),
(6, 5, 'admin', '系统设置', 'fa fa-fw fa-wrench', 'module_admin', 'admin/system/index', '_self', 0, 1467618490, 1597157371, 1, 1, 1, ''),
(7, 5, 'admin', '配置管理', 'fa fa-fw fa-gears', 'module_admin', 'admin/config/index', '_self', 0, 1467618618, 1597157371, 2, 1, 1, ''),
(8, 7, 'admin', '新增', '', 'module_admin', 'admin/config/add', '_self', 0, 1467618648, 1597157371, 1, 1, 1, ''),
(9, 7, 'admin', '编辑', '', 'module_admin', 'admin/config/edit', '_self', 0, 1467619566, 1597157371, 2, 1, 1, ''),
(10, 7, 'admin', '删除', '', 'module_admin', 'admin/config/delete', '_self', 0, 1467619583, 1597157371, 3, 1, 1, ''),
(11, 7, 'admin', '启用', '', 'module_admin', 'admin/config/enable', '_self', 0, 1467619609, 1597157371, 4, 1, 1, ''),
(12, 7, 'admin', '禁用', '', 'module_admin', 'admin/config/disable', '_self', 0, 1467619637, 1597157371, 5, 1, 1, ''),
(13, 5, 'admin', '节点管理', 'fa fa-fw fa-bars', 'module_admin', 'admin/menu/index', '_self', 0, 1467619882, 1597157371, 3, 1, 1, ''),
(14, 13, 'admin', '新增', '', 'module_admin', 'admin/menu/add', '_self', 0, 1467619902, 1597157371, 1, 1, 1, ''),
(15, 13, 'admin', '编辑', '', 'module_admin', 'admin/menu/edit', '_self', 0, 1467620331, 1597157371, 2, 1, 1, ''),
(16, 13, 'admin', '删除', '', 'module_admin', 'admin/menu/delete', '_self', 0, 1467620363, 1597157371, 3, 1, 1, ''),
(17, 13, 'admin', '启用', '', 'module_admin', 'admin/menu/enable', '_self', 0, 1467620386, 1597157371, 4, 1, 1, ''),
(18, 13, 'admin', '禁用', '', 'module_admin', 'admin/menu/disable', '_self', 0, 1467620404, 1597157371, 5, 1, 1, ''),
(19, 68, 'user', '权限管理', 'fa fa-fw fa-key', 'module_admin', '', '_self', 0, 1467688065, 1477710702, 1, 1, 1, ''),
(20, 19, 'user', '用户管理', 'fa fa-fw fa-user', 'module_admin', 'user/index/index', '_self', 0, 1467688137, 1477710702, 1, 1, 1, ''),
(21, 20, 'user', '新增', '', 'module_admin', 'user/index/add', '_self', 0, 1467688177, 1477710702, 1, 1, 1, ''),
(22, 20, 'user', '编辑', '', 'module_admin', 'user/index/edit', '_self', 0, 1467688202, 1477710702, 2, 1, 1, ''),
(23, 20, 'user', '删除', '', 'module_admin', 'user/index/delete', '_self', 0, 1467688219, 1477710702, 3, 1, 1, ''),
(24, 20, 'user', '启用', '', 'module_admin', 'user/index/enable', '_self', 0, 1467688238, 1477710702, 4, 1, 1, ''),
(25, 20, 'user', '禁用', '', 'module_admin', 'user/index/disable', '_self', 0, 1467688256, 1477710702, 5, 1, 1, ''),
(32, 4, 'admin', '扩展中心', 'si si-social-dropbox', 'module_admin', '', '_self', 0, 1467688853, 1597157371, 1, 1, 0, ''),
(33, 32, 'admin', '模块管理', 'fa fa-fw fa-th-large', 'module_admin', 'admin/module/index', '_self', 0, 1467689008, 1597157371, 1, 1, 1, ''),
(34, 33, 'admin', '导入', '', 'module_admin', 'admin/module/import', '_self', 0, 1467689153, 1597157371, 1, 1, 1, ''),
(35, 33, 'admin', '导出', '', 'module_admin', 'admin/module/export', '_self', 0, 1467689173, 1597157371, 2, 1, 1, ''),
(36, 33, 'admin', '安装', '', 'module_admin', 'admin/module/install', '_self', 0, 1467689192, 1597157371, 3, 1, 1, ''),
(37, 33, 'admin', '卸载', '', 'module_admin', 'admin/module/uninstall', '_self', 0, 1467689241, 1597157371, 4, 1, 1, ''),
(38, 33, 'admin', '启用', '', 'module_admin', 'admin/module/enable', '_self', 0, 1467689294, 1597157371, 5, 1, 1, ''),
(39, 33, 'admin', '禁用', '', 'module_admin', 'admin/module/disable', '_self', 0, 1467689312, 1597157371, 6, 1, 1, ''),
(40, 33, 'admin', '更新', '', 'module_admin', 'admin/module/update', '_self', 0, 1467689341, 1597157371, 7, 1, 1, ''),
(41, 32, 'admin', '插件管理', 'fa fa-fw fa-puzzle-piece', 'module_admin', 'admin/plugin/index', '_self', 0, 1467689527, 1597157371, 2, 1, 1, ''),
(42, 41, 'admin', '导入', '', 'module_admin', 'admin/plugin/import', '_self', 0, 1467689650, 1597157371, 1, 1, 1, ''),
(43, 41, 'admin', '导出', '', 'module_admin', 'admin/plugin/export', '_self', 0, 1467689665, 1597157371, 2, 1, 1, ''),
(44, 41, 'admin', '安装', '', 'module_admin', 'admin/plugin/install', '_self', 0, 1467689680, 1597157371, 3, 1, 1, ''),
(45, 41, 'admin', '卸载', '', 'module_admin', 'admin/plugin/uninstall', '_self', 0, 1467689700, 1597157371, 4, 1, 1, ''),
(46, 41, 'admin', '启用', '', 'module_admin', 'admin/plugin/enable', '_self', 0, 1467689730, 1597157371, 5, 1, 1, ''),
(47, 41, 'admin', '禁用', '', 'module_admin', 'admin/plugin/disable', '_self', 0, 1467689747, 1597157371, 6, 1, 1, ''),
(48, 41, 'admin', '设置', '', 'module_admin', 'admin/plugin/config', '_self', 0, 1467689789, 1597157371, 7, 1, 1, ''),
(49, 41, 'admin', '管理', '', 'module_admin', 'admin/plugin/manage', '_self', 0, 1467689846, 1597157371, 8, 1, 1, ''),
(50, 5, 'admin', '附件管理', 'fa fa-fw fa-cloud-upload', 'module_admin', 'admin/attachment/index', '_self', 0, 1467690161, 1597157371, 4, 1, 0, ''),
(51, 70, 'admin', '文件上传', '', 'module_admin', 'admin/attachment/upload', '_self', 0, 1467690240, 1597157371, 1, 1, 1, ''),
(52, 50, 'admin', '下载', '', 'module_admin', 'admin/attachment/download', '_self', 0, 1467690334, 1597157371, 1, 1, 1, ''),
(53, 50, 'admin', '启用', '', 'module_admin', 'admin/attachment/enable', '_self', 0, 1467690352, 1597157371, 2, 1, 1, ''),
(54, 50, 'admin', '禁用', '', 'module_admin', 'admin/attachment/disable', '_self', 0, 1467690369, 1597157371, 3, 1, 1, ''),
(55, 50, 'admin', '删除', '', 'module_admin', 'admin/attachment/delete', '_self', 0, 1467690396, 1597157371, 4, 1, 1, ''),
(56, 41, 'admin', '删除', '', 'module_admin', 'admin/plugin/delete', '_self', 0, 1467858065, 1597157371, 11, 1, 1, ''),
(57, 41, 'admin', '编辑', '', 'module_admin', 'admin/plugin/edit', '_self', 0, 1467858092, 1597157371, 10, 1, 1, ''),
(60, 41, 'admin', '新增', '', 'module_admin', 'admin/plugin/add', '_self', 0, 1467858421, 1597157371, 9, 1, 1, ''),
(61, 41, 'admin', '执行', '', 'module_admin', 'admin/plugin/execute', '_self', 0, 1467879016, 1597157371, 12, 1, 1, ''),
(62, 13, 'admin', '保存', '', 'module_admin', 'admin/menu/save', '_self', 0, 1468073039, 1597157371, 6, 1, 1, ''),
(64, 5, 'admin', '系统日志', 'fa fa-fw fa-book', 'module_admin', 'admin/log/index', '_self', 0, 1476111944, 1597157371, 5, 0, 1, ''),
(65, 5, 'admin', '数据库管理', 'fa fa-fw fa-database', 'module_admin', 'admin/database/index', '_self', 0, 1476111992, 1597157371, 7, 0, 0, ''),
(66, 32, 'admin', '数据包管理', 'fa fa-fw fa-database', 'module_admin', 'admin/packet/index', '_self', 0, 1476112326, 1597157371, 4, 0, 1, ''),
(67, 19, 'user', '角色管理', 'fa fa-fw fa-users', 'module_admin', 'user/role/index', '_self', 0, 1476113025, 1477710702, 3, 0, 1, ''),
(68, 0, 'user', '管理员', 'fa fa-fw fa-user', 'module_admin', 'user/index/index', '_self', 0, 1476193348, 1561529921, 3, 0, 0, ''),
(69, 32, 'admin', '钩子管理', 'fa fa-fw fa-anchor', 'module_admin', 'admin/hook/index', '_self', 0, 1476236193, 1597157371, 3, 0, 1, ''),
(70, 2, 'admin', '后台首页', 'fa fa-fw fa-tachometer', 'module_admin', 'admin/index/index', '_self', 0, 1476237472, 1597157371, 1, 0, 1, ''),
(71, 67, 'user', '新增', '', 'module_admin', 'user/role/add', '_self', 0, 1476256935, 1477710702, 1, 0, 1, ''),
(72, 67, 'user', '编辑', '', 'module_admin', 'user/role/edit', '_self', 0, 1476256968, 1477710702, 2, 0, 1, ''),
(73, 67, 'user', '删除', '', 'module_admin', 'user/role/delete', '_self', 0, 1476256993, 1477710702, 3, 0, 1, ''),
(74, 67, 'user', '启用', '', 'module_admin', 'user/role/enable', '_self', 0, 1476257023, 1477710702, 4, 0, 1, ''),
(75, 67, 'user', '禁用', '', 'module_admin', 'user/role/disable', '_self', 0, 1476257046, 1477710702, 5, 0, 1, ''),
(76, 20, 'user', '授权', '', 'module_admin', 'user/index/access', '_self', 0, 1476375187, 1477710702, 6, 0, 1, ''),
(77, 69, 'admin', '新增', '', 'module_admin', 'admin/hook/add', '_self', 0, 1476668971, 1597157371, 1, 0, 1, ''),
(78, 69, 'admin', '编辑', '', 'module_admin', 'admin/hook/edit', '_self', 0, 1476669006, 1597157371, 2, 0, 1, ''),
(79, 69, 'admin', '删除', '', 'module_admin', 'admin/hook/delete', '_self', 0, 1476669375, 1597157371, 3, 0, 1, ''),
(80, 69, 'admin', '启用', '', 'module_admin', 'admin/hook/enable', '_self', 0, 1476669427, 1597157371, 4, 0, 1, ''),
(81, 69, 'admin', '禁用', '', 'module_admin', 'admin/hook/disable', '_self', 0, 1476669564, 1597157371, 5, 0, 1, ''),
(183, 66, 'admin', '安装', '', 'module_admin', 'admin/packet/install', '_self', 0, 1476851362, 1597157371, 1, 0, 1, ''),
(184, 66, 'admin', '卸载', '', 'module_admin', 'admin/packet/uninstall', '_self', 0, 1476851382, 1597157371, 2, 0, 1, ''),
(185, 5, 'admin', '行为管理', 'fa fa-fw fa-bug', 'module_admin', 'admin/action/index', '_self', 0, 1476882441, 1597157371, 6, 0, 0, ''),
(186, 185, 'admin', '新增', '', 'module_admin', 'admin/action/add', '_self', 0, 1476884439, 1597157371, 1, 0, 1, ''),
(187, 185, 'admin', '编辑', '', 'module_admin', 'admin/action/edit', '_self', 0, 1476884464, 1597157371, 2, 0, 1, ''),
(188, 185, 'admin', '启用', '', 'module_admin', 'admin/action/enable', '_self', 0, 1476884493, 1597157371, 3, 0, 1, ''),
(189, 185, 'admin', '禁用', '', 'module_admin', 'admin/action/disable', '_self', 0, 1476884534, 1597157371, 4, 0, 1, ''),
(190, 185, 'admin', '删除', '', 'module_admin', 'admin/action/delete', '_self', 0, 1476884551, 1597157371, 5, 0, 1, ''),
(191, 65, 'admin', '备份数据库', '', 'module_admin', 'admin/database/export', '_self', 0, 1476972746, 1597157371, 1, 0, 1, ''),
(192, 65, 'admin', '还原数据库', '', 'module_admin', 'admin/database/import', '_self', 0, 1476972772, 1597157371, 2, 0, 1, ''),
(193, 65, 'admin', '优化表', '', 'module_admin', 'admin/database/optimize', '_self', 0, 1476972800, 1597157371, 3, 0, 1, ''),
(194, 65, 'admin', '修复表', '', 'module_admin', 'admin/database/repair', '_self', 0, 1476972825, 1597157371, 4, 0, 1, ''),
(195, 65, 'admin', '删除备份', '', 'module_admin', 'admin/database/delete', '_self', 0, 1476973457, 1597157371, 5, 0, 1, ''),
(207, 69, 'admin', '快速编辑', '', 'module_admin', 'admin/hook/quickedit', '_self', 0, 1477713770, 1597157371, 6, 0, 1, ''),
(208, 7, 'admin', '快速编辑', '', 'module_admin', 'admin/config/quickedit', '_self', 0, 1477713808, 1597157371, 6, 0, 1, ''),
(209, 185, 'admin', '快速编辑', '', 'module_admin', 'admin/action/quickedit', '_self', 0, 1477713939, 1597157371, 6, 0, 1, ''),
(210, 41, 'admin', '快速编辑', '', 'module_admin', 'admin/plugin/quickedit', '_self', 0, 1477713981, 1597157371, 13, 0, 1, ''),
(211, 64, 'admin', '日志详情', '', 'module_admin', 'admin/log/details', '_self', 0, 1480299320, 1597157371, 1, 0, 1, ''),
(212, 2, 'admin', '个人设置', 'fa fa-fw fa-user', 'module_admin', 'admin/index/profile', '_self', 0, 1489049767, 1597157371, 2, 0, 1, ''),
(213, 70, 'admin', '检查版本更新', '', 'module_admin', 'admin/index/checkupdate', '_self', 0, 1490588610, 1597157371, 2, 0, 1, ''),
(214, 68, 'user', '消息管理', 'fa fa-fw fa-comments-o', 'module_admin', '', '_self', 0, 1520492129, 1520492129, 100, 0, 0, ''),
(215, 214, 'user', '消息列表', 'fa fa-fw fa-th-list', 'module_admin', 'user/message/index', '_self', 0, 1520492195, 1520492195, 100, 0, 1, ''),
(216, 215, 'user', '新增', '', 'module_admin', 'user/message/add', '_self', 0, 1520492195, 1520492195, 100, 0, 1, ''),
(217, 215, 'user', '编辑', '', 'module_admin', 'user/message/edit', '_self', 0, 1520492195, 1520492195, 100, 0, 1, ''),
(218, 215, 'user', '删除', '', 'module_admin', 'user/message/delete', '_self', 0, 1520492195, 1520492195, 100, 0, 1, ''),
(219, 215, 'user', '启用', '', 'module_admin', 'user/message/enable', '_self', 0, 1520492195, 1520492195, 100, 0, 1, ''),
(220, 215, 'user', '禁用', '', 'module_admin', 'user/message/disable', '_self', 0, 1520492195, 1520492195, 100, 0, 1, ''),
(221, 215, 'user', '快速编辑', '', 'module_admin', 'user/message/quickedit', '_self', 0, 1520492195, 1520492195, 100, 0, 1, ''),
(222, 2, 'admin', '消息中心', 'fa fa-fw fa-comments-o', 'module_admin', 'admin/message/index', '_self', 0, 1520495992, 1597157371, 4, 0, 1, ''),
(223, 222, 'admin', '删除', '', 'module_admin', 'admin/message/delete', '_self', 0, 1520495992, 1597157371, 1, 0, 1, ''),
(224, 222, 'admin', '启用', '', 'module_admin', 'admin/message/enable', '_self', 0, 1520495992, 1597157371, 2, 0, 1, ''),
(225, 32, 'admin', '图标管理', 'fa fa-fw fa-tint', 'module_admin', 'admin/icon/index', '_self', 0, 1520908295, 1597157371, 5, 0, 1, ''),
(226, 225, 'admin', '新增', '', 'module_admin', 'admin/icon/add', '_self', 0, 1520908295, 1597157371, 1, 0, 1, ''),
(227, 225, 'admin', '编辑', '', 'module_admin', 'admin/icon/edit', '_self', 0, 1520908295, 1597157371, 2, 0, 1, ''),
(228, 225, 'admin', '删除', '', 'module_admin', 'admin/icon/delete', '_self', 0, 1520908295, 1597157371, 3, 0, 1, ''),
(229, 225, 'admin', '启用', '', 'module_admin', 'admin/icon/enable', '_self', 0, 1520908295, 1597157371, 4, 0, 1, ''),
(230, 225, 'admin', '禁用', '', 'module_admin', 'admin/icon/disable', '_self', 0, 1520908295, 1597157371, 5, 0, 1, ''),
(231, 225, 'admin', '快速编辑', '', 'module_admin', 'admin/icon/quickedit', '_self', 0, 1520908295, 1597157371, 6, 0, 1, ''),
(232, 225, 'admin', '图标列表', '', 'module_admin', 'admin/icon/items', '_self', 0, 1520923368, 1597157371, 7, 0, 1, ''),
(233, 225, 'admin', '更新图标', '', 'module_admin', 'admin/icon/reload', '_self', 0, 1520931908, 1597157371, 8, 0, 1, ''),
(234, 20, 'user', '快速编辑', '', 'module_admin', 'user/index/quickedit', '_self', 0, 1526028258, 1526028258, 100, 0, 1, ''),
(235, 67, 'user', '快速编辑', '', 'module_admin', 'user/role/quickedit', '_self', 0, 1526028282, 1526028282, 100, 0, 1, ''),
(236, 6, 'admin', '快速编辑', '', 'module_admin', 'admin/system/quickedit', '_self', 0, 1559054310, 1597157371, 1, 0, 1, ''),
(237, 0, 'admin', '内容管理', 'fa fa-fw fa-th-large', 'module_admin', 'mange/index/index', '_self', 0, 1561529283, 1569228979, 3, 0, 1, ''),
(295, 363, 'admin', '文章', 'fa fa-fw fa-align-justify', 'module_admin', 'manage/article/lists', '_self', 0, 1573547886, 1597157371, 1, 0, 1, ''),
(363, 237, 'admin', '文章', 'fa fa-fw fa-newspaper-o', 'module_admin', '', '_self', 0, 1577670018, 1597157371, 2, 0, 1, ''),
(387, 363, 'admin', '编辑文章', '', 'module_admin', 'manage/article/articleedit', '_self', 1, 1584083586, 1597157371, 2, 0, 1, ''),
(388, 363, 'admin', '添加文章', '', 'module_admin', 'manage/article/articleadd', '_self', 1, 1584086047, 1597157371, 3, 0, 1, ''),
(389, 237, 'admin', '公告', 'fa fa-fw fa-volume-up', 'module_admin', '', '_self', 0, 1584087464, 1597157371, 3, 0, 1, ''),
(390, 389, 'admin', '公告', 'fa fa-fw fa-align-justify', 'module_admin', 'manage/tip/lists', '_self', 0, 1584087496, 1597157371, 1, 0, 1, ''),
(391, 389, 'admin', '编辑公告', '', 'module_admin', 'manage/tip/tipadd', '_self', 1, 1584414477, 1597157371, 2, 0, 1, ''),
(392, 237, 'admin', '友情链接', 'fa fa-fw fa-unlink', 'module_admin', '', '_self', 0, 1584415670, 1597157371, 4, 0, 1, ''),
(393, 392, 'admin', '友情链接', 'fa fa-fw fa-align-justify', 'module_admin', 'manage/link/lists', '_self', 0, 1584415694, 1597157371, 1, 0, 1, ''),
(394, 392, 'admin', '编辑友情链接', '', 'module_admin', 'manage/link/linkedit', '_self', 1, 1584416394, 1597157371, 2, 0, 1, ''),
(395, 392, 'admin', '添加友情链接', '', 'module_admin', 'manage/link/linkadd', '_self', 1, 1584417113, 1597157371, 3, 0, 1, ''),
(396, 237, 'admin', '关于', 'fa fa-fw fa-tags', 'module_admin', '', '_self', 0, 1584543764, 1597157371, 5, 0, 1, ''),
(397, 396, 'admin', '关于', 'fa fa-fw fa-lemon-o', 'module_admin', 'manage/about/about', '_self', 0, 1584543789, 1597157371, 1, 0, 1, ''),
(398, 237, 'admin', '动态', 'fa fa-fw fa-facebook-square', 'module_admin', '', '_self', 0, 1584672252, 1597157371, 6, 0, 1, ''),
(399, 398, 'admin', '动态', 'fa fa-fw fa-align-justify', 'module_admin', 'manage/dynamic/lists', '_self', 0, 1584672279, 1597157371, 1, 0, 1, ''),
(400, 398, 'admin', '动态编辑', '', 'module_admin', 'manage/dynamic/denamicadd', '_self', 1, 1584791437, 1597157371, 2, 0, 1, ''),
(401, 396, 'admin', '右侧签名', 'fa fa-fw fa-lemon-o', 'module_admin', 'manage/about/aside', '_self', 0, 1584794498, 1597157371, 2, 0, 1, ''),
(402, 237, 'admin', '联系方式', 'fa fa-fw fa-volume-control-phone', 'module_admin', '', '_self', 0, 1584795524, 1597157371, 7, 0, 1, ''),
(403, 402, 'admin', '联系方式', 'fa fa-fw fa-align-justify', 'module_admin', 'manage/contact/contact', '_self', 0, 1584795551, 1597157371, 1, 0, 1, ''),
(404, 237, 'admin', '基础配置', 'fa fa-fw fa-gears', 'module_admin', '', '_self', 0, 1586104647, 1597157371, 8, 0, 0, ''),
(405, 237, 'admin', '版本', 'fa fa-fw fa-location-arrow', 'module_admin', '', '_self', 0, 1597156635, 1597157371, 9, 0, 1, ''),
(406, 405, 'admin', '编辑版本', '', 'module_admin', 'manage/version/editversion', '_self', 1, 1597157108, 1597157371, 1, 0, 1, ''),
(407, 405, 'admin', '添加版本', '', 'module_admin', 'manage/version/addversion', '_self', 1, 1597157331, 1597157371, 2, 0, 1, ''),
(408, 405, 'admin', '版本', 'fa fa-fw fa-align-justify', 'module_admin', 'manage/version/index', '_self', 0, 1597157361, 1597157371, 3, 0, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_message`
--

CREATE TABLE IF NOT EXISTS `lp_admin_message` (
  `id` bigint(20) unsigned NOT NULL,
  `uid_receive` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '接收消息的用户id',
  `uid_send` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发送消息的用户id',
  `type` varchar(128) NOT NULL DEFAULT '' COMMENT '消息分类',
  `content` text NOT NULL COMMENT '消息内容',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `read_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '阅读时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='消息表';

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_module`
--

CREATE TABLE IF NOT EXISTS `lp_admin_module` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '模块名称（标识）',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '模块标题',
  `icon` varchar(64) NOT NULL DEFAULT '' COMMENT '图标',
  `description` text NOT NULL COMMENT '描述',
  `author` varchar(32) NOT NULL DEFAULT '' COMMENT '作者',
  `author_url` varchar(255) NOT NULL DEFAULT '' COMMENT '作者主页',
  `config` text COMMENT '配置信息',
  `access` text COMMENT '授权配置',
  `version` varchar(16) NOT NULL DEFAULT '' COMMENT '版本号',
  `identifier` varchar(64) NOT NULL DEFAULT '' COMMENT '模块唯一标识符',
  `system_module` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否为系统模块',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='模块表';

--
-- 转存表中的数据 `lp_admin_module`
--

INSERT INTO `lp_admin_module` (`id`, `name`, `title`, `icon`, `description`, `author`, `author_url`, `config`, `access`, `version`, `identifier`, `system_module`, `create_time`, `update_time`, `sort`, `status`) VALUES
(1, 'admin', '系统', 'fa fa-fw fa-gear', '系统模块', '系统', '', '', '', '1.0.0', 'admin.dolphinphp.module', 1, 1468204902, 1468204902, 100, 1),
(2, 'user', '管理员', 'fa fa-fw fa-user', '用户模块', '系统', '', '', '', '1.0.0', 'user.dolphinphp.module', 1, 1468204902, 1468204902, 100, 1),
(3, 'manage', '后台管理', '', '', 'Ping', '', NULL, NULL, '1.0.1', 'hz.Ping.module', 0, 1561529214, 1561529214, 100, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_packet`
--

CREATE TABLE IF NOT EXISTS `lp_admin_packet` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '数据包名',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '数据包标题',
  `author` varchar(32) NOT NULL DEFAULT '' COMMENT '作者',
  `author_url` varchar(255) NOT NULL DEFAULT '' COMMENT '作者url',
  `version` varchar(16) NOT NULL,
  `tables` text NOT NULL COMMENT '数据表名',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='数据包表';

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_plugin`
--

CREATE TABLE IF NOT EXISTS `lp_admin_plugin` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '插件名称',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '插件标题',
  `icon` varchar(64) NOT NULL DEFAULT '' COMMENT '图标',
  `description` text NOT NULL COMMENT '插件描述',
  `author` varchar(32) NOT NULL DEFAULT '' COMMENT '作者',
  `author_url` varchar(255) NOT NULL DEFAULT '' COMMENT '作者主页',
  `config` text NOT NULL COMMENT '配置信息',
  `version` varchar(16) NOT NULL DEFAULT '' COMMENT '版本号',
  `identifier` varchar(64) NOT NULL DEFAULT '' COMMENT '插件唯一标识符',
  `admin` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台管理',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='插件表';

--
-- 转存表中的数据 `lp_admin_plugin`
--

INSERT INTO `lp_admin_plugin` (`id`, `name`, `title`, `icon`, `description`, `author`, `author_url`, `config`, `version`, `identifier`, `admin`, `create_time`, `update_time`, `sort`, `status`) VALUES
(1, 'SystemInfo', '系统环境信息', 'fa fa-fw fa-info-circle', '在后台首页显示服务器信息', '系统', '', '{"display":"1","width":"6"}', '1.0.0', 'system_info.ming.plugin', 0, 1477757503, 1477757503, 100, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_role`
--

CREATE TABLE IF NOT EXISTS `lp_admin_role` (
  `id` int(11) unsigned NOT NULL COMMENT '角色id',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级角色',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '角色名称',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '角色描述',
  `menu_auth` text NOT NULL COMMENT '菜单权限',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `access` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否可登录后台',
  `default_module` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '默认访问模块'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='角色表';

--
-- 转存表中的数据 `lp_admin_role`
--

INSERT INTO `lp_admin_role` (`id`, `pid`, `name`, `description`, `menu_auth`, `sort`, `create_time`, `update_time`, `status`, `access`, `default_module`) VALUES
(1, 0, '超级管理员', '系统默认创建的角色，拥有最高权限', '', 0, 1476270000, 1468117612, 1, 1, 0),
(2, 1, '企业管理员', '由平台总监授权，开通权限：产品创建、修改、审核、扫码记录权限。PC端登录帐号以3开头的8位数。', '["328","329","330","331","332","333","334","335","336","337","338","344","345","346","347","348","353","354","325","237"]', 3, 1575037541, 1577109228, 1, 1, 237),
(3, 0, '平台管理员', '由平台总监授权，开通权限：用户、产品、评价、大转盘。PC端登录帐号以2开头的8位数。', '["239","240","256","288","312","313","316","317","318","238","327","328","329","330","331","332","333","334","335","336","337","338","344","345","346","347","348","350","353","354","355","356","325","339","340","341","342","343","349","326","237"]', 3, 1575346307, 1577160545, 1, 1, 1),
(4, 3, '管理管理员', '平台产品管理', '["327","328","329","330","331","332","333","334","335","336","337","338","344","345","346","347","348","350","325","237"]', 100, 1575448471, 1577111184, 1, 1, 237);

-- --------------------------------------------------------

--
-- 表的结构 `lp_admin_user`
--

CREATE TABLE IF NOT EXISTS `lp_admin_user` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(32) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(96) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(64) NOT NULL DEFAULT '' COMMENT '邮箱地址',
  `email_bind` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否绑定邮箱地址',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `mobile_bind` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否绑定手机号码',
  `avatar` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '头像',
  `money` decimal(11,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '余额',
  `score` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '积分',
  `role` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `group` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '部门id',
  `signup_ip` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '注册ip',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后一次登录时间',
  `last_login_ip` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '登录ip',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态：0禁用，1启用'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

--
-- 转存表中的数据 `lp_admin_user`
--

INSERT INTO `lp_admin_user` (`id`, `username`, `nickname`, `password`, `email`, `email_bind`, `mobile`, `mobile_bind`, `avatar`, `money`, `score`, `role`, `group`, `signup_ip`, `create_time`, `update_time`, `last_login_time`, `last_login_ip`, `sort`, `status`) VALUES
(1, 'admin', '超级管理员', '$2y$10$A2h.W6iXG54QvQJ1AOYuH.J3iclu5UEg7/rPaO0YWXgaXIKQgqIXe', '', 0, '', 0, 2, '0.00', 0, 1, 0, 0, 1476065410, 1597154824, 1597154824, 3738247868, 100, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lp_article`
--

CREATE TABLE IF NOT EXISTS `lp_article` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(128) NOT NULL COMMENT '文章标题',
  `art_img` varchar(128) NOT NULL COMMENT '缩略图',
  `art_remark` varchar(256) NOT NULL COMMENT '描述',
  `art_keyword` varchar(64) NOT NULL COMMENT '关键词',
  `art_pid` int(11) NOT NULL COMMENT '关联栏目ID',
  `art_down` tinyint(2) DEFAULT '0' COMMENT '1为附件 ',
  `art_file` varchar(255) DEFAULT NULL COMMENT '附件路径',
  `create_time` int(10) NOT NULL COMMENT '时间戳格式',
  `art_content` longtext NOT NULL COMMENT '内容',
  `art_view` tinyint(2) NOT NULL COMMENT '显示，0为草稿，1为显示，2为推荐，-1为删除(逻辑)',
  `art_collection` int(11) NOT NULL DEFAULT '0' COMMENT '收藏|喜欢数量',
  `art_hit` int(11) NOT NULL COMMENT '点击量',
  `art_url` varchar(128) NOT NULL COMMENT '非原创的转载地址',
  `art_original` tinyint(2) NOT NULL COMMENT '是否原创，0为不是，1为是',
  `art_from` varchar(128) NOT NULL COMMENT '来自',
  `art_author` varchar(32) NOT NULL COMMENT '作者',
  `delete_time` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COMMENT='博客文章发布表';

--
-- 转存表中的数据 `lp_article`
--

INSERT INTO `lp_article` (`art_id`, `art_title`, `art_img`, `art_remark`, `art_keyword`, `art_pid`, `art_down`, `art_file`, `create_time`, `art_content`, `art_view`, `art_collection`, `art_hit`, `art_url`, `art_original`, `art_from`, `art_author`, `delete_time`) VALUES
(52, '一部被电视台遗忘的神剧', '/uploads/20190815/1565876478.jpg', '抗战末期，一群溃败下来的中国士兵聚集在西南小镇禅达的收容所里，他们被几年来国土渐次沦丧型得毫无斗志，只想苟且偷生。他们混日子，他们不愿面对自己内心存有的梦', '团长，遗忘', 5, 0, NULL, 1565876478, '<p>去年8月的一场朗读会上，演员张国强读了《我的团长我的团》没有拍的一场戏——迷龙之死。他说：“算是给我自己一个交代。”</p><p>头天晚上，张国强给段奕宏打了个电话，说自己明天要去读这一章。电话那边的老段愣了一下说：“你真行啊，我都不敢去触碰那段记忆。”</p><p>十年前，这部讲述一群溃败的中国军人在抗战后期赴缅甸杀敌的电视剧热播。剧中南天门战役的原型出自1944年7月至9月的松山之战，中国军队以一比六的伤亡代价，全歼驻守松山的日军，打通了滇缅公路，抗战由此进入反攻阶段。</p><p><img src="uploads/20190815/1cd49097dae8a221a97b06f5ad840ea5.png" alt=""><br><br></p><p>因为之前《士兵突击》的火爆，原班人马打造的《团长》被寄予厚望。观众期待《团长》像《士兵》一样，也能有一个励志逆袭的许三多，说一句“不抛弃、不放弃”，让自己继续在成年人的童话里做个梦。</p><p>《团长》开播后，观众和专家都傻眼了，他们看到一群破衣烂衫的兵痞，操着不同的方言，说着粗俗不堪的台词。于是，很多人大呼看不懂，并以各种理由弃剧，如“画面阴暗、精神沉闷、节奏缓慢、台词过贫、精简成十集还差不多”等等。</p><p><img src="uploads/20190815/562a5cacd2671846d62c5ce980c75ad3.png" alt=""><br></p><p>&lt;&nbsp;《士兵》和《团长》，从简单到极端&nbsp;&gt;</p><p><br></p><p>在首播的喧嚣退去之后，《团长》的热度渐渐散去，后来也几乎没有再重播过。但是，《团长》并没有成为电视剧的“炮灰”，反而随着时间的推移被封为“神剧”，如今豆瓣评分高达9.3分。</p><p><img src="uploads/20190815/9a079428638fda2e9177484f0259baf4.png" alt=""><br></p><p>&lt;&nbsp;B站《团长》截图&nbsp;&gt;</p><p>今天，B站上有近十万人在“追”它，评论呈现一边倒的赞誉。“每年看一遍”、“说它是中国的兄弟连，那是抬举兄弟连了”。</p><p>十年间，有幸与这部剧相遇的观众，都无法再跟它作别，因为自己记忆的一部分已经和炮灰团的兄弟们一起，永远留在了云南怒江边那个叫禅达的小镇。</p><p>对于几位主演来说更是如此。张译在自己的书里说《团长》是穿军装的《红楼梦》；段奕宏在杀青之后的某一天，闲着没事儿翻剧照时，突然被涌起的回忆击中，泪流不止；邢佳栋说自己在一群炮灰身上看到了真正的自由；张国强则在两个月前，又回到了当年的拍摄地腾冲，在国殇墓园祭洒了四十八瓶白酒。</p><p><br></p><p><img src="uploads/20190815/a0fdf9668a69121d217eed5d1801f4cd.png" alt=""><br></p><p>&lt;&nbsp;张国强在国殇墓园祭奠&nbsp;&gt;</p><p><br><br></p><h4>江湖夜雨，十年孤灯，怒江仍在咆哮着流淌，《团长》的故事还有谁在听吗？<br>腾冲</h4><p>2007年2月，《士兵突击》编剧兰晓龙在琢磨新剧的时候，翻起了时任中缅印战区美军司令史迪威写的松山战役纪录，在和导演康洪雷、制片人吴毅聊完之后，他们决定拍中国远征军的故事。</p><p>在那年的清明节，康洪雷和兰晓龙来到了云南边陲腾冲。在怒江边的松山上，两人发现了一座墓碑，上面刻着八千多人的名字，在20万中国远征军里，这只是一个军的烈士名单。<span style="color: rgb(51, 51, 51);">兰晓龙看到墓碑就不走了，他在旁边找了一块草窝躺下，一个人发呆。</span><span style="color: rgb(51, 51, 51);">在滇西烈士陵园，一群相互搀扶的老兵在战友的墓前列队，一个老兵用尽力气喊了一声“立正！”。老哥儿几个听到口令立马挺直了身躯，努力地像六十多年前那样举手敬礼。</span></p><p>看到这一幕时，康洪雷感觉自己的心都要凝固了。来之前，他看了很多远征军的资料。他知道，在腾冲的土地上，每1.5米就埋着一个亡灵，很多炮灰一样的兵连墓碑都找不到。</p><p><span style="color: rgb(51, 51, 51);">虽然当天是清明节，但是在松山战场墓前祭拜的，只有康洪雷他们几个人。回到宾馆后，康洪雷跟兰晓龙说：“如果不把这些人的故事拍出来，让如此惊天地、泣鬼神的事迹继续被时间埋没，那我们就是罪人。”</span><br></p><p><br><img src="uploads/20190815/fc659ff1d9374a937a38f0ba54daa7e5.png" alt=""><br></p><p>&lt;&nbsp;云南腾冲国殇墓园&nbsp;&gt;</p><p>&nbsp;兰晓龙没说话，以无声的抽泣作为回应。</p><p>在经过一年准备和172天的拍摄之后，《我的团长我的团》于2009年3月5日在四大卫视开播，第一集开头出现一行字幕：1941年秋，滇西某小镇。</p><p>这行字幕隐去之后，《团长》没有再给过观众喘息的时间，一个个说着各地方言的老兵直接撞到了每个人的眼前。北平“小太爷”孟烦了、东北兵迷龙、陕西军医郝兽医、湖南人不辣、上海军官阿译、不知道是哪里人的团长龙文章和家世显赫的师长虞啸卿。</p><p>这些角色不同于之前的任何战争剧，他们被演员注入了溢出屏幕的鲜活灵魂，仿佛从六十年前穿越而来。</p><p>他们嘴里说的每一句话，都带着千钧之力直抵人心。虞啸卿说军人职责：“我族军人，数千年都未有如此之溃败，你、我、他们、都该死。”</p><p>不辣说湘人骨气：<span style="color: rgb(51, 51, 51);">“中华要灭亡，湖南人先死绝。”</span></p><p>孟烦了的炮灰自述：<span style="color: rgb(51, 51, 51);">“人活着，总想发点光，散点热，可你不能拿我们当劈柴烧。”</span></p><p>还有龙文章那句振聋发聩、道出剧魂的宣言：<span style="color: rgb(51, 51, 51);">“我想让事情是它本来该有的那个样子。”</span></p><p><span style="color: rgb(51, 51, 51);"><br></span></p><p><span style="color: rgb(51, 51, 51);"><br></span></p><h4><span style="color: rgb(51, 51, 51);">事故</span></h4><p>这部讲述生命的电视剧，也曾遭遇人命关天的时刻，并且险些夭折。</p><p>2008年4月，拍摄中的《团长》接连遭遇两起重大事故，先是烟火师不幸去世，接着几十个群众演员受伤住院。当时全剧只拍了不到三分之一，很多人都觉得自己的努力一下子失去了方向。</p><p>在群演出事那天，全剧组的人都跑到医院献血。看着每天在一起的“战友”昏迷不醒地躺在病床上，“迷龙”张国强受不了了，一个人站在墙角抹眼泪，边哭边骂，他不知道到底是哪儿出了差错。</p><p><span style="color: rgb(51, 51, 51);">全员大会上，“团长”段奕宏失去了一贯的冷静，他拍着桌子质问制片部门的人。</span><span style="color: rgb(51, 51, 51);">“我们在拿生命来演戏，而你们却不顾忌我们的生命，我们把生命交到这部作品当中，而你们丝毫没有去关怀和关心。”</span><span style="color: rgb(51, 51, 51);">当时，无论是演员还是工作人员，心里都闪过一个想法：打包走人吧，不拍了。</span><span style="color: rgb(51, 51, 51);">刚出事那几天，所有人都像丢了魂儿一样，绝望的气氛在剧组蔓延，像极了剧中总是吃不饱饭、愁云惨淡的炮灰团。</span><span style="color: rgb(51, 51, 51);">段奕宏睡不着觉，半夜跑去敲张译的门，发现他在一个人喝啤酒。段奕宏问了句“还有吗”，张译默默地点了点头，两个人一边叹气一边喝闷酒。</span><span style="color: rgb(51, 51, 51);">喝完酒老段还是睡不着，又出去跑步，正好看到低着头走过来的李晨。要搁平时，很熟的两个人不会打招呼，点个头继续跑就完了，但是那天段奕宏停下来问李晨干嘛呢，对方说没事儿随便走走。</span><span style="color: rgb(51, 51, 51);">两个人沉默地在马路牙子上坐着，李晨看出了老段的心事，说你接着跑吧，不用管我。段奕宏回到屋里，心里蹦出了一句话：我不希望这是我的最后一部戏。这也是剧组很多人的想法，大家都怕再出什么事。</span></p><p><span style="color: rgb(51, 51, 51);"><br></span></p><p>在剧里，龙文章要带着手下的兄弟拿下南天门，在现实中，段奕宏把哥几个叫到屋里开了个会。他对张译、张国强他们说：“我想拍下去，我说服不了自己打包回家，你们呢。”<span style="color: rgb(51, 51, 51);">这群经历过《士兵突击》的兄弟们谁都不想走，张国强问康洪雷：“导演，咱还拍吗？”</span><span style="color: rgb(51, 51, 51);">把自己在屋子里关了八天的康导打开了门：“拍！为什么不拍！”</span><span style="color: rgb(51, 51, 51);">在一次全员大会上，主创团队对导演康洪雷说：“我们是你的兵，跟你出来打这个仗，一定要漂亮地打完！”康洪雷含着泪给大家鞠了三个躬，喊了一句：“往前走，坚持到底！”</span></p><p><br></p><h4>炮灰</h4><p><br></p><p>“我叫孟烦了，是中尉副连长，在长达四年的败仗和连绵几千公里覆盖多半个中国版图的溃逃中，我的连队全军尽墨。要活着，要活着。就算你有这个信念，也算奢侈。溃军不如寇，流兵即为贼。全军尽墨四周后，我流落到滇边的这座小县城。”<span style="color: rgb(51, 51, 51);">化身为孟烦了的张译，以这段自述开启了炮灰团的故事。如果孟烦了生在和平时期，爱损人好读书的他估计是个文艺青年，就像从小就想当播音员的张译。</span></p><p><span style="color: rgb(51, 51, 51);">因为一门心思想学播音，张译的高考志愿只填了北京广播学院一个学校，但是考了两回都没成功。为了给待业在家的他找事干，家人给他报了表演班。学了半年，张译发现自己爱上了演话剧。</span><br></p><p><span style="color: rgb(51, 51, 51);">20岁那年，张译考入北京战友话剧团，从哈尔滨到了北京。虽然进了话剧团，但因为形象不出众，身体又太单薄，所以张译一直上不了台，离男主角的机会相当遥远。</span><span style="color: rgb(51, 51, 51);">团里的政委跟他说：“你是个好孩子，要多读书，多学习！”张译很感动，不料政委话锋一转：“但是，别演戏，你演戏就是个死。”</span><span style="color: rgb(51, 51, 51);">张译不服，一有时间就写剧本，到处找机会演戏。有一次他带着拍好的照片去跑剧组，直接被副导演拦下来了。</span></p><p><span style="color: rgb(51, 51, 51);">“照片拿走，我们拍的可是偶像剧。”</span><br></p><p><span style="color: rgb(51, 51, 51);">比张译大五岁的段奕宏，从艺之路更为艰辛。在《团长》里，龙文章费尽心思假冒团长，在现实中，他顶着全世界的白眼考了三次中戏。</span><br></p><p><span style="color: rgb(51, 51, 51);">高中的时候，段奕宏和同学演了个小品，恰巧让一个上戏的导演看到了，随口说了句：“这孩子挺有天分的。”就是这句话让他着了魔，一定要考上北京的中戏。</span><br></p><p><span style="color: rgb(51, 51, 51);">第一次考试毫无悬念地以失败告终，初次进京的段奕宏在天安门坐了一夜，他倒没为自己哀伤，满脑子想的都是回家怎么说服父母，明年还让自己来考。</span><br></p><p><span style="color: rgb(51, 51, 51);">回到老家，他跑到话剧团，缠着团里的老师教自己演戏。一开始没人理他，他就每天按上下班的点儿来报到，自己训练形体，把团长都感动得不行，拿他来激励大家刻苦训练。</span><br></p><p><span style="color: rgb(51, 51, 51);">当时有个中戏的导演来剧团，段奕宏壮着胆子去敲门。“老师，我想考中戏，您看我有条件吗？”</span><br></p><p><span style="color: rgb(51, 51, 51);">这个导演很直接。“孩子，你这条件，退一万步，也考不上。”</span><br></p><p><span style="color: rgb(51, 51, 51);">考到第三回的时候，家里人也急了，父亲对他大喊：</span><span style="color: rgb(51, 51, 51);">“你不要折腾了，表演是咱这种家庭考的吗？考那个要走关系，你爸就是个看大门的！”</span></p><p><span style="color: rgb(51, 51, 51);">说起家世，迷龙的扮演者张国强可是梨园世家，他的曾外祖父倪俊生是评剧倪派小生的创始人，父亲张海峰是京剧演员，母亲倪静环也是评剧名角。</span><br></p><p><span style="color: rgb(51, 51, 51);">由于个子太高，站在戏台上跟“姚明”似的很突兀，家里人没让张国强继承评剧，而是让他去考佳木斯话剧团。在剧团，张国强演了16年的小角色。</span><span style="color: rgb(51, 51, 51);">因为工资太少，他从1992年开始在电视台和歌厅找活儿干，为了挣200块钱，他也去婚礼上唱过歌。</span></p><p><span style="color: rgb(51, 51, 51);">九十年代的歌厅什么三教九流的人都有，他在台上唱，下面有的骂人，有的让他下来，还有的直接掏出枪让他滚。这时候，脾气火爆的张国强也会把话筒一摔，像迷龙一样骂一句：“你去个屁的吧。”</span><br></p><p><span style="color: rgb(51, 51, 51);">和炮灰团的三位相比，铁血师长虞啸卿的扮演者邢佳栋有着最为魔幻的开局。考入北京电影学院的他是个优等生，曾被评为全班唯一的北京市高等学校三好生，就像《团长》里冉冉升起的国军将星。</span><br></p><p><span style="color: rgb(51, 51, 51);">但是，这样一个有为青年却被学校劝退了。当时，班里有个女生被欺负，邢佳栋带着宿舍的兄弟去为她打抱不平，事后他把责任都揽到了自己的身上。</span><span style="color: rgb(51, 51, 51);">退学后，二十岁不到的邢佳栋没有回老家太原，因为自感无颜面对江东父老。他选择北上，到哈尔滨给朋友开的自行车店打工。他们的店在道里区新阳路245号，多年之后，邢佳栋还能不打磕巴地背出这个地址。</span></p><p><span style="color: rgb(51, 51, 51);">从北影校园到东北的自行车店，邢佳栋并没觉得有多大落差，每天就想着怎么能快速组装一辆山地车。当他能在十分钟内装好一辆车时，店里的一个兄弟因为欠债跑了。</span><br></p><p><span style="color: rgb(51, 51, 51);">上门讨债的人把看店的邢佳栋和另一个人绑了，把他们架到车上开了一天一夜。在车里，一个膀大腰圆的大哥坐在中间押着他们，邢佳栋问：“大哥，咱们这是去哪儿啊？”</span><span style="color: rgb(51, 51, 51);">对方说：“不该问的别问！”</span></p><p><span style="color: rgb(51, 51, 51);">邢佳栋心想坏了，该不是要把他们拉到野地里那啥吧。万幸，他们的落脚地是延吉的一个宾馆，除了不让出门，一日三餐都有，就这么住了一个星期。</span><span style="color: rgb(51, 51, 51);">有一天，看守他们的大哥跟邢佳栋聊天，在得知他是山西人后，大哥很惊诧。“山西的怎么跑东北来了？你之前是干嘛的。”邢佳栋说自己之前是学生，电影学院学表演的，大哥若有所思地点了点头：“你这个小伙子长得还行。”</span></p><p><br><span style="color: rgb(51, 51, 51);">一周后，欠债的兄弟把钱还了，警察也找到了邢佳栋他们。被“解救”的时候，人质和绑匪竟然泪眼相望、无语凝噎，大哥说你们下回来延吉一定言语一声，邢佳栋说好的。后来，邢佳栋再也没去过延吉。</span><span style="color: rgb(51, 51, 51);">彼时，如今的荧幕硬汉们如浮萍般散落天涯，终日被命运的潮水拍打，他们多想找到一个属于自己的角色，哪怕是演一个炮灰。</span><span style="color: rgb(51, 51, 51);">炮灰们最怕什么，是希望，因为希望意味着可能会赢，但要付出生命的代价。在打退日军进攻后，孟烦了对他的团长哭喊：“你给了我们不该有的希望，明知道不可能，还在想胜利。”</span><span style="color: rgb(51, 51, 51);">是啊，炮灰团有什么资格想胜利，在上峰眼里，他们不过是一个可以牺牲的数字罢了。正如这四个退一万步都成不了明星的大龄青年，一点儿资本都没有可还在想成功。</span><span style="color: rgb(51, 51, 51);">生活有时残酷有时魔幻，有时也会为某些人吹响改变命运的集结号，认命的人听到了也会无动于衷，但是炮灰团的兄弟们听到之后，冲出了战壕。</span></p><p><br><span style="color: rgb(51, 51, 51);">集结</span><br></p><p><br><br></p><p>&nbsp;</p><p>2001年，和张译同在战友话剧团的编剧兰晓龙写了一部名叫《爱尔纳·突击》的戏，只有六个角色，张译破天荒地分到了一个叫袁朗的角色，不过是B角，也就是A角的替补。有一次A角的演员有事来不了，张译想自己终于有机会上场了，没想到团里竟然外请了一个演员，还让他做接待。</p><p><span style="color: rgb(51, 51, 51);">但是张译没有气馁，别人在台上演戏，他在台下默默记下了所有人的台词。他最喜欢的角色是充满阳刚的伍六一，他经常趁下班后没人的时候，在排练场演伍六一过瘾。</span><br></p><p><span style="color: rgb(51, 51, 51);">那时，他未来的“团长”段奕宏也终于有戏演了，这位考了三回终于进入中戏的愣小子，以专业课第一的成绩毕业。1999年，他在《刑警本色》里出演了杀手罗阳，一双动物般没有情感的眼睛让人后背发冷。</span><br></p><p><span style="color: rgb(51, 51, 51);">在《刑警本色》的关机发布会上，记者都围着明星采访，主演王志文突然走出“包围圈”，把站在角落的段奕宏拉了过来，对记者说：“他是段奕宏，非常有戏的好演员。”</span><span style="color: rgb(51, 51, 51);">和段奕宏合作过的女演员陈数说过，段奕宏和别的演员不一样，别人演戏是飙演技，他是拼心血，这样演戏很伤身体。</span><span style="color: rgb(51, 51, 51);">2003年，一个被称作专家的人到现场看了《爱尔纳·突击》，散场后他上台跟演职人员握手，站在最边上的张译握完才知道，这个人叫康洪雷，拍过《激情燃烧的岁月》。</span><span style="color: rgb(51, 51, 51);">2006年，《爱尔纳·突击》变成了《士兵突击》，导演正是康洪雷，散落天涯的兄弟们也被集结到了一起。</span></p><p><span style="color: rgb(51, 51, 51);"><br></span></p><p><span style="color: rgb(51, 51, 51);">爱了这部戏六年的张译获得了班长史今的角色，班副伍六一给了“虎口脱险”后再次考入北影的邢佳栋，老A大队长袁朗由段奕宏扮演，连长高城选中了从东北赶来的张国强。</span><span style="color: rgb(51, 51, 51);">对梦想念念不忘的四个人，终于收到了命运的回响。</span></p><p><br><br></p><p></p><h4><span style="color: rgb(51, 51, 51); font-family: inherit;">禅达</span><br></h4><p></p><p><span style="color: rgb(51, 51, 51);">《士兵》让兄弟们相会，《团长》则让他们脱胎换骨。</span><br></p><p><span style="color: rgb(51, 51, 51);">《士兵》火了之后，张译他们的生活都变了。上街开始有人找签名，生活的压力变小了，但作为一个有追求的演员，精神的压力变大了。</span><br></p><p><span style="color: rgb(51, 51, 51);">张译知道自己不是史今，他一辈子可能都拥有不了史今那样的品质。但是在观众心里，他就是那个完美无暇的班长。所以，张译那时候特别想从《士兵》里走出来，告诉观众，他不是史今，他能演更多的角色。</span><span style="color: rgb(51, 51, 51);">因为不喜欢战争戏，张译直到最后时刻才看完《团长》的剧本，读到最后一个字的时候已是凌晨五点，他的心被震得破碎不堪，一直哭到六点。</span></p><p><br><span style="color: rgb(51, 51, 51);">张译觉得孟烦了是自己演员生涯中最难演的一个角色。演完史今后，张译收获了一边倒的赞誉，因为史今太像是成年童话里的人了，而孟烦了比史今复杂了几百倍，爱他和恨他的争论至今还在继续。</span><span style="color: rgb(51, 51, 51);">在剧中，别人哭的时候，他在笑，别人笑的时候，他在哭。这个弃学从军的兵油子似乎比谁都更清醒，又比谁都更糊涂。</span><span style="color: rgb(51, 51, 51);">孟烦了不想当炮灰，他想活着，他曾在当副连长的时候，把一百多号新兵蛋子忽悠得上阵冲锋，自己和老兵们躲在战壕里睡觉。在全连尽墨后，他靠装死活了下来，也付出了一条腿的代价，带着这条瘸腿，一路跑到了滇西的禅达。</span><span style="color: rgb(51, 51, 51);">但是，他和炮灰团的兄弟都被妖孽一般的团长改变了，从渣滓变回了人形。在团长要被枪毙时，他说出了自己的心里话：“我们是一直在逃，但多希望有个人能带着我们，相互之间不猜忌地往前走，多好。”</span></p><p><br><span style="color: rgb(51, 51, 51);">《团长》播出后，有个朋友跟张译转述别人对他演孟烦了的评价。</span><span style="color: rgb(51, 51, 51);">“一看这孙子就是憋着一口气演的，他肯定是想让别人知道，他除了史今之外还能演别人。”</span></p><p><br></p><p><span style="color: rgb(51, 51, 51);">张译承认，他确实憋着劲儿在演孟烦了，只要导演一喊开机，他的腿就自动“瘸了”。后来演《生死线》的时候，这个习惯还是有点改不过来。孟烦了这个角色贯穿全剧，经历了九九八十一难，没有一个演员能拒绝这样的机会。</span><span style="color: rgb(51, 51, 51);">段奕宏也无法拒绝龙文章。在剧本出来之前，兰晓龙把他叫出来吃饭。在东直门的一家烧烤店，兰晓龙聊起了尚在构思中的孟烦了和龙文章，全剧的头两号男主。</span><span style="color: rgb(51, 51, 51);">聊完之后，他问老段对哪个更感兴趣，虽然这两个角色都让段奕宏摸不着头脑，他还是下意识地选了龙文章。“我不在乎第一第二，我觉得这是个有血有肉的人。”</span></p><p><span style="color: rgb(51, 51, 51);">那个时候，段奕宏完全不知道这位龙文章是怎样的一个人，将带给自己怎样的体验。《团长》播出后，段奕宏演的龙文章被称作妖孽，这是一个从未在国产战争剧里出现过的形象。</span><br></p><p><span style="color: rgb(51, 51, 51);">他在战乱之际冒团长之职，在审判他的公堂上跳大神，用一连串的菜名和地名，唤起了炮灰们对家乡的记忆，对国土沦丧的仇恨。</span><br></p><p><span style="color: rgb(51, 51, 51);"><br></span></p><p><span style="color: rgb(51, 51, 51);">我去过的那些地方，我们没了的地方。北平的爆肚涮肉皇城根；南京的干丝烧卖，还有销金的秦淮风月；上海的润饼蚵仔煎，看得我直瞪眼的花花世界；天津麻花狗不理，广州艇仔粥和肠粉，旅顺口的咸鱼饼子和炮台，东北地三鲜、狗肉汤、酸菜白肉炖粉条，苦哈哈找活路的老林子；火宫殿的鸭血汤，还有臭豆腐和已经打成粉了的长沙城……</span><span style="color: rgb(51, 51, 51);">从进组那天起，段奕宏就在准备这段独白，每天都在预演。正式开拍那天，不到两个半小时就过了。当天晚上康洪雷因为这场戏给他敬酒：“真的佩服你，祝贺你。”</span><span style="color: rgb(51, 51, 51);">在癫狂坚硬之外，龙文章的“软”更让人心碎。美国派来的教官无法忍受国军的黑暗，执意离去。“你和你的弟兄喜欢做别人桌上的筹码？刚死就被人忘掉，好像没活过？”</span><span style="color: rgb(51, 51, 51);">龙文章跪了下来。“没人想做别人的筹码，可总得有人牺牲。我没脸说自己是军人，我们不过是想挣扎出个人形。所以我求你们，回去，教我的兵怎么活。”</span><span style="color: rgb(51, 51, 51);">在塑造龙文章的这个角色时，康洪雷跟段奕宏说，他所有的癫狂、勇猛、神经质都应该是下意识的，是经历太多生死磨炼出来的，所以你的表演也应该是这样。</span></p><p><br><br></p><p>&nbsp;<span style="color: rgb(51, 51, 51);">段奕宏做到了，他用外在的快乐和幽默演出了龙文章内心的愤怒和哀伤。</span><span style="color: rgb(51, 51, 51);">在172天的拍摄中，演员们也是“枕戈待旦”，扮演张立宪的李晨刚进组时惊讶地发现，好多人屋里都放着枪，为了找到角色的感觉。</span></p><p><span style="color: rgb(51, 51, 51);">《团长》展现的每场战斗，几乎都有近战和肉搏的场面。据张国强回忆，每天收工之后，连说话的力气都没有，身上都是脏土，连鼻涕都是纯黑的。</span><span style="color: rgb(51, 51, 51);">2008年8月，导演宣布全剧杀青，每个人都像走了一场长征。</span><span style="color: rgb(51, 51, 51);">张译在杀青宴上喝得烂醉如泥，张国强那天站在山坡上大喊：终于解放啦！”段奕宏说他三年内不会再拍战争戏了。</span><span style="color: rgb(51, 51, 51);">“不辣”王大治走到康洪雷跟前问：“导演，我没给你丢人吧？”康洪雷拍拍他的肩膀：“没有！”</span></p><p><span style="color: rgb(51, 51, 51);">“郝兽医”罗京民的手也被导演握住。“老爷子，这个戏不错，咱们下部再合作。”罗京民也握着康导的手，心有余悸地说：“雷子，三年之内，我不跟你合作了。累死我了，太累了。三年之内，你的戏我不拍了。”</span><span style="color: rgb(51, 51, 51);">提前杀青的李晨没有跟任何人打招呼，一个人不辞而别，他怕见到兄弟们会哭。</span></p><p><br><br></p><h4>&nbsp;<span style="color: rgb(51, 51, 51);">今天</span></h4><p><br></p><p>《团长》的结尾当年让很多观众难以接受，炮灰团苦守南天门38天之后，营救的部队终于冲过怒江，一脸愧疚的虞啸卿站在对岸，迎接他的袍泽弟兄。然后，镜头一转，已经是六十年后，老年的孟烦了在买菜路上，与每一个兄弟擦肩而过，他们已经不是动荡时代的炮灰，变成了和平年代的普通人……</p><p><span style="color: rgb(51, 51, 51);">段奕宏说没拍的戏大概有10集左右，王宝强也会来客串。未完的《团长》让人遗憾，当年所说的“明年再拍”不小心成为了永远。</span><br></p><p><span style="color: rgb(51, 51, 51);">康洪雷后来跟记者说：“我知道他们几个都有遗憾，因为每个角色的归宿我都没有拍。但是，那些兵离开家六十年，这中间的空白我没法去填补，所以只能在六十年后，与每个人的幻影擦肩而过。”</span><br></p><p><span style="color: rgb(51, 51, 51);">2009年在宣传《团长》时，主持人问康洪雷，《士兵》《团长》之后，他们这些人还会再有合作吗。</span><span style="color: rgb(51, 51, 51);">“当然想让大家在一起，但又不能老在一起。因为每个人都要去成长、去开拓。再过五年或者十年，如果有可能再在一起，做一个不一样的东西。”</span><span style="color: rgb(51, 51, 51);">《团长》之后的十年，张译拿了金鸡，段奕宏晋身影帝，李晨变成了跑男里的大黑牛，邢佳栋则在《大秦帝国》里，一个人对着绿幕演了239分钟的白起，靠演技成为热搜。</span><span style="color: rgb(51, 51, 51);">炮灰团的弟兄们都变了，又好像都没变。张国强就没怎么变，虽然他岁数最大，还常被张译他们欺负，但在戏里戏外他都像迷龙那样，敢爱敢恨喜怒都挂在脸上。</span><span style="color: rgb(51, 51, 51);">《团长》的结局没拍，张国强遗憾了十年。</span></p><p><span style="color: rgb(51, 51, 51);">“本来迷龙可以最牛一把的。”在去年的那场朗读会上，他一张嘴就变成了迷龙，还用声音把其他人也“演”了出来。当迷龙走调地唱起“我的家，在松花江上”，下面的听众都笑了，然后又都沉默了。</span><span style="color: rgb(51, 51, 51);">读完的那一刻，张国强用力地点了几下头。</span><span style="color: rgb(51, 51, 51);">“迷龙终于回家了，但愿他的家还在。”</span></p><p><span style="color: rgb(51, 51, 51);">部分参考资料：</span><br></p><p><span style="color: rgb(51, 51, 51);">新世纪周刊，《&lt;我的团长我的团&gt;揭开的一段酷烈历史:远征军》</span></p><p><span style="color: rgb(51, 51, 51);">《凤凰网·非常道》相关访谈</span></p><p><br><span style="color: rgb(51, 51, 51);">张译，《不靠谱的演员都爱说如果》</span></p><p>舒可文，《追问&lt;我的团长我的团&gt;：炮灰团，极端主义》</p><p>孔鲤，《&lt;我的团长我的团&gt;10周年：最后，我回家做饭》</p><p><br></p><p><br></p>', 2, 0, 1052, 'https://news.html5.qq.com/share/6173214257235146820', 0, 'Win 10', '匿名', NULL),
(53, 'TP5解决HTTP状态码500但正常返回结果', '/uploads/20190901/1567324794.jpg', '日志-HTTP状态码500异常', 'tp，HTTP', 3, 0, NULL, 1567324794, '<p>每天早上一睁眼，习惯性的打开手机看客户群里有没有反馈或是发现新的bug，对于bug早已司空见惯，任何开发者都不欢迎这讨人恨的东东。</p><p>今天虽然是周末也是开学季（好像发现了什么，^_^）,但也不例外，每天早上第一件事就是查看有没有新出炉的bug(我也不想写bug，之前写项目老是粗心，没有去年的细致，具体原因不细表)。</p><p>打开微信，按照习惯查看新信息，一看到客户截图显示服务器异常，心里凉凉了，因为跟IOS和安卓沟通好了的如果HTTP状态码为500就提示‘服务器异常’或‘网络错误’，这种情形第一时间想到的是又出bug了？但细想又不对，随即打开小程序（这个客户有三个端），我勒个去，一切正常，WTF，玩我呢。</p><p>有一个很简单排查（丢锅）的方法，如果前端出现一样的错误，大概率是后台的锅，反之，如果前端同一个操作或功能一个正常一个不正常，大概率是前端自己的锅。</p><p><img src="uploads/20190901/b5265ee5f4d4a78df37bb9b80dda95ad.png" alt=""><br></p><p><br></p><p>这次应该不是我的锅了吧！然后<span style="color: rgb(51, 51, 51);">打电话询问一下是怎么回事，把经过叙述一遍，安卓也懵逼了，不会呀，大家都没改动。二话不说就开始排查错误。</span></p><p>这种情况只需要再调一次API就知道了。很多时候，大家只关心API返回的错误码或状态码，都忽略了HTTP的状态码，如果返回了数据，就直接拿数据。（ps：API的状态有的人放在header里面，有的人放在返回结构里面，也有的人直接用HTTP状态码，优劣各自评断）</p><p>安卓告诉我拿到数据了，但是HTTP状态码是500，WTF，这什么操作，服务端用的TP5，如果返回500的话会抛出异常的，因为出现500或5XX大多数是语法错误，这种情况下不可能有数据的，深思之下想到了6月也遇到过这种错误，当时是用postman测试的，HTTP500但有数据，当时只是用屏蔽错误的方法应急了一下，难道是同一个原因？不管那么多，<span style="color: rgb(51, 51, 51);">先</span><span style="color: rgb(51, 51, 51);">让APP正常运转再说。</span></p><p><span style="color: rgb(51, 51, 51);">按照上次的解决办法，我在同一返回的方法里面加上了</span></p><pre style="max-width:100%;overflow-x:auto;"><code class="php hljs" codemark="1">       error_reporting(<span class="hljs-string">"E_ALL"</span>);\n        ini_set(<span class="hljs-string">"display_errors"</span>, <span class="hljs-number">1</span>);\n\n        header(<span class="hljs-string">"HTTP/1.1 200 {$msg}"</span>); <span class="hljs-comment">// ok 正常访问</span></code></pre><p>但是这样也不行呀，必须得找出缘由，随即向老大请教了一番</p><p>以下是对话<img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_thumb.gif"><span style="color: rgb(51, 51, 51);">：</span></p><p><img src="uploads/20190901/89a5efce53e097b811e371ed03ebd9ff.png" alt=""><br></p><p><br></p><p><br></p><p>查看了一下这个文件，是写入日志</p><p><img src="uploads/20190901/97464e915c5d02f2733806c483a44074.png" alt=""><br></p><p>导致错误的根源就是</p><pre style="max-width:100%;overflow-x:auto;"><code class="php hljs" codemark="1"><span class="hljs-keyword">return</span> error_log($message, <span class="hljs-number">3</span>, $destination);</code></pre><p>在记录错误日志的时候出现了错误，然鹅翻了TP5的日志一无所获，然后</p><p><img src="uploads/20190901/41aecbf33e4f6276496abda596748d83.png" alt=""><br></p><p>再然后</p><p><br></p><p>就没有了，</p><p><br></p><p><span style="color: rgb(51, 51, 51);"><br></span></p><p><br></p>', 2, 0, 1450, '', 1, 'Win 10', '学舞晴空', NULL),
(54, 'PSR-4 自动加载规范', '/uploads/20190904/1567561402.jpg', 'PSR-4 描述了从文件路径中 自动加载 类的规范。 它拥有非常好的兼容性，并且可以在任何自动加载规范中使用', 'PSR，规范', 3, 0, NULL, 1567561288, '<h3>PSR4自动加载规范</h3><p>为了避免歧义，文档大量使用了「能愿动词」，对应的解释如下：</p><ul><li>必须 (MUST)：绝对，严格遵循，请照做，无条件遵守；</li><li>一定不可 (MUST NOT)：禁令，严令禁止；</li><li>应该 (SHOULD)&nbsp;：强烈建议这样做，但是不强求；</li><li>不该 (SHOULD NOT)：强烈不建议这样做，但是不强求；</li><li>可以 (MAY)&nbsp;和&nbsp;可选 (OPTIONAL)&nbsp;：选择性高一点，在这个文档内，此词语使用较少；</li></ul><blockquote>参见：RFC 2119</blockquote><h3>1. 总览</h3><p>PSR-4 描述了从文件路径中&nbsp;<a href="http://php.net/autoload">自动加载</a>&nbsp;类的规范。 它拥有非常好的兼容性，并且可以在任何自动加载规范中使用，包括&nbsp;<a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md">PSR-0</a>。 PSR-4 规范也描述了放置 autoload 文件（就是我们经常引入的&nbsp;vendor/autoload.php）的位置。</p><h3>2. 规范</h3><ol><li>术语「class」指的是类（classes）、接口（interfaces）、特征（traits）和其他类似的结构。</li></ol><span style="color: rgb(51, 51, 51);">全限定类名具有以下形式：&nbsp; &nbsp; &nbsp;</span><p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style="background-color: rgb(248, 248, 248); color: rgb(51, 51, 51); font-family: Monaco, Menlo, Consolas, &quot;Courier New&quot;, monospace; font-size: 12px; white-space: pre-wrap;"> \\&lt;NamespaceName&gt;(\\&lt;SubNamespaceNames&gt;)*\\&lt;ClassName&gt;</span><span style="color: rgb(51, 51, 51);"><br></span></p><ul><li><span style="color: rgb(51, 51, 51);">&nbsp; &nbsp;&nbsp;</span><span style="color: rgb(51, 51, 51);">全限定类名必须拥有一个顶级命名空间名称，也称为供应商命名空间（vendor namespace）。</span></li><li><span style="color: rgb(51, 51, 51);"><br></span></li><li><span style="color: rgb(51, 51, 51);">&nbsp; &nbsp;&nbsp;</span><span style="color: rgb(51, 51, 51);">全限定类名可以有一个或者多个子命名空间名称。</span></li><li><span style="color: rgb(51, 51, 51);"><br></span></li><li><span style="color: rgb(51, 51, 51);">&nbsp; &nbsp;&nbsp;</span><span style="color: rgb(51, 51, 51);">全限定类名必须有一个最终的类名（我想意思应该是你不能这样</span><span style="color: rgb(51, 51, 51); background-color: rgb(248, 248, 248); font-family: Monaco, Menlo, Consolas, &quot;Courier New&quot;, monospace; font-size: 12px; white-space: pre-wrap;"> \\&lt;NamespaceName&gt;(\\&lt;SubNamespaceNames&gt;)*\\ </span><span style="color: rgb(51, 51, 51);">来表示一个完整的类）。</span></li><li><span style="color: rgb(51, 51, 51);"><br></span></li><li><span style="color: rgb(51, 51, 51);">&nbsp; &nbsp;&nbsp;</span><span style="color: rgb(51, 51, 51);">下划线在全限定类名中没有任何特殊含义（在&nbsp;</span><a href="https://learnku.com/docs/psr/psr-0-automatic-loading-specification">PSR-0</a><span style="color: rgb(51, 51, 51);">&nbsp;中下划是有含义的）。</span></li><li><span style="color: rgb(51, 51, 51);"><br></span></li><li><span style="color: rgb(51, 51, 51);">&nbsp; &nbsp;&nbsp;</span><span style="color: rgb(51, 51, 51);">全限定类名可以是任意大小写字母的组合。所有类名的引用必须区分大小写。</span></li></ul><span style="color: rgb(51, 51, 51);">2.全限定类名的加载过程</span><br><span style="color: rgb(51, 51, 51);">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="color: rgb(51, 51, 51);">在全限定的类名（一个「命名空间前缀」）中，一个或多个前导命名空间和子命名空间组成的连续命名空间，不包括前导命名空间的分隔符，至少对应一个「根目录」。<br></span><p><span style="color: rgb(51, 51, 51);">&nbsp; &nbsp;&nbsp;</span><span style="color: rgb(51, 51, 51);">&nbsp;</span><span style="color: rgb(51, 51, 51);">「</span><span style="color: rgb(51, 51, 51);">命名空间前缀」后面的相邻子命名空间与根目录下的目录名称相对应（且必须区分大小写），其中命名空间的分隔符表示目录分隔符。</span></p><p><span style="color: rgb(51, 51, 51);">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style="color: rgb(51, 51, 51);">最终的类名与以.php&nbsp;结尾的文件名保持一致，这个文件的名字必须和最终的类名相匹配（意思就是如果类名是&nbsp;FooController，那么这个类所在的文件名必须是&nbsp;FooController.php）。</span><br><br><span style="color: rgb(51, 51, 51);">3.自动加载文件禁止抛出异常，禁止出现任何级别的错误，也不建议有返回值。</span><br></p><h3><font color="#000000">3. 范例</font></h3><p>下表显示了与给定的全限定类名、命名空间前缀和根目录相对应的文件的路径。</p><table><thead><tr><th>Fully Qualified Class Name</th><th>Namespace Prefix</th><th>Base Directory</th><th>Resulting File Path</th></tr></thead><tbody><tr><td>\\Acme\\Log\\Writer\\File_Writer</td><td>Acme\\Log\\Writer</td><td>./acme-log-writer/lib/</td><td>./acme-log-writer/lib/File_Writer.php</td></tr><tr><td>\\Aura\\Web\\Response\\Status</td><td>Aura\\Web</td><td>/path/to/aura-web/src/</td><td>/path/to/aura-web/src/Response/Status.php</td></tr><tr><td>\\Symfony\\Core\\Request</td><td>Symfony\\Core</td><td>./vendor/Symfony/Core/</td><td>./vendor/Symfony/Core/Request.php</td></tr><tr><td>\\Zend\\Acl</td><td>Zend</td><td>/usr/includes/Zend/</td><td>/usr/includes/Zend/Acl.php</td></tr></tbody></table><p>想要了解一个符合规范的自动加载器的实现可以查看<a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md">示例文件</a>。示例中的自动加载器禁止被视为规范的一部分，它随时都可能发生改变。</p><p><br></p><p><br></p><h3>PSR-4 的实现示例</h3><p>下面的示例说明了符合 PSR-4 的代码：</p><h4>闭包示例</h4><pre><code>&lt;?php\n/**\n * 一个具体项目实现的示例。\n *\n * 在注册自动加载函数后，下面这行代码将引发程序\n * 尝试从 /path/to/project/src/Baz/Qux.php\n * 加载 \\Foo\\Bar\\Baz\\Qux 类：\n *\n *      new \\Foo\\Bar\\Baz\\Qux;\n *\n * @param string $class 完全标准的类名。\n * @return void\n */\nspl_autoload_register(function ($class) {\n\n    // 具体项目的命名空间前缀\n    $prefix = ''Foo\\\\Bar\\\\'';\n\n    // 命名空间前缀对应的基础目录\n    $base_dir = __DIR__ . ''/src/'';\n\n    // 该类使用了此命名空间前缀？\n    $len = strlen($prefix);\n    if (strncmp($prefix, $class, $len) !== 0) {\n        // 否，交给下一个已注册的自动加载函数\n        return;\n    }\n\n    // 获取相对类名\n    $relative_class = substr($class, $len);\n\n    // 命名空间前缀替换为基础目录，\n    // 将相对类名中命名空间分隔符替换为目录分隔符，\n    // 附加 .php\n    $file = $base_dir . str_replace(''\\\\'', ''/'', $relative_class) . ''.php'';\n\n    // 如果文件存在，加载它\n    if (file_exists($file)) {\n        require $file;\n    }\n});</code></pre><h4>类示例</h4><p>以下是一个可处理多命名空间的类实现示例：</p><pre><code>&lt;?php\nnamespace Example;\n\n/**\n * 一个多用途的示例实现，包括了\n * 允许多个基本目录用于单个\n * 命名空间前缀的可选功能\n *\n * 下述示例给出了一个 foo-bar 类包，系统中路径结构如下……\n *\n *     /path/to/packages/foo-bar/\n *         src/\n *             Baz.php             # Foo\\Bar\\Baz\n *             Qux/\n *                 Quux.php        # Foo\\Bar\\Qux\\Quux\n *         tests/\n *             BazTest.php         # Foo\\Bar\\BazTest\n *             Qux/\n *                 QuuxTest.php    # Foo\\Bar\\Qux\\QuuxTest\n *\n * ……添加路径到  \\Foo\\Bar\\  命名空间前缀的类文件中\n * 如下所示：\n *\n *      &lt;?php\n *      // 实例化加载器\n *      $loader = new \\Example\\Psr4AutoloaderClass;\n *\n *      // 注册加载器\n *      $loader-&gt;register();\n *\n *      // 为命名空间前缀注册基本路径\n *      $loader-&gt;addNamespace(''Foo\\Bar'', ''/path/to/packages/foo-bar/src'');\n *      $loader-&gt;addNamespace(''Foo\\Bar'', ''/path/to/packages/foo-bar/tests'');\n *\n * 下述语句会让自动加载器尝试从 \n * /path/to/packages/foo-bar/src/Qux/Quux.php \n * 中加载  \\Foo\\Bar\\Qux\\Quux 类\n *\n *      &lt;?php\n *      new \\Foo\\Bar\\Qux\\Quux;\n *\n *  下述语句会让自动加载器尝试从 \n *   /path/to/packages/foo-bar/tests/Qux/QuuxTest.php\n * 中加载 \\Foo\\Bar\\Qux\\QuuxTest 类：\n *\n *      &lt;?php\n *      new \\Foo\\Bar\\Qux\\QuuxTest;\n */\nclass Psr4AutoloaderClass\n{\n    /**\n     * 关联数组，键名为命名空间前缀，键值为一个基本目录数组。\n     *\n     * @var array\n     */\n    protected $prefixes = array();\n\n    /**\n     * 通过 SPL 自动加载器栈注册加载器\n     *\n     * @return void\n     */\n    public function register()\n    {\n        spl_autoload_register(array($this, ''loadClass''));\n    }\n\n    /**\n     * 为命名空间前缀添加一个基本目录\n     *\n     * @param string $prefix 命名空间前缀。\n     * @param string $base_dir 命名空间下类文件的基本目录\n     * @param bool $prepend 如果为真，预先将基本目录入栈\n     * 而不是后续追加；这将使得它会被首先搜索到。\n     * @return void\n     */\n    public function addNamespace($prefix, $base_dir, $prepend = false)\n    {\n        // 规范化命名空间前缀\n        $prefix = trim($prefix, ''\\\\'') . ''\\\\'';\n\n        // 规范化尾部文件分隔符\n        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . ''/'';\n\n        // 初始化命名空间前缀数组\n        if (isset($this-&gt;prefixes[$prefix]) === false) {\n            $this-&gt;prefixes[$prefix] = array();\n        }\n\n        // 保留命名空间前缀的基本目录\n        if ($prepend) {\n            array_unshift($this-&gt;prefixes[$prefix], $base_dir);\n        } else {\n            array_push($this-&gt;prefixes[$prefix], $base_dir);\n        }\n    }\n\n    /**\n     * 加载给定类名的类文件\n     *\n     * @param string $class 合法类名\n     * @return mixed 成功时为已映射文件名，失败则为 false\n     */\n    public function loadClass($class)\n    {\n        // 当前命名空间前缀\n        $prefix = $class;\n\n        // 通过完整的命名空间类名反向映射文件名\n        while (false !== $pos = strrpos($prefix, ''\\\\'')) {\n\n            // 在前缀中保留命名空间分隔符\n            $prefix = substr($class, 0, $pos + 1);\n\n            // 其余的是相关类名\n            $relative_class = substr($class, $pos + 1);\n\n            // 尝试为前缀和相关类加载映射文件\n            $mapped_file = $this-&gt;loadMappedFile($prefix, $relative_class);\n            if ($mapped_file) {\n                return $mapped_file;\n            }\n\n            // 删除 strrpos() 下一次迭代的尾部命名空间分隔符\n            $prefix = rtrim($prefix, ''\\\\'');\n        }\n\n        // 找不到映射文件\n        return false;\n    }\n\n    /**\n     * 为命名空间前缀和相关类加载映射文件。\n     *\n     * @param string $prefix 命名空间前缀\n     * @param string $relative_class 相关类\n     * @return mixed Boolean 无映射文件则为false，否则加载映射文件\n     */\n    protected function loadMappedFile($prefix, $relative_class)\n    {\n        // 命名空间前缀是否存在任何基本目录\n        if (isset($this-&gt;prefixes[$prefix]) === false) {\n            return false;\n        }\n\n        // 通过基本目录查找命名空间前缀\n        foreach ($this-&gt;prefixes[$prefix] as $base_dir) {\n\n            // 用基本目录替换命名空间前缀\n            // 用目录分隔符替换命名空间分隔符\n            // 给相关的类名增加 .php 后缀\n            $file = $base_dir\n                  . str_replace(''\\\\'', ''/'', $relative_class)\n                  . ''.php'';\n\n            // 如果映射文件存在，则引入\n            if ($this-&gt;requireFile($file)) {\n                // 搞定了\n                return $file;\n            }\n        }\n\n        // 找不到\n        return false;\n    }\n\n    /**\n     * 如果文件存在从系统中引入进来\n     *\n     * @param string $file 引入文件\n     * @return bool 文件存在则 true 否则 false\n     */\n    protected function requireFile($file)\n    {\n        if (file_exists($file)) {\n            require $file;\n            return true;\n        }\n        return false;\n    }\n}</code></pre><h4>单元测试</h4><p>以下示例是上述类加载器的单元测试方式之一：</p><p></p><pre><code><span><span>&lt;?php</span>\n<span>namespace</span> <span>Example<span>\\</span>Tests</span><span>;</span>\n\n<span>class</span> <span>MockPsr4AutoloaderClass</span> <span>extends</span> <span>Psr4AutoloaderClass</span>\n<span>{</span>\n    <span>protected</span> <span>$files</span> <span>=</span> <span>array</span><span>(</span><span>)</span><span>;</span>\n\n    <span>public</span> <span>function</span> <span>setFiles</span><span>(</span><span>array</span> <span>$files</span><span>)</span>\n    <span>{</span>\n        <span>$this</span><span>-</span><span>&gt;</span><span>files</span> <span>=</span> <span>$files</span><span>;</span>\n    <span>}</span>\n\n    <span>protected</span> <span>function</span> <span>requireFile</span><span>(</span><span>$file</span><span>)</span>\n    <span>{</span>\n        <span>return</span> <span>in_array</span><span>(</span><span>$file</span><span>,</span> <span>$this</span><span>-</span><span>&gt;</span><span>files</span><span>)</span><span>;</span>\n    <span>}</span>\n<span>}</span>\n\n<span>class</span> <span>Psr4AutoloaderClassTest</span> <span>extends</span> <span><span>\\</span>PHPUnit_Framework_TestCase</span>\n<span>{</span>\n    <span>protected</span> <span>$loader</span><span>;</span>\n\n    <span>protected</span> <span>function</span> <span>setUp</span><span>(</span><span>)</span>\n    <span>{</span>\n        <span>$this</span><span>-</span><span>&gt;</span><span>loader</span> <span>=</span> <span>new</span> <span>MockPsr4AutoloaderClass</span><span>;</span>\n\n        <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>setFiles</span><span>(</span><span>array</span><span>(</span>\n            <span>''/vendor/foo.bar/src/ClassName.php''</span><span>,</span>\n            <span>''/vendor/foo.bar/src/DoomClassName.php''</span><span>,</span>\n            <span>''/vendor/foo.bar/tests/ClassNameTest.php''</span><span>,</span>\n            <span>''/vendor/foo.bardoom/src/ClassName.php''</span><span>,</span>\n            <span>''/vendor/foo.bar.baz.dib/src/ClassName.php''</span><span>,</span>\n            <span>''/vendor/foo.bar.baz.dib.zim.gir/src/ClassName.php''</span><span>,</span>\n        <span>)</span><span>)</span><span>;</span>\n\n        <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>addNamespace</span><span>(</span>\n            <span>''Foo\\Bar''</span><span>,</span>\n            <span>''/vendor/foo.bar/src''</span>\n        <span>)</span><span>;</span>\n\n        <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>addNamespace</span><span>(</span>\n            <span>''Foo\\Bar''</span><span>,</span>\n            <span>''/vendor/foo.bar/tests''</span>\n        <span>)</span><span>;</span>\n\n        <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>addNamespace</span><span>(</span>\n            <span>''Foo\\BarDoom''</span><span>,</span>\n            <span>''/vendor/foo.bardoom/src''</span>\n        <span>)</span><span>;</span>\n\n        <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>addNamespace</span><span>(</span>\n            <span>''Foo\\Bar\\Baz\\Dib''</span><span>,</span>\n            <span>''/vendor/foo.bar.baz.dib/src''</span>\n        <span>)</span><span>;</span>\n\n        <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>addNamespace</span><span>(</span>\n            <span>''Foo\\Bar\\Baz\\Dib\\Zim\\Gir''</span><span>,</span>\n            <span>''/vendor/foo.bar.baz.dib.zim.gir/src''</span>\n        <span>)</span><span>;</span>\n    <span>}</span>\n\n    <span>public</span> <span>function</span> <span>testExistingFile</span><span>(</span><span>)</span>\n    <span>{</span>\n        <span>$actual</span> <span>=</span> <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>loadClass</span><span>(</span><span>''Foo\\Bar\\ClassName''</span><span>)</span><span>;</span>\n        <span>$expect</span> <span>=</span> <span>''/vendor/foo.bar/src/ClassName.php''</span><span>;</span>\n        <span>$this</span><span>-</span><span>&gt;</span><span>assertSame</span><span>(</span><span>$expect</span><span>,</span> <span>$actual</span><span>)</span><span>;</span>\n\n        <span>$actual</span> <span>=</span> <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>loadClass</span><span>(</span><span>''Foo\\Bar\\ClassNameTest''</span><span>)</span><span>;</span>\n        <span>$expect</span> <span>=</span> <span>''/vendor/foo.bar/tests/ClassNameTest.php''</span><span>;</span>\n        <span>$this</span><span>-</span><span>&gt;</span><span>assertSame</span><span>(</span><span>$expect</span><span>,</span> <span>$actual</span><span>)</span><span>;</span>\n    <span>}</span>\n\n    <span>public</span> <span>function</span> <span>testMissingFile</span><span>(</span><span>)</span>\n    <span>{</span>\n        <span>$actual</span> <span>=</span> <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>loadClass</span><span>(</span><span>''No_Vendor\\No_Package\\NoClass''</span><span>)</span><span>;</span>\n        <span>$this</span><span>-</span><span>&gt;</span><span>assertFalse</span><span>(</span><span>$actual</span><span>)</span><span>;</span>\n    <span>}</span>\n\n    <span>public</span> <span>function</span> <span>testDeepFile</span><span>(</span><span>)</span>\n    <span>{</span>\n        <span>$actual</span> <span>=</span> <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>loadClass</span><span>(</span><span>''Foo\\Bar\\Baz\\Dib\\Zim\\Gir\\ClassName''</span><span>)</span><span>;</span>\n        <span>$expect</span> <span>=</span> <span>''/vendor/foo.bar.baz.dib.zim.gir/src/ClassName.php''</span><span>;</span>\n        <span>$this</span><span>-</span><span>&gt;</span><span>assertSame</span><span>(</span><span>$expect</span><span>,</span> <span>$actual</span><span>)</span><span>;</span>\n    <span>}</span>\n\n    <span>public</span> <span>function</span> <span>testConfusion</span><span>(</span><span>)</span>\n    <span>{</span>\n        <span>$actual</span> <span>=</span> <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>loadClass</span><span>(</span><span>''Foo\\Bar\\DoomClassName''</span><span>)</span><span>;</span>\n        <span>$expect</span> <span>=</span> <span>''/vendor/foo.bar/src/DoomClassName.php''</span><span>;</span>\n        <span>$this</span><span>-</span><span>&gt;</span><span>assertSame</span><span>(</span><span>$expect</span><span>,</span> <span>$actual</span><span>)</span><span>;</span>\n\n        <span>$actual</span> <span>=</span> <span>$this</span><span>-</span><span>&gt;</span><span>loader</span><span>-</span><span>&gt;</span><span>loadClass</span><span>(</span><span>''Foo\\BarDoom\\ClassName''</span><span>)</span><span>;</span>\n        <span>$expect</span> <span>=</span> <span>''/vendor/foo.bardoom/src/ClassName.php''</span><span>;</span>\n        <span>$this</span><span>-</span><span>&gt;</span><span>assertSame</span><span>(</span><span>$expect</span><span>,</span> <span>$actual</span><span>)</span><span>;</span>\n    <span>}</span>\n<span>}</span></span></code></pre><p><br></p><p><br></p>', 1, 0, 835, 'https://learnku.com/docs/psr/psr-4-autoloader-example/1609', 0, 'Win 10', '匿名', NULL),
(55, '参观茂陵', '/uploads/20191009/1570552324.jpg', '茂陵，位于陕西省咸阳市兴平市，是汉武帝刘彻的陵寝，是汉代帝王陵墓中规模最大、修造时间最长、陪葬品最丰富的一座，被称为“中国的金字塔”。', '汉武帝，刘彻', 4, 0, NULL, 1570551700, '<p><font size="4" face="宋体" color="#000000">茂陵，位于陕西省咸阳市兴平市，是汉武帝刘彻的陵寝，是汉代帝王陵墓中规模最大、修造时间最长、陪葬品最丰富的一座，被称为“中国的金字塔”。</font></p><p><font face="宋体" color="#000000"><font size="4">其实想去参观茂陵的想法已经产生很久了，当我看完《中国通史》这部具有教育、了解等多方面的历史纪录片时，这种想法就孕育而生了，不光是茂陵，所有中国古代帝王陵墓都想去一探究竟（当然不是dm，手动微笑）。与其说是由这部纪录片影响的，倒不如说是17年去参观兵马俑的时候留下的一个小小遗憾，17年国庆节计划包含了秦始皇帝陵，结果因为某些原因取消了，所以在心里留下了这个小火种，一直到看《中国通史》的时候才复燃，并愈演愈烈，不可收拾！</font><font size="4"><br></font></font></p><p><font size="4" face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><font size="4">随着国庆黄金周的来临，暨祖国70周年华诞，加上公司假期足够长（11天，想想还是激动不已），所以就愉快的决定了再次去西安（咸阳），算是弥补上次的遗憾。。在课本里面，我们对汉武帝的认知仅仅只有历史课上的“汉武帝开创了西汉的鼎盛时代，凿通西域、罢黜百家，独尊儒术，统一思想”，但进一步了解，就会发现，汉武帝这个人也是好大喜功，不可一世......。计划顺利进行，到了西安站还没叹息西安古城墙的沧桑与峥嵘，便向西安北站出发，再到咸阳秦都站，由于时间赶不上，中间还改签了一次</font><img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_thumb.gif">，<font size="4">索性没有耽搁。</font></font></p><p><font size="4" face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/da2886a14425f7825772b520180019cc.png" alt=""></font></p><p><font face="宋体" color="#000000">大致路线</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><font size="4">在去往茂陵博物馆的路上，行人稀少，每一班公交车到站，下车的就只有几个人，有的只是象征性的停靠，也许是路途较远！经过 ‘长途跋涉’，终于来到了茂陵博物馆。终于不用排队买票了</font><img src="http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_thumb.gif">，<font size="4">进入博物馆，</font><font size="4">思绪也从21世纪穿越盛唐、隋晋、三国、东汉，回溯到西汉。</font><font size="4">茂陵博物馆位于咸阳市兴平市南位镇，这里地处咸阳市与兴平市之间的一块黄土高地，因有汉高祖长陵、惠帝安陵、景帝阳陵、武帝茂陵、昭帝平陵而称为五陵塬。汉代时这里属槐里县茂乡，这也就是汉武帝陵称为茂陵的原因。</font><font size="4"><br></font></font></p><p><font size="4" face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">茂陵博物馆没有设在茂陵，而是在距茂陵东约一公里的霍去病墓。1956年，茂陵文管所成立，所址就位于霍去病墓前，当时仅有3间瓦房，16件大型石刻。1961年3月4日，国务院公布茂陵、霍去病墓为第一批全国重点文物保护单位。之后，茂陵文管所升格为茂陵博物馆，并不断整修、扩建，目前，博物馆总占地面积15万多平方米，馆藏文物4100多件，国宝级文物14件，是一座以汉武帝茂陵、霍去病墓及大型石刻群而蜚声海内外的西汉当代史博物馆。</font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/9f14312c9e829ec45d9115d2fa802e37.png" alt=""><font size="4"><br></font></font></p><p><font face="宋体" color="#000000">博物馆中间的大道（手机摄像头出问题了，凑合一下）</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><font size="4">从透花门进入博物馆，呈入眼前的是一条宽阔的大道，这也是博物馆的中轴，一直延伸到霍去病墓墓顶。穿过朱雀门是</font><font size="4">琳池，</font><font size="4">但见仿汉建筑群林立，亭台楼阁参差错落，琳池喷泉碧波荡漾，苍松翠柏芬芳馥郁。<br></font></font></p><p><font size="4" face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/23934bc7c56d7928a857d46dcf95eb43.png" alt="">琳池一角</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><font size="4">在琳池的北岸，是两座</font><font size="4">石刻亭，西亭内，陈列着著名的“马踏匈奴”石刻。</font><font size="4">石刻</font><span style="font-size: large;">高1.68米，长1.90米，历来被公认为霍去病墓石刻中的主体雕刻，是一件有代表性的纪念碑</span><span style="font-size: large;">式的杰作。它以写实与浪漫相结合的手法，使用一人一马对比的形式，构成一个高下悬殊的抗衡场面，揭示出正义力量不可摧的主题。</span></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/988f6f84e572291bd89afedef22f9269.png" alt="">马踏匈奴一</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/0fdc193fcd7c02e1e1b2e9337db1abbb.png" alt=""><br></font></p><p><font size="2" face="宋体" color="#000000">马踏匈奴二</font></p><p><font size="2" face="宋体" color="#000000"><br></font></p><p><font size="2" face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><font size="4">略过石刻亭，矗立着的是霍去病的墓碑，由</font><font size="4">清乾隆年间陕西巡抚毕沅题写：‘</font><font size="4">汉骠骑将军大司马冠军侯霍公去病墓’。<br></font></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/87fa8b186c5406393556f02477106d4e.png" alt=""><br></font></p><p><font face="宋体" color="#000000">霍去病墓碑</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><font size="4">霍去病（公元前140年—前117年），是西汉武帝时期杰出的青年将领。他十八岁起领兵作战，二十四岁霍去病病逝，短暂的一生，六次率兵平定西部边陲，取得了决定性的胜利，为西汉王朝的统一、巩固，做出了卓越的贡献。封狼居胥，赢得仓皇北顾。为纪念他生前河西大捷的战功，霍去病的</font><font size="4">墓冢</font><span style="font-size: large;">酷肖祁连山</span><span style="font-size: large;">，</span></font></p><p><a href="https://baike.baidu.com/pic/%E8%8C%82%E9%99%B5%E5%8D%9A%E7%89%A9%E9%A6%86/5421525/0/5327ce16b110ba77972b4380?fr=lemma&ct=single" target="_blank"><font face="宋体" color="#000000"><img src="https://gss0.bd////static.com/94o3dSag_xI4khGkpoWK1HF6hhy/baike/s%3D220/sign=95c1f1919925bc312f5d069a6ede8de7/738b4710b912c8fc7bfad292fc039245d6882167.jpg" alt="霍去病"></font></a></p><p><font face="宋体" color="#000000">网络配图</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191009/60f1d76bba0fff3c9f8017ce3b707812.png" alt=""><br></font></p><p><font face="宋体" color="#000000">陡峭的石阶</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191009/506d46c5cc6def1241fd21ee1669b32c.png" alt=""><br></font></p><p><font face="宋体" color="#000000">龙洗一</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191009/be33f2cccce7e272707f5d0ef9c7ccb9.png" alt=""><br></font></p><p><font face="宋体" color="#000000">龙洗二</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">在沿着陡峭的台阶忘墓顶爬的时候，偶见两个后辈搀着老人向上攀岩。</font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/9a693ab1c42c114202eea65afb1ddc02.png" alt=""><br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">登临揽胜亭，可以远眺茂陵，也可以将四周景色尽收眼底。揽胜亭，大概意为纪念霍去病一生的战绩，将胜利揽入。亭子的石板刻有青龙、白虎、朱雀以及玄武。</font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/132cf673d6141c69a69ee81922dc3674.png" alt=""><br></font></p><p><font face="宋体" color="#000000">揽胜亭</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/30ab135e31e208f70a7ee04cbf5069fb.png" alt=""><br></font></p><p><font face="宋体" color="#000000">眺望茂陵</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">据工作人员介绍，从墓前上来的需要从后面下去，从后面上来的则需要从前面下去，至于为什么，规矩顺序不能乱，乱套了成何体统。</font></p><p><font size="4" face="宋体" color="#000000">从墓后山下去依次是三窝神石、去病石、霍去病纪念馆。</font></p><p><font size="4" face="宋体" color="#000000">三窝神石：许愿神石，三个洞口竖着排列，将心愿投入里面，投得越高心愿越大。</font></p><p><font size="4" face="宋体" color="#000000">去病石：据说是由汉武帝亲自题写，病字没有头上的那一点，意为病一点都没有。</font></p><p><font size="4" face="宋体" color="#000000">纪念馆：霍去病戎马且短暂的一生。</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">由于时间的原因，卫青墓就跳过了，又留下一个小小的遗憾，沿着后山下去，在陈列室里面走了一圈，感叹岁月的峥嵘。</font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/f809fe7768e9190e1060195e26224152.png" alt=""><font size="4"><br></font></font></p><p><font face="宋体" color="#000000">陈列室的模型</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/c5799da5dcb458e8f916af8d15163f58.png" alt=""><br></font></p><p><font face="宋体" color="#000000">部分陶器</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">离开博物馆的时候，工作人员也好心提醒可以去前面一公里不远处的茂陵看看，这也是此行的最终目的。</font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/8330aa4a59fb690f068931f054aae7e5.png" alt=""><br></font></p><p><font face="宋体" color="#000000">博物馆外面直通茂陵的大道</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/c1f108e6cb3cef25ef7d0872b21d311a.png" alt=""><br></font></p><p><font face="宋体" color="#000000">茂陵</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/3267587b061faa06e7b9d05b2499d0be.png" alt=""><br></font></p><p><font face="宋体" color="#000000">墓碑一</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/23febd5501ebc9f98c3b6c845b283173.png" alt=""><br></font></p><p><font face="宋体" color="#000000">墓碑二</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><img src="uploads/20191008/46de04b2ea9d0e3e4543fa80276e4cf2.png" alt=""><br></font></p><p><font face="宋体" color="#000000">李夫人墓</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font face="宋体" color="#000000"><font size="4">李夫人——</font><font size="4">历史上第一位追封的汉武帝皇后</font><span style="font-size: large;">，</span><span style="font-size: large;">西汉著名音乐家</span><span style="font-size: large;">李延年</span><span style="font-size: large;">、贰师将军</span><span style="font-size: large;">李广利</span><span style="font-size: large;">之妹</span><span style="font-size: large;">，</span><span style="font-size: large;">李季</span><span style="font-size: large;">之姐。汉武帝</span><span style="font-size: large;">刘彻</span><span style="font-size: large;">的宠妃。李氏平民出身，父母兄弟均通音乐，都是以乐舞为职业的艺人。</span><span style="font-size: large;">&nbsp;</span><span style="font-size: large;">前112，由</span><span style="font-size: large;">平阳公主</span><span style="font-size: large;">推荐给汉武帝，获封夫人，深得汉武帝的宠幸，</span><font size="4">曾侍武帝起舞，歌曰：“北方有佳人，绝世而独立，一顾倾人城，再顾倾人国。宁不知倾城与倾国，佳人难再得！”。成语——倾国倾城因此而来。</font></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">整个茂陵陵园呈方形，分为内外两城，四周环以围墙。城墙东西长431米，南北宽415米，墙基宽5.8米，四面的正中开辟有门。封冢为覆斗形，高46.5米，东西长231米，南北长234米。“在西汉，以西为尊，卫青、霍去病、霍光....均在茂陵东侧，独李夫人墓在西边，这可能就是中国人怕老婆的原因吧！”讲解员打趣道。封土有多高，地宫就有多深，可见茂陵陪葬品之丰富。</font></p><p><font face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">在茂陵还有一个有关风水的故事（根据网络及讲解员修改）：</font></p><p><font face="宋体" color="#000000">武帝入葬后没过多久，茂陵就被盗墓贼盗掘，盛极一时的西汉王朝也逐渐走向了衰落。而东方朔大失水准的判断，以及他自己的墓葬，亦在坊间成为了话题。有人说，东方朔当时起了私心，故意瞒着汉武帝，把茂陵址故意向上移了一段，却将真正的宝地留给了自己。他还特意在这块风水宝地上种了一棵小树，目的就是日后能顺利找到此处。东方朔一直把这个秘密深藏心底，从未说与人知，直到咽气以前才把儿子叫到床边，叮嘱道： “我死后，你去茂陵下面找一棵老树，找到后就把我埋在那儿!切记切记!”他的儿子很有孝心，就依照父亲的遗愿把他葬在了那里。就在东方朔下葬后的第二天，他的墓骤然长高了五丈，第三天，墓又高了五丈，几乎就要高过汉武帝的茂陵了。天神看不过去了，说你东方朔区区一个风水先生，坟墓怎么能比汉武帝还要高呢?天神一怒之下，便捡起一块石头压住了东方朔的墓顶。由于被天神扔来的石头压住了，东方朔的墓便也不再长高了，后人就把东方朔的墓称作“压石冢” 。后人说，就风水而言，东方朔的压石冢要比汉武帝的茂陵好。在压石冢处，可以“卧看长安” ;在茂陵处，只能“坐看长安” 。雄才大略如汉武帝，到头来竟然被一个风水先生算计了，这也算是他人生中的一个败笔吧。<br></font></p><p><font face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">离开茂陵，感慨万分，思绪万千。</font></p><p><font size="4" face="宋体" color="#000000"><br></font></p><p><font size="4" face="宋体" color="#000000">后续：参观其他帝王陵墓，首选自驾游！多努力一点，距离梦想就近一点。下一次争取自驾游。</font></p><p><br></p>', 2, 0, 945, '', 1, 'Win 10', 'snow', NULL);
INSERT INTO `lp_article` (`art_id`, `art_title`, `art_img`, `art_remark`, `art_keyword`, `art_pid`, `art_down`, `art_file`, `create_time`, `art_content`, `art_view`, `art_collection`, `art_hit`, `art_url`, `art_original`, `art_from`, `art_author`, `delete_time`) VALUES
(57, 'ThinkPHP6.0版本发布', '/uploads/20191026/1572073274.jpg', '官方历时一年多倾力打造的ThinkPHP6.0版本正式发布', 'ThinkPHP，6.0版本', 3, 0, NULL, 1572073274, '<p><br></p><p>官方历时一年多倾力打造的ThinkPHP6.0版本正式发布，该版本基于精简核心和统一用法两大原则在5.1的基础上对底层架构做了进一步的优化改进，并更加规范化。</p><p>由于引入了一些新特性，ThinkPHP6.0运行环境要求PHP7.1+（推荐PHP7.3+），不支持5.1的无缝升级（官方提供了<a href="https://www.kancloud.cn/manual/thinkphp6_0/1037654" target="_blank">升级指导</a>）。</p><p><font size="5">主要特性：</font></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n采用PHP7强类型（严格模式）</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n支持更多的PSR规范</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n多应用支持</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\nORM组件独立</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n改进的中间件机制</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n核心架构服务化</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n全新的事件系统</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n容器功能增强</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n模板引擎组件独立</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n内部功能中间件化</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\nSESSION机制改进</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n缓存及日志支持多通道</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n引入Filesystem组件</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n对Swoole以及协程支持改进</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n对IDE更加友好</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n统一和精简大量用法</p><p><br></p><p><font size="5">强类型及严格模式</font></p><p>在主流框架里面，ThinkPHP6.0是最先采用PHP7严格模式的。所有的核心文件都是开启了严格模式的类型约束，因此有任何的变量类型不符的情况都会抛出异常，有利于规范代码中的变量类型和提前发现问题隐患。</p><p><br></p><p><font size="5">多应用模式</font></p><p>新版框架提供了多应用模式支持，默认安装为单应用，你只需要安装一个多应用模式扩展就可以更轻松的部署多个应用而不需要重复安装依赖组件，每个应用都支持独立入口访问以及域名绑定，也可以使用一个入口文件实现自动多应用部署。并且自动多应用模式支持智能识别，对于不存在的应用访问会自动切换到单应用模式进行匹配。同时支持应用的映射和禁止访问机制。</p><p>多应用模式的设计可以让开发更加模块化，因为每个应用的配置、路由及视图都可以纳入应用目录，所以更方便应用的模块化，甚至引入composer应用。</p><p><font size="5"><br></font></p><p><font size="5">容器和服务</font></p><p>新版的容器支持PSR-11规范，容器类的功能特性主要包括：</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n绑定类、对象实例、接口到容器</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n创建类的实例（存在则直接获取）</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n容器对象绑定别名</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n支持容器对象（实例化）回调</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n获取容器对象实例</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n删除容器中的对象实例</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n提供依赖注入和门面实现支持</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n调用容器对象实例的方法（或者闭包）</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n提供容器对象的ArrayAccess支持</p><p><br></p><p><font size="5">事件系统</font></p><p>新版的事件系统可以看成是5.1版本行为系统的升级版，事件系统相比行为系统强大的地方在于事件本身可以是一个类，并且可以更好的支持事件订阅者。支持事件智能订阅，通过反射机制来识别当前订阅者要订阅的事件。</p><p>事件相比较中间件的优势是事件比中间件更加精准定位（或者说粒度更细），并且更适合一些业务场景的扩展。例如，我们通常会遇到用户注册或者登录后需要做一系列操作，通过事件系统可以做到不侵入原有代码完成登录的操作扩展，降低系统的耦合性的同时，也降低了BUG的可能性。</p><p><br></p><p><font size="5">中间件支持完善</font></p><p>中间件分为全局中间件、应用中间件、路由中间件和控制器中间件，这四个中间件分组完全独立执行，但同一个分组内的中间件不会重复执行。中间件方法执行依赖注入，以及请求结束的回调机制。</p><p>核心很多功能都是基于中间件来完成，包括多应用模式也是采用中间件机制执行。</p><p><br></p><p><font size="5">路由和请求</font></p><p>新版的路由精简了很多不必要的功能，路由定义也更加规范化和语义化，并且路由定义文件支持纳入应用目录，便于模块化开发。路由注解功能独立为<a href="https://github.com/top-think/think-annotation" target="_blank">think-annotation</a>库，并且使用更加规范，支持IDE提示。</p><p>新版的请求对象更易扩展，系统默认安装后提供了一个app\\Request类，你可以在应用中直接自定义请求对象，增加必要的属性和方法。但不会影响对think\\Request的依赖注入和门面调用。</p><p><br></p><p><font size="5">系统服务</font></p><p>由于核心框架采用了服务化设计，你可以在你的扩展或者应用中注册需要的服务。在系统服务中注册一个对象到容器，或者对某些对象进行相关的依赖注入。由于系统服务的执行优先级问题，可以确保相关组件在执行的时候已经完成相关依赖注入。一个服务类通常包括注册（register）和启动（boot）方法，用于不同阶段的执行。</p><p><br></p><p><font size="5">ORM组件化</font></p><p>内置的ORM功能已经完全独立为think-orm组件，可以独立使用，ThinkPHP6.0默认依赖安装了该组件，保持用法不变的同时，增强了查询功能。</p><p><br></p><p><font size="5">模板引擎组件化</font></p><p>核心不再内置任何模板引擎，仅提供PHP模板支持，官方的模板引擎已经独立为think-template模板引擎，并默认依赖安装。你可以更方便的使用第三方模板引擎。</p><p><br></p><p><font size="5">日志系统</font></p><p>日志支持多通道、并统一命令行和WEB日志格式，主要包括：</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n日志增加多通道支持，可以同时或者切换写入多个通道</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\nWEB和CLI的日志记录格式统一，并支持日志格式化</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n对JSON日志格式的改进</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n支持日志写入事件</p><p><br></p><p><font size="5">Session机制改进</font></p><p>6.0版本的Session机制完全重写了，并且不再使用PHP内置的Session机制，全新实现一套Session机制，可以更好的支持Swoole/Workerman等环境。</p><p>所以不再支持PHP内置的session_***&nbsp;系列函数，也不再支持使用$_SESSION读取session数据，你必须通过框架提供的Session类或者门面来操作，Request类也封装了Session数据的读取。</p><p>Session支持跨应用读取和自定义序列化机制，默认采用文件类型记录Session数据，由于共用了缓存机制，你还可以使用任何支持的缓存类型来记录Session数据。</p><p><br></p><p><font size="5">引入Filesystem组件</font></p><p>新版增加了Filesystem类库对文件系统强化了支持，而且可以很方便的支持各种云存储，包括阿里云和七牛云。</p><p>Swoole扩展改进</p><p>Swoole扩展同时支持HTTP和Socket服务，支持数据库和缓存的连接池功能，以及RPC功能。</p><p><br></p><p><font size="5">调试工具更新</font></p><p>原来内置的页面Trace调试工具已经更改为扩展的方式，改成安装<a href="https://github.com/top-think/think-trace" target="_blank">think-trace</a>扩展，如果通过composer安装应用的话，默认会安装topthink/think-trace扩展。</p><p>基本用法和之前保持不变，但无需额外配置，默认使用html方式显示，同时仍然支持浏览器控制台显示，并仅在调试模式下有效。</p><p>同时增加了一个基于<a href="http://phpdebugbar.com/" target="_blank">debugbar</a>的调试扩展<a href="https://github.com/top-think/think-debugbar" target="_blank">think-debugbar</a>，需要单独安装后才能使用。</p><p>composer\nrequire topthink/think-debugbar</p><p><br></p><p><font size="5">统一和精简大量用法</font></p><p>新版对很多用法进行了精简和统一，尽可能避免在开发过程中规范不一的困惑。</p><p><br></p><p><font size="5">开发手册</font></p><p>更多内容可以查看官方的<a href="https://www.kancloud.cn/manual/thinkphp6_0/content" target="_blank">完全开发手册</a>。</p><p>抱着一份初心和坚持，ThinkPHP始终坚持完善和更新，十三年来持续发布了多个大版本。其实ThinkPHP历史以来的大版本都提供了超过年18个月的支持和维护，目前ThinkPHP主要版本的维护计划公告如下：</p><table>\n <thead>\n  <tr>\n   <td>\n   <p><b>ThinkPHP</b><b>版本</b><b><o:p></o:p></b></p>\n   </td>\n   <td>\n   <p><b>发布时间</b><b><o:p></o:p></b></p>\n   </td>\n   <td>\n   <p><b>BUG</b><b>修复</b><b><o:p></o:p></b></p>\n   </td>\n   <td>\n   <p><b>安全更新</b><b><o:p></o:p></b></p>\n   </td>\n  </tr>\n </thead>\n <tbody><tr>\n  <td>\n  <p>3.2（PHP5.3+）<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2013年12月18日<o:p></o:p></p>\n  </td>\n  <td>\n  <p>结束服务<o:p></o:p></p>\n  </td>\n  <td>\n  <p>结束服务<o:p></o:p></p>\n  </td>\n </tr>\n <tr>\n  <td>\n  <p>5.0（PHP5.4+）<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2016年9月15日<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2019年1月1日<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2020年1月1日<o:p></o:p></p>\n  </td>\n </tr>\n <tr>\n  <td>\n  <p>5.1（PHP5.6+）<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2018年1月1日<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2020年1月1日<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2021年1月1日<o:p></o:p></p>\n  </td>\n </tr>\n <tr>\n  <td>\n  <p>6.0（PHP7.1+）<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2019年10月24日<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2021年1月1日<o:p></o:p></p>\n  </td>\n  <td>\n  <p>2022年1月1日<o:p></o:p></p>\n  </td>\n </tr>\n</tbody></table><p>&nbsp;</p><p></p><ul><li>福利一：<a href="https://www.kancloud.cn/activity/1024_programmer" target="_blank">看云技术文档1024程序员节限时五折优惠，仅限当天！错过等一年！</a></li><li><br></li><li>福利二：<a href="http://click.aliyun.com/m/1000081961/" target="_blank">【阿里云双11】亿元补贴等你来拿-爆款产品一折起</a></li></ul><p><br></p>', 2, 0, 954, 'https://blog.thinkphp.cn/1347379', 0, 'Win 10', '流年', NULL),
(58, '一张图解析《世界互联网50周年 中国互联网25周年发展历程》', '/uploads/20191107/1573109169.jpg', '人民网特别讲堂（一）\n一张图解析《世界互联网50周年 中国互联网25周年发展历程》', '互联网', 4, 0, NULL, 1572832809, '<p><img src="uploads/20191107/e87396f78cce238455ff9fbebf8f7077.jpg" alt="MAIN201910190914594440808729262" class="" style="width: 628.2px; height: 4865.4px;"><br></p><p><br></p>', 1, 0, 700, 'http://it.people.com.cn/n1/2019/1019/c1009-31408959.html', 0, 'Win 10', '责编：易潇、夏晓伦', NULL),
(59, '全球首份6G白皮书出炉', '/uploads/20191104/1572833622.jpg', '今年3月，全球首届6G峰会在芬兰举办。主办方芬兰奥卢大学峰会邀请了70位来自各国的顶尖通信专家', '6G', 4, 0, NULL, 1572833607, '<p>今年3月，全球首届6G峰会在芬兰举办。主办方芬兰奥卢大学峰会邀请了70位来自各国的顶尖通信专家，召开了一次闭门会议，主要内容就是群策群力、拟定全球首份6G白皮书，明确6G发展的基本方向。</p><p>近日，这份名为“6G无线智能无处不在的关键驱动与研究挑战” 的白皮书终于“千呼万唤始出来”，初步回答了6G怎样改变大众生活、有哪些技术特征、需解决哪些技术难点等问题。</p><p><img src="https://segmentfault.com/img/bVbztdi?w=399&h=571" alt="clipboard.png"></p><h2>6G引发生活变革</h2><p>报告展望，到2030年，随着6G技术的到来，许多当前仍是幻想的场景都将成为现实，人类生活将出现巨大变革。</p><p>随着新型显示、传感和成像设备以及低功耗专用处理器等技术的发展，现在的智能手机将被一个轻量的眼镜替代，通过超高的网速实现超高的分辨率、帧速率，并能提供虚拟现实、增强现实、混合现实合并为一的“XR”服务，与我们的感官、运动无缝连接。</p><p>高分辨率的传感成像、可穿戴显示器、超高速的无线网络将使实时捕捉、传输和渲染3D图像的远程全息成为现实。例如在会议中实时“投影”每个参与者、通过XR制造感知幻觉，使处于不同城市的人感觉同处一室。这在远程教育、协作设计、远程医疗、远程办公、高级三维模拟和训练，以及国防领域应用很广。</p><p>2030年以后，世界将有数以百万计接入网络的自动驾驶车辆，运输和物流都将更为高效。这些车辆既包括在家、学校、工作场所之间运行的无人驾驶汽车，也有运送货物的自动卡车或无人机。每一辆车都将配备许多传感器，包括摄像机、激光扫描仪、里程计和太赫兹雷达等。算法必须快速融合生成周围环境地图，包括其可能碰撞的其他车辆，行人，动物等信息。</p><p><img src="https://segmentfault.com/img/bVbztdj?w=581&amp;h=542" alt="clipboard.png"></p><h2>性能超越5G百倍</h2><p>白皮书认为，与从1G到5G的前几次移动通信技术换代类似，6G的大多数性能指标相比5G将提升10到100倍。</p><p>白皮书给出了几个衡量6G技术的关键指标：峰值传输速度达到100Gbps-1Tbps，而5G仅为10Gpbs；室内定位精度10厘米，室外1米，相比5G提高10倍；通信时延0.1毫秒，是5G的十分之一；超高可靠性，中断几率小于百万分之一；超高密度，连接设备密度达到每立方米过百个。此外，6G将采用太赫兹频段通信，网络容量大幅提升。</p><p>从覆盖范围上看，6G无线网络不再局限于地面，而是将实现地面、卫星和机载网络的无缝连接。从定位精度上看，传统的GPS和蜂窝多点定位精度有限，难以实现室内物品精准部署，6G则足以实现对物联网设备的高精度定位。同时，6G将与人工智能、机器学习深度融合，智能传感、智能定位，智能资源分配、智能接口切换等都将成为现实，智能程度大幅度跃升。</p><h2>技术难题仍待突破</h2><p>6G的高性能很诱人，但要解决的技术难题也不少。第一个挑战就是攻克尚不成熟的太赫兹通信技术，实现理想中的通信速率；而随着波段频率增加，天线体积将越来越小，频率达到250GHZ时，4平方厘米面积上足以安装1000个天线，这对集成电子、新材料等技术是巨大的挑战。</p><p>白皮书认为，到2030年，数字世界将与物理世界深度融合，人们的生活将愈发依赖可靠的网络运行，这对通信网络的安全问题提出了更高要求，6G网络应具备缓解和抵御网络攻击并追查攻击源头的能力。</p><p>6G时代的到来必将带来万物互联，产生海量数据信息。一方面，这些数据关乎个人和企业隐私，实现可靠的数据保护是6G推广应用的前提；另一方面，实时处理这些数据需要成熟的边缘计算技术，而边缘计算还面临数据访问受限、设备计算能力和存储能力不足等问题。</p><p>奥卢大学“6G旗舰计划”负责人马蒂·拉特瓦霍（Matti Latva-aho）在白皮书发布声明中表示，6G的根本是数据，无线网络采集、处理、传输和消耗数据的方式推动6G的发展。</p><p>也就是说，6G的研究就是要按照6G的标准，解决数据从采集到消耗中的技术难题。</p><p></p><p>新闻来源：<a href="https://mp.weixin.qq.com/s/fX8J3BHKvWBFerCAi9I60g" target="_blank">科技日报</a></p><p><br></p>', 1, 0, 737, 'https://segmentfault.com/a/1190000020807779', 0, 'Win 10', '匿名', NULL),
(60, '当我们在谈论高并发的时候究竟在谈什么?', '/uploads/20191118/1574071511.jpg', '高并发是互联网分布式系统架构的性能指标之一,它通常是指单位时间内系统能够同时处理的请求数,简单点说，就是QPS(Queries persecond)。', '高并发', 3, 0, NULL, 1573886387, '<h3><span style="font-weight: normal;"><font color="#000000">什么是高并发?</font></span></h3><h3><pre><code style="font-weight: normal;"><font color="#000000">高并发是互联网分布式系统架构的性能指标之一,它通常是指单位时间内系统能够同时处理的请求数,\n简单点说，就是QPS(Queries per second)。</font></code></pre></h3><h5><span style="font-weight: normal;"><font color="#000000">那么我们在谈论高并发的时候，究竟在谈些什么东西呢？</font></span></h5><div><span style="font-weight: normal;"><font color="#000000"><br></font></span></div><h3><span style="font-weight: normal;"><font color="#000000">高并发究竟是什么?</font></span></h3><h3><p><span style="font-weight: normal;"><font color="#000000" size="3">这里先给出结论:高并发的基本表现为单位时间内系统能够同时处理的请求数,高并发的核心是对CPU资源的有效压榨。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">举个例子，如果我们开发了一个叫做MD5穷举的应用，每个请求都会携带一个md5加密字符串，最终系统穷举出所有的结果，并返回原始字符串。这个时候我们的应用场景或者说应用业务是属于CPU密集型而不是IO密集型。这个时候CPU一直在做有效计算，甚至可以把CPU利用率跑满，这时我们谈论高并发并没有任何意义。(当然，我们可以通过加机器也就是加CPU来提高并发能力,这个是一个正常猿都知道废话方案，谈论加机器没有什么意义，没有任何高并发是加机器解决不了，如果有,那说明你加的机器还不够多!)</font></span></p><p><font color="#000000" size="3" style="">对于大多数互联网应用来说,CPU不是也不应该是系统的瓶颈，系统的大部分时间的状况都是CPU在等I/O (硬盘/内存/网络) 的读/写操作完成。</font></p><p><span style="font-weight: normal;"><font color="#000000" size="3">这个时候就可能有人会说，我看系统监控的时候，内存和网络都很正常，但是CPU却跑满了这是为什么？</font></span></p><pre><code style="font-weight: normal;"><font color="#000000">这是一个好问题,后文我会给出实际的例子，再次强调上文说的&nbsp;''有效压榨''&nbsp;这4个字,这4个字会围绕本文的全部内容！</font></code></pre></h3><h3><span style="font-weight: normal;"><font color="#000000"><br></font></span></h3><h3><span style="font-weight: normal;"><font color="#000000">控制变量法</font></span></h3><h3><p><span style="font-weight: normal;"><font color="#000000" size="3">万事万物都是互相联系的，当我们在谈论高并发的时候，系统的每个环节应该都是需要与之相匹配的。我们先来回顾一下一个经典C/S的HTTP请求流程。</font></span></p><p><img src="uploads/20191116/02588516e996a529f7fac7555a5b1f9b.png" alt=""><br></p><p><span style="font-weight: normal;"><font color="#000000" size="3">如图中的序号所示:1 我们会经过DNS服务器的解析，请求到达负载均衡集群2 负载均衡服务器会根据配置的规则，想请求分摊到服务层。服务层也是我们的业务核心层，这里可能也会有一些PRC、MQ的一些调用等等3 再经过缓存层4 最后持久化数据5 返回数据给客户端</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">要达到高并发，我们需要 负载均衡、服务层、缓存层、持久层 都是高可用、高性能的，甚至在第5步，我们也可以通过 压缩静态文件、HTTP2推送静态文件、CDN来做优化，这里的每一层我们都可以写几本书来谈优化。</font></span></p><p><span style="font-weight: normal;"><font color="#000000"><font size="3">本文主要讨论服务层这一块，即图红线圈出来的那部分。不再考虑讲述数据库、缓存相关的影响。高中的知识告诉我们，这个叫&nbsp;控制变量法。</font></font></span></p></h3><h3><span style="font-weight: normal;"><font color="#000000">再谈并发</font></span></h3><h3><ul><li><span style="font-weight: normal;"><font color="#000000" size="4">网络编程模型的演变历史</font></span></li></ul><p><img src="uploads/20191116/94e9a40986b12ec8b4ad61ffe6516da1.png" alt=""><span style="color: rgb(0, 0, 0); font-family: inherit; font-size: medium; font-weight: normal;"><br></span></p><p><span style="color: rgb(0, 0, 0); font-family: inherit; font-size: medium; font-weight: normal;">并发问题一直是服务端编程中的重点和难点问题，为了优系统的并发量，从最初的Fork进程开始，到进程池/线程池,再到epoll事件驱动(Nginx、node.js反人类回调),再到协程。从上中可以很明显的看出，整个演变的过程，就是对CPU有效性能压榨的过程。什么?不明显?</span></p><p><span style="color: rgb(0, 0, 0); font-weight: normal; font-family: inherit;"><br></span></p><p><span style="color: rgb(0, 0, 0); font-weight: normal; font-family: inherit;">那我们再谈谈上下文切换</span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">在谈论上下文切换之前，我们再明确两个名词的概念。并行：两个事件同一时刻完成。并发：两个事件在同一时间段内交替发生,从宏观上看，两个事件都发生了。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">线程是操作系统调度的最小单位，进程是资源分配的最小单位。由于CPU是串行的,因此对于单核CPU来说,同一时刻一定是只有一个线程在占用CPU资源的。因此，Linux作为一个多任务(进程)系统，会频繁的发生进程/线程切换。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">在每个任务运行前，CPU都需要知道从哪里加载，从哪里运行，这些信息保存在CPU寄存器和操作系统的程序计数器里面，这两样东西就叫做&nbsp;CPU上下文。进程是由内核来管理和调度的，进程的切换只能发生在内核态，因此 虚拟内存、栈、全局变量等用户空间的资源，以及内核堆栈、寄存器等内核空间的状态,就叫做&nbsp;进程上下文。前面说过,线程是操作系统调度的最小单位。同时线程会共享父进程的虚拟内存和全局变量等资源，因此 父进程的资源加上线上自己的私有数据就叫做线程的上下文。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">对于线程的上下文切换来说，如果是同一进程的线程，因为有资源共享，所以会比多进程间的切换消耗更少的资源。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">现在就更容易解释了，进程和线程的切换，会产生CPU上下文切换和进程/线程上下文的切换。而这些上下文切换,都是会消耗额外的CPU的资源的。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3"><br></font></span></p><p><span style="color: rgb(0, 0, 0); font-weight: normal; font-family: inherit;">进一步谈谈协程的上下文切换</span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">那么协程就不需要上下文切换了吗？需要，但是不会产生&nbsp;CPU上下文切换和进程/线程上下文的切换,因为这些切换都是在同一个线程中，即用户态中的切换，你甚至可以简单的理解为，协程上下文之间的切换，就是移动了一下你程序里面的指针，CPU资源依旧属于当前线程。需要深刻理解的，可以再深入看看Go的GMP模型。最终的效果就是协程进一步压榨了CPU的有效利用率。</font></span></p></h3><h3><span style="font-weight: normal;"><font color="#000000" size="4">回到开始的那个问题</font></span></h3><h3><pre><code style="font-weight: normal;"><font color="#000000">这个时候就可能有人会说，我看系统监控的时候，内存和网络都很正常，但是CPU利用率却跑满了这是为什么？</font></code></pre><p><span style="font-weight: normal;"><font color="#000000" size="3">注意本篇文章在谈到CPU利用率的时候，一定会加上有效两字作为定语，CPU利用率跑满，很多时候其实是做了很多低效的计算。以"世界上最好的语言"为例，典型PHP-FPM的CGI模式，每一个HTTP请求:都会读取框架的数百个php文件，都会重新建立/释放一遍MYSQL/REIDS/MQ连接，都会重新动态解释编译执行PHP文件，都会在不同的php-fpm进程直接不停的切换切换再切换。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">php的这种CGI运行模式，根本上就决定了它在高并发上的灾难性表现。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">找到问题，往往比解决问题更难。当我们理解了当我们在谈论高并发究竟在谈什么&nbsp;之后,我们会发现高并发和高性能并不是编程语言限制了你，限制你的只是你的思想。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">找到问题,解决问题！当我们能有效压榨CPU性能之后,能达到什么样的效果?</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">下面我们看看 php+swoole的HTTP服务 与 Java高性能的异步框架netty的HTTP服务之间的性能差异对比。</font></span></p></h3><h3><span style="font-weight: normal;"><font color="#000000">性能对比前的准备</font></span></h3><h3><ul><li><a href="https://github.com/swoole/swoole-src/blob/master/README-CN.md" target="_blank" style="font-weight: normal;"><font color="#000000" size="4">swoole是什么</font></a></li></ul><pre><code style="font-weight: normal;"><font color="#000000">Swoole是一个为PHP用C和C++编写的基于事件的高性能异步&amp;协程并行网络通信引擎\n</font></code></pre><ul><li><a href="https://github.com/netty/netty" target="_blank" style="font-weight: normal;"><font color="#000000">Netty是什么</font></a></li></ul><pre><code style="font-weight: normal;"><font color="#000000">Netty是由JBOSS提供的一个java开源框架。 Netty提供异步的、事件驱动的网络应用程序框架和工具，用以快速开发高性能、高可靠性的网络服务器和客户端程序。</font></code></pre><ul><li><span style="font-weight: normal;"><font color="#000000"><br></font></span></li><li><span style="font-weight: normal;"><font color="#000000">单机能够达到的最大HTTP连接数是多少？</font></span></li></ul><p><span style="font-weight: normal;"><font color="#000000" size="3">回忆一下计算机网络的相关知识，HTTP协议是应用层协议，在传输层，每个TCP连接建立之前都会进行三次握手。每个TCP连接由&nbsp;本地ip,本地端口,远端ip,远端端口,四个属性标识。TCP协议报文头如下(图片来自<a href="https://en.wikipedia.org/wiki/Transmission_Control_Protocol" target="_blank">维基百科</a>)：</font></span></p><p><img src="uploads/20191116/74feb8291e8fa6276bf6a8707cd01d57.png" alt=""><br></p><p><span style="font-weight: normal;"><font color="#000000" size="3">本地端口由16位组成,因此本地端口的最多数量为 2^16 = 65535个。远端端口由16位组成,因此远端端口的最多数量为 2^16 = 65535个。同时，在linux底层的网络编程模型中，每个TCP连接，操作系统都会维护一个File descriptor(fd)文件来与之对应，而fd的数量限制，可以由ulimit -n 命令查看和修改，测试之前我们可以执行命令: ulimit -n 65536修改这个限制为65535。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">因此，在不考虑硬件资源限制的情况下，本地的最大HTTP连接数为： 本地最大端口数65535 * 本地ip数1 = 65535 个。远端的最大HTTP连接数为：远端最大端口数65535 * 远端(客户端)ip数+∞ = 无限制~~ 。PS: 实际上操作系统会有一些保留端口占用,因此本地的连接数实际也是达不到理论值的。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3"><br></font></span></p></h3><h3><span style="font-weight: normal;"><font color="#000000">性能对比</font></span></h3><h3><ul><li><span style="font-weight: normal;"><font color="#000000" size="4">测试资源</font></span></li></ul><p><span style="font-weight: normal;"><font color="#000000" size="4">各一台docker容器</font></span></p><p><img src="uploads/20191116/34b1a16a341f9ff1e89683033e9d138c.png" alt=""></p><p><span style="color: rgb(0, 0, 0); font-size: large; font-weight: normal; font-family: inherit;">docker-compose编排如下:</span></p><pre><code style="font-weight: normal;"><font color="#000000"># java8\nversion: "2.2"\nservices:\n  java8:\n    container_name: "java8"\n    hostname: "java8"\n    image: "java:8"\n    volumes:\n      - /home/cg/MyApp:/MyApp\n    ports:\n      - "5555:8080"\n    environment:\n      - TZ=Asia/Shanghai\n    working_dir: /MyApp\n    cpus: 2\n    cpuset: 0,1\n\n    mem_limit: 1024m\n    memswap_limit: 1024m\n    mem_reservation: 1024m\n    tty: true\n    \n# php7-sw\nversion: "2.2"\nservices:\n  php7-sw:\n    container_name: "php7-sw"\n    hostname: "php7-sw"\n    image: "mileschou/swoole:7.1"\n    volumes:\n      - /home/cg/MyApp:/MyApp\n    ports:\n      - "5551:8080"\n    environment:\n      - TZ=Asia/Shanghai\n    working_dir: /MyApp\n    cpus: 2\n    cpuset: 0,1\n\n    mem_limit: 1024m\n    memswap_limit: 1024m\n    mem_reservation: 1024m\n    tty: true    </font></code></pre><ul><li><span style="font-weight: normal;"><font color="#000000" size="4">php代码</font></span></li></ul><pre><code style="font-weight: normal;"><font color="#000000">&lt;?php\n\nuse Swoole\\Server;\nuse Swoole\\Http\\Response;\n\n$http = new swoole_http_server("0.0.0.0", 8080);\n$http-&gt;set([\n    ''worker_num'' =&gt; 2\n]);\n$http-&gt;on("request", function ($request, Response $response) {\n    //go(function () use ($response) {\n        // Swoole\\Coroutine::sleep(0.01);\n        $response-&gt;end(''Hello World'');\n    //});\n});\n\n$http-&gt;on("start", function (Server $server) {\n    go(function () use ($server) {\n        echo "server listen on 0.0.0.0:8080 \\n";\n    });\n});\n$http-&gt;start();\n</font></code></pre><ul><li><span style="font-weight: normal;"><font color="#000000" size="3">Java关键代码</font></span></li></ul><p><span style="font-weight: normal;"><font color="#000000" size="3">源代码来自,&nbsp;<a href="https://github.com/netty/netty/tree/4.1/example/src/main/java/io/netty/example/http/helloworld" target="_blank"></a><a href="https://github.com/netty/netty" target="_blank">https://github.com/netty/netty</a></font></span></p><pre><code style="font-weight: normal;"><font color="#000000">    public //static void main(String[] args) throws Exception {\n        // Configure SSL.\n        final SslContext sslCtx;\n        if (SSL) {\n            SelfSignedCertificate ssc = new SelfSignedCertificate();\n            sslCtx = SslContextBuilder.forServer(ssc.certificate(), ssc.privateKey()).build();\n        } else {\n            sslCtx = null;\n        }\n\n        // Configure the server.\n        EventLoopGroup bossGroup = new NioEventLoopGroup(2);\n        EventLoopGroup workerGroup = new NioEventLoopGroup();\n        try {\n            ServerBootstrap b = new ServerBootstrap();\n            b.option(ChannelOption.SO_BACKLOG, 1024);\n            b.group(bossGroup, workerGroup)\n             .channel(NioServerSocketChannel.class)\n             .handler(new LoggingHandler(LogLevel.INFO))\n             .childHandler(new HttpHelloWorldServerInitializer(sslCtx));\n\n            Channel ch = b.bind(PORT).sync().channel();\n\n            System.err.println("Open your web browser and navigate to " +\n                    (SSL? "https" : "http") + "://127.0.0.1:" + PORT + ''/'');\n\n            ch.closeFuture().sync();\n        } finally {\n            bossGroup.shutdownGracefully();\n            workerGroup.shutdownGracefully();\n        }\n    }\n</font></code></pre><p><span style="font-weight: normal;"><font color="#000000" size="3">因为我只给了两个核心的CPU资源，所以两个服务均只开启连个work进程即可。5551端口表示PHP服务。5555端口表示Java服务。</font></span></p><p><span style="color: rgb(0, 0, 0); font-weight: normal; font-family: inherit;"><br></span></p><p><span style="color: rgb(0, 0, 0); font-weight: normal; font-family: inherit;">压测工具结果对比：ApacheBench (ab)</span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">ab命令: docker run --rm jordi/ab -k -c 1000 -n 1000000&nbsp;<a href="http://10.234.3.32/" target="_blank">http://10.234.3.32</a>:5555/在并发1000进行100万次Http请求的基准测试中,</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">Java + netty 压测结果:</font></span></p><p><img src="uploads/20191116/fb5759f930035dbe297c2a7df39a5a67.png" alt=""><br></p><p><img src="uploads/20191116/0bf910dd924e0471c70e691814f0d996.png" alt=""><br></p><p><span style="font-weight: normal;"><font color="#000000" size="3">PHP + swoole 压测结果:</font></span></p><p><span style="font-weight: normal;"><font color="#000000"><img src="https://segmentfault.com/img/bVbtox2?w=1819&h=121" alt="clipboard.png"></font></span></p><p><span style="font-weight: normal;"><font color="#000000"><img src="https://segmentfault.com/img/bVbtoyJ?w=633&amp;h=944" alt="clipboard.png"></font></span></p><table><thead><tr><th><span style="font-weight: normal;"><font color="#000000" size="3">服务</font></span></th><th><span style="font-weight: normal;"><font color="#000000" size="3">QPS</font></span></th><th><span style="font-weight: normal;"><font color="#000000" size="3">响应时间ms(max,min)</font></span></th><th><span style="font-weight: normal;"><font color="#000000" size="3">内存(MB)</font></span></th></tr></thead><tbody><tr><td><span style="font-weight: normal;"><font color="#000000" size="3">Java + netty</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">84042.11</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">(11,25)</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">600+</font></span></td></tr><tr><td><span style="font-weight: normal;"><font color="#000000" size="3">php + swoole</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">87222.98</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">(9,25)</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">30+</font></span></td></tr></tbody></table><p><span style="font-weight: normal;"><font color="#000000" size="3">ps: 上图选择的是三次压测下的最佳结果。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">总的来说，性能差异并不大，PHP+swoole的服务甚至比Java+netty的服务还要稍微好一点，特别是在内存占用方面，java用了600MB,php只用了30MB。这能说明什么呢？没有IO阻塞操作,不会发生协程切换。这个仅仅只能说明 多线程+epoll的模式下,有效的压榨CPU性能，你甚至用PHP都能写出高并发和高性能的服务。</font></span></p></h3><h3><span style="font-weight: normal;"><font color="#000000" size="3">性能对比——见证奇迹的时刻</font></span></h3><h3><p><span style="font-weight: normal;"><font color="#000000" size="3">上面代码其实并没有展现出协程的优秀性能，因为整个请求没有阻塞操作,但往往我们的应用会伴随着例如 文档读取、DB连接/查询 等各种阻塞操作,下面我们看看加上阻塞操作后,压测结果如何。Java和PHP代码中,我都分别加上&nbsp;sleep(0.01) //秒的代码，模拟0.01秒的系统调用阻塞。代码就不再重复贴上来了。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">带IO阻塞操作的 Java + netty 压测结果:</font></span></p><p><img src="uploads/20191116/ac5362741b9904d0a30006e5093b99f4.png" alt=""><br></p><p><span style="font-weight: normal;"><font color="#000000" size="3">大概10分钟才能跑完所有压测。。。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">带IO阻塞操作的 PHP + swoole 压测结果:</font></span></p><p><img src="uploads/20191116/3a44a29a0a831c3eb477e300c4e735fd.png" alt=""><br></p><table><thead><tr><th><span style="font-weight: normal;"><font color="#000000" size="3">服务</font></span></th><th><span style="font-weight: normal;"><font color="#000000" size="3">QPS</font></span></th><th><span style="font-weight: normal;"><font color="#000000" size="3">响应时间ms(max,min)</font></span></th><th><span style="font-weight: normal;"><font color="#000000" size="3">内存(MB)</font></span></th></tr></thead><tbody><tr><td><span style="font-weight: normal;"><font color="#000000" size="3">Java + netty</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">1562.69</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">(52,160)</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">100+</font></span></td></tr><tr><td><span style="font-weight: normal;"><font color="#000000" size="3">php + swoole</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">9745.20</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">(9,25)</font></span></td><td><span style="font-weight: normal;"><font color="#000000" size="3">30+</font></span></td></tr></tbody></table><p><span style="font-weight: normal;"><font color="#000000" size="3">从结果中可以看出,基于协程的php+ swoole服务比 Java + netty服务的QPS高了6倍。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">当然，这两个测试代码都是官方demo中的源代码，肯定还有很多可以优化的配置，优化之后，结果肯定也会好很多。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">可以再思考下，为什么官方默认线程/进程数量不设置的更多一点呢？进程/线程数量可不是越多越好哦，前面我们已经讨论过了，在进程/线程切换的时候，会产生额外的CPU资源花销，特别是在用户态和内核态之间切换的时候！</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">对于这些压测结果来说，我并不是针对Java,我是指 只要明白了高并发的核心是什么,找到这个目标，无论用什么编程语言，只要针对CPU利用率做有效的优化(连接池、守护进程、多线程、协程、select轮询、epoll事件驱动)，你也能搭建出一个高并发和高性能的系统。</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">所以,你现在明白了，当我们在谈论高性能的时候，究竟在谈什么了吗？</font></span></p><p><span style="font-weight: normal;"><font color="#000000" size="3">思路永远比结果重要！</font></span></p></h3><p><br></p>', 2, 0, 782, 'https://segmentfault.com/a/1190000019360335', 0, 'Win 10', 'hncg', NULL),
(66, '波哥与吉娜', '/uploads/20200119/1579401721.jpg', '1920年代,亚德里亚海,飞翔在天空的,除了鸟儿,还有飞机。 火红的飞机,翻腾着穿过云海.波哥,红色的猪,望着他的,是吉娜...', '波哥，吉娜', 4, 0, NULL, 1579401636, '<p>1920年代,亚德里亚海,飞翔在天空的,除了鸟儿,还有飞机。&nbsp;<br></p><p>火红的飞机,翻腾着穿过云海.波哥,红色的猪,望着他的,是吉娜.....&nbsp;</p><p>曾经的美丽童年------------辽阔海洋上,老式的飞机渐渐起飞:那是波哥，载着吉娜.女孩兴奋的望着广阔的大海天空,还有帆船从翼下掠过.海风吹起了长裙,她努力整理,波哥恰好转头,却红了脸颊.多么美丽的女孩</p><p>啊,那是吉娜,而载着她飞翔的,那是波哥.....&nbsp;</p><p>童年的幸福转瞬即逝,残酷的战争和法西斯的崛起令他倍感痛苦,好友一个个和着战机逝去,随流云去到另一个世界.那里是天堂吗？天知道,或许,只是地狱……&nbsp;</p><p>而如今,波哥已不再做人,“做法西斯还不如做猪”,他诅咒了自己,成了一个自由翱翔天际的红色的猪－Porco Rosso.自由翱翔,他放下了一切,却放不下她------吉娜.</p><p>“好人全都死了……”吉娜的第三位先生终于没能回来……&nbsp;</p><p>死亡吹散了誓言,三年的等待最终落空,三位先生都没能伴她终老,而陪伴她到现在的,只有终日飞翔在空中的波哥.....&nbsp;</p><p>美丽的小岛是吉娜的小花园,她静静坐在窗边,膝头放着一本书,却不时望着窗外的天空.等待,日复一日,但等来的,却是格斯------一个外国雇佣军,带着好莱坞的邀请信……他想和她一起,去美国……&nbsp;</p><p>“我打过赌,在这里时,那人若来了,便爱他……”淡淡的拒绝,格斯放弃了……这时,窗外飞机轰鸣,吉娜快步跑出小屋.是他！红色双翼飞机,在空中翻滚,围绕小岛盘旋着,很近,很近.波哥转头望着吉娜.是他,回来</p><p>了……下来啊,波哥,下来啊……吉娜心想着..然而飞机没有停留，渐渐远去，消失在云端……“傻瓜……”吉娜淡淡地说了一句.&nbsp;</p><p>和格斯的那场决斗,波哥知道了一切,“吉娜喜欢你,她一直在花园里等你”……格斯的一记重拳,载着满满的幸福,波哥,倒下了……&nbsp;</p><p>影片的结尾,人们继续生活着,快乐着……&nbsp;</p><p>“吉娜越来越漂亮，老顾客也照常光临，格斯还是没作总统，那是结果如何，那是我们的秘密……”&nbsp;</p><p>音乐响起,加藤登纪子的歌声在空中萦绕,美丽而动人,带着忧伤.&nbsp;</p><p>故事就这样结束,仿佛缺点什么,却感觉如此完美……&nbsp;</p><p>天空中，一架红色飞机穿过云隙，飞向天际……</p><p><br></p>', 2, 0, 524, '', 1, 'Win 10', '', NULL),
(67, 'CPU 是怎么认识代码的？', '/uploads/20200120/1579503187.jpg', '先说一下半导体，啥叫半导体？就是介于导体和绝缘体中间的一种东西，比如二极管。', 'CPU，代码', 3, 0, NULL, 1579502814, '<p>又是读个大学就能懂系列的。</p><p>行吧，老规矩，尽量简单的语言来解释一下。</p><p>先说一下半导体，啥叫半导体？就是介于导体和绝缘体中间的一种东西，比如二极管。</p><p><img src="uploads/20200120/0c5ecf59561657183979c4cef8242f10.png" alt=""><br></p><p>电流可以从A端流向C端，但反过来则不行。你可以把它理解成一种防止电流逆流的东西。</p><p>当C端10V，A端0V，二极管可以视为断开。</p><p>当C端0V，A端10V，二极管可以视为导线，结果就是A端的电流源源不断的流向C端，导致最后的结果就是A端=C端=10V</p><p><img src="uploads/20200120/54e22f8cd134698ff6b6bf8062712ddf.png" alt=""><br></p><p>等等，不是说好的C端0V，A端10V么？咋就变成结果是A端=C端=10V了？你可以把这个理解成初始状态，当最后稳定下来之后就会变成A端=C端=10V。</p><p>文科的童鞋们对不住了，实在不懂问高中物理老师吧。反正你不能理解的话就记住这种情况下它相当于导线就行了。</p><p>利用半导体，我们可以制作一些有趣的电路，比如【与门】</p><p><img src="uploads/20200120/216ffa9ad8649f458741f9c54bd6e2b5.png" alt=""><br></p><p>此时A端B端只要有一个是0V，那Y端就会和0V地方直接导通，导致Y端也变成0V。只有AB两端都是10V，Y和AB之间才没有电流流动，Y端也才是10V。</p><p>我们把这个装置成为【与门】，把有电压的地方计为1，0电压的地方计为0。至于具体几V电压，那不重要。</p><p>也就是AB必须同时输入1，输出端Y才是1;AB有一个是0，输出端Y就是0。</p><p>其他还有【或门】【非门】和【异或门】，跟这个都差不多，或门就是输入有一个是1输出就是1，输入00则输入0。</p><p>非门也好理解，就是输入1输出0，输入0输出1。</p><p>异或门难理解一些，不过也就那么回事，输入01或者10则输出1，输入00或者11则输出0。（即输入两个一样的值则输出0，输入两个不一样的值则输出1）。</p><p>这几种门都可以用二极管做出来，具体怎么做就不演示了，有兴趣的童鞋可以自己试试。每次都画二极管也是个麻烦，我们就把门电路简化成下面几个符号。</p><p><img src="uploads/20200120/232b756559a47b0f7c3fecf02fe8d0f2.png" alt=""><br></p><p>想要学习C/C++编程的可以关注私信小编“编程”二字交流</p><p>然后我们就可以用门电路来做CPU了。当然做CPU还是挺难的，我们先从简单的开始：加法器。</p><p>加法器顾名思义，就是一种用来算加法的电路，最简单的就是下面这种。</p><p><img src="uploads/20200120/b206b17de3b70eb0f0cbe6d74c5953e0.png" alt=""><br></p><p>AB只能输入0或者1，也就是这个加法器能算0+0，1+0或者1+1。</p><p>输出端S是结果，而C则代表是不是发生进位了，二进制1+1=10嘛。这个时候C=1，S=0</p><p>费了大半天的力气，算个1+1是不是特别有成就感？</p><p>那再进一步算个1+2吧（二进制01+10），然后我们就发现了一个新的问题：第二位需要处理第一位有可能进位的问题，所以我们还得设计一个全加法器。</p><p><img src="uploads/20200120/5870a4614f1f7785c41bb3f9700ce7ef.png" alt=""><br></p><p>每次都这么画实在太麻烦了，我们简化一下</p><p><img src="uploads/20200120/629995b18ffb2662c9c01878d40d2c35.png" alt=""><br></p><p>也就是有3个输入2个输出，分别输入要相加的两个数和上一位的进位，然后输入结果和是否进位。</p><p>然后我们把这个全加法器串起来</p><p><img src="uploads/20200120/b197f63fe92e606e08519d1ab5165045.png" alt=""><br></p><p>我们就有了一个4位加法器，可以计算4位数的加法也就是15+15，已经达到了幼儿园中班水平，是不是特别给力？</p><p>做完加法器我们再做个乘法器吧，当然乘任意10进制数是有点麻烦的，我们先做个乘2的吧。</p><p>乘2就很简单了，对于一个2进制数数我们在后面加个0就算是乘2了</p><p>比如</p><blockquote>5=101（2）10=1010（2）</blockquote><p>所以我们只要把输入都往前移动一位，再在最低位上补个零就算是乘2了。具体逻辑电路图我就不画，你们知道咋回事就行了。</p><p>那乘3呢？简单，先位移一次（乘2）再加一次。乘5呢？先位移两次（乘4）再加一次。</p><p>所以一般简单的CPU是没有乘法的，而乘法则是通过位移和加算的组合来通过软件来实现的。这说的有点远了，我们还是继续做CPU吧。</p><p>现在假设你有8位加法器了，也有一个位移1位的模块了。串起来你就能算</p><blockquote>（A+B）X2</blockquote><p>了！激动人心，已经差不多到了准小学生水平。</p><p>那我要是想算</p><blockquote>AX2+B</blockquote><p>呢？简单，你把加法器模块和位移模块的接线改一下就行了，改成输入A先过位移模块，再进加法器就可以了。</p><p>啥？？？？你说啥？？？你的意思是我改个程序还得重新接线？</p><p>所以你以为呢？编程就是把线来回插啊。</p><p><img src="uploads/20200120/c0ab31ee93f3688c52eed42b2028f53c.png" alt=""><br></p><p>惊喜不惊喜？意外不意外？</p><p>早期的计算机就是这样编程的，几分钟就算完了但插线好几天。而且插线是个细致且需要耐心的工作，所以那个时候的程序员都是清一色的漂亮女孩子，穿制服的那种，就像照片上这样。是不是有种生不逢时的感觉？</p><p>虽然和美女作伴是个快乐的事，但插线也是个累死人的工作。所以我们需要改进一下，让CPU可以根据指令来相加或者乘2。</p><p>这里再引入两个模块，一个叫flip-flop，简称FF，中文好像叫触发器。</p><p><img src="uploads/20200120/0a6fce2bd75ac42ae0944f6f46eb28de.png" alt=""></p><p>这个模块的作用是存储1bit数据。比如上面这个RS型的FF，R是Reset，输入1则清零。S是Set，输入1则保存1。RS都输入0的时候，会一直输出刚才保存的内容。</p><p>我们用FF来保存计算的中间数据（也可以是中间状态或者别的什么），1bit肯定是不够的，不过我们可以并联嘛，用4个或者8个来保存4位或者8位数据。这种我们称之为寄存器（Register）。</p><p>另外一个叫MUX，中文叫选择器。</p><p><img src="uploads/20200120/5ada03965b67eadf26cf664bb3fcfbe8.png" alt=""><br></p><p>这个就简单了，sel输入0则输出i0的数据，i0是什么就输出什么，01皆可。同理sel如果输入1则输出i1的数据。当然选择器可以做的很长，比如这种四进一出的</p><p><img src="uploads/20200120/d09f4d02a28297ec2251d91ba6e6f952.png" alt=""><br></p><p>具体原理不细说了，其实看看逻辑图琢磨一下就懂了，知道有这个东西就行了。</p><p>有这个东西我们就可以给加法器和乘2模块（位移）设计一个激活针脚。</p><p>这个激活针脚输入1则激活这个模块，输入0则不激活。这样我们就可以控制数据是流入加法器还是位移模块了。</p><p>于是我们给CPU先设计8个输入针脚，4位指令，4位数据。</p><p>我们再设计3个指令：</p><blockquote>0100，数据读入寄存器0001，数据与寄存器相加，结果保存到寄存器0010，寄存器数据向左位移一位（乘2）</blockquote><p>为什么这么设计呢，刚才也说了，我们可以为每个模块设计一个激活针脚。然后我们可以分别用指令输入的第二第三第四个针脚连接寄存器，加法器和位移器的激活针脚。</p><p>这样我们输入0100这个指令的时候，寄存器输入被激活，其他模块都是0没有激活，数据就存入寄存器了。同理，如果我们输入0001这个指令，则加法器开始工作，我们就可以执行相加这个操作了。</p><p>这里就可以简单回答这个问题的第一个小问题了：</p><p>那cpu 是为什么能看懂这些二级制的数呢？</p><p>为什么CPU能看懂，因为CPU里面的线就是这么接的呗。你输入一个二进制数，就像开关一样激活CPU里面若干个指定的模块以及改变这些模块的连同方式，最终得出结果。</p><p>几个可能会被问道的问题</p><p>Q：CPU里面可能有成千上万个小模块，一个32位/64位的指令能控制那么多吗？</p><p>A：我们举例子的CPU里面只有3个模块，就直接接了。真正的CPU里会有一个解码器（decoder），把指令翻译成需要的形式。</p><p>Q：你举例子的简单CPU，如果我输入指令0011会怎么样？</p><p>A：当然是同时激活了加法器和位移器从而产生不可预料的后果，简单的说因为你使用了没有设计的指令，所以后果自负呗。（在真正的CPU上这么干大概率就是崩溃呗，当然肯定会有各种保护性的设计，死也就死当前进程）</p><p>细心的小伙伴可能发现一个问题：你设计的指令</p><blockquote>【0001，数据与寄存器相加，结果保存到寄存器】</blockquote><p>这个一步做不出来吧？毕竟还有一个回写的过程，实际上确实是这样。我们设计的简易CPU执行一个指令差不多得三步，读取指令，执行指令，写寄存器。</p><p>经典的RISC设计则是分5步：读取指令(IF)，解码指令(ID)，执行指令(EX)，内存操作(MEM)，写寄存器(WB)。我们平常用的x86的CPU有的指令可能要分将近20个步骤。</p><p>你可以理解有这么一个开关，我们啪的按一下，CPU就走一步，你按的越快CPU就走的越快。咦？听说你有个想法？少年，你这个想法很危险啊，姑且不说你有没有麒麟臂，能不能按那么快（现代的CPU也就2GHz多，大概也就一秒按个20亿下左右吧）</p><p>就算你能按那么快，虽然速度是上去了，但功耗会大大增加，发热上升稳定性下降。江湖上确实有这种玩法，名曰超频，不过新手不推荐你尝试哈。</p><p>那CPU怎么知道自己走到哪一步了呢？前面不是介绍了FF么，这个不光可以用来存中间数据，也可以用来存中间状态，也就是走到哪了。</p><p>具体的设计涉及到FSM（finite-state machine），也就是有限状态机理论，以及怎么用FF实装。这个也是很重要的一块，考试必考哈，只不过跟题目关系不大，这里就不展开讲了。</p><p>我们再继续刚才的讲，现在我们有3个指令了。我们来试试算个（1+4）X2+3吧。</p><blockquote>0100 0001 ；寄存器存入10001 0100 ；寄存器的数字加40010 0000 ；乘20001 0011 ；再加三</blockquote><p>太棒了，靠这台计算机我们应该可以打败所有的幼儿园小朋友，称霸大班了。而且现在我们用的是4位的，如果换成8位的CPU完全可以吊打低年级小学生了！</p><p>实际上用程序控制CPU是个挺高级的想法，再此之前计算机（器）的CPU都是单独设计的。</p><p>1969年一家日本公司BUSICOM想搞程控的计算器，而负责设计CPU的美国公司也觉得每次都重新设计CPU是个挺傻X的事，于是双方一拍即合，于1970年推出一种划时代的产品，世界上第一款微处理器4004。</p><p>这个架构改变了世界，那家负责设计CPU的美国公司也一步一步成为了业界巨头。哦对了，它叫Intel，对，就是噔噔噔噔的那个。</p><p>我们把刚才的程序整理一下，</p><blockquote>01000001000101000010000000010011</blockquote><p>你来把它输入CPU，我去准备一下去幼儿园大班踢馆的工作。</p><p>神马？等我们输完了人家小朋友掰手指都能算出来了？？</p><p></p><p>没办法机器语言就是这么反人类。哦，忘记说了，这种只有01组成的语言被称之为机器语言（机器码），是CPU唯一可以理解的语言。不过你把机器语言让人读，绝对一秒变典韦，这谁也受不了。</p><p><br></p>', 1, 0, 521, 'https://mp.weixin.qq.com/s?__biz=MzU4OTcyMjk2OA==&mid=2247488797&idx=5&sn=3dbe140293082bc1eb89f8d642723579&chksm=fdc8712acabff83', 0, 'Win 10', '科技前沿阵地', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `lp_banner`
--

CREATE TABLE IF NOT EXISTS `lp_banner` (
  `id` int(8) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `img` int(8) NOT NULL COMMENT '图片',
  `position` varchar(20) NOT NULL COMMENT '位置',
  `status` int(1) NOT NULL COMMENT '1为启用，0为禁用',
  `sort` int(4) NOT NULL COMMENT '排序，'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lp_banner`
--

INSERT INTO `lp_banner` (`id`, `title`, `img`, `position`, `status`, `sort`) VALUES
(1, '首页1', 56, 'index', 1, 2),
(3, '首页', 55, 'index', 1, 1),
(5, '首页', 57, 'index', 1, 3),
(6, '123', 54, 'index', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lp_comment`
--

CREATE TABLE IF NOT EXISTS `lp_comment` (
  `com_id` int(8) NOT NULL,
  `com_artid` int(11) NOT NULL DEFAULT '0' COMMENT '文章ID 为0则为留言评论',
  `com_userid` int(11) NOT NULL COMMENT '昵称',
  `com_email` text NOT NULL,
  `com_content` text NOT NULL COMMENT '文本',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '时间',
  `com_from` varchar(64) NOT NULL COMMENT '来自',
  `com_city` varchar(255) DEFAULT NULL COMMENT '评论地址',
  `com_ip` varchar(16) NOT NULL COMMENT 'IP',
  `com_view` tinyint(3) DEFAULT '1' COMMENT '0 待审核 1显示',
  `com_rtime` int(10) DEFAULT '0' COMMENT '回复时间',
  `com_rcontent` text COMMENT '内容',
  `com_status` tinyint(3) DEFAULT '0' COMMENT '是否回复 0为未回复'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='留言表';

-- --------------------------------------------------------

--
-- 表的结构 `lp_config`
--

CREATE TABLE IF NOT EXISTS `lp_config` (
  `id` int(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `class` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `up_time` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='系统配置';

--
-- 转存表中的数据 `lp_config`
--

INSERT INTO `lp_config` (`id`, `name`, `class`, `title`, `value`, `type`, `up_time`) VALUES
(7, 'about_aside', 'web', '关于_右侧', '来自南部的一个小城市，个性不张扬，讨厌随波逐流', 'text', '2020-03-21 20:51:27'),
(10, 'about', 'web', '关于', '{"banner":"4","about":"<p><b>\\u7ad9&nbsp; &nbsp; &nbsp; \\u957f\\uff1a<\\/b>snow<\\/p><p><b>\\u7a0b&nbsp; &nbsp; &nbsp; \\u5e8f\\uff1a<\\/b>\\u6d45\\u5531\\u6625\\u5929\\u535a\\u5ba2<\\/p><p><b>\\u5ea7 \\u53f3 \\u94ed\\uff1a<\\/b>\\u6e05\\u6f88\\u660e\\u6717\\uff0c\\u79ef\\u6781\\u5411\\u4e0a<\\/p><b>\\u6280&nbsp; &nbsp; &nbsp; \\u672f\\uff1a<\\/b>php<p><br><\\/p>"}', 'json', '2020-06-01 23:04:27'),
(11, 'contact', 'web', '联系方式', '{"__token__":"977010f4c692139ce84476ffb3ad85ab","email":"http:\\/\\/mail.qq.com\\/cgi-bin\\/qm_share?t=qm_mailme&email=QXd3dXV5d3J3dgEwMG8iLiw","qq":"qq","sina":"http:\\/\\/weibo.com\\/xuewuqingkong","net_easy":"https:\\/\\/music.163.com\\/#\\/user\\/home?id=429780502"}', 'json', '2020-03-21 21:14:06');

-- --------------------------------------------------------

--
-- 表的结构 `lp_dynamic`
--

CREATE TABLE IF NOT EXISTS `lp_dynamic` (
  `id` int(8) NOT NULL,
  `cont` tinytext NOT NULL COMMENT '动态内容',
  `good` int(8) DEFAULT '0' COMMENT '点赞',
  `equipment` varchar(150) DEFAULT 'DeskTop' COMMENT '设备',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  `create_time` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='我的动态';

--
-- 转存表中的数据 `lp_dynamic`
--

INSERT INTO `lp_dynamic` (`id`, `cont`, `good`, `equipment`, `status`, `create_time`) VALUES
(1, 'v3测试版本', 0, NULL, 1, 1584672189),
(3, '博客V3版本正式发布', 0, 'win10', 1, 1586106443),
(4, '今天栀子花开啦！', 0, 'win10', 1, 1587563951);

-- --------------------------------------------------------

--
-- 表的结构 `lp_link`
--

CREATE TABLE IF NOT EXISTS `lp_link` (
  `id` int(11) NOT NULL COMMENT '主键',
  `link_name` varchar(128) NOT NULL COMMENT '申请人',
  `link_url` varchar(128) NOT NULL COMMENT '域名',
  `link_content` varchar(128) NOT NULL COMMENT '描述',
  `link_sort` tinyint(3) NOT NULL DEFAULT '100' COMMENT '排序1为第一',
  `link_view` tinyint(2) NOT NULL COMMENT '显示0不显示1显示',
  `link_favicon` varchar(128) DEFAULT '/favicon.ico' COMMENT '图标地址'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

--
-- 转存表中的数据 `lp_link`
--

INSERT INTO `lp_link` (`id`, `link_name`, `link_url`, `link_content`, `link_sort`, `link_view`, `link_favicon`) VALUES
(3, '德马电影网', 'http://www.4561314.com/', '德马电影网', 100, 0, '/favicon.ico'),
(4, '博客大全', 'http://daohang.lusongsong.com/', '博客大全', 100, 1, '/uploads/link/20180507/4312ed9ec8357ffc21e54d133d442fe1.png'),
(5, '流景扬辉', 'http://www.liujingyanghui.top', '流景扬辉博客', 100, 1, '/uploads/link/20180507/b11f8cb59a5d48ee518fe7be5747b70a.png'),
(6, '代潇瑞博客', 'https://www.daixiaorui.com/', '代潇瑞博客', 100, 1, '/uploads/link/20180510/a5eaff1b3431a3a3871cf311ba982cbf.jpg'),
(7, '双色球软件', 'http://www.cpscfy.com', ' ', 100, 1, '/uploads/link/20180812/62024c80af9ac41f478cf1050b794a5a.jpg'),
(8, '西部数码', 'http://www.west.cn', '云主机、虚拟主机租用、域名注册服务商', 100, 1, '/uploads/link/20190723/fb51afd7fcb96c066183d35b0fcf46b0.png');

-- --------------------------------------------------------

--
-- 表的结构 `lp_menu`
--

CREATE TABLE IF NOT EXISTS `lp_menu` (
  `menu_id` int(11) NOT NULL COMMENT '主键',
  `menu_parent` int(11) DEFAULT NULL COMMENT '父级标签',
  `menu_url` varchar(128) DEFAULT NULL COMMENT '指向url地址',
  `menu_name` varchar(128) NOT NULL COMMENT '栏目名称',
  `menu_createtime` datetime DEFAULT NULL COMMENT '创建时间',
  `menu_sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  `menu_view` int(11) NOT NULL COMMENT '显示0不显示1显示',
  `menu_remark` varchar(256) NOT NULL COMMENT '描述'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='栏目表';

--
-- 转存表中的数据 `lp_menu`
--

INSERT INTO `lp_menu` (`menu_id`, `menu_parent`, `menu_url`, `menu_name`, `menu_createtime`, `menu_sort`, `menu_view`, `menu_remark`) VALUES
(1, 8, 'Cate/index', 'PHP', '2016-09-09 11:03:37', 99, 0, 'PHP笔记'),
(2, 8, 'Cate/index', 'HTML', '2016-09-09 11:03:39', 101, 0, '前端技术'),
(3, 8, 'Cate/index', '技术', '2016-09-09 11:03:40', 100, 1, 'ThinkPHP用法总结'),
(4, 8, 'Cate/index', '生活', '2016-09-09 11:03:42', 103, 1, '生活随笔'),
(5, 8, 'Cate/index', '分享', '2016-09-09 11:03:44', 102, 1, '文章分享'),
(6, 0, 'Index/index', '首页', '2016-09-09 10:44:17', 110, 1, '首页'),
(7, 0, 'About/index', '关于', '2016-09-09 10:44:45', 111, 1, '关于'),
(8, 0, 'Cate/index', '分类', '2016-09-09 11:03:19', 112, 1, '技术分类'),
(9, 0, 'Links/index', '邻居', '2016-09-09 11:04:26', 113, 1, '邻居'),
(10, 0, 'Comment/index', '留言', '2016-09-09 11:05:09', 114, 1, '留言'),
(11, 0, 'Download/index', '资源', '2016-09-09 11:05:55', 115, 1, '资源'),
(12, 0, 'Tool/index', '工具', '2016-09-09 11:41:52', 117, 0, '工具'),
(13, 0, 'Music/index', '音乐', '2018-05-09 16:43:18', 118, 1, ''),
(14, 8, 'Cate/index', '知乎分享', '2018-10-28 09:13:12', 104, 0, '知乎精选'),
(15, 0, 'Contribute/index', '投稿', '2019-03-07 00:00:00', 114, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `lp_tip`
--

CREATE TABLE IF NOT EXISTS `lp_tip` (
  `id` int(11) NOT NULL COMMENT '主键',
  `tip_title` varchar(128) DEFAULT NULL COMMENT '提示文字',
  `create_time` varchar(11) DEFAULT NULL COMMENT '添加时间',
  `tip_view` tinyint(3) DEFAULT NULL COMMENT '是否显示 0不显示 1显示',
  `tip_sort` tinyint(3) DEFAULT NULL COMMENT '排序'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lp_tip`
--

INSERT INTO `lp_tip` (`id`, `tip_title`, `create_time`, `tip_view`, `tip_sort`) VALUES
(1, '有的人就像是空气，会不知不觉地入侵我们的生活，直到我们再也离不开他。', '2016-11-15 ', 0, 100),
(4, '博客域名更换为:www.glping.net', '2018-10-22 ', 0, 0),
(5, 'happy birthday to myself', '2019-09-19 ', 0, 0),
(7, '新版本正式发布', '2020-02-28 ', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lp_user`
--

CREATE TABLE IF NOT EXISTS `lp_user` (
  `id` int(10) NOT NULL,
  `username` varchar(12) DEFAULT NULL COMMENT '手机号',
  `pwd` varchar(50) DEFAULT '0' COMMENT '密码',
  `nick` varchar(200) NOT NULL COMMENT '姓名（昵称）唯一',
  `avatar` varchar(250) NOT NULL COMMENT '头像',
  `qq_openid` varchar(250) DEFAULT '0' COMMENT 'openid',
  `sina_openid` varchar(250) DEFAULT NULL,
  `create_time` int(10) NOT NULL COMMENT '注册时间',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '用户状态，1为正常，2为冻结'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户列表';

--
-- 转存表中的数据 `lp_user`
--

INSERT INTO `lp_user` (`id`, `username`, `pwd`, `nick`, `avatar`, `qq_openid`, `sina_openid`, `create_time`, `status`) VALUES
(1, 'a123456', 'e10adc3949ba59abbe56e057f20f883e', '博主', 'https://thirdqq.qlogo.cn/g?b=oidb&k=WyFOLrOSzSPdfDBISh7cHA&s=100&t=1555698854', '952E2000FAFE6AE35C7A76968344A098	', NULL, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lp_version`
--

CREATE TABLE IF NOT EXISTS `lp_version` (
  `id` int(11) NOT NULL COMMENT '主键',
  `ver_bate` varchar(16) NOT NULL COMMENT '版本号',
  `ver_text` varchar(256) NOT NULL COMMENT '描述',
  `ver_addtime` varchar(20) NOT NULL COMMENT '时间'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='版本表';

--
-- 转存表中的数据 `lp_version`
--

INSERT INTO `lp_version` (`id`, `ver_bate`, `ver_text`, `ver_addtime`) VALUES
(1, 'v2.1', '新增播放器功能，进入网站后自动播放音乐', '1520764530'),
(2, 'v2.0.5', '新增中国天气插件（补充）', '1520764737'),
(3, 'v2.1.1', '前端UI小改动，去掉圆角向扁平化。更新重绘默认缩略图', '1525663105'),
(4, 'v2.2', '新增MKOnlinePlayer播放器，去掉入站播放小功能。', '1525859596'),
(5, 'v2.2.1', '新增文件分享，在博客登录的用户可以分享自己的文件、项目......', '1536589273'),
(6, 'v2.3', '框架升级到tp5.1', '1574072103'),
(7, 'v 2.3.1', '修复qq登录异常', '1575714165'),
(8, 'v3.0', '3.0版本正式发布', '1586106000'),
(9, 'v3.0.1', '修复搜索bug', '1591023960');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lp_admin_action`
--
ALTER TABLE `lp_admin_action`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_attachment`
--
ALTER TABLE `lp_admin_attachment`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_config`
--
ALTER TABLE `lp_admin_config`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_hook`
--
ALTER TABLE `lp_admin_hook`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_hook_plugin`
--
ALTER TABLE `lp_admin_hook_plugin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_icon`
--
ALTER TABLE `lp_admin_icon`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_icon_list`
--
ALTER TABLE `lp_admin_icon_list`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_log`
--
ALTER TABLE `lp_admin_log`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `action_ip_ix` (`action_ip`) USING BTREE,
  ADD KEY `action_id_ix` (`action_id`) USING BTREE,
  ADD KEY `user_id_ix` (`user_id`) USING BTREE;

--
-- Indexes for table `lp_admin_menu`
--
ALTER TABLE `lp_admin_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_message`
--
ALTER TABLE `lp_admin_message`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_module`
--
ALTER TABLE `lp_admin_module`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_packet`
--
ALTER TABLE `lp_admin_packet`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_plugin`
--
ALTER TABLE `lp_admin_plugin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_role`
--
ALTER TABLE `lp_admin_role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_admin_user`
--
ALTER TABLE `lp_admin_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `lp_article`
--
ALTER TABLE `lp_article`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `a_title` (`art_title`);

--
-- Indexes for table `lp_banner`
--
ALTER TABLE `lp_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lp_comment`
--
ALTER TABLE `lp_comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `lp_config`
--
ALTER TABLE `lp_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lp_dynamic`
--
ALTER TABLE `lp_dynamic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lp_link`
--
ALTER TABLE `lp_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lp_menu`
--
ALTER TABLE `lp_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `lp_tip`
--
ALTER TABLE `lp_tip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lp_user`
--
ALTER TABLE `lp_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lp_version`
--
ALTER TABLE `lp_version`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lp_admin_action`
--
ALTER TABLE `lp_admin_action`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `lp_admin_attachment`
--
ALTER TABLE `lp_admin_attachment`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `lp_admin_config`
--
ALTER TABLE `lp_admin_config`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `lp_admin_hook`
--
ALTER TABLE `lp_admin_hook`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lp_admin_hook_plugin`
--
ALTER TABLE `lp_admin_hook_plugin`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lp_admin_icon`
--
ALTER TABLE `lp_admin_icon`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lp_admin_icon_list`
--
ALTER TABLE `lp_admin_icon_list`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lp_admin_log`
--
ALTER TABLE `lp_admin_log`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=402;
--
-- AUTO_INCREMENT for table `lp_admin_menu`
--
ALTER TABLE `lp_admin_menu`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=409;
--
-- AUTO_INCREMENT for table `lp_admin_message`
--
ALTER TABLE `lp_admin_message`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lp_admin_module`
--
ALTER TABLE `lp_admin_module`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lp_admin_packet`
--
ALTER TABLE `lp_admin_packet`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lp_admin_plugin`
--
ALTER TABLE `lp_admin_plugin`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lp_admin_role`
--
ALTER TABLE `lp_admin_role`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lp_admin_user`
--
ALTER TABLE `lp_admin_user`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lp_article`
--
ALTER TABLE `lp_article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `lp_banner`
--
ALTER TABLE `lp_banner`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lp_comment`
--
ALTER TABLE `lp_comment`
  MODIFY `com_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `lp_config`
--
ALTER TABLE `lp_config`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `lp_dynamic`
--
ALTER TABLE `lp_dynamic`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lp_link`
--
ALTER TABLE `lp_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lp_menu`
--
ALTER TABLE `lp_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lp_tip`
--
ALTER TABLE `lp_tip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lp_user`
--
ALTER TABLE `lp_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `lp_version`
--
ALTER TABLE `lp_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
