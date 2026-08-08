@extends('layouts.plant')

@section('content')

<div class="card">
    <div class="header">
        <h1>🌿 PlantAI</h1>
        <p>Informasi Tanaman Berbasis QR Code & AI</p>
    </div>

    <div class="content">
        <center>
            <h2>Selamat Datang 👋</h2>
            <p style="margin:15px 0;color:#666;">
                Scan QR Code pada tanaman untuk melihat informasi lengkap dan penjelasan AI.
            </p>

            <button id="scanButton"
            style="
            width:100%;
            padding:15px;
            background:#2E7D32;
            color:white;
            border:none;
            border-radius:12px;
            font-size:18px;
            cursor:pointer;
            ">
            📷 Scan QR
            </button>

            <br><br>

            <div id="reader" style="display:none;"></div>

            <br>
            <p style="color:#999;">atau</p>
            <br>

            <form action="{{ url('/plant') }}" method="GET" onsubmit="event.preventDefault(); window.location.href='/plant/' + document.getElementById('kodeInput').value;">
                <input
                id="kodeInput"
                name="kode"
                placeholder="Contoh : KKT001"
                required
                style="
                width:100%;
                padding:15px;
                border-radius:10px;
                border:1px solid #ddd;
                font-size:16px;
                ">

                <br><br>

                <button type="submit"
                style="
                width:100%;
                padding:15px;
                border:none;
                border-radius:12px;
                background:#66BB6A;
                color:white;
                font-size:17px;
                cursor:pointer;
                ">
                🔍 Cari Tanaman
                </button>
            </form>
        </center>
    </div>

    <div class="footer">
        © {{ date('Y') }} PlantAI
    </div>
</div>

<script>
document.getElementById("scanButton").addEventListener("click", async function () {
    document.getElementById("reader").style.display = "block";

    try {
        const cameras = await Html5Qrcode.getCameras();
        if (cameras && cameras.length) {
            const html5QrCode = new Html5Qrcode("reader");
            html5QrCode.start(
                cameras[cameras.length - 1].id,
                {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                function(decodedText){
                    html5QrCode.stop();
                    window.location.href = decodedText;
                },
                function(errorMessage){
                    // abaikan
                }
            );
        } else {
            alert("Tidak ada kamera yang ditemukan.");
        }
    } catch (err) {
        alert("Error : " + err);
        console.log(err);
    }
});
</script>

@endsection