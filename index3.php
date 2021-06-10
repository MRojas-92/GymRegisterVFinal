<?php 
    print("Resultado ok: ");
    
    $mysql = new mysqli("localhost:3306", "promay20_gymregisteruser", "gymregister#18", "promay20_pwgymregister"); //ORDEN ORIGINAL->("localhost:3306", "promay20_ejemplo", "ejemplo#2021", "promay20_ejemplodb")
    //$mysql->set_charset("utf8");
    if($mysql->connect_errno)
        echo "NO";
    else{
        echo "OK";
        $sentenciaSQL= "SELECT * FROM usuario";
        
       
        $Result = $mysql->query( $sentenciaSQL );


        $numeroRegistros=$Result->num_rows;
        if($numeroRegistros<=0) 
       { 
         echo "<div align='center'>"; 
         echo "<h2>No se encontraron resultados</h2>"; 
         echo "</div><hr> "; 
       }else{
   ?>
       <table border=1>
        <tr>
		<td><strong> ID amigo</strong></td>
		<td><strong> ID Usuario</strong></td>
		<td><strong> Nombre User</strong></td>
		<td><strong> Email</strong></td>
		<td><strong> Fecha</strong></td>
		</tr>
		<?php
		 // fetch_array() Obtiene un
        //Obtiene una fila de resultado como un array asociativo
        while($row =$Result->fetch_array()) {	    
           ?>
		   <tr>
		   <td> <?php //printf($row["id_amigo"]); ?>   </td>
		   <td> <?php printf($row["id_usuario"]); ?>   </td>
		  
		   <td> <?php printf($row["nombre_usuario"]); ?>   </td>
		  
		   <td> <?php printf($row["correo_electronico"]); ?>   </td>
		   <td> <?php printf($row["password"]); ?>   </td>
           </tr>
           
</table>           
<?php	}
}


    }
?>