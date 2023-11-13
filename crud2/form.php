<h2>Add a city :</h2>
<form action="addClient.php" class="addForm" method="POST">
    <label for="name">Name :</label>
    <input type="text" name="name" id="name" placeholder="Ex: McGyver" required>

    <label for="firstname">Firstname :</label>
    <input type="text" id="firstname" name="firstname" placeholder="Ex: Jason" required>

    <label for="birthday">Birthday</label>
    <input type="date" id="date" name="date" required>

    <label for="fidelity">Member :</label>
    <input type="checkbox" id="fidelity" name="fidelity">

    <label for="type">Member Type : </label>
    <select name="type" id="type">
        <option>Type 1</option>
        <option>Type 2</option>
    </select>

    <label for="cardnumb">Member Card Number :</label>
    <input type="number" name="cardnumb" id="cardnumb">

    <input type="submit" value="Add">
</form>