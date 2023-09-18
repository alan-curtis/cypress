<?php
$term_id = get_queried_object()->term_id;
$_storage_key = "department_{$term_id}";
?>
<div class="container">
  <div class="row">
    <div class="table-listing col-sm-12">
      <div class="category_page_title">
        <h3><?php print single_term_title(); ?></h3>
      </div>
      <table id="customers">
        <tbody>
        <tr style="background-color: #f7f7f7;border: none;">
          <th class="col-xs-4 tableHead bgLightBlue">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector-Smart-Object_briefcase.png"
              class="img-responsive thIMG ">
            <?php print __('Career'); ?>
          </th>
          <th class="col-xs-4 tableHead bgBlue">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/images/Layer-35-copy.png"
              class="img-responsive thIMG" style="margin: 0 auto">
            <?php print __('Education Required'); ?>
          </th>
          <th class="col-xs-4 tableHead bgYellow">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/images/Vector-Smart-Object_hand.png"
              class="img-responsive thIMG" style="margin: 0 auto">
            <span
              style="color: #0a3975;"><?php print __('Salary Range'); ?></span>
          </th>
        </tr>

        <?php for ($i = 1; $i <= 10; $i++):
          $career = get_field("career_{$i}", $_storage_key);
          $education = get_field("education_{$i}", $_storage_key);
          $salary = get_field("salary_{$i}", $_storage_key);

          if (!empty($career) && !empty($education)):
            ?>
            <tr style="border: none;">
              <td><?php print $career; ?></td>
              <td><?php print $education; ?></td>
              <td><?php print $salary; ?></td>
            </tr>
          <?php
          endif;
        endfor; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
