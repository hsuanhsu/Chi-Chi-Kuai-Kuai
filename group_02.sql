-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 13, 2017 at 04:50 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `group_02`
-- 
CREATE DATABASE `group_02` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `group_02`;

-- --------------------------------------------------------

-- 
-- Table structure for table `administrator`
-- 

CREATE TABLE `administrator` (
  `account` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=big5;

-- 
-- Dumping data for table `administrator`
-- 

INSERT INTO `administrator` VALUES ('llcshan96', '19961102');
INSERT INTO `administrator` VALUES ('dankong', '19970304');

-- --------------------------------------------------------

-- 
-- Table structure for table `cart`
-- 

CREATE TABLE `cart` (
  `account` varchar(12) NOT NULL,
  `productlist` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `cart`
-- 

INSERT INTO `cart` VALUES ('threethree', '2,16');
INSERT INTO `cart` VALUES ('fourfour', '24,23,25');
INSERT INTO `cart` VALUES ('fivefive', '');
INSERT INTO `cart` VALUES ('sixsix', '');
INSERT INTO `cart` VALUES ('sevenseven', '');
INSERT INTO `cart` VALUES ('eighteight', '');
INSERT INTO `cart` VALUES ('ninenine', '');
INSERT INTO `cart` VALUES ('tenten', '');
INSERT INTO `cart` VALUES ('taehyung', '22');
INSERT INTO `cart` VALUES ('jrjrjr', '10');
INSERT INTO `cart` VALUES ('dkdkdk', '');
INSERT INTO `cart` VALUES ('jungkook', '');
INSERT INTO `cart` VALUES ('minhyun', '');
INSERT INTO `cart` VALUES ('hoshihoshi', '');
INSERT INTO `cart` VALUES ('sugasuga', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `general`
-- 

CREATE TABLE `general` (
  `no` int(255) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `account` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=big5 AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `general`
-- 

INSERT INTO `general` VALUES (1, '張三', 'threethree', '333333', 'three@gmail.com', '0800000333', '地球');
INSERT INTO `general` VALUES (2, '李四', 'fourfour', '444444', 'four@gmail.com', '0800000444', '火星');
INSERT INTO `general` VALUES (3, '王五', 'fivefive', '555555', 'five@gmail.com', '0800000555', '水星');
INSERT INTO `general` VALUES (4, '趙六', 'sixsix', '666666', 'six@gmail.com', '0800000666', '木星');
INSERT INTO `general` VALUES (5, '劉七', 'sevenseven', '777777', 'seven@gmail.com', '0800000777', '土星');
INSERT INTO `general` VALUES (6, '孫八', 'eighteight', '888888', 'eight@gmail.com', '0800000888', '天王星');
INSERT INTO `general` VALUES (7, '錢九', 'ninenine', '999999', 'nine@gmail.com', '0800000999', '水王星');
INSERT INTO `general` VALUES (8, '畢十', 'tenten', '101010', 'ten@gmail.com', '0800101010', '金星');
INSERT INTO `general` VALUES (9, '金泰亨', 'taehyung', '19951230', 'taetae@gmail.com', '0800001230', '防彈');
INSERT INTO `general` VALUES (10, '金鐘炫', 'jrjrjr', '19950608', 'jr@gmail.com', '0800000608', '新東方');
INSERT INTO `general` VALUES (11, '李碩?', 'dkdkdk', '19970218', 'dk@gmail.com', '0800000218', '小17');
INSERT INTO `general` VALUES (12, '田?國', 'jungkook', '19970901', 'jk@gmail.com', '0800000901', '防彈');
INSERT INTO `general` VALUES (13, '黃旼泫', 'minhyun', '19950809', 'minhyun@gmail.com', '0800000809', '新東方');
INSERT INTO `general` VALUES (14, '權順榮', 'hoshihoshi', '19960615', 'hoshi@gmail.com', '0800000615', '小17');
INSERT INTO `general` VALUES (23, '閔?其', 'sugasuga', '19930309', 'suga@gmail.com', '0800000309', '防彈');

-- --------------------------------------------------------

-- 
-- Table structure for table `message`
-- 

CREATE TABLE `message` (
  `id` int(11) NOT NULL auto_increment,
  `guest_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- 
-- Dumping data for table `message`
-- 

INSERT INTO `message` VALUES (31, 9, '不好。', '2017-06-09');
INSERT INTO `message` VALUES (29, 0, '加油好嗎? ˊ ˋ', '2017-06-09');
INSERT INTO `message` VALUES (33, 9, '哈哈', '2017-06-09');
INSERT INTO `message` VALUES (34, 16, '哇! 好好笑喔ˊ_>ˋ', '2017-06-09');
INSERT INTO `message` VALUES (35, 7, '老天鵝R', '2017-06-09');
INSERT INTO `message` VALUES (38, 0, '國民隊長金鐘炫///', '2017-06-10');
INSERT INTO `message` VALUES (39, 15, '哇! 好好笑喔ˊ_>ˋ', '2017-06-10');

-- --------------------------------------------------------

-- 
-- Table structure for table `online_user`
-- 

CREATE TABLE `online_user` (
  `online_time` int(15) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `online_user`
-- 

INSERT INTO `online_user` VALUES (1497211784, '127.0.0.1');

-- --------------------------------------------------------

-- 
-- Table structure for table `orders`
-- 

CREATE TABLE `orders` (
  `account` varchar(12) NOT NULL,
  `orders` varchar(200) NOT NULL,
  `ps` varchar(200) NOT NULL,
  `time` date NOT NULL,
  `arrive` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `orders`
-- 

INSERT INTO `orders` VALUES ('fourfour', '[20-灰色*1]   ', '123', '2017-06-12', '已收到訂單');
INSERT INTO `orders` VALUES ('threethree', '[3-規格統一(隨機出貨)*1]   ', '', '2017-06-12', '已收到訂單');

-- --------------------------------------------------------

-- 
-- Table structure for table `p_class`
-- 

CREATE TABLE `p_class` (
  `p_class_id` int(4) NOT NULL auto_increment,
  `p_class_name` varchar(12) NOT NULL,
  PRIMARY KEY  (`p_class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `p_class`
-- 

INSERT INTO `p_class` VALUES (1, '兒童玩具');
INSERT INTO `p_class` VALUES (2, '電子產品');
INSERT INTO `p_class` VALUES (3, '派對小物');
INSERT INTO `p_class` VALUES (4, '實用小物');

-- --------------------------------------------------------

-- 
-- Table structure for table `p_img`
-- 

CREATE TABLE `p_img` (
  `p_id` int(4) NOT NULL,
  `p_img_url` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `p_img`
-- 

INSERT INTO `p_img` VALUES (1, '1-1.jpg');
INSERT INTO `p_img` VALUES (1, '1-2.jpg');
INSERT INTO `p_img` VALUES (2, '2-1.jpg');
INSERT INTO `p_img` VALUES (2, '2-2.jpg');
INSERT INTO `p_img` VALUES (2, '2-3.jpg');
INSERT INTO `p_img` VALUES (2, '2-4.jpg');
INSERT INTO `p_img` VALUES (2, '2-5.jpg');
INSERT INTO `p_img` VALUES (2, '2-6.jpg');
INSERT INTO `p_img` VALUES (3, '3-1.jpg');
INSERT INTO `p_img` VALUES (3, '3-2.jpg');
INSERT INTO `p_img` VALUES (3, '3-3.jpg');
INSERT INTO `p_img` VALUES (3, '3-4.jpg');
INSERT INTO `p_img` VALUES (3, '3-5.jpg');
INSERT INTO `p_img` VALUES (4, '4-1.jpg');
INSERT INTO `p_img` VALUES (4, '4-2.jpg');
INSERT INTO `p_img` VALUES (4, '4-3.jpg');
INSERT INTO `p_img` VALUES (4, '4-4.jpg');
INSERT INTO `p_img` VALUES (4, '4-5.jpg');
INSERT INTO `p_img` VALUES (4, '4-6.jpg');
INSERT INTO `p_img` VALUES (4, '4-7.jpg');
INSERT INTO `p_img` VALUES (5, '5-1.jpg');
INSERT INTO `p_img` VALUES (6, '6-1.jpg');
INSERT INTO `p_img` VALUES (6, '6-2.jpg');
INSERT INTO `p_img` VALUES (6, '6-3.jpg');
INSERT INTO `p_img` VALUES (7, '7-1.jpg');
INSERT INTO `p_img` VALUES (7, '7-2.jpg');
INSERT INTO `p_img` VALUES (7, '7-3.jpg');
INSERT INTO `p_img` VALUES (7, '7-4.jpg');
INSERT INTO `p_img` VALUES (8, '8-1.jpg');
INSERT INTO `p_img` VALUES (8, '8-2.jpg');
INSERT INTO `p_img` VALUES (8, '8-3.jpg');
INSERT INTO `p_img` VALUES (8, '8-4.jpg');
INSERT INTO `p_img` VALUES (9, '9-1.jpg');
INSERT INTO `p_img` VALUES (9, '9-2.jpg');
INSERT INTO `p_img` VALUES (9, '9-3.jpg');
INSERT INTO `p_img` VALUES (9, '9-4.jpg');
INSERT INTO `p_img` VALUES (9, '9-5.jpg');
INSERT INTO `p_img` VALUES (10, '10-1.jpg');
INSERT INTO `p_img` VALUES (10, '10-2.jpg');
INSERT INTO `p_img` VALUES (10, '10-3.jpg');
INSERT INTO `p_img` VALUES (10, '10-4.jpg');
INSERT INTO `p_img` VALUES (10, '10-5.jpg');
INSERT INTO `p_img` VALUES (10, '10-6.jpg');
INSERT INTO `p_img` VALUES (10, '10-7.jpg');
INSERT INTO `p_img` VALUES (11, '11-1.jpg');
INSERT INTO `p_img` VALUES (11, '11-2.jpg');
INSERT INTO `p_img` VALUES (11, '11-3.jpg');
INSERT INTO `p_img` VALUES (12, '12-1.jpg');
INSERT INTO `p_img` VALUES (12, '12-2.jpg');
INSERT INTO `p_img` VALUES (12, '12-3.jpg');
INSERT INTO `p_img` VALUES (12, '12-4.jpg');
INSERT INTO `p_img` VALUES (13, '13-1.jpg');
INSERT INTO `p_img` VALUES (13, '13-2.jpg');
INSERT INTO `p_img` VALUES (13, '13-3.jpg');
INSERT INTO `p_img` VALUES (13, '13-4.jpg');
INSERT INTO `p_img` VALUES (14, '14-1.jpg');
INSERT INTO `p_img` VALUES (14, '14-2.jpg');
INSERT INTO `p_img` VALUES (14, '14-3.jpg');
INSERT INTO `p_img` VALUES (14, '14-4.jpg');
INSERT INTO `p_img` VALUES (14, '14-5.jpg');
INSERT INTO `p_img` VALUES (15, '15-1.jpg');
INSERT INTO `p_img` VALUES (16, '16-1.jpg');
INSERT INTO `p_img` VALUES (16, '16-2.jpg');
INSERT INTO `p_img` VALUES (16, '16-3.jpg');
INSERT INTO `p_img` VALUES (17, '17-1.jpg');
INSERT INTO `p_img` VALUES (18, '18-1.jpg');
INSERT INTO `p_img` VALUES (18, '18-2.jpg');
INSERT INTO `p_img` VALUES (19, '19-1.jpg');
INSERT INTO `p_img` VALUES (19, '19-2.jpg');
INSERT INTO `p_img` VALUES (20, '20-1.jpg');
INSERT INTO `p_img` VALUES (20, '20-2.jpg');
INSERT INTO `p_img` VALUES (20, '20-3.jpg');
INSERT INTO `p_img` VALUES (20, '20-4.jpg');
INSERT INTO `p_img` VALUES (20, '20-5.jpg');
INSERT INTO `p_img` VALUES (20, '20-6.jpg');
INSERT INTO `p_img` VALUES (20, '20-7.jpg');
INSERT INTO `p_img` VALUES (20, '20-8.jpg');
INSERT INTO `p_img` VALUES (20, '20-9.jpg');
INSERT INTO `p_img` VALUES (20, '20-10.jpg');
INSERT INTO `p_img` VALUES (21, '21-1.jpg');
INSERT INTO `p_img` VALUES (21, '21-2.jpg');
INSERT INTO `p_img` VALUES (21, '21-4.jpg');
INSERT INTO `p_img` VALUES (21, '21-3.jpg');
INSERT INTO `p_img` VALUES (21, '21-5.jpg');
INSERT INTO `p_img` VALUES (22, '22-1.jpg');
INSERT INTO `p_img` VALUES (23, '23-1.jpg');
INSERT INTO `p_img` VALUES (24, '24-1.jpg');
INSERT INTO `p_img` VALUES (24, '24-2.jpg');
INSERT INTO `p_img` VALUES (25, '25-1.jpg');
INSERT INTO `p_img` VALUES (25, '25-2.jpg');
INSERT INTO `p_img` VALUES (26, '26-1.jpg');
INSERT INTO `p_img` VALUES (26, '26-2.jpg');
INSERT INTO `p_img` VALUES (26, '26-3.jpg');
INSERT INTO `p_img` VALUES (26, '26-4.jpg');
INSERT INTO `p_img` VALUES (27, '27-1.jpg');
INSERT INTO `p_img` VALUES (27, '27-2.jpg');
INSERT INTO `p_img` VALUES (27, '27-3.jpg');
INSERT INTO `p_img` VALUES (27, '27-4.jpg');
INSERT INTO `p_img` VALUES (28, '28-1.jpg');
INSERT INTO `p_img` VALUES (28, '28-2.jpg');
INSERT INTO `p_img` VALUES (28, '28-3.jpg');
INSERT INTO `p_img` VALUES (28, '28-4.jpg');
INSERT INTO `p_img` VALUES (29, '29-1.jpg');
INSERT INTO `p_img` VALUES (29, '29-2.jpg');
INSERT INTO `p_img` VALUES (29, '29-3.jpg');
INSERT INTO `p_img` VALUES (29, '29-4.jpg');
INSERT INTO `p_img` VALUES (30, '30-1.jpg');
INSERT INTO `p_img` VALUES (30, '30-2.jpg');
INSERT INTO `p_img` VALUES (30, '30-3.jpg');
INSERT INTO `p_img` VALUES (30, '30-4.jpg');
INSERT INTO `p_img` VALUES (38, '150126250113m02.jpg');
INSERT INTO `p_img` VALUES (39, '1-1.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `product`
-- 

CREATE TABLE `product` (
  `p_id` int(4) NOT NULL auto_increment,
  `p_name` varchar(80) NOT NULL,
  `p_cost` int(6) NOT NULL,
  `description` text NOT NULL,
  `s_description` varchar(80) NOT NULL,
  `p_class_id` int(4) NOT NULL,
  `standard` varchar(100) NOT NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

-- 
-- Dumping data for table `product`
-- 

INSERT INTO `product` VALUES (1, '充氣相撲裝', 600, '<p>大人、小孩款都有哦，如圖</p>\r\n        <p>工廠直營，6~10天到貨，眾多商品歡迎選購</p>\r\n        <p>凡是結單、出貨後，恕不退貨、退款(商品有損懷、有問題例外)</p>\r\n        <p>如無法接受，請勿下單，感謝^^</p>\r\n        <p>歡迎批發</p>\r\n        \r\n        <table border="1">\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">商品保存狀況</td><td>全新</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">規格</td><td>大人 / 小孩</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">庫存</td><td>1993</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">出貨地:</td><td>屏東縣東港鎮</td>\r\n            </tr>\r\n        </table>', '一起變身成為相撲吧！', 3, '大人,小孩');
INSERT INTO `product` VALUES (2, '厭世娃兒面具', 299, '<p>【品牌】TAOS(面具專門品牌)</p>\r\n        <p>【產品型號】H-066</p>\r\n        <p>【商品名稱】新版嬰兒哭泣面具</p>\r\n        <p>【商品尺寸】哭泣寶寶、燦爛寶寶、生氣寶寶</p>\r\n        <p>【商品重量】約重  170克</p>\r\n        <p>【材料】高檔乳膠</p>\r\n        <p>【?色】實物拍?</p>\r\n        <p>【注意事項】因全新品，所以收到後要配戴前記得先透氣２天讓剛製作好的乳膠味道散去，能接受者在下單喔^^</p>\r\n        <p>【關於尺寸】因每個人測量方式不同，尺寸誤差於2~4公分都算正常哦，帶個領巾更像喔!!</p>\r\n        <p>【關於瑕疵】商品均會統一品檢再出貨，此商品為乳膠製品都會有乳膠氣味純屬正常，若您收到破損或寄錯商品，請盡快跟我們連繫退換貨，也請放心退貨運費會一併返還</p>\r\n        <p>【關於退貨】若商品本身並無瑕疵，買家因個人喜好/色差/不如預期等理由欲退貨，只退不換!!運費由買方自行吸收，只退款該商品的總金額!!</p>', '全套面具，搞怪面具，萬聖節，party 尾牙適合', 3, '哭泣寶寶,燦爛寶寶,生氣寶寶');
INSERT INTO `product` VALUES (3, '懶人飲料帽', 110, '<table border="1">\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">設計</td><td>純色</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">商品保存狀況</td><td>全新（未拆封/含吊牌）</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">顏色</td><td>紅色，黃色，藍色，黑色，迷彩綠色，粉色</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">大小</td><td>31 * 28 * 15釐米</td>\r\n            </tr>\r\n        </table>', '降暑神器，生日派對，創意整人禮物，奔跑吧兄弟 Running Man 同款', 3, '紅色,黃色,藍色,黑色,迷彩綠色,粉色');
INSERT INTO `product` VALUES (4, '百分百氣球套餐', 399, '<p>現貨不用等，快速出貨</p>\r\n        <p>1.8g超厚珠光氣球，不易破</p>\r\n        <p>100顆超壯觀，硬是要比別人多</p>\r\n        <table border="1">\r\n            <caption>套餐內容：</caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">16吋金色happy birthday</td><td>一套</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">大蛋糕</td><td>一入(未充氣約100公分，超大)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">大型香檳瓶</td><td>一入(超大款)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">大型酒杯</td><td>一入(超大款)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">10吋五角星氣球</td><td>10個(金色、銀色各5個)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">18吋大紅愛心</td><td>一入</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">超厚珠光氣球</td><td>100個(質感超好)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">打氣筒</td><td>一入</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">點膠</td><td>一捲(約90-100個)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">彩帶</td><td>一捲</td>\r\n            </tr>\r\n        </table>', '求婚、生日派對、會場佈置、派對，送打氣桶、膠帶', 3, '商品規格統一');
INSERT INTO `product` VALUES (5, '黑色爆炸頭', 150, '<p>大人小孩頭圍都適用!!!!</p>\r\n        <p>包裝會擠壓</p>\r\n        <p>收到時往硬物(如牆壁)上大力甩打</p>\r\n        <p>越大力越好!!!!越大力越蓬鬆!!!!</p>\r\n        <p>不要怕不會壞 用力甩就對了!</p>', '全場焦點，主題趴，黑人頭，注目爆炸', 3, '商品規格統一');
INSERT INTO `product` VALUES (6, '彩色爆炸頭', 150, '<p>大人小孩頭圍都適用!!!!</p>\r\n        <p>包裝會擠壓</p>\r\n        <p>收到時往硬物(如牆壁)上大力甩打</p>\r\n        <p>越大力越好!!!!越大力越蓬鬆!!!!</p>\r\n        <p>不要怕不會壞 用力甩就對了!</p>', '全場焦點，化裝舞會，生日派對，假髮 cosplay，注目爆炸', 3, '商品規格統一');
INSERT INTO `product` VALUES (7, '創意搞怪拍照道具 (58件套)', 128, '<p>拍照時覺得了無新意嗎？</p>\r\n        <p>這款５８件套拍照道具，適合在生日、婚禮、各式宴會中，</p>\r\n        <p>讓您發揮創意，作個搞怪的表情，</p>\r\n        <p>讓您的照片留下難忘的時光吧！</p>\r\n        <p>款式：如圖 (無法指定，隨機出貨)</p>\r\n        <p>尺寸：一套包含58款各色道具，圓點膠58點，竹籤58根</p>\r\n        <p>材質：紙 / 竹籤</p>\r\n        <p>備註：</p>\r\n        <ul>\r\n        <il>商品圖檔顏色因電腦螢幕設定差異會略有不同，以實際商品顏色為準，請見諒。</il>\r\n        <il>貼心提醒：運送過程中可能會因為蹦撞造成商品包裝上有些許損害凹陷，但不影響主商品功能性及完整性，可接受的買家再購買喔！</il>\r\n        </ul>', '婚慶生日派對，小鬍子眼鏡帽子領帶紙作道具', 3, '商品規格統一');
INSERT INTO `product` VALUES (8, '拔管大挑戰', 100, '<p>嗯嗯就是個玩具~</p>\r\n        <p>商品保存狀況:全新</p>', '適合多人遊戲，喝酒、生日派對，簡單好玩', 1, '商品規格統一');
INSERT INTO `product` VALUES (9, '彈簧拳頭槍', 25, '<p>尺寸：16.5*7.5cm</p>\r\n        <p>重量：25g</p>\r\n        <p>年齡：3-6歲</p>', '經典懷舊，打人專用，有趣小玩具', 1, '商品規格統一');
INSERT INTO `product` VALUES (10, 'USB充電感應飛行器', 185, '<p>Usb充電式，不用電池，充電20分鐘可以玩10分鐘喔~</p>\r\n        <p>超好玩，會自動感測障礙物，還會發光</p>\r\n        <p>(手放在下面會自動再往上飛奔等等)</p>\r\n        <p>假日出遊全家人玩得超嗨 也可以去公園玩</p>\r\n        <p>怎麼玩都摔不壞喔~</p><p>規格：小小兵(正常藍) / 小小兵(正常紅) / 冰雪奇緣(Alisa) / 小小兵(美國隊長) / 小小兵(超人) / 小小兵(蜘蛛人) / 鋼鐵人</p>', '飛行玩具，搖控飛機，直升機', 1, '小小兵(正常藍),小小兵(正常紅), 冰雪奇緣(Alisa),小小兵(美國隊長),小小兵(超人),小小兵(蜘蛛人),鋼鐵人');
INSERT INTO `product` VALUES (11, '超級變音麥克風玩具', 205, '<table border="1">\r\n            <caption></caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">包裝尺寸</td><td>20x9x23.5cm</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">麥克風尺寸</td><td>長20x直徑8cm</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">材質</td><td>100%安全無毒塑料及電子元件</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">顏色</td><td>隨機</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">適合年齡</td><td>3歲以上</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">電池安裝</td><td>本產品使用3個4號電池,溫馨提醒:請勿使用鹼性電池,以免造成玩具損壞!</td>\r\n            </tr>\r\n        </table>', '神奇變聲，可錄音，可外接手機或MP3', 1, '商品規格統一');
INSERT INTO `product` VALUES (12, '仿真火鍋玩具', 300, '<p>冬天最佳4人桌遊，</p>\r\n        <p>適合家庭圍爐、朋友聚會一起歡樂使用</p>\r\n        <p>因為外盒體積太大，超商出貨沒辦法附外盒喔。</p>', '超級火鍋大樂鬥，日式火鍋夾夾樂，可計時比賽!!', 1, '商品規格統一');
INSERT INTO `product` VALUES (13, '室內LED炫彩氣墊懸浮足球', 128, '<table border="1">\r\n            <caption></caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">尺寸</td><td>18x7cm</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">淨重</td><td>178公克</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">顏色</td><td>白色</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">材質</td><td>ABS+泡棉</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">電池</td><td>4 顆 6V 3 號 AA</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">注意事項</td><td>為安全仍請家長陪同孩童玩樂、本商品不防水</td>\r\n            </tr>\r\n        </table>', 'LED炫彩燈，彈力安全玩具，飛碟球，UFO球', 1, '商品規格統一');
INSERT INTO `product` VALUES (14, '無臉男存錢筒', 2200, '<p>吉卜力工作室，宮崎駿，限量上市</p>\r\n        <p>還原神影少女劇中湯屋吃飯的場景，</p>\r\n        <p>只要裝滿30g的錢幣（還真是非常大胃口）</p>\r\n        <p>就會呼嚕呼嚕的全部倒進肚子裡吞掉，</p>\r\n        <p>然後再打一個飽嗝</p>\r\n        <p>不知不覺就很想把他餵得飽飽的呀?</p>\r\n        <p>身邊有沒有人或是你自己就超愛無臉男的，</p>\r\n        <p>這個必須收藏的啦！！</p><br>\r\n        <p>注意事項：</p>\r\n        <p>大約可放50、10、5、1元硬幣約30-40枚(日本官方訊息以日幣估算，實際多少會有出入)</p>\r\n        <p>需要電池兩枚唷</p>\r\n        <p>寬 8cm｜高 27cm｜深 17cm</p>', '蒐集控必備，促進存錢計畫', 4, '商品規格統一');
INSERT INTO `product` VALUES (15, '美意識高的摩艾石像', 250, '<p>全5種!!隨機出貨!!</p>\r\n        <p>全新!!</p>\r\n        <p>依廠商實際到貨日為準.心急者勿下標</p>', '扭蛋，轉蛋，愛美的摩艾像', 1, '商品規格統一');
INSERT INTO `product` VALUES (16, '美少女戰士行動電源', 2899, '<p>盒蓋自帶變身LED，逼格極高，還有鏡子。</p>\r\n        <p>最大展開接近180度，方便手持補妝。</p>\r\n        <p>絕對為美少女而設計。</p>\r\n        <p>請勿在人多擁擠大馬路上太嗨，</p>\r\n        <p>在安全地方再好好享受變身的樂趣。</p>\r\n        <p>香港過年限定，但已停產絕版，剩下現貨兩個。</p>\r\n        <p>下單後</p>\r\n        <p>盡快</p>\r\n        <p>盡快</p>\r\n        <p>盡快</p>\r\n        <p>為美少女寄出﹗</p>\r\n        <p>最後，就是，</p>\r\n        <p>大王也覺得這個變身器充電寶，是挺讓人心動的。</p>\r\n        <p>童年回憶啊﹗</p>\r\n        <p>所有圖片均實拍﹗</p>\r\n        <p>貨源極少</p>\r\n        <p>如有任何疑問請私訊啾咪</p>', '全站唯一最便宜! 週年限定珍藏版!', 2, '商品規格統一');
INSERT INTO `product` VALUES (17, '史迪奇行動電源', 320, '<p>6000安培!</p>\r\n        <p>特價只要320元!</p>\r\n        <p>還不快手刀下單!xD</p>', '史迷必買!!', 2, '商品規格統一');
INSERT INTO `product` VALUES (18, '造型酒桶藍芽行動喇叭', 390, '<p>內附說明</p>\r\n        <p>材質：塑膠、金屬</p>\r\n        <p>尺寸：105*85*85(mm)</p>\r\n        <p>商品無保固</p>\r\n        <p>造成不便請多包涵喔…</p>', '酒後不開車，安全有保障', 2, '商品規格統一');
INSERT INTO `product` VALUES (19, 'K8無線藍芽麥克風', 2980, '<p>超夯商品,最新款!</p>\r\n        <p>隨身唱</p>\r\n        <p>重低音搖滾版</p>\r\n        <p>K8無線藍芽麥克風</p>\r\n        <p>雙喇叭</p>\r\n        <p>行動麥克風</p>\r\n        <p>送3M造型掛勾!</p>', 'K歌神器，卡拉OK，原來歌神就是你/妳!', 2, '金色,銀色');
INSERT INTO `product` VALUES (20, '龍貓行動電源', 250, '<p>大方送~~~</p>\r\n        <p>購買行動電源，就送精心挑選八大好禮！！！</p>\r\n        <p>1.韓版手機支架</p>\r\n        <p>2.彩色雙層絨布袋</p>\r\n        <p>3.魚骨繞線器</p>\r\n        <p>4.充電線(隨機送快充線)</p>\r\n        <p>5.水鑽防塵塞</p>\r\n        <p>6.優質小米燈</p>\r\n        <p>7.24k金屬防輻射貼</p>\r\n        <p>8.安卓蘋果萬用取卡針</p>\r\n        <p>贈品顏色隨機出貨，數量有限送完為止</p>\r\n        <table border="1">\r\n            <caption></caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">寶貝名稱</td><td>第2代 龍貓發光12000mah行動電源</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">寶貝顏色</td><td>藍色、紫色、粉色、灰色、黑色、復古綠</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">容量</td><td>12000mah</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">電芯</td><td>進口鋰離子電芯</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">尺寸</td><td>10.5cm X 8cm X 2.2cm</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">重量</td><td>280g</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">輸出</td><td>5V/1A</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">輸入</td><td>5V/1A & 5V/2.1A</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">注意事項</td><td>初次使用請先將餘電使用完畢後，進行約3次充足12小時以上電力，以激發電芯片，後續即可正常充電6-8小時使用。</td>\r\n            </tr>\r\n        </table>', '多款顏色，龍貓迷ㄅ要錯過!', 2, '藍色,紫色,粉色,灰色,黑色,復古綠');
INSERT INTO `product` VALUES (21, '炸蝦行動睡袋', 1880, '<p>注意:</p>\r\n        <p>產品圖片都是實物拍攝，因相機解析度或螢幕原因可能有色差，實物為准。</p>\r\n        <p>尺寸是手工測量，有合理的誤差存在。</p>\r\n        <p>體積超過45*30*30cm，重量超過五公斤，無法超商取貨付款，下標請選擇宅配寄出。</p>\r\n        <p>為壓低售價直接工廠排單訂貨，確認款項後約六天左右發貨，急需勿下標，謝謝!</p>\r\n        <table border="1">\r\n            <caption></caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">材質</td><td>毛料</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">尺寸</td><td>炸蝦衣高約150CM，寬度約72CM，襪子均碼</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">特色</td><td>舒服保暖，造型吸睛，讓你在冷冷冬天也可以暖暖度過唷!!!</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">備註</td><td>此套裝身高150~170CM均可穿!商品建議手洗，水溫不超過40℃!!!!!!</td>\r\n            </tr>\r\n        </table>', '行走，呆萌，禦寒神器，冬天寒流，懶人必備', 4, '商品規格統一');
INSERT INTO `product` VALUES (22, '韓版迷你雙封口零食餅乾拉鍊零錢包/卡片包', 39, '<table border="1">\r\n            <caption></caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">尺寸</td><td>長約13.5cm，寬約9.5cm</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">數量</td><td>一入</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">款式</td><td>隨機出貨</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">材質</td><td>優質PU</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">備註</td><td>商品圖檔顏色因電腦螢幕設定差異會略有不同，以實際商品顏色為準，請見諒。</td>\r\n            </tr>\r\n        </table>', '不挑款，卡哇伊小物^^', 4, '商品規格統一');
INSERT INTO `product` VALUES (23, '寬版迷你塑膠袋電池型封口機', 49, '<table border="1">\r\n            <caption></caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">尺寸</td><td>長約9cm，寬約3cm</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">數量</td><td>一入</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">款式</td><td>隨機出貨</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">材質</td><td>優質電子元件</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">電池</td><td>3號電池兩顆</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">備註</td><td>商品圖檔顏色因電腦螢幕設定差異會略有不同，以實際商品顏色為準，請見諒。</td>\r\n            </tr>\r\n        </table>', '不挑款，但是超實用!', 4, '商品規格統一');
INSERT INTO `product` VALUES (24, '帳棚內小吊扇', 149, '<p>露營好幫手，室內外、帳篷內、蚊帳皆好用！</p>\r\n        <p>此商品如遇剛好售完，約3天左右補到貨並當日出貨</p>\r\n        <p>裝卸方法：</p>\r\n        <p>扇葉是卡口的，安裝非常方便，輕輕一插就卡住了，</p>\r\n        <p>非常牢固，不用擔心葉片鬆動，更不用擔心螺絲鬆?。</p>\r\n        <p>葉片卸下，請借助尺、圓珠筆之類的小工具，</p>\r\n        <p>把卡口?的凸起部分按下去，葉片就能輕鬆拔出。</p>\r\n        <table border="1">\r\n            <caption>商品說明</caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">材質</td><td>原生塑料，光潔堅韌漂亮，使用壽命更長</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">規格</td><td>400mm（線長5米，台灣專用插頭！）</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">額定電壓</td><td>110V</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">額定頻率</td><td>60Hz</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">額定功率</td><td>6W（每小時6瓦，節能低碳，而且不用擔心宿舍用電超負荷）</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">轉速</td><td>375轉/分</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">重量</td><td>約0.35公斤</td>\r\n            </tr>\r\n        </table>', '迷你吊扇，微風吊扇，蚊帳扇，帳篷吊扇，露營吊扇', 4, '商品規格統一');
INSERT INTO `product` VALUES (25, '多功能工作桌', 799, '<p>單售工作桌，不含主機架、螢幕架</p>\r\n        <img src="assets/img/products/description/25-3.jpg"><br>\r\n        <img src="assets/img/products/description/25-4.jpg"><br>\r\n        <img src="assets/img/products/description/25-5.jpg"><br>\r\n        <img src="assets/img/products/description/25-6.jpg"><br>', '市場超殺優惠，可變換，雙向桌', 4, '楓木色,胡桃木,粉藍色');
INSERT INTO `product` VALUES (26, '喬巴造型 電子鬧鐘', 1900, '<p>石英語音鬧鐘</p>\r\n        <p>會產生聲音和電子電路音效。</p>\r\n        <p>報警自動停止功能，報警幾分鐘會自動停止(再次貪睡功能)</p>\r\n        <p>顯示日曆、日期功能。</p>\r\n        <p>隨著光、夜晚，即使突然醒來，看時間也不傷眼(?)</p>\r\n        <table border="1">\r\n            <caption>商品說明</caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">框架材料</td><td>棕色/塑料框架</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">尺寸和重量</td><td>192x107x100mm，290克</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">電池</td><td>2個AA電池</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">出貨地</td><td>新北市三重區</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">商品保存狀況</td><td>全新（未拆封/含吊牌）</td>\r\n            </tr>\r\n        </table>', '日本 ONE PIECE海賊王/航海王 ', 2, '商品規格統一');
INSERT INTO `product` VALUES (27, '卡通造型光觸媒滅蚊', 399, '<p>LED引誘光源、誘蚊力強</p>\r\n        <p>綠能設計、省電好幫手</p>\r\n        <p>高壓殺蚊、環保潔淨</p>\r\n        <p>送強潔刷</p>\r\n        <table border="1">\r\n            <caption>商品說明</caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">尺寸</td><td>15X19cm</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">重量</td><td>0.8kg</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">規格</td><td>凱蒂貓捕蚊燈 / 哆啦A夢捕蚊燈 / 龍貓捕蚊燈</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">出貨地</td><td>新北市新店區</td>\r\n            </tr>\r\n        </table>', '無輻射，電子捕蚊燈', 2, '凱蒂貓,哆啦A夢,龍貓');
INSERT INTO `product` VALUES (28, '地中海風七彩變色LED小夜燈', 100, '<p>採用電池式發亮，更加環保節能</p>\r\n        <p>LED可七彩不斷變化，漸層、跳動更添變化度</p>\r\n        <p>浪漫的地中海藍白風，讓您有在海邊渡假的感覺，兼具實用與美觀</p>\r\n        <table border="1">\r\n            <caption>商品說明</caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">型號</td><td>01-E123</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">尺寸</td><td>直徑6.5公分，高14公分</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">規格</td><td>帆船 / 燈塔 / 水鳥 / 船錨(隨機出貨)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">材質</td><td>鐵質+貝殼</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">出貨地</td><td>新北市新店區</td>\r\n            </tr>\r\n        </table>', '立體，藍白，海洋風', 4, '商品規格統一');
INSERT INTO `product` VALUES (29, '環形插座', 539, '<table border="1">\r\n            <caption>商品說明</caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">商品保存狀況</td><td>全新(未拆封/含吊牌)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">規格</td><td>橙色/藍色/紫色/綠色</td>\r\n            </tr>\r\n        </table>', '宿舍寢室，懶人神器，創意實用，家居生活', 4, '橙色,藍色,紫色,綠色');
INSERT INTO `product` VALUES (30, '防燙碗夾小工具', 120, '<p>廚房實用小物!</p>\r\n        <table border="1">\r\n            <caption>商品說明</caption>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">商品保存狀況</td><td>全新(未拆封/含吊牌)</td>\r\n            </tr>\r\n            <tr>\r\n                <td bgcolor="#CCDDFF">規格</td><td>綠色</td>\r\n            </tr>\r\n        </table>', '創意生活日用品', 4, '商品規格統一');
