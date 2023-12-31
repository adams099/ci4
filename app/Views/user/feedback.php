<?= $this->extend('./layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid py-4">
    <div class="d-flex justify-content-center">
        <?= $pager->links('feedback', 'custom_pager') ?>
    </div>

    <div class="row">
        <div class="col-auto my-auto">
            <button type="button" class="btn btn-link btn-feedbackInfo text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path class="opacity-6" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                </svg>
                Info
            </button>
        </div>
        <?php if (in_groups('user')) : ?>
            <div class="col-lg-3 col-md-3 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Feedback">
                            <a class="btn-edit nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#" role="tab" aria-selected="false">

                                <svg class="text-dark" xmlns="http://www.w3.org/2000/svg" height="19" width="18" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                    <path class="color-background" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                                <span class="ms-1">Add Feedback</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <div class="row mt-4">
        <!-- feedback -->
        <?php foreach ($feedbackData as $key) : ?>
            <div class="col-lg-6 mb-lg-0 mb-4 my-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex flex-column" style="height: 12rem;">
                                    <?php if (in_groups('admin')) : ?>
                                        <p class="mb-1 pt-2 text-bold">From : <?= $key['from'] ?></p>
                                    <?php endif; ?>
                                    <h5 class="font-weight-bolder"><?= $key['judul'] ?></h5>
                                    <p class="mb-5"><?= $key['saran'] ?></p>
                                    <?php if (in_groups('admin')) : ?>
                                        <form action="/feedback/delete" method="post">
                                            <input type="hidden" name="id" value="<?= $key['id']; ?>">
                                            <button type="submit" class="btn btn-link p-0 justify-content-end">
                                                <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path class="opacity-5" d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                                    </svg>
                                                    &nbsp;DELETE
                                                </a>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <form role="form" action="/user/feedback-save" method="post">
        <?= csrf_field(); ?>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body mt-0">
                        <!-- page1 -->
                        <div class="form-row">
                            <div class="row setup-content" id="step-1">
                                <div class="col-xs-6 col-md-offset-3">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">From :</label>
                                                <input name="from" value="<?= user()->email; ?>" readonly type="text" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">To :</label>
                                                <input value="Administrator" readonly type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Title</label>
                                                <input name="judul" placeholder="Judul atau kategori" required type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Feedback</label>
                                                <textarea name="saran" required class="form-control" placeholder="Kritik & Saran"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary close-modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="feedbackInfo" tabindex="-1" role="dialog" aria-labelledby="feedbackInfo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path class="color-background opacity-6" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                    </svg>
                </div>
                <div class="modal-body mt-0">
                    <?= $msg; ?>
                </div>
                <div class="modal-footer">
                    <form role="form" action="/alumni/delete" method="post">
                        <button type="button" class="btn btn-secondary close-modal-info">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>