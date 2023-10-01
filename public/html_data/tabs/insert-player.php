<?php
    include("../includes/nav/navigation.php");
?>
<div class="insert-container">
        <div class="img-container">
            <img src="https://assets-de.imgfoot.com/zlatan-ibrahimovic-ac-milan-fm.jpg" alt="">
        </div>
        <form class="form-create-player" action="transfermarket.php" method="post">
            <h3>Insert a Player into our Database</h3>
            <div class="input-wrapper">
                <div class="flex">
                    <input type="text" placeholder="Vorname" name="vorname">
                    <input type="text" placeholder="Nachname" name="nachname">
                </div>
                <div class="flex">
                    <input type="text" name="position" placeholder="Position" id="">
                    <input type="number" name="number" placeholder="Rückennummer" id="">
                </div>

                <input type="text" name="club" placeholder="Club" id="">
                <input type="marktwert" placeholder="Marktwert" name="marktwert" id="">
                <a class="btn" href="transfermarket.php" type="submit">Jetzt erstellen</a>
            </div>

        </form>
    </div>