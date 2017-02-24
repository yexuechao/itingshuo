-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 03 月 15 日 15:39
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `its`
--

-- --------------------------------------------------------

--
-- 表的结构 `its_class`
--

CREATE TABLE IF NOT EXISTS `its_class` (
  `institute_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '班级ID',
  `class_name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '班级名称',
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `its_class`
--

INSERT INTO `its_class` (`institute_id`, `class_id`, `class_name`) VALUES
(1, 1, 'A21'),
(2, 2, 'A20');

-- --------------------------------------------------------

--
-- 表的结构 `its_course`
--

CREATE TABLE IF NOT EXISTS `its_course` (
  `course_id` int(4) NOT NULL,
  `course_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course_introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `course_num` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_course`
--

INSERT INTO `its_course` (`course_id`, `course_name`, `course_introduction`, `course_num`) VALUES
(1, '课程1', '课程1的介绍blablabla', 4),
(2, '课程2', '课程2的介绍blablabla', 2);

-- --------------------------------------------------------

--
-- 表的结构 `its_dict`
--

CREATE TABLE IF NOT EXISTS `its_dict` (
  `id` int(7) NOT NULL COMMENT '字典条目ID',
  `type_id` int(7) DEFAULT NULL COMMENT '类型ID',
  `type_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '类型名称',
  `type_description` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '类型描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `its_emotion`
--

CREATE TABLE IF NOT EXISTS `its_emotion` (
  `emotion_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emotion_id` int(11) NOT NULL,
  PRIMARY KEY (`emotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_emotion`
--

INSERT INTO `its_emotion` (`emotion_name`, `emotion_id`) VALUES
('Happiness', 1),
('Sadness', 2),
('Anger', 3),
('Surprise', 4);

-- --------------------------------------------------------

--
-- 表的结构 `its_finish`
--

CREATE TABLE IF NOT EXISTS `its_finish` (
  `finish_id` int(11) NOT NULL AUTO_INCREMENT,
  `finish_type` int(11) NOT NULL,
  `finish_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`finish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `its_finish`
--

INSERT INTO `its_finish` (`finish_id`, `finish_type`, `finish_type_id`, `user_id`, `class_id`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `its_identity`
--

CREATE TABLE IF NOT EXISTS `its_identity` (
  `identity_id` int(4) NOT NULL,
  `identity_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_identity`
--

INSERT INTO `its_identity` (`identity_id`, `identity_name`) VALUES
(0, '管理员'),
(1, '学生'),
(2, '教师');

-- --------------------------------------------------------

--
-- 表的结构 `its_institute`
--

CREATE TABLE IF NOT EXISTS `its_institute` (
  `institute_id` int(4) NOT NULL,
  `institute_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`institute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='学院';

--
-- 转存表中的数据 `its_institute`
--

INSERT INTO `its_institute` (`institute_id`, `institute_name`) VALUES
(1, '信息学院'),
(2, '英教');

-- --------------------------------------------------------

--
-- 表的结构 `its_manage_class`
--

CREATE TABLE IF NOT EXISTS `its_manage_class` (
  `user_id` int(20) NOT NULL COMMENT '教师ID',
  `class_id` int(10) NOT NULL COMMENT '教师管理的班级ID',
  PRIMARY KEY (`user_id`,`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `its_manage_class`
--

INSERT INTO `its_manage_class` (`user_id`, `class_id`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `its_manage_student`
--

CREATE TABLE IF NOT EXISTS `its_manage_student` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `class_id` int(10) NOT NULL COMMENT '学生所属班级ID',
  PRIMARY KEY (`user_id`,`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_manage_student`
--

INSERT INTO `its_manage_student` (`user_id`, `class_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `its_movie`
--

CREATE TABLE IF NOT EXISTS `its_movie` (
  `movie_id` int(10) NOT NULL,
  `movie_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cover_addr` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `emotion_id` int(11) NOT NULL,
  `movie_introduction` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`movie_id`,`emotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_movie`
--

INSERT INTO `its_movie` (`movie_id`, `movie_name`, `cover_addr`, `emotion_id`, `movie_introduction`) VALUES
(1, '功夫熊猫', 'Public/Home/movie/cover/gongfupanda/gongfu.png', 1, '《功夫熊猫》是一部以中国功夫为主题的美国动作喜剧电影，影片以中国古代为背景，其景观、布景、服装以至食物均充满中国元素。故事讲述了一只笨拙的熊猫立志成为武林高手的故事。'),
(1, '花木兰', 'Public/Home/movie/cover/huamulan.png', 2, '《花木兰》是迪斯尼公司于1998年根据中国古诗《木兰辞》描述的木兰从军故事，出品的一部与《白雪公主》、《狮子王》同一等级的大型动画故事片。该片讲述了勇敢的木兰不愿年老的父亲上战场杀敌，就女扮男装代父从军；花家祖宗派神物“木须”帮助木兰，木兰最终克服了“女儿身”的困扰和军营里的伙伴一同打败侵入皇城的匈奴的故事。'),
(2, '泰迪熊', 'Public/Home/movie/cover/taidixiong.png', 1, '二十多年前，一个纯真善良的男孩约翰，因为害怕没有朋友的孤独，而许了一个愿，希望他的宝贝泰迪熊可以活过来，成为他真正的朋友。约翰没有想到的是，某种神秘的力量，让他的愿望成真了。约翰和泰迪熊一起生活，度过了欢乐的童年。直到，二十多年后，约翰成为了一个无所事事的年轻人，欢乐终于变成了麻烦。已过而立之年的约翰依然还是单身一人，每天和泰迪熊一起过着醉生梦死的生活。直到约翰遇上了让他一见钟情的姑娘劳丽，他才决心要改变自己。可是，这时候伙伴与恋人的矛盾却逐渐显现，两种不同的生活方式让约翰难以抉择。最后经历了许多波折，在爱情和友谊之间，约翰终于找到一个微妙的平衡点');

-- --------------------------------------------------------

--
-- 表的结构 `its_movie_grade`
--

CREATE TABLE IF NOT EXISTS `its_movie_grade` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `movie_id` int(10) NOT NULL COMMENT '电影ID',
  `segment_id` int(10) NOT NULL COMMENT '片段ID',
  `emotion_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '该条成绩创建时间',
  `segment_addr` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `eval_yinzhun` int(7) DEFAULT NULL COMMENT '音准评分',
  `eval_qinggan` int(7) DEFAULT NULL COMMENT '情感评分',
  `eval_zhongyin` int(7) DEFAULT NULL COMMENT '重音评分',
  `eval_yusu` int(7) DEFAULT NULL COMMENT '语速评分',
  `eval_jiezou` int(7) DEFAULT NULL COMMENT '节奏评分',
  `eval_yudiao` int(7) DEFAULT NULL COMMENT '语调评分',
  `eval_total` double(20,2) DEFAULT NULL COMMENT '总评分数',
  PRIMARY KEY (`user_id`,`movie_id`,`segment_id`,`emotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_movie_grade`
--

INSERT INTO `its_movie_grade` (`user_id`, `movie_id`, `segment_id`, `emotion_id`, `class_id`, `create_time`, `segment_addr`, `eval_yinzhun`, `eval_qinggan`, `eval_zhongyin`, `eval_yusu`, `eval_jiezou`, `eval_yudiao`, `eval_total`) VALUES
(1, 1, 1, 1, 1, 1456886576, '', 50, 60, 70, 80, 90, 100, 80.00),
(3, 1, 1, 1, 2, 1434556775, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `its_movie_grade_hist`
--

CREATE TABLE IF NOT EXISTS `its_movie_grade_hist` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `movie_id` int(10) NOT NULL COMMENT '电影ID',
  `segment_id` int(10) NOT NULL COMMENT '片段ID',
  `emotion_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '该条成绩创建时间',
  `segment_addr` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `eval_yinzhun` int(7) DEFAULT NULL COMMENT '音准评分',
  `eval_qinggan` int(7) DEFAULT NULL COMMENT '情感评分',
  `eval_zhongyin` int(7) DEFAULT NULL COMMENT '重音评分',
  `eval_yusu` int(7) DEFAULT NULL COMMENT '语速评分',
  `eval_jiezou` int(7) DEFAULT NULL COMMENT '节奏评分',
  `eval_yudiao` int(7) DEFAULT NULL COMMENT '语调评分',
  `eval_total` double(20,2) DEFAULT NULL COMMENT '总评分数',
  PRIMARY KEY (`user_id`,`movie_id`,`segment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='历史表，用于记录模仿的所有历史成绩';

-- --------------------------------------------------------

--
-- 表的结构 `its_movie_segment`
--

CREATE TABLE IF NOT EXISTS `its_movie_segment` (
  `segment_id` int(10) NOT NULL COMMENT '片段视频ID',
  `segment_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `segment_addr` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `segment_cover` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `segment_time` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `movie_id` int(10) NOT NULL COMMENT '电影ID',
  `emotion_id` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '添加电影的时间',
  PRIMARY KEY (`movie_id`,`segment_id`,`emotion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_movie_segment`
--

INSERT INTO `its_movie_segment` (`segment_id`, `segment_name`, `content`, `segment_addr`, `segment_cover`, `segment_time`, `movie_id`, `emotion_id`, `create_time`) VALUES
(1, 'po做梦', '-Po: Coming！ Sorry, dad.##-Dad: Sorry doesn''t make the noodles. What were you doing up there? All that noise。## -Po: Nothing. I just had a crazy dream.##-Dad: About what?   What were you dreaming about?##-Po: What was I...? I was dreaming about... ...noodles.##-Dad: Noodles? You were really dreaming about noodles?##-Po: Yeah. What else would I be dreaming about?  Careful！That soup is sharp.##-Dad: Oh, happy day! My son finally having the noodle dream!You don''t know how long I''ve been waiting for this moment. ', 'Public/Home/movie/video/Happiness_panda_00_03_24-00_04_34/Happiness_panda.mp4', 'Public/Home/movie/cover/gongfupanda/gongfu.png', '0:15', 1, 1, 1456453494),
(1, '木兰身份被揭穿', 'Mulan:l can explain.##Chi Fu:So it''s true!##Mulan:Xiang!##Chi Fu:l knew there was something wrong with you. A woman!  Treacherous snake! ##Mulan:My name is Mulan. l did it to save my father ##Chi Fu:High treason!##Mulan:l didn''t mean for it to go this far.##Chi Fu:Ultimate dishonor!##Mulan:lt was the only way.Please, believe me.##Chi Fu:Captain? Restrain him!##You know the law##Xiang:A life for a life.My debt is repaid. Move out!##Chi Fu:But you can''t just...##Xiang:l said move out!', 'Public/Home/movie/video/花木兰片段1 00_00_00-00_01_34.avi', 'Public/Home/movie/cover/gongfu.png', '1:23', 1, 2, 1456453494),
(2, '面馆由来', 'My son finally having the noodle dream! ', 'Public/Home/movie/video/Happiness_panda_00_03_24-00_04_34/Happiness_panda_sentence1.mp4', 'Public/Home/movie/cover/gongfupanda/1.jpg', '0:03', 1, 1, 1456453494),
(2, '木兰气馁', 'Mushu:It was this close. This close to impressin'' the ancestors, gettin'' the top shelf, an encourage.Man. All my fine work. Pfft.##Mulan:l should never have left home.##Mushu:Hey, come on.You went to save your father''s life. Who knew you''d end up shamin'' him,disgracing your ancestors and losin'' all your friends? You know, you just gotta... learn to let these things go.##Mulan:Maybe l didn''t go for my father. Maybe what l really wanted was to prove l could do things right. So when l looked in the mirror, l''d see someone worthwhile. But l was wrong. l see nothing.', 'Public/Home/movie/video/花木兰片段2 00_01_35-00_03_04.avi', 'Public/Home/movie/cover/gongfu.png', '1:33', 1, 2, 1456453494),
(3, '熊猫醉了', 'You don''t know how long I''ve been waiting for this moment. ', 'Public/Home/movie/video/Happiness_panda_00_03_24-00_04_34/Happiness_panda_sentence2.mp4', 'Public/Home/movie/cover/gongfupanda/2.jpg', '0:03', 1, 1, 1456886576),
(4, '熊猫又醉', 'You are almost ready to be entrusted with the secret ingredient of my Secret Ingredient Soup. ', 'Public/Home/movie/video/Happiness_panda_00_03_24-00_04_34/Happiness_panda_sentence3.mp4', 'Public/Home/movie/cover/gongfupanda/3.jpg', '0:03', 1, 1, 1456886576),
(5, '熊猫再醉', 'Then you will fulfill your destiny and take over the restaurant! ', 'Public/Home/movie/video/Happiness_panda_00_03_24-00_04_34/Happiness_panda_sentence4.mp4', 'Public/Home/movie/cover/gongfupanda/4.jpg', '0:03', 1, 1, 1456886576),
(6, '熊猫醉', 'As I took it over from my father, who took it from his father…who won it from   a friend in mahjong.', 'Public/Home/movie/video/Happiness_panda_00_03_24-00_04_34/Happiness_panda_sentence5.mp4', 'Public/Home/movie/cover/gongfupanda/5.jpg', '0:03', 1, 1, 1456886576),
(1, '片段1', 'Teddy? Teddy? Teddy?##Hug me.  You are my best friend, John!##Did you...Did you just talk?##Don’t look so surprised.##You’re the one who wished for it, aren’t you? ##Yeah, I’d wished for it.', 'Public/Home/movie/video/泰迪熊片段1 00_00_00-00_00_41.avi', 'Public/Home/movie/cover/gongfu.png', '1:32', 2, 1, 1456453494),
(2, '片段2', 'Well, here I am. ##You mean, we get to be best friends for real? ##For real. ##Forever and ever?##Sound good to me. ##John was just about the happiest boy in the world and he couldn’t wait to tell everyone the good news. ##Mom, Dad, guess what? My teddy bear’s alive!##Really?##Well, isn’t that exciting. ##No, Mom, he’s really alive.Look.##Merry Christmas,##everybody. ##Jesus H. Fuck!', 'Public/Home/movie/video/泰迪熊片段2 00_00_41-00_01_15.avi', 'Public/Home/movie/cover/gongfu.png', '2:13', 2, 1, 1456453494);

-- --------------------------------------------------------

--
-- 表的结构 `its_sentence`
--

CREATE TABLE IF NOT EXISTS `its_sentence` (
  `sentence_id` int(10) NOT NULL COMMENT '句子ID',
  `course_id` int(10) NOT NULL COMMENT '句子所属课程ID',
  `content` varchar(1024) CHARACTER SET utf8 NOT NULL COMMENT '句子内容',
  `sen_addr` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sen_time` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '添加句子的时间',
  PRIMARY KEY (`sentence_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_sentence`
--

INSERT INTO `its_sentence` (`sentence_id`, `course_id`, `content`, `sen_addr`, `sen_time`, `create_time`) VALUES
(1, 1, 'It will be in the place where we always put it.', 'Public/Home/tone/record/01.wav', '1:23', 1456453494),
(1, 2, 'I love b.F. Wangs! Have you guys heard their bang bang noodles?! ', 'Public/Home/tone/record/02.wav', '1:32', 1456453494),
(2, 1, 'It will be in the place where we always put it.', 'Public/Home/tone/record/03.wav', '2:13', 1456453494),
(2, 2, 'And I just want a million dollars!', 'Public/Home/tone/record/04.wav', '3:21', 1456453494),
(3, 1, 'The clothes are lying on the fridge', 'Public/Home/tone/record/05.wav', '2:31', 1456453494),
(4, 1, 'The clothes are lying on the fridge', 'Public/Home/tone/record/06.wav', '3:12', 1456453494);

-- --------------------------------------------------------

--
-- 表的结构 `its_sen_grade`
--

CREATE TABLE IF NOT EXISTS `its_sen_grade` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `sentence_id` int(10) NOT NULL COMMENT '句子ID',
  `course_id` int(10) NOT NULL COMMENT '课程ID',
  `class_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '该条成绩创建时间',
  `sen_addr` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `eval_yinzhun` int(7) DEFAULT NULL COMMENT '音准评分',
  `eval_qinggan` int(7) DEFAULT NULL COMMENT '情感评分',
  `eval_zhongyin` int(7) DEFAULT NULL COMMENT '重音评分',
  `eval_yusu` int(7) DEFAULT NULL COMMENT '语速评分',
  `eval_jiezou` int(7) DEFAULT NULL COMMENT '节奏评分',
  `eval_yudiao` int(7) DEFAULT NULL COMMENT '语调评分',
  `eval_total` double(20,2) DEFAULT NULL COMMENT '总评分数',
  PRIMARY KEY (`user_id`,`sentence_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_sen_grade`
--

INSERT INTO `its_sen_grade` (`user_id`, `sentence_id`, `course_id`, `class_id`, `create_time`, `sen_addr`, `eval_yinzhun`, `eval_qinggan`, `eval_zhongyin`, `eval_yusu`, `eval_jiezou`, `eval_yudiao`, `eval_total`) VALUES
(1, 1, 1, 1, 1434556775, '', 30, 40, 50, 60, 70, 80, 60.00);

-- --------------------------------------------------------

--
-- 表的结构 `its_sen_grade_hist`
--

CREATE TABLE IF NOT EXISTS `its_sen_grade_hist` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `sentence_id` int(10) NOT NULL COMMENT '句子ID',
  `course_id` int(10) NOT NULL COMMENT '课程ID',
  `class_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '该条成绩创建时间',
  `sen_addr` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `eval_yinzhun` int(7) DEFAULT NULL COMMENT '音准评分',
  `eval_qinggan` int(7) DEFAULT NULL COMMENT '情感评分',
  `eval_zhongyin` int(7) DEFAULT NULL COMMENT '重音评分',
  `eval_yusu` int(7) DEFAULT NULL COMMENT '语速评分',
  `eval_jiezou` int(7) DEFAULT NULL COMMENT '节奏评分',
  `eval_yudiao` int(7) DEFAULT NULL COMMENT '语调评分',
  `eval_total` double(20,2) DEFAULT NULL COMMENT '总评分数',
  PRIMARY KEY (`user_id`,`sentence_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `its_text`
--

CREATE TABLE IF NOT EXISTS `its_text` (
  `text_id` int(10) NOT NULL COMMENT '文本ID',
  `type_id` int(10) NOT NULL COMMENT '文本所属类型（1 演讲or 2散文）',
  `text_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL COMMENT '文本内容',
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) DEFAULT NULL COMMENT '添加文本的时间',
  PRIMARY KEY (`text_id`,`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_text`
--

INSERT INTO `its_text` (`text_id`, `type_id`, `text_name`, `content`, `url`, `create_time`) VALUES
(1, 1, 'Live in the present moment（生活在此时此刻）', 'To a large degree，the measure of our peace of mind is determined by how much we are able to live in the present moment．Irrespective of what happened yesterday or last year，and what may or may not happen tomorrow，the present moment is where you are －－always．\r\n##我们内心是否平和在很大程度上是由我们是否能生活在现实之中所决定的。不管昨天或去年发生了什么，不管明天可能发生或不发生什么，现实才是你时时刻刻所在之处。\r\n##Without question，many of us have mastered the neurotic art of spending much of our lives worrying about a variety of things －－all at once．We allow past problems and future concerns to dominate our present moments，so much so that we end up anxious，frustrated，depressed，and hopeless．\r\n##毫无疑问，我们很多人掌握了一种神经兮兮的艺术，即把生活中的大部分时间花在为种种事情担心忧虑上---而且常常是同时忧虑许多事情。我们听凭过去的麻烦和未来的担心控制我们此时此刻的生活，以致我们整日焦虑不安，萎靡不振，甚至沮丧绝望。\r\n##On the flip side，we also postpone our gratification，our stated priorities，and our happiness，often convincing ourselves that ‘someday’ will be better than today．Unfortunately，the same mental dynamics that tell us to look toward the future will only repeat themselves so that "someday " never actually arrives．\r\n##而另一方面我们又推迟我们的满足感，推迟我们应优先考虑的事情，推迟我们的幸福感，常常说服自己“有朝一日”会比今天更好。不幸的是，如此告诫我们朝前看的大脑动力只能重复来重复去，以致“有朝一日”永远不会真正来临。\r\n##John Lennon once said，‘Life is what’s happening while we’re busy making other plans．’When we’re busy making ‘other plans’，our children are busy growing up，the people we love are moving away and dying，our bodies are getting out of shape，and our dreams are slipping away．In short，we miss out on life． \r\n##约翰·列农曾经说过：“生活就是当我们忙于制定别的计划时发生的事。”当我们忙于制定种种“别的计划”时，我们的孩子在忙于长大，我们挚爱的人离去了甚至快去世了，我们的体型变样了，而我们的梦想也在悄然溜走了。一句话，我们错过了生活。 \r\n##Many people live as if life were a dress rehearsal for some later date．It isn’t．In fact，no one has a guarantee that he or she will be here tomorrow．Now is the only time we have，and the only time that we have any control over．When our attention is in the present moment，we push fear from our minds．Fear is the concern over events that might happen in the future－－we won’ t have enough money，our children will get into trouble，we will get old and die，whatever．\r\n##许多人的生活好像是某个未来日子的彩排。并非如此。事实上，没人能保证他或她明天肯定还活着。现在是我们所拥有的惟一时间，现在也是我们能控制的惟一时间。当我们将注意力放在此时此刻时，我们就将恐惧置于脑后。恐惧就是我们担忧某些事情会在未来发生---我们不会有足够的钱，我们的孩子会惹上麻烦，我们会变老，会死去，诸如此类。\r\n##To combat fear，the best strategy is to learn to bring your attention back to the present．Mark Twain said，‘I have been through some terrible things in my life，some of which actually happened．I don’t think I can say it any better．Practice keeping your attention on the here and now．Your efforts will pay great dividends．\r\n##若要克服恐惧心理，最佳策略便是学会将你的注意力拉回此时此刻。马克·吐温说过：“我经历过生活中一些可怕的事情，有些的确发生过。”我想我说不出比这更具内涵的话。经常将注意力集中于此情此景、此时此刻，你的努力终会有丰厚的报偿。', 'www.baidu.com', 1456453494),
(1, 3, 'on marriage -- kahlil gibran（纪伯伦）', '##You were born together, and together you shall be forevermore.\r\n##You shall be together when white wings of death scatter your days.\r\n##Aye, you shall be together even in the silent memory of God.\r\n##But let there be spaces in your togetherness,\r\n##And let the winds of the heavens dance between you.\r\n##Love one another but make not a bond of love:\r\n##Let it rather be a moving sea between the shores of your souls.\r\n##Fill each other''s cup but drink not from one cup.\r\n##Give one another of your bread but eat not from the same loaf.\r\n##Sing and dance together and be joyous, but let each one of you be alone,\r\n##Even as the strings of a lute are alone though they quiver with the same music.\r\n##Give your hearts, but not into each other''s keeping.\r\n##For only the hand of Life can contain your hearts.\r\n##And stand together, yet not too near together:\r\n##For the pillars of the temple stand apart,\r\n##And the oak tree and the cypress grow not in each other''s shadow. \r\n##你们一同出生，而且永远相伴\r\n##当死亡白色的羽翼掠过的生命时，你们将会合一\r\n##是的，甚至在神静默的记忆中，你们会也在一起\r\n##你们的结合要保留空隙，\r\n##让天堂的风在你们中间舞动。\r\n##彼此相爱，但不要制造爱的枷锁，\r\n##在你们灵魂的两岸之间，让爱成为涌动的海洋。\r\n##倒满彼此的酒杯，但不可只从一个杯子啜饮，\r\n##分享你们的面包，但不可只把同一块面包享用。 \r\n##一起欢笑，载歌载舞，\r\n##但容许对方的独处，\r\n##就像琵琶的弦，\r\n##虽然在同一首音乐中颤动，\r\n##然而你是你，我是我，彼此独立。\r\n##交出你的心灵，但不是由对方保管，\r\n##因为惟有生命之手，才能容纳你的心灵。\r\n##站在一起，却不可太过接近，\r\n##君不见，寺庙的梁柱各自耸立，\r\n##橡树与松柏，也不在彼此的阴影中成长。', 'www.google.com/hk', 1456452092),
(2, 1, 'Gettysburg Address（葛底斯堡演说）', 'Gettysburg, Pennsylvania\r\n##November 19, 1863\r\n##  Four score and seven years ago our fathers brought forth on this continent, a new nation, conceived in Liberty, and dedicated to the proposition that all men are created equal.\r\n##  Now we are engaged in a great civil war, testing whether that nation, or any nation so conceived and so dedicated, can long endure. We are met on a great battle-field of that war. We have come to dedicate a portion of that field, as a final resting place for those who here gave their lives that that nation might live. It is altogether fitting and proper that we should do this.\r\n##  But, in a larger sense, we can not dedicate -- we can not consecrate -- we can not hallow -- this ground. The brave men, living and dead, who struggled here, have consecrated it, far above our poor power to add or detract. The world will little note, nor long remember what we say here, but it can never forget what they did here. It is for us the living, rather, to be dedicated here to the unfinished work which they who fought here have thus far so nobly advanced. It is rather for us to be here dedicated to the great task remaining before us -- that from these honored dead we take increased devotion to that cause for which they gave the last full measure of devotion -- that we here highly resolve that these dead shall not have died in vain -- that this nation, under God, shall have a new birth of freedom -- and that government of the people, by the people, for the people, shall not perish from the earth.\r\n##亚伯拉罕·林肯\r\n##1863年11月19日\r\n##美国，宾夕法尼亚，葛底斯堡\r\n##    在八十七年前，我们的国父们在这块土地上创建一个新的国家，乃基于对自由的坚信，并致力于所有人皆生而平等的信念。\r\n##    当下吾等被卷入一场伟大的内战，以考验是否此国度，或任何肇基于和奉献于斯者，可永垂不朽。吾等现相逢于此战中一处浩大战场。而吾等将奉献此战场之部分，作为这群交付彼者生命让那国度勉能生存的人们最后安息之处。此乃全然妥切且适当而为吾人应行之举。\r\n##	但，于更大意义之上，吾等无法致力、无法奉上、无法成就此土之圣。这群勇者，无论生死，曾于斯奋战到底，早已使其神圣，而远超过吾人卑微之力所能增减。这世间不曾丝毫留意，也不长久记得吾等于斯所言，但永不忘怀彼人于此所为。吾等生者，理应当然，献身于此辈鞠躬尽瘁之未完大业。吾等在此责无旁贷献身于眼前之伟大使命：自光荣的亡者之处吾人肩起其终极之奉献—吾等在此答应亡者之死当非徒然—此国度，于神佑之下，当享有自由之新生—民有、民治、民享之政府当免于凋零。', 'www.sohu.com', 1456454000),
(2, 3, 'On Children', '##Your children are not your children.\r\n##They are the sons and daughters of Life''s longing for itself.\r\n##They come through you but not from you,\r\n##And though they are with you yet they belong not to you.\r\n##你的儿女，其实不是你的儿女\r\n##他们是生命对于自身渴望而诞生的孩子\r\n##他们借助你来到这世界，却非因你而来\r\n##他们在你身旁，却并不属于你\r\n##You may give them your love but not your thoughts, \r\n##For they have their own thoughts.\r\n##You may house their bodies but not their souls,\r\n##For their souls dwell in the house of tomorrow, \r\n##which you cannot visit, not even in your dreams.\r\n##You may strive to be like them, \r\n##but seek not to make them like you.\r\n##For life goes not backward nor tarries with yesterday.\r\n##你可以给予他们的是你的爱\r\n##却不是你的想法\r\n##因为他们有自己的思想\r\n##你可以庇护的是他们的身体，却不是他们的灵魂\r\n##因为他们的灵魂属于明天，属于你做梦也无法到达的明天\r\n##你可以拼尽全力，变得像他们一样\r\n##却不要让他们变得和你一样\r\n##因为生命不会后退，也不在过去停留\r\n##You are the bows from which your children\r\n##as living arrows are sent forth.\r\n##The archer sees the mark upon the path of the infinite, \r\n##and He bends you with His might \r\n##that His arrows may go swift and far.\r\n##Let your bending in the archer''s hand be for gladness;\r\n##For even as He loves the arrow that flies, \r\n##so He loves also the bow that is stable.\r\n##你是弓，儿女是从你那里射出的箭\r\n##弓箭手望着未来之路上的箭靶\r\n##他用尽力气将你拉开，使他的箭射得又快又远\r\n##怀着快乐的心情，在弓箭手的手中弯曲吧\r\n##因为他爱一路飞翔的箭，也爱无比稳定的弓', 'www.baidu.com', 1456453430);

-- --------------------------------------------------------

--
-- 表的结构 `its_text_grade`
--

CREATE TABLE IF NOT EXISTS `its_text_grade` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `text_id` int(10) NOT NULL COMMENT '句子ID',
  `type_id` int(10) NOT NULL COMMENT '课程ID',
  `class_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '该条成绩创建时间,即老师评分时间',
  `eval_grade` int(10) DEFAULT NULL COMMENT '教师评分分数',
  `eval_feedback` text CHARACTER SET utf8 COMMENT '教师评语',
  PRIMARY KEY (`user_id`,`text_id`,`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_text_grade`
--

INSERT INTO `its_text_grade` (`user_id`, `text_id`, `type_id`, `class_id`, `create_time`, `eval_grade`, `eval_feedback`) VALUES
(1, 1, 1, 1, 1434556775, 55, '第二次');

-- --------------------------------------------------------

--
-- 表的结构 `its_text_grade_hist`
--

CREATE TABLE IF NOT EXISTS `its_text_grade_hist` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `text_id` int(10) NOT NULL COMMENT '句子ID',
  `type_id` int(10) NOT NULL COMMENT '课程ID',
  `class_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '该条成绩创建时间,即老师评分时间',
  `eval_grade` int(10) DEFAULT NULL COMMENT '教师评分分数',
  `eval_feedback` varchar(250) CHARACTER SET utf8 DEFAULT NULL COMMENT '教师评语',
  PRIMARY KEY (`user_id`,`text_id`,`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_text_grade_hist`
--

INSERT INTO `its_text_grade_hist` (`user_id`, `text_id`, `type_id`, `class_id`, `create_time`, `eval_grade`, `eval_feedback`) VALUES
(1, 1, 1, 1, 1434556775, 88, '第一次');

-- --------------------------------------------------------

--
-- 表的结构 `its_text_type`
--

CREATE TABLE IF NOT EXISTS `its_text_type` (
  `type_id` int(4) NOT NULL,
  `type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_text_type`
--

INSERT INTO `its_text_type` (`type_id`, `type_name`) VALUES
(1, '普通散文'),
(2, '演讲稿'),
(3, '诗歌');

-- --------------------------------------------------------

--
-- 表的结构 `its_upload_text_list`
--

CREATE TABLE IF NOT EXISTS `its_upload_text_list` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `class_id` int(4) NOT NULL,
  `text_id` int(10) NOT NULL COMMENT '文本ID',
  `text_type_id` int(10) NOT NULL COMMENT '文本所属类型（1 演讲or 2散文）',
  `upload_time` int(11) NOT NULL COMMENT '练习上传时间',
  `is_pigai` int(4) NOT NULL,
  `text_addr` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`text_id`,`text_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `its_upload_text_list`
--

INSERT INTO `its_upload_text_list` (`user_id`, `class_id`, `text_id`, `text_type_id`, `upload_time`, `is_pigai`, `text_addr`) VALUES
(1, 1, 1, 1, 1456886576, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `its_url`
--

CREATE TABLE IF NOT EXISTS `its_url` (
  `url_id` int(10) NOT NULL COMMENT '页面URL ID',
  `url` varchar(250) CHARACTER SET utf8 NOT NULL COMMENT '页面URL地址',
  PRIMARY KEY (`url_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `its_user`
--

CREATE TABLE IF NOT EXISTS `its_user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_code` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(16) COLLATE utf8_unicode_ci NOT NULL COMMENT '学生姓名',
  `pwd` char(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `identity_id` int(4) NOT NULL,
  `class_id` int(10) NOT NULL COMMENT '班级ID',
  `register_date` int(11) DEFAULT NULL COMMENT '注册日期',
  `last_login_time` int(11) DEFAULT NULL COMMENT '上一次登录时间',
  PRIMARY KEY (`user_id`),
  KEY `fk_inst_class_id` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `its_user`
--

INSERT INTO `its_user` (`user_id`, `user_code`, `user_name`, `pwd`, `identity_id`, `class_id`, `register_date`, `last_login_time`) VALUES
(1, '20141002260', '夜夜夜', '96e79218965eb72c92a549dd5a330112', 1, 1, 1455699031, 1457347976),
(2, '20141002261', '教师', '96e79218965eb72c92a549dd5a330112', 2, 0, 1455699031, 1457348140);

-- --------------------------------------------------------

--
-- 表的结构 `its_user_behavior`
--

CREATE TABLE IF NOT EXISTS `its_user_behavior` (
  `user_id` int(20) NOT NULL COMMENT '学生ID',
  `url_id` int(10) NOT NULL COMMENT '访问的页面URL ID',
  `url_timestamp` int(11) NOT NULL COMMENT '记录访问URL的时间',
  PRIMARY KEY (`user_id`,`url_id`),
  KEY `fk_url_id` (`url_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 限制导出的表
--

--
-- 限制表 `its_user_behavior`
--
ALTER TABLE `its_user_behavior`
  ADD CONSTRAINT `fk_url_id` FOREIGN KEY (`url_id`) REFERENCES `its_url` (`url_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
