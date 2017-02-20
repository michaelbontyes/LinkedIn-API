<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
		
	var cer_year=new Array(); ;
	
	function draw(){

        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'General Stats about certification of Epoka LinkedIn Users'
            },
            subtitle: {
                text: 'Source:Linkedin</a>'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nr'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Certificates : <b>{point.y:.0f} </b>',
            },
            series: [{
                name: 'Population',
                data: cer_year,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }]
        });
	
	
	}

   

	
		
var d=[["Average of certificate per person",3],["Most certificated person",3]];


$(function () {
	 $.getJSON('get_cer_2.php', function(data) {	
			//langData=data;
			cer_year = data.slice(0, data.length);
			
			draw();
          });


    });
    

		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 500px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
