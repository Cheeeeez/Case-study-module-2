<div class="container-fluid m-t-50">
    <div class="card">
        <h5 class="card-header">Staffs</h5>
        <div class="card-body">

            <form class="form-inline" method="get">
            <a href="./index.php?page=add-employee" class="btn btn-success mb-2 m-r-10" >Add staff</a>
            <label class="sr-only" for="inlineFormInputName2">Name</label>
            <input name="search" type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Search">
            <a type="submit" class="btn btn-primary mb-2">Submit</a>
            </form>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Avatar</th>
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
                        <td><img src="img/<?php echo $employee->getAvatar()?>" width="100" height="100"></td>
                        <td><?php echo $employee->getName() ?></td>
                        <td><?php echo $employee->getGender() ?></td>
                        <td><?php echo $employee->getEmail()?></td>
                        <td><?php echo $employee->getPhone() ?></td>
                        <td><?php echo $employee->getAddress() ?></td>
                        <td><?php echo $employee->getPosition() ?></td>
                        <td>
                            <a type="button"  class="btn btn-primary" href="./index.php?page=edit-employee&id=<?php echo $employee->getEmployeeId() ?>">Edit</a> |
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $employee->getEmployeeId() ?>">Delete</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModal<?php echo $employee->getEmployeeId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure ?
                                </div>
                                <div class="modal-footer">
                                    <form action="./index.php?page=delete-employee&id=<?php echo $employee->getEmployeeId() ?>" method="post">
                                        <input type="text" value="<?php echo $employee->getEmployeeId() ?>" hidden>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

