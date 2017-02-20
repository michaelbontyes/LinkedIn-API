<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
		
	var skills=new Array(); ;
	function draw(){
	        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'People\'s skills at Epoka University'
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
                    text: 'Skills in %'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'Skill popularity: <b>{point.y:.1f} %</b>',
            },
            series: [{
                name: 'Population',
                data: skills,
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

   

	
		
var d=[["Linux",6.06],["Databases",6.06],["SQL",6.06],["Java",6.06],["MySQL",6.06],["Windows",6.06],["Web Development",6.06],["HTML",6.06],["PHP",6.06],["Oracle",4.55],["Programming",4.55],["JavaScript",4.55],["Stored Procedures",4.55],[".NET",4.55],["Web Applications",4.55],["Unix Shell Scripting",4.55],["Python",4.55],["C",1.52],["Shell Scripting",1.52],["OOP",1.52]];
$(function () {


	 $.getJSON('getSkills	.php', function(data) {	
			//langData=data;
			skills = data.slice(0, data.length);
			draw();
          });
	//alert(skills);

    });
    

		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 500px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
