-- 基础数据
create table web_info (
    id int primary key auto_increment,
    title varchar(128) not null default '',
    description varchar(512) not null default '',
    keywords varchar(128) not null default '',
    icp varchar(24) not null default '',
    email varchar(128) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

-- +是否认证
create table users (
    id int primary key auto_increment,
    username varchar(32) not null default '',
    password char(32) not null default '',
    avatar varchar(128) not null default '',
    brief varchar(256) not null default '' comment '个人简介',
    is_auth tinyint not null default 0 comment '1,0',
    register_time datetime default null,
    del_flag int not null default 0
)engine=innodb charset=utf8 auto_increment=1;

create table user_follows(
    user_id int not null default 0,
    follower_id int not null default 0,
    primary key (`user_id`, `follower_id`)
)engine=innodb charset=utf8;

create table friend_links (
    id int primary key auto_increment,
    title varchar(16) not null default '',
    url varchar(128) not null default '',
    del_flag tinyint not null default 0
)engine=innodb charset=utf8 auto_increment=1;

create table roles (
    id int primary key auto_increment,
    name VARCHAR(16) not null DEFAULT '',
    del_flag TINYINT not null DEFAULT 0
)engine=innodb charset=utf8 auto_increment=1;

-- 文章数据

create table tag (
    id int primary key auto_increment,
    name varchar(32) not null default '',
    face varchar(128) not null default '',
    brief varchar(256) not null default '',
    create_time datetime not null default CURRENT_TIMESTAMP,
    creator int not null default 0,
    fans_num int not null default 0,
    has_checked tinyint not null default 0 comment '0, 1',
    checker int not null default 0,
    del_flag tinyint not null default 0 comment '1=delete, 0=not'
)engine=innodb charset=utf8 auto_increment=1 comment '标签';

create table tag_subscriber (
    subscriber_id int not null default 0,
    tag_id int not null default 0,
    primary key (`subscriber_id`, `tag_id`)
)engine=innodb charset=utf8 comment '标签订阅';

-- 文章类型（文字，音频）， 点击量
create table article (
    id int primary key auto_increment,
    title varchar(64) not null default '',
    face varchar(128) not null default '' comment '封面',
    abstracts varchar(128) not null default '' comment '摘要',
    content longtext default null,
    publish_time datetime not null default CURRENT_TIMESTAMP,
    last_modify_time datetime not null default CURRENT_TIMESTAMP,
    likes int not null default 0,
    author int not null default 0,
    has_checked tinyint not null default 0 comment '0, 1',
    checker int not null default 0,
    del_flag tinyint not null default 0 comment '1=delete, 0=not'
)engine=innodb charset=utf8 auto_increment=1;

create table user_like_article (
    user_id int not null default 0,
    article_id int not null default 0,
    primary key (`user_id`, `article_id`)
)engine=innodb charset=utf8;

create table user_collect_article (
    user_id int not null default 0,
    article_id int not null default 0,
    primary key (`user_id`, `article_id`)
)engine=innodb charset=utf8 comment '文章收藏';

create table comments (
    id int primary key auto_increment,
    username varchar(32) not null default '',
    avatar varchar(128) not null default '',
    content varchar(128) not null default '',
    publish_time datetime not null default CURRENT_TIMESTAMP,
    up int not null default 0 comment '顶',
    down int not null default 0 comment '踩',
    article_id int not null default 0,
    pid int not null default 0 comment '回复评论',
    user_id int not null default 0,
    type tinyint not null default 0 comment '评论类型:0=文章评论，1=评论评论，2=网站吐槽',
    del_flag tinyint not null default 0,
    KEY type_del_article_idx (`type`, `del_flag`, `article_id`)
)engine=innodb charset=utf8 auto_increment=1;

create table tag_article_rel (
    tag_id int not null default 0,
    article_id int not null default 0,
    primary key (`tag_id`, `article_id`)
)engine=innodb charset=utf8 comment '标签与文章关系表';

CREATE TABLE news_flash(
    id int PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(128) not NULL DEFAULT '',
    content TEXT DEFAULT NULL ,
    publish_time DATETIME DEFAULT current_timestamp,
    link VARCHAR(128) not null DEFAULT '',
    del_flag int not NULL DEFAULT 0
)ENGINE=innodb charset=utf8 AUTO_INCREMENT=1;

alter table article add column word_count int NOT NULL DEFAULT 0;
alter table article add column hot_num int not null DEFAULT 0;

CREATE TABLE sponsors (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL DEFAULT '',
    face VARCHAR(128) NOT NULL DEFAULT '',
    brief VARCHAR(256) NOT NULL DEFAULT '',
    link VARCHAR(128) NOT NULL DEFAULT '',
    del_flag int not NULL DEFAULT 0
)ENGINE=innodb charset=utf8 AUTO_INCREMENT=1;

alter table users add column qq VARCHAR(18) not null DEFAULT '';
alter table users add COLUMN email VARCHAR(18) not null DEFAULT '';
alter table users add COLUMN weixin VARCHAR(18) not null DEFAULT '';
alter table users add COLUMN weibo VARCHAR(32) NOT NULL DEFAULT '';

alter table tag add COLUMN pid int not null DEFAULT 0;
alter table article add COLUMN click_count int not null DEFAULT 0;
alter table article add COLUMN type tinyint NOT NULL DEFAULT 0 COMMENT '0=text,1=media';

-- alter table web_info add COLUMN time
CREATE  TABLE `check_log` (
    id int PRIMARY KEY AUTO_INCREMENT,
    checker int NOT NULL DEFAULT 0,
    type tinyint NOT NULL DEFAULT 0 COMMENT '0=article, 1=tag',
    ref_id int NOT NULL DEFAULT 0 COMMENT 'article id or tag id',
    check_result TINYINT NOT NULL DEFAULT 0 COMMENT '0=reject, 1=approve',
    message VARCHAR(128) not NULL DEFAULT '',
    check_time DATETIME DEFAULT current_timestamp,
    del_flag int not NULL DEFAULT 0
)ENGINE=innodb charset=utf8 AUTO_INCREMENT=1;


-- 站内信

CREATE TABLE notice (
    id int PRIMARY KEY AUTO_INCREMENT,
    to_user int not NULL  DEFAULT 0,
    title VARCHAR(16) not null DEFAULT '',
    message VARCHAR(128) not null DEFAULT '',
    type INT not null default 0,
    publish_time DATETIME DEFAULT current_timestamp,
    status int not null default 0 COMMENT '0=unread, 1=readed',
    del_flag int not NULL DEFAULT 0
)ENGINE=innodb charset=utf8 AUTO_INCREMENT=1;

CREATE TABLE opt_log (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_id int not NULL  DEFAULT 0,
    type VARCHAR(16) not null DEFAULT '',
    message VARCHAR(128) not null DEFAULT '',
    publish_time DATETIME DEFAULT current_timestamp,
    del_flag int not NULL DEFAULT 0
)ENGINE=innodb charset=utf8 AUTO_INCREMENT=1;

-- 时间轴



-- auth
CREATE TABLE `keys` (
    app_key int not null default 0,
    app_secret char(32) not null default '',
    add_time DATETIME DEFAULT current_timestamp,
    PRIMARY KEY (`app_key`)
)ENGINE=innodb charset=utf8;

CREATE TABLE `functions` (
    id int primary key auto_increment,
    name VARCHAR(16) not null DEFAULT '',
    url VARCHAR(128) not null DEFAULT '',
    pid int not NULL DEFAULT 0
)ENGINE=innodb charset=utf8 AUTO_INCREMENT=1;

CREATE TABLE `key_function_rel` (
    app_key int not null DEFAULT 0,
    function_id int not null DEFAULT 0
)ENGINE = innodb charset=utf8;


-- sliders
CREATE TABLE sliders (
    id int primary key auto_increment,
    image VARCHAR(128) not NULL  DEFAULT '',
    article_id int NOT NULL DEFAULT 0,
    del_flag int not NULL DEFAULT 0
)ENGINE=innodb charset=utf8 AUTO_INCREMENT=1;



alter table article add column up_flag int not null default 0;
alter table tag add column show_menu int not null default 0;
alter table tag add column show_index int not null default 0;

alter table article change column author author_id int not null default 0;
alter table article change column checker checker_id int not null default 0;



