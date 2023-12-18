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
