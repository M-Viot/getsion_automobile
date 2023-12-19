
<table>
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
                <button class="editBtn" data-id="<?=$car->getIdNum()?>">Edit</button>
                <button class="deleteBtn" data-id="<?=$car->getIdNum()?>">Remove</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>
<form action="/api" method="post" id="carForm">
    <!--    Marque-->
    <label for="brand">Marque</label>
    <input type="text" name="brand" id="brand">
    <!--    Modèle-->
    <label for="model">Modèle</label>
    <input type="text" name="model" id="model">
    <!--    Immatriclation-->
    <label for="idNum">Immatriclation</label>
    <input type="text" name="idNum" id="idNum">
    <!--    Carburant-->
    <label for="gas">Carburant</label>
    <select name="gas" id="gas">
        <?php foreach (GAS_TYPE  as $value):?>
            <option value="<?=$value ?>"><?=$value ?></option>
        <?php endforeach; ?>
    </select>
    <!--    Prix-->
    <label for="price">Prix</label>
    <input type="number" name="price" id="price">
    <!--    Vente-->
    <label for="isNew">Vente</label>
    <select name="isNew" id="isNew">
        <option value=0>Occasion</option>
        <option value=1>Neuf</option>
    </select>
    <!--    Réservé-->
    <label for="isReserved">Réservé</label>
    <select name="isReserved" id="isReserved">
        <option value=0>Non</option>
        <option value=1>Oui</option>
    </select>
    <input type="hidden" name="update" id="update" value="false">
    <button type="submit">Enregistrer</button>
</form>
<script src="/public/scripts/car.js"></script>
