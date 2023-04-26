INSERT INTO `users` (`name`, `username`, `passwd`) VALUES
("John Doe", "jdoe", "password1"),
("Jane Smith", "jsmith", "abc123"),
("Michael Johnson", "mjohnson", "p@ssw0rd"),
("Emily Brown", "ebrown", "secret"),
("David Lee", "dlee", "123456"),
("Sarah Williams", "swilliams", "mypassword"),
("Robert Davis", "rdavis", "qwerty"),
("Laura Jones", "ljones", "ilovecats"),
("Kevin Wilson", "kwilson", "football"),
("Rachel Green", "rgreen", "friends"),
("Adam Wright", "awright", "987654"),
("Lisa Taylor", "ltaylor", "welcome1"),
("Brandon Martin", "bmartin", "hello123"),
("Jessica Rodriguez", "jrodriguez", "jessie12"),
("Steven White", "swhite", "0password");

INSERT INTO `groups` (`id`, `name`, `user_id`) VALUES
(1, "Cooking", 7),
(2, "Sports", 11),
(3, "Movies", 8),
(4, "Travel", 5),
(5, "Fitness", 6),
(6, "Photography", 6),
(7, "Music", 9),
(8, "Politics", 15),
(9, "Gaming", 6),
(10, "Books", 9),
(11, "Fashion", 6),
(12, "Technology", 10),
(13, "Entrepreneurship", 1),
(14, "Art", 10),
(15, "Science", 4);

INSERT INTO `messages` (`message`, `post_date`, `group_id`, `user_id`) VALUES
("Hi everyone, I'm new here!", "2023-04-20 09:34:12", 2, 8),
("What's everyone cooking today?", "2023-04-20 11:22:55", 1, 3),
("Just finished watching the latest Avengers movie.", "2023-04-20 15:45:02", 3, 9),
("I'm planning a trip to Japan, any tips?", "2023-04-21 10:11:33", 2, 1),
("Just got back from a 5K run, feeling great!", "2023-04-21 16:18:22", 5, 13),
("Check out this amazing sunset I captured!", "2023-04-22 08:57:41", 4, 12),
("What's your favorite type of music?", "2023-04-22 12:01:14", 3, 7),
("What do you think about the recent political events?", "2023-04-23 09:15:02", 5, 6),
("Just finished playing the latest game, it's amazing!", "2023-04-23 15:27:19", 4, 10),
("What's the best book you've read lately?", "2023-04-24 11:42:50", 1, 4),
("Just got a new pair of shoes, so excited to wear them!", "2023-04-26 10:23:12", 11, 3),
("Anyone know of any good online stores for vintage clothes?", "2023-04-25 14:47:55", 11, 2),
("I'm trying to find the perfect outfit for a beach wedding.", "2023-04-24 18:15:02", 11, 5),
("What are some must-have accessories for summer?", "2023-04-23 11:11:33", 11, 7),
("Just got a new haircut, what do you think?", "2023-04-22 09:18:22", 11, 9),
("Who else loves shopping for statement jewelry?", "2023-04-21 16:57:41", 11, 1),
("Have you tried the new sustainable clothing line?", "2023-04-20 12:01:14", 11, 8),
("Check out this new painting I just finished!", "2023-04-26 15:23:12", 14, 4),
("Who else is excited for the upcoming art exhibition?", "2023-04-25 13:47:55", 14, 11),
("I'm looking for recommendations on good art museums to visit.", "2023-04-24 16:15:02", 14, 14),
("Just started working on a new sculpture, can't wait to see how it turns out.", "2023-04-23 10:11:33", 14, 12),
("What's your favorite medium to work with?", "2023-04-22 14:18:22", 14, 6),
("I'm trying to incorporate more color into my art. Any tips?", "2023-04-21 11:57:41", 14, 15),
("Who else loves sketching outdoors?", "2023-04-20 09:01:14", 14, 13),
("Just launched my new product on Kickstarter, check it out!", "2023-04-26 09:23:12", 13, 6),
("Anyone have any tips on how to improve customer retention?", "2023-04-25 14:47:55", 13, 8),
("Excited to be attending the startup conference next week.", "2023-04-24 18:15:02", 13, 10),
("What are some effective marketing strategies for a small business?", "2023-04-23 11:11:33", 13, 7),
("Just signed a partnership agreement with a big corporation.", "2023-04-22 09:18:22", 13, 9),
("Anyone know of a good accounting software for startups?", "2023-04-21 16:57:41", 13, 6),
("Who else is struggling with work-life balance as an entrepreneur?", "2023-04-20 12:01:14", 13, 8);