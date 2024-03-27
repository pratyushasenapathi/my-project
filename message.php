<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Product Search</title>
  <link rel="stylesheet" href="styles.css">
  
  <style>
        table {
            margin: 0 auto;
            font-size: large;
        }
  
  
        td {
            font-weight: lighter;
        }

        th,td {
            font-weight: bold;
            padding: 10px;
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #0000FF;
            font-size: xx-large;
            font-family: 'Calibri', ;
        }
    </style>
  
  
</head>
<body>
<div class="wrapper">
  <center>
  <h1>
    Maharaj Wholesale Dealers<br>
      </h1>
      </center>
      <center>
      <h1>Searched Product list<h1>
      </center>
  
  
  <table>
    
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>City</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    <?php
          $name = (isset($_POST['name']) ? $_POST['name']:'');
          $city = (isset($_POST['city']) ? $_POST['city']:'');



          $minPrice = (isset($_POST['minP']) ? $_POST['minP']:'');
          $maxPrice = (isset($_POST['maxP']) ? $_POST['maxP']:'');
        

          $minQ = (isset($_POST['minQ']) ? $_POST['minQ']:'');
          $maxQ = (isset($_POST['maxQ']) ? $_POST['maxQ']:'');


          
          
        
          if(empty($city)){
            $city = "";
          }
          if(empty($name)){
            $name = "";
          }
          if(empty($minQ)){
            $minQ = 0;
          }
          if(empty($maxQ)){
            $maxQ = 100000000;
          }
          if(empty($minPrice)){
            $minPrice = 0;
          }
          if(empty($maxPrice)){
            $maxPrice = 100000000;
          }
         $servername = "localhost";
          $username  = "id19879832_maharajsivasubramanian";
          $password = "MahaMahi@123";
          $dbname = "id19879832_maharaj";
          $conn =  new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "select * from products where (pname like '%$name%') and (city like '%$city%') and (quantity between $minQ and $maxQ) and (price between $minPrice and $maxPrice)";
        $result = mysqli_query($conn,$sql);
        if($result){
            if ($result->num_rows > 0) {
                while($rows=$result->fetch_assoc()) {
     ?>
    <tr>
        <td><?php echo $rows['pid'];?></td>
        <td><?php echo $rows['pname'];?></td>
        <td><?php echo $rows['city'];?></td>
        <td><?php echo $rows['quantity'];?></td>
        <td><?php echo $rows['price'];?></td>
    </tr>
    <?php
                }}  }
        else{echo "database error";}
        $conn->close();
     ?>
</table>

    <br>
    <br>
      <div class="dbl-field" >
      <div class="button-area" style="float:right">
        <a href="index.html"> <button>Perform Another search</button></a>
        <span></span>
      </div>
      </div>
      
          <br>
    <br>
</div>

</body>
</html>