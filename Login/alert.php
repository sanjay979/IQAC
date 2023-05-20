<html>

<body>
    <?php
    session_start();
    if ($_SESSION['alert']) {
    ?>
        <script type="text/javascript">
            window.alert("<?php echo $_SESSION['alert']; ?>")
        </script>
    <?php
        unset($_SESSION['alert']);
    }
    $_SESSION['alert'] = "";
    ?>
</body>

</html>