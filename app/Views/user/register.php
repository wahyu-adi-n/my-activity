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
        <a class="navbar-brand" href="#">my-Activity</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
          </ul>
          <ul class="navbar-nav d-none d-lg-flex ml-2 order-3">
            <li class="nav-item"><a class="nav-link" href="/login">Sign in</a></li>
            <li class="nav-item"><a class="nav-link" href="/register">Sign up</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <main id="main" class="site-main main">
      <section class="section">
        <div class="container">
          <div class="row">
            <div class="container container--mini">
              <h1 class="text-center mt-3">Sign Up</h1>
              <form action="/register" method="post">
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="user_login">Nama</label>
                      <input type="nama" name="log"
                        class="form-control mb-3" 
                        placeholder="Masukkan Nama"
                        size="20"
                        autofocus required>
                    </div>
                    <div class="form-group">
                      <label for="user_login">Email</label>
                      <input type="email" name="log"
                        class="form-control mb-3" 
                        placeholder="Masukkan Email"
                        size="20"
                        autofocus required>
                    </div>
                    <div class="form-group">
                      <label for="user_pass">Password</label>
                        <input type="password" 
                        name="password" 
                        class="form-control mb-3" 
                        placeholder="Masukkan Password" 
                        size="20" required>
                    </div>
                    <div class="form-group">
                        <label for="user_pass">Level</label>
                        <select class="form-control" name="level" required>
                          <option value="">Pilih Level</option>
                          <option value="staf">Staf</option>
                          <option value="koordinator">Koordinator</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block mt-3" value="Sign Up">
                    </div>
                  </div>
                </div>     
              </form>
              <p class="small text-center text-gray-soft">Sudah punya akun?
                <a href="/login">Sign In</a>
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>