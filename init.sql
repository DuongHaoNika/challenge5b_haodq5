create database challenge5a;
use challenge5a;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100),
  phone VARCHAR(20),
  role ENUM('teacher', 'student') NOT NULL,
  avatar VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sender_id INT NOT NULL,
  receiver_id INT NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (receiver_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE assignments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  teacher_id INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  file_path VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  deadline DATETIME,
  FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE submissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  assignment_id INT NOT NULL,
  student_id INT NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (assignment_id) REFERENCES assignments(id) ON DELETE CASCADE,
  FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE challenges (
  id INT AUTO_INCREMENT PRIMARY KEY,
  teacher_id INT NOT NULL,
  challenge_hint TEXT,         
  file_path VARCHAR(255) NOT NULL, 
  file_content TEXT,           
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE challenge_attempts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  challenge_id INT NOT NULL,
  student_id INT NOT NULL,
  submitted_answer VARCHAR(255) NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_correct BOOLEAN,  
  FOREIGN KEY (challenge_id) REFERENCES challenges(id) ON DELETE CASCADE,
  FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (username, password, full_name, email, phone, role, avatar) VALUES 
('teacher1', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Teacher One', 'teacher1@example.com', '0123456789', 'teacher', NULL),
('teacher2', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Teacher Two', 'teacher2@example.com', '0123456788', 'teacher', NULL),
('teacher3', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Teacher Three', 'teacher3@example.com', '0123456787', 'teacher', NULL),
('teacher4', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Teacher Four', 'teacher4@example.com', '0123456786', 'teacher', NULL),
('teacher5', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Teacher Five', 'teacher5@example.com', '0123456785', 'teacher', NULL),
('student1', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Student One', 'student1@example.com', '0987654321', 'student', NULL),
('student2', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Student Two', 'student2@example.com', '0987654322', 'student', NULL),
('student3', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Student Three', 'student3@example.com', '0987654323', 'student', NULL),
('student4', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Student Four', 'student4@example.com', '0987654324', 'student', NULL),
('student5', '$2y$10$ExIrGI3q9jPoj.TFO2V6MOTuwLMqC67DhGesU/nLWS6xIps/.CWlm', 'Student Five', 'student5@example.com', '0987654325', 'student', NULL);

INSERT INTO messages (sender_id, receiver_id, content) VALUES
(1, 6, 'Hello, Student One!'),
(6, 1, 'Hello, Teacher One!'),
(2, 7, 'Hello, Student Two!'),
(7, 2, 'Hello, Teacher Two!'),
(3, 8, 'Hello, Student Three!'),
(8, 3, 'Hello, Teacher Three!'),
(4, 9, 'Hello, Student Four!'),
(9, 4, 'Hello, Teacher Four!'),
(5, 10, 'Hello, Student Five!'),
(10, 5, 'Hello, Teacher Five!');

-- Insert assignments
INSERT INTO assignments (teacher_id, title, description, file_path, created_at, deadline) VALUES
(1, 'Laravel Basics Assignment', 'Create a simple Laravel CRUD application for a blog system.', 'assignments/laravel_basics.pdf', NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY)),
(2, 'Database Design Project', 'Design a database schema for an e-commerce platform.', 'assignments/database_design.pdf', NOW(), DATE_ADD(NOW(), INTERVAL 10 DAY)),
(1, 'JavaScript Fundamentals', 'Complete the JavaScript exercises covering functions, arrays and objects.', 'assignments/javascript_fundamentals.pdf', NOW(), DATE_ADD(NOW(), INTERVAL 5 DAY)),
(2, 'CSS Layout Challenge', 'Create responsive layouts using Flexbox and CSS Grid.', 'assignments/css_layout.pdf', NOW(), DATE_ADD(NOW(), INTERVAL 3 DAY)),
(2, 'Final Project Proposal', 'Submit your proposal for the final project including scope and technologies.', 'assignments/final_project.pdf', NOW(), DATE_ADD(NOW(), INTERVAL 14 DAY)),
(1, 'API Development Task', 'Build a RESTful API with authentication using Laravel Sanctum.', 'assignments/api_development.pdf', NOW(), DATE_ADD(NOW(), INTERVAL 12 DAY));

-- Insert challenges
INSERT INTO challenges (teacher_id, challenge_hint, file_path, file_content, created_at) VALUES
(1, 'Look for the flag in the source code comments', 'challenges/web_security_1.zip', 'This file contains a simple web application with vulnerabilities', NOW()),
(2, 'The password is hashed with MD5', 'challenges/crypto_challenge.pdf', 'A document containing encrypted messages to decode', NOW()),
(1, 'Check the network requests in developer tools', 'challenges/api_challenge.json', 'API endpoint with hidden endpoints to discover', NOW()),
(2, 'The solution involves a recursive function', 'challenges/algorithm_task.js', 'JavaScript file with an incomplete algorithm to complete', NOW()),
(2, 'Inspect the cookies and local storage', 'challenges/web_challenge.html', 'HTML file with hidden flags in different storage locations', NOW()),
(1, 'The answer is in the EXIF data', 'challenges/image_analysis.jpg', 'Image file containing hidden metadata', NOW());