create table if not exists ORIGINAL (
  ID integer not null primary key auto_increment,
  WORD varchar(255) unique not null
);

create table if not exists TRANSLATION (
  ID integer not null primary key auto_increment,
  ORIGINAL_ID integer not null,
  WORD varchar(255) not null,
  CONTEXT varchar(255),
  comment text,
  foreign key (ORIGINAL_ID) references ORIGINAL(ID)
);

create index ORIGINAL_WORD on ORIGINAL (WORD(10));
