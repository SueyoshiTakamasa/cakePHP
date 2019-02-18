/*****************************
categoriesテーブル
******************************/
--テーブル作成
CREATE TABLE categories (
    id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    lft INTEGER(10) DEFAULT NULL,
    rght INTEGER(10) DEFAULT NULL,
    name VARCHAR(255) DEFAULT '',
    PRIMARY KEY  (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--値を挿入
INSERT INTO
  `categories` (`id`, `name`)
VALUES
  (1, "red");
INSERT INTO
  `categories` (`id`, `name`)
VALUES
  (2, "green");

--postsテーブルのidそれぞれのcategory_idに値をセット
UPDATE
  posts
SET
  category_id=1
WHERE
  id=1;
  UPDATE
  posts
SET
  category_id=1
WHERE
  id=5;
UPDATE
  posts
SET
  category_id=1
WHERE
  id=5;
UPDATE
  posts
SET
  category_id=1
WHERE
  id=6;
