<?php require("header.php") ?>

<style media="screen">
  .img-priview {
    max-width: 80%;
  }
</style>

<?php
  // ambil dari parameter idnya dulu
  $id = $_GET['id'];
  $barang = "SELECT * FROM product WHERE id='$id' ";
  $hasil = mysqli_query($link, $barang);

  // keluakan jadi objek
  $data = mysqli_fetch_assoc($hasil);
  // echo $data['title'];
 ?>

  <div class="container" style="margin-top: 25px;">
    <div class="poster text-center">
      <span class="poster-title"><h2>Update Barang</h2></span>
      <form class="" action="#" method="post" enctype="multipart/form-data">
        <label for="">Gambar  :</label>
        <input type="file" name="gambar">
        <?php
          if( strlen($data['id'] > 0) ) {
            ?>
            <br>
            <h4>Image Sebelumnya</h4>
            <img src="img/product/<?php echo $data['id']; ?>.jpg" alt="" class="img-priview">
            <?php
          }
          // die(  );
         ?>
        <br>
        <br>

        <label for="">Nama Barang : </label>
        <br>
        <input type="text" name="nama" value='<?php echo $data['title']; ?>' required>
        <br>
        <br>

        <label for="">Deskripsi barang : </label>
        <br>
        <textarea name="description" rows="8" cols="80"><?php echo $data['description']; ?></textarea>
        <br>
        <br>

        <label for="">Harga : </label>
        <br>
        <input type="number" name="harga" min="0" step="1000" value='<?php echo $data['price']; ?>' required>
        <br>
        <br>

        <label for="">Type : </label>
        <br>
        <select class="" name="tag">
          <option value="<?php echo $data['tag']; ?>" selected style="background-color: #000; color: #fff;"><?php echo $data['tag']; ?>(Default)</option>
          <option value="VGA">VGA</option>
          <option value="Casing" >Casing</option>
          <option value="MotherBoard">Mother Board</option>
          <option value="Processor">Processor</option>
          <option value="RAM">RAM</option>
        </select>

        <br>
        <button type="submit" id="enter" class="button" name="submit">UPDATE</button>
      </form>
    </div>
  </div>



<?php
  if( isset($_POST['submit']) )
  {
    // print_r($_FILES);

    $barang = (object) array (
      'nama' => $_POST['nama'],
      'description' => $_POST['description'],
      'harga' => $_POST['harga'],
      'tag' => $_POST['tag'],
    );

    // var_dump($barang);

    // VALIDASI GAMBAR DAN UBAH NAMA
    $gambar = (object) array (
      'nama' => $_FILES['gambar']['name'],
      'type' => $_FILES['gambar']['type'],
      // 'type2' => pathinfo($gambar, PATHINFO_EXTENSION),
      'asal' => $_FILES['gambar']['tmp_name'],
      'error' => $_FILES['gambar']['error'],
      'size' => $_FILES['gambar']['size'],
    );

    // Sekarang update ke database dulu
    $update = "UPDATE product SET title = '$barang->nama', description = '$barang->description', price = '$barang->harga', tag = '$barang->tag' WHERE id=$id";

      // var_dump($update);
      // die();
      if( mysqli_query($link, $update) ){
        // $id_baru = mysqli_insert_id($link);
        // echo "id barunya adalah" . $last_id;
      }else{
        echo "Ada Error";

      }

    // massukkan Gambar ke folder
    if( $gambar->error == 0 ){

      if( $gambar->type == "image/jpeg" || $gambar->type == "image/png" || $gambar->type == "image/jpg" ){

        if( $gambar->size < 1000000 ){
          // ganti nama gambar dulu
          $namafile = str_replace("$gambar->nama", "", $id_baru);
          $namafile = "img/product/" . $id . ".jpg";

          move_uploaded_file($gambar->asal, $namafile);

          ?>
          <script type="text/javascript">
            alert("Data berhasil dimasukkan");
          </script>
          <?php

        }else {
          ?>
          <script type="text/javascript">
            alert("File tidak boleh lebih dari 1MB");
          </script>
          <?php
        }

      }

    }else {
      ?>
      <script type="text/javascript">
        alert("Berhasil... terupdate tanpa gambar Baru");
      </script>
      <?php
    }


  }
 ?>

<?php require("footer.php") ?>
