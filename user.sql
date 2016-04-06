
-- Table user sqheme

CREATE TABLE IF NOT EXISTS user (
    id int(11) unsigned NOT NULL UNIQUE,
    name varchar(50) NOT NULL UNIQUE,
    pass varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

