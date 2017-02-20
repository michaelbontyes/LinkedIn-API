<html>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="springy.js"></script>
<script src="springyui.js"></script>
<script>
var graph = new Springy.Graph();
var conns = new Array();
var network = new Array();

function initialize(conns1,network1){
			
		var i=0;
		var j=0;
		var k;
		
		for(k=0;k<conns.length;k++){
			window[conns[k]]=conns[k];
			window[conns[k]] = graph.newNode({label: conns[k]});
		}

		for(i;i<network.length;i++){
			for(j=0;j<network[i].length;j++){
		
			}
			
			  var n1=window[ network[i][0]];
			  var n2=window[ network[i][1]];
			graph.newEdge(n1, n2, {color: '#00A0B0'});
			graph.newEdge(n2, n1, {color: '#00A0B0'});
		}
		
}

function draw(){
	 var springy = window.springy = jQuery('#springydemo').springy({
    graph: graph,
    nodeSelected: function(node){
      console.log('Node selected: ' + JSON.stringify(node.data));
    }
  });

}

jQuery(function(){
	 $.getJSON('get_conns.php', function(data) {	
			
			conns = data.slice(0, data.length);
			
       });;
		  $.getJSON('get_network.php', function(data) {	
			
			network = data.slice(0, data.length);
			
			 initialize("A","b");
			 draw();
    });;

});
</script>

<canvas id="springydemo" width="640" height="480" />
</body>
</html>
