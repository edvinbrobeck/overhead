<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OverHead</title>

    <!-- Styles for app -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">

    <script src="assets/js/vendor/jquery-1.10.2.js"></script>



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
            <!--
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
            -->

            <h1>Uberhead</h1>
            <h3>Modern learning.</h3>
        </section>

        <section>
            <section>
                <h2>Header</h2>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim eum, eveniet itaque maiores odit.</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium adipisci assumenda corporis dolorem earum eius explicabo in ipsam laborum magnam nostrum obcaecati possimus praesentium quisquam quod saepe, veniam voluptate?
                </p>

                <a id="choice1" class="choice" data-value="Yes" href="#/1/1">Awesome</a>
                <a id="choice1" class="choice" data-value="Yes" href="#/1/1">Ehm..No?</a>


            </section>

            <!-- Vertical -->

            <section>
                <h2>Moter of all Charts</h2>
                <div id="chart" style="width: 100%; height: 500px;"></div>
                <a id="choice-reload" class="choice" data-value="Yes" href="javascript:void(0);">Hitta på ny data</a>
            </section>

            <section>
                <h1>Header</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium adipisci assumenda corporis dolorem earum eius explicabo in ipsam laborum magnam nostrum obcaecati possimus praesentium quisquam quod saepe, veniam voluptate?
                </p>
            </section>

        </section>

        <section>
            <h2>What people said</h2>
            <h3>So we talked to some people about UberHead.</h3>
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
                <h2>Header</h2>
                <h3>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium alias aliquam aliquid asperiores at dolore, facilis fuga fugit in incidunt laudantium necessitatibus numquam odit.
                </h3>
            </section>

            <section>
                <img src="assets/images/spotify.png" alt=""/>
            </section>
            <section>
                <img src="assets/images/msoft.png" alt=""/>
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




<!-- Slide specific scripts -->
<script src="assets/components/highcharts/js/highcharts.js"></script>
<!--<script src="assets/components/highcharts/js/modules/exporting.js"></script>-->



<script type="text/javascript">
    $(function () {
        $('#chart').highcharts({
            chart: {
                backgroundColor: null,
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },

            colors: ['transparent'],
            labels: {
                style: {
                    color: '#3E576F',
                    fontFamily: 'futura-pt',
                    fontSize: '30px'
                }
            },
            title: {
                text: '',
                align: 'center',
                verticalAlign: 'middle',
                y: 50
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white',
                            textShadow: '0px 1px 2px black'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%']
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                innerSize: '50%',
                data: [
                    ['Awesome',   45.0],
                    ['Epic',       26.8],
                    ['Fail', 12.8]
                ]
            }]
        });
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
    var channel = pusher.subscribe('uberhead');
    channel.bind('slide-changed', function(data) {
        //alert(data.adminIndexH);
        console.log(data);

        // Map to body where admin currently is.
        $('body')
            .data('admin-index-h', data.adminIndexH)
            .data('admin-index-v', data.adminIndexV);


        console.log($('body'));

        // Init slide change
        Reveal.slide( data.adminIndexH, data.adminIndexV );

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
        parallaxBackgroundImage: 'assets/images/background.jpg',
        parallaxBackgroundSize: '1800px 1000px',

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

        console.log('Slide Changed');

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
