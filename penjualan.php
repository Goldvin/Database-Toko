<?php
include 'pages/dashboard/navSeller.php';
?>
<!-- Form section Start -->
<div class=" mx-auto bg-white dark:bg-gray-800 mt-12 p-8">
<h1 class="mx-auto pt-8 text-gray-800 dark:text-gray-200 text-center text-xl font-bold">Data Penjualan</h1>	
<form action="?id=cust.php" method="post" id="formcust">
    <div class="grid gap-6 mb-6">
        <div>
            <label for="namaCustomer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Customer</label>
            <input type="text" id="namaCustomer" name="namaCustomer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="M Goldvin W" required>
        </div>
    </div>
    <div class="mb-6">
            <label for="NamaBarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Barang</label>
            <input type="text" id="NamaBarang" name="NamaBarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Barang" required> 
    </div> 
    <div class="mb-6">
            <label for="Harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harga</label>
            <input type="number" id="Harga" name="Harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required> 
    </div>
    <div class="mb-6">
            <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">qty</label>
            <input type="number" id="qty" name="qty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required> 
    </div>
    <button type="submit" form="formcust" value="Kirim" name="Kirim" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
</div>
<!-- Form section End -->


<?php

function jumlah($Harga, $qty) {
    $total = $Harga * $qty;
    return $total;
}

$berkas = "assets/data/penjualan.json";
$dataPenjualan = array();
$dataJson = file_get_contents($berkas);
$dataPenjualan = json_decode($dataJson, true);
if(isset($_POST['Kirim'])){
    //Memasukkan data masing-masing item ke dalam array $item.
    //array_push($item, $_POST['nilai']);
    //Memasukkan data customer dari form ke dalam array $databaru.
    $total_harga = jumlah($_POST['Harga'], $_POST['qty']);
    $dataBaru = array(
        'namaCustomer' => $_POST['namaCustomer'],
        'NamaBarang' => $_POST['NamaBarang'],
        'Harga' => $_POST['Harga'],
        'qty' => $_POST['qty'],
        'total_harga' => $total_harga,
    );

    array_push($dataPenjualan,$dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam berkas. 
    
    //Mengkonversi kembali data nilai dari array PHP menjadi array Json dan menyimpannya ke dalam berkas.
    $dataJson = json_encode($dataPenjualan, JSON_PRETTY_PRINT);
    file_put_contents($berkas, $dataJson);

}
?>
<!-- Table section Start -->
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                Nama Customer
                </th>
                <th scope="col" class="px-6 py-3">
                Nama Barang
                </th>
                <th scope="col" class="px-6 py-3">
                Harga
                </th>
                <th scope="col" class="px-6 py-3">
                qty
                </th>
                <th scope="col" class="px-6 py-3">
                Jumlah
                </th>
            </tr>
        </thead>
        <tbody>
<?php
	//	Perulangan untuk menampilkan data customer.
	//	Variabel $i adalah index data customer pada array $dataPenjualanomer.
	for ($i=0; $i < count($dataPenjualan); $i++){
		
		//	Memindahkan data dari dalam array $dataPenjualanomer ke variabel baru.
		//	$nama adalah data nama customer.
		//	$nohp adalah data nomor hp customer.
		//	$jeteleponKelamin adalah data jetelepon kelamin customer.
		//	$item adalah data berisi item dalam bentuk array berisikan item1, item2, dan item3.
		$namaCustomer = $dataPenjualan[$i]['namaCustomer']; // Contoh isi variabel: "Harry Pitter".
		$NamaBarang = $dataPenjualan[$i]['NamaBarang']; // Contoh isi variabel: "089977641321".
		$Harga = $dataPenjualan[$i]['Harga'];
        $qty = $dataPenjualan[$i]['qty'];
        $total_harga = $dataPenjualan[$i]['total_harga'];
?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $dataPenjualan[$i]['namaCustomer']; ?>
                </th>
                <td class="px-6 py-4"><?php echo $dataPenjualan[$i]['NamaBarang']; ?></td>
                <td class="px-6 py-4"><?php echo $dataPenjualan[$i]['Harga']; ?></td>
                <td class="px-6 py-4"><?php echo $dataPenjualan[$i]['qty']; ?></td>
                <td class="px-6 py-4"><?php echo $dataPenjualan[$i]['total_harga']; ?></td>
            </tr>
        </tbody>
   <?php }
?>
    </table>
</div>

<!-- Table section End -->
<?php
include 'pages/landing/footer.php';
?>