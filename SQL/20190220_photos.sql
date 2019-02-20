/*****************************
attachmentsテーブル
******************************/
--テーブル作成
CREATE TABLE attachments (
    id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    lft INTEGER(10) DEFAULT NULL,
    rght INTEGER(10) DEFAULT NULL,
    name VARCHAR(255) DEFAULT '',
    photo varchar(255) DEFAULT NULL,
    photo_dir varchar(255) DEFAULT NULL,
    post_id INT(11),
    PRIMARY KEY  (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;