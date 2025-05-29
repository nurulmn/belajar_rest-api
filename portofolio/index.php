<?php
  function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);

}
//API channel youtube 1
$result= get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,contentDetails,statistics&id=UCpBSzHBGmk49b4IoCtoLdqw&key=AIzaSyClG3lAz9srB9iYN2YwmHguhW_w1Pk6vG0');


$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//video terakhir ini menggunakan (order date)
$urlLatestvideo = ('https://www.googleapis.com/youtube/v3/search?key=AIzaSyClG3lAz9srB9iYN2YwmHguhW_w1Pk6vG0&channelId=UCpBSzHBGmk49b4IoCtoLdqw&maxResults=1&order=date&part=snippet');
$result = get_CURL($urlLatestvideo);
$latestVideoId = $result['items'][0]['id']['videoId'];

//API channel youtube 2
$result= get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,contentDetails,statistics&id=UCpwy6d0JDCNn5Vf9WB1LkDw&key=AIzaSyClG3lAz9srB9iYN2YwmHguhW_w1Pk6vG0');


$youtubeProfilePic2 = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName2 = $result['items'][0]['snippet']['title'];
$subscribers = $result['items'][0]['statistics']['subscriberCount'];

$urlLatestvideo2 = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyClG3lAz9srB9iYN2YwmHguhW_w1Pk6vG0&channelId=UCpwy6d0JDCNn5Vf9WB1LkDw&maxResults=1&order=date&part=snippet&type=video';
$result = get_CURL($urlLatestvideo2);
$latestVideoId2 = $result['items'][0]['id']['videoId'];



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">My Portofolio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Project</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profile1.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Nurul Masya Nabila</h1>
          <h3 class="lead">Student of System Information</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
    <div class="container">
      <div class="row mb-4">
        <div class="col text-center">
          <h2>About</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5">
          <p style="text-align: justify;">
            Saya adalah mahasiswa Sistem Informasi di UIN Imam Bonjol Padang yang memiliki ketertarikan dalam bidang pengembangan aplikasi dan analisis data. Sejak awal kuliah, saya aktif mempelajari berbagai teknologi web, database, serta konsep-konsep integrasi sistem yang dapat diterapkan dalam pengembangan aplikasi berbasis kebutuhan pengguna. Saya juga terus mengasah kemampuan dalam pemrograman dan logika sistem untuk mempersiapkan diri menghadapi tantangan di dunia kerja.
          </p>
        </div>
        <div class="col-md-5">
          <p style="text-align: justify;">
            Saat ini saya sedang mengerjakan sebuah proyek aplikasi berbasis API sebagai bagian dari tugas akhir mata kuliah Integrasi Aplikasi Perusahaan. Proyek ini saya buat untuk menerapkan pemahaman saya dalam menghubungkan sistem dengan sumber data eksternal (seperti API dari IMDb) serta menyajikannya dalam antarmuka yang informatif dan mudah digunakan. Saya berharap proyek ini dapat menjadi salah satu portofolio yang mencerminkan perkembangan keterampilan teknis saya di bidang pengembangan aplikasi.
          </p>
        </div>
        </div>
      </div>
    </section>


    
   <!-- Youtube -->
  
<section class="social bg-light" id="social">
  <div class="container">
    <!-- Judul -->
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Video Playlist</h2>
      </div>
    </div>

    <!-- Konten Utama: YouTube 1 dan YouTube 2 -->
    <div class="row justify-content-center">
      
      <!-- YouTube 1 -->
      <div class="col-md-5 mb-4">
        <div class="row mb-3">
          <div class="col-md-4 text-center">
            <img src="<?= $youtubeProfilePic; ?>" width="100" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8 d-flex flex-column justify-content-center">
            <h5><?= $channelName; ?></h5>
            <p><?= $subscriber; ?> Subscribers</p>
            <div class="g-ytsubscribe" data-channelid="UCpBSzHBGmk49b4IoCtoLdqw" data-layout="default" data-count="default"></div>
          </div>
        </div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId ?>?rel=0" allowfullscreen></iframe>
        </div>
      </div>

      <!-- YouTube 2 -->
      <div class="col-md-5 mb-4">
        <div class="row mb-3">
          <div class="col-md-4 text-center">
            <img src="<?= $youtubeProfilePic2; ?>" width="100" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8 d-flex flex-column justify-content-center">
            <h5><?= $channelName2; ?></h5>
            <p><?= $subscribers; ?> Subscribers</p>
            <div class="g-ytsubscribe" data-channelid="UCpwy6d0JDCNn5Vf9WB1LkDw" data-layout="default" data-count="default"></div>
          </div>
        </div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId2 ?>?rel=0" allowfullscreen></iframe>
        </div>
      </div>

    </div>
  </div>
</section>





    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Project</h2>
          </div>
        </div>
        <div class="row">

        
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/projekPizza.png" alt="Card image cap">
             <div class="card-body text-center">
             <p class="card-text">
               Projek ini menampilkan menu pizza sesuai kategori dengan mengambil data dari json untuk ditampilkan.
            </p>
            <a href="http://localhost/REST-API/wpu-hut/latihan2.html" target="_blank" class="btn btn-secondary">
              Projek Pizza
            </a>
             </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/projekRestClient.png" alt="Card image cap">
             <div class="card-body text-center">
             <p class="card-text">
               Project REST Client ini adalah aplikasi web CodeIgniter yang menampilkan data mahasiswa melalui konsumsi REST API menggunakan GuzzleHttp.
            </p>
            <a href="http://localhost/REST-API/wpu-rest-client/mahasiswa" target="_blank" class="btn btn-secondary">
              Projek Rest Client
            </a>
             </div>
            </div>
          </div>

         <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/projekMovie.png" alt="Card image cap">
          <div class="card-body text-center">
            <p class="card-text">
               Projek ini menggunakan API IMDb untuk menampilkan film berdasarkan pencarian dan dapat melihat detail lengkapnya.
            </p>
            <a href="http://localhost/REST-API/wpu-movie/index.html" target="_blank" class="btn btn-secondary">
              Projek API Movie
            </a>
          </div>
          </div>
         </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact  bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Jl. Setiabudhi No. 193, Bandung</li>
              <li class="list-group-item">West Java, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>