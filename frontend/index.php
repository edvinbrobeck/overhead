<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SlidePad</title>

    <!-- Styles for app -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">

    <script src="assets/js/vendor/jquery-1.10.2.js"></script>
    <script src="assets/components/charts.js/Chart.js"></script>


    <!-- Slide specific styles -->
    <script type="text/javascript" src="//use.typekit.net/zaq0law.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

</head>
<body>

<!-- Slides -->

<div class="reveal">

    <!-- Any section element inside of this container is displayed as a slide -->
    <div id="slides" class="slides">
        <section>

            <div class="stage" style="width: 110px; height: 110px;display: inline-block; margin-bottom: 30px">
                <div class="cubespinner">
                    <div class="face1"></div>
                    <div class="face2"></div>
                    <div class="face3"></div>
                    <div class="face4"></div>
                    <div class="face5"></div>
                    <div class="face6"></div>
                </div>
            </div>

            <h1>Overhead</h1>
            <h3>Modern learning.</h3>
        </section>

        <section>
            <section>
                <h2>Two way Communication</h2>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim eum, eveniet itaque maiores odit.</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium adipisci assumenda corporis dolorem earum eius explicabo in ipsam laborum magnam nostrum obcaecati possimus praesentium quisquam quod saepe, veniam voluptate?
                </p>

                <a id="choice1" class="choice" data-value="Yes" href="#/1/1"><i class="fa fa-thumbs-o-up"></i> Awesome</a>
                <a id="choice1" class="choice" data-value="Yes" href="#/1/1"><i class="fa fa-thumbs-o-down"></i> Ehm..</a>

            </section>

            <!-- Vertical -->
            <section>
                <h1>Mmmmm....Donut's</h1>
                <div id="donutchart" style="width: 100%; height: 500px;"></div>
                <a id="choice-reload" class="choice" data-value="Yes" href="javascript:void(0);">Hitta på ny data</a>
            </section>
            <section>
                <h1>Vertical 2</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium adipisci assumenda corporis dolorem earum eius explicabo in ipsam laborum magnam nostrum obcaecati possimus praesentium quisquam quod saepe, veniam voluptate?
                </p>
            </section>

        </section>

        <section>
            <h2>What people told us</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium adipisci assumenda corporis dolorem earum eius explicabo in ipsam laborum magnam nostrum obcaecati possimus praesentium quisquam quod saepe, veniam voluptate?
            </p>

            <blockquote class="fragment">
                <p>
                    We want it. We really really want it.
                </p>
                <cite>- Edvin Brobeck</cite>
            </blockquote>

            <blockquote class="fragment">
                <p>
                    We want it. We really really want it.
                </p>
                <cite>- Edvin Brobeck</cite>
            </blockquote>
        </section>

        <section>
            <section>
                <h2>Who whe talked to</h2>
                <h3>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium alias aliquam aliquid asperiores at dolore, facilis fuga fugit in incidunt laudantium necessitatibus numquam odit.
                </h3>
            </section>
            <section>
                <img src="http://mhdnyc.splashthat.com/img/events/52537/assets/6274.spotify-logo-horizontal-white-rgb.png" alt=""/>
            </section>
            <section>
                <img src="http://download.microsoft.com/download/B/1/0/B102AB56-BB7E-4BCF-9D80-1278A029F95A/MSFT_logo_png.png" alt=""/>
            </section>
        </section>

        <section>
            <section>
                <h1>Tack</h1>
                <h3>Applådera. Nu.</h3>
            </section>
            <section>
                <img src="http://matthisborgen.files.wordpress.com/2012/02/fred-win-meme-prinnysoul.png" alt="s"/>
            </section>
        </section>
    </div>

</div>

<!-- Include JS and dependecies -->
<script src="assets/js/source/main.js"></script>
<script src="assets/js/plugins.min.js"></script>

<script src="http://js.pusher.com/2.1/pusher.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>


<!-- Slide specific scripts -->

<script type="text/javascript">
    // Find the right method, call on correct element
    function launchFullscreen(element) {
        if(element.requestFullscreen) {
            element.requestFullscreen();
        } else if(element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if(element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        } else if(element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }
    }

    // Launch fullscreen for browsers that support it!
    launchFullscreen(document.documentElement); // the whole page
    launchFullscreen(document.getElementById("slides")); // any individual element
</script>

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


<script type="text/javascript">
    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
        if (window.console && window.console.log) {
            window.console.log(message);
        }
    };

    // Map to body where admin currently is.
    $('body')
        .data('admin-index-h', 0)
        .data('admin-index-v', 0);

    var pusher = new Pusher('41f5684231688a066aca');
    var channel = pusher.subscribe('{{ $slidepad }}-{{ $room_id');
    channel.bind('slide-changed', function(data) {
        //alert(data.message);
        console.log(data);

        // Map to body where admin currently is.
        $('body')
            .data('admin-index-h', data.indexH)
            .data('admin-index-v', data.indexV);


        console.log($('body'));

        // Init slide change
        Reveal.slide( data.indexH, data.indexV );

    });


</script>

<script>

    // Full list of configuration options available here:
    // https://github.com/hakimel/reveal.js#configuration
    Reveal.initialize({
        controls: true,
        progress: true,
        history: true,
        center: true,

        theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
        transition: Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/fade/none

        // Parallax scrolling
        parallaxBackgroundImage: 'http://fc08.deviantart.net/fs70/i/2010/227/1/7/heart_bokeh_by_pigeon8888.jpg',
        parallaxBackgroundSize: '2100px 1000px',

        // Optional libraries used to extend on reveal.js
        dependencies: [
            { src: 'assets/components/reveal.js/lib/js/classList.js', condition: function() { return !document.body.classList; } },
            { src: 'assets/components/reveal.js/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
            { src: 'assets/components/reveal.js/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
            { src: 'assets/components/reveal.js/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
            { src: 'assets/components/reveal.js/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
            { src: 'assets/components/reveal.js/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
        ]
    });


    // Keep viewers from sliding too further than admin
    Reveal.addEventListener( 'slidechanged', function( event ) {
        // event.previousSlide, event.currentSlide, event.indexh, event.indexv
        var adminState = {
            indexH: $('body').data('admin-index-h'),
            indexV: $('body').data('admin-index-v')
        };
        if( event.indexh > adminState.indexH || (event.indexh == adminState.indexH && event.indexv > adminState.indexV)  ){
        //    Reveal.slide( adminState.indexH, adminState.indexV );
        }

    } );

</script>

</body>
</html>
