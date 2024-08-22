<?php
    session_start();
    include('connect.php');
    if(empty($_SESSION['id']))
     {
        header('location:index.php');
     }
     if(isset($_POST['btn1']))
     {
      $pdate = $_POST['pdate'];
      $uid = $_POST['uid'];
      $uname = $_POST['uname'];
      $proid = $_POST['proid'];

      mysqli_query($con,"INSERT INTO purchase(pdate,uid,uname,proid) VALUES ('$pdate','$uid','$uname','$proid')");
      echo "<script>
        alert('Successfully purchase the new product');
        window.location.href='search.php';
      </script>";
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search Page</title>
    <?php include('bootcdn.php')?>
</head>
<body>
  <?php include('header.php')?>
  <br><br><br><br><br>
  <div class="container-fluid">
    <div class="well">
      <span class="glyphicon glyphicon-search"> <b>SEARCH PAGE</b></span>
    </div>

    <!-- product list start -->
    <div class="row hidden-print">
      <form method="post">
      <div class="col-sm-11">
        <input type="text" name="search" class="form-control" placeholder=" Search">
        <!-- search script start-->
        
        <!-- search script end -->
      </div>
      <div class="col-sm-1">
        <button type="submit" name="btn" class="btn btn-primary">
          <span class="glyphicon glyphicon-search"></span> Search
        </button>
      </div>
      </form>
    </div>
    <br>

    <!-- tabel start -->
     <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>PRODUCT ID</th>
            <th>UPLOAD DATE</th>
            <th>PRODUCT TITLE</th>
            <th>PRODUCT DESCRIPTION</th>
            <th>PHOTO</th>
            <th>PRICE</th>
            <th>ACTION</th>
          </tr>
          <tbody id="myTable">
            <?php
            if(isset($_POST['btn']))
            {
              $search = $_POST['search'];
            $sdata = mysqli_query($con,"SELECT * FROM product WHERE title LIKE '%".$search."%'" );
            while($row = mysqli_fetch_assoc($sdata))
            {
            ?>
            <tr>
              <td><?php echo $row['pid'] ?></td>
              <td><?php echo $row['udate'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['description'] ?></td>
              <td>
               <img src=" <?php echo 'admin/imgs/'.$row['photo'] ?>" width="80px">
              </td>
              <td><?php echo $row['price'] ?></td>
              <td>
                <form method="post">
                  <!-- hidden input start -->
                   <input type="hidden" name="pdate" value="<?php echo date('Y-m-d')?>">
                   <input type="hidden" name="uid" value="<?php echo $_SESSION['id']?>">
                   <input type="hidden" name="uname" value="<?php echo $_SESSION['name']?>">
                   <input type="hidden" name="proid" value="<?php echo $row['pid']?>">
                 <!-- hidden input start -->
                  <button name="btn1" type="submit" class="btn btn-primary">PURCHASE</button>
                </form>
              </td>
            </tr>
            <?php
            }}
            ?>
          </tbody>
        </thead>

      </table>
     </div>
     
     <!-- tabel end -->

    <!-- product list end -->

  </div>
</body>
</html>