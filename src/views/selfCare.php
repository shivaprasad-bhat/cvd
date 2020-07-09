<?php
$_SESSION['page'] = 'self-care';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <link rel="stylesheet" href="/cvd/src/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/cvd/src/css/common.css" />
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <title>Self Care</title>
    <style>
        body {
            color: #873d37;
            font-size: 11pt;
        }

        .top-header {
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        #header-content {
            text-align: center;
            font-size: larger;
            font-weight: bolder;
            margin-top: 2%;
            text-decoration: underline;
        }

        nav {
            background-color: #8B0000;
        }

        p {
            padding: 10px;
        }

        .nav-link {
            background-color: #8B0000;
            color: #ffff;
            margin-left: 30px;
        }

        .nav-link:hover {
            color: black;
        }

        .l-changes {
            margin-bottom: 3%;
            padding-left: 2%;
        }

        .c-title {
            text-align: center;
            font: larger bolder;
            padding-top: 2%;
        }

        aside img {
            margin: 5%;
            padding: 3%;
        }

        .container {
            margin-top: 1%;
            padding: 1%;
        }

        .img-content {
            height: 90%;
            margin: 5%;
            padding: 5%;
            width: 80%;
            box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.4);

        }

        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 16px 28px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <?php
    include_once('../components/navbar.php');
    ?>

    <head>
        <p id="header-content">
            COMPLIANCE TO TREATMENT
        </p>
    </head>

    <section class="container">
        <section class="card">

            <div class="row">
                <aside class="col-md-3">
                    <img class="img-content" src="/cvd/src/resources/lifestyle-img/img2.png" alt="Image">
                </aside>
                <article class="col-md-8">
                    <article class="card-title c-title">
                        Medications & follow up:
                    </article>
                    <p>
                        • Take your medications on right time without skipping or missing the dose to avoid complications. <br>
                        • Do not stop your medications without consulting treating doctor. <br>
                        • Medicines can reduce your risk of heart attack, angina, stroke, or heart failure. <br>
                        • They can help manage symptoms by controlling high blood pressure, high blood cholesterol & improve your quality of life. <br>
                    </p>
                </article>
            </div>
        </section>
    </section>

    <section class="container">
        <section class="card">

            <div class="row">
                <aside class="col-md-3">
                    <img class="img-content" src="/cvd/src/resources/lifestyle-img/img3.png" alt="Image">
                </aside>
                <article class="col-md-8">
                    <article class="card-title c-title">
                        What is the importance of checking Blood Pressure (BP)?
                    </article>
                    <p>
                        • High BP is the single biggest risk factor for heart disease, stroke & other cardiovascular problems. So it needs to be monitored regularly. <br>
                        • Normal BP: 120/80 mm of Hg <br>
                    </p>
                </article>
            </div>
        </section>
    </section>

    <section class="container">
        <section class="card">

            <div class="row">
                <aside class="col-md-3">
                    <img class="img-content" src="/cvd/src/resources/lifestyle-img/img4.png" alt="Image">
                </aside>
                <article class="col-md-8">
                    <article class="card-title c-title">
                        What is the importance of Renal Function Test (RFT) & Liver Function Test (LFT) in cardiac patients?
                    </article>
                    <p>
                        • Patients with Cardiovascular Diseases are more prone for the damage of kidneys & liver. <br>
                        • So RFT & LFT these are simple blood and urine tests that can identify problems with your kidneys, liver and they can help doctors monitor these conditions <br>
                    </p>
                </article>
            </div>
        </section>
    </section>

    <section class="container">
        <section class="card">

            <div class="row">
                <aside class="col-md-3">
                    <img class="img-content" src="/cvd/src/resources/lifestyle-img/img5.png" alt="Image">
                </aside>
                <article class="col-md-8">
                    <article class="card-title c-title">
                        What is the importance of Cholesterol testing?
                    </article>
                    <p>
                        • Abnormal blood lipid (fat) levels have a strong correlation with the risk of coronary artery disease & heart attack. <br>
                        Total cholesterol : 140-200 mg/dL <br>
                        Triglycerides : 60-150 mg/dL <br>
                        HDL cholesterol : 40-60 mg/dL <br>
                        LDL cholesterol : 50-130 mg/dL <br>
                        Total cholesterol/HDL cholesterol ratio : Less than 5 <br>
                    </p>
                </article>
            </div>
        </section>
    </section>

    <section class="container">
        <section class="card">

            <div class="row">
                <aside class="col-md-3">
                    <img class="img-content" src="/cvd/src/resources/lifestyle-img/img6.png" alt="Image">
                </aside>
                <article class="col-md-8">
                    <article class="card-title c-title">
                        What is the importance of Gyco Hb?
                    </article>
                    <p>
                        • It shows what a person’s average blood glucose level was for the 2-3 months before the test & can help determine how well a person’s diabetes is being controlled over time. <br>
                        • Each 1% increase in Hba1c poses 15-18% relative risk of CVDs. <br>
                        Less than 5.7% - Normal <br>
                        5.7 - 6.4% - higher chance of getting diabetes <br>
                        6.5% or higher – Diabetes. <br>
                        • Fasting Blood Sugar (FBS) : 70-100 mg/dL <br></p>
                </article>
            </div>
        </section>
    </section>

    <section class="container">
        <section class="card">

            <div class="row">
                <aside class="col-md-3">
                    <img class="img-content" src="/cvd/src/resources/lifestyle-img/img7.png" alt="Image">
                </aside>
                <article class="col-md-8">
                    <article class="card-title c-title">
                        How do eye check-up help heart disease detection?
                    </article>
                    <p>The eyes reveal important information about your heart health such as having high blood pressure, cholesterol, which contributes to heart disease & may increase your risk of a heart attack. <br>

                        • When you have high cholesterol or high Blood Pressure, it damages the eyes main blood supply. <br>
                    </p>
                </article>
            </div>
        </section>
    </section>
    <section class="container">
        <h3>REFERENCES</h3>
        <div>
            <div>
                Barnett, A. H., & O’Hare, P. (2013). Cardiovascular benefits of incretins. BMJ (Online), 347(7916), 541–545. https://doi.org/10.1136/bmj.f4382 <br>
            </div>
            <div>
                <a href="https://heartinsight.heart.org/February-2014/Why-blood-pressure-matters/" target="_blank">https://heartinsight.heart.org/February-2014/Why-blood-pressure-matters/</a> <br>
                <a href="https://www.cdc.gov/heartdisease/coronary_ad.htm" target="_blank">https://www.cdc.gov/heartdisease/coronary_ad.htm</a> <br>
                <a href="https://www.heart.org/-/media/data-import/downloadables/0/e/6/pe-abh-how-do-i-follow-a-healthy-diet-ucm_300467.pdf" target="_blank">https://www.heart.org/-/media/data-import/downloadables/0/e/6/pe-abh-how-do-i-follow-a-healthy-diet-ucm_300467.pdf</a> <br>
                <a href="https://www.heart.org/en/healthy-living/fitness/walking" target="_blank">https://www.heart.org/en/healthy-living/fitness/walking</a> <br>
            </div>
            <div>
                Nystoriak, M. A., & Bhatnagar, A. (2018). Cardiovascular Effects and Benefits of Exercise. Frontiers in Cardiovascular Medicine, 5(September), 1–11. https://doi.org/10.3389/fcvm.2018.00135 <br>
                Your Guide to Lowering Blood Pressure With DASH. (2009). U.S. DEPARTMENT OF HEALTH AND HUMAN SERVICES National Institutes of Health National Heart, Lung, and Blood Institute. <br>
            </div>

            <div>
                Walker, C., & Reamy, B. V. (2009). Diets for cardiovascular disease prevention: What is the evidence? American Family Physician, 79(7), 571–578.
            </div>
            <br>
        </div>
    </section>

    <?php
    include_once('../components/footer.php');
    ?>
</body>

</html>