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


LOAD DATA LOCAL INFILE '/vagrant/ken_all_u.csv'

INTO TABLE zipcode
FIELDS
    TERMINATED BY ','
    OPTIONALLY ENCLOSED BY '"'
    ESCAPED BY ''
LINES
    STARTING BY ''
    TERMINATED BY '\r\n'
(
 jiscode,
 zipcode_old,
 zipcode,
 pref_kana,
 city_kana,
 street_kana,
 pref,
 city,
 street,
 flag1,
 flag2,
 flag3,
 flag4,
 flag5,
 flag6
);