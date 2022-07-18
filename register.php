<?php
    include('header.php');
?>
    <div class="col-md-4 col-md-offset-4 regdiv text-center" style="margin-top: 50px">
            <h3>Registration form</h3>
            <form action="reg.php" method= "post" onsubmit = "return regcheck()" >
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="email" placeholder="Email ">
                    <input type="text" name= "mobile" placeholder="Mobile">
                    <input type="text" name="suburb" placeholder="Suburb">
                    <input type="password"  id= "pass"  placeholder="Password">
                    <input type="password" id="repass" name="password" placeholder="Retype Password">
                    <input type="submit" class="btn btn-info">
            </form>
            <h1>
                        <?php
                        if(isset($_GET['status']))
                        {
                            echo " Registration successful";
                        }
                        if(isset($_GET['error']))
                        {
                            echo " Email already registered!";
                        }
                        ?>
             </h1>

    </div>
   <script>
       function regcheck(){
           var firstpass = document.getElementById("pass").value;
           var secondpass = document.getElementById("repass").value;
       if(firstpass === secondpass){
                return true;
            }else {
                return false;
            }
        }

       </script>

    

