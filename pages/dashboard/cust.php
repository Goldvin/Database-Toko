<!-- Form section Start -->
<div class=" mx-auto bg-white dark:bg-gray-800 p-8">
<h1 class="mx-auto pt-8 text-gray-800 dark:text-gray-200 text-center text-xl font-bold">Data Customer</h1>	
<form action="?id=cust.php" method="post" id="formcust">
    <div class="grid gap-6 mb-6">
        <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
            <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="M Goldvin W" required>
        </div>
    </div>
    <div class="mb-6">
            <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor Telepon</label>
            <input type="number" id="telepon" name="telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="085217882244" required> 
    </div> 
    <div class="mb-6">
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bekasi"required> 
    </div> 
    <button type="submit" form="formcust" value="Kirim" name="Kirim" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
</div>
<!-- Form section End -->

<?php
$berkas = "assets/data/cust.json";
$dataCust = array();
$dataJson = file_get_contents($berkas);
$dataCust = json_decode($dataJson, true);
if(isset($_POST['Kirim'])){
    //Memasukkan data masing-masing item ke dalam array $item.
    //array_push($item, $_POST['nilai']);
    //Memasukkan data customer dari form ke dalam array $databaru.
    $dataBaru = array(
        'nama' => $_POST['nama'],
        'telepon' => $_POST['telepon'],
        'alamat' => $_POST['alamat'],
    );

    array_push($dataCust,$dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam berkas. 
    
    //Mengkonversi kembali data nilai dari array PHP menjadi array Json dan menyimpannya ke dalam berkas.
    $dataJson = json_encode($dataCust, JSON_PRETTY_PRINT);
    file_put_contents($berkas, $dataJson);

}
?>
<!-- Table section Start -->
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                Nama
                </th>
                <th scope="col" class="px-6 py-3">
                Nomor Telepon
                </th>
                <th scope="col" class="px-6 py-3">
                Alamat
                </th>
            </tr>
        </thead>
        <tbody>
<?php
	//	Perulangan untuk menampilkan data customer.
	//	Variabel $i adalah index data customer pada array $dataCustomer.
	for ($i=0; $i < count($dataCust); $i++){
		
		//	Memindahkan data dari dalam array $dataCustomer ke variabel baru.
		//	$nama adalah data nama customer.
		//	$nohp adalah data nomor hp customer.
		//	$jeteleponKelamin adalah data jetelepon kelamin customer.
		//	$item adalah data berisi item dalam bentuk array berisikan item1, item2, dan item3.
		$nama = $dataCust[$i]['nama']; // Contoh isi variabel: "Harry Pitter".
		$telepon = $dataCust[$i]['telepon']; // Contoh isi variabel: "089977641321".
		$alamat = $dataCust[$i]['alamat'];
?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $dataCust[$i]['nama']; ?>
                </th>
                <td class="px-6 py-4"><?php echo $dataCust[$i]['telepon']; ?></td>
                <td class="px-6 py-4"><?php echo $dataCust[$i]['alamat']; ?></td>
            </tr>
        </tbody>
   <?php }
?>
    </table>
</div>

<!-- Table section End -->