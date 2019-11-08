<div class="py-4 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md-4 pr-4 d-flex topper align-items-center">
                        <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-map"></span></div>
                        <span class="text"><?php echo $siteaddress; ?></span>
                    </div>
                    <div class="col-md-4 pr-4 d-flex topper align-items-center">
                        <div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text"><?php echo $siteemail; ?></span>
                    </div>
                    <div class="col-md-2 pr-2 d-flex topper align-items-center">
                        <div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text"><?php echo $sitephone; ?></span>
                    </div>
                    <div class="col-md-2 pr-2 d-flex topper align-items-center">
                        <span class="text"><button type="button" class="btn btn-tertiary" data-toggle="modal"
                                data-target="#exampleModal">Feedbacks</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Give us your feedbacks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" id="feedback-form" autocomplete="on">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="testimony" class="col-form-label">Testimony:</label>
                        <textarea class="form-control" id="testimony" name="testimony" rows="5" cols="4"
                            required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="testify">Testify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['testify'])) {
    $name = $_POST['name'];
    $testimony = $_POST['testimony'];

    date_default_timezone_set("Asia/Dhaka");
    $msg_date = date('Y-m-d h:i:s A');

    $query = "INSERT INTO testimony (name, testimony, status, msg_date) ";
    $query .= "VALUES('{$name}','{$testimony}','Pending','{$msg_date}') ";
    $send_msg_query = mysqli_query($connection, $query);
    if (!$send_msg_query) {
        die('SQL connection Failed' . mysqli_error($connection));
    }
    $message = "<div class='alert alert-success center-block text-center'>
    <center><strong>Success!</strong> Your Feedback has been recieved. </center>
</div>";
} else {
    $message = "";
}
?>