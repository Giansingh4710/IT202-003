CREATE TABLE IF NOT EXISTS ScoreHistory(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    correct BOOLEAN,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)