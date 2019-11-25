<?php
include_once 'MySQLDB.php';
require 'dbHindi.php';

//  create the database again
$db->createDatabase();
// select the database
$db->selectDatabase();

// drop the tables
$sql = "drop table if exists post";
$result = $db->query($sql);

$sql = "drop table if exists user";
$result = $db->query($sql);

// create the tables
$sql = "create table user (userName varchar(20) not null,
                                userPassword varchar(255) not null,
                                firstName varchar(25),
                                lastName varchar(25),
                                userEmail varchar(255),
                                primary key(userName)
								)ENGINE=InnoDB";

$result = $db->query($sql);
if ( $result )
{
    echo 'the user table was added<br>';
}
else
{
    echo 'the user table was not added<br>';
}

$sql = "create table post (postNum int not null, 
                              postTitle varchar(255),
                              postContent MEDIUMTEXT,
                              postDate date,
                              noOfLikes int,
                              userName varchar(20),
                              primary key(postNum),
                              foreign key (userName) references user (userName)
                             ) ENGINE=InnoDB";
							 
//  execute the sql query
$result = $db->query($sql);
if ( $result )
{
   echo 'the post table was added<br>';
}
else
{
   echo 'the post table was not added<br>';
}

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Inserting into DB with hashed password
$stmt = mysqli_prepare($link, "INSERT INTO user VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'sssss', $userName, $psswd, $firstName, $lastName, $userEmail);

$userName = 'TomS12345';
$psswd = PASSWORD_HASH('test12345@', PASSWORD_DEFAULT);
$firstName = 'Tom';
$lastName = 'Son';
$userEmail = 'dos0311@arastudent.ac.nz';

/* execute prepared statement */
mysqli_stmt_execute($stmt);

/* See whether I need this but keep this, from php.net doc
// /* close statement and connection */
// mysqli_stmt_close($stmt);

// /* close connection */
// mysqli_close($link);



$sql = "insert into user values ('TomS123', 'test12345', 'Tom','Son', 'dos0311@arastudent.ac.nz')";
//  execute the sql query
$result = $db->query($sql);


$sql = "insert into post values ('1', 'it is a test', 'aloha', '2019-05-23', 4, 'TomS123')";
//  execute the sql query
$result = $db->query($sql);             

?>
<html>
<body>
<br /><br />
<a href="../index.php">Return To Main Form</a>
</body>
</html>
