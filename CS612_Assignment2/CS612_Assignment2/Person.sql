-- Creating person table in database
create table person (

	LoginID varchar(10) not null primary key,
	FirstName varchar(50) not null,
	LastName varchar(50) not null,
	picUrl varchar(50), 
	Bio varchar(255)

); 

-- Inserting at least 8 test data in database
insert into person values ('tommyLee', 'tommy', 'lee', 'lee.gif', 'Lee likes food');
insert into person values ('bobBrown', 'bob', 'brown', 'bob.gif', 'Bob likes sports');
insert into person values ('IanBlue', 'ian', 'blue', 'ian.gif', 'Ian likes sports');
insert into person values ('ArraBlack', 'arra', 'black', 'arra.gif', 'Arra is an author');
insert into person values ('AnaKen', 'Ana', 'ken', 'ana.gif', 'Ana is into cooking');
insert into person values ('jimmyLee', 'jimmy', 'lee', 'lee.gif', 'Jimmy likes tennis');	
insert into person values ('ericWhite', 'eric', 'white', 'eric.gif', 'eric is into traveling');
insert into person values ('AriBlack', 'Ari', 'Black', 'Ari.gif', 'Ari likes fishing');	