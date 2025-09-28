CREATE TABLE IF NOT EXISTS contact (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    phone_number TEXT NOT NULL
);
-- https://jsonplaceholder.typicode.com/users
INSERT INTO contact (name, email, phone_number)
VALUES (
        'Leanne Graham',
        'Sincere@april.biz',
        '1-770-736-8031 x56442'
    ),
    (
        'Ervin Howell',
        'Shanna@melissa.tv',
        '010-692-6593 x09125'
    ),
    (
        'Clementine Bauch',
        'Nathan@yesenia.net',
        '1-463-123-4447'
    );