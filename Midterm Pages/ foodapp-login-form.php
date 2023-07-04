<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>

        /* Body styles */
        body {

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif; /* Set the font family */
            margin: 0;
            padding: 0;
            background-color: #f1f1f1; /* Set the background color */
            height: 100vh; /* Set the body height to 100% of the viewport height */

        }

        /* Heading styles */
        h1 {
            color: #333333; /* Set the heading color */
        }

        /* Form styles */
        form {
            margin-top: 20px; /* Add margin at the top of the form */
        }

        /* Label styles */
        label {
            display: inline-block; /* Display labels inline */
            width: 100px; /* Set label width */
        }

        /* Input field styles */
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"] {
            width: 200px; /* Set the input field width */
            padding: 5px; /* Add padding to the input fields */
        }

        /* Submit button and general button styles */
        input[type="submit"],
        button {
            padding: 10px 20px; /* Add padding to the buttons */
            background-color: #FF0000; /* Set the button background color */
            border: none; /* Remove the button border */
            color: #ffffff; /* Set the button text color */
            text-align: center; /* Center the button text */
            text-decoration: none; /* Remove underlines from the button text */
            display: inline-block; /* Display buttons inline */
            font-size: 16px; /* Set the button font size */
            margin: 10px 0; /* Add margin around the buttons */
            cursor: pointer; /* Change the cursor to a pointer on hover */
        }

        /* Unordered list styles */
        ul {
            list-style-type: none; /* Remove bullet points from the list */
            padding: 0; /* Remove padding from the list */
        }

        /* List item styles */
        li {
            margin-bottom: 10px; /* Add margin between list items */
        }

        /* Anchor link styles */
        a {
            text-decoration: none; /* Remove underlines from links */
            color: #333333; /* Set the link text color */
        }

        /* Button and submit button hover styles */
        button:hover,
        input[type="submit"]:hover {
            background-color: #FF9F1C; /* Change the background color on hover */
        }
    </style>

</head>
<body>
    <h1>Login</h1>
    <form action="user-list.html" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>