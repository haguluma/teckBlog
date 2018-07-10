CREATE TABLE users (
    id SERIAL,
    username text NOT NULL,
    password text NOT NULL,
    attribute text NOT NULL,
    created timestamp DEFAULT CURRENT_TIMESTAMP,
    modified timestamp DEFAULT CURRENT_TIMESTAMP,
    primary key(id)
);
