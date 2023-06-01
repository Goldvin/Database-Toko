<!-- Form section Start -->
<div class=" mx-auto bg-white dark:bg-gray-800 mt-12 p-8">
<h1 class="mx-auto pt-8 text-gray-800 dark:text-gray-200 text-center text-xl font-bold">Data Barang</h1>	
<form action="?id=barang.php" method="post" id="formbarang">
    <div class="grid gap-6 mb-6">
        <div>
            <label for="IDBarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">ID Barang</label>
            <input type="text" id="IDBarang" name="IDBarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ID Barang" required>
        </div>
    </div>
    <div class="mb-6">
            <label for="namaBarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Barang</label>
            <input type="text" id="namaBarang" name="namaBarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Barang" required> 
    </div> 
    <div class="mb-6">
            <label for="Harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harga</label>
            <input type="number" id="Harga" name="Harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required> 
    </div> 
    <button type="submit" form="formbarang" value="Kirim" name="Kirim" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
</div>
<!-- Form section End -->

<?php
$berkas = "assets/data/barang.json";
$dataBarang = array();
$dataJson = file_get_contents($berkas);
$dataBarang = json_decode($dataJson, true);
if(isset($_POST['Kirim'])){
    //Memasukkan data masing-masing item ke dalam array $item.
    //array_push($item, $_POST['nilai']);
    //Memasukkan data customer dari form ke dalam array $databaru.
    $dataBaru = array(
        'IDBarang' => $_POST['IDBarang'],
        'namaBarang' => $_POST['namaBarang'],
        'Harga' => $_POST['Harga'],
    );

    array_push($dataBarang,$dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam berkas. 
    
    //Mengkonversi kembali data nilai dari array PHP menjadi array Json dan menyimpannya ke dalam berkas.
    $dataJson = json_encode($dataBarang, JSON_PRETTY_PRINT);
    file_put_contents($berkas, $dataJson);

}
?>
<!-- Table section Start -->
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID Barang
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Barang
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
            </tr>
        </thead>
        <tbody>
<?php
	//	Perulangan untuk menampilkan data customer.
	//	Variabel $i adalah index data customer pada array $dataBarangomer.
	for ($i=0; $i < count($dataBarang); $i++){
		
		//	Memindahkan data dari dalam array $dataBarangomer ke variabel baru.
		//	$nama adalah data nama customer.
		//	$nohp adalah data nomor hp customer.
		//	$jeteleponKelamin adalah data jetelepon kelamin customer.
		//	$item adalah data berisi item dalam bentuk array berisikan item1, item2, dan item3.
		$IDBarang = $dataBarang[$i]['IDBarang']; // Contoh isi variabel: "Harry Pitter".
		$namaBarang = $dataBarang[$i]['namaBarang']; // Contoh isi variabel: "089977641321".
		$Harga = $dataBarang[$i]['Harga'];
?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $dataBarang[$i]['IDBarang']; ?>
                </th>
                <td class="px-6 py-4"><?php echo $dataBarang[$i]['namaBarang']; ?></td>
                <td class="px-6 py-4"><?php echo $dataBarang[$i]['Harga']; ?></td>
            </tr>
        </tbody>
   <?php }
?>
    </table>
</div>

<!-- Table section End -->