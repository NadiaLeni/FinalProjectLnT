<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
    <h1>LnT Final Project</h1>
    <div id="hero">
        
        <div class="kotak">
            <div class="tulisan">
                <h2 id="tulisan1">Masukkan Data Barang</h2>
                <br>
                <form action="{{route('storeProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="satu">
                        <label for="name">Nama Barang</label>
                        <br>
                        <input type="text" id="name" name="name">
                        @error('name')
                        <label for="">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="dua">
                        <label for="price">Harga Barang</label>
                        <br>
                        <input type="text" id="price" name="price">
                    </div>
                    <div class="tiga">
                        <label for="amount">Jumlah Barang</label>
                        <br>
                        <input type="number" id="amount" name="amount">
                    </div>
                    <div class="empat">
                        <label for="picture">Gambar</label>
                        <br>
                        <input type="file" id="picture" name="picture">
                        @error('picture')
                        <label for="">{{$message}}</label>
                        @enderror
                    </div>
                    <input type="submit" class="tombol" value="SUBMIT">
                    <a class="tombol2" href="/dashboard">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>