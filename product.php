<?php require("header.php"); ?>

<style media="screen">
  .col-8 {
    width: 78%;
    padding: 2% 1%;
  }
  .artikel {
    margin: 10px auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
  }
</style>

  <?php
    // ambil data dulu dari get
    $id = $_GET['id'];
    $barang = mysqli_query($link, "SELECT * FROM product WHERE id=$id ");

    // var_dump($barang);
    if( mysqli_num_rows($barang) > 0 ){

      if( $data = mysqli_fetch_assoc($barang) ){
        ?>
        <div class="container">
          <div class="col-8 artikel">
            <img src="img/product/<?php echo $data['id']; ?>.jpg" alt="">
            <h2><?php echo $data['title']; ?></h2>
            <p>
              <?php echo $data['description']; ?>
            </p>

          </div>

        </div>
        <?php
      }

    }
  ?>

<?php require("footer.php") ?>
