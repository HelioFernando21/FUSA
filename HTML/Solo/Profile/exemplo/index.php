<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="lib/jquery-1.8.2.js"></script>
<script src="lib/jquery-ui-1.9.1.custom.js"></script>

<style>
        body { font-size: 62.5%; }
        label, input { display:block; }
        input.text { margin-bottom:12px; width:95%; padding: .4em; }
        fieldset { padding:0; border:0; margin-top:25px; }
        h1 { font-size: 1.2em; margin: .6em 0; }
        div#users-contain { width: 350px; margin: 20px 0; }
        div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
        div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>
    <script>
    $(function() {
        var nome = $( "#nome" ),
            equipamento = $( "#equipamento" ),
            allFields = $( [] ).add( nome ).add( equipamento ),
            tips = $( ".validateTips" );
 
        function updateTips( t ) {
            tips
                .text( t )
                .addClass( "ui-state-highlight" );
            setTimeout(function() {
                tips.removeClass( "ui-state-highlight", 1500 );
            }, 500 );
        }
 
        function checkLength( o, n, min, max ) {
            if ( o.val().length > max || o.val().length < min ) {
                o.addClass( "ui-state-error" );
                updateTips( "Length of " + n + " must be between " +
                    min + " and " + max + "." );
                return false;
            } else {
                return true;
            }
        }
 
        function checkRegexp( o, regexp, n ) {
            if ( !( regexp.test( o.val() ) ) ) {
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            } else {
                return true;
            }
        }
 
        $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 300,
            width: 350,
            modal: true,
            buttons: {
                "Novo Instrumento": function() {
                   // var bValid = true;
                    allFields.removeClass( "ui-state-error" );
 
                    //bValid = bValid && checkLength( nome, "nome", 3, 16 );
                   	//bValid = bValid && checkLength( equipamento, "equipamento", 6, 80 );
                   // bValid = bValid && checkRegexp( nome, /^[a-z]([0-9a-z_])+$/i, "O nome deve possui no minimo 3 caracteres" );
 
                    //if ( bValid ) {
                    //    $( this ).dialog( "close" );
                    //}

					alert("Aqui vc tira isso e redireciona");
					
                },
                Cancel: function() {
					
                    $( this ).dialog( "close" );
                }
            },
            close: function() {
                allFields.val( "" ).removeClass( "ui-state-error" );
            }
        });
 
        $( "#create-user" )
            .button()
            .click(function() {
                $( "#dialog-form" ).dialog( "open" );
            });
    });
    </script>

</head>

<body>

<div id="dialog-form" title="Escolhendo a Budega o Instrumento">
    <p class="validateTips">Todos os campos são necessários.</p>
 
    <form>
    <fieldset>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
        
		<label for="name">Equipamento</label>
        <select name="equipamento" id="equipamento">
        	<option value="viola">Viola</option>
        	<option value="triangulo">Triangulo</option>
        	<option value="pandeiro">Pandeiro</option>                        
        </select>
    </fieldset>
    </form>
</div>
 
 
<div id="users-contain" class="ui-widget">

</div>
<button id="create-user">Create new user</button>
</body>
</html>