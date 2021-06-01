var base_url = 'http://localhost/directory_user_interview/';

  $('body').on('submit', '#loginSubmit', function(e) {
    e.preventDefault();
    var id = $(this).closest('td').attr('data-id');
    var formName = '#loginSubmit';
    $(formName).find('.main_notify').html("");
      $(formName).find(':input').each(function(i, ind) {
        $(this).removeClass('redBorder');
        $(this).closest('div').find('.appErr').remove();
      })
    $.ajax({
      type: 'POST',
      url: 'checkUserInfo',
      data: $(formName).serialize(),
      success: function(resp) {
                  var obj = JSON.parse(resp)
          if (obj.status == 200) {
            $('.main_notify').css({
              'color': 'green'
            })
            $('.main_notify').html(obj.msg)
            $(formName)[0].reset();
            setTimeout(function() {
            window.location.href = base_url+'index.php/DirectoryInfo';              
            }, 2000)
           } else if (obj.status == 201) {
                  showFormErrors(formName,obj.err)

          } else if (obj.status == 203 || obj.status == 202) {
            $('.main_notify').css({
              'color': 'red'
            })
            $('.main_notify').html(obj.msg)
          } else {
            alert(obj.msg)
          }

      }
    })
  })

function showFormErrors(formName,err) {
   if($.isArray(err)){      
      $.each(err,function(i,index){
         $(formName).find(':input[name=' + index.field + ']').addClass('redBorder');
         $(formName).find(":input[name='" + index.field + "']").last().after("<span class='appErr'>" + index.msg + "</span>");
         $(formName).find(":input[name='" + index.field + "']").focus();
      })
   }
}





















    $('.add_candidate_form').click(function() {
      $.ajax({
        type: 'POST',
        url: 'getDirectoryAddModal',
        success: function(resp) {
          $('#addDirectoryModal').find('#modalData').html(resp)
          $('#addDirectoryModal').modal('show')
        }
      })
    })


    $('body').on('submit', '#candidate_add_form', function(e) {
      e.preventDefault();
      var formName = '#candidate_add_form';
      $(formName).find('.main_notify').html("");
      $(formName).find(':input').each(function(i, ind) {
        $(this).removeClass('redBorder');
        $(this).closest('div').find('.appErr').remove();
      })
      var formData = new FormData($(this)[0]);
      $.ajax({
        type: 'POST',
        url: 'directoryAdd',
        data: formData,
        processData: false,
        contentType: false,
        success: function(resp) {
          var obj = JSON.parse(resp)
          if (obj.status == 200) {
            $('.main_notify').css({
              'color': 'green'
            })
            $('.main_notify').html(obj.msg)
            $(formName)[0].reset();
            setTimeout(function() {
              $('#addDirectoryModal').modal('hide');
            }, 2000)
                           var table = $('#directory_data').dataTable();
        var passData = "?" + $('#searchDistributorForm').serialize();
        table.fnReloadAjax("getAllDirectoryInfoDatatable" + passData);
        getSerchFormOnUser()
          } else if (obj.status == 201) {
            showFormErrors(formName,obj.err)
          } else if (obj.status == 203) {
            $('.main_notify').css({
              'color': 'red'
            })
            $('.main_notify').html(obj.msg)
          } else {
            alert(obj.msg)
          }
        }
      })

    })

  

  $('body').on('click', '.candidateEditdata', function() {
    var id = $(this).attr('data-id');
    var formName = '#candidate_add_form';
    $.ajax({
      type: 'POST',
      url: 'getDirectoryAddModal',
      data: {
        id: id
      },
      success: function(resp) {
        $('#addDirectoryModal').find('#modalData').html(resp)
        $('#addDirectoryModal').modal('show')
      }
    })
  })
    $('body').on('click', '.candidateviewDirectory', function() {
    var id = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: 'getViewDirectory',
      data: {
        id: id
      },
      success: function(resp) {
               $('#addDirectoryModal').find('#modalData').html(resp)
        $('#addDirectoryModal').modal('show')
      }
    })
  })

  $('body').on('click', '.candidatedeletedata', function() {
    var id = $(this).attr('data-id');
    var conf = confirm("Are You Sure You Want To Delete This Directory Info")
    if (conf) {

      $.ajax({
        type: 'POST',
        // url: '<?php echo base_url('index.php/CandidateInfo/deleteCandidateData') ?>',
        url: 'deleteCandidateData',
        data: {
          id: id
        },
        success: function(resp) {
          var obj = JSON.parse(resp)
          alert(obj.msg);
              var formData = $('#searchDistributorForm').serialize();
                  var table = $('#directory_data').dataTable();
        var passData = "?" + $('#searchDistributorForm').serialize();
        table.fnReloadAjax("getAllDirectoryInfoDatatable" + passData);
        getSerchFormOnUser()
        }
      })
    }
  })
$('body').on('click', '.chartViewOfDirectory', function() {
    var id = $(this).closest('td').attr('data-id');


      $.ajax({
        type: 'POST',
        url: 'chartViewOfDirectory',
        data: {
          id: id
        },
        success: function(resp) {
    $('#chartUserModel').find('.modal-body #modalData').html(resp);        
    $('#chartUserModel').modal('show');        
        }
      })
  })

  function getSerchFormOnUser() {
// console.log("formData");
// console.log(formData);
    $.ajax({
      type: 'GET',
      url: 'getAllSearchParamOnDash',
      success: function(resp) {
        $('#search_form_dash').html(resp)
      }
    })
  }