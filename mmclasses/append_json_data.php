<?php
 $message = '';
 $error = '';
 if(isset($_POST["submit"]))
 {
      if(empty($_POST["name"]))
      {
           $error = "<label class='text-danger'>Enter Name</label>";
      }
      else if(empty($_POST["id"]))
      {
           $error = "<label class='text-danger'>Enter id</label>";
      }
      else if(empty($_POST["fname"]))
      {
           $error = "<label class='text-danger'>Enter Father's name</label>";
      }
      else if(empty($_POST["mname"]))
      {
           $error = "<label class='text-danger'>Enter Mother's name</label>";
      }
      else if(empty($_POST["address"]))
      {
           $error = "<label class='text-danger'>Enter address</label>";
      }
      else if(empty($_POST["school"]))
      {
           $error = "<label class='text-danger'>Enter school</label>";
      }
      else if(empty($_POST["class"]))
      {
           $error = "<label class='text-danger'>Enter class</label>";
      }
      else if(empty($_POST["dob"]))
      {
           $error = "<label class='text-danger'>Enter date of birth</label>";
      }
      else if(empty($_POST["contact"]))
      {
           $error = "<label class='text-danger'>Enter contact details</label>";
      }
      else if(empty($_POST["mail"]))
      {
           $error = "<label class='text-danger'>Enter student's mail</label>";
      }
      else if(empty($_POST["pass"]))
      {
           $error = "<label class='text-danger'>Enter student's password</label>";
      }
      else
      {
           if(file_exists('employee_data.json'))
           {
                $current_data = file_get_contents('employee_data.json');
                $array_data = json_decode($current_data, true);
                $extra = array(
                     'name'               =>     $_POST["name"],
                     'id'                 =>     $_POST["id"],
                     'fname'              =>     $_POST["fname"],
                     'mname'              =>     $_POST["mname"],
                     'address'            =>     $_POST["address"],
                     'school'             =>     $_POST["school"],
                     'class'              =>     $_POST["class"],
                     'dob'                =>     $_POST["dob"],
                     'contact'            =>     $_POST["contact"],
                     'mail'               =>     $_POST["mail"],
                     'pass'               =>     $_POST["pass"]
                );
                $array_data[] = $extra;
                $final_data = json_encode($array_data);  
                if(file_put_contents('employee_data.json', $final_data))
                {
                     $message = "<br /><label class='text-success'>Details added to records!</p>";
                }
           }
           else
           {
                $error = 'JSON File does not exist!';
           }
      }
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Backend</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


        
      </head>
      <body>
        <center>
        <div id="passdiv" style="width: 30%;margin-top: 18%">
          <h3>ENTER ADMIN PASSWORD</h3>
          <input type="password" id="password" class="form-control"><br>
          <button onclick="mypassfunc()" class="btn btn-success">Log In</button>
        </div></center>
        <div id="outerdiv" style="display: none;">
           <div class="container" style="width:500px;">
            <br />
                <h3 align="">Admin Portal | <a href="dynamic.php">Fees</a> </h3><br />
                <form method="post">
                     <?php
                     if(isset($error))
                     {
                          echo $error;
                     }
                     ?>
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" /><br />
                     <label>ID</label>
                     <input type="text" name="id" class="form-control" /><br />
                     <label>Father's name</label>
                     <input type="text" name="fname" class="form-control" /><br />
                     <label>Mother's name</label>
                     <input type="text" name="mname" class="form-control" /><br />
                     <label>Address</label>
                     <input type="text" name="address" class="form-control" /><br />
                     <label>School</label>
                     <input type="text" name="school" class="form-control" /><br />
                     <label>Class</label>
                     <input type="text" name="class" class="form-control" /><br />
                     <label>Date of birth</label>
                     <input type="text" name="dob" class="form-control" /><br />
                     <label>Contact</label>
                     <input type="text" name="contact" class="form-control" /><br />
                     <label>E-mail</label>
                     <input type="text" name="mail" class="form-control" /><br />
                     <label>Student Password</label>
                     <input type="password" name="pass" class="form-control" /><br /><br />
                     <input type="submit" name="submit" value="Add to records" class="btn btn-info" /><br /><br /><br /><br />
                     <?php
                     if(isset($message))
                     {
                          echo $message;
                     }
                     ?>
                </form>
           </div>
         </div>
      </body>
      <script type="text/javascript">
          
          function mypassfunc(){
            var mypass = document.getElementById('password').value;
            if (mypass == "mmclasses345") {
              document.getElementById('passdiv').style.display = "none";
              document.getElementById('outerdiv').style.display = "block";
            }
          }

        </script>
 </html>
