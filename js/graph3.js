function affichergrahp3(label,valeur){
    const ctx3 = document.getElementById('myChart3')
const DoughnutChart = new Chart(ctx3, {
      type: 'doughnut',
      data: {
          labels: label,
          datasets: [{
              label: '# of Votes',
              data: valeur,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
};