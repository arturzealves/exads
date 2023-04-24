CREATE DATABASE db_tv_series;

USE db_tv_series;

CREATE TABLE tv_series (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    channel VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE tv_series_intervals (
    id_tv_series INT(11) NOT NULL,
    week_day INT UNSIGNED NOT NULL,
    show_time TIME NOT NULL,
    FOREIGN KEY (id_tv_series) REFERENCES tv_series(id)
) ENGINE=InnoDB;

INSERT INTO tv_series (title, channel, gender)
VALUES
    ('Dark', 'Netflix', 'Drama'),
    ('Causa Própria', 'RTP', 'Crime'),
    ('1899', 'Netflix', 'Mystery'),
    ('The Last Of Us', 'HBO', 'Action');

INSERT INTO tv_series_intervals (id_tv_series, week_day, show_time)
VALUES
    (1, 4, '21:00:00'),
    (2, 5, '21:30:00'),
    (3, 6, '22:00:00'),
    (4, 7, '22:30:00');
