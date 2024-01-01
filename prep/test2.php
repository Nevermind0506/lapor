<html>
<?php
?>

<head>
    <script>
        function ubahValue(value) {
            var input = document.getElementById("nilai");
            input.value = nilai.value;

            var hidden = document.getElementById("hidden");
            hidden.value = input.value
        }
    </script>
</head>

<body>
    <form action="test2.php" method="post">
        <input id="nilai" type="text" value="">

        <input id="hidden" type="hidden" name="data" value="">

        <button id="num" onclick="ubahValue(0)" value="0">0</button>
        <button id="num" onclick="ubahValue(1)" value="1">1</button>
        <button id="num" onclick="ubahValue(2)" value="2">2</button>


    </form>
    <?php echo $_POST['data']; ?>
</body>

</html>