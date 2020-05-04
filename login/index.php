<?php require '../library/config.php'; ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ACLC Scheduling System</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <a href=""><img alt="image" src="../resources/ACLC-Logo.png" style="width:200px;height:200px;" /></a>
            </div>
            <h2><strong>ACLC SCHEDULING SYSTEM</strong></h2>
            <br>
            
            <form method="POST" id="form_login">
                <div class="form-group">
                    <input type="text" name="user" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="pass" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <select class="form-control" name="sy_code" id="sy_code">
                    <?php 
                        $sql = $dbConn->query("SELECT * FROM tbl_schoolyear");
                        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <option><?php echo $row['schoolyear_code']; ?></option>
                    <?php 
                        } 
                    ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success block full-width m-b">Login</button>
            </form>
            <p class="m-t"> <strong>Copyright</strong> All Rights Reserved &copy; 2016</p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../assets/js/jquery-2.1.1.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Toastr -->
    <script src="../assets/js/plugins/toastr/toastr.min.js"></script>

    <!-- login script -->
    <script src="login.js"></script>
    <script>
        localStorage.removeItem("visited");
    </script>

</body>

</html>
