--テーブルを作成
create table zipcode (
 id int unsigned not null auto_increment,
 jiscode varchar(255),
 zipcode_old varchar(255),
 zipcode varchar(255),
 pref_kana varchar(255),
 city_kana varchar(255),
 street_kana varchar(255),
 pref varchar(255),
 city varchar(255),
 street varchar(255),
 flag1 tinyint,
 flag2 tinyint,
 flag3 tinyint,
 flag4 tinyint,
 flag5 tinyint,
 flag6 tinyint,
 primary key (id),
 key zipcode (zipcode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
