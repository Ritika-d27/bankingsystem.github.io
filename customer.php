<?php
include('conn.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="./customer.css">
    <script src="https://kit.fontawesome.com/6ccdd39db5.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
        </div>
    </header>

    <section id="customers">
        <div class="container">
            <div class="heading">
                <h1>View Customers</h1>
            </div>
            <div class="custom-table">
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Account Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `customer`;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $srno = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['Id']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td class="acbal"><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $row['Balance']; ?></td>
                                </tr>
                            <?php
                                $srno += 1;
                            }
                        } else {
                            ?>
                            <script>
                                alert('No users exist!');
                                window.open('index.php', '_self');
                            </script>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>