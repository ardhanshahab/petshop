@extends('layouts.template')
@section('content')
<div class="container" style="width: 2500px; height: 500px;">
  <!-- carousel-->
  <div class="row">
    <div class="col">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="margin-bottom: 30px;">
        <div class="carousel-inner">
          @foreach($itemslide as $index => $slide )
          @if($index == 0)
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ \Storage::url($slide->foto) }}" alt="First slide">
          </div>
          @else
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ \Storage::url($slide->foto) }}" alt="Second slide">
          </div>
          @endif
          @endforeach   
        </div>
      </div>
    </div>
  </div>
  <!-- end carousel -->


  <!-- kategori -->
  <div class="card" style="padding: 20px; background-color: #5755FE; border:none;">
    <div class="bg-transparent">
      <h2 class="text-center" style="font-weight:bold; margin-bottom: 20px; ">Kategori Produk</h2>
      <div class="btn-group d-flex flex-wrap shadow-none mt-1 mt-lg-1 mt-md-1 mt-xl-1 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
        @foreach($itemkategori as $kategori)
        <a style="width: 150px; font-size: 13px; font-weight:bold; font-family: 'Poppins' sans-serif;" href="{{ URL::to('category/'.$kategori->slug_kategori) }}" class="btn mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
          {{ $kategori->nama_kategori }}</span>
        </a>
        @endforeach
      </div>
    </div>
  </div>
  <!-- end kategori -->


<!-- produk Promo-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-left" style="font-weight:bold;">Promo Hari Ini</h2>
    </div>
    @foreach($itempromo as $promo)
    <div class="col-md-4">
      <div class="card mb-4" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
          <a href="{{ URL::to('product/'.$promo->produk->slug_produk) }}">
          @if($promo->produk->foto != null)
            <img src="{{\Storage::url($promo->produk->foto) }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @else
            <img src="{{asset('images/bag.jpg') }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @endif
          </a>
        </div>
        <div class="card-body" style="border:none; background-color: #FF71CD;">
          <div class="row mt-4">
            <div class="col">
              <a class="text-decoration-none" style="color: black;">
                <p class="card-text h4">
                  <strong>{{ $promo->produk->nama_produk }}</strong>
                </p>
              </a>
            </div>
            <div class="col-auto">
              <p>
                <del>Rp. {{ number_format($promo->harga_awal, 2) }}</del><br />
                Rp. {{ number_format($promo->harga_akhir, 2) }}
              </p>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <a class="btn" href="{{ URL::to('product/'.$promo->produk->slug_produk) }}">
                Detail
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- end produk promo -->


  


  <!-- produk Terbaru-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4" >
      <h2 class="text-left" style="font-weight:bold; ">Produk</h2>
    </div>
    @foreach($itemproduk as $produk)
    <div class="col-md-4">
      <div class="card mb-4" style="box-shadow: 5px 6px 6px 2px #e9ecef; height: 400px;">
        <div style="height: 200px; max-width: 500px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
          <a href="{{ URL::to('product/'.$produk->slug_produk ) }}">
          @if($produk->foto != null)
            <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @else
            <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @endif
          </a>
        </div>
        <div class="card-body" style="border:none; background-color: #FF71CD;">
          <div class="row mt-4">
            <div class="col">  
              <a class="text-decoration-none" style="color: black;">
                <p class="card-text h4">
                <strong>{{ $produk->nama_produk }}</strong>
                </p>
              </a>
            </div>
            <div class="col-auto">
              <p>
                Rp. {{ number_format($produk->harga, 2) }}
              </p>
            </div>
          <div class="row mt-4">
            <div class="col">
              <a class="btn" href="{{ URL::to('product/'.$produk->slug_produk ) }}">
                Detail
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- end produk terbaru -->


</div>
@endsection