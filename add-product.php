<?php require("header.php") ?>

  <div class="container" style="margin-top: 25px;">
    <div class="poster text-center">
      <span class="poster-title"><h2>Form buat barang baru</h2></span>
      <form class="" action="#" method="post" enctype="multipart/form-data">
        <label for="">Gambar  :</label>
        <input type="file" name="gambar" required>
        <br>
        <br>

        <label for="">Nama Barang : </label>
        <br>
        <input type="text" name="nama" placeholder="Nama Barang" required>
        <br>
        <br>

        <label for="">Deskripsi barang : </label>
        <br>
        <textarea name="description" rows="8" cols="80"></textarea>
        <br>
        <br>

        <label for="">Harga : </label>
        <br>
        <input type="number" name="harga" min="0" step="1000" required>
        <br>
        <br>

        <label for="">Type : </label>
        <br>
        <select class="" name="tag">
          <option value="VGA">VGA</option>
          <option value="Casing">Casing</option>
          <option value="MotherBoard">Mother Board</option>
          <option value="Processor">Processor</option>
          <option value="RAM">RAM</option>
        </select>

        <br>
        <button type="submit" id="enter" class="button button-default" name="submit">Buat</button>
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

    // Sekarang upload ke database dulu
    $buat = "INSERT INTO product (title, description, price, tag)
              VALUES ('$barang->nama', '$barang->description', '$barang->harga', '$barang->tag')";

      // var_dump($buat);
      // die();
      if( mysqli_query($link, $buat) ){
        $id_baru = mysqli_insert_id($link);
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
          $namafile = "img/product/" . $namafile . ".jpg";

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
        alert("Ada error");
      </script>
      <?php
    }


  }
 ?>

<?php require("footer.php") ?>
