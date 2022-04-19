
<script>
$(".loading").css("display","none")
var fileSize;
var sizeInMb;
var sizeLimit;
var ext1;
var ext2;
var ext3;

function getimgtype(){
    $('#imgtype').change(function(){
    console.log($('#imgtype').val())
    checktypeimg($('#imgtype').val())

    $(".loading").css("display","block")
    var formData = new FormData(document.getElementById("form1"));
    // formData.append("idimg", sub_idimg)
    $.ajax({
              url: 'api/ajax_checkimgid.php',
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
                  
                  $('#imgid').val(data.newlastid)
                  $('#imgorder').val(data.orderid)
                  $('#imgupload').val('')
                  $('#imgsubtype').val('')
                  $('#imgdescription').val('')
                  $('#imgdisable').val('')
                  $('#fupload1').val('')
                  $('#txtfupload1').html('')
                  $("#imgupload").attr("readonly", false);
                  $("#imgsubtype").attr("readonly", false);
                  $("#imgdescription").attr("readonly", false);
                  $("#imgdisable").attr("disabled", false);
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


function checktypeimg(imgtype){
  console.log(imgtype)
  if("drl"==imgtype){$('#imgtypebase').val('drill')}
  else if("enm"==imgtype){$('#imgtypebase').val('endmill')}
  else if("bit"==imgtype){$('#imgtypebase').val('bite')}
  else if("par"==imgtype){$('#imgtypebase').val('part')}
  else if("rea"==imgtype){$('#imgtypebase').val('reamer')}
  else if("cut"==imgtype){$('#imgtypebase').val('cutter')}
  else if("ins"==imgtype){$('#imgtypebase').val('insert')}
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
  // checboxbolean()
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
          savedataimgheader()
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

function savedataimgheader(){
      var formData = new FormData(document.getElementById("form1"));
      $.ajax({
      url: 'api/ajax_createimgheader.php',
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
  if($('#imgtype').val().trim() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาเลือก IMG TYPE ";
    $( "#imgtype" ).focus();
    return
  }

  if($('#imgsubtype').val().trim() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาป้อน IMG Subtype ";
    $( "#imgsubtype" ).focus();
    return
  }

  if($('#imgdescription').val().trim() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาป้อน IMG Description ";
    $( "#imgdescription" ).focus();
    return
  }

  if($('#imgdisable').val().trim() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาป้อน IMG Disable Massure ";
    $( "#imgdisable" ).focus();
    return
  }

  if($('#fupload1').val().trim() == "" ){
    checkconfirm = false;
    txtconfirm = "กรุณาอัพโหลดรูป IMG Upload";
    $( "#fupload1" ).focus();
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

upload()
getimgtype()
postimg()
restimg()


</script>