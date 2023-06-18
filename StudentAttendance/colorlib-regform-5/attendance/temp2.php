<?php
    $lectureID=$_GET["lectureID"];
    $aid=$_GET["aid"];
    $sid=$_GET["sid"];
    $flag=$_GET["flag"];
    if($flag==1)
    {
?>
<script>
    var c=confirm("You Mark Absent Do You Want To Make It Present?");
    if(c)
    {
        location.href = "index.php?lectureID=<?php echo $lectureID; ?>&flag=1&aid=<?php echo $aid; ?>&sid=<?php echo $sid; ?>";

    }
    else
    {
        location.href = "index.php?lectureID=<?php echo $lectureID; ?>&flag=2&aid=<?php echo $aid; ?>&sid=<?php echo $sid; ?>";

    }
</script>
<?php }
if($flag==2)
{
?>
<script>
    var c=confirm("You Mark Present Do You Want To Make It Absent?");
    if(c)
    {
        location.href = "index.php?lectureID=<?php echo $lectureID; ?>&flag=3&aid=<?php echo $aid; ?>&sid=<?php echo $sid; ?>";

    }
    else
    {
        location.href = "index.php?lectureID=<?php echo $lectureID; ?>&flag=4&aid=<?php echo $aid; ?>&sid=<?php echo $sid; ?>";

    }
</script>



<?php
}?>