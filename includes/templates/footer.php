<?php 

    $cliente = $_SESSION['id'] ?? false;


?>
<?php if(!$cliente){ ?>

<!--Footer-->
<footer class="footer seccion">
    <!--Navegacion Footer-->
        <p class="copyright">Semestre Agosto-Diciembre  <?php echo date('Y'); ?></p>
    </footer>
    <!--Uso de las funciones de JavaScript-->
    <script src="../../../recorridovirtual/build/js/bundle.min.js"></script>
</body>
</html>

    <?php } else{ ?> 

<!--Footer-->
<footer class="footer seccion">
    <!--Navegacion Footer-->

        <p class="copyright">Semestre Agosto-Diciembre <?php echo date('Y'); ?></p>
    </footer>
    <!--Uso de las funciones de JavaScript-->
    <script src="../../../recorridovirtual/build/js/bundle.min.js"></script>
</body>
</html>
        <?php }?>


