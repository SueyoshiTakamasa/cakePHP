/*****************************
tagsテーブル
******************************/
--テーブル作成
CREATE TABLE tags (
    id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    lft INTEGER(10) DEFAULT NULL,
    rght INTEGER(10) DEFAULT NULL,
    name VARCHAR(255) DEFAULT '',
    PRIMARY KEY  (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--あらかじめ一部値を挿入
INSERT tags (
	id,
	name
)
VALUES
(   1,
	'html'
);
INSERT tags (
	id,
	name
)
VALUES
(   2,
	'css'
);
INSERT tags (
	id,
	name
)
VALUES
(   3,
	'php'
);
INSERT tags (
	id,
	name
)
VALUES
(   4,
	'日本語'
);
INSERT tags (
	id,
	name
)
VALUES
(   5,
	'じゃばすくりぷと'
);



SELECT * from posts_tags;