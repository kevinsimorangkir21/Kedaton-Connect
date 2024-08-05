document.addEventListener('DOMContentLoaded', function() {
    fetch('json/hsi2024.json')
        .then((response) => response.json())
        .then((data) => {
            window.propertyData = data;
            $('#data-tabel').DataTable({
                data: window.propertyData,
                responsive: true,
                scrollX: true,
                scrollY: 600,
                lengthMenu: [[15, 20, 50, 100], [15, 20, 50, 100]],
                columns: [
                    { data: 'BULAN' },
                    { data: 'NAMA' },
                    { data: 'STO' },
                    { data: 'KETERANGAN' },
                    { data: 'MITRA' },
                    { data: 'AREA' }
                ]
            });
        })
        
});
