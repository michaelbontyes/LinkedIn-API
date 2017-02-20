<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>	

		<script type="text/javascript">
		
		
	var langs1=new Array(); 
	var langData=[["Spanish",10],["Albanian",30],["English",30],["Italian",10],["Turkish",20]];
	
	
	 
	function draw(){
			var langData33=[
                    ['English',   45.0],
                    ['Albanian',       26.8],
                    {
                        name: 'Turkish',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    },
                    ['Italian',    8.5],
                    ['Spanish',     6.2],
                    ['German',   0.7]
                ];
    	
    	// Radialize the colors
		Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
		    return {
		        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
		        stops: [
		            [0, color],
		            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
		        ]
		    };
		});
		
		// Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Most spoken languages at Epoka University'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Spoken by',
                data: langs1
            }]
        });
				
	}
	
		
	
	
	
$(function () {
  	
		$.getJSON('getLang.php', function(data) {	
					//langData=data;
					 langs1 = data.slice(0, data.length);
					
					draw();
		});
		

	
    });
    

		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<?php
include("../config.php");
$nr_q=mysql_query("select distinct userid from languages");
$nr_users=mysql_num_rows($nr_q);
$nr_u=mysql_query("select distinct id from users");
$nr_us=mysql_num_rows($nr_u);

echo  "<center> <b> From ".$nr_us." </b> registered users <b> omly ".$nr_users." </b> of them have provided their known languages </center> ";

?>
	</body>
</html>
