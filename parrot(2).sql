-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 02:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parrot`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(1) NOT NULL,
  `mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `mode`) VALUES
(1, 'M-PESA'),
(2, 'PayPal'),
(3, 'Card');

-- --------------------------------------------------------

--
-- Table structure for table `saved_templates`
--

CREATE TABLE `saved_templates` (
  `id` int(9) NOT NULL,
  `unique_id` varchar(50) DEFAULT NULL,
  `user` int(6) NOT NULL,
  `text` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_templates`
--

INSERT INTO `saved_templates` (`id`, `unique_id`, `user`, `text`, `date`, `time`, `created_at`) VALUES
(61, 'q1+re+JDbse/NodFhLkp3Q==', 1, 'Are you still struggling with content creation and writing? Do you wish you could just hire someone to do it for you? I’m going to help you do just that, with a comprehensive guide to the best freelance content creation companies.\n\nIf you are a freelancer, you are probably well aware of the importance of content creation in marketing. Content marketing is all about creating and distributing high-quality content that will engage and inform your audience.\n\nYou can also use content marketing to drive visitors to your website, lead them to a product or service, or convince them to become your client.\n\nBut creating content is a time-consuming, difficult, and often frustrating process.\n\nYou have to find the right topic, write it, edit it, and promote it. But in the process, you may end up creating', '2022-03-27', '17:10:22', '2022-03-27 14:10:22'),
(63, 'r5A95mqWzABJ54BYT0pRTw==', 1, 'Gun control has been a controversial issue for years. Gun owners argue that owning a gun is a constitutionally protected right. Gun control advocates argue that guns are a danger to society and that owning a gun leads to more deaths than it prevents.\n\nSo, we decided to put both sides of the argument to the test. We decided to find out what gun owners and non-gun owners think about the issue of gun control. We conducted an online survey of 1,000 Americans. The results of the survey show that there is a strong divide in the American public when it comes to gun control.\n\nIt turns out that only about one-third of gun owners think that gun control should be more strict. It turns out that over half of non-gun owners think that gun control should be more strict. The rest of the results are quite interesting.\n\nThe data shows that there is a strong correlation between how much money a person makes and how strict they think gun control should be. It turns out that those who make over $50,000 a year are more likely to think that gun control should be more strict.\n\nThose who own guns are more likely to think that gun control should be more strict. Those who are not gun owners are more likely to think that gun control should be more strict.\n\nThe data shows that there is a strong correlation between how liberal a person is and how strict they think gun control should be. Those who are more conservative are more likely to think that gun control should be more strict.\n\nThose who live in a household with children are more likely to think that gun control should be', '2022-03-28', '11:05:14', '2022-03-28 08:05:14'),
(65, '2teXPPmYxivJ0Qn04Q1Qsg==', 1, 'Working from home is great because you can set your own hours, and work at a time that is convenient for you. This makes it possible to plan your work around your daily routine. It also means that you can stay in your pjs on the weekend and get up late when you feel like it, so long as your work gets done.\nIf you are a confident typist, you can make good money as a virtual assistant. A virtual assistant does not actually do the work, but he or she makes sure that everything goes smoothly. A virtual assistant can help a company with customer service, book travel arrangements, research products or services, and book tickets and other travel arrangements. Some virtual assistants also help companies with technology needs.[20]\n\nYou can use Uber EATS to make money fast. Your first day will be your hardest, but after that, you can pick up work whenever you want. Although each ride is an individual order, you can make around $15 per hour, which will net you around $480 per week. You can also choose between full and part time jobs. If you want to up your game further, sign up to be an Uber Driver Partner, which will also help you make money online in your spare time on top of your full-time job.\n\nYou can also use your website, blog, or even your Facebook page to promote yourself as a writer. If you know how to best promote yourself as a writer, then you can write articles, stories, press releases, product descriptions, blog posts, and more that will get noticed. You can also write about how to get into the writing business if you want to become a freelancer.\nIf you have experience with marketing, SEO, or a knack for getting people excited about the products and services you use on a regular basis, think about refining your skills and putting them to work making money online as a small business marketing consultant in your region—especially if you can become a local SEO expert and can help local clients rank higher in their search results.\n\nIf you have a knack for organization, you can make money online as a virtual assistant helping people to keep their days in order. A virtual assistant will do everything from bookkeeping to research, database entry, booking travel, and managing email. It can also be an awesome way to rub shoulders with some very important people, build up your professional network, and of course grow another stream of income. You can find great gigs on UpWork, Fiverr, Indeed, and Remote.co.\n\nIf you are a confident typist, you can make good money as a virtual assistant. Your first day will be your hardest, but after that, you can pick up work whenever you want. Although each ride is an individual order, you can make around $15 per hour, which will net you around $480 per week. You can also choose between full and part time jobs. If you want to up your game further, sign up to be an Uber Driver Partner, which will also help you make money online in your spare time on top of your full-time job.\n\nIf you have a knack for organization, you can make money online as a virtual assistant helping people to keep their days in order. A virtual assistant will do everything from bookkeeping to research, database entry, booking travel, and managing email. It can also be an awesome way to rub shoulders with some very important people, build up your professional network, and of course grow another stream of income. You can find great gigs on UpWork, Fiverr, Indeed, and Remote.co.\n\nIf you are a confident typist, you can make good money as a virtual assistant helping people to keep their days in order. Your first day will be your hardest, but after that, you can pick up work whenever you want. Although each ride is an individual order, you can make around $15 per hour, which will net you around', '2022-03-28', '11:10:53', '2022-03-28 08:10:53'),
(66, 'u0ug6c51kng17WClSypCCw==', 1, 'He had just started watching a movie when he received a text. It was from his wife.\n\n“It was a text from my wife saying she had a bad feeling,” said Alexander, who was visiting his family in Toronto for Christmas.\n\n“We had just started watching a movie and she texted me and said she felt bad. She was watching the movie, too, and she said it was the ending.”\n\nThe text was from his wife of 10 years, a woman he described as a positive, loving person. She was one of the best things in his life.\n\n“I was so shocked,” said Alexander, who lives in Toronto. “It was like I had a heart attack.”\n\nThe couple had been married for 10 years and had just celebrated their 10th wedding anniversary. They were planning to have a family together.\n\n“We had everything planned out. We were so excited for the future,” said Alexander.\n\n“It was the worst day of my life.”\n\nAlexander said his wife was having a baby and they had already decided on names.\n\n“I’m so sad,” said Alexander, who lost his best friend in the same month.\n\n“I’m going to miss her so much. I can’t believe it.”\n\nAlexander said his wife was a very good mother, a great wife and a great person.\n\n“She was the best person in the world,”', '2022-03-28', '11:14:20', '2022-03-28 08:14:20'),
(67, 'hPvBJfAkWLxrVow1sh/7XQ==', 1, 'In a recent press release, the company, through its spokesperson, has said that it will no longer support its earlier statements and would not be releasing any more updates on the app.\n\n“The service is currently unavailable due to a service outage. We are working to resolve the issue as soon as possible. In the meantime, we recommend that you delete the app and reinstall it. We will continue to update you as soon as the service is restored,” the company said.\n\nIt is unclear if the company is going to refund the money or not. But a user has tweeted that he has received a refund on his app.\n\nThe outage has led to the cancellation of the app’s annual users conference in Berlin. The event, which was scheduled to take place in November, is the only event that the company has hosted in the past.\n\nThe app has been downloaded by more than 1 million users.\n\nThe company has been losing a lot of money and is now facing a legal battle with Apple over the issue. The company has been refusing to pay Apple’s 30 percent cut of the app.\n\nLast week, Apple asked the company to pay it $375,000 for the damages.\n\nThe company has not paid Apple’s claim and Apple is now suing it for the money.\n\nThe app developer is a Swedish company called Readdle and has its headquarters in Sweden. It is also backed by Eric Schmidt and Jared Cohen.\n\nThe company has more than 20 apps and services in the app store and its apps have been downloaded more than 100 million times.\n\nYou can download the Readdle app here.\n\nMore from ThePrint\n\nFacebook is giving the company a head start on AI\n\nHow the US is using AI to fight climate change\n\nApple is now making apps more ‘AI-friendly’\n\nSubscribe to our channels on YouTube & Telegram\n\nWhy news media is in crisis & How you can fix it You are reading this because you value good, intelligent and objective journalism. We thank you for your time and your trust. You also know that the news media is facing an unprecedented crisis. It is likely that you are also hearing of the brutal layoffs and pay-cuts hitting the industry. There are many reasons why the media’s economics is broken. But a big one is that good people are not yet paying enough for good journalism.', '2022-03-28', '11:16:47', '2022-03-28 08:16:47'),
(328, 'Kb4G4RzoFvltdV+DZKktYw==', 1, 'Working from home is great because you are your own boss and you are able to set your own schedule. The only problem is that sometimes it can be tough to find a balance between work and home life. There are so many things that you have to take into account when you work from home. You will have to make sure that you set aside a specific amount of time for work and home life.\n\nWhen you work from home, you are your own boss and you set your own schedule. It is a great way to work and it is also flexible. If you have a flexible schedule, you can work from home in your pajamas if you want.\n\nIt can be great to work from home, but it is also important to be careful when you work from home. You will have to make sure that', '2022-04-03', '08:28:41', '2022-04-03 05:28:41'),
(329, '2rUO0N5GpmyBpzaSKL6fAg==', 1, 'Are you still struggling with content creation and writing? Do you wish you could just hire someone to do it for you? I’m going to help you do just that, with a comprehensive guide to the best freelance content creation companies.\n\nIf you are a freelancer, you are probably well aware of the importance of content creation in marketing. Content marketing is all about creating and distributing high-quality content that will engage and inform your audience.\n\nYou can also use content marketing to drive visitors to your website, lead them to a product or service, or convince them to become your client.\n\nBut creating content is a time-consuming, difficult, and often frustrating process.\n\nYou have to find the right topic, write it, edit it, and promote it. But in the process, you may end up creating something that’s not quite up to your standards.\n\nYou may also have to go through several revisions before your content is ready to go live.\n\nSo you have to be sure that the content you create is not only good enough, but also valuable enough to your audience.\n\nThe good news is that you don’t have to do all of this yourself. You can outsource all of the writing and content creation to a freelance content writer.\n\nIn this guide, I’ll take you through the best freelance content companies that you can hire to create high-quality content for your business.\n\nWhether you’re looking for a professional content writer to create a content plan, or an in-house content producer to write blog posts, you', '2022-04-06', '08:58:32', '2022-04-06 05:58:32'),
(331, 'eOSkkN9MFrkeAgOLLxEIZA==', 1, 'In a recent press release, the company, through its spokesperson, has said that it will no longer be “directly involved” with the film, but that it is still “supportive” of it.\n\nAccording to the press release, “[W]e are supportive of this film and are happy to see it get made,” but that, “we will no longer be directly involved in the film’s production.”\n\nAs the film’s production has been ongoing, it has been a very interesting journey. At the beginning of the year, the film was scheduled to be released on the 27th of July 2018, but due to issues with the film’s release date, the release was delayed to the 9th of September 2018.\n\nSince then, the film’s release date has been', '2022-04-06', '19:26:01', '2022-04-06 16:26:01'),
(333, '5BR2A4OKKevUdbGq64bHaA==', 1, 'Working from home is great because you can set your own hours, and work at a time that is convenient for you. This makes it possible to plan your work around your daily routine. It also means that you can stay in your pjs on the weekend and get up late when you feel like it, so long as your work gets done.\nIf you are a confident typist, you can make good money as a virtual assistant. A virtual assistant does not actually do the work, but he or she makes sure that everything goes smoothly. A virtual assistant can help a company with customer service, book travel arrangements, research products or services, and book tickets and other travel arrangements. Some virtual assistants also help companies with technology needs.[20]\n\nYou can use Uber EATS to make money fast. Your first day will be your hardest, but after that, you can pick up work whenever you want. Although each ride is an individual order, you can make around $15 per hour, which will net you around $480 per week. You can also choose between full and part time jobs. If you want to up your game further, sign up to be an Uber Driver Partner, which will also help you make money online in your spare time on top of your full-time job.\n\nYou can also use your website, blog, or even your Facebook page to promote yourself as a writer. If you know how to best promote yourself as a writer, then you can write articles, stories, press releases, product descriptions, blog posts, and more that will get noticed. You can also write about how to get into the writing business if you want to become a freelancer.\nIf you have experience with marketing, SEO, or a knack for getting people excited about the products and services you use on a regular basis, think about refining your skills and putting them to work making money online as a small business marketing consultant in your region—especially if you can become a local SEO expert and can help local clients rank higher in their search results.\n\nIf you have a knack for organization, you can make money online as a virtual assistant helping people to keep their days in order. A virtual assistant will do everything from bookkeeping to research, database entry, booking travel, and managing email. It can also be an awesome way to rub shoulders with some very important people, build up your professional network, and of course grow another stream of income. You can find great gigs on UpWork, Fiverr, Indeed, and Remote.co.\n\nIf you are a confident typist, you can make good money as a virtual assistant. Your first day will be your hardest, but after that, you can pick up work whenever you want. Although each ride is an individual order, you can make around $15 per hour, which will net you around $480 per week. You can also choose between full and part time jobs. If you want to up your game further, sign up to be an Uber Driver Partner, which will also help you make money online in your spare time on top of your full-time job.\n\nIf you have a knack for organization, you can make money online as a virtual assistant helping people to keep their days in order. A virtual assistant will do everything from bookkeeping to research, database entry, booking travel, and managing email. It can also be an awesome way to rub shoulders with some very important people, build up your professional network, and of course grow another stream of income. You can find great gigs on UpWork, Fiverr, Indeed, and Remote.co.\n\nIf you are a confident typist, you can make good money as a virtual assistant helping people to keep their days in order. Your first day will be your hardest, but after that, you can pick up work whenever you want. Although each ride is an individual order, you can make around $15 per hour, which will net you around $480 per week. You can also choose between full and part time jobs. If you want to up your game further, sign up to be an Uber Driver Partner, which will also help you make money online in your spare time on top of your full-time job.', '2022-04-07', '19:49:52', '2022-04-07 16:49:52'),
(335, '0+RPZDQdeQAkYYZOoReJsQ==', 161, 'Gun control has been a controversial issue for years, and gun control advocates have been trying to get laws passed in the United States for decades. The National Rifle Association (NRA) has been one of the most powerful organizations in the country for decades, and it has been able to block gun control laws for decades.\n\nGun control advocates have been trying to pass', '2022-04-07', '21:09:21', '2022-04-07 18:09:21'),
(337, 'p37dTA66addKxXuZOuogdQ==', 161, 'He had just started watching a movie when  a phone call from his parents interrupted and they were on their way to come visit. A month had passed, and it was time to visit his parents again, but he didn\'t want to have to spend the whole week visiting with them, and wanted to make a quick trip away instead. \"I told them I won\'t spend the whole week visiting, but they won\'t listen. Can you help me?\" he asked. \"I promised them I would and I told them when they came the next time, I would come with them. They won\'t ask questions, it\'s just for a short weekend away.\"\n\nHis parents weren\'t on good terms with each other at the moment, and it was taking all his willpower not to bring up the idea of moving out. His other friends weren\'t talking much either as they were getting ready for their week-long break.\n\n\"I really need you to come with me and tell them I\'m staying at the cottage,\" he told them.\n\nHis mother immediately became suspicious. \"Why would you want to go to a cottage when you don\'t have friends to stay with?\n\n\"Not true mom, I\'m sure you know how to find some friends. As I said before, I promised them I will go. You can even help us get a hotel room. We can\'t  seem to get a hotel room without you getting in the middle of everything.\"\n\n\"Oh, so now you need my help. I could have helped you the last time you needed a hotel room.\"\n\n\"I don\'t understand why you\'re not helping us, mom. You won\'t have to do anything. I have already gotten my things packed. I got the car keys from dad, I made the reservation, everything is taken care of. So if you want to help me, I really don\'t understand why you didn\'t answer me. What\'s wrong with helping me with a small trip? It\'s the last thing I want right now, so I\'m begging you. Don\'t be mad at me\"\n\n\"How will I not be mad at you if I\'m not helping you? You\'re mad at me for not doing something. I didn\'t promise them anything and we\'ll just go away for a weekend without telling anyone. How do you expect me to help you if you won\'t tell me what you need me to do? You make this sound like I\'m doing something illegal. You have made a lot of promises without letting me know anything about it. I don\'t understand what I\'m supposed to do with a simple weekend trip. I don\'t even travel, except the few times I go to get my nails', '2022-04-11', '15:23:17', '2022-04-11 12:23:17'),
(338, '5AsvguBXhgunBPvKAY9IaA==', 161, 'John Gotti was an Anerican mob boss who  spent 17 years behind bars on a series of murders, loan sharking, money laundering and other charges. He never testified.\n\nHe was the son of Gambino family boss John Gotti Sr, but as \'Junior\', he was a rival of his boss and nephew Carlo Gambino. The Gotti Jr was killed in 2003, aged 48, leaving six children, and the Gotti name is still widely feared throughout the American underworld.\n\nJohn Gotti Sr died from heart disease at Brooklyn Hospital in 2002 at the age of 69, the year his son was jailed. At his funeral, it was said that he was the last of the \'Godfathers\' - a term for gangsters from his Sicilian background in particular.\n\nHere is a look at the facts and the myths.\n\nI. Gotti\'s early life\n\nBorn in January 1942 in a mob family in Bayville, New York, John Gotti grew up in Howard Beach - then considered the border between Brooklyn and Queens.\n\nBy the time he was 12, Gotti\'s family was involved in a shooting at the family pizzeria on Gravesend Avenue. The bullet was deflected into the wall, and although nobody was hurt, Gotti was terrified and swore he would leave the mob.\n\nAs a young adult, Gotti', '2022-04-11', '17:41:40', '2022-04-11 14:41:40'),
(339, 'nJNBG7Tf9d06JBaitbDGzQ==', 161, 'ParrotAI is text generator that uses natural language processing to create realistic text. ParrotAI  has two modes:\n\n1.ParrotAI is a dialogue generation algorithm that can generate any sentences from an provided text template. The generated sentences are similar to a dialogue between a man and a woman (a girl and a guy). You need to pass certain criteria (precribed in the template) and when these criteria satisfied, AI will propose a suitable output. For example, you pass a template containing the keywords “Hi, I’m looking for a girl who can stay alone for 2-3 weeks. I will pay her €600. She should be reliable.” ParrotAI will propose the sentence: “Hi. I’m looking for a girl who can stay alone for 2-3weeks.I will pay her €600.She should be reliable.”\n\n2.ParrotAI is a text generator that can generate any sentences. The generated sentences are similar to a dialogue between two human beings. You need to create a text template. A text template contains the keywords that will be used by AI to generate a text. ParrotAI will propose a suitable output. For example, you create a text template with the keywords “Hi, I’m looking for a girl. I will pay her €600. She should be reliable”. When a template meets', '2022-04-11', '17:47:20', '2022-04-11 14:47:20'),
(340, '0yYjquTmq17x4sFqFVDe/w==', 161, 'ParrotAI is text generator that uses natural language processing to create realistic text. ParrotAI  is capable of generating text for a variety of topics, including politics, history, technology, science, and science fiction. ParrotAI has been used in the creation of books, papers, scientific articles, blog posts, presentations, marketing material, online games, and other applications. It is very powerful and flexible, easy to use, and can be used for a wide range of purposes. \n\nParrotAI can:\n\n1. Generate content at any stage of the content creation process, e.g., headline, sub-headlines, description, abstract, conclusion, introduction, and references.', '2022-04-11', '17:50:30', '2022-04-11 14:50:30'),
(341, 'rsAJ6i7nwQgkRJJsnnmiiA==', 161, 'ParrotAI is text generator that uses natural language processing to create realistic text. ParrotAI  is capable of generating text for a variety of topics, including politics, history, technology, science, and science fiction. ParrotAI has been used in the creation of books, papers, scientific articles, blog posts, presentations, marketing material, online games, and other applications. It is very powerful and flexible, easy to use, and can be used for a wide range of purposes. \n\nParrotAI can:\n\n1. Generate content at any stage of the content creation process, e.g., headline, sub-headlines, description, abstract, conclusion, introduction, and references. \n\n2. Create content without content experts. It can automatically generate content for any topic. \n\n3. Help writers with creating material for their research. Researchers can use ParrotAI to generate content and save a tremendous amount of time and energy. \n\n4. Help teachers create lesson plans with content for their teaching. Teachers can use ParrotAI to generate content and save hours of work for the creation of lesson plans\n\n5. Help translators create the correct translations of the text. \n\n6. Help lawyers create arguments and memoranda to support legal claims. \n\n7. Create e-reader titles that can be uploaded to the e-reader platform of the choice of the user.\n\n8. Provide content for e-books and books to educate and entertain readers. \n\n9. Assist artists, musicians, and other performers. \n\n10. Assist authors and journalists and help them in generating original content and creating content that would be highly appreciated. \n\n11. Assist students and professors in generating content for their assignments.\n\n12. Assist marketers to create content for their materials. \n\n13. Assist scientists to create content for their research papers. \n\n14. Assist lawyers to create legal briefs.\n\n15. Create content for books, e-books', '2022-04-11', '17:51:45', '2022-04-11 14:51:45'),
(342, '44W1xwdJ13AsOGl2CK5igQ==', 161, 'Are you a writer? Have you been struggling to come up with content that packs a punch? Have you been struggling with writer\'s block? \n\nParrotAI is your answer. \n\nParrotAI is a text generator that uses natural language processing to create realistic text. ParrotAI  is capable of generating text for a variety of topics, including politics, history, technology, and science.  \n\nThe ParrotAI Bot is FREE, and requires zero prior knowledge in Artificial Intelligence, Natural Language Processing, or Machine Learning. ParrotAI\'s core is a text generation engine that takes input data and outputs creative text. The output can be either text, video, GIF, PDF, Word Doc, or a single image. We provide you the engine and the data input and let you do the writing. ParrotAI can even handle data that isn\'t available for free.\n\n\nUse ParrotAI\'s Free Plan for 60,000 word per month or try out ParrotAI Pro for unlimited words a month without the commitment. \n\nIt\'s easy to use and allows you to generate creative and high-quality text. No coding skills required. Click on the link below to try out ParrotAI!\n\nhttps://parrotai.ai/\n\n--------------------------------------------------------------------------\n\n## ParrotAI is available in the app store\n\n**Appstore URL**: https://goo.gl/fQSbKq\n\n**Appstore Google Play**: https://goo.gl/W0qbFZ\n\n--------------------------------------------------------------------------\n\n## ParrotAI is NOT a bot, just a tool\n\nParrotAI is NOT a bot, it is a tool', '2022-04-11', '17:58:30', '2022-04-11 14:58:30'),
(343, '5yjYnLvUoAcsOhKUDNamlA==', 161, 'Are you a writer? Have you been struggling to come up with content that packs a punch? Have you been struggling with writer\'s block? \n\nParrotAI is your answer. \n\nParrotAI is a text generator that uses natural language processing to create realistic text. ParrotAI  is capable of generating text for  a variety of different purposes, including blog posts, social media posts and articles. \n\n**Features:** \n- **Generate Text:** Generate real text from scratch, use simple to complex natural language processing techniques depending on what you require. \n- **Generate blog articles:** Create a variety of blog posts ranging from blogs about your company to tech or gaming blogs. \n- **Generate press releases:** Create press releases ranging from news about your most recent accomplishment to reviews of your newest software. \n- **Generate articles:** Learn how to leverage ParrotAI\'s powerful text generation for your daily writing needs. \n\n#  Get the app to start!', '2022-04-11', '18:00:44', '2022-04-11 15:00:44'),
(344, 'x71SvJFGijmGJf6M7d+a2Q==', 161, 'Are you a writer? Have you been struggling to come up with content that packs a punch? Have you been struggling with writer\'s block? \n\nParrotAI is your answer. \n\nParrotAI is a text generator that uses natural language processing to create realistic text. ParrotAI  is capable of generating text for  a variety of different purposes, including blog posts, social media posts and articles. \n\n**Features:** \n- **Generate Text:** Generate real text from scratch, use simple to complex natural language processing techniques depending on what you require. \n- **Generate blog articles:** Create a variety of blog posts ranging from blogs about your company to tech or gaming blogs.  \n- **Generate Facebook posts:** Your Facebook fans are dying to hear what\'s happening. Why not make a good use of their time by posting updates on your company, news and interesting posts. \n- **Generate social media tweets:** Make your fans get a first hand experience of your company, get to know about your products and the services you provide. \n- **Generate Instagram posts:** Make your users post pictures and video from your company social media handles. \n- **Generate videos:** Get people from your company to create videos that express their views on their favorite things about your company. \n\n**Benefits:** \n- **Text quality:** ParrotAI text generator can generate text with a high naturalness score. \n- **Usability:** ParrotAI text generator\'s user interface makes it easy for users to use from a beginners to a advanced level. \n- **Availability:** ParrotAI is available as a web application and is also available as a command line application. ', '2022-04-11', '18:03:07', '2022-04-11 15:03:07'),
(345, '96duEApu+SoYYaO9I4l91A==', 0, 'Hello null', '2022-04-11', '20:11:40', '2022-04-11 17:11:40'),
(347, '3qvodGwOuEgRCvgl9iUleA==', 0, 'Hello nulljhbj', '2022-04-11', '20:18:40', '2022-04-11 17:18:40'),
(348, 'FGlA/JKLW58qpzv+kTX5vw==', 0, 'Working from home is great because null', '2022-04-11', '20:19:47', '2022-04-11 17:19:47'),
(349, '/oU2u0k39feNZ/7O7YVqDw==', 0, 'Working from home is great because nul', '2022-04-11', '20:19:54', '2022-04-11 17:19:54'),
(350, 'fHkSRXLlZACPKoFEZk4eVA==', 0, 'Gun control has been a controversial issue for years null', '2022-04-11', '20:21:39', '2022-04-11 17:21:39'),
(352, 'e5nJr8ID4dIHQ27dWKTJjg==', 161, 'I used to outsource my writing to homework help tutors and writers but I immediately stopped when a friend introduced me to ParrotAI. I immediately realized that I could save a lot of my money and write better essays and articles compared to them.', '2022-04-18', '23:02:59', '2022-04-18 20:02:59'),
(353, 'haR2JwwSAWzq5gZ0v8qipQ==', 161, 'Are you a writer? Are you struggling with beating plagiarism checkers? Generate original non-plagiarized content with ParrotAI. ParrotAI  is an AI based system that creates 100% unique articles from scratch. It can write an entire website from scratch. Unlike other copy machines that require lots of effort and time, ParrotAI is the easiest way to write unique content on the internet. \n\nHow does it work?\n\nFirst, we need to convert your existing or new content into a form that is amenable to the AI system. So, we simply need to get the content into a format that ParrotAI is capable of parsing. So, what you need is a WordPress blog, or any other blogging/Content Management System (CMS).\n\nAfter you are satisfied with the content you have chosen, the next step is to share the content with ParrotAI. Once you are done, within a couple of hours, you will have a fresh, 100% unique article that you can share with whomever you like.\n\nI tried multiple free plagiarism checkers and none of them could detect plagiarism of the article. I have written my previous article before and wanted to copy and paste it over at blogspot again. After doing that, I got a message that it has been plagiarized.\n\nHow to make sure your content does not get detected as copied and instead goes undetected by the plagiarism checkers and ParrotAI?\n\nUse our unique and powerful article generation software. It analyzes the content and makes sure that the output is completely unique and 100% original. Use our unique and powerful software that creates 100% unique articles from scratch.\n\nOur article generation software works in', '2022-04-26', '19:50:28', '2022-04-26 16:50:28'),
(354, 'P6WIpgy3dOmd0h9K2ZLMeA==', 161, 'Are you a writer? Are you struggling with beating plagiarism checkers? Generate original non-plagiarized content with ParrotAI. ParrotAI  is an AI based system that creates 100% unique articles from scratch. It can write an entire website from scratch. Unlike other copy machines that require lots of effort and time, ParrotAI is the easiest way to write unique content on the internet.  It is also works well as a paraphrasing tool that enables you to create new content using existing content. You only need to update the words but not the sentence structure. It is a very simple tool that can be used by students and content creators alike.ParrotAI is good at generating articles, press releases and social media descriptions.\n\nHow it works?\n\nParrotAI is a professional content tool, it is not just a paraphrasing tool that will just gather words and sentences from other sources and spit articles back to you. ParrotAI creates unique articles based on the core ideas that are presented in the articles that is being spun. To use our tool, you do not need to create any content to use ParrotAI, as it will read the articles that you might have created and spin them back with the unique rewriting in such a manner or style that it will be almost identical to the original article. Our spinners are the best, and for high quality spins with no plagiarism, they certainly deserve 5 out of 5 stars - guaranteed.\n\nWhat are the advantages of using ParrotAI?\n\nParrotAI is an automated article spinner that is 100% unique, and at the same time we assure the uniqueness of those articles you receive from ParrotAI. ParrotAI uses our own unique algorithm', '2022-04-26', '19:51:53', '2022-04-26 16:51:53'),
(355, 'qD1vv9iba22iZkbdGxcC6A==', 161, 'Are you a writer? Are you struggling with beating plagiarism checkers? Generate original non-plagiarized content with ParrotAI. ParrotAI  is an AI based system that creates 100% unique articles from scratch. It can write an entire website from scratch. Unlike other copy machines that require lots of effort and time, ParrotAI is the easiest way to write unique content on the internet.  Here are some of its features,\n\nParrotAI is a state of the art platform that will help you beat plagiarism checkers. The unique aspect of this system is that, it learns a new piece of content at a time. This way your articles and content does not contain any plagiarism or similar writing from earlier content. All the content written after a certain time-slot is said to be learned. The learning process is completely unique and takes only a fraction of a second. Thus, ParrotAI is one of the most effective ways to create content without any hindrances.\n\nParrotAI is a best plagiarism checking tool that can help you turn those unreadable papers into readable and original content. We ensure that the words, sentences, and paragraphs are fully unique and 100% original. This software also guarantees that all websites and blog posts will never be duplicated as well, as ParrotAI does a thorough analysis and comparison between the source content and the target content automatically.\nAlso, it generates 100% original content without modifying the layout of the source content. What more do you want? ParrotAI is one of the best plagiarism checking tools used by millions of people around the world.', '2022-04-26', '19:56:33', '2022-04-26 16:56:33'),
(356, '7PePg4KKdEH5bnoxGJjXBw==', 161, 'The real genius of ParrotAI, the revolutionary AI writer, isn\'t its advanced algorithm or myriad use cases. Or that it can generate articles in seconds costs or even that it costs way less than other alternatives for similar applications. The real genius of ParrotAI is that you don\'t have to be a genius to use it. It is ridiculously easy and straightforward that anyone can use it. That\'s why you should get started now.', '2022-05-17', '21:56:16', '2022-05-17 18:56:16'),
(357, 'jcoAqHPC4IC9IPtWWmHsxA==', 161, 'Teams\nOne-time offers e.g sign up TODAY and get Parakeet features\n', '2022-05-31', '22:01:34', '2022-05-31 19:01:34'),
(363, 'KqYAxWHiuSaMyb0bTiUNXQ==', 161, 'There are three kinds of writers in the world.\nType A: They get upset at their content not packing the punch and let that ruin their lives. They are amateur writers.\nType B: These writers ignore their mediocre content and continue with their lives. They have reached a zen mediocre content tolerance status, but that eventually comes to bite them - you know where.\nType C: These writers never cease to improve their superb skills and attempt to bring joy to humanity through writing. They don\'t know what writer\'s block is. Max Bissolati is a perfect example. Be  more like Max. Max uses ParrotAI.', '2022-07-19', '09:32:31', '2022-07-19 06:32:31'),
(364, '4kNtpcgGfyRko782DvKELA==', 161, 'Don\'t keep us all to yourself\nThere are over 5000 companies hiring on Otta right now. Tell your friends!\n\n\nShare Otta', '2022-07-22', '10:39:48', '2022-07-22 07:39:48'),
(366, '3pT9Smg4oIRPV4kvf2qKFA==', 162, 'Gun control has been a controversial issue for years  stances on the topic over the years. In the mid-1960s, we saw the American National Rifle Association (NRA) take on gun control and give us the the Gun Control Act of 1968. The NRA has since taken an active role in advocating the expansion and strengthening of gun laws in our country once again. It’s unquestionable that the stances they’re taking matter, but no one single organization is going to get the outcome that’s considered best. Even violence in our country in the past have been over Monopoly, sex, and screwdrivers that “happen by mistake”, not guns. We will see how this plays out wherein the story plays out of favor of the NRA in the courts.\n\nThe NRA argue that no law has ever proven successful in its attempts to reduce gun violence and they go ahead and claim that gun violence varies greatly from one area of the United States to another, which has been proved wrong over and over again. Their logic right now seems to be that gun legislation just won’t reduce the occurrences of gun violence, even though regulation is put in place to reduce their occurrences. They argue that lax laws lead to greater dangers. This could very well be true, but that has nothing to do with the  right to keep and bear arms, and that is what I’m arguing in favor of.\n\nLaw experts argue that guns become more dangerous and easier to get when you choose to omit certain limiting information. One law professor has suggested that the Second Amendment of the US Constitution must be revised to include a clause that regulates gun ownership the same way it regulates ownership of a vehicle in a car accident, where it is required that everyone involved shoulder the equal responsibility of getting in their vehicle. If the owner of the vehicle damages the property of another, or the owner is intoxicated, or the owner of the vehicle is not licensed to own a vehicle, it is clearly the failure of the owner to accurately separate the safety of their own vehicle from that of all others that caused the accident to take place. Conversely, if they are injured in the auto accident, or if someone in the vehicle is injured, road accidents such as these cause life-altering and seemingly immutable injuries that often cut short lives.\n\nThis information is much the same information that NRA foists and lays claim to as being responsible for the bad laws that prohibit the ownership of firearms. Gun control has been an ongoing discussion in our country as the number-one public health problem. Put a gun in the hands of an individual who may suffer from any mental ailment and that is a gun', '2022-09-19', '14:41:20', '2022-09-19 11:41:21'),
(368, 'AV798uOt3A+3s52hPqkRNw==', 161, 'He had just started watching a movie when  he heard a series of loud thuds. The sound came from the bed. He looked up to see a large man in a blue hoodie standing over him.\n\n\"I\'m sorry,\" the man said, \"I didn\'t mean to scare you.\"\n\n\"Who are you?\"\n\n\"I\'m the one who broke in.\"\n\n\"Break in?\"\n\nThe man nodded. \"I broke into your house.\"\n\n\"Why?\"\n\n\"I wanted to talk to you.\"\n\n\"About what?\"\n\n\"I want to know what\'s going on.\"\n\n\"What?\"\n\n\"I want to know what\'s happening in this world.\"\n\n\"What do you mean?\"\n\n\"I want to know what the future holds.\"\n\n\"You\'re scaring me.\"\n\n\"I\'m not.\"\n\n\"I\'m not scared of you. But I\'m not sure what you mean.\"\n\n\"I mean the things you\'re doing. I want to know what\'s happening.\"\n\n\"I\'m not doing anything.\"\n\n\"You\'re making a lot of noise.\"\n\n\"I\'m not.\"\n\n\"What\'s that?\"\n\n\"I\'m just watching a movie.\"\n\n\"I know that. But what\'s that noise', '2022-10-09', '14:57:44', '2022-10-09 11:57:44'),
(370, 'z2jErNApADC++0GOL+4e9w==', 161, '<b>Working </b>from home is great because  you can set your own hours and be your own boss. But it can also be lonely. So here are some ideas to help you make the most of your working from home days. First, <br>', '2022-10-10', '10:07:02', '2022-10-10 07:07:02'),
(377, 'dj5Dg6JZz17A1LKgxGXPhA==', 161, '50 Use-cases/Templates<br><br>Jasper AI comes with pre-built templates and use cases so you can get started on your next project quickly. Here are some of the ways Jasper AI can be used:<br><br>&nbsp;&nbsp;&nbsp; Create Blog Posts/Articles<br>&nbsp;&nbsp;&nbsp; Build Landing Pages/Homepages<br>&nbsp;&nbsp;&nbsp; Develop Sales Copy<br>&nbsp;&nbsp;&nbsp; Produce Social Media Content<br>&nbsp;&nbsp;&nbsp; Write Emails for Your Campaigns', '2022-10-10', '12:58:32', '2022-10-10 09:58:32'),
(379, 'oJUw2lZ9xwgk+DN7gsvNOg==', 161, '<b>The mouse that killed</b> the cat is a story that has been told many times over, but the real story is much more complicated.\n\n<b><i><u>For the first time</u></i></b>, a study published in the journal Science has revealed the full extent of the genetic damage caused by a single mutation.\n\nThe study, led by researchers at the Sanger Institute, has revealed that the mutation in question, called “Tyr”, is responsible for a range of different effects, from a mild behavioural problem to a fatal form of cancer.\n\n“This study shows that a single mutation can have a wide range of effects,” says Dr Frank Jackson, a researcher at the Sanger Institute and co-author of the study.\n\n“It’s important to remember that, while the mutation is the same, the effect is different for each individual.”\n\nThe study, which was led by Dr Jackson and Dr David Adams, also reveals for the first time the full extent of the genetic damage caused by the mutation.\n\nThe mutation is responsible for a genetic disorder called “Tyr”, which affects the way the body breaks down proteins.\n\nThe study, which was published in the journal Science, found that the mutation causes a range of different effects, from a mild behavioural problem to a fatal form of cancer.\n\nA single mutation can have', '2022-10-10', '18:26:52', '2022-10-10 15:26:53'),
(385, 'STcKN/qlqtcf6tUxLxL2Rg==', 161, '<font size=\"3\"><b><u>Working from home</u></b></font> is great because  you’re in control of your own schedule, you’re not stuck in an office, and you’re not wasting money on a commute. But it can also be stressful. You’re on your own, there’s no one telling you what to do, and you’re not getting paid to do it.\n\nWhether you’re just starting out or you’re looking to grow your business, working from home can be a great way to earn extra money. It’s a great option for people who want to work flexible hours, have their own schedule, and get paid to do it.\n\nBut it’s not always easy. There are things you need to know before you start working from home.\n\nIn this article, we’ll outline what it takes to start working from home, how to get started, and how to make it a profitable business.\n\n<b>What You Need to Know Before Starting a Home-Based Business</b>\n\nBefore you start a home-based business, it’s important to know what you’re getting into. This will help you plan your time and resources more effectively.\n\nHere are 5 things you need to know before starting a home-based business:\n\n1. You’ll Need  to Know How to Market Your Business\n\nIf you’re just starting a home-based business, you’ll need to know how to market it.\n\nYou’ll need to know how to build a website, how to get your business listed on search engines, and how to use social media to promote your business.\n\nYou’ll also need to know how to get people to visit your website, and how to use email marketing to keep them coming back.\n\n2. You’ll Need to Know How to Handle Customer Service\n\nIf you’re starting a home-based business, you’ll need to know how to handle customer service.\n\nYou’ll need to know how to deal with customer complaints, how to answer questions, and how to resolve issues.\n\nYou’ll also need to know how to deal with unhappy customers, and how to handle negative reviews.\n\n3. You’ll Need to Know How to Get Paid\n\nIf you’re starting a home-based business, you’ll need to know how to get paid.\n\nYou’ll need to know how to set up a payment system, and how to get paid.\n\nYou’ll also need to know how to set  up invoices, how to set up recurring payments, and how to get paid.\n\n4. You’ll Need to Know How to Set Up Your Business\n\nIf you’re starting a home-based business, you’ll need to know how to set up your business.\n\nYou’ll need to know how to set up a business bank account, how to set up a business credit card, and how to set up a business insurance policy.\n\nYou’ll also need to know how to set up a business EIN, and how to set up your business licenses.\n\n5. You’ll Need To Know How to Manage Your Time\n\nIf you’re starting a home-based business, you’ll need to know how to manage your time.\n\nYou’ll need to know how to organize your time, how to block out time for tasks, and how to plan your day.\n\nWorking from Home: How to Start a Home-Based Business\n\nNow that you know what you’ll need to know before starting a home-based business, it’s time to learn how to start a home-based business.\n\nHere are the steps you’ll need to take to start a home- based business:\n\n1. Decide What You’re Going to Do\n\nBefore you start a home-based business, you’ll need to know what you’re going to do.\n\nYou’ll need to decide if you’re going to work from home full-time, part-time, or as a freelancer.\n\nYou’ll also need to decide if you’re going to work for yourself, or if you’re going to work for a company.\n\n2. Decide What You’re Going to Sell\n\nWhen you’re starting a home-based business, you’ll need to decide what you’re going to sell.\n\nYou’ll need to decide if you’re going to sell physical products, or if you’re going to sell digital products.\n\nYou’ll also need to decide if you’re going to sell services, or if you’re going to sell products.\n\n3. Decide Where You’re Going to Sell\n\nWhen you’re starting a home-based business, you’ll need to decide where you’re going to sell.\n\nYou’ll need to decide if  you’re going to sell your products online, or if you’re going to sell your products in a brick-and-mortar store.\n\nYou’ll also need to decide if you’re going to sell your products in a physical store, or if you’re going to sell your products in a virtual store.\n\n4. Decide How You’re Going to Sell\n\nWhen you’re starting a home-based business, you’ll need to decide how you’re going to sell.\n\nYou’ll need to decide if you’re going to sell your products online, or if you’re going to sell your products in a brick-and-mortar store.\n\nYou’ll also need to decide if you’re going to sell your products in a physical store, or if you’re going to sell your products in a virtual store.\n\n5. Decide How Much You’re Going to Charge\n\nWhen you’re starting a home-based business, you’ll need to decide how much you’re going to charge.\n\nYou’ll need to decide what your minimum price is, and what your maximum price is.\n', '2022-10-11', '08:34:39', '2022-10-11 05:34:40'),
(389, 'rOBU3ft7DmrefLY+EPNaxA==', 161, '<div><b>ParrotAI Use-Cases</b></div>ParrotAI allows you to build custom templates and use-cases so you can get started on your next project quickly. Here are some of the ways ParrotAI can be used:<br><ol><li>&nbsp;&nbsp;&nbsp; Create Blog Posts/Articles</li><li>&nbsp;&nbsp;&nbsp; Build Landing Pages/Homepages</li><li>&nbsp;&nbsp;&nbsp; Develop Sales Copy</li><li>&nbsp;&nbsp;&nbsp; Produce Social Media Content</li><li>&nbsp;&nbsp;&nbsp; Write Emails for Your Campaigns</li></ol>', '2022-10-11', '08:43:40', '2022-10-11 05:43:40');
INSERT INTO `saved_templates` (`id`, `unique_id`, `user`, `text`, `date`, `time`, `created_at`) VALUES
(392, 'OScuVboI7O+yZRTS1rEajw==', 161, '<h1 class=\"entry-title text-neutral-900 font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl \">Top 6 Tools to Use for AI Automated Content Creation</h1><h2>\n    https://blog.hyperwriteai.com/ai-automated-content-creation/\n</h2>    \n    \n    <div class=\"w-full border-b border-neutral-100 dark:border-neutral-800\"></div>\n\n    \n            <div class=\"flex flex-col lg:flex-row justify-between lg:items-end space-y-5 lg:space-y-0 lg:space-x-5\">\n            <div class=\"nc-PostMeta2 nc-PostMeta2-2 flex items-center text-neutral-700 text-left dark:text-neutral-200 text-sm leading-none flex-shrink-0\" data-nc-id=\"PostMeta2\">\n                <a class=\"flex items-center space-x-2\" href=\"https://blog.hyperwriteai.com/author/juliamccoy/\">\n                    <div class=\"wil-avatar relative flex-shrink-0 inline-flex items-center justify-center overflow-hidden text-neutral-100 uppercase font-semibold  rounded-full shadow-inner h-10 w-10 sm:h-11 sm:w-11 text-xl ring-1 ring-white dark:ring-neutral-900\">\n                        <img class=\"absolute inset-0 w-full h-full object-cover\" src=\"https://secure.gravatar.com/avatar/3b99edcc1f346c67f7382daa5e47604e?s=96&amp;d=mm&amp;r=g\" alt=\"Julia McCoy\">\n                    </div>\n                </a>\n                <div class=\"ml-3\">\n                    <div class=\"flex items-center\">\n                        <a class=\"block font-semibold\" href=\"https://blog.hyperwriteai.com/author/juliamccoy/\">\n                            Julia McCoy                        </a>\n                    </div>\n                    <div class=\"text-xs mt-[6px]\">\n                        <span class=\"text-neutral-700 dark:text-neutral-300\">\n                            September 7, 2021                        </span>\n\n                                                    <span class=\"mx-2 font-semibold\">·</span>\n                            <span class=\"text-neutral-700 dark:text-neutral-300\">\n                                <span class=\"span-reading-time rt-reading-time\"><span class=\"rt-label rt-prefix\"></span> <span class=\"rt-time\"> 7</span> <span class=\"rt-label rt-postfix\">minutes</span></span>                            </span>\n                                            </div>\n                </div>\n            </div>\n\n            \n<div class=\"single-header-meta-area nc-SingleMetaAction2 flex-shrink-0 flex flex-wrap flex-row space-x-2 sm:space-x-2.5 space-y-0.5 sm:space-y-0 items-center \">\n    \n            <div class=\"nc-SingleMetaAction2__views relative sm:min-w-[68px] rounded-full text-neutral-6000 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 flex items-center justify-center mt-0.5 sm:mt-0 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none\" title=\"Views\">\n            <svg width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\">\n                </svg></div></div></div>\n                <div class=\"nc-SingleMetaAction2__views relative sm:min-w-[68px] rounded-full text-neutral-6000 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 flex items-center justify-center mt-0.5 sm:mt-0 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none\" title=\"Views\"><svg width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\">\n            </svg>\n            <span class=\"nc-SingleMetaAction2__views__number ml-1 text-neutral-900 dark:text-neutral-200\">\n                340            </span>\n        </div>\n    \n    \n    \n    \n            <div class=\"sm:px-1\">\n            <div class=\"border-l border-neutral-200 dark:border-neutral-700 h-6\"></div>\n        </div>\n    \n    \n            <div class=\"ncmaz-button-like-post relative text-xs sm:text-sm\">\n            </div>\n                    <div class=\"flex\" data-is-react-component=\"PostCardDropdownShare\" data-component-props=\"{&quot;panelMenusClass&quot;:&quot;w-52 right-0 top-0 origin-bottom-right&quot;,&quot;href&quot;:&quot;https:\\/\\/blog.hyperwriteai.com\\/ai-automated-content-creation\\/&quot;,&quot;image&quot;:&quot;https:\\/\\/blog.hyperwriteai.com\\/wp-content\\/uploads\\/2021\\/09\\/ai-automated-content-creation-WP-featured-header.jpg&quot;}\"><div class=\"relative inline-block text-left\"></div></div><header class=\"entry-header container entry-header--style-1\"><div class=\"max-w-screen-md mx-auto\"><div class=\"nc-SingleHeader space-y-5\"><div class=\"flex flex-col lg:flex-row justify-between lg:items-end space-y-5 lg:space-y-0 lg:space-x-5\"><div class=\"single-header-meta-area nc-SingleMetaAction2 flex-shrink-0 flex flex-wrap flex-row space-x-2 sm:space-x-2.5 space-y-0.5 sm:space-y-0 items-center \">\n                \n</div>        </div>\n\n\n    </div>        		<div class=\"post-thumbnail mt-10\">\n			<img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/ai-automated-content-creation-WP-featured-header.jpg\" class=\"w-full m-0 rounded-xl wp-post-image\" alt=\"ai automated content creation\" width=\"1500\" height=\"841\">		</div>\n    </div>\n</header>			\n\n	\n						\n<p>The average person has&nbsp;<a href=\"https://www.news18.com/news/buzz/humans-have-around-6200-thoughts-in-a-single-day-shows-new-study-2723281.html\" target=\"_blank\" rel=\"noreferrer noopener\">6,200 thoughts a day</a>, which is just over four thoughts every minute.</p>\n\n\n\n<p>On the other hand, a supercomputer can process&nbsp;<a href=\"https://www.bbc.com/news/technology-44439515\" target=\"_blank\" rel=\"noreferrer noopener\">200,000 trillion calculations</a>&nbsp;in a single second.</p>\n\n\n\n<p>That’s a LOT of brainpower!</p>\n\n\n\n<p>We can’t compete with a computer’s speed and knowledge. BUT people have superpowers too.</p>\n\n\n\n<p>People have emotions, original thoughts, and an understanding of meaning.</p>\n\n\n\n<p>Together with computers, we can make INCREDIBLE steps in technology, science, math, and of course – content creation.</p>\n\n\n\n<p>When you use AI automated content creation for your website, you gain\n a valuable team member that works alongside you to streamline content \ncreation.</p>\n\n\n\n<p>Are you ready to see how AI can complement your creation process? \nThen, let’s explore how to work alongside AI and some of the best AI \ntools to use in content creation.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/ai-automated-content-creation-inset-1024x1024.jpg\" alt=\"ai automated content creation\" class=\"wp-image-7348\" width=\"1024\" height=\"1024\"></figure>\n\n\n\n<h2>How Humans and Computers Work Together in Content Creation</h2>\n\n\n\n<p>Since computers can handle so much more data than people, are you still necessary to create content?</p>\n\n\n\n<p>Humans and computers are complimentary – with one huge distinguishing factor.</p>\n\n\n\n<p>Computers create and analyze data. Humans add meaning.</p>\n\n\n\n<p>For example, around 1915, artist Kazmir Malevich painted a famous piece called&nbsp;<a href=\"https://medium.com/thinksheet/how-to-read-paintings-black-square-by-kazimir-malevich-34f07fa191b\" target=\"_blank\" rel=\"noreferrer noopener\">“The Black Square.”</a>&nbsp;Just as its name suggests, it’s a painting of a large black square set against a white background.</p>\n\n\n\n<p>Computers analyzed the materials, dimensions, even hidden \ninscriptions behind the paint. But despite computers’ intelligence, they\n still described the painting in terms of compiled data.</p>\n\n\n\n<p>However, people looked at the picture and gave it meaning. The \npainting reflected the change in the world during World War I and how \nsociety was restarting at ground zero.</p>\n\n\n\n<p>Artificial intelligence has its place in the creative process. It analyzes data far better than a human mind.&nbsp;</p>\n\n\n\n<p>But people also have a role in content creation. They are responsible for infusing meaning into the data.</p>\n\n\n\n<p>AI in content creation does far more than analyze data and suggest \ninformation. It also uses Natural Language Processing (NLP) to create \noriginal content and automate human tasks. Together, humans and AI \nautomated content creation can develop faster, more intelligent, and \nmore meaningful online content.</p>\n\n\n\n<h2>Why You Should Use Automated Content Creation Software</h2>\n\n\n\n<p>Artificial intelligence offers&nbsp;<a href=\"https://blog.hyperwriteai.com/ai-generated-writing/\" target=\"_blank\" rel=\"noreferrer noopener\">greater speed</a>, depth of knowledge, and accuracy than people can achieve independently.</p>\n\n\n\n<p>If people could perform as fast as machines, we wouldn’t need cars to\n travel, calculators to do the math, and predictive text to write. \nInstead, we recognize our shortcomings and use technology to enhance our\n abilities.</p>\n\n\n\n<p>Computers also have more knowledge than humans. According to \nProfessor Paul Reber from Northwestern University, a human brain’s \nstorage equals about&nbsp;<a href=\"https://www.scientificamerican.com/article/what-is-the-memory-capacity/\" target=\"_blank\" rel=\"noreferrer noopener\">one million gigabytes</a>. A supercomputer, on the other hand, can store data in billions of gigabytes.</p>\n\n\n\n<p>While automation and computers have their shortcomings in critical \nthinking, they are reliable in calculations and data processing. Because\n of this, computers are used to solve equations, check facts, and \nperform calculated tasks.</p>\n\n\n\n<p>The faster, smarter, and more accurate computers and AI become – the \nmore businesses adopt AI into their structure. Already, the use of&nbsp;<a href=\"https://www.oberlo.com/blog/artificial-intelligence-statistics\" target=\"_blank\" rel=\"noreferrer noopener\">AI has grown by 270%</a>&nbsp;in\n the past four years. Likewise, content creators also use AI tools along\n with human writers for better, faster, and more accurate content.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/Use-of-AI-1024x651.jpg\" alt=\"\" class=\"wp-image-7340\" width=\"1024\" height=\"651\"></figure>\n\n\n\n<h2>How to Automate Website Content with 6 AI Tools</h2>\n\n\n\n<p>Here are six content AI tools to help you set up automated content creation without taking out the human touch.</p>\n\n\n\n<h3>Plan Your Content with the Help of AI</h3>\n\n\n\n<p>These first two tools save you hours of research time by using AI to \ndevelop blog post ideas that rank well and answer relevant user \nquestions.</p>\n\n\n\n<p><strong>Frase – All in One AI SEO Content Planner and Tracker</strong></p>\n\n\n\n<p><a href=\"https://www.frase.io/\" target=\"_blank\" rel=\"noreferrer noopener\">Frase</a>&nbsp;is\n a top-rated AI software for SEO content creation and workflow. It takes\n you through all the stages of research and planning before writing your\n piece.</p>\n\n\n\n<p>The first step turns ideas into keywords. When you enter your topic \ninto Frase, it gives you top searches and questions on that topic. Then,\n you can use those suggestions for post topics or sub-headings within \nyour article.</p>\n\n\n\n<p>Once you chose your topic, seamlessly use the information to generate\n a content brief for your writing agency or content creation team.</p>\n\n\n\n<p>Frase doesn’t just stop at the planning stage. Once you write your \narticle, run it through Frase for an SEO score and specific suggestions \nfor optimizing your content. Then, after you publish the article, it \ncontinues to analyze your data, giving you valuable insights into each \npost’s performance and needed updates to remain relevant.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/Frase-1024x652.jpg\" alt=\"frase\" class=\"wp-image-7341\" width=\"1024\" height=\"652\"></figure>\n\n\n\n<p><strong>Concured – Automated Content Optimization and Brief Building</strong></p>\n\n\n\n<p><a href=\"https://www.concured.com/\" target=\"_blank\" rel=\"noreferrer noopener\">Concured</a>&nbsp;also assists with SEO research, focusing on building a content brief for your writers using data generated by AI.</p>\n\n\n\n<p>You can create entire briefs with just a topic idea. From the topic, \nConcured’s platform generates relevant search terms and ideas. \nConcured’s AI will suggest high-quality links, headlines, and word \ncounts to optimize that topic once you decide which topics to use.</p>\n\n\n\n<p>After you publish your post, you can analyze its performance through \nConcured’s platform. You can also compare your performance with your \ncompetitors to find any areas to improve in your content creation.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/concured-1024x585.jpg\" alt=\"concured\" class=\"wp-image-7342\" width=\"1024\" height=\"585\"></figure>\n\n\n\n<h3>Organize Your Posts Through Content Automation Software</h3>\n\n\n\n<p>The following two tools take out the headache of content \norganization. First, don’t waste your time with spreadsheets and lists \nof past and future posts. Instead, allow AI to organize your content so \nyou can focus where it matters most – the creation process.</p>\n\n\n\n<p><strong>Trello – Team Management Software for Organizing Tasks and Managing Communication</strong></p>\n\n\n\n<p><a href=\"https://trello.com/\" target=\"_blank\" rel=\"noreferrer noopener\">Trello</a>&nbsp;is\n a workspace for teams to come together and collaborate. For example, if\n you are a content manager, you can use Trello’s system to create to-do \nlists, assign projects, and communicate with your creators all in one \nplace.</p>\n\n\n\n<p>You organize your projects as a series of cards. When you open a card, you see all</p>\n\n\n\n<ul><li>The project’s details</li><li>Who is working on it</li><li>When it’s due</li><li>All conversations associated with the project</li><li>And all attachments</li></ul>\n\n\n\n<p>You can save even more time by using their AI system to move lists, \ncreate buttons, highlight the most critical tasks, and automatically \nassign tasks. In addition, Trello seamlessly integrates with other \napplications like Dropbox, Microsoft Teams, Slack, and more.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/Trello-1024x573.jpg\" alt=\"trello\" class=\"wp-image-7343\" width=\"1024\" height=\"573\"></figure>\n\n\n\n<p><strong>MeetEdgar – Automate Social Media Sharing</strong></p>\n\n\n\n<p><a href=\"https://meetedgar.com/\" target=\"_blank\" rel=\"noreferrer noopener\">MeetEdgar</a>&nbsp;takes\n away the hassle of sharing the content you create by automating social \nmedia tasks. Using MeetEdgar’s calendar and automated scheduling system,\n you can choose what you share and when. MeetEdgar does the rest.</p>\n\n\n\n<p>Through the software, you can create a nearly endless library of \ncontent for the system to use. It repurposes and shares old and new \ncontent alike to keep all your social channels active and evergreen.</p>\n\n\n\n<p>Even if you don’t know what to post on social media, MeetEdgar has \nyour back. It finds quotes, text, and pictures to share, so you don’t \nhave to. Then, go back and track how your posts performed on your social\n sites and test different options to create the most engaging content, \nall from MeetEdgar’s easy-to-use platform.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/MeetEdgar-1024x640.jpg\" alt=\"meetedgar\" class=\"wp-image-7344\" width=\"1024\" height=\"640\"></figure>\n\n\n\n<h3>Write Your Content with AI Content Creation Tools</h3>\n\n\n\n<p>These last two tools are the most critical part of the creation process – creating the content itself. AI can&nbsp;<a href=\"https://blog.hyperwriteai.com/ai-assisted-writing/\" target=\"_blank\" rel=\"noreferrer noopener\">help you write</a>&nbsp;engaging content in half the time using NLP.</p>\n\n\n\n<p><strong>Grammarly – Automated Grammar and Flow Editing Tool</strong></p>\n\n\n\n<p><a href=\"http://www.grammarly.com/\" target=\"_blank\" rel=\"noreferrer noopener\">Grammarly</a>&nbsp;uses\n AI to scan text and give editing suggestions. It’s a free content \nautomation tool with the option of paying for premium access for even \nmore tips.</p>\n\n\n\n<p>We are all human and tend to make errors. For example, even those who\n have been writing for years forget commas or capitalize the wrong word.\n Grammarly is an AI editor acting as your second pair of eyes.</p>\n\n\n\n<p>In addition to basic grammar checks, it also looks for flow, active \nvoice, rambling sentences, and more to make your writing easy to read \nand understand.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/Grammarly-1024x672.jpg\" alt=\"grammarly\" class=\"wp-image-7345\" width=\"1024\" height=\"672\"></figure>\n\n\n\n<p><strong>HyperWrite –AI Writing Tool to Fill in the Blank Page of Your First Draft</strong></p>\n\n\n\n<p>Our tool&nbsp;<a href=\"https://hyperwriteai.com/\" target=\"_blank\" rel=\"noreferrer noopener\">HyperWrite</a>&nbsp;uses\n AI and NLP to automate content based on your writing style and over a \nmillion other pieces of online content used in training. It pulls from \nits knowledge of technique, information, and writing patterns to create \nhuman-like text.</p>\n\n\n\n<p>After inputting your topic and outline, HyperWrite begins suggesting \ntext through its ThinkAhead feature and text generation. In seconds, you\n can create hundreds of words that form a logical pattern and flow.</p>\n\n\n\n<p>This text forms your first draft. Using HyperWrite’s editing \nfeatures, you can reword sentences, flesh out ideas, or create more \nconcise thoughts. You can also rewrite awkward text sections and \nrearrange the sentences to form more natural text with greater human \nconnection and meaning.</p>\n\n\n\n<p>I wrote this section using HyperWrite. After generating ideas \ncentered around how HyperWrite streamlines the writing process, I was \nable to edit the sentences to form natural-sounding thoughts and \noriginal ideas in a matter of seconds.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/HyperWrite-1024x466.jpg\" alt=\"ai automated content creation tool\" class=\"wp-image-7346\" width=\"1024\" height=\"466\"></figure>\n\n\n\n<h2>Start Adding AI Content Creation Tools to Your Workforce</h2>\n\n\n\n<p>From content planning to content organization and even content creation – AI has your back!</p>\n\n\n\n<p>You don’t need to waste hours on tedious or mundane content-creation \ntasks. Instead, use the speed and intelligence of content automation AI \nto do those tasks for you. Now, you can focus on what you love most – \nwriting.</p>\n\n\n\n<p>Even writing can be easier and faster when using our HyperWrite software.</p>\n\n\n\n<p><em><strong>Are you interested in trying HyperWrite for your next project? Sign up for&nbsp;</strong></em><a href=\"https://hyperwriteai.com/\" target=\"_blank\" rel=\"noreferrer noopener\"><em><strong>a free trial</strong></em></a><em><strong>&nbsp;and add it to your AI automated content creation process today.</strong></em></p>', '2022-10-12', '09:29:53', '2022-10-12 06:29:53'),
(393, 'yilvjsWum4U63pvE/MxiPg==', 161, '<h1 class=\"entry-title text-neutral-900 font-semibold text-3xl md:text-4xl md:!leading-[120%] lg:text-5xl dark:text-neutral-100 max-w-4xl \">Best Free AI Writing Software of 2021</h1><div><br></div><div><h2>https://blog.hyperwriteai.com/free-ai-writing-software/</h2></div><div><br></div><div>\n</div><img class=\"absolute inset-0 w-full h-full object-cover\" src=\"https://secure.gravatar.com/avatar/3b99edcc1f346c67f7382daa5e47604e?s=96&amp;d=mm&amp;r=g\" alt=\"Julia McCoy\">\n                    <div class=\"flex flex-col lg:flex-row justify-between lg:items-end space-y-5 lg:space-y-0 lg:space-x-5\"><div class=\"nc-PostMeta2 nc-PostMeta2-2 flex items-center text-neutral-700 text-left dark:text-neutral-200 text-sm leading-none flex-shrink-0\" data-nc-id=\"PostMeta2\"><a class=\"flex items-center space-x-2\" href=\"https://blog.hyperwriteai.com/author/juliamccoy/\">\n                </a>\n                <div class=\"ml-3\">\n<a class=\"block font-semibold\" href=\"https://blog.hyperwriteai.com/author/juliamccoy/\">\n</a><div class=\"flex items-center\"><a class=\"block font-semibold\" href=\"https://blog.hyperwriteai.com/author/juliamccoy/\">                            Julia McCoy                        </a>\n\n                    </div><div class=\"text-xs mt-[6px]\">\n                        <span class=\"text-neutral-700 dark:text-neutral-300\">\n                            September 27, 2021                        </span>\n\n                                                    <span class=\"mx-2 font-semibold\">·</span>\n                            <span class=\"text-neutral-700 dark:text-neutral-300\">\n                                <span class=\"span-reading-time rt-reading-time\"><span class=\"rt-label rt-prefix\"></span> <span class=\"rt-time\"> 7</span> <span class=\"rt-label rt-postfix\">minutes</span></span>                            </span>\n                                            </div>\n                </div>\n            </div>\n</div><div class=\"nc-SingleMetaAction2__views relative sm:min-w-[68px] rounded-full text-neutral-6000 bg-neutral-50 dark:text-neutral-200 dark:bg-neutral-800 flex items-center justify-center mt-0.5 sm:mt-0 px-2 h-7 sm:h-8 text-xs sm:text-sm focus:outline-none\" title=\"Views\"><span class=\"nc-SingleMetaAction2__views__number ml-1 text-neutral-900 dark:text-neutral-200\">3.3k</span>\n        </div>\n    \n<header class=\"entry-header container entry-header--style-1\"><div class=\"max-w-screen-md mx-auto\"><div class=\"post-thumbnail mt-10\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/free-ai-writing-software-WP-featured-header.jpg\" class=\"w-full m-0 rounded-xl wp-post-image\" alt=\"free ai writing software\" width=\"1500\" height=\"841\">		</div>\n    </div>\n</header>			\n\n	<div id=\"ncmaz-single-entry-content\" class=\"entry-content prose prose-neutral !max-w-screen-md lg:prose-lg mx-auto dark:prose-invert entry-content--not-has-sidebar\">\n						\n<p>The writing process is a labor of love for those who create content, but it can also be incredibly frustrating at times.</p>\n\n\n\n<p>It’s easy to get stuck in your own head, or even worse, to procrastinate.</p>\n\n\n\n<p>Thankfully, there are many ways to streamline this process in the \n2020s—complete with free AI writing software now to choose from! <img draggable=\"false\" role=\"img\" class=\"emoji\" alt=\"🤖\" src=\"https://s.w.org/images/core/emoji/14.0.0/svg/1f916.svg\"></p>\n\n\n\n<p>But with so many options, it’s easy to get overwhelmed or try to rely\n on a bloated stack of technology that you’ll simply never use.</p>\n\n\n\n<p>Don’t waste your time trying to shuffle through all the different \noptions out there. We’ve gone ahead and broken down the essential tools \nyou’ll need to start creating the best AI content possible.</p>\n\n\n\n<p>But first, do you really need AI writing software?</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/free-ai-writing-software-inset-1024x1024.jpg\" alt=\"free ai writing software\" class=\"wp-image-7497\" width=\"1024\" height=\"1024\"></figure>\n\n\n\n<h2>Why You Need AI Writing Software</h2>\n\n\n\n<p>As a professional content creator, you know just how much time and \neffort it takes to produce quality content that really engages your \naudience.</p>\n\n\n\n<p>Whether you’re creating blog posts, articles, or even engaging with \nyour audience through social media, it can be a painstaking process to \ncreate content that not only informs but also speaks to the hearts of \nyour readers.</p>\n\n\n\n<p>The average amount of time spent on creating a single piece of content can take anywhere between <a href=\"https://www.marketingprofs.com/charts/2017/33002/how-long-does-it-take-to-create-a-piece-of-content\" target=\"_blank\" rel=\"noreferrer noopener\">one and six hours</a>, and if you’re trying to turn out content on a weekly basis, that can really add up.</p>\n\n\n\n<figure class=\"wp-block-image size-full\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image1.jpg\" alt=\"average time spent on a single piece of content\n\" class=\"wp-image-7463\" width=\"630\" height=\"408\"></figure>\n\n\n\n<p><em>Source: <a href=\"https://www.marketingprofs.com/charts/2017/33002/how-long-does-it-take-to-create-a-piece-of-content\" target=\"_blank\" rel=\"noreferrer noopener\">MarketingProfs</a></em></p>\n\n\n\n<p>That’s where AI writing software comes in.</p>\n\n\n\n<p><a href=\"https://blog.hyperwriteai.com/ai-automated-content-creation/\" target=\"_blank\" rel=\"noreferrer noopener\">AI writing tools</a> can be used in every step of the content creation process – from content ideation and research to final edits.</p>\n\n\n\n<p>This can help you significantly boost your overall productivity and \nsave you a ton of time and energy. In fact, research shows that with the\n help of AI, businesses can create <a href=\"https://www.semrush.com/blog/artificial-intelligence-stats/\" target=\"_blank\" rel=\"noreferrer noopener\">6.2 billion hours</a> of worker productivity!</p>\n\n\n\n<p>Of course, AI writing tools cannot replace your talents as a creator.</p>\n\n\n\n<p>However, they can be used to:</p>\n\n\n\n<ul><li>Help you bust through writer’s block</li><li>Help you create engaging content</li><li>Help you find the perfect keyword</li><li>Help you find the perfect tone</li><li>Help you create content faster and more efficiently</li><li>Help you create optimized content for specific platforms</li></ul>\n\n\n\n<p>When combined with your creative genius, the <a href=\"https://blog.hyperwriteai.com/what-is-ai-writing/\" target=\"_blank\" rel=\"noreferrer noopener\">benefits of AI writing</a> software are endless.</p>\n\n\n\n<h2>3 Free AI Writing Software for Your Writing Needs</h2>\n\n\n\n<p>There are so many tools available to help you get your content done.</p>\n\n\n\n<p>However, we understand that it’s not always in the budget to pay for \nthe trending tools on the market. But that doesn’t mean you are out of \nluck!</p>\n\n\n\n<p>There are dozens of amazing free AI writing software available to \nhelp you streamline and optimize your content creation process.</p>\n\n\n\n<p>So, without further ado, here are three of our favorite free AI \nwriting software tools that can help you improve your content creation \nprocess.</p>\n\n\n\n<h3>1. Content Ideation/Research – KeywordTool.oi</h3>\n\n\n\n<p>The first tool we want to highlight is an essential tool for any content creator: KeywordTool.io.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image2-1024x310.jpg\" alt=\"keywordtool.io\n\" class=\"wp-image-7464\" width=\"1024\" height=\"310\"></figure>\n\n\n\n<p class=\"has-text-align-center\"><em>Source</em>: <a href=\"https://keywordtool.io/\"><em>KeywordTool.io</em></a></p>\n\n\n\n<p>While it’s not exactly an AI writing software, it is an AI-powered \nSEO research tool that can help you discover the perfect keywords to \ntarget in your content.</p>\n\n\n\n<p>This free AI software is simple and easy to use, and while it doesn’t\n give you all the detailed information that a program such as Semrush \nmight, it does provide you with relevant keyword options worth \nexperimenting with.</p>\n\n\n\n<p>All you have to do is enter your keyword idea into the search box, \nand the software pulls up a list of relevant keyword suggestions, \nquestions, and unique keyword prepositions.</p>\n\n\n\n<figure class=\"wp-block-image size-full\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image3.gif\" alt=\"keywordtool.io in action\n\" class=\"wp-image-7465\" width=\"958\" height=\"882\"></figure>\n\n\n\n<p>So how does this tool work?</p>\n\n\n\n<p>KeywordTool.io utilizes Google Autocomplete to help generate dozens \nof relevant long-tail keywords based on factors such as how often \nthey’re searched for, how many people search for them, and how \ncompetitive they are.</p>\n\n\n\n<p>This can help you create content optimized for specific platforms, \nhelp you find the perfect keyword, and help you create content that your\n audience wants to read.&nbsp;</p>\n\n\n\n<h3>2. AI Writing – HyperWrite</h3>\n\n\n\n<p>Once you’ve found the perfect keyword, it’s time to start writing!</p>\n\n\n\n<p>When it comes to your writing process, there is no one-size-fits-all \nsolution, which is why many AI writing software providers utilize \ncomplicated, bloated systems that are difficult to use.</p>\n\n\n\n<p>However, HyperWrite is different.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image4-1024x501.jpg\" alt=\"hyperwrite - writing superpowers\n\" class=\"wp-image-7466\" width=\"1024\" height=\"501\"></figure>\n\n\n\n<p><a href=\"https://hyperwrite.ai/\" target=\"_blank\" rel=\"noreferrer noopener\">HyperWrite</a> is a simple, easy-to-use AI writing software that allows you to create unique, engaging content with ease.</p>\n\n\n\n<p>This free AI tool is a streamlined approach to content creation, and \nit’s perfect for creating content in short bursts while maintaining the \nhighest quality.</p>\n\n\n\n<p>HyperWrite utilizes a unique AI algorithm that allows you to type and\n write your content in the same application. By giving the program a \nlittle information about your writing style and topics you wish to \ncover, you can generate a great deal of unique content in a matter of \nminutes.</p>\n\n\n\n<figure class=\"wp-block-image\"><img alt=\"\"></figure>\n\n\n\n<p>Thanks to Athena, HyperWrite’s AI generator, you can create a variety\n of content that is sure to be unique and engaging – including blog \nposts, articles, web copy, and even eBooks.</p>\n\n\n\n<h3>3. Editing Software – Grammarly</h3>\n\n\n\n<p>Of course, no AI writing software would be complete without an editor\n to polish your content and make sure it’s error-free and grammatically \ncorrect.</p>\n\n\n\n<p><a href=\"https://grammarly.com/\" target=\"_blank\" rel=\"noreferrer noopener\">Grammarly</a> is a popular choice for many writers due to its unique AI-powered algorithm.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image6-1024x495.jpg\" alt=\"grammarly\n\" class=\"wp-image-7468\" width=\"1024\" height=\"495\"></figure>\n\n\n\n<p>This tool is a robust grammar and spell checker that can help you \nfind errors in your content and even provide suggestions for improving \nyour writing in real-time.</p>\n\n\n\n<figure class=\"wp-block-image size-full\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image7.gif\" alt=\"hyperwrite and grammarly\" class=\"wp-image-7469\" width=\"1920\" height=\"936\"></figure>\n\n\n\n<p>That means this free AI writing software can catch grammar, spelling,\n tone, and punctuation problems as you write and even offer suggestions \nfor how to fix them.</p>\n\n\n\n<p>Of course, if you want to take advantage of the full power of this AI\n writing software, you can upgrade to Grammarly Premium, which offers \nthe same functionality, but adds completely new features such as the \nability to create custom dictionaries and even helps point out overused \nwords and non-inclusive language.</p>\n\n\n\n<h2>How HyperWrite Can Help You Through Your Entire Writing Process</h2>\n\n\n\n<p>HyperWrite is a tool that will help you capture the essence of your \nideas and then help you turn those ideas into high-quality content. It’s\n a unique AI writing software designed to help you create content in a \nmatter of minutes, without the need to move between multiple apps.</p>\n\n\n\n<p>HyperWrite is designed to help you create content on various \nplatforms, and the AI writing software is truly a one-stop shop for your\n writing needs.</p>\n\n\n\n<p>Don’t believe us? Here are a few ways HyperWrite can help you through your entire writing process:</p>\n\n\n\n<h3>Idea Creation</h3>\n\n\n\n<p>Say you have a keyword or keyword phrase in mind, but you aren’t \nquite sure what spin you want to take on it for your next piece of \ncontent – HyperWrite can help!</p>\n\n\n\n<p>When you open a new document, all you need to do is go into the \ndocument settings and enter some basic information to help guide Athena \nin her writing process.</p>\n\n\n\n<p>This can include anything from a few keywords to a general outline of your desired idea.</p>\n\n\n\n<figure class=\"wp-block-image size-full\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image8.jpg\" alt=\"free ai writing tool input\n\" class=\"wp-image-7470\" width=\"784\" height=\"846\"></figure>\n\n\n\n<p>Once you’ve entered your information, Athena will start writing for you!</p>\n\n\n\n<p>While it’s Athena’s nature to start writing in paragraph formatting, \nif you’re looking for a list of ideas, all you have to do is adjust some\n of the outputs to help Athena better understand what type of outputs \nyou desire.</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image9-1024x500.jpg\" alt=\"free ai writing software idea generation\n\" class=\"wp-image-7471\" width=\"1024\" height=\"500\"></figure>\n\n\n\n<h3>Predictive Writing</h3>\n\n\n\n<p>Once you have your ideas ready to go, it’s time to hit the page running.</p>\n\n\n\n<p>HyperWrite relies on <a href=\"https://www.zdnet.com/article/what-is-gpt-3-everything-business-needs-to-know-about-openais-breakthrough-ai-language-program/\" target=\"_blank\" rel=\"noreferrer noopener\">GPT-3 machine learning</a>.\n GPT-3 is a new, natural network AI algorithm designed to create more \nhuman-like content, which means it can create content that reads more \nnaturally.</p>\n\n\n\n<p>Once you get started with HyperWrite, you can begin typing and watch \nas the AI software begins generating predictive text based on the \ninformation you’ve entered into the input form and any information \nyou’ve already entered into the document itself.</p>\n\n\n\n<figure class=\"wp-block-image size-full\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image10.jpg\" alt=\"predictive text generator\n\" class=\"wp-image-7472\" width=\"950\" height=\"868\"></figure>\n\n\n\n<h3>Grammarly Compatible</h3>\n\n\n\n<p>Finally, once you’ve finished writing, we recommend checking your spelling and grammar with Grammarly.</p>\n\n\n\n<p>This free AI writing software is compatible with our software, and it\n can help you find errors in your content as you type. For those using \nGoogle Chrome, you simply need to download the Grammarly Chrome \nextension.</p>\n\n\n\n<p>After you’ve logged into your account, you’ll be able to use \nGrammarly with the HyperWrite platform by simply clicking on the small +\n button located at the end of the document. Once you do, Grammarly’s \nediting menu will appear, and you can start making your edits!</p>\n\n\n\n<figure class=\"wp-block-image size-large\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/freeAIwritingSoftware_Image11-1024x492.jpg\" alt=\"hyperwrite and grammarly in tandem\n\" class=\"wp-image-7473\" width=\"1024\" height=\"492\"></figure>\n\n\n\n<h2>Let HyperWrite Help You Improve Your Writing!</h2>\n\n\n\n<p>Here at HyperWrite, we understand that you don’t need a complicated AI writing software to create high-quality content.</p>\n\n\n\n<p>That’s why we designed HyperWrite to be a simple, easy-to-use AI \nwriting tool that compliments your writing talents. By utilizing the \npower of AI, HyperWrite can help you create unique, engaging content in a\n matter of minutes.</p>\n\n\n\n<p>With the free HyperWrite plan, you get access to unlimited \ndocuments/drafts with 1500 generations per month. However, if you fall \nin love with the software, you can upgrade to the premium software for \nonly $35/month! This gives you unlimited documents and an unlimited \nnumber of generations, and access to the ThinkAhead feature!</p>\n\n\n\n<p><strong><em>Are you ready to take your writing to the next level with the best free AI writing software? Then </em></strong><a href=\"https://hyperwrite.ai/plans\" target=\"_blank\" rel=\"noreferrer noopener\"><strong><em>start your free trial</em></strong></a><strong><em> of HyperWrite today!</em></strong></p>\n\n\n\n<figure class=\"wp-block-image size-full\"><a href=\"https://hyperwrite.ai/plans/\" target=\"_blank\" rel=\"noopener\"><img src=\"https://blog.hyperwriteai.com/wp-content/uploads/2021/09/free-ai-writing-software-CTA.jpg\" alt=\"free ai writing software\" class=\"wp-image-7496\" width=\"955\" height=\"402\"></a></figure>\n<div class=\"clear-both\"></div>		<div class=\"clear-both\"></div>\n	</div>\n	<div class=\"clear-both\"></div>\n\n	\n	\n		<ul class=\"mt-10 flex flex-wrap\"><li><a class=\"nc-Tag inline-block bg-white text-sm text-neutral-600 py-1.5 px-3 rounded-lg border border-neutral-100 md:py-2 md:px-4 dark:bg-neutral-700 dark:text-neutral-300 dark:border-neutral-700 hover:border-neutral-200 dark:hover:border-neutral-500 mr-2 mb-2\" href=\"https://blog.hyperwriteai.com/tag/ai-writing-online-free/\">ai writing online free</a></li><li><a class=\"nc-Tag inline-block bg-white text-sm text-neutral-600 py-1.5 px-3 rounded-lg border border-neutral-100 md:py-2 md:px-4 dark:bg-neutral-700 dark:text-neutral-300 dark:border-neutral-700 hover:border-neutral-200 dark:hover:border-neutral-500 mr-2 mb-2\" href=\"https://blog.hyperwriteai.com/tag/automated-article-writing-software/\">automated article writing software</a></li><li><a class=\"nc-Tag inline-block bg-white text-sm text-neutral-600 py-1.5 px-3 rounded-lg border border-neutral-100 md:py-2 md:px-4 dark:bg-neutral-700 dark:text-neutral-300 dark:border-neutral-700 hover:border-neutral-200 dark:hover:border-neutral-500 mr-2 mb-2\" href=\"https://blog.hyperwriteai.com/tag/free-ai-writing-software/\">free ai writing software</a></li></ul>', '2022-10-12', '09:38:07', '2022-10-12 06:38:07'),
(394, 'RdIdFFBrqXdn9CE6xayQbg==', 161, '<p dir=\"ltr\" style=\"line-height:1.38;background-color:#fcfcfc;margin-top:0pt;margin-bottom:0pt;padding:0pt 0pt 14pt 0pt;\" id=\"docs-internal-guid-b245419f-7fff-41ba-6268-9eddedeaf529\"><span style=\"font-size:13.5pt;font-family:Georgia;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">3. It\'s okay to be playful.</span></p><p dir=\"ltr\" style=\"line-height:1.38;background-color:#fcfcfc;margin-top:0pt;margin-bottom:14pt;\"><span style=\"font-size:13.5pt;font-family:Georgia;color:#333333;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">The D23 Expo is a celebration of all things Disney, which means it\'s okay to have some fun! Attendees can dress up as their favorite characters, sing along with performers, and take part in all sorts of other activities that are designed to be enjoyed by people of all ages. This playfulness is an important part of the Disney brand and helps to create an engaging and memorable experience for attendees so if your brand </span></p>', '2022-10-12', '11:45:21', '2022-10-12 08:45:21'),
(395, 'a4nB0iZwmmG0eU+Ag6/Ulw==', 162, 'In a recent press release, the company, through its spokesperson, has said that it will no longer  be accepting applications for new members. The company has also said that it will be retaining all of the existing members that it has and that they will be able to continue to use the services that they have been using.\n\nThe company has said that it will be reviewing the existing members to ensure that they are in compliance with the terms and conditions of the company.\n\nIt is believed that the company will be making the decision to close the doors of the company in order to focus on the development of the platform.\n\nThe company has said that it will be making the decision to close the doors of the company in order to focus on the development of the platform.\n\nThe company has said that it will be making the decision to close the doors of the company in order to focus on the development of the platform.\n\nThe company is still in the process of developing the platform and it is believed that it will be releasing the platform to the public sometime in the near future.\n\nThe company is still in the process of developing the platform and it is believed that it will be releasing the platform to the public sometime in the near future.\n\nIt is believed that the company has been accepting applications for the past six months.\n\nIt is believed that the company has been accepting applications for the past six months.\n\nIt is', '2022-10-18', '11:02:31', '2022-10-18 08:02:31'),
(397, '3SFoYhzSwaHIg3RearLDFg==', 1, 'If you have a knack for organization, you can make money online as a virtual assistant helping people to keep their days in order. A virtual assistant will do everything from bookkeeping to research, database entry, booking travel, and managing email. It can also be an awesome way to rub shoulders with some very important people, build up your professional network, and of course grow another stream of income. You can find great gigs on UpWork, Fiverr, Indeed, and Remote.co.<br>', '2022-10-24', '12:45:51', '2022-10-24 09:45:51'),
(400, 'HzS3B+Vp+awa9I2BN10JuQ==', 161, 'The real genius of ParrotAI, the revolutionary AI writer, isn\'t its advanced algorithm or myriad use cases. Or that it can generate articles in seconds costs or even that it costs way less than other alternatives for similar applications. The real genius of ParrotAI is that you don\'t have to be a genius to use it. It is ridiculously easy and straightforward that anyone can use it.\n\nIn fact, I\'ve used this tool myself many times when I was looking for an article on a specific topic and didn\'t want to spend hours (or days) searching for one online. In those instances where I needed an idea quickly, I\'d simply fire up ParrotAI and let the algorithm do all the heavy lifting! This is what makes this tool so great: you don\'t need any special skills or knowledge to use it effectively; all you really need is an internet connection!\n\nWhen using this tool, however, there are some things you must remember:\n\n1) You must ensure your search terms are spelled correctly (i.e., proper grammar). If you spell your search terms incorrectly then the article will not show up in results (even if there\'s one out there). Also note that if you try to add too many keywords at once then they will be ignored by the program (but still appear in results). For example: \"Parrot AI\" would only return articles about Parrot AI but not about parrots in general because both words are misspelled! So always make sure your searches are correct before hitting enter!<div><br></div><div>2) When using a keyword like \'parrots\', \'bird\' or anything else with multiple meanings then ensure they\'re written as singular nouns (i.e., parrots instead of par&nbsp;<div><br></div><div>That\'s why you should get started now.</div></div>', '2022-10-25', '21:22:31', '2022-10-25 18:22:31'),
(413, 'BrWZ99/qFDtfw6S/A7Fddg==', 1, 'I WANNA LAY YOU DOWN IN A BED OF ROSES FOR TONIGHT I SLEEP ON A BED OF NAILS<br>', '2022-10-28', '17:51:42', '2022-10-28 14:51:42'),
(414, 'NcNAzhB1qqUNv4brH8tSuA==', 1, '\n\nContent marketing is one of the most common ways to generate more traffic to your website. If you want to increase the number of visitors on your site, then content is the way to do it. When you publish great content that’s valuable and helpful for readers, they will be attracted by it and visit your site more often. This article will show you how content marketing can increase traffic on any website or blog in the long run.\n\nWhat You Need To Know About Content Marketing:\n\nThe first thing that you need to know about content marketing is that it’s not a new concept at all – this has been around for years now, but only recently have we begun seeing a widespread adoption of this strategy among businesses and marketers alike. Whether you are already using this strategy or are just getting started with it, here are some tips for making sure that your efforts pay off:\n\n1) Make sure there’s value in what you write…and make sure there’s value in what others write as well! You don’t want people to come back because they think they should (or because someone paid them), but because they like what they see when visiting your site or checking out an article on another site (or even how much time they spend reading). Don’t just throw up articles', '2022-10-29', '14:36:14', '2022-10-29 11:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(6) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `plan` int(2) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `user` int(5) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `mode` int(1) NOT NULL,
  `payment_ref` varchar(20) NOT NULL,
  `amount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `unique_id`, `plan`, `duration`, `user`, `date`, `time`, `status`, `mode`, `payment_ref`, `amount`) VALUES
(1, '44ZSUYiK1FksPtDLT6Fk', 2, 'monthly', 1, '', '', 2, 0, '', 0),
(2, '54ZSUYiK1FksPtDLT6Fl', 2, 'yearly', 161, '', '', 1, 0, '', 0),
(3, 'JgPAKKG1vitXGVYAe5AU', 2, 'monthly', 1, '2022-04-14', '13:01:23', 2, 2, '', 13),
(4, 'WEFEFEF', 1, 'monthly', 162, '2022-09-17', '14:27:12', 2, 1, 'DSGSVVSF', 12);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `monthly_price` int(6) NOT NULL,
  `yearly_price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `name`, `monthly_price`, `yearly_price`) VALUES
(1, 'Deluxe', 9, 52),
(2, 'Parakeet', 13, 87);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `admin` int(2) DEFAULT 0,
  `super_adm` int(2) DEFAULT 0,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `verified` int(2) NOT NULL,
  `v_token` text DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `token` text DEFAULT NULL,
  `expiry_date` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `device` varchar(20) DEFAULT NULL,
  `platform` varchar(20) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `wp_url` varchar(100) DEFAULT NULL,
  `wp_user` varchar(100) DEFAULT NULL,
  `wp_pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `l_name`, `password`, `tel`, `admin`, `super_adm`, `created_at`, `verified`, `v_token`, `status`, `token`, `expiry_date`, `ip`, `browser`, `device`, `platform`, `country`, `city`, `wp_url`, `wp_user`, `wp_pass`) VALUES
(1, 'kitahkelvin@gmail.com', 'SysAdmin', 'Munene', '$2y$10$x22LcDaMaiQLaXBiBoZti.PK2JwisTmRr.rAkuj9VojbDGYbqR8Di', '0799344324', 1, 1, '0000-00-00 00:00:00.000000', 1, NULL, 0, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(161, 'ansel@gmail.com', 'Ansel', 'Elgort', '$2y$10$3XfZFyy1xkvlvPU6PoxLPuKCqsSkxWliQaUkZKPf2i5ZEcfaiC0O6', NULL, 0, 0, '2022-03-28 13:33:43.554141', 1, NULL, 0, 'fb0064424cfb4d61f4b25a889877636d15036ac4c2c92b3784c692b703e246a5e2afc94537f5abcd637daa4b9e349f4f1a0c', '2022-09-13 08:30:48', NULL, NULL, NULL, '', NULL, NULL, 'https://8414-102-219-210-57.ngrok.io/byteflix', 'admin', 'gitahI*(0'),
(162, 'lazer@gmail.com', 'Major', 'Lazer', '$2y$10$l9Jcn/3GjlMsocU3IKU2yO1lhw3mk/5YBS9D9CKwjPASEapKF6kge', NULL, 0, 0, '2022-04-01 18:43:16.175194', 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(167, 'muthu@ri.con', 'Muthuri', '', '$2y$10$fnKoRzmNB0jK788WNe.yk.R8Oh8IwfzzR9OYCCb0CZ82crO.DfK8a', NULL, 0, 0, '2022-04-03 12:32:48.470164', 0, NULL, 0, NULL, NULL, '::1', 'Opera 66', 'mobile', '', NULL, NULL, NULL, NULL, NULL),
(173, 'abe@gmail.com', 'Abe', 'Linc', '$2y$10$JGpKjRu3rB1ZGtaFwuDJrugvOYxt7QB5dDLsuAMSE7/RUPvedxIee', NULL, 0, 0, '2022-04-05 15:39:20.542275', 0, NULL, 0, NULL, NULL, '2001:67c:2628:647:f::1d8', 'Opera 66.2.3445.62346', 'Samsung SM-A025F', 'Android 11', 'Sweden', 'Linkoping', NULL, NULL, NULL),
(174, 'adlerkelvin@gmail.com', 'Adler', '', '$2y$10$21gUySrSZNtnZa0aI3B47eVXLhr009LJ7ufuKU.XUACZ1tcrXss/O', NULL, 0, 0, '2022-05-21 17:09:18.118392', 0, NULL, 0, NULL, NULL, '102.0.186.159', 'Firefox 99.0', 'Desktop', 'Windows NT >=10', 'Kenya', 'Mombasa', NULL, NULL, NULL),
(184, 'hikef81564@adroh.com', 'Asm', '', '$2y$10$1HI33n67qR1N64awWVi99OMHxuKlbuZ0D2Pu.aWp73dZqAx9M7wCC', NULL, 0, 0, '2022-10-24 15:31:44.997633', 0, NULL, 0, NULL, NULL, '102.219.210.57', 'Chrome 106', 'Desktop', 'Windows NT null', 'Kenya', 'Nairobi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2022-04-14 14:01:46', '2022-04-14 14:01:46', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', 'comment', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/parrot/blog', 'yes'),
(2, 'home', 'http://localhost/parrot/blog', 'yes'),
(3, 'blogname', 'ParrotAI | Blog', 'yes'),
(4, 'blogdescription', 'High Quality Content in Seconds', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'kitahkelvin@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:2:{i:0;s:33:\"classic-editor/classic-editor.php\";i:2;s:24:\"wordpress-seo/wp-seo.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'blogsite', 'yes'),
(41, 'stylesheet', 'blogsite', 'yes'),
(42, 'comment_registration', '0', 'yes'),
(43, 'html_type', 'text/html', 'yes'),
(44, 'use_trackback', '0', 'yes'),
(45, 'default_role', 'subscriber', 'yes'),
(46, 'db_version', '51917', 'yes'),
(47, 'uploads_use_yearmonth_folders', '1', 'yes'),
(48, 'upload_path', '', 'yes'),
(49, 'blog_public', '1', 'yes'),
(50, 'default_link_category', '2', 'yes'),
(51, 'show_on_front', 'posts', 'yes'),
(52, 'tag_base', '', 'yes'),
(53, 'show_avatars', '1', 'yes'),
(54, 'avatar_rating', 'G', 'yes'),
(55, 'upload_url_path', '', 'yes'),
(56, 'thumbnail_size_w', '150', 'yes'),
(57, 'thumbnail_size_h', '150', 'yes'),
(58, 'thumbnail_crop', '1', 'yes'),
(59, 'medium_size_w', '300', 'yes'),
(60, 'medium_size_h', '300', 'yes'),
(61, 'avatar_default', 'mystery', 'yes'),
(62, 'large_size_w', '1024', 'yes'),
(63, 'large_size_h', '1024', 'yes'),
(64, 'image_default_link_type', 'none', 'yes'),
(65, 'image_default_size', '', 'yes'),
(66, 'image_default_align', '', 'yes'),
(67, 'close_comments_for_old_posts', '0', 'yes'),
(68, 'close_comments_days_old', '14', 'yes'),
(69, 'thread_comments', '1', 'yes'),
(70, 'thread_comments_depth', '5', 'yes'),
(71, 'page_comments', '0', 'yes'),
(72, 'comments_per_page', '50', 'yes'),
(73, 'default_comments_page', 'newest', 'yes'),
(74, 'comment_order', 'asc', 'yes'),
(75, 'sticky_posts', 'a:0:{}', 'yes'),
(76, 'widget_categories', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(77, 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(78, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'uninstall_plugins', 'a:1:{s:24:\"wordpress-seo/wp-seo.php\";s:14:\"__return_false\";}', 'no'),
(80, 'timezone_string', '', 'yes'),
(81, 'page_for_posts', '0', 'yes'),
(82, 'page_on_front', '0', 'yes'),
(83, 'default_post_format', '0', 'yes'),
(84, 'link_manager_enabled', '0', 'yes'),
(85, 'finished_splitting_shared_terms', '1', 'yes'),
(86, 'site_icon', '0', 'yes'),
(87, 'medium_large_size_w', '768', 'yes'),
(88, 'medium_large_size_h', '0', 'yes'),
(89, 'wp_page_for_privacy_policy', '3', 'yes'),
(90, 'show_comments_cookies_opt_in', '1', 'yes'),
(91, 'admin_email_lifespan', '1665496906', 'yes'),
(92, 'disallowed_keys', '', 'no'),
(93, 'comment_previously_approved', '1', 'yes'),
(94, 'auto_plugin_theme_update_emails', 'a:0:{}', 'no'),
(95, 'auto_update_core_dev', 'enabled', 'yes'),
(96, 'auto_update_core_minor', 'enabled', 'yes'),
(97, 'auto_update_core_major', 'enabled', 'yes'),
(98, 'wp_force_deactivated_plugins', 'a:0:{}', 'yes'),
(99, 'initial_db_version', '51917', 'yes'),
(100, 'wp_user_roles', 'a:7:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:20:\"wpseo_manage_options\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:36:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:15:\"wpseo_bulk_edit\";b:1;s:28:\"wpseo_edit_advanced_metadata\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:13:\"wpseo_manager\";a:2:{s:4:\"name\";s:11:\"SEO Manager\";s:12:\"capabilities\";a:38:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:15:\"wpseo_bulk_edit\";b:1;s:28:\"wpseo_edit_advanced_metadata\";b:1;s:20:\"wpseo_manage_options\";b:1;s:23:\"view_site_health_checks\";b:1;}}s:12:\"wpseo_editor\";a:2:{s:4:\"name\";s:10:\"SEO Editor\";s:12:\"capabilities\";a:36:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:15:\"wpseo_bulk_edit\";b:1;s:28:\"wpseo_edit_advanced_metadata\";b:1;}}}', 'yes'),
(101, 'fresh_site', '0', 'yes'),
(102, 'widget_block', 'a:6:{i:2;a:1:{s:7:\"content\";s:19:\"<!-- wp:search /-->\";}i:3;a:1:{s:7:\"content\";s:154:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Recent Posts</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:227:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Recent Comments</h2><!-- /wp:heading --><!-- wp:latest-comments {\"displayAvatar\":false,\"displayDate\":false,\"displayExcerpt\":false} /--></div><!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:146:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Archives</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:150:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Categories</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(103, 'sidebars_widgets', 'a:5:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:12:\"home-sidebar\";a:0:{}s:6:\"footer\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}s:13:\"array_version\";i:3;}', 'yes'),
(104, 'cron', 'a:10:{i:1666026107;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1666027702;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:2:{s:8:\"schedule\";b:0;s:4:\"args\";a:0:{}}}}i:1666028997;a:2:{s:13:\"wpseo-reindex\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:31:\"wpseo_permalink_structure_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1666058507;a:4:{s:18:\"wp_https_detection\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1666101707;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1666101722;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1666101732;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1666288197;a:1:{s:16:\"wpseo_ryte_fetch\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}i:1666360907;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}', 'yes'),
(105, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(113, 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'nonce_key', 'o>5~Dh7JD<`A;O|WZb[(5 ;(jyD<8XhIJq4t!V0wQsXLMESyZ%FIN}g&B2XXQ[E]', 'no'),
(115, 'nonce_salt', '@-=s1{mgF;:D&ivfY1gT.(^rz>Xp`tP!OGX)Qs#vQ34.x%ps>Ie_/lW7oq&E}DC<', 'no'),
(116, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(117, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(118, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(120, 'recovery_keys', 'a:0:{}', 'yes'),
(123, 'theme_mods_twentytwentytwo', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1649953404;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}}}}', 'yes'),
(126, 'https_detection_errors', 'a:1:{s:23:\"ssl_verification_failed\";a:1:{i:0;s:24:\"SSL verification failed.\";}}', 'yes'),
(127, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:3:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.0.2.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.0.2.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-6.0.2-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-6.0.2-new-bundled.zip\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"6.0.2\";s:7:\"version\";s:5:\"6.0.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.9\";s:15:\"partial_version\";s:0:\"\";}i:1;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.0.2.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.0.2.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-6.0.2-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-6.0.2-new-bundled.zip\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"6.0.2\";s:7:\"version\";s:5:\"6.0.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.9\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}i:2;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.9.4.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.9.4.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.9.4-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.9.4-new-bundled.zip\";s:7:\"partial\";s:69:\"https://downloads.wordpress.org/release/wordpress-5.9.4-partial-3.zip\";s:8:\"rollback\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.9.4-rollback-3.zip\";}s:7:\"current\";s:5:\"5.9.4\";s:7:\"version\";s:5:\"5.9.4\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.9\";s:15:\"partial_version\";s:5:\"5.9.3\";s:9:\"new_files\";s:0:\"\";}}s:12:\"last_checked\";i:1666024102;s:15:\"version_checked\";s:5:\"5.9.3\";s:12:\"translations\";a:0:{}}', 'no'),
(128, 'auth_key', 'XuDn!B2QliaNy|U&t+@BYUL#%q3<mJ>K&, (4$T%XK[3`z4o02gs..``{pBRnE,d', 'no'),
(129, 'auth_salt', 'hKJ8h_y?-p5C.BI,;1?a W/ex`,=&#vQSv?+2N9.G~af+JHyK&Py{ZawAOC$yv&)', 'no'),
(130, 'logged_in_key', 'I6>pS^%:j`24|MR;OHxAAxTL@4bjX3O|2aSu?qzCs| _-(Qwumnj7-v<g ,HxII}', 'no'),
(131, 'logged_in_salt', '^?h^]eJi`>|t>#G{TU)]gb#K*bjW#hK6+M%h0mT,Ff%jC@>EPb,XNpsu3n}y=n($', 'no'),
(146, 'can_compress_scripts', '1', 'no'),
(159, 'finished_updating_comment_type', '1', 'yes'),
(170, 'current_theme', 'BlogSite', 'yes'),
(171, 'theme_mods_startup-blog', 'a:4:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1649953757;s:4:\"data\";a:5:{s:19:\"wp_inactive_widgets\";a:0:{}s:7:\"primary\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:18:\"after-post-content\";a:0:{}s:18:\"after-page-content\";a:0:{}s:11:\"footer-area\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}}}}', 'yes'),
(172, 'theme_switched', '', 'yes'),
(173, 'wrm_4de3404ca4965d89a5e7', '1649953404', 'yes'),
(179, 'widget_recent-comments', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(180, 'widget_recent-posts', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(183, 'theme_mods_twentytwenty', 'a:1:{s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(200, 'widget_blogsite-recent', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(201, 'widget_blogsite-most-commented', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(202, 'widget_blogsite-category-posts', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(203, 'widget_blogsite-tabs', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(204, 'recently_activated', 'a:1:{s:35:\"insert-headers-and-footers/ihaf.php\";i:1650654982;}', 'yes'),
(217, 'yoast_migrations_free', 'a:1:{s:7:\"version\";s:6:\"18.5.1\";}', 'yes'),
(218, 'wpseo', 'a:56:{s:8:\"tracking\";b:0;s:22:\"license_server_version\";b:0;s:15:\"ms_defaults_set\";b:0;s:40:\"ignore_search_engines_discouraged_notice\";b:0;s:19:\"indexing_first_time\";b:1;s:16:\"indexing_started\";b:0;s:15:\"indexing_reason\";s:26:\"permalink_settings_changed\";s:29:\"indexables_indexing_completed\";b:1;s:7:\"version\";s:6:\"18.5.1\";s:16:\"previous_version\";s:0:\"\";s:20:\"disableadvanced_meta\";b:1;s:30:\"enable_headless_rest_endpoints\";b:1;s:17:\"ryte_indexability\";b:1;s:11:\"baiduverify\";s:0:\"\";s:12:\"googleverify\";s:0:\"\";s:8:\"msverify\";s:0:\"\";s:12:\"yandexverify\";s:0:\"\";s:9:\"site_type\";s:0:\"\";s:20:\"has_multiple_authors\";s:0:\"\";s:16:\"environment_type\";s:0:\"\";s:23:\"content_analysis_active\";b:1;s:23:\"keyword_analysis_active\";b:1;s:21:\"enable_admin_bar_menu\";b:1;s:26:\"enable_cornerstone_content\";b:1;s:18:\"enable_xml_sitemap\";b:1;s:24:\"enable_text_link_counter\";b:1;s:22:\"show_onboarding_notice\";b:1;s:18:\"first_activated_on\";i:1649958597;s:13:\"myyoast-oauth\";b:0;s:26:\"semrush_integration_active\";b:1;s:14:\"semrush_tokens\";a:0:{}s:20:\"semrush_country_code\";s:2:\"us\";s:19:\"permalink_structure\";s:36:\"/%year%/%monthnum%/%day%/%postname%/\";s:8:\"home_url\";s:28:\"http://localhost/parrot/blog\";s:18:\"dynamic_permalinks\";b:0;s:17:\"category_base_url\";s:0:\"\";s:12:\"tag_base_url\";s:0:\"\";s:21:\"custom_taxonomy_slugs\";a:0:{}s:29:\"enable_enhanced_slack_sharing\";b:1;s:25:\"zapier_integration_active\";b:0;s:19:\"zapier_subscription\";a:0:{}s:14:\"zapier_api_key\";s:0:\"\";s:23:\"enable_metabox_insights\";b:1;s:23:\"enable_link_suggestions\";b:1;s:26:\"algolia_integration_active\";b:0;s:14:\"import_cursors\";a:0:{}s:13:\"workouts_data\";a:1:{s:13:\"configuration\";a:1:{s:13:\"finishedSteps\";a:0:{}}}s:36:\"dismiss_configuration_workout_notice\";b:1;s:19:\"importing_completed\";a:0:{}s:26:\"wincher_integration_active\";b:1;s:14:\"wincher_tokens\";a:0:{}s:36:\"wincher_automatically_add_keyphrases\";b:0;s:18:\"wincher_website_id\";s:0:\"\";s:18:\"first_time_install\";b:1;s:34:\"should_redirect_after_install_free\";b:1;s:34:\"activation_redirect_timestamp_free\";b:0;}', 'yes'),
(219, 'wpseo_titles', 'a:106:{s:17:\"forcerewritetitle\";b:0;s:9:\"separator\";s:7:\"sc-dash\";s:16:\"title-home-wpseo\";s:42:\"%%sitename%% %%page%% %%sep%% %%sitedesc%%\";s:18:\"title-author-wpseo\";s:41:\"%%name%%, Author at %%sitename%% %%page%%\";s:19:\"title-archive-wpseo\";s:38:\"%%date%% %%page%% %%sep%% %%sitename%%\";s:18:\"title-search-wpseo\";s:63:\"You searched for %%searchphrase%% %%page%% %%sep%% %%sitename%%\";s:15:\"title-404-wpseo\";s:35:\"Page not found %%sep%% %%sitename%%\";s:25:\"social-title-author-wpseo\";s:8:\"%%name%%\";s:26:\"social-title-archive-wpseo\";s:8:\"%%date%%\";s:31:\"social-description-author-wpseo\";s:0:\"\";s:32:\"social-description-archive-wpseo\";s:0:\"\";s:29:\"social-image-url-author-wpseo\";s:0:\"\";s:30:\"social-image-url-archive-wpseo\";s:0:\"\";s:28:\"social-image-id-author-wpseo\";i:0;s:29:\"social-image-id-archive-wpseo\";i:0;s:19:\"metadesc-home-wpseo\";s:0:\"\";s:21:\"metadesc-author-wpseo\";s:0:\"\";s:22:\"metadesc-archive-wpseo\";s:0:\"\";s:9:\"rssbefore\";s:0:\"\";s:8:\"rssafter\";s:53:\"The post %%POSTLINK%% appeared first on %%BLOGLINK%%.\";s:20:\"noindex-author-wpseo\";b:0;s:28:\"noindex-author-noposts-wpseo\";b:1;s:21:\"noindex-archive-wpseo\";b:1;s:14:\"disable-author\";b:0;s:12:\"disable-date\";b:0;s:19:\"disable-post_format\";b:0;s:18:\"disable-attachment\";b:1;s:20:\"breadcrumbs-404crumb\";s:25:\"Error 404: Page not found\";s:29:\"breadcrumbs-display-blog-page\";b:1;s:20:\"breadcrumbs-boldlast\";b:0;s:25:\"breadcrumbs-archiveprefix\";s:12:\"Archives for\";s:18:\"breadcrumbs-enable\";b:1;s:16:\"breadcrumbs-home\";s:4:\"Home\";s:18:\"breadcrumbs-prefix\";s:0:\"\";s:24:\"breadcrumbs-searchprefix\";s:16:\"You searched for\";s:15:\"breadcrumbs-sep\";s:7:\"&raquo;\";s:12:\"website_name\";s:0:\"\";s:11:\"person_name\";s:0:\"\";s:11:\"person_logo\";s:0:\"\";s:22:\"alternate_website_name\";s:0:\"\";s:12:\"company_logo\";s:0:\"\";s:12:\"company_name\";s:0:\"\";s:17:\"company_or_person\";s:7:\"company\";s:25:\"company_or_person_user_id\";b:0;s:17:\"stripcategorybase\";b:0;s:26:\"open_graph_frontpage_title\";s:12:\"%%sitename%%\";s:25:\"open_graph_frontpage_desc\";s:0:\"\";s:26:\"open_graph_frontpage_image\";s:0:\"\";s:10:\"title-post\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:13:\"metadesc-post\";s:0:\"\";s:12:\"noindex-post\";b:0;s:23:\"display-metabox-pt-post\";b:1;s:23:\"post_types-post-maintax\";i:0;s:21:\"schema-page-type-post\";s:7:\"WebPage\";s:24:\"schema-article-type-post\";s:7:\"Article\";s:17:\"social-title-post\";s:9:\"%%title%%\";s:23:\"social-description-post\";s:0:\"\";s:21:\"social-image-url-post\";s:0:\"\";s:20:\"social-image-id-post\";i:0;s:10:\"title-page\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:13:\"metadesc-page\";s:0:\"\";s:12:\"noindex-page\";b:0;s:23:\"display-metabox-pt-page\";b:1;s:23:\"post_types-page-maintax\";i:0;s:21:\"schema-page-type-page\";s:7:\"WebPage\";s:24:\"schema-article-type-page\";s:4:\"None\";s:17:\"social-title-page\";s:9:\"%%title%%\";s:23:\"social-description-page\";s:0:\"\";s:21:\"social-image-url-page\";s:0:\"\";s:20:\"social-image-id-page\";i:0;s:16:\"title-attachment\";s:39:\"%%title%% %%page%% %%sep%% %%sitename%%\";s:19:\"metadesc-attachment\";s:0:\"\";s:18:\"noindex-attachment\";b:0;s:29:\"display-metabox-pt-attachment\";b:1;s:29:\"post_types-attachment-maintax\";i:0;s:27:\"schema-page-type-attachment\";s:7:\"WebPage\";s:30:\"schema-article-type-attachment\";s:4:\"None\";s:18:\"title-tax-category\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:21:\"metadesc-tax-category\";s:0:\"\";s:28:\"display-metabox-tax-category\";b:1;s:20:\"noindex-tax-category\";b:0;s:25:\"social-title-tax-category\";s:23:\"%%term_title%% Archives\";s:31:\"social-description-tax-category\";s:0:\"\";s:29:\"social-image-url-tax-category\";s:0:\"\";s:28:\"social-image-id-tax-category\";i:0;s:18:\"title-tax-post_tag\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:21:\"metadesc-tax-post_tag\";s:0:\"\";s:28:\"display-metabox-tax-post_tag\";b:1;s:20:\"noindex-tax-post_tag\";b:0;s:25:\"social-title-tax-post_tag\";s:23:\"%%term_title%% Archives\";s:31:\"social-description-tax-post_tag\";s:0:\"\";s:29:\"social-image-url-tax-post_tag\";s:0:\"\";s:28:\"social-image-id-tax-post_tag\";i:0;s:21:\"title-tax-post_format\";s:53:\"%%term_title%% Archives %%page%% %%sep%% %%sitename%%\";s:24:\"metadesc-tax-post_format\";s:0:\"\";s:31:\"display-metabox-tax-post_format\";b:1;s:23:\"noindex-tax-post_format\";b:1;s:28:\"social-title-tax-post_format\";s:23:\"%%term_title%% Archives\";s:34:\"social-description-tax-post_format\";s:0:\"\";s:32:\"social-image-url-tax-post_format\";s:0:\"\";s:31:\"social-image-id-tax-post_format\";i:0;s:14:\"person_logo_id\";i:0;s:15:\"company_logo_id\";i:0;s:17:\"company_logo_meta\";b:0;s:16:\"person_logo_meta\";b:0;s:29:\"open_graph_frontpage_image_id\";i:0;}', 'yes'),
(220, 'wpseo_social', 'a:18:{s:13:\"facebook_site\";s:0:\"\";s:13:\"instagram_url\";s:0:\"\";s:12:\"linkedin_url\";s:0:\"\";s:11:\"myspace_url\";s:0:\"\";s:16:\"og_default_image\";s:0:\"\";s:19:\"og_default_image_id\";s:0:\"\";s:18:\"og_frontpage_title\";s:0:\"\";s:17:\"og_frontpage_desc\";s:0:\"\";s:18:\"og_frontpage_image\";s:0:\"\";s:21:\"og_frontpage_image_id\";s:0:\"\";s:9:\"opengraph\";b:1;s:13:\"pinterest_url\";s:0:\"\";s:15:\"pinterestverify\";s:0:\"\";s:7:\"twitter\";b:1;s:12:\"twitter_site\";s:0:\"\";s:17:\"twitter_card_type\";s:19:\"summary_large_image\";s:11:\"youtube_url\";s:0:\"\";s:13:\"wikipedia_url\";s:0:\"\";}', 'yes'),
(253, 'theme_mods_blogsite', 'a:1:{s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(268, '_transient_health-check-site-status-result', '{\"good\":13,\"recommended\":6,\"critical\":0}', 'yes'),
(282, 'WPLANG', '', 'yes'),
(283, 'new_admin_email', 'kitahkelvin@gmail.com', 'yes'),
(291, 'category_children', 'a:0:{}', 'yes'),
(292, 'wp_calendar_block_has_published_posts', '1', 'yes'),
(353, 'rewrite_rules', 'a:97:{s:19:\"sitemap_index\\.xml$\";s:19:\"index.php?sitemap=1\";s:31:\"([^/]+?)-sitemap([0-9]+)?\\.xml$\";s:51:\"index.php?sitemap=$matches[1]&sitemap_n=$matches[2]\";s:24:\"([a-z]+)?-?sitemap\\.xsl$\";s:39:\"index.php?yoast-sitemap-xsl=$matches[1]\";s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"^wp-sitemap\\.xml$\";s:23:\"index.php?sitemap=index\";s:17:\"^wp-sitemap\\.xsl$\";s:36:\"index.php?sitemap-stylesheet=sitemap\";s:23:\"^wp-sitemap-index\\.xsl$\";s:34:\"index.php?sitemap-stylesheet=index\";s:48:\"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$\";s:75:\"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]\";s:34:\"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$\";s:47:\"index.php?sitemap=$matches[1]&paged=$matches[2]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes'),
(414, 'ihaf_insert_header', '', 'yes'),
(415, 'ihaf_insert_footer', '', 'yes'),
(416, 'ihaf_insert_body', '', 'yes'),
(417, 'insert-headers-and-footers_welcome_dismissed_key', '1', 'yes'),
(950, '_site_transient_timeout_php_check_0bf95b5f09d09e56bf994b7894d9087c', '1666527583', 'no'),
(951, '_site_transient_php_check_0bf95b5f09d09e56bf994b7894d9087c', 'a:5:{s:19:\"recommended_version\";s:3:\"7.4\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:1;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'no'),
(954, '_transient_timeout_global_styles_blogsite', '1666024159', 'no'),
(955, '_transient_global_styles_blogsite', 'body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url(\'#wp-duotone-dark-grayscale\');--wp--preset--duotone--grayscale: url(\'#wp-duotone-grayscale\');--wp--preset--duotone--purple-yellow: url(\'#wp-duotone-purple-yellow\');--wp--preset--duotone--blue-red: url(\'#wp-duotone-blue-red\');--wp--preset--duotone--midnight: url(\'#wp-duotone-midnight\');--wp--preset--duotone--magenta-yellow: url(\'#wp-duotone-magenta-yellow\');--wp--preset--duotone--purple-green: url(\'#wp-duotone-purple-green\');--wp--preset--duotone--blue-orange: url(\'#wp-duotone-blue-orange\');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}', 'no'),
(956, '_transient_timeout_global_styles_svg_filters_blogsite', '1666024161', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(957, '_transient_global_styles_svg_filters_blogsite', '<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-dark-grayscale\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 0.49803921568627\" /><feFuncG type=\"table\" tableValues=\"0 0.49803921568627\" /><feFuncB type=\"table\" tableValues=\"0 0.49803921568627\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-grayscale\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 1\" /><feFuncG type=\"table\" tableValues=\"0 1\" /><feFuncB type=\"table\" tableValues=\"0 1\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-purple-yellow\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.54901960784314 0.98823529411765\" /><feFuncG type=\"table\" tableValues=\"0 1\" /><feFuncB type=\"table\" tableValues=\"0.71764705882353 0.25490196078431\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-blue-red\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 1\" /><feFuncG type=\"table\" tableValues=\"0 0.27843137254902\" /><feFuncB type=\"table\" tableValues=\"0.5921568627451 0.27843137254902\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-midnight\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0 0\" /><feFuncG type=\"table\" tableValues=\"0 0.64705882352941\" /><feFuncB type=\"table\" tableValues=\"0 1\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-magenta-yellow\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.78039215686275 1\" /><feFuncG type=\"table\" tableValues=\"0 0.94901960784314\" /><feFuncB type=\"table\" tableValues=\"0.35294117647059 0.47058823529412\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-purple-green\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.65098039215686 0.40392156862745\" /><feFuncG type=\"table\" tableValues=\"0 1\" /><feFuncB type=\"table\" tableValues=\"0.44705882352941 0.4\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 0 0\" width=\"0\" height=\"0\" focusable=\"false\" role=\"none\" style=\"visibility: hidden; position: absolute; left: -9999px; overflow: hidden;\" ><defs><filter id=\"wp-duotone-blue-orange\"><feColorMatrix color-interpolation-filters=\"sRGB\" type=\"matrix\" values=\" .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 .299 .587 .114 0 0 \" /><feComponentTransfer color-interpolation-filters=\"sRGB\" ><feFuncR type=\"table\" tableValues=\"0.098039215686275 1\" /><feFuncG type=\"table\" tableValues=\"0 0.66274509803922\" /><feFuncB type=\"table\" tableValues=\"0.84705882352941 0.41960784313725\" /><feFuncA type=\"table\" tableValues=\"1 1\" /></feComponentTransfer><feComposite in2=\"SourceGraphic\" operator=\"in\" /></filter></defs></svg>', 'no'),
(959, '_site_transient_timeout_theme_roots', '1666025907', 'no'),
(960, '_site_transient_theme_roots', 'a:5:{s:8:\"blogsite\";s:7:\"/themes\";s:12:\"startup-blog\";s:7:\"/themes\";s:12:\"twentytwenty\";s:7:\"/themes\";s:15:\"twentytwentyone\";s:7:\"/themes\";s:15:\"twentytwentytwo\";s:7:\"/themes\";}', 'no'),
(961, '_site_transient_update_themes', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1666024109;s:7:\"checked\";a:5:{s:8:\"blogsite\";s:5:\"1.0.2\";s:12:\"startup-blog\";s:4:\"1.37\";s:12:\"twentytwenty\";s:3:\"1.9\";s:15:\"twentytwentyone\";s:3:\"1.5\";s:15:\"twentytwentytwo\";s:3:\"1.1\";}s:8:\"response\";a:5:{s:8:\"blogsite\";a:6:{s:5:\"theme\";s:8:\"blogsite\";s:11:\"new_version\";s:5:\"1.0.9\";s:3:\"url\";s:38:\"https://wordpress.org/themes/blogsite/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/theme/blogsite.1.0.9.zip\";s:8:\"requires\";s:3:\"4.9\";s:12:\"requires_php\";s:3:\"5.6\";}s:12:\"startup-blog\";a:6:{s:5:\"theme\";s:12:\"startup-blog\";s:11:\"new_version\";s:4:\"1.38\";s:3:\"url\";s:42:\"https://wordpress.org/themes/startup-blog/\";s:7:\"package\";s:59:\"https://downloads.wordpress.org/theme/startup-blog.1.38.zip\";s:8:\"requires\";b:0;s:12:\"requires_php\";s:3:\"5.4\";}s:12:\"twentytwenty\";a:6:{s:5:\"theme\";s:12:\"twentytwenty\";s:11:\"new_version\";s:3:\"2.0\";s:3:\"url\";s:42:\"https://wordpress.org/themes/twentytwenty/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/theme/twentytwenty.2.0.zip\";s:8:\"requires\";s:3:\"4.7\";s:12:\"requires_php\";s:5:\"5.2.4\";}s:15:\"twentytwentyone\";a:6:{s:5:\"theme\";s:15:\"twentytwentyone\";s:11:\"new_version\";s:3:\"1.6\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentytwentyone/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentytwentyone.1.6.zip\";s:8:\"requires\";s:3:\"5.3\";s:12:\"requires_php\";s:3:\"5.6\";}s:15:\"twentytwentytwo\";a:6:{s:5:\"theme\";s:15:\"twentytwentytwo\";s:11:\"new_version\";s:3:\"1.2\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentytwentytwo/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentytwentytwo.1.2.zip\";s:8:\"requires\";s:3:\"5.9\";s:12:\"requires_php\";s:3:\"5.6\";}}s:9:\"no_update\";a:0:{}s:12:\"translations\";a:0:{}}', 'no'),
(962, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1666024111;s:8:\"response\";a:4:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"5.0.1\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.5.0.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"5.0\";s:6:\"tested\";s:5:\"6.0.2\";s:12:\"requires_php\";s:3:\"5.2\";}s:66:\"header-footer-code-manager/99robots-header-footer-code-manager.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:40:\"w.org/plugins/header-footer-code-manager\";s:4:\"slug\";s:26:\"header-footer-code-manager\";s:6:\"plugin\";s:66:\"header-footer-code-manager/99robots-header-footer-code-manager.php\";s:11:\"new_version\";s:6:\"1.1.29\";s:3:\"url\";s:57:\"https://wordpress.org/plugins/header-footer-code-manager/\";s:7:\"package\";s:76:\"https://downloads.wordpress.org/plugin/header-footer-code-manager.1.1.29.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:79:\"https://ps.w.org/header-footer-code-manager/assets/icon-256x256.png?rev=2681303\";s:2:\"1x\";s:79:\"https://ps.w.org/header-footer-code-manager/assets/icon-128x128.png?rev=2681303\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:82:\"https://ps.w.org/header-footer-code-manager/assets/banner-1544x500.png?rev=2681303\";s:2:\"1x\";s:81:\"https://ps.w.org/header-footer-code-manager/assets/banner-772x250.png?rev=2681303\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.9\";s:6:\"tested\";s:5:\"6.0.2\";s:12:\"requires_php\";s:6:\"5.6.20\";}s:35:\"insert-headers-and-footers/ihaf.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:40:\"w.org/plugins/insert-headers-and-footers\";s:4:\"slug\";s:26:\"insert-headers-and-footers\";s:6:\"plugin\";s:35:\"insert-headers-and-footers/ihaf.php\";s:11:\"new_version\";s:5:\"2.0.3\";s:3:\"url\";s:57:\"https://wordpress.org/plugins/insert-headers-and-footers/\";s:7:\"package\";s:75:\"https://downloads.wordpress.org/plugin/insert-headers-and-footers.2.0.3.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:79:\"https://ps.w.org/insert-headers-and-footers/assets/icon-256x256.png?rev=2758516\";s:2:\"1x\";s:79:\"https://ps.w.org/insert-headers-and-footers/assets/icon-128x128.png?rev=2758516\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:82:\"https://ps.w.org/insert-headers-and-footers/assets/banner-1544x500.png?rev=2758516\";s:2:\"1x\";s:81:\"https://ps.w.org/insert-headers-and-footers/assets/banner-772x250.png?rev=2758516\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.6\";s:6:\"tested\";s:5:\"6.0.2\";s:12:\"requires_php\";s:3:\"5.5\";}s:24:\"wordpress-seo/wp-seo.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:27:\"w.org/plugins/wordpress-seo\";s:4:\"slug\";s:13:\"wordpress-seo\";s:6:\"plugin\";s:24:\"wordpress-seo/wp-seo.php\";s:11:\"new_version\";s:4:\"19.8\";s:3:\"url\";s:44:\"https://wordpress.org/plugins/wordpress-seo/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/plugin/wordpress-seo.19.8.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:66:\"https://ps.w.org/wordpress-seo/assets/icon-256x256.png?rev=2643727\";s:2:\"1x\";s:58:\"https://ps.w.org/wordpress-seo/assets/icon.svg?rev=2363699\";s:3:\"svg\";s:58:\"https://ps.w.org/wordpress-seo/assets/icon.svg?rev=2363699\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:69:\"https://ps.w.org/wordpress-seo/assets/banner-1544x500.png?rev=2643727\";s:2:\"1x\";s:68:\"https://ps.w.org/wordpress-seo/assets/banner-772x250.png?rev=2643727\";}s:11:\"banners_rtl\";a:2:{s:2:\"2x\";s:73:\"https://ps.w.org/wordpress-seo/assets/banner-1544x500-rtl.png?rev=2643727\";s:2:\"1x\";s:72:\"https://ps.w.org/wordpress-seo/assets/banner-772x250-rtl.png?rev=2643727\";}s:8:\"requires\";s:3:\"5.9\";s:6:\"tested\";s:5:\"6.0.2\";s:12:\"requires_php\";s:6:\"5.6.20\";}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:2:{s:33:\"classic-editor/classic-editor.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:28:\"w.org/plugins/classic-editor\";s:4:\"slug\";s:14:\"classic-editor\";s:6:\"plugin\";s:33:\"classic-editor/classic-editor.php\";s:11:\"new_version\";s:5:\"1.6.2\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/classic-editor/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/classic-editor.1.6.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-256x256.png?rev=1998671\";s:2:\"1x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-128x128.png?rev=1998671\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/classic-editor/assets/banner-1544x500.png?rev=1998671\";s:2:\"1x\";s:69:\"https://ps.w.org/classic-editor/assets/banner-772x250.png?rev=1998676\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.9\";}s:9:\"hello.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/hello-dolly/assets/banner-1544x500.jpg?rev=2645582\";s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.6\";}}s:7:\"checked\";a:6:{s:19:\"akismet/akismet.php\";s:5:\"4.2.2\";s:33:\"classic-editor/classic-editor.php\";s:5:\"1.6.2\";s:66:\"header-footer-code-manager/99robots-header-footer-code-manager.php\";s:6:\"1.1.20\";s:9:\"hello.php\";s:5:\"1.7.2\";s:35:\"insert-headers-and-footers/ihaf.php\";s:5:\"1.6.0\";s:24:\"wordpress-seo/wp-seo.php\";s:6:\"18.5.1\";}}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(30, 17, 'blogsite-featured', 'no'),
(33, 23, 'blogsite-featured', 'no'),
(34, 17, '_edit_lock', '1650036509:1'),
(35, 17, '_edit_last', '1'),
(38, 17, '_yoast_wpseo_estimated-reading-time-minutes', ''),
(43, 23, '_edit_lock', '1650036410:1'),
(44, 23, '_edit_last', '1'),
(47, 23, '_yoast_wpseo_content_score', '30'),
(48, 23, '_yoast_wpseo_estimated-reading-time-minutes', ''),
(57, 17, '_yoast_wpseo_content_score', '30'),
(61, 27, 'blogsite-featured', 'no'),
(62, 27, '_edit_last', '1'),
(65, 27, '_edit_lock', '1650089988:1'),
(67, 30, '_wp_attached_file', '2022/04/logo.png'),
(68, 30, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:130;s:6:\"height\";i:127;s:4:\"file\";s:16:\"2022/04/logo.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(69, 31, '_wp_attached_file', '2022/04/cropped-logo.png'),
(70, 31, '_wp_attachment_context', 'custom-logo'),
(71, 31, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:130;s:6:\"height\";i:127;s:4:\"file\";s:24:\"2022/04/cropped-logo.png\";s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(72, 32, 'blogsite-featured', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2022-04-14 14:01:46', '2022-04-14 14:01:46', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2022-04-14 14:01:46', '2022-04-14 14:01:46', '', 0, 'http://localhost/parrot/blog/?p=1', 0, 'post', '', 1),
(2, 1, '2022-04-14 14:01:46', '2022-04-14 14:01:46', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/parrot/blog/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2022-04-14 14:01:46', '2022-04-14 14:01:46', '', 0, 'http://localhost/parrot/blog/?page_id=2', 0, 'page', '', 0),
(3, 1, '2022-04-14 14:01:46', '2022-04-14 14:01:46', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Our website address is: http://localhost/parrot/blog.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Comments</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Media</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Cookies</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Embedded content from other websites</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you request a password reset, your IP address will be included in the reset email.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2022-04-14 14:01:46', '2022-04-14 14:01:46', '', 0, 'http://localhost/parrot/blog/?page_id=3', 0, 'page', '', 0),
(17, 1, '2022-04-15 15:25:53', '2022-04-15 15:25:53', '<div class=\"ql-editor\" contenteditable=\"true\" data-gramm=\"false\" data-placeholder=\"Edit your post here\">\r\n\r\nAre you a writer? Have you been struggling to come up with content that packs a punch? Have you been struggling with writer\'s block?\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\nParrotAI is your answer.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\nParrotAI is a text generator that uses natural language processing to create realistic text. ParrotAI is capable of generating text for a variety of different purposes, including blog posts, social media posts and articles.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n**Features:**\r\n\r\n&nbsp;\r\n\r\n- **Generate Text:** Generate real text from scratch, use simple to complex natural language processing techniques depending on what you require.\r\n\r\n&nbsp;\r\n\r\n- **Generate blog articles:** Create a variety of blog posts ranging from blogs about your company to tech or gaming blogs.\r\n\r\n&nbsp;\r\n\r\n- **Generate Facebook posts:** Your Facebook fans are dying to hear what\'s happening. Why not make a good use of their time by posting updates on your company, news and interesting posts.\r\n\r\n&nbsp;\r\n\r\n- **Generate social media tweets:** Make your fans get a first hand experience of your company, get to know about your products and the services you provide.\r\n\r\n&nbsp;\r\n\r\n- **Generate Instagram posts:** Make your users post pictures and video from your company social media handles.\r\n\r\n&nbsp;\r\n\r\n- **Generate videos:** Get people from your company to create videos that express their views on their favorite things about your company.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n**Benefits:**\r\n\r\n&nbsp;\r\n\r\n- **Text quality:** ParrotAI text generator can generate text with a high naturalness score.\r\n\r\n&nbsp;\r\n\r\n- **Usability:** ParrotAI text generator\'s user interface makes it easy for users to use from a beginners to a advanced level.\r\n\r\n&nbsp;\r\n\r\n- **Availability:** ParrotAI is available as a web application and is also available as a command line application.\r\n\r\n</div>\r\n<div class=\"ql-clipboard\" tabindex=\"-1\" contenteditable=\"true\"></div>\r\n<div class=\"ql-tooltip ql-hidden\"><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\" /></div>', 'Have you been struggling to come up with content?', '', 'publish', 'closed', 'closed', '', 'have-you-been-struggling-to-come-up-with-content', '', '', '2022-04-15 15:30:45', '2022-04-15 15:30:45', '', 0, 'http://localhost/parrot/blog/?p=17', 0, 'post', '', 0),
(18, 1, '2022-04-15 15:19:00', '2022-04-15 15:19:00', '<div class=\"ql-editor\" data-gramm=\"false\" data-placeholder=\"Edit your post here\" contenteditable=\"true\"><p>Are you a writer? Have you been struggling to come up with content that packs a punch? Have you been struggling with writer\'s block?</p><p><br></p><p><br></p><p>ParrotAI is your answer.</p><p><br></p><p><br></p><p>ParrotAI is a text generator that uses natural language processing to create realistic text. ParrotAI is capable of generating text for a variety of different purposes, including blog posts, social media posts and articles.</p><p><br></p><p><br></p><p>**Features:**</p><p><br></p><p>- **Generate Text:** Generate real text from scratch, use simple to complex natural language processing techniques depending on what you require.</p><p><br></p><p>- **Generate blog articles:** Create a variety of blog posts ranging from blogs about your company to tech or gaming blogs.</p><p><br></p><p>- **Generate Facebook posts:** Your Facebook fans are dying to hear what\'s happening. Why not make a good use of their time by posting updates on your company, news and interesting posts.</p><p><br></p><p>- **Generate social media tweets:** Make your fans get a first hand experience of your company, get to know about your products and the services you provide.</p><p><br></p><p>- **Generate Instagram posts:** Make your users post pictures and video from your company social media handles.</p><p><br></p><p>- **Generate videos:** Get people from your company to create videos that express their views on their favorite things about your company.</p><p><br></p><p><br></p><p>**Benefits:**</p><p><br></p><p>- **Text quality:** ParrotAI text generator can generate text with a high naturalness score.</p><p><br></p><p>- **Usability:** ParrotAI text generator\'s user interface makes it easy for users to use from a beginners to a advanced level.</p><p><br></p><p>- **Availability:** ParrotAI is available as a web application and is also available as a command line application.</p></div><div class=\"ql-clipboard\" tabindex=\"-1\" contenteditable=\"true\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"blank\" rel=\"noopener\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'Have you been struggling to come up with content?', '', 'inherit', 'closed', 'closed', '', '17-revision-v1', '', '', '2022-04-15 15:19:00', '2022-04-15 15:19:00', '', 17, 'http://localhost/parrot/blog/?p=18', 0, 'revision', '', 0),
(23, 1, '2022-04-15 15:29:01', '2022-04-15 15:29:01', '<div class=\"ql-editor\" contenteditable=\"true\" data-gramm=\"false\" data-placeholder=\"Edit your post here\">\r\n\r\nParrotAI is text generator that uses natural language processing to create realistic text. ParrotAI is capable of generating text for a variety of topics, including politics, history, technology, science, and science fiction. ParrotAI has been used in the creation of books, papers, scientific articles, blog posts, presentations, marketing material, online games, and other applications. It is very powerful and flexible, easy to use, and can be used for a wide range of purposes.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\nParrotAI can:\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n1. Generate content at any stage of the content creation process, e.g., headline, sub-headlines, description, abstract, conclusion, introduction, and references.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n2. Create content without content experts. It can automatically generate content for any topic.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n3. Help writers with creating material for their research. Researchers can use ParrotAI to generate content and save a tremendous amount of time and energy.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n4. Help teachers create lesson plans with content for their teaching. Teachers can use ParrotAI to generate content and save hours of work for the creation of lesson plans\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n5. Help translators create the correct translations of the text.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n6. Help lawyers create arguments and memoranda to support legal claims.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n7. Create e-reader titles that can be uploaded to the e-reader platform of the choice of the user.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n8. Provide content for e-books and books to educate and entertain readers.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n9. Assist artists, musicians, and other performers.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n10. Assist authors and journalists and help them in generating original content and creating content that would be highly appreciated.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n11. Assist students and professors in generating content for their assignments.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n12. Assist marketers to create content for their materials.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n13. Assist scientists to create content for their research papers.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n14. Assist lawyers to create legal briefs.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n15. Create content for books, e-books\r\n\r\n</div>\r\n<div class=\"ql-clipboard\" tabindex=\"-1\" contenteditable=\"true\"></div>\r\n<div class=\"ql-tooltip ql-hidden\"><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\" /></div>', 'Generate content at any stage of the process', '', 'publish', 'closed', 'closed', '', 'generate-content-at-any-stage-of-the-process-2', '', '', '2022-04-15 15:29:01', '2022-04-15 15:29:01', '', 0, 'http://localhost/parrot/blog/?p=23', 0, 'post', '', 0),
(24, 1, '2022-04-15 15:24:45', '2022-04-15 15:24:45', '<div class=\"ql-editor\" data-gramm=\"false\" data-placeholder=\"Edit your post here\" contenteditable=\"true\"><p>ParrotAI is text generator that uses natural language processing to create realistic text. ParrotAI is capable of generating text for a variety of topics, including politics, history, technology, science, and science fiction. ParrotAI has been used in the creation of books, papers, scientific articles, blog posts, presentations, marketing material, online games, and other applications. It is very powerful and flexible, easy to use, and can be used for a wide range of purposes.</p><p><br></p><p><br></p><p>ParrotAI can:</p><p><br></p><p><br></p><p>1. Generate content at any stage of the content creation process, e.g., headline, sub-headlines, description, abstract, conclusion, introduction, and references.</p><p><br></p><p><br></p><p>2. Create content without content experts. It can automatically generate content for any topic.</p><p><br></p><p><br></p><p>3. Help writers with creating material for their research. Researchers can use ParrotAI to generate content and save a tremendous amount of time and energy.</p><p><br></p><p><br></p><p>4. Help teachers create lesson plans with content for their teaching. Teachers can use ParrotAI to generate content and save hours of work for the creation of lesson plans</p><p><br></p><p><br></p><p>5. Help translators create the correct translations of the text.</p><p><br></p><p><br></p><p>6. Help lawyers create arguments and memoranda to support legal claims.</p><p><br></p><p><br></p><p>7. Create e-reader titles that can be uploaded to the e-reader platform of the choice of the user.</p><p><br></p><p><br></p><p>8. Provide content for e-books and books to educate and entertain readers.</p><p><br></p><p><br></p><p>9. Assist artists, musicians, and other performers.</p><p><br></p><p><br></p><p>10. Assist authors and journalists and help them in generating original content and creating content that would be highly appreciated.</p><p><br></p><p><br></p><p>11. Assist students and professors in generating content for their assignments.</p><p><br></p><p><br></p><p>12. Assist marketers to create content for their materials.</p><p><br></p><p><br></p><p>13. Assist scientists to create content for their research papers.</p><p><br></p><p><br></p><p>14. Assist lawyers to create legal briefs.</p><p><br></p><p><br></p><p>15. Create content for books, e-books</p></div><div class=\"ql-clipboard\" tabindex=\"-1\" contenteditable=\"true\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"blank\" rel=\"noopener\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 'Generate content at any stage of the process', '', 'inherit', 'closed', 'closed', '', '23-revision-v1', '', '', '2022-04-15 15:24:45', '2022-04-15 15:24:45', '', 23, 'http://localhost/parrot/blog/?p=24', 0, 'revision', '', 0),
(25, 1, '2022-04-15 15:25:53', '2022-04-15 15:25:53', '<div class=\"ql-editor\" contenteditable=\"true\" data-gramm=\"false\" data-placeholder=\"Edit your post here\">\r\n\r\nAre you a writer? Have you been struggling to come up with content that packs a punch? Have you been struggling with writer\'s block?\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\nParrotAI is your answer.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\nParrotAI is a text generator that uses natural language processing to create realistic text. ParrotAI is capable of generating text for a variety of different purposes, including blog posts, social media posts and articles.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n**Features:**\r\n\r\n&nbsp;\r\n\r\n- **Generate Text:** Generate real text from scratch, use simple to complex natural language processing techniques depending on what you require.\r\n\r\n&nbsp;\r\n\r\n- **Generate blog articles:** Create a variety of blog posts ranging from blogs about your company to tech or gaming blogs.\r\n\r\n&nbsp;\r\n\r\n- **Generate Facebook posts:** Your Facebook fans are dying to hear what\'s happening. Why not make a good use of their time by posting updates on your company, news and interesting posts.\r\n\r\n&nbsp;\r\n\r\n- **Generate social media tweets:** Make your fans get a first hand experience of your company, get to know about your products and the services you provide.\r\n\r\n&nbsp;\r\n\r\n- **Generate Instagram posts:** Make your users post pictures and video from your company social media handles.\r\n\r\n&nbsp;\r\n\r\n- **Generate videos:** Get people from your company to create videos that express their views on their favorite things about your company.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n**Benefits:**\r\n\r\n&nbsp;\r\n\r\n- **Text quality:** ParrotAI text generator can generate text with a high naturalness score.\r\n\r\n&nbsp;\r\n\r\n- **Usability:** ParrotAI text generator\'s user interface makes it easy for users to use from a beginners to a advanced level.\r\n\r\n&nbsp;\r\n\r\n- **Availability:** ParrotAI is available as a web application and is also available as a command line application.\r\n\r\n</div>\r\n<div class=\"ql-clipboard\" tabindex=\"-1\" contenteditable=\"true\"></div>\r\n<div class=\"ql-tooltip ql-hidden\"><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\" /></div>', 'Have you been struggling to come up with content?', '', 'inherit', 'closed', 'closed', '', '17-revision-v1', '', '', '2022-04-15 15:25:53', '2022-04-15 15:25:53', '', 17, 'http://localhost/parrot/blog/?p=25', 0, 'revision', '', 0),
(26, 1, '2022-04-15 15:29:01', '2022-04-15 15:29:01', '<div class=\"ql-editor\" contenteditable=\"true\" data-gramm=\"false\" data-placeholder=\"Edit your post here\">\r\n\r\nParrotAI is text generator that uses natural language processing to create realistic text. ParrotAI is capable of generating text for a variety of topics, including politics, history, technology, science, and science fiction. ParrotAI has been used in the creation of books, papers, scientific articles, blog posts, presentations, marketing material, online games, and other applications. It is very powerful and flexible, easy to use, and can be used for a wide range of purposes.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\nParrotAI can:\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n1. Generate content at any stage of the content creation process, e.g., headline, sub-headlines, description, abstract, conclusion, introduction, and references.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n2. Create content without content experts. It can automatically generate content for any topic.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n3. Help writers with creating material for their research. Researchers can use ParrotAI to generate content and save a tremendous amount of time and energy.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n4. Help teachers create lesson plans with content for their teaching. Teachers can use ParrotAI to generate content and save hours of work for the creation of lesson plans\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n5. Help translators create the correct translations of the text.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n6. Help lawyers create arguments and memoranda to support legal claims.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n7. Create e-reader titles that can be uploaded to the e-reader platform of the choice of the user.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n8. Provide content for e-books and books to educate and entertain readers.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n9. Assist artists, musicians, and other performers.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n10. Assist authors and journalists and help them in generating original content and creating content that would be highly appreciated.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n11. Assist students and professors in generating content for their assignments.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n12. Assist marketers to create content for their materials.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n13. Assist scientists to create content for their research papers.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n14. Assist lawyers to create legal briefs.\r\n\r\n&nbsp;\r\n\r\n&nbsp;\r\n\r\n15. Create content for books, e-books\r\n\r\n</div>\r\n<div class=\"ql-clipboard\" tabindex=\"-1\" contenteditable=\"true\"></div>\r\n<div class=\"ql-tooltip ql-hidden\"><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\" /></div>', 'Generate content at any stage of the process', '', 'inherit', 'closed', 'closed', '', '23-revision-v1', '', '', '2022-04-15 15:29:01', '2022-04-15 15:29:01', '', 23, 'http://localhost/parrot/blog/?p=26', 0, 'revision', '', 0),
(27, 1, '2022-04-15 15:33:57', '2022-04-15 15:33:57', 'John Gotti was an Anerican mob boss who spent 17 years behind bars on a series of murders, loan sharking, money laundering and other charges. He never testified.\n\n\n\n\n\n\n\nHe was the son of Gambino family boss John Gotti Sr, but as \'Junior\', he was a rival of his boss and nephew Carlo Gambino. The Gotti Jr was killed in 2003, aged 48, leaving six children, and the Gotti name is still widely feared throughout the American underworld.\n\n\n\n\n\n\n\nJohn Gotti Sr died from heart disease at Brooklyn Hospital in 2002 at the age of 69, the year his son was jailed. At his funeral, it was said that he was the last of the \'Godfathers\' - a term for gangsters from his Sicilian background in particular.\n\n\n\n\n\n\n\nHere is a look at the facts and the myths.\n\n\n\n\n\n\n\nI. Gotti\'s early life\n\n\n\n\n\n\n\nBorn in January 1942 in a mob family in Bayville, New York, John Gotti grew up in Howard Beach - then considered the border between Brooklyn and Queens.\n\n\n\n\n\n\n\nBy the time he was 12, Gotti\'s family was involved in a shooting at the family pizzeria on Gravesend Avenue. The bullet was deflected into the wall, and although nobody was hurt, Gotti was terrified and swore he would leave the mob.\n\n\n\n\n\n\n\nAs a young adult, Gotti', 'John Gotti', '', 'publish', 'closed', 'closed', '', 'john-gotti', '', '', '2022-04-15 15:34:23', '2022-04-15 15:34:23', '', 0, 'http://localhost/parrot/blog/?p=27', 0, 'post', '', 0),
(28, 1, '2022-04-15 15:33:57', '2022-04-15 15:33:57', 'John Gotti was an Anerican mob boss who spent 17 years behind bars on a series of murders, loan sharking, money laundering and other charges. He never testified.\n\n\n\n\n\n\n\nHe was the son of Gambino family boss John Gotti Sr, but as \'Junior\', he was a rival of his boss and nephew Carlo Gambino. The Gotti Jr was killed in 2003, aged 48, leaving six children, and the Gotti name is still widely feared throughout the American underworld.\n\n\n\n\n\n\n\nJohn Gotti Sr died from heart disease at Brooklyn Hospital in 2002 at the age of 69, the year his son was jailed. At his funeral, it was said that he was the last of the \'Godfathers\' - a term for gangsters from his Sicilian background in particular.\n\n\n\n\n\n\n\nHere is a look at the facts and the myths.\n\n\n\n\n\n\n\nI. Gotti\'s early life\n\n\n\n\n\n\n\nBorn in January 1942 in a mob family in Bayville, New York, John Gotti grew up in Howard Beach - then considered the border between Brooklyn and Queens.\n\n\n\n\n\n\n\nBy the time he was 12, Gotti\'s family was involved in a shooting at the family pizzeria on Gravesend Avenue. The bullet was deflected into the wall, and although nobody was hurt, Gotti was terrified and swore he would leave the mob.\n\n\n\n\n\n\n\nAs a young adult, Gotti', 'John Gotti', '', 'inherit', 'closed', 'closed', '', '27-revision-v1', '', '', '2022-04-15 15:33:57', '2022-04-15 15:33:57', '', 27, 'http://localhost/parrot/blog/?p=28', 0, 'revision', '', 0),
(30, 1, '2022-04-22 19:08:13', '2022-04-22 19:08:13', '', 'logo', '', 'inherit', 'open', 'closed', '', 'logo', '', '', '2022-04-22 19:08:13', '2022-04-22 19:08:13', '', 0, 'http://localhost/parrot/blog/wp-content/uploads/2022/04/logo.png', 0, 'attachment', 'image/png', 0),
(31, 1, '2022-04-22 19:08:28', '2022-04-22 19:08:28', 'http://localhost/parrot/blog/wp-content/uploads/2022/04/cropped-logo.png', 'cropped-logo.png', '', 'inherit', 'open', 'closed', '', 'cropped-logo-png', '', '', '2022-04-22 19:08:28', '2022-04-22 19:08:28', '', 0, 'http://localhost/parrot/blog/wp-content/uploads/2022/04/cropped-logo.png', 0, 'attachment', 'image/png', 0),
(32, 1, '2022-05-17 18:58:22', '0000-00-00 00:00:00', 'The real genius of ParrotAI, the revolutionary AI writer, isn\'t its advanced algorithm or myriad use cases. Or that it can generate articles in seconds costs or even that it costs way less than other alternatives for similar applications. The real genius of ParrotAI is that you don\'t have to be a genius to use it. It is ridiculously easy and straightforward that anyone can use it. That\'s why you should get started now.', 'ParrotAI is ridiculously easy to use', '', 'draft', 'closed', 'closed', '', '', '', '', '2022-05-17 18:58:22', '2022-05-17 18:58:22', '', 0, 'http://localhost/parrot/blog/?p=32', 0, 'post', '', 0),
(33, 1, '2022-05-17 18:58:22', '2022-05-17 18:58:22', 'The real genius of ParrotAI, the revolutionary AI writer, isn\'t its advanced algorithm or myriad use cases. Or that it can generate articles in seconds costs or even that it costs way less than other alternatives for similar applications. The real genius of ParrotAI is that you don\'t have to be a genius to use it. It is ridiculously easy and straightforward that anyone can use it. That\'s why you should get started now.', 'ParrotAI is ridiculously easy to use', '', 'inherit', 'closed', 'closed', '', '32-revision-v1', '', '', '2022-05-17 18:58:22', '2022-05-17 18:58:22', '', 32, 'http://localhost/parrot/blog/?p=33', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(17, 1, 0),
(23, 1, 0),
(27, 1, 0),
(32, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '0'),
(16, 1, 'session_tokens', 'a:1:{s:64:\"ef855763054a8ce263c25dc49f30463f4d9947c4c4af3f966d57d342f3db50ac\";a:4:{s:10:\"expiration\";i:1650827210;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:78:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0\";s:5:\"login\";i:1650654410;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '29'),
(18, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:9:\"127.0.0.0\";}'),
(19, 1, 'blogsite_notice_ignore', 'true'),
(26, 1, 'wp_user-settings', 'libraryContent=browse'),
(27, 1, 'wp_user-settings-time', '1650654538');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BYmGVL2NsX.BfUhvoYGWeUH2iLRGuN/', 'admin', 'kitahkelvin@gmail.com', 'http://localhost/parrot/blog', '2022-04-14 14:01:46', '', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wp_yoast_indexable`
--

CREATE TABLE `wp_yoast_indexable` (
  `id` int(11) UNSIGNED NOT NULL,
  `permalink` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permalink_hash` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `object_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_sub_type` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint(20) DEFAULT NULL,
  `post_parent` bigint(20) DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT NULL,
  `is_protected` tinyint(1) DEFAULT 0,
  `has_public_posts` tinyint(1) DEFAULT NULL,
  `number_of_pages` int(11) UNSIGNED DEFAULT NULL,
  `canonical` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_focus_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_focus_keyword_score` int(3) DEFAULT NULL,
  `readability_score` int(3) DEFAULT NULL,
  `is_cornerstone` tinyint(1) DEFAULT 0,
  `is_robots_noindex` tinyint(1) DEFAULT 0,
  `is_robots_nofollow` tinyint(1) DEFAULT 0,
  `is_robots_noarchive` tinyint(1) DEFAULT 0,
  `is_robots_noimageindex` tinyint(1) DEFAULT 0,
  `is_robots_nosnippet` tinyint(1) DEFAULT 0,
  `twitter_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_image_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_image_source` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_graph_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_graph_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_graph_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_graph_image_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_graph_image_source` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_graph_image_meta` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_count` int(11) DEFAULT NULL,
  `incoming_link_count` int(11) DEFAULT NULL,
  `prominent_words_version` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_id` bigint(20) NOT NULL DEFAULT 1,
  `language` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_page_type` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schema_article_type` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_ancestors` tinyint(1) DEFAULT 0,
  `estimated_reading_time_minutes` int(11) DEFAULT NULL,
  `version` int(11) DEFAULT 1,
  `object_last_modified` datetime DEFAULT NULL,
  `object_published_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_yoast_indexable`
--

INSERT INTO `wp_yoast_indexable` (`id`, `permalink`, `permalink_hash`, `object_id`, `object_type`, `object_sub_type`, `author_id`, `post_parent`, `title`, `description`, `breadcrumb_title`, `post_status`, `is_public`, `is_protected`, `has_public_posts`, `number_of_pages`, `canonical`, `primary_focus_keyword`, `primary_focus_keyword_score`, `readability_score`, `is_cornerstone`, `is_robots_noindex`, `is_robots_nofollow`, `is_robots_noarchive`, `is_robots_noimageindex`, `is_robots_nosnippet`, `twitter_title`, `twitter_image`, `twitter_description`, `twitter_image_id`, `twitter_image_source`, `open_graph_title`, `open_graph_description`, `open_graph_image`, `open_graph_image_id`, `open_graph_image_source`, `open_graph_image_meta`, `link_count`, `incoming_link_count`, `prominent_words_version`, `created_at`, `updated_at`, `blog_id`, `language`, `region`, `schema_page_type`, `schema_article_type`, `has_ancestors`, `estimated_reading_time_minutes`, `version`, `object_last_modified`, `object_published_at`) VALUES
(1, 'http://localhost/parrot/blog/author/admin/', '42:d278d35ce3e11937f5fe766d92dde925', 1, 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 'https://0.gravatar.com/avatar/cc2a758f06d5b446442576ab8bc92f54?s=500&d=mm&r=g', NULL, NULL, 'gravatar-image', NULL, NULL, 'https://0.gravatar.com/avatar/cc2a758f06d5b446442576ab8bc92f54?s=500&d=mm&r=g', NULL, 'gravatar-image', NULL, NULL, NULL, NULL, '2022-04-14 17:49:59', '2022-05-17 15:58:28', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-15 15:34:23', '2022-04-14 14:01:46'),
(2, 'http://localhost/parrot/blog/?page_id=3', '39:f6010d36d3a8db0267a6592ebd070ced', 3, 'post', 'page', 1, 0, NULL, NULL, 'Privacy Policy', 'draft', 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-14 17:49:59', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-14 14:01:46', '2022-04-14 14:01:46'),
(3, 'http://localhost/parrot/blog/sample-page/', '41:c33c752883f35b87da7f0f8e8a4716a0', 2, 'post', 'page', 1, 0, NULL, NULL, 'Sample Page', 'publish', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-04-14 17:49:59', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-14 14:01:46', '2022-04-14 14:01:46'),
(4, 'http://localhost/parrot/blog/2022/04/14/hello-world/', '52:64979e5544cd784dffca47b38d6ebd6e', 1, 'post', 'post', 1, 0, NULL, NULL, 'Hello world!', 'publish', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-14 17:49:59', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-14 14:01:46', '2022-04-14 14:01:46'),
(5, 'http://localhost/parrot/blog/category/uncategorized/', '52:445f856930b98baa4fe81ed05f4bbfcf', 1, 'term', 'category', NULL, NULL, NULL, NULL, 'Uncategorized', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-14 17:49:59', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-15 15:34:23', '2022-04-14 14:01:46'),
(6, NULL, NULL, NULL, 'system-page', '404', NULL, NULL, 'Page not found %%sep%% %%sitename%%', NULL, 'Error 404: Page not found', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-14 17:49:59', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL),
(7, NULL, NULL, NULL, 'system-page', 'search-result', NULL, NULL, 'You searched for %%searchphrase%% %%page%% %%sep%% %%sitename%%', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-14 17:49:59', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL),
(8, NULL, NULL, NULL, 'date-archive', NULL, NULL, NULL, '%%date%% %%page%% %%sep%% %%sitename%%', '', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-14 17:49:59', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL),
(9, 'https://localhost/parrot/blog/', '30:c1a10ac0ffe481baf3aa538f7626e9fa', NULL, 'home-page', NULL, NULL, NULL, '%%sitename%% %%page%% %%sep%% %%sitedesc%%', 'High Quality Content in Seconds', 'Home', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '%%sitename%%', '', '', '0', NULL, NULL, NULL, NULL, NULL, '2022-04-14 17:49:59', '2022-05-17 15:58:28', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-15 15:34:23', '2022-04-14 14:01:46'),
(10, 'http://localhost/parrot/blog/2022/04/15/have-you-been-struggling-to-come-up-with-content/', '89:f7f2b86b7ccaf46d73c89ed0b1668efc', 17, 'post', 'post', 1, 0, NULL, NULL, 'Have you been struggling to come up with content?', 'publish', NULL, 0, NULL, NULL, NULL, NULL, NULL, 30, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-15 15:19:00', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-15 15:30:45', '2022-04-15 15:25:53'),
(13, 'http://localhost/parrot/blog/2022/04/15/generate-content-at-any-stage-of-the-process-2/', '87:9c974b466786c631999150507362b3b4', 23, 'post', 'post', 1, 0, NULL, NULL, 'Generate content at any stage of the process', 'publish', NULL, 0, NULL, NULL, NULL, NULL, NULL, 30, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-15 15:24:45', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-15 15:29:01', '2022-04-15 15:29:01'),
(14, 'http://localhost/parrot/blog/2022/04/15/john-gotti/', '51:d18eb8e473d4dc00713e173fd9a9e0d0', 27, 'post', 'post', 1, 0, NULL, NULL, 'John Gotti', 'publish', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-15 15:33:57', '2022-04-16 03:15:09', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-15 15:34:23', '2022-04-15 15:33:57'),
(15, 'http://localhost/parrot/blog/wp-content/uploads/2022/04/logo.png', '64:5ffac3af73b16a06e9b1ad62a136eedb', 30, 'post', 'attachment', 1, 0, NULL, NULL, 'logo', 'inherit', 0, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 'http://localhost/parrot/blog/wp-content/uploads/2022/04/logo.png', NULL, '30', 'attachment-image', NULL, NULL, NULL, '30', 'attachment-image', NULL, NULL, NULL, NULL, '2022-04-22 19:08:13', '2022-04-22 16:08:13', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-22 19:08:13', '2022-04-22 19:08:13'),
(16, 'http://localhost/parrot/blog/wp-content/uploads/2022/04/cropped-logo.png', '72:b50baf165a021e25bade0272923b136a', 31, 'post', 'attachment', 1, 0, NULL, NULL, 'cropped-logo.png', 'inherit', 0, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, 'http://localhost/parrot/blog/wp-content/uploads/2022/04/cropped-logo.png', NULL, '31', 'attachment-image', NULL, NULL, NULL, '31', 'attachment-image', NULL, NULL, NULL, NULL, '2022-04-22 19:08:28', '2022-04-22 16:08:28', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-04-22 19:08:28', '2022-04-22 19:08:28'),
(17, 'http://localhost/parrot/blog/?p=32', '34:d23e0557676880a6680b004fd609f3fd', 32, 'post', 'post', 1, 0, NULL, NULL, 'ParrotAI is ridiculously easy to use', 'draft', 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-17 18:58:22', '2022-05-17 15:58:22', 1, NULL, NULL, NULL, NULL, 0, NULL, 2, '2022-05-17 18:58:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wp_yoast_indexable_hierarchy`
--

CREATE TABLE `wp_yoast_indexable_hierarchy` (
  `indexable_id` int(11) UNSIGNED NOT NULL,
  `ancestor_id` int(11) UNSIGNED NOT NULL,
  `depth` int(11) UNSIGNED DEFAULT NULL,
  `blog_id` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_yoast_indexable_hierarchy`
--

INSERT INTO `wp_yoast_indexable_hierarchy` (`indexable_id`, `ancestor_id`, `depth`, `blog_id`) VALUES
(2, 0, 0, 1),
(3, 0, 0, 1),
(4, 0, 0, 1),
(5, 0, 0, 1),
(7, 0, 0, 1),
(9, 0, 0, 1),
(10, 0, 0, 1),
(13, 0, 0, 1),
(14, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_yoast_migrations`
--

CREATE TABLE `wp_yoast_migrations` (
  `id` int(11) UNSIGNED NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_yoast_migrations`
--

INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES
(1, '20171228151840'),
(2, '20171228151841'),
(3, '20190529075038'),
(4, '20191011111109'),
(5, '20200408101900'),
(6, '20200420073606'),
(7, '20200428123747'),
(8, '20200428194858'),
(9, '20200429105310'),
(10, '20200430075614'),
(11, '20200430150130'),
(12, '20200507054848'),
(13, '20200513133401'),
(14, '20200609154515'),
(15, '20200616130143'),
(16, '20200617122511'),
(17, '20200702141921'),
(18, '20200728095334'),
(19, '20201202144329'),
(20, '20201216124002'),
(21, '20201216141134'),
(22, '20210817092415'),
(23, '20211020091404');

-- --------------------------------------------------------

--
-- Table structure for table `wp_yoast_primary_term`
--

CREATE TABLE `wp_yoast_primary_term` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `term_id` bigint(20) DEFAULT NULL,
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_id` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_yoast_seo_links`
--

CREATE TABLE `wp_yoast_seo_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `target_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  `indexable_id` int(11) UNSIGNED DEFAULT NULL,
  `target_indexable_id` int(11) UNSIGNED DEFAULT NULL,
  `height` int(11) UNSIGNED DEFAULT NULL,
  `width` int(11) UNSIGNED DEFAULT NULL,
  `size` int(11) UNSIGNED DEFAULT NULL,
  `language` varchar(32) DEFAULT NULL,
  `region` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_yoast_seo_links`
--

INSERT INTO `wp_yoast_seo_links` (`id`, `url`, `post_id`, `target_post_id`, `type`, `indexable_id`, `target_indexable_id`, `height`, `width`, `size`, `language`, `region`) VALUES
(1, 'http://localhost/parrot/blog/wp-admin/', 2, NULL, 'internal', 3, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_templates`
--
ALTER TABLE `saved_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `wp_yoast_indexable`
--
ALTER TABLE `wp_yoast_indexable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_type_and_sub_type` (`object_type`,`object_sub_type`),
  ADD KEY `object_id_and_type` (`object_id`,`object_type`),
  ADD KEY `permalink_hash_and_object_type` (`permalink_hash`,`object_type`),
  ADD KEY `subpages` (`post_parent`,`object_type`,`post_status`,`object_id`),
  ADD KEY `prominent_words` (`prominent_words_version`,`object_type`,`object_sub_type`,`post_status`),
  ADD KEY `published_sitemap_index` (`object_published_at`,`is_robots_noindex`,`object_type`,`object_sub_type`);

--
-- Indexes for table `wp_yoast_indexable_hierarchy`
--
ALTER TABLE `wp_yoast_indexable_hierarchy`
  ADD PRIMARY KEY (`indexable_id`,`ancestor_id`),
  ADD KEY `indexable_id` (`indexable_id`),
  ADD KEY `ancestor_id` (`ancestor_id`),
  ADD KEY `depth` (`depth`);

--
-- Indexes for table `wp_yoast_migrations`
--
ALTER TABLE `wp_yoast_migrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wp_yoast_migrations_version` (`version`);

--
-- Indexes for table `wp_yoast_primary_term`
--
ALTER TABLE `wp_yoast_primary_term`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_taxonomy` (`post_id`,`taxonomy`),
  ADD KEY `post_term` (`post_id`,`term_id`);

--
-- Indexes for table `wp_yoast_seo_links`
--
ALTER TABLE `wp_yoast_seo_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_direction` (`post_id`,`type`),
  ADD KEY `indexable_link_direction` (`indexable_id`,`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saved_templates`
--
ALTER TABLE `saved_templates`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=963;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_yoast_indexable`
--
ALTER TABLE `wp_yoast_indexable`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wp_yoast_migrations`
--
ALTER TABLE `wp_yoast_migrations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `wp_yoast_primary_term`
--
ALTER TABLE `wp_yoast_primary_term`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_yoast_seo_links`
--
ALTER TABLE `wp_yoast_seo_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
