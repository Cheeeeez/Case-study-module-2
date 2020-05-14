<?php

?>
<div class="container m-t-50">
    <div class="card">
        <h5 class="card-header">Staffs</h5>
        <div class="card-body">
            <a href="./index.php?page=add-employee" class="btn btn-success mb-2">Add staff</a>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Number</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($employees as $key => $employee): ?>
                    <tr>
                        <th scope="row"><?php echo ++$key ?></th>
                        <td><?php echo $employee->getEmployeeId() ?></td>
                        <td><?php echo $employee->getName() ?></td>
                        <td><?php echo $employee->getGender() ?></td>
                        <td><?php echo $employee->getEmail()?></td>
                        <td><?php echo $employee->getPhone() ?></td>
                        <td><?php echo $employee->getAddress() ?></td>
                        <td><?php echo $employee->getPosition() ?></td>
                        <td><a href="./index.php?page=edit-employee&id=<?php echo $employee->getEmployeeId() ?>">Edit</a> |
                            <a href="./index.php?page=delete-employee&id=<?php echo $employee->getEmployeeId() ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

