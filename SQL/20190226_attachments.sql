/*****************************
attachmentsテーブル
******************************/
--テーブル作成
CREATE TABLE attachments (
    id                INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    photo             varchar(255) DEFAULT NULL,
    photo_dir         varchar(255) DEFAULT NULL,
    post_id           INT(11),
    deleted           int(1) default 0,
    deleted_time      datetime
    PRIMARY KEY  (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;