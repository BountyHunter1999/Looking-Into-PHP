DROP TABLE IF EXISTS notes;
DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    password VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS notes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    body TEXT NOT NULL,
    user_id INT(11) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE UNIQUE INDEX unique_email_index ON users (email);

BEGIN;

INSERT INTO users (password, email) VALUES 
('Alice-Johnson', 'alice.johnson@example.com'),
('Bob-Smith', 'bob.smith@example.com'),
('Charlie-Brown', 'charlie.brown@example.com');


INSERT INTO notes (body, user_id) VALUES
('Discuss the upcoming project timeline and deliverables.', 1),
('Milk, Bread, Butter, Eggs, Coffee.', 2),
('Finish reading book, go for a run, call mom.', 1),
('Try new pasta recipe with mushrooms and spinach.', 3),
('Monday: Cardio; Tuesday: Strength training.', 2);

COMMIT;
