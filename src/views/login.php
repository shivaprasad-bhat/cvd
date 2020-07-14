<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/login.css" />

    <title>CVD Care App</title>
</head>

<body>
    <script src="../scripts/javascript/validateLogin.js"></script>
    <form name="login-form" action="../scripts/php/login.php" onsubmit="return validateLoginInput()" method="POST">
        <section class="container mt-5">
            <div class="login-box">
                <fieldset>
                    <legend>
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="/cvd/src/resources/logo.png" style="opacity: 0.2;" alt="Card image cap">
                            <div class="card-img-overlay mt-5 pt-5">
                                <h3 class="card-title">Sukhi Hrudaya</h3>
                                <h5 class="card-text">Cardio Vascular Care Project</h5>

                            </div>
                        </div>
                    </legend>
                    <div>
                        <label for="login-type-doctor" class="radio-inline"><input type="radio" name="login-type" id="login-type-doctor" value="doctor"> Doctor |</label>
                        <label for="login-type-caregiver" class="radio-inline"><input type="radio" name="login-type" id="login-type-caregiver" value="caregiver" checked> Care Giver |</label>
                        <label for="login-type-patient" class="radio-inline"><input type="radio" name="login-type" id="login-type-patient" value="patient"> Patient |</label>
                    </div>
                    <label for="login-email">Enter your user name* </label>
                    <input id="login-name" type="text" class="form-control" placeholder="Username (For ex. 'johncena')" name="username">
                    <br>
                    <label for="login-pass">Enter your password*</label>
                    <input type="password" id="login-pass" class="form-control" placeholder="Password" name="password">
                    <br>
                    <button class="buttonClass" type="submit" class="btn btn-primary">Login</button>
                    <div align="center">
                        <a href="/cvd/src">Back To Home Screen</a>
                    </div>
                </fieldset>
                <br>
            </div>
        </section>
    </form>
</body>

</html>