Simple Directories Staff
=======

A simple staff directory application using CakePHP 2.x

Requirements
=======
* CakePHP 2.x
* PHP5

URL 
======
http://mzm-dev.github.io/directories/

Database
=======

```go
--
-- Database: `db_directory`
--

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
```


Download https://github.com/mzm-dev/directories/archive/master.zip

Comment
=======
Any comment to improve this application. 

[![mzmDev](https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn2/1510379_258048164363272_1996045806_n.png)](https://www.facebook.com/mzmDev)

https://www.facebook.com/mzmDev

Get Support!
------------

[![CakePHP](http://cakephp.org/img/logo/powered_by_cake_logo_25.png)](http://www.cakephp.org)
![Cake Power](https://raw.github.com/cakephp/cakephp/master/lib/Cake/Console/Templates/skel/webroot/img/cake.power.gif)

