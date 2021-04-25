<!DOCTYPE html>
<html>
<head>
  <title>Krishna</title>
  <style type="text/css">
        form{
            font-size: 24px;
            text-align: center;
        }
        input:hover {
      background-color: yellow;
    }
        #tabledata {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }

    #tabledata td, #tabledata th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #tabledata tr:nth-child(even){background-color: #f2f2f2;}

    #tabledata tr:hover {background-color: #ddd;}

    #tabledata th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
  </style>

  <script type="text/javascript">
    if ( window.history.replaceState ) 
    {
     window.history.replaceState( null, null, window.location.href );
    }
   function tocheck() {
        var letters = /^[A-Za-z " "]+$/;
        var name = document.forms["RegForm"]["name"];
        if(name.value==""){  
          document.getElementById("namelocation").innerHTML=  
          "*Please enter your name";  
          return false;
          }
          if(!name.value.match(letters))
          {
            document.getElementById("namelocation").innerHTML=  
          "*only alphabtes are allowed";  
          return false;
          }
         return true;
       }
  </script>
  
</head>
<body style="background-color: yellow">

  <?php
    $name = " ";
     $phone = " ";
     $email=" ";
     $zipcode=" ";
     $url=" ";
  ?>
  <h1 style="text-align: center;
  text-shadow: 2px 2px #FF0000;cursor: no-drop;
" title="this is an css effect"> Welcome </h1>


  <div style="padding-top: 50px;border: 2px solid black;
  margin: 25px 500px 75px;position:relative
">
    <form  name="RegForm"  onsubmit="return tocheck()" method="POST" action="<?php ($_SERVER["PHP_SELF"]);?>"> 

      <label>Name</label><br>
      <input type="text" name="name" ><br>
      <span id="namelocation" style="color:red"></span><br>

      <label>Phone Number</label><br>
      <input type="tel" name="phone"><br>


      <label>email</label><br>
      <input type="text" name="email"><br>


      <label>zip code</label><br>
      <input type="text" name="zip"><br>


      <label>URL</label><br>
      <input type="text" name="url"><br>


      <input type="submit" name="ok">
      <input type="reset"> 
    </form>
  </div>
<div id="show">
  <?php
     $name = $_REQUEST['name'];
     $phone = $_REQUEST['phone'];
     $email=$_REQUEST['email'];
     $zipcode=$_REQUEST['zip'];
     $url=$_REQUEST['url'];
      if(isset($_POST["ok"]))
      {
         $conn = pg_connect("host=intern-test-db dbname=intern-test port=5432 user=intern_update password=x@Pu%m46");
        pg_query($conn,"INSERT INTO user_table_krishna VALUES('$name','$phone','$email','$zipcode','$url')");
      }
     echo "<table id='tabledata'>
      <tr>
       <th>Name</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Zip Code</th>
       <th>URL</th>
      </tr>
      <tr>
        <td>$name</td>
        <td>$phone</td>
        <td>$email</td>
        <td>$zipcode</td>
        <td>$url</td>
      </tr>
     </table>";
 echo "<h1>Data sent to the database!</h1>";

  ?>

</div>
</body>
</html>
