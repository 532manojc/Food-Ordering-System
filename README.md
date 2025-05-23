# 🍽️ Food Ordering Website 
This is a dynamic and fully functional **Food Ordering Website** that I developed to strengthen my skills in PHP and MySQL. The project features a complete food browsing and ordering platform, where users can explore various categories and menu items, and place orders with ease. An admin panel is also included for managing the website content and tracking orders.

---

## 🛠 Technologies Used

- **HTML5** – For structuring the content and layout  
- **CSS3** – For styling the user interface and making it responsive  
- **PHP (Procedural)** – For backend logic, server-side scripting, and database connectivity  
- **MySQL** – For storing data like food items, categories, and customer orders  

---

## 🔑 Key Features

- Users can browse food categories and individual food items effortlessly  
- Smooth and simple ordering experience  
- Admin dashboard to:
  - Manage food categories  
  - Add, edit, and delete food items  
  - View, manage, and update order status  
- Clean and responsive UI for a user-friendly browsing experience  
- Seamless integration between front-end and back-end components  

---

## 📁 Getting Started

### Prerequisites

- XAMPP (or any local server setup with Apache & MySQL)  
- A code editor such as Visual Studio Code, Sublime Text, or Brackets  

### Setup Instructions

1. **Download or Clone the Project**
   - Place the project folder in the following directory:  
     `C:\xampp\htdocs\`

2. **Start XAMPP**
   - Launch Apache and MySQL from the XAMPP Control Panel

3. **Set Up the Database**
   - Open `http://localhost/phpmyadmin` in your browser  
   - Create a new database (e.g., `food-order`)  
   - Import the provided `.sql` file into the newly created database  

4. **Update Configuration**
   - Navigate to `config/constants.php`  
   - Make sure the following constants are correctly configured:
   ```php
   define('SITEURL', 'http://localhost/food-order/');
   define('LOCALHOST', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_NAME', 'food-order');
### 5. Run the Application

Open your browser and go to:  
`http://localhost/food-order/`

The website should now be running locally.

---

## 🎯 Project Motivation

I built this project to deepen my understanding of how a complete web application works—from front-end design to back-end data handling. Through this project, I learned how to structure and style content, manage data with MySQL, and create an admin dashboard for efficient site management. My goal was to provide users with a smooth and intuitive food ordering experience while ensuring the system remains easy to manage from the backend.
