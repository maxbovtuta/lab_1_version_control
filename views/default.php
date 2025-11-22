<ul>
    <li><a href="/pr7/">Students</a></li>
    <li><a href="/pr7/index.php/subjects">Predmeti</a></li>
    <li><a href="/pr7/index.php/uspishnist">Uspishnist</a></li>
</ul>
<form action="/pr7/index.php/students/addStudent" method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <!--<input type="number" name="group_id" placeholder="Group id" min="1" max="2" required>-->
    <select name="group_id">
        <option value="">---</option>
        <?php if ($groups) { ?>
            <?php foreach ($groups as $g) { ?>
                <option value="<?php echo $g['id']; ?>">
                    <?php echo $g['name']; ?>
                </option>
            <?php } ?>
        <?php } ?>
    </select>
    <input type="submit" value="Send">
</form>

<hr>
<?php if ($students) { ?>
    <form method="POST" action="/pr7/index.php/students/actions">
        <table>
            <tr>
                <th>Name</th>
                <th>Group</th>
                <th>Action</th>
            </tr>
            <?php foreach ($students as $s) { ?>
                <tr>
                    <td>
                        <input type="text" name="name[<?php echo $s['id']; ?>]" placeholder="Name" required class="post"
                            value="<?php echo $s['name']; ?>">
                    </td>
                    <td>
                        <select name="group_id[<?php echo $s['id']; ?>]">
                            <option value="">---</option>
                            <?php if ($groups) { ?>
                                <?php foreach ($groups as $g) { ?>
                                    <option value="<?php echo $g['id']; ?>" <?php if ($s['group_id'] == $g['id'])
                                           echo 'selected'; ?>>
                                        <?php echo $g['name']; ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <button type="submit" name="update" value="<?php echo $s['id']; ?>">Update</button>
                        <button type="submit" name="delete" value="<?php echo $s['id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
<?php } ?>