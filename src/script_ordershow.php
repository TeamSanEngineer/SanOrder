<script>
  $(".loading").css("display","none") 

  $("#chkusagedrill").prop('checked', <?php echo $row['usdrillchk']; ?>);
  $("#chkusagebreak").prop('checked', <?php echo $row['usbrkchk']; ?>);
  $("#chkusagentbreak").prop('checked', <?php echo $row['usbrkntchk']; ?>);
  $("#chkusagebite").prop('checked', <?php echo $row['usbitechk']; ?>);
  $("#chkusagescoop").prop('checked', <?php echo $row['usscoopchk']; ?>);
  $("#chkusagelathe").prop('checked', <?php echo $row['uslathechk']; ?>);
  $("#chkusageother").prop('checked', <?php echo $row['usotherchk']; ?>);

  var toolm = "<?php echo $row['toolmaterial'] ?>";
  var coat = "<?php echo $row['coating'] ?>";
  var mach = "<?php echo $row['machine'] ?>";
  if(toolm == "Other")
  {
    $('#slcmaterial').val("<?php echo $row['destoolmaterial']?>")
  }
  if(coat == "Other")
  {
    $('#slccoating').val("<?php echo $row['descoating']?>")
  }
  if(mach == "Other")
  {
    $('#txtmachine').val("<?php echo $row['desmachine']?>")
  }

  // console.log(<?php echo $diameterhead ?>)
  $('.diameterhead').toggle(<?php echo $diameterhead ?>); 
  $('.diameterbase').toggle(<?php echo $diameterbase ?>); 
  $('.clength').toggle(<?php echo $clength ?>); 
  $('.flength').toggle(<?php echo $flength ?>); 
  $('.length').toggle(<?php echo $length ?>); 
  $('.lengthead').toggle(<?php echo $lengthead ?>); 
  $('.radius').toggle(<?php echo $radius ?>); 
  $('.thread').toggle(<?php echo $thread ?>); 
  $('.angle').toggle(<?php echo $angle ?>); 
</script>