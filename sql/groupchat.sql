DROP DATABASE IF EXISTS `groupchat`;
CREATE DATABASE `groupchat`;
USE `groupchat`;

CREATE TABLE `users` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL UNIQUE,
  `passwd` varchar(255) NOT NULL
);

CREATE TABLE `groups` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
);

CREATE TABLE `messages` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `message` text NOT NULL,
  `post_date` datetime NOT NULL,
  `group_id` int NOT NULL,
  `user_id` int NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE
);