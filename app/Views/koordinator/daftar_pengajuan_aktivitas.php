<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?php (session()->get('level') == "koordinator")? "/koordinator/daftar_staf" : "/login"; ?>">my-Activity</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li class="nav-item">
              <a class="nav-link active" href="/koordinator/daftar_staf">Daftar Staf</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/koordinator/daftar_pengajuan_aktivitas">Daftar Pengajuan Aktivitas</a>
            </li>
          </ul>
          <ul class="navbar-nav d-none d-lg-flex ml-2 order-3">
            <li class="nav-item">
              Hai, <?= session()->get("nama"); ?> !
            </li>
            <li class="nav-item">
              <form action="/logout" method="post">
                <input type="submit" class="btn btn-danger btn-sm ms-3" value="Logout">
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <main id="main" class="site-main main">
      <section class="section">
        <div class="container">
          <div class="row">
            <div class="container container--mini">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="mt-3"><?= $daftar_pengajuan_title; ?></h4>
                  <hr>
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Deskripsi</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                          foreach ($activity as $act) :
                        ?>
                      
                          <tr>
                            <td><?= $no++; ?></td>
                            <td style="width: 20%">
                            <?php
                            if ($act['status'] == 3) {
                              echo "<p class='text-decoration-line-through'>".$act['nama']."</p>";
                            } else {
                              echo $act['nama'];
                            }
                            ?>
                            </td>
                            <td style="width: 40%">
                              <?= $act['deskripsi']; ?>
                            </td>
                            <td style="width: 20%">
                             <?php if($act['status'] == -1) {
                                echo "<span class='badge rounded-pill bg-danger'>Aktivitas Tidak Disetujui</span>";
                              } else if($act['status'] == 0) {
                                echo "<span class='badge rounded-pill bg-dark'>Aktivitas Belum Disetujui</span>";
                              } else if($act['status'] == 1) {
                                echo "<span class='badge rounded-pill bg-success'>Aktivitas Sudah Disetujui</span>";
                              }  else if ($act['status'] == 2) {
                                  echo "<span class='badge rounded-pill bg-warning'>Aktivitas Belum Selesai</span>";
                                }else if ($act['status'] == 3) {
                                  echo "<span class='badge rounded-pill bg-primary'>Aktivitas Sudah Selesai</span>";
                              }
                              ?>
                            </td>
                            <td>
                              <?php if($act['status'] == -1) {
                              } else if($act['status'] == 0) {
                                echo "
                                <form action='/koordinator/setuju' method='post'>
                                  <input type='hidden' name='id' value='$act[id]'>
                                  <input class='btn btn-primary btn-sm' type='submit' value='Setuju'>
                                </form>
                                <form action='/koordinator/tolak' method='post'>
                                  <input type='hidden' name='id' value='$act[id]'>
                                  <input class='btn btn-danger btn-sm' type='submit' value='Tolak'>
                                </form>
                                ";
                              } else if($act['status'] == 1) {
                              }  else if ($act['status'] == 2) {
                              }
                              ?>    
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>