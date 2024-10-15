-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2023 at 03:59 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.29-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklite`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminwinning`
--

CREATE TABLE `adminwinning` (
  `id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `type` varchar(256) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `title`) VALUES
(2, 'https://colormoon.in/sklite/img/banner.png', 1, 'Banner1'),
(16, 'https://colormoon.in/sklite/admin/img/13-06-2023ludo_banner.png', 1, 'Ludo'),
(17, 'https://colormoon.in/sklite/admin/img/13-06-2023bannerludonew.png', 1, 'ludo');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `bonus_type` varchar(30) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`id`, `date`, `user_id`, `bonus_type`, `bonus`) VALUES
(1, '2023-06-20 15:35:41', 146, 'Signup', 10),
(2, '2023-06-20 17:37:33', 147, 'Signup', 10),
(3, '2023-06-20 19:15:24', 149, 'Signup', 10),
(4, '2023-06-21 15:27:24', 150, 'Signup', 10),
(5, '2023-06-21 20:07:37', 151, 'Signup', 10),
(6, '2023-06-22 19:02:32', 152, 'Signup', 10),
(7, '2023-06-22 20:08:27', 153, 'Signup', 10),
(8, '2023-06-23 10:26:35', 154, 'Signup', 11),
(9, '2023-06-23 10:32:22', 155, 'Signup', 11),
(10, '2023-06-23 10:42:09', 156, 'Signup', 10),
(11, '2023-06-23 16:30:39', 156, 'Deposit Transfer', 2),
(12, '2023-06-23 16:39:08', 156, 'Winning Transfer', 2),
(13, '2023-06-23 16:41:32', 156, 'Bonus Transfer', 2),
(14, '2023-06-24 13:40:10', 154, 'Deposit Transfer', 100),
(15, '2023-06-24 13:41:18', 154, 'Bonus Transfer', 100),
(16, '2023-06-27 10:30:01', 155, 'Deposit Transfer', 1),
(17, '2023-06-30 16:16:54', 112, 'Payment Deposit', 10),
(18, '2023-07-01 15:34:13', 157, 'Signup', 10),
(19, '2023-07-03 16:29:29', 158, 'Signup', 10),
(20, '2023-07-04 12:40:58', 159, 'Signup', 10),
(21, '2023-07-04 20:20:27', 160, 'Signup', 10),
(22, '2023-07-04 21:35:27', 160, 'Payment Deposit', 25),
(23, '2023-07-04 21:38:33', 160, 'Payment Deposit', 500),
(24, '2023-07-05 10:46:07', 161, 'Signup', 10),
(25, '2023-07-05 10:50:17', 162, 'Signup', 10),
(26, '2023-07-05 11:08:36', 163, 'Signup', 10),
(27, '2023-07-05 11:12:25', 164, 'Signup', 10),
(28, '2023-07-05 16:25:35', 163, 'Payment Deposit', 25),
(29, '2023-07-05 16:32:46', 163, 'Deposit Transfer', 200),
(30, '2023-07-11 11:04:28', 165, 'Signup', 10),
(31, '2023-07-12 10:58:35', 166, 'Signup', 10),
(32, '2023-07-12 11:23:47', 135, 'Payment Deposit', 25),
(33, '2023-07-13 19:45:22', 167, 'Signup', 10),
(34, '2023-07-13 19:49:35', 168, 'Signup', 10),
(35, '2023-07-14 20:01:08', 169, 'Signup', 10),
(36, '2023-07-15 14:26:30', 170, 'Signup', 10),
(37, '2023-07-15 14:28:16', 171, 'Signup', 10),
(38, '2023-07-17 14:09:58', 172, 'Signup', 10),
(39, '2023-07-17 14:11:39', 173, 'Signup', 10),
(40, '2023-07-17 16:18:30', 174, 'Signup', 10),
(41, '2023-07-17 16:20:03', 175, 'Signup', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `name`, `slug`, `description`) VALUES
(1, 'About Us', 'about_us', '<h2>Preface</h2>\r\n\r\n<p>In India, <a href=\"https://google.com\" target=\"_blank\">Colourmoon Technologies</a> Pvt Ltd is a leading-edge, award-winning firm that develops mobile games. We handle every aspect of starting a successful Ludo game business, from application development to support and maintenance. A brief description of our services as a top-rated Ludo game development company follows. In addition, we provide CM-Ludo to save you time and money by eliminating the need to build an app from scratch.</p>\r\n\r\n<p>We developed exemplary applications across multiple platforms, including Android, iOS, and desktop, driven by our passion to be the best Ludo game development company in India. Our clients have the opportunity to experience the power of personalized services from experienced Ludo game developers through seamless communication from us. We strive to deliver the highest level of client satisfaction using CM-Ludo</p>\r\n'),
(2, 'Privacy Policy', 'privacy_policy', '<p>CM-Ludo requires the user to provide certain information to avail the services provided by us. This Privacy Policy forms a part of our Terms of Services and is a statement that explains what information we collect from our members &amp; users and how we use the information. Please register on CM-Ludo only if you consent to share the mandatory information required during the registration process. Please read this Privacy Policy carefully before using CM-Ludo services.</p>\r\n\r\n<p><strong>Privacy Policy</strong></p>\r\n\r\n<p>What information do we collect from our Users?</p>\r\n\r\n<p>We require users to register with us in order to access the games &ndash; both free &amp; cash games. Personal Information of the User is information that identifies the User to CM-Ludo, as an individual. For this, we collect the following:<br />\r\n&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Mobile Verification(OTP).</p>\r\n	</li>\r\n	<li>\r\n	<p>Login/Register.</p>\r\n	</li>\r\n	<li>\r\n	<p>Push Notifications.</p>\r\n	</li>\r\n	<li>\r\n	<p>Play with Real Players (2/4 Players).</p>\r\n	</li>\r\n	<li>\r\n	<p>Winning Wallet.</p>\r\n	</li>\r\n	<li>\r\n	<p>Bonus Wallet.</p>\r\n	</li>\r\n	<li>\r\n	<p>Chat with a Player.</p>\r\n	</li>\r\n	<li>\r\n	<p>Refer a Friend.</p>\r\n	</li>\r\n	<li>\r\n	<p>Choose Bet Value.</p>\r\n	</li>\r\n	<li>\r\n	<p>Classic/ Master/ Quick - Game Modes.</p>\r\n	</li>\r\n	<li>\r\n	<p>Refer and Earn - Real Cash.</p>\r\n	</li>\r\n	<li>\r\n	<p>Update KYC.</p>\r\n	</li>\r\n	<li>\r\n	<p>Withdraw Request / History.</p>\r\n	</li>\r\n	<li>\r\n	<p>Game Transactions.</p>\r\n	</li>\r\n	<li>\r\n	<p>Payment Transactions.</p>\r\n	</li>\r\n	<li>\r\n	<p>Game Sound (ON / OFF).</p>\r\n	</li>\r\n	<li>\r\n	<p>Vibrations (ON / OFF).</p>\r\n	</li>\r\n	<li>\r\n	<p>Private Table Play.</p>\r\n	</li>\r\n	<li>\r\n	<p>Computer Play.</p>\r\n	</li>\r\n	<li>\r\n	<p>Chat / Emoji.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>If you do not provide the required information, you may not be able to access the features we provide. Such information is not associated with your personal information and cannot be linked to you personally. CM-Ludo is the sole owner of the information collected on this site and the above information will be only for internal use, to avoid fraud detection or for trend analysis. We will not sell, share, or rent this information to others or use in ways different from what is disclosed in this statement.</p>\r\n\r\n<p><strong>Do we disclose your information to any third parties?</strong></p>\r\n\r\n<p>No, we do not disclose your personal information to any third party without first receiving your permission, unless mandated by law or on demand of a statutory authority, in which event we shall inform you of the same before disclosing the information. By registering on our website, however, you grant permission for your personal information to be shared and/or used as stated in this Privacy Policy. We may need to disclose information when required by law. CM-Ludo has the required security to protect the loss, misuse and alteration of information you provide us. Your registration data is password protected where only you can access your information. We are not responsible for any activity which is undertaken when your password is used. We suggest you not to disclose your password to anyone.</p>\r\n\r\n<p><strong>What are you consenting to?</strong></p>\r\n\r\n<p>By using our website, it is understood that you have given your consent to the collection and use of this information by CM-Ludo &amp; its partners and affiliates in future, who shall use the information strictly in terms hereof, or in terms of any amendment hereto. From time to time, we may change our methods of collecting information and modify our Privacy Policy. We will post those changes on this page so that you are always aware of what information we collect, how we use it, and under what circumstances we disclose it.</p>\r\n\r\n<p><strong>What other information do we collect and store?</strong></p>\r\n\r\n<p>We use cookies and other technologies such as pixel tags and clear gifs to store certain types of information each time you visit any page on our website. Cookies enable this website to recognize the information you have consented to give to this website and help us determine what portions of this website are most appropriate for your professional needs. We may also use cookies to serve advertising banners to you. These banners may be served by us or by a third party on our behalf. These cookies will not contain any personal information. Whether you want your web browser to accept cookies or not is up to you. If you haven&rsquo;t changed your computer&rsquo;s settings, most likely your browser already accepts cookies. If you choose to decline cookies, you may not be able to fully experience all the features of the website. You can also delete your browser cookies or disable them entirely. CM-Ludo cookies are kept for lifetime on customers&rsquo; devices. But this may significantly impact your experience with our website and may make parts of our website nonfunctional or inaccessible. We recommend that you leave them turned on. We use third-party service providers to serve ads on our behalf across the Internet and sometimes on this site using a pixel tag or SDK, which is industry standard technology used by most major websites. No personally identifiable information is collected or used in this process. They do not know the name, phone number, address, email address, or any personally identifying information about the user.</p>\r\n\r\n<p><strong>Mobile Number Verification &ndash; Do you have to do it?</strong></p>\r\n\r\n<p>Yes. Apt cot CM-Ludo you are required to validate your Mobile number for playing Cash games. This is to safeguard fraud of any form at CM-Ludo. All your information is kenfidential &amp; not&nbsp;shared with any person or party for any given reason. It is a mandatory process for all cash users to follow the process of mobile authentication at CM-Ludo.</p>\r\n\r\n<p><strong>How do we protect your Personal Information?</strong></p>\r\n\r\n<p>Notwithstanding anything to the contrary in this Policy, we may preserve or disclose your information if we believe that it is reasonably necessary to comply with a law, regulation or legal request; to protect the safety of any person; to address fraud, security or technical issues; or to protect CM-Ludo rights or property. However, nothing in this Privacy Policy is intended to limit any legal defenses or objections that you may have to a third party, including a government&rsquo;s request, to disclose your information. CM-Ludo uses reasonable organizational, technical and administrative measures to protect information under our control.</p>\r\n\r\n<p>We use reasonable organizational, technical and administrative measures to protect Personal Information under our control. However, no data transmission over the Internet or data storage system can be guaranteed to be 100% secure. If Users have reason to believe that their interaction with CM-Ludo features are no longer secure (for example, if they feel that the security of any account they might have with CM-Ludo has been compromised), it is their duty to immediately notify CM-Ludo of the problem by contacting the customer service personnel, and we shall take necessary action as we may deem fit, under the circumstances. CM-Ludo shall not be held responsible for any activity in your account which results from your failure to keep your personal or other information secure.</p>\r\n\r\n<p>Once you register with our services, you are made available with necessary tools and account settings to access or change the personal information you have provided to us, pursuant to your registration, which are associated with your account.</p>\r\n\r\n<p>This Privacy Policy is to be read conjointly with Terms of Use, and wherever applicable, the meaning to the terms of this policy shall be derived by a conjoint reading with that of the Terms of Use of CM-Ludo.</p>\r\n\r\n<p>We may amend or revise this Privacy Policy from time to time. The most current version of the policy will govern our use of your information and your use of the services. By continuing to access or use the services after such changes become effective, you agree to be bound by the revised/amended Privacy Policy.</p>\r\n\r\n<p>This Privacy Policy shall be governed by the laws of India. All disputes, claims, causes relating to and arising out of this Privacy Policy shall be subject to the exclusive jurisdiction of the courts at Bangalore, Karnataka</p>\r\n\r\n<p><strong>For any query you can write to mh@thecolourmoon.com.</strong></p>\r\n\r\n<p><strong>For more details please refer to our Terms of Service.</strong></p>\r\n');
INSERT INTO `cms` (`id`, `name`, `slug`, `description`) VALUES
(3, 'Terms & Conditions', 'ters_and_conditions', '<p>The General Term&#39;s and Condition&#39;s (&quot;<strong>Terms</strong>&quot;) displayed on this website, and the content and services available on or through any of the foregoing, shall hereinafter be referred to as the &quot;Agreement&quot; provided to you (&quot;<strong>Customer</strong>/<strong>User/ Player</strong>&quot;) by Colourmoon Technologies Pvt Ltd.</p>\r\n\r\n<h2><a href=\"https://google.com\" target=\"_blank\">INTRODUCTION</a></h2>\r\n\r\n<p>This document is an electronic record in terms of the Information Technology Act, 2000 and rules there under as applicable. This electronic record is generated by a computer system and does not require any physical or digital signatures.</p>\r\n\r\n<h1>CM-Ludo</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CM-Ludo&nbsp;is the flagship brand of&nbsp;Colourmoon Technologies Pvt Ltd.</p>\r\n\r\n<p>Through CM-Ludo one can play a traditional Ludo game against any real player who is online &amp; can also play against their friend.</p>\r\n\r\n<p>One can also play against computer to practice their moves</p>\r\n\r\n<h3><strong>General Provisions</strong></h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://thecolourmoon.com/index.php\" target=\"_blank\">https://thecolourmoon.com/</a> is the brand/ digital platform of Colourmoon Technologies Pvt Ltd&nbsp;which develops and offers various digital services.&nbsp; &nbsp;Our online mobile applications/ games have refer and earn plan through various contests and games (&quot;<strong>Games / Contest</strong>&quot;) that can be downloaded from the APP Stores of various providers or directly</li>\r\n	<li>The Games are only offered to natural persons (&quot;<strong>User/s</strong>&quot; or &quot;&nbsp;<strong>Customer/s</strong>&quot; or &quot;<strong>Player/s</strong>&quot;) who conclude a legal transaction for purposes which can predominantly neither be attributed to their commercial nor their self-employed professional activity.</li>\r\n	<li>All Games made by Colourmoon are provided exclusively on the basis of the Terms.</li>\r\n	<li>The Terms are displayed when downloading each Game, within the Game, on the company website (<a href=\"https://thecolourmoon.com/\" target=\"_blank\">https://thecolourmoon.com/</a>&nbsp;) (&quot;<strong>Site</strong>&quot;)</li>\r\n	<li>&nbsp;We may change, suspend, or cease all or any part of the Site and at its discretion can discard or remove any submissions made by the User which are not as per the Terms or the applicable laws and it may extend to deactivate the User&#39;s account;</li>\r\n	<li>Once the User make its account on https://thecolourmoon.com/, he/she may be entitled for any bonus or joining points as per our terms (&quot;<strong>Bonus Points</strong>&quot;) which shall be credited in User&#39;s account and can be used only for participation in Games. Any Bonus Points or other points earned by the User shall be transferred to their designated online/ digital wallet. The User shall be responsible for any transaction which its happens through their Wallet.</li>\r\n	<li>The words &ldquo;we&rdquo;, &ldquo;us&rdquo;, &ldquo;our&rdquo;, &ldquo;Colourmoon&rdquo; are referred in various contexts for convenience purpose, address one and the same &ndash; parent company Colourmoon Technologies Pvt Ltd, where our services are hosted at <a href=\"https://thecolourmoon.com/\" target=\"_blank\">https://thecolourmoon.com/</a></li>\r\n</ul>\r\n\r\n<h2>Usage of Services</h2>\r\n\r\n<p>By using our services, you agree that you are lawfully competent and able to enter into the terms, conditions, obligations, representations and responsibilities set forth in these terms of service which may be amended from time to time, and to abide and comply with these terms. We may update and change any or all of these terms at any time. it is your responsibility to review these terms periodically, and continued use of the services after any such changes have been made and posted shall constitute your consent to such changes.</p>\r\n\r\n<p>Please read the terms and conditions carefully. by accessing and using the services in any manner, you agree to become bound by the terms and conditions of this agreement. if you do not agree to be bound by such terms and conditions, you must not access or use the services.</p>\r\n\r\n<p>If you do not abide by the provisions of these terms &amp; conditions, except as we may otherwise provide from time to time, you agree that we may immediately deactivate or delete your user account and all related information and files in your user account and/or restrict any further access to such information and/or files, or our services, with or without notice.</p>\r\n\r\n<p>You must exercise caution, good sense and sound judgment in using the services. you are prohibited from violating, or attempting to violate, the security of the services. any such violations may result in criminal and/or civil penalties against you. We will investigate any alleged or suspected violations and if a criminal violation is suspected, Colourmoon may contact and/or cooperate with law enforcement agencies in their investigations.</p>\r\n\r\n<h2>DEFINITIONS</h2>\r\n\r\n<ul>\r\n	<li>&ldquo;Subscriber&rdquo; shall mean the rightful user of our services, in whose name the mobile phone number (MSISDN) is registered with us. In the event the user number / connection is registered in the name of a company/ firm, the employee who is authorized to use the MSISDN shall submit a No Objection Certificate (NoC) and authorization letter of the employer duly permitting the employee to use the number for subscribing our services and accept the terms applicable herein. This shall not be applicable on Recharge prize.</li>\r\n	<li>Organizer: under this T&amp;C shall mean Colourmoon who shall be responsible for conceptualizing, organizing and hosting these services</li>\r\n	<li>&ldquo;Member(s)&rdquo; or &ldquo;Participants&rdquo; means (i) Active Subscribers who meet the eligibility criteria specified in these Terms and Conditions, (ii) who belong to Circle(s) and have successfully activated, and (iii) who are subscribed, as described in the subscription process here under.</li>\r\n	<li>&ldquo;Eligible Subscriber&rdquo; shall mean an Active Subscriber of satisfying the following criteria at the time of participation and during continuation of Services:&ndash;\r\n	<ol>\r\n		<li>He/she must be of at least 18 years of age;</li>\r\n		<li>He/she must be a citizen of India;</li>\r\n		<li>He/she must be an active Subscriber</li>\r\n		<li>He/she must be responsible to activate and subscribe to the services, thereby become a member. He/she must belong to any of the telecom services run in India</li>\r\n		<li>He/she must not be of an unsound mind; and</li>\r\n		<li>He/she must not be under any legal disability e.g. insolvency, restraint by court orders etc. and / or is prohibited from entering any contractual relationship.</li>\r\n		<li>He/she must not have been subject of any criminal proceeding;</li>\r\n		<li>Our services will be known by and be made available in English language only</li>\r\n		<li>Participants playing the paid formats of the Contest(s) confirm that they are not residents of any of the following Indian states - Assam, Odisha, Sikkim, Andhra Pradesh, Nagaland or Telangana. If it is found that a Participant playing the paid formats of the Contest(s) is a resident of any of the above mentioned states, Colourmoon shall disqualify such participant and forfeit any prize won by such participant.</li>\r\n		<li>Further, the pack members who participate in the game/ service and are chosen as winners of each category of prizes in accordance with the winner selection process under the Terms and Conditions, shall be required to be the registered subscribers of the winning mobile phone number and not merely the players using such mobile number (&ldquo;Winner(s)&rdquo;). If the Winner is not able to provide sufficient evidence to show that he/she is the subscriber of the winning mobile number, the organizers reserves the right to award the prize to the next eligible winner or to forfeit the prize, at its sole discretion. The confirmation is not required in- case of recharge prize.</li>\r\n		<li>The employees of the organizers and or their group companies, affiliate or associate companies and their relatives/ dependents (First blood/Spouse of immediate member) shall not be eligible to avail our services. If found otherwise, then the organizers reserves the right to forfeit the prize. If an employee of the organizers leaves the organization when the service is launched or leave during Game Period/ before Winner list announcement / after Winner&rsquo;s list is announced, the employee will not be eligible to avail service.</li>\r\n		<li>The Organizers reserve the right, at any time, to unconditionally disqualify any Participant who tampers with or who in any way abuses the process or Terms and Conditions of the Game. Failure by the Organizer to enforce any of the Terms and Conditions in any instance shall not be deemed to be a waiver of that Term and Condition and shall not give rise to any claim by any person. The decision of the Organizer shall at all times be binding and final.</li>\r\n	</ol>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Conclusion of Contract, Term, Termination</h2>\r\n\r\n<ol>\r\n	<li>The User confirms to have full legal capacity and, in the case of restricted legal capacity, to have obtained the consent of his/her legal guardian.</li>\r\n	<li>The contract for the use of services is concluded by downloading from the respective App Store. Details of this process can be found in the terms of use of the respective App Store. The download creates a contract between the User and Colourmoon for the use of the respective service. The corresponding license and usage agreement on the basis of the Terms is concluded for an indefinite period of time and may be terminated by either party at any time, subject to Section 2.3, without specifying any reasons by providing notice of four weeks.</li>\r\n	<li>Colourmoon may charge its users a platform or subscription fee in respect of any services. All the payments done by the user for a subscription must be done by credit card, debit card, or any other valid payment method, along with applicable taxes, and all the information provided by user in connection with such purchase must be accurate and complete. The user agree that all payments made in connection with subscription are non-refundable unless otherwise specified in these Terms. Colourmoon shall, without delay, repay such platform fee in the event of suspension or removal of the User&#39;s account services on account of any negligence or deficiency on the part of Colourmoon, but not if such suspension or removal is effected due to:\r\n	<ol>\r\n		<li>any breach or inadequate performance by the User of any of the Terms; or</li>\r\n		<li>any circumstances beyond the reasonable control of Colourmoon.</li>\r\n	</ol>\r\n	</li>\r\n	<li>It is recommended to always install the latest version of the services. We only obligated to provide the full scope of performance and the correct&nbsp;</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>functionality for the current version of the Game.</li>\r\n	<li>In the event of ordinary termination by the User or termination by us for good cause, no reimbursement of paid fees shall take place. Colourmoon shall be&nbsp;</li>\r\n	<li>entitled to continue to charge all outstanding fees for the period of which User has subscribed.&nbsp;</li>\r\n	<li>The User may not transfer this agreement to third parties. In the event of a breach of this provision (account transfer), Colourmoon shall be entitled to&nbsp;</li>\r\n	<li>terminate the agreement without notice. In such event, a prorated refund shall also be excluded.</li>\r\n	<li>The statutory right to extraordinary termination of this agreement without notice for good cause shall not be affected.</li>\r\n</ul>\r\n\r\n<h2>Intellectual Property</h2>\r\n\r\n<p>Colourmoon includes a combination of content created by itself, its partners, licensors, associates and/or users. The intellectual property rights (&quot;Intellectual Property Rights&quot;)in all software underlying and material published, including (but not limited to) games, Contests, software, advertisements, written content, photographs, graphics, images, illustrations, marks, logos, audio or video clippings and Flash animation, is owned by Colourmoon, its partners, licensors and/or associates. Users may not modify, publish, transmit, participate in the transfer or sale of, reproduce, create derivative works of, distribute, publicly perform, publicly display, or in any way exploit any of the materials or content on our platforms either in whole or in part without express written license from us.</p>\r\n\r\n<p>Users may request permission to use any content by writing to our helpdesk</p>\r\n\r\n<p>Users are solely responsible for all materials (whether publicly posted or privately transmitted) that they upload, post, e-mail, transmit, or otherwise make available.&nbsp;Each User represents and warrants that he/she owns all Intellectual Property Rights in the User&#39;s Content and that no part of the User&#39;s Content infringes any third party rights. Users further confirm and undertake to not display or use of the names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights of any third party on our platforms. Users agree to indemnify and hold harmless Colourmoon, its directors, employees, affiliates and assigns against all costs, damages, loss and harm including towards litigation costs and counsel fees, in respect of any third party claims that may be initiated including for infringement of Intellectual Property Rights arising out of such display or use of the names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights on Colourmoon, by such User or through the User&#39;s commissions or omissions.</p>\r\n\r\n<p>Users hereby grant us and our affiliates, partners, licensors and associates a worldwide, irrevocable, royalty-free, non-exclusive, sub-licensable license to use, reproduce, create derivative works to distribute, publicly perform, publicly display, transfer, transmit, and/or publish Users&#39; Content for any of the following purposes:</p>\r\n\r\n<ol>\r\n	<li>Displaying Users&#39; Content on various medium</li>\r\n	<li>Distributing Users&#39; Content, either electronically or via other media, to other Users seeking to download or otherwise acquire it, and/or</li>\r\n	<li>Storing Users&#39; Content in a remote database accessible by end users, for a charge.</li>\r\n	<li>This license shall apply to the distribution and the storage of Users&#39; Content in any form, medium, or technology.</li>\r\n</ol>\r\n\r\n<p>All names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights on our media belonging to any person (including User), entity or third party are recognized as proprietary to the respective owners and any claims, controversy or issues against these names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights must be directly addressed to the respective parties under notice to Colourmoon</p>\r\n\r\n<h2>Account and User data</h2>\r\n\r\n<ol>\r\n	<li>Upon conclusion of the contract and use of the Game, we shall store the progress of the Game and any additional content. For more information, please refer to&nbsp;<a href=\"https://OneTo11.com/privacy-policy\" target=\"_blank\">Privacy policy</a>.</li>\r\n	<li>The User must select secure access credentials and not make such data available to third parties. We are not responsible for any damage resulting from the breach of this duty. In the event of suspected abuse, we are entitled to temporarily block access to the services in question.</li>\r\n	<li>If the user select a username in the game, this must not violate applicable laws and/or the terms. We shall be entitled to change or delete the name in the event of a breach of this provision, either at the instigation of a third party or on its own initiative. No separate justification for the name change shall be necessary. The User has no claim to a specific name. Other rights in the event of a breach of this provision shall not be affected</li>\r\n</ol>\r\n\r\n<h2>Colourmoon may, at its sole and absolute discretion:</h2>\r\n\r\n<ol>\r\n	<li>Restrict, suspend, or terminate any user&#39;s access to all or any part of services</li>\r\n	<li>Change, suspend, or discontinue all or any part of the Services</li>\r\n	<li>Reject, move, or remove any material that may be submitted by a user</li>\r\n	<li>Move or remove any content that is available</li>\r\n	<li>Deactivate or delete a User&#39;s account and all related information and files on the account</li>\r\n	<li>Establish general practices and limits concerning the use</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>In the event any user breaches, or we reasonably believe that such user has breached these Terms and Conditions, or has illegally or improperly used our services, we may, at our sole and absolute discretion, and without any notice to the user, restrict, suspend or terminate such User&#39;s access to all or any part of services, deactivate or delete the User&#39;s account and all related information on the account, delete any content posted by the user and further, take technical and legal steps as we deem necessary.</li>\r\n</ul>\r\n\r\n<h2><em>Third Party Sites, Services and Products</em></h2>\r\n\r\n<ul>\r\n	<li>Our medium may contain links to other Internet sites owned and operated by third parties. Users&#39; use of each of those sites is subject to the conditions, if any, posted by the sites. We do not exercise control over any Internet sites apart from ours, and cannot be held responsible for any content residing in any third party Internet site. Our inclusion of third-party content or links to third-party Internet sites is not an endorsement of such third-party Internet sites.</li>\r\n	<li>Users&#39; correspondence, transactions or related activities with third parties, including payment providers and verification service providers, are solely between the User and that third party. Users&#39; correspondence, transactions and usage of the services of such third party shall be subject to the terms and conditions, policies and other service terms adopted/implemented by such third party, and the User shall be solely responsible for reviewing the same prior to transacting or availing of the services of such third party. User agrees that Colourmoon will not be responsible or liable for any loss or damage of any sort incurred as a result of any such transactions with third parties. Any questions, complaints, or claims related to any third party product or service should be directed to the appropriate vendor.</li>\r\n	<li>We may contain self created content that is created as well as content provided by third parties. We don&rsquo;t guarantee the accuracy, integrity, quality of the content provided by third parties and such content may not relied upon by the Users in utilizing the services provided, including while participating in any of the contests hosted by us</li>\r\n</ul>\r\n\r\n<h2>Privacy Policy</h2>\r\n\r\n<p>All information collected from Users, such as registration and credit card information, is subject to&nbsp; Colourmoon&nbsp;Privacy Policy which is available at Privacy Policy</p>\r\n\r\n<h2>User Conduct</h2>\r\n\r\n<ul>\r\n	<li>Users agree to provide true, accurate, current and complete information at the time of registration and at all other times (as required). Users further agree to update and keep updated their registration information.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;A User shall NOT register or operate more than one User account</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree to ensure that they can receive all communication from US by marking emails as part of their &quot;safe senders&rdquo; list. We shall not be held liable if any email remains unread by a user as a result of such e-mail getting delivered to the User&#39;s junk or spam folder.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any password issued to a User may not be revealed to anyone else. Users may not use anyone else&#39;s password. Users are responsible for maintaining the confidentiality of their accounts and passwords. Users agree to immediately notify us of any unauthorized use of their passwords or accounts or any other breach of security.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree to exit/log-out of their accounts at the end of each session. We shall not be responsible for any loss or damage that may result if the User fails to comply with these requirements.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree not to use cheats, exploits, automation, software, bots, hacks or any unauthorized third party software designed to modify or interfere with services and/or our experience or assist in such activity.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree not to copy, modify, rent, lease, loan, sell, assign, distribute, reverse engineer, grant a security interest in, or otherwise transfer any right to the technology or software underlying our services.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree that without our express written consent, they shall not modify or cause to be modified any files or software that are part of our services.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree not to disrupt, overburden, or aid or assist in the disruption or overburdening of (a) any computer or server used to offer or support our services (each a &quot;Server&quot;); or (2) the enjoyment of our services by any other User or person.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree not to institute, assist or become involved in any type of attack, including without limitation to distribution of a virus, denial of service, or other attempts to disrupt services or any other person&#39;s use or enjoyment of services.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users shall not attempt to gain unauthorized access to the User accounts, Servers or networks connected to our services by any means other than the user interface provided, including but not limited to, by circumventing or modifying, attempting to circumvent or modify, or encouraging or assisting any other person to circumvent or modify, any security, technology, device, or software that underlies or is part of our services.</li>\r\n</ul>\r\n\r\n<p>Without limiting the foregoing, Users agree not to use our services for any of the following:</p>\r\n\r\n<ol>\r\n	<li>To engage in any obscene, offensive, indecent, racial, communal, anti-national, objectionable, defamatory or abusive action or communication;</li>\r\n	<li>To harass, stalk, threaten, or otherwise violate any legal rights of other individuals;</li>\r\n	<li>To publish, post, upload, e-mail, distribute, or disseminate (collectively, &quot;Transmit&quot;) any inappropriate, profane, defamatory, infringing, obscene, indecent, or unlawful content;</li>\r\n	<li>To Transmit files that contain viruses, corrupted files, or any other similar software or programs that may damage or adversely affect the operation of another person&#39;s computer, any software, hardware, or telecommunications equipment;</li>\r\n	<li>To advertise, offer or sell any goods or services for any commercial purpose without the express written consent</li>\r\n	<li>To Transmit content regarding services, products, surveys, contests, pyramid schemes, spam, unsolicited advertising or promotional materials, or chain letters;</li>\r\n	<li>To download any file, recompile or disassemble or otherwise affect our products that you know or reasonably should know cannot be legally obtained in such manner;</li>\r\n	<li>To falsify or delete any author attributions, legal or other proper notices or proprietary designations or labels of the origin or the source of software or other material;</li>\r\n	<li>To restrict or inhibit any other user from using and enjoying any public area within our sites;</li>\r\n	<li>To collect or store personal information about other users;</li>\r\n	<li>To interfere with or disrupt servers, or networks;</li>\r\n	<li>To impersonate any person or entity, including, but not limited to, a representative of Colourmoon, or falsely state or otherwise misrepresent User&#39;s affiliation with a person or entity;</li>\r\n	<li>To forge headers or manipulate identifiers or other data in order to disguise the origin of any content transmitted through us or to manipulate User&#39;s presence on our medium</li>\r\n	<li>To take any action that imposes an unreasonably or disproportionately large load on our infrastructure;</li>\r\n	<li>To engage in any illegal activities. You agree to use our bulletin board services, chat areas, news groups, forums, communities and/or message or communication facilities (collectively, the &quot;Forums&quot;) only to send and receive messages and material that are proper and related to that particular Forum.</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>If a user chooses a username that, in our considered opinion is obscene, indecent, abusive or that might subject to public disparagement or scorn, we reserve the right, without prior notice to the user, to change such username and intimate the user or delete such username and posts, deny such user access, or any combination of these options.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Unauthorized access to our services is a breach of these Terms and Conditions, and a violation of the law. Users agree not to access by any means other than through the interface that is provided. Users agree not to use any automated means, including, without limitation, agents, robots, scripts, or spiders, to access, monitor, or copy any part of our sites, except those automated means that we have approved in advance and in writing.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Usage of our services is subject to existing laws and legal processes. Nothing contained in these Terms and Conditions shall limit our right to comply with governmental, court, and law-enforcement requests or requirements relating to use</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users may contact Helpdesk with problems or questions, as appropriate.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Persons below the age of eighteen (18) years are not allowed to make any purchases or redemption &amp; consequent participation in any activity or application is not permitted and such person is subject to disqualification at the sole and absolute discretion of Colourmoon, whenever it comes to our knowledge</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We believe that parents should supervise their children&#39;s online activities and consider using parental control tools available from online services and software manufacturers that help provide a child- friendly online environment. These tools can also prevent children from disclosing online their name, address and other personal information without parental permission.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Although persons below the age of 18 years are allowed to use certain services it is limited to play only on practice mode.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Colourmoon&nbsp;may not be held responsible for any content contributed by users</li>\r\n</ul>\r\n\r\n<h2>Registration</h2>\r\n\r\n<p>In order to register for the Contest(s), Participants may required to accurately provide the following information:</p>\r\n\r\n<ul>\r\n	<li>1. Name or User Name</li>\r\n	<li>2. E-mail address</li>\r\n	<li>3. Mobile Number</li>\r\n	<li>4. Password</li>\r\n</ul>\r\n\r\n<p>Note: Users may require to share his /her KYC Compliant bank account details correctly</p>\r\n\r\n<ul>\r\n	<li>We are not liable for any transaction, if details provided by the user are incorrect.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users will receive the proceedings in their &nbsp;bank account within 24-48 hrs of &nbsp;&nbsp;&nbsp;submitting a redeem request.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>If there is any delay in redemption, a user can contact helpdesk.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users may also be required to confirm that they have read, and shall abide by, these Terms and Conditions.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>In the event a user indicates, while entering an address, that he/she is a resident of either Assam,Nagaland,Odisha,Sikkim,Telangana or Andhra Pradesh such user will not be permitted to proceed to sign up for any round in the services involving payment/ cash transaction as described below.</li>\r\n</ul>\r\n\r\n<p>Contest(s), Participation and Prizes</p>\r\n\r\n<ul>\r\n	<li>We offer a platform where one can purchase coins through Credit card, Net Banking, Debit card, UPI or Paytm wallet. Through purchased coins a user can challenge his / her friend or any random online player &amp; can play a game against any opponent by selecting a proper playing table.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any user who loses the game, will get their coins deducted at the very instant of losing the game equivalent to the playing table amount &amp; the user who wins the game will get the winning coins in their digital wallet.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>For every winning, Colourmoon will deduct 20 % of the winning coins as a service charge &nbsp;/ platform fee</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Won coins would be immediately reflected in the winner&rsquo;s wallet after deduction of service charge / platform fee</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>A user can redeem/ sell their coins in their digital wallet by submitting a redeem request in prescribed manner</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>A user can redeem coins from their wallet if &amp; only if participant&rsquo;s win wallet has a minimum of 50 coins.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We shall not charge any processing fee for the redemption.</li>\r\n	<li>Any user who exits the game in between or not play on his turn for thrice would be considered a loser &amp; coins would be deducted from his account &amp; credited to winner&rsquo;s wallet.</li>\r\n	<li>Colourmoon is not liable for any network connectivity issue faced by user.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Platform will give users 120 seconds ( 2 minutes ) of airtime to resettle its connectivity &amp; completion of the game.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users can use their coins in 1 on 1 mode &amp; friends mode. Coins would be unused in practice mode</li>\r\n</ul>\r\n\r\n<h2>Legality of Game of Skill</h2>\r\n\r\n<ul>\r\n	<li>Games of skill are legal, as they are excluded from the ambit of Indian gambling legislation including, the Public Gambling Act of 1867.The Indian Supreme Court in the cases of State of Andhra Pradesh v. K Satyanarayana (AIR 1968 SC 825) and KR Lakshmanan v. State of Tamil Nadu (AIR 1996 SC 1153) has held that a game in which success depends predominantly upon the superior knowledge, training, attention, experience and adroitness of the player shall be classified as a game of skill.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>The service described above is prominently a game of skill, once you get that number how you play/ use interpersonal skills involves a strategy, planning &amp; skill. For example, in a standard Ludo, Do you move the same token over and over again until it reaches the end? Or do you move different tokens at different times to ensure that they stay safe and away from the opponent&rsquo;s tokens? Or do you use your token to kill the opponent&rsquo;s tokens ? How to manage your tokens on the safe points ( stars ) to let it unaffected by opponent&rsquo;s token</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>All our services require a lot of concentration, planning, strategy, skill to understand the opponent&#39;s planning is required to win a contest/ game</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>A user with good experience &amp; understanding with best of strategy building skills along with excellent presence of mind only can dominate</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We therefore offer practice modes to let all users play &amp; test their skills before joining any services involving money</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We highly recommend that if a user is inexperienced or not good with required skills then, they should spent lot of time playing on practice mode to enhance their skills as skills are really required to correctly strategize the moves during the proceedings</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>So a user should have a high level of skill &amp; need to have a good strategy in order to be successful</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>By availing our services, each user acknowledges and agrees that they are participating in a game of skill.</li>\r\n</ul>\r\n\r\n<h2>Eligibility</h2>\r\n\r\n<ul>\r\n	<li>The services involving money are open only to persons above the age of 18 years.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;The service are open only to persons currently residing in India.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Colourmoon may, in accordance with the laws prevailing in certain Indian states, bar individuals residing in those states from availing some services. Currently, individuals residing in the Indian states of Assam, Odisha, Telangana or Andhra Pradesh may not participate in the paid services as the laws of these states bar persons from participating in games of skill where participants are required to pay to enter.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Only those people who have successfully registered in accordance with the procedure outlined above (as per law) shall be eligible to participate avail particular services</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any prizes, subject to deduction of tax (&quot;TDS&quot;) as per the Income Tax Act 1961, shall be debited. Winners will be provided TDS certificates in respect of such tax deductions. The Winners shall be responsible for payment of any other applicable tax, including but not limited to, income tax, gift tax, etc. in respect of the prize at their own discretion</li>\r\n</ul>\r\n\r\n<h2>Miscellaneous</h2>\r\n\r\n<ul>\r\n	<li>The decision of Colourmoon with respect to the awarding of prizes shall be final, binding and non- contestable. User availing the paid formats of the services confirm that they are not residents of any of the following Indian states - Assam, Odisha, Telangana or Andhra Pradesh. If it is found that a participant playing the paid formats of the Contest(s) is a resident of any of the above mentioned states, we shall disqualify such user and forfeit any prize won by such user.</li>\r\n	<li>Further Colourmoon may, at its sole and absolute discretion, suspend or terminate such user&rsquo;s account. Any amount remaining unused in the user&#39;s Game Account or Winnings Account on the date of deactivation or deletion shall be reimbursed to the user by an online transfer to the user&#39;s bank account on record, subject to the processing fee (if any) applicable on such transfers as set out herein.</li>\r\n	<li>If it is found that a user playing the paid services is under the age of eighteen (18), Colourmoon shall be entitled, at its sole and absolute discretion, to disqualify such user and forfeit their prize.</li>\r\n	<li>Further, Colourmoon may, at its sole and absolute discretion, suspend or terminate such user. All prizes are non-transferable and non-refundable. Prizes cannot be exchanged / redeemed for cash or kind. No cash claims can be made in lieu of prizes in kind</li>\r\n</ul>\r\n\r\n<h2>General Conditions</h2>\r\n\r\n<p>If it comes to the notice of Colourmoon that any governmental, statutory or regulatory compliances or approvals are required for offering any services is prohibited, then we shall withdraw and / or cancel such service without prior notice to any users. Users agree not to make any claim in respect of such cancellation or withdrawal of the service in any manner.</p>\r\n\r\n<h2>Release and Limitations of Liability</h2>\r\n\r\n<ul>\r\n	<li>Users shall access the services provided, voluntarily and at their own risk. We are under no circumstances be held responsible or liable on account of any loss or damage sustained (including but not limited to any accident, injury, death, loss of property) by users or any other person or entity during the course of access of services including acceptance of any prize.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>By accessing our services provided therein, users hereby release from and agree to indemnify Colourmoon, and/ or any of its directors, employees, partners, associates and licensors, from and against all liability, cost, loss or expense arising out their access to the services including (but not limited to) personal injury and damage to property and whether direct, indirect, consequential, foreseeable, due to some negligent act or omission on their part, or otherwise.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We don&rsquo;t accept any liability, whether jointly or severally, for any errors or omissions, whether on behalf of itself or third parties</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users shall be solely responsible for any consequences which may arise due to their access of services by conducting an illegal act or due to non-conformity with these Terms and Conditions and other rules and regulations in relation to our services, including provision of incorrect address or other personal details. Users also undertake to indemnify Colourmoon and their respective officers, directors, employees and agents on the happening of such an event (including without limitation cost of attorney, legal charges etc.) on full indemnity basis for any loss/damage suffered on account of such act on the part of the Users.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users shall indemnify, defend, and hold Colourmoon harmless from any third party/entity/organization claims arising from or related to such user&#39;s engagement with the us or availing our services. In no event shall Colourmoon be liable to any User for acts or omissions arising out of or related to user&#39;s engagement or their usage of services provided by Colourmoon.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>In consideration of allowing users to access the services provided, to the maximum extent permitted by law, the users waive and release each and every right or claim, all actions, causes of actions (present or future) each of them has or may have against Colourmoon, its respective agents, directors, officers, business associates, group companies, sponsors, employees, or representatives for all and any injuries, accidents, or mishaps (whether known or unknown) or (whether anticipated or unanticipated) arising out of the provision of services or related to the contests or the prizes of the contests.</li>\r\n</ul>\r\n\r\n<h2>Disclaimers</h2>\r\n\r\n<ul>\r\n	<li>To the extent permitted under law, neither Colourmoon nor its parent/holding company, subsidiaries, affiliates, directors, officers, professional advisors, employees shall be responsible for the deletion, the failure to store, the mis-delivery, or the untimely delivery of any information or material or any other</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>To the extent permitted under law, we shall not be responsible for any harm resulting from downloading or accessing any information or material, the quality of servers, games, products, Colourmoon services or sites, cancellation of competition and prizes. Colourmoon disclaims any responsibility for, and if a user pays for access to one of services the user will not be entitled to a refund as a result of, any inaccessibility that is caused by maintenance on the servers or the technology that underlies our sites, failures of service providers (including telecommunications, hosting, and power providers), computer viruses, natural disasters or other destruction or damage of our facilities, acts of nature, war, civil disturbance, or any other cause beyond our reasonable control. In addition, we don&rsquo;t provide any warranty as to the content. Our content is distributed on an &quot;as is, as available&quot; basis.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any material accessed, downloaded or otherwise obtained is done at the user&#39;s discretion, competence, acceptance and risk, and the user will be solely responsible for any potential damage to User&#39;s computer system or loss of data that results from a user&#39;s download of any such material.&nbsp;</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Colourmoon shall make best endeavours to ensure that our services are error-free and secure, however, neither we nor any of our partners, licensors or associates makes any warranty that:</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>\r\n	<p>The services will meet users&#39; requirements,</p>\r\n\r\n	<p>2. The services will be uninterrupted, timely, secure, or error free</p>\r\n\r\n	<p>3. The results that may be obtained from the use of services will be accurate or reliable</p>\r\n\r\n	<p>4. The quality of any products, services, information, or other material that Users purchase or obtain through our medium will meet users&#39; expectations.</p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>In case we discover any error, including any error in the determination of winners or in the transfer of amounts to a user&#39;s account, we reserve the right (exercisable at its discretion) to rectify the error in such manner as it deems fit, including through a set-off of the erroneous payment from amounts due to the user or deduction from the user&#39;s account of the amount of erroneous payment. In case of exercise of remedies in accordance with this clause, we agree to notify the user of the error and of the exercise of the remedy(ies) to rectify the same.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>To the extent permitted under law, neither us nor our partners, licensors or associates shall be liable for any direct, indirect, incidental, special, or consequential damages arising out of the use of or inability to use our sites, even if we have been advised of the possibility of such damages.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any services, events or contest(s) being hosted or provided, or intended to be hosted or provided by us and requiring specific permission or authority from any statutory authority or any state or the central government, or the board of directors shall be deemed cancelled or terminated, if such permission or authority is either not obtained or denied either before or after the availability of the relevant services, events or contest(s) are hosted or provided.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>To the extent permitted under law, in the event of suspension or closure of any services, events or contests, users (including Participants) shall not be entitled to make any demands, claims, on any nature whatsoever.</li>\r\n</ul>\r\n\r\n<h2>Taxes Payable</h2>\r\n\r\n<p>Taxes Payable for cash prizes shall be subject to deduction of tax (&quot;TDS&quot;) as per the Income Tax Act 1961. As of April 1, 2018, the TDS rate prescribed by the Government of India with respect to any prize money amount that is in excess of Rs. 10,000/- is 31.2% of the total prize money amount. In case of any revisions by the Government of India to the aforementioned rate in the future, TDS will be deducted by Colourmoon in accordance with the then current prescribed TDS rate. The Winners shall be responsible for payment of any other applicable tax, including but not limited to, income tax, gift tax, etc. in respect of the prize money.</p>\r\n\r\n<p>Note: None of the services provided by Colourmoon attracts TDS, as the prizes are not awarded in cash</p>\r\n\r\n<h2>Cancellation Policy</h2>\r\n\r\n<p>Our focus is 100% customer satisfaction. In the event of an error in the transaction, wrongful transfers, mistaken identity, or any other issues that can be verified and proven, we will refund the money in question to the user, provided the reasons are genuine and proved after investigation. Please read the fine print on each league, contest, tournament or service we provide before paying for it, it provides all the details about the services we provide and the contest entries users purchase. In case of dissatisfaction from services, clients have the liberty to cancel their projects and request a refund from us. Our Policy for the cancellation and refund will be as follows.</p>\r\n\r\n<p>For cancellations on transactions already completed please contact us via the Contact us section on the app or the website.</p>\r\n\r\n<p>Email: mh@thecolourmoon.com</p>\r\n\r\n<p>&nbsp;Phone No: +91 8340 939 495</p>\r\n\r\n<p>&nbsp;Address:</p>\r\n\r\n<p>Colourmoon Technologies Pvt Ltd, 405,4th Floor, Bharat Towers,5th Lane,Dwarakanagar, Visakhapatnam-16, A.P, India</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(4, 'Support', 'support', '<p><a href=\"https://google.com\">Support content </a>comes here. Hi This is for testing. Pleae add from admin panel!</p>\r\n'),
(5, 'FAQ\'s', 'faqs', '<p>1) Can I reach out to the support team from the game ?</p>\r\n\r\n<p>Ans:- You can reach out to the support team from the game by going to the settings and tapping the &quot;Support Email&quot; button.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2)&nbsp;Is there any way I can redeem the coins into money?</p>\r\n\r\n<p>Ans :-&nbsp;Coins in the game are its virtual currency only, that cannot be redeemed into real money. This currency can be used to play CM-Ludo&nbsp; games and you can redeem with winning prize money.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3) Can I OFF or ON the sounds and vibrations while playing game ?</p>\r\n\r\n<p>Ans :- Yes you can change the settings while you are playing game,go and click on the top left dashboard icon in that click on settings and there you can manage the settings.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>4) Is reset password come to my email ?</p>\r\n\r\n<p>Ans :-&nbsp;Yes the recent password will sent to your&nbsp;&nbsp;mail.id which your gave while registering</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>5) After resetting my password will I get my coins back ?</p>\r\n\r\n<p>Ans :-&nbsp;Yes you will receive your coins back after relogin&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>6) Can I play with my friends who are living in other contry.</p>\r\n\r\n<p>Ans:- You can play with your abroad Frnds through private room</p>\r\n'),
(6, 'Join Group', 'join_group', 'https://t.me/topup_ludo'),
(7, 'How To Play', 'how_to_play', 'https://www.youtube.com/');
INSERT INTO `cms` (`id`, `name`, `slug`, `description`) VALUES
(8, 'Game Rules', 'game_rules', '<p>The General Term&#39;s and Condition&#39;s (&quot;<strong>Terms</strong>&quot;) displayed on this website, and the content and services available on or through any of the foregoing, shall hereinafter be referred to as the &quot;Agreement&quot; provided to you (&quot;<strong>Customer</strong>/<strong>User/ Player</strong>&quot;) by Colourmoon Technologies Pvt Ltd.</p>\r\n\r\n<h2>INTRODUCTION</h2>\r\n\r\n<p>This document is an electronic record in terms of the Information Technology Act, 2000 and rules there under as applicable. This electronic record is generated by a computer system and does not require any physical or digital signatures.</p>\r\n\r\n<h1>CM-Ludo</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>CM-Ludo&nbsp;is the flagship brand of&nbsp;Colourmoon Technologies Pvt Ltd.</p>\r\n\r\n<p>Through CM-Ludo one can play a traditional Ludo game against any real player who is online &amp; can also play against their friend.</p>\r\n\r\n<p>One can also play against computer to practice their moves</p>\r\n\r\n<h3><strong>General Provisions</strong></h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://thecolourmoon.com/index.php\" target=\"_blank\">https://thecolourmoon.com/</a> is the brand/ digital platform of Colourmoon Technologies Pvt Ltd&nbsp;which develops and offers various digital services.&nbsp; &nbsp;Our online mobile applications/ games have refer and earn plan through various contests and games (&quot;<strong>Games / Contest</strong>&quot;) that can be downloaded from the APP Stores of various providers or directly</li>\r\n	<li>The Games are only offered to natural persons (&quot;<strong>User/s</strong>&quot; or &quot;&nbsp;<strong>Customer/s</strong>&quot; or &quot;<strong>Player/s</strong>&quot;) who conclude a legal transaction for purposes which can predominantly neither be attributed to their commercial nor their self-employed professional activity.</li>\r\n	<li>All Games made by Colourmoon are provided exclusively on the basis of the Terms.</li>\r\n	<li>The Terms are displayed when downloading each Game, within the Game, on the company website (<a href=\"https://thecolourmoon.com/\" target=\"_blank\">https://thecolourmoon.com/</a>&nbsp;) (&quot;<strong>Site</strong>&quot;)</li>\r\n	<li>&nbsp;We may change, suspend, or cease all or any part of the Site and at its discretion can discard or remove any submissions made by the User which are not as per the Terms or the applicable laws and it may extend to deactivate the User&#39;s account;</li>\r\n	<li>Once the User make its account on https://thecolourmoon.com/, he/she may be entitled for any bonus or joining points as per our terms (&quot;<strong>Bonus Points</strong>&quot;) which shall be credited in User&#39;s account and can be used only for participation in Games. Any Bonus Points or other points earned by the User shall be transferred to their designated online/ digital wallet. The User shall be responsible for any transaction which its happens through their Wallet.</li>\r\n	<li>The words &ldquo;we&rdquo;, &ldquo;us&rdquo;, &ldquo;our&rdquo;, &ldquo;Colourmoon&rdquo; are referred in various contexts for convenience purpose, address one and the same &ndash; parent company Colourmoon Technologies Pvt Ltd, where our services are hosted at <a href=\"https://thecolourmoon.com/\" target=\"_blank\">https://thecolourmoon.com/</a></li>\r\n</ul>\r\n\r\n<h2>Usage of Services</h2>\r\n\r\n<p>By using our services, you agree that you are lawfully competent and able to enter into the terms, conditions, obligations, representations and responsibilities set forth in these terms of service which may be amended from time to time, and to abide and comply with these terms. We may update and change any or all of these terms at any time. it is your responsibility to review these terms periodically, and continued use of the services after any such changes have been made and posted shall constitute your consent to such changes.</p>\r\n\r\n<p>Please read the terms and conditions carefully. by accessing and using the services in any manner, you agree to become bound by the terms and conditions of this agreement. if you do not agree to be bound by such terms and conditions, you must not access or use the services.</p>\r\n\r\n<p>If you do not abide by the provisions of these terms &amp; conditions, except as we may otherwise provide from time to time, you agree that we may immediately deactivate or delete your user account and all related information and files in your user account and/or restrict any further access to such information and/or files, or our services, with or without notice.</p>\r\n\r\n<p>You must exercise caution, good sense and sound judgment in using the services. you are prohibited from violating, or attempting to violate, the security of the services. any such violations may result in criminal and/or civil penalties against you. We will investigate any alleged or suspected violations and if a criminal violation is suspected, Colourmoon may contact and/or cooperate with law enforcement agencies in their investigations.</p>\r\n\r\n<h2>DEFINITIONS</h2>\r\n\r\n<ul>\r\n	<li>&ldquo;Subscriber&rdquo; shall mean the rightful user of our services, in whose name the mobile phone number (MSISDN) is registered with us. In the event the user number / connection is registered in the name of a company/ firm, the employee who is authorized to use the MSISDN shall submit a No Objection Certificate (NoC) and authorization letter of the employer duly permitting the employee to use the number for subscribing our services and accept the terms applicable herein. This shall not be applicable on Recharge prize.</li>\r\n	<li>Organizer: under this T&amp;C shall mean Colourmoon who shall be responsible for conceptualizing, organizing and hosting these services</li>\r\n	<li>&ldquo;Member(s)&rdquo; or &ldquo;Participants&rdquo; means (i) Active Subscribers who meet the eligibility criteria specified in these Terms and Conditions, (ii) who belong to Circle(s) and have successfully activated, and (iii) who are subscribed, as described in the subscription process here under.</li>\r\n	<li>&ldquo;Eligible Subscriber&rdquo; shall mean an Active Subscriber of satisfying the following criteria at the time of participation and during continuation of Services:&ndash;\r\n	<ol>\r\n		<li>He/she must be of at least 18 years of age;</li>\r\n		<li>He/she must be a citizen of India;</li>\r\n		<li>He/she must be an active Subscriber</li>\r\n		<li>He/she must be responsible to activate and subscribe to the services, thereby become a member. He/she must belong to any of the telecom services run in India</li>\r\n		<li>He/she must not be of an unsound mind; and</li>\r\n		<li>He/she must not be under any legal disability e.g. insolvency, restraint by court orders etc. and / or is prohibited from entering any contractual relationship.</li>\r\n		<li>He/she must not have been subject of any criminal proceeding;</li>\r\n		<li>Our services will be known by and be made available in English language only</li>\r\n		<li>Participants playing the paid formats of the Contest(s) confirm that they are not residents of any of the following Indian states - Assam, Odisha, Sikkim, Andhra Pradesh, Nagaland or Telangana. If it is found that a Participant playing the paid formats of the Contest(s) is a resident of any of the above mentioned states, Colourmoon shall disqualify such participant and forfeit any prize won by such participant.</li>\r\n		<li>Further, the pack members who participate in the game/ service and are chosen as winners of each category of prizes in accordance with the winner selection process under the Terms and Conditions, shall be required to be the registered subscribers of the winning mobile phone number and not merely the players using such mobile number (&ldquo;Winner(s)&rdquo;). If the Winner is not able to provide sufficient evidence to show that he/she is the subscriber of the winning mobile number, the organizers reserves the right to award the prize to the next eligible winner or to forfeit the prize, at its sole discretion. The confirmation is not required in- case of recharge prize.</li>\r\n		<li>The employees of the organizers and or their group companies, affiliate or associate companies and their relatives/ dependents (First blood/Spouse of immediate member) shall not be eligible to avail our services. If found otherwise, then the organizers reserves the right to forfeit the prize. If an employee of the organizers leaves the organization when the service is launched or leave during Game Period/ before Winner list announcement / after Winner&rsquo;s list is announced, the employee will not be eligible to avail service.</li>\r\n		<li>The Organizers reserve the right, at any time, to unconditionally disqualify any Participant who tampers with or who in any way abuses the process or Terms and Conditions of the Game. Failure by the Organizer to enforce any of the Terms and Conditions in any instance shall not be deemed to be a waiver of that Term and Condition and shall not give rise to any claim by any person. The decision of the Organizer shall at all times be binding and final.</li>\r\n	</ol>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Conclusion of Contract, Term, Termination</h2>\r\n\r\n<ol>\r\n	<li>The User confirms to have full legal capacity and, in the case of restricted legal capacity, to have obtained the consent of his/her legal guardian.</li>\r\n	<li>The contract for the use of services is concluded by downloading from the respective App Store. Details of this process can be found in the terms of use of the respective App Store. The download creates a contract between the User and Colourmoon for the use of the respective service. The corresponding license and usage agreement on the basis of the Terms is concluded for an indefinite period of time and may be terminated by either party at any time, subject to Section 2.3, without specifying any reasons by providing notice of four weeks.</li>\r\n	<li>Colourmoon may charge its users a platform or subscription fee in respect of any services. All the payments done by the user for a subscription must be done by credit card, debit card, or any other valid payment method, along with applicable taxes, and all the information provided by user in connection with such purchase must be accurate and complete. The user agree that all payments made in connection with subscription are non-refundable unless otherwise specified in these Terms. Colourmoon shall, without delay, repay such platform fee in the event of suspension or removal of the User&#39;s account services on account of any negligence or deficiency on the part of Colourmoon, but not if such suspension or removal is effected due to:\r\n	<ol>\r\n		<li>any breach or inadequate performance by the User of any of the Terms; or</li>\r\n		<li>any circumstances beyond the reasonable control of Colourmoon.</li>\r\n	</ol>\r\n	</li>\r\n	<li>It is recommended to always install the latest version of the services. We only obligated to provide the full scope of performance and the correct&nbsp;</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>functionality for the current version of the Game.</li>\r\n	<li>In the event of ordinary termination by the User or termination by us for good cause, no reimbursement of paid fees shall take place. Colourmoon shall be&nbsp;</li>\r\n	<li>entitled to continue to charge all outstanding fees for the period of which User has subscribed.&nbsp;</li>\r\n	<li>The User may not transfer this agreement to third parties. In the event of a breach of this provision (account transfer), Colourmoon shall be entitled to&nbsp;</li>\r\n	<li>terminate the agreement without notice. In such event, a prorated refund shall also be excluded.</li>\r\n	<li>The statutory right to extraordinary termination of this agreement without notice for good cause shall not be affected.</li>\r\n</ul>\r\n\r\n<h2>Intellectual Property</h2>\r\n\r\n<p>Colourmoon includes a combination of content created by itself, its partners, licensors, associates and/or users. The intellectual property rights (&quot;Intellectual Property Rights&quot;)in all software underlying and material published, including (but not limited to) games, Contests, software, advertisements, written content, photographs, graphics, images, illustrations, marks, logos, audio or video clippings and Flash animation, is owned by Colourmoon, its partners, licensors and/or associates. Users may not modify, publish, transmit, participate in the transfer or sale of, reproduce, create derivative works of, distribute, publicly perform, publicly display, or in any way exploit any of the materials or content on our platforms either in whole or in part without express written license from us.</p>\r\n\r\n<p>Users may request permission to use any content by writing to our helpdesk</p>\r\n\r\n<p>Users are solely responsible for all materials (whether publicly posted or privately transmitted) that they upload, post, e-mail, transmit, or otherwise make available.&nbsp;Each User represents and warrants that he/she owns all Intellectual Property Rights in the User&#39;s Content and that no part of the User&#39;s Content infringes any third party rights. Users further confirm and undertake to not display or use of the names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights of any third party on our platforms. Users agree to indemnify and hold harmless Colourmoon, its directors, employees, affiliates and assigns against all costs, damages, loss and harm including towards litigation costs and counsel fees, in respect of any third party claims that may be initiated including for infringement of Intellectual Property Rights arising out of such display or use of the names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights on Colourmoon, by such User or through the User&#39;s commissions or omissions.</p>\r\n\r\n<p>Users hereby grant us and our affiliates, partners, licensors and associates a worldwide, irrevocable, royalty-free, non-exclusive, sub-licensable license to use, reproduce, create derivative works to distribute, publicly perform, publicly display, transfer, transmit, and/or publish Users&#39; Content for any of the following purposes:</p>\r\n\r\n<ol>\r\n	<li>Displaying Users&#39; Content on various medium</li>\r\n	<li>Distributing Users&#39; Content, either electronically or via other media, to other Users seeking to download or otherwise acquire it, and/or</li>\r\n	<li>Storing Users&#39; Content in a remote database accessible by end users, for a charge.</li>\r\n	<li>This license shall apply to the distribution and the storage of Users&#39; Content in any form, medium, or technology.</li>\r\n</ol>\r\n\r\n<p>All names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights on our media belonging to any person (including User), entity or third party are recognized as proprietary to the respective owners and any claims, controversy or issues against these names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights must be directly addressed to the respective parties under notice to Colourmoon</p>\r\n\r\n<h2>Account and User data</h2>\r\n\r\n<ol>\r\n	<li>Upon conclusion of the contract and use of the Game, we shall store the progress of the Game and any additional content. For more information, please refer to&nbsp;<a href=\"https://OneTo11.com/privacy-policy\" target=\"_blank\">Privacy policy</a>.</li>\r\n	<li>The User must select secure access credentials and not make such data available to third parties. We are not responsible for any damage resulting from the breach of this duty. In the event of suspected abuse, we are entitled to temporarily block access to the services in question.</li>\r\n	<li>If the user select a username in the game, this must not violate applicable laws and/or the terms. We shall be entitled to change or delete the name in the event of a breach of this provision, either at the instigation of a third party or on its own initiative. No separate justification for the name change shall be necessary. The User has no claim to a specific name. Other rights in the event of a breach of this provision shall not be affected</li>\r\n</ol>\r\n\r\n<h2>Colourmoon may, at its sole and absolute discretion:</h2>\r\n\r\n<ol>\r\n	<li>Restrict, suspend, or terminate any user&#39;s access to all or any part of services</li>\r\n	<li>Change, suspend, or discontinue all or any part of the Services</li>\r\n	<li>Reject, move, or remove any material that may be submitted by a user</li>\r\n	<li>Move or remove any content that is available</li>\r\n	<li>Deactivate or delete a User&#39;s account and all related information and files on the account</li>\r\n	<li>Establish general practices and limits concerning the use</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>In the event any user breaches, or we reasonably believe that such user has breached these Terms and Conditions, or has illegally or improperly used our services, we may, at our sole and absolute discretion, and without any notice to the user, restrict, suspend or terminate such User&#39;s access to all or any part of services, deactivate or delete the User&#39;s account and all related information on the account, delete any content posted by the user and further, take technical and legal steps as we deem necessary.</li>\r\n</ul>\r\n\r\n<h2><em>Third Party Sites, Services and Products</em></h2>\r\n\r\n<ul>\r\n	<li>Our medium may contain links to other Internet sites owned and operated by third parties. Users&#39; use of each of those sites is subject to the conditions, if any, posted by the sites. We do not exercise control over any Internet sites apart from ours, and cannot be held responsible for any content residing in any third party Internet site. Our inclusion of third-party content or links to third-party Internet sites is not an endorsement of such third-party Internet sites.</li>\r\n	<li>Users&#39; correspondence, transactions or related activities with third parties, including payment providers and verification service providers, are solely between the User and that third party. Users&#39; correspondence, transactions and usage of the services of such third party shall be subject to the terms and conditions, policies and other service terms adopted/implemented by such third party, and the User shall be solely responsible for reviewing the same prior to transacting or availing of the services of such third party. User agrees that Colourmoon will not be responsible or liable for any loss or damage of any sort incurred as a result of any such transactions with third parties. Any questions, complaints, or claims related to any third party product or service should be directed to the appropriate vendor.</li>\r\n	<li>We may contain self created content that is created as well as content provided by third parties. We don&rsquo;t guarantee the accuracy, integrity, quality of the content provided by third parties and such content may not relied upon by the Users in utilizing the services provided, including while participating in any of the contests hosted by us</li>\r\n</ul>\r\n\r\n<h2>Privacy Policy</h2>\r\n\r\n<p>All information collected from Users, such as registration and credit card information, is subject to&nbsp; Colourmoon&nbsp;Privacy Policy which is available at Privacy Policy</p>\r\n\r\n<h2>User Conduct</h2>\r\n\r\n<ul>\r\n	<li>Users agree to provide true, accurate, current and complete information at the time of registration and at all other times (as required). Users further agree to update and keep updated their registration information.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;A User shall NOT register or operate more than one User account</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree to ensure that they can receive all communication from US by marking emails as part of their &quot;safe senders&rdquo; list. We shall not be held liable if any email remains unread by a user as a result of such e-mail getting delivered to the User&#39;s junk or spam folder.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any password issued to a User may not be revealed to anyone else. Users may not use anyone else&#39;s password. Users are responsible for maintaining the confidentiality of their accounts and passwords. Users agree to immediately notify us of any unauthorized use of their passwords or accounts or any other breach of security.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree to exit/log-out of their accounts at the end of each session. We shall not be responsible for any loss or damage that may result if the User fails to comply with these requirements.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree not to use cheats, exploits, automation, software, bots, hacks or any unauthorized third party software designed to modify or interfere with services and/or our experience or assist in such activity.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree not to copy, modify, rent, lease, loan, sell, assign, distribute, reverse engineer, grant a security interest in, or otherwise transfer any right to the technology or software underlying our services.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree that without our express written consent, they shall not modify or cause to be modified any files or software that are part of our services.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree not to disrupt, overburden, or aid or assist in the disruption or overburdening of (a) any computer or server used to offer or support our services (each a &quot;Server&quot;); or (2) the enjoyment of our services by any other User or person.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users agree not to institute, assist or become involved in any type of attack, including without limitation to distribution of a virus, denial of service, or other attempts to disrupt services or any other person&#39;s use or enjoyment of services.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users shall not attempt to gain unauthorized access to the User accounts, Servers or networks connected to our services by any means other than the user interface provided, including but not limited to, by circumventing or modifying, attempting to circumvent or modify, or encouraging or assisting any other person to circumvent or modify, any security, technology, device, or software that underlies or is part of our services.</li>\r\n</ul>\r\n\r\n<p>Without limiting the foregoing, Users agree not to use our services for any of the following:</p>\r\n\r\n<ol>\r\n	<li>To engage in any obscene, offensive, indecent, racial, communal, anti-national, objectionable, defamatory or abusive action or communication;</li>\r\n	<li>To harass, stalk, threaten, or otherwise violate any legal rights of other individuals;</li>\r\n	<li>To publish, post, upload, e-mail, distribute, or disseminate (collectively, &quot;Transmit&quot;) any inappropriate, profane, defamatory, infringing, obscene, indecent, or unlawful content;</li>\r\n	<li>To Transmit files that contain viruses, corrupted files, or any other similar software or programs that may damage or adversely affect the operation of another person&#39;s computer, any software, hardware, or telecommunications equipment;</li>\r\n	<li>To advertise, offer or sell any goods or services for any commercial purpose without the express written consent</li>\r\n	<li>To Transmit content regarding services, products, surveys, contests, pyramid schemes, spam, unsolicited advertising or promotional materials, or chain letters;</li>\r\n	<li>To download any file, recompile or disassemble or otherwise affect our products that you know or reasonably should know cannot be legally obtained in such manner;</li>\r\n	<li>To falsify or delete any author attributions, legal or other proper notices or proprietary designations or labels of the origin or the source of software or other material;</li>\r\n	<li>To restrict or inhibit any other user from using and enjoying any public area within our sites;</li>\r\n	<li>To collect or store personal information about other users;</li>\r\n	<li>To interfere with or disrupt servers, or networks;</li>\r\n	<li>To impersonate any person or entity, including, but not limited to, a representative of Colourmoon, or falsely state or otherwise misrepresent User&#39;s affiliation with a person or entity;</li>\r\n	<li>To forge headers or manipulate identifiers or other data in order to disguise the origin of any content transmitted through us or to manipulate User&#39;s presence on our medium</li>\r\n	<li>To take any action that imposes an unreasonably or disproportionately large load on our infrastructure;</li>\r\n	<li>To engage in any illegal activities. You agree to use our bulletin board services, chat areas, news groups, forums, communities and/or message or communication facilities (collectively, the &quot;Forums&quot;) only to send and receive messages and material that are proper and related to that particular Forum.</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>If a user chooses a username that, in our considered opinion is obscene, indecent, abusive or that might subject to public disparagement or scorn, we reserve the right, without prior notice to the user, to change such username and intimate the user or delete such username and posts, deny such user access, or any combination of these options.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Unauthorized access to our services is a breach of these Terms and Conditions, and a violation of the law. Users agree not to access by any means other than through the interface that is provided. Users agree not to use any automated means, including, without limitation, agents, robots, scripts, or spiders, to access, monitor, or copy any part of our sites, except those automated means that we have approved in advance and in writing.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Usage of our services is subject to existing laws and legal processes. Nothing contained in these Terms and Conditions shall limit our right to comply with governmental, court, and law-enforcement requests or requirements relating to use</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users may contact Helpdesk with problems or questions, as appropriate.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Persons below the age of eighteen (18) years are not allowed to make any purchases or redemption &amp; consequent participation in any activity or application is not permitted and such person is subject to disqualification at the sole and absolute discretion of Colourmoon, whenever it comes to our knowledge</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We believe that parents should supervise their children&#39;s online activities and consider using parental control tools available from online services and software manufacturers that help provide a child- friendly online environment. These tools can also prevent children from disclosing online their name, address and other personal information without parental permission.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Although persons below the age of 18 years are allowed to use certain services it is limited to play only on practice mode.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Colourmoon&nbsp;may not be held responsible for any content contributed by users</li>\r\n</ul>\r\n\r\n<h2>Registration</h2>\r\n\r\n<p>In order to register for the Contest(s), Participants may required to accurately provide the following information:</p>\r\n\r\n<ul>\r\n	<li>1. Name or User Name</li>\r\n	<li>2. E-mail address</li>\r\n	<li>3. Mobile Number</li>\r\n	<li>4. Password</li>\r\n</ul>\r\n\r\n<p>Note: Users may require to share his /her KYC Compliant bank account details correctly</p>\r\n\r\n<ul>\r\n	<li>We are not liable for any transaction, if details provided by the user are incorrect.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users will receive the proceedings in their &nbsp;bank account within 24-48 hrs of &nbsp;&nbsp;&nbsp;submitting a redeem request.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>If there is any delay in redemption, a user can contact helpdesk.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users may also be required to confirm that they have read, and shall abide by, these Terms and Conditions.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>In the event a user indicates, while entering an address, that he/she is a resident of either Assam,Nagaland,Odisha,Sikkim,Telangana or Andhra Pradesh such user will not be permitted to proceed to sign up for any round in the services involving payment/ cash transaction as described below.</li>\r\n</ul>\r\n\r\n<p>Contest(s), Participation and Prizes</p>\r\n\r\n<ul>\r\n	<li>We offer a platform where one can purchase coins through Credit card, Net Banking, Debit card, UPI or Paytm wallet. Through purchased coins a user can challenge his / her friend or any random online player &amp; can play a game against any opponent by selecting a proper playing table.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any user who loses the game, will get their coins deducted at the very instant of losing the game equivalent to the playing table amount &amp; the user who wins the game will get the winning coins in their digital wallet.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>For every winning, Colourmoon will deduct 20 % of the winning coins as a service charge &nbsp;/ platform fee</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Won coins would be immediately reflected in the winner&rsquo;s wallet after deduction of service charge / platform fee</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>A user can redeem/ sell their coins in their digital wallet by submitting a redeem request in prescribed manner</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>A user can redeem coins from their wallet if &amp; only if participant&rsquo;s win wallet has a minimum of 50 coins.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We shall not charge any processing fee for the redemption.</li>\r\n	<li>Any user who exits the game in between or not play on his turn for thrice would be considered a loser &amp; coins would be deducted from his account &amp; credited to winner&rsquo;s wallet.</li>\r\n	<li>Colourmoon is not liable for any network connectivity issue faced by user.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Platform will give users 120 seconds ( 2 minutes ) of airtime to resettle its connectivity &amp; completion of the game.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users can use their coins in 1 on 1 mode &amp; friends mode. Coins would be unused in practice mode</li>\r\n</ul>\r\n\r\n<h2>Legality of Game of Skill</h2>\r\n\r\n<ul>\r\n	<li>Games of skill are legal, as they are excluded from the ambit of Indian gambling legislation including, the Public Gambling Act of 1867.The Indian Supreme Court in the cases of State of Andhra Pradesh v. K Satyanarayana (AIR 1968 SC 825) and KR Lakshmanan v. State of Tamil Nadu (AIR 1996 SC 1153) has held that a game in which success depends predominantly upon the superior knowledge, training, attention, experience and adroitness of the player shall be classified as a game of skill.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>The service described above is prominently a game of skill, once you get that number how you play/ use interpersonal skills involves a strategy, planning &amp; skill. For example, in a standard Ludo, Do you move the same token over and over again until it reaches the end? Or do you move different tokens at different times to ensure that they stay safe and away from the opponent&rsquo;s tokens? Or do you use your token to kill the opponent&rsquo;s tokens ? How to manage your tokens on the safe points ( stars ) to let it unaffected by opponent&rsquo;s token</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>All our services require a lot of concentration, planning, strategy, skill to understand the opponent&#39;s planning is required to win a contest/ game</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>A user with good experience &amp; understanding with best of strategy building skills along with excellent presence of mind only can dominate</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We therefore offer practice modes to let all users play &amp; test their skills before joining any services involving money</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We highly recommend that if a user is inexperienced or not good with required skills then, they should spent lot of time playing on practice mode to enhance their skills as skills are really required to correctly strategize the moves during the proceedings</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>So a user should have a high level of skill &amp; need to have a good strategy in order to be successful</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>By availing our services, each user acknowledges and agrees that they are participating in a game of skill.</li>\r\n</ul>\r\n\r\n<h2>Eligibility</h2>\r\n\r\n<ul>\r\n	<li>The services involving money are open only to persons above the age of 18 years.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;The service are open only to persons currently residing in India.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Colourmoon may, in accordance with the laws prevailing in certain Indian states, bar individuals residing in those states from availing some services. Currently, individuals residing in the Indian states of Assam, Odisha, Telangana or Andhra Pradesh may not participate in the paid services as the laws of these states bar persons from participating in games of skill where participants are required to pay to enter.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Only those people who have successfully registered in accordance with the procedure outlined above (as per law) shall be eligible to participate avail particular services</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any prizes, subject to deduction of tax (&quot;TDS&quot;) as per the Income Tax Act 1961, shall be debited. Winners will be provided TDS certificates in respect of such tax deductions. The Winners shall be responsible for payment of any other applicable tax, including but not limited to, income tax, gift tax, etc. in respect of the prize at their own discretion</li>\r\n</ul>\r\n\r\n<h2>Miscellaneous</h2>\r\n\r\n<ul>\r\n	<li>The decision of Colourmoon with respect to the awarding of prizes shall be final, binding and non- contestable. User availing the paid formats of the services confirm that they are not residents of any of the following Indian states - Assam, Odisha, Telangana or Andhra Pradesh. If it is found that a participant playing the paid formats of the Contest(s) is a resident of any of the above mentioned states, we shall disqualify such user and forfeit any prize won by such user.</li>\r\n	<li>Further Colourmoon may, at its sole and absolute discretion, suspend or terminate such user&rsquo;s account. Any amount remaining unused in the user&#39;s Game Account or Winnings Account on the date of deactivation or deletion shall be reimbursed to the user by an online transfer to the user&#39;s bank account on record, subject to the processing fee (if any) applicable on such transfers as set out herein.</li>\r\n	<li>If it is found that a user playing the paid services is under the age of eighteen (18), Colourmoon shall be entitled, at its sole and absolute discretion, to disqualify such user and forfeit their prize.</li>\r\n	<li>Further, Colourmoon may, at its sole and absolute discretion, suspend or terminate such user. All prizes are non-transferable and non-refundable. Prizes cannot be exchanged / redeemed for cash or kind. No cash claims can be made in lieu of prizes in kind</li>\r\n</ul>\r\n\r\n<h2>General Conditions</h2>\r\n\r\n<p>If it comes to the notice of Colourmoon that any governmental, statutory or regulatory compliances or approvals are required for offering any services is prohibited, then we shall withdraw and / or cancel such service without prior notice to any users. Users agree not to make any claim in respect of such cancellation or withdrawal of the service in any manner.</p>\r\n\r\n<h2>Release and Limitations of Liability</h2>\r\n\r\n<ul>\r\n	<li>Users shall access the services provided, voluntarily and at their own risk. We are under no circumstances be held responsible or liable on account of any loss or damage sustained (including but not limited to any accident, injury, death, loss of property) by users or any other person or entity during the course of access of services including acceptance of any prize.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>By accessing our services provided therein, users hereby release from and agree to indemnify Colourmoon, and/ or any of its directors, employees, partners, associates and licensors, from and against all liability, cost, loss or expense arising out their access to the services including (but not limited to) personal injury and damage to property and whether direct, indirect, consequential, foreseeable, due to some negligent act or omission on their part, or otherwise.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>We don&rsquo;t accept any liability, whether jointly or severally, for any errors or omissions, whether on behalf of itself or third parties</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users shall be solely responsible for any consequences which may arise due to their access of services by conducting an illegal act or due to non-conformity with these Terms and Conditions and other rules and regulations in relation to our services, including provision of incorrect address or other personal details. Users also undertake to indemnify Colourmoon and their respective officers, directors, employees and agents on the happening of such an event (including without limitation cost of attorney, legal charges etc.) on full indemnity basis for any loss/damage suffered on account of such act on the part of the Users.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Users shall indemnify, defend, and hold Colourmoon harmless from any third party/entity/organization claims arising from or related to such user&#39;s engagement with the us or availing our services. In no event shall Colourmoon be liable to any User for acts or omissions arising out of or related to user&#39;s engagement or their usage of services provided by Colourmoon.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>In consideration of allowing users to access the services provided, to the maximum extent permitted by law, the users waive and release each and every right or claim, all actions, causes of actions (present or future) each of them has or may have against Colourmoon, its respective agents, directors, officers, business associates, group companies, sponsors, employees, or representatives for all and any injuries, accidents, or mishaps (whether known or unknown) or (whether anticipated or unanticipated) arising out of the provision of services or related to the contests or the prizes of the contests.</li>\r\n</ul>\r\n\r\n<h2>Disclaimers</h2>\r\n\r\n<ul>\r\n	<li>To the extent permitted under law, neither Colourmoon nor its parent/holding company, subsidiaries, affiliates, directors, officers, professional advisors, employees shall be responsible for the deletion, the failure to store, the mis-delivery, or the untimely delivery of any information or material or any other</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>To the extent permitted under law, we shall not be responsible for any harm resulting from downloading or accessing any information or material, the quality of servers, games, products, Colourmoon services or sites, cancellation of competition and prizes. Colourmoon disclaims any responsibility for, and if a user pays for access to one of services the user will not be entitled to a refund as a result of, any inaccessibility that is caused by maintenance on the servers or the technology that underlies our sites, failures of service providers (including telecommunications, hosting, and power providers), computer viruses, natural disasters or other destruction or damage of our facilities, acts of nature, war, civil disturbance, or any other cause beyond our reasonable control. In addition, we don&rsquo;t provide any warranty as to the content. Our content is distributed on an &quot;as is, as available&quot; basis.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any material accessed, downloaded or otherwise obtained is done at the user&#39;s discretion, competence, acceptance and risk, and the user will be solely responsible for any potential damage to User&#39;s computer system or loss of data that results from a user&#39;s download of any such material.&nbsp;</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Colourmoon shall make best endeavours to ensure that our services are error-free and secure, however, neither we nor any of our partners, licensors or associates makes any warranty that:</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>\r\n	<p>The services will meet users&#39; requirements,</p>\r\n\r\n	<p>2. The services will be uninterrupted, timely, secure, or error free</p>\r\n\r\n	<p>3. The results that may be obtained from the use of services will be accurate or reliable</p>\r\n\r\n	<p>4. The quality of any products, services, information, or other material that Users purchase or obtain through our medium will meet users&#39; expectations.</p>\r\n	</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>In case we discover any error, including any error in the determination of winners or in the transfer of amounts to a user&#39;s account, we reserve the right (exercisable at its discretion) to rectify the error in such manner as it deems fit, including through a set-off of the erroneous payment from amounts due to the user or deduction from the user&#39;s account of the amount of erroneous payment. In case of exercise of remedies in accordance with this clause, we agree to notify the user of the error and of the exercise of the remedy(ies) to rectify the same.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>To the extent permitted under law, neither us nor our partners, licensors or associates shall be liable for any direct, indirect, incidental, special, or consequential damages arising out of the use of or inability to use our sites, even if we have been advised of the possibility of such damages.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Any services, events or contest(s) being hosted or provided, or intended to be hosted or provided by us and requiring specific permission or authority from any statutory authority or any state or the central government, or the board of directors shall be deemed cancelled or terminated, if such permission or authority is either not obtained or denied either before or after the availability of the relevant services, events or contest(s) are hosted or provided.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>To the extent permitted under law, in the event of suspension or closure of any services, events or contests, users (including Participants) shall not be entitled to make any demands, claims, on any nature whatsoever.</li>\r\n</ul>\r\n\r\n<h2>Taxes Payable</h2>\r\n\r\n<p>Taxes Payable for cash prizes shall be subject to deduction of tax (&quot;TDS&quot;) as per the Income Tax Act 1961. As of April 1, 2018, the TDS rate prescribed by the Government of India with respect to any prize money amount that is in excess of Rs. 10,000/- is 31.2% of the total prize money amount. In case of any revisions by the Government of India to the aforementioned rate in the future, TDS will be deducted by Colourmoon in accordance with the then current prescribed TDS rate. The Winners shall be responsible for payment of any other applicable tax, including but not limited to, income tax, gift tax, etc. in respect of the prize money.</p>\r\n\r\n<p>Note: None of the services provided by Colourmoon attracts TDS, as the prizes are not awarded in cash</p>\r\n\r\n<h2>Cancellation Policy</h2>\r\n\r\n<p>Our focus is 100% customer satisfaction. In the event of an error in the transaction, wrongful transfers, mistaken identity, or any other issues that can be verified and proven, we will refund the money in question to the user, provided the reasons are genuine and proved after investigation. Please read the fine print on each league, contest, tournament or service we provide before paying for it, it provides all the details about the services we provide and the contest entries users purchase. In case of dissatisfaction from services, clients have the liberty to cancel their projects and request a refund from us. Our Policy for the cancellation and refund will be as follows.</p>\r\n\r\n<p>For cancellations on transactions already completed please contact us via the Contact us section on the app or the website.</p>\r\n\r\n<p>Email: mh@thecolourmoon.com</p>\r\n\r\n<p>&nbsp;Phone No: +91 8340 939 495</p>\r\n\r\n<p>&nbsp;Address:</p>\r\n\r\n<p>Colourmoon Technologies Pvt Ltd, 405,4th Floor, Bharat Towers,5th Lane,Dwarakanagar, Visakhapatnam-16, A.P, India</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `constants`
--

CREATE TABLE `constants` (
  `id` int(11) NOT NULL,
  `minimium_withdraw` int(11) NOT NULL,
  `maximum_withdraw` int(11) NOT NULL,
  `global_commission_percentage` int(11) NOT NULL,
  `referrer_amount` int(11) NOT NULL,
  `referral_amount` int(11) NOT NULL,
  `minimum_deposit` int(11) NOT NULL,
  `maximum_deposit` int(11) NOT NULL,
  `lite_mode_commission_percentage` int(11) NOT NULL,
  `second_commission_percentage` int(11) NOT NULL,
  `signup_amount` int(11) NOT NULL,
  `current_version` int(11) NOT NULL,
  `notice_board` text NOT NULL,
  `notice_board_display` varchar(10) NOT NULL,
  `whats_new` text NOT NULL,
  `whats_new_display` varchar(10) NOT NULL,
  `customer_care` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `constants`
--

INSERT INTO `constants` (`id`, `minimium_withdraw`, `maximum_withdraw`, `global_commission_percentage`, `referrer_amount`, `referral_amount`, `minimum_deposit`, `maximum_deposit`, `lite_mode_commission_percentage`, `second_commission_percentage`, `signup_amount`, `current_version`, `notice_board`, `notice_board_display`, `whats_new`, `whats_new_display`, `customer_care`) VALUES
(1, 100, 999, 10, 10, 10, 25, 1100, 15, 0, 11, 7, '    Play Top-up and win coin ', 'Yes', '    Play Top-up and win coins. Thank you.', 'Yes', '  9874561230\r\nPlay Top-up and win coins. Thank you.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `name`, `email`, `mobile`, `message`, `status`, `created_at`, `userid`) VALUES
(15, '', '', '', 'Hello team this is testing this is another message ', 1, '1687499553', 154),
(14, '', '', '', 'Hello team this is testing ', 1, '1687499401', 154),
(13, '', '', '', '124', 1, '1687445284', 153),
(12, '', '', '', 'Hello support', 1, '1687430789', 112),
(10, '', '', '', 'udududud', 1, '1687169832', 112),
(11, '', '', '', 'help us in playing game', 1, '1687169888', 112),
(16, '', '', '', 'nsjsndjdnshsnshnsnsjsnsnsnbshsns snsjsnsusnsjsnshsns snsnsnsnsnsjdnsndjdndjdnd', 1, '1687545558', 112),
(17, '', '', '', 'all are okay', 1, '1687585251', 154),
(18, '', '', '', 'ffff', 1, '1688454260', 158);

-- --------------------------------------------------------

--
-- Table structure for table `gamebet`
--

CREATE TABLE `gamebet` (
  `id` int(11) NOT NULL,
  `game_type` varchar(30) NOT NULL,
  `tabletype` varchar(256) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `wng_amount` int(11) DEFAULT NULL,
  `gameid` varchar(256) DEFAULT NULL,
  `user_type` enum('real_user','computer') NOT NULL DEFAULT 'real_user',
  `userid` int(11) DEFAULT NULL,
  `gtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `losewin` varchar(122) DEFAULT NULL,
  `gamecomplete` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commission_amount` float DEFAULT '0',
  `status` varchar(256) DEFAULT NULL,
  `minimize_time` varchar(25) DEFAULT NULL,
  `ipaddress` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamebet`
--

INSERT INTO `gamebet` (`id`, `game_type`, `tabletype`, `amount`, `wng_amount`, `gameid`, `user_type`, `userid`, `gtime`, `losewin`, `gamecomplete`, `commission_amount`, `status`, `minimize_time`, `ipaddress`) VALUES
(1, '', '12', 0, NULL, 'Room89457956', 'computer', 0, '2023-05-09 14:16:39', 'winner', '2023-05-09 14:16:54', 0, 'completed', NULL, ''),
(2, 'Classic', '12', 0, NULL, 'Room89457956', 'real_user', 2, '2023-05-09 14:16:43', NULL, '2023-05-09 14:16:54', 0, 'completed', NULL, ''),
(3, '', '12', 0, NULL, 'Room97546879', 'computer', 0, '2023-05-09 17:00:39', 'winner', '2023-05-09 17:01:10', 0, 'completed', NULL, ''),
(4, 'Classic', '12', 0, NULL, 'Room97546879', 'real_user', 8, '2023-05-09 17:00:43', NULL, '2023-05-09 17:01:10', 0, 'completed', NULL, ''),
(5, '', '12', 0, NULL, 'Room05161445', 'computer', 0, '2023-05-09 23:00:36', 'winner', '2023-05-09 23:02:21', 0, 'completed', NULL, ''),
(6, 'Classic', '12', 0, NULL, 'Room05161445', 'real_user', 12, '2023-05-09 23:00:40', NULL, '2023-05-09 23:02:21', 0, 'completed', '1683653485', ''),
(7, '', '12', 0, NULL, 'Room82042781', 'computer', 0, '2023-05-10 11:37:15', 'winner', '2023-05-10 11:38:11', 0, 'completed', NULL, ''),
(8, 'Classic', '12', 0, NULL, 'Room82042781', 'real_user', 12, '2023-05-10 11:37:19', NULL, '2023-05-10 11:38:11', 0, 'completed', '1683698854', ''),
(9, '', '12', 0, NULL, 'Room64886327', 'computer', 0, '2023-05-10 11:44:31', 'winner', '2023-05-10 11:44:57', 0, 'completed', NULL, ''),
(10, 'Classic', '12', 0, NULL, 'Room64886327', 'real_user', 8, '2023-05-10 11:44:34', NULL, '2023-05-10 11:44:57', 0, 'completed', '1683699289', ''),
(11, '', '12', 0, NULL, 'Room16775339', 'computer', 0, '2023-05-11 23:54:44', NULL, '2023-05-12 00:05:12', 0, 'completed', NULL, ''),
(12, 'Classic', '12', 0, 0, 'Room16775339', 'real_user', 12, '2023-05-11 23:54:48', 'winner', '2023-05-12 00:05:12', 0, 'completed', '1683829816', ''),
(13, '', '12', 0, NULL, 'Room97459260', 'computer', 0, '2023-05-13 12:08:34', 'winner', '2023-05-13 12:09:48', 0, 'completed', NULL, ''),
(14, 'Classic', '12', 0, NULL, 'Room97459260', 'real_user', 17, '2023-05-13 12:08:37', NULL, '2023-05-13 12:09:48', 0, 'completed', NULL, ''),
(15, '', '14', 0, NULL, 'Room77004626', 'computer', 0, '2023-05-13 14:40:29', NULL, '2023-05-13 14:40:29', 0, 'running', NULL, ''),
(16, '', '14', 0, NULL, 'Room77004626', 'computer', 0, '2023-05-13 14:40:29', NULL, '2023-05-13 14:40:29', 0, 'running', NULL, ''),
(17, '', '14', 0, NULL, 'Room77004626', 'computer', 0, '2023-05-13 14:40:31', NULL, '2023-05-13 14:40:31', 0, 'running', NULL, ''),
(18, 'Classic', '14', 0, NULL, 'Room77004626', 'real_user', 18, '2023-05-13 14:40:34', NULL, '2023-05-18 12:18:18', 0, 'completed', '1683969065', ''),
(19, '', '12', 0, NULL, 'Room18628075', 'computer', 0, '2023-05-17 20:49:54', 'winner', '2023-05-17 20:50:16', 0, 'completed', NULL, ''),
(20, 'Classic', '12', 0, NULL, 'Room18628075', 'real_user', 19, '2023-05-17 20:50:04', NULL, '2023-05-17 20:50:16', 0, 'completed', NULL, ''),
(21, '', '12', 0, NULL, 'Room67645106', 'computer', 0, '2023-05-18 15:43:39', 'winner', '2023-05-18 22:20:20', 0, 'completed', NULL, ''),
(22, 'Classic', '12', 0, NULL, 'Room67645106', 'real_user', 19, '2023-05-18 15:43:43', NULL, '2023-05-18 22:20:20', 0, 'completed', '1684405047', ''),
(23, '', '12', 0, NULL, 'Room20388502', 'computer', 0, '2023-05-19 18:45:26', NULL, '2023-05-19 18:45:26', 0, 'running', NULL, ''),
(24, 'Classic', '12', 50, NULL, 'Room72682297', 'real_user', 21, '2023-05-20 10:39:52', NULL, '2023-05-20 10:42:20', 0, 'completed', NULL, ''),
(25, 'Classic', '12', 50, 95, 'Room72682297', 'real_user', 17, '2023-05-20 10:39:52', 'winner', '2023-05-20 10:42:20', 5, 'completed', '1684559502', ''),
(26, '', '14', 0, NULL, 'Room04131603', 'computer', 0, '2023-05-20 13:25:10', NULL, '2023-05-20 13:25:10', 0, 'running', NULL, ''),
(27, '', '14', 0, NULL, 'Room04131603', 'computer', 0, '2023-05-20 13:25:11', NULL, '2023-05-20 13:25:11', 0, 'running', NULL, ''),
(28, '', '14', 0, NULL, 'Room04131603', 'computer', 0, '2023-05-20 13:25:12', NULL, '2023-05-20 13:25:12', 0, 'running', NULL, ''),
(29, 'Classic', '14', 0, NULL, 'Room04131603', 'real_user', 22, '2023-05-20 13:25:15', NULL, '2023-05-20 13:25:15', 0, 'running', '1684569351', ''),
(30, '', '14', 0, NULL, 'Room03674443', 'computer', 0, '2023-05-20 15:14:50', NULL, '2023-05-20 15:14:50', 0, 'running', NULL, ''),
(31, '', '14', 0, NULL, 'Room03674443', 'computer', 0, '2023-05-20 15:14:51', NULL, '2023-05-20 15:14:51', 0, 'running', NULL, ''),
(32, '', '14', 0, NULL, 'Room03674443', 'computer', 0, '2023-05-20 15:14:52', NULL, '2023-05-20 15:14:52', 0, 'running', NULL, ''),
(33, 'Classic', '14', 0, NULL, 'Room03674443', 'real_user', 19, '2023-05-20 15:14:56', NULL, '2023-05-20 15:15:06', 0, 'completed', '1684575903', ''),
(34, '', '12', 0, NULL, 'Room34902372', 'computer', 0, '2023-05-22 19:16:55', 'winner', '2023-05-22 19:18:26', 0, 'completed', NULL, ''),
(35, 'Classic', '12', 0, NULL, 'Room34902372', 'real_user', 19, '2023-05-22 19:16:59', NULL, '2023-05-22 19:18:26', 0, 'completed', NULL, ''),
(36, '', '12', 0, NULL, 'Room39467181', 'computer', 0, '2023-05-22 20:56:39', 'winner', '2023-05-22 20:57:53', 0, 'completed', NULL, ''),
(37, 'Classic', '12', 0, NULL, 'Room39467181', 'real_user', 18, '2023-05-22 20:56:43', NULL, '2023-05-22 20:57:53', 0, 'completed', '1684769293', ''),
(38, '', '12', 0, NULL, 'Room17047674', 'computer', 0, '2023-05-22 21:00:34', 'winner', '2023-05-22 21:00:45', 0, 'completed', NULL, ''),
(39, 'Classic', '12', 0, NULL, 'Room17047674', 'real_user', 26, '2023-05-22 21:00:38', NULL, '2023-05-22 21:00:45', 0, 'completed', NULL, ''),
(40, '', '12', 0, NULL, 'Room20382815', 'computer', 0, '2023-05-22 21:00:59', 'winner', '2023-05-22 21:01:07', 0, 'completed', NULL, ''),
(41, 'Classic', '12', 0, NULL, 'Room20382815', 'real_user', 26, '2023-05-22 21:01:03', NULL, '2023-05-22 21:01:07', 0, 'completed', NULL, ''),
(42, '', '12', 0, NULL, 'Room76576030', 'computer', 0, '2023-05-22 22:03:32', 'winner', '2023-05-22 22:03:56', 0, 'completed', NULL, ''),
(43, 'Classic', '12', 0, NULL, 'Room76576030', 'real_user', 18, '2023-05-22 22:03:36', NULL, '2023-05-22 22:03:56', 0, 'completed', '1684773249', ''),
(44, '', '12', 0, NULL, 'Room98349635', 'computer', 0, '2023-05-22 22:05:22', 'winner', '2023-05-22 22:05:54', 0, 'completed', NULL, ''),
(45, 'Classic', '12', 0, NULL, 'Room98349635', 'real_user', 18, '2023-05-22 22:05:26', NULL, '2023-05-22 22:05:54', 0, 'completed', '1684773368', ''),
(46, '', '12', 0, NULL, 'Room05822855', 'computer', 0, '2023-05-22 23:49:58', 'winner', '2023-05-22 23:50:06', 0, 'completed', NULL, ''),
(47, 'Classic', '12', 0, NULL, 'Room05822855', 'real_user', 18, '2023-05-22 23:50:02', NULL, '2023-05-22 23:50:06', 0, 'completed', '1684779612', ''),
(48, '', '12', 0, NULL, 'Room28638752', 'computer', 0, '2023-05-24 11:35:33', NULL, '2023-05-24 11:35:33', 0, 'running', NULL, ''),
(49, '', '12', 0, NULL, 'Room37831418', 'computer', 0, '2023-05-24 11:42:33', 'winner', '2023-05-24 11:43:23', 0, 'completed', NULL, ''),
(50, 'Classic', '12', 0, NULL, 'Room37831418', 'real_user', 45, '2023-05-24 11:42:36', NULL, '2023-05-24 11:43:23', 0, 'completed', NULL, ''),
(51, '', '12', 0, NULL, 'Room30152409', 'computer', 0, '2023-05-24 11:43:25', 'winner', '2023-05-24 11:49:01', 0, 'completed', NULL, ''),
(52, 'Classic', '12', 0, NULL, 'Room30152409', 'real_user', 45, '2023-05-24 11:43:28', NULL, '2023-05-24 11:49:01', 0, 'completed', NULL, ''),
(53, '', '12', 0, NULL, 'Room81985928', 'computer', 0, '2023-05-24 11:49:02', 'winner', '2023-05-24 11:54:33', 0, 'completed', NULL, ''),
(54, '', '12', 0, NULL, 'Room81985928', 'computer', 0, '2023-05-24 11:49:03', 'winner', '2023-05-24 11:54:33', 0, 'completed', NULL, ''),
(55, 'Classic', '12', 0, NULL, 'Room81985928', 'real_user', 45, '2023-05-24 11:49:06', NULL, '2023-05-24 11:54:33', 0, 'completed', NULL, ''),
(56, '', '12', 0, NULL, 'Room35859207', 'computer', 0, '2023-05-24 11:54:34', 'winner', '2023-05-24 12:04:22', 0, 'completed', NULL, ''),
(57, '', '12', 0, NULL, 'Room35859207', 'computer', 0, '2023-05-24 11:54:34', 'winner', '2023-05-24 12:04:22', 0, 'completed', NULL, ''),
(58, 'Classic', '12', 0, NULL, 'Room35859207', 'real_user', 45, '2023-05-24 11:54:38', NULL, '2023-05-24 12:04:22', 0, 'completed', NULL, ''),
(59, '', '12', 0, NULL, 'Room41614157', 'computer', 0, '2023-05-24 12:04:24', 'winner', '2023-05-24 12:05:34', 0, 'completed', NULL, ''),
(60, 'Classic', '12', 0, NULL, 'Room41614157', 'real_user', 45, '2023-05-24 12:04:28', NULL, '2023-05-24 12:05:34', 0, 'completed', NULL, ''),
(61, '', '12', 0, NULL, 'Room50332826', 'computer', 0, '2023-05-24 12:05:36', 'winner', '2023-05-24 12:05:46', 0, 'completed', NULL, ''),
(62, 'Classic', '12', 0, NULL, 'Room50332826', 'real_user', 45, '2023-05-24 12:05:39', NULL, '2023-05-24 12:05:46', 0, 'completed', NULL, ''),
(63, '', '12', 0, NULL, 'Room57061723', 'computer', 0, '2023-05-24 12:10:20', NULL, '2023-05-24 12:10:20', 0, 'running', NULL, ''),
(64, 'Classic', '12', 0, NULL, 'Room57061723', 'real_user', 45, '2023-05-24 12:10:24', NULL, '2023-05-24 12:10:24', 0, 'running', NULL, ''),
(65, '', '12', 0, NULL, 'Room13301560', 'computer', 0, '2023-05-24 15:14:45', 'winner', '2023-05-24 15:14:53', 0, 'completed', NULL, ''),
(66, 'Classic', '12', 0, NULL, 'Room13301560', 'real_user', 2, '2023-05-24 15:14:48', NULL, '2023-05-24 15:14:53', 0, 'completed', NULL, ''),
(67, '', '12', 0, NULL, 'Room40407623', 'computer', 0, '2023-05-24 15:31:48', NULL, '2023-05-24 15:31:48', 0, 'running', NULL, ''),
(68, 'Classic', '12', 0, NULL, 'Room40407623', 'real_user', 2, '2023-05-24 15:31:52', NULL, '2023-05-24 15:31:52', 0, 'running', '1684922545', ''),
(69, '', '12', 0, NULL, 'Room22502511', 'computer', 0, '2023-05-24 15:51:55', 'winner', '2023-05-24 15:52:03', 0, 'completed', NULL, ''),
(70, 'Classic', '12', 0, NULL, 'Room22502511', 'real_user', 4, '2023-05-24 15:51:58', NULL, '2023-05-24 15:52:03', 0, 'completed', NULL, ''),
(71, '', '12', 0, NULL, 'Room02442958', 'computer', 0, '2023-05-24 15:55:35', 'winner', '2023-05-24 15:57:25', 0, 'completed', NULL, ''),
(72, 'Classic', '12', 0, NULL, 'Room02442958', 'real_user', 4, '2023-05-24 15:55:39', NULL, '2023-05-24 15:57:25', 0, 'completed', NULL, ''),
(73, '', '12', 0, NULL, 'Room54470990', 'computer', 0, '2023-05-24 16:15:18', 'winner', '2023-05-24 16:15:26', 0, 'completed', NULL, ''),
(74, 'Classic', '12', 0, NULL, 'Room54470990', 'real_user', 4, '2023-05-24 16:15:22', NULL, '2023-05-24 16:15:26', 0, 'completed', NULL, ''),
(75, '', '12', 0, NULL, 'Room72255820', 'computer', 0, '2023-05-29 19:55:34', 'winner', '2023-05-29 19:56:22', 0, 'completed', NULL, ''),
(76, 'Classic', '12', 0, NULL, 'Room72255820', 'real_user', 9, '2023-05-29 19:55:38', NULL, '2023-05-29 19:56:22', 0, 'completed', NULL, ''),
(77, '', '12', 0, NULL, 'Room15733366', 'computer', 0, '2023-05-30 15:22:19', 'winner', '2023-05-30 16:39:33', 0, 'completed', NULL, ''),
(78, 'Classic', '12', 0, NULL, 'Room15733366', 'real_user', 12, '2023-05-30 15:22:22', NULL, '2023-05-30 16:39:33', 0, 'completed', '1685440422', ''),
(79, 'Classic', '12', 10, 19, 'Room51745914', 'real_user', 13, '2023-05-30 16:45:24', 'winner', '2023-05-30 16:45:41', 1, 'completed', NULL, ''),
(80, 'Classic', '12', 10, NULL, 'Room51745914', 'real_user', 12, '2023-05-30 16:45:25', NULL, '2023-05-30 16:45:41', 0, 'completed', NULL, ''),
(81, '', '12', 0, NULL, 'Room46889112', 'computer', 0, '2023-05-31 10:05:57', 'winner', '2023-05-31 10:06:29', 0, 'completed', NULL, ''),
(82, 'Classic', '12', 0, NULL, 'Room46889112', 'real_user', 12, '2023-05-31 10:06:01', NULL, '2023-05-31 10:06:29', 0, 'completed', NULL, ''),
(83, '', '12', 0, NULL, 'Room90267457', 'computer', 0, '2023-06-02 20:44:48', 'winner', '2023-06-02 20:45:10', 0, 'completed', NULL, ''),
(84, 'Classic', '12', 0, NULL, 'Room90267457', 'real_user', 34, '2023-06-02 20:44:52', NULL, '2023-06-02 20:45:10', 0, 'completed', '1685718921', ''),
(85, '', '12', 0, NULL, 'Room44001181', 'computer', 0, '2023-06-02 21:29:55', 'winner', '2023-06-02 21:30:24', 0, 'completed', NULL, ''),
(86, 'Classic', '12', 0, NULL, 'Room44001181', 'real_user', 34, '2023-06-02 21:29:59', NULL, '2023-06-02 21:30:24', 0, 'completed', '1685721626', ''),
(87, '', '12', 0, NULL, 'Room93378665', 'computer', 0, '2023-06-03 22:34:30', 'winner', '2023-06-03 22:34:41', 0, 'completed', NULL, ''),
(88, 'Classic', '12', 0, NULL, 'Room93378665', 'real_user', 42, '2023-06-03 22:34:36', NULL, '2023-06-03 22:34:41', 0, 'completed', NULL, ''),
(89, '', '12', 0, NULL, 'Room67073408', 'computer', 0, '2023-06-03 22:35:25', 'winner', '2023-06-03 22:46:30', 0, 'completed', NULL, ''),
(90, 'Classic', '12', 0, NULL, 'Room67073408', 'real_user', 42, '2023-06-03 22:35:29', NULL, '2023-06-03 22:46:30', 0, 'completed', NULL, ''),
(91, '', '12', 0, NULL, 'Room14916155', 'computer', 0, '2023-06-03 22:46:32', NULL, '2023-06-03 22:46:32', 0, 'running', NULL, ''),
(92, 'Classic', '12', 0, NULL, 'Room14916155', 'real_user', 42, '2023-06-03 22:46:36', NULL, '2023-06-03 22:46:36', 0, 'running', NULL, ''),
(93, '', '12', 0, NULL, 'Room40173780', 'computer', 0, '2023-06-05 18:00:16', 'winner', '2023-06-05 18:03:55', 0, 'completed', NULL, ''),
(94, 'Classic', '12', 0, NULL, 'Room40173780', 'real_user', 52, '2023-06-05 18:00:21', NULL, '2023-06-05 18:03:55', 0, 'completed', NULL, ''),
(95, '', '12', 0, NULL, 'Room86141751', 'computer', 0, '2023-06-05 18:03:56', 'winner', '2023-06-05 18:04:03', 0, 'completed', NULL, ''),
(96, 'Classic', '12', 0, NULL, 'Room86141751', 'real_user', 52, '2023-06-05 18:04:00', NULL, '2023-06-05 18:04:03', 0, 'completed', NULL, ''),
(97, '', '12', 0, NULL, 'Room66191063', 'computer', 0, '2023-06-05 18:04:59', 'winner', '2023-06-05 18:05:09', 0, 'completed', NULL, ''),
(98, 'Classic', '12', 0, NULL, 'Room66191063', 'real_user', 53, '2023-06-05 18:05:03', NULL, '2023-06-05 18:05:09', 0, 'completed', NULL, ''),
(99, '', '12', 0, NULL, 'Room81632993', 'computer', 0, '2023-06-05 18:10:30', 'winner', '2023-06-05 18:10:43', 0, 'completed', NULL, ''),
(100, 'Classic', '12', 0, NULL, 'Room81632993', 'real_user', 54, '2023-06-05 18:10:33', NULL, '2023-06-05 18:10:43', 0, 'completed', NULL, ''),
(101, '', '12', 0, NULL, 'Room14148706', 'computer', 0, '2023-06-05 18:11:09', 'winner', '2023-06-05 18:11:17', 0, 'completed', NULL, ''),
(102, 'Classic', '12', 0, NULL, 'Room14148706', 'real_user', 54, '2023-06-05 18:11:13', NULL, '2023-06-05 18:11:17', 0, 'completed', NULL, ''),
(103, '', '12', 0, NULL, 'Room62231030', 'computer', 0, '2023-06-05 19:07:13', 'winner', '2023-06-05 19:07:29', 0, 'completed', NULL, ''),
(104, 'Classic', '12', 0, NULL, 'Room62231030', 'real_user', 59, '2023-06-05 19:07:16', NULL, '2023-06-05 19:07:29', 0, 'completed', NULL, ''),
(105, '', '12', 0, NULL, 'Room65670604', 'computer', 0, '2023-06-05 19:11:20', 'winner', '2023-06-05 19:11:28', 0, 'completed', NULL, ''),
(106, 'Classic', '12', 0, NULL, 'Room65670604', 'real_user', 60, '2023-06-05 19:11:23', NULL, '2023-06-05 19:11:28', 0, 'completed', NULL, ''),
(107, '', '12', 0, NULL, 'Room98083283', 'computer', 0, '2023-06-05 19:15:33', 'winner', '2023-06-06 14:58:11', 0, 'completed', NULL, ''),
(108, 'Classic', '12', 0, NULL, 'Room98083283', 'real_user', 60, '2023-06-05 19:15:37', NULL, '2023-06-06 14:58:11', 0, 'completed', NULL, ''),
(109, '', '12', 0, NULL, 'Room04311368', 'computer', 0, '2023-06-06 11:25:53', NULL, '2023-06-06 11:25:53', 0, 'running', NULL, ''),
(110, '', '12', 0, NULL, 'Room63955875', 'computer', 0, '2023-06-06 11:28:03', 'winner', '2023-06-06 11:30:44', 0, 'completed', NULL, ''),
(111, 'Classic', '12', 0, NULL, 'Room63955875', 'real_user', 61, '2023-06-06 11:28:06', NULL, '2023-06-06 11:30:44', 0, 'completed', '1686031184', ''),
(112, '', '12', 0, NULL, 'Room05011396', 'computer', 0, '2023-06-06 11:39:05', 'winner', '2023-06-06 11:48:18', 0, 'completed', NULL, ''),
(113, 'Classic', '12', 0, NULL, 'Room05011396', 'real_user', 62, '2023-06-06 11:39:09', NULL, '2023-06-06 11:48:18', 0, 'completed', '1686031948', ''),
(114, '', '12', 0, NULL, 'Room52215583', 'computer', 0, '2023-06-06 11:48:25', 'winner', '2023-06-06 11:50:36', 0, 'completed', NULL, ''),
(115, 'Classic', '12', 0, NULL, 'Room52215583', 'real_user', 62, '2023-06-06 11:48:29', NULL, '2023-06-06 11:50:36', 0, 'completed', '1686032389', ''),
(116, '', '12', 0, NULL, 'Room81836337', 'computer', 0, '2023-06-06 14:58:13', 'winner', '2023-06-06 14:58:40', 0, 'completed', NULL, ''),
(117, 'Classic', '12', 0, NULL, 'Room81836337', 'real_user', 60, '2023-06-06 14:58:17', NULL, '2023-06-06 14:58:40', 0, 'completed', '1686043698', ''),
(118, '', '12', 0, NULL, 'Room09790136', 'computer', 0, '2023-06-06 15:00:44', 'winner', '2023-06-06 15:01:50', 0, 'completed', NULL, ''),
(119, 'Classic', '12', 0, NULL, 'Room09790136', 'real_user', 60, '2023-06-06 15:00:48', NULL, '2023-06-06 15:01:50', 0, 'completed', NULL, ''),
(120, '', '12', 0, NULL, 'Room55823425', 'computer', 0, '2023-06-06 15:46:34', 'winner', '2023-06-06 15:47:53', 0, 'completed', NULL, ''),
(121, 'Classic', '12', 0, NULL, 'Room55823425', 'real_user', 60, '2023-06-06 15:46:37', NULL, '2023-06-06 15:47:53', 0, 'completed', '1686046648', ''),
(122, '', '12', 0, NULL, 'Room66630530', 'computer', 0, '2023-06-06 15:55:10', 'winner', '2023-06-06 17:28:48', 0, 'completed', NULL, ''),
(123, 'Classic', '12', 0, NULL, 'Room66630530', 'real_user', 60, '2023-06-06 15:55:13', NULL, '2023-06-06 17:28:48', 0, 'completed', '1686047119', ''),
(124, '', '12', 0, NULL, 'Room69766143', 'computer', 0, '2023-06-06 16:03:35', 'winner', '2023-06-06 16:03:44', 0, 'completed', NULL, ''),
(125, 'Classic', '12', 0, NULL, 'Room69766143', 'real_user', 59, '2023-06-06 16:03:39', NULL, '2023-06-06 16:03:44', 0, 'completed', NULL, ''),
(126, '', '12', 0, NULL, 'Room10325577', 'computer', 0, '2023-06-06 16:04:08', 'winner', '2023-06-06 16:04:51', 0, 'completed', NULL, ''),
(127, 'Classic', '12', 0, NULL, 'Room10325577', 'real_user', 59, '2023-06-06 16:04:11', NULL, '2023-06-06 16:04:51', 0, 'completed', NULL, ''),
(128, '', '12', 0, NULL, 'Room13454167', 'computer', 0, '2023-06-06 16:04:53', 'winner', '2023-06-06 16:06:18', 0, 'completed', NULL, ''),
(129, 'Classic', '12', 0, NULL, 'Room13454167', 'real_user', 59, '2023-06-06 16:04:56', NULL, '2023-06-06 16:06:18', 0, 'completed', NULL, ''),
(130, '', '12', 0, NULL, 'Room62723631', 'computer', 0, '2023-06-06 16:06:19', 'winner', '2023-06-06 16:06:56', 0, 'completed', NULL, ''),
(131, 'Classic', '12', 0, NULL, 'Room62723631', 'real_user', 59, '2023-06-06 16:06:23', NULL, '2023-06-06 16:06:56', 0, 'completed', NULL, ''),
(132, '', '12', 0, NULL, 'Room23971276', 'computer', 0, '2023-06-06 16:06:58', NULL, '2023-06-06 16:06:58', 0, 'running', NULL, ''),
(133, '', '12', 0, NULL, 'Room29545296', 'computer', 0, '2023-06-06 16:09:39', 'winner', '2023-06-06 16:11:30', 0, 'completed', NULL, ''),
(134, 'Classic', '12', 0, NULL, 'Room29545296', 'real_user', 59, '2023-06-06 16:09:42', NULL, '2023-06-06 16:11:30', 0, 'completed', NULL, ''),
(135, '', '12', 0, NULL, 'Room22430679', 'computer', 0, '2023-06-06 16:11:38', 'winner', '2023-06-06 16:12:05', 0, 'completed', NULL, ''),
(136, 'Classic', '12', 0, NULL, 'Room22430679', 'real_user', 59, '2023-06-06 16:11:38', NULL, '2023-06-06 16:12:05', 0, 'completed', NULL, ''),
(137, '', '12', 0, NULL, 'Room04215347', 'computer', 0, '2023-06-06 16:12:07', 'winner', '2023-06-06 16:23:27', 0, 'completed', NULL, ''),
(138, 'Classic', '12', 0, NULL, 'Room04215347', 'real_user', 59, '2023-06-06 16:12:07', NULL, '2023-06-06 16:23:27', 0, 'completed', NULL, ''),
(139, '', '12', 0, NULL, 'Room63484761', 'computer', 0, '2023-06-06 16:23:33', 'winner', '2023-06-06 16:26:12', 0, 'completed', NULL, ''),
(140, 'Classic', '12', 0, NULL, 'Room63484761', 'real_user', 59, '2023-06-06 16:23:33', NULL, '2023-06-06 16:26:12', 0, 'completed', NULL, ''),
(141, '', '12', 0, NULL, 'Room36683082', 'computer', 0, '2023-06-06 16:26:17', 'winner', '2023-06-06 16:26:42', 0, 'completed', NULL, ''),
(142, 'Classic', '12', 0, NULL, 'Room36683082', 'real_user', 59, '2023-06-06 16:26:18', NULL, '2023-06-06 16:26:42', 0, 'completed', NULL, ''),
(143, '', '12', 0, NULL, 'Room97500434', 'computer', 0, '2023-06-06 16:26:43', 'winner', '2023-06-06 16:27:47', 0, 'completed', NULL, ''),
(144, 'Classic', '12', 0, NULL, 'Room97500434', 'real_user', 59, '2023-06-06 16:26:44', NULL, '2023-06-06 16:27:47', 0, 'completed', NULL, ''),
(145, '', '12', 0, NULL, 'Room41581744', 'computer', 0, '2023-06-06 16:27:49', NULL, '2023-06-06 16:27:49', 0, 'running', NULL, ''),
(146, '', '12', 0, NULL, 'Room65990079', 'computer', 0, '2023-06-06 16:30:17', 'winner', '2023-06-06 16:32:27', 0, 'completed', NULL, ''),
(147, 'Classic', '12', 0, NULL, 'Room65990079', 'real_user', 59, '2023-06-06 16:30:18', NULL, '2023-06-06 16:32:27', 0, 'completed', NULL, ''),
(148, '', '12', 0, NULL, 'Room64298774', 'computer', 0, '2023-06-06 16:32:28', 'winner', '2023-06-06 16:33:49', 0, 'completed', NULL, ''),
(149, 'Classic', '12', 0, NULL, 'Room64298774', 'real_user', 59, '2023-06-06 16:32:29', NULL, '2023-06-06 16:33:49', 0, 'completed', NULL, ''),
(150, '', '12', 0, NULL, 'Room54199690', 'computer', 0, '2023-06-06 16:33:51', 'winner', '2023-06-06 16:34:24', 0, 'completed', NULL, ''),
(151, 'Classic', '12', 0, NULL, 'Room54199690', 'real_user', 59, '2023-06-06 16:33:51', NULL, '2023-06-06 16:34:24', 0, 'completed', NULL, ''),
(152, '', '12', 0, NULL, 'Room30113990', 'computer', 0, '2023-06-06 16:34:25', 'winner', '2023-06-06 16:34:34', 0, 'completed', NULL, ''),
(153, 'Classic', '12', 0, NULL, 'Room30113990', 'real_user', 59, '2023-06-06 16:34:26', NULL, '2023-06-06 16:34:34', 0, 'completed', NULL, ''),
(154, '', '12', 0, NULL, 'Room41798869', 'computer', 0, '2023-06-06 16:34:39', 'winner', '2023-06-06 16:35:44', 0, 'completed', NULL, ''),
(155, 'Classic', '12', 0, NULL, 'Room41798869', 'real_user', 59, '2023-06-06 16:34:39', NULL, '2023-06-06 16:35:44', 0, 'completed', NULL, ''),
(156, '', '12', 0, NULL, 'Room46922080', 'computer', 0, '2023-06-06 16:35:45', 'winner', '2023-06-06 16:36:00', 0, 'completed', NULL, ''),
(157, 'Classic', '12', 0, NULL, 'Room46922080', 'real_user', 59, '2023-06-06 16:35:45', NULL, '2023-06-06 16:36:00', 0, 'completed', NULL, ''),
(158, '', '12', 0, NULL, 'Room45125344', 'computer', 0, '2023-06-06 16:36:08', 'winner', '2023-06-06 16:38:37', 0, 'completed', NULL, ''),
(159, 'Classic', '12', 0, NULL, 'Room45125344', 'real_user', 59, '2023-06-06 16:36:09', NULL, '2023-06-06 16:38:37', 0, 'completed', NULL, ''),
(160, '', '12', 0, NULL, 'Room29009319', 'computer', 0, '2023-06-06 16:38:39', 'winner', '2023-06-06 16:38:44', 0, 'completed', NULL, ''),
(161, 'Classic', '12', 0, NULL, 'Room29009319', 'real_user', 59, '2023-06-06 16:38:39', NULL, '2023-06-06 16:38:44', 0, 'completed', NULL, ''),
(162, '', '12', 0, NULL, 'Room64049083', 'computer', 0, '2023-06-06 16:38:48', 'winner', '2023-06-06 17:10:30', 0, 'completed', NULL, ''),
(163, 'Classic', '12', 0, NULL, 'Room64049083', 'real_user', 59, '2023-06-06 16:38:49', NULL, '2023-06-06 17:10:30', 0, 'completed', NULL, ''),
(164, '', '12', 0, NULL, 'Room21825372', 'computer', 0, '2023-06-06 17:10:32', 'winner', '2023-06-06 17:11:07', 0, 'completed', NULL, ''),
(165, 'Classic', '12', 0, NULL, 'Room21825372', 'real_user', 59, '2023-06-06 17:10:32', NULL, '2023-06-06 17:11:07', 0, 'completed', NULL, ''),
(166, '', '12', 0, NULL, 'Room66064756', 'computer', 0, '2023-06-06 17:29:04', 'winner', '2023-06-06 17:29:44', 0, 'completed', NULL, ''),
(167, 'Classic', '12', 0, NULL, 'Room66064756', 'real_user', 60, '2023-06-06 17:29:05', NULL, '2023-06-06 17:29:44', 0, 'completed', '1686052824', ''),
(168, '', '12', 0, NULL, 'Room08266094', 'computer', 0, '2023-06-06 17:31:54', 'winner', '2023-06-06 18:08:08', 0, 'completed', NULL, ''),
(169, 'Classic', '12', 0, NULL, 'Room08266094', 'real_user', 60, '2023-06-06 17:31:54', NULL, '2023-06-06 18:08:08', 0, 'completed', '1686052927', ''),
(170, 'Classic', '12', 10, NULL, 'Room00601043', 'real_user', 60, '2023-06-06 18:31:58', NULL, '2023-06-06 18:36:57', 0, 'completed', '1686056685', ''),
(171, 'Classic', '12', 10, 18, 'Room00601043', 'real_user', 59, '2023-06-06 18:31:59', 'winner', '2023-06-06 18:36:57', 2, 'completed', NULL, ''),
(172, '', '12', 0, NULL, 'Room74979156', 'computer', 0, '2023-06-06 18:47:18', 'winner', '2023-06-06 18:47:22', 0, 'completed', NULL, ''),
(173, 'Classic', '12', 0, NULL, 'Room74979156', 'real_user', 60, '2023-06-06 18:47:18', NULL, '2023-06-06 18:47:22', 0, 'completed', NULL, ''),
(174, '', '12', 0, NULL, 'Room85389819', 'computer', 0, '2023-06-06 19:16:16', 'winner', '2023-06-06 19:16:22', 0, 'completed', NULL, ''),
(175, 'Classic', '12', 0, NULL, 'Room85389819', 'real_user', 60, '2023-06-06 19:16:17', NULL, '2023-06-06 19:16:22', 0, 'completed', '1686059194', ''),
(176, '', '12', 0, NULL, 'Room61879495', 'computer', 0, '2023-06-06 19:26:10', 'winner', '2023-06-06 19:26:41', 0, 'completed', NULL, ''),
(177, 'Classic', '12', 0, NULL, 'Room61879495', 'real_user', 64, '2023-06-06 19:26:14', NULL, '2023-06-06 19:26:41', 0, 'completed', '1686059797', ''),
(178, '', '12', 0, NULL, 'Room62625826', 'computer', 0, '2023-06-06 19:38:40', 'winner', '2023-06-06 19:39:53', 0, 'completed', NULL, ''),
(179, 'Classic', '12', 0, NULL, 'Room62625826', 'real_user', 65, '2023-06-06 19:38:41', NULL, '2023-06-06 19:39:53', 0, 'completed', NULL, ''),
(180, '', '12', 0, NULL, 'Room52018709', 'computer', 0, '2023-06-06 19:40:29', 'winner', '2023-06-06 19:41:32', 0, 'completed', NULL, ''),
(181, 'Classic', '12', 0, NULL, 'Room52018709', 'real_user', 65, '2023-06-06 19:40:30', NULL, '2023-06-06 19:41:32', 0, 'completed', NULL, ''),
(182, '', '12', 0, NULL, 'Room25117968', 'computer', 0, '2023-06-06 19:43:48', 'winner', '2023-06-06 19:47:36', 0, 'completed', NULL, ''),
(183, 'Classic', '12', 0, NULL, 'Room25117968', 'real_user', 65, '2023-06-06 19:43:48', NULL, '2023-06-06 19:47:36', 0, 'completed', '1686061035', ''),
(184, '', '12', 0, NULL, 'Room11815382', 'computer', 0, '2023-06-06 19:50:00', 'winner', '2023-06-06 20:02:47', 0, 'completed', NULL, ''),
(185, 'Classic', '12', 0, NULL, 'Room11815382', 'real_user', 66, '2023-06-06 19:50:01', NULL, '2023-06-06 20:02:47', 0, 'completed', '1686061340', ''),
(186, '', '12', 0, NULL, 'Room12290330', 'computer', 0, '2023-06-06 20:03:55', 'winner', '2023-06-06 20:04:26', 0, 'completed', NULL, ''),
(187, 'Classic', '12', 0, NULL, 'Room12290330', 'real_user', 66, '2023-06-06 20:03:56', NULL, '2023-06-06 20:04:26', 0, 'completed', NULL, ''),
(188, '', '12', 0, NULL, 'Room61627333', 'computer', 0, '2023-06-06 20:25:41', 'winner', '2023-06-06 20:32:16', 0, 'completed', NULL, ''),
(189, 'Classic', '12', 0, NULL, 'Room61627333', 'real_user', 66, '2023-06-06 20:25:42', NULL, '2023-06-06 20:32:16', 0, 'completed', '1686063639', ''),
(190, '', '12', 0, NULL, 'Room97294269', 'computer', 0, '2023-06-07 08:29:03', NULL, '2023-06-07 08:39:15', 0, 'completed', NULL, ''),
(191, 'Classic', '12', 0, 0, 'Room97294269', 'real_user', 66, '2023-06-07 08:29:04', 'winner', '2023-06-07 08:39:15', 0, 'completed', NULL, ''),
(192, '', '12', 0, NULL, 'Room78758633', 'computer', 0, '2023-06-07 11:40:50', 'winner', '2023-06-07 11:41:00', 0, 'completed', NULL, ''),
(193, 'Classic', '12', 0, NULL, 'Room78758633', 'real_user', 59, '2023-06-07 11:40:52', NULL, '2023-06-07 11:41:00', 0, 'completed', NULL, ''),
(194, '', '12', 0, NULL, 'Room84465910', 'computer', 0, '2023-06-07 11:41:08', 'winner', '2023-06-07 11:41:26', 0, 'completed', NULL, ''),
(195, 'Classic', '12', 0, NULL, 'Room84465910', 'real_user', 59, '2023-06-07 11:41:08', NULL, '2023-06-07 11:41:26', 0, 'completed', NULL, ''),
(196, '', '12', 0, NULL, 'Room17724436', 'computer', 0, '2023-06-07 11:41:40', 'winner', '2023-06-07 11:44:36', 0, 'completed', NULL, ''),
(197, 'Classic', '12', 0, NULL, 'Room17724436', 'real_user', 59, '2023-06-07 11:41:41', NULL, '2023-06-07 11:44:36', 0, 'completed', NULL, ''),
(198, '', '12', 0, NULL, 'Room99893121', 'computer', 0, '2023-06-07 11:44:39', 'winner', '2023-06-07 11:50:13', 0, 'completed', NULL, ''),
(199, 'Classic', '12', 0, NULL, 'Room99893121', 'real_user', 59, '2023-06-07 11:44:39', NULL, '2023-06-07 11:50:13', 0, 'completed', NULL, ''),
(200, '', '12', 0, NULL, 'Room77212092', 'computer', 0, '2023-06-07 11:50:15', 'winner', '2023-06-07 11:51:41', 0, 'completed', NULL, ''),
(201, 'Classic', '12', 0, NULL, 'Room77212092', 'real_user', 59, '2023-06-07 11:50:15', NULL, '2023-06-07 11:51:41', 0, 'completed', NULL, ''),
(202, '', '12', 0, NULL, 'Room47698685', 'computer', 0, '2023-06-07 11:51:43', 'winner', '2023-06-07 11:55:49', 0, 'completed', NULL, ''),
(203, 'Classic', '12', 0, NULL, 'Room47698685', 'real_user', 59, '2023-06-07 11:51:43', NULL, '2023-06-07 11:55:49', 0, 'completed', NULL, ''),
(204, '', '12', 0, NULL, 'Room36242884', 'computer', 0, '2023-06-07 11:55:51', NULL, '2023-06-07 11:55:51', 0, 'running', NULL, ''),
(205, 'Classic', '12', 0, NULL, 'Room36242884', 'real_user', 59, '2023-06-07 11:55:51', NULL, '2023-06-07 11:55:51', 0, 'running', NULL, ''),
(206, '', '12', 0, NULL, 'Room99373757', 'computer', 0, '2023-06-07 15:58:33', 'winner', '2023-06-07 16:04:40', 0, 'completed', NULL, ''),
(207, 'Classic', '12', 0, NULL, 'Room99373757', 'real_user', 68, '2023-06-07 15:58:34', NULL, '2023-06-07 16:04:40', 0, 'completed', '1686134081', ''),
(208, '', '12', 0, NULL, 'Room02944839', 'computer', 0, '2023-06-07 17:38:00', NULL, '2023-06-07 17:51:14', 0, 'completed', NULL, ''),
(209, 'Classic', '12', 0, NULL, 'Room02944839', 'real_user', 76, '2023-06-07 17:38:01', NULL, '2023-06-07 17:51:14', 0, 'completed', '1686139875', ''),
(210, 'Classic', '12', 0, 0, 'Room49412584', 'real_user', 80, '2023-06-07 18:21:28', 'winner', '2023-06-07 18:21:28', 0, 'completed', NULL, ''),
(211, '', '12', 0, NULL, 'Room05038942', 'computer', 0, '2023-06-07 18:40:45', NULL, '2023-06-07 18:40:45', 0, 'running', NULL, ''),
(212, 'Classic', '12', 0, NULL, 'Room05038942', 'real_user', 80, '2023-06-07 18:40:45', NULL, '2023-06-07 18:40:45', 0, 'running', NULL, ''),
(213, '', '12', 0, NULL, 'Room75424298', 'computer', 0, '2023-06-08 09:01:23', 'winner', '2023-06-08 09:04:36', 0, 'completed', NULL, ''),
(214, 'Classic', '12', 0, NULL, 'Room75424298', 'real_user', 93, '2023-06-08 09:01:24', NULL, '2023-06-08 09:04:36', 0, 'completed', NULL, ''),
(215, '', '12', 0, NULL, 'Room90317198', 'computer', 0, '2023-06-08 09:08:48', NULL, '2023-06-08 09:08:48', 0, 'running', NULL, ''),
(216, 'Classic', '12', 0, NULL, 'Room90317198', 'real_user', 93, '2023-06-08 09:08:55', NULL, '2023-06-08 09:08:55', 0, 'running', NULL, ''),
(217, '', '12', 0, NULL, 'Room40336071', 'computer', 0, '2023-06-08 17:40:51', 'winner', '2023-06-08 17:43:10', 0, 'completed', NULL, ''),
(218, 'Classic', '12', 0, NULL, 'Room40336071', 'real_user', 116, '2023-06-08 17:40:52', NULL, '2023-06-08 17:43:10', 0, 'completed', '1686226262', ''),
(219, '', '12', 0, NULL, 'Room11862031', 'computer', 0, '2023-06-08 17:52:33', 'winner', '2023-06-08 18:23:34', 0, 'completed', NULL, ''),
(220, 'Classic', '12', 0, NULL, 'Room11862031', 'real_user', 115, '2023-06-08 17:52:35', NULL, '2023-06-08 18:23:34', 0, 'completed', NULL, ''),
(221, '', '12', 0, NULL, 'Room55889770', 'computer', 0, '2023-06-08 18:23:36', 'winner', '2023-06-08 18:50:42', 0, 'completed', NULL, ''),
(222, 'Classic', '12', 0, NULL, 'Room55889770', 'real_user', 115, '2023-06-08 18:23:37', NULL, '2023-06-08 18:50:42', 0, 'completed', NULL, ''),
(223, '', '12', 0, NULL, 'Room52944799', 'computer', 0, '2023-06-08 18:38:07', 'winner', '2023-06-08 18:41:22', 0, 'completed', NULL, ''),
(224, 'Classic', '12', 0, NULL, 'Room52944799', 'real_user', 117, '2023-06-08 18:38:08', NULL, '2023-06-08 18:41:22', 0, 'completed', '1686229710', ''),
(225, '', '12', 0, NULL, 'Room23951949', 'computer', 0, '2023-06-08 18:50:44', 'winner', '2023-06-08 18:52:49', 0, 'completed', NULL, ''),
(226, 'Classic', '12', 0, NULL, 'Room23951949', 'real_user', 115, '2023-06-08 18:50:44', NULL, '2023-06-08 18:52:49', 0, 'completed', NULL, ''),
(227, '', '12', 0, NULL, 'Room81530705', 'computer', 0, '2023-06-08 18:52:51', 'winner', '2023-06-08 18:54:36', 0, 'completed', NULL, ''),
(228, 'Classic', '12', 0, NULL, 'Room81530705', 'real_user', 115, '2023-06-08 18:52:51', NULL, '2023-06-08 18:54:36', 0, 'completed', NULL, ''),
(229, '', '12', 0, NULL, 'Room38076891', 'computer', 0, '2023-06-08 18:54:38', 'winner', '2023-06-08 18:56:13', 0, 'completed', NULL, ''),
(230, 'Classic', '12', 0, NULL, 'Room38076891', 'real_user', 115, '2023-06-08 18:54:39', NULL, '2023-06-08 18:56:13', 0, 'completed', NULL, ''),
(231, '', '12', 0, NULL, 'Room84940502', 'computer', 0, '2023-06-08 18:56:16', NULL, '2023-06-08 18:56:16', 0, 'running', NULL, ''),
(232, 'Classic', '12', 0, NULL, 'Room84940502', 'real_user', 115, '2023-06-08 18:56:17', NULL, '2023-06-08 18:56:17', 0, 'running', NULL, ''),
(233, '', '12', 0, NULL, 'Room89089906', 'computer', 0, '2023-06-08 19:40:26', 'winner', '2023-06-08 19:40:37', 0, 'completed', NULL, ''),
(234, 'Classic', '12', 0, NULL, 'Room89089906', 'real_user', 117, '2023-06-08 19:40:26', NULL, '2023-06-08 19:40:37', 0, 'completed', '1686233452', ''),
(235, '', '12', 0, NULL, 'Room42090886', 'computer', 0, '2023-06-08 19:41:59', 'winner', '2023-06-08 19:42:06', 0, 'completed', NULL, ''),
(236, 'Classic', '12', 0, NULL, 'Room42090886', 'real_user', 117, '2023-06-08 19:41:59', NULL, '2023-06-08 19:42:06', 0, 'completed', '1686233528', ''),
(237, '', '12', 0, NULL, 'Room07759186', 'computer', 0, '2023-06-08 19:46:04', 'winner', '2023-06-08 19:46:18', 0, 'completed', NULL, ''),
(238, 'Classic', '12', 0, NULL, 'Room07759186', 'real_user', 112, '2023-06-08 19:46:05', NULL, '2023-06-08 19:46:18', 0, 'completed', '1686233780', ''),
(239, '', '12', 0, NULL, 'Room37042132', 'computer', 0, '2023-06-08 21:08:45', 'winner', '2023-06-09 16:03:19', 0, 'completed', NULL, ''),
(240, 'Classic', '12', 0, NULL, 'Room37042132', 'real_user', 119, '2023-06-08 21:08:46', NULL, '2023-06-09 16:03:19', 0, 'completed', '1686238816', ''),
(241, '', '12', 0, NULL, 'Room60920776', 'computer', 0, '2023-06-08 22:42:31', 'winner', '2023-06-08 22:47:43', 0, 'completed', NULL, ''),
(242, 'Classic', '12', 0, NULL, 'Room60920776', 'real_user', 112, '2023-06-08 22:42:33', NULL, '2023-06-08 22:47:43', 0, 'completed', NULL, ''),
(243, '', '12', 0, NULL, 'Room86458429', 'computer', 0, '2023-06-08 22:47:45', 'winner', '2023-06-08 22:47:58', 0, 'completed', NULL, ''),
(244, 'Classic', '12', 0, NULL, 'Room86458429', 'real_user', 112, '2023-06-08 22:47:46', NULL, '2023-06-08 22:47:58', 0, 'completed', NULL, ''),
(245, '', '12', 0, NULL, 'Room87484911', 'computer', 0, '2023-06-08 22:48:05', 'winner', '2023-06-08 22:48:09', 0, 'completed', NULL, ''),
(246, 'Classic', '12', 0, NULL, 'Room87484911', 'real_user', 112, '2023-06-08 22:48:05', NULL, '2023-06-08 22:48:09', 0, 'completed', NULL, ''),
(247, '', '12', 0, NULL, 'Room44392672', 'computer', 0, '2023-06-08 23:53:09', 'winner', '2023-06-09 00:03:51', 0, 'completed', NULL, ''),
(248, 'Classic', '12', 0, NULL, 'Room44392672', 'real_user', 112, '2023-06-08 23:53:09', NULL, '2023-06-09 00:03:51', 0, 'completed', NULL, ''),
(249, '', '12', 0, NULL, 'Room36051572', 'computer', 0, '2023-06-09 00:03:53', 'winner', '2023-06-09 00:04:16', 0, 'completed', NULL, ''),
(250, 'Classic', '12', 0, NULL, 'Room36051572', 'real_user', 112, '2023-06-09 00:03:54', NULL, '2023-06-09 00:04:16', 0, 'completed', '1686249259', ''),
(251, '', '12', 0, NULL, 'Room85788995', 'computer', 0, '2023-06-09 00:12:20', 'winner', '2023-06-09 00:12:45', 0, 'completed', NULL, ''),
(252, 'Classic', '12', 0, NULL, 'Room85788995', 'real_user', 112, '2023-06-09 00:12:21', NULL, '2023-06-09 00:12:45', 0, 'completed', '1686249745', ''),
(253, '', '12', 0, NULL, 'Room96425300', 'computer', 0, '2023-06-09 00:12:52', 'winner', '2023-06-09 00:14:03', 0, 'completed', NULL, ''),
(254, 'Classic', '12', 0, NULL, 'Room96425300', 'real_user', 112, '2023-06-09 00:12:52', NULL, '2023-06-09 00:14:03', 0, 'completed', NULL, ''),
(255, '', '12', 0, NULL, 'Room65639309', 'computer', 0, '2023-06-09 00:24:15', 'winner', '2023-06-09 00:24:27', 0, 'completed', NULL, ''),
(256, 'Classic', '12', 0, NULL, 'Room65639309', 'real_user', 112, '2023-06-09 00:24:16', NULL, '2023-06-09 00:24:27', 0, 'completed', NULL, ''),
(257, '', '12', 0, NULL, 'Room45826894', 'computer', 0, '2023-06-09 00:24:35', 'winner', '2023-06-09 10:28:19', 0, 'completed', NULL, ''),
(258, 'Classic', '12', 0, NULL, 'Room45826894', 'real_user', 112, '2023-06-09 00:24:35', NULL, '2023-06-09 10:28:19', 0, 'completed', '1686250488', ''),
(259, '', '12', 0, NULL, 'Room47210217', 'computer', 0, '2023-06-09 12:45:58', 'winner', '2023-06-09 12:46:21', 0, 'completed', NULL, ''),
(260, 'Classic', '12', 0, NULL, 'Room47210217', 'real_user', 112, '2023-06-09 12:45:59', NULL, '2023-06-09 12:46:21', 0, 'completed', NULL, ''),
(261, '', '12', 0, NULL, 'Room60374251', 'computer', 0, '2023-06-09 12:46:24', 'winner', '2023-06-09 12:55:40', 0, 'completed', NULL, ''),
(262, 'Classic', '12', 0, NULL, 'Room60374251', 'real_user', 112, '2023-06-09 12:46:24', NULL, '2023-06-09 12:55:40', 0, 'completed', NULL, ''),
(263, '', '12', 0, NULL, 'Room47605868', 'computer', 0, '2023-06-09 12:55:42', 'winner', '2023-06-09 12:56:08', 0, 'completed', NULL, ''),
(264, 'Classic', '12', 0, NULL, 'Room47605868', 'real_user', 112, '2023-06-09 12:55:43', NULL, '2023-06-09 12:56:08', 0, 'completed', '1686295546', ''),
(265, '', '12', 0, NULL, 'Room27744872', 'computer', 0, '2023-06-09 12:56:17', 'winner', '2023-06-09 12:56:27', 0, 'completed', NULL, ''),
(266, 'Classic', '12', 0, NULL, 'Room27744872', 'real_user', 112, '2023-06-09 12:56:17', NULL, '2023-06-09 12:56:27', 0, 'completed', NULL, ''),
(267, '', '12', 0, NULL, 'Room89716223', 'computer', 0, '2023-06-09 13:01:24', 'winner', '2023-06-09 13:01:44', 0, 'completed', NULL, ''),
(268, 'Classic', '12', 0, NULL, 'Room89716223', 'real_user', 120, '2023-06-09 13:01:25', NULL, '2023-06-09 13:01:44', 0, 'completed', '1686295895', ''),
(269, '', '12', 0, NULL, 'Room67557060', 'computer', 0, '2023-06-09 15:08:53', NULL, '2023-06-09 15:20:37', 0, 'completed', NULL, ''),
(270, 'Classic', '12', 0, NULL, 'Room67557060', 'real_user', 112, '2023-06-09 15:08:53', NULL, '2023-06-09 15:20:37', 0, 'completed', NULL, ''),
(271, '', '12', 0, NULL, 'Room97772767', 'computer', 0, '2023-06-09 15:25:31', 'winner', '2023-06-09 15:26:28', 0, 'completed', NULL, ''),
(272, 'Classic', '12', 0, NULL, 'Room97772767', 'real_user', 112, '2023-06-09 15:25:31', NULL, '2023-06-09 15:26:28', 0, 'completed', NULL, ''),
(273, '', '12', 0, NULL, 'Room87385436', 'computer', 0, '2023-06-09 15:26:12', 'winner', '2023-06-09 15:26:46', 0, 'completed', NULL, ''),
(274, 'Classic', '12', 0, NULL, 'Room87385436', 'real_user', 120, '2023-06-09 15:26:12', NULL, '2023-06-09 15:26:46', 0, 'completed', '1686304640', ''),
(275, '', '12', 0, NULL, 'Room15905260', 'computer', 0, '2023-06-09 15:35:36', 'winner', '2023-06-09 15:36:42', 0, 'completed', NULL, ''),
(276, 'Classic', '12', 0, NULL, 'Room15905260', 'real_user', 112, '2023-06-09 15:35:37', NULL, '2023-06-09 15:36:42', 0, 'completed', NULL, ''),
(277, '', '12', 0, NULL, 'Room41004661', 'computer', 0, '2023-06-09 15:36:44', 'winner', '2023-06-09 16:41:46', 0, 'completed', NULL, ''),
(278, 'Classic', '12', 0, NULL, 'Room41004661', 'real_user', 112, '2023-06-09 15:36:44', NULL, '2023-06-09 16:41:46', 0, 'completed', NULL, ''),
(279, '', '12', 0, NULL, 'Room95743548', 'computer', 0, '2023-06-09 15:58:19', 'winner', '2023-06-09 16:16:59', 0, 'completed', NULL, ''),
(280, 'Classic', '12', 0, NULL, 'Room95743548', 'real_user', 121, '2023-06-09 15:58:20', NULL, '2023-06-09 16:16:59', 0, 'completed', '1686306504', ''),
(281, '', '12', 0, NULL, 'Room16322521', 'computer', 0, '2023-06-09 16:15:43', 'winner', '2023-06-09 16:16:57', 0, 'completed', NULL, ''),
(282, 'Classic', '12', 0, NULL, 'Room16322521', 'real_user', 122, '2023-06-09 16:15:44', NULL, '2023-06-09 16:16:57', 0, 'completed', '1686307579', ''),
(283, '', '12', 0, NULL, 'Room78926711', 'computer', 0, '2023-06-09 16:17:07', 'winner', '2023-06-09 16:22:40', 0, 'completed', NULL, ''),
(284, 'Classic', '12', 0, NULL, 'Room78926711', 'real_user', 121, '2023-06-09 16:17:08', NULL, '2023-06-09 16:22:40', 0, 'completed', '1686307683', ''),
(285, '', '12', 0, NULL, 'Room37150642', 'computer', 0, '2023-06-09 16:22:48', 'winner', '2023-06-09 16:23:52', 0, 'completed', NULL, ''),
(286, 'Classic', '12', 0, NULL, 'Room37150642', 'real_user', 121, '2023-06-09 16:22:48', NULL, '2023-06-09 16:23:52', 0, 'completed', '1686307993', ''),
(287, '', '12', 0, NULL, 'Room16491314', 'computer', 0, '2023-06-09 16:22:52', 'winner', '2023-06-09 16:23:31', 0, 'completed', NULL, ''),
(288, 'Classic', '12', 0, NULL, 'Room16491314', 'real_user', 122, '2023-06-09 16:22:53', NULL, '2023-06-09 16:23:31', 0, 'completed', NULL, ''),
(289, '', '12', 0, NULL, 'Room31364432', 'computer', 0, '2023-06-09 16:24:02', 'winner', '2023-06-09 16:25:16', 0, 'completed', NULL, ''),
(290, 'Classic', '12', 0, NULL, 'Room31364432', 'real_user', 121, '2023-06-09 16:24:02', NULL, '2023-06-09 16:25:16', 0, 'completed', '1686308098', ''),
(291, '', '12', 0, NULL, 'Room84754703', 'computer', 0, '2023-06-09 16:25:26', 'winner', '2023-06-09 16:26:35', 0, 'completed', NULL, ''),
(292, 'Classic', '12', 0, NULL, 'Room84754703', 'real_user', 121, '2023-06-09 16:25:26', NULL, '2023-06-09 16:26:35', 0, 'completed', '1686308162', ''),
(293, '', '12', 0, NULL, 'Room77165718', 'computer', 0, '2023-06-09 16:41:48', 'winner', '2023-06-09 16:47:46', 0, 'completed', NULL, ''),
(294, 'Classic', '12', 0, NULL, 'Room77165718', 'real_user', 112, '2023-06-09 16:41:48', NULL, '2023-06-09 16:47:46', 0, 'completed', NULL, ''),
(295, '', '12', 0, NULL, 'Room26354846', 'computer', 0, '2023-06-09 16:47:48', 'winner', '2023-06-09 16:48:49', 0, 'completed', NULL, ''),
(296, 'Classic', '12', 0, NULL, 'Room26354846', 'real_user', 112, '2023-06-09 16:47:49', NULL, '2023-06-09 16:48:49', 0, 'completed', NULL, ''),
(297, '', '12', 0, NULL, 'Room84982232', 'computer', 0, '2023-06-09 17:41:52', 'winner', '2023-06-09 18:08:36', 0, 'completed', NULL, ''),
(298, 'Classic', '12', 0, NULL, 'Room84982232', 'real_user', 112, '2023-06-09 17:41:53', NULL, '2023-06-09 18:08:36', 0, 'completed', '1686312725', ''),
(299, '', '12', 0, NULL, 'Room95241622', 'computer', 0, '2023-06-09 18:10:02', 'winner', '2023-06-12 18:38:21', 0, 'completed', NULL, ''),
(300, 'Classic', '12', 0, NULL, 'Room95241622', 'real_user', 112, '2023-06-09 18:10:03', NULL, '2023-06-12 18:38:21', 0, 'completed', NULL, ''),
(301, '', '12', 0, NULL, 'Room07845584', 'computer', 0, '2023-06-09 18:18:59', 'winner', '2023-06-09 18:19:52', 0, 'completed', NULL, ''),
(302, 'Classic', '12', 0, NULL, 'Room07845584', 'real_user', 124, '2023-06-09 18:19:00', NULL, '2023-06-09 18:19:52', 0, 'completed', '1686314952', ''),
(303, '', '12', 0, NULL, 'Room26659047', 'computer', 0, '2023-06-09 20:13:57', NULL, '2023-06-09 20:23:14', 0, 'completed', NULL, ''),
(304, 'Classic', '12', 0, NULL, 'Room26659047', 'real_user', 128, '2023-06-09 20:13:58', NULL, '2023-06-09 20:23:14', 0, 'completed', NULL, ''),
(305, '', '12', 0, NULL, 'Room62331761', 'computer', 0, '2023-06-10 12:39:32', 'winner', '2023-06-10 12:41:52', 0, 'completed', NULL, ''),
(306, 'Classic', '12', 0, NULL, 'Room62331761', 'real_user', 128, '2023-06-10 12:39:33', NULL, '2023-06-10 12:41:52', 0, 'completed', '1686381053', ''),
(307, '', '12', 0, NULL, 'Room86918099', 'computer', 0, '2023-06-10 12:53:23', 'winner', '2023-06-10 12:55:24', 0, 'completed', NULL, ''),
(308, 'Classic', '12', 0, NULL, 'Room86918099', 'real_user', 128, '2023-06-10 12:53:24', NULL, '2023-06-10 12:55:24', 0, 'completed', '1686381863', ''),
(309, '', '12', 0, NULL, 'Room47870040', 'computer', 0, '2023-06-12 18:38:22', 'winner', '2023-06-12 18:38:48', 0, 'completed', NULL, ''),
(310, 'Classic', '12', 0, NULL, 'Room47870040', 'real_user', 112, '2023-06-12 18:38:23', NULL, '2023-06-12 18:38:48', 0, 'completed', NULL, ''),
(311, '', '12', 0, NULL, 'Room81774205', 'computer', 0, '2023-06-12 21:23:37', 'winner', '2023-06-12 21:25:00', 0, 'completed', NULL, ''),
(312, 'Classic', '12', 0, NULL, 'Room81774205', 'real_user', 128, '2023-06-12 21:23:38', NULL, '2023-06-12 21:25:00', 0, 'completed', '1686585268', ''),
(313, 'Classic', '22', 10, 17, '34325256', 'real_user', 112, '2023-06-13 11:18:29', 'winner', '2023-06-13 11:18:46', 3, 'completed', NULL, ''),
(314, 'Classic', '22', 10, 17, '34325256', 'real_user', 112, '2023-06-13 11:18:30', 'winner', '2023-06-13 11:18:46', 3, 'completed', NULL, ''),
(315, '', '12', 0, NULL, 'Room57592595', 'computer', 0, '2023-06-13 11:29:30', 'winner', '2023-06-13 11:29:33', 0, 'completed', NULL, ''),
(316, 'Classic', '12', 0, NULL, 'Room57592595', 'real_user', 112, '2023-06-13 11:29:30', NULL, '2023-06-13 11:29:33', 0, 'completed', NULL, ''),
(317, '', '12', 0, NULL, 'Room93528900', 'computer', 0, '2023-06-13 11:47:28', 'winner', '2023-06-13 11:47:35', 0, 'completed', NULL, ''),
(318, 'Classic', '12', 0, NULL, 'Room93528900', 'real_user', 112, '2023-06-13 11:47:29', NULL, '2023-06-13 11:47:35', 0, 'completed', NULL, ''),
(319, '', '12', 0, NULL, 'Room32079006', 'computer', 0, '2023-06-13 14:40:09', 'winner', '2023-06-13 14:40:15', 0, 'completed', NULL, ''),
(320, 'Classic', '12', 0, NULL, 'Room32079006', 'real_user', 129, '2023-06-13 14:40:10', NULL, '2023-06-13 14:40:15', 0, 'completed', NULL, ''),
(321, '', '12', 0, NULL, 'Room49047771', 'computer', 0, '2023-06-13 14:53:34', 'winner', '2023-06-13 15:06:36', 0, 'completed', NULL, ''),
(322, 'Classic', '12', 0, NULL, 'Room49047771', 'real_user', 129, '2023-06-13 14:53:34', NULL, '2023-06-13 15:06:36', 0, 'completed', '1686648316', ''),
(323, '', '12', 0, NULL, 'Room49293418', 'computer', 0, '2023-06-13 15:22:21', 'winner', '2023-06-13 15:22:26', 0, 'completed', NULL, ''),
(324, 'Classic', '12', 0, NULL, 'Room49293418', 'real_user', 130, '2023-06-13 15:22:22', NULL, '2023-06-13 15:22:26', 0, 'completed', NULL, ''),
(325, '', '12', 0, NULL, 'Room81168078', 'computer', 0, '2023-06-13 15:23:35', 'winner', '2023-06-13 15:23:56', 0, 'completed', NULL, ''),
(326, 'Classic', '12', 0, NULL, 'Room81168078', 'real_user', 130, '2023-06-13 15:23:35', NULL, '2023-06-13 15:23:56', 0, 'completed', NULL, ''),
(327, '', '12', 0, NULL, 'Room67565432', 'computer', 0, '2023-06-13 16:13:09', 'winner', '2023-06-14 14:53:45', 0, 'completed', NULL, ''),
(328, 'Classic', '12', 0, NULL, 'Room67565432', 'real_user', 112, '2023-06-13 16:13:09', NULL, '2023-06-14 14:53:45', 0, 'completed', '1686653166', ''),
(329, '', '12', 0, NULL, 'Room06868302', 'computer', 0, '2023-06-13 17:22:06', NULL, '2023-06-13 17:22:06', 0, 'running', NULL, ''),
(330, 'Classic', '12', 0, NULL, 'Room06868302', 'real_user', 131, '2023-06-13 17:22:07', NULL, '2023-06-13 17:22:07', 0, 'running', '1686657127', ''),
(331, '', '12', 0, NULL, 'Room35551589', 'computer', 0, '2023-06-13 20:02:04', 'winner', '2023-06-13 20:03:57', 0, 'completed', NULL, ''),
(332, 'Classic', '12', 0, NULL, 'Room35551589', 'real_user', 132, '2023-06-13 20:02:05', NULL, '2023-06-13 20:03:57', 0, 'completed', '1686666830', ''),
(333, '', '12', 0, NULL, 'Room73361230', 'computer', 0, '2023-06-14 14:18:02', 'winner', '2023-06-14 14:18:33', 0, 'completed', NULL, ''),
(334, 'Classic', '12', 0, NULL, 'Room73361230', 'real_user', 132, '2023-06-14 14:18:03', NULL, '2023-06-14 14:18:33', 0, 'completed', '1686732483', ''),
(335, '', '12', 0, NULL, 'Room84884667', 'computer', 0, '2023-06-14 23:22:53', 'winner', '2023-06-14 23:23:16', 0, 'completed', NULL, ''),
(336, 'Classic', '12', 0, NULL, 'Room84884667', 'real_user', 132, '2023-06-14 23:22:54', NULL, '2023-06-14 23:23:16', 0, 'completed', NULL, ''),
(337, '', '12', 0, NULL, 'Room38750326', 'computer', 0, '2023-06-16 20:03:54', 'winner', '2023-06-16 20:07:57', 0, 'completed', NULL, ''),
(338, 'Classic', '12', 0, NULL, 'Room38750326', 'real_user', 132, '2023-06-16 20:03:55', NULL, '2023-06-16 20:07:57', 0, 'completed', NULL, ''),
(339, '', '12', 0, NULL, 'Room99111274', 'computer', 0, '2023-06-19 10:37:44', 'winner', '2023-06-19 10:38:45', 0, 'completed', NULL, ''),
(340, 'Classic', '12', 0, NULL, 'Room99111274', 'real_user', 133, '2023-06-19 10:37:44', NULL, '2023-06-19 10:38:45', 0, 'completed', '1687151285', ''),
(341, '', '12', 0, NULL, 'Room30380218', 'computer', 0, '2023-06-19 10:53:34', 'winner', '2023-06-19 11:28:27', 0, 'completed', NULL, ''),
(342, 'Classic', '12', 0, NULL, 'Room30380218', 'real_user', 112, '2023-06-19 10:53:37', NULL, '2023-06-19 11:28:27', 0, 'completed', NULL, ''),
(343, '', '12', 0, NULL, 'Room59367421', 'computer', 0, '2023-06-19 11:28:29', NULL, '2023-06-19 11:28:29', 0, 'running', NULL, ''),
(344, 'Classic', '12', 0, NULL, 'Room59367421', 'real_user', 112, '2023-06-19 11:28:29', NULL, '2023-06-19 11:28:29', 0, 'running', NULL, ''),
(345, '', '12', 0, NULL, 'Room71723298', 'computer', 0, '2023-06-19 11:34:33', 'winner', '2023-06-19 11:34:35', 0, 'completed', NULL, ''),
(346, 'Classic', '12', 0, NULL, 'Room71723298', 'real_user', 114, '2023-06-19 11:34:33', NULL, '2023-06-19 11:34:35', 0, 'completed', NULL, ''),
(347, 'Classic', '12', 10, NULL, 'Room88009859', 'real_user', 114, '2023-06-19 11:35:16', NULL, '2023-06-19 11:36:04', 0, 'completed', NULL, ''),
(348, 'Classic', '12', 10, 18, 'Room88009859', 'real_user', 112, '2023-06-19 11:35:17', 'winner', '2023-06-19 11:36:04', 2, 'completed', NULL, ''),
(349, 'Classic', '12', 10, NULL, 'Room63801344', 'real_user', 114, '2023-06-19 11:39:12', NULL, '2023-06-19 11:40:18', 0, 'completed', NULL, ''),
(350, 'Classic', '12', 10, 19, 'Room63801344', 'real_user', 112, '2023-06-19 11:39:15', 'winner', '2023-06-19 11:40:18', 1, 'completed', '1687154960', ''),
(351, '', '12', 0, NULL, 'Room77089610', 'computer', 0, '2023-06-19 17:13:40', 'winner', '2023-06-19 17:13:57', 0, 'completed', NULL, ''),
(352, 'Classic', '12', 0, NULL, 'Room77089610', 'real_user', 133, '2023-06-19 17:13:40', NULL, '2023-06-19 17:13:57', 0, 'completed', '1687175052', ''),
(353, '', '12', 0, NULL, 'Room69822378', 'computer', 0, '2023-06-19 18:24:07', NULL, '2023-06-19 18:34:49', 0, 'completed', NULL, ''),
(354, 'Classic', '12', 0, 0, 'Room69822378', 'real_user', 133, '2023-06-19 18:24:08', 'winner', '2023-06-19 18:34:49', 0, 'completed', '1687179410', '');
INSERT INTO `gamebet` (`id`, `game_type`, `tabletype`, `amount`, `wng_amount`, `gameid`, `user_type`, `userid`, `gtime`, `losewin`, `gamecomplete`, `commission_amount`, `status`, `minimize_time`, `ipaddress`) VALUES
(355, '', '12', 0, NULL, 'Room13192066', 'computer', 0, '2023-06-19 18:35:09', 'winner', '2023-06-19 18:35:15', 0, 'completed', NULL, ''),
(356, 'Classic', '12', 0, NULL, 'Room13192066', 'real_user', 133, '2023-06-19 18:35:09', NULL, '2023-06-19 18:35:15', 0, 'completed', NULL, ''),
(357, 'Classic', '12', 10, 18, 'Room24856418', 'real_user', 135, '2023-06-20 10:44:46', 'winner', '2023-06-20 10:45:00', 2, 'completed', NULL, ''),
(358, 'Classic', '12', 10, NULL, 'Room24856418', 'real_user', 112, '2023-06-20 10:44:46', NULL, '2023-06-20 10:45:00', 0, 'completed', '1687238103', ''),
(359, 'Classic', '12', 10, 18, 'Room23840001', 'real_user', 135, '2023-06-20 10:45:35', 'winner', '2023-06-20 10:45:53', 2, 'completed', NULL, ''),
(360, 'Classic', '12', 10, NULL, 'Room23840001', 'real_user', 112, '2023-06-20 10:45:36', NULL, '2023-06-20 10:45:53', 0, 'completed', NULL, ''),
(361, 'Classic', '12', 10, NULL, 'Room80179673', 'real_user', 135, '2023-06-20 10:46:29', NULL, '2023-06-20 10:46:40', 0, 'completed', NULL, ''),
(362, 'Classic', '12', 10, 18, 'Room80179673', 'real_user', 112, '2023-06-20 10:46:30', 'winner', '2023-06-20 10:46:40', 2, 'completed', NULL, ''),
(363, 'Classic', '12', 10, NULL, 'Room55167858', 'real_user', 135, '2023-06-20 10:47:29', NULL, '2023-06-20 10:51:30', 0, 'completed', NULL, ''),
(364, 'Classic', '12', 10, 18, 'Room55167858', 'real_user', 112, '2023-06-20 10:47:29', 'winner', '2023-06-20 10:51:30', 2, 'completed', NULL, ''),
(365, 'Classic', '12', 10, NULL, 'Room56627188', 'real_user', 112, '2023-06-20 10:52:01', NULL, '2023-06-20 10:52:14', 0, 'completed', NULL, ''),
(366, 'Classic', '12', 10, 18, 'Room56627188', 'real_user', 135, '2023-06-20 10:52:01', 'winner', '2023-06-20 10:52:14', 2, 'completed', NULL, ''),
(367, 'Classic', '12', 10, 19, 'Room30345156', 'real_user', 135, '2023-06-20 10:52:34', 'winner', '2023-06-20 10:54:01', 1, 'completed', NULL, ''),
(368, 'Classic', '12', 10, NULL, 'Room30345156', 'real_user', 112, '2023-06-20 10:52:34', NULL, '2023-06-20 10:54:01', 0, 'completed', NULL, ''),
(369, 'Classic', '22', 10, 18, '27362014', 'real_user', 135, '2023-06-20 11:03:06', 'winner', '2023-06-20 11:07:44', 2, 'completed', NULL, ''),
(370, 'Classic', '22', 10, NULL, '27362014', 'real_user', 112, '2023-06-20 11:03:06', NULL, '2023-06-20 11:07:44', 0, 'completed', NULL, ''),
(371, 'Classic', '22', 10, 18, '05224051', 'real_user', 135, '2023-06-20 11:34:11', 'winner', '2023-06-20 11:35:18', 2, 'completed', NULL, ''),
(372, 'Classic', '22', 10, NULL, '05224051', 'real_user', 112, '2023-06-20 11:34:11', NULL, '2023-06-20 11:35:18', 0, 'completed', NULL, ''),
(373, 'Classic', '12', 10, 18, 'Room64507332', 'real_user', 112, '2023-06-20 11:36:13', 'winner', '2023-06-20 11:37:07', 2, 'completed', NULL, ''),
(374, 'Classic', '12', 10, NULL, 'Room64507332', 'real_user', 135, '2023-06-20 11:36:14', NULL, '2023-06-20 11:37:07', 0, 'completed', NULL, ''),
(375, 'Classic', '12', 10, NULL, 'Room22381437', 'real_user', 112, '2023-06-20 11:52:56', NULL, '2023-06-20 11:54:24', 0, 'completed', NULL, ''),
(376, 'Classic', '12', 10, 18, 'Room22381437', 'real_user', 135, '2023-06-20 11:52:57', 'winner', '2023-06-20 11:54:24', 2, 'completed', NULL, ''),
(377, 'Classic', '12', 10, NULL, 'Room60517069', 'real_user', 112, '2023-06-20 13:00:25', NULL, '2023-06-20 13:01:11', 0, 'completed', NULL, ''),
(378, 'Classic', '12', 10, 18, 'Room60517069', 'real_user', 135, '2023-06-20 13:00:26', 'winner', '2023-06-20 13:01:11', 2, 'completed', '1687246255', ''),
(379, '', '12', 0, NULL, 'Room88754634', 'computer', 0, '2023-06-20 15:35:01', 'winner', '2023-06-20 15:35:06', 0, 'completed', NULL, ''),
(380, 'Classic', '12', 0, NULL, 'Room88754634', 'real_user', 112, '2023-06-20 15:35:02', NULL, '2023-06-20 15:35:06', 0, 'completed', NULL, ''),
(381, '', '12', 0, NULL, 'Room65645734', 'computer', 0, '2023-06-20 15:35:11', 'winner', '2023-06-20 15:35:17', 0, 'completed', NULL, ''),
(382, 'Classic', '12', 0, NULL, 'Room65645734', 'real_user', 112, '2023-06-20 15:35:11', NULL, '2023-06-20 15:35:17', 0, 'completed', NULL, ''),
(383, '', '12', 0, NULL, 'Room51103650', 'computer', 0, '2023-06-20 15:35:23', 'winner', '2023-06-20 15:35:27', 0, 'completed', NULL, ''),
(384, 'Classic', '12', 0, NULL, 'Room51103650', 'real_user', 112, '2023-06-20 15:35:23', NULL, '2023-06-20 15:35:27', 0, 'completed', NULL, ''),
(385, 'Classic', '14', 10, NULL, 'Room73616640', 'real_user', 147, '2023-06-20 19:06:16', NULL, '2023-06-21 17:49:24', 0, 'completed', '1687268201', ''),
(386, 'Classic', '14', 10, NULL, 'Room73616640', 'real_user', 112, '2023-06-20 19:06:16', NULL, '2023-06-20 19:06:44', 0, 'completed', NULL, ''),
(387, 'Classic', '14', 10, 40, 'Room73616640', 'real_user', 139, '2023-06-20 19:06:17', 'winner', '2023-06-21 17:49:24', 0, 'completed', '1687268196', ''),
(388, 'Classic', '14', 10, NULL, 'Room73616640', 'real_user', 135, '2023-06-20 19:06:17', NULL, '2023-06-20 19:06:47', 0, 'completed', NULL, ''),
(389, '', '12', 0, NULL, 'Room40834048', 'computer', 0, '2023-06-21 14:05:47', 'winner', '2023-06-21 14:06:47', 0, 'completed', NULL, ''),
(390, 'Classic', '12', 0, NULL, 'Room40834048', 'real_user', 149, '2023-06-21 14:05:48', NULL, '2023-06-21 14:06:47', 0, 'completed', '1687336643', ''),
(391, '', '12', 0, NULL, 'Room38529433', 'computer', 0, '2023-06-21 15:41:28', NULL, '2023-06-21 15:52:43', 0, 'completed', NULL, ''),
(392, 'Classic', '12', 0, NULL, 'Room38529433', 'real_user', 150, '2023-06-21 15:41:29', NULL, '2023-06-21 15:52:43', 0, 'completed', '1687342496', '152.58.188.221'),
(393, 'Classic', '12', 10, 19, 'Room03992525', 'real_user', 139, '2023-06-21 17:55:04', 'winner', '2023-06-21 17:57:08', 1, 'completed', NULL, '49.206.202.170'),
(394, 'Classic', '12', 10, NULL, 'Room03992525', 'real_user', 147, '2023-06-21 17:55:05', NULL, '2023-06-21 17:57:08', 0, 'completed', '1687350336', '49.206.202.170'),
(395, 'Classic', '12', 10, NULL, 'Room89507467', 'real_user', 139, '2023-06-21 18:25:02', NULL, '2023-06-23 10:31:16', 0, 'completed', '1687352620', '49.206.202.170'),
(396, 'Classic', '12', 10, 18, 'Room89507467', 'real_user', 147, '2023-06-21 18:25:03', 'winner', '2023-06-23 10:31:16', 2, 'completed', '1687352617', '49.206.202.170'),
(397, '', '12', 0, NULL, 'Room78171400', 'computer', 0, '2023-06-22 20:12:19', 'winner', '2023-06-22 20:12:30', 0, 'completed', NULL, ''),
(398, 'Classic', '12', 0, NULL, 'Room78171400', 'real_user', 153, '2023-06-22 20:12:20', NULL, '2023-06-22 20:12:30', 0, 'completed', NULL, '152.58.191.114'),
(399, '', '12', 0, NULL, 'Room94139195', 'computer', 0, '2023-06-22 20:19:33', 'winner', '2023-06-22 20:19:38', 0, 'completed', NULL, ''),
(400, 'Classic', '12', 0, NULL, 'Room94139195', 'real_user', 152, '2023-06-22 20:19:33', NULL, '2023-06-22 20:19:38', 0, 'completed', NULL, '157.47.58.203'),
(401, '', '12', 0, NULL, 'Room50736733', 'computer', 0, '2023-06-23 11:59:07', 'winner', '2023-06-23 11:59:30', 0, 'completed', NULL, ''),
(402, 'Classic', '12', 0, NULL, 'Room50736733', 'real_user', 154, '2023-06-23 11:59:08', NULL, '2023-06-23 11:59:30', 0, 'completed', NULL, '103.59.75.85'),
(403, '', '12', 0, NULL, 'Room77823162', 'computer', 0, '2023-06-23 12:00:36', 'winner', '2023-06-23 12:00:52', 0, 'completed', NULL, ''),
(404, 'Classic', '12', 0, NULL, 'Room77823162', 'real_user', 154, '2023-06-23 12:00:37', NULL, '2023-06-23 12:00:52', 0, 'completed', NULL, '103.59.75.85'),
(405, '', '12', 0, NULL, 'Room67708170', 'computer', 0, '2023-06-23 12:57:36', 'winner', '2023-06-23 13:14:31', 0, 'completed', NULL, ''),
(406, 'Classic', '12', 0, NULL, 'Room67708170', 'real_user', 153, '2023-06-23 12:57:37', NULL, '2023-06-23 13:14:31', 0, 'completed', '1687505424', '152.58.191.75'),
(407, '', '12', 0, NULL, 'Room69473363', 'computer', 0, '2023-06-23 13:40:22', 'winner', '2023-06-23 13:40:25', 0, 'completed', NULL, ''),
(408, 'Classic', '12', 0, NULL, 'Room69473363', 'real_user', 153, '2023-06-23 13:40:23', NULL, '2023-06-23 13:40:25', 0, 'completed', NULL, '152.58.191.235'),
(409, '', '12', 0, NULL, 'Room69431843', 'computer', 0, '2023-06-24 00:10:08', 'winner', '2023-06-24 00:11:15', 0, 'completed', NULL, ''),
(410, 'Classic', '12', 0, NULL, 'Room69431843', 'real_user', 112, '2023-06-24 00:10:08', NULL, '2023-06-24 00:11:15', 0, 'completed', NULL, '122.169.223.48'),
(411, '', '12', 0, NULL, 'Room65561036', 'computer', 0, '2023-06-26 11:20:35', 'winner', '2023-06-26 11:23:48', 0, 'completed', NULL, ''),
(412, 'Classic', '12', 0, NULL, 'Room65561036', 'real_user', 153, '2023-06-26 11:20:36', NULL, '2023-06-26 11:23:48', 0, 'completed', NULL, '106.77.189.38'),
(413, '', '12', 0, NULL, 'Room59049066', 'computer', 0, '2023-06-26 15:47:44', 'winner', '2023-07-05 10:19:19', 0, 'completed', NULL, ''),
(414, 'Classic', '12', 0, NULL, 'Room59049066', 'real_user', 154, '2023-06-26 15:47:44', NULL, '2023-07-05 10:19:19', 0, 'completed', '1687774705', '103.59.75.215'),
(415, '', '12', 0, NULL, 'Room82689893', 'computer', 0, '2023-06-28 11:11:35', 'winner', '2023-06-28 11:16:37', 0, 'completed', NULL, ''),
(416, 'Classic', '12', 0, NULL, 'Room82689893', 'real_user', 112, '2023-06-28 11:11:35', NULL, '2023-06-28 11:16:37', 0, 'completed', NULL, '49.206.202.170'),
(417, '', '12', 0, NULL, 'Room19334618', 'computer', 0, '2023-06-28 11:16:38', 'winner', '2023-06-28 11:23:35', 0, 'completed', NULL, ''),
(418, 'Classic', '12', 0, NULL, 'Room19334618', 'real_user', 112, '2023-06-28 11:16:39', NULL, '2023-06-28 11:23:35', 0, 'completed', '1687931212', '49.206.202.170'),
(419, '', '12', 0, NULL, 'Room14792995', 'computer', 0, '2023-06-28 11:23:41', 'winner', '2023-06-28 11:27:25', 0, 'completed', NULL, ''),
(420, 'Classic', '12', 0, NULL, 'Room14792995', 'real_user', 112, '2023-06-28 11:23:41', NULL, '2023-06-28 11:27:25', 0, 'completed', NULL, '49.206.202.170'),
(421, '', '12', 0, NULL, 'Room57466134', 'computer', 0, '2023-06-28 11:27:26', 'winner', '2023-06-28 11:27:50', 0, 'completed', NULL, ''),
(422, 'Classic', '12', 0, NULL, 'Room57466134', 'real_user', 112, '2023-06-28 11:27:26', NULL, '2023-06-28 11:27:50', 0, 'completed', NULL, '49.206.202.170'),
(423, '', '12', 0, NULL, 'Room07884098', 'computer', 0, '2023-06-28 11:27:52', 'winner', '2023-06-28 11:45:26', 0, 'completed', NULL, ''),
(424, 'Classic', '12', 0, NULL, 'Room07884098', 'real_user', 112, '2023-06-28 11:27:52', NULL, '2023-06-28 11:45:26', 0, 'completed', NULL, '49.206.202.170'),
(425, '', '12', 0, NULL, 'Room26445374', 'computer', 0, '2023-06-28 11:45:27', 'winner', '2023-06-28 11:49:22', 0, 'completed', NULL, ''),
(426, 'Classic', '12', 0, NULL, 'Room26445374', 'real_user', 112, '2023-06-28 11:45:28', NULL, '2023-06-28 11:49:22', 0, 'completed', NULL, '49.206.202.170'),
(427, '', '12', 0, NULL, 'Room05232791', 'computer', 0, '2023-06-28 11:49:23', 'winner', '2023-06-28 11:50:56', 0, 'completed', NULL, ''),
(428, 'Classic', '12', 0, NULL, 'Room05232791', 'real_user', 112, '2023-06-28 11:49:24', NULL, '2023-06-28 11:50:56', 0, 'completed', NULL, '49.206.202.170'),
(429, '', '12', 0, NULL, 'Room23318534', 'computer', 0, '2023-06-28 11:50:57', 'winner', '2023-06-28 11:51:59', 0, 'completed', NULL, ''),
(430, 'Classic', '12', 0, NULL, 'Room23318534', 'real_user', 112, '2023-06-28 11:50:58', NULL, '2023-06-28 11:51:59', 0, 'completed', NULL, '49.206.202.170'),
(431, 'Classic', '12', 10, 19, 'Room02822612', 'real_user', 112, '2023-06-28 11:52:16', 'winner', '2023-06-28 11:53:31', 1, 'completed', NULL, '49.206.202.170'),
(432, 'Classic', '12', 10, 19, 'Room02822612', 'real_user', 112, '2023-06-28 11:52:17', 'winner', '2023-06-28 11:53:31', 1, 'completed', NULL, '49.206.202.170'),
(433, 'Classic', '12', 10, NULL, 'Room93499664', 'real_user', 112, '2023-06-28 11:58:39', NULL, '2023-06-28 11:58:57', 0, 'completed', NULL, '49.206.202.170'),
(434, 'Classic', '12', 10, 18, 'Room93499664', 'real_user', 136, '2023-06-28 11:58:41', 'winner', '2023-06-28 11:58:57', 2, 'completed', NULL, '49.206.202.170'),
(435, 'Classic', '12', 10, 18, 'Room48301165', 'real_user', 147, '2023-06-28 12:13:15', 'winner', '2023-06-28 12:16:07', 2, 'completed', NULL, '49.206.202.170'),
(436, 'Classic', '12', 10, NULL, 'Room48301165', 'real_user', 112, '2023-06-28 12:13:16', NULL, '2023-06-28 12:16:07', 0, 'completed', '1687934688', '49.206.202.170'),
(437, 'Classic', '12', 10, NULL, 'Room52754061', 'real_user', 147, '2023-06-28 12:19:48', NULL, '2023-06-28 12:21:17', 0, 'completed', NULL, '49.206.202.170'),
(438, 'Classic', '12', 10, 19, 'Room52754061', 'real_user', 112, '2023-06-28 12:19:48', 'winner', '2023-06-28 12:21:17', 1, 'completed', '1687935046', '49.206.202.170'),
(439, 'Classic', '12', 10, 19, 'Room82858405', 'real_user', 112, '2023-06-28 12:23:15', 'winner', '2023-06-28 12:24:41', 1, 'completed', '1687935244', '49.206.202.170'),
(440, 'Classic', '12', 10, NULL, 'Room82858405', 'real_user', 147, '2023-06-28 12:23:16', NULL, '2023-06-28 12:24:41', 0, 'completed', NULL, '49.206.202.170'),
(441, 'Classic', '12', 10, 19, 'Room15575795', 'real_user', 112, '2023-06-28 12:39:59', 'winner', '2023-06-28 12:41:06', 1, 'completed', '1687936216', '49.206.202.170'),
(442, 'Classic', '12', 10, NULL, 'Room15575795', 'real_user', 147, '2023-06-28 12:40:00', NULL, '2023-06-28 12:41:06', 0, 'completed', NULL, '49.206.202.170'),
(443, 'Classic', '12', 10, NULL, 'Room41260308', 'real_user', 147, '2023-06-28 12:45:46', NULL, '2023-06-28 12:55:35', 0, 'completed', NULL, '49.206.202.170'),
(444, 'Classic', '12', 10, 18, 'Room41260308', 'real_user', 112, '2023-06-28 12:45:47', 'winner', '2023-06-28 12:55:35', 2, 'completed', '1687936627', '49.206.202.170'),
(445, 'Classic', '12', 10, NULL, 'Room66018865', 'real_user', 147, '2023-06-28 12:55:49', NULL, '2023-06-28 12:56:04', 0, 'completed', NULL, '49.206.202.170'),
(446, 'Classic', '12', 10, 18, 'Room66018865', 'real_user', 112, '2023-06-28 12:55:50', 'winner', '2023-06-28 12:56:04', 2, 'completed', '1687937153', '49.206.202.170'),
(447, 'Classic', '12', 10, 18, 'Room95366161', 'real_user', 112, '2023-06-28 12:56:50', 'winner', '2023-06-28 13:00:30', 2, 'completed', '1687937243', '49.206.202.170'),
(448, 'Classic', '12', 10, NULL, 'Room95366161', 'real_user', 147, '2023-06-28 12:56:50', NULL, '2023-06-28 13:00:30', 0, 'completed', NULL, '49.206.202.170'),
(449, 'Classic', '12', 10, NULL, 'Room19749367', 'real_user', 147, '2023-06-28 13:01:04', NULL, '2023-06-28 17:41:00', 0, 'completed', NULL, '49.206.202.170'),
(450, 'Classic', '12', 10, 18, 'Room19749367', 'real_user', 112, '2023-06-28 13:01:05', 'winner', '2023-06-28 17:41:00', 2, 'completed', '1687937536', '49.206.202.170'),
(451, '', '12', 0, NULL, 'Room89412629', 'computer', 0, '2023-06-28 17:41:01', 'winner', '2023-06-28 17:53:07', 0, 'completed', NULL, ''),
(452, 'Classic', '12', 0, NULL, 'Room89412629', 'real_user', 147, '2023-06-28 17:41:03', NULL, '2023-06-28 17:53:07', 0, 'completed', NULL, '49.206.202.170'),
(453, '', '12', 0, NULL, 'Room04727489', 'computer', 0, '2023-06-28 17:53:08', 'winner', '2023-06-28 18:42:33', 0, 'completed', NULL, ''),
(454, 'Classic', '12', 0, NULL, 'Room04727489', 'real_user', 147, '2023-06-28 17:53:09', NULL, '2023-06-28 18:42:33', 0, 'completed', NULL, '49.206.202.170'),
(455, '', '12', 0, NULL, 'Room81163941', 'computer', 0, '2023-06-28 18:42:35', 'winner', '2023-06-28 18:45:10', 0, 'completed', NULL, ''),
(456, 'Classic', '12', 0, NULL, 'Room81163941', 'real_user', 147, '2023-06-28 18:42:37', NULL, '2023-06-28 18:45:10', 0, 'completed', NULL, '49.206.202.170'),
(457, '', '12', 0, NULL, 'Room01933715', 'computer', 0, '2023-06-28 18:45:11', 'winner', '2023-06-28 18:46:24', 0, 'completed', NULL, ''),
(458, 'Classic', '12', 0, NULL, 'Room01933715', 'real_user', 147, '2023-06-28 18:45:11', NULL, '2023-06-28 18:46:24', 0, 'completed', NULL, '49.206.202.170'),
(459, '', '12', 0, NULL, 'Room90798841', 'computer', 0, '2023-06-28 18:46:25', 'winner', '2023-06-28 18:48:42', 0, 'completed', NULL, ''),
(460, 'Classic', '12', 0, NULL, 'Room90798841', 'real_user', 147, '2023-06-28 18:46:26', NULL, '2023-06-28 18:48:42', 0, 'completed', NULL, '49.206.202.170'),
(461, '', '12', 0, NULL, 'Room85705517', 'computer', 0, '2023-06-28 18:48:44', 'winner', '2023-06-28 18:53:32', 0, 'completed', NULL, ''),
(462, 'Classic', '12', 0, NULL, 'Room85705517', 'real_user', 147, '2023-06-28 18:48:44', NULL, '2023-06-28 18:53:32', 0, 'completed', NULL, '49.206.202.170'),
(463, '', '12', 0, NULL, 'Room77822023', 'computer', 0, '2023-06-28 18:53:34', 'winner', '2023-06-28 18:56:03', 0, 'completed', NULL, ''),
(464, 'Classic', '12', 0, NULL, 'Room77822023', 'real_user', 147, '2023-06-28 18:53:34', NULL, '2023-06-28 18:56:03', 0, 'completed', NULL, '49.206.202.170'),
(465, '', '12', 0, NULL, 'Room24940378', 'computer', 0, '2023-06-28 18:56:05', 'winner', '2023-06-30 10:27:42', 0, 'completed', NULL, ''),
(466, 'Classic', '12', 0, NULL, 'Room24940378', 'real_user', 147, '2023-06-28 18:56:05', NULL, '2023-06-30 10:27:42', 0, 'completed', NULL, '49.206.202.170'),
(467, '', '12', 0, NULL, 'Room88608005', 'computer', 0, '2023-06-30 10:27:43', 'winner', '2023-06-30 10:38:39', 0, 'completed', NULL, ''),
(468, 'Classic', '12', 0, NULL, 'Room88608005', 'real_user', 147, '2023-06-30 10:27:45', NULL, '2023-06-30 10:38:39', 0, 'completed', NULL, '49.206.202.170'),
(469, 'Classic', '12', 10, 18, 'Room29084974', 'real_user', 147, '2023-06-30 10:38:51', 'winner', '2023-06-30 10:41:47', 2, 'completed', NULL, '49.206.202.170'),
(470, 'Classic', '12', 10, NULL, 'Room29084974', 'real_user', 112, '2023-06-30 10:38:52', NULL, '2023-06-30 10:41:47', 0, 'completed', NULL, '49.206.202.170'),
(471, 'Classic', '12', 10, 18, 'Room48045085', 'real_user', 112, '2023-06-30 10:46:20', 'winner', '2023-06-30 10:46:43', 2, 'completed', NULL, '49.206.202.170'),
(472, 'Classic', '12', 10, NULL, 'Room48045085', 'real_user', 147, '2023-06-30 10:46:20', NULL, '2023-06-30 10:46:43', 0, 'completed', '1688102184', '49.206.202.170'),
(473, 'Classic', '12', 10, NULL, 'Room23783830', 'real_user', 112, '2023-06-30 10:47:18', NULL, '2023-06-30 10:47:38', 0, 'completed', NULL, '49.206.202.170'),
(474, 'Classic', '12', 10, 18, 'Room23783830', 'real_user', 147, '2023-06-30 10:47:19', 'winner', '2023-06-30 10:47:38', 2, 'completed', NULL, '49.206.202.170'),
(475, '', '12', 0, NULL, 'Room68875877', 'computer', 0, '2023-06-30 10:50:12', 'winner', '2023-06-30 10:58:12', 0, 'completed', NULL, ''),
(476, 'Classic', '12', 0, NULL, 'Room68875877', 'real_user', 147, '2023-06-30 10:50:12', NULL, '2023-06-30 10:58:12', 0, 'completed', NULL, '49.206.202.170'),
(477, 'Classic', '12', 10, NULL, 'Room62876881', 'real_user', 147, '2023-06-30 10:58:20', NULL, '2023-06-30 11:06:55', 0, 'completed', NULL, '49.206.202.170'),
(478, 'Classic', '12', 10, 18, 'Room62876881', 'real_user', 112, '2023-06-30 10:58:21', 'winner', '2023-06-30 11:06:55', 2, 'completed', NULL, '49.206.202.170'),
(479, 'Classic', '12', 10, 18, 'Room28269843', 'real_user', 147, '2023-06-30 11:07:05', 'winner', '2023-06-30 11:07:47', 2, 'completed', NULL, '49.206.202.170'),
(480, 'Classic', '12', 10, NULL, 'Room28269843', 'real_user', 112, '2023-06-30 11:07:06', NULL, '2023-06-30 11:07:47', 0, 'completed', '1688103440', '49.206.202.170'),
(481, 'Classic', '12', 10, NULL, 'Room48303457', 'real_user', 112, '2023-06-30 11:10:15', NULL, '2023-06-30 11:16:13', 0, 'completed', '1688103619', '49.206.202.170'),
(482, 'Classic', '12', 10, 18, 'Room48303457', 'real_user', 147, '2023-06-30 11:10:16', 'winner', '2023-06-30 11:16:13', 2, 'completed', NULL, '49.206.202.170'),
(483, 'Classic', '12', 10, 18, 'Room05564366', 'real_user', 147, '2023-06-30 11:16:23', 'winner', '2023-06-30 11:19:30', 2, 'completed', NULL, '49.206.202.170'),
(484, 'Classic', '12', 10, NULL, 'Room05564366', 'real_user', 112, '2023-06-30 11:16:24', NULL, '2023-06-30 11:19:30', 0, 'completed', '1688104094', '49.206.202.170'),
(485, 'Classic', '12', 10, NULL, 'Room05975909', 'real_user', 112, '2023-06-30 11:19:57', NULL, '2023-06-30 11:20:39', 0, 'completed', '1688104203', '49.206.202.170'),
(486, 'Classic', '12', 10, 19, 'Room05975909', 'real_user', 147, '2023-06-30 11:19:58', 'winner', '2023-06-30 11:20:39', 1, 'completed', NULL, '49.206.202.170'),
(487, 'Classic', '12', 10, NULL, 'Room87810994', 'real_user', 147, '2023-06-30 11:22:29', NULL, '2023-06-30 11:22:55', 0, 'completed', '1688104352', '49.206.202.170'),
(488, 'Classic', '12', 10, 18, 'Room87810994', 'real_user', 112, '2023-06-30 11:22:30', 'winner', '2023-06-30 11:22:55', 2, 'completed', NULL, '49.206.202.170'),
(489, 'Classic', '12', 10, NULL, 'Room94985750', 'real_user', 147, '2023-06-30 11:23:31', NULL, '2023-06-30 11:24:14', 0, 'completed', '1688104428', '49.206.202.170'),
(490, 'Classic', '12', 10, 18, 'Room94985750', 'real_user', 112, '2023-06-30 11:23:32', 'winner', '2023-06-30 11:24:14', 2, 'completed', NULL, '49.206.202.170'),
(491, 'Classic', '12', 10, NULL, 'Room05851513', 'real_user', 147, '2023-06-30 11:33:47', NULL, '2023-06-30 11:34:24', 0, 'completed', '1688105040', '49.206.202.170'),
(492, 'Classic', '12', 10, 18, 'Room05851513', 'real_user', 112, '2023-06-30 11:33:48', 'winner', '2023-06-30 11:34:24', 2, 'completed', NULL, '49.206.202.170'),
(493, 'Classic', '12', 10, 18, 'Room16466971', 'real_user', 147, '2023-06-30 11:39:39', 'winner', '2023-06-30 11:39:44', 2, 'completed', NULL, '49.206.202.170'),
(494, 'Classic', '12', 10, NULL, 'Room16466971', 'real_user', 112, '2023-06-30 11:39:40', NULL, '2023-06-30 11:39:44', 0, 'completed', NULL, '49.206.202.170'),
(495, 'Classic', '12', 10, 18, 'Room72985289', 'real_user', 112, '2023-06-30 11:40:19', 'winner', '2023-06-30 11:40:48', 2, 'completed', NULL, '49.206.202.170'),
(496, 'Classic', '12', 10, NULL, 'Room72985289', 'real_user', 147, '2023-06-30 11:40:20', NULL, '2023-06-30 11:40:48', 0, 'completed', '1688105427', '49.206.202.170'),
(497, '', '12', 0, NULL, 'Room25019550', 'computer', 0, '2023-06-30 11:49:20', 'winner', '2023-06-30 11:50:25', 0, 'completed', NULL, ''),
(498, 'Classic', '12', 0, NULL, 'Room25019550', 'real_user', 147, '2023-06-30 11:49:20', NULL, '2023-06-30 11:50:25', 0, 'completed', NULL, '49.206.202.170'),
(499, '', '12', 0, NULL, 'Room29032681', 'computer', 0, '2023-06-30 11:50:53', 'winner', '2023-07-05 12:06:38', 0, 'completed', NULL, ''),
(500, 'Classic', '12', 0, NULL, 'Room29032681', 'real_user', 147, '2023-06-30 11:50:53', NULL, '2023-07-05 12:06:38', 0, 'completed', NULL, '49.206.202.170'),
(501, '', '12', 0, NULL, 'Room46404645', 'computer', 0, '2023-07-01 15:36:16', 'winner', '2023-07-01 15:36:24', 0, 'completed', NULL, ''),
(502, 'Classic', '12', 0, NULL, 'Room46404645', 'real_user', 157, '2023-07-01 15:36:17', NULL, '2023-07-01 15:36:24', 0, 'completed', NULL, '106.76.232.181'),
(503, '', '12', 0, NULL, 'Room41535513', 'computer', 0, '2023-07-01 16:21:07', 'winner', '2023-07-01 16:44:58', 0, 'completed', NULL, ''),
(504, 'Classic', '12', 0, NULL, 'Room41535513', 'real_user', 157, '2023-07-01 16:21:08', NULL, '2023-07-01 16:44:58', 0, 'completed', '1688208709', '106.76.232.37'),
(505, '', '12', 0, NULL, 'Room68878305', 'computer', 0, '2023-07-03 16:22:11', 'winner', '2023-07-03 16:23:52', 0, 'completed', NULL, ''),
(506, 'Classic', '12', 0, NULL, 'Room68878305', 'real_user', 157, '2023-07-03 16:22:12', NULL, '2023-07-03 16:23:52', 0, 'completed', '1688381584', '106.76.232.172'),
(507, '', '12', 0, NULL, 'Room52945183', 'computer', 0, '2023-07-03 16:24:05', 'winner', '2023-07-03 16:25:51', 0, 'completed', NULL, ''),
(508, 'Classic', '12', 0, NULL, 'Room52945183', 'real_user', 157, '2023-07-03 16:24:06', NULL, '2023-07-03 16:25:51', 0, 'completed', '1688381652', '106.76.232.172'),
(509, '', '12', 0, NULL, 'Room51022344', 'computer', 0, '2023-07-04 12:16:48', 'winner', '2023-07-04 12:17:54', 0, 'completed', NULL, ''),
(510, 'Classic', '12', 0, NULL, 'Room51022344', 'real_user', 158, '2023-07-04 12:16:49', NULL, '2023-07-04 12:17:54', 0, 'completed', '1688453303', '103.62.238.194'),
(511, '', '12', 0, NULL, 'Room26097331', 'computer', 0, '2023-07-04 12:20:27', 'winner', '2023-07-04 12:23:43', 0, 'completed', NULL, ''),
(512, 'Classic', '12', 0, NULL, 'Room26097331', 'real_user', 158, '2023-07-04 12:20:28', NULL, '2023-07-04 12:23:43', 0, 'completed', '1688453515', '103.62.238.194'),
(513, '', '12', 0, NULL, 'Room44605249', 'computer', 0, '2023-07-04 21:33:12', 'winner', '2023-07-04 21:33:17', 0, 'completed', NULL, ''),
(514, 'Classic', '12', 0, NULL, 'Room44605249', 'real_user', 160, '2023-07-04 21:33:13', NULL, '2023-07-04 21:33:17', 0, 'completed', NULL, '106.76.248.141'),
(515, '', '12', 0, NULL, 'Room12248417', 'computer', 0, '2023-07-05 10:37:12', 'winner', '2023-07-05 10:37:47', 0, 'completed', NULL, ''),
(516, 'Classic', '12', 0, NULL, 'Room12248417', 'real_user', 112, '2023-07-05 10:37:13', NULL, '2023-07-05 10:37:47', 0, 'completed', '1688533652', '202.53.69.164'),
(517, 'Classic', '12', 10, NULL, 'Room31120252', 'real_user', 147, '2023-07-05 12:06:45', NULL, '2023-07-05 12:06:58', 0, 'completed', NULL, '202.53.69.164'),
(518, 'Classic', '12', 10, 18, 'Room31120252', 'real_user', 112, '2023-07-05 12:06:46', 'winner', '2023-07-05 12:06:58', 2, 'completed', NULL, '202.53.69.164'),
(519, '', '12', 0, NULL, 'Room65509078', 'computer', 0, '2023-07-05 16:19:57', 'winner', '2023-07-05 16:20:18', 0, 'completed', NULL, ''),
(520, 'Classic', '12', 0, NULL, 'Room65509078', 'real_user', 147, '2023-07-05 16:19:58', NULL, '2023-07-05 16:20:18', 0, 'completed', NULL, '49.206.202.170'),
(521, 'Classic', '22', 10, 19, '21545685', 'real_user', 112, '2023-07-06 16:47:04', 'winner', '2023-07-06 16:47:09', 1, 'completed', NULL, '49.206.202.170'),
(522, 'Classic', '22', 10, 19, '21545685', 'real_user', 112, '2023-07-06 16:47:05', 'winner', '2023-07-06 16:47:09', 1, 'completed', NULL, '49.206.202.170'),
(523, 'Classic', '22', 10, 19, '80009440', 'real_user', 112, '2023-07-06 16:47:33', 'winner', '2023-07-06 16:47:38', 1, 'completed', NULL, '49.206.202.170'),
(524, 'Classic', '22', 10, 19, '80009440', 'real_user', 112, '2023-07-06 16:47:34', 'winner', '2023-07-06 16:47:38', 1, 'completed', NULL, '49.206.202.170'),
(525, 'Classic', '12', 10, NULL, 'Room33821042', 'real_user', 112, '2023-07-06 17:36:30', NULL, '2023-07-10 10:30:13', 0, 'completed', NULL, '49.206.202.170'),
(526, 'Classic', '12', 10, NULL, 'Room33821042', 'real_user', 112, '2023-07-06 17:36:31', NULL, '2023-07-10 10:30:13', 0, 'completed', NULL, '49.206.202.170'),
(527, '', '12', 0, NULL, 'Room14388054', 'computer', 0, '2023-07-10 10:30:14', 'winner', '2023-07-10 10:30:18', 0, 'completed', NULL, ''),
(528, 'Classic', '12', 0, NULL, 'Room14388054', 'real_user', 112, '2023-07-10 10:30:15', NULL, '2023-07-10 10:30:18', 0, 'completed', NULL, '202.53.69.164'),
(529, '', '12', 0, NULL, 'Room01416358', 'computer', 0, '2023-07-10 10:30:28', NULL, '2023-07-10 10:30:28', 0, 'running', NULL, ''),
(530, 'Classic', '12', 0, NULL, 'Room01416358', 'real_user', 112, '2023-07-10 10:30:28', NULL, '2023-07-10 10:30:28', 0, 'running', NULL, '202.53.69.164'),
(531, '', '12', 0, NULL, 'Room84099869', 'computer', 0, '2023-07-10 16:58:00', 'winner', '2023-07-10 17:00:15', 0, 'completed', NULL, ''),
(532, 'Classic', '12', 0, NULL, 'Room84099869', 'real_user', 135, '2023-07-10 16:58:01', NULL, '2023-07-10 17:00:15', 0, 'completed', '1688988587', '183.82.234.224'),
(533, '', '12', 0, NULL, 'Room06182968', 'computer', 0, '2023-07-11 11:11:45', 'winner', '2023-07-11 11:13:04', 0, 'completed', NULL, ''),
(534, 'Classic', '12', 0, NULL, 'Room06182968', 'real_user', 165, '2023-07-11 11:11:46', NULL, '2023-07-11 11:13:04', 0, 'completed', '1689054162', '106.76.220.244'),
(535, '', '12', 0, NULL, 'Room11623646', 'computer', 0, '2023-07-11 11:15:52', 'winner', '2023-07-11 11:16:00', 0, 'completed', NULL, ''),
(536, 'Classic', '12', 0, NULL, 'Room11623646', 'real_user', 165, '2023-07-11 11:15:53', NULL, '2023-07-11 11:16:00', 0, 'completed', NULL, '106.76.220.244'),
(537, '', '12', 0, NULL, 'Room19553808', 'computer', 0, '2023-07-11 11:21:44', 'winner', '2023-07-11 11:21:57', 0, 'completed', NULL, ''),
(538, 'Classic', '12', 0, NULL, 'Room19553808', 'real_user', 165, '2023-07-11 11:21:44', NULL, '2023-07-11 11:21:57', 0, 'completed', NULL, '106.76.220.244'),
(539, '', '12', 0, NULL, 'Room41432582', 'computer', 0, '2023-07-11 12:40:41', 'winner', '2023-07-11 12:42:05', 0, 'completed', NULL, ''),
(540, 'Classic', '12', 0, NULL, 'Room41432582', 'real_user', 165, '2023-07-11 12:40:41', NULL, '2023-07-11 12:42:05', 0, 'completed', '1689059511', '106.76.221.22'),
(541, '', '12', 0, NULL, 'Room08357704', 'computer', 0, '2023-07-12 11:17:26', 'winner', '2023-07-12 11:19:14', 0, 'completed', NULL, ''),
(542, 'Classic', '12', 0, NULL, 'Room08357704', 'real_user', 135, '2023-07-12 11:17:26', NULL, '2023-07-12 11:19:14', 0, 'completed', '1689140934', '49.206.202.170'),
(543, 'Classic', '22', 10, 18, '39103340', 'real_user', 135, '2023-07-12 11:28:12', 'winner', '2023-07-12 11:28:21', 2, 'completed', NULL, '49.206.202.170'),
(544, 'Classic', '22', 10, NULL, '39103340', 'real_user', 112, '2023-07-12 11:28:14', NULL, '2023-07-12 11:28:21', 0, 'completed', NULL, '49.206.202.170'),
(545, 'Classic', '12', 10, 18, 'Room78977558', 'real_user', 112, '2023-07-12 11:51:28', 'winner', '2023-07-12 11:51:39', 2, 'completed', NULL, '49.206.202.170'),
(546, 'Classic', '12', 10, NULL, 'Room78977558', 'real_user', 135, '2023-07-12 11:51:29', NULL, '2023-07-12 11:51:39', 0, 'completed', NULL, '49.206.202.170'),
(547, 'Classic', '12', 10, NULL, 'Room82461644', 'real_user', 135, '2023-07-12 11:52:34', NULL, '2023-07-12 11:52:37', 0, 'completed', NULL, '49.206.202.170'),
(548, 'Classic', '12', 10, 18, 'Room82461644', 'real_user', 112, '2023-07-12 11:52:35', 'winner', '2023-07-12 11:52:37', 2, 'completed', NULL, '49.206.202.170'),
(549, 'Classic', '12', 10, NULL, 'Room27086219', 'real_user', 112, '2023-07-12 11:54:17', NULL, '2023-07-12 11:54:31', 0, 'completed', NULL, '49.206.202.170'),
(550, 'Classic', '12', 10, 18, 'Room27086219', 'real_user', 135, '2023-07-12 11:54:18', 'winner', '2023-07-12 11:54:31', 2, 'completed', '1689143072', '49.206.202.170'),
(551, '', '12', 0, NULL, 'Room54138848', 'computer', 0, '2023-07-13 15:31:42', 'winner', '2023-07-13 15:31:46', 0, 'completed', NULL, ''),
(552, 'Classic', '12', 0, NULL, 'Room54138848', 'real_user', 112, '2023-07-13 15:31:42', NULL, '2023-07-13 15:31:46', 0, 'completed', NULL, '49.206.202.170'),
(553, '', '12', 0, NULL, 'Room83003936', 'computer', 0, '2023-07-13 15:32:03', 'winner', '2023-07-13 15:32:12', 0, 'completed', NULL, ''),
(554, 'Classic', '12', 0, NULL, 'Room83003936', 'real_user', 112, '2023-07-13 15:32:04', NULL, '2023-07-13 15:32:12', 0, 'completed', NULL, '49.206.202.170'),
(555, '', '12', 0, NULL, 'Room57333051', 'computer', 0, '2023-07-13 19:50:56', 'winner', '2023-07-13 19:51:13', 0, 'completed', NULL, ''),
(556, 'Classic', '12', 0, NULL, 'Room57333051', 'real_user', 168, '2023-07-13 19:50:57', NULL, '2023-07-13 19:51:13', 0, 'completed', NULL, '106.76.248.54'),
(557, '', '12', 0, NULL, 'Room38752887', 'computer', 0, '2023-07-13 20:00:39', 'winner', '2023-07-13 20:00:51', 0, 'completed', NULL, ''),
(558, 'Classic', '12', 0, NULL, 'Room38752887', 'real_user', 168, '2023-07-13 20:00:40', NULL, '2023-07-13 20:00:51', 0, 'completed', NULL, '106.76.248.54'),
(559, '', '12', 0, NULL, 'Room48898387', 'computer', 0, '2023-07-14 20:06:24', 'winner', '2023-07-14 20:07:24', 0, 'completed', NULL, ''),
(560, 'Classic', '12', 0, NULL, 'Room48898387', 'real_user', 169, '2023-07-14 20:06:25', NULL, '2023-07-14 20:07:24', 0, 'completed', NULL, '106.76.248.117'),
(561, '', '12', 0, NULL, 'Room34969716', 'computer', 0, '2023-07-15 10:57:05', 'winner', '2023-07-15 10:57:17', 0, 'completed', NULL, ''),
(562, 'Classic', '12', 0, NULL, 'Room34969716', 'real_user', 169, '2023-07-15 10:57:06', NULL, '2023-07-15 10:57:17', 0, 'completed', NULL, '106.76.232.160'),
(563, '', '12', 0, NULL, 'Room81472065', 'computer', 0, '2023-07-15 12:30:24', 'winner', '2023-07-15 12:40:45', 0, 'completed', NULL, ''),
(564, 'Classic', '12', 0, NULL, 'Room81472065', 'real_user', 166, '2023-07-15 12:30:25', NULL, '2023-07-15 12:40:45', 0, 'completed', '1689404452', '202.53.69.164'),
(565, '', '12', 0, NULL, 'Room04958019', 'computer', 0, '2023-07-15 12:34:50', 'winner', '2023-07-15 12:35:57', 0, 'completed', NULL, ''),
(566, 'Classic', '12', 0, NULL, 'Room04958019', 'real_user', 154, '2023-07-15 12:34:50', NULL, '2023-07-15 12:35:57', 0, 'completed', NULL, '103.59.75.3'),
(567, '', '12', 0, NULL, 'Room49493762', 'computer', 0, '2023-07-15 13:52:27', 'winner', '2023-07-15 14:12:08', 0, 'completed', NULL, ''),
(568, 'Classic', '12', 0, NULL, 'Room49493762', 'real_user', 112, '2023-07-15 13:52:28', NULL, '2023-07-15 14:12:08', 0, 'completed', NULL, '202.53.69.164'),
(569, '', '12', 0, NULL, 'Room92852765', 'computer', 0, '2023-07-15 14:14:47', 'winner', '2023-07-15 14:14:49', 0, 'completed', NULL, ''),
(570, 'Classic', '12', 0, NULL, 'Room92852765', 'real_user', 112, '2023-07-15 14:14:47', NULL, '2023-07-15 14:14:49', 0, 'completed', NULL, '202.53.69.164'),
(571, '', '12', 0, NULL, 'Room96571200', 'computer', 0, '2023-07-15 14:29:12', 'winner', '2023-07-15 14:29:27', 0, 'completed', NULL, ''),
(572, 'Classic', '12', 0, NULL, 'Room96571200', 'real_user', 112, '2023-07-15 14:29:13', NULL, '2023-07-15 14:29:27', 0, 'completed', NULL, '202.53.69.164'),
(573, '', '12', 0, NULL, 'Room72608325', 'computer', 0, '2023-07-15 14:36:07', 'winner', '2023-07-15 14:36:48', 0, 'completed', NULL, ''),
(574, 'Classic', '12', 0, NULL, 'Room72608325', 'real_user', 112, '2023-07-15 14:36:07', NULL, '2023-07-15 14:36:48', 0, 'completed', NULL, '202.53.69.164'),
(575, '', '12', 0, NULL, 'Room15639012', 'computer', 0, '2023-07-15 15:41:47', 'winner', '2023-07-15 15:42:09', 0, 'completed', NULL, ''),
(576, 'Classic', '12', 0, NULL, 'Room15639012', 'real_user', 112, '2023-07-15 15:41:47', NULL, '2023-07-15 15:42:09', 0, 'completed', NULL, '122.171.89.189'),
(577, '', '12', 0, NULL, 'Room33661114', 'computer', 0, '2023-07-17 14:12:58', 'winner', '2023-07-17 14:13:43', 0, 'completed', NULL, ''),
(578, 'Classic', '12', 0, NULL, 'Room33661114', 'real_user', 173, '2023-07-17 14:12:59', NULL, '2023-07-17 14:13:43', 0, 'completed', NULL, '223.235.45.224'),
(579, '', '12', 0, NULL, 'Room79220204', 'computer', 0, '2023-07-17 16:21:12', 'winner', '2023-07-17 16:22:40', 0, 'completed', NULL, ''),
(580, 'Classic', '12', 0, NULL, 'Room79220204', 'real_user', 175, '2023-07-17 16:21:13', NULL, '2023-07-17 16:22:40', 0, 'completed', NULL, '223.235.45.224');

-- --------------------------------------------------------

--
-- Table structure for table `gamerecords`
--

CREATE TABLE `gamerecords` (
  `gid` int(11) NOT NULL,
  `gametype` varchar(256) NOT NULL,
  `winamount` int(11) NOT NULL,
  `winnerid` int(11) NOT NULL,
  `sec_winamount` int(11) DEFAULT NULL,
  `sec_winnerid` int(11) DEFAULT NULL,
  `loserid` int(11) DEFAULT NULL,
  `sec_loserid` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game_winners`
--

CREATE TABLE `game_winners` (
  `id` int(11) NOT NULL,
  `gameid` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_winners`
--

INSERT INTO `game_winners` (`id`, `gameid`, `user_id`, `created_date`) VALUES
(1, 'Room16775339', 12, '2023-05-12 00:05:12'),
(2, 'Room72682297', 17, '2023-05-20 10:42:20'),
(3, 'Room51745914', 13, '2023-05-30 16:45:41'),
(4, 'Room00601043', 59, '2023-06-06 18:36:57'),
(5, 'Room97294269', 66, '2023-06-07 08:39:15'),
(6, 'Room49412584', 80, '2023-06-07 18:21:28'),
(7, '34325256', 112, '2023-06-13 11:18:46'),
(8, 'Room88009859', 112, '2023-06-19 11:36:04'),
(9, 'Room63801344', 112, '2023-06-19 11:40:18'),
(10, 'Room69822378', 133, '2023-06-19 18:34:49'),
(11, 'Room24856418', 135, '2023-06-20 10:45:00'),
(12, 'Room23840001', 135, '2023-06-20 10:45:53'),
(13, 'Room80179673', 112, '2023-06-20 10:46:40'),
(14, 'Room55167858', 112, '2023-06-20 10:51:30'),
(15, 'Room56627188', 135, '2023-06-20 10:52:14'),
(16, 'Room30345156', 135, '2023-06-20 10:54:01'),
(17, '27362014', 135, '2023-06-20 11:07:44'),
(18, '05224051', 135, '2023-06-20 11:35:18'),
(19, 'Room64507332', 112, '2023-06-20 11:37:07'),
(20, 'Room22381437', 135, '2023-06-20 11:54:24'),
(21, 'Room60517069', 135, '2023-06-20 13:01:11'),
(22, 'Room73616640', 139, '2023-06-21 17:49:24'),
(23, 'Room03992525', 139, '2023-06-21 17:57:08'),
(24, 'Room89507467', 147, '2023-06-23 10:31:16'),
(25, 'Room02822612', 112, '2023-06-28 11:53:31'),
(26, 'Room93499664', 136, '2023-06-28 11:58:57'),
(27, 'Room48301165', 147, '2023-06-28 12:16:07'),
(28, 'Room52754061', 112, '2023-06-28 12:21:17'),
(29, 'Room82858405', 112, '2023-06-28 12:24:41'),
(30, 'Room15575795', 112, '2023-06-28 12:41:06'),
(31, 'Room41260308', 112, '2023-06-28 12:55:35'),
(32, 'Room66018865', 112, '2023-06-28 12:56:04'),
(33, 'Room95366161', 112, '2023-06-28 13:00:30'),
(34, 'Room19749367', 112, '2023-06-28 17:41:00'),
(35, 'Room29084974', 147, '2023-06-30 10:41:47'),
(36, 'Room48045085', 112, '2023-06-30 10:46:43'),
(37, 'Room23783830', 147, '2023-06-30 10:47:38'),
(38, 'Room62876881', 112, '2023-06-30 11:06:55'),
(39, 'Room28269843', 147, '2023-06-30 11:07:47'),
(40, 'Room48303457', 147, '2023-06-30 11:16:13'),
(41, 'Room05564366', 147, '2023-06-30 11:19:30'),
(42, 'Room05975909', 147, '2023-06-30 11:20:39'),
(43, 'Room87810994', 112, '2023-06-30 11:22:55'),
(44, 'Room94985750', 112, '2023-06-30 11:24:14'),
(45, 'Room05851513', 112, '2023-06-30 11:34:24'),
(46, 'Room16466971', 147, '2023-06-30 11:39:44'),
(47, 'Room72985289', 112, '2023-06-30 11:40:48'),
(48, 'Room31120252', 112, '2023-07-05 12:06:58'),
(49, '21545685', 112, '2023-07-06 16:47:09'),
(50, '80009440', 112, '2023-07-06 16:47:38'),
(51, '39103340', 135, '2023-07-12 11:28:21'),
(52, 'Room78977558', 112, '2023-07-12 11:51:39'),
(53, 'Room82461644', 112, '2023-07-12 11:52:37'),
(54, 'Room27086219', 135, '2023-07-12 11:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `join_game`
--

CREATE TABLE `join_game` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bet_amount` int(11) NOT NULL,
  `notify` enum('yes','no') NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `join_game`
--

INSERT INTO `join_game` (`id`, `userid`, `bet_amount`, `notify`, `status`, `date`) VALUES
(1, 112, 10, '', 0, '2023-07-14'),
(2, 112, 10, 'no', 0, '2023-07-15'),
(3, 112, 50, 'yes', 0, '2023-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `kid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `bankname` varchar(256) DEFAULT NULL,
  `account` varchar(256) DEFAULT NULL,
  `ifsc` varchar(256) DEFAULT NULL,
  `panno` varchar(256) DEFAULT NULL,
  `paypal` varchar(256) DEFAULT NULL,
  `neteller` varchar(256) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'pending',
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aadhaar` varchar(20) NOT NULL,
  `upi_id` varchar(80) NOT NULL,
  `upi_name` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`kid`, `user_id`, `name`, `bankname`, `account`, `ifsc`, `panno`, `paypal`, `neteller`, `status`, `datetime`, `aadhaar`, `upi_id`, `upi_name`) VALUES
(1, 1, 'Ars Sarath', 'Hdfc', '1234567899', 'HDFC000412', 'DFKPA1847d', '', '', 'Approved', '2023-05-15 16:23:10', '', '', ''),
(2, 112, 'Sarath', 'Hdfc', '1234567891010', 'HDFC0001232', 'DFKPA1847D', '', '', 'Approved', '2023-06-13 11:32:57', '123456789132', 'arss143@axl', 'ArSs'),
(3, 132, 'Yoo', 'Hdfc', '1234567890', 'hdfc000123', 'jagba8117e', '', '', 'Rejected', '2023-06-17 13:36:28', '', '', ''),
(5, 136, 'Sarath', 'Hdfc', '12345678913', 'HDFC000413', 'DFKPA1847A', NULL, NULL, 'Approved', '2023-06-22 15:16:41', '123456789111', 'arss1998@ybl', 'Sarath'),
(6, 154, 'Pushpendra Kumar ', 'State Bank Of India ', '123456789012', 'SBIN0011234', 'CXGPK1674M', NULL, NULL, 'Approved', '2023-06-23 10:31:47', '123412341234', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `leader_board`
--

CREATE TABLE `leader_board` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `coins` int(11) NOT NULL,
  `type` enum('0','1') NOT NULL COMMENT '0-last-month,1-this-month',
  `date` datetime NOT NULL,
  `board_type` enum('2','4') NOT NULL COMMENT '2-2player,4-4player',
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leader_board`
--

INSERT INTO `leader_board` (`id`, `name`, `coins`, `type`, `date`, `board_type`, `price`) VALUES
(93, 'Name 6', 800, '1', '0000-00-00 00:00:00', '4', ''),
(94, 'Name 7', 700, '1', '0000-00-00 00:00:00', '4', ''),
(95, 'Name 8', 600, '1', '0000-00-00 00:00:00', '4', ''),
(96, 'Name 9', 500, '1', '0000-00-00 00:00:00', '4', ''),
(97, 'Name 10', 400, '1', '0000-00-00 00:00:00', '4', ''),
(98, 'Name 11', 300, '1', '0000-00-00 00:00:00', '4', ''),
(99, 'Name 12', 200, '1', '0000-00-00 00:00:00', '4', ''),
(100, 'Name 13', 100, '1', '0000-00-00 00:00:00', '4', ''),
(101, 'Name 14', 50, '1', '0000-00-00 00:00:00', '4', ''),
(102, 'Name 15', 30, '1', '0000-00-00 00:00:00', '4', ''),
(103, 'User 1', 1300, '0', '0000-00-00 00:00:00', '4', ''),
(104, 'User 2', 1200, '0', '0000-00-00 00:00:00', '4', ''),
(105, 'User 3', 1100, '0', '0000-00-00 00:00:00', '4', ''),
(106, 'User 4', 1000, '0', '0000-00-00 00:00:00', '4', ''),
(107, 'User 5', 900, '0', '0000-00-00 00:00:00', '4', ''),
(108, 'User 6', 800, '0', '0000-00-00 00:00:00', '4', ''),
(109, 'User 7', 700, '0', '0000-00-00 00:00:00', '4', ''),
(110, 'User 8', 600, '0', '0000-00-00 00:00:00', '4', ''),
(111, 'User 9', 500, '0', '0000-00-00 00:00:00', '4', ''),
(112, 'User 10', 400, '0', '0000-00-00 00:00:00', '4', ''),
(113, 'User 11', 300, '0', '0000-00-00 00:00:00', '4', ''),
(114, 'User 12', 200, '0', '0000-00-00 00:00:00', '4', ''),
(115, 'User 13', 100, '0', '0000-00-00 00:00:00', '4', ''),
(116, 'User 14', 50, '0', '0000-00-00 00:00:00', '4', ''),
(117, 'User 15', 30, '0', '0000-00-00 00:00:00', '4', ''),
(118, 'Name 1', 1300, '1', '0000-00-00 00:00:00', '2', ''),
(119, 'Name 2', 1200, '1', '0000-00-00 00:00:00', '2', ''),
(120, 'Name 3', 1100, '1', '0000-00-00 00:00:00', '2', ''),
(121, 'Name 4', 600, '1', '0000-00-00 00:00:00', '2', ''),
(122, 'Name 5', 400, '1', '0000-00-00 00:00:00', '2', ''),
(123, 'Name 6', 300, '1', '0000-00-00 00:00:00', '2', ''),
(124, 'Name 7', 200, '1', '0000-00-00 00:00:00', '2', ''),
(125, 'Name 8', 100, '1', '0000-00-00 00:00:00', '2', ''),
(126, 'Name 9', 50, '1', '0000-00-00 00:00:00', '2', ''),
(127, 'Name 10', 30, '1', '0000-00-00 00:00:00', '2', ''),
(128, 'Name 11', 1000, '1', '0000-00-00 00:00:00', '2', ''),
(129, 'Name 12', 900, '1', '0000-00-00 00:00:00', '2', ''),
(130, 'Name 13', 800, '1', '0000-00-00 00:00:00', '2', ''),
(131, 'Name 14', 700, '1', '0000-00-00 00:00:00', '2', ''),
(132, 'Name 15', 500, '1', '0000-00-00 00:00:00', '2', ''),
(133, 'User 1', 1300, '0', '0000-00-00 00:00:00', '2', ''),
(134, 'User 10', 400, '0', '0000-00-00 00:00:00', '2', ''),
(135, 'User 11', 300, '0', '0000-00-00 00:00:00', '2', ''),
(136, 'User 12', 200, '0', '0000-00-00 00:00:00', '2', ''),
(137, 'User 13', 100, '0', '0000-00-00 00:00:00', '2', ''),
(138, 'User 14', 50, '0', '0000-00-00 00:00:00', '2', ''),
(139, 'User 15', 30, '0', '0000-00-00 00:00:00', '2', ''),
(140, 'User 2', 1200, '0', '0000-00-00 00:00:00', '2', ''),
(141, 'User 3', 1100, '0', '0000-00-00 00:00:00', '2', ''),
(142, 'User 4', 1000, '0', '0000-00-00 00:00:00', '2', ''),
(143, 'User 5', 900, '0', '0000-00-00 00:00:00', '2', ''),
(144, 'User 6', 800, '0', '0000-00-00 00:00:00', '2', ''),
(145, 'User 7', 700, '0', '0000-00-00 00:00:00', '2', ''),
(146, 'User 8', 600, '0', '0000-00-00 00:00:00', '2', ''),
(147, 'User 9', 500, '0', '0000-00-00 00:00:00', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `leader_board_price`
--

CREATE TABLE `leader_board_price` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `coins` int(11) NOT NULL,
  `type` enum('0','1') NOT NULL COMMENT '0-monhtly,1-daily',
  `date` datetime NOT NULL,
  `board_type` enum('2','4') NOT NULL COMMENT '2-2player,4-4player',
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leader_board_price`
--

INSERT INTO `leader_board_price` (`id`, `name`, `coins`, `type`, `date`, `board_type`, `price`) VALUES
(155, '1st Rank', 15000, '0', '0000-00-00 00:00:00', '2', ''),
(156, '2nd Rank', 14000, '0', '0000-00-00 00:00:00', '2', ''),
(157, '3rd Rank', 13000, '0', '0000-00-00 00:00:00', '2', ''),
(158, '4th Rank', 12000, '0', '0000-00-00 00:00:00', '2', ''),
(159, '5th Rank', 11000, '0', '0000-00-00 00:00:00', '2', ''),
(160, '6th Rank', 10000, '0', '0000-00-00 00:00:00', '2', ''),
(161, '7th Rank', 9000, '0', '0000-00-00 00:00:00', '2', ''),
(162, '8th Rank', 8000, '0', '0000-00-00 00:00:00', '2', ''),
(163, '9th Rank', 6000, '0', '0000-00-00 00:00:00', '2', ''),
(164, '10th Rank', 5000, '0', '0000-00-00 00:00:00', '2', ''),
(165, '11th Rank', 4000, '0', '0000-00-00 00:00:00', '2', ''),
(166, '12th Rank', 3000, '0', '0000-00-00 00:00:00', '2', ''),
(167, '1st Rank', 15000, '0', '0000-00-00 00:00:00', '4', ''),
(168, '2nd Rank', 14000, '0', '0000-00-00 00:00:00', '4', ''),
(169, '3rd Rank', 13000, '0', '0000-00-00 00:00:00', '4', ''),
(170, '4th Rank', 12000, '0', '0000-00-00 00:00:00', '4', ''),
(171, '5th Rank', 11000, '0', '0000-00-00 00:00:00', '4', ''),
(172, '6th Rank', 10000, '0', '0000-00-00 00:00:00', '4', ''),
(173, '7th Rank', 9000, '0', '0000-00-00 00:00:00', '4', ''),
(174, '8th Rank', 8000, '0', '0000-00-00 00:00:00', '4', ''),
(175, '9th Rank', 6000, '0', '0000-00-00 00:00:00', '4', ''),
(176, '10th Rank', 5000, '0', '0000-00-00 00:00:00', '4', ''),
(177, '11th Rank', 4000, '0', '0000-00-00 00:00:00', '4', ''),
(178, '12th Rank', 3000, '0', '0000-00-00 00:00:00', '4', '');

-- --------------------------------------------------------

--
-- Table structure for table `new_game`
--

CREATE TABLE `new_game` (
  `id` int(11) NOT NULL,
  `fee` varchar(30) NOT NULL,
  `no_of_winers` varchar(30) NOT NULL,
  `pot_limit` varchar(30) NOT NULL,
  `win_upto` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `second_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_game`
--

INSERT INTO `new_game` (`id`, `fee`, `no_of_winers`, `pot_limit`, `win_upto`, `date`, `second_price`) VALUES
(1, '300', '3', '4', '300', '2022-08-30 11:46:56', '10'),
(2, '100', '1', '2', '100', '2022-08-30 16:48:53', ''),
(3, '200', '1', '2', '200', '2022-08-30 16:48:53', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `orderid` varchar(256) NOT NULL,
  `trnsid` varchar(256) NOT NULL,
  `BANKTXNID` varchar(255) DEFAULT NULL,
  `status` varchar(56) NOT NULL,
  `trnstype` varchar(90) NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `getway` varchar(256) NOT NULL,
  `decline_reason` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `uid`, `orderid`, `trnsid`, `BANKTXNID`, `status`, `trnstype`, `amount`, `datetime`, `getway`, `decline_reason`) VALUES
(12, 154, 'ORDS46697446', '', NULL, 'In Process', 'desposite', 25, '2023-06-23 10:34:01', '', NULL),
(11, 112, '81494838', '0', NULL, 'In Process', 'withdrawal', 100, '2023-06-22 16:20:41', 'bank', 'no'),
(8, 151, 'ORDS58286567', '', NULL, 'In Process', 'desposite', 25, '2023-06-21 20:15:26', '', NULL),
(7, 133, 'ORDS77188877', '', NULL, 'In Process', 'desposite', 25, '2023-06-19 18:36:10', '', NULL),
(13, 112, 'ORDS57697565', '', '2147488204', 'Success', 'desposite', 25, '2023-06-23 11:22:25', '', NULL),
(14, 112, 'ORDS52998008', '', '2147529990', 'Success', 'desposite', 25, '2023-06-23 11:23:13', '', NULL),
(15, 112, 'ORDS66472758', '', '2147488214', 'Success', 'desposite', 25, '2023-06-23 11:50:25', '', NULL),
(16, 112, '63918850', '0', NULL, 'approved', 'withdrawal', 100, '2023-06-24 00:08:52', 'bank', NULL),
(17, 112, '71125972', '0', NULL, 'approved', 'withdrawal', 100, '2023-06-26 10:59:14', 'bank', NULL),
(18, 158, 'ORDS61264481', '', NULL, 'In Process', 'desposite', 25, '2023-07-04 12:24:11', '', NULL),
(19, 158, 'ORDS85645277', '', NULL, 'In Process', 'desposite', 25, '2023-07-04 12:24:32', '', NULL),
(20, 160, 'ORDS64811962', '', '2147551698', 'Success', 'desposite', 25, '2023-07-04 21:34:09', '', NULL),
(21, 160, 'ORDS78903175', '', NULL, 'In Process', 'desposite', 500, '2023-07-04 21:35:35', '', NULL),
(22, 160, 'ORDS87944571', '', '2147551709', 'Success', 'desposite', 500, '2023-07-04 21:38:17', '', NULL),
(23, 163, 'ORDS04905494', '', '2147555924', 'Success', 'desposite', 25, '2023-07-05 16:25:04', '', NULL),
(24, 135, 'ORDS97935909', '', '2147594647', 'Success', 'desposite', 25, '2023-07-12 11:22:39', '', NULL),
(25, 168, 'ORDS25891169', '', NULL, 'In Process', 'desposite', 1000, '2023-07-13 19:52:41', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `push_notifications`
--

INSERT INTO `push_notifications` (`id`, `user_id`, `title`, `description`, `created_at`) VALUES
(3, '112', 'Hi', 'Play', '2023-06-13 12:16:21'),
(18, '137', 'test', 'test', '2023-07-05 14:13:22'),
(19, '137', 'test', 'test', '2023-07-05 14:13:57'),
(20, '137', 'test', 'test', '2023-07-11 10:52:38'),
(21, '112', 'test', 'test', '2023-07-11 10:56:15'),
(22, '112', 'test', 'test', '2023-07-12 11:21:04'),
(23, '112', 'movie', '', '2023-07-12 11:34:13'),
(24, '112', '', '', '2023-07-12 11:37:00'),
(25, '112', 'test', 'test', '2023-07-12 11:39:12'),
(26, '112', 'test', 'test', '2023-07-12 11:41:19'),
(27, '112', 'Top-up ludo', 'Invite and win bonus', '2023-07-13 10:38:48'),
(28, '169', 'Hii', 'Hello ', '2023-07-14 20:15:48'),
(29, '169', 'Hii', 'Hello ', '2023-07-14 20:16:01'),
(30, '169', 'Hii', 'Hello ', '2023-07-14 20:16:03'),
(31, '0', 'Nana', 'Nanaka', '2023-07-14 20:16:49'),
(32, '0', 'Hiii', 'Hii', '2023-07-14 20:19:42'),
(33, '0', 'Hiii', 'Hii', '2023-07-14 20:19:45'),
(34, '0', 'Hiii', 'Hii', '2023-07-14 20:19:55'),
(35, '0', 'Hello', 'This is testing', '2023-07-15 13:17:16'),
(36, '0', '', '', '2023-07-16 16:44:22'),
(37, '112', 'Top-up Ludo (SKLITE)', 'R E F E R R A L coupon 1234567\r\nLogin with this and get bonus', '2023-07-17 17:48:35'),
(38, '136', 'SKLITE', 'R E F E R R A L coupon 1234567 Login with this and get bonus', '2023-07-17 17:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `refered`
--

CREATE TABLE `refered` (
  `rid` int(11) NOT NULL,
  `rcode` varchar(256) NOT NULL,
  `uid` int(11) NOT NULL,
  `refered_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `referdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `title`, `description`) VALUES
(1, ' Invite your friend and earn referral money.', 'Refer a friend and get bonus of Rs 10/- for both players and enjoy the game.');

-- --------------------------------------------------------

--
-- Table structure for table `referralimg`
--

CREATE TABLE `referralimg` (
  `id` int(11) NOT NULL,
  `img` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referralimg`
--

INSERT INTO `referralimg` (`id`, `img`, `status`) VALUES
(1, 'http://eyuktisolution.com/hyike/api/uploads/banner.jpg', 1),
(2, 'http://eyuktisolution.com/hyike/api/uploads/banner2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE `social_media_links` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_admins`
--

CREATE TABLE `sub_admins` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pages` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `view_roles` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_admins`
--

INSERT INTO `sub_admins` (`id`, `user_name`, `mobile`, `password`, `pages`, `status`, `view_roles`) VALUES
(2, 'shaik', '9490671352', '123', 'manage_user,lite_leader_board,withdraw_history,push_notifications,kyc,contact_us', 1, 'view1,view6,view9,view14,view19,view22'),
(3, 'sonali', '7816064658', '123456', 'classic_leader_board,lite_leader_board,push_notifications,cms_management,contact_us', 1, ''),
(7, 'Pushpendra', '9490036767', '123456', 'manage_user,user_history,user_bio,classic_leader_board,lite_leader_board', 1, 'view6,view12,view18'),
(10, 'sarath', '9951980724', '123456', 'manage_user,lite_leader_board,push_notifications,kyc,constants', 1, 'view4,view7,view10,view13,view18,view23');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(355) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `tid` int(11) NOT NULL,
  `joiningamount` int(11) NOT NULL,
  `started` int(11) NOT NULL,
  `enddate` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament_history`
--

CREATE TABLE `tournament_history` (
  `id` int(11) NOT NULL,
  `tourid` int(11) NOT NULL,
  `gametype` int(11) NOT NULL,
  `winpoint` int(11) NOT NULL,
  `ponttype` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `tid` int(11) NOT NULL,
  `gameid` varchar(255) DEFAULT NULL,
  `trntype` varchar(256) NOT NULL,
  `uid` int(11) NOT NULL,
  `amount` varchar(120) NOT NULL,
  `closingcoins` int(11) NOT NULL,
  `updatedcoins` int(11) NOT NULL,
  `crdr` varchar(5) NOT NULL,
  `ipaddress` varchar(256) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `game_winners_table_id` int(11) DEFAULT NULL,
  `page_name` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`tid`, `gameid`, `trntype`, `uid`, `amount`, `closingcoins`, `updatedcoins`, `crdr`, `ipaddress`, `datetime`, `game_winners_table_id`, `page_name`) VALUES
(1, 'Room89457956', 'BET', 2, '0', 0, 0, 'Dr', NULL, '2023-05-09 14:16:43', NULL, NULL),
(2, 'Room97546879', 'BET', 8, '0', 0, 0, 'Dr', NULL, '2023-05-09 17:00:43', NULL, NULL),
(3, 'Room05161445', 'BET', 12, '0', 0, 0, 'Dr', NULL, '2023-05-09 23:00:40', NULL, NULL),
(4, 'Room82042781', 'BET', 12, '0', 0, 0, 'Dr', NULL, '2023-05-10 11:37:19', NULL, NULL),
(5, 'Room64886327', 'BET', 8, '0', 0, 0, 'Dr', NULL, '2023-05-10 11:44:34', NULL, NULL),
(6, 'Room16775339', 'BET', 12, '0', 0, 0, 'Dr', NULL, '2023-05-11 23:54:48', NULL, NULL),
(7, 'Room16775339', 'Game Winner', 12, '0', 0, 0, 'Cr', NULL, '2023-05-12 00:05:12', 1, 'game winner'),
(8, 'Room97459260', 'BET', 17, '0', 0, 0, 'Dr', NULL, '2023-05-13 12:08:37', NULL, NULL),
(9, 'Room77004626', 'BET', 18, '0', 0, 0, 'Dr', NULL, '2023-05-13 14:40:34', NULL, NULL),
(10, 'Room18628075', 'BET', 19, '0', 0, 0, 'Dr', NULL, '2023-05-17 20:50:04', NULL, NULL),
(11, 'Room67645106', 'BET', 19, '0', 0, 0, 'Dr', NULL, '2023-05-18 15:43:43', NULL, NULL),
(12, NULL, 'Coins Transfer to Sarath ', 1, '500', 116350, 115850, 'Dr', '49.206.202.170', '2023-05-20 10:28:27', NULL, NULL),
(13, NULL, 'Coins Transfer from Demo ', 14, '500', 0, 500, 'Cr', '49.206.202.170', '2023-05-20 10:28:27', NULL, NULL),
(14, NULL, 'Coins Transfer to Demo ', 1, '500', 115850, 115350, 'Dr', '49.206.202.170', '2023-05-20 10:28:54', NULL, NULL),
(15, NULL, 'Coins Transfer from Demo ', 17, '500', 0, 500, 'Cr', '49.206.202.170', '2023-05-20 10:28:54', NULL, NULL),
(16, NULL, 'Coins Transfer to Arss ', 1, '500', 115350, 114850, 'Dr', '49.206.202.170', '2023-05-20 10:38:41', NULL, NULL),
(17, NULL, 'Coins Transfer from Demo ', 21, '500', 0, 500, 'Cr', '49.206.202.170', '2023-05-20 10:38:41', NULL, NULL),
(18, 'Room72682297', 'BET', 21, '50', 500, 450, 'Dr', NULL, '2023-05-20 10:39:52', NULL, NULL),
(19, 'Room72682297', 'BET', 17, '50', 500, 450, 'Dr', NULL, '2023-05-20 10:39:52', NULL, NULL),
(20, 'Room72682297', 'Game Winner', 17, '95', 450, 545, 'Cr', NULL, '2023-05-20 10:42:20', 2, 'exit from game'),
(21, 'Room04131603', 'BET', 22, '0', 0, 0, 'Dr', NULL, '2023-05-20 13:25:15', NULL, NULL),
(22, 'Room03674443', 'BET', 19, '0', 0, 0, 'Dr', NULL, '2023-05-20 15:14:56', NULL, NULL),
(23, 'Room34902372', 'BET', 19, '0', 0, 0, 'Dr', NULL, '2023-05-22 19:16:59', NULL, NULL),
(24, 'Room39467181', 'BET', 18, '0', 0, 0, 'Dr', NULL, '2023-05-22 20:56:43', NULL, NULL),
(25, 'Room17047674', 'BET', 26, '0', 0, 0, 'Dr', NULL, '2023-05-22 21:00:38', NULL, NULL),
(26, 'Room20382815', 'BET', 26, '0', 0, 0, 'Dr', NULL, '2023-05-22 21:01:03', NULL, NULL),
(27, 'Room76576030', 'BET', 18, '0', 0, 0, 'Dr', NULL, '2023-05-22 22:03:36', NULL, NULL),
(28, 'Room98349635', 'BET', 18, '0', 0, 0, 'Dr', NULL, '2023-05-22 22:05:26', NULL, NULL),
(29, 'Room05822855', 'BET', 18, '0', 0, 0, 'Dr', NULL, '2023-05-22 23:50:02', NULL, NULL),
(30, 'Room37831418', 'BET', 45, '0', 0, 0, 'Dr', NULL, '2023-05-24 11:42:36', NULL, NULL),
(31, 'Room30152409', 'BET', 45, '0', 0, 0, 'Dr', NULL, '2023-05-24 11:43:28', NULL, NULL),
(32, 'Room81985928', 'BET', 45, '0', 0, 0, 'Dr', NULL, '2023-05-24 11:49:06', NULL, NULL),
(33, 'Room35859207', 'BET', 45, '0', 0, 0, 'Dr', NULL, '2023-05-24 11:54:38', NULL, NULL),
(34, 'Room41614157', 'BET', 45, '0', 0, 0, 'Dr', NULL, '2023-05-24 12:04:28', NULL, NULL),
(35, 'Room50332826', 'BET', 45, '0', 0, 0, 'Dr', NULL, '2023-05-24 12:05:39', NULL, NULL),
(36, 'Room57061723', 'BET', 45, '0', 0, 0, 'Dr', NULL, '2023-05-24 12:10:24', NULL, NULL),
(37, 'Room13301560', 'BET', 2, '0', 0, 0, 'Dr', NULL, '2023-05-24 15:14:48', NULL, NULL),
(38, 'Room40407623', 'BET', 2, '0', 0, 0, 'Dr', NULL, '2023-05-24 15:31:52', NULL, NULL),
(39, 'Room22502511', 'BET', 4, '0', 0, 0, 'Dr', NULL, '2023-05-24 15:51:58', NULL, NULL),
(40, 'Room02442958', 'BET', 4, '0', 0, 0, 'Dr', NULL, '2023-05-24 15:55:39', NULL, NULL),
(41, 'Room54470990', 'BET', 4, '0', 0, 0, 'Dr', NULL, '2023-05-24 16:15:22', NULL, NULL),
(42, 'Room72255820', 'BET', 9, '0', 0, 0, 'Dr', NULL, '2023-05-29 19:55:38', NULL, NULL),
(43, 'Room15733366', 'BET', 12, '0', 0, 0, 'Dr', NULL, '2023-05-30 15:22:22', NULL, NULL),
(44, 'Room51745914', 'BET', 13, '10', 3000, 2990, 'Dr', NULL, '2023-05-30 16:45:24', NULL, NULL),
(45, 'Room51745914', 'BET', 12, '10', 200, 190, 'Dr', NULL, '2023-05-30 16:45:25', NULL, NULL),
(46, 'Room51745914', 'Game Winner', 13, '19', 2990, 3009, 'Cr', NULL, '2023-05-30 16:45:41', 3, 'exit from game'),
(47, 'Room46889112', 'BET', 12, '0', 190, 190, 'Dr', NULL, '2023-05-31 10:06:01', NULL, NULL),
(48, 'Room90267457', 'BET', 34, '0', 0, 0, 'Dr', NULL, '2023-06-02 20:44:52', NULL, NULL),
(49, 'Room44001181', 'BET', 34, '0', 0, 0, 'Dr', NULL, '2023-06-02 21:29:59', NULL, NULL),
(50, NULL, 'Coins Transfer to Demo ', 1, '500', 114850, 114350, 'Dr', '202.53.69.164', '2023-06-03 10:36:59', NULL, NULL),
(51, NULL, 'Coins Transfer from Demo ', 5, '500', 200, 700, 'Cr', '202.53.69.164', '2023-06-03 10:36:59', NULL, NULL),
(52, 'Room93378665', 'BET', 42, '0', 0, 0, 'Dr', NULL, '2023-06-03 22:34:36', NULL, NULL),
(53, 'Room67073408', 'BET', 42, '0', 0, 0, 'Dr', NULL, '2023-06-03 22:35:29', NULL, NULL),
(54, 'Room14916155', 'BET', 42, '0', 0, 0, 'Dr', NULL, '2023-06-03 22:46:36', NULL, NULL),
(55, 'Room40173780', 'BET', 52, '0', 0, 0, 'Dr', NULL, '2023-06-05 18:00:21', NULL, NULL),
(56, 'Room86141751', 'BET', 52, '0', 0, 0, 'Dr', NULL, '2023-06-05 18:04:00', NULL, NULL),
(57, 'Room66191063', 'BET', 53, '0', 0, 0, 'Dr', NULL, '2023-06-05 18:05:03', NULL, NULL),
(58, 'Room81632993', 'BET', 54, '0', 0, 0, 'Dr', NULL, '2023-06-05 18:10:33', NULL, NULL),
(59, 'Room14148706', 'BET', 54, '0', 0, 0, 'Dr', NULL, '2023-06-05 18:11:13', NULL, NULL),
(60, 'Room62231030', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-05 19:07:16', NULL, NULL),
(61, 'Room65670604', 'BET', 60, '0', 0, 0, 'Dr', NULL, '2023-06-05 19:11:23', NULL, NULL),
(62, 'Room98083283', 'BET', 60, '0', 0, 0, 'Dr', NULL, '2023-06-05 19:15:37', NULL, NULL),
(63, NULL, 'Coins Transfer to Sonali ', 1, '10000', 114350, 104350, 'Dr', '49.206.202.170', '2023-06-06 11:09:18', NULL, NULL),
(64, NULL, 'Coins Transfer from Demo ', 60, '10000', 0, 10000, 'Cr', '49.206.202.170', '2023-06-06 11:09:18', NULL, NULL),
(65, 'Room63955875', 'BET', 61, '0', 0, 0, 'Dr', NULL, '2023-06-06 11:28:06', NULL, NULL),
(66, 'Room05011396', 'BET', 62, '0', 0, 0, 'Dr', NULL, '2023-06-06 11:39:09', NULL, NULL),
(67, 'Room52215583', 'BET', 62, '0', 0, 0, 'Dr', NULL, '2023-06-06 11:48:29', NULL, NULL),
(68, 'Room81836337', 'BET', 60, '0', 10000, 10000, 'Dr', NULL, '2023-06-06 14:58:17', NULL, NULL),
(69, 'Room09790136', 'BET', 60, '0', 10000, 10000, 'Dr', NULL, '2023-06-06 15:00:48', NULL, NULL),
(70, 'Room55823425', 'BET', 60, '0', 10000, 10000, 'Dr', NULL, '2023-06-06 15:46:37', NULL, NULL),
(71, 'Room66630530', 'BET', 60, '0', 10000, 10000, 'Dr', NULL, '2023-06-06 15:55:13', NULL, NULL),
(72, 'Room69766143', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:03:39', NULL, NULL),
(73, 'Room10325577', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:04:11', NULL, NULL),
(74, 'Room13454167', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:04:56', NULL, NULL),
(75, 'Room62723631', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:06:23', NULL, NULL),
(76, 'Room29545296', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:09:42', NULL, NULL),
(77, 'Room22430679', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:11:38', NULL, NULL),
(78, 'Room04215347', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:12:07', NULL, NULL),
(79, 'Room63484761', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:23:33', NULL, NULL),
(80, 'Room36683082', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:26:18', NULL, NULL),
(81, 'Room97500434', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:26:44', NULL, NULL),
(82, 'Room65990079', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:30:18', NULL, NULL),
(83, 'Room64298774', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:32:29', NULL, NULL),
(84, 'Room54199690', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:33:51', NULL, NULL),
(85, 'Room30113990', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:34:26', NULL, NULL),
(86, 'Room41798869', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:34:39', NULL, NULL),
(87, 'Room46922080', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:35:45', NULL, NULL),
(88, 'Room45125344', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:36:09', NULL, NULL),
(89, 'Room29009319', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:38:39', NULL, NULL),
(90, 'Room64049083', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 16:38:49', NULL, NULL),
(91, 'Room21825372', 'BET', 59, '0', 0, 0, 'Dr', NULL, '2023-06-06 17:10:32', NULL, NULL),
(92, 'Room66064756', 'BET', 60, '0', 10000, 10000, 'Dr', NULL, '2023-06-06 17:29:05', NULL, NULL),
(93, 'Room08266094', 'BET', 60, '0', 10000, 10000, 'Dr', NULL, '2023-06-06 17:31:54', NULL, NULL),
(94, NULL, 'Coins Transfer to Ars Sarath ', 1, '1000', 104350, 103350, 'Dr', '49.206.202.170', '2023-06-06 18:29:31', NULL, NULL),
(95, NULL, 'Coins Transfer from Demo ', 59, '1000', 0, 1000, 'Cr', '49.206.202.170', '2023-06-06 18:29:31', NULL, NULL),
(96, 'Room00601043', 'BET', 60, '10', 10000, 9990, 'Dr', NULL, '2023-06-06 18:31:58', NULL, NULL),
(97, 'Room00601043', 'BET', 59, '10', 1000, 990, 'Dr', NULL, '2023-06-06 18:31:59', NULL, NULL),
(98, 'Room00601043', 'Game Winner', 59, '18', 990, 1008, 'Cr', NULL, '2023-06-06 18:36:57', 4, 'game winner'),
(99, 'Room74979156', 'BET', 60, '0', 9990, 9990, 'Dr', NULL, '2023-06-06 18:47:18', NULL, NULL),
(100, 'Room85389819', 'BET', 60, '0', 9990, 9990, 'Dr', NULL, '2023-06-06 19:16:17', NULL, NULL),
(101, 'Room61879495', 'BET', 64, '0', 0, 0, 'Dr', NULL, '2023-06-06 19:26:14', NULL, NULL),
(102, 'Room62625826', 'BET', 65, '0', 0, 0, 'Dr', NULL, '2023-06-06 19:38:41', NULL, NULL),
(103, 'Room52018709', 'BET', 65, '0', 0, 0, 'Dr', NULL, '2023-06-06 19:40:30', NULL, NULL),
(104, 'Room25117968', 'BET', 65, '0', 0, 0, 'Dr', NULL, '2023-06-06 19:43:48', NULL, NULL),
(105, 'Room11815382', 'BET', 66, '0', 0, 0, 'Dr', NULL, '2023-06-06 19:50:01', NULL, NULL),
(106, 'Room12290330', 'BET', 66, '0', 0, 0, 'Dr', NULL, '2023-06-06 20:03:56', NULL, NULL),
(107, 'Room61627333', 'BET', 66, '0', 0, 0, 'Dr', NULL, '2023-06-06 20:25:42', NULL, NULL),
(108, 'Room97294269', 'BET', 66, '0', 0, 0, 'Dr', NULL, '2023-06-07 08:29:04', NULL, NULL),
(109, 'Room97294269', 'Game Winner', 66, '0', 0, 0, 'Cr', NULL, '2023-06-07 08:39:15', 5, 'game winner'),
(110, 'Room78758633', 'BET', 59, '0', 990, 990, 'Dr', NULL, '2023-06-07 11:40:52', NULL, NULL),
(111, 'Room84465910', 'BET', 59, '0', 990, 990, 'Dr', NULL, '2023-06-07 11:41:08', NULL, NULL),
(112, 'Room17724436', 'BET', 59, '0', 990, 990, 'Dr', NULL, '2023-06-07 11:41:41', NULL, NULL),
(113, 'Room99893121', 'BET', 59, '0', 990, 990, 'Dr', NULL, '2023-06-07 11:44:39', NULL, NULL),
(114, 'Room77212092', 'BET', 59, '0', 990, 990, 'Dr', NULL, '2023-06-07 11:50:15', NULL, NULL),
(115, 'Room47698685', 'BET', 59, '0', 990, 990, 'Dr', NULL, '2023-06-07 11:51:43', NULL, NULL),
(116, 'Room36242884', 'BET', 59, '0', 990, 990, 'Dr', NULL, '2023-06-07 11:55:51', NULL, NULL),
(117, 'Room99373757', 'BET', 68, '0', 0, 0, 'Dr', NULL, '2023-06-07 15:58:34', NULL, NULL),
(118, 'Room02944839', 'BET', 76, '0', 0, 0, 'Dr', NULL, '2023-06-07 17:38:01', NULL, NULL),
(119, 'Room49412584', 'BET', 80, '0', 0, 0, 'Dr', NULL, '2023-06-07 18:21:28', NULL, NULL),
(120, 'Room49412584', 'Game Winner', 80, '0', 0, 0, 'Cr', NULL, '2023-06-07 18:21:28', 6, 'game winner'),
(121, 'Room05038942', 'BET', 80, '0', 0, 0, 'Dr', NULL, '2023-06-07 18:40:45', NULL, NULL),
(122, 'Room75424298', 'BET', 93, '0', 0, 0, 'Dr', NULL, '2023-06-08 09:01:24', NULL, NULL),
(123, 'Room90317198', 'BET', 93, '0', 0, 0, 'Dr', NULL, '2023-06-08 09:08:55', NULL, NULL),
(124, 'Room40336071', 'BET', 116, '0', 0, 0, 'Dr', NULL, '2023-06-08 17:40:52', NULL, NULL),
(125, 'Room11862031', 'BET', 115, '0', 0, 0, 'Dr', NULL, '2023-06-08 17:52:35', NULL, NULL),
(126, 'Room55889770', 'BET', 115, '0', 0, 0, 'Dr', NULL, '2023-06-08 18:23:37', NULL, NULL),
(127, 'Room52944799', 'BET', 117, '0', 0, 0, 'Dr', NULL, '2023-06-08 18:38:08', NULL, NULL),
(128, 'Room23951949', 'BET', 115, '0', 0, 0, 'Dr', NULL, '2023-06-08 18:50:44', NULL, NULL),
(129, 'Room81530705', 'BET', 115, '0', 0, 0, 'Dr', NULL, '2023-06-08 18:52:51', NULL, NULL),
(130, 'Room38076891', 'BET', 115, '0', 0, 0, 'Dr', NULL, '2023-06-08 18:54:39', NULL, NULL),
(131, 'Room84940502', 'BET', 115, '0', 0, 0, 'Dr', NULL, '2023-06-08 18:56:17', NULL, NULL),
(132, 'Room89089906', 'BET', 117, '0', 0, 0, 'Dr', NULL, '2023-06-08 19:40:26', NULL, NULL),
(133, 'Room42090886', 'BET', 117, '0', 0, 0, 'Dr', NULL, '2023-06-08 19:41:59', NULL, NULL),
(134, 'Room07759186', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-08 19:46:05', NULL, NULL),
(135, 'Room37042132', 'BET', 119, '0', 0, 0, 'Dr', NULL, '2023-06-08 21:08:46', NULL, NULL),
(136, 'Room60920776', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-08 22:42:33', NULL, NULL),
(137, 'Room86458429', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-08 22:47:46', NULL, NULL),
(138, 'Room87484911', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-08 22:48:05', NULL, NULL),
(139, 'Room44392672', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-08 23:53:09', NULL, NULL),
(140, 'Room36051572', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 00:03:54', NULL, NULL),
(141, 'Room85788995', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 00:12:21', NULL, NULL),
(142, 'Room96425300', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 00:12:52', NULL, NULL),
(143, 'Room65639309', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 00:24:16', NULL, NULL),
(144, 'Room45826894', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 00:24:35', NULL, NULL),
(145, 'Room47210217', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 12:45:59', NULL, NULL),
(146, 'Room60374251', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 12:46:24', NULL, NULL),
(147, 'Room47605868', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 12:55:43', NULL, NULL),
(148, 'Room27744872', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 12:56:17', NULL, NULL),
(149, 'Room89716223', 'BET', 120, '0', 0, 0, 'Dr', NULL, '2023-06-09 13:01:25', NULL, NULL),
(150, 'Room67557060', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 15:08:53', NULL, NULL),
(151, 'Room97772767', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 15:25:31', NULL, NULL),
(152, 'Room87385436', 'BET', 120, '0', 0, 0, 'Dr', NULL, '2023-06-09 15:26:12', NULL, NULL),
(153, 'Room15905260', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 15:35:37', NULL, NULL),
(154, 'Room41004661', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 15:36:44', NULL, NULL),
(155, 'Room95743548', 'BET', 121, '0', 0, 0, 'Dr', NULL, '2023-06-09 15:58:20', NULL, NULL),
(156, 'Room16322521', 'BET', 122, '0', 0, 0, 'Dr', NULL, '2023-06-09 16:15:44', NULL, NULL),
(157, 'Room78926711', 'BET', 121, '0', 0, 0, 'Dr', NULL, '2023-06-09 16:17:08', NULL, NULL),
(158, 'Room37150642', 'BET', 121, '0', 0, 0, 'Dr', NULL, '2023-06-09 16:22:48', NULL, NULL),
(159, 'Room16491314', 'BET', 122, '0', 0, 0, 'Dr', NULL, '2023-06-09 16:22:53', NULL, NULL),
(160, 'Room31364432', 'BET', 121, '0', 0, 0, 'Dr', NULL, '2023-06-09 16:24:02', NULL, NULL),
(161, 'Room84754703', 'BET', 121, '0', 0, 0, 'Dr', NULL, '2023-06-09 16:25:26', NULL, NULL),
(162, 'Room77165718', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 16:41:48', NULL, NULL),
(163, 'Room26354846', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 16:47:49', NULL, NULL),
(164, 'Room84982232', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 17:41:53', NULL, NULL),
(165, 'Room95241622', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-09 18:10:03', NULL, NULL),
(166, 'Room07845584', 'BET', 124, '0', 0, 0, 'Dr', NULL, '2023-06-09 18:19:00', NULL, NULL),
(167, 'Room26659047', 'BET', 128, '0', 0, 0, 'Dr', NULL, '2023-06-09 20:13:58', NULL, NULL),
(168, 'Room62331761', 'BET', 128, '0', 0, 0, 'Dr', NULL, '2023-06-10 12:39:33', NULL, NULL),
(169, NULL, 'Coins Transfer to sk ', 1, '50', 103350, 103300, 'Dr', '106.76.232.99', '2023-06-10 12:43:15', NULL, NULL),
(170, NULL, 'Coins Transfer from Demo ', 128, '50', 0, 50, 'Cr', '106.76.232.99', '2023-06-10 12:43:15', NULL, NULL),
(171, 'Room86918099', 'BET', 128, '0', 50, 50, 'Dr', NULL, '2023-06-10 12:53:24', NULL, NULL),
(172, 'Room47870040', 'BET', 112, '0', 0, 0, 'Dr', NULL, '2023-06-12 18:38:23', NULL, NULL),
(173, 'Room81774205', 'BET', 128, '0', 50, 50, 'Dr', NULL, '2023-06-12 21:23:38', NULL, NULL),
(174, NULL, 'Coins Transfer to Sarath ', 1, '500', 103300, 102800, 'Dr', '49.206.202.170', '2023-06-13 11:17:46', NULL, NULL),
(175, NULL, 'Coins Transfer from Demo ', 112, '500', 0, 500, 'Cr', '49.206.202.170', '2023-06-13 11:17:46', NULL, NULL),
(176, '34325256', 'BET', 112, '10', 500, 490, 'Dr', NULL, '2023-06-13 11:18:29', NULL, NULL),
(177, '34325256', 'BET', 112, '10', 490, 480, 'Dr', NULL, '2023-06-13 11:18:30', NULL, NULL),
(178, '34325256', 'Game Winner', 112, '17', 480, 497, 'Cr', NULL, '2023-06-13 11:18:46', 7, 'game winner'),
(179, 'Room57592595', 'BET', 112, '0', 480, 480, 'Dr', NULL, '2023-06-13 11:29:30', NULL, NULL),
(180, 'Room93528900', 'BET', 112, '0', 480, 480, 'Dr', NULL, '2023-06-13 11:47:29', NULL, NULL),
(181, 'Room32079006', 'BET', 129, '0', 0, 0, 'Dr', NULL, '2023-06-13 14:40:10', NULL, NULL),
(182, 'Room49047771', 'BET', 129, '0', 0, 0, 'Dr', NULL, '2023-06-13 14:53:34', NULL, NULL),
(183, NULL, 'Coins Transfer to sk ', 1, '1000', 102800, 101800, 'Dr', '106.77.178.155', '2023-06-13 15:05:17', NULL, NULL),
(184, NULL, 'Coins Transfer from Demo ', 129, '1000', 0, 1000, 'Cr', '106.77.178.155', '2023-06-13 15:05:17', NULL, NULL),
(185, 'Room49293418', 'BET', 130, '0', 0, 0, 'Dr', NULL, '2023-06-13 15:22:22', NULL, NULL),
(186, 'Room81168078', 'BET', 130, '0', 0, 0, 'Dr', NULL, '2023-06-13 15:23:35', NULL, NULL),
(187, 'Room67565432', 'BET', 112, '0', 480, 480, 'Dr', NULL, '2023-06-13 16:13:09', NULL, NULL),
(188, 'Room06868302', 'BET', 131, '0', 0, 0, 'Dr', NULL, '2023-06-13 17:22:07', NULL, NULL),
(189, 'Room35551589', 'BET', 132, '0', 0, 0, 'Dr', NULL, '2023-06-13 20:02:05', NULL, NULL),
(190, 'Room73361230', 'BET', 132, '0', 0, 0, 'Dr', NULL, '2023-06-14 14:18:03', NULL, NULL),
(191, 'Room84884667', 'BET', 132, '0', 0, 0, 'Dr', NULL, '2023-06-14 23:22:54', NULL, NULL),
(192, NULL, 'Coins Transfer to ABc ', 112, '50', 480, 430, 'Dr', '106.76.221.96', '2023-06-15 07:39:28', NULL, NULL),
(193, NULL, 'Coins Transfer from Sarath ', 132, '50', 0, 50, 'Cr', '106.76.221.96', '2023-06-15 07:39:28', NULL, NULL),
(194, NULL, 'Bonus Transfer to Demo ', 1, '51', 10000, 9949, 'Dr', '106.76.221.96', '2023-06-15 07:39:36', NULL, NULL),
(195, NULL, 'Bonus Transfer from Demo ', 1, '51', 101800, 10051, 'Cr', '106.76.221.96', '2023-06-15 07:39:36', NULL, NULL),
(196, NULL, 'Bonus Transfer to ABc ', 1, '51', 10051, 10000, 'Dr', '106.76.221.96', '2023-06-15 07:40:29', NULL, NULL),
(197, NULL, 'Bonus Transfer from Demo ', 132, '51', 50, 51, 'Cr', '106.76.221.96', '2023-06-15 07:40:29', NULL, NULL),
(198, 'Room38750326', 'BET', 132, '0', 50, 50, 'Dr', NULL, '2023-06-16 20:03:55', NULL, NULL),
(199, 'Room99111274', 'BET', 133, '0', 0, 0, 'Dr', NULL, '2023-06-19 10:37:44', NULL, NULL),
(200, 'Room30380218', 'BET', 112, '0', 430, 430, 'Dr', NULL, '2023-06-19 10:53:37', NULL, NULL),
(201, 'Room59367421', 'BET', 112, '0', 430, 430, 'Dr', NULL, '2023-06-19 11:28:29', NULL, NULL),
(202, 'Room71723298', 'BET', 114, '0', 1000, 1000, 'Dr', NULL, '2023-06-19 11:34:33', NULL, NULL),
(203, 'Room88009859', 'BET', 114, '10', 1000, 990, 'Dr', NULL, '2023-06-19 11:35:16', NULL, NULL),
(204, 'Room88009859', 'BET', 112, '10', 430, 420, 'Dr', NULL, '2023-06-19 11:35:17', NULL, NULL),
(205, 'Room88009859', 'Game Winner', 112, '18', 420, 438, 'Cr', NULL, '2023-06-19 11:36:04', 8, 'exit from game'),
(206, 'Room63801344', 'BET', 114, '10', 990, 980, 'Dr', NULL, '2023-06-19 11:39:12', NULL, NULL),
(207, 'Room63801344', 'BET', 112, '10', 420, 410, 'Dr', NULL, '2023-06-19 11:39:15', NULL, NULL),
(208, 'Room63801344', 'Game Winner', 112, '19', 410, 429, 'Cr', NULL, '2023-06-19 11:40:18', 9, 'game winner'),
(209, 'Room77089610', 'BET', 133, '0', 0, 0, 'Dr', NULL, '2023-06-19 17:13:40', NULL, NULL),
(210, 'Room69822378', 'BET', 133, '0', 0, 0, 'Dr', NULL, '2023-06-19 18:24:08', NULL, NULL),
(211, 'Room69822378', 'Game Winner', 133, '0', 0, 0, 'Cr', NULL, '2023-06-19 18:34:49', 10, 'game winner'),
(212, 'Room13192066', 'BET', 133, '0', 0, 0, 'Dr', NULL, '2023-06-19 18:35:09', NULL, NULL),
(213, 'Room24856418', 'BET', 135, '10', 1000, 990, 'Dr', NULL, '2023-06-20 10:44:46', NULL, NULL),
(214, 'Room24856418', 'BET', 112, '10', 1000, 990, 'Dr', NULL, '2023-06-20 10:44:46', NULL, NULL),
(215, 'Room24856418', 'Game Winner', 135, '18', 990, 1008, 'Cr', NULL, '2023-06-20 10:45:00', 11, 'exit from game'),
(216, 'Room23840001', 'BET', 135, '10', 990, 980, 'Dr', NULL, '2023-06-20 10:45:35', NULL, NULL),
(217, 'Room23840001', 'BET', 112, '10', 990, 980, 'Dr', NULL, '2023-06-20 10:45:36', NULL, NULL),
(218, 'Room23840001', 'Game Winner', 135, '18', 980, 998, 'Cr', NULL, '2023-06-20 10:45:53', 12, 'exit from game'),
(219, 'Room80179673', 'BET', 135, '10', 980, 970, 'Dr', NULL, '2023-06-20 10:46:29', NULL, NULL),
(220, 'Room80179673', 'BET', 112, '10', 980, 970, 'Dr', NULL, '2023-06-20 10:46:30', NULL, NULL),
(221, 'Room80179673', 'Game Winner', 112, '18', 970, 988, 'Cr', NULL, '2023-06-20 10:46:40', 13, 'exit from game'),
(222, 'Room55167858', 'BET', 135, '10', 970, 960, 'Dr', NULL, '2023-06-20 10:47:29', NULL, NULL),
(223, 'Room55167858', 'BET', 112, '10', 970, 960, 'Dr', NULL, '2023-06-20 10:47:29', NULL, NULL),
(224, 'Room55167858', 'Game Winner', 112, '18', 960, 978, 'Cr', NULL, '2023-06-20 10:51:30', 14, 'exit from game'),
(225, 'Room56627188', 'BET', 112, '10', 960, 950, 'Dr', NULL, '2023-06-20 10:52:01', NULL, NULL),
(226, 'Room56627188', 'BET', 135, '10', 960, 950, 'Dr', NULL, '2023-06-20 10:52:01', NULL, NULL),
(227, 'Room56627188', 'Game Winner', 135, '18', 950, 968, 'Cr', NULL, '2023-06-20 10:52:14', 15, 'exit from game'),
(228, 'Room30345156', 'BET', 135, '10', 950, 940, 'Dr', NULL, '2023-06-20 10:52:34', NULL, NULL),
(229, 'Room30345156', 'BET', 112, '10', 950, 940, 'Dr', NULL, '2023-06-20 10:52:34', NULL, NULL),
(230, 'Room30345156', 'Game Winner', 135, '19', 940, 959, 'Cr', NULL, '2023-06-20 10:54:01', 16, 'game winner'),
(231, '27362014', 'BET', 135, '10', 1000, 990, 'Dr', NULL, '2023-06-20 11:03:06', NULL, NULL),
(232, '27362014', 'BET', 112, '10', 1000, 990, 'Dr', NULL, '2023-06-20 11:03:06', NULL, NULL),
(233, '27362014', 'Game Winner', 135, '18', 990, 1008, 'Cr', NULL, '2023-06-20 11:07:44', 17, 'exit from game'),
(234, '05224051', 'BET', 135, '10', 990, 980, 'Dr', NULL, '2023-06-20 11:34:11', NULL, NULL),
(235, '05224051', 'BET', 112, '10', 990, 980, 'Dr', NULL, '2023-06-20 11:34:11', NULL, NULL),
(236, '05224051', 'Game Winner', 135, '18', 980, 998, 'Cr', NULL, '2023-06-20 11:35:18', 18, 'exit from game'),
(237, 'Room64507332', 'BET', 112, '10', 980, 970, 'Dr', NULL, '2023-06-20 11:36:13', NULL, NULL),
(238, 'Room64507332', 'BET', 135, '10', 980, 970, 'Dr', NULL, '2023-06-20 11:36:14', NULL, NULL),
(239, 'Room64507332', 'Game Winner', 112, '18', 970, 988, 'Cr', NULL, '2023-06-20 11:37:07', 19, 'exit from game'),
(240, 'Room22381437', 'BET', 112, '10', 970, 960, 'Dr', NULL, '2023-06-20 11:52:56', NULL, NULL),
(241, 'Room22381437', 'BET', 135, '10', 970, 960, 'Dr', NULL, '2023-06-20 11:52:57', NULL, NULL),
(242, 'Room22381437', 'Game Winner', 135, '18', 960, 978, 'Cr', NULL, '2023-06-20 11:54:24', 20, 'exit from game'),
(243, 'Room60517069', 'BET', 112, '10', 960, 950, 'Dr', NULL, '2023-06-20 13:00:25', NULL, NULL),
(244, 'Room60517069', 'BET', 135, '10', 960, 950, 'Dr', NULL, '2023-06-20 13:00:26', NULL, NULL),
(245, 'Room60517069', 'Game Winner', 135, '18', 950, 968, 'Cr', NULL, '2023-06-20 13:01:11', 21, 'exit from game'),
(246, NULL, 'Coins Transfer to Vikram  ', 1, '1000', 101698, 100698, 'Dr', '202.53.69.164', '2023-06-20 15:27:44', NULL, NULL),
(247, NULL, 'Coins Transfer from Demo ', 139, '1000', 0, 1000, 'Cr', '202.53.69.164', '2023-06-20 15:27:44', NULL, NULL),
(248, NULL, 'Coins Transfer to ananth ', 1, '1000', 100698, 99698, 'Dr', '202.53.69.164', '2023-06-20 15:27:55', NULL, NULL),
(249, NULL, 'Coins Transfer from Demo ', 141, '1000', 0, 1000, 'Cr', '202.53.69.164', '2023-06-20 15:27:55', NULL, NULL),
(250, 'Room88754634', 'BET', 112, '0', 950, 950, 'Dr', NULL, '2023-06-20 15:35:02', NULL, NULL),
(251, 'Room65645734', 'BET', 112, '0', 950, 950, 'Dr', NULL, '2023-06-20 15:35:11', NULL, NULL),
(252, 'Room51103650', 'BET', 112, '0', 950, 950, 'Dr', NULL, '2023-06-20 15:35:23', NULL, NULL),
(253, NULL, 'Coins Transfer to Ananth  ', 1, '1000', 99698, 98698, 'Dr', '202.53.69.164', '2023-06-20 17:42:19', NULL, NULL),
(254, NULL, 'Coins Transfer from Demo ', 147, '1000', 0, 1000, 'Cr', '202.53.69.164', '2023-06-20 17:42:19', NULL, NULL),
(255, 'Room73616640', 'BET', 147, '10', 1000, 990, 'Dr', NULL, '2023-06-20 19:06:16', NULL, NULL),
(256, 'Room73616640', 'BET', 112, '10', 950, 940, 'Dr', NULL, '2023-06-20 19:06:16', NULL, NULL),
(257, 'Room73616640', 'BET', 139, '10', 1000, 990, 'Dr', NULL, '2023-06-20 19:06:17', NULL, NULL),
(258, 'Room73616640', 'BET', 135, '10', 950, 940, 'Dr', NULL, '2023-06-20 19:06:17', NULL, NULL),
(259, 'Room40834048', 'BET', 149, '0', 0, 0, 'Dr', NULL, '2023-06-21 14:05:48', NULL, NULL),
(260, 'Room38529433', 'BET', 150, '0', 0, 0, 'Dr', NULL, '2023-06-21 15:41:29', NULL, NULL),
(261, 'Room73616640', 'Game Exit', 139, '40', 990, 1030, 'Cr', NULL, '2023-06-21 17:49:24', 22, NULL),
(262, 'Room03992525', 'BET', 139, '10', 990, 980, 'Dr', NULL, '2023-06-21 17:55:04', NULL, NULL),
(263, 'Room03992525', 'BET', 147, '10', 990, 980, 'Dr', NULL, '2023-06-21 17:55:05', NULL, NULL),
(264, 'Room03992525', 'Game Winner', 139, '19', 980, 999, 'Cr', NULL, '2023-06-21 17:57:08', 23, 'game winner'),
(265, 'Room89507467', 'BET', 139, '10', 980, 970, 'Dr', NULL, '2023-06-21 18:25:02', NULL, NULL),
(266, 'Room89507467', 'BET', 147, '10', 980, 970, 'Dr', NULL, '2023-06-21 18:25:03', NULL, NULL),
(267, 'Room78171400', 'BET', 153, '0', 0, 0, 'Dr', NULL, '2023-06-22 20:12:20', NULL, NULL),
(268, 'Room94139195', 'BET', 152, '0', 0, 0, 'Dr', NULL, '2023-06-22 20:19:33', NULL, NULL),
(269, 'Room89507467', 'Game Winner', 147, '18', 970, 988, 'Cr', NULL, '2023-06-23 10:31:16', 24, 'exit from game'),
(270, NULL, 'Bonus Transfer to Pushpendra Kumar  ', 1, '20', 10051, 10031, 'Dr', '103.59.75.85', '2023-06-23 11:43:03', NULL, NULL),
(271, NULL, 'Bonus Transfer from Demo ', 154, '20', 0, 31, 'Cr', '103.59.75.85', '2023-06-23 11:43:03', NULL, NULL),
(272, 'Room50736733', 'BET', 154, '0', 0, 0, 'Dr', NULL, '2023-06-23 11:59:08', NULL, NULL),
(273, 'Room77823162', 'BET', 154, '0', 0, 0, 'Dr', NULL, '2023-06-23 12:00:37', NULL, NULL),
(274, 'Room67708170', 'BET', 153, '0', 0, 0, 'Dr', NULL, '2023-06-23 12:57:37', NULL, NULL),
(275, 'Room69473363', 'BET', 153, '0', 0, 0, 'Dr', NULL, '2023-06-23 13:40:23', NULL, NULL),
(276, NULL, 'Bonus Transfer to Pushpendra Kumar  ', 1, '100', 10051, 9951, 'Dr', '49.206.202.170', '2023-06-23 14:11:44', NULL, NULL),
(277, NULL, 'Bonus Transfer from Demo ', 154, '100', 0, 131, 'Cr', '49.206.202.170', '2023-06-23 14:11:44', NULL, NULL),
(278, NULL, 'Bonus Transfer to Sonali123 ', 1, '50', 10051, 10001, 'Dr', '49.206.202.170', '2023-06-23 14:12:17', NULL, NULL),
(279, NULL, 'Bonus Transfer from Demo ', 145, '50', 0, 60, 'Cr', '49.206.202.170', '2023-06-23 14:12:17', NULL, NULL),
(280, NULL, 'Bonus Transfer to Pushpendra Kumar  ', 1, '100', 10051, 9951, 'Dr', '103.59.75.85', '2023-06-23 15:27:40', NULL, NULL),
(281, NULL, 'Bonus Transfer from Demo ', 154, '100', 0, 231, 'Cr', '103.59.75.85', '2023-06-23 15:27:40', NULL, NULL),
(282, NULL, 'Coins Transfer to Revathi ', 135, '2', 940, 938, 'Dr', '49.206.202.170', '2023-06-23 16:30:39', NULL, NULL),
(283, NULL, 'Deposit Transfer from Goutham  ', 156, '2', 0, 2, 'Cr', '49.206.202.170', '2023-06-23 16:30:39', NULL, NULL),
(284, NULL, 'Winning Transfer to Revathi ', 135, '2', 72, 70, 'Dr', '49.206.202.170', '2023-06-23 16:39:08', NULL, NULL),
(285, NULL, 'Winning Transfer from Goutham  ', 156, '2', 0, 12, 'Cr', '49.206.202.170', '2023-06-23 16:39:08', NULL, NULL),
(286, NULL, 'Bonus Transfer to Revathi ', 153, '2', 10, 8, 'Dr', '49.206.202.170', '2023-06-23 16:41:32', NULL, NULL),
(287, NULL, 'Bonus Transfer from sk ', 156, '2', 2, 12, 'Cr', '49.206.202.170', '2023-06-23 16:41:32', NULL, NULL),
(288, 'Room69431843', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-24 00:10:08', NULL, NULL),
(289, NULL, 'Coins Transfer to Pushpendra Kumar  ', 1, '100', 98428, 98328, 'Dr', '103.59.75.85', '2023-06-24 13:40:10', NULL, NULL),
(290, NULL, 'Deposit Transfer from Demo ', 154, '100', 0, 100, 'Cr', '103.59.75.85', '2023-06-24 13:40:10', NULL, NULL),
(291, NULL, 'Bonus Transfer to Pushpendra Kumar  ', 1, '100', 10051, 9951, 'Dr', '103.59.75.85', '2023-06-24 13:41:18', NULL, NULL),
(292, NULL, 'Bonus Transfer from Demo ', 154, '100', 231, 331, 'Cr', '103.59.75.85', '2023-06-24 13:41:18', NULL, NULL),
(293, 'Room65561036', 'BET', 153, '0', 0, 0, 'Dr', NULL, '2023-06-26 11:20:36', NULL, NULL),
(294, 'Room59049066', 'BET', 154, '0', 100, 100, 'Dr', NULL, '2023-06-26 15:47:44', NULL, NULL),
(295, NULL, 'Coins Transfer to Sandeep ', 156, '1', 2, 1, 'Dr', '49.206.202.170', '2023-06-27 10:30:01', NULL, NULL),
(296, NULL, 'Deposit Transfer from Revathi ', 155, '1', 0, 1, 'Cr', '49.206.202.170', '2023-06-27 10:30:01', NULL, NULL),
(297, 'Room82689893', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-28 11:11:35', NULL, NULL),
(298, 'Room19334618', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-28 11:16:39', NULL, NULL),
(299, 'Room14792995', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-28 11:23:41', NULL, NULL),
(300, 'Room57466134', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-28 11:27:26', NULL, NULL),
(301, 'Room07884098', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-28 11:27:52', NULL, NULL),
(302, 'Room26445374', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-28 11:45:28', NULL, NULL),
(303, 'Room05232791', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-28 11:49:24', NULL, NULL),
(304, 'Room23318534', 'BET', 112, '0', 1015, 1015, 'Dr', NULL, '2023-06-28 11:50:58', NULL, NULL),
(305, 'Room02822612', 'BET', 112, '10', 1015, 1005, 'Dr', NULL, '2023-06-28 11:52:16', NULL, NULL),
(306, 'Room02822612', 'BET', 112, '10', 1005, 995, 'Dr', NULL, '2023-06-28 11:52:17', NULL, NULL),
(307, 'Room02822612', 'Game Winner', 112, '19', 995, 1014, 'Cr', NULL, '2023-06-28 11:53:31', 25, 'game winner'),
(308, 'Room93499664', 'BET', 112, '10', 995, 985, 'Dr', NULL, '2023-06-28 11:58:39', NULL, NULL),
(309, 'Room93499664', 'BET', 136, '10', 1000, 990, 'Dr', NULL, '2023-06-28 11:58:41', NULL, NULL),
(310, 'Room93499664', 'Game Winner', 136, '18', 990, 1008, 'Cr', NULL, '2023-06-28 11:58:57', 26, 'exit from game'),
(311, 'Room48301165', 'BET', 147, '10', 970, 960, 'Dr', NULL, '2023-06-28 12:13:15', NULL, NULL),
(312, 'Room48301165', 'BET', 112, '10', 985, 975, 'Dr', NULL, '2023-06-28 12:13:16', NULL, NULL),
(313, 'Room48301165', 'Game Winner', 147, '18', 960, 978, 'Cr', NULL, '2023-06-28 12:16:07', 27, 'exit from game'),
(314, 'Room52754061', 'BET', 147, '10', 960, 950, 'Dr', NULL, '2023-06-28 12:19:48', NULL, NULL),
(315, 'Room52754061', 'BET', 112, '10', 975, 965, 'Dr', NULL, '2023-06-28 12:19:48', NULL, NULL),
(316, 'Room52754061', 'Game Winner', 112, '19', 965, 984, 'Cr', NULL, '2023-06-28 12:21:17', 28, 'game winner'),
(317, 'Room82858405', 'BET', 112, '10', 965, 955, 'Dr', NULL, '2023-06-28 12:23:15', NULL, NULL),
(318, 'Room82858405', 'BET', 147, '10', 950, 940, 'Dr', NULL, '2023-06-28 12:23:16', NULL, NULL),
(319, 'Room82858405', 'Game Winner', 112, '19', 955, 974, 'Cr', NULL, '2023-06-28 12:24:41', 29, 'game winner'),
(320, 'Room15575795', 'BET', 112, '10', 955, 945, 'Dr', NULL, '2023-06-28 12:39:59', NULL, NULL),
(321, 'Room15575795', 'BET', 147, '10', 940, 930, 'Dr', NULL, '2023-06-28 12:40:00', NULL, NULL),
(322, 'Room15575795', 'Game Winner', 112, '19', 945, 964, 'Cr', NULL, '2023-06-28 12:41:06', 30, 'game winner'),
(323, 'Room41260308', 'BET', 147, '10', 930, 920, 'Dr', NULL, '2023-06-28 12:45:46', NULL, NULL),
(324, 'Room41260308', 'BET', 112, '10', 945, 935, 'Dr', NULL, '2023-06-28 12:45:47', NULL, NULL),
(325, 'Room41260308', 'Game Winner', 112, '18', 935, 953, 'Cr', NULL, '2023-06-28 12:55:35', 31, 'exit from game'),
(326, 'Room66018865', 'BET', 147, '10', 920, 910, 'Dr', NULL, '2023-06-28 12:55:49', NULL, NULL),
(327, 'Room66018865', 'BET', 112, '10', 935, 925, 'Dr', NULL, '2023-06-28 12:55:50', NULL, NULL),
(328, 'Room66018865', 'Game Winner', 112, '18', 925, 943, 'Cr', NULL, '2023-06-28 12:56:04', 32, 'exit from game'),
(329, 'Room95366161', 'BET', 112, '10', 925, 915, 'Dr', NULL, '2023-06-28 12:56:50', NULL, NULL),
(330, 'Room95366161', 'BET', 147, '10', 910, 900, 'Dr', NULL, '2023-06-28 12:56:50', NULL, NULL),
(331, 'Room95366161', 'Game Winner', 112, '18', 915, 933, 'Cr', NULL, '2023-06-28 13:00:30', 33, 'exit from game'),
(332, 'Room19749367', 'BET', 147, '10', 900, 890, 'Dr', NULL, '2023-06-28 13:01:04', NULL, NULL),
(333, 'Room19749367', 'BET', 112, '10', 915, 905, 'Dr', NULL, '2023-06-28 13:01:05', NULL, NULL),
(334, 'Room19749367', 'Game Winner', 112, '18', 905, 923, 'Cr', NULL, '2023-06-28 17:41:00', 34, 'exit from game'),
(335, 'Room89412629', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-28 17:41:03', NULL, NULL),
(336, 'Room04727489', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-28 17:53:09', NULL, NULL),
(337, 'Room81163941', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-28 18:42:37', NULL, NULL),
(338, 'Room01933715', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-28 18:45:11', NULL, NULL),
(339, 'Room90798841', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-28 18:46:26', NULL, NULL),
(340, 'Room85705517', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-28 18:48:44', NULL, NULL),
(341, 'Room77822023', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-28 18:53:34', NULL, NULL),
(342, 'Room24940378', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-28 18:56:05', NULL, NULL),
(343, 'Room88608005', 'BET', 147, '0', 890, 890, 'Dr', NULL, '2023-06-30 10:27:45', NULL, NULL),
(344, 'Room29084974', 'BET', 147, '10', 890, 880, 'Dr', NULL, '2023-06-30 10:38:51', NULL, NULL),
(345, 'Room29084974', 'BET', 112, '10', 905, 895, 'Dr', NULL, '2023-06-30 10:38:52', NULL, NULL),
(346, 'Room29084974', 'Game Winner', 147, '18', 880, 898, 'Cr', NULL, '2023-06-30 10:41:47', 35, 'exit from game'),
(347, 'Room48045085', 'BET', 112, '10', 895, 885, 'Dr', NULL, '2023-06-30 10:46:20', NULL, NULL),
(348, 'Room48045085', 'BET', 147, '10', 880, 870, 'Dr', NULL, '2023-06-30 10:46:20', NULL, NULL),
(349, 'Room48045085', 'Game Winner', 112, '18', 885, 903, 'Cr', NULL, '2023-06-30 10:46:43', 36, 'exit from game'),
(350, 'Room23783830', 'BET', 112, '10', 885, 875, 'Dr', NULL, '2023-06-30 10:47:18', NULL, NULL),
(351, 'Room23783830', 'BET', 147, '10', 870, 860, 'Dr', NULL, '2023-06-30 10:47:19', NULL, NULL),
(352, 'Room23783830', 'Game Winner', 147, '18', 860, 878, 'Cr', NULL, '2023-06-30 10:47:38', 37, 'exit from game'),
(353, 'Room68875877', 'BET', 147, '0', 860, 860, 'Dr', NULL, '2023-06-30 10:50:12', NULL, NULL),
(354, 'Room62876881', 'BET', 147, '10', 860, 850, 'Dr', NULL, '2023-06-30 10:58:20', NULL, NULL),
(355, 'Room62876881', 'BET', 112, '10', 875, 865, 'Dr', NULL, '2023-06-30 10:58:21', NULL, NULL),
(356, 'Room62876881', 'Game Winner', 112, '18', 865, 883, 'Cr', NULL, '2023-06-30 11:06:55', 38, 'exit from game'),
(357, 'Room28269843', 'BET', 147, '10', 850, 840, 'Dr', NULL, '2023-06-30 11:07:05', NULL, NULL),
(358, 'Room28269843', 'BET', 112, '10', 865, 855, 'Dr', NULL, '2023-06-30 11:07:06', NULL, NULL),
(359, 'Room28269843', 'Game Winner', 147, '18', 840, 858, 'Cr', NULL, '2023-06-30 11:07:47', 39, 'exit from game'),
(360, 'Room48303457', 'BET', 112, '10', 855, 845, 'Dr', NULL, '2023-06-30 11:10:15', NULL, NULL),
(361, 'Room48303457', 'BET', 147, '10', 840, 830, 'Dr', NULL, '2023-06-30 11:10:16', NULL, NULL),
(362, 'Room48303457', 'Game Winner', 147, '18', 830, 848, 'Cr', NULL, '2023-06-30 11:16:13', 40, 'exit from game'),
(363, 'Room05564366', 'BET', 147, '10', 830, 820, 'Dr', NULL, '2023-06-30 11:16:23', NULL, NULL),
(364, 'Room05564366', 'BET', 112, '10', 845, 835, 'Dr', NULL, '2023-06-30 11:16:24', NULL, NULL),
(365, 'Room05564366', 'Game Winner', 147, '18', 820, 838, 'Cr', NULL, '2023-06-30 11:19:30', 41, 'exit from game'),
(366, 'Room05975909', 'BET', 112, '10', 835, 825, 'Dr', NULL, '2023-06-30 11:19:57', NULL, NULL),
(367, 'Room05975909', 'BET', 147, '10', 820, 810, 'Dr', NULL, '2023-06-30 11:19:58', NULL, NULL),
(368, 'Room05975909', 'Game Winner', 147, '19', 810, 829, 'Cr', NULL, '2023-06-30 11:20:39', 42, 'game winner'),
(369, 'Room87810994', 'BET', 147, '10', 810, 800, 'Dr', NULL, '2023-06-30 11:22:29', NULL, NULL),
(370, 'Room87810994', 'BET', 112, '10', 825, 815, 'Dr', NULL, '2023-06-30 11:22:30', NULL, NULL),
(371, 'Room87810994', 'Game Winner', 112, '18', 815, 833, 'Cr', NULL, '2023-06-30 11:22:55', 43, 'exit from game'),
(372, 'Room94985750', 'BET', 147, '10', 800, 790, 'Dr', NULL, '2023-06-30 11:23:31', NULL, NULL),
(373, 'Room94985750', 'BET', 112, '10', 815, 805, 'Dr', NULL, '2023-06-30 11:23:32', NULL, NULL),
(374, 'Room94985750', 'Game Winner', 112, '18', 805, 823, 'Cr', NULL, '2023-06-30 11:24:14', 44, 'exit from game'),
(375, 'Room05851513', 'BET', 147, '10', 790, 780, 'Dr', NULL, '2023-06-30 11:33:47', NULL, NULL),
(376, 'Room05851513', 'BET', 112, '10', 805, 795, 'Dr', NULL, '2023-06-30 11:33:48', NULL, NULL),
(377, 'Room05851513', 'Game Winner', 112, '18', 795, 813, 'Cr', NULL, '2023-06-30 11:34:24', 45, 'exit from game'),
(378, 'Room16466971', 'BET', 147, '10', 780, 770, 'Dr', NULL, '2023-06-30 11:39:39', NULL, NULL),
(379, 'Room16466971', 'BET', 112, '10', 795, 785, 'Dr', NULL, '2023-06-30 11:39:40', NULL, NULL),
(380, 'Room16466971', 'Game Winner', 147, '18', 770, 788, 'Cr', NULL, '2023-06-30 11:39:44', 46, 'exit from game'),
(381, 'Room72985289', 'BET', 112, '10', 785, 775, 'Dr', NULL, '2023-06-30 11:40:19', NULL, NULL),
(382, 'Room72985289', 'BET', 147, '10', 770, 760, 'Dr', NULL, '2023-06-30 11:40:20', NULL, NULL),
(383, 'Room72985289', 'Game Winner', 112, '18', 775, 793, 'Cr', NULL, '2023-06-30 11:40:48', 47, 'exit from game'),
(384, 'Room25019550', 'BET', 147, '0', 760, 760, 'Dr', NULL, '2023-06-30 11:49:20', NULL, NULL),
(385, 'Room29032681', 'BET', 147, '0', 760, 760, 'Dr', NULL, '2023-06-30 11:50:53', NULL, NULL),
(386, 'Room46404645', 'BET', 157, '0', 0, 0, 'Dr', NULL, '2023-07-01 15:36:17', NULL, NULL),
(387, 'Room41535513', 'BET', 157, '0', 0, 0, 'Dr', NULL, '2023-07-01 16:21:08', NULL, NULL),
(388, 'Room68878305', 'BET', 157, '0', 0, 0, 'Dr', NULL, '2023-07-03 16:22:12', NULL, NULL),
(389, 'Room52945183', 'BET', 157, '0', 0, 0, 'Dr', NULL, '2023-07-03 16:24:06', NULL, NULL),
(390, 'Room51022344', 'BET', 158, '0', 0, 0, 'Dr', NULL, '2023-07-04 12:16:49', NULL, NULL),
(391, 'Room26097331', 'BET', 158, '0', 0, 0, 'Dr', NULL, '2023-07-04 12:20:28', NULL, NULL),
(392, 'Room44605249', 'BET', 160, '0', 0, 0, 'Dr', NULL, '2023-07-04 21:33:13', NULL, NULL),
(393, 'Room12248417', 'BET', 112, '0', 785, 785, 'Dr', NULL, '2023-07-05 10:37:13', NULL, NULL),
(394, 'Room31120252', 'BET', 147, '10', 760, 750, 'Dr', NULL, '2023-07-05 12:06:45', NULL, NULL),
(395, 'Room31120252', 'BET', 112, '10', 785, 775, 'Dr', NULL, '2023-07-05 12:06:46', NULL, NULL),
(396, 'Room31120252', 'Game Winner', 112, '18', 775, 793, 'Cr', NULL, '2023-07-05 12:06:58', 48, 'exit from game'),
(397, 'Room65509078', 'BET', 147, '0', 750, 750, 'Dr', NULL, '2023-07-05 16:19:58', NULL, NULL),
(398, NULL, 'Coins Transfer to maa ', 1, '200', 98328, 98128, 'Dr', '49.206.202.170', '2023-07-05 16:32:46', NULL, NULL),
(399, NULL, 'Deposit Transfer from Demo ', 163, '200', 25, 225, 'Cr', '49.206.202.170', '2023-07-05 16:32:46', NULL, NULL),
(400, '21545685', 'BET', 112, '10', 775, 765, 'Dr', NULL, '2023-07-06 16:47:04', NULL, NULL),
(401, '21545685', 'BET', 112, '10', 765, 755, 'Dr', NULL, '2023-07-06 16:47:05', NULL, NULL),
(402, '21545685', 'Game Winner', 112, '19', 755, 774, 'Cr', NULL, '2023-07-06 16:47:09', 49, 'game winner'),
(403, '80009440', 'BET', 112, '10', 755, 745, 'Dr', NULL, '2023-07-06 16:47:33', NULL, NULL),
(404, '80009440', 'BET', 112, '10', 745, 735, 'Dr', NULL, '2023-07-06 16:47:34', NULL, NULL),
(405, '80009440', 'Game Winner', 112, '19', 735, 754, 'Cr', NULL, '2023-07-06 16:47:38', 50, 'game winner'),
(406, 'Room33821042', 'BET', 112, '10', 735, 725, 'Dr', NULL, '2023-07-06 17:36:30', NULL, NULL),
(407, 'Room33821042', 'BET', 112, '10', 725, 715, 'Dr', NULL, '2023-07-06 17:36:31', NULL, NULL),
(408, 'Room14388054', 'BET', 112, '0', 715, 715, 'Dr', NULL, '2023-07-10 10:30:15', NULL, NULL),
(409, 'Room01416358', 'BET', 112, '0', 715, 715, 'Dr', NULL, '2023-07-10 10:30:28', NULL, NULL),
(410, 'Room84099869', 'BET', 135, '0', 938, 938, 'Dr', NULL, '2023-07-10 16:58:01', NULL, NULL),
(411, 'Room06182968', 'BET', 165, '0', 0, 0, 'Dr', NULL, '2023-07-11 11:11:46', NULL, NULL),
(412, 'Room11623646', 'BET', 165, '0', 0, 0, 'Dr', NULL, '2023-07-11 11:15:53', NULL, NULL),
(413, 'Room19553808', 'BET', 165, '0', 0, 0, 'Dr', NULL, '2023-07-11 11:21:44', NULL, NULL),
(414, 'Room41432582', 'BET', 165, '0', 0, 0, 'Dr', NULL, '2023-07-11 12:40:41', NULL, NULL),
(415, 'Room08357704', 'BET', 135, '0', 938, 938, 'Dr', NULL, '2023-07-12 11:17:26', NULL, NULL),
(416, '39103340', 'BET', 135, '10', 963, 953, 'Dr', NULL, '2023-07-12 11:28:12', NULL, NULL),
(417, '39103340', 'BET', 112, '10', 715, 705, 'Dr', NULL, '2023-07-12 11:28:14', NULL, NULL),
(418, '39103340', 'Game Winner', 135, '18', 953, 971, 'Cr', NULL, '2023-07-12 11:28:21', 51, 'exit from game'),
(419, 'Room78977558', 'BET', 112, '10', 705, 695, 'Dr', NULL, '2023-07-12 11:51:28', NULL, NULL),
(420, 'Room78977558', 'BET', 135, '10', 953, 943, 'Dr', NULL, '2023-07-12 11:51:29', NULL, NULL),
(421, 'Room78977558', 'Game Winner', 112, '18', 695, 713, 'Cr', NULL, '2023-07-12 11:51:39', 52, 'exit from game'),
(422, 'Room82461644', 'BET', 135, '10', 943, 933, 'Dr', NULL, '2023-07-12 11:52:34', NULL, NULL),
(423, 'Room82461644', 'BET', 112, '10', 695, 685, 'Dr', NULL, '2023-07-12 11:52:35', NULL, NULL),
(424, 'Room82461644', 'Game Winner', 112, '18', 685, 703, 'Cr', NULL, '2023-07-12 11:52:37', 53, 'exit from game'),
(425, 'Room27086219', 'BET', 112, '10', 685, 675, 'Dr', NULL, '2023-07-12 11:54:17', NULL, NULL),
(426, 'Room27086219', 'BET', 135, '10', 933, 923, 'Dr', NULL, '2023-07-12 11:54:18', NULL, NULL),
(427, 'Room27086219', 'Game Winner', 135, '18', 923, 941, 'Cr', NULL, '2023-07-12 11:54:31', 54, 'exit from game'),
(428, 'Room54138848', 'BET', 112, '0', 675, 675, 'Dr', NULL, '2023-07-13 15:31:42', NULL, NULL),
(429, 'Room83003936', 'BET', 112, '0', 675, 675, 'Dr', NULL, '2023-07-13 15:32:04', NULL, NULL),
(430, 'Room57333051', 'BET', 168, '0', 0, 0, 'Dr', NULL, '2023-07-13 19:50:57', NULL, NULL),
(431, 'Room38752887', 'BET', 168, '0', 0, 0, 'Dr', NULL, '2023-07-13 20:00:40', NULL, NULL),
(432, 'Room48898387', 'BET', 169, '0', 0, 0, 'Dr', NULL, '2023-07-14 20:06:25', NULL, NULL),
(433, 'Room34969716', 'BET', 169, '0', 0, 0, 'Dr', NULL, '2023-07-15 10:57:06', NULL, NULL),
(434, 'Room81472065', 'BET', 166, '0', 0, 0, 'Dr', NULL, '2023-07-15 12:30:25', NULL, NULL),
(435, 'Room04958019', 'BET', 154, '0', 100, 100, 'Dr', NULL, '2023-07-15 12:34:50', NULL, NULL),
(436, 'Room49493762', 'BET', 112, '0', 675, 675, 'Dr', NULL, '2023-07-15 13:52:28', NULL, NULL),
(437, 'Room92852765', 'BET', 112, '0', 675, 675, 'Dr', NULL, '2023-07-15 14:14:47', NULL, NULL),
(438, 'Room96571200', 'BET', 112, '0', 675, 675, 'Dr', NULL, '2023-07-15 14:29:13', NULL, NULL),
(439, 'Room72608325', 'BET', 112, '0', 675, 675, 'Dr', NULL, '2023-07-15 14:36:07', NULL, NULL),
(440, 'Room15639012', 'BET', 112, '0', 675, 675, 'Dr', NULL, '2023-07-15 15:41:47', NULL, NULL),
(441, 'Room33661114', 'BET', 173, '0', 0, 0, 'Dr', NULL, '2023-07-17 14:12:59', NULL, NULL),
(442, 'Room79220204', 'BET', 175, '0', 0, 0, 'Dr', NULL, '2023-07-17 16:21:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `tournament` enum('0','1') NOT NULL DEFAULT '0',
  `pid` int(11) DEFAULT '0',
  `role` varchar(250) DEFAULT NULL,
  `coins` int(11) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `bonus` int(11) NOT NULL DEFAULT '0',
  `winning_amount` int(11) NOT NULL DEFAULT '0',
  `email` varchar(256) DEFAULT NULL,
  `mobile` varchar(256) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `profilepic` text,
  `token` varchar(256) NOT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `refer` varchar(256) DEFAULT 'NO',
  `status` int(11) NOT NULL,
  `registerd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `refercode` varchar(256) DEFAULT NULL,
  `otp` int(10) UNSIGNED DEFAULT NULL,
  `otp_verified` enum('verified','not_verified') NOT NULL DEFAULT 'not_verified',
  `disable_reason` text,
  `fb_id` varchar(255) NOT NULL,
  `socailLoginId` varchar(255) NOT NULL,
  `device_id` varchar(100) DEFAULT NULL,
  `refer_id` int(11) NOT NULL,
  `ip_address` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `tournament`, `pid`, `role`, `coins`, `points`, `bonus`, `winning_amount`, `email`, `mobile`, `dob`, `password`, `profilepic`, `token`, `lastlogin`, `refer`, `status`, `registerd`, `refercode`, `otp`, `otp_verified`, `disable_reason`, `fb_id`, `socailLoginId`, `device_id`, `refer_id`, `ip_address`) VALUES
(1, 'Demo', '0', 0, 'Admin', 98128, 0, 9951, 0, 'demo@ludo.com', '1234567891', NULL, 'vizag@123', 'https://homieludo.com/img/profiles/1595485324.png', '2ba7d487e790e7a3a3af328783e5aa6c', '2020-04-04 08:49:36', 'NO', 1, '2020-06-05 10:27:05', NULL, 1234, 'verified', NULL, '', '', NULL, 0, ''),
(175, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk@7181gmail.com', '1233561237', NULL, 'satyamsatyam', 'https://colormoon.in/sklite/img/profiles/avatar10.png', '0214cb2d340df8a377878286f4e52144', NULL, 'NO', 1, '2023-07-17 16:20:03', '61507201', NULL, 'verified', NULL, '', '', NULL, 0, '223.235.45.224'),
(174, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk1881@gmail.com', '7254124261', NULL, 'satyamsatyam', 'https://colormoon.in/sklite/img/profiles/avatar8.png', '6a3f1510e7f92292951c1bc0781d5d2b', NULL, 'NO', 1, '2023-07-17 16:18:30', '0D114948', 1234, 'not_verified', NULL, '', '', NULL, 0, '223.235.45.224'),
(173, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk726@gmail.com', '7254814262', NULL, 'satyam123', 'https://colormoon.in/sklite/img/profiles/avatar12.png', '3ffbe7a9562f7b2237830439d3f175b5', '2023-07-17 14:16:05', 'NO', 1, '2023-07-17 14:11:39', 'B517F3A9', NULL, 'verified', NULL, '', '', NULL, 0, '223.235.45.224'),
(172, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk811@gmail.com', '1234561237', NULL, 'satyamsatyam', 'https://colormoon.in/sklite/img/profiles/avatar4.png', 'd99155c4adda233a5b7e63858eb086b3', NULL, 'NO', 1, '2023-07-17 14:09:58', '60CC245F', 1234, 'not_verified', NULL, '', '', NULL, 0, '223.235.45.224'),
(171, 'ak', '0', NULL, '0', 0, 0, 10, 0, 'ak@gmail.com', '1231231238', NULL, 'satyam12345', 'https://colormoon.in/sklite/img/profiles/avatar3.png', 'a8ac97e3d8d2923a45d792c29381a473', '2023-07-15 14:31:50', 'NO', 1, '2023-07-15 14:28:16', '18D7D658', NULL, 'verified', NULL, '', '', NULL, 0, '106.76.232.171'),
(170, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'skg@1gmail.com', '1231231235', NULL, '12345123450', 'https://colormoon.in/sklite/img/profiles/avatar21.png', '0753910686e696cb04f75b516f801e5f', NULL, 'NO', 1, '2023-07-15 14:26:30', 'D792A1DE', 1234, 'not_verified', NULL, '', '', NULL, 0, '106.76.232.171'),
(169, 'AbC', '0', NULL, '0', 0, 0, 10, 0, 'abc@gmail.com', '1234361234', '', 'aaaaaaaa', 'https://colormoon.in/sklite/img/profiles/avatar2.png', 'eece9e9cce3efce36ddfd26c3ec22239', '2023-07-15 10:46:42', 'NO', 1, '2023-07-14 20:01:08', '3F352C6F', NULL, 'verified', NULL, '', '', NULL, 0, '106.76.248.117'),
(168, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk151@gmail.com', '1211211212', '', '1234567890', 'https://colormoon.in/sklite/img/profiles/avatar4.png', 'cf551849c284578f857bf3f072a0b908', '2023-07-13 19:56:42', 'NO', 1, '2023-07-13 19:49:35', 'D33DEDF5', NULL, 'verified', NULL, '', '', NULL, 0, '106.76.248.54'),
(166, 'test', '0', NULL, '0', 0, 0, 10, 0, 'test@gmail.com', '7816064658', NULL, 'Sonali@123', 'https://colormoon.in/sklite/img/profiles/avatar10.png', '411d80b06ac8fd0ed0ac4c4b7b1e2282', '2023-07-15 12:28:51', 'NO', 1, '2023-07-12 10:58:35', '46EDFDE7', 1234, 'not_verified', NULL, '', '', NULL, 0, '202.53.69.164'),
(165, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk51@gmail.com', '1234567843', '', '123456789', 'https://colormoon.in/sklite/img/profiles/avatar21.png', 'c21c359acf8feef6bc539e2272800140', '2023-07-13 19:44:26', 'NO', 1, '2023-07-11 11:04:28', 'BDCA39CA', NULL, 'verified', NULL, '', '', NULL, 0, '106.76.220.244'),
(164, 'avinash', '0', NULL, '0', 0, 0, 10, 0, 'arss@gmail.com', '1231231230', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar14.png', 'cf4ff237bf127d2bcdee1128275fa16b', NULL, 'NO', 1, '2023-07-05 11:12:25', '4625EC7C', NULL, 'verified', NULL, '', '', NULL, 0, '202.53.69.164'),
(163, 'maa', '0', NULL, '0', 500, 0, 10, 0, 'maa@gmail.com', '1472583690', '', '123456789', 'https://colormoon.in/sklite/img/profiles/avatar13.png', '65230c9160e0846d3728fadc33f45617', '2023-07-06 15:07:35', 'NO', 1, '2023-07-05 11:08:36', '61483D74', NULL, 'verified', NULL, '', '', NULL, 0, '202.53.69.164'),
(162, 'mani', '0', NULL, '0', 0, 0, 10, 0, 'mani@gmail.com', '9090909090', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar9.png', 'e92e3b582e04dd8749082289cf55b4dc', '2023-07-05 10:54:59', 'NO', 1, '2023-07-05 10:50:17', '8423AE29', NULL, 'verified', NULL, '', '', NULL, 0, '202.53.69.164'),
(157, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk@8181gmail.com', '1234561234', '', '123123123', 'https://colormoon.in/sklite/img/profiles/avatar11.png', '3fa3e7866827afe857ff704c6d086228', '2023-07-03 16:28:16', 'NO', 1, '2023-07-01 15:34:13', '5B66B704', NULL, 'verified', NULL, '', '', NULL, 0, '106.76.232.181'),
(161, 'sonali', '0', NULL, '0', 0, 0, 10, 0, 'sonu@gmail.com', '8888888888', NULL, 'Sonali@123', 'https://colormoon.in/sklite/img/profiles/avatar16.png', '57efdaf8d350046be3c76bbc25ec5f9e', NULL, 'NO', 1, '2023-07-05 10:46:07', 'A4BAF462', NULL, 'verified', NULL, '', '', NULL, 0, '202.53.69.164'),
(135, 'Goutham ', '0', NULL, '0', 923, 0, -2, 108, 'goutham@gmail.com', '9493135323', NULL, '12345678', 'https://colormoon.in/sklite/img/profiles/avatar14.png', '807371c75b69bf760e78764a25087d74', '2023-07-13 12:00:13', 'NO', 1, '2023-06-20 10:41:16', 'BC1BB5D3', 1234, 'verified', NULL, '', '', NULL, 0, '115.246.192.21'),
(158, 'skkk', '0', NULL, '0', 0, 0, 10, 0, 'sklk@gmail.com', '1234567898', '', '12345678', 'https://colormoon.in/sklite/img/profiles/avatar12.png', 'e1af0fe706f6cacbd53d7cae375b8ab1', '2023-07-04 12:39:33', 'NO', 1, '2023-07-03 16:29:29', '0E806C2A', NULL, 'verified', NULL, '', '', NULL, 0, '106.76.232.172'),
(159, 'bhupesh', '0', NULL, '0', 0, 0, 10, 0, 'bhupeshtkathuria@gmail.com', '9643633577', NULL, '12345678', 'https://colormoon.in/sklite/img/profiles/avatar3.png', 'f43513ad7f1947d02e1241a153cff103', NULL, 'NO', 1, '2023-07-04 12:40:58', 'E1D667DB', NULL, 'verified', NULL, '', '', NULL, 0, '103.62.238.194'),
(160, 'qyqu', '0', NULL, '0', 525, 0, 10, 0, 'naajj@email.ana', '1231231231', NULL, '123123123', 'https://colormoon.in/sklite/img/profiles/avatar4.png', '59bb7ea1a3e60baa9abc4dbb8a6df17d', '2023-07-06 14:23:09', 'NO', 1, '2023-07-04 20:20:27', 'C4949A9D', NULL, 'verified', NULL, '', '', NULL, 0, '106.76.249.169'),
(156, 'Revathi', '0', NULL, '0', 1, 0, 12, 12, 'revathi@gmail.com', '9398780995', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar8.png', '70ed27a923fa1d33b7028b4cc0ba4a17', NULL, 'NO', 1, '2023-06-23 10:42:09', 'E7B4D46B', NULL, 'verified', NULL, '', '', NULL, 147, '49.206.202.170'),
(155, 'Sandeep', '0', NULL, '0', 1, 0, 11, 0, 'sandeep@gmail.com', '8985882557', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar22.png', 'd1e192ee042dd1ea757559e1f1275076', NULL, 'NO', 1, '2023-06-23 10:32:22', '43E17CAB', NULL, 'verified', NULL, '', '', NULL, 147, '49.206.202.170'),
(152, 'abcd ', '0', NULL, '0', 0, 0, 10, 0, 'abcd@gmail.com', '6816064658', NULL, 'Sonali@123', 'https://colormoon.in/sklite/img/profiles/avatar9.png', '17cc6f7ba5ec813a147a59dba8e85e02', '2023-06-23 15:45:06', 'NO', 1, '2023-06-22 19:02:32', '6B6F6A7A', NULL, 'verified', NULL, '', '', NULL, 0, '49.206.202.170'),
(153, 'sk', '0', NULL, '0', 0, 0, 8, 0, 'sk123@gmail.com', '7254814264', NULL, '1234512345', 'https://colormoon.in/sklite/img/profiles/avatar3.png', '9303dfe792a511174b94a9263a93dc9a', '2023-06-26 11:18:28', 'NO', 1, '2023-06-22 20:08:27', '3AE1CE2A', NULL, 'verified', NULL, '', '', NULL, 0, '152.58.187.9'),
(154, 'Pushpendra Kumar', '0', NULL, '0', 100, 0, 331, 0, 'pushpendra@thecolourmoon.com', '9490036767', '', '12345678', 'https://colormoon.in/sklite/img/profiles/avatar14.png', '9cc5cdbaf7aad1beae0cc235bb9e9b60', '2023-07-15 12:48:03', 'NO', 1, '2023-06-23 10:26:35', 'EE798ECD', NULL, 'verified', NULL, '', '', NULL, 0, '103.59.75.85'),
(151, '123', '0', NULL, '0', 0, 0, 10, 0, '123@gmail.com', '1234567895', NULL, '123123123', 'https://colormoon.in/sklite/img/profiles/avatar1.png', '51d4ddafff4af47d2db4068d71b03515', '2023-06-22 15:56:55', 'NO', 1, '2023-06-21 20:07:37', '4EDCC7E7', NULL, 'verified', NULL, '', '', NULL, 0, '152.58.188.236'),
(150, '**', '0', NULL, '0', 0, 0, 10, 0, 'a@gmail.com', '0000000000', NULL, '0000000000', 'https://colormoon.in/sklite/img/profiles/avatar12.png', '30bbea8f4440b8c2b5691dcd5569e3db', '2023-06-21 20:06:42', 'NO', 1, '2023-06-21 15:27:24', 'C0B1C4B2', NULL, 'verified', NULL, '', '', NULL, 0, '152.58.188.180'),
(149, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk@gmail.com', '9931956473', NULL, '123123123', 'https://colormoon.in/sklite/img/profiles/avatar12.png', 'cd5523900be22c3ad6fe47e2a63b455b', '2023-06-22 20:06:15', 'NO', 1, '2023-06-20 19:15:24', '23497D19', 1234, 'not_verified', NULL, '', '', NULL, 0, '152.58.188.203'),
(146, 'Sonali', '0', NULL, '0', 0, 0, 10, 0, 'sonalo@gmail.com', '1234567890', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar21.png', 'e19bc2b61680baa487fe3032e232a838', NULL, 'NO', 1, '2023-06-20 15:35:41', 'DF79964B', 1234, 'not_verified', NULL, '', '', NULL, 135, '49.206.202.170'),
(139, 'Vikram ', '0', NULL, '0', 970, 0, 0, 59, 'Vikram@gmil.com', '8790363665', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar7.png', 'e60808341994558f9886bd67f2450d7c', '2023-06-23 10:31:11', 'NO', 1, '2023-06-20 15:21:00', 'E4EC370F', NULL, 'verified', NULL, '', '', NULL, 0, '115.246.192.21'),
(145, 'Sonali123', '0', NULL, '0', 0, 0, 60, 0, 'sonali@gmail.com', '1234567899', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar8.png', 'd825bf0870b33773e3d49d4486f733f0', NULL, 'NO', 1, '2023-06-20 15:32:27', '01FACE60', 1234, 'not_verified', NULL, '', '', NULL, 144, '49.206.202.170'),
(147, 'Ananth ', '0', NULL, '0', 750, 0, 10, 163, 'ananth@123.com', '1122335544', NULL, '1234567890', 'https://colormoon.in/sklite/img/profiles/avatar12.png', 'bee8a1b1b719ca1ef38f77ad4cb73f4d', '2023-07-05 16:21:57', 'NO', 1, '2023-06-20 17:37:33', '6BB298AC', NULL, 'verified', NULL, '', '', NULL, 0, '115.246.192.21'),
(148, 'Demo', '0', 0, NULL, 0, 0, 0, 0, '', '7254814260', NULL, '2023-06-20 19:13:04', 'https://colormoon.in/sklite/img/profile.jpg', '045f6d80105012939cf59d4b5999b3ea', '2023-07-15 12:29:34', 'NO', 1, '2023-06-20 19:13:04', '39CDA6BA', 1234, 'not_verified', NULL, '', '', '', 0, ''),
(141, 'ananth', '0', NULL, '0', 1000, 0, 0, 0, 'ananth@gmail.com', '1122334455', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar7.png', '2d33eb4f41dde7daaabc1aa9547a059a', '2023-06-20 17:34:55', 'NO', 0, '2023-06-20 15:24:21', '9E010905', 1234, 'verified', '', '', '', NULL, 0, '202.53.69.164'),
(137, 'shaik', '0', NULL, '0', 0, 0, 0, 0, 'shaik@gmail.com', '9490671352', NULL, '123456789', 'https://colormoon.in/sklite/img/profiles/avatar3.png', 'ae36afb412f1d66d2de8f49b1ac1e6e6', '2023-06-20 15:17:45', 'NO', 1, '2023-06-20 15:14:09', '4620FF0A', NULL, 'verified', NULL, '', '', NULL, 0, '49.206.202.170'),
(136, 'SarathArs', '0', NULL, '0', 990, 0, 0, 18, 'sarath@colourmoon.com', '9398438311', NULL, '12345678', 'https://colormoon.in/sklite/img/profiles/avatar4.png', '95c8f239b4b05a47d5dd0b6e95c063bf', '2023-06-28 11:58:55', 'NO', 1, '2023-06-20 11:48:04', '73EF3531', 1234, 'not_verified', NULL, '', '', NULL, 0, '115.246.192.21'),
(112, 'Sarath', '0', NULL, '0', 675, 0, 0, 448, 'sarath@gmail.com', '9951980724', '', 'sarath1234', 'https://colormoon.in/sklite/img/profiles/avatar2.png', '3d5b4ecbb44fa6f8a16b8c2ade83086c', '2023-07-17 17:49:53', 'NO', 1, '2023-06-08 16:42:11', '39FA4AD8', 1234, 'verified', NULL, '', '', NULL, 0, '49.206.202.170'),
(167, 'sk', '0', NULL, '0', 0, 0, 10, 0, 'sk121@gmail.com', '1211211211', NULL, '1234567890', 'https://colormoon.in/sklite/img/profiles/avatar11.png', 'aeb44910d508ad22ea19ccc5e7424fc0', '2023-07-13 19:48:48', 'NO', 1, '2023-07-13 19:45:22', '749B0D56', 1234, 'not_verified', NULL, '', '', NULL, 0, '106.76.248.54');

-- --------------------------------------------------------

--
-- Table structure for table `user_games`
--

CREATE TABLE `user_games` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `gameid` varchar(15) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_games`
--

INSERT INTO `user_games` (`id`, `userid`, `gameid`, `created_date`) VALUES
(1, 12, 'Room05161445', '2023-05-09 23:00:55'),
(2, 12, 'Room05161445', '2023-05-09 23:01:22'),
(3, 12, 'Room05161445', '2023-05-09 23:01:25'),
(4, 12, 'Room82042781', '2023-05-10 11:37:34'),
(5, 8, 'Room64886327', '2023-05-10 11:44:49'),
(6, 12, 'Room16775339', '2023-05-11 23:55:23'),
(7, 12, 'Room16775339', '2023-05-11 23:59:32'),
(8, 12, 'Room16775339', '2023-05-11 23:59:55'),
(9, 12, 'Room16775339', '2023-05-12 00:00:16'),
(10, 18, 'Room77004626', '2023-05-13 14:41:05'),
(11, 19, 'Room67645106', '2023-05-18 15:44:20'),
(12, 19, 'Room67645106', '2023-05-18 15:44:30'),
(13, 19, 'Room67645106', '2023-05-18 15:44:30'),
(14, 19, 'Room67645106', '2023-05-18 15:44:33'),
(15, 19, 'Room67645106', '2023-05-18 15:44:49'),
(16, 19, 'Room67645106', '2023-05-18 15:45:22'),
(17, 19, 'Room67645106', '2023-05-18 15:45:25'),
(18, 19, 'Room67645106', '2023-05-18 15:45:46'),
(19, 19, 'Room67645106', '2023-05-18 15:45:54'),
(20, 19, 'Room67645106', '2023-05-18 15:46:18'),
(21, 19, 'Room67645106', '2023-05-18 15:46:24'),
(22, 19, 'Room67645106', '2023-05-18 15:46:38'),
(23, 19, 'Room67645106', '2023-05-18 15:46:51'),
(24, 19, 'Room67645106', '2023-05-18 15:47:19'),
(25, 19, 'Room67645106', '2023-05-18 15:47:27'),
(26, 17, 'Room72682297', '2023-05-20 10:41:42'),
(27, 22, 'Room04131603', '2023-05-20 13:25:48'),
(28, 22, 'Room04131603', '2023-05-20 13:25:51'),
(29, 19, 'Room03674443', '2023-05-20 15:15:03'),
(30, 18, 'Room39467181', '2023-05-22 20:57:24'),
(31, 18, 'Room39467181', '2023-05-22 20:57:40'),
(32, 18, 'Room39467181', '2023-05-22 20:58:13'),
(33, 18, 'Room76576030', '2023-05-22 22:04:09'),
(34, 18, 'Room98349635', '2023-05-22 22:06:08'),
(35, 18, 'Room05822855', '2023-05-22 23:50:12'),
(36, 2, 'Room40407623', '2023-05-24 15:32:25'),
(37, 12, 'Room15733366', '2023-05-30 15:23:42'),
(38, 34, 'Room90267457', '2023-06-02 20:45:21'),
(39, 34, 'Room44001181', '2023-06-02 21:30:04'),
(40, 34, 'Room44001181', '2023-06-02 21:30:11'),
(41, 34, 'Room44001181', '2023-06-02 21:30:26'),
(42, 61, 'Room63955875', '2023-06-06 11:28:55'),
(43, 61, 'Room63955875', '2023-06-06 11:29:44'),
(44, 62, 'Room05011396', '2023-06-06 11:42:17'),
(45, 62, 'Room05011396', '2023-06-06 11:42:21'),
(46, 62, 'Room05011396', '2023-06-06 11:42:28'),
(47, 62, 'Room52215583', '2023-06-06 11:49:49'),
(48, 60, 'Room81836337', '2023-06-06 14:58:18'),
(49, 60, 'Room55823425', '2023-06-06 15:47:05'),
(50, 60, 'Room55823425', '2023-06-06 15:47:25'),
(51, 60, 'Room55823425', '2023-06-06 15:47:28'),
(52, 60, 'Room66630530', '2023-06-06 15:55:19'),
(53, 60, 'Room66064756', '2023-06-06 17:30:20'),
(54, 60, 'Room66064756', '2023-06-06 17:30:24'),
(55, 60, 'Room08266094', '2023-06-06 17:32:00'),
(56, 60, 'Room08266094', '2023-06-06 17:32:01'),
(57, 60, 'Room08266094', '2023-06-06 17:32:07'),
(58, 60, 'Room00601043', '2023-06-06 18:32:10'),
(59, 60, 'Room00601043', '2023-06-06 18:32:18'),
(60, 60, 'Room00601043', '2023-06-06 18:34:45'),
(61, 60, 'Room85389819', '2023-06-06 19:16:32'),
(62, 60, 'Room85389819', '2023-06-06 19:16:34'),
(63, 64, 'Room61879495', '2023-06-06 19:26:31'),
(64, 64, 'Room61879495', '2023-06-06 19:26:37'),
(65, 65, 'Room25117968', '2023-06-06 19:44:17'),
(66, 65, 'Room25117968', '2023-06-06 19:46:04'),
(67, 65, 'Room25117968', '2023-06-06 19:46:12'),
(68, 65, 'Room25117968', '2023-06-06 19:46:27'),
(69, 65, 'Room25117968', '2023-06-06 19:46:37'),
(70, 65, 'Room25117968', '2023-06-06 19:46:45'),
(71, 65, 'Room25117968', '2023-06-06 19:47:02'),
(72, 65, 'Room25117968', '2023-06-06 19:47:15'),
(73, 66, 'Room11815382', '2023-06-06 19:50:09'),
(74, 66, 'Room11815382', '2023-06-06 19:52:14'),
(75, 66, 'Room11815382', '2023-06-06 19:52:15'),
(76, 66, 'Room11815382', '2023-06-06 19:52:17'),
(77, 66, 'Room11815382', '2023-06-06 19:52:20'),
(78, 66, 'Room61627333', '2023-06-06 20:27:53'),
(79, 66, 'Room61627333', '2023-06-06 20:30:39'),
(80, 68, 'Room99373757', '2023-06-07 16:04:41'),
(81, 76, 'Room02944839', '2023-06-07 17:41:15'),
(82, 116, 'Room40336071', '2023-06-08 17:41:00'),
(83, 116, 'Room40336071', '2023-06-08 17:41:02'),
(84, 116, 'Room40336071', '2023-06-08 17:41:02'),
(85, 117, 'Room52944799', '2023-06-08 18:38:13'),
(86, 117, 'Room52944799', '2023-06-08 18:38:30'),
(87, 117, 'Room89089906', '2023-06-08 19:40:29'),
(88, 117, 'Room89089906', '2023-06-08 19:40:30'),
(89, 117, 'Room89089906', '2023-06-08 19:40:52'),
(90, 117, 'Room42090886', '2023-06-08 19:42:08'),
(91, 112, 'Room07759186', '2023-06-08 19:46:20'),
(92, 119, 'Room37042132', '2023-06-08 21:10:08'),
(93, 119, 'Room37042132', '2023-06-08 21:10:16'),
(94, 112, 'Room36051572', '2023-06-09 00:04:19'),
(95, 112, 'Room85788995', '2023-06-09 00:12:25'),
(96, 112, 'Room45826894', '2023-06-09 00:24:48'),
(97, 112, 'Room47605868', '2023-06-09 12:55:46'),
(98, 120, 'Room89716223', '2023-06-09 13:01:33'),
(99, 120, 'Room89716223', '2023-06-09 13:01:35'),
(100, 120, 'Room87385436', '2023-06-09 15:26:54'),
(101, 120, 'Room87385436', '2023-06-09 15:26:55'),
(102, 120, 'Room87385436', '2023-06-09 15:26:58'),
(103, 120, 'Room87385436', '2023-06-09 15:26:59'),
(104, 120, 'Room87385436', '2023-06-09 15:27:20'),
(105, 121, 'Room95743548', '2023-06-09 15:58:24'),
(106, 122, 'Room16322521', '2023-06-09 16:16:19'),
(107, 121, 'Room78926711', '2023-06-09 16:17:12'),
(108, 121, 'Room78926711', '2023-06-09 16:17:14'),
(109, 121, 'Room78926711', '2023-06-09 16:18:03'),
(110, 121, 'Room37150642', '2023-06-09 16:22:58'),
(111, 121, 'Room37150642', '2023-06-09 16:23:00'),
(112, 121, 'Room37150642', '2023-06-09 16:23:13'),
(113, 121, 'Room31364432', '2023-06-09 16:24:08'),
(114, 121, 'Room31364432', '2023-06-09 16:24:10'),
(115, 121, 'Room31364432', '2023-06-09 16:24:13'),
(116, 121, 'Room31364432', '2023-06-09 16:24:47'),
(117, 121, 'Room31364432', '2023-06-09 16:24:56'),
(118, 121, 'Room31364432', '2023-06-09 16:24:58'),
(119, 121, 'Room84754703', '2023-06-09 16:25:32'),
(120, 121, 'Room84754703', '2023-06-09 16:26:02'),
(121, 112, 'Room84982232', '2023-06-09 17:42:05'),
(122, 124, 'Room07845584', '2023-06-09 18:19:12'),
(123, 128, 'Room62331761', '2023-06-10 12:40:48'),
(124, 128, 'Room62331761', '2023-06-10 12:40:50'),
(125, 128, 'Room62331761', '2023-06-10 12:40:53'),
(126, 128, 'Room86918099', '2023-06-10 12:54:23'),
(127, 128, 'Room81774205', '2023-06-12 21:24:28'),
(128, 129, 'Room49047771', '2023-06-13 14:53:49'),
(129, 129, 'Room49047771', '2023-06-13 14:54:10'),
(130, 129, 'Room49047771', '2023-06-13 14:54:22'),
(131, 129, 'Room49047771', '2023-06-13 14:54:43'),
(132, 129, 'Room49047771', '2023-06-13 14:55:16'),
(133, 112, 'Room67565432', '2023-06-13 16:14:17'),
(134, 112, 'Room67565432', '2023-06-13 16:15:36'),
(135, 112, 'Room67565432', '2023-06-13 16:16:06'),
(136, 131, 'Room06868302', '2023-06-13 17:22:07'),
(137, 132, 'Room35551589', '2023-06-13 20:03:50'),
(138, 132, 'Room73361230', '2023-06-14 14:18:03'),
(139, 133, 'Room99111274', '2023-06-19 10:38:05'),
(140, 112, 'Room63801344', '2023-06-19 11:39:20'),
(141, 133, 'Room77089610', '2023-06-19 17:14:12'),
(142, 133, 'Room69822378', '2023-06-19 18:26:50'),
(143, 112, 'Room24856418', '2023-06-20 10:45:03'),
(144, 135, 'Room60517069', '2023-06-20 13:00:55'),
(145, 139, 'Room73616640', '2023-06-20 19:06:36'),
(146, 147, 'Room73616640', '2023-06-20 19:06:41'),
(147, 149, 'Room40834048', '2023-06-21 14:07:23'),
(148, 150, 'Room38529433', '2023-06-21 15:44:49'),
(149, 150, 'Room38529433', '2023-06-21 15:44:56'),
(150, 147, 'Room03992525', '2023-06-21 17:55:36'),
(151, 147, 'Room89507467', '2023-06-21 18:25:40'),
(152, 147, 'Room89507467', '2023-06-21 18:29:14'),
(153, 147, 'Room89507467', '2023-06-21 18:30:17'),
(154, 147, 'Room89507467', '2023-06-21 18:30:18'),
(155, 147, 'Room89507467', '2023-06-21 18:33:37'),
(156, 139, 'Room89507467', '2023-06-21 18:33:40'),
(157, 153, 'Room67708170', '2023-06-23 12:58:08'),
(158, 153, 'Room67708170', '2023-06-23 12:58:14'),
(159, 153, 'Room67708170', '2023-06-23 12:58:27'),
(160, 153, 'Room67708170', '2023-06-23 12:58:55'),
(161, 153, 'Room67708170', '2023-06-23 12:59:04'),
(162, 153, 'Room67708170', '2023-06-23 12:59:32'),
(163, 153, 'Room67708170', '2023-06-23 12:59:46'),
(164, 153, 'Room67708170', '2023-06-23 12:59:58'),
(165, 153, 'Room67708170', '2023-06-23 13:00:15'),
(166, 153, 'Room67708170', '2023-06-23 13:00:24'),
(167, 154, 'Room59049066', '2023-06-26 15:47:47'),
(168, 154, 'Room59049066', '2023-06-26 15:47:55'),
(169, 154, 'Room59049066', '2023-06-26 15:48:17'),
(170, 154, 'Room59049066', '2023-06-26 15:48:25'),
(171, 112, 'Room19334618', '2023-06-28 11:16:42'),
(172, 112, 'Room19334618', '2023-06-28 11:16:45'),
(173, 112, 'Room19334618', '2023-06-28 11:16:52'),
(174, 112, 'Room48301165', '2023-06-28 12:13:31'),
(175, 112, 'Room48301165', '2023-06-28 12:14:48'),
(176, 112, 'Room52754061', '2023-06-28 12:20:06'),
(177, 112, 'Room52754061', '2023-06-28 12:20:26'),
(178, 112, 'Room52754061', '2023-06-28 12:20:36'),
(179, 112, 'Room52754061', '2023-06-28 12:20:43'),
(180, 112, 'Room52754061', '2023-06-28 12:20:46'),
(181, 112, 'Room82858405', '2023-06-28 12:23:24'),
(182, 112, 'Room82858405', '2023-06-28 12:23:31'),
(183, 112, 'Room82858405', '2023-06-28 12:23:35'),
(184, 112, 'Room82858405', '2023-06-28 12:23:38'),
(185, 112, 'Room82858405', '2023-06-28 12:24:04'),
(186, 112, 'Room15575795', '2023-06-28 12:40:08'),
(187, 112, 'Room15575795', '2023-06-28 12:40:13'),
(188, 112, 'Room15575795', '2023-06-28 12:40:16'),
(189, 112, 'Room41260308', '2023-06-28 12:46:05'),
(190, 112, 'Room41260308', '2023-06-28 12:47:07'),
(191, 112, 'Room66018865', '2023-06-28 12:55:53'),
(192, 112, 'Room95366161', '2023-06-28 12:57:23'),
(193, 112, 'Room19749367', '2023-06-28 13:02:16'),
(194, 147, 'Room48045085', '2023-06-30 10:46:24'),
(195, 112, 'Room28269843', '2023-06-30 11:07:10'),
(196, 112, 'Room28269843', '2023-06-30 11:07:20'),
(197, 112, 'Room48303457', '2023-06-30 11:10:19'),
(198, 112, 'Room05564366', '2023-06-30 11:16:35'),
(199, 112, 'Room05564366', '2023-06-30 11:16:49'),
(200, 112, 'Room05564366', '2023-06-30 11:17:49'),
(201, 112, 'Room05564366', '2023-06-30 11:18:14'),
(202, 112, 'Room05975909', '2023-06-30 11:20:03'),
(203, 147, 'Room87810994', '2023-06-30 11:22:32'),
(204, 147, 'Room94985750', '2023-06-30 11:23:48'),
(205, 147, 'Room05851513', '2023-06-30 11:34:00'),
(206, 147, 'Room72985289', '2023-06-30 11:40:27'),
(207, 157, 'Room41535513', '2023-07-01 16:21:21'),
(208, 157, 'Room41535513', '2023-07-01 16:21:28'),
(209, 157, 'Room41535513', '2023-07-01 16:21:49'),
(210, 157, 'Room68878305', '2023-07-03 16:22:37'),
(211, 157, 'Room68878305', '2023-07-03 16:22:46'),
(212, 157, 'Room68878305', '2023-07-03 16:22:56'),
(213, 157, 'Room68878305', '2023-07-03 16:23:04'),
(214, 157, 'Room52945183', '2023-07-03 16:24:12'),
(215, 158, 'Room51022344', '2023-07-04 12:18:23'),
(216, 158, 'Room26097331', '2023-07-04 12:21:51'),
(217, 158, 'Room26097331', '2023-07-04 12:21:55'),
(218, 112, 'Room12248417', '2023-07-05 10:37:16'),
(219, 112, 'Room12248417', '2023-07-05 10:37:23'),
(220, 112, 'Room12248417', '2023-07-05 10:37:32'),
(221, 135, 'Room84099869', '2023-07-10 16:59:21'),
(222, 135, 'Room84099869', '2023-07-10 16:59:30'),
(223, 135, 'Room84099869', '2023-07-10 16:59:38'),
(224, 135, 'Room84099869', '2023-07-10 16:59:47'),
(225, 165, 'Room06182968', '2023-07-11 11:12:42'),
(226, 165, 'Room41432582', '2023-07-11 12:41:10'),
(227, 165, 'Room41432582', '2023-07-11 12:41:17'),
(228, 165, 'Room41432582', '2023-07-11 12:41:22'),
(229, 165, 'Room41432582', '2023-07-11 12:41:44'),
(230, 165, 'Room41432582', '2023-07-11 12:41:51'),
(231, 135, 'Room08357704', '2023-07-12 11:17:44'),
(232, 135, 'Room08357704', '2023-07-12 11:18:54'),
(233, 135, 'Room27086219', '2023-07-12 11:54:32'),
(234, 166, 'Room81472065', '2023-07-15 12:30:32'),
(235, 166, 'Room81472065', '2023-07-15 12:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminwinning`
--
ALTER TABLE `adminwinning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constants`
--
ALTER TABLE `constants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamebet`
--
ALTER TABLE `gamebet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamerecords`
--
ALTER TABLE `gamerecords`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `game_winners`
--
ALTER TABLE `game_winners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gameid` (`gameid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_game`
--
ALTER TABLE `join_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `leader_board`
--
ALTER TABLE `leader_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leader_board_price`
--
ALTER TABLE `leader_board_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_game`
--
ALTER TABLE `new_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `push_notifications`
--
ALTER TABLE `push_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refered`
--
ALTER TABLE `refered`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referralimg`
--
ALTER TABLE `referralimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_links`
--
ALTER TABLE `social_media_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admins`
--
ALTER TABLE `sub_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tournament_history`
--
ALTER TABLE `tournament_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminwinning`
--
ALTER TABLE `adminwinning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `constants`
--
ALTER TABLE `constants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gamebet`
--
ALTER TABLE `gamebet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=581;

--
-- AUTO_INCREMENT for table `gamerecords`
--
ALTER TABLE `gamerecords`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_winners`
--
ALTER TABLE `game_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_game`
--
ALTER TABLE `join_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leader_board`
--
ALTER TABLE `leader_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `leader_board_price`
--
ALTER TABLE `leader_board_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `new_game`
--
ALTER TABLE `new_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `push_notifications`
--
ALTER TABLE `push_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `refered`
--
ALTER TABLE `refered`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referralimg`
--
ALTER TABLE `referralimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_media_links`
--
ALTER TABLE `social_media_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_admins`
--
ALTER TABLE `sub_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tournament_history`
--
ALTER TABLE `tournament_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `user_games`
--
ALTER TABLE `user_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
