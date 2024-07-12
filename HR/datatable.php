<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<script>
    
    $(document).ready(function () {
        $("#form1 #select-all").click(function(){
            console.log("hi")
            $("#form1 input[type='checkbox']").prop('checked',this.checked);
        });
    });
</script>


<form id="form1" method="post">
<div role= "document", style= "width : 60vw; height: 60vh; overflow: scroll; font-family: 'DM sans';">


<table id="example" class="display" style="width:100%,">
        <thead>
            <tr>
                <th><input id="select-all" type="checkbox"/>Select all</th>
                <th>Employee</th>
                <th>Role</th>
                <th>Punch-in-time</th>
                <th>Date</th>
                <th>Remarks</th>
               
            </tr>
        </thead>
        <tbody>
            <?php for($x=0;$x<15;$x++) {?>
            <tr>
                 <th><input type="checkbox" name='check[]' value=<?php echo $x; ?> style="float: left;" />ID</th>
                <td>Name <?php echo $x; ?></td>
                <td>worker</td>
                <td><?php echo date("h:i:s A")?></td>
                <td><?php echo date("d/m/y")?></td>
                <td>Text</td>
                
            </tr> 
            <?php } ?>
           </tbody>
       </table>
      

</div>
<br> 
<span><button type="submit" name="submit2">Accept</button>
  <button type="submit" name="submit1">reject</button></span>

</form>
<script> new DataTable('#example',{
    ordering:false,
});

</script>
<?php
if (isset($_POST['submit1'])) {
    if(!empty($_POST['check'])){
    foreach( $_POST['check'] AS $value){
        echo $value."<br>";
    }}
}
if (isset($_POST['submit2'])) {
    if(!empty($_POST['check'])){
    foreach( $_POST['check'] AS $value){
        echo $value."<br>";
    }}
}
  ?>
