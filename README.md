# Locals

Welcome to this simple feedback apps.

#Stack
  FrontEnd - HTMl, CSS, JS, jQuery
  BackEnd - PHP8 procedural
  DB - MySql Lite

#Deployment

    1. Install PHP8
    2. Clone this repo
    3. Install XAMPP server
    4. open PHP myAdmin create DB and run this queries: 

```sqlite
feedbacks	CREATE TABLE `feedbacks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `feedback` longtext NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp(),
  `DeletedAt` date NOT NULL,
  `DeletedBy` text NOT NULL,
  `image` blob NOT NULL,
  `acceptedAt` date NOT NULL,
  `updatedAt` date NOT NULL,
  `AcceptedBy` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4	

```

```sqlite
CREATE TABLE `users` ( 
`id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `password` varchar(255) NOT NULL,
 `isAdmin` binary(1) DEFAULT '0',
 `created_at` datetime DEFAULT current_timestamp(),
 `email` text NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `username` (`username`),
 UNIQUE KEY `email` (`email`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4
```

5. opne configs/config.php and change mysql to the new DB name  `define('DB_NAME', 'mysql');`

6. Run app
