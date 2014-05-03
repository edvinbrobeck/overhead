
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart(data, options) {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Japp',     Math.floor((Math.random() * 10) + 1)],
            ['Nope',      Math.floor((Math.random() * 10) + 1)],
            ['Kanske',  Math.floor((Math.random() * 10) + 1)],
        ]);

        if(!options){
            var options = {
                title: '',
                pieHole: 0.4,
                backgroundColor: {
                    fill:'transparent',
                    strokeWidth: 0,
                    stroke:'transparent'
                },
                slices: {
                    0: {offset: 0.05},
                    1: {offset: 0.1},
                    2: {offset: 0.15},
                    3: {offset: 0.05},
                    4: {offset: 0.05},
                    5: {offset: 0.05},
                    6: {offset: 0.05},
                    7: {offset: 0.05},
                    8: {offset: 0.05},
                    9: {offset: 0.05}
                },
                fontName:'futura-pt',
                pieSliceText: 'none',
                legend: {
                    position: 'labeled',
                    textStyle: { color: '#fff', fontSize: 25 }
                },
                pieSliceTextStyle:{
                    color: '#fff',
                    fontName: 'futura-pt',
                    fontSize: '20'
                },
                pieSliceBorderColor: '#fff',
                colors:['transparent'],
                animation:{
                    duration: 1000,
                    easing: 'out'
                }
            };
        }

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }

    $('#choice-reload').on('click',function(){
        drawChart();
    });


</script>


