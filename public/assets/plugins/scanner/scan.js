let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

scanner.addListener('scan', function (content) {
    try {
        // Parse the scanned QR code data as a JSON object.
        const data = JSON.parse(content);

        // Extract the id and name values from the JSON data.
        const id = data.id;
        const jenis = data.jenis;
        const ukuran = data.ukuran;
        const stock = data.stock;

        // Display the id and name values in separate text fields.
        document.getElementById('qr-code-id').value = id;
        document.getElementById('qr-code-jenis').value = jenis;
        document.getElementById('qr-code-ukuran').value = ukuran;
        document.getElementById('qr-code-stock').value = stock;

        // Hide the canvas element after a successful scan.
        const vidio = document.getElementById('preview');
        vidio.style.display = 'none';
    } catch (error) {
        console.error(error);
    }

    // Stop the scanner after the first successful scan.
    scanner.stop();
});

document.getElementById('scan-button').addEventListener('click', function () {
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
});