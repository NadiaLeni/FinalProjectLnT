<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Kategori Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">harga Barang</th>
      <th scope="col">Kuantitas Barang</th>
      <th scope="col">Alamat Pengiriman</th>
      <!-- <th scope="col">Foto Barang</th> -->
    </tr>
  </thead>
  <tbody>
      @foreach ($Faktur as $Faktur)
      <tr>
        <th scope="row"><a href="{{route('ShowFaktur', $Faktur->id)}}">{{$Faktur->KategoriBarang}}</a></th>
        <td>{{$Faktur->HargaBarang}}</td></td>
        <td>{{$Faktur->NamaBarang}}</td>
        <td>{{$Faktur->KuantitasBarang}}</td>
        <td>{{$Faktur->AlamatPengiriman}}</td>

        <td>
          <a class="btn btn-primary" href="{{route('formUpdateFaktur', $Faktur->id)}}" role="button">update</a>
          <form action="{{route('DeleteFaktur', $Faktur->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">delete</button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
    </table>
    <a href="" >back</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>