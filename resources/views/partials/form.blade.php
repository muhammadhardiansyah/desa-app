<? function formInput($size_column, $label, $type, $placeholder, $invalid, $name)
{ ?>
    <div class="col-md-<?= $size_column; ?> mb-3">
        <label for="validationCustom01" class="form-label"><?= "$label"; ?></label>
        <input type="<?= $type; ?>" class="form-control" id="validationCustom01" name="<?= $name; ?>" placeholder="<?= $placeholder; ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            <?= "$invalid"; ?>
        </div>
    </div>
<? }; ?>

<? function formInputWithValue($size_column, $label, $type, $placeholder, $invalid, $name, $value)
{ ?>
    <div class="col-md-<?= $size_column; ?>">
        <label for="validationCustom01" class="form-label"><?= "$label"; ?></label>
        <input type="<?= $type; ?>" class="form-control" id="validationCustom01" name="<?= $name; ?>" placeholder="<?= $placeholder; ?>" value="<?= $value; ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            <?= "$invalid"; ?>
        </div>
    </div>
<? }; ?>

<? function formSelect2($size_column, $label, $value1, $option1, $value2, $option2, $invalid, $name)
{ ?>
    <div class="col-md-<?= $size_column; ?>">
        <label for="validationCustom04" class="form-label"><?= $label; ?></label>
        <select class="form-select" id="validationCustom04" name="<?= $name ?>" required>
            <option selected disabled value="">Choose...</option>
            <option value=<?= $value1; ?>><?= $option1; ?></option>
            <option value=<?= $value2; ?>><?= $option2; ?></option>
        </select>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            <?= $invalid ?>
        </div>
    </div>
<? }; ?>

<? function formSelect6($size_column, $label, $value1, $option1, $value2, $option2, $value3, $option3, $value4, $option4, $value5, $option5, $value6, $option6, $invalid, $name)
{ ?>
    <div class="col-md-<?= $size_column; ?>">
        <label for="validationCustom04" class="form-label"><?= $label; ?></label>
        <select class="form-select" id="validationCustom04" name="<?= $name ?>" required>
            <option selected disabled value="">Choose...</option>
            <option value=<?= $value1; ?>><?= $option1; ?></option>
            <option value=<?= $value2; ?>><?= $option2; ?></option>
            <option value=<?= $value3; ?>><?= $option3; ?></option>
            <option value=<?= $value4; ?>><?= $option4; ?></option>
            <option value=<?= $value5; ?>><?= $option5; ?></option>
            <option value=<?= $value6; ?>><?= $option6; ?></option>
        </select>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            <?= $invalid ?>
        </div>
    </div>
<? }; ?>


<? function formTextArea($size_column, $label, $placeholder, $invalid, $name)
{
?>
    <div class="col-md-<?= $size_column; ?>">
        <label for="validationTextarea" class="form-label"><?= $label; ?></label>
        <textarea class="form-control" id="validationTextarea" placeholder="<?= $placeholder; ?>" name=<?= $name; ?> required></textarea>
        <div class="valid-feedback">
            Looks good!
        </div>
        <div class="invalid-feedback">
            <?= $invalid; ?>
        </div>
    </div>

<? }; ?>

