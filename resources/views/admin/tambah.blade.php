@extends('layout.main')
@include('partial.navbar')
<style>
  #image_preview {
            display: none;
        }
</style>
<div class="w-full flex flex-row min-h-screen">
    <div class="w-1/4">
        @include('components.adminpanel')
    </div>
    <div class="w-3/4 flex content-center flex-col items-center py-20">
        <div class="mb-10 w-full"><h1 class="font-bold text-white text-2xl">Tambah Produk</h1></div>
        {{-- container input  --}}
        <form class="mb-4 w-full grid grid-cols-2 gap-8 pr-20">
            {{-- input nama  --}}
            <div class="w-full mb-8">
              <h2 class="text-[#FE5F55] font-bold text-xl mb-2 ">
                Nama
              </h2>
              <input type="text" class="w-full auto p-3 rounded-md font-semibold" placeholder="Nama Produk">
            </div>
            {{-- input harga --}}
            <div class="w-full mb-8">
              <h2 class="text-[#FE5F55] font-bold text-xl mb-2">
                Harga
              </h2>
              <input type="text" class="w-full auto p-3 rounded-md font-semibold" id="rupiah_input" type="text" placeholder="Rp" oninput="formatRupiah(this)">
            </div>
            {{-- input deskripsi --}}
            <div class="w-full">
              <h2 class="text-[#FE5F55] font-bold text-xl mb-2">
                Deskripsi
              </h2>
              <textarea name="" id="" cols="30" rows="10" class="w-full auto p-3 rounded-md font-semibold" placeholder="Deskripsi Produk"></textarea>
            </div>
            {{-- input stok --}}
            <div class="w-full">
              <h2 class="text-[#FE5F55] font-bold text-xl mb-2">
                Stok
              </h2>
              <input type="number" class="w-full auto p-3 rounded-md font-semibold" placeholder="Jumlah Stok Produk">
            </div>
            {{-- input gambar --}}
            <div class="w-full">
              <input class="block w-full text-sm" id="file_input" type="file" accept="image/*" onchange="previewImage(event)">
              <img id="image_preview" class="w-1/2 rounded-lg"/>
              <button class="text-[#FE5F55] font-bold text-xl mb-2 mt-6 py-1 px-4 rounded-md bg-white">
                Tambah Produk +
              </button>
            </div>
        </form>
      
    </div>
</div>
<script>
  function previewImage(event) {
      const input = event.target;
      const reader = new FileReader();
      reader.onload = function(){
          const imagePreview = document.getElementById('image_preview');
          imagePreview.src = reader.result;
          imagePreview.style.display = 'block';
          input.style.display = 'none';
      };
      reader.readAsDataURL(input.files[0]);
  }
  function formatRupiah(input) {
            let value = input.value.replace(/[^,\d]/g, '').toString();
            let split = value.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            input.value = 'Rp' + (rupiah ? ' ' + rupiah : '');
        }
</script>
@include('partial.footer')