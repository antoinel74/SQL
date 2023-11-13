<h2>Add a show :</h2>
<form action="addShows.php" class="addForm" method="POST">
    <label for="showName">Name :</label>
    <input type="text" name="showName" id="showName" placeholder="Ex: La Fête du Slip" required>

    <label for="performer">Performer :</label>
    <input type="text" name="performer" id="performer" placeholder="Ex: Michael Bay" required>

    <label for="date">Date :</label>
    <input type="date" name="date" id="date" required>


    <label for="type">ShowType :</label>
    <select name="type" id="type">
        <option>Concert</option>
        <option>Théâtre</option>
        <option>Humour</option>
        <option>Danse</option>
    </select>

    <label for="genre">Genre :</label>
    <select name="genre" id="genre">
        <option>Electronic</option>
    </select>
    <label for="subgenre">Subgenre :</label>
    <select name="subgenre" id="subgenre">
        <option>Club</option>
    </select>

    <label for="duration">Duration :</label>
    <input type="time" id="duration" name="duration" required>

    <label for="start">Start at :</label>
    <input type="time" id="start" name="start">

    <input type="submit" value="Add">
</form>