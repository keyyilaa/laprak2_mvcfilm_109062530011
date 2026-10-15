CREATE DATABASE IF NOT EXISTS film_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE film_db;

CREATE TABLE IF NOT EXISTS film (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    sutradara VARCHAR(100) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    tahun_rilis SMALLINT NOT NULL,
    rating DECIMAL(3,1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO film (judul, sutradara, genre, tahun_rilis, rating) VALUES
('Avatar: The Way of Water', 'James Cameron', 'Sci-Fi', 2022, 7.6),
('My Demon', 'Choi Jung-in', 'Fantasi, Romantis', 2023, 7.9),
('The Summer I Turned Pretty', 'Jenny Han', 'Drama, Romantis', 2022, 7.0),
('Emily in Paris', 'Darren Star', 'Komedi, Romantis', 2020, 6.9),
('Upgraded', 'Carlson Young', 'Komedi, Romantis', 2024, 6.0),
('Inception', 'Christopher Nolan', 'Sci-Fi, Thriller', 2010, 8.8),
('Interstellar', 'Christopher Nolan', 'Sci-Fi, Drama', 2014, 8.7),
('Parasite', 'Bong Joon-ho', 'Drama, Thriller', 2019, 8.5),
('Crash Landing on You', 'Lee Jeong-hyo', 'Romantis, Drama', 2019, 8.7),
('Train to Busan', 'Yeon Sang-ho', 'Horor, Aksi', 2016, 7.6);