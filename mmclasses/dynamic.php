<?php
 $message = '';
 $error = '';
 if(isset($_POST["submit"]))
 {
      if(empty($_POST["id"]))
      {
           $error = "<label class='text-danger'>Enter Id</label>";
      }
      else
      {
           if(file_exists('employee_data_dynamic.json'))
           {
                $current_data = file_get_contents('employee_data_dynamic.json');
                $array_data = json_decode($current_data, true);

                    $extra = array(
                      'id'                =>     $_POST["id"],
                     'feesjan'            =>     $_POST["feesjan"],
                     'feesfeb'            =>     $_POST["feesfeb"],
                     'feesmarch'            =>     $_POST["feesmarch"],
                     'feesapr'            =>     $_POST["feesapr"],
                     'feesmay'            =>     $_POST["feesmay"],
                     'feesjune'            =>     $_POST["feesjune"],
                     'feesjuly'            =>     $_POST["feesjuly"],
                     'feesaug'            =>     $_POST["feesaug"],
                     'feessept'            =>     $_POST["feessept"],
                     'feesoct'            =>     $_POST["feesoct"],
                     'feesnov'            =>     $_POST["feesnov"],
                     'feesdec'            =>     $_POST["feesdec"]
                );
                $array_data[] = $extra;
                $final_data = json_encode($array_data);
                if(file_put_contents('employee_data_dynamic.json', $final_data))
                {
                     $message = "<br /><label class='text-success'>Details added to records!</p>";
                }

              }
               else
               {
                     $error = 'JSON File not exits';
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

           <div class="container" style="width:500px; position: relative;">
            <br />
                <h3 align=""><a href = "append_json_data.php">Admin Portal</a> | Fees </h3><br />
                <form method="post">
                     <?php
                     if(isset($error))
                     {
                          echo $error;
                     }
                     ?>
                     <label>Enter student Id</label>
                     <input type="text" id="id" name="id" class="form-control" /><br /><br>

                     <table class="table">
                       <tr>
                         <th>Month</th>
                         <th>Fee status</th>
                       </tr>
                       <tr>
                         <td>January</td>
                         <td>
                           <input type="text" id="feesjan" name="feesjan" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>February</td>
                         <td>
                           <input type="text" id="feesfeb" name="feesfeb" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>March</td>
                         <td>
                           <input type="text" id="feesmarch" name="feesmarch" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>April</td>
                         <td>
                           <input type="text" id="feesapr" name="feesapr" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>May</td>
                         <td>
                           <input type="text" id="feesmay" name="feesmay" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>June</td>
                         <td>
                           <input type="text" id="feesjune" name="feesjune" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>July</td>
                         <td>
                           <input type="text" id="feesjuly" name="feesjuly" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>August</td>
                         <td>
                           <input type="text" id="feesaug" name="feesaug" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>September</td>
                         <td>
                           <input type="text" id="feessept" name="feessept" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>October</td>
                         <td>
                           <input type="text" id="feesoct" name="feesoct" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>November</td>
                         <td>
                           <input type="text" id="feesnov" name="feesnov" class="form-control" /><br />
                         </td>
                       </tr>
                       <tr>
                         <td>December</td>
                         <td>
                           <input type="text" id="feesdec" name="feesdec" class="form-control" /><br />
                         </td>
                       </tr>
                     </table>

                     <input type="submit" name="submit" value="Update" class="btn btn-info" /><br /><br>

                     <?php
                     if(isset($message))
                     {
                          echo $message;
                     }
                     ?>

                </form>

                <button class="btn btn-info" onclick="myDynamic()">Show student details</button>
<br><br>
           </div>

      </body>

      <script type="text/javascript">

        function myDynamic(){

    var x,y;
    var xx;

    x = document.getElementById('id').value; //entered studentId

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if (this.status == 200 && this.readyState == 4) {

        xx = JSON.parse(this.responseText);

        for (y=0; y< xx.length; y++) {

          if(xx[y].id == x) {

            document.getElementById('feesjan').value = xx[y].feesjan;
            document.getElementById('feesfeb').value = xx[y].feesfeb;
            document.getElementById('feesmarch').value = xx[y].feesmarch;
            document.getElementById('feesapr').value = xx[y].feesapr;
            document.getElementById('feesmay').value = xx[y].feesmay;
            document.getElementById('feesjune').value = xx[y].feesjune;
            document.getElementById('feesjuly').value = xx[y].feesjuly;
            document.getElementById('feesaug').value = xx[y].feesaug;
            document.getElementById('feessept').value = xx[y].feessept;
            document.getElementById('feesoct').value = xx[y].feesoct;
            document.getElementById('feesnov').value = xx[y].feesnov;
            document.getElementById('feesdec').value = xx[y].feesdec;

          }

        }

      }
    }

    xhttp.open("GET","employee_data_dynamic.json",true);
    xhttp.send();

  }
      </script>

 </html>
