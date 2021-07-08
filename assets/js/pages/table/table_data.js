/**
 *  Document   : table_data.js
 *  Author     : redstar
 *  Description: advance table page script
 *
 **/

$(document).ready(function() {
	'use strict';

		    $('.dataTable').DataTable( {
				dom: 'Bfrtip',
				buttons: [
					{ extend: 'print', text: '<i class="fa fa-print"></i>' }
				]
			});


} );