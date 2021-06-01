<div class="main_notify"></div>
<form action="" method="POST" id="candidate_add_form" enctype="multipart/form-data">
   <input type="hidden" name="id" value="<?php echo  isset($directory_data['id']) ? $directory_data['id'] : ''; ?>">
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" id="first_name" aria-describedby="emailHelp" name="first_name" value="<?php echo  isset($directory_data['first_name']) ? $directory_data['first_name'] : ''; ?>" placeholder="Enter First name">
         </div>

      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label for="exampleInputEmail1">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" aria-describedby="emailHelp" name="middle_name" value="<?php echo  isset($directory_data['middle_name']) ? $directory_data['middle_name'] : ''; ?>" placeholder="Enter Middle name">
         </div>

      </div>
   </div>
   <div class="row">
      <div class="col-md-6">

         <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" id="last_name" aria-describedby="emailHelp" name="last_name" value="<?php echo  isset($directory_data['last_name']) ? $directory_data['last_name'] : ''; ?>" placeholder="Enter Last name">
         </div>
      </div>
      <div class="col-md-6">

         <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo  isset($directory_data['email']) ? $directory_data['email'] : ''; ?>" placeholder="Enter Last name">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="exampleInputEmail1">Mobile No</label>
            <input type="text" class="form-control" id="mobile_no" aria-describedby="emailHelp" name="mobile_no" value="<?php echo  isset($directory_data['mobile_no']) ? $directory_data['mobile_no'] : ''; ?>" placeholder="Enter Last name">
         </div>

      </div>
      <div class="col-md-6">

         <div class="form-group">
            <label for="exampleInputEmail1">Landline No</label>
            <input type="text" class="form-control" id="landline_no" aria-describedby="emailHelp" name="landline_no" value="<?php echo  isset($directory_data['landline_no']) ? $directory_data['landline_no'] : ''; ?>" placeholder="Enter Last name">
         </div>
      </div>
   </div>
   <div class="form-group">
      <label for="exampleInputEmail1">Notes</label>
      <textarea name="notes" class="form-control"><?php echo  isset($directory_data['notes']) ? $directory_data['notes'] : ''; ?></textarea>
   </div>

   <div class="form-group">
      <label for="exampleInputEmail1">Candidate Image</label>
      <input type="file" name="user_image" class="form-control">
   </div>

   <input type="submit" class="btn btn-primary"></input>
   </div>
</form>