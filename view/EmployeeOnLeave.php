<?php
//include("../model/EmployeeModel.php");
include("../model/LeaveApplicationModel.php");


if(isset($_SESSION['officeUserName']))
{
    if ($_SESSION['empType'] == 2 || $_SESSION['empType'] == 1)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Leave Application</title>

            <!-- Bootstrap Core CSS -->
            <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="../assets/css/simple-sidebar.css" rel="stylesheet">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

            <script language=JavaScript>

                function reload(form)
                {
                    var val=form.cat.options[form.cat.options.selectedIndex].value;
                    self.location='EmployeeOnLeave.php?cat=' + val ;
                }

            </script>

        </head>

        <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="LeaveApplication.php">Leave application</a>
                    </li>
                    <li>
                        <a href="UserProfile.php">User Profile</a>
                    </li>

                    <li>
                        <a href="AddDepartment.php">Add Department</a>
                    </li>
                    <li>
                        <a href="ListDepartment.php">List Department</a>
                    </li>
                    <li>
                        <a href="AddDesignation.php">Add Designation</a>
                    </li>
                    <li>
                        <a href="ListDesignation.php">List Designation</a>
                    </li>
                    <li>
                        <a href="AddEmployee.php">Add Employee</a>
                    </li>
                    <li>
                        <a style="color:#DAA520;" href="ListEmployee.php">List Employee</a>
                    </li>
                    <li>
                        <a href="UsersLeaveDetails.php">User's Leave Details</a>
                    </li>
                    <li>
                        <a href="EmployeeOnLeave.php">Active Leave</a>
                    </li>
                    <li>
                        <a href="ListOfUserBlood.php">Blood Group</a>
                    </li>
                    <li>
                        <a href="../controller/LogoutController.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu Bar</a>
                            <h1 align="center">Employee On Leave</h1>


                            <div class="table-responsive">

                                <table class="table table-bordered table-hover table-striped">

                                    <thead>

                                    <tr class="success">
                                        <th>Apply Date</th>
                                        <th>Name</th>
                                        <th>Leave From</th>
                                        <th>Leave To</th>
                                        <th>Apply For</th>
                                        <th>Leave Type</th>
                                        <th>Total Remain Days</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    <?php
                                    $today = date("Y-m-d");
                                    $objLeaveApplication = new LeaveApplication();
                                    $result = $objLeaveApplication->getAllApp($today);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $toDate = $row['lLeaveToDate'];
                                        ?>
                                        <tr>
                                            <?php if ($toDate >= $today){ ?>
                                            <td name="livType"><?php echo $row['lApplyDate'] ?></td>
                                            <td><?php echo $row['eFirstName']." ".$row['eLastName']."<br/>User Id :".$row['lEmployeeCodeNumberWhoApply'] ?></td>
                                            <td><?php echo $row['lLeaveFromDate'] ?></td>
                                            <td><?php echo $row['lLeaveToDate'] ?></td>
                                            <td><?php echo $row['lTotalLeaveDays'] ?> Days</td>
                                            <td><?php echo $row['lType'] ?></td>
                                            <td><?php echo $row['lTotalLeaveDaysRemain'] ?></td>
                                            <?php
                                            }?>

<!--                                            <td><button type="submit" value="--><?php //echo $row['lId'] ?><!--" name="btnRecomand" class="btn btn-success">Pre Approve</button>  <button type="submit" value="--><?php //echo $row['lId'] ?><!--" name="btnApplicationDetails" class="btn btn-success">Details</button></td>-->

                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>

                                </table>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>

        </body>

        </html>
        <?php

    }
    else
    {
        header("Location:../view/LeaveApplication.php");
    }
}
else
{
    header("Location:../");
}
?>

<!--<script>
    $(document).ready(function(){

        $.ajax({
            url: "updateLeave.php",
            context: document.body,
            success: function(){
                alert("Done");
            }
        });
    });
</script>-->

