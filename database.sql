create table [dbo].[submission](
    id INT NOT NULL PRIMARY KEY(id),
    name VARCHAR(50),
    email VARCHAR(50),
    division VARCHAR(50),
    date DATE NOT NULL
);