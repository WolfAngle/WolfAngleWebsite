<!--
//This is the phpMyAdmin table code, for backup proposes

------------------------------------------------

//SQL code for create tables

create table posts (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    subject varchar(128) not null,
    content varchar(1000) not null,
    date datetime not null
);

------------------------------------------------

//SQL code for inster content into tables

//insert into [table name] ([column 1], [column 2], ...) VALUES ([value to column1], [value to column2], ...)


/*
insert into posts (subject, content, date) VALUES ('This is the subject', 'This is the content', '2020-05-31 11:46:01');
*/

------------------------------------------------

//SQL code for select data from a table

//SELECT [column to be selected] FROM [table name] WHERE [value to identify the correct row]='[the value to be searched]'


/*
SELECT * FROM posts WHERE id='1'
*/

------------------------------------------------

//SQL code for update values inside a table

// UPDATE [table name]
// SET [column1 to be changed]='[new content]', [column2 to be changed]='[new content]', ...
// WHERE [value to identify the correct row]='[the value to be searched]'


/* 
UPDATE posts
SET subject='This is a test', content='This is the content'
WHERE id='1' 
*/

------------------------------------------------

//SQL code for delete data

// DELETE FROM [table name]
// WHERE [value to identify the correct row]='[the value to be searched]'


/*
DELETE FROM posts
WHERE id='1'
*/


//SQL code for select and order data from a table

//SELECT [column to be selected] FROM [table name] ORDER BY [column that defines the order of the data] [ASC/DESC (ascending or descending order)]

/*
SELECT * FROM posts ORDER BY id ASC
*/
-->