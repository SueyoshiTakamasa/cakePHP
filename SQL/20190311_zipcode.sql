--都道府県のcsvファイルの文字コードをダウンロード
sudo yum install wget unzip
wget http://www.post.japanpost.jp/zipcode/dl/kogaki/zip/ken_all.zip
unzip ken_all.zip

--shift-jisからutf8に切り替える
sudo yum install epel-release
sudo yum install nkf
nkf -w KEN_ALL.CSV > ken_all_u.csv

--データを共有フォルダへ移動
mv ken_all_u.csv /vagrant/

--ここからmysqlに入る
mysql -u root
use databases blog_cakephp_backup

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


--データをアップロード
SET character_set_database=utf8;
LOAD DATA LOCAL INFILE '/vagrant/KEN_ALL.CSV'

INTO TABLE zipcodes
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

LOAD DATA LOCAL INFILE '/vagrant/KEN_ALL.CSV' INTO TABLE zipcodes TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '' LINES STARTING BY '' TERMINATED BY '\r\n' (jiscode,zipcode_old,zipcode,pref_kana,city_kana,street_kana,pref,city,street,flag1,flag2,flag3,flag4,flag5,flag6)