<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Entrenar</title>
    <link rel="stylesheet" type="text/css" href="css/estilos_entrenar.css?v=<?php echo time(); ?>">
</head>
<body>

<!--
    <header class="titulo">
        <a href="menu_principal.php">
            <img src="img/logo.jfif" alt="logo" width="100px" height="100">
        </a>
        <div>
            <h1>Gym Register</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="alinear">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="7" r="4" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg>
            <p>Usuario</p>
        </div>
    </header> 
-->    

<?php  
    //session_start();
    
    $id_r=$_SESSION['rutina'][0]-1; // "Deposita" la rutina llegada desde

    $ejercicios[]=$_SESSION['ejercicios'][$id_r*3];
    $ejercicios[]=$_SESSION['ejercicios'][($id_r*3)+1];
    $ejercicios[]=$_SESSION['ejercicios'][($id_r*3)+2];
    
	$cantidad=$_SESSION['rutina'][3] ;
    
    if(isset($_POST['siguiente'])){
        if($_SESSION['num']<2){
            $_SESSION['num']=$_SESSION['num']+1;
            if($_SESSION['num']<2){
    			$siguiente=$cantidad.' '.$ejercicios[$_SESSION['num']+1];
            }
		}
	}  
	else{
		$siguiente= $cantidad.' '.$ejercicios[$_SESSION['num']+1];
	}
	$actividad=$ejercicios[$_SESSION['num']];
	$imagen='img/'.$actividad.'.png';

    if($_SESSION['fin']){ 
        echo '
            <section>
                <form action="" method="post">
                <input class="terminar" type="submit" name="terminar" value="Finalizar" style="cursor: pointer;">
                </form>';
            if(isset($_POST['terminar'])){
                $_SESSION['fin']=false;
                require('modelo/database.php');
                $fecha = date("Y/m/d");
                $db = new AccesoDatos();
                $db->conectar();
                $oMysql = $db->getConex();
                $Query= "INSERT INTO actividades(id_usuario, id_rutina, tiempo, fecha) VALUES ('".$_SESSION['datos'][0][0]."','".$_SESSION['rutina'][0]."', 1,'".$fecha."')"; 
                       
                          //$oMysql->query    seria como Objeto.metodo
                $Result = $oMysql->query( $Query );  // se lanza la consulta

                if($Result==null){
                  echo "<script type='text/javascript'>alert('No se pudo registrar la actividad')</script>";
                }
                $db->desconectar();
                header("Location: menu_principal.php");
            }
        echo '
            </section>
        ';
        
    }
    else {
    
        echo '
        <section>   
            <form action="" method="post">  
                <h1>¡Entrenando!</h1>
                <h2>Rutina #'.($id_r+1).'</h2>
                <h3>'.$cantidad.' '.$actividad.'</h3>  
                <img src="'.$imagen.'" alt="'.$imagen.'"> 
                <br>
            </form>

           <div id="cronometro">
              <div id="reloj">
                 00 00 00
                 </div>
              <form name="cron" action="#">
                 <input type="button" value="Empezar" name="boton1"   />
                 <input type="button" value="Parar" name="boton2"  /><br/>
              </form>
           </div>';
            if($_SESSION['num']==2){
                $_SESSION['num']=0;
                $siguiente="Finalizar";
                $_SESSION['fin']=true;
            }
            echo '<form action="" method="post">
                <input class="siguiente" type="submit" name="siguiente" value="Siguiente" style="cursor: pointer;">
                '.$siguiente.'
                <br><br>
                <a href="menu_principal.php" class="terminar" 
                style="background-color: rgb(233, 151, 153); text-decoration: none; 
                    padding: 5px;  font-weight: bold; padding-right: 25px; padding-left: 25px;
                    border: 2px solid black; box-shadow: 2px 2px black; color:black; ">Cancelar</a>
                <br><br><br>
            </form>
        </section>

        ';
    }
?>



<script type="text/javascript">
    window.onload = function() {

visor=document.getElementById("reloj"); //localizar pantalla del reloj
//asociar eventos a botones: al pulsar el botón se activa su función.
document.cron.boton1.onclick = activo; 
document.cron.boton2.onclick = pausa;
document.cron.boton1.disabled=false;
document.cron.boton2.disabled=true;
//variables de inicio:
var marcha=0; //control del temporizador
var cro=0; //estado inicial del cronómetro.

}

//botón Empezar / Reiniciar
function activo (){   
     if (document.cron.boton1.value=="Empezar") { //botón en "Empezar"
        empezar() //ir  la función empezar
        }
     else {  //Botón en "Reiniciar"
        reiniciar()  //ir a la función reiniciar
        }
     }
//botón pausa / continuar
function pausa (){ 
     if (marcha==0) { //con el boton en "continuar"
        continuar() //ir a la función continuar
        }
     else {  //con el botón en "parar"
        parar() //ir a la funcion parar
        }
     }
//Botón 1: Estado empezar: Poner en marcha el crono
function empezar() {
      emp=new Date() //fecha inicial (en el momento de pulsar)
      elcrono=setInterval(tiempo,10); //función del temporizador.
      marcha=1 //indicamos que se ha puesto en marcha.
      document.cron.boton1.value="Reiniciar"; //Cambiar estado del botón
      document.cron.boton2.disabled=false; //activar botón de pausa
      }
//función del temporizador          
function tiempo() { 
     actual=new Date(); //fecha a cada instante
        //tiempo del crono (cro) = fecha instante (actual) - fecha inicial (emp)
     cro=actual-emp; //milisegundos transcurridos.
     cr=new Date(); //pasamos el num. de milisegundos a objeto fecha.
     cr.setTime(cro); 
        //obtener los distintos formatos de la fecha:
     cs=cr.getMilliseconds(); //milisegundos 
     cs=cs/10; //paso a centésimas de segundo.
     cs=Math.round(cs); //redondear las centésimas
     sg=cr.getSeconds(); //segundos 
     mn=cr.getMinutes(); //minutos 
     
        //poner siempre 2 cifras en los números      
     if (cs<10) {cs="0"+cs;} 
     if (sg<10) {sg="0"+sg;} 
     if (mn<10) {mn="0"+mn;} 
        //llevar resultado al visor.         
     visor.innerHTML=mn+":"+sg+":"+cs; 
     }
//parar el cronómetro
function parar() { 
     clearInterval(elcrono); //parar el crono
     marcha=0; //indicar que está parado.
     document.cron.boton2.value="Continuar"; //cambiar el estado del botón
     }       
//Continuar una cuenta empezada y parada.
function continuar() {
     emp2=new Date(); //fecha actual
     emp2=emp2.getTime(); //pasar a tiempo Unix
     emp3=emp2-cro; //restar tiempo anterior
     emp=new Date(); //nueva fecha inicial para pasar al temporizador 
     emp.setTime(emp3); //datos para nueva fecha inicial.
     elcrono=setInterval(tiempo,10); //activar temporizador
     marcha=1; //indicar que esta en marcha
     document.cron.boton2.value="parar"; //Cambiar estado del botón
     document.cron.boton1.disabled=false; //activar boton 1 si estuviera desactivado
     }
//Volver al estado inicial
function reiniciar() {
     if (marcha==1) {  //si el cronómetro está en marcha:
         clearInterval(elcrono); //parar el crono
         marcha=0;  //indicar que está parado
         }
             //en cualquier caso volvemos a los valores iniciales
     cro=0; //tiempo transcurrido a cero
     visor.innerHTML = "00 00 00"; //visor a cero
     document.cron.boton1.value="Empezar"; //estado inicial primer botón
     document.cron.boton2.value="Parar"; //estado inicial segundo botón
     document.cron.boton2.disabled=true;  //segundo botón desactivado    
     }  
</script>

<!--

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <h4 class="copyright">Equipo 9 - Derechos Reservados 2021 &copy;</h4>
        </div>
    </footer>
    -->