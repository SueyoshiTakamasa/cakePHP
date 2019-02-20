/*****************************
postsとtagsの中間テーブル
******************************/
--テーブル作成
CREATE TABLE posts_tags (
    post_id INT(11),
    tag_id  INT(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--あらかじめ一部値を挿入
INSERT posts_tags (
	post_id,
	tag_id
)
VALUES
(   1,
	1
);
INSERT posts_tags (
	post_id,
	tag_id
)
VALUES
(   1,
	2
);
INSERT posts_tags (
	post_id,
	tag_id
)
VALUES
(   2,
	3
);

SELECT * from posts_tags;

ALTER TABLE posts_tags (
	created datetime default null,
	modified datetime default null
)


create database dotinstall_blog_cakephp;
grant all on dotinstall_blog_cakephp.* to dbuser@localhost identified by '28fa8Iuy';
use dotinstall_blog_cakephp

create table posts (
  id int unsigned auto_increment primary key,
  title varchar(255),
  body text,
  created datetime default null,
  modified datetime default null
);
insert into posts (title, body, created) values
('title 1', 'body 1', now()),
('title 2', 'body 2', now()),
('title 3', 'body 3', now());
select * from posts;