<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tabs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulishy&display=swap" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" type="text/css" href="../assets/css/general.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>

<body>
    <div class="form-wrapper">
        <div class="form-side">
            <form class="my-form" onsubmit="login(event)">
                <div class="form-welcome-row">
                    <h1 style="text-align: center;">Login your account</h1>
                </div>
                <div class="socials-row">
                    <a href="#" title="Use Google">
                        <img src="../assets/icons/google.png" alt="Google">Use Google
                    </a>
                </div>
                <div class="divider">
                    <div class="divider-line"></div> Or <div class="divider-line"></div>
                </div>
                <div class="text-field">
                    <label for="email">Email:
                        <input type="email" id="email" name="email" autocomplete="off" placeholder="Your Email" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                        </svg>
                    </label>
                </div>
                <div class="text-field">
                    <label for="select">Select Monitor:

                    </label>
                    <div class="form-field">
                        <select id="position" name="select" id="#" placeholder="Select your monitor" required>
                            <option value="central"><a href="#">Central Monitor</a></option>
                            <option value="regional"><a href="#">Regional Monitor</a></option>
                            <option value="district"><a href="#">District Monitor</a></option>

                        </select>
                    </div>
                </div>
                <div class="text-field">
                    <label for="password">Password:
                        <input id="password" type="password" name="password" placeholder="Your Password" title="Minimum 6 characters at 
                                    least 1 Alphabet and 1 Number" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                        </svg>
                    </label>
                </div>
                <button type="submit" class="my-form__button">
                    Login
                </button>
                <div class="my-form__actions">
                    <a href="#" title="Create Account">
                        Forgot password?
                    </a>
                    <a href="#" title="Reset Password" style="color: var(--primary)">
                        Reset Password
                    </a>
                </div>
                <p style="text-align: center;">Don't have an account?</p>

                <div class="my-form__signup">
                    <a href="./signup.php" title="Sign Up">
                        Sign Up
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="../assets/js/script.js"></script>
    <script>
        function login(event) {
            event.preventDefault();
            const selEl = document.getElementById("position");
            let loc = "./" + selEl.value + ".php";
            window.location.href = loc;
        }
    </script>
</body>

</html>