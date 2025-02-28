<?php
// session_start(); // Don't forget to start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">

  <title>Navbar with Notification Pop-up</title>
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
    }

    .navbar {
      width: 100%;
      height: 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      padding: 10px 20px;
      border-bottom: 1px solid #e0e0e0;
    }

    .logo-text {
      font-size: 32px;
      font-weight: bold;
      color: black;
    }

    .nav-links {
      display: flex;
      gap: 25px;
    }

    .nav-links a {
      text-decoration: none;
      color: black;
      font-size: 16px;
    }

    .login-btn a {
      text-decoration: none;
      color: red;
      border: 1px solid red;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 18px;
      font-weight: bold;
      margin-left: 10px;
    }

    .login-btn a:hover {
      transition: all 0.3s;
      background-color: red;
      color: white;
    }

    .notification-popup {
      position: fixed;
      top: 70px;
      right: 20px;
      background-color: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      display: none;
      width: 250px;
      z-index: 1000;
      color: black;
    }

    .notification-popup h4 {
      margin: 0 0 10px 0;
    }

    .notification-popup ul {
      list-style-type: none;
      padding: 0;
    }

    .notification-popup ul li {
      margin-bottom: 8px;
      font-size: 14px;
    }

    .notification-popup .close-btn {
      background-color: red;
      color: white;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 5px;
      margin-top: 10px;
    }

    .notification-icon-wrapper {
      position: relative;
      display: inline-block;
      margin-right: 10px;
    }

    .notification-badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background-color: red;
      color: white;
      border-radius: 50%;
      font-size: 12px;
      width: 18px;
      height: 18px;
      display: flex;
      justify-content: center;
      align-items: center;
      display: none;
      /* Hidden by default */
    }

    @media screen and (max-width: 768px) {
      .nav-links {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 0;
        background-color: white;
        width: 100%;
        padding: 10px 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .nav-links.active {
        display: flex;
      }

      .hamburger {
        display: block;
      }

      .login-btn {
        display: none;
      }
    }
    /* Dropdown Container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Button */
.dropbtn {
  text-decoration: none;
  color: black;
  font-size: 16px;
  cursor: pointer;
}

/* Dropdown Content */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 1;
  border-radius: 5px;
}

/* Dropdown Links */
.dropdown-content a {
  color: black;
  padding: 5px 7px;
  text-decoration: none;
  display: block;
  font-size: 15px;
  border-bottom: 1px solid #f0f0f0;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

/* Show Dropdown on Hover */
.dropdown:hover .dropdown-content {
  display: block;
}
/* Down Arrow */
#down {
  /* border: solid black;
  border-width: 0 4px 4px 4px; */
  display: inline-block;
  padding: 4px;
  margin-left:-2px;
  transform: rotate(0deg);
  transition: transform 0.4s ease;
}

/* Rotate Arrow on Hover */
.dropdown:hover #down {
  transform: rotate(-180deg);
}


  </style>
</head>

<body>
  <header class="navbar">
    <div class="logo">
      <a href="dis_car.php"> <span class="logo-text">Car<span style="color: red;">ola</span></span></a>
    </div>
    <nav class="nav-links">
      <a href="dis_car.php" class="active">Home</a>
      <a href="car_list1.php">Car Fleet</a>
      <div class="dropdown">
        <a href="#" class="dropbtn">Pages <i id="down" class="fa-solid fa-angle-down"></i></a>
        <div class="dropdown-content">
          <a href="about_us.php">About Us</a>
          <a href="our_team.php">Our Team</a>
          <a href="testimonials.php">Testimonials</a>
          <a href="privacy.php">Privacy Policy</a>
          <a href="t&c.php">T&C</a>
          <a href="gallery.php">Gallery</a>
          <a href="servece_area.php">Service area</a>
          <a href="faq.php">FAQ</a>
        </div>
      </div>
      <a href="#">News</a>
      <a href="contact_us.php">Contact</a>
    </nav>

    <div class="login-btn">
      <?php if (!isset($_SESSION["alogin"])) { ?>
        <a href="login.php">Login/Register</a>
      <?php } else { ?>
        <div class="notification-icon-wrapper">
          <a href="#" id="notification-icon"><i class="fa fa-bell"></i></a>
          <span class="notification-badge" id="notification-badge">0</span>
        </div>
        <a href="profile.php"><i class="fa fa-user-circle"></i></a>
        <a href="logout.php">Logout</a>
      <?php } ?>
    </div>
  </header>

  <!-- Notification Pop-up -->
  <div class="notification-popup" id="notificationPopup">
    <h4>Notifications</h4>
    <ul id="notificationList">
      <li>No new notifications.</li>
    </ul>
    <button class="close-btn" onclick="hidePopup()">Close</button>
  </div>

  <script>
    const notificationIcon = document.getElementById('notification-icon');
    const notificationPopup = document.getElementById('notificationPopup');
    const notificationBadge = document.getElementById('notification-badge');

    notificationIcon.addEventListener('click', function(e) {
      e.preventDefault();
      togglePopup();
    });

    function togglePopup() {
      if (notificationPopup.style.display === 'block') {
        notificationPopup.style.display = 'none';
      } else {
        notificationPopup.style.display = 'block';
        loadNotifications(); // Simulate loading notifications
      }
    }

    function hidePopup() {
      notificationPopup.style.display = 'none';
    }

    function loadNotifications() {
      const notificationList = document.getElementById('notificationList');
      notificationList.innerHTML = '<li>Loading notifications...</li>';

      fetch('fetch_notifications.php')
        .then(response => response.json())
        .then(data => {
          notificationList.innerHTML = '';
          if (data.error) {
            notificationList.innerHTML = `<li>${data.error}</li>`;
            updateBadge(0);
            return;
          }

          if (data.length > 0) {
            data.forEach(notification => {
              const li = document.createElement('li');
              li.textContent = notification;
              notificationList.appendChild(li);
            });
            updateBadge(data.length);
          } else {
            notificationList.innerHTML = '<li>No new notifications.</li>';
            updateBadge(0);
          }
        })
        .catch(error => {
          notificationList.innerHTML = '<li>Error loading notifications.</li>';
          updateBadge(0);
        });
    }

    function updateBadge(count) {
      if (count > 1) {
        notificationBadge.textContent = count;
        notificationBadge.style.display = 'flex';
      } else {
        notificationBadge.style.display = 'none';
      }
    }

    // Auto-refresh notifications every 6 seconds
    setInterval(loadNotifications, 6000);

    // Initial load
    loadNotifications();
  </script>
</body>

</html>