<div class="container my-4">
    <?php $this->load->view("layouts/_alerts") ?>

    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-20">
        <div class="card" style="border-radius: 20px; background-color: #EDEADE;">
                <div class="card-header bg-secondary text-white" style="border-radius: 20px;">
                    <b>Keranjang</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-radius: 20px;">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Kuantitas</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cart as $row): ?>
                                    <tr>
                                        <td><img src="<?=$row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" alt="" height="100" class="img-responsive"><?= $row->title ?></td>
                                        <td><?= $row->quantity ?></td>
                                        <td>Rp,<?= number_format($row->price, 0, ',', '.') ?></td>
                                        <td>Rp,<?= number_format($row->sub_total, 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total : </td>
                                    <td>Rp,<?= number_format(array_sum(array_column($cart, 'sub_total')), 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card" style="margin-top: 8%; border-radius: 20px; background-color: #EDEADE;">
                <div class="card-header bg-secondary text-white" style="border-radius: 20px;">
                <b>Lengkapi Detail Pesanan</b>
                </div>
                <div class="card-body">
                    <?= form_open('checkout/create', ['method' => 'POST']) ?>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama penerima" value="<?= $input->name ?>">
							<?= form_error('name') ?>
                        </div>
                        <div class="form-group">
							<label for="">Alamat</label>
							<textarea name="address" id="" cols="30" rows="5" class="form-control"><?= $input->address ?></textarea>
							<?= form_error('address') ?>
						</div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="province" id="" class="form-control">
                                <option value="">-- pilih provinsi --</option>
                                <?php foreach($provinces as $province): ?>
                                    <option value="<?= $province['code'] ?>"><?= $province['name'] ?></option>
                                <?php endforeach ?>
                            </select>
							<?= form_error('province') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kota</label>
                            <select name="city" id="city" class="form-control">
                                <option value="">-- pilih kota --</option>
                            </select>
							<?= form_error('city') ?>
                        </div>
						<div class="form-group">
							<label for="">Telepon</label>
							<input type="text" class="form-control" name="phone" placeholder="Masukkan nomor telepon penerima" value="<?= $input->phone ?>">
							<?= form_error('phone') ?>
						</div>
                        <div class="form-group">
                            <label for="">Jasa Pengiriman</label>
                            <select name="courier" id="" class="form-control">
                                <option value="">-- Pilih Jasa Pengiriman --</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">Tiki</option>
                                <option value="pos">POS Indonesia</option>
                            </select>
							<?= form_error('province') ?>
                        </div>

						<button class="btn btn-dark" type="submit">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>