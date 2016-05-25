<div class="page-title">
  <h4>Show</h4>
</div>
<table class="table table-hover table-bordered">
    <tbody>
        <tr>
            <td class="col-sm-2 text-right strong"><strong>Full Name</strong></td>
            <td class="col-sm-10"><?php echo $row['fullname']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Username</strong></td>
            <td class="col-sm-10"><?php echo $row['username']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Group</strong></td>
            <td class="col-sm-10"><?php echo $row['group']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Phone</strong></td>
            <td class="col-sm-10"><?php echo $row['phone']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Email</strong></td>
            <td class="col-sm-10"><?php echo $row['email']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Address</strong></td>
            <td class="col-sm-10"><?php echo $row['address']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Gender</strong></td>
            <td class="col-sm-10"><?php echo $row['gender_']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Birthday</strong></td>
            <td class="col-sm-10"><?php echo $row['birthday']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Status</strong></td>
            <td class="col-sm-10"><?php echo $row['status_']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Note</strong></td>
            <td class="col-sm-10"><?php echo $row['note']; ?></td>
        </tr>
        <tr>
            <td class="col-sm-2 text-right"><strong>Created At</strong></td>
            <td class="col-sm-10"><?php echo $row['created_at_']; ?></td>
        </tr>
        
    </tbody>
</table>
<a href="<?php echo base_url('acp/user');?>" class="btn btn-default btn-md">Back</a>
<a href="<?php echo base_url('acp/user/edit/'.$row['id']);?>" class="btn btn-warning btn-md">Edit</a>
<a href="<?php echo base_url('acp/user/delete/'.$row['id']);?> " class="btn btn-danger btn-md" onclick="return confirm('Are you sure?');">Delete</a>
