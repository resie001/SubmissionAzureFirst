create table [dbo].[submission](
    id INT NOT NULL PRIMARY KEY(id),
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    division VARCHAR(50) NOT NULL,
    date DATE NOT NULL
);