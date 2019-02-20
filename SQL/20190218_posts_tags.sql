/*****************************
postsとtagsの中間テーブル
******************************/
--テーブル作成
CREATE TABLE posts_tags (
    post_id INT(11),
    tag_id  INT(11),
    created datetime default null,
    modified datetime default null
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


--画像をアップロードできるようにカラムの追加
ALTER TABLE
posts 
ADD
`photo` varchar(255) DEFAULT NULL;
ALTER TABLE
posts 
ADD
`photo_dir` varchar(255) DEFAULT NULL;

