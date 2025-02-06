<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <style>
        /* Basic Styling */
        body {
            font-family: sans-serif;
        }
        .enquiry-form {
            position: fixed; /* Stay in place */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Center the form */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 1000; /* Ensure it's on top */
            width: 400px; /* Adjust width as needed */
        }

        .enquiry-form h2 {
            margin-top: 0;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: calc(100% - 12px); /* Account for padding and border */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
          height: 100px; /* Adjust height for message box */
        }

        .btn-container {
            text-align: right; /* Align buttons to the right */
        }

        button {
            padding: 10px 20px;
            margin-left: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .close-btn {
            background-color: #ccc;
        }

        .send-btn {
            background-color: #04AA6D; /* Example: Green */
            color: white;
        }

        /* Overlay (Optional - for a semi-transparent background) */
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            z-index: 999; /* Below the form but above other content */
            display: none; /* Hidden by default */
        }
    </style>
</head>
<body>

    <div class="enquiry-form" id="enquiryForm">
        <h2>Enquiry Form</h2>
        <div class="form-group">
            <label for="full-name">Full Name</label>
            <input type="text" id="full-name" name="full-name" required>
        </div>
        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input type="tel" id="mobile" name="mobile" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <div class="btn-container">
            <button class="close-btn" onclick="closeForm()">Close</button>
            <button class="send-btn" onclick="sendMessage()">Send message</button>
        </div>
    </div>

    <div id="overlay"></div>

    <script>
        function openForm() {
            document.getElementById("enquiryForm").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closeForm() {
            document.getElementById("enquiryForm").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }

        function sendMessage() {
            // Here you would typically handle form submission
            // using JavaScript (e.g., fetch API) or by 
            // redirecting to a server-side script.
            alert("Message sent (placeholder)"); // Replace with your logic
            closeForm(); // Close the form after sending
        }

        // Example: Open the form on a button click (you'll need a button in your HTML)
        // <button onclick="openForm()">Open Enquiry Form</button> 
    </script>

</body>
</html>