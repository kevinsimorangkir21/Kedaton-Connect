document.addEventListener('DOMContentLoaded', function() {
    fetch('json/dashboard.json')
        .then((response) => response.json())
        .then((data) => {
            console.log("Data fetched:", data); // Debugging line
            window.jumlahData = data;
            createPieCharts();
        })
        .catch((error) => console.error("Error fetching data:", error)); // Debugging line
});

function createPieCharts() {
    const datels = ["METRO AREA", "INNER AREA", "PRINGSEWU AREA"];
    const colors = [
        '#4e79a7', '#f28e2b', '#e15759', '#76b7b2', '#59a14f',
        '#edc949', '#af7aa1', '#ff9da7', '#9c755f', '#bab0ac'
    ];

    datels.forEach((datel, index) => {
        const filteredData = window.jumlahData.filter(entry => entry.DATEL === datel && parseInt(entry['WO HI']) > 0);
        const stoCounts = {};

        filteredData.forEach(entry => {
            if (entry.STO in stoCounts) {
                stoCounts[entry.STO] += parseInt(entry['WO HI']);
            } else {
                stoCounts[entry.STO] = parseInt(entry['WO HI']);
            }
        });

        console.log(`STO Counts for ${datel}:`, stoCounts); // Debugging line

        const canvasId = `piechart-${datel.toLowerCase().replace(/\s/g, '-')}`;
        const ctx = document.getElementById(canvasId)?.getContext('2d');
        
        if (ctx) {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(stoCounts),
                    datasets: [{
                        label: `Jumlah WO HI di ${datel}`,
                        data: Object.values(stoCounts),
                        backgroundColor: colors.slice(0, Object.keys(stoCounts).length),
                        borderColor: colors.slice(0, Object.keys(stoCounts).length),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                boxWidth: 12,
                            }
                        },
                        datalabels: {
                            color: '#fff', // Warna teks label
                            formatter: (value, context) => {
                                const total = context.chart.getDatasetMeta(0).total;
                                const percentage = ((value / total) * 100).toFixed(2) + '%';
                                return percentage;
                            },
                            font: {
                                weight: 'bold',
                                size: 14
                            },
                            anchor: 'end',
                            align: 'start'
                        }
                    }
                },
            });
        } else {
            console.error(`Canvas element for ${datel} not found!`); // Debugging line
        }
    });
}

// Menangani upload file JSON baru untuk Pie Charts
document.getElementById('upload-dashboard-form').addEventListener('submit', function(e) {
    e.preventDefault();

    var fileInput = document.getElementById('dashboardFile');
    var file = fileInput.files[0];

    if (file.name !== 'dashboard.json') {
        alert('Hanya file dengan nama "dashboard.json" yang diizinkan.');
        return;
    }

    var formData = new FormData();
    formData.append('dashboardFile', file);

    fetch('/upload-dashboard', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.message.includes('berhasil')) {
            fetch('json/dashboard.json')
                .then(response => response.json())
                .then(data => {
                    window.jumlahData = data;
                    createPieCharts(); // Panggil ulang fungsi untuk refresh chart
                });
        }
    })
    .catch(error => console.error('Error:', error));
});
