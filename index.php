<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>

    <style>
        .main-content,
        body {
            background-color: grey;
        }

        .card {
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.75);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.125);
        }

        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #2980B9;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {

            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {

            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        nav {
            position: absolute;
            top: 2em;
            right: 1em;
        }



        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
        .show {
            display: block;
        }

        .avatar-img {
            border-radius: 50%;
        }

        table {
            width: 65%;
            background-color: #eeeeee;
        }

        thead {
            height: 70px;
            font-size: 24px;
            font-family: Garamond;
        }

        tr {
            text-align: center;
        }

        th {
            text-align: center;
        }

        tbody {
            font-size: 18px;
        }
    </style>
    <script>
        /* When the user clicks on the button,
            toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

</head>

<body>
    <!-- main content area start -->
    <div class="main-content">
        <!-- page title area start -->
        <div class="page-title-area">

            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Housekeeping Inventory</h4>

                    <ul class="breadcrumbs pull-left">
                        <li><a href="index.php">Home</a></li>
                        <li><span>Dashboard</span></li>
                    </ul>

                    <nav>
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn">
                                <img class="avatar-img" src="avatar.png" alt="avatar">
                                <?php echo $_SESSION['username'] ?>
                                <i class="fas fa-chevron-circle-down"></i>
                            </button>
                    </nav>

                    <div id="myDropdown" class="dropdown-content">
                        <a class="dropdown-item" href="index.php?logout='1'">Log Out</a>
                    </div>

                </div>
            </div>

        </div>




    </div>

    <!-- page title area end -->



    <div class="main-content">
        <h2 style="text-align:center">Add Item Here</h2>


        <button class="open-button" onclick="openForm()">Add Item</button>
        <form method="POST" class="form-inline" action="additem.php" id="myForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input type="text" class="form-control" name="price" required>
            </div>
            <div class="form-group">
                <label for="name">Quantity</label>
                <input type="number" name="quant" id="quant" min="1" max="" required>
            </div>
            <div class="form-group">
                <label for="image">Images</label>
                <input type="file" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-default" name="add">Add</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
        <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
        </script>


        <!-- search button -->
        <div class="col-md-6 col-sm-8 clearfix">
            <div class="search-box pull-left">
                <form action="#">
                    <input type="text" name="search" placeholder="Search..." required><i class="ti-search"></i>
                </form>
            </div>
        </div>

        <div class="main-content-inner">
            <div class="row">
                <div class="col-lg-6 mt-5">




                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Products</h4>
                            <div class="single-table">
                                <div class="table-responsive">




                                    <table class="table text-dark text-center">
                                        <thead class="text-uppercase">
                                            <tr class="table-active">
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = new mysqli("localhost", "root", "", "inventorymanagement");

                                            $sql = "DELETE FROM product
                                                WHERE product_id NOT IN
                                                (
                                                SELECT MAX(product_id) AS MaxRecordID
                                                FROM product
                                                GROUP BY product_name, 
                                                            price, 
                                                            quantity
                                                                        );";
                                            $conn->query($sql);
                                            $sql = "SELECT * FROM product ORDER BY product_name,price,quantity; ";
                                            $result = $conn->query($sql);
                                            $count = 0;
                                            if ($result->num_rows >  0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $count += 1;
                                            ?>
                                                    <tr>
                                                        <th><?php echo $count ?></th>
                                                        <th><?php echo $row["product_name"] ?></th>
                                                        <th><?php echo $row["price"]  ?></th>
                                                        <th><?php echo $row["quantity"]  ?></th>
                                                        <th><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['images']); ?>" width='120' height='120'></th>
                                                        <th> <a href="up" Edit></a><a href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a> <a href="up" Edit></a><a href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a></th>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>




                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>