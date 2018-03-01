<?php require("header.php") ?>
<style media="screen">
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
  border-bottom: 1px solid rgba(0, 0, 0, 0.5);
}

.card-container {
  padding: 10px;
  min-height: 150px;
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
                  <br>
                  <?php echo rupiah( $data['price'] ); ?>
                </div>
              </a>
            </div>

          </div>
          <?php
        }
      }else {
        echo "Data kosong";
      }

     ?>
 </div>

<?php require("footer.php") ?>
