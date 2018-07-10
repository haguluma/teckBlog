create table bookmarks (
id SERIAL,
title text not null,
author_id text not null,
url text not null,
time_created timestamp default CURRENT_TIMESTAMP,
primary key(id)
);

create table tagmaps (
id SERIAL,
bookmark_id integer,
tag_id integer,
primary key(id)
);

create table tags (
tag_id SERIAL,
tag_name text not null,
primary key(tag_id)
);
