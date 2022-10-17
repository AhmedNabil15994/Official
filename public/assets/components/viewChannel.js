$(function(){

	$('#transferDays-modal .submBtn').on('click',function(e){
	    e.preventDefault();
	    e.stopPropagation();
	    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	    $.ajax({
	        type: 'POST',
	        url: myURL+'/transferDays',
	        data:{
	            '_token': $('meta[name="csrf-token"]').attr('content'),
	            'receiver': $('#transferDays-modal select[name="receiver"] option:selected').val(),
	            'days': $('#transferDays-modal input[name="days"]').val(),
	        },
	        success:function(data){
	            if(data.status.status == 1){
	                successNotification(data.status.message);
	                setTimeout(function(){
	                	location.reload()
	                },2000);
	            }else{
	                errorNotification(data.status.message);
	            }
	        },
	    });
	});

	$(".basic-datatable").DataTable({
		processing: true,
        serverSide: true,
	    ajax: {
	        url: myURL+'/getQueue',
	        type: 'GET'
	    },
	    columns: [
            { data: 'id' },
            { data: 'type' },
            { data: 'chatId' },
            { data: 'status' },
            { data: 'is_sent' },
            { data: 'queued_at' },
            { data: 'sent_at' },
        ],
		language:{
			paginate:{
				previous:"<i class='mdi mdi-chevron-left'>",
				next:"<i class='mdi mdi-chevron-right'>"
			}
		},
		lengthMenu:[
            [10 , 50 , 100 , 500 , 1000],
            [10 , 50 , 100 , 500 , 1000],
        ],
		drawCallback:function(){
			$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
		}
	});

	$('.basic-datatable2').DataTable({
		processing: true,
        serverSide: true,
	    ajax: {
	        url: myURL+'/getHistory',
	        type: 'GET'
	    },
	    columns: [
            { data: 'id' },
            { data: 'type' },
            { data: 'body' },
            { data: 'fromMe' },
            { data: 'author' },
            { data: 'chatName' },
            { data: 'dateObj.date' },
            { data: 'statusText' },
            { data: 'deviceSentFrom' },
            { data: 'metadata' },
        ],
        columnDefs:[
   //      	columnDefsVar.push({
			// 	'targets': 0,
			// 	'title' : item['label'],
			// 	'orderable':false,
			// });
			{
				'targets': 9,
				render: function(data, type, full, meta) {
					return JSON.stringify(full.metadata)
				}
			}
        ],
		// ordering:false,
		lengthMenu:[
            [10 , 50 , 100 , 500 , 1000],
            [10 , 50 , 100 , 500 , 1000],
        ],
        language:{
			paginate:{
				previous:"<i class='mdi mdi-chevron-left'>",
				next:"<i class='mdi mdi-chevron-right'>"
			}
		},
		drawCallback:function(){
			$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
		}
		// language:{
		// 	paginate:{
		// 		previous:"<i class='mdi mdi-chevron-left'>",
		// 		next:"<i class='mdi mdi-chevron-right'>"
		// 	}
		// },
		// drawCallback:function(){
		// 	$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
		// },
    });
});