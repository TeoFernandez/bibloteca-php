// 🔁 Guardamos las instancias globales para poder actualizarlas después
let chartLibros = null;
let chartSinDevolver = null;
let chartAlumnos = null;

// 📊 Libros más prestados
function cargarGraficoLibros() {
  fetch('../ajax/estadisticas.ajax.php?accion=librosmasprestados')
    .then(res => res.json())
    .then(data => {
      const labels = data.map(item => item.titulo);
      const values = data.map(item => item.Cantidad);

      if (chartLibros) chartLibros.destroy(); // 🔁 destruir si ya existe

      chartLibros = new Chart(document.getElementById("graficolibros"), {
        type: "bar",
        data: {
          labels,
          datasets: [{
            label: "Cantidad de préstamos",
            backgroundColor:[
              "#4e73df",
              '#1cc88a',
              '#36b9cc',
            ],
            data: values
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: "Top 5 Libros más Prestados"
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,   // 👈 empieza siempre en 0
                stepSize: 1,         // 👈 incrementos de 1 (ideal si tus números no son tan grandes)
                suggestedMax: Math.max(...values) + 1 // 👈 agrega espacio arriba
              }
            }]
          }
        }
      });
    });
}
// 📊 Libros más prestados
function cargarGraficoSinDevolver() {
  fetch('../ajax/estadisticas.ajax.php?accion=librossindevolver')
    .then(res => res.json())
    .then(data => {
      const labels = data.map(item => item.titulo);
      const values = data.map(item => item.Cantidad);

      if (chartLibros) chartLibros.destroy(); // 🔁 destruir si ya existe

      chartLibros = new Chart(document.getElementById("graficolibros"), {
        type: "bar",
        data: {
          labels,
          datasets: [{
            label: "Cantidad de préstamos",
            backgroundColor:[
              "#4e73df",
              '#1cc88a',
              '#36b9cc',
            ],
            data: values
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: "Top 5 Libros más Prestados"
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,   // 👈 empieza siempre en 0
                stepSize: 1,         // 👈 incrementos de 1 (ideal si tus números no son tan grandes)
                suggestedMax: Math.max(...values) + 1 // 👈 agrega espacio arriba
              }
            }]
          }
        }
      });
    });
}
// 🕒 Actualizar automáticamente cada X segundos
function actualizarGraficos() {
  cargarGraficoLibros();
}

document.addEventListener("DOMContentLoaded", () => {
  actualizarGraficos();
  setInterval(actualizarGraficos, 15000); // ⏳ cada 15 segundos
});