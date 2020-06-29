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
          <h3 class="box-title">Select and View Student</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <form method='post' action='users' enctype="multipart/form-data">
       
        </form>


        <form id='studentmarks' method='post' name='studentmarks' enctype="multipart/form-data" action="marklist"> 
        <div class="box-body">
            <div class="row">
            <div class="col-xs-5">
               <label>Select Course</label>
                <select  id="course_id" name="course_id"  class="form-control" style="width: 100%;">
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
               <label>Select Semester</label>
                <select  id="sem_id" name="sem_id"  class="form-control" style="width: 100%;">
                <option selected="selected" value=''>Please Select</option>
                <?php
                  foreach ($semester as $key => $value)
                  {
                ?>
                  <option value='<?php echo $value['sem_id']; ?>'><?php echo $value['semester_name'] ;?></option>
                <?php
                  }
                ?>
                </select>
            </div>
            </div>
            <br/>
            <div class="row">
            <div class="col-xs-5">
            <input type='file' name='file' >
            <br/>
            <button type="submit" value='Upload' name='upload' class="btn btn-block btn-primary">Upload Marks</button>
            </div>
            </div>
            <div class="box-footer">
            
            </div>
          

        </div>
      </form>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    <section class="content">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">View Students Marks </h3>

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
            <th style="width: 10px">Admn No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Actions</th>
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

<form name="marklistform" id="marklistform">
  <!-- /.content-wrapper -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Marklist <span id="semname"></span></h4>
      </div>
      <div class="modal-body">
        <p>
          <div class="form-group has-feedback">
            <label>Student Name</label>
        <input type="text" name="student_name" id="student_name" class="form-control"  required="required" autofocus="autofocus">
        </div>
        <div class="form-group has-feedback">
         <!-- <label>id</label> -->
        <input type="hidden" name="id" id="id" class="form-control">
        </div>

        </p>
      </div>


      <div class="modal-footer">
        <div class="btn-group">
          <button type="button" class="btn btn-info update_btn">Update</button></div>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>


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
      

      var table = $('#mytable').DataTable( {
      processing: true,

      
      "ajax": {
            // "url":'../../public/object.txt',
            "url":"<?php echo site_url(); ?>/tdata/getstudentdata",
            "type": "GET"
        },
        "columns": [
            { "data": "admssn_no" },
            { "data": "first_name" },
            { "data": "last_name" },
            { "data": "crse_name" },
            { "data": "semester_name" },
  
        ],
        "columnDefs": [
         {
          "targets": 5,
          "data": "user_id",
          "render": function ( data, type, row, meta ) {
            return "<button type='button' id="+data+" data-toggle='modal' data-target='#myModal' class='btn btn-info updateview_btn'>update/view</button>";
          }        
            
         }
      ],
        "order": [[1, 'asc']],
        
        "fnDrawCallback": function(oSettings){
                    $('.updateview_btn').click(function(){
             
                             // $(".update_btn").show();
                      var user_id=$(this).attr('id'); 
                        // alert(user_id)
                      $.ajax({
                          type: "GET",
                          url: "<?php echo site_url(); ?>/mdata/getmarklist",
                          dataType : "json",
                          data: {"user_id" : user_id},
                          success: function(response){
             
                                console.log(response);
                                $('#semname').text(response[0].f_sem_id);
                                 $('#student_name').val(response[0].f_user_id);
                                 $('#id').val(response[0].f_user_id);
                                // $('#id').hide();
                         
                              },
                              error: function(xhr, textStatus, error) {
                                console.log(xhr.statusText);
                                console.log(textStatus);
                                console.log(error);
                              }
                          })
                
                 });//update view in modal

        }
       
    } );
          // $('#mytable').DataTable({ 

          //   "processing": true, //Feature control the processing indicator.
          //   "serverSide": true, //Feature control DataTables' server-side processing mode.
          //   "order": [], //Initial no order.

          //   // Load data for the table's content from an Ajax source
          //   "ajax": {
          //       "url": "<?php echo site_url("tdata/getstudentdata")?>",
          //       "type": "GET",
          //   },
          //   //Set column definition initialisation properties.
          //   "columnDefs": [
          //   { 
          //       "targets": [ -1 ], //last column
          //       "orderable": false, //set not orderable
          //   },
          //   ],
          //   "fnDrawCallback": function(oSettings){



          //        }//fnDrawCallback

          //        });
    // $('.excelexport').click(function(){

     
    //       $.ajax({
    //                 type: "POST",
    //                 url: "<?php echo site_url(); ?>/mdata/excelexport",
    //                 data: $('#excelform').serialize(),
    //                 dataType: "json",
    //                 success: function(response){
                       
    //                   //  console.log(response);
                       
    //                     //console.log(response.status);
    //                     if(response==true) //if success close modal and reload ajax table
    //                       {                     
    //                        toastr.success('Added Successfully..!!', 'Success Alert', {timeOut: 2000});
    //                        $('#course_id').val('').trigger("change");
    //                        $('#sem_id').val('').trigger("change");
    //                         $('.select2').val('').trigger("change");

    //                         //  $('#assignsubjectform')[0].reset();
    //                         //  $(".select2").multiselect('clearSelection');
                            
    //                         // $(".select2")[0].selectedIndex = 0;
                            
    //                        //$("#bin_number").multiselect('clearSelection');
    //                       }
    //                     else
    //                       { 
    //                         toastr.success('Some Error Happened..!!', 'Danger Alert', {timeOut: 2000});

    //                       }
                        
                       
    //                     },
    //                     error: function(xhr, textStatus, error) {
    //                       console.log(xhr.statusText);
    //                       console.log(textStatus);
    //                       console.log(error);


    //                     }
    //                 })


    // });
// $('.excelexport').click(function(){

//                 $.ajax({
//                     type: "POST",
//                     url: "<?php echo site_url(); ?>/menu/exportStudent",
//                     data: $('#studentform').serialize(),
//                     dataType: "json",
//                     success: function(response){
                       
//                         if(response==true) //if success close modal and reload ajax table
//                           {                     
//                            toastr.success('Moved Successfully..!!', 'Success Alert', {timeOut: 2000});
//                            $('#course_id').val('').trigger("change");
//                            $('#sem_id').val('').trigger("change");
//                           }
//                         else
//                           { 
//                             toastr.success('Some Error Happened..!!', 'Danger Alert', {timeOut: 2000});

//                           }
                        
                       
//                         },
//                         error: function(xhr, textStatus, error) {
//                           console.log(xhr.statusText);
//                           console.log(textStatus);
//                           console.log(error);


//                         }
//                     })
          
//           });


$('.movesem').click(function(){

//alert("hyy");
//alert($('#starttime').val());
         // alert($('#sem_id').val());   
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>/student/movesem",
                    data: $('#studentform').serialize(),
                    dataType: "json",
                    success: function(response){
                       //  9400789989
                        console.log(response);
                       
                        //console.log(response.status);
                        if(response==true) //if success close modal and reload ajax table
                          {                     
                           toastr.success('Moved Successfully..!!', 'Success Alert', {timeOut: 2000});
                           $('#course_id').val('').trigger("change");
                           $('#sem_id').val('').trigger("change");
                           table.ajax.reload(null,false); 
                           //  $('.select2').val('').trigger("change");

                             // $('#studentform')[0].reset();
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






          // $('#sem_id').change(function(){
          //   var course_id=$('#course_id').val();
          //   var sem_id=$('#sem_id').val(); 
          //   // table.ajax.reload(null,false); //reload datatable ajax 


          // $('#mytable').DataTable({ 

          //   "processing": true, //Feature control the processing indicator.
          //   "serverSide": true, //Feature control DataTables' server-side processing mode.
          //   "order": [], //Initial no order.

          //   // Load data for the table's content from an Ajax source
          //   "ajax": {
          //       "url": "<?php echo site_url("tdata/getstudentdata")?>",
          //       "type": "GET",
          //       "data": {
          //          "course_id": course_id,
          //          "sem_id":sem_id
          //        }
          //   },
          //   //Set column definition initialisation properties.
          //   "columnDefs": [
          //   { 
          //       "targets": [ -1 ], //last column
          //       "orderable": false, //set not orderable
          //   },
          //   ],
          //   "fnDrawCallback": function(oSettings){



          //        }//fnDrawCallback

          //        });


                      
          //             });
             //datatables

 






});
</script>
</body>
</html>
