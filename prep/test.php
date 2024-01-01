<html>
<?php
session_start();
$_SESSION['cp'] = $_POST['data'];
?>

<head>
    <script>
        function ubahValue(value) {
            document.getElementById("page_index").value = 1 * value;

            var hidden = document.getElementById("hidden");
            hidden.value = page_index.value

        }
    </script>
</head>

<body>
    <form action="test.php" method="post">
        <input id="page_index" type="text" value="">

        <input id="hidden" type="hidden" name="data" value="">


        <button type="submit" onclick="ubahValue(0)" value="0">0</button>
        <button type="submit" onclick="ubahValue(1)" value="1">1</button>
        <button type="submit" onclick="ubahValue(2)" value="2">2</button>


        <br>
        <?php echo $_SESSION['cp']; ?>

    </form>
</body>

</html>