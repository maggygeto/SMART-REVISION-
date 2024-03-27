-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 02:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_revision`
--

-- --------------------------------------------------------

--
-- Table structure for table `meeting_students`
--

CREATE TABLE `meeting_students` (
  `zoom_meeting_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_teachers`
--

CREATE TABLE `meeting_teachers` (
  `zoom_meeting_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `subtopic` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `subject`, `class`, `subtopic`, `description`) VALUES
(1, 'Mathematics', 'Form 1', 'Algebra', 'Algebra is a branch of mathematics in which symbols, usually letters of the alphabet, represent numbers or members of a specified set and are used to represent quantities and to express general relationships that hold for all members of the set.'),
(2, 'English', 'Form 1', 'Grammar', 'English grammar is the set of structural rules governing the composition of clauses, phrases, and words in the English language. It includes syntax, morphology, phonology, and semantics.'),
(3, 'Kiswahili', 'Form 1', 'Sarufi', 'Sarufi ya Kiswahili ni misingi ya muundo wa lugha ya Kiswahili. Inajumuisha viambishi, vivumishi, visawe, vishazi, na misingi mingine ya lugha.'),
(4, 'Biology', 'Form 1', 'Cell Biology', 'Cell biology is the study of cells, their physiological properties, their structure, and the organelles they contain. It focuses on the function of cells, their interactions, and their environment.'),
(5, 'Physics', 'Form 1', 'Introduction to Physics', 'Physics is the natural science that studies matter, its motion and behavior through space and time, and the related entities of energy and force. It encompasses concepts such as mechanics, thermodynamics, and electromagnetism.'),
(6, 'Chemistry', 'Form 1', 'Atomic Structure', 'Atomic structure refers to the organization of atoms, specifically the arrangement of protons, neutrons, and electrons within an atom. It includes concepts such as atomic number, mass number, and isotopes.'),
(7, 'Geography', 'Form 1', 'Physical Geography', 'Physical geography is the branch of geography that deals with the study of Earth\'s natural features and processes, including landforms, climate, soil, and vegetation. It examines the physical environment and its interactions with human activities.'),
(8, 'History', 'Form 1', 'World History', 'World history is the study of the global past, focusing on major civilizations, events, and developments that have shaped human societies. It encompasses topics such as ancient civilizations, the rise and fall of empires, and global interactions.'),
(9, 'CRE', 'Form 1', 'Christian Teachings', 'Christian religious education (CRE) is the study of the Christian faith, beliefs, and teachings. It covers topics such as the Bible, Christian doctrine, moral values, and the history of Christianity.'),
(10, 'Business Studies', 'Form 1', 'Entrepreneurship', 'Entrepreneurship is the process of designing, launching, and running a new business, often in response to identified opportunities. It involves creativity, innovation, risk-taking, and the management of resources.'),
(11, 'Agriculture', 'Form 1', 'Introduction to Agriculture', 'Agriculture is the science, art, and practice of cultivating plants and raising animals for food, fiber, and other products. It includes various agricultural practices such as crop production, animal husbandry, and agribusiness.'),
(12, 'Computer Studies', 'Form 1', 'Introduction to Computers', 'Computer studies is the study of computers and their applications. It covers topics such as computer hardware, software, programming, and computer applications in various fields.'),
(13, 'Mathematics', 'Form 2', 'Geometry', 'Geometry is a branch of mathematics that deals with the study of shapes, sizes, and properties of space. It includes concepts such as points, lines, angles, triangles, circles, and polygons. Geometry is used in various fields such as architecture, engineering, and art.'),
(14, 'English', 'Form 2', 'Literature', 'Literature is the art of written works, which include poetry, prose, drama, and fiction. It reflects human experiences, emotions, and thoughts, providing insights into different cultures and perspectives. Studying literature enhances critical thinking, communication skills, and cultural awareness.'),
(15, 'Kiswahili', 'Form 2', 'Insha', 'Insha ni aina ya maandishi ya Kiswahili inayojumuisha uandishi wa barua, ripoti, makala, hadithi fupi, na mengineyo. Insha hutumika kueleza mawazo, hisia, na uzoefu wa mwandishi kuhusu mada mbalimbali.'),
(16, 'Biology', 'Form 2', 'Ecology', 'Ecology is the scientific study of the relationships between organisms and their environment. It examines the distribution and abundance of living organisms, interactions between species, and the flow of energy and nutrients in ecosystems.'),
(17, 'Physics', 'Form 2', 'Motion', 'Motion is a change in the position of an object over time. It can be described in terms of distance, displacement, speed, velocity, acceleration, and time. The study of motion is fundamental to understanding the physical world and natural phenomena.'),
(18, 'Chemistry', 'Form 2', 'Chemical Reactions', 'Chemical reactions involve the transformation of substances into new substances through the breaking and formation of chemical bonds. They are governed by principles such as conservation of mass, energy, and charge.'),
(19, 'Geography', 'Form 2', 'Human Geography', 'Human geography is the branch of geography that focuses on the study of human activities, societies, and cultures. It explores topics such as population distribution, urbanization, economic activities, and cultural landscapes.'),
(20, 'History', 'Form 2', 'Ancient Civilizations', 'Ancient civilizations refer to the early human societies that developed complex cultures and institutions. They include civilizations such as Mesopotamia, Egypt, Greece, Rome, China, and India, each with its unique contributions to human history.'),
(21, 'CRE', 'Form 2', 'Comparative Religion', 'Comparative religion is the academic study of the world\'s religious traditions, beliefs, practices, and scriptures. It examines similarities and differences between religions, as well as their historical development and impact on societies.'),
(22, 'Business Studies', 'Form 2', 'Business Management', 'Business management involves planning, organizing, directing, and controlling organizational activities to achieve specific goals and objectives. It encompasses functions such as strategic planning, marketing, finance, operations, and human resource management.'),
(23, 'Agriculture', 'Form 2', 'Crop Production', 'Crop production is the process of cultivating crops for food, fiber, fuel, and other products. It includes practices such as soil preparation, planting, irrigation, fertilization, pest control, and harvesting.'),
(24, 'Computer Studies', 'Form 2', 'Computer Networks', 'Computer networks are systems that connect multiple computers and devices to facilitate communication, resource sharing, and collaboration. They can be classified based on their geographic scope (LAN, WAN) and topology (bus, star, mesh).'),
(25, 'Mathematics', 'Form 3', 'Trigonometry', 'Trigonometry is a branch of mathematics that deals with the study of triangles and the relationships between their sides and angles. It includes concepts such as sine, cosine, tangent, and their applications in solving problems involving angles and distances.'),
(26, 'English', 'Form 3', 'Writing Skills', 'Writing skills are essential for effective communication and expression of ideas. They include abilities such as grammar, vocabulary, spelling, punctuation, sentence structure, paragraph development, and coherence.'),
(27, 'Kiswahili', 'Form 3', 'Ushairi', 'Ushairi ni aina ya sanaa inayotumia maneno ya kisanii, lugha ya picha, na mbinu mbalimbali za kisanaa kuelezea mawazo, hisia, na uzoefu. Ushairi hutumika kuvutia, kufundisha, kuelimisha, na kuburudisha wasikilizaji.'),
(28, 'Biology', 'Form 3', 'Genetics', 'Genetics is the study of genes, heredity, and variation in living organisms. It explores mechanisms such as DNA, inheritance patterns, genetic disorders, and evolutionary processes that shape biological diversity.'),
(29, 'Physics', 'Form 3', 'Electricity and Magnetism', 'Electricity and magnetism are fundamental forces of nature that govern the behavior of charged particles and magnetic materials. They are responsible for phenomena such as electric currents, magnetic fields, and electromagnetic waves.'),
(30, 'Chemistry', 'Form 3', 'Chemical Bonding', 'Chemical bonding refers to the attractive forces that hold atoms together in molecules and compounds. It involves concepts such as covalent bonds, ionic bonds, metallic bonds, and intermolecular forces.'),
(31, 'Geography', 'Form 3', 'Regional Geography', 'Regional geography is the study of geographical regions, including their physical, cultural, economic, and environmental characteristics. It examines factors such as location, climate, natural resources, and human activities.'),
(32, 'History', 'Form 3', 'Modern History', 'Modern history refers to the period from the late Middle Ages to the present day, characterized by significant events such as the Renaissance, Reformation, Age of Exploration, Industrial Revolution, World Wars, and globalization.'),
(33, 'CRE', 'Form 3', 'Ethical Issues', 'Ethical issues refer to moral dilemmas and controversies that arise in various contexts, such as medicine, business, politics, and technology. They involve questions of right and wrong, fairness, justice, and responsibility.'),
(34, 'Business Studies', 'Form 3', 'Marketing Management', 'Marketing management involves planning, implementing, and controlling marketing activities to satisfy customer needs and achieve organizational objectives. It includes activities such as market research, product development, pricing, promotion, distribution, and customer relationship management.'),
(35, 'Agriculture', 'Form 3', 'Livestock Farming', 'Livestock farming is the rearing of animals for food, fiber, labor, and other products. It includes practices such as breeding, feeding, housing, health management, and marketing of livestock species such as cattle, sheep, goats, and poultry.'),
(36, 'Computer Studies', 'Form 3', 'Database Management', 'Database management involves the design, creation, maintenance, and administration of databases to store, retrieve, and manage data efficiently. It includes concepts such as data modeling, normalization, query optimization, and data security.'),
(37, 'Mathematics', 'Form 4', 'Calculus', 'Calculus is a branch of mathematics that deals with the study of change and motion. It includes concepts such as differentiation, integration, limits, and infinite series, which are used in various fields such as physics, engineering, and economics.'),
(38, 'English', 'Form 4', 'Oral Literature', 'Oral literature encompasses the traditional stories, songs, myths, legends, proverbs, and rituals passed down orally from generation to generation within a community. It reflects cultural values, beliefs, and experiences.'),
(39, 'Kiswahili', 'Form 4', 'Riwaya', 'Riwaya ni aina ya fasihi simulizi inayojumuisha hadithi ndefu iliyoandikwa kwa ustadi na mbinu za kisanaa. Inachunguza masuala ya kijamii, kiuchumi, kisiasa, na kisaikolojia katika jamii.'),
(40, 'Biology', 'Form 4', 'Evolution', 'Evolution is the process of gradual change in living organisms over successive generations, driven by mechanisms such as natural selection, genetic drift, mutation, and gene flow. It explains the diversity of life on Earth and the adaptation of species to their environments.'),
(41, 'Physics', 'Form 4', 'Modern Physics', 'Modern physics refers to the branch of physics that deals with phenomena beyond classical mechanics and electromagnetism, including relativity, quantum mechanics, particle physics, and cosmology. It explores the fundamental nature of matter and energy at the smallest and largest scales of the universe.'),
(42, 'Chemistry', 'Form 4', 'Organic Chemistry', 'Organic chemistry is the study of compounds containing carbon atoms, including hydrocarbons and their derivatives. It explores the structure, properties, synthesis, and reactions of organic molecules, which are essential to life and numerous industrial applications.'),
(43, 'Geography', 'Form 4', 'Environmental Management', 'Environmental management involves the sustainable use, conservation, and restoration of natural resources and ecosystems to maintain ecological balance and support human well-being. It addresses issues such as pollution, deforestation, habitat loss, and climate change mitigation.'),
(44, 'History', 'Form 4', 'Contemporary Issues', 'Contemporary issues refer to current events, trends, and challenges that impact societies globally and locally. They include topics such as globalization, human rights, conflict resolution, social justice, and environmental sustainability.'),
(45, 'CRE', 'Form 4', 'Religious Ethics', 'Religious ethics encompass moral principles, values, and guidelines derived from religious beliefs and teachings. They address ethical dilemmas and decisions in various aspects of life, including personal conduct, social interactions, and ethical responsibilities towards others.'),
(46, 'Business Studies', 'Form 4', 'Financial Management', 'Financial management involves the planning, organizing, directing, and controlling of financial resources to achieve organizational goals and maximize shareholder wealth. It includes activities such as budgeting, investment analysis, risk management, and financial reporting.'),
(47, 'Agriculture', 'Form 4', 'Agribusiness Management', 'Agribusiness management encompasses the management of agricultural enterprises and value chains, including production, processing, marketing, and distribution of agricultural products and services. It integrates agricultural and business principles to optimize efficiency and profitability.'),
(48, 'Computer Studies', 'Form 4', 'Software Engineering', 'Software engineering is the systematic approach to designing, developing, testing, and maintaining software systems to meet specified requirements and quality standards. It involves techniques such as software design, programming, testing, and project management.'),
(49, 'Mathematics', 'Form 1', 'Basic Arithmetic', ''),
(50, 'English', 'Form 1', 'Reading Comprehension', 'Reading comprehension is the ability to understand and interpret written texts. It involves skills such as identifying main ideas, making inferences, and analyzing the author\'s purpose and tone.'),
(51, 'Kiswahili', 'Form 1', 'Hadithi Fupi', 'Hadithi fupi ni aina ya fasihi simulizi inayojumuisha hadithi za kusisimua na kufundisha. Zinaweza kuwa na mafundisho, mizaha, au mafumbo ambayo hufundisha maadili na maarifa.'),
(52, 'Biology', 'Form 1', 'Photosynthesis', 'Photosynthesis is the process by which green plants and some other organisms use sunlight to synthesize foods with the help of chlorophyll. It converts light energy into chemical energy stored in glucose molecules.'),
(53, 'Physics', 'Form 1', 'Newton\'s Laws of Motion', 'Newton\'s laws of motion are three fundamental principles that describe the relationship between the motion of an object and the forces acting on it. They provide the basis for understanding the behavior of objects in motion.'),
(54, 'Chemistry', 'Form 1', 'States of Matter', 'States of matter refer to the different forms in which matter can exist, including solid, liquid, and gas. Changes in temperature and pressure can cause substances to transition between these states.'),
(55, 'Geography', 'Form 1', 'Climate Zones', 'Climate zones are geographical regions characterized by similar patterns of temperature, precipitation, and other climatic factors. They include tropical, temperate, polar, and arid climates, each with distinct weather conditions and ecosystems.'),
(56, 'History', 'Form 1', 'Prehistoric Times', 'Prehistoric times refer to the period of human history before the invention of writing systems and recorded history. It includes the Stone Age, Bronze Age, and Iron Age, during which early humans developed tools, agriculture, and complex societies.'),
(57, 'CRE', 'Form 1', 'The Ten Commandments', 'The Ten Commandments are a set of ethical and moral principles in Judaism and Christianity, traditionally said to have been given by God to Moses on Mount Sinai. They outline fundamental rules for ethical behavior and worship.'),
(58, 'Business Studies', 'Form 1', 'Types of Businesses', 'Types of businesses refer to the various forms of organizations through which goods and services are produced, marketed, and distributed. They include sole proprietorships, partnerships, corporations, and cooperatives.'),
(59, 'Agriculture', 'Form 1', 'Types of Farming', 'Types of farming refer to different agricultural practices and systems used to cultivate crops and raise livestock. They include subsistence farming, commercial farming, organic farming, and intensive farming methods.'),
(60, 'Computer Studies', 'Form 1', 'Introduction to Programming', 'Introduction to programming covers the basic concepts and principles of computer programming, including algorithms, data types, control structures, and programming languages such as Python, Java, and C++.'),
(61, 'Mathematics', 'Form 2', 'Quadratic Equations', 'Quadratic equations are polynomial equations of the second degree, involving a variable raised to the power of two. They can be solved using methods such as factoring, completing the square, and using the quadratic formula.'),
(62, 'English', 'Form 2', 'Creative Writing', 'Creative writing is the art of expressing thoughts, ideas, and emotions in an imaginative and original manner. It includes genres such as poetry, short stories, novels, and plays, allowing writers to explore their creativity and storytelling skills.'),
(63, 'Kiswahili', 'Form 2', 'Makala', 'Makala ni aina ya uandishi wa Kiswahili unaojumuisha maoni, maelezo, au taarifa kuhusu mada fulani. Hutumika kuelimisha, kuburudisha, au kufafanua masuala mbalimbali katika jamii.'),
(64, 'Biology', 'Form 2', 'Human Anatomy', 'Human anatomy is the study of the structure and organization of the human body, including organs, tissues, and systems such as the skeletal, muscular, circulatory, and nervous systems. It provides insights into the functioning of the human body.'),
(65, 'Physics', 'Form 2', 'Optics', 'Optics is the branch of physics that deals with the study of light and its behavior, including reflection, refraction, diffraction, and interference. It explores how light interacts with matter and its applications in optical instruments and technologies.'),
(66, 'Chemistry', 'Form 2', 'Acids and Bases', 'Acids and bases are chemical substances that exhibit specific properties and reactions. Acids release hydrogen ions in solution, while bases release hydroxide ions. They play important roles in chemical reactions, pH balance, and various industrial processes.'),
(67, 'Geography', 'Form 2', 'Population Geography', 'Population geography is the study of the distribution, density, composition, and dynamics of human populations across space and time. It examines factors influencing population growth, migration patterns, urbanization, and demographic trends.'),
(68, 'History', 'Form 2', 'Medieval Period', 'The medieval period, also known as the Middle Ages, is the historical period between the fall of the Roman Empire and the beginning of the Renaissance. It was characterized by feudalism, the rise of Christianity, and cultural and intellectual developments in Europe.'),
(69, 'CRE', 'Form 2', 'Prophets and Prophecy', 'Prophets and prophecy play a significant role in religious traditions, serving as messengers of God and conveying divine revelations, warnings, and instructions to believers. They are found in various religious texts and traditions worldwide.'),
(70, 'Business Studies', 'Form 2', 'Market Structures', 'Market structures refer to the characteristics and behavior of markets in which firms operate. They include perfect competition, monopoly, oligopoly, and monopolistic competition, each with distinct features and implications for business strategies.'),
(71, 'Agriculture', 'Form 2', 'Soil Science', 'Soil science is the study of soil as a natural resource, including its formation, properties, classification, and fertility. It explores the physical, chemical, and biological processes that influence soil health and productivity.'),
(72, 'Computer Studies', 'Form 2', 'Web Development', 'Web development involves designing, creating, and maintaining websites and web applications. It includes skills such as HTML, CSS, JavaScript, and server-side scripting languages like PHP and Python for building dynamic and interactive web pages.'),
(73, 'Mathematics', 'Form 3', 'Probability', 'Probability is the measure of the likelihood that an event will occur. It ranges from 0 to 1, where 0 indicates impossibility and 1 indicates certainty. Probability theory is used in various fields such as statistics, gambling, and decision-making.'),
(74, 'English', 'Form 3', 'Debating Skills', 'Debating skills involve the ability to articulate and defend one\'s opinions and arguments in a structured and persuasive manner. They include researching, organizing information, critical thinking, and effective communication during debates and discussions.'),
(75, 'Kiswahili', 'Form 3', 'Ushairi wa Kitamaduni', 'Ushairi wa kitamaduni ni aina ya ushairi unaozingatia tamaduni, mila, na desturi za jamii fulani. Hujumuisha maandishi yanayolenga kuhifadhi na kuenzi utamaduni na maisha ya watu katika jamii husika.'),
(76, 'Biology', 'Form 3', 'Ecological Conservation', 'Ecological conservation involves the protection and preservation of natural habitats, biodiversity, and ecosystems. It aims to prevent species extinction, maintain ecological balance, and sustainably manage natural resources for future generations.'),
(77, 'Physics', 'Form 3', 'Thermodynamics', 'Thermodynamics is the branch of physics that deals with the study of heat, energy, and their transformations in physical systems. It includes laws such as the first law of thermodynamics (conservation of energy) and the second law (entropy).'),
(78, 'Chemistry', 'Form 3', 'Organic Synthesis', 'Organic synthesis is the process of creating organic compounds from simpler molecules or precursors. It involves various chemical reactions and techniques to build complex organic structures with specific properties and functions.'),
(79, 'Geography', 'Form 3', 'Geopolitics', 'Geopolitics is the study of the influence of geographical factors on political relations and international affairs. It examines how geography, resources, and strategic locations shape geopolitical dynamics, conflicts, and alliances between nations.'),
(80, 'History', 'Form 3', 'Colonialism and Imperialism', 'Colonialism and imperialism are political and economic systems characterized by the domination and exploitation of one country or territory by another. They involve the establishment of colonies, resource extraction, and cultural assimilation.'),
(81, 'CRE', 'Form 3', 'Religious Movements', 'Religious movements are organized efforts to promote or reform religious beliefs, practices, or institutions. They can be initiated by individuals, groups, or institutions and may lead to the emergence of new religious denominations or sects.'),
(82, 'Business Studies', 'Form 3', 'Strategic Management', 'Strategic management involves the formulation and implementation of long-term goals and initiatives to achieve organizational objectives and gain competitive advantage. It includes strategic planning, analysis, and decision-making.'),
(83, 'Agriculture', 'Form 3', 'Agroforestry', 'Agroforestry is a land use management system that integrates trees and shrubs with crops and/or livestock in agricultural landscapes. It aims to enhance productivity, biodiversity, and environmental sustainability while providing economic benefits to farmers.'),
(84, 'Computer Studies', 'Form 3', 'Software Development Lifecycle', 'The software development lifecycle (SDLC) is a process used by software developers to design, develop, test, deploy, and maintain software systems. It consists of phases such as requirements analysis, design, implementation, testing, and maintenance.'),
(85, 'Mathematics', 'Form 4', 'Vectors and Matrices', 'Vectors and matrices are mathematical entities used to represent and manipulate quantities in multiple dimensions. They are essential in various fields such as physics, engineering, computer graphics, and data analysis.'),
(86, 'English', 'Form 4', 'Public Speaking', 'Public speaking is the act of delivering speeches or presentations to an audience. It involves skills such as articulation, voice modulation, body language, and engaging the audience effectively to convey messages and ideas.'),
(87, 'Kiswahili', 'Form 4', 'Ushairi wa Kisasa', 'Ushairi wa kisasa ni aina ya ushairi unaojumuisha mitindo, mbinu, na masuala ya kisasa katika jamii. Hujikita katika maisha ya kisasa, mabadiliko ya kijamii, na masuala ya kisiasa na kitamaduni.'),
(88, 'Biology', 'Form 4', 'Biotechnology', 'Biotechnology is the application of biological knowledge and techniques to develop products and processes for various purposes. It includes genetic engineering, tissue culture, pharmaceuticals, and environmental remediation.'),
(89, 'Physics', 'Form 4', 'Quantum Mechanics', 'Quantum mechanics is the branch of physics that describes the behavior of matter and energy at the atomic and subatomic levels. It involves principles such as wave-particle duality, uncertainty principle, and quantum entanglement, challenging classical notions of determinism and causality.'),
(90, 'Chemistry', 'Form 4', 'Nuclear Chemistry', 'Nuclear chemistry is the study of nuclear reactions and properties of atomic nuclei. It includes topics such as radioactive decay, nuclear fission, fusion, and applications in medicine, energy production, and environmental monitoring.'),
(91, 'Geography', 'Form 4', 'Urban Planning', 'Urban planning is the process of designing and organizing urban areas to ensure efficient land use, infrastructure development, and sustainable growth. It involves considerations such as zoning, transportation, housing, and environmental conservation.'),
(92, 'History', 'Form 4', 'Cold War Era', 'The Cold War era refers to the period of geopolitical tension and ideological conflict between the United States and the Soviet Union and their respective allies, lasting from the end of World War II to the early 1990s. It was characterized by proxy wars, nuclear arms race, and ideological rivalries.'),
(93, 'CRE', 'Form 4', 'Religious Pluralism', 'Religious pluralism is the coexistence of different religious beliefs and practices within a society or community. It emphasizes tolerance, respect, and mutual understanding among people of diverse religious backgrounds.'),
(94, 'Business Studies', 'Form 4', 'Globalization and Business', 'Globalization refers to the increasing interconnectedness and interdependence of economies, cultures, and societies worldwide. It has significant implications for businesses, including expanded markets, outsourcing, and cultural diversity in the workplace.'),
(95, 'Agriculture', 'Form 4', 'Sustainable Agriculture', 'Sustainable agriculture is a farming practice that seeks to meet current food and fiber needs without compromising the ability of future generations to meet their needs. It emphasizes environmental stewardship, economic viability, and social equity in food production and distribution.'),
(96, 'Computer Studies', 'Form 4', 'Artificial Intelligence', 'Artificial intelligence (AI) is the simulation of human intelligence processes by machines, especially computer systems. It involves the development of algorithms and models that enable computers to perform tasks such as reasoning, learning, and problem-solving.'),
(97, 'Mathematics', 'Form 1', 'Numbers', NULL),
(98, 'Mathematics', 'Form 1', 'currency', NULL),
(99, 'Computer Studies', 'Form 2', 'Word processor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `question_text` text DEFAULT NULL,
  `is_structured` tinyint(1) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_name`, `question_text`, `is_structured`, `option1`, `option2`, `option3`, `option4`, `correct_answer`) VALUES
(1, 'milk', 'Capital city of Greece', 0, 'Congo', 'Uganda', 'Kenya', 'Kigali', 'option1'),
(2, 'milk', 'Running is a', 0, 'sport', 'game', 'activity', 'sport', 'option2'),
(3, 'milk', 'R', 1, '', '', '', '', '3'),
(4, 'Figma', 'Mozambique longest River', 1, '', '', '', '', 'missisipi'),
(5, 'Figma', '9', 0, '9', '90', '99', '100', 'option1'),
(6, 'Figma', 'Who is the head of Cianda', 0, 'Randy', 'Edge', 'John', 'Andrew', 'option3'),
(7, 'Figma', '1*1', 0, '1', '2', '4', '8', ''),
(8, 'Figma', '6*5', 0, '1', '30', '40', '20', ''),
(9, 'Figma', '8*1', 1, '', '', '', '', ''),
(10, 'Figma', 'Hi', 0, 'I ', 'Fine', 'Working', 'Revision', ''),
(11, 'Figma', 'Remote', 1, '', '', '', '', 'Tasking'),
(12, 'Figma', 'Helicopter', 1, '', '', '', '', 'Helipad'),
(13, 'Figma', 'Mchinery is', 0, 'math', 'physics', 'geography', 'computer', ''),
(14, 'Figma', 'Maths is a', 0, 'figure', 'science', 'social', 'history', ''),
(15, 'Figma', 'What is the definition of righs', 0, 'struct', 'politics', 'govern', 'reign', ''),
(16, 'Figma', '1+1', 0, '2', '3', '4', '5', 'option1'),
(17, 'Figma', 'Bonjour', 1, '', '', '', '', 'La sa vie me sar'),
(18, 'Figma', '8*7', 0, '56', '12', '45', '90', ''),
(19, 'Figma', 'Matter is', 1, '', '', '', '', 'anything that occupies space'),
(20, 'Figma', 'metrics', 0, '12', '11', 'Transit', 'Scania', 'Scania'),
(21, 'Figma', '4*4', 0, '10', '15', '16', '8', 'option3'),
(22, 'Figma', 'Time ', 0, 'flies', 'tick tocks', 'slows', 'runs', 'option1'),
(23, 'Figma', 'Work', 1, '', '', '', '', 'day'),
(24, 'Milk', '8*8', 1, '', '', '', '', '64'),
(25, 'Milk', '1+1', 0, '2', '1', '4', '8', 'option1'),
(26, 'Milk', 'may', 0, '13', '9', '7', '5', 'option4'),
(27, 'Milk', 'We are ', 0, 'going', 'town', 'naks', 'Mechanis', 'option2'),
(28, 'Milk', 'What is calculator', 0, 'machine', 'coputer', 'expert ', 'mathematician', 'option1'),
(29, 'Milk', '1 at hashi', 0, '10', '2', '6', '8', 'option3'),
(30, 'Milk', 'Maths is ', 0, 'subject', 'action', 'figure', 'count', 'option4'),
(31, 'Figma', 'Course ', 0, 'subject', 'action', 'work', 'run', 'option3'),
(32, 'Figma', '4*5', 1, '', '', '', '', '20'),
(33, 'Milk', 'Who is a founder', 0, 'CEO ', 'Trainer', 'Localiser', 'Mechanis', 'option3'),
(34, 'Figma', '1*!', 0, '1', '2', '3', '4', 'option1'),
(35, 'Figma', 'E5', 1, '', '', '', '', 'ecma'),
(36, 'Milk', '1', 1, '', '', '', '', '11'),
(38, 'Figma', 'mathematic', 0, '1', '33', '5', 'u', 'option2'),
(39, 'milk', 'Mr', 0, 'Caleb', 'Krabs', 'Plankton', 'Mechanis', 'option2'),
(40, 'milk', '12', 0, '12', '13', '15', '14', 'option1'),
(43, 'milk', '2', 1, '', '', '', '', '4'),
(44, 'milk', '78', 0, '2', '7', '8', '0', 'option2'),
(45, 'milk', '8', 0, '1', '2', '8', '7', 'option3'),
(46, 'milk', 'mint', 0, 'subject', '23', '5', '7', 'option2'),
(47, 'milk', '3*3', 0, '9', '2', '7', '10', 'option2'),
(48, 'Romania', 'What is the capital city of Italy', 0, 'Rome', 'addis ababa', 'Johannesburg', 'Mombuca', 'option1');

-- --------------------------------------------------------

--
-- Table structure for table `question_inquiry`
--

CREATE TABLE `question_inquiry` (
  `question_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `correct_answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_inquiry`
--

INSERT INTO `question_inquiry` (`question_id`, `student_id`, `question`, `correct_answer`) VALUES
(1, '00001', 'I want to be consoled', 'youll have the help'),
(2, '00001', 'What is matters', 'space occupatiom'),
(3, '00001', 'clear responsorial psalm', 'duytyiusytt');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `adm_no` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `adm_no`, `email`, `password`) VALUES
(1, '00001', 'calebtoromo@gmail.com', '237895');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `tsc_no` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `tsc_no`, `email`, `password`) VALUES
(1, '001', 'Hesbon@gmail.com', '237895');

-- --------------------------------------------------------

--
-- Table structure for table `user_responses`
--

CREATE TABLE `user_responses` (
  `id` int(11) NOT NULL,
  `student_Adm_no` varchar(50) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `question_text` text NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_responses`
--

INSERT INTO `user_responses` (`id`, `student_Adm_no`, `test_name`, `question_text`, `correct_answer`) VALUES
(1, '00001', 'Figma', 'Mozambique longest River', 'Antananarivo'),
(2, '1', 'Figma', 'Mozambique longest River', 'Antananarivo'),
(3, '1', 'Figma', 'Mozambique longest River', 'Antananarivo'),
(4, '1', 'Figma', 'Mozambique longest River', 'Antananarivo'),
(5, '1', 'Figma', 'Mozambique longest River', 'Antananarivo'),
(6, '1', 'milk', 'Capital city of Greece', 'Kenya'),
(7, '1', 'milk', 'Running is a', 'sport'),
(8, '1', 'milk', 'R', 'lang'),
(9, '1', 'milk', 'Running is a', 'activity'),
(10, '1', 'Milk', '8*8', '64'),
(11, '00001', 'milk', 'Capital city of Greece', 'Uganda'),
(12, '00001', 'milk', 'Running is a', 'sport'),
(13, '00001', 'milk', 'R', 'R2'),
(14, '00001', 'Milk', '8*8', '64'),
(15, '00001', 'milk', '3*3', '9'),
(16, '00001', 'milk', 'mint', '7'),
(17, '00001', 'Milk', '1+1', '7'),
(18, '00001', 'Milk', 'may', '5'),
(19, '00001', 'Milk', 'We are ', 'going'),
(20, '00001', 'milk', '78', '8'),
(21, '00001', 'Milk', 'What is calculator', 'computer'),
(22, '00001', 'milk', '2', '2'),
(23, '00001', 'milk', '12', '12'),
(24, '00001', 'Milk', '1', '1'),
(25, '00001', 'Milk', 'Who is a founder', 'CEO'),
(26, '00001', 'milk', 'Mr', 'Krabs'),
(27, '00001', 'Milk', 'Maths is ', 'subject'),
(28, '00001', 'Milk', '1 at hashi', '10'),
(29, '00001', 'milk', '8', '8'),
(30, '00001', 'Romania', 'What is the capital city of Italy', 'Rome');

-- --------------------------------------------------------

--
-- Table structure for table `zoom_meetings`
--

CREATE TABLE `zoom_meetings` (
  `zoom_meeting_id` int(11) NOT NULL,
  `meeting_topic` varchar(255) NOT NULL,
  `meeting_agenda` text DEFAULT NULL,
  `meeting_date_and_time` datetime DEFAULT NULL,
  `meeting_link` varchar(255) DEFAULT NULL,
  `invitees` enum('students','teachers','teachers_students') NOT NULL DEFAULT 'students'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zoom_meetings`
--

INSERT INTO `zoom_meetings` (`zoom_meeting_id`, `meeting_topic`, `meeting_agenda`, `meeting_date_and_time`, `meeting_link`, `invitees`) VALUES
(2, 'Reading', 'Help', '2024-03-25 14:10:00', 'https://us05web.zoom.us/j/83317755270?pwd=py8xEeNQ2Q6JRgw6IUfytdNbZbXyh4.1', 'teachers_students'),
(3, 'Discussion', 'To evaluate project', '2024-03-25 16:04:00', 'https://us05web.zoom.us/j/83317755270?pwd=py8xEeNQ2Q6JRgw6IUfytdNbZbXyh4.1', 'students'),
(5, 'Help', 'To contribute', '2024-03-25 16:34:00', 'https://us05web.zoom.us/j/83317755270?pwd=py8xEeNQ2Q6JRgw6IUfytdNbZbXyh4.1', 'teachers'),
(7, 'Renovate', 'To revoutionize world', '2024-03-25 16:37:00', 'https://us05web.zoom.us/j/83317755270?pwd=py8xEeNQ2Q6JRgw6IUfytdNbZbXyh4.1', 'teachers_students');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meeting_students`
--
ALTER TABLE `meeting_students`
  ADD PRIMARY KEY (`zoom_meeting_id`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `meeting_teachers`
--
ALTER TABLE `meeting_teachers`
  ADD PRIMARY KEY (`zoom_meeting_id`,`teacher_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_inquiry`
--
ALTER TABLE `question_inquiry`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `user_responses`
--
ALTER TABLE `user_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zoom_meetings`
--
ALTER TABLE `zoom_meetings`
  ADD PRIMARY KEY (`zoom_meeting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `question_inquiry`
--
ALTER TABLE `question_inquiry`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_responses`
--
ALTER TABLE `user_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `zoom_meetings`
--
ALTER TABLE `zoom_meetings`
  MODIFY `zoom_meeting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meeting_students`
--
ALTER TABLE `meeting_students`
  ADD CONSTRAINT `meeting_students_ibfk_1` FOREIGN KEY (`zoom_meeting_id`) REFERENCES `zoom_meetings` (`zoom_meeting_id`),
  ADD CONSTRAINT `meeting_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `meeting_teachers`
--
ALTER TABLE `meeting_teachers`
  ADD CONSTRAINT `meeting_teachers_ibfk_1` FOREIGN KEY (`zoom_meeting_id`) REFERENCES `zoom_meetings` (`zoom_meeting_id`),
  ADD CONSTRAINT `meeting_teachers_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
