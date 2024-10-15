

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >

    <title>Export Data</title>
  </head>
  <body>
      <div class="container mt-5">
          <h1 class="text-center">Export Data in Excel File</h1>
          <a href="export_data.php" class="btn btn-primary ">Export</a>
          <form action="" method="POST">
              <input type="text" name="search" placeholder="Search Name"><!-- search name -->
              <input type="submit" name="submit" class="btn btn-info" value="Search">
          </form>
          <div class="col-md-12">
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">G mail</th>
      <th scope="col">Phone No</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
      <?php
       include('connect.php');
       if(isset($_POST['submit'])){
           $name = $_POST['search'];
       
       $sql ="SELECT * FROM userdata where name like '%$name%' || phone like '%$name%' ";
       $query = mysqli_query($connect, $sql);
       $num = mysqli_num_rows($query);
       if($num > 0){
        $i =1;
       while($result = mysqli_fetch_assoc($query) ){
      
      ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $result['name']; ?></td>
      <td><?php echo $result['gmail']; ?></td>
      <td><?php echo $result['phone']; ?></td>
      <td><?php echo $result['address']; ?></td>
    </tr>
             <?php 
$i=$i+1;
} } else { ?>
    <tr>
    <td colspan="8"> No record found against this search</td>
  </tr> 
       <?php } }?>
  </tbody>
</table>
          </div>
      </div>   
  </body>
</html>

