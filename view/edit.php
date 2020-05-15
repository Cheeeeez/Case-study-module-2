<div class="container m-t-50">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <img src="img/<?php echo $employee->getAvatar()?>" width="500" height="100%">
            </div>
        </div>
        <div class="col-md-6 form-div" style="border: 1px solid #e0e0e0; padding: 20px">
            <form method="post" enctype="multipart/form-data">
                <h3 class="text-center text-primary">Edit employee</h3>
                <input type="hidden" name="id" value="<?php echo $employee->getEmployeeId() ?>">
                <div class="form-group">
                    <label for="name">Full name <span style="color:red;">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name" value="<?php echo $employee->getName()?>">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="male" name="gender" class="form-check-input" value="Male" checked>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="female" name="gender" value="Female">
                        <label for="female" class="form-check-label">Female</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address <span style="color:red;">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                           placeholder="name@example.com" value="<?php echo $employee->getEmail()?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone<span style="color:red;">*</span></label>
                    <input type="text" name="phone" id="employee-number" class="form-control" value="<?php echo $employee->getPhone() ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?php  echo $employee->getAddress()?>">
                </div>
                <div class="form-group">
                    <label for="position">Job Title <span style="color:red;">*</span></label>
                    <select name="position" id="position" class="form-control">
                        <?php foreach ($positionList as $position): ?>
                            <option value="<?php echo $position['coefficients'] ?>"selected><?php echo $position['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile04"
                                   aria-describedby="inputGroupFileAddon04" value="<?php echo $employee->getAvatar()?>">
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Confirm</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>

    </div>
</div>
