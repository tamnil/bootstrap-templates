<?php 
$members = new Tamnil_Members();
global $wpdb;

$lista = $wpdb->get_results('
    SELECT *
    FROM '. $wpdb->prefix.'evento_reserva as evento_reserva
    INNER JOIN '. $wpdb->prefix.'evento as evento
    ON evento.id =  evento_reserva.evento_id
	INNER JOIN '. $wpdb->prefix.'users as user
    ON user.id =  evento_reserva.user_id

    WHERE 1=1 
	ORDER BY evento.dia asc');


$lista_arr = (array) json_decode(json_encode($lista), true);

echo '<a href="?page=members-list&download"> download </a>';

echo '<table>';
	echo '<tr>';
	echo '<th>id</th>';
	echo '<th>email</th>';
	echo '<th>nome</th>';
	echo '<th>palestra</th>';
	echo '<th>dia</th>';
	echo '<th>hora</th>';
	echo '<th>dia x hora</th>';
	echo '</tr>';
	
foreach( $lista as $item){
	echo '<tr>';
	echo '<td>'. $item->id.'</td>' ;
	echo '<td>'. $item->user_email.'</td>' ;
	echo '<td>'. $item->user_nicename.'</td>';
	echo '<td>' . $item->nome.'</td>';
	echo '<td>' . $item->dia .'d</td>';
	echo '<td>' . $item->hora .'h</td>';
	echo '<td>' . $item->dia_hora .'</td>';
// 	echo $item->nome;
// 	echo $item->nome;
	echo '</tr>';
	
}
//var_dump($lista_arr);
echo '</table>';

//var_dump($lista);

