DROP TABLE IF EXISTS `news` ;
DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `user`;

CREATE TABLE forum (
	forum_id integer not null primary key auto_increment,
	forum_title varchar(100) not null,
	forum_content varchar(2000) not null
	)engine=innodb character set utf8 collate utf8_unicode_ci;


CREATE TABLE user (
    user_id integer not null primary key auto_increment,
    user_name varchar(50) not null,
    user_password varchar(88) not null,
    user_salt varchar(23) not null,
    user_role varchar(50) not null
    )engine=innodb character set utf8 collate utf8_unicode_ci;

CREATE TABLE comments (
    com_id integer not null primary key auto_increment ,
    com_content varchar(500) not null,
    forum_id integer not null,
    user_id integer not null,
    constraint fk_com_forum foreign key (forum_id) references forum(forum_id),
    constraint fk_com_user foreign key (user_id) references user(user_id)
    )engine=innodb character set utf8 collate utf8_unicode_ci;