// Fungsi untuk memperbarui kartu skor
function updateScoreCards(data, datel) {
    // Filter data berdasarkan DATEL jika ada yang dipilih
    const filteredData = datel ? data.filter(item => item.DATEL === datel) : data;

    // Hitung total WO
    const totalWO = filteredData.reduce((sum, item) => sum + (item['ALL WO'] || 0), 0);
    document.getElementById('total-wo').innerText = totalWO.toLocaleString('en-US');
}

// Ambil data WO dari server
fetch('json/dashboard.json')
    .then(response => response.json())
    .then(data => {
        window.woData = data;
        
        // Tampilkan total keseluruhan saat pertama kali memuat data
        updateScoreCards(data, null);

        // Tangani seleksi DATEL
        document.getElementById('datel-select').addEventListener('change', event => {
            const datel = event.target.value;
            updateScoreCards(window.woData, datel);
        });
    })
    .catch(error => {
        console.error('Error fetching the WO data:', error);
    });
