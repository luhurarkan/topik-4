<!DOCTYPE html>
<html>
<head>
  <title>MODUL 3</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="hold-transition register-page">
  <div class="register-box" style="width:400px">
     <div class="register-logo">
     </div>

      
      
  <div class="box box-info">
      
      <?php
		
	if(isset($_POST['submit1'])){ //mengeksekusi button enkripsi 
            function Cipher($ch, $key)
            { //menampung data yang telah di input
                if (!ctype_alpha($ch))//cek alphabet
                        return $ch;

                $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset); //konversi char yang diinput ke ASCII dan perhitangan modulus dengan  jumlah alphabet=26
            }

            function Encipher($input, $key)
            { //menampung data yang telah di input
                $output = "";

                $inputArr = str_split($input);
                foreach ($inputArr as $ch) //perulangan untuk menampilkan data array
                        $output .= Cipher($ch, $key); //hasil function cipher

                return $output; //mengembalikan nilai
            }

            function Decipher($input, $key)
            {
                    return Encipher($input, 26 - $key); //mengembalikan nilai fungsi enkripsi
            }
            
            
        }else if(isset($_POST['submit2'])){ //mengeksekusi button deskripsi
            function Cipher($ch, $key)
            { //menampung data yang telah di input
                if (!ctype_alpha($ch)) //cek alphabet
                        return $ch;

                $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset); //konversi char yang diinput ke ASCII dan perhitangan modulus dengan  jumlah alphabet=26
            }

            function Encipher($input, $key)
            { //menampung data yang telah di input
                $output = "";

                $inputArr = str_split($input);
                foreach ($inputArr as $ch)  //perulangan untuk menampilkan data array
                        $output .= Cipher($ch, $key); //hasil function cipher

                return $output; //mengembalikan nilai
            }

            function Decipher($input, $key)
            {
                    return Encipher($input, 26 - $key); //mengembalikan nilai fungsi enkripsi
            }
        }
        ?>
      
    <br>
    <p class="login-box-msg" style="font-size:20px !important"><b></b></p>    
            <form name="enkripsi" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>MASUKKAN TEKS</label> <!--Form input text-->
                  <textarea name="plain" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" 
                               oninput="setCustomValidity('')" type="text" class="form-control" rows="2" placeholder="Isikan teks disini"></textarea>            
                </div>
                <div class="form-group">
                  <label>MASUKKAN KEY</label> <!-- Form input key -->
                  <input title="Pilih Key." required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" 
                               oninput="setCustomValidity('')" type="number" class="form-control" name="metode" placeholder="Masukan Key">
                </div>
                
                </div>
              
              <div class="box-footer">
                  <table class="table table-stripped">
                      <tr>
                          <td><input type="submit" name="submit1" value="Enkripsi" style="width: 100%"></td> <!-- button enkripsi -->
                          <td><input type="submit" name="submit2" value="Dekripsi" style="width: 100%"></td> <!-- button deskripsi -->
                      </tr>
                  </table>
              </div>
            </form>
              <div class="box-body">  <!-- Menampilkan hasil output dari enkripsi/dekripsi -->
                  <label>Hasil Enkripsi / Deskripsi  =</label>  <!-- Hasil enkripsi/dekripsi -->
                  <table class="table table-bordered"  >
                      <tr>
                          <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo Encipher($_POST['plain'], $_POST['metode']);} 
                          if (isset($_POST['submit2'])){ echo Decipher($_POST['plain'], $_POST['metode']);}?></b></td>
                      </tr>
                  </table>
                  <label>PLAINTEXT =</label> <!-- menampilkan text asli -->
                  <table class="table table-bordered">
                      <tr>
                          <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo Decipher(Encipher($_POST['plain'], $_POST['metode']),$_POST['metode']);} 
                          if (isset($_POST['submit2'])){ echo Encipher(Decipher($_POST['plain'], $_POST['metode']),$_POST['metode']);}?></b></td>
                      </tr>
                  </table>
                  <label>KEY =</label>
                  <table class="table table-bordered">
                      <tr>
                          <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo $_POST['metode'];} //memanggil dan menampilkan key atau kunci geser unruk enkripsi
                          if (isset($_POST['submit2'])){ echo $_POST['metode'];}?></b></td> <!--memanggil dan menampilkan key atau kunci geser-->
                      </tr>
                  </table>
      <br>
      <br>
                </div>
        </div>        
</div>    
</script>
</body>
</html>
