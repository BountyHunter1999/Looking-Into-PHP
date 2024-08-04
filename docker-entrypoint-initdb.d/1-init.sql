DROP TABLE IF EXISTS posts;

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256) NOT NULL
);

BEGIN;

INSERT INTO posts (title) VALUES 
('My First Blog Post'), 
('My Second Blog Post');

COMMIT;
