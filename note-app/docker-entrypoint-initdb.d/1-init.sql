DROP TABLE IF EXISTS notes;

CREATE TABLE IF NOT EXISTS notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256) NOT NULL,
    body TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
);

-- BEGIN;

-- INSERT INTO posts (title) VALUES 
-- ('My First Blog Post'), 
-- ('My Second Blog Post');

-- COMMIT;
