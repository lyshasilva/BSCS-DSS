<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
		<link rel="icon" href="pics/DSS_favicon.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="css/index_trial.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Varela+Round:wght@400;700&display=swap">
		
		 <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Retrieve the error parameter from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');

            // Display the error message if it exists
            if (error === 'StudentIDNotFound') {
                const errorMessage = document.createElement('p');
                errorMessage.classList.add('error-message');
                errorMessage.textContent = 'Student ID not found';
                document.body.appendChild(errorMessage);
            } else if (error === 'WrongPassword') {
                const errorMessage = document.createElement('p');
                errorMessage.classList.add('error-message');
                errorMessage.textContent = 'Wrong password';
                document.body.appendChild(errorMessage);
            }else if (error === 'InterfaceNotAvailable') {
                alert('Your interface has not been created yet. Please try again later.');
            }

        });
    </script>
    </head>
    <body>
        <!--<img src="..\Pics\background1.png" class="background" > -->
        <div class="start">
            <div>
              <h1>Log In</h1>
            </div>
            <div class="login-container">

                    <img src="Pics\Log_In_Icon.png" alt="Log_In Icon" class="login-icon">
                    <form action="php/verify.php" method="post">
                        <div class="input-container">
                            <input type="text" id="student_id" name="student_id" required placeholder="Student ID">
                        </div>
                        <div class="input-container">
                            <input type="password" id="pwd" name="pwd" required placeholder="Password">
                        </div>
						<!--
                        <div class="forgot-password">
                            <a href="#">Forgot Password?</a>
                        </div>
                -->
                    <button class= enter-button type="submit">ENTER</button><br>
                    <!--
                        <button class= register-button type="submit">REGISTER</button>
                    -->
                    
                    
                    </form>
                
                   </div>
            </div>

            <?php
            // Retrieve the error parameter from the URL
            $error = isset($_GET['error']) ? $_GET['error'] : '';
        
            // Display the error message if it exists
            if ($error === 'StudentIDNotFound') {
                echo '<p class="error-message">Student ID not found</p>';
            } elseif ($error === 'WrongPassword') {
                echo '<p class="error-message">Wrong password</p>';
            } 
            ?>
            
    </body>
    </html>
