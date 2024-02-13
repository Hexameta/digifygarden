-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 07:38 PM
-- Server version: 10.5.19-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egarden`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `log_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`log_id`, `name`, `ad_email`, `password`) VALUES
(221130, 'yaseen', 'yyaseen080@gmail.com', 'f00d2fc4bb1fca1a46a1ef5ed1866182'),
(332241, 'Jino', 'jinomanoj3@gmail.com', '15ea852d67adc5f5f4c4010ac470f42d'),
(443352, 'Admin', 'digifyadmin@gmail.com', '0e748d266a37bd2afafe97e05c3aca75');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clg`
--

CREATE TABLE `tbl_clg` (
  `u_id` varchar(20) NOT NULL,
  `c_name` varchar(120) NOT NULL,
  `uni_name` varchar(120) NOT NULL,
  `a_id` int(10) NOT NULL,
  `mobnum` varchar(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `clg_reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clg`
--

INSERT INTO `tbl_clg` (`u_id`, `c_name`, `uni_name`, `a_id`, `mobnum`, `email`, `clg_reg_date`) VALUES
('C-11610', 'Al Ameen', 'Mahatma Gandhi', 42, '9823351842', 'alameencollege@gmail.com', '2023-03-08 09:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clg_address`
--

CREATE TABLE `tbl_clg_address` (
  `a_id` int(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pincode` int(6) NOT NULL,
  `district` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clg_address`
--

INSERT INTO `tbl_clg_address` (`a_id`, `city`, `pincode`, `district`, `state`) VALUES
(42, 'Edathala', 683561, 'Ernakulam', 'Kerala');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clg_login`
--

CREATE TABLE `tbl_clg_login` (
  `log_id` int(10) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` int(2) NOT NULL,
  `remarks` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clg_login`
--

INSERT INTO `tbl_clg_login` (`log_id`, `u_id`, `password`, `status`, `remarks`) VALUES
(14, 'C-11610', 'c2e9c348d0eacc75a35ddec5dad48bc5', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offers`
--

CREATE TABLE `tbl_offers` (
  `o_id` int(11) NOT NULL,
  `tree_id` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `coupon_code` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer_winners`
--

CREATE TABLE `tbl_offer_winners` (
  `winner_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `winner_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `about` longtext NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`about`, `id`) VALUES
('Digital Garden is a platform through which colleges can easily make your garden digital and share it with students. This initiative helps colleges to display the data of a particular tree in their garden, which is readily available on this website and also helps students to participate in planting more trees and be more involved.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scan_log`
--

CREATE TABLE `tbl_scan_log` (
  `id` int(11) NOT NULL,
  `tree_id` varchar(50) NOT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_tree`
--

CREATE TABLE `tbl_tree` (
  `t_id` varchar(30) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `t_name` longtext NOT NULL,
  `family` longtext NOT NULL,
  `synonym` longtext NOT NULL,
  `com_name` longtext NOT NULL,
  `f_period` longtext NOT NULL,
  `origin` longtext NOT NULL,
  `habitat` longtext NOT NULL,
  `uses` longtext NOT NULL,
  `key_char` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tree`
--

INSERT INTO `tbl_tree` (`t_id`, `u_id`, `t_name`, `family`, `synonym`, `com_name`, `f_period`, `origin`, `habitat`, `uses`, `key_char`) VALUES
('c-2303202318422', 'c-11610', 'Tephrosia purpurea', ' Fabaceae', 'Glycyrrhiza mairei ', 'Fish poison, wild indigo.', ' Flowering: October-December. ', 'originated from the Indian subcontinent and China ', 'India and sri lanka', 'It is used in the treatment of leprosy, ulcers, asthma, and tumors, as well as diseases of the liver, spleen, heart, and blood.', 'It has a long stout taproot, many slender branches, erect or decumbent at the base. The stems are cylindrical, woody at the base, with stiff coarse hairs, frequently reddish in colour.'),
('c-2303202318702', 'c-11610', 'MORUS', ' MORACEAE', 'White Mulberry, Common Mulberry and Silkworm Mulberry ', 'MULBERRIES ', 'As long as eight or nine years ', 'BRAZIL and UNITED STATES ', ' Morus alba commonly invades old fields, roadsides, forest edges, urban environments, and other disturbed areas ', 'Popularly, fruits, roots, and leaves of Morus alba are used for the treatment of dizziness, insomnia, premature aging.', 'Morus alba is a fast growing, deciduous, medium-sized tree that grows to a height of 25-35 m '),
('C-2303202322538', 'C-11610', 'Pterocarpus marsupium', ' Legumes', ' Malabar kino,Indian kino, Vijayasar, or Venkai', 'Pitsal, Piyasal, Pitsal, Piyasal, Bija sal, Murga', ' Flowering time :: June to October. Fruiting time ', 'It is native to India, Nepal and Srilanka.', 'Found in fully exposed deciduous forests from 250-1400m. Common. Peninsular India and Sri Lanka.', 'Heartwood of Vijaysar is antibiotic and hypoglycaemic, and is used to control blood sugar. Kino gum, obtained from incisions in bark, has astringent, anti-diarrhoeal, and anti-haemorrhagic properties. Leaves are used externally to treat boils, sores, and other skin diseases, while flowers are febrifuge.', 'Deciduous trees, to 30 m high, bark 10-15 mm, surface grey or greyish-black, rough, deeply vertically cracked, exfoliations small, irregular, fibrous; blaze pink; exudation blood-red. Leaves imparipinnate, alternate; stipules small, lateral, cauducous; rachis 6.5-11.1 cm long, slender, pulvinate, glabrous; leaflets 5-7, alternate, estipulate; petiolule 6-10 mm, slender, glabrous; lamina 3.5-12.5 x 2-7 cm, elliptic-oblong, oblong-ovate or oblong. Flowers bisexual, yellow, in terminal and axillary panicles . '),
('c-2303202324485', 'c-11610', 'ASPARAGUS RACEMOSUS', '  Liliaceae', 'Asparagopsis abyssinica', 'Satawar, Satamuli, Satavari', ' Flowering and fruiting occur in Decemberâ€“Januar', ' Africa through southern Asia, including the Indian subcontinent, to northern Australia.', ' Its habitat is common at low altitudes in shade and in tropical climates throughout Asia, Australia and Africa. Out of several species of Asparagus g', 'Ayurveda, effective in treating madhur rasam, madhur vipakam, seet-veeryam, som rogam, chronic fever and internal heat', 'racemosus is a woody climber growing to 1-2 m in height. The leaves are like pine needles, small and uniform and flowers are white and have small spikes. This plant belongs to the genus Asparagus which has recently moved from the sub family Asparagae in the family Liliaceae to a newly created family Asparagaceae.'),
('c-2303202326802', 'c-11610', 'Ficus religiosa', '  It belongs to the Moraceae, the fig or mulberry family. ', 'peepalam', ' It is also known as the bodhi tree, pippala tree, peepul tree, peepal tree or ashwattha tree .', ' Leaf Fall. November--December ; Flowering. Novemb', ' To the Indian subcontinent and Indochina', 'Southeast Asia, southwest China, India and the Himalayan foothills', ' antiulcer, antibacterial, antidiabetic, in the treatment of gonorrhea and skin diseases.', 'The characteristic heart-shaped leaves are long-petioled with the apex drawn into a tail-like structure'),
('c-2303202328998', 'c-11610', 'SIMAROUBA GLAUCA', ' Simaroubaceae', 'Bitterwood, Paradise tree.', ' Aceituno, Simarouba or Tree of heaven', 'December to January', 'Florida, South America, and the Caribbean', 'warm, humid, tropical regions', 'used in the preparation of quality furniture, toys, matches, as pulp (in paper making).', 'Leaves dark green above; oblong, and often notched or smooth at the apex'),
('c-2303202334005', 'c-11610', 'Gyrocarpus americanus', ' Hernandiaceae', ' Gyrocarpus asiaticus var. philippinensis Meisn. ', 'helicopter tree, propeller tree, whirly whirly tree, stinkwood or shitwood.', 'FLOWERS mostly March to May; flowering while losin', 'greek', 'Tropical Africa to Pacific, Central Mexico to Venezuela.', ' The boles of Gyrocarpus americanus are traditionally used for dug-out canoes. The wood is used for roof laths, wall covering, insulation, toys, model making and carvings. In tropical Asia it is additionally used for wooden clogs, light furniture, boxes, crates, trays and floats.', 'An interesting tree with a smooth, grey to silvery white trunk, and ovoid fruit crowned with 2 wings, which look remarkably like the slender wings of a .'),
('c-2303202336463', 'c-11610', 'Milkweed Plant', ' Apocynaceae', ' Asclepias verticillata. tuber root. Asclepias subverticillata. horsetail milkweed. Asclepias meadii. whorled milkweed. purple silkweed  ', 'Crown Flower  ', 'Fall is the best time for planting milkweed seeds.  ', 'It is native to southern Canada and much of the United States east of the Rocky Mountains, excluding the drier parts of the prairies.  ', 'It is frequently found in fence rows, on roadsides, in fields, and in prairies and pastures.  ', 'Many indigenous tribes applied milkweed sap for wart removal and chewed its roots to treat dysentery. It was also used in salves and infusions to treat swelling, rashes, coughs, fevers and asthma. Milkweed was even added to dishes for flavor, or to thicken soups.  ', ' thick stemmed; grows upright ; Leaves: elliptical and opposite; velvety on upper surface and downy underneath ; Flower and Fruit (seedpods):.  '),
('c-2303202336964', 'C-11610', 'palm', 'monocotyledonous', 'Arecaceae  ', 'palms  ', 'none ', 'America  ', 'Most palms are native to tropical and subtropical climates.   ', 'Date wood, pits for storing dates, and other remains of the date palm have been found in Mesopotamian sites  ', 'diversity is highest in wet, lowland forests.   '),
('c-2303202339167', 'c-11610', 'BAUHINIA VARIEGATA', ' LEGUME FAMILY ,FABACEAE', 'BAUHINIA CHINENSIS', 'ORCHID TREE', 'From September through November', 'native to an area from China through Southeast Asia to the Indian subcontinent. ', 'temperate and tropical China, the Indian Sub-continent (i.e. Bhutan, India, Nepal and Pakistan) and south-eastern Asia (i.e. Laos, Myanmar, Vietnam an', ' bark is traditionally used as tonic and in treatment of ulcers. It is also useful in skin diseases. The roots are used as antidote to snake poison', 'small to medium-sized deciduous tree with a short bole and spreading crown, attaining a height of up to 15 m and diameter of 50 cm'),
('c-2303202340509', 'c-11610', 'Biancaea sappan', ' Fabaceae', 'H Biancaea sappan (L.) Tod. is a synonym of Caesalpinia sappan L. This name is a synonym of Caesalpinia sappan L. .', 'Sappanwood,Redwood', 'Fruits are formed 5â€“15 days after flowering and ', 'It is a native tropical asia', 'Asia - China, southern India, Myanmar, Thailand, Malaysia, Cambodia, Laos, Vietnam.', 'This plant has many uses. It has antibacterial and anticoagulant properties. It also produces a valuable reddish dye called brazilin, used for dyeing fabric as well as making red paints and inks.', 'Biancaea sappan can be infected by twig dieback (Lasiodiplodia theobromae).'),
('c-2303202349459', 'c-11610', 'Black Plum', ' Myrtaceae', 'Syzygium cumini L. (synonym: Syzygium jambolana, Eugenia jambolana, Eugenia cumini) ', 'Indian blackberry or Jamun. ', 'Syzygium cumini trees start flowering from March t ', ' widely distributed in Asian countries such as Malaysia, Thailand, and the Philippines. ', 'S. cumini is a fast-growing tropical and sub-tropical tree preferring moist, riverine habitats, that is valued for its fruit, timber and as an ornamen ', 'The bark is acrid, sweet, digestive, astringent to the bowels, anthelmintic and used for the treatment of sore throat, bronchitis, asthma, thirst, biliousness, dysentery and ulcers. ', 'Fairly fast-growing tree with dense crown, reaches full size in 40 years. Typically forks into multiple trunks at around 0.9-1.5m near the ground. Mature leaves glossy dark green with yellow mid-rib, young leaves pinkish, scented like turpentine. Flowers small, produced in powderpuff inflorescences, fragrant. '),
('C-2303202352843', 'C-11610', 'Phyllanthus emblica', ' Phyllanthaceae', 'emblic , emblic myrobalan , myrobalan , Indian gooseberry , Malacca tree , amla', 'Amla', 'Amla cultivation is done in the month of July to S', 'What is the origin of amla plant?  Amla is native to the subtropical South Asian countries of India, Pakistan, and Bangladesh.', 'Found along hill slopes, on exposed slopes in dry deciduous forests above 800-1500m.', 'The amla fruit is eaten raw or cooked into various dishes, such as dal (a lentil preparation) and amle ka murabbah, a sweet dish made by soaking the berries in sugar syrup until they are candied. It is traditionally consumed after meals. In the Batak area of Sumatra, Indonesia, the inner bark is used to impart an astringent, bitter taste to the broth of a traditional fish soup known as holat.', 'The tree is small to medium in size, reaching 1â€“8 m (3 ft 3 in â€“ 26 ft 3 in) in height. The branchlets are not glabrous or finely pubescent, 10â€“20 cm (3.9â€“7.9 in) long, usually deciduous; the leaves are simple, subsessile and closely set along branchlets, light green, resembling pinnate leaves. The flowers are greenish-yellow. The fruit is nearly spherical, light greenish-yellow, quite smooth and hard on appearance, with six vertical stripes or furrows. The fruit is up to 26 mm (1.0 in) in diameter, and, while the fruit of wild plants weigh approximately 5.5 g (0.19 oz), cultivated fruits average 28.4 g (1.00 oz) to 56 g (2.0 oz).'),
('c-2303202355121', 'c-11610', 'PTEROCARPUS  SANTALINUS', ' LEGUMES', ' Red sandalwood, Rakta Chandana', 'Red sandalwood, Rakta Chandana', '12 to 15 years', 'Southern Eastern Ghats mountain range of South India.', 'Grows on dry, hilly, often rocky ground at altitudes ranging from 200 - 1500 m, occasionally found on precipitous hill sides', 'antipyretic, anti-inflammatory, anthelmintic, tonic, hemorrhage, dysentery, aphrodisiac, anti-hyperglycaemic and diaphoretic.', 'The blackish-brown bark is fissured and resembles crocodile skin.'),
('c-2303202356167', 'c-11610', 'PAULOWNIA', ' PAULOWNIACEAE', ' Kiri', 'Empress Tree', '1844', 'Europe and Asia', 'forests, stream banks and some rocky regions', 'making furniture, toys, plywood, musical instruments, housing construction, and for packaging', ' light color with pink reflections and does not have knots'),
('C-2303202360983', 'C-11610', 'Neolamarckia Cadamba', ' Rubiaceae family', 'Nauclea megaphylla, Anthocephalus cadambam, Neonauclea megaphylla, Anthocephalus morindifolius, Samama cadamba, Sarcocephalus cadamba, Nauclea cadamba', 'Common Bur-flower Tree, Kaddam, Leichhardt Pine, Kelempayan, Kelampai, Laran', 'Flowering usually begins when the tree is 4â€“5 ye', ' Native to South and Southeast Asia.', 'An early-succession species, it grows best on deep, moist, alluvial sites, often in secondary forests along riverbanks and in the transitional zone be', 'cadamba are used in the treatment of various ailments such as fever, uterine complaints, blood diseases, skin diseases, tumour, anaemia, eye inflammation and diarrhoea.', 'flowers are sweetly fragrant, red to orange in colour, occurring in dense, globular heads of approximately 5.5 cm (2.2 in) diameter. The fruit of N. cadamba occur in small, fleshy capsules packed closely together to form a fleshy yellow-orange infructescence containing approximately 8000 seeds.'),
('c-2303202371953', 'c-11610', 'Hibiscus', ' mallow', 'roselle, omutete, or sorrel.', 'chembarathi', 'It is more common for the hibiscus to bloom in the', 'The exact origin of Hibiscus rosa-sinensis is unknown, although it has been cultivated in China, Japan and the Pacific islands for a long time. ', 'Originally native to tropical Asia it is now grows throughout warm- temperate, subtropical and tropical regions throughout the world. Hibiscus is easi', 'Hibiscus is used for treating loss of appetite, colds, heart and nerve diseases, upper respiratory tract pain and swelling (inflammation), fluid retention, stomach irritation, and disorders of circulation; for dissolving phlegm; as a gentle laxative; and as a diuretic to increase urine output.', 'The Hibiscus flowers are showy and conspicuous. It is usually borne singly but sometimes can be seen in clusters. The flowers are trumpet shaped and range in colours of red, orange, yellow, pink or purple. There are five or more petals in a Hibiscus flower.'),
('C-2303202381706', 'C-11610', 'Baliospermum Montanum', ' Euphorbiaceae', ' red physic nut, wild castor, wild croton and wild sultan seed.', 'Dantika, Katalavanakku', 'Flowers appear during January-February', ' It is common in Bihar, West Bengal, and Peninsular and Central India.', 'Distribution. Baliospermum montanum is distributed throughout the sub-Himalayan tracts from Khasi Hills to Kashmir. It is common in Bihar, West Bengal', 'The roots and leaves of Baliospermum are cathartic, pungent, thermogenic, purgative, anthelmintic, and diuretic. The roots are used in dropsy, anascara, and jaundice. Decoction of leaves is used for treating asthma. Seeds are purgative, used externally as stimulant, and are rubifacient.', 'Baliospermum montanum is a stout under-shrub 0.9-1.8m in height with herbaceous branches from the roots. Leaves are simple, sinuate-toothed, upper ones small, lower ones large and sometimes palmately 3-5 lobed. Flowers are numerous, arranged in axillary racemes with male flowers above and a few females below. Fruits are capsules, 8- 13mm long and obovoid. Seeds are ellipsoid smooth and mottled.'),
('C-2303202385248', 'C-11610', 'Sterculia foetide', ' Malvaceae', ' bastard poon tree, java olive tree, hazel sterculia, wild almond tree, and skunk tree.', 'Wild almond tree', 'In India, flowers appear in March, and the leaves ', ' East Africa and North Australia', 'Occurs in semi-open tropical forests and coastal areas', 'The seed can be eaten raw, roasted or fried. It is oily and has a pleasant, cacao-like flavour, but is not bitter. When roasted, it tastes like peanutsA fibre is obtained from the bark. The fibre is the inner bark of the tree and, when freshly stripped, has a lace-like character which adapts it for fancy works. It is used for making mats, bags, cordage, and paper.', ' Large deciduous tree with horizontal, whorled branches. Straight trunk has smooth, grey to whitish outer bark and fibrous inner bark.Palmately compound leaves are clustered near the branch tips.'),
('c-2303202385952', 'c-11610', ' Alpinia Calcarata', ' Ginger Family', ' Alpinia roscoeana Steud. [Illegitimate], Synonym, H ; Alpinia simsii Gasp. Synonym, H ; Alpinia spicata Roxb. [Illegitimate], Synonym, H ; Catimbium ', 'Galangal, blue ginger', 'The best time for harvesting of rhizome is last we', ' Alpinia calcarata is cultivated in tropical countries, including Sri Lanka, India, and Malaysia.', 'Most Alpinia are plants of forest understory habitat. Most are pollinated by large bees, but some are pollinated by birds and bats. ', ' Experimentally, rhizomes of Alpinia calcarata are shown to possess antibacterial, antifungal, anthelmintic, antinociceptive, anti-inflammatory, antioxidant, aphrodisiac, gastroprotective, and antidiabetic activities.', 'Fragrant, yellow-white flowers (3-4 cm long) occur in large clusters on a spike-like or racemose inflorescence (10-30 cm long, 5-7 cm wide). The fruit is a round or ellipsoid capsule (1-1.5 cm wide) which contains 2-3 seeds. '),
('c-2303202393683', 'c-11610', 'FIG', ' MORACEAE', 'quandong, yellowwood tree, Pouteria zapota, frijolito, white mangrove, hop hornbeam.,Christmas tree and African sandalwood.', 'Ficus carica (athi payam)', 'Fig trees can take 3 to 4 years to produce a varia', '  Figs originated in the Mediterranean and western asia', 'it is cultivated in warm climates', 'it produce jams,rolls,biscuts,and other types of deserts.', 'it is a small deciduous tree or large shrub growing up to 7-10m(23-33 ft)tall,with smooth white bark'),
('C-2403202311810', 'C-11610', 'Anacardiaceae', 'Cashew family', 'Caju Cashew Apple Cashew nut Cashew-Nut Cashew-nut tree', 'Cashew', '2 to 3 Years', 'South America', 'Native to Northeastern Brazil and Southeastern Venezuela', 'The shell of the cashew seed yields derivatives that can be used in many applications including lubricants, waterproofing, paints, and, starting in World War II, arms production. The cashew apple is a light reddish to yellow fruit, whose pulp and juice can be processed into a sweet, astringent fruit drink or fermented and distilled into liquor.', 'Large and evergreen, growing to 14 metres (46 feet) tall, with a short, often irregularly shaped trunk. '),
('c-2403202315922', 'c-11610', 'myxopyrum smilacifolium', ' oleaceae', 'Chionanthus smilacifolius Wall.', 'Chathuramulla, Chathuravalli, Chathurakkodi.', 'All season', 'India', 'india,southern china,southeast asia,new guinea', 'The treatment of cough, rheumatism, cephalalgia, notalagia and otopathy.', ' The leaves are astringent, acrid, sweet, thermogenic, anodyne, febrifuge and tonic.'),
('C-2403202319217', 'C-11610', 'Aegle mermelos', ' Rutaceae', 'Koovalam , Bael tree & Bilva Plant', 'koovalam', 'Mature bael fruits ripe in 2-3 weeks under ambient', 'Bael trees have been mentioned in writing as far back as 800 BC in India. It grows wild in India, Berma, and other parts of SE Asia.', 'It occurs in dry, open forests on hills and plains at altitudes from 0â€“1,200 m (0â€“3,937 ft) with mean annual rainfall of 570â€“2,000 mm (22â€“79 i', 'Bael is used for constipation, diarrhea, diabetes, and other conditions, but there is no good scientific evidence to support these uses.', ' deciduous, and the crown is compact or dense, with no weeping branches'),
('C-2403202321061', 'C-11610', 'Wrightia tinctoria', ' Apocynaceae ', 'Allamanda verticillata Desf. Alstonia oleandrifolia Lodd. Nerium jaspideum Span.', 'Sweet Indrajao, Pala Indigo Plant, Dyers Oleander.', 'March to May, peaking from April to June. ', 'India, southeast Asia and Australia.', 'arid, semi-arid, gravely or rocky soils and moist regions, especially on dry sandy sites or hillsides and valleys.', 'The oil prepared from the leaves of Wrightia tinctoria is prescribed by many healers for the treatment of psoriasis', 'small to medium-sized deciduous shrub or tree, ranging from 3â€“15 m (10â€“49 ft) in height but also reaching up to 18 m. The bark is smooth, yellowish-brown and about 10 mm thick, producing a milky-white latex. Leaves are simple, oppositely arranged, ovate, obtusely acuminate and are 10â€“20 cm long and 5 cm wide.'),
('c-2403202322706', 'c-11610', 'Terminalia chebula', ' Combretaceae', 'Myrobalanus chebula', 'Kaduka', ' 8â€“10 years', ' native to South Asia from India and Nepal east to southwest China (Yunnan), and south to Sri Lanka, Malaysia, and Vietnam.', 'Terminalia chebula, commonly known as black- or chebulic myrobalan, is a species of Terminalia, native to South Asia from India and Nepal east to southwest China, and south to Sri Lanka, Malaysia, and Vietnam.', 'Its powder is a good astringent dentifrice in loose gums, bleeding and ulceration in gums. It is good to increase appetite, digestive aid, liver stimulant, stomachic, gastrointestinal prokinetic agent, and mild laxative. The powder of T. chebula fruits has been used in chronic diarrhea.', 'Chebulic myrobalan is a large tree with umbrella-shaped crown and crowded branches, growing up to 25 m in height, with a bole girth of 2.5 m. Stem bark is dark brown. Leaves are sub-opposite, ovate or oblong-ovate, 8â€“20 cm long, and deciduous during cold season.'),
('C-2403202326622', 'C-11610', 'Mango tree', 'Anacardiaceae', 'Mangifera austroyunnanensis Hu', 'Maav, Mango tree, Cuckooâ€™s joy', 'January â€“ May', 'Indo-Malaysia', 'Evergreen and semi-evergreen forests and also widely cultivated', 'Fruits edible, young leaves edible, essential oil yielding, timber yielding.', 'Mango trees are evergreen trees with bark dark grey. Leaves simple.'),
('c-2403202333644', 'c-11610', 'Bilimbi', ' Wood sorrels', 'Averrhoa bilimbi ', 'Irumban Puli', 'the tree begins to flower around Feb, blooms and f', 'Moluccas, Indonesia', 'Averrhoa bilimbi is a fruit-bearing tree of the genus Averrhoa, family Oxalidaceae. It is believed to be originally native to the Maluku Islands of In', 'bilimbi is mainly used as a folk medicine in the treatment of diabetes mellitus, hypertension, and as an antimicrobial agent.', 'Bilimbi is a small tree up to 15 meters high. Fruits are fairly cylindrical with five broad rounded longitudinal lobes, and produced in clusters (Figure 1). During maturity stage occurs the maximum increase in fruits weight and dimensions, and their external green colour changes into light yellow'),
('C-2403202340109', 'C-11610', 'DEMO', ' demo', 'demo', 'Demo', 'Demo', 'Demo', 'Demo', 'Demo', 'Demo'),
('C-2403202346848', 'C-11610', 'Araucaria', ' Araucariaceae', 'chile pine, monkey puzzle', 'Monkey Puzzle Tree', 'Once in 2 Years', 'Southern Chile', 'Argentina, Brazil, New Caledonia, Norfolk Island, Australia, New Guinea, Chile and Papua (Indonesia)', ' Treatment of ulcers and wounds.', 'Magnificent evergreens, with apparently whorled branches and stiff, flattened, pointed leaves'),
('C-2403202351837', 'C-11610', 'Murraya koenigii', ' The curry leaf tree belongs to the family Rutaceae. ', ' Mitha Neem in Hindi, and Karuveppilei in Tamilnadu and Surabhinimba in Sanskrit.', 'Curry Leaf Tree, Daun Kari, Indian Curry Tree, Curry Bush', 'Curry Leaves Help in the Circulation of Blood', 'The plant originated in the Tarai region of Uttar Pradesh, India', 'This tree is native to moist forests in India and Sri Lanka.', 'The most popular way to use curry leaves is by adding them to your cooking, specifically when tempering for dals or curries.', 'noted for its pungent, aromatic, curry leaves which are an important flavoring used in Indian/Asian cuisine.'),
('C-2403202355218', 'C-11610', 'Psidium guajava', ' Myrtle family', 'Pant Prabhat, Lalit, Dhareedar, Chittidar', 'Common Guava', 'Throughout the year (except during May and June)', 'Believed to have originated from an area extending from southern Mexico into or through Central America', ' Caribbean, Central America and South America', 'May Help Lower Blood Sugar Levels.May Boost Heart Health.May Help Relieve Painful Symptoms of Menstruation. May Benefit Your Digestive System. May Aid Weight Loss. May Have an Anticancer Effect. May Help Boost Your Immunity. Eating Guavas May Be Good for Your Skin.', 'The fruits are round to pear-shaped and measure up to 7.6 cm in diameter; their pulp contains many small hard seeds (more abundant in wild forms than in cultivated varieties). The fruit has a yellow skin and white, yellow, or pink flesh. The musky, at times pungent, odour of the sweet pulp is not always appreciated.'),
('C-2403202356019', 'C-11610', 'TEAK', '  Lamiaceae', 'Tectona tree, Tectona Grandis, Genus Tectona.', 'Tectona grandis', 'September to December', 'south and southeast Asia, mainly Bangladesh, India, Indonesia, Malaysia, Myanmar, Thailand and Sri Lanka', ' arid areas with only 500 mm of rain per year to very moist forests with up to 5,000 mm of rain per year.', 'This wood is widely used for boats, construction, veneer, furniture, etc.', 'small, fragrant white flowers arranged in dense clusters (panicles) at the end of the branches.'),
('c-2403202361606', 'c-11610', 'wormwood', ' Daisy family', 'bitter cup, bummer', 'kaanjiram', 'June to September', 'Europe', 'arid with shrub steppe vegetation', ' various digestion problems such as loss of appetite, upset stomach, gall bladder disease, and intestinal spasms', 'very bitter and poisonous tree '),
('C-2403202364802', 'C-11610', 'Azadirachta indica', ' Mahogany', ' neem, nimtree or Indian lilac', 'Neem tree', 'A neem tree normally begins bearing fruit after 3-', 'Neem is thought to have originated in Assam and Burma ', ' dry forest areas throughout all of South and Southeast Asia, including Pakistan, Sri Lanka, Thailand, Malaysia, and Indonesia.', 'treatment of inflammation, infections, fever, skin diseases and dental disorders. ', 'Neem trees are attractive broad-leaved evergreens that can grow up to 30 m tall and 2.5 m in girth.'),
('C-2403202369276', 'C-11610', 'Kanjiram', ' demo', 'demo ', 'demo ', 'demo ', 'demo ', 'demo ', 'demo ', 'demo '),
('C-2403202371107', 'C-11610', 'Thal palm', 'monocotyledonous', 'Arecaceae', 'palms', 'none', 'America', 'Most palms are native to tropical and subtropical climates. ', 'Date wood, pits for storing dates, and other remains of the date palm have been found in Mesopotamian sites', 'diversity is highest in wet, lowland forests. '),
('C-2403202375033', 'C-11610', 'JackFruit Tree', 'Moraceaeo', 'Artocarpus heterophyllus, jackfruit tree ', 'Artocarpus heterophyllus', 'February, March and April   ', 'India    ', 'native to tropical Asia and widely grown throughout the wetland tropics for its large fruits and durable wood.', 'People eat the fruit and seeds of jackfruit tree as food or as medicine', '15 to 20 metres (50 to 70 feet) tall at maturity and has large stiff glossy green leaves about 15 to 20 cm (6 to 8 inches) long'),
('c-2403202379464', 'c-11610', 'Acacia mangium', ' Fabaceae', 'Racosperma mangium. Pedley', 'Silver Wattle, Brown Salwood, Sabah Salwood', ' 18-20 months after planting', 'Indonesia, Papua New Guinea and Australia', 'areas of high rainfall in northern Australia, New Guinea and some adjacent islands.', 'Timber,Pulp and paper', 'single-stemmed evergreen tree or shrub that grows to 25-35 m in height. '),
('C-2403202388318', 'C-11610', 'Cassia fistula', '  Fabaceae', ' golden shower, purging cassia,Indian laburnum,or pudding-pipe tree', 'Golden shower tree', ' May-June/July', 'The species is native to the Indian subcontinent and adjacent regions of Southeast Asia, from southern Pakistan through India and Sri Lanka to Banglad', ' deciduous forests ranging from tropical to moist through subtropical forest zones.', ' used in jaundice, piles, rheumatism ulcers and also externally skin eruptions, ring worms and eczema.', 'Bright yellow, fragrant, produced in long pendulous clusters, 30 - 50 cm in length, attractive to insects and butterflies. Long cylindrical pods (40-60cm), black and indehiscent when mature. Seeds covered with edible, blackish-brown, pungent-smelling, sticky sweet pulp.'),
('c-2403202389667', 'C-11610', 'Black Plum', ' Myrtle family', 'Malabar plum, Java plum, black plum ', 'Malabar plum, Java Plum, and Jamun ', 'June â€“ July ', 'India and parts of Southeast Asia ', 'moist, riverine habitats ', 'Used to treat stomach pain,Relieve urinary and digestive problems,Fight against diseases in the heart and lungs. ', ' The leaves are smooth, opposite, shiny, leathery and oval. The flowers are pink or nearly white. The fruits are oval, green to black when ripe, with dark purple flesh. '),
('c-2403202390980', 'c-11610', 'Pomegranate ', ' Punicaceae family', 'Genus Punica.', 'Mathalam', '4-5 years ', 'probably originated in Persia', 'The pomegranate is a fruit-bearing deciduous shrub in the family Lythraceae, subfamily Punicoideae, that grows between 5 and 10 m tall. The pomegranat', 'Various parts of the tree and fruit are used to make medicine. People use pomegranate for high blood pressure, athletic performance, heart disease, diabetes, and many other conditions, but there is no good scientific evidence to support most of these uses. Pomegranate has been used for thousands of years.', 'The fruit is a berry and is between 5 and 12 cm in diameter with a rounded hexagonal shape. The pomegranate usually has a thick reddish skin but can range from yellow to purple and can have around 600 seeds.'),
('c-2403202398559', 'c-11610', 'Peezh', ' Lecythidaceae ', 'Careya orbiculata Miers', 'Careya arborea', 'March to April', 'India', 'forests and grasslands', 'Flowers and young leaves are eaten as salad greens in Thailand. Young fruit is reported to be edible, though seeds are slightly poisonous.', 'Flowers are yellow or white in colour that become large green berries. The tree grows throughout India in forests and grasslands.'),
('C-2503202321675', 'C-11610', 'DEMO', ' demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo'),
('C-2503202343079', 'C-11610', 'DEMO', ' demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo'),
('C-2503202345531', 'C-11610', 'Teak', 'Lamiaceae', 'Malayalam tekka (cognate with Tamil tekku, Telugu teku, and Kannada tegu)', 'Tectona grandis', 'Throughout the year', 'southeast Asia', 'Teak wood habitat grow in areas with rainfall of 1 500 â€“ 2 000 mm/year and a temperature of 27 â€“ 36 Â°C both in the lowlands and highlands.', 'manufacture of outdoor furniture and boat decks.', 'naturally water-resistant and physically very strong and durable'),
('C-2503202349280', 'C-11610', 'DEMO', ' demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo'),
('C-2503202363633', 'C-11610', 'DEMO', ' demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo', 'demo'),
('C-2503202370867', 'C-11610', 'JackFruit Tree', 'Moraceaeo', 'Artocarpus heterophyllus, jackfruit tree', 'Artocarpus heterophyllus', 'February, March and April', 'India ', 'native to tropical Asia and widely grown throughout the wetland tropics for its large fruits and durable wood.', 'People eat the fruit and seeds of jackfruit tree as food or as medicine', '15 to 20 metres (50 to 70 feet) tall at maturity and has large stiff glossy green leaves about 15 to 20 cm (6 to 8 inches) long'),
('C-2503202378508', 'C-11610', 'Erikku', 'Calotropis Gigantea', 'Timber', 'Erikku', 'demo  ', 'demo  ', 'demo  ', 'demo  ', 'demo  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_clg`
--
ALTER TABLE `tbl_clg`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `fkadd` (`a_id`);

--
-- Indexes for table `tbl_clg_address`
--
ALTER TABLE `tbl_clg_address`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_clg_login`
--
ALTER TABLE `tbl_clg_login`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_clg` (`u_id`);

--
-- Indexes for table `tbl_offers`
--
ALTER TABLE `tbl_offers`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `tree_id` (`tree_id`);

--
-- Indexes for table `tbl_offer_winners`
--
ALTER TABLE `tbl_offer_winners`
  ADD PRIMARY KEY (`winner_id`),
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_scan_log`
--
ALTER TABLE `tbl_scan_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tree`
--
ALTER TABLE `tbl_tree`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `fk_tree` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_clg_address`
--
ALTER TABLE `tbl_clg_address`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_clg_login`
--
ALTER TABLE `tbl_clg_login`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_offers`
--
ALTER TABLE `tbl_offers`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_offer_winners`
--
ALTER TABLE `tbl_offer_winners`
  MODIFY `winner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_scan_log`
--
ALTER TABLE `tbl_scan_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_clg`
--
ALTER TABLE `tbl_clg`
  ADD CONSTRAINT `fkadd` FOREIGN KEY (`a_id`) REFERENCES `tbl_clg_address` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_clg_login`
--
ALTER TABLE `tbl_clg_login`
  ADD CONSTRAINT `fk_clg` FOREIGN KEY (`u_id`) REFERENCES `tbl_clg` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_offers`
--
ALTER TABLE `tbl_offers`
  ADD CONSTRAINT `tbl_offers_ibfk_1` FOREIGN KEY (`tree_id`) REFERENCES `tbl_tree` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_offer_winners`
--
ALTER TABLE `tbl_offer_winners`
  ADD CONSTRAINT `tbl_offer_winners_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `tbl_offers` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tree`
--
ALTER TABLE `tbl_tree`
  ADD CONSTRAINT `fk_tree` FOREIGN KEY (`u_id`) REFERENCES `tbl_clg` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `offerInactive` ON SCHEDULE EVERY 1 DAY STARTS '2024-02-14 23:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tbl_offers set status = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
