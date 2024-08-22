// Fungsi untuk mengonversi CSV ke JSON
function csvToJson(csvText) {
    const lines = csvText.split('\n');
    const headers = lines[0].split(',');

    const result = lines.slice(1).map(line => {
        const values = line.split(',');
        let obj = {};
        headers.forEach((header, index) => {
            obj[header.trim()] = values[index].trim();
        });
        return obj;
    });

    return result;
}

// Fungsi untuk memperbarui kartu skor
function updateScoreCards(data, branch) {
    // Filter data berdasarkan BRANCH jika ada yang dipilih
    const filteredData = branch ? data.filter(item => item.BRANCH === branch) : data;

    // Hitung total WO
    const totalWO = filteredData.reduce((sum, item) => sum + (parseInt(item['ALL WO']) || 0), 0);
    document.getElementById('total-wo').innerText = totalWO.toLocaleString('en-US');
}

// Ambil data WO dari CSV
fetch('csv/dashboard.csv')
    .then(response => response.text())
    .then(csvText => {
        const data = csvToJson(csvText);
        window.woData = data;

        // Tampilkan total keseluruhan saat pertama kali memuat data
        updateScoreCards(data, null);

        // Tangani seleksi BRANCH
        document.getElementById('branch-select').addEventListener('change', event => {
            const branch = event.target.value;
            updateScoreCards(window.woData, branch);
        });
    })
    .catch(error => {
        console.error('Error fetching the WO data:', error);
    });
