<div class="main_notify"></div>
<div class="row">
   <?php // echo "<pre>";print_r($directory_data); 
   ?>
   <div class="form-group  col-md-4">
      <label for="exampleInputEmail1">Created On-:</label>
      <?php echo  isset($directory_data['created_at']) ? date("d/m/Y", strtotime($directory_data['created_at'])) : ''; ?>
   </div>
   <div class="form-group col-md-4">
      <label for="exampleInputEmail1">Updated On-:</label>
      <?php
      $updated = "Not Updated";
      if (!empty($directory_data['updated_by'])) {
         $updated = date("d/m/Y", strtotime($directory_data['updated_at']));
      } ?>
      <?php echo $updated; ?>
   </div>

</div>
<div class="row">

   <div class="form-group  col-md-6">
      <label for="exampleInputEmail1">First Name-:</label>
      <?php echo  isset($directory_data['first_name']) ? $directory_data['first_name'] : ''; ?>
   </div>
   <div class="form-group col-md-6">
      <label for="exampleInputEmail1">Middle Name-:</label>
      <?php echo  isset($directory_data['middle_name']) ? $directory_data['middle_name'] : ''; ?>
   </div>
</div>
<div class="row">
   <div class="form-group col-md-6">
      <label for="exampleInputEmail1">Last Name:-</label>
      <?php echo  isset($directory_data['last_name']) ? $directory_data['last_name'] : ''; ?>
   </div>
   <div class="form-group col-md-6">
      <label for="exampleInputEmail1">Email-:</label>
      <?php echo  isset($directory_data['email']) ? $directory_data['email'] : ''; ?>
   </div>
</div>
<div class="row">
   <div class="form-group col-md-6">
      <label for="exampleInputEmail1">Mobile No-:</label>
      <?php echo  isset($directory_data['mobile_no']) ? $directory_data['mobile_no'] : ''; ?>
   </div>
   <div class="form-group col-md-6">
      <label for="exampleInputEmail1">Landline No-:</label>
      <?php echo  isset($directory_data['landline_no']) ? $directory_data['landline_no'] : ''; ?>
   </div>
</div>
<div class="row">
   <div class="form-group ">
      <label for="exampleInputEmail1">Notes-:</label>
      <?php echo  isset($directory_data['notes']) ? $directory_data['notes'] : ''; ?>
   </div>

</div>
<div class="form-group">
   <?php $image_path = "No Image Found";
   if (isset($directory_data['user_image_path'])) {
      if (!empty($directory_data['user_image_path'])) {
         echo "Click On Above Link To Open Image";
         echo "<br>";
         $image_path = '<a href="' . base_url('uploads/user_images/') . $directory_data['user_image_path'] . '" target="_blank" >Image</a>';
      }
   }
   echo $image_path;
   ?>
</div>

</div>