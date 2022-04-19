
<script>
$(".loading").css("display","none")
var fileSize;
var sizeInMb;
var sizeLimit;
var ext1;
// var ext2;
// var ext3;
var datainformation = false;
function getimgtype(){
    $('#imgtype').change(function(){
      $(".loading").css("display","block")
      var formData = new FormData(document.getElementById("form1"));
      $.ajax({
              url: 'api/ajax_imgsubcheckid.php',
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
                  datainformation = true
                  console.log(data.dataimgid)
                  console.log(data)
                  slcimgig = ''
                  if(data.dataimgid != null) 
                  {
                    datainformation = false
                    slcimgig = '<option value="" hidden selected>Open this select menu</option>';
                    $.each(data.dataimgid, function(index, value) {
                      if(value != "true")
                      {
                         slcimgig += '<option value="'+index+'" >'+index+'</option>';
                      }
                                }); 
                  }
                  $("#imgid").html(slcimgig);
                  $('#imgsubid').val('')
                  slcshow()
                  restval()
                  // slcdis()
                 
                  $(".loading").css("display","none")
                }
                else{
                  $(".loading").css("display","none")
                console.log(data)
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
    })

    $('#imgid').change(function(){
      $(".loading").css("display","block")
      var formData = new FormData(document.getElementById("form1"));
      $.ajax({
              url: 'api/ajax_imgsubchecksubid.php',
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
                  console.log(data)
                  console.log(data.subid)
                  $('#imgsubid').val(data.subid)
                  slcdis()
                  restval()
                  $(".loading").css("display","none")
                }
                else{
                  $(".loading").css("display","none")
                console.log(data)
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
    })
}



// var max_file = 5 * 1024 * 1024; // 5MB
function upload() {
  $("#fupload1").change(function () {
     fileSize = this.files[0];
     sizeInMb = fileSize.size;
     sizeLimit = 1024*1024*10;
     myfile1 = $( this ).val().split('.').pop();
     ext1 = myfile1.toLowerCase();
     if(ext1=="png" || ext1=="jpg"){
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
              $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
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
}




function uploadrest(index)
{
  if(index == 1){
    $('#fupload1').val('');
    $('#txtfupload1').html('');
  }
}

function postimg(){
  $( "#txtconfirm" ).click(function() {
  checkwrongword()
  // checkconfirm = true
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
          savedataimgsub()
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
}

function savedataimgsub(){
      var formData = new FormData(document.getElementById("form1"));
      $.ajax({
      url: 'api/ajax_createimgsub.php',
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
                console.log(data)
                $(".loading").css("display","none")
                // window.location.href =  '../admin';
                location.reload();
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

function checkwrongword(){
  checkconfirm = true;
  txtconfirm = "";
  if($('#imgtype').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก IMG TYPE ";
    $( "#imgtype" ).focus();
    return
  }
  // console.log($('#imgsubid').val() )

  if(datainformation){
    checkconfirm = false;
    txtconfirm = "IMG ID ไม่มีข้อมูลให้ไปเพิ่มใน IMG HEADER ";
    $( "#imgtype" ).focus();
    return
  }
  
  if($('#imgid').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก IMG ID ";
    $( "#imgid" ).focus();
    return
  }

  if($('#fupload1').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาอัพโหลดรูป IMG Upload";
    $( "#fupload1" ).focus();
    return
  }

  if($('#slcdiameterhead').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก d1 ";
    $( "#slcdiameterhead" ).focus();
    return
  }

  if($('#slcdiameterhead2').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก d2";
    $( "#slcdiameterhead2" ).focus();
    return
  }
  if($('#slcdiameterbase').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก D1 ";
    $( "#slcdiameterbase" ).focus();
    return
  }
  if($('#slcdiameterbase2').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก D2";
    $( "#slcdiameterbase2" ).focus();
    return
  }
  if($('#slcclength').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก C.L.";
    $( "#slcclength" ).focus();
    return
  }
  if($('#slcflength').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก F.L.";
    $( "#slcflength" ).focus();
    return
  }
  if($('#slclength').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก L";
    $( "#slclength" ).focus();
    return
  }
  if($('#slclengthead').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก L1";
    $( "#slclengthead" ).focus();
    return
  }
  if($('#slclengthead2').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก L2";
    $( "#slclengthead2" ).focus();
    return
  }
  if($('#slcradius').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก R";
    $( "#slcradius" ).focus();
    return
  }
  if($('#slcradiushead').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก R1";
    $( "#slcradiushead" ).focus();
    return
  }
  if($('#slcradiushead2').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก R2";
    $( "#slcradiushead2" ).focus();
    return
  }

  if($('#slcthread').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก Tr ";
    $( "#slcthread" ).focus();
    return
  }
  if($('#slcangle').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก Angle ";
    $( "#slcangle" ).focus();
    return
  }
  if($('#slcanglestep').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก Angle Step ";
    $( "#slcanglestep" ).focus();
    return
  }
  if($('#slchelix').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก HELIX ";
    $( "#slchelix" ).focus();
    return
  }

  if($('#slcnumofteeth').val() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก Number of Teeth ";
    $( "#slcnumofteeth" ).focus();
    return
  }



}

function restimg(){
  $( "#txtrest" ).click(function() {
    Swal.fire({
      title: 'คุณต้องการ reset ข้อมูลใช่ไหม',
      showDenyButton: true,
      confirmButtonText: 'Yes',
      denyButtonText: `No`,
      }).then((result) =>
        {
        if (result.isConfirmed)
        { 
          location.reload();
        } else if (result.isDenied) {
        }
      })
  });
}


$('#slcnumofteeth').on('change', function() {
  // alert( this.value );
  console.log(this.value )
  if(this.value == "true"){
    $('#txtnumofteeth').val($("#imgid").val()+$("#imgsubid").val())
  }
  else{
    $('#txtnumofteeth').val('')
  }

});

// var uploadmutiple = true;
// $("#file").change(function () {


//   fileValidation()
//   if(uploadmutiple){

//   }
//   console.log()

//   $.each(this.files , (i , v) => {
//       var filename = v.name;
//       console.log(filename);
//       // $('.filenames').append('<div class="name">' + filename + '</div>');
//     });


// });

// $("#files").on("change", function (e) {
//         var files = e.target.files,
//             filesLength = files.length;
//         for (var i = 0; i < filesLength; i++) {
//             var f = files[i];
//             $("<span class=\"pip\">" +
//                     "<br/><span class=\"remove\"><i class='fa fa-times'></i>"+ f.name + "</span>" +
//                     "</span>").insertAfter("#files");
//                 $(".remove").click(function () {
//                     $(this).parent(".pip").remove();
//                 });
//         }
//     });

// function isVideo(film) {
//   const ext2 = ['.png', '.jpg'];
//   return ext2.some(el => film.endsWith(el));
// }

// function fileValidation() {
//   uploadmutiple = true
//   let files = document.getElementById('file');
//   for (let i = 0; i < files.files.length; ++i) {
//     let fname = files.files.item(i).name;
//     if (!isVideo(fname)) {
//       alert("File extension not supported!");
//       uploadmutiple = false;
//       return false;
//     }
//   }
// }

function restval(){
  $("#slcdiameterhead").val('');
  $("#slcdiameterhead2").val('');
  $("#slcdiameterbase").val('');
  $("#slcdiameterbase2").val('');
  $("#slcclength").val('');
  $("#slcflength").val('');
  $("#slclength").val('');
  $("#slclengthead").val('');
  $("#slclengthead2").val('');
  $("#slcradius").val('');
  $("#slcradiushead").val('');
  $("#slcradiushead2").val('');
  $("#slcthread").val('');
  $("#slcangle").val('');
  $("#slcanglestep").val('');
  $("#slchelix").val('');
  $("#slcnumofteeth").val('');
  $('#txtnumofteeth').val('');
}


function slcshow(){
  $("#slcdiameterhead").attr("disabled", true);
  $("#slcdiameterhead2").attr("disabled", true);
  $("#slcdiameterbase").attr("disabled", true);
  $("#slcdiameterbase2").attr("disabled", true);
  $("#slcclength").attr("disabled", true);
  $("#slcflength").attr("disabled", true);
  $("#slclength").attr("disabled", true);
  $("#slclengthead").attr("disabled", true);
  $("#slclengthead2").attr("disabled", true);
  $("#slcradius").attr("disabled", true);
  $("#slcradiushead").attr("disabled", true);
  $("#slcradiushead2").attr("disabled", true);
  $("#slcthread").attr("disabled", true);
  $("#slcangle").attr("disabled", true);
  $("#slcanglestep").attr("disabled", true);
  $("#slchelix").attr("disabled", true);
  $("#slcnumofteeth").attr("disabled", true);
}

function slcdis(){
  $("#slcdiameterhead").attr("disabled", false);
  $("#slcdiameterhead2").attr("disabled", false);
  $("#slcdiameterbase").attr("disabled", false);
  $("#slcdiameterbase2").attr("disabled", false);
  $("#slcclength").attr("disabled", false);
  $("#slcflength").attr("disabled", false);
  $("#slclength").attr("disabled", false);
  $("#slclengthead").attr("disabled", false);
  $("#slclengthead2").attr("disabled", false);
  $("#slcradius").attr("disabled", false);
  $("#slcradiushead").attr("disabled", false);
  $("#slcradiushead2").attr("disabled", false);
  $("#slcthread").attr("disabled", false);
  $("#slcangle").attr("disabled", false);
  $("#slcanglestep").attr("disabled", false);
  $("#slchelix").attr("disabled", false);
  $("#slcnumofteeth").attr("disabled", false);
}
upload()
getimgtype()
postimg()
restimg()


</script>