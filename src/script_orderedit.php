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
function upload() {
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

}

upload()

$("#form1").submit(e => {
    e.preventDefault();
});

$( "#txtconfirm" ).click(function() {

  checboxbolean()
  checkwrongword()
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
      formData.append("orderid", "<?php echo $_GET['id']; ?>")

      // console.log("<?php echo $userid; ?>");
      // console.log("<?php echo $_GET['id']; ?>");
      formData.append("chkfile1", chkfile1 )
      formData.append("chkfile2", chkfile2 )
      formData.append("chkfile3", chkfile3 )
      formData.append("txtf1", $("#txtfupload1").text())
      formData.append("txtf2", $("#txtfupload2").text())
      formData.append("txtf3", $("#txtfupload3").text())
      formData.append("usdrillchk", usdrillchk)
      formData.append("usbrkchk", usbrkchk)
      formData.append("usbrkntchk", usbrkntchk)
      formData.append("usbitechk", usbitechk)
      formData.append("usscoopchk", usscoopchk)
      formData.append("uslathechk", uslathechk)
      formData.append("usotherchk", usotherchk)
     

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
                title: 'ข้อมูลบันทึกเส็รจสิ้นกำลังเข้าสู้หน้าแรก',
                text: data.reason ,
              }).then(function() {
                $(".loading").css("display","block")
                window.location.href =  'index.php';
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
function checboxbolean(){
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


 


var checkconfirm
var txtconfirm




var diameterheadchk   = "<?php echo $diameterhead ?>"  === "true";
var diameterbasechk   = "<?php echo $diameterbase ?>"  === "true";
var clengthchk        = "<?php echo $clength ?>"  === "true";
var flengthchk        = "<?php echo $flength ?>"  === "true";
var lengthchk         = "<?php echo $length ?>"  === "true";
var lengtheadchk      = "<?php echo $lengthead ?>"  === "true";
var radiuschk         = "<?php echo $radius ?>"  === "true";
var threadchk         = "<?php echo $thread ?>"  === "true";
var anglechk          = "<?php echo $angle ?>"  === "true";


var helixchk          = "<?php echo $helix ?>"  === "true";
var radiusheadchk     = "<?php echo $radiushead ?>"  === "true";
var numofteethchk     = "<?php echo $numofteethchk ?>"  === "true";



var  diameterhead2chk  = "<?php echo $diameterhead2 ?>"  === "true";
var  diameterbase2chk =  "<?php echo $diameterbase2 ?>"  === "true";
var  lengthead2chk = "<?php echo $lengthead2 ?>"  === "true";
var  radiushead2chk = "<?php echo $radiushead2 ?>"  === "true";
var  anglestepchk = "<?php echo $anglestep ?>"  === "true";

function checkwrongword(){
        checkconfirm = true;
        txtconfirm = "";
      
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

        if(diameterhead2chk)
        {
          console.log($('#txtdiameterhead2').val())
          if($('#txtdiameterhead2').val() == "" || $('#txtdiameterhead2').val()  <= 0 || $('#txtdiameterhead2').val() > 100){
            checkconfirm = false;
            if($('#txtdiameterhead2').val()  <= 0){ txtconfirm = "กรุณาป้อน d2 ขนาดมากกว่า 0";}
            else{txtconfirm = "กรุณาป้อน d2 ขนาดไม่เกิน 100";}
            $('#txtdiameterhead2').val('') 
            $( "#txtdiameterhead2" ).focus();
            return
          }
        }

       
        if(diameterbasechk){ 
        if($('#txtdiameterbase').val() == "" || $('#txtdiameterbase').val()  <= 0 || $('#txtdiameterbase').val() > 100){
          checkconfirm = false;
          if($('#txtdiameterbase').val()  <= 0){ txtconfirm = "กรุณาป้อน D1 ขนาดมากกว่า 0";}
            else{txtconfirm = "กรุณาป้อน D1 ขนาดไม่เกิน 100";}
            $('#txtdiameterbase').val('') 
            $( "#txtdiameterbase" ).focus();
          return
          }
        }

        if(diameterbase2chk){ 
        if($('#txtdiameterbase2').val() == "" || $('#txtdiameterbase2').val()  <= 0 || $('#txtdiameterbase2').val() > 100){
          checkconfirm = false;
          if($('#txtdiameterbase2').val()  <= 0){ txtconfirm = "กรุณาป้อน D2 ขนาดมากกว่า 0";}
            else{txtconfirm = "กรุณาป้อน D2 ขนาดไม่เกิน 100";}
            $('#txtdiameterbase2').val('') 
            $( "#txtdiameterbase2" ).focus();
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

        if(lengthead2chk)
          {
          if($('#txtlengthead2').val() == ""  || $('#txtlengthead2').val()  <= 0 || $('#txtlengthead2').val() > 100 ){
            checkconfirm = false;
            if($('#txtlengthead2').val()  <= 0){ txtconfirm = "กรุณาป้อน L2 ขนาดมากกว่า 0";}
                else{txtconfirm = "กรุณาป้อน L2 ขนาดไม่เกิน 100";}
                $('#txtlengthead2').val('') 
              $( "#txtlengthead2" ).focus();
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

        if(radiusheadchk)
          {
          if($('#txtradiushead').val() == ""  || $('#txtradiushead').val()  <= 0 || $('#txtradiushead').val() > 100 ){
            checkconfirm = false;
            if($('#txtradiushead').val()  <= 0){ txtconfirm = "กรุณาป้อน R1 ขนาดมากกว่า 0";}
                else{txtconfirm = "กรุณาป้อน R1 ขนาดไม่เกิน 100";}
                $('#txtradiushead').val('') 
              $( "#txtradiushead" ).focus();
              return
          }
        }  

        if(radiushead2chk)
          {
          if($('#txtradiushead2').val() == ""  || $('#txtradiushead2').val()  <= 0 || $('#txtradiushead2').val() > 100 ){
            checkconfirm = false;
            if($('#txtradiushead2').val()  <= 0){ txtconfirm = "กรุณาป้อน R2 ขนาดมากกว่า 0";}
                else{txtconfirm = "กรุณาป้อน R2 ขนาดไม่เกิน 100";}
                $('#txtradiushead2').val('') 
              $( "#txtradiushead2" ).focus();
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

        if(anglestepchk)
          {
          if($('#txtanglestep').val() == ""  || $('#txtanglestep').val()  <= 0 || $('#txtanglestep').val() > 60 ){
            checkconfirm = false;
            if($('#txtanglestep').val()  <= 0){ txtconfirm = "กรุณาป้อน Angle Step มุมมากกว่า 0";}
                else{txtconfirm = "กรุณาป้อน Angle Step มุมไม่เกิน 60";}
                $('#txtanglestep').val('') 
              $( "#txtanglestep" ).focus();
              return
          }
        }  

        
        if(helixchk)
          {
            if($('#slchelix').val() == "" ){
              checkconfirm = false;
              txtconfirm = "กรุณาเลือกค่า Helix ";
              $( "#slchelix" ).focus();
              return
            }
          }

          if(numofteethchk)
          {
            if($('#numofteeth').val() == "" ){
              checkconfirm = false;
              txtconfirm = "กรุณาป้อน Number of Teeth ";
              $( "#numofteeth" ).focus();
              return
            }
           }
        if($('#slctoolmaterial').val() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาเลือกค่า Tool Material ";
           $( "#slctoolmaterial" ).focus();
          return
        }
        else if($('#slctoolmaterial').val() == "Other" ){
          if(  $( "#txttoolmaterial" ).val().trim() == "" )
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
          if(  $( "#txtcoating" ).val().trim() == "" )
          { 
            checkconfirm = false;
            txtconfirm = "ป้อนค่า Coating Type ";
            $( "#txtcoating" ).focus();
            return
          }
        }

        if($('#txtcoatingcolor').val().trim() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาป้อน Coating Color";
          $( "#txtcoatingcolor" ).focus();
          return
        }

        if($('#txtworkmaterial').val().trim() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณาป้อน Work Material ";
          $( "#txtworkmaterial" ).focus();
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
          if(  $( "#txtmachine" ).val().trim() == "" )
          { 
            checkconfirm = false;
            txtconfirm = "ป้อนค่า Machine ";
            $( "#txtmachine" ).focus();
            return
          }
        }

        if($('#txtquality').val() == "" || $('#txtquality').val() <= 0 ){
          checkconfirm = false;
          txtconfirm = "กรุณาป้อน QUANTITY มากกว่า 0";
          $( "#txtquality" ).focus();
          return
        }
        
        if(usdrillchk == "true"){
          if($('#txtusagedrill').val().trim() == "" ){
            checkconfirm = false;
            txtconfirm = "กรุณาป้อน ความลึกเจาะ:";
            $( "#txtusagedrill" ).focus();
            return
          }
        }
        if(usbitechk == "true"){
          if($('#txtusagebite').val().trim() == "" ){
            checkconfirm = false;
            txtconfirm = "กรุณาป้อน ความลึกกัดด้านข้าง:";
            $( "#txtusagebite" ).focus();
            return
          }
        }
        if(usscoopchk == "true"){
          if($('#txtusagescoop').val().trim() == "" ){
            checkconfirm = false;
            txtconfirm = "กรุณาป้อน ความลึกคว้าน:";
            $( "#txtusagescoop" ).focus();
            return
          }
        }
        if(uslathechk == "true"){
          if($('#txtusagelathe').val().trim() == "" ){
            checkconfirm = false;
            txtconfirm = "กรุณาป้อน  ความลึกกลึง:";
            $( "#txtusagelathe" ).focus();
            return
          }
        }
        if(usotherchk == "true"){
          if($('#txtusageother').val().trim() == "" ){
            checkconfirm = false;
            txtconfirm = "กรุณาป้อน ข้อมูลที่ต้องการเพิ่มเติม:";
            $( "#txtusageother" ).focus();
            return
          }
        } 
        if($('#txtfname').val().trim() == "" ){
          checkconfirm = false;
          txtconfirm = "กรุณากรอกชื่อ";
          return
        }
        if($('#txtlname').val().trim() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกนามสกุล";
          return
        }
        if($('#txtcompanyname').val().trim() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกชื่อบริษัท";
          return
        }

        if($('#txtaddress').val().trim() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกที่อยู่";
          return
        }

        if($('#txtroad').val().trim() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกถนน";
          return
        }

        if($('#txtprovinces').val().trim() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกจังหวัด";
          return
        }

        if($('#txtamphures').val().trim() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกอำเภอ";
          return
        }

        if($('#txtdistricts').val().trim() == "" )
        {
          checkconfirm = false;
          txtconfirm = "กรุณากรอกตำบล";
          return
        }
        if($('#txtzipcode').val().trim() == "" )
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


function checkimage(value){
    $('#numofteeth').val(value)
}


function uploadrest(index)
{
  if(index == 1){
    $('#fupload1').val('');
    $('#txtfupload1').html('');
  }
  if(index == 2){
    $('#fupload2').val('');
    $('#txtfupload2').html('');
  }
  if(index == 3){
    $('#fupload3').val('');
    $('#txtfupload3').html('');
  }
 
}

console.log(<?php echo $diameterhead ?>)
function checkstartmenuedit(){
  $("#chkusagedrill").prop('checked', <?php echo $row['usdrillchk']; ?>);
  $("#chkusagebreak").prop('checked', <?php echo $row['usbrkchk']; ?>);
  $("#chkusagentbreak").prop('checked', <?php echo $row['usbrkntchk']; ?>);
  $("#chkusagebite").prop('checked', <?php echo $row['usbitechk']; ?>);
  $("#chkusagescoop").prop('checked', <?php echo $row['usscoopchk']; ?>);
  $("#chkusagelathe").prop('checked', <?php echo $row['uslathechk']; ?>);
  $("#chkusageother").prop('checked', <?php echo $row['usotherchk']; ?>);

  $("#txtusagedrill").prop('readonly', !("<?php echo $row['usdrillchk'] ?>"  === "true" ));
  $("#txtusagebite").prop('readonly', !("<?php echo $row['usbitechk'] ?>" === "true"));
  $("#txtusagescoop").prop('readonly', !("<?php echo $row['usscoopchk'] ?>" === "true"));
  $("#txtusagelathe").prop('readonly', !("<?php echo $row['uslathechk'] ?>" === "true"));
  $("#txtusageother").prop('readonly', !("<?php echo $row['usotherchk'] ?>" === "true"));
  $('#imgdraw').toggle(false); 

  $('.diameterhead').toggle(<?php echo $diameterhead ?>); 
  $('.diameterbase').toggle(<?php echo $diameterbase ?>); 
  $('.clength').toggle(<?php echo $clength ?>); 
  $('.flength').toggle(<?php echo $flength ?>); 
  $('.length').toggle(<?php echo $length ?>); 
  $('.lengthead').toggle(<?php echo $lengthead ?>); 
  $('.radius').toggle(<?php echo $radius ?>); 
  $('.thread').toggle(<?php echo $thread ?>); 
  $('.angle').toggle(<?php echo $angle ?>); 

  $('.radiushead').toggle(<?php echo $radiushead ?>); 
  $('.numofteeth').toggle(<?php echo $numofteethchk ?>); 
  $('.helix').toggle(<?php echo $helix ?>); 

  $('.diameterhead2').toggle(<?php echo $diameterhead2 ?>); 
  $('.diameterbase2').toggle(<?php echo $diameterbase2 ?>); 
  $('.lengthead2').toggle(<?php echo $lengthead2 ?>); 
  $('.radiushead2').toggle(<?php echo $radiushead2 ?>); 
  $('.anglestep').toggle(<?php echo $anglestep ?>); 


  if("<?php echo $row['helix'] ?>" != "")
  {
      $('#slchelix').val("<?php echo $row['helix'] ?>");
      console.log("TS")
      console.log("<?php echo $row['helix'] ?>")
  }
  

  if("<?php echo $row['toolmaterial'] ?>" == "Other")
    {
      $('#slctoolmaterial').val("<?php echo $row['toolmaterial'] ?>")
      $('#txttoolmaterial').show(); 
    }
    else
    {
      $('#slctoolmaterial').val("<?php echo $row['toolmaterial'] ?>")
    }

    if("<?php echo $row['coating'] ?>" == "Other")
    {
      $('#slccoating').val("<?php echo $row['coating'] ?>")
      $('#txtcoating').show();      
    }
    else
    {
      $('#slccoating').val("<?php echo $row['coating'] ?>")
    }

    if("<?php echo $row['machine'] ?>" == "Other")
    {
      $('#slcmachine').val("<?php echo $row['machine'] ?>")
      $('#txtmachine').show();  
    }else
    {
      $('#slcmachine').val("<?php echo $row['machine'] ?>")
    }

    console.log(<?php echo $disableimg; ?>)
    if("<?php echo $disableimg; ?>" == "1"){
      $('.imgmain').toggle(false); 
      $('#measure ').toggle(false);
      console.log("YES")
    }
}



if("<?php echo $_GET['type'];?>" == "other")
{
  $('.imgmain').toggle(false); 
  $('#measure ').toggle(false);
  othertype()
}
else
{
  checkstartmenuedit()
}

function othertype()
{
  imgchk  = true;
  subimgchk = true; 
  diameterheadchk   = false;
  diameterbasechk   = false;
  clengthchk        = false;
  flengthchk        = false;
  lengthchk         = false;
  lengtheadchk      = false;
  radiuschk         = false;
  threadchk         = false;
  anglechk          = false;
  helixchk          = false;
  radiusheadchk     = false;
  numofteethchk     = false;

  diameterhead2chk  = false;
  diameterbase2chk = false;
  lengthead2chk = false;
  radiushead2chk = false;
  anglestepchk = false;
  $("#chkusagedrill").prop('checked', <?php echo $row['usdrillchk']; ?>);
  $("#chkusagebreak").prop('checked', <?php echo $row['usbrkchk']; ?>);
  $("#chkusagentbreak").prop('checked', <?php echo $row['usbrkntchk']; ?>);
  $("#chkusagebite").prop('checked', <?php echo $row['usbitechk']; ?>);
  $("#chkusagescoop").prop('checked', <?php echo $row['usscoopchk']; ?>);
  $("#chkusagelathe").prop('checked', <?php echo $row['uslathechk']; ?>);
  $("#chkusageother").prop('checked', <?php echo $row['usotherchk']; ?>);

  $("#txtusagedrill").prop('readonly', !("<?php echo $row['usdrillchk'] ?>"  === "true" ));
  $("#txtusagebite").prop('readonly', !("<?php echo $row['usbitechk'] ?>" === "true"));
  $("#txtusagescoop").prop('readonly', !("<?php echo $row['usscoopchk'] ?>" === "true"));
  $("#txtusagelathe").prop('readonly', !("<?php echo $row['uslathechk'] ?>" === "true"));
  $("#txtusageother").prop('readonly', !("<?php echo $row['usotherchk'] ?>" === "true"));

  if("<?php echo $row['helix'] ?>" != "")
  {
      $('#slchelix').val("<?php echo $row['helix'] ?>");
      console.log("TS")
      console.log("<?php echo $row['helix'] ?>")
  }
  

  if("<?php echo $row['toolmaterial'] ?>" == "Other")
    {
      $('#slctoolmaterial').val("<?php echo $row['toolmaterial'] ?>")
      $('#txttoolmaterial').show(); 
    }
    else
    {
      $('#slctoolmaterial').val("<?php echo $row['toolmaterial'] ?>")
    }

    if("<?php echo $row['coating'] ?>" == "Other")
    {
      $('#slccoating').val("<?php echo $row['coating'] ?>")
      $('#txtcoating').show();      
    }
    else
    {
      $('#slccoating').val("<?php echo $row['coating'] ?>")
    }

    if("<?php echo $row['machine'] ?>" == "Other")
    {
      $('#slcmachine').val("<?php echo $row['machine'] ?>")
      $('#txtmachine').show();  
    }else
    {
      $('#slcmachine').val("<?php echo $row['machine'] ?>")
    }
}

checkaction()
showstartimg()

var showfrist = 0;
function showstartimg(){
  $('#btnimg').on('click',function(){
      $('.imgmain').toggle(false); 
      $('#imgdraw').toggle(true); 
      $('#content ').toggle(false);
  });

}
</script>