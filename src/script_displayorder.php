<script type="text/javascript">
   
$(".loading").css("display","none")
var userid = <?php echo "\"". $userid ."\"" ?>;
var userlevel = <?php echo "\"". $userlevel ."\"" ?>;

// console.log(userid);
// console.log(userlevel);

var table =  $('#example').DataTable(
       {
        "columns": 
        [
          {'className': 'text-center', "data": 0 },
          {'className': 'text-center', "data": 1 },
          {'className': 'text-center', "data": 2 },
          {'className': 'text-center', "data": 3 },
          {'className': 'text-center', 
            data: null,
            render: function ( data, type, row ) 
            {   
          
                return '<button class="btn btn-primary " type="button" onclick="window.location=\'ordershow.php?type='+ data[3] +'&id='+ data[1] +'\'">SHOW</button>'
            }
          },
          {'className': 'text-center', 
            data: null,
            render: function ( data, type, row ) 
            {   
                // if(userlevel == "admin")
                // {
                // }
                return '<button class="btn btn-danger " type="button" onclick="window.location=\'orderedit.php?type='+ data[3] +'&id='+ data[1] +'\'">EDIT</button>'
            }
          },
        ],
        "scrollX": true,
        "dom": 'frtip',
        // "order": [[ 0, "desc" ]],
        // "buttons": [
        //            {
        //                 "extend": "csv",
        //                 "text": "Export as CSV",
        //                 "filename": "Report Name",
        //                 "className": "btn btn-green",
        //                 "charset": "utf-8",
        //                 "bom": "true",
        //                 init: function(api, node, config) {
        //                     $(node).removeClass("btn-default");
        //                 }
        //             },
        //             {
        //                 "extend": "excel",
        //                 "text": "Export as Excel",
        //                 "filename": "Report Name",
        //                 "className": "btn btn-green",
        //                 "charset": "utf-8",
        //                 "bom": "true",
        //                 init: function(api, node, config) {
        //                     $(node).removeClass("btn-default");
        //                 }
        //             }
                 
        // ]       
    } );


    // $('#example tbody').on( 'click', 'tr', function () {
    //     if ( $(this).hasClass('selected') ) {
    //         $(this).removeClass('selected');
    //     }
    //     else {
    //         table.$('tr.selected').removeClass('selected');
    //         $(this).addClass('selected');
    //     }
    // } );
 
    // $('#button').click( function () {
    //     table.row('.selected').remove().draw( false );
    // } );

    $('#example tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        console.log( table.row( this ).data() );
        // alert( 'data = '+data[0]+ ' row' );
    } );


</script>