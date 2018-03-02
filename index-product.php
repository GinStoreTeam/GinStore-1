<div class="modal">

</div>

<?php require("header.php") ?>
<style media="screen">
.modal {
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.88);
  position: fixed;
  z-index: 25;
  display: none;
}

.modal-box {
  display: none;
  background: rgb(255, 255, 255);
  width: 25%;
  text-align: center;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 15px;
  z-index: 26
}

.col-4 {
  width: 23%;
  margin: 10px 0px;
  padding-left: 1%;
  padding-right: 1%;
}

.row {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
}

.card-product {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6);
  transition: 0.7s;
  border-radius: 5px;
  display: block;
  /* margin: 10px 0; */
  text-decoration: none;
}

.card-product a {
  text-decoration: none;
  color: rgb(0, 0, 0);
  transition: 1s;
}

.card-product a:hover {
  color: rgb(50, 132, 255);
}

.card-product:hover {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.6);
}

.card-product img {
  width: 100%;
  height: 300px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.5);
}

.card-container {
  padding: 10px;
  min-height: 150px;
}

.card-button form {
  display: inline-block;
}

</style>



  <div class="row">

    <?php
      // ambil semua data dulu
      $ambil = "SELECT * FROM product";
      $hasil = mysqli_query($link, $ambil);

      if( mysqli_num_rows($hasil) > 0 ){
        // keluarkan semua data menggunakan perulangan
        while( $data = mysqli_fetch_assoc($hasil) ){
          ?>
          <div class="col-4">
            <div class="card-product">

              <a href="product.php?id=<?php echo $data['id']; ?>">
                <img src='img/product/<?php echo $data['id']; ?>.jpg' alt="">
                <div class="card-container">
                  <h4><?php echo $data['title']; ?></h4>
                  <?php echo rupiah( $data['price'] ); ?>
                </div>
              </a>

              <div class="card-button">
                <form class="" action="update-product.php" method="get">
                  <button type="submit" class="button button-default" name="id" value="<?php echo $data['id']; ?>">UPDATE</button>
                </form>
                <button type="submit" class="button button-danger" name="id">DELETE</button>
              </div>

            </div>
          </div>


            <div class="modal-box">
              <form class="lll" action="#" method="get">
                <button type="submit" class="button button-danger" id="delete" name="submit">HAPUS</button>
                <input type="hidden" name="id"  value="<?php echo $data['id']; ?>">
              </form>
              <button type="submit" class="button button-default" id="cancel" name="cancel">Gak Jadi</button>
            </div>


          <?php
        }
      }else {
        echo "Data kosong";
      }

     ?>
 </div>

 <?php
  if( isset($_GET['submit']) ){
    echo $_GET['id'];
  }
  ?>

<?php require("footer.php") ?>

<script>
  $(document).ready(function(){

    $(".button-danger").on('click', function(){
      $(".modal").fadeIn(800, function(){
        $(".modal-box").find("form").fadeIn(800);
      });
    });

    $(".modal, #cancel, #delete").on('click', function(){
      $(".modal, .modal-box").fadeOut(800);
    });

  });
</script>
