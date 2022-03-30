<script type="text/javascript">

  $(".loading").css("display","none")
  $("#txtgender").val("<?php echo $row['gender'] ?>");  

  //
  function start_provinces()
  {
      $('#provinces').val(<?php echo $row['province_id'] ?>);
      $.ajax({
          type: "POST",
          url: "api/ajax_db.php",
          data: {id: <?php echo $row['province_id'] ?> ,function:'provinces'},
          success: function(data){
              $('#amphures').html(data); 
              $('#amphures').val(<?php echo $row['amphur_id'] ?>); 
          }
        });

        $.ajax({
          type: "POST",
          url: "api/ajax_db.php",
          data: {id: <?php echo $row['amphur_id'] ?> ,function:'amphures'},
          success: function(data){
            $('#districts').html(data); 
              $('#districts').val(<?php echo $row['tambon_id'] ?>);  
          }
        });

        $.ajax({
          type: "POST",
          url: "api/ajax_db.php",
          data: {id:<?php echo $row['tambon_id'] ?>,function:'districts'},
          success: function(data){
              $('#zip_code').val(data)
          }
        });

        
  }

  start_provinces()

  $('#provinces').change(function() 
  {
    var id_province = $(this).val();
      $.ajax({
      type: "POST",
      url: "api/ajax_db.php",
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
      url: "api/ajax_db.php",
      data: {id:id_amphures,function:'amphures'},
      success: function(data){
          $('#districts').html(data);  
          $('#zip_code').val(' '); 
      }
    });
  });

   $('#districts').change(function()
    {
    var id_districts= $(this).val();
      $.ajax({
      type: "POST",
      url: "api/ajax_db.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code').val(data)
      }
    });
  });



  $("#form1").submit(e => {
    e.preventDefault()

    var formData = new FormData(document.getElementById("form1"));
    formData.append("userid", "<?php echo $row['userid'] ?>");
    formData.append("oldcid", "<?php echo $row['cid'] ?>");

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
                url: 'api/ajax_editregister.php',
                type: "POST",
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json",
                data: formData,
                success: data => 
                { 
                    // var response = JSON.parse(data);
                    if (data.success== true)
                    {
                        $(".loading").css("display","none")
                        Swal.fire({
                          icon: 'success',
                          title: 'ยินดีด้วย',
                          text: data.reason,
                        }).then(function() {
                          $(".loading").css("display","block")
                          window.location.href =  'index.php';
                          // console.log(data)
                        });  
                    }
                    else
                    {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: data.reason,
                        })
                        $(".loading").css("display","none")
                    }
                },
                error: (xhr, status, error) => {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert(errorMessage);
                    console.log(errorMessage);
                    $(".loading").css("display","none")
                }
            });
          } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
          }
        })

    });

</script>