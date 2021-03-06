<?php
session_start();
include_once '../database/database.php';	
if(isset($_SESSION["username"])){
    include '../layout/header.php';
}else{
    header("location:../login/login.php");
}
$stmt = $conn->prepare('SELECT * FROM admin');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
$conn=null;
?>
<div class="content-wrapper">
    <section class="content">
    <!--<form class="form-inline ml-3" method="post" action="display_search.php">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit" name="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->
    
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh Sách Quản Lý: &nbsp<?php echo count($result);?></h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <?php foreach($result as $item): ?>
                  <tbody>
                  <tr>
                    <td><?php echo $item['ID']?></td>
                    <td><?php echo $item['username'] ?></td>
                    <td><?php echo $item['password'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['phone'] ?></td>
                    <td><?php echo $item['email'] ?></td>
                    <td><a href="edit.php?id=<?php echo $item['ID']?>" class="btn btn-success" role="button">Sửa</button>
                    <a href="delete.php?id=<?php echo $item['ID']?>" class="btn btn-danger" role="button">Xóa</a>
                    </td>
                  </tr>
                  </tbody>  
                  <?php endforeach; ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php include '../layout/footer.php'?>
