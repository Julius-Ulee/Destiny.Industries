<div class="container my-3">
    <?php $this->load->view('layouts/_alerts') ?>

    <div class="row justify-content-center">
        <div class="col-md-9 col-sm-12">
            <div class="card" style="border-radius: 20px; background-color: #EDEADE;">
                <div class="card-header bg-secondary text-white" style="border-radius: 20px;" align="center">
                    <b>Checkout Berhasil</b>
                </div>
                <div class="card-body justify-content-center">
                    <h5 align="center">No Order : <?= $content->invoice ?></h5>
                    <div class="row justify-content-center">
                        <div class="col-sm-5">
                            <table class="table table-bordered">
                                <tbody class="row justify-content-center">
                                    <tr>
                                        <td>Total Belanja</td>
                                        <td>Rp,<?= number_format($content->total, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ongkos Kirim</td>
                                        <td>Rp,<?= number_format($content->cost_courier, 0, ',', '.') ?></td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-dark">
                                    <tr>
                                        <td>Total Bayar</td>
                                        <td>Rp,<?= number_format($content->total + $content->cost_courier, 0, ',', '.') ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <p>Terima kasih sudah berbelanja.</p>
                    <p>Silahkan lakukan pembayaran sesuai total bayar di atas dan transfer pada salah satu rekening di bawah ini :</p>
                    <div class="card-body justify-content-center" style="border-radius: 20px; background-color: #F5F5DC;">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url("assets/img/bank-bjb.jpg") ?>" style="border-radius: 20px; width: 100%; height:100px; object-position: center; object-fit: cover;">
                            </div>
                            <div class="col-sm-8">
                                <h3>Bank BJB</h3>
                                <p>BJB 0138246574100</p>
                                <p>A/N : Azriel</p>
                            </div>
                            <div class="col-sm-3">
                                <img src="<?= base_url("assets/img/bank-bca.jpg") ?>" style="border-radius: 20px; width: 100%; height:100px; object-position: center; object-fit: cover;">
                            </div>
                            <div class="col-sm-8">
                                <h3>Bank BCA</h3>
                                <p>BCA 909798675</p>
                                <p>A/N : Azriel</p>
                            </div>
                        </div>
                    </div>

                    <p>Jika sudah screenshot bukti pembayaran dan silahkan lakukan konfirmasi pembayaran</p>

                    <a href="<?= base_url('/') ?>" class="btn btn-dark"><i class="fas fa-angle-left"></i> Kembali</a>
                    <a href="<?= base_url("/myorder/detail/$content->invoice") ?>" class="btn btn-success" style="float: right;"><i class="fas fa-angle-right"></i> Konfirmasi Pembayaran</a>                    
                </div>
            </div>
        </div>
    </div>
</div>