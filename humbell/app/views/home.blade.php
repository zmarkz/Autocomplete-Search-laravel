<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomePage</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.css">
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

</head>
<body>
<div style="margin-top: 20%;margin-left: 30%">
    <form class="form-horizontal">
        <div class="form-group">
            <div class="col-xs-10" id="main-div">
                <div class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control category"  placeholder="Category"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control items"  placeholder="Item"/>
                    </div>
                </div>
                <br>
                <div id="itemData">
                </div>
            </div>
        </div>
    </form>
</div>
</body>

<script>
    $(function() {
        function log( message ) {
            $( "<div>" ).text( message ).prependTo( "#log" );
            $( "#log" ).scrollTop( 0 );
        }

        $( ".items" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "{{ URL::Route("getItems") }}/"+$('.category').attr('id'),
                    type : 'Get',
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            minLength: 1,
            select: function( event, ui ) {
                log( ui.item ?
                ui.item.label :
               this.value);
                $.ajax({
                    url: "{{ URL::Route("getItemData") }}/"+ui.item.id,
                    type : 'Get',
                    dataType: "json",
                    success: function( data ) {
                        $('#itemData').append("<p><b>"+data.name+" : </b>Rs. "+data.price+"</p>");
                    }
                });

            },
            open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            }
        });

        $( ".category" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "{{ URL::Route("getCategories") }}",
                    type : 'Get',
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            minLength: 1,
            select: function( event, ui ) {
                log( ui.item ?
                ui.item.label :
                + this.value);
                $('.category').attr('id',ui.item.id);
            },
            open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            }
        });
    });
</script>
</html>
