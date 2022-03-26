<script>
  $(".loading").css("display","none")

  $("#sld1").slider();
  $("#txtdiameter").val($("#sld1").val());
  $("#sld1").on("slide", function(slideEvt) {
    $("#sld1SliderVal").text(slideEvt.value);
    $("#txtdiameter").val(slideEvt.value);
  });
  $("#sld1").on("slideStop", function(slideEvt){
    $("#sld1SliderVal").text(slideEvt.value);
    $("#txtdiameter").val(slideEvt.value);
  });

  $("#sld2").slider();
  $("#txtdiameter2").val($("#sld2").val());
  $("#sld2").on("slide", function(slideEvt) {
    $("#sld2SliderVal").text(slideEvt.value);
    $("#txtdiameter2").val(slideEvt.value);
  });
  $("#sld2").on("slideStop", function(slideEvt){
    $("#sld2SliderVal").text(slideEvt.value);
    $("#txtdiameter2").val(slideEvt.value);
  });

  $("#sld3").slider();
  $("#txtfl").val($("#sld3").val());
  $("#sld3").on("slide", function(slideEvt) {
    $("#sld3SliderVal").text(slideEvt.value);
    $("#txtfl").val(slideEvt.value);
  });
  $("#sld3").on("slideStop", function(slideEvt){
    $("#sld3SliderVal").text(slideEvt.value);
    $("#txtfl").val(slideEvt.value);
  });


  $("#sld4").slider();
  $("#txtlength").val($("#sld4").val());
  $("#sld4").on("slide", function(slideEvt) {
    $("#sld4SliderVal").text(slideEvt.value);
    $("#txtlength").val(slideEvt.value);
  });
  $("#sld4").on("slideStop", function(slideEvt){
    $("#sld4SliderVal").text(slideEvt.value);
    $("#txtlength").val(slideEvt.value);
  });


  console.log("<?php echo $userid ?>");

  var userid =  "<?php echo $userid ?>";
  console.log(userid);
  if(userid != "")
  {
    $("#txtfname").attr("readonly", "true");
    $("#txtlname").attr("readonly", "true");
    console.log("WOW");
    // $("#txtcontact").attr("required", "true");
  }
  

  $(function () {

       $( "#txtdiameter" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          var val = $(this).val();
          if(val.startsWith("0")){
            $(this).val(0);
          }

          if ($(this).val() > max)
          {
              $(this).val(max);
              console.log( $( "#txtdiameter" ).val())
              $("#sld1SliderVal").text($(this).val());
              $('#sld1').slider('setValue', $(this).val());

          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
              console.log( $( "#txtdiameter" ).val())
              $("#sld1SliderVal").text($(this).val());
              $('#sld1').slider('setValue', $(this).val());
          }    
          else if (min<$(this).val()<max)
          {
              $(this).val(Math.round($(this).val()));
              console.log( $( "#txtdiameter" ).val())
              $("#sld1SliderVal").text($(this).val());
              $('#sld1').slider('setValue', $(this).val());
          }       
        });

        $( "#txtdiameter2" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));

          var val = $(this).val();

          if(val.startsWith("0")){
            $(this).val(0);
          }

          if ($(this).val() > max)
          {
              $(this).val(max);
              console.log( $( "#txtdiameter2" ).val())
              $("#sld2SliderVal").text($(this).val());
              $('#sld2').slider('setValue', $(this).val());

          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
              console.log( $( "#txtdiameter2" ).val())
              $("#sld2SliderVal").text($(this).val());
              $('#sld2').slider('setValue', $(this).val());
          }    
          else if (min<$(this).val()<max)
          {
              $(this).val(Math.round($(this).val() / 10) * 10);
              console.log( $( "#txtdiameter2" ).val())
              $("#sld2SliderVal").text($(this).val());
              $('#sld2').slider('setValue', $(this).val());
          }       
        }); 


        $( "#txtfl" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          var val = $(this).val();

          if(val.startsWith("0")){
            $(this).val(0);
          }

          if ($(this).val() > max)
          {
              $(this).val(max);
              console.log( $( "#txtfl" ).val())
              $("#sld3SliderVal").text($(this).val());
              $('#sld3').slider('setValue', $(this).val());

          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
              console.log( $( "#txtfl" ).val())
              $("#sld3SliderVal").text($(this).val());
              $('#sld3').slider('setValue', $(this).val());
          }    
          else if (min<$(this).val()<max)
          {
            $(this).val(Math.round($(this).val()));
              console.log( $( "#txtfl" ).val())
              $("#sld3SliderVal").text($(this).val());
              $('#sld3').slider('setValue', $(this).val());
          }       
        }); 

        $( "#txtlength" ).change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));

          var val = $(this).val();

          if(val.startsWith("0")){
            $(this).val(0);
          }

          if ($(this).val() > max)
          {
              $(this).val(max);
              console.log( $( "#txtlength" ).val())
              $("#sld4SliderVal").text($(this).val());
              $('#sld4').slider('setValue', $(this).val());

          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
              console.log( $( "#txtlength" ).val())
              $("#sld4SliderVal").text($(this).val());
              $('#sld4').slider('setValue', $(this).val());
          }    
          else if (min<$(this).val()<max)
          {
            $(this).val(Math.round($(this).val()));
              console.log( $( "#txtlength" ).val())
              $("#sld4SliderVal").text($(this).val());
              $('#sld4').slider('setValue', $(this).val());
          }       
        }); 
  });




var fileSize;
var sizeInMb;
var sizeLimit;
// var max_file = 5 * 1024 * 1024; // 5MB

$("#fupload1").change(function () {
     fileSize = this.files[0];
     sizeInMb = fileSize.size;
     sizeLimit = 1024*1024*10;
     console.log("FILE UPLOAD",sizeInMb)
     console.log("FILE SIZE",sizeLimit)
    if (sizeInMb > sizeLimit)
     {
      alert("Max file size 10MB");
      $('#txtfupload1').html('');
      $(this).val('');
    }
    else
    {
      $('#txtfupload1').html($(this).val().split(/[\\|/]/).pop());
    }
});

$("#fupload2").change(function () {
     fileSize = this.files[0];
     sizeInMb = fileSize.size;
     sizeLimit = 1024*1024*10;
     console.log("FILE UPLOAD",sizeInMb)
     console.log("FILE SIZE",sizeLimit)
    if (sizeInMb > sizeLimit)
     {
      alert("Max file size 10MB");
      $('#txtfupload2').html('');
      $(this).val('');
    }
    else
    {
      $('#txtfupload2').html($(this).val().split(/[\\|/]/).pop());
    }
});

$("#fupload3").change(function () {
     fileSize = this.files[0];
     sizeInMb = fileSize.size;
     sizeLimit = 1024*1024*10;
     console.log("FILE UPLOAD",sizeInMb)
     console.log("FILE SIZE",sizeLimit)
    if (sizeInMb > sizeLimit)
     {
      alert("Max file size 10MB");
      $('#txtfupload3').html('');
      $(this).val('');
    }
    else
    {
      $('#txtfupload3').html($(this).val().split(/[\\|/]/).pop());
    }
});

  $("#form1").submit(e => {
      e.preventDefault();
  });

  $( "#txtconfirm" ).click(function() {
    checkstate()
    console.log()
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
            console.log("WWW");
          }
        })
    }
    else{
      Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text:  txtconfirm  ,
            })
    }
  });

        function savedata(){
              var formData = new FormData(document.getElementById("form1"));
              formData.append("userid", <?php echo "\"".$userid."\""; ?>)
              $.ajax({
              url: 'ajax_order.php',
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
                          title: 'ข้อมูลบันทึกเส็รจสิ้นกำลังเข้าสู้หน้าแรก',
                          text: data.reason ,
                        }).then(function() {
                          $(".loading").css("display","block")
                          window.location.href =  'index.php';
                         // console.log(data);
                        }); 
                }
                else{
                  $(".loading").css("display","none")
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
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
          return
        }
        if($('#txtlname').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกนามสกุล";
          return
        }
      }
</script>