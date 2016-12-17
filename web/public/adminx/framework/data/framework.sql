create table tuser (
	id int primary key auto_increment,
	username varchar(20) not null default '',
	pwd char(32) not null default '',
	intro text default null,
	birthday datetime default null
)engine=innodb charset=utf8 auto_increment=1;

create table tmenu (
	id int primary key auto_increment,
	name varchar(10) not null default '',
	icon varchar(10) not null default '',
	url varchar(50) not null default '',
	tag varchar(10) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tcategory (
	id int primary key auto_increment,
	name varchar(10) not null default '',
	enname varchar(50) not null default '',
	pic varchar(100) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table twebinfo(
	id int primary key,
	title varchar(100) not null default '',
	url varchar(100) not null default '',
	logo varchar(100) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tstation(
	id int primary key auto_increment,
	name varchar(20) not null default ''
)engine=innodb charset=utf8 auto_increment=1;


create table tsubway(
	id int primary key auto_increment,
	name varchar(20) not null default '',
	station int not null default 0
)engine=innodb charset=utf8 auto_increment=1;

create table trefer (
	id int primary key auto_increment,
	name varchar(20) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tbudge (
	id int primary key auto_increment,
	name varchar(20) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table thouse_year (
	id int primary key auto_increment,
	name varchar(20) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tproblem (
	id int primary key auto_increment,
	type int not null default 1,
	question text not null default '',
	answer text not null default ''
)engine=innodb charset=utf8 auto_increment=1;


create table tpage (
	id int primary key auto_increment,
	title varchar(50) not null default '',
	content text not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tnews (
	id int primary key auto_increment,
	title varchar(50) not null default '',
	content text not null default '',
	pdate datetime default null
)engine=innodb charset=utf8 auto_increment=1;

create table tarea (
	id int primary key auto_increment,
	name varchar(20) not null default '',
	pid int not null default 0
)engine=innodb charset=utf8 auto_increment=1;

create table tflink (
	id int primary key auto_increment,
	name varchar(20) not null default '',
	url varchar(100) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tdistance (
	id int primary key auto_increment,
	name varchar(20) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tmcategory (
	id int primary key auto_increment,
	name varchar(20) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tusers (
	id int primary key auto_increment,
	email varchar(20) not null default '',
	pwd char(32) not null default '',
	name varchar(30) not null default '',
	gender int not null default 0 comment 'mr=1,miss=0',
	address varchar(100) not null default '',
	phone varchar(30) not null default '',
	fax varchar(50) not null default '',
	mobile varchar(30) not null default '',
	lineid varchar(30) not null default '',
	orderpost int not null default 1,
	budgeid int not null default 1,
	returnrate varchar(30) not null default '',
	housesize varchar(10) not null default '0',
	houseyear int not null default 1,
	housetype int not null default 0,
	housearea int not null default 0,
	subway int not null default 0,
	distance int not null default 0,
	isadmin int not null default 0
)engine=innodb charset=utf8 auto_increment=1;

create table texchange (
	id int primary key auto_increment,
	toname varchar(20) not null default '',
	rate float not null default 0.0
)engine=innodb charset=utf8 auto_increment=1;

create table thouse (
	id int primary key auto_increment,
	name varchar(50) not null default '',
	price double not null default 0.0,
	fz double not null default 0.0,
	returnrate varchar(10) not null default 0.0,
	sreturnrate varchar(10) not null default 0.0,
	cdate date default null,
	jt varchar(50) not null default '',
	address int not null default 0,
	status varchar(10) not null default '',
	gj varchar(10) not null default '',
	size varchar(20) not null default '',
	lc varchar(20) not null default '',
	fh varchar(10) not null default '',
	ysize varchar(20) not null default '',
	fw varchar(10) not null default '',
	jzjg varchar(20) not null default '',
	zhs varchar(10) not null default '',
	wygs varchar(20) not null default '',
	wyxt varchar(20) not null default '',
	glr varchar(10) not null default '',
	glfy varchar(20) not null default '',
	xsgjj varchar(20) not null default '',
	ss text,
	tdfl varchar(20) not null default '',
	tdmj varchar(10) not null default '',
	jsgs varchar(20) not null default '',
	dsjl varchar(20) not null default '',
	jyfs varchar(20) not null default '',
	syfq varchar(20) not null default '',
	fjss text,
	remark text ,
	updatedate date default null,
	cansee int not null default 0
)engine=innodb charset=utf8 auto_increment=1;

create table thousepic (
	id int primary key auto_increment,
	pic varchar(100) not null default '',
	houseid int not null default 0
)engine=innodb charset=utf8 auto_increment=1;

create table tmessage(
	id int primary key auto_increment,
	mcategory int not null default 0,
	budge int not null default 0,
	area int not null default 0,
	hcategory int not null default 0,
	refer int not null default 0,
	companyname varchar(30) not null default '',
	contacter varchar(20) not null default '',
	gender int not null default 0,
	lineid varchar(20) not null default '',
	phone varchar(20) not null default '',
	fax varchar(20) not null default '',
	address varchar(50) not null default '',
	email varchar(30) not null default '',
	orderdate date default null,
	ordernumber int not null default 0,
	content text ,
	pdate datetime default null
)engine=innodb charset=utf8 auto_increment=1;

create table tfavor(
	userid int not null default 0,
	houseid int not null default 0
)engine=innodb charset=utf8 auto_increment=1;


create table tfiles(
	id int primary key auto_increment,
	name varchar(50) not null default '',
	path varchar(100) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

create table tsteps(
	id int primary key auto_increment,
	title varchar(64) not null default '',
	content text 
)engine=innodb charset=utf8 auto_increment=1;

create table tslider (
	id int primary key auto_increment,
	title varchar(32) not null default '',
	path varchar(128) not null default '',
	href varchar(128) not null default ''
)engine=innodb charset=utf8 auto_increment=1;

