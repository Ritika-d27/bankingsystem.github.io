<?php
include('conn.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="./customer.css">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgb(0, 0, 128)), url('img/history_page.png');
            background-repeat: no-repeat;
            background-position: center;
            width: 100vw;
            height: 100vh;
        }

        .container .heading {
            border-bottom-color: var(--white);
        }

        .heading h1 {
            color: var(--darkblue);
            text-shadow: 2px 2px 10px var(--white);
        }

        .custom-table {
            width: 100%;
        }

        .custom-table th {
            padding: 7px 10px;
            font-size: 20px;
            color: var(--green);
        }

        .custom-table td {
            font-size: 17px;
            color: var(--white);
        }
    </style>
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
                <h1>Transaction History</h1>
            </div>
            <div class="custom-table">
                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Sender's Name</th>
                            <th>Receiver's Name</th>
                            <th>Amount Transferred</th>
                            <th>Sender Balance</th>
                            <th>Receiver Balance</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `transaction`;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $srno = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $srno . '.'; ?></td>
                                    <td><?php echo $row['sender']; ?></td>
                                    <td><?php echo $row['receiver']; ?></td>
                                    <td><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $row['amt_trf']; ?></td>
                                    <td><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $row['sender_bal']; ?></td>
                                    <td><i class="fa-solid fa-indian-rupee-sign"></i><?php echo $row['receiver_bal']; ?></td>
                                    <td><?php echo $row['date_time']; ?></td>
                                </tr>
                            <?php
                                $srno += 1;
                            }
                        } else {
                            ?>
                            <script>
                                alert('No transactions till now!');
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