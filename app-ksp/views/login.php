<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }
        #login {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-signin {
            display: flex;
            flex-direction: column;
        }
        .form-signin label {
            margin: 10px 0 5px;
        }
        .form-signin input {
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .separator {
            margin: 10px 0;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
        .location-preview {
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div id="login">
        <h3>Koperasi Simpan Pinjam</h3>
        <h3>Login</h3>
        <form class="form-signin" method="post" action="login">
            <label class="strong">Username</label>
            <input type="text" class="input-block-level" name="username" placeholder="Masukan username" required autofocus>
            <label class="strong">Password</label>
            <input type="password" class="input-block-level" name="password" placeholder="Masukan kata sandi" required>
            <div class="separator line"></div>
            <button class="btn btn-large btn-primary pull-right" type="submit">Masuk</button>
            <div class="clearfix"></div>
        </form>
        <!-- <div class="location-preview">
        <form method="post" action="<?php echo site_url('logo/simpan') ?>" enctype="multipart/form-data" class="form-horizontal">
        <<?php echo base_url('assets/'.$logo['kop_koperasi']) ?>">
        </div> -->
    </div>
</body>
</html>
