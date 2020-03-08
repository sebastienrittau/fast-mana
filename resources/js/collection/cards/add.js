if (page == 'collection.cards.add') {
    $(document).ready(function() {

         cardAddTable = $('#cardAddTable').dataTable( {
            "dom": 'tip',
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
                    return `<button type="button" onclick="addCard('${row['id']}')"><i class="fas fa-plus"></i></button>`;
                  } },
    ]
          } );

        $( "#searchCards" ).click(function() {
            $.ajax({
                url: '/collection/cards/add/search',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: 'POST',
                data: {name:$('#searchName').val()},
                success: function( data ){
                    cardAddTable.DataTable().clear().draw();
                    cardAddTable.DataTable().rows.add(data['cards']); // Add new data
                    cardAddTable.DataTable().columns.adjust().draw(); // Redraw the DataTable
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    // TODO Show alert to user
                    console.log( errorThrown );
                }
            });
          });

        window.addCard = function(cardID) {
            $.ajax({
                url: '/collection/cards/add',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: 'PUT',
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