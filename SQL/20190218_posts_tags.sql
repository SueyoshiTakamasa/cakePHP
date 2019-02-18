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