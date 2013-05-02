CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT,
    pseudo VARCHAR(32) NOT NULL,
    email VARCHAR(255) NOT NULL,
    ville VARCHAR(255),
    password CHAR(40) NOT NULL,
    facebook_id  BIGINT(20) UNSIGNED,
    facebook_url VARCHAR(255),
    score SMALLINT DEFAULT 1,
    `role` VARCHAR(20) NOT NULL DEFAULT 'normal',
    actif BOOLEAN DEFAULT false,
    created DATETIME DEFAULT NULL,
    lastconnect DATETIME DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS preference(
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED,
    name VARCHAR(64),
    type BOOL,
    value_int INT NULL,
    value_str VARCHAR(255) NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS categories (
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED,
    titre VARCHAR(64) NOT NULL,
    parent_id INT UNSIGNED,
    tags VARCHAR(100),
    miniature VARCHAR(255),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX (parent_id),
    FOREIGN KEY (parent_id) REFERENCES categories(id) ON DELETE CASCADE
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS artistes (
    id INT UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(64) NOT NULL,
    pays VARCHAR(64),
    ville VARCHAR(64),
    naissance DATE,
    bio TEXT,
    photo VARCHAR(255),
    categorie_id INT UNSIGNED,
    user_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX (categorie_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS albums (
    id INT UNSIGNED AUTO_INCREMENT,
    titre VARCHAR(64) NOT NULL,
    artiste_id INT UNSIGNED,
    sortie DATE,
    jaquette VARCHAR(255) DEFAULT NULL,
    categorie_id INT UNSIGNED,
    user_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX (artiste_id),
    FOREIGN KEY (artiste_id) REFERENCES artistes(id) ON DELETE CASCADE,
    INDEX (categorie_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS musiques (
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED,
    titre VARCHAR(64) NOT NULL,
    description TEXT,
    artiste_id INT UNSIGNED default 1,
    album_id INT UNSIGNED default 1,
    url VARCHAR(255) NOT NULL,
    tags VARCHAR(100),
    categorie_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX (artiste_id),
    FOREIGN KEY (artiste_id) REFERENCES artistes(id) ON DELETE CASCADE,
    INDEX (album_id),
    FOREIGN KEY (album_id) REFERENCES albums(id) ON DELETE CASCADE,
    INDEX (categorie_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
)ENGINE = INNODB;

-- CREATE TABLE IF NOT EXISTS videos (
--     id INT UNSIGNED AUTO_INCREMENT,
--     user_id INT UNSIGNED,
--     titre VARCHAR(64) NOT NULL,
--     description TEXT,
--     url VARCHAR(255) NOT NULL,
--     tags VARCHAR(100),
--     categorie_id INT UNSIGNED,
--     created DATETIME DEFAULT NULL,
--     modified DATETIME DEFAULT NULL,
--     PRIMARY KEY (id),
--     INDEX (user_id),
--     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
--     INDEX (categorie_id),
--     FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
-- )ENGINE = INNODB;

-- CREATE TABLE IF NOT EXISTS followers (
--     id INT UNSIGNED AUTO_INCREMENT,
--     suivi_id INT UNSIGNED,
--     suiveur_id INT UNSIGNED,
--     created DATETIME DEFAULT NULL,
--     PRIMARY KEY (id),
--     INDEX (suivi_id),
--     FOREIGN KEY (suivi_id) REFERENCES users(id) ON DELETE CASCADE,
--     INDEX (suiveur_id),
--     FOREIGN KEY (suiveur_id) REFERENCES users(id) ON DELETE CASCADE
-- )ENGINE = INNODB;

-- CREATE TABLE IF NOT EXISTS favoris (
--     id INT UNSIGNED AUTO_INCREMENT,
--     user_id INT UNSIGNED ,
--     target_id INT UNSIGNED NOT NULL,
--     `type` VARCHAR(20) NOT NULL,
--     created DATETIME DEFAULT NULL,
--     PRIMARY KEY (id),
--     INDEX (user_id),
--     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
-- )ENGINE = INNODB;

-- CREATE TABLE IF NOT EXISTS sites (
--     id INT UNSIGNED AUTO_INCREMENT,
--     nom VARCHAR(64) NOT NULL,
--     description TEXT,
--     lien VARCHAR(255),
--     miniature VARCHAR(255) DEFAULT NULL,
--     categorie_id INT UNSIGNED,
--     user_id INT UNSIGNED,
--     created DATETIME DEFAULT NULL,
--     modified DATETIME DEFAULT NULL,
--     PRIMARY KEY (id),
--     INDEX (user_id),
--     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
--     INDEX (categorie_id),
--     FOREIGN KEY (categorie_id) REFERENCES categories(id) ON DELETE CASCADE
-- )ENGINE = INNODB;

-- CREATE TABLE IF NOT EXISTS notes (
--     id INT UNSIGNED AUTO_INCREMENT,
--     note INT UNSIGNED,
--     user_id INT UNSIGNED,
--     target_id INT UNSIGNED,
--     `type` VARCHAR(20) NOT NULL,
--     created DATETIME DEFAULT NULL,
--     modified DATETIME DEFAULT NULL,
--     PRIMARY KEY (id),
--     INDEX (user_id),
--     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
-- )ENGINE = INNODB;

-- CREATE TABLE IF NOT EXISTS moderations (
--     id INT UNSIGNED AUTO_INCREMENT,
--     approuve BOOLEAN,
--     user_id INT UNSIGNED,
--     target_id INT UNSIGNED,
--     `type` VARCHAR(20) NOT NULL,
--     created DATETIME DEFAULT NULL,
--     modified DATETIME DEFAULT NULL,
--     PRIMARY KEY (id),
--     INDEX (user_id),
--     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
-- )ENGINE = INNODB;

-- CREATE TABLE IF NOT EXISTS messages (
--     id INT UNSIGNED AUTO_INCREMENT,
--     message TEXT NOT NULL,
--     user_id INT UNSIGNED NOT NULL,
--     destinataire_id INT UNSIGNED NOT NULL,
--     pj_id INT UNSIGNED DEFAULT NULL,
--     pj_type VARCHAR(20) DEFAULT NULL,
--     created DATETIME DEFAULT NULL,
--     PRIMARY KEY (id),
--     INDEX (user_id),
--     FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
--     INDEX (destinataire_id),
--     FOREIGN KEY (destinataire_id) REFERENCES users(id) ON DELETE CASCADE
-- )ENGINE = INNODB;
