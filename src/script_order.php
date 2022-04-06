<script>
  $(".loading").css("display","none")

  var userid =  "<?php echo $userid ?>";
  if(userid != "")
  {
    $("#txtfname").attr("readonly", "true");
    $("#txtlname").attr("readonly", "true");
    $("#txtcompanyname").attr("readonly", "true");
    $("#txtaddress").attr("readonly", "true");
    $("#txtroad").attr("readonly", "true");
    $("#txtprovinces").attr("readonly", "true");
    $("#txtamphures").attr("readonly", "true");
    $("#txtdistricts").attr("readonly", "true");
    $("#txtzipcode").attr("readonly", "true");
    $("#txtemail").attr("readonly", "true");
    $("#txtphone").attr("readonly", "true");
  }
  

 

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
            }
            else
            {
              $('#txtfupload1').html($(this).val().split(/[\\|/]/).pop());
            }
        }else{
          Swal.fire({
            icon: 'error',
            title: 'FILE UPLOAD',
            text: 'Upload Not Allowed' ,
          })
          $('#txtfupload1').html('');
          $(this).val('');
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
            }
            else
            {
              $('#txtfupload2').html($(this).val().split(/[\\|/]/).pop());
            }
        }else{
          Swal.fire({
            icon: 'error',
            title: 'FILE UPLOAD',
            text: 'Upload Not Allowed' ,
          })
          $('#txtfupload2').html('');
          $(this).val('');
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
            }
            else
            {
              $('#txtfupload3').html($(this).val().split(/[\\|/]/).pop());
            }
        }else{
          Swal.fire({
            icon: 'error',
            title: 'FILE UPLOAD',
            text: 'Upload Not Allowed' ,
          })
          $('#txtfupload3').html('');
          $(this).val('');
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
              title: 'Oops...',
              text:  txtconfirm  ,
            })
    }
  });

  function savedata(){
      var formData = new FormData(document.getElementById("form1"));
      formData.append("userid", "<?php echo $userid; ?>")
      formData.append("sandatatype", "<?php echo $_GET['type']; ?>")

      formData.append("usdrillchk", usdrillchk)
      formData.append("usbrkchk", usbrkchk)
      formData.append("usbrkntchk", usbrkntchk)
      formData.append("usbitechk", usbitechk)
      formData.append("usscoopchk", usscoopchk)
      formData.append("uslathechk", uslathechk)
      formData.append("usotherchk", usotherchk)
      formData.append("imgid", get_imgid)
      formData.append("subid", get_subid)

      $.ajax({
      url: 'api/ajax_order.php',
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
                // console.log(data)
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
          $(".loading").css("display","none")
            Swal.fire({
                icon: 'error',
                title: 'ERROR JSON',
                text: "Requested Error Status: "+xhr.status ,
              })
        var errorMessage = xhr.status + ': ' + xhr.statusText;
        console.log(errorMessage)
        console.log(xhr.reason)
      },
});
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

          $("#slctoolmaterial").change(function () {
          if ($(this).val() == "Other") {
            $('#txttoolmaterial').show();      
          } else {
            $('#txttoolmaterial').val('');
            $('#txttoolmaterial').hide();
            $('#txttoolmaterial').focus();
          }

      });
      $("#slccoating").change(function () {
        if ($(this).val() == "Other") {
            $('#txtcoating').show();      
          } else {
            $('#txtcoating').val('');
            $('#txtcoating').hide();
            $('#txtcoating').focus();
          }
      });
      $("#slcmachine").change(function () {
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
    }

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
 
    // var imageorder = 0;
    var get_imgid 
    var get_subid 
    var imagemtype = "";
    imgchk = false;
    subimgchk  = false;
    function imagedraw(idimg){ 
      imgchk = true;
      subimgchk   = false;
      $(".loading").css("display","block")
      var formData = new FormData(document.getElementById("form1"));
      formData.append("idimg", idimg)
        $.ajax({
              url: 'api/ajax_subimg.php',
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
                  imagemtype = "";
                  $(".loading").css("display","none")
                  if (data.name.length === 0) { $("#imgdraw").html(imagemtype); }
                  else{  
                      $.each(data.name, function( index, value  ) {
                      imagemtype += '<div class="col-sm-12 col-md-12 col-lg-4 "><img src="images/datatype/'+value+'" class="rounded  img-fluid  border border-dark" onclick="subimgdraw('+"\'"+index+"\'"+','+"\'"+idimg+"\'"+')"></div>';
                      $("#imgdraw").html(imagemtype);
                      }); 
                  }
                
                }
                else{
                  console.log("NO")
                  $(".loading").css("display","none")
                }
              },
              error: (xhr, status, error) => {
                $(".loading").css("display","none")
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
                    $(".loading").css("display","none")
                      Swal.fire({
                          icon: 'error',
                          title: 'ERROR JSON',
                          text: "Requested Error Status: "+xhr.status ,
                        })
                  var errorMessage = xhr.status + ': ' + xhr.statusText;
                  console.log(errorMessage)
                  console.log(xhr.reason)
                },
          });
    }

    function subimgdraw(sub_id,sub_idimg){
      subimgchk = true;
      get_imgid = sub_idimg;
      get_subid = sub_id;
      // console.log(get_imgid)
      // console.log(get_subid)
      $(".loading").css("display","block")
      var formData = new FormData(document.getElementById("form1"));
      formData.append("idimg", sub_idimg)
      formData.append("subid", sub_id)
        $.ajax({
              url: 'api/ajax_measure.php',
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
                  imagemtype = "";
                  $(".loading").css("display","none")
                  console.log(data)
                  console.log(data.diameterhead)
                  $('.diameterhead').toggle(data.diameterhead); 
                  $('.diameterbase').toggle(data.diameterbase); 
                  $('.clength').toggle(data.clength); 
                  $('.flength').toggle(data.flength); 
                  $('.length').toggle(data.length); 
                  $('.lengthead').toggle(data.lengthead); 
                  $('.radius').toggle(data.radius); 
                  $('.thread').toggle(data.thread); 
                  $('.angle').toggle(data.angle); 

                  // $(".diameterhead").hide();
                  // $(".diameterhead").css("display", "none");

                  diameterheadchk  = data.diameterhead
                  diameterbasechk = data.diameterbase
                  clengthchk        = data.clength
                  flengthchk        = data.flength
                  lengthchk    = data.length
                  lengtheadchk = data.lengthead
                  radiuschk    = data.radius
                  threadchk    = data.thread
                  anglechk     = data.angle

                }
                else{
                  console.log("NO")
                  $(".loading").css("display","none")
                }
              },
              error: (xhr, status, error) => {
                $(".loading").css("display","none")
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
                    $(".loading").css("display","none")
                      Swal.fire({
                          icon: 'error',
                          title: 'ERROR JSON',
                          text: "Requested Error Status: "+xhr.status ,
                        })
                  var errorMessage = xhr.status + ': ' + xhr.statusText;
                  console.log(errorMessage)
                  console.log(xhr.reason)
                },
          });
    }


      var checkconfirm
      var txtconfirm
      var diameterheadchk   = true;
      var diameterbasechk   = true;
      var clengthchk        = true;
      var flengthchk        = true;
      var lengthchk         = true;
      var lengtheadchk      = true;
      var radiuschk         = true;
      var threadchk         = true;
      var anglechk          = true;
      function checkstate(){
        checkconfirm = true;
        txtconfirm = "";
        if(!imgchk)
        {
          checkconfirm = false;
          txtconfirm = "กรุณาเลือก Header";
          $("#listsubtype").attr("tabindex",-1).focus();
          return
        }
        else{
          if(!subimgchk)
          {
            checkconfirm = false;
            txtconfirm = "กรุณาเลือก Header Type";
            $("#listsubtype").attr("tabindex",-1).focus();
            return
          }
        }

        if(diameterheadchk)
        {
          console.log($('#txtdiameterhead').val())
          if($('#txtdiameterhead').val() == "" || $('#txtdiameterhead').val()  <= 0 || $('#txtdiameterhead').val() > 100){
            checkconfirm = false;
            if($('#txtdiameterhead').val()  <= 0){ txtconfirm = "กรุณาป้อน d1 ขนาดมากกว่า 0";}
            else{txtconfirm = "กรุณาป้อน d1 ขนาดไม่เกิน 100";}
            $('#txtdiameterhead').val('') 
            $( "#txtdiameterhead" ).focus();
            return
          }
        }
       
        if(diameterbasechk)
        { 
        if($('#txtdiameterbase').val() == "" || $('#txtdiameterbase').val()  <= 0 || $('#txtdiameterbase').val() > 100){
          checkconfirm = false;
          if($('#txtdiameterbase').val()  <= 0){ txtconfirm = "กรุณาป้อน D1 ขนาดมากกว่า 0";}
            else{txtconfirm = "กรุณาป้อน D1 ขนาดไม่เกิน 100";}
            $('#txtdiameterbase').val('') 
            $( "#txtdiameterbase" ).focus();
          return
        }
        }

      if(clengthchk)
        {
          if($('#txtclength').val() == "" || $('#txtclength').val()  <= 0 || $('#txtclength').val() > 100){
            checkconfirm = false;
            if($('#txtclength').val()  <= 0){ txtconfirm = "กรุณาป้อน CL ขนาดมากกว่า 0";}
              else{txtconfirm = "กรุณาป้อน CL ขนาดไม่เกิน 100";}
              $('#txtclength').val('') 
            $( "#txtclength" ).focus();
            return
          }
        }

        if(flengthchk)
        {
          if($('#txtflength').val() == "" || $('#txtflength').val()  <= 0 || $('#txtflength').val() > 160){
            checkconfirm = false;
            if($('#txtflength').val()  <= 0){ txtconfirm = "กรุณาป้อน FL ขนาดมากกว่า 0";}
              else{txtconfirm = "กรุณาป้อน FL ขนาดไม่เกิน 160";}
              $('#txtflength').val('') 
            $( "#txtflength" ).focus();
            return
          }
        }

     
        if(lengthchk)
        {
        if($('#txtlength').val() == ""  || $('#txtlength').val()  <= 0 || $('#txtlength').val() > 300 ){
          checkconfirm = false;
          if($('#txtlength').val()  <= 0){ txtconfirm = "กรุณาป้อน L ขนาดมากกว่า 0";}
              else{txtconfirm = "กรุณาป้อน L ขนาดไม่เกิน 300";}
              $('#txtlength').val('') 
            $( "#txtlength" ).focus();
            return
        }
      }

      if(lengtheadchk)
        {
        if($('#txtlengthead').val() == ""  || $('#txtlengthead').val()  <= 0 || $('#txtlengthead').val() > 100 ){
          checkconfirm = false;
          if($('#txtlengthead').val()  <= 0){ txtconfirm = "กรุณาป้อน L1 ขนาดมากกว่า 0";}
              else{txtconfirm = "กรุณาป้อน L1 ขนาดไม่เกิน 100";}
              $('#txtlengthead').val('') 
            $( "#txtlengthead" ).focus();
            return
        }
      }

      if(radiuschk)
        {
        if($('#txtradius').val() == ""  || $('#txtradius').val()  <= 0 || $('#txtradius').val() > 100 ){
          checkconfirm = false;
          if($('#txtradius').val()  <= 0){ txtconfirm = "กรุณาป้อน R ขนาดมากกว่า 0";}
              else{txtconfirm = "กรุณาป้อน R ขนาดไม่เกิน 100";}
              $('#txtradius').val('') 
            $( "#txtradius" ).focus();
            return
        }
      }  

      if(threadchk)
        {
        if($('#txtthread').val() == ""  || $('#txtthread').val()  <= 0 || $('#txtthread').val() > 100 ){
          checkconfirm = false;
          if($('#txtthread').val()  <= 0){ txtconfirm = "กรุณาป้อน Tr ขนาดมากกว่า 0";}
              else{txtconfirm = "กรุณาป้อน Tr ขนาดไม่เกิน 100";}
              $('#txtthread').val('') 
            $( "#txtthread" ).focus();
            return
        }
      }  

      if(anglechk)
        {
        if($('#txtangle').val() == ""  || $('#txtangle').val()  <= 0 || $('#txtangle').val() > 60 ){
          checkconfirm = false;
          if($('#txtangle').val()  <= 0){ txtconfirm = "กรุณาป้อน Angle มุมมากกว่า 0";}
              else{txtconfirm = "กรุณาป้อน Angle มุมไม่เกิน 60";}
              $('#txtangle').val('') 
            $( "#txtangle" ).focus();
            return
        }
      }  

      // 
        if($('#slchelix').val() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาเลือกค่า Helix ";
           $( "#slchelix" ).focus();
          return
        }

        if($('#slctoolmaterial').val() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาเลือกค่า Tool Material ";
           $( "#slctoolmaterial" ).focus();
          return
        }
        else if($('#slctoolmaterial').val() == "Other" ){
          if(  $( "#txttoolmaterial" ).val() == "" )
          { 
            checkconfirm = false;
            txtconfirm = "ป้อนค่า Tool Material ";
            $( "#txttoolmaterial" ).focus();
            return
          }
        }

        if($('#slccoating').val() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาเลือกค่า Coating Type ";
           $( "#slccoating" ).focus();
          return
        }
        else if($('#slccoating').val() == "Other" ){
          if(  $( "#txtcoating" ).val() == "" )
          { 
            checkconfirm = false;
            txtconfirm = "ป้อนค่า Coating Type ";
            $( "#txtcoating" ).focus();
            return
          }
        }

        if($('#txtcoatingcolor').val() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาป้อน Coating Color";
          $( "#txtcoatingcolor" ).focus();
          return
        }

        if($('#txtworkmaterial').val() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาป้อน Work Material ";
          $( "#txtworkmaterial" ).focus();
          return
        }

        if($('#numofteeth').val() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาป้อน Number of Teeth ";
          $( "#numofteeth" ).focus();
          return
        }

        if($('#slcmachine').val() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาเลือกค่า Machine ";
           $( "#slcmachine" ).focus();
          return
        } 
        else if( $("#slcmachine").val() == "Other" )
        { 
          if(  $( "#txtcoating" ).val() == "" )
          { 
            checkconfirm = false;
            txtconfirm = "ป้อนค่า Machine ";
            $( "#txtmachine" ).focus();
            return
          }
        }

        if($('#txtqua').val() == "" || $('#txtqua').val() <= 0 ){
          checkconfirm = false;
          txtconfirm = "กรุณาป้อน QUANTITY มากกว่า 0";
          $( "#txtqua" ).focus();
          return
        }


        if($('#txtfname').val() == "" ){
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
        if($('#txtcompanyname').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกชื่อบริษัท";
          return
        }

        if($('#txtaddress').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกที่อยู่";
          return
        }

        if($('#txtroad').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกถนน";
          return
        }

        if($('#txtprovinces').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกจังหวัด";
          return
        }

        if($('#txtamphures').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกอำเภอ";
          return
        }

        if($('#txtdistricts').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกตำบล";
          return
        }
        if($('#txtzipcode').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกรหัสไปรษณีย์";
          return
        }

        if($('#txtemail').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณาอีเมล";
          return
        }
        else{
          var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
          var emailFormat = re.test($("#txtemail").val()); // This return result in Boolean type
            if (!emailFormat) {
             checkconfirm = false;
             txtconfirm = "กรุณาอีเมลให้ถูกต้อง";
             return
          } 
        }
    

        if($('#txtphone').val() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณาเบอร์โทรศัพท์";
          return
        } else{
          var re2 = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/;
          var phoneFormat = re2.test($("#txtphone").val()); // This return result in Boolean type
            if (!phoneFormat) {
             checkconfirm = false;
             txtconfirm = "กรุณาเบอร์โทรศัพท์ให้ถูกต้อง";
             return
          } 
        }

      }



    checkimage()
    checkaction()
</script>