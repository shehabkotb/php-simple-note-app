INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) 
VALUES (
    1, 
    'Shehab Kotb', 
    'student@example.com', 
    '$2y$10$Ebq16jIcvBkuZqZN8wlDuOL0lf2OZhRTY0TudVR7CPkoBoaNFUb4u', 
    '2021-06-27 03:20:53'
);

INSERT INTO `notes` (`id`, `creator_id`, `title`, `content`, `updated_at`) 
VALUES (
    NULL, 
    '1', 
    'test note 2', 
    '&lt;p&gt;&lt;span style=&quot;font-size: 36pt;&quot;&gt;1 Font size 36&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 24pt;&quot;&gt;2 Font size 24&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18pt;&quot;&gt;3 Font size 18&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 14pt;&quot;&gt;4 Font size 14&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong style=&quot;font-size: 32px; color: rgb(255, 0, 0);&quot;&gt;Different&lt;/strong&gt;&lt;strong style=&quot;font-size: 24pt; color: rgb(255, 0, 0);&quot;&gt; &lt;/strong&gt;&lt;strong style=&quot;font-size: 24pt; color: rgb(0, 255, 30);&quot;&gt;c&lt;/strong&gt;&lt;strong style=&quot;font-size: 32px; color: rgb(0, 255, 30);&quot;&gt;olor &lt;/strong&gt;&lt;strong style=&quot;font-size: 24pt; color: rgb(106, 0, 255);&quot;&gt;text &lt;/strong&gt;&lt;strong style=&quot;font-size: 24pt; color: rgb(0, 148, 108);&quot;&gt;test &lt;/strong&gt;&lt;strong style=&quot;font-size: 24pt; color: rgb(0, 0, 0);&quot;&gt;|| &lt;/strong&gt;&lt;strong style=&quot;font-size: 32px; color: rgb(0, 0, 0); font-family: &amp;quot;Courier New&amp;quot;;&quot;&gt;Different &lt;/strong&gt;&lt;strong style=&quot;font-size: 24pt; color: rgb(0, 0, 0); font-family: Impact;&quot;&gt;Fonts &lt;/strong&gt;&lt;strong style=&quot;font-size: 24pt; color: rgb(0, 0, 0); font-family: Verdana;&quot;&gt;Text&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;strong style=&quot;font-size: 18pt;&quot;&gt;&lt;u&gt;Images&lt;/u&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;img src=&quot;https://images.unsplash.com/photo-1593642532973-d31b6557fa68?ixid=MnwxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxMXx8fGVufDB8fHx8&amp;amp;ixlib=rb-1.2.1&amp;amp;auto=format&amp;amp;fit=crop&amp;amp;w=400&amp;amp;q=60&quot; width=&quot;282&quot; height=&quot;278&quot;&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;table style=&quot;border: 1px solid #000;&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td data-row=&quot;row-jt3z&quot; style=&quot;text-align: center;&quot;&gt;&lt;strong style=&quot;font-size: 14pt;&quot;&gt;Tables&lt;/strong&gt;&lt;/td&gt;&lt;td data-row=&quot;row-jt3z&quot; style=&quot;text-align: center;&quot;&gt;&lt;a href=&quot;https://www.google.com/search?q=the+white+wolf+jumped+over+the&amp;amp;oq=the+white+wolf+jumped+over+the+&amp;amp;aqs=chrome..69i57j69i64l2.10256j0j7&amp;amp;sourceid=chrome&amp;amp;ie=UTF-8&quot; rel=&quot;noopener noreferrer&quot; target=&quot;_blank&quot; style=&quot;font-size: 14pt;&quot;&gt;links&lt;/a&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td data-row=&quot;row-vsnm&quot; style=&quot;text-align: center;&quot;&gt;&lt;span style=&quot;font-size: 18pt; background-color: rgb(217, 255, 0);&quot;&gt;Text Highlight&lt;/span&gt;&lt;/td&gt;&lt;td data-row=&quot;row-vsnm&quot; style=&quot;text-align: center;&quot;&gt;&lt;strong style=&quot;font-size: 14pt; color: rgb(255, 255, 255); background-color: rgb(255, 0, 217);&quot;&gt;Highlight With Different Colors&lt;/strong&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p style=&quot;text-align: left;&quot;&gt;&lt;br&gt;&lt;/p&gt;', 
    '2021-06-28 17:31:05'
);

--password for user is shortpass

