<!DOCTYPE html>
<html>
    <head>
        <title>What's the world's mood today ?</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen">

        <script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="js/libs/raphael-min.js"></script>
        <script type="text/javascript" src="js/map.js"></script>
        

        <script type="text/javascript">             
             
        <?php echo $jsArray ?>             

            jQuery(function($) {
                var r = Raphael(document.getElementById('map'), 1000, 1000);
                r.safari();
                
              
                
                attributes = {
                    fill: '#CC3300', //Couleur de base (remplacée par la valeur dyn)
                    stroke: '#FFFFFF',
                    'stroke-width': 0.5,
                    'stroke-linejoin': 'round',
                    'cursor': "pointer"
                },
                arr = new Array();
                for (var country in map.shapes) {
                    var obj = r.path(map.shapes[country]);
                    arr[obj.id] = country;
                    obj.attr(attributes);
                    obj.attr({fill: coulours[country]});
                    
                    //Envoi des pts
                    obj.click(function() {
                        var pts = prompt("Humeur en "+arr[this.id],"");
                        if(pts === null)
                            {
                            return;
                            }
                             $.post("/app.php/add-vote", {id: arr[this.id], pts: pts}).done(function() {
                                 $(location).attr('href',"/");
                                //alert("Ajouté : " + arr[this.id] + " / " + pts);
                             });
                    });
                }
            });
            
            jQuery.expr[':'].raph = function (objNode, intStackIndex, arrProperties, arrNodeStack) {
                var c = objNode.getAttribute('class');
                return(c && c.indexOf(arrProperties[3]) != -1);
            };
        </script>
    </head>
    <body>
        <style>
            body {
                padding-top: 50px;
            }
            .starter-template {
                padding: 40px 15px;
                text-align: center;
            }
        </style>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand">
                        TWM
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Carte</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="starter-template">
                <div class="header"><h1>What's the world's mood today ?</h1></div>

                <div id="map">

                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery.js"></script>    
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
