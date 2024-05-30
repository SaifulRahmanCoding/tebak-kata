<?php
require_once('layout/header.php');
require_once('action/Action.php');
$sql = new Action($db);
$val = $sql->getKataRandom();
$records = $sql->getRecord();
?>
<div class="container py-4">
    <h1 class="text-center mb-5">Tebak Kata</h1>
    <h2 class="text-center">Clue</h2>

    <form action="score.php" method="post">
        <input type="text" name="idKata" value="<?= $val["id"] ?>" hidden>
        <h3 class="text-center mb-5">"<?= $val["clue"] ?>"</h3>
        <div class="row justify-content-center">
            <?php for ($i = 0; $i < strlen($val["kata"]); $i++) :

                if ($i == 2 || $i == 7) : ?>
                    <input type="text" name="kata[]" value="<?= strtoupper($val["kata"][$i]) ?>" hidden>
                <?php endif; ?>

                <div class="col-2 col-md-1 mb-2">
                    <input onkeyup="this.value = this.value.toUpperCase();" type="text" name="kata[]" class="form-control text-center" id="kata" value="<?= $i == 2 || $i == 7 ? strtoupper($val["kata"][$i]) : "" ?>" <?= $i == 2 || $i == 7 ? "disabled" : "" ?> required />
                </div>

            <?php endfor; ?>
        </div>
        <a href="start.php" class="text-center d-block">Refrash Kata</a>

        <div class="d-block text-center mt-5">
            <button type="submit" class="btn btn-primary fw-medium px-4">Jawab</button>
        </div>
    </form>
    <div class="text-center mt-5">
        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#recordModal">
            Lihat Record Poin Game
        </button>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="recordModal" tabindex="-1" aria-labelledby="recordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="recordModalLabel">Record Poin Game</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Poin</th>
                                <th>Tanggal</th>
                                <th>Waktu Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($records as $record) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $record["nama_user"] ?></td>
                                    <td><?= $record["total_point"] ?></td>
                                    <td><?= $record["tanggal"] ?></td>
                                    <td><?= $record["waktu_selesai"] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php require_once('layout/footer.php'); ?>