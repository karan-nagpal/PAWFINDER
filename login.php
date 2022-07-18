<?php
    include('header.php');
?>
    <div class="col-md-4 col-md-offset-4 regdiv text-center">
        <h3>login</h3>
            <form action="logger.php" method= "post" >
                   <p> <input type="text" name="email" placeholder="Email or mobile no"></p>
                   <p> <input type="password" name="password" placeholder="Password"></p>
                   <p> <input type="submit" class="btn btn-info"></p>
            </form>
            <h1>
                        <?php
                        if(isset($_GET['error']))
                        {
                            echo "INVALID USERNAME OR PASSWORD ";
                        }                       
                        if(isset($_GET['verified']))
                        {
                            echo "Account verified. ";
                        }
                        ?>
             </h1>

    </div>

    

