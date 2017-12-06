create schema topacdb;
use topacdb;
create table if not exists thesis (
	id int(11) not null auto_increment,
    title varchar(255) not null,
    author varchar(255) not null,
    created_at datetime not null default current_timestamp,
    primary key(id)
);