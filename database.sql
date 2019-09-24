create table [dbo].[submission](
    id INT NOT NULL IDENTITY(1,1),
    name VARCHAR(50),
    email VARCHAR(50),
    division VARCHAR(50),
    date DATE NOT NULL,
    PRIMARY KEY(id)
);