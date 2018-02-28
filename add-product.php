<?php require("header.php") ?>

<style media="screen">
  .container {
    width: 80%;
    padding: 0px 1%;
    margin: 0px auto;
  }
  .text-center {
    text-align: center;
  }
  .poster {
    background: #787878;
    padding: 2%;
    color: #fff;
  }
  .postre-title {
    display: block;
    font-weight: bold;
  }

  .button {
    cursor: pointer;
    color: #fff;
    margin: 10px;
    padding: 5px 20px;
    background: #595959;
    border: 2px solid;
    border-color: #8bffb3 #8bffb3 #09fa5c #09fa5c;
    border-radius: 7px;
    transition: 1s;
  }
  .button:hover {
    background: #000000;
  }
</style>

  <div class="container">
    <div class="poster text-center">
      <span class="poster-title"><h2>Form buat barang baru</h2></span>
      <form class="" action="#" method="post" enctype="multipart/form-data">
        <label for="">Gambar  :</label>
        <input type="file" name="gambar" required>
        <br>

        <label for="">Nama Barang : </label>
        <br>
        <input type="text" name="nama" placeholder="Nama Barang" required>
        <br>

        <label for="">Deskripsi barang : </label>
        <br>
        <textarea name="description" rows="8" cols="80"></textarea>
        <br>

        <label for="">Harga : </label>
        <br>
        <input type="number" name="harga" value="" step="1000" required>
        <br>

        <label for="">Tag : </label>
        <br>
        <select class="" name="tag">
          <option value="VGA">VGA</option>
          <option value="Casing">Casing</option>
          <option value="MotherBoard">Mother Board</option>
          <option value="Processor">Processor</option>
          <option value="RAM">RAM</option>
        </select>

        <br>
        <button type="submit" class="button" name="submit">Buat</button>
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
  }
 ?>

<?php require("footer.php") ?>
