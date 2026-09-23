const ctx = document.getElementById('graficoSensores').getContext('2d');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00'],
      datasets: [
        {
          label: 'Trem 01 (Sensor A)',
          data: [66, 64.7, 66.3, 68.1, 64.6, 64.6, 68.1, 66.6, 69.2, 64.1, 66.1, 64.1,],
          borderColor: '#38BDF8',
          backgroundColor: 'transparent',
          borderWidth: 2.5,
          tension: 0.3
        },
        {
          label: 'Trem 02 (Sensor B)',
          data: [72.8, 66.3, 66.9, 70.4, 69.1, 73.0, 69.3, 67.8, 76.4, 71.4, 72.2, 75.2],
          borderColor: '#F97316',
          backgroundColor: 'transparent',
          borderWidth: 2.5,
          tension: 0.3
        },
        {
          label: 'Trem 03 (Sensor C)',
          data: [57.2, 58.2, 56.3, 58.6, 57.1, 57.6, 57.1, 60.8, 58.0, 56.4, 59.2, 68.5],
          borderColor: '#10B981',
          backgroundColor: 'transparent',
          borderWidth: 2.5,
          tension: 0.3
        },
        {
          label: 'Trem 04 (Sensor D)',
          data: [81.1, 72.2, 74.8, 80.8, 83.0, 80.7, 79.6, 78.8, 74.1, 77.1, 78.2, 89.1],
          borderColor: '#F43F5E',
          backgroundColor: 'transparent',
          borderWidth: 2.5,
          tension: 0.3
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          labels: {
            color: '#E2E8F0',
            font: { size: 12, family: 'sans-serif' }
          }
        },
        title: {
          display: true,
          text: 'Monitoramento de Temperatura dos Sensores por Trem (°C)',
          color: '#E2E8F0',
          font: { size: 16, weight: 'bold' }
        }
      },
      scales: {
        x: {
          grid: { color: 'rgba(255, 255, 255, 0.1)' },
          ticks: { color: '#94A3B8' }
        },
        y: {
          grid: { color: 'rgba(255, 255, 255, 0.1)' },
          ticks: { color: '#94A3B8' },
          title: {
            display: true,
            text: 'Temperatura (°C)',
            color: '#94A3B8'
          }
        }
      }
    }
  });