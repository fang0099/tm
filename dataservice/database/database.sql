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
    register_time datetime default null
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
    article_id int not null default 0
    primary key (`tag_id`, `article_id`)
)engine=innodb charset=utf8 comment '标签与文章关系表';


create table article_collection (
    user_id int not null default 0,
    article_id int not null default 0,
    primary key (`user_id`, `article_id`)
)engine=innodb charset=utf8 comment '文章收藏';

-- 站内信

-- 时间轴











