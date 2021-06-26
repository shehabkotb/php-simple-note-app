INSERT INTO `users` (`id`, `name`) VALUES
(1, 'test user', 'test');

INSERT INTO `notes` (`id`, `creator_id`, `title`, `content`) VALUES
(1, 1, 'note 1', 'some test text'),
(2, 1, 'note 2', '<p>test html</p>'),
(3, 1, 'note 3', 'test mark down
--------------');

