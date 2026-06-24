-- Create Travel Guide Database
CREATE DATABASE IF NOT EXISTS travel_guide;
USE travel_guide;

-- Countries Table
CREATE TABLE IF NOT EXISTS countries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Places Table
CREATE TABLE IF NOT EXISTS places (
    id INT AUTO_INCREMENT PRIMARY KEY,
    country_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    category VARCHAR(50),
    rating DECIMAL(3,1) DEFAULT 4.5,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (country_id) REFERENCES countries(id)
);

-- Blog Posts Table
CREATE TABLE IF NOT EXISTS blog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    image VARCHAR(255),
    author VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tips Table
CREATE TABLE IF NOT EXISTS tips (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Accounts Table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- User Accounts Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    bio TEXT NULL,
    home_country VARCHAR(100) NULL,
    travel_style VARCHAR(60) NULL,
    dream_destination VARCHAR(120) NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Saved Places Table
CREATE TABLE IF NOT EXISTS saved_places (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    place_id INT NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_user_place (user_id, place_id),
    KEY saved_places_user_id (user_id),
    KEY saved_places_place_id (place_id),
    CONSTRAINT saved_places_user_fk FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT saved_places_place_fk FOREIGN KEY (place_id) REFERENCES places(id) ON DELETE CASCADE
);

-- Sample Countries Data
INSERT INTO countries (name, description, image) VALUES
('France', 'France is a transcontinental country spanning Western Europe and overseas territories. It is the largest country in Western Europe by area.', 'countries/france.jpg'),
('Italy', 'Italy is a country consisting of a continental part and several islands surrounding it. Located in Southern Europe, it is the tenth-largest country by total area in Europe.', 'countries/italy.jpg'),
('Spain', 'Spain is a country located in southwestern Europe on the Iberian Peninsula. It is the second-largest country in Western Europe by area, after France.', 'countries/spain.jpg'),
('Germany', 'Germany is located in Central and Western Europe. It is the most populous country in the European Union and the second-most populous country in Europe.', 'countries/germany.jpg'),
('Japan', 'Japan is an island nation in East Asia. It is situated in the northwest of the Pacific Ocean and is bordered by the Sea of Japan on the west.', 'countries/japan.jpg'),
('Thailand', 'Thailand, officially the Kingdom of Thailand, is a country in Southeast Asia. The country is known for its tropical beaches, ornate temples, and delicious cuisine.', 'countries/thailand.jpg');

-- Sample Places Data
INSERT INTO places (country_id, name, description, image, category, rating) VALUES
(1, 'Eiffel Tower', 'An iconic wrought-iron lattice tower on the Champ de Mars in Paris. It is the symbol of Paris and one of the most visited monuments in the world.', 'places/eiffel-tower.jpg', 'Monument', 4.8),
(1, 'Louvre Museum', 'The world\'s largest art museum and a historic monument in Paris. It is a central landmark of the city and remains the most visited museum worldwide.', 'places/louvre.jpg', 'Museum', 4.7),
(2, 'Colosseum', 'An ancient amphitheatre in Rome. It is one of the most iconic structures of Imperial Rome and one of the most popular tourist attractions in Italy.', 'places/colosseum.jpg', 'Monument', 4.9),
(2, 'Vatican City', 'An independent city-state surrounded by Rome, Italy. It is an architectural and engineering marvel with the famous St. Peter\'s Basilica.', 'places/vatican.jpg', 'Religious', 4.6),
(3, 'Sagrada Familia', 'A large Roman Catholic basilica under construction in Barcelona. It is one of the most recognizable works of Catalan Modernism.', 'places/sagrada-familia.jpg', 'Religious', 4.7),
(5, 'Mount Fuji', 'An active stratovolcano in Japan. It is Japan\'s tallest mountain and is famous worldwide and is frequently depicted in art and photographs.', 'places/mount-fuji.jpg', 'Mountain', 4.8),
(5, 'Fushimi Inari Shrine', 'A Shinto shrine in southern Kyoto famous for its thousands of vermillion torii gates. It is one of Japan\'s most iconic temples.', 'places/fushimi-inari.jpg', 'Religious', 4.7),
(6, 'Grand Palace', 'The official residence of the Kings of Thailand. It is one of Thailand\'s most sacred sites and a stunning example of Thai architecture.', 'places/grand-palace.jpg', 'Palace', 4.5);

-- Sample Blog Posts
INSERT INTO blog (title, content, image, author) VALUES
('Top 10 Travel Destinations in 2024', 'Discover the most beautiful and must-visit destinations around the world. From exotic beaches to historic landmarks...', 'blogs/travel-2024.jpg', 'John Smith'),
('Budget Travel Tips for Europe', 'Learn how to explore Europe without breaking the bank. Find affordable accommodations, cheap flights, and great food experiences...', 'blogs/budget-europe.jpg', 'Sarah Johnson'),
('Ultimate Southeast Asia Adventure', 'Experience the magic of Southeast Asia with this comprehensive travel guide covering Thailand, Vietnam, Cambodia and more...', 'blogs/southeast-asia.jpg', 'Mike Chen');

-- Sample Admin Account
INSERT INTO admins (username, password) VALUES
('admin', 'admin123');

-- Sample Tips
INSERT INTO tips (title, description, category) VALUES
('Pack Light', 'Only pack essentials to make traveling easier and more enjoyable.', 'Packing'),
('Learn Local Phrases', 'Learning basic phrases in the local language helps you connect with locals and get better travel experiences.', 'Culture'),
('Visit During Off-Season', 'Traveling during off-season saves money and allows you to experience destinations without large crowds.', 'Budget'),
('Get Travel Insurance', 'Always purchase travel insurance to protect yourself against unexpected events during your journey.', 'Safety'),
('Try Local Cuisine', 'Don\'t just eat at restaurants - try street food and local markets to experience authentic flavors.', 'Food');
