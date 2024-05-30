<?php
if (!isset($_POST["kata"])) {
    if (!isset($_POST["nama"])) {
        header("location:start.php");
    }
}
require_once('layout/header.php');
require_once('action/Action.php');

$sql = new Action($db);

if (isset($_POST["nama"])) {
    $save = $sql->saveRecordScore($_POST["nama"], $_POST["poin"], date("Y-m-d"), date("H:i:s"));
    if ($save) {
        header("location:start.php");
    }
    die();
}

$idKata = $_POST["idKata"];
$jawaban = $_POST["kata"];
$soal = $sql->getKataById($idKata);
$score = 0;
for ($i = 0; $i < count($jawaban); $i++) {
    if ($i == 2 || $i == 6) {
        $score += 0;
        continue;
    } else {
        if ($jawaban[$i] == strtoupper($soal["kata"][$i])) {
            $score += 10;
        } else {
            $score -= 2;
        }
    }
}
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <?php for ($i = 0; $i < count($jawaban); $i++) : ?>

            <div class="col-2 col-md-1 mb-2">
                <h4 class="text-center"><?= strtoupper($soal["kata"][$i]) ?></h4>
                <input type="text" class="form-control text-center 
                <?php
                if ($i != 2 && $i != 6) {
                    echo strtoupper($soal["kata"][$i]) == $jawaban[$i] ? "bg-success" : "bg-danger";
                } ?>" value="<?= $jawaban[$i]; ?>" disabled />
            </div>

        <?php endfor; ?>
    </div>
    <div class=" card col-12 col-lg-6 py-4 m-auto">
        <h3 class="text-center">poin yang anda dapat adalah</h3>
        <h1 class="fw-bolder text-center text-primary"><?= $score ?></h1>
        <div class="row mt-4">
            <div class="col-6 text-center px-4">
                <button type="button" class="btn btn-primary fw-medium text-white w-100" data-bs-toggle="modal" data-bs-target="#saveModal">
                    Simpan Poin
                </button>
            </div>
            <div class="col-6 text-center px-4">
                <a href="start.php" class="btn btn-info fw-medium text-white w-100">Ulangi</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="saveModal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="saveModalLabel">Simpan Poin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="text" name="poin" value="<?= $score ?>" hidden>
                    <div class="form-group mb-2">
                        <label for="nama" class="mb-1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once('layout/footer.php'); ?>