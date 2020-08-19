<?php
 include 'header.php';
 include 'lib/user.php';
?>
<?php
    $user = new User();
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])){
        $userRegi = $user->userRegistration($_POST); 
    }
?>
         
        <!-- main START -->
        <main>
            
            <!-- form -->
            <div class="form">
                <div class="container">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <form action="" method="POST">
                                <h2>Sign Up</h2>
                                <?php
                                    if (isset($userRegi)) {
                                        echo $userRegi;
                                    }
                                ?>
                                <label for="">
                                    Your name
                                    <input type="text" name="yourname" placeholder="Your name">
                                </label>
                                <label for="">
                                    username
                                    <input type="text" name="username" placeholder="Your username">
                                </label>
                                <label for="">
                                    Your email
                                    <input type="email" name="email" placeholder="Your Email">
                                </label> 
                                <label for="">
                                    password
                                    <input type="password" name="pass" placeholder="password">
                                </label> 
                                <button type="submit" name="register">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- form -->
        </main>
        <!-- main END -->

<?php include 'footer.php';?>
 