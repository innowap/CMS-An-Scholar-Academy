<?php include "includes/admin_header.php"; ?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>
    <!-- /.navbar-collapse -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php
                        $inbox_query_count = "SELECT * FROM testimony";
                        $find_count = mysqli_query($connection, $inbox_query_count);
                        $count = mysqli_num_rows($find_count); ?>
                        Testimony<sup><span class="badge"><?php echo $count; ?></span></sup>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <script>
                $(document).ready(function() {
                    $('[data-toggle="popover"]').popover();
                });
                </script>
                <?php include "includes/delete_popup.php"; ?>
                <table class="table table-bordered table-striped table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Testimony</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $per_page = 5;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = "";
                        }

                        if ($page == "" || $page == 1) {
                            $page_1 = 0;
                        } else {
                            $page_1 = ($page * $per_page) - $per_page;
                        }


                        ?>
                        <?php
                        $post_query_count = "SELECT * FROM testimony";
                        $find_count = mysqli_query($connection, $post_query_count);
                        $count = mysqli_num_rows($find_count);
                        $count = ceil($count / 5);

                        $query = "SELECT * FROM testimony ORDER BY id DESC LIMIT $page_1,$per_page";
                        $select_msg = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_msg)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $testimony = $row['testimony'];
                            $status = $row['status'];


                            $testimony = filter_var($testimony, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
                            $msg_sort_testimony = substr($row['testimony'], 0, 100);


                            echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$name</td>";


                            if ($testimony == $msg_sort_testimony) {
                                echo "<td>$msg_sort_testimony</td>";
                            } else {
                                echo "<td>$msg_sort_testimony.... <a title='Full Message' data-toggle='popover' data-trigger='hover' data-content='$msg_content'>show more</a></td>";
                            }

                            echo "<td>$msg_date</td>";
                            echo "<td>$status</td>";
                            if ($status == 'Pending') {
                                echo "<td><a class='btn btn-success' href='feedback.php?approved={$id}'>Approved</a></td>";
                            } else if ($status == 'approved') {
                                echo "<td><a class='btn btn-info' href='feedback.php?pending={$id}'>Pending</a></td>";
                            }

                            echo "<td><a rel='$id' class='btn btn-danger delete_link' href='javascript:void(0)'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <center>
                    <ul class="pagination pagination-lg">
                        <?php
                        for ($i = 1; $i <= $count; $i++) {
                            if ($i == $page) {
                                echo "<li class='active'><a href='feedback.php?page={$i}'>{$i}</a></li>";
                            } else {
                                echo "<li><a href='feedback.php?page={$i}'>{$i}</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </center>
                <?php
                if (isset($_GET['approved'])) {
                    $the_id = $_GET['approved'];

                    $query = "UPDATE testimony SET status = 'approved' WHERE id = $the_id ";
                    $approve_comment_query = mysqli_query($connection, $query);
                    header('Location: feedback.php');
                }

                if (isset($_GET['pending'])) {
                    $the_id = $_GET['pending'];

                    $query = "UPDATE testimony SET status = 'Pending' WHERE id = $the_id ";
                    $approve_comment_query = mysqli_query($connection, $query);
                    header('Location: feedback.php');
                }

                if (isset($_GET['delete'])) {
                    $gid = $_GET['delete'];
                    if (isset($_SESSION['user_role'])) {
                        if ($_SESSION['user_role'] == 'admin') {
                            $the_comment_id = mysqli_real_escape_string($connection, $gid);

                            $query = "DELETE FROM testimony WHERE id = {$gid}";
                            $delete_query = mysqli_query($connection, $query);
                            header('Location: feedback.php?message=Feedback succesfully deleted');
                        }
                    }
                }
                ?>
                <script>
                $(document).ready(function() {
                    $(".delete_link").on('click', function() {
                        var id = $(this).attr("rel");
                        var delete_url = "feedback.php?delete=" + id + " ";
                        $(".modal_delete_link").attr("href", delete_url);
                        $("#myModal").modal('show');
                    });
                });
                </script>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>