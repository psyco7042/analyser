jQuery(document).ready(function () {
     // Extract the labels and sales values
     var chartData = jQuery.parseJSON(chart_data);


     var labels = [];
     var data = [];
     chartData.forEach(function(item) {
         labels.push(item.name);
         data.push(item.sales);
     });

     // Create the pie chart
     var ctx = document.getElementById('salesPieChart').getContext('2d');
     var myPieChart = new Chart(ctx, {
         type: 'pie',  // Type of chart (pie chart)
         data: {
             labels: labels,  // Pie chart labels
             datasets: [{
                 label: 'Sales Data',
                 data: data,  // Data values for the pie chart
                 backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],  // Colors for each segment
                 hoverOffset: 4  // Optional: adds a hover effect
             }]
         },
         options: {
             responsive: true,  // Make the chart responsive to window resizing
             plugins: {
                 legend: {
                     position: 'top',  // Position of the legend
                 },
                 tooltip: {
                     callbacks: {
                         label: function(tooltipItem) {
                             return tooltipItem.label + ': ' + tooltipItem.raw + ' sales';
                         }
                     }
                 }
             }
         }
     });
});
