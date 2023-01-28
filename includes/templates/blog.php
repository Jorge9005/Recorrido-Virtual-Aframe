<?php
function truncar(string $texto, int $cantidad) : string
{
    if(strlen($texto) >= $cantidad) {
        return substr($texto, 0, $cantidad) . "...";
    } else {
        return $texto;
    }
}
?>
<?php while($blog = mysqli_fetch_assoc($resultadob)): 
    $texto =$blog['contenido']; 
    $cantidad = 200;   
?>
    <article class="entrada-blog">
                <div class="imagen">
                    <img loading="lazy" src="imagenesBlog/<?php echo $blog['imagen']; ?>" alt="Entrada de Blog">
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php?id=<?php echo $blog['id']; ?>">
                        <h4><?php echo $blog['titulo']; ?></h4>
                        <p class="informacion-meta">Escrito el: <span><?php echo $blog['creado']; ?></span> por: <span><?php echo $blog['escritor']; ?></span></p>

                        <p>
                            <?php echo truncar($texto, $cantidad); ?>
                        </p>
                    </a>
                </div>
            </article>
<?php endwhile; ?>


