if (page == 'collection.cards.show') {
    $(document).ready(function() {

        cardShowTable = $('#cardShowTable').dataTable( {
           "dom": 'tip',
           ajax: {
            url: '/collection/cards/show',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataSrc: 'cards'
        },
           columns: [
               { data: 'name' },
               { data: 'cmc' },
               { data: 'colors' },
               { data: 'type' },
               {data: 'imageUrl',
               "render": function ( data, type, row, meta ) {
                   if(data) {
                       return `<img height="75%" width="100%" src="${data}"/>`;
                   }
                       return `Image Missing`;
                   
                 } },
               { data: 'Add Card',
               "render": function ( data, type, row, meta ) {
                   return `<button type="button" onclick="removeCard('${row['id']}')"><i class="fas fa-trash"></i></button>`;
                 } },
   ]
         } );

         $('#cardShowTable tbody').on( 'click', '.fa-trash', function () {
            table
                .row( $(this).parents('tr') )
                .remove()
                .draw();
        } );

       window.removeCard = function(cardID) {
           $.ajax({
               url: '/collection/cards/show/delete',
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               dataType: 'json',
               type: 'DELETE',
               data: {cardID:cardID},
               success: function( data ){
                   // Show alert to user
               },
               error: function( jqXhr, textStatus, errorThrown ){
                   // TODO Show alert to user
                   console.log( errorThrown );
               }
           });
       }


       
   } );
}