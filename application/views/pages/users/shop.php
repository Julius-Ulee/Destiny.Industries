<div class="container my-3">
    <div class="row">
        <div class="col-md-9 col sm-12">
            <h4>Kategori: <?= isset($category) ? $category : 'Semua Kategori' ?></h4>
            <div class="row text-center mt-3 mb-4">
                <?php foreach($content as $row): ?>
                <div class="col-6 col-lg-3 col-sm-6">
                    <figure class="figure">
                        <div class="figure-img">
                            <img src="<?=$row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" class="figure-img img-fluid" alt="" style="border-radius: 20px;">
                            <a href="<?= base_url("shop/detail/$row->product_slug") ?>" class="d-flex justify-content-center" style="border-radius: 20px;">
                                <img src="<?= base_url() ?>assets/img/detail.png" alt="" class="align-self-center">
                            </a>
                        </div>
                        <figcaption class="figure-caption">
                            <h5><?= $row->product_title ?></h5>
                            <p>IDR <?= number_format($row->price, 0, ',', '.') ?></p>
                        </figcaption>
                    </figure>
                </div>
                <?php endforeach ?>
            </div>

            <nav arial-label="Page navigation example" class="mt-2">
                <?= $pagination ?>
            </nav>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card mt-5" style="border-radius: 20px; background-color: #EDEADE;">
                <div class="card-header bg-secondary text-white" style="border-radius: 20px;">
                    Kategori
                </div>
                <div class="card-body">
                    <?php foreach(getCategories() as $category) : ?>
                        <a href="<?= base_url("/shop/category/$category->slug") ?>" class=""><?= $category->title ?></a>
                        <hr>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>