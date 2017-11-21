<!DOCTYPE html>
<html>
    <head>
        <title>Temper </title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <script src="https://code.highcharts.com/highcharts.js"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="content text-center">
                <div class="title" >Temper Onboarding Process Analysis</div>
                
            </div>
            <div id="container" style="width:90%; height:400px;"></div>
        </div>


        <script type="text/javascript">
        $(function () { 
    Highcharts.chart('container', {

    title: {
        text: 'Line Graph Showing Temper Onboarding Analysis'
    },

    subtitle: {
        text: 'Source: Temper Workforce Solutions'
    },
    xAxis: {
        categories: <?=$onboardingStages?>
    },

    yAxis: {
        title: {
            text: 'Percentage of Users'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            // pointStart: 2010
        }
    },

    // series: [{
    //     name: 'Installation',
    //     data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    // }, {
    //     name: 'Manufacturing',
    //     data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    // }, {
    //     name: 'Sales & Distribution',
    //     data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    // }, {
    //     name: 'Project Development',
    //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    // }, {
    //     name: 'Other',
    //     data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    // }],
    series:<?=$weekly?>,
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
});
        </script>
    </body>
</html>
