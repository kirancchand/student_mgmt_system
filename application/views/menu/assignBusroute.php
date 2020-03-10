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
          <h3 class="box-title">Assign Bus to Route</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <form id='assignbusrouteform' name='assignbusrouteform'> 
        <div class="box-body">
            <div class="row">
            <div class="col-xs-5">
               <label>Select Bus Number</label>
                <select  id="busno" name="busno"  class="form-control select2" style="width: 100%;">
                  <option selected="selected" value='0'>Alabama</option>
                  <option value='1'>Alaska</option>
                  <option value='2'>California</option>
                  <option value='3'>Delaware</option>
                  <option value='4'>Tennessee</option>
                  <option value='5'>Texas</option>
                  <option value='6'>Washington</option>
                </select>
            </div>
            </div>
              <div class="row">
              <div class="col-xs-5">
              <div class="form-group">
                <label>Select Place</label>
                <select id='routes[]' name='routes[]'  class="form-control select2" multiple="multiple" data-placeholder="Select routes" style="width: 100%;">
                  <option value="0">--please select--</option>
                  <option value="1">VEMBAYAM</option>
                  <option value="2">place 2</option>
                  <option value="3">place 3</option>
                  <option value="4">place 4</option>
                  <option value="5">place 5</option>
                  <option value="6">place 6</option>
                </select>
              </div>
              </div>
              </div>

              <div class="row">
              <div class="col-xs-5">
              <div class="form-group">
                           <!-- time Picker -->
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Journey Start Time</label>
                      <div class="input-group">
                        <input id='starttime' name='starttime' class="form-control timepicker">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>

              </div>
              </div>
              </div>

              <div class="row">
              <div class="col-xs-5">
              <div class="form-group">
                           <!-- time Picker -->
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Journey End Time</label>
                      <div class="input-group">
                        <input id='endtime' name='endtime' type="text" class="form-control timepicker">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>
              </div>
              </div>
              </div>
               
             
        </div>
      </form>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="row">
                  <div class="col-xs-2">
                  <button type="submit" class="btn btn-block btn-primary add_btn">Add</button>
                  </div>
               </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
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

$('.add_btn').click(function(){

//alert("hyy");
//alert($('#starttime').val());
            
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>/menu/assignBusroute",
                    data: $('#assignbusrouteform').serialize(),
                    dataType: "json",
                    success: function(response){
                       
                       console.log(response);
                       
                        //console.log(response.status);
                        if(response==true) //if success close modal and reload ajax table
                          {                     
                           toastr.success('Added Successfully..!!', 'Success Alert', {timeOut: 2000});
                           //$('#assignbinmemberform')[0].reset();
                             $('#busno').val('0').trigger("change");
                             $("#routes").multiselect('deselectAll', false);
                            
                                  //$("#bin_number")[0].selectedIndex = 0;
                            
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
});
</script>
</body>
</html>
