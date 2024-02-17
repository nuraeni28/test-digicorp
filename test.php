<?php

//nomor 1 

$tokens = [];

function generateToken($user){
    global $tokens;

    $token = uniqid();

    if(!isset($tokens[$user])){
        $tokens[$user] = [];
    }

    array_push($tokens[$user], $token);

    if(count($tokens[$user])>10){
        array_diff($tokens[$user]);
    }
    return $token;
}

function verifyToken($user, $token){
    global $tokens;
    if(isset($tokens[$user])){
        return in_array($token, $tokens[$user]);
    }
    return false;

}
$user = 'nuraeni';

//membuat perulangan 10 x generate token

for($i=0; $i<10;$i++ ){
    $token = generateToken($user);
    // echo "Generated token $i : $token\n";
}

//nomor 2

class Nilai{
    public $mapel;
    public $nilai;

    public function __construct($mapel, $nilai){
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
}

class Siswa{    
    public $nrp;
    public $nama;
    public $daftarNilai = [null, null, null]; //panjang array 3

    public function __construct($nrp, $nama){
        $this->nrp = $nrp;
        $this->nama = $nama;
    
    }}

    //buat siswa baru dan set mapel inggris menjadi 100

    $siswaBaru = new Siswa(42519044, 'Nuraeni');
    $siswaBaru->daftarNilai[0] = new Nilai("Inggris", 100);

//   var_dump ($siswaBaru);

    //generate 10 siswa dengan nama random

    function generateRandomName($length = 10){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS';
        $randomName = '';

        for($i=0;$i<$length; $i++){
            $randomName .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randomName;
    }

    function generateRandomScore(){
        return rand(0,100);
    }

    function generateRandomStudents(){
        $students = [];

        for($i=0;$i<10; $i++){
            $nama = generateRandomName();
            $nrp =  $i;
            $siswa = new Siswa ($nrp, $nama);

            for($j=0;$j<3;$j++){
                $mapel = ['Inggris', 'Indonesia', 'Jepang'][rand(0,2)];
                $nilai = generateRandomScore();
                $siswa->daftarNilai[$j] = new Nilai($mapel, $nilai);
            }
            $students[] = $siswa;


        }
        return $students;
    }


$siswaBaruRandom = generateRandomStudents();

// var_dump($siswaBaruRandom);


//nomor 3

class trafficLight{
    private $currentIndex;
    private $signal;

    public function __construct(){
        $this->currentIndex = 0;
        $this->signal = ["merah", "kuning", "hijau"];
    
    }
    
    public function getSignal(){
        $signal = $this->signal[$this->currentIndex];
        $this->currentIndex = ($this->currentIndex +1) %count($this->signal); //memastikan bahwa untuk perulangan traffic light harus sesuai index signal yaitu 3
        return $signal;

        }
    }
$trafficLight = new trafficLight();

for($i=0;$i<5;$i++){
    // echo $trafficLight->getSignal() . "\n";
}

//nomor 4

function getSecondValue($array){
  arsort($array);

    return $array[1]; //terbesar kedua
}
$numbers = [rand(1,100),rand(1,100),rand(1,100),rand(1,100),rand(1,100)];

// var_dump($numbers);
// echo 'Nilai terbesar kedua dari array : '. getSecondValue($numbers);

//nomor 5

function countCharacter($char){
    $char = strtolower($char);

    $characters = str_split($char);

    $countChar = array_count_values($characters); //hitung kemunculan character

    $maxChar = '';
    $maxCount= 0;

    foreach($countChar as $char => $c){
        if($c>$maxCount){
            $maxCount = $c;
            $maxChar = $char;
        }

        return "$maxChar $maxCount".  "x";

    }



}

    $nama = 'Nuraenineni';
    
    echo countCharacter($nama);






?>
