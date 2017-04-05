drop table if exists Comments  cascade;
drop table if exists Posts cascade;
drop table if exists Users cascade;
drop table if exists Categories cascade;
drop table if exists UserImages cascade;

create table Users(
    uid int unique not null auto_increment,
    username varchar(10) unique not null,
    email varchar(50) unique,
    bio varchar(500),
    totalCommentScore int,
    imagePath varchar(50),
    isAdmin boolean,
    isBanned boolean,
    password varchar(100),
    primary key(uid)
);
create table Categories(
    catId int unique not null,
    title varchar(50),
    description varchar(50)
);
create table Posts(
    pid int auto_increment,
    title varchar(500),
    text varchar(500),
    link varchar(500),
    score int,
    uid int,
    catId int,
    primary key (pid),
    foreign key (uid) references Users(uid) on update cascade on delete no action,
    foreign key (catId) references Categories(catId) on update cascade on delete no action
);

create table Comments(
    cid int unique not null auto_increment,
    text varchar(500),
    score int,
    uid int,
    pid int,
    primary key (cid),
    foreign key (uid) references Users(uid) on update cascade on delete cascade,
	foreign key (pid) references Posts(pid) on update cascade on delete cascade

);
CREATE TABLE UserImages (
  uid int(11) NOT NULL,
  contentType varchar(255) NOT NULL,
  image blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into Categories values(1, "Test", "a test cat");
insert into Users(username, email, password) values("mackosx", "mackenziesalloum@gmail.com", "2f23fa3579f3f75175793649115c1b25");

insert into Posts(title, text, link, score, uid, catId) values("Test post pls ignore", "content", "facebook.com", 6, 1, 1);
insert into Posts(title, text, link, score, uid, catId) values("Another test post", "more content", "buzzfeed.com", 6, 1, 1);
insert into Posts(title, text, link, score, uid, catId) values("WOW test", "content", "ubc.ca", 6, 1, 1);



