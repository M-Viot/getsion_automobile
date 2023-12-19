<div class="container">
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                Ajouter
            </button>
            <table class="table">
                <thead>
                <tr>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Immatriculation</th>
                    <th>Carburant</th>
                    <th>Prix</th>
                    <th>Vente</th>
                    <th>Réservé</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody id="carList">
                <?php foreach ($cars as $car): ?>
                    <tr>
                        <td><?=$car->getBrand()?></td>
                        <td><?=$car->getModel()?></td>
                        <td><?=$car->getIdNum()?></td>
                        <td><?=$car->getGas()?></td>
                        <td><?=$car->getPrice()?></td>
                        <td><?=$car->getIsNew()?'Neuf':'Occasion'?></td>
                        <td><?=$car->getIsReserved()?'Oui':'Non'?></td>
                        <td>
                            <button class="edit btn btn-outline-primary" data-id="<?=$car->getIdNum()?>">Edit</button>
                            <button class="delete btn btn-outline-danger" data-id="<?=$car->getIdNum()?>">Remove</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/api" method="post" id="carForm">
                <div class="modal-header">
    <!--                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>-->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--    Marque-->
                    <label for="brand"  class="form-label">Marque</label>
                    <input type="text" class="form-control" name="brand" id="brand" required>
                    <!--    Modèle-->
                    <label for="model" class="form-label">Modèle</label>
                    <input type="text" class="form-control" name="model" id="model" required>
                    <!--    Immatriclation-->
                    <label for="idNum" class="form-label">Immatriclation</label>
                    <input type="text" class="form-control" name="idNum" id="idNum" required>
                    <!--    Carburant-->
                    <label for="gas" class="form-label">Carburant</label>
                    <select name="gas" class="form-control" id="gas" required>
                        <?php foreach (GAS_TYPE  as $value):?>
                            <option value="<?=$value ?>"><?=$value ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!--    Prix-->
                    <label for="price" class="form-label">Prix</label>
                    <input type="number" class="form-control" name="price" id="price" required>
                    <!--    Vente-->
                    <label for="isNew" class="form-label">Vente</label>
                    <select name="isNew" class="form-control" id="isNew" required>
                        <option value=0>Occasion</option>
                        <option value=1>Neuf</option>
                    </select>
                    <!--    Réservé-->
                    <label for="isReserved" class="form-label">Réservé</label>
                    <select name="isReserved" class="form-control" id="isReserved" required>
                        <option value=0>Non</option>
                        <option value=1>Oui</option>
                    </select>
                    <input type="hidden" name="update" id="update" value="false">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/public/scripts/car.js"></script>
