<script>
  $(".loading").css("display","none")

  var userid =  "<?php echo $userid ?>";
  var id =  "<?php echo  $_GET['id'] ?>" ;

  if(userid != "")
  {
    $("#txtfname").attr("readonly", "true");
    $("#txtlname").attr("readonly", "true");
    $("#txtcontact").attr("readonly", "true");
  }

  $('#slchelix').val("<?php echo $row['helix'] ?>");
  $('#slctoolmaterial').val("<?php echo $row['toolmaterial'] ?>");
  $('#slccoating').val("<?php echo $row['coating'] ?>");
  $('#slcmachine').val("<?php echo $row['machine'] ?>");


  $(function () {
       $( "#txtdiameter" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          var val = $(this).val();
          if ($(this).val() > max){
              $(this).val(max);
          }
          else if ($(this).val() < min){
              $(this).val(min);
          }    
          else if (min<$(this).val()<max){
              $(this).val();
          }       
        });

        $( "#txtdiameter2" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          var val = $(this).val();
          if ($(this).val() > max){
              $(this).val(max);
          }
          else if ($(this).val() < min){
              $(this).val(min);
          }    
          else if (min<$(this).val()<max){
            $(this).val();
          }       
        }); 


        $( "#txtfl" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          var val = $(this).val();
          if ($(this).val() > max){
              $(this).val(max);
          }
          else if ($(this).val() < min){
              $(this).val(min);
          }    
          else if (min<$(this).val()<max){
            $(this).val();
          }       
        }); 

        $( "#txtlength" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          var val = $(this).val();
          if ($(this).val() > max){
              $(this).val(max);
          }
          else if ($(this).val() < min){
              $(this).val(min);
          }    
          else if (min<$(this).val()<max){
            $(this).val();
          }       
        }); 

        $( "#numofteeth" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          var val = $(this).val();
          if ($(this).val() > max){
              $(this).val(max);
          }
          else if ($(this).val() < min){
              $(this).val(min);
          }    
          else if (min<$(this).val()<max){
            $(this).val(Math.round($(this).val()));
          }       
        }); 

        $( "#txtqua" ).change(function() {
          $(this).val(Math.round($(this).val()));
          // var max = parseInt($(this).attr('max'));
          // var min = parseInt($(this).attr('min'));
          // var val = $(this).val();
          // if ($(this).val() < min){
          //     $(this).val(min);
          // }    
          // else if (min<$(this).val()){
          //   $(this).val(Math.round($(this).val()));
          // }       
        }); 
  });




var fupload1 = "<?php echo $row['fileupload1']; ?>";
var fupload2 = "<?php echo $row['fileupload2']; ?>";
var fupload3 = "<?php echo $row['fileupload3']; ?>";


var chkfile1  = 0;
var chkfile2  = 0;
var chkfile3  = 0;



var fileSize;
var sizeInMb;
var sizeLimit;
var ext1;
var ext2;
var ext3;
// var max_file = 5 * 1024 * 1024; // 5MB

$("#fupload1").change(function () {
     fileSize = this.files[0];
     sizeInMb = fileSize.size;
     sizeLimit = 1024*1024*10;
     myfile1 = $( this ).val().split('.').pop();
     ext1 = myfile1.toLowerCase();
     if(ext1=="pdf" || ext1=="sldprt" || ext1=="sldasm" || ext1=="slddrw" || ext1=="slddrt" || ext1=="doc" || ext1=="docx" || ext1=="png" || ext1=="jpg"){
          if (sizeInMb > sizeLimit)
            {
              Swal.fire({
                          icon: 'error',
                          title: 'FILE UPLOAD',
                          text: 'Max file size 10MB' ,
                        })
              $('#txtfupload1').html('');
              $(this).val('');
              chkfile1 = 1;
            }
            else
            {
              $('#txtfupload1').html($(this).val().split(/[\\|/]/).pop());
              chkfile1 = 2;
            }
        }else{
          Swal.fire({
            icon: 'error',
            title: 'FILE UPLOAD',
            text: 'Upload Not Allowed' ,
          })
          $('#txtfupload1').html('');
          $(this).val('');
          chkfile1 = 1;
        }
});

$("#fupload2").change(function () {
     fileSize = this.files[0];
     sizeInMb = fileSize.size;
     sizeLimit = 1024*1024*10;
     myfile2 = $( this ).val().split('.').pop();
     ext2 = myfile2.toLowerCase();
     if(ext2=="pdf" || ext2=="sldprt" || ext2=="sldasm" || ext2=="slddrw" || ext2=="slddrt" || ext2=="doc" || ext2=="docx" || ext2=="png" || ext2=="jpg"){
          if (sizeInMb > sizeLimit)
            {
              Swal.fire({
                          icon: 'error',
                          title: 'FILE UPLOAD',
                          text: 'Max file size 10MB' ,
                        })
              $('#txtfupload2').html('');
              $(this).val('');
              chkfile2 = 1;
            }
            else
            {
              $('#txtfupload2').html($(this).val().split(/[\\|/]/).pop());
              chkfile2 = 2;
            }
        }else{
          Swal.fire({
            icon: 'error',
            title: 'FILE UPLOAD',
            text: 'Upload Not Allowed' ,
          })
          $('#txtfupload2').html('');
            $(this).val('');
            chkfile2 = 1;
        }
});

$("#fupload3").change(function () {
     fileSize = this.files[0];
     sizeInMb = fileSize.size;
     sizeLimit = 1024*1024*10;
     myfile3 = $( this ).val().split('.').pop();
     ext3 = myfile3.toLowerCase();
     if(ext3=="pdf" || ext3=="sldprt" || ext3=="sldasm" || ext3=="slddrw" || ext3=="slddrt" || ext3=="doc" || ext3=="docx" || ext3=="png" || ext3=="jpg"){
          if (sizeInMb > sizeLimit)
            {
              Swal.fire({
                          icon: 'error',
                          title: 'FILE UPLOAD',
                          text: 'Max file size 10MB' ,
                        })
              $('#txtfupload3').html('');
              $(this).val('');
              chkfile3 = 1;
            }
            else
            {
              $('#txtfupload3').html($(this).val().split(/[\\|/]/).pop());
              chkfile3 = 2;
            }
        }else{
          Swal.fire({
            icon: 'error',
            title: 'FILE UPLOAD',
            text: 'Upload Not Allowed' ,
          })
          $('#txtfupload3').html('');
          $(this).val('');
          chkfile3 = 1;
        }
});


  $("#form1").submit(e => {
      e.preventDefault();
  });

  $( "#txtconfirm" ).click(function() {
    checkb()
    checkstate()
    if(checkconfirm == true)
    {
      Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
        }).then((result) =>
         {
          if (result.isConfirmed)
          { 
            $(".loading").css("display","block")
            savedata()
          } else if (result.isDenied) {
          }
        })
    }
    else{
      Swal.fire({
              icon: 'error',
              title: 'ERROR',
              text:  txtconfirm  ,
            })
    }
  });

        function savedata(){
            
              var formData = new FormData(document.getElementById("form1"));
              formData.append("userid", <?php echo "\"".$userid."\""; ?>)
              formData.append("orderid", <?php echo "\"".$_GET['id']."\""; ?>)
              formData.append("chkfile1", chkfile1 )
              formData.append("chkfile2", chkfile2 )
              formData.append("chkfile3", chkfile3 )
              formData.append("txtf1", $("#txtfupload1").text())
              formData.append("txtf2", $("#txtfupload2").text())
              formData.append("txtf3", $("#txtfupload3").text())
             
              $.ajax({
              url: 'api/ajax_orderedit.php',
              type: "POST",
              cache: false,
              processData: false,
              contentType: false,
              dataType: "json",
              data: formData,
              success: data => 
              {     
                if(data.success == true)
                {
                  $(".loading").css("display","none")
                      Swal.fire({
                          icon: 'success',
                          title: 'ยินดีด้วย',
                          text: data.reason ,
                        }).then(function() {
                          // $(".loading").css("display","block")
                          // window.location = window.location.href;
                          console.log(data)
                        }); 
                }
                else{
                  $(".loading").css("display","none")
                      Swal.fire({
                          icon: 'error',
                          title: 'Data Error',
                          text: data.reason ,
                        })
                }
                
              },
              error: (xhr, status, error) => {
                if (xhr.status==0) {
                        console.log('You are offline!!\n Please Check Your Network.');
                    } else if(xhr.status==404) {
                        console.log('Requested URL not found.');
                    } else if(xhr.status==500) {
                        console.log('Internel Server Error.');
                    } else if(xhr=='parsererror') {
                        console.log('Error.\nParsing JSON Request failed.');
                    } else if(xhr=='timeout'){
                        console.log('Request Time out.');
                    } else {
                        console.log('Unknow Error.\n'+xhr.responseText);
                    }
                  var errorMessage = xhr.status + ': ' + xhr.statusText;
                  $(".loading").css("display","none")
                  console.log(errorMessage);
                },
          });
        }
 

      var checkconfirm
      var txtconfirm
      function checkstate(){
        checkconfirm = true;
        txtconfirm = "";
        if($('#txtfname').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกชื่อ";
        }
        if($('#txtlname').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกนามสกุล";
        }
      }

      $("#slctoolmaterial").change(function () {
        console.log("test")
          if ($(this).val() == "Other") {
            $('#txttoolmaterial').show();      
          } else {
            $('#txttoolmaterial').val('');
            $('#txttoolmaterial').hide();
            $('#txttoolmaterial').focus();
          }
      });
      $("#slccoating").change(function () {
        console.log("test")
        if ($(this).val() == "Other") {
            $('#txtcoating').show();      
          } else {
            $('#txtcoating').val('');
            $('#txtcoating').hide();
            $('#txtcoating').focus();
          }
      });
      $("#slcmachine").change(function () {
        console.log("test")
        if ($(this).val() == "Other") {
            $('#txtmachine').show();      
          } else {
            $('#txtmachine').val('');
            $('#txtmachine').hide();
            $('#txtmachine').focus();
          }
      });

    $('input[type="checkbox"]').on('change', function() {
         $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });

    if("<?php echo $row['toolmaterial'] ?>" == "Other")
    {
      $('#txttoolmaterial').show(); 
    }
    if("<?php echo $row['coating'] ?>" == "Other")
    {
      $('#txtcoating').show();      
    }
    if("<?php echo $row['machine'] ?>" == "Other")
    {
      $('#txtmachine').show();  
    }
  
    
    var usdrillchk = "false";
    var usbrkchk = "false";
    var usbrkntchk = "false";
    var usbitechk = "false";
    var usscoopchk = "false";
    var uslathechk = "false";
    var usotherchk = "false";
    function checkb(){
      if($('#chkusagedrill').is(':checked')==true) {
        usdrillchk = "true";
      }
      else{
        usdrillchk = "false";
      }

      if($('#chkusagebreak').is(':checked')==true) {
        usbrkchk = "true";
      }
      else{
        usbrkchk = "false";
      }
      if($('#chkusagentbreak').is(':checked')==true) {
        usbrkntchk = "true";
      }
      else{
        usbrkntchk = "false";
      }
      if($('#chkusagebite').is(':checked')==true) {
        usbitechk = "true";
      }
      else{
        usbitechk = "false";
      }
      if($('#chkusagescoop').is(':checked')==true) {
        usscoopchk = "true";
      }
      else{
        usscoopchk = "false";
      }
      if($('#chkusagelathe').is(':checked')==true) {
        uslathechk = "true";
      }
      else{
        uslathechk = "false";
      }
      if($('#chkusageother').is(':checked')==true) {
        usotherchk = "true";
      }
      else{
        usotherchk = "false";
      }
    }


    function checkaction(){
          $('#chkusagedrill').change(function(){
          cb1 = $(this);
          cb1.val(cb1.prop('checked'));
          if( $(this).val() == "true" ){
              $("#txtusagedrill").attr("readonly", false);
          }
          else{
            $("#txtusagedrill").val('')
            $("#txtusagedrill").attr("readonly", true);
          }
          });

          $('#chkusagebite').change(function(){
          cb2 = $(this);
          cb2.val(cb2.prop('checked'));
          if( $(this).val() == "true" ){
              $("#txtusagebite").attr("readonly", false);
          }
          else{
            $("#txtusagebite").val('')
            $("#txtusagebite").attr("readonly", true);
          }
          });

          $('#chkusagescoop').change(function(){
          cb3 = $(this);
          cb3.val(cb3.prop('checked'));
          if( $(this).val() == "true" ){
              $("#txtusagescoop").attr("readonly", false);
          }
          else{
            $("#txtusagescoop").val('')
            $("#txtusagescoop").attr("readonly", true);
          }
          });

          $('#chkusagelathe').change(function(){
          cb4 = $(this);
          cb4.val(cb4.prop('checked'));
          if( $(this).val() == "true" ){
              $("#txtusagelathe").attr("readonly", false);
          }
          else{
            $("#txtusagelathe").val('')
            $("#txtusagelathe").attr("readonly", true);
          }
          });

          $('#chkusageother').change(function(){
          cb5 = $(this);
          cb5.val(cb5.prop('checked'));
          if( $(this).val() == "true" ){
              $("#txtusageother").attr("readonly", false);
          }
          else{
            $("#txtusageother").val('')
            $("#txtusageother").attr("readonly", true);
          }
          });
    }
    checkaction()

    // console.log(!(<?php echo $row['usdrillchk'] ?>));
    $("#chkusagedrill").prop('checked', <?php echo $row['usdrillchk']; ?>);
    $("#chkusagebreak").prop('checked', <?php echo $row['usbrkchk']; ?>);
    $("#chkusagentbreak").prop('checked', <?php echo $row['usbrkntchk']; ?>);
    $("#chkusagebite").prop('checked', <?php echo $row['usbitechk']; ?>);
    $("#chkusagescoop").prop('checked', <?php echo $row['usscoopchk']; ?>);
    $("#chkusagelathe").prop('checked', <?php echo $row['uslathechk']; ?>);
    $("#chkusageother").prop('checked', <?php echo $row['usotherchk']; ?>);

    $("#txtusagedrill").prop('readonly', !(<?php echo $row['usdrillchk'] ?>));
    $("#txtusagebite").prop('readonly', !(<?php echo $row['usbitechk'] ?>));
    $("#txtusagescoop").prop('readonly', !(<?php echo $row['usscoopchk'] ?>));
    $("#txtusagelathe").prop('readonly', !(<?php echo $row['uslathechk'] ?>));
    $("#txtusageother").prop('readonly', !(<?php echo $row['usotherchk'] ?>));


 




      function checkimage(){
        $('#imageId1').click(function () {
          $("#numofteeth").val(1)
        });
        $('#imageId2').click(function () {
            $("#numofteeth").val(2)
        });
        $('#imageId3').click(function () {
            $("#numofteeth").val(3)
        });
        $('#imageId4').click(function () {
            $("#numofteeth").val(4)
        });
        $('#imageId5').click(function () {
            $("#numofteeth").val(5)
        });
        $('#imageId6').click(function () {
            $("#numofteeth").val(6)
        });
    }
 
    checkimage()


    var jArray= <?php echo json_encode($phpArray ); ?>;
    var imageorder = 0;
    imgchk = false;
    function imagedraw(i)
    { 
      
      imageorder = i;
      $( "#imgdraw" ).html( "<br><img   src='images/datatype/"+jArray[i]+"' class='rounded img-fluid border border-dark' ><br>" );
      imgchk = true;
    }


  

</script>