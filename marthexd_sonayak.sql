-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 09 Şub 2025, 10:34:36
-- Sunucu sürümü: 10.6.18-MariaDB
-- PHP Sürümü: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `marthexd_sonayak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `discord_products`
--

CREATE TABLE `discord_products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `note` text DEFAULT NULL,
  `yazi` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL,
  `ikinci_resim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `discord_products`
--

INSERT INTO `discord_products` (`id`, `title`, `description`, `note`, `yazi`, `price`, `created_at`, `image_url`, `ikinci_resim`) VALUES
(15, 'Guard Bot', 'Sunucuya karşı saldırıları engeller ve sunucuyu tehlikelere karşı korur.', 'Discord botun altyapı kodları verilmez. Discord botu kendi sunucumuzda barındırılır.', '- Sunucuya yeni biri katıldığında kayıt kanalına hoşgeldin mesajı atar ve kayıtsız rolü verir.\r\n\r\n- Erkek ve kız için ayrı kayıt komutu vardır. İsteğe göre tek kayıt yapılabilir.\r\n\r\n- Yetkili kişi kayıt komutu ile kayıtsız kişiyi kayıt eder.', 30.00, '2024-07-05 19:49:55', 'new/discord-k.png', 'new/3atcqcb.png,new/ksjqy05.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `note` text DEFAULT NULL,
  `yazi` text NOT NULL,
  `zip_file_path` varchar(255) DEFAULT NULL,
  `header_image_path` varchar(255) DEFAULT NULL,
  `bot_images_paths` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `note`, `yazi`, `zip_file_path`, `header_image_path`, `bot_images_paths`, `created_at`) VALUES
(5, 'Hostify - Hosting HTML & WHMCS', 'Hostify, web hosting ihtiyaçlarınızı karşılamak için tasarlanmış güçlü ve kullanıcı dostu bir çözümdür.', 'Dosyanın içinde WHMCS ve HTML şablonları yer almaktadır. Ücretsiz bir şekilde indirebilirsiniz.', '            <p>Hostify, web sitenizin ihtiyaç duyduğu güçlü ve güvenilir hosting çözümlerini sunan bir platformdur. HTML ve WHMCS entegrasyonuyla, hem küçük işletmelerin hem de büyük kurumsal firmaların web hosting gereksinimlerini karşılar.</p>\n            \n            <h2>Hostify\'nin Avantajları:</h2>\n            <ul>\n                <li><strong>HTML ve WHMCS Uyumlu Tasarım:</strong> Profesyonel görünümlü siteler için modern HTML tasarımı.</li>\n                <li><strong>Esnek Hosting Seçenekleri:</strong> Paylaşımlı, VPS, bulut ve özel sunucu seçenekleriyle özelleştirilmiş hosting planları.</li>\n                <li><strong>Güvenilir Performans ve Güvenlik:</strong> Yüksek performans ve güvenlik önlemleriyle sitenizi korur.</li>\n                <li><strong>Profesyonel Teknik Destek:</strong> 7/24 erişilebilir destek ekibiyle hızlı çözümler sunar.</li>\n                <li><strong>Kullanıcı Dostu Yönetim Paneli:</strong> Kolay kullanım ve yönetim paneliyle hosting hesabınızı yönetin.</li>\n            </ul>\n            \n            <p>Hostify, teknolojik altyapısı ve kullanıcı odaklı hizmet anlayışıyla işletmenizin online varlığını güvence altına alır. Güvenilir hosting çözümleri için Hostify\'i tercih edin ve dijital dünyada öne çıkın.</p>\n        ', 'new/uploads/hostifyhtml-12feb2023_3.rar', 'new/uploads/01-Preview.__large_preview.avif', 'new/uploads/t2zodcasarlok9coznk2.jpg,', '2024-07-05 18:06:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Açık','Kapalı') DEFAULT 'Açık',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Moderator','User') DEFAULT 'User',
  `profile_photo` varchar(255) DEFAULT 'new/desktop-wallpaper-polat-alemdar-viral-thumbnail.jpg',
  `bio` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `profile_photo`, `bio`, `updated_at`) VALUES
(1, 'Marthex', 'mehmetg061@gmail.com', '$2y$10$4NOd9vAJucDtlr6eJfxBCO9nLPAVGgjIVuC6kQiTYu7ObXanqUXeO', 'Admin', 'new/profile/200w.gif', NULL, '2024-07-05 17:58:38');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `discord_products`
--
ALTER TABLE `discord_products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `discord_products`
--
ALTER TABLE `discord_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
