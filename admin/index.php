<?php 
    include "includes/header.php";
    // require(dirname(dirname(__FILE__)).'\backend\functions\');
?>

    <main class="wrapper" id="main">
        <p> <?php 
            echo "<pre>";
            var_dump($_SESSION);
            echo "</pre>";
        ?> </p>
    </main>

    <!-- Importamos los archivos .js de tipo module para import/export entre archivos  -->
    <script src="js/admin_index.js"></script>
</body>
</html>