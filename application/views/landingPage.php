<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="<?= site_url();?>https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url(); ?>page/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url(); ?>page/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>page/css/bootstrap.min.css">
  <link href="<?= site_url();?>https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url(); ?>page/fontawesome/css/all.min.css">
  <!-- Style -->
  <link rel="stylesheet" href="<?= base_url(); ?>page/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>page/css/style2.css">

  <title>SMK ANTARTIKA 2</title>
</head>
<style>
  .texts {
    padding: 3%;
    background-color: rgba(255, 255, 255, 0.6);
    border-radius: 5%;
  }

  .texts:hover {
    background-color: rgb(255, 255, 255);
  }

  .modal-backdrop {
    z-index: -1;
  }
</style>

<body>


  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <header class="site-navbar" role="banner" style="z-index: 1;">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-11 col-xl-2">
          <h1 class="mb-0 site-logo"><a href="index.html" class="text-dark mb-0">Antartika 2</a></h1>
        </div>
        <div class="col-12 col-md-10 d-none d-xl-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="#about"><span>About</span></a></li>
              <li class="active">
                <button type="button" class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#loginModal">
                  Login
                </button>
              </li>
            </ul>
          </nav>
        </div>



        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#"
            class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

      </div>

    </div>
    </div>
    <div class="texts w-50" id="texts" style="margin:5% 0 0 40%;z-index: -9999;">
      <h3>Sarana & Prasarana</h3>
      <p class="text-dark">Sarana dan prasarana merupakan suatu alat atau bagian yang memiliki peran sangat penting bagi
        keberhasilan dan kelancaran suatu proses, termasuk juga dalam lingkup pendidikan. Sarana dan prasarana adalah
        fasilitas yang mutlak dipenuhi untuk memberikan kemudahan dalam menyelenggarakan suatu kegiatan walaupun belum
        bisa memenuhi sarana dan prasarana dengan semestinya.</p>
    </div>
  </header>

  <div class="hero" style="background-image: url('<?= base_url(); ?>page/images/background1.png');"></div>
  <footer class="footer-07" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 text-center">
          <h2 class="footer-heading"><span>SMK Antartika 2 Sidoarjo</span></h2>
          <p style="color:white;">Terwujudnya siswa dan siswi SMK Antartika Sidoarjo yang memiliki budi pekerti luhur,
          </p>
          <p style="color:white;">wawasan Imtaq dan Iptek, ketrampilan, jiwa berwirausaha dan mampu bersaing di Era
            Global.</p>
          <ul class="ftco-footer-social p-0">
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span
                  class="fa-brands fa-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span
                  class="fa-brands fa-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span
                  class="fa-brands fa-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-center">
          <p class="copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
            <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
              target="_blank">Colorlib.com</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-title text-center">
            <h4>Login</h4>
          </div>
          <div class="d-flex flex-column text-center">
            <form action="<?= base_url('auth/aksi');?>" method="POST">
              <div class="form-group">
                <input type="email" class="form-control" id="email1" name="email" placeholder="Your email address...">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password1" name="password" placeholder="Your password...">
              </div>
              <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
            </form>

            <div class="text-center text-muted delimiter">or use a social network</div>
            <div class="d-flex justify-content-center social-buttons">
              <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top"
                title="Twitter">
                <i class="fab fa-twitter"></i>
              </button>
              <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top"
                title="Facebook">
                <i class="fab fa-facebook"></i>
              </button>
              <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top"
                title="Linkedin">
                <i class="fab fa-linkedin"></i>
              </button>
              </di>
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
        </div>
      </div>
    </div>
    <script text="">
      if (window.innerWidth < 500) {
        document.getElementById("texts").style.display = "none";
      }
    </script>
    <script src="<?= base_url(); ?>page/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>page/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>page/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>page/js/jquery.sticky.js"></script>
    <script src="<?= base_url(); ?>page/js/main.js"></script>
    <script src="<?= base_url(); ?>page/js/main2.js"></script>
</body>

</html>