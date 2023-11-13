<h2>Edit a client profile :</h2>
<form action="editClient.php" class="editForm" method="POST">
    <label for="clientId">Client ID:</label>
    <input type="number" name="clientId" id="clientId" required>

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="firstname">Firstname :</label>
    <input type="text" id="firstname" name="firstname" placeholder="Ex: Jason" required>

    <label for="birthday">Birthday</label>
    <input type="date" id="date" name="date" required>

    <label for="fidelity">Member :</label>
    <input type="checkbox" id="fidelity" name="fidelity">

    <label for="cardnumb">Member Card Number :</label>
    <input type="number" name="cardnumb" id="cardnumb">

    <input type="submit" value="Update">
</form>