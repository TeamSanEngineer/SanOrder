<script type="text/javascript">

  $(".loading").css("display","none")
  checkpass = false;
  $("#txtUsername").keyup(function(){
    checkpass = false;
    $("#spanUsername").css("color", "red");
    $("#spanPassword").css("color", "red");
    $("#spanRePassword").css("color", "red");
  });

  $("#txtPassword").keyup(function(){
    checkpass = false;
    $("#spanUsername").css("color", "red");
    $("#spanPassword").css("color", "red");
    $("#spanRePassword").css("color", "red");
  });

  $("#txtRePassword").keyup(function(){
    checkpass = false;
    $("#spanUsername").css("color", "red");
    $("#spanPassword").css("color", "red");
    $("#spanRePassword").css("color", "red");
  });
  
  var english = {};
  "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789".split("").forEach(function(ch) 
  {
    english[ch] = true;
  });

  function stringIsEnglish(str) {
      var index;
      for (index = str.length - 1; index >= 0; --index)
      {
          if (!english[str.substring(index, index + 1)]) {
              return false;
          }
      }
      return true;
  }



$( "#checkusername" ).click(function() {
  if($("#txtUsername").val() == "" ){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'กรุณากรอก username!',
    })
    return false
  }
  if(stringIsEnglish($("#txtUsername").val()) == false  )
  { 
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'กรุณากรอก username เป็นภาษาอังกฤษกับตัวเลข',
    })
    return false
  }
  if($("#txtPassword").val() == "" ){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'กรุณากรอก password!',
    })
    return false
  }

  console.log($("#txtPassword").val().length)
  if($("#txtPassword").val().length< 8 ){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'กรุณากรอก password! มีความยาวมากกว่า 8',
    })
    return false
  }
  
  if(stringIsEnglish($("#txtPassword").val()) == false  )
  { 
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'กรุณากรอก password เป็นภาษาอังกฤษกับตัวเลข',
    })
    return false
  }
  if($("#txtRePassword").val() == "" ){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'กรุณากรอก re-password!',
    })
    return false
  }
  if(stringIsEnglish($("#txtRePassword").val()) == false  )
  { 
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'กรุณากรอก re-password เป็นภาษาอังกฤษกับตัวเลข',
    })
    return false
  }
  if($("#txtPassword").val() != $("#txtRePassword").val()){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'กรุณากรอก password ให้ตรงกับ re-password!',
    })
    return false
  }
  var formData = new FormData(document.getElementById("form1"));
  console.log("A")
  $("#checkusername").prop("disabled", true);
  $(".loading").css("display","block")
  $.ajax({
          url: 'ajax_checkuser.php',
          type: "POST",
          cache: false,
          processData: false,
          contentType: false,
          dataType: "json",
          data: formData,
          success: data => 
          { 
              
              if (data.success == true)
              {  
                console.log(data);
                console.log(data.success);
                $("#spanUsername").css("color", "green");
                $("#spanPassword").css("color", "green");
                $("#spanRePassword").css("color", "green");
                checkpass = true;
                Swal.fire({
                  icon: 'success',
                  title: 'ยินดีด้วย',
                  text: data.reason,
                })
                $("#checkusername").prop("disabled", false);
                $(".loading").css("display","none")
              }
              else
                {  
                checkpass = false;
                $("#spanUsername").css("color", "red");
                $("#spanPassword").css("color", "red");
                $("#spanRePassword").css("color", "red");
                console.log(data);
                console.log(data.reason);
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: data.reason,
                })
                $("#checkusername").prop("disabled", false);
                $(".loading").css("display","none")
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
});

$('#provinces').change(function() {
    var id_province = $(this).val();
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_province,function:'provinces'},
      success: function(data){
          $('#amphures').html(data); 
          $('#districts').html(' '); 
          $('#districts').val(' ');  
          $('#zip_code').val(' '); 
      }
    });
});

$('#amphures').change(function() {
    var id_amphures = $(this).val();
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_amphures,function:'amphures'},
      success: function(data){
          $('#districts').html(data);  
      }
    });
});

$('#districts').change(function(){
  var id_districts= $(this).val();
  $.ajax({
    type: "POST",
    url: "ajax_db.php",
    data: {id:id_districts,function:'districts'},
    success: function(data){
       $('#zip_code').val(data)
      }
    });
});



$("#form1").submit(e => {
    e.preventDefault()
    console.log($('#provinces').val())
    console.log($('#amphures').val())
    console.log($('#districts').val())

    console.log($('#provinces  option:selected').text())
    console.log($('#amphures option:selected').text())
    console.log($('#districts option:selected').text())
    if(checkpass == true)
    { 
        var formData = new FormData(document.getElementById("form1"));
        formData.append("provinces_id", $('#provinces').val());
        formData.append("amphures_id", $('#amphures').val());
        formData.append("districts_id", $('#districts').val());

        formData.append("provinces_text", $('#provinces  option:selected').text());
        formData.append("amphures_text", $('#amphures option:selected').text());
        formData.append("districts_text", $('#districts option:selected').text());

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
            $.ajax({
                url: 'ajax_register.php',
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: data => 
                { 
                    var response = JSON.parse(data);
                    if (response['success'] == true)
                    {
                        $(".loading").css("display","none")
                        Swal.fire({
                          icon: 'success',
                          title: 'ยินดีด้วย',
                          text: response['reason'],
                        }).then(function() {
                          $(".loading").css("display","block")
                          window.location.href =  'login.php';
                        });  
                    }
                    else
                    {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: response['reason'],
                        })
                        $(".loading").css("display","none")
                    }
                },
                error: (xhr, status, error) => {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert(errorMessage);
                    console.log(errorMessage);
                    $('#registersubmit').prop('disabled', false);
                }
            });
          } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
          }
        })
    }
    else
    { 
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'โปรดตรวจสอบการกรอกข้อมูล username และ password',
      })
      $('#registersubmit').prop('disabled', false);
    }
     
    });

</script>