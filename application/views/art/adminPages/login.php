<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login_Page</title>

    <!-- Custom fonts for this template-->
    <link href="/~sale11/my3/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/~sale11/my3/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <img src="https://cdn.pixabay.com/photo/2016/05/25/18/02/autumn-leaves-1415541_960_720.jpg" class="col-lg-6 d-none d-lg-block"></img>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Login_Page</h1>
                                    </div>
                                    <form name="form1" class="user" action="/~sale11/art/admin/checkPageJoin" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="id" aria-describedby="emailHelp"
                                                placeholder="아이디를 입력해주세요.">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="pw" placeholder="패스워드를 입력해주세요."">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block font-weight-bold" onclick="javascript:form1.submit()">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
										<a class="small" href="/~sale11/art/register">Register</a>&nbsp/&nbsp
                                        <a class="small" href="/~sale11/art">NareGallery</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/~sale11/my3/vendor/jquery/jquery.min.js"></script>
    <script src="/~sale11/my3/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/~sale11/my3/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/~sale11/my3/js/sb-admin-2.min.js"></script>

</body>

</html>