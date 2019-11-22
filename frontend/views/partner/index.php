    <div class="container">
        <button type="button" class="btn btn-primary bt">
            <a style="color:white; text-decoration: none;" href="<?php echo base_url('partner/add') ?>">ADD</a>
        </button>
        <br><br>
        <table class="table table-striped">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Area</th>
                <th scope="col"></th>
            </tr>

            <?php foreach ($partners as $partner) : ?>
                <tr>
                    <td><?php echo $partner['name'] ?></td>
                    <td><?php echo $partner['email'] ?></td>
                    <td><?php echo $partner['address'] ?> </td>
                    <td><?php echo $partner['phone_number'] ?></td>
                    <td><?php echo $partner['area'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary">
                            <a style="color:white; text-decoration: none;" href="<? echo base_url("partner/edit?id={$partner['id']}") ?>"> Update</a>
                        </button>
                    </td>

                </tr>
            <?php endforeach; ?>

        </table>
    </div>