<?php 

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

$new_csv = fopen('php://output', 'w');
fputcsv($new_csv, ['id','email','nome','palestra','dia','hora','dia x hora']);
foreach( $lista_arr as $item){
	$ret_arr = [];
	$ret_arr = [
			$item['id'],
			$item['user_email'],
			$item['user_nicename'],
			$item['nome'],
			$item['dia'],
			$item['hora'],
			$item['dia_hora']
			
	];

	
fputcsv($new_csv, $ret_arr);

}
fclose($new_csv);
