/*****************************
postsテーブル
******************************/
--テーブル作成
create table admin (
    id                int not null auto_increment primary key,
    name              varchar(50),
    photo             varchar(255) DEFAULT NULL,
    birthday          datetime default null,
    body              text,
    created           datetime default null,
    modified          datetime default null,
    deleted           int(1) default 0,
    deleted_time      datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--試験用に値を入れておく
insert into admin (name, birthday, body, created, modified) values 
('title 1',19920417, 'body 1', now(), now()),
('title 2',19920417, 'body 2', now(), now()),
('title 3',19920417, 'body 3', now(), now());