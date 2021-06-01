<?php $this->load->view('template/header.php');    ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('template/navigation.php') ?>
    <?php $this->load->view('template/sidebar.php');    ?>
    <!-- Left side column. contains the logo and sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Directory</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)" class="btn btn-primary add_candidate_form">Add Directory</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Search Form</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="search_form_dash"> </div>
          </div>
          <!-- /.card-body -->

          <!-- /.card-footer -->
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Directory Listings</h3>
            <div class="card-tools">
              <!-- Buttons, labels, and many other things can be placed here! -->
              <!-- Here is a label for example -->

            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">


            <div class="table-responsive-sm table-responsive-md table-responsive">
              <!-- begin: Datatable  -->
              <table class="table table-striped- table-bordered table-hover table-checkable directory_data" id="directory_data">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Landline</th>
                    <th scope="col">Image</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
              </table>
              <!--end: Datatable -->
            </div>



            <!-- 
          <div id="directory_data">

          </div> -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
          <!-- /.card-footer -->
        </div>

        <!-- /.row -->
      </section>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div id="addDirectoryModal" class="modal fade" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"> User Info</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div id="modalData"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->



    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->
  <?php $this->load->view('template/footer.php');    ?>
</body>

</html>
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    getSerchFormOnUser()

    $('#directory_data').dataTable({
      searching: false,
      processing: true,
      serverSide: true,
      ajax: 'getAllDirectoryInfoDatatable',

      columnDefs: [{
          "render": function(data, type, row) {
            // console.log(row)
            // return 'bharat';
            return '<a href="javascript:void(0)" class="candidateEditdata" data-id="' + data + '"><i class="fa fa-edit"></i> </a>|<a href="javascript:void(0)" class="candidatedeletedata" data-id="' + data + '"><i class="fa fa-trash"></i></a>|<a href="javascript:void(0)" class="candidateviewDirectory" data-id="' + data + '"><i class="fa fa-eye"></i></a>'
          },
          "targets": 10,
        },
        {
          "render": function(data, type, row) {
            // if(empty(data))
            if (data == "" || data == "undefined")
              return '<p style="white-space: nowrap;">No Image Found</p>';

            var path = '<?php echo base_url('uploads/user_images'); ?>';
            data = '<a href="' + path + '/' + data + '" target="_blank" >Image</a>';
            // return 'bharat';
            return data
          },
          "targets": 7,
        },

      ],
    })
  })
  $('body').on('submit', '#searchDistributorForm', function(e) {
    e.preventDefault();
    var table = $('#directory_data').dataTable();
    var passData = "?" + $('#searchDistributorForm').serialize();
    table.fnReloadAjax("getAllDirectoryInfoDatatable" + passData);
    // getAllDirectoryInfo(formData)
  })
</script>