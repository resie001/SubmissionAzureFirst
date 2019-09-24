create table [dbo].[Registran](
    id INT NOT NULL IDENTITY(1,1),
    name VARCHAR(50),
    email VARCHAR(50),
    division VARCHAR(50),
    date DATE,
    PRIMARY KEY(id)
);