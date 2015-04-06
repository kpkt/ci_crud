#Codeigniter Example CRUD
Codeigniter example CRUD(Create, Read, Update, Delete)

#Database

```go

--
-- Database: `ci_db1`
--

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` char(40) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#Remove index.php by .htaccess

##Step:-1
Open the folder “application/config” and open the file “config.php“. find and replace the below code in config.php file.

```go

find the below code
$config['index_page'] = "index.php"

replace with the below code
$config['index_page'] = ""
```

##Step:-2
Go to your project folder and create .htaccess

Write below code in .htaccess file
```go

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L] 
```

##Step:-4
In some case the default setting for uri_protocol does not work properly. To solve this problem just open the file “application/config/config.php“, then find and replace the below code

```go
find the below code

$config['uri_protocol'] = "AUTO"

replace with the below code

$config['uri_protocol'] = "REQUEST_URI" 
```