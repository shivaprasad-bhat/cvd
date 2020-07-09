<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <title>CVD Care App</title>
    <link rel="stylesheet" href="../css/login.css" />
    <style>
        input[type=submit] {
            width: 100%;

        }

        .login-box {
            margin-left: 30%;
            margin-right: 30%;
        }

        @media only screen and (max-width: 750px) {
            .login-box {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <form name="login-form" action="#" method="POST">
        <section class="container">
            <div class="login-box">
                <fieldset>
                    <legend><img id="login-page-image" src="/cvd/src/resources/image.png" alt="Image" class="img-rounded img-fluid"></legend>
                    <h3 align="center"> Registration form</h3> <br>
                    <div>
                        <label for="name">Enter your name*</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Full name, for example. John Cena">
                    </div> <br>
                    <div>
                        <label for="username">Enter your username*</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="User name, for example. johncena">
                    </div> <br>
                    <div>
                        <label for="mobile-num">
                            Enter your mobile number
                        </label>
                        <input type="text" class="form-control" name="mobile-num" id="mobile-num" placeholder="0000000000">
                    </div> <br>
                    <div>
                        <label for="alt-mobile-num">
                            Enter your alternate mobile number
                        </label>
                        <input type="text" class="form-control" name="alt-mobile-num" id="alt-mobile-num" placeholder="0000000000">
                    </div> <br>
                    <div>
                        <label for="email">
                            Enter your email id
                        </label>
                        <br>
                        <input type="email" class="form-control" name="email" id="email" placeholder="abc@abc.com">
                    </div> <br>
                    <div>
                        <label>Select your gender</label>
                        <div class="form-control">
                            <input type="radio" name="gender" id="male" value="male"> Male
                            <input type="radio" name="gender" id="female" value="female"> Female
                            <input type="radio" name="gender" id="other" value="other"> Other
                        </div>
                    </div> <br>
                    <div>
                        <label for="dept">Select Department</label>
                        <select name="department" class="form-control" id="dept">
                            <option value="doctor">Doctor</option>
                            <option value="caregiver">Care Giver</option>
                            <option value="patient">Patient</option>
                        </select>
                    </div> <br>
                    <div>
                        <label for="pass">Create Password</label> <br>
                        <input type="password" class="form-control" name="password" id="pass">
                    </div> <br>
                    <div>
                        <label for="cpass">Confirm Password</label> <br>
                        <input type="password" class="form-control" name="cpassword" id="cpass">
                    </div> <br>
                    <input type="submit" value="Submit" class="btn btn-success"> <br> <br>
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