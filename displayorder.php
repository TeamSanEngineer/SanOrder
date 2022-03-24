<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';?>
<style>

div.dataTables_wrapper {
        width: 1150px;
        margin: 0 auto;
    }

@media only screen and (max-width: 600px) {
  div.dataTables_wrapper {
        width: 300px;
        margin: 0 auto;
    }
}
</style>
<body>   
<?php session_start();?> 
<!-- <div class="loading">Loading&#8230;</div> -->
<?php include 'body0_title.php';?> 
<?php include 'body1_display.php';?> 

<?php include 'footer.php';?>
</body>
</html>
