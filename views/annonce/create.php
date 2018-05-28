<form action='?controller=annonce&action=create' method='POST' id='jqform' enctype="multipart/form-data">
    <div class='row center-align'>
        <div class="col s4">
            <img class="formimg" id='imgAd1' src="asset/image/Add-icon.png" alt="Card image cap">
            <div class="file-field">
                <div class="btn red">
                    <i class="material-icons">add</i>
                    <input id='img_1' type='file' accept ='.jpg, .jpeg, .png' name="img[]">
                </div>
            </div>
        </div>
        <div class="col s4">
            <img class="formimg" id='imgAd2' src="asset/image/Add-icon.png" alt="Card image cap">
            <div class="file-field">
                <div class="btn red">
                    <i class="material-icons">add</i>
                    <input id='img_2' type='file' accept ='.jpg, .jpeg, .png' name="img[]">
                </div>
            </div>
        </div>
        <div class="col s4">
            <img class="formimg" id='imgAd3' src="asset/image/Add-icon.png" alt="Card image cap">
            <div class="file-field">
                <div class="btn red">
                    <i class="material-icons">add</i>
                    <input id='img_3' type='file' accept ='.jpg, .jpeg, .png' name="img[]">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <input id="titleAd" name="titleAd" type="text" class="validate">
          <label for="titleAd">Titre</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <input id="descAd" name="descAd" type="text" class="validate">
          <label for="descAd">Description</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <select name="selectStateAd" id="selectedStateAd">
                <option value="" disable selected>Votre Region</option>
                <?php foreach($state as $reg){ ?>
                    <option value="<?= $reg['id'] ?>"><?= $reg['name'] ?></option>
                <?php } ?>
            </select>
            <label>Region</label>
        </div>
        <div class="input-field col s6">
            <select name="selectCatAd" id="selectedCatAd">
                <option value="" disable selected>Categorie</option>
                <?php foreach($categorie as $cat){ ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php } ?>
            </select>
            <label>Categorie</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
                <input id="priceAd" name="priceAd" type="number" class="validate">
                <label for="priceAd">Prix</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>