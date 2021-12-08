@include('common.header', ['titlePage' => 'Dashboard'])
@include('common.navbar', ['linkActive' => 'dashboard'])
@include('common.menu')


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <br>
                    <center class="text-primary">
                        <h2>
                            Selamat Datang Di Sistem Informasi <br>
                            Apotek Jati Ukir
                        </h2>
                        <img
                            class="img-profile rounded-circle"
                            src="{{ asset('img/hos.jpg') }}"
                            style="width: 400px;"><br>
                            Jl. Arya Wiratanudatar
                    </center>
                </div>
                <!-- /.container-fluid -->
@include('common.footer')