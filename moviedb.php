drop database if exists moviedb;
create database moviedb 
	default character set utf8 default collate utf8_general_ci;
use moviedb;
drop table movie;
create table movie(
	id int(11) not null,
	title varchar(50) default null,
	director varchar(50) default null,
	runningtime int(11),
	cast varchar(255),
	genre varchar(100),
	releaseyear int(11),
	primary key(id)
)engine=InnoDB default character set utf8 default collate utf8_general_ci;

set names euckr;
insert into movie values (1, '어벤져스: 엔드게임', '앤서니 루소, 조 루소', 181, '로버트 다우니 주니어, 크리스 에반스, 크리스 햄스워스', '액션, SF', 2019);
insert into movie values (2, '알라딘', '가이 리치', 128, '메나 마수드, 나오미 스콧, 윌 스미스', '판타지, 뮤지컬, 로맨틱 코미디', 2019);
insert into movie values (3, '셜록 홈즈', '가이 리치', 128, '로버트 다우니 주니어, 주드 로, 레이첼 맥아담스', '추리, 액션', 2009);
insert into movie values (4, '기생충', '봉준호', 132, '송강호, 이선균, 조여정', '드라마', 2019);
insert into movie values (5, '설국 열차', '봉준호', 126, '크리스 에반스, 송강호, 에드 해리스', '액션, SF, 드라마', 2013);
insert into movie values (6, '맨 인 블랙: 인터네셔널', 'F.게리 그레이', 118, '크리스 햄스워스, 테사 톰슨', '액션, 코미디, SF', 2019);
insert into movie values (7, '콩: 스컬 아일랜드', '조던 복트-로버츠', 118, '톰 히들스턴, 브리 라슨, 사무엘 L. 잭슨', '모험, 판타지', 2017);
insert into movie values (8, '토르: 라그나로크', '타이카 와이티티',130, '크리스 햄스워스, 톰 히들스턴, 테사 톰슨', '액션, SF', 2015);
insert into movie values (9, '이스케이프 룸', '애덤 로비텔', 100, '테일러 러셀, 로건 밀러', '액션, 공포, 스릴러', 2019);
insert into movie values (10, '걸캅스', '정다원', 107, '라미란, 이성경, 운상현', '코미디, 액션', 2019);
insert into movie values (11, '사바하', '장재현', 123, '이정재, 박정민, 이재인', '미스터리, 스릴러', 2019);
insert into movie values (12, '협상', '이종석', 114, '현빈, 손예진', '범죄, 액션', 2018);
insert into movie values (13, '서치', '아니쉬 차간티', 101, '존 조, 데브라 메싱', '드라마, 미스터리, 가족', 2018);
insert into movie values (14, '고질라: 킹 오브 몬스터', '마이클 도허티', 132, '밀리 바비 브라운, 카일 챈들러', '모험, 액션, SF', 2019);

drop table user;
create table user(
	id int(11) not null auto_increment,
	email varchar(50) not null,
	password varchar(40) not null,
	image mediumblob,
	primary key(id),
	index(email)
)engine=InnoDB default character set utf8 collate utf8_general_ci;
insert into user values (null, 'ab@naver.com', 'a', './images/superloki.jpg');
drop table review;
create table review(
	reviewid int(11) not null auto_increment,
	userid int(11) not null,
	time timestamp default current_timestamp,
	picture mediumblob,
	memo text default null,
	primary key(reviewid),
	foreign key(userid) references user(id) on delete cascade on update cascade,
	index(time)
)engine=InnoDB default character set utf8 collate utf8_general_ci;

drop table reply;
create table reply(
	replyid int(11) not null auto_increment,
	reviewid int(11) not null,
	userid int(11) not null,
	time timestamp default current_timestamp,
	memo text default null,
	primary key(replyid),
	foreign key(reviewid) references review(reviewid) on delete cascade on update cascade,
	foreign key(userid) references user(id) on delete cascade on update cascade,
	index(reviewid),
	index(time)
)engine=InnoDB default character set utf8 collate utf8_general_ci;