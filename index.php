<?php
$success ='';
$error = '';
$whitelist = [
    '127.0.0.1',
    '::1'
];

if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    // remote
    $connection= 'pgsql';
    $servername='ec2-54-81-37-115.compute-1.amazonaws.com';
    $username='hkbmzflolqzkmz';
    $password='3eab462058347b2d00f9e48b10e1b4dd3d81036e282dd3c4e7da9771f7b0c2d2';
    $dbname = "dfemio4u88tjeb";
} else { 
   //localhost 
    $connection= 'mysql';
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "drmiracle";
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['email']) {
    try   {
        $email = $_POST['email'];
        date_default_timezone_set("Africa/Lagos");
        $insertdate = date("Y-m-d H:i:s");
        $conn = new PDO("$connection:host=$servername;dbname=$dbname", $username, $password);
        /* set the PDO error mode to exception */
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO subscribers (email)
        VALUES ('$email')";
        $conn->exec($sql);
        $success ="New record created successfully";
    } 
    catch(PDOException $e) {
        $error= $sql . "<br>" . $e->getMessage();
        
    }
}
$conn = null;
?>


<!DOCTYPE html>
<html>

<head>
    <title>Dr.Miracle</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">

</head>

<body>
    <div class="container-fluid">
        <div class="top-container">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top header" id="myHeader">
                <div class="container">
                    <a class="navbar-brand" href="#" id="logo-link"><img src="./assets/images/Dr.Miracle.svg"
                            id="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"
                        id="nav-toggler">
                        <span class="navbar-toggler-icon" id="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a class="nav-link top-link" href="./about.html">About
                                    <!-- <span class="sr-only">(current)</span> -->
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link top-link" href="./contact.html">Contact</a>
                            </li>
                        </ul>
                        <a class="nav-link top-link pr-0" href="#"><button class="btn top-btn">Subscribe</button></a>
                    </div>
                </div>
            </nav>

            <div id="main-container">
                <div class="container">
                    <div class="row pt-5 top-row">
                        <div class="col-md-7 pt-lg-5">
                            <h1>Solve your Skin Problems with
                                <span class="txt-rotate" data-period="2000"
                                    data-rotate='[ "a Selfie.", "just a Click.", "Dr.Miracle!"]'></span>
                            </h1>
                            <!-- <h2>A single &lt;span&gt; is all you need.</h2> -->
                            <p class="pt-2" id="coming-soon-txt">Coming soon on</p>
                            <div class="d-flex pb-3">
                                <div>
                                    <img src="./assets/images/iphone-google-play-app-store-apple-mobile-apple-store-and-google-play-logo-png-clip-art-thumbnail 1.png"
                                        alt="andriod icon" class="icon"></div>
                                <div class="pl-2">
                                    <img src="./assets/images/iphone-google-play-app-store-apple-mobile-apple-store-and-google-play-logo-png-clip-art-thumbnail 2.png"
                                        alt="iphone icon" class="icon"></div>
                            </div>
                            <p class="pt-lg-4 pb-lg-2 subscribe-text">Subcribe to get a notifcation when we go live.</p>

                            <form class="form-inline" method="post" action="index.php">
                                <div class="form-group mr-sm-3">
                                    <label for="email" class="sr-only">email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                        required>
                                </div>
                                <button type="submit" class="btn top-btn">Subscribe</button>
                            </form>

                        </div>
                    </div>

                    <img src="./assets/images/Group 29.png" alt="" class="left-showcase">
                </div>

            </div>
        </div>
    </div>

    <!-- first section -->
    <div class="container pb-md-5 mb-md-5">
        <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <div>
                    <p class="pb-md-3 pt-3">Dr. Miracle will scan your face by taking a photo and then provide a
                        diagnosis
                        of the skin ailments present. Recommended products will then be prescibed for
                        each ailment present, along with a redirection to online stores where they can be
                        purchased. Dr Miracle also provides a Medication Tracker.</p>
                    <button type="submit" class="btn top-btn">Subscribe</button>
                </div>
            </div>
            <div class="col-md-4 p-md-0 d-flex justify-content-center">
                <img class="hover-shadow" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500" src="./assets/images/mockup1.png" alt="app-screen"
                    id="mockup1" onclick="openModal();currentSlide(1)">
            </div>
        </div>
    </div>
    <!-- </div> -->

    <!-- second section -->
    <div class="container-fluid pt-5 mt-5">
        <div id="second">
            <div class="color-box">
            </div>
            <div class="flower">
                <img src="./assets/images/rightimage.png" alt="">
            </div>

            <div class="d-md-flex img-column column-1">
                <img class="mockup-img hover-shadow" data-aos="fade-right" src="./assets/images/mockup2.png"
                    alt="screen2" id="mockup2" onclick="openModal();currentSlide(2)">
                <p class="mt-md-5 pt-5 pr-md-2 pl-md-5" data-aos="fade-down"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"><b> Dr. Miracle </b>will do a quick scan of
                    your face and give analysis of your
                    face.</p>
            </div>

            <div class="d-md-flex img-column column-2">
                <img class="mockup-img hover-shadow" data-aos="fade-up" src="./assets/images/mockup3.png" alt="screen3"
                    id="mockup3" onclick="openModal();currentSlide(3)">
                <p class="mt-md-5 pt-5 pr-md-2 pl-md-5" data-aos="fade-left"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"><b>Dr. Miracle</b> will now give you product
                    recommendations for each ailment.</p>
            </div>
        </div>
    </div>

    <!-- third section -->
    <div class="container-fluid pt-5 mt-md-5">
        <div id="third">
            <div class="color-box-2">
            </div>
            <div class="flower-2">
                <img src="./assets/images/leftimage.png" alt="">
            </div>

            <div class="d-md-flex img-column column-3">
                <p class="mt-md-5 pt-5 pl-2 d-md-block d-none" data-aos="fade-down"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">For every product recommendation,
                    <b>Dr. Miracle</b> will redirect you to an online
                    store that has products.</p>
                <img class="mockup-img hover-shadow" data-aos="fade-left" src="./assets/images/mockup4.png"
                    alt="screen2" id="mockup4" onclick="openModal();currentSlide(4)">
                    <p class="mt-md-5 pt-5 pl-2 d-md-none d-block" data-aos="fade-down"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">For every product recommendation,
                    <b>Dr. Miracle</b> will redirect you to an online
                    store that has products.</p>
            </div>

            <div class="d-md-flex img-column column-4">
                <p class="mt-md-5 pt-5 pl-2 d-md-block d-none" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"><b>Dr. Miracle</b> will also track the usage
                    of every skincare product you register
                    into the App. A daily routine will be
                    designed for each product’s dosage.</p><img class="mockup-img hover-shadow" data-aos="fade-up"
                    src="./assets/images/mockup5.png" alt="screen3" id="mockup5" onclick="openModal();currentSlide(5)">
                    <p class="mt-md-5 pt-5 pl-2 d-md-none d-block" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"><b>Dr. Miracle</b> will also track the usage
                    of every skincare product you register
                    into the App. A daily routine will be
                    designed for each product’s dosage.</p>
            </div>
        </div>
    </div>

    <!-- fourth section -->
    <div class="container">
        <div id="fourth">
            <div class="pt-5 d-flex flex-md-row flex-column img-column justify-content-end align-items-center">
                <img src="./assets/images/mockup6.png" alt="screen 6" class="mockup-img hover-shadow" id="mockup6"
                    data-aos="fade-right" onclick="openModal();currentSlide(6)">
                <p class="py-md-0 py-5"><b>Dr. Miracle</b> provides a progress report for
                    the treatment of any ailment registered in
                    the app with the aid of illustration and graphs.</p>
            </div>
        </div>
    </div>

    <!-- fifth section -->
    <div class="container-fluid">
        <div class="d-flex justify-content-end align-items-center" id="girl">
            <div class="pl-md-5 pl-3">
                <p>Subcribe to get a notification when we go Live.</p>
                <form class="form-inline" method="post" action="index.php">

                    <div class="form-group mr-sm-3">
                        <label for="email" class="sr-only">email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <button type="submit" class="btn top-btn">Subscribe</button>
                </form>
            </div>
            <img src="./assets/images/Open Peeps Bust.png" alt="">
        </div>
    </div>

    <!-- The Modal/Lightbox -->
    <div id="myModal" class="modal">
        <span class="close-btn cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">

            <div class="mySlides">
                <div class="numbertext">1 / 6</div>
                <img src="./assets/images/mockup1.png">
            </div>

            <div class="mySlides">
                <div class="numbertext">2 / 6</div>
                <img src="./assets/images/mockup2.png">
            </div>

            <div class="mySlides">
                <div class="numbertext">3 / 6</div>
                <img src="./assets/images/mockup3.png">
            </div>

            <div class="mySlides">
                <div class="numbertext">4 / 6</div>
                <img src="./assets/images/mockup4.png">
            </div>

            <div class="mySlides">
                <div class="numbertext">5 / 6</div>
                <img src="./assets/images/mockup5.png">
            </div>

            <div class="mySlides">
                <div class="numbertext">6 / 6</div>
                <img src="./assets/images/mockup6.png">
            </div>



            <!-- Next/previous controls -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>


    <!-- footer section -->
    <div class="pt-4 pb-2 d-flex justify-content-center" id="footer">
        <p class="m-0">Brought to you by Ose & Ene</p>
    </div>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="./assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        console.log('<?php echo $_SERVER['
            REMOTE_ADDR '] ?>')
        // Display a success toast, with a title
        if ('<?php echo $success ?>') {
            toastr.success('<?php echo $success ?>')
        }
        // Display an error toast, with a title
        if ('<?php echo $error ?>') {
            toastr.error('<?php echo $error ?>')
        }

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>

<?php
$success ='';
$error = '';
?>