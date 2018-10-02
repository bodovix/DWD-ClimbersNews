
CREATE TABLE IF NOT EXISTS user (
	id int auto_increment,
	userStatus set('active','inactive') not null,
	userRole set('user','author','admin'),
    email varchar(70) not null,
    password varchar(200) not null,
    phoneNumber varchar(15) not null,
    forename varchar(60) not null,
    surname varchar(60) not null,
	createdOn date,
    imageUrl varchar(200) not null,

    primary key(id)
);
CREATE TABLE IF NOT EXISTS articleCategory (
	id int auto_increment,
	category varchar(20) not null,
	createdOn date ,
    primary key(id)
);

CREATE TABLE IF NOT EXISTS article (
	id int auto_increment,
	headline varchar(60) not null,
    coverImage varchar(200) not null,
    category int REFERENCES articleCategory(id),
	description varchar(70) not null,
    
    primaryText varchar(4000) not null,
    primaryMediaUrl varchar(200) ,
    primaryMediaType set('none','image','video','audio') DEFAULT 'none',
    primaryMediaCaption varchar(200),
    
    secondaryText varchar(4000) ,
    secondaryMediaUrl varchar(200),
    secondaryMediaType set('none','image','video','audio') DEFAULT 'none',
    secondaryMediaCaption varchar(200),
    
    conclusionText varchar(4000),
    conclusionMediaUrl varchar(200),
    conclusionMediaType set('none','image','video','audio') DEFAULT 'none',
    conclusionMediaCaption varchar(200),
    
    createdOn date,
    statusCode set('active','inactive') not null,
    author int (7) References user(id),
    
    primary key(id)
);


CREATE TABLE IF NOT EXISTS rating(
	id int auto_increment, 
	createdOn date,
	rating INT(3) NOT NULL,
    userId int not null REFERENCES article(id),
    article int not null REFERENCES article(id),
    
    primary key(id)
);

CREATE TABLE IF NOT EXISTS feedback(
	id int auto_increment,
    createdOn date ,
    feedback varchar(150) not null,
    showOnSite bool not null DEFAULT true,
    userId int not null REFERENCES article(id),
    article int not null REFERENCES article(id),
    
    primary key(id)
);
