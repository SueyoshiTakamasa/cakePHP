/*****************************
postsテーブル
******************************/
--テーブル作成
create table posts (
    id                int not null auto_increment primary key,
    title             varchar(50),
    body              text,
    created           datetime default null,
    modified          datetime default null,
    deleted           int(1) default 0,
    deleted_time      datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--試験用に値を入れておく
insert into posts (title, body, created, modified) values 
('title 1', 'body 1', now(), now()),
('title 2', 'body 2', now(), now()),
('title 3', 'body 3', now(), now());