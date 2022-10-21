<?php
include('conn.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Sysytem</title>
    <link rel="stylesheet" href="./index.css">
</head>

<body>

    <header>
        <nav>
            <div class="logo">
                <img src="./img/logo.png" alt="">
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#about">About Us</a></li>
                <li><a href="index.php#services">Services</a></li>
                <li><a href="index.php#contact">Contact Us</a></li>

            </ul>
        </nav>
        <div class="content">
            <p class="header-heading">Welcome to Sparks Foundation <br> Banking System
            </p>
            <a href="https://www.thesparksfoundationsingapore.org/" class="visit" target="_blank">More Details</a>
        </div>
    </header>
    <!-- about us page -->
    <section id="about">
    <div class="container-about">
        <div class="content-about">
            <h3>About Us</h3>
            <p>
                The Sparks Foundation Bank is one of the largest bank with many branches spread across the country. It
                offers entire spectrum of financial services for personal and corporate banking. This bank is the
                leading private sector bank of the country. It offers varieties of banking services. <br> for available
                the money transfer services, the customers can visit the nearby branch or they can easily do so by using
                the bank's official website. We're here for you always!</p>
        </div>
    </div>
    </section>
    <!-- service section -->

    <section id="services">
    <h3 class="services-heading">Services </h3>
    <div class="service-container">
        <div id="cart1" class="cart">
            <img src="./img/customer.jpg" alt="">
          <form action="./customer.php"> <button type="submit"  name="view-customer" class="buton-cart">View Customer</button></form> 
        </div>
        <div id="cart2" class="cart">
            <img src="./img/service.jpg" alt="">
            <form action="./transfer.php"> <button type="submit"  name="view-customer" class="buton-cart">Transfer Money</button></form>
        </div>
        <div id="cart3" class="cart">
            <img src="./img/transaction.jpg" alt="">
            <form action="./tran-his.php"> <button type="submit"  name="view-customer" class="buton-cart">Transction History</button></form>
        </div>
    </div>
    </section>

    <!-- contact-section -->
    <section id="contact">
    <div class="contactainer-contact">
        <div class="content-contact">
            
            <div class="imges">
                <h2>
                    Get In Touch
                </h2>
                <div class="social">
                <a href=""><img src="./img/14179583611530077750-128.png" alt=""></a>
                <a href=""><img src="./img/16090541531530099327-128.png" alt=""></a>
                <a href=""><img src="./img/19042250241579774616-128.png" alt=""></a>
                <a href=""><img src="./img/3842828341530103314-128.png" alt=""></a>
            </div>
        </div>
        </div>
        <div class="form">
            <form action="index.php" method="post" id="contact_form">

                <input type="text" name="name" placeholder="Name">
<br>
                <input type="text" name="email"  placeholder="Email">
<br>
                <input type="text" name="phone"  placeholder="contact">
<br>
                <input type="text" name="query"  placeholder="Query">
                <div class="button">
                    <button type="submit" name="submit" id="red">Submit</button>
                    <button id="green">Reset</button>
                  </div>
            </form>
        </div>
    </div>
    </section>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $query = $_POST['query'];
        $sql = "INSERT INTO `contact` (`name`, `email`, `phone`, `query`, `date`) VALUES ('$name', '$email', '$contact', '$query', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
    ?>
            <script>
                alert("Thanks for contacting! We'll get back to you soon");
                window.open('index.php', '_self');
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('<?php echo mysqli_error($conn); ?>');
            </script>
    <?php
        }
    }
    ?>
    <!-- footer-part -->
    <div class="footer">
        <h1>The Sparks Foundation Bank</h1>
        <p>Copyright © designed by Ritika Dwivedi</p>
    </div>
</body>

</html>