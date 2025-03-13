<?php

include 'config.php';

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    //isime göre sıralama
    //$query = "SELECT * FROM searchperson WHERE name LIKE '{$input}%'";


    $query = "SELECT * FROM searchperson WHERE name LIKE '{$input}%' OR age LIKE '{$input}%'  OR country LIKE '{$input}%' OR email LIKE '{$input}%' OR job LIKE '{$input}%' LIMIT 3";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) { ?>

        <table class="table tabe-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>isim</th>
                    <th>Yaş</th>
                    <th>Ülke</th>
                    <th>Email</th>
                    <th>Meslek</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $age = $row['age'];
                    $country = $row['country'];
                    $email = $row['email'];
                    $job = $row['job'];

                ?>
                    <tr>
                        <td><?= $id; ?></td>
                        <td><?= $name; ?></td>
                        <td><?= $age; ?></td>
                        <td><?= $country; ?></td>
                        <td><?= $email; ?></td>
                        <td><?= $job; ?></td>
                    </tr>



                <?php
                }
                ?>
            </tbody>
        </table>

<?php

    } else {
        echo "<h6 class='text-danger text-center mt-3'>Aranan Kullanıcı Bulunamadı</h6>";
    }
} else {
}
