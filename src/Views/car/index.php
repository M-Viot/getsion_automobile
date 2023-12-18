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
    <tbody>
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
                <a href="#">Edit</a>
                <a href="#">Remove</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>
<form action="/new" method="post" id="carForm">
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
        <?php foreach (GAS_TYPE  as $key => $value):?>
            <option value="<?=$key ?>"><?=$value ?></option>
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
    <button type="submit">Enregistrer</button>
</form>
