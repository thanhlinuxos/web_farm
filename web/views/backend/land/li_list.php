<option value="">---</option>
<?php
foreach ($rows as $row) {
?>
    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
<?php    
}
?>
