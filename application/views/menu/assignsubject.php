<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/skins/_all-skins.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">



  <!-- =============================================== -->

<!-------------------------------------------------------------------->
<?php
$this->load->view('components/header');
$this->load->view('components/sidemenu');

?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Assign Subject for Course</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <form id='assignsubjectform' name='assignsubjectform'> 
        <div class="box-body">
            <div class="row">
            <div class="col-xs-5">
               <label>Select Course</label>
                <select  id="course_id" name="course_id"  class="form-control select2" style="width: 100%;">
                <option selected="selected" value=''>Please Select</option>
                <?php
                  foreach ($course as $key => $value)
                  {
                ?>
                  <option value='<?php echo $value['crse_id']; ?>'><?php echo $value['crse_name'] ;?></option>
                <?php
                  }
                ?>
                </select>
            </div>
            </div>
              <div class="row">
              <div class="col-xs-5">
              <div class="form-group">
                <label>Select Subject</label>
                <select id='subject[]' name='subject[]' class="form-control select2" multiple="multiple" data-placeholder="Select subject" style="width: 100%;">
                  <option value="">--please select--</option>
                  <?php
                  foreach ($subject as $key => $value)
                  {
                  ?>
                    <option value='<?php echo $value['sub_id']; ?>'><?php echo $value['sub_name'] ;?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              </div>
              </div>
                         
        </div>
      </form>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="row">
                  <div class="col-xs-2">
                  <button type="button" class="btn btn-block btn-primary assign_subject">Assign</button>
                  </div>
               </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    <section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Assigned </h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
        <div class="form-group">
         <table class="table table-bordered" id="mytable">
           <thead>
            <tr>
            <th style="width: 10px">slno</th>
            <th>Course Name</th>
            <th>Subject Name</th>
            <th>Actions</th>
            </tr>
          </thead>
          <tbody>
  
          </tbody>
        </table>
      </div>
      </div>
      </div>




       
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">

  </div>
  <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>


  </div>
  <!-- /.content-wrapper -->

<?php
$this->load->view('components/footer');
$this->load->view('components/sidebarcontroller');
?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>public/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>public/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>public/dist/js/demo.js"></script>
<!---Custom js--->
<script src="<?php echo base_url(); ?>public/custom/js/script.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/select2/select2.full.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script src="<?php echo base_url(); ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

  });
</script>
<script>
  $(document).ready(function() {

$('.assign_subject').click(function(){

//alert("hyy");
//alert($('#starttime').val());
            
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>/data/assignsubject",
                    data: $('#assignsubjectform').serialize(),
                    dataType: "json",
                    success: function(response){
                       
                      //  console.log(response);
                       
                        //console.log(response.status);
                        if(response==true) //if success close modal and reload ajax table
                          {                     
                           toastr.success('Added Successfully..!!', 'Success Alert', {timeOut: 2000});
                           $('#course_id').val('').trigger("change");
                            $('.select2').val('').trigger("change");

                            //  $('#assignsubjectform')[0].reset();
                            //  $(".select2").multiselect('clearSelection');
                            
                            // $(".select2")[0].selectedIndex = 0;
                            
                           //$("#bin_number").multiselect('clearSelection');
                          }
                        else
                          { 
                            toastr.success('Some Error Happened..!!', 'Danger Alert', {timeOut: 2000});

                          }
                        
                       
                        },
                        error: function(xhr, textStatus, error) {
                          console.log(xhr.statusText);
                          console.log(textStatus);
                          console.log(error);


                        }
                    })
          
          });


          $('#course_id').change(function(){

//alert("hyy");
//alert($('#starttime').val());
            var course_id=$('#course_id').val();
            // alert(course_id);
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>/mdata/getassignsubject",
                    data: {'course_id':course_id},
                    dataType: "json",
                    success: function(response){
                       
                       console.log(response);



                       $.each(response, function(index, value) {

                        console.log(value.f_subject_id);
                        
                        // $('.select').multiple('setSelects', [1, 3]);
                        // Will stop running after "three"
                        // $(".select").multiselect('refresh');
                      });

     

                        //console.log(response.status);
                        // if(response==true) //if success close modal and reload ajax table
                        //   {                     
                        //    toastr.success('Added Successfully..!!', 'Success Alert', {timeOut: 2000});
                        //      $('#assignsubjectform')[0].reset();
                        //     //  $(".select2").multiselect('clearSelection');
                            
                        //     // $(".select2")[0].selectedIndex = 0;
                            
                        //    //$("#bin_number").multiselect('clearSelection');
                        //   }
                        // else
                        //   { 
                        //     toastr.success('Some Error Happened..!!', 'Danger Alert', {timeOut: 2000});

                        //   }
                        
                       
                        },
                        error: function(xhr, textStatus, error) {
                          console.log(xhr.statusText);
                          console.log(textStatus);
                          console.log(error);


                        }
                    })
          
          });
 //datatables
 var table = $('#mytable').DataTable({ 
 
 "processing": true, //Feature control the processing indicator.
 "serverSide": true, //Feature control DataTables' server-side processing mode.
 "order": [], //Initial no order.

 // Load data for the table's content from an Ajax source
 "ajax": {
     "url": "<?php echo site_url("tdata/getassignsubjectdata")?>",
     "type": "GET"
 },

 //Set column definition initialisation properties.
 "columnDefs": [
 { 
     "targets": [ -1 ], //last column
     "orderable": false, //set not orderable
 },
 ],
 "fnDrawCallback": function(oSettings){


   $('.updateview_btn').click(function(){
             
//                       $(".update_btn").show();
                   var sub_id=$(this).attr('id'); 
         
         $.ajax({
             type: "POST",
             url: "<?php echo site_url(); ?>/mdata/getmodelsubject",
             dataType : "json",
             data: {"sub_id" : sub_id},
             success: function(response){

                   console.log(response);
                   $('#subject_name').val(response[0].sub_name);
                   $('#id').val(response[0].sub_id);
                   $('#id').hide();
            
                 },
                 error: function(xhr, textStatus, error) {
                   console.log(xhr.statusText);
                   console.log(textStatus);
                   console.log(error);
                 }
             })
   
    });//update view in modal

$('.delete_btn').click(function(){
             
//                       $(".update_btn").show();
                   var sub_id=$(this).attr('id'); 
         
         $.ajax({
             type: "POST",
             url: "<?php echo site_url(); ?>/mdata/subjectdelete",
             dataType : "json",
             data: {"sub_id" : sub_id},
             success: function(response){

              if(response==true) //if success close modal and reload ajax table
                       {
                      
                       toastr.success('deleted Successfully..!!', 'Success Alert', { timeOut: 3000 });    
                       table.ajax.reload(null,false); //reload datatable ajax 
                 
                       }
                     else{
                     
                       toastr.error('Error..!!', 'Danger Alert', { timeOut: 3000 });    
                     }
            
                 },
                 error: function(xhr, textStatus, error) {
                   console.log(xhr.statusText);
                   console.log(textStatus);
                   console.log(error);
                 }
             })
   
    });//update view in modal
$('.update_btn').click(function(){
     
         $.ajax({
             type: "POST",
             url: "<?php echo site_url(); ?>/mdata/subjectupdate",
             data: $('#updatesubjectform').serialize(),
             dataType: "json",
             success: function(response){
             // alert(response);  

                  console.log(response);
                 if(response==true) //if success close modal and reload ajax table
                   {
                  $("#myModal").modal("hide");
                   toastr.success('Updated Successfully..!!', 'Success Alert', { timeOut: 3000 });    
                   table.ajax.reload(null,false); //reload datatable ajax 
             
                   }
                 else{
                    $("#myModal").modal("hide");
                   toastr.error('Error..!!', 'Danger Alert', { timeOut: 3000 });    
                 }

                 },
                 error: function(xhr, textStatus, error) {
                   console.log(xhr.statusText);
                   console.log(textStatus);
                   console.log(error);
                 }
             })
   
        });//update action

      }//fnDrawCallback

      });




});
</script>
</body>
</html>
