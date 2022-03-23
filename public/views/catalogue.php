
<section id="Catalogue">
    <div class="container">
        <form method="post" action="?p=catalogue">
            <select name="ville">
                <option value="ville">ville</option>
                <option value="Dreux">Dreux</option>
                <option value="Paris">Paris</option>
            </select>
            <select id="level" name="level">
                <option value="level">level</option>
                <option value="1">lvl 1</option>
                <option value="2">lvl 2</option>
                <option value="3">lvl 3</option>
                <option value="4">lvl 4</option>
                <option value="5">lvl 5</option>
            </select>

            <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit" >filtrer </button>
        </form>
        <div class="row">
            <?= $htmlEscp ?> 
        </div>
    </div>
    
</section>
    