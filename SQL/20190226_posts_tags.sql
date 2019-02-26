/*****************************
postsとtagsの中間テーブル
******************************/
--テーブル作成
CREATE TABLE posts_tags (
	id                int not null auto_increment primary key,
    post_id           int(11),
    tag_id            int(11),
    created           datetime default null,
    modified          datetime default null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--あらかじめ一部値を挿入
INSERT posts_tags (
	post_id,
	tag_id,
	created
)
VALUES
(   1,
	1,
	now()
),
(
	1,
	2,
	now()
),
(
	2,
	3,
	now()
);

