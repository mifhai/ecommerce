<style>
    .login-padding{
        padding-top: 160px;
        margin-bottom: 100px;
    }

    .login .login-text{
        font-size: 35px;
        padding-bottom: 30px;
        border-bottom: 1px solid rgba(0,0,0,0.12);
    }
    .login .login-text::after{
        color: #007bff;
        content: ' ';
        border-bottom: 3px solid;
        display: block;
        width: 20%;
        position: absolute;
        bottom: -1px;
    }
    .btn-login{
        width: 100%;
    }
    .btn-daftar{
        width: 100%;
        margin-top: 20px;
    }
    .registrasi .registrasi-text{
        font-size: 35px;
        padding-bottom: 30px;
        border-bottom: 1px solid rgba(0,0,0,0.12);
    }
    .registrasi .registrasi-text::after{
        color: #007bff;
        content: ' ';
        border-bottom: 3px solid;
        display: block;
        width: 20%;
        position: absolute;
        bottom: -1px;
    }
    .text-name{
        margin-top:26px;
    }
    .registrasi{
        margin-left: 90px;
        padding-left: 90px;
        border-left: 1px solid rgba(0,0,0,0.12);
    }
    .registrasi .atau{
        position: absolute;
        border: 1px solid rgba(0,0,0,0.12);
        left: -25px;
        padding: 10px;
        border-radius: 100%;
        background: white;
        bottom: 240px;
    }
    .form-check-input{
        left: 20px;
    }
    .account{
        padding-top: 150px;
        margin-bottom: 150px;
    }
    .account img{
        border-radius: 100%;
    }
    .account a{
        color: black;
    }
    .account i{
        color: white;
        background-color: #0e8ce4;
        padding: 5px;
        border-radius: 100%;
    }
    .list-group-item{
        border: none;
        padding: 19px 0px 0px 0px;

    }
    .profil{
        -webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,1);
        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,1);
        box-shadow: 0px 0px 5px -2px rgba(0,0,0,1);
        border-radius: 10px;
    }
    .profil .profil-saya{
        margin: 0;
        margin-top: 10px;
        font-size: 20px;
        color: black;
        font-weight: 500;
    }
    .desc{
        border-bottom: 1px solid rgba(0,0,0,0.12);
    }
    .profil .alamat{
        padding-left: 50px;
    }
    .alamat span{
        padding-top: calc(.375rem + 1px);
        padding-bottom: calc(.375rem + 1px);
    }
    .form-control-plaintext{
        width: 100%;
    }
    .profil img{
        position: absolute;
        top: 15%;
        border-radius: inherit;
        right: 5%;
    }
    .nav-link{
        padding: 0;
    }
    .rounded{
        padding: 20px 0px 0px 30px;
    }
    .update-password{
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .modal-content{
        width: 150%;
        right: 20%;
    }
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .registrasi .atau{
            bottom: 610px;
            left: 150px;
        }
        .registrasi{
            margin-left: 0;
            padding-left: 15px;
            border-top: 1px solid rgba(0,0,0,0.12);
            margin-top: 50px;
            padding-top: 35px;
        }
        .login-padding{
            padding-top: 70px;
            text-align: justify;
        }
        .account{
            padding-top: 75px;
            margin-bottom: 35px;
        }
        .profil{
            margin-top: 30px;
        }
        .col-form-label{
            font-weight: bold;
        }
        .profil .alamat {
            padding-left: 30px;
        }
        .modal-content{
            width: 100%;
            right: 0;
        }
    }
</style>
