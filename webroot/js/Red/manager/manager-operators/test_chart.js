//defining chart configuration test 

var ctx = document.getElementById("myChart");

var barChart = new Chart(ctx, {
    type:'bar',
    data:{
        labels: ['Janvier','Fevrier','Mars','Avril','Mai','Juin'],
        datasets: [{
            label: 'My first Bar',
            data: [60,90,160,38,75,200],
            backgroundColor: '#7db1c8',
            borderWidth: 10,
            hoverBackgroundColor: '#dc6b1d',
        },
        {
            label: 'My second bar',
            data: [30,150,190,172,135,150],
            backgroundColor: '#7d9148',
            borderWidth: 10,
            hoverBackgroundColor: '#dc6b1d',


        }
        ],
        xLabels: [30,150,190,172,135,150]
    },
    options:{
        title:{
            display: true,
            text:'jjhg'
        },
        scale: {
            scaleLabel:{
                display:true
            }
        }
    }
});