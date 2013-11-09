use team03;

drop table if exists events;
create table events
( event_id int unsigned not null auto_increment primary key,
  user_id int unsigned not null,
  event_name char(50) not null,
  latitude float not null,
  longitude float not null,
  location char(150),
  details text(500)
)
  
