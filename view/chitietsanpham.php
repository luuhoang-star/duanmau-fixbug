<style>
td {
  padding: 0 20px;
}
</style>

<main class="catalog  mb ">

    <?php
      extract($sp);
    ?>
    <div class="boxleft">
      <div class="  mb">
        <div class="box_title">
            <?php echo $name;?>
        </div>
        <div class="box_content">
            <?php
              $linkimg = $img_path . $img;
              echo "<img src='$linkimg' width='300'>";
              echo "<p>$mota</p>";
            ?>
        </div>
      </div>

      <div class="mb">
        <div class="box_title">BÌNH LUẬN</div>
        <div class="box_content2  product_portfolio binhluan ">
          <table>
            <?php foreach($binhluan as $value): ?>
            <?php extract($value); ?>
              <tr>
                <td><?php echo $noidung; ?></td>
                <td><?php echo $user; ?></td>
                <td>
                    <?php echo date("d/m/Y", strtotime($ngaybinhluan)); ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <div class="box_search">
          <form action="index.php?act=sanphamct&idsp=<?php echo $id; ?>" method="POST">
            <input type="hidden" name="idpro" value="<?php echo $id; ?>">
            <input type="text" name="noidung" required>
            <input type="submit" name="guibinhluan" value="Gửi bình luận">
          </form>
        </div>


      </div>

      <div class=" mb">
        <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
        <div class="box_content">
          <?php foreach($sp_cungloai as $value): ?>
          <?php extract($value); ?>
          <li>
              <a href="index.php?act=sanphamct&idsp=<?php echo $id ;?>">
                  <?php echo $name; ?>
              </a>
          </li>
          <?php endforeach; ?>
        </div>
      </div>
    </div>


    
   <?php include "view/boxright.php"; ?>

  </main>