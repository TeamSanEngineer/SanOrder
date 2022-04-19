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

  $('.radiushead').toggle(<?php echo $radiushead ?>); 
  $('.numofteeth').toggle(<?php echo $numofteethchk ?>); 
  $('.helix').toggle(<?php echo $helix ?>); 


  $('.diameterhead2').toggle(<?php echo $diameterhead2 ?>); 
  $('.diameterbase2').toggle(<?php echo $diameterbase2 ?>); 
  $('.lengthead2').toggle(<?php echo $lengthead2 ?>); 
  $('.radiushead2').toggle(<?php echo $radiushead2 ?>); 
  $('.anglestep').toggle(<?php echo $anglestep ?>); 
  

  if("<?php echo $_GET['type'];?>" == "other")
{
  $('.imgmain').toggle(false); 
  $('#measure ').toggle(false);
  // othertype()
}
else{
  if( "<?php echo $measuredisable ?>" == "true"){
    $('.imgmain').toggle(false); 
    $('#measure ').toggle(false);
  }
}

console.log("GET"+"<?php echo $measuredisable ?>")
// else
// {
//   // checkstartmenuedit()
// }

</script>