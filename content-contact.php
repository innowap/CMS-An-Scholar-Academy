   <?php
    if (isset($_POST['submit'])) {
        $to         = $siteemail;
        $subject    = wordwrap($_POST['subject'], 60);
        $body       = $_POST['body'];
        $header     = "From: " . $_POST['email'];
        mail($to, $subject, $body, $header);
        $msg_author = $_POST['msg_author'];
        $msg_author = mysqli_real_escape_string($connection, $msg_author);
        $msg_subject = wordwrap($_POST['subject'], 60);
        $msg_subject = mysqli_real_escape_string($connection, $msg_subject);
        $author_email = $_POST['email'];
        $author_email = mysqli_real_escape_string($connection, $author_email);
        $msg_body = $_POST['body'];
        $msg_body = mysqli_real_escape_string($connection, $msg_body);
        $msg_content = $msg_body;
        date_default_timezone_set("Asia/Dhaka");
        $msg_date = date('Y-m-d h:i:s A');
        $query = "INSERT INTO inbox (msg_status, msg_date, msg_author, msg_subject, author_email, msg_content) ";
        $query .= "VALUES('Panding','{$msg_date}','{$msg_author}','{$msg_subject}','{$author_email}','{$msg_content}') ";
        $send_msg_query = mysqli_query($connection, $query);
        if (!$send_msg_query) {
            die('SQL connection Failed' . mysqli_error($connection));
        }
        $message = "<div class='alert alert-success center-block text-center'><center><strong>Success!</strong> Your email has been send. </center></div>";
    } else {
        $message = "";
    }
    ?>
   <section class="hero-wrap hero-wrap-2" style="background-image: url('images/contactus.jpg');">
       <div class="overlay"></div>
       <div class="container">
           <div class="row no-gutters slider-text align-items-center justify-content-center">
               <div class="col-md-9 ftco-animate text-center">
                   <h1 class="mb-2 bread">Contact Us</h1>

               </div>
           </div>
       </div>
   </section>

   <section class="ftco-section contact-section">
       <div class="container">
           <div class="row d-flex mb-5 contact-info">
               <div class="col-md-4 d-flex">
                   <div class="bg-light align-self-stretch box p-4 text-center">
                       <h3 class="mb-4">Address</h3>
                       <p><?php echo $siteaddress; ?></p>
                   </div>
               </div>
               <div class="col-md-4 d-flex">
                   <div class="bg-light align-self-stretch box p-4 text-center">
                       <h3 class="mb-4">Contact Number</h3>
                       <p><a href="tel://1234567920"><?php echo $sitephone; ?></a></p>
                   </div>
               </div>
               <div class="col-md-4 d-flex">
                   <div class="bg-light align-self-stretch box p-4 text-center">
                       <h3 class="mb-4">Email Address</h3>
                       <p><a href="mailto:<?php echo $siteemail; ?>"><?php echo $siteemail; ?></a></p>
                   </div>
               </div>

           </div>
       </div>
   </section>

   <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb bg-primary" data-stellar-background-ratio="0.5">
       <div class="container">
           <div class="row justify-content-end">
               <div class="col-md-6 py-5 px-md-5 bg-primary">
                   <div class="heading-section heading-section-white ftco-animate mb-5">
                       <h2 class="mb-4">Contact Us</h2>
                       <p>Send us a message</p>
                   </div>
                   <?php echo $message; ?>
                   <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       <div class="form-group">
                           <input class="form-control" id="name" name="msg_author" placeholder="Name" type="text"
                               required> </div>
                       <div class="form-group">
                           <input class="form-control" id="name" name="subject" placeholder="Subject" type="text"
                               required> </div>
                       <div class="form-group">
                           <input class="form-control" id="email" name="email" placeholder="Email" type="email"
                               required>
                       </div>
                       <br>
                       <div class="form-group">
                           <textarea class="form-control" id="comments" name="body" placeholder="Comment" rows="5"
                               cols="4"></textarea>
                       </div>
                       <div class="form-group">

                           <button class="form-control btn btn-success " type="submit" name="submit">Send</button>
                       </div>

                   </form>
               </div>
           </div>
       </div>
   </section>