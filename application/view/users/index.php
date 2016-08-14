<!--back to search link-->
<div id="historyBack" class="container">
    <a href="javascript://" onclick="history.back();">Go Back</a>
</div>
<!--back to search link end-->

<!-- main content -->
<div class="container">
    <h3>List of all users</h3>

    <!-- User table -->
    <div class="box table-responsive">
        <table id="userTable" class="display responsive no-wrap" width="100%">

            <!-- table head (column names) -->
            <!-- IMPORTANT: # of thead columns must match that of tbody -->
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Image</td>
                    <td>Id</td>
                    <td>Username</td>
                    <td>Email</td>
                </tr>
            </thead>

            <!-- table body (loop through users & print their information) -->
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td>
                            <?php
                            // display user-uploaded image if it exists
                            if (isset($user->image)) {
                                echo ("<img src='data:image/jpeg;base64," . base64_encode($user->image)
                                . "' alt='User image' style='height:100px; width: 100px'");
                            }
                            else {
                                echo ("<img src='" . URL . "img/demo-image.png' alt='User image'");
                            }
                            ?>
                        </td>
                        <td><?php if (isset($user->id)) echo htmlspecialchars($user->id, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($user->username)) echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($user->email)) echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>

        </table>
        <br/>
    </div>
</div>

<!-- apply DataTables to the user table -->

<script>
    $(document).ready(function () 
    {
        $('#userTable').DataTable({
            "pagingType": "simple_numbers", // pagination buttons
            "aaSorting": [], // initial sort (empty: none)
            "columnDefs": [{
                    "targets": [0, -1], // these columns are unorderable
                    "orderable": false
                }],
            "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
        });
    });
</script>
