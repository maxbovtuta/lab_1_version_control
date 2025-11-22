<ul>
    <li><a href="/">Students</a></li>
    <li><a href="/pr7/index.php/subjects">Predmeti</a></li>
    <li><a href="/pr7/index.php/uspishnist">Uspishnist</a></li>
</ul>
<form action="/pr7/index.php/subjects/addSubject" method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <!--<input type="number" name="group_id" placeholder="Group id" min="1" max="2" required>-->

    <input type="submit" value="Send">
</form>

<hr>
<?php if ($subjects) { ?>
    <form method="POST" action="/pr7/index.php/subjects/actions">
        <table>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($subjects as $s) { ?>
                <tr>
                    <td>
                        <input type="text" name="name[<?php echo $s['id']; ?>]" placeholder="Name" required class="post"
                            value="<?php echo $s['name']; ?>">
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