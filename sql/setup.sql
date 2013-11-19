use team03;

drop table if exists events;
create table events
( event_id int unsigned not null auto_increment primary key,
  user_id int unsigned not null,
  event_name char(50) not null,
  latitude float not null,
  longitude float not null,
  start_time datetime not null,
  end_time datetime not null,
  location char(150),
  list_description char(100),
  isprivate boolean,
  details text(500)
);
  
drop table if exists users;
create table users
( user_id int unsigned not null auto_increment primary key,
  name varchar(100) not null,
  email varchar(100) not null unique,
  password varchar(100) not null
);
