<div class="container">
    <div class="card mt-3">
        <h5 class="card-header">Staffs</h5>
        <div class="card-body">
            <a href="./index.php?page=add-employee" class="btn btn-success mb-2">Add staff</a>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Number</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Report to</th>
                    <th scope="col">Office</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($staffs as $key => $staff): ?>
                    <tr>
                        <th scope="row"><?php echo ++$key ?></th>
                        <td><?php echo $staff["employeeNumber"] ?></td>
                        <td>
                            <button onclick="complexSHow('<?php echo $staff["employee"] ?>')"
                                    class="btn btn-link"><?php echo $staff["employee"] ?></button>
                        </td>
                        <td><?php echo $staff["jobTitle"] ?></td>
                        <td><?php echo $staff["manager"] ?></td>
                        <td><?php echo $staff["city"] ?></td>
                        <td><a href="./index.php?page=edit-employee&id=<?php echo $staff['employeeNumber'] ?>"><i
                                    class="fas fa-edit"></i></a> |
                            <a href="./index.php?page=delete-employee&id=<?php echo $staff['employeeNumber'] ?>"><i
                                    class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="display : none" id="hidden-div">
    <div class="container-fluid" id="complex-div" style="text-align: center">

        <input accept="images/*" type="file" onchange="preview_image(event)">
        <img id="preview-avatar" width="160" height="160" style="border-radius: 50%">

        <div class="panel-group">
            <div class="panel panel-info">
                <div class="panel-heading">Panel with panel-info class</div>
                <div class="panel-body">Panel Content</div>
            </div>
        </div>
    </div>
</div>
<script>
    function complexSHow(title) {
        let msg = $('#complex-div');

        BootstrapDialog.show({
            title: title,
            message: $('#complex-div'),
            onhide: function () {
                $('#hidden-div').append(msg);
            }
        });
    }

    function preview_image(event) {
        let reader = new FileReader();
        reader.onload = function () {
            let output = document.getElementById('preview-avatar');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

</script>
