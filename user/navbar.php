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
  </style>
</head>

<body>
  <header class="navbar">
    <div class="logo">
      <span class="logo-text">Car<span style="color: red;">ola</span></span>
    </div>
    <nav class="nav-links">
      <a href="dis_car.php" class="active">Home</a>
      <a href="car_list1.php">Car Fleet</a>
      <a href="#">Pages</a>
      <a href="#">News</a>
      <a href="#">Contact</a>
    </nav>

    <div class="login-btn">
      <?php if (!isset($_SESSION["alogin"])) { ?>
        <a href="login.php">Login/Register</a>
      <?php } else { ?>
        <a href="#" id="notification-icon"><i class="fa fa-bell"></i></a>
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

    notificationIcon.addEventListener('click', function (e) {
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
        return;
      }

      if (data.length > 0) {
        data.forEach(notification => {
          const li = document.createElement('li');
          li.textContent = notification;
          notificationList.appendChild(li);
        });
      } else {
        notificationList.innerHTML = '<li>No new notifications.</li>';
      }
    })
    .catch(error => {
      notificationList.innerHTML = '<li>Error loading notifications.</li>';
    });
}

// function loadNotifications() {
//     const notificationList = document.getElementById('notificationList');
    
//     fetch('fetch_notifications.php')
//         .then(response => response.json())
//         .then(data => {
//             if (data.error) {
//                 console.error(data.error);
//                 return;
//             }

//             // Add new random notification
//             data.forEach(notification => {
//                 const li = document.createElement('li');
//                 li.textContent = notification;
//                 notificationList.appendChild(li);
//             });
//         })
//         .catch(error => {
//             console.error('Error loading random notification:', error);
//         });
// }

// Call this every minute (60000 milliseconds)
setInterval(loadNotifications, 6000);

  </script>
</body>

</html>

