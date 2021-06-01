<form action="" method="POST" id="searchDistributorForm">
  <div class="row">

    <div class="form-group col-md-4">
      <label for="exampleInputEmail1">Name</label>
      <select name="first_name" class="form-control f_name" id="f_name">
        <option value="">--Select Any One--</option>
        <?php foreach (array_unique($first_name) as $key => $value) { ?>
          <option value="<?php echo $value ?>"><?php echo $value;  ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="exampleInputEmail1">Telephone No</label>
      <select name="mobile_no" class="form-control mobile_no" id="mobile_no">
        <option value="">--Select Any One--</option>
        <?php foreach (array_unique($mobile_no) as $key => $value) { ?>
          <option value="<?php echo $value ?>"><?php echo $value;  ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="exampleInputEmail1">&nbsp;</label>
      <label for="exampleInputEmail1">&nbsp;</label>
      <label for="exampleInputEmail1">&nbsp;</label>
      <input type="submit" class=" btn btn-primary" />
    </div>
  </div>

</form>

<script type="text/javascript">
  $(document).ready(function() {

    $('.mobile_no, .f_name').select2();
  })
</script>