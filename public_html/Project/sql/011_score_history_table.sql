CREATE TABLE IF NOT EXISTS ScoreHistory(
    id int AUTO_INCREMENT PRIMARY KEY,
    score int,
    user_id int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    correct BOOLEAN,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    check (score > 0)
)