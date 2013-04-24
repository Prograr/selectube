CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(32),
    prenom VARCHAR(32),
    pseudo VARCHAR(32) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password CHAR(40) NOT NULL,
    facebook_id  BIGINT(20) UNSIGNED,
    facebook_url VARCHAR(255) DEFAULT NULL,
    score SMALLINT,
    `role` VARCHAR(20) NOT NULL DEFAULT 'normal',
    created DATETIME DEFAULT NULL,
    lastconnect DATETIME DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS profils (
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED,
    `public` BOOLEAN,
    avatar VARCHAR(100) DEFAULT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
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
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (parent_id),
    FOREIGN KEY (parent_id) REFERENCES categories(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS videos (
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED,
    titre VARCHAR(64) NOT NULL,
    description TEXT,
    url VARCHAR(255) NOT NULL,
    tags VARCHAR(100),
    categorie_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (categorie_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS artistes (
    id INT UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(64) NOT NULL,
    pays VARCHAR(64),
    ville VARCHAR(64),
    naissance DATE,
    bio TEXT,
    photo VARCHAR(255) DEFAULT NULL,
    categorie_id INT UNSIGNED,
    user_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (categorie_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS albums (
    id INT UNSIGNED AUTO_INCREMENT,
    titre VARCHAR(64) NOT NULL,
    artiste_id INT UNSIGNED,
    annee DATE,
    jaquette VARCHAR(255) DEFAULT NULL,
    categorie_id INT UNSIGNED,
    user_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (artiste_id),
    FOREIGN KEY (artiste_id) REFERENCES artistes(id),
    INDEX (categorie_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS musiques (
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED,
    titre VARCHAR(64) NOT NULL,
    description TEXT,
    artiste_id INT UNSIGNED,
    album_id INT UNSIGNED,
    url VARCHAR(255) NOT NULL,
    tags VARCHAR(100),
    categorie_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (artiste_id),
    FOREIGN KEY (artiste_id) REFERENCES artistes(id),
    INDEX (album_id),
    FOREIGN KEY (album_id) REFERENCES albums(id),
    INDEX (categorie_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS followers (
    id INT UNSIGNED AUTO_INCREMENT,
    suivi_id INT UNSIGNED,
    suiveur_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (suivi_id),
    FOREIGN KEY (suivi_id) REFERENCES users(id),
    INDEX (suiveur_id),
    FOREIGN KEY (suiveur_id) REFERENCES users(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS favoris (
    id INT UNSIGNED AUTO_INCREMENT,
    user_id INT UNSIGNED ,
    target_id INT UNSIGNED NOT NULL,
    `type` VARCHAR(20) NOT NULL,
    created DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS sites (
    id INT UNSIGNED AUTO_INCREMENT,
    nom VARCHAR(64) NOT NULL,
    description TEXT,
    lien VARCHAR(255),
    miniature VARCHAR(255) DEFAULT NULL,
    categorie_id INT UNSIGNED,
    user_id INT UNSIGNED,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (categorie_id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS notes (
    id INT UNSIGNED AUTO_INCREMENT,
    note INT UNSIGNED,
    user_id INT UNSIGNED,
    target_id INT UNSIGNED,
    `type` VARCHAR(20) NOT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS moderations (
    id INT UNSIGNED AUTO_INCREMENT,
    approuve BOOLEAN,
    user_id INT UNSIGNED,
    target_id INT UNSIGNED,
    `type` VARCHAR(20) NOT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS messages (
    id INT UNSIGNED AUTO_INCREMENT,
    message TEXT NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    destinataire_id INT UNSIGNED NOT NULL,
    pj_id INT UNSIGNED DEFAULT NULL,
    pj_type VARCHAR(20) DEFAULT NULL,
    created DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (destinataire_id),
    FOREIGN KEY (destinataire_id) REFERENCES users(id)
)ENGINE = INNODB;
