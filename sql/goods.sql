SET NAMES 'utf8';

--
-- Описание для таблицы goods
--
DROP TABLE IF EXISTS goods;
CREATE TABLE goods (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  good VARCHAR(255) NOT NULL,
  price INT(11) UNSIGNED NOT NULL,
  photo VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 15
AVG_ROW_LENGTH = 1170
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы goods
--
INSERT INTO goods VALUES
(1, 'Ноутбук Apple MacBook Air', 60000, 'apple_macbook_air.jpg'),
(2, 'Ноутбук Apple MacBook Pro', 70000, 'apple_macbook_pro.jpg'),
(3, 'Ноутбук Lenovo IdeaPad', 17000, 'lenovo_idea_pad.jpg'),
(4, 'Ноутбук Lenovo G5030', 16000, 'lenovo_g5030.jpg'),
(5, 'Ноутбук Acer Aspire', 21000, 'acer_aspire.jpg'),
(6, 'Смартфон Samsung Galaxy A7', 30000, 'samsung_galaxy_a7.jpg'),
(7, 'Смартфон Samsung Galaxy A5', 17000, 'samsung_galaxy_a5.jpg'),
(8, 'Смартфон Apple iPhone SE', 38000, 'apple_iphone_se.jpg'),
(9, 'Смартфон Asus Zenfone Laser', 12000, 'asus_zenfone_laser.jpg'),
(10, 'Смартфон Lenovo A5000', 11000, 'lenovo_a5000.jpg'),
(11, 'Смартфон Lenovo P90', 16000, 'lenovo_p90.jpg'),
(12, 'Видеокарта ASUS', 2000, 'asus_video.jpg'),
(13, 'Видеокарта GIGABYTE GT-740', 6000,  'gigabyte_video_gt740.jpg'),
(14, 'Видеокарта GIGABYTE GTX-960', 14000, 'gigabyte_video_gtx960.jpg');
