import $ from "jquery";
import Chart from 'chart.js';

export default class WeatherChart {
  constructor(element) {

  	this.weatherChart(function(data) {

  		var arr = data.smhi.concat(data.yr)
			var max = arr.reduce(function(a, b) {
			    return Math.max(a, b)
			})
			var min = arr.reduce(function(a, b) {
			    return Math.min(a, b)
			})
			let now = "<h2><span class='smhi'>"+data.smhi[0]+"</span> <span class='yr'>"+data.yr[0]+"</span>"
			$("#now").html(now)
			
		  new Chart(element, {
		    type: 'line',
		    data: {
		      labels: data.time,
		      datasets: [
		        {
		          label: "SMHI",
		          borderColor: ["#f46242"],
		          fill: false,
		          data: data.smhi
		        },
		        {
		          label: "YR",
		          borderColor: ["#70d1cf"],
		          fill: false,
		          data: data.yr
		        }
		      ]
		    },
		    options: {
		      legend: { display: false },
		      title: {
		        display: true
		      },
		      scales: {
            yAxes: [{
              ticks: {
                  beginAtZero:true,
                  min: min-3,
                  max: max+3   
              }
            }]
          }
		    }
			});
		})
	}

	weatherChart(callback) {
		$.ajax({
	    'type': 'GET',
	    'dataType': 'text',
	    'url': "views/weather_data.php",
	    'success': function(data) {
        callback($.parseJSON(data))
    	}
		})
	}
}