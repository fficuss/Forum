DROP TABLE IF EXISTS example_table;
CREATE TABLE example_table (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO example_table (name, description) VALUES ('Item 1', 'Description 1');
INSERT INTO example_table (name, description) VALUES ('Item 2', 'Description 2');
