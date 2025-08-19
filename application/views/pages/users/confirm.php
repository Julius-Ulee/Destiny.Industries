<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-9 col-sm-12">
            <div class="card" style="border-radius: 20px; background-color: #EDEADE;">
                <div class="card-header bg-secondary text-white" style="border-radius: 20px;">
                    Konfirmasi Order #<?= $order->invoice ?>
                    <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                </div>
                <?= form_open_multipart($form_action, ['method', 'POST']) ?>
                    <?= form_hidden('id_orders', $order->id) ?>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="">Transaksi</label>
                                <input type="text" class="form-control" value="<?= $order->invoice ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Dari rekening A/N</label>
                                <input type="text" name="account_name" value="<?= $input->account_name ?>" class="form-control">
                                <?= form_error('account_name') ?>
                            </div>
                            <div class="form-group">
                                <label for="">No rekening</label>
                                <input type="text" name="account_number" value="<?= $input->account_number ?>" class="form-control">
                                <?= form_error('account_number') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Nominal</label>
                                <input type="number" name="nominal" value="<?= $input->nominal ?>" class="form-control">
                                <?= form_error('nominal') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control">-</textarea>
                            </div>
                            <table class="table table-bordered">
                                <tbody class="row">
                                    <tr>
                                        <td>Total Belanja</td>
                                        <td>Rp,<?= number_format($order->total, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ongkos Kirim</td>
                                        <td>Rp,<?= number_format($order->cost_courier, 0, ',', '.') ?></td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-dark">
                                    <tr>
                                        <td>Total Bayar</td>
                                        <td>Rp,<?= number_format($order->total + $order->cost_courier, 0, ',', '.') ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="form-group">
                                <label for="">Bukti Transfer</label> <br>
                                <input type="file" name="image">
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>