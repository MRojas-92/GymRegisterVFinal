
    <main class="seccion">
        <div class="contenedor-general tabla-avances">
            <h2 class="centrar-texto">Avances diarios</h2>

            <div class="anuncio-tiempo">
                <h3>Los avances del dia: <?php echo date("D");?>, <?php echo date("d"); ?>/<?php echo date("M"); ?>/<?php echo date("Y"); ?></h3>
            </div>

            <div class="contenedor-anuncios">
                <div class="anuncio-titulo">
                    <img src="img/estrella.png" alt="calculadora" height="30px" width="30px">
                    <div class="contenido-anuncio">
                        <h3>Rutina</h3>
                    </div>
                </div>
                
                <div class="anuncio-titulo">
                    <img src="img/estrella.png" alt="rojas" height="30px" width="30px">
                    <div class="contenido-anuncio">
                        <h3>Repeticiones</h3>
                    </div>
                </div>
                
                <div class="anuncio-titulo">
                    <img src="img/estrella.png" alt="Omid" height="30px" width="30px">
                    <div class="contenido-anuncio">
                        <h3>Tiempo</h3>
                    </div>
                </div>
            </div>

            <div class="contenedor-anuncios">
                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5>Rutina #1 Basico 1</h5>
                    </div>
                </div>
                
                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5>30</h5>
                    </div>
                </div>

                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5>35 min</h5>
                    </div>
                </div>
            </div>
    <!--
            <div class="contenedor-anuncios">
                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5>T01 ParImpar</h5>
                    </div>
                </div>
                
                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5>T02 Conversion</h5>
                    </div>
                </div>

                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5><?php echo date("d-m-Y"); ?></h5>
                    </div>
                </div>
            </div>

            <div class="contenedor-anuncios">
                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5>T01 ParImpar</h5>
                    </div>
                </div>
                
                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5>T02 Conversion</h5>
                    </div>
                </div>

                <div class="anuncio">
                    <div class="contenido-anuncio">
                        <h5><?php echo date("d-m-Y"); ?></h5>
                    </div>
                </div>
            </div>
    -->
            <div class="anuncio-tiempo">
                <h3>Selecciona la fecha que quieres consultar</h3>
                <input type="date" id="start" name="trip-start" value="<?php echo date("d-m-Y"); ?>" min="2018-01-01" max="2025-12-31">
            </div>
        </div>
    </main>
