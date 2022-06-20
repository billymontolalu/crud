<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from buku";
$result = $conn->query($sql);
?>
<html>

<head>
    <title>Perpustakaan</title>
</head>

<body>
    <a href="http://localhost/crud/tambah.php">Tambah Data</a> || 
    <a href="http://localhost/crud/peminjaman.php">Tambah Peminjaman</a>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Judul Buku</td>
            <td>Pengarang</td>
            <td>Action</td>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["judul_buku"]; ?></td>
                    <td><?php echo $row["pengarang"]; ?></td>
                    <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a> <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                </tr>
        <?php
                $i = $i + 1;
            }
        }
        ?>
    </table>
</body>

</html>