<ul>
    <li><a href="/">Students</a></li>
    <li><a href="/pr7/index.php/subjects">Predmeti</a></li>
    <li><a href="/pr7/index.php/uspishnist">Uspishnist</a></li>
</ul>
<form action="/pr7/index.php/uspishnist/add" method="POST">
    <select name="sid">
        <option value="">---</option>
        <?php if ($students) { ?>
            <?php foreach ($students as $s) { ?>
                <option value="<?php echo $s['id']; ?>">
                    <?php echo $s['name']; ?>
                </option>
            <?php } ?>
        <?php } ?>
    </select>
    <br>
    <select name="pid">
        <option value="">---</option>
        <?php if ($subjects) { ?>
            <?php foreach ($subjects as $s) { ?>
                <option value="<?php echo $s['id']; ?>">
                    <?php echo $s['name']; ?>
                </option>
            <?php } ?>
        <?php } ?>
    </select>
    <br>
    <input type="number" name="mark" placeholder="Mark" required class="post">


    <input type="submit" value="Send">
</form>

<hr>
<?php if ($uspishnist) { ?>
    <form method="POST" action="/pr7/index.php/uspishnist/actions">
        <table>
            <tr>
                <th>Name</th>
                <th>Predmet</th>
                <th>Action</th>
            </tr>
            <?php foreach ($uspishnist as $u) { ?>
                <tr>
                    <td>
                        <select name="sid[<?php echo $u['id']; ?>]">
                            <option value="">---</option>
                            <?php if ($students) { ?>
                                <?php foreach ($students as $s) { ?>
                                    <option value="<?php echo $s['id']; ?>" <?php if ($u['sid'] == $s['id'])
                                           echo 'selected'; ?>>
                                        <?php echo $s['name']; ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select name="pid[<?php echo $u['id']; ?>]">
                            <option value="">---</option>
                            <?php if ($subjects) { ?>
                                <?php foreach ($subjects as $s) { ?>
                                    <option value="<?php echo $s['id']; ?>" <?php if ($u['pid'] == $s['id'])
                                           echo 'selected'; ?>>
                                        <?php echo $s['name']; ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="mark[<?php echo $u['id']; ?>]" placeholder="Mark" required class="post"
                            value="<?php echo $u['mark']; ?>">
                    </td>

                    <td>
                        <button type="submit" name="update" value="<?php echo $u['id']; ?>">Update</button>
                        <button type="submit" name="delete" value="<?php echo $u['id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
<?php } ?>